<?php
/*
Plugin Name: BlockCypher Bitcoin Gateway
Description: A custom WooCommerce payment gateway for Bitcoin using BlockCypher API.
Version: 1.1
Author: Your Name
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include our Gateway Class and register Payment Gateway with WooCommerce
add_action('plugins_loaded', 'init_blockcypher_gateway_class');
function init_blockcypher_gateway_class() {
    class WC_Gateway_BlockCypher extends WC_Payment_Gateway {
        public function __construct() {
            $this->id = 'blockcypher';
            $this->icon = ''; // URL of the icon that will be displayed on checkout page
            $this->has_fields = false;
            $this->method_title = 'BlockCypher Bitcoin Gateway';
            $this->method_description = 'Allows payments with Bitcoin via BlockCypher.';

            // Load the settings
            $this->init_form_fields();
            $this->init_settings();

            // Define user settings
            $this->title = $this->get_option('title');
            $this->description = $this->get_option('description');
            $this->api_token = $this->get_option('api_token');
            $this->debug = 'yes' === $this->get_option('debug');

            // Actions
            add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
            add_action('woocommerce_receipt_' . $this->id, array($this, 'receipt_page'));
            add_action('woocommerce_api_wc_gateway_' . $this->id, array($this, 'check_ipn_response'));

            // Payment listener/API hook
            add_action('woocommerce_api_wc_gateway_blockcypher', array($this, 'check_ipn_response'));

            // Logger
            if ($this->debug) {
                $this->log = new WC_Logger();
            }
        }

        public function init_form_fields() {
            $this->form_fields = array(
                'enabled' => array(
                    'title' => 'Enable/Disable',
                    'type' => 'checkbox',
                    'label' => 'Enable BlockCypher Bitcoin Gateway',
                    'default' => 'yes'
                ),
                'title' => array(
                    'title' => 'Title',
                    'type' => 'text',
                    'description' => 'This controls the title which the user sees during checkout.',
                    'default' => 'Bitcoin Payment',
                    'desc_tip' => true,
                ),
                'description' => array(
                    'title' => 'Description',
                    'type' => 'textarea',
                    'description' => 'This controls the description which the user sees during checkout.',
                    'default' => 'Pay with Bitcoin via BlockCypher.',
                ),
                'api_token' => array(
                    'title' => 'API Token',
                    'type' => 'text',
                    'description' => 'Enter your BlockCypher API token.',
                ),
                'debug' => array(
                    'title' => 'Debug Log',
                    'type' => 'checkbox',
                    'label' => 'Enable logging',
                    'default' => 'no',
                    'description' => 'Log BlockCypher events, such as API requests, inside <code>woocommerce/logs/blockcypher.txt</code>',
                ),
            );
        }

        public function process_payment($order_id) {
            $order = wc_get_order($order_id);

            // Log the payment process
            if ($this->debug) {
                $this->log->add('blockcypher', 'Processing payment for order ' . $order_id);
            }

            // Mark as on-hold (we're awaiting the payment)
            $order->update_status('on-hold', 'Awaiting Bitcoin payment');

            // Reduce stock levels
            wc_reduce_stock_levels($order_id);

            // Empty cart
            WC()->cart->empty_cart();

            // Return thank you page redirect
            return array(
                'result' => 'success',
                'redirect' => $this->get_return_url($order)
            );
        }

        public function receipt_page($order) {
            echo '<p>Thank you for your order, please click the button below to pay with Bitcoin using BlockCypher.</p>';
            echo '<button class="button alt" id="blockcypher-payment-button">Pay with Bitcoin</button>';
        }

        public function check_ipn_response() {
            // Handle IPN response from BlockCypher
            if ($this->debug) {
                $this->log->add('blockcypher', 'IPN response received');
            }
        }
    }
}

// Add the gateway to WooCommerce
add_filter('woocommerce_payment_gateways', 'add_blockcypher_gateway_class');
function add_blockcypher_gateway_class($methods) {
    $methods[] = 'WC_Gateway_BlockCypher';
    return $methods;
}
?>
