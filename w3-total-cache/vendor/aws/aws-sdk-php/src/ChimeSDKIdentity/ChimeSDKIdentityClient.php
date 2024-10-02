<?php
namespace Aws\ChimeSDKIdentity;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Chime SDK Identity** service.
 * @method \Aws\Result createAppInstance(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppInstanceAsync(array $args = [])
 * @method \Aws\Result createAppInstanceAdmin(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppInstanceAdminAsync(array $args = [])
 * @method \Aws\Result createAppInstanceBot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppInstanceBotAsync(array $args = [])
 * @method \Aws\Result createAppInstanceUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppInstanceUserAsync(array $args = [])
 * @method \Aws\Result deleteAppInstance(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppInstanceAsync(array $args = [])
 * @method \Aws\Result deleteAppInstanceAdmin(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppInstanceAdminAsync(array $args = [])
 * @method \Aws\Result deleteAppInstanceBot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppInstanceBotAsync(array $args = [])
 * @method \Aws\Result deleteAppInstanceUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppInstanceUserAsync(array $args = [])
 * @method \Aws\Result deregisterAppInstanceUserEndpoint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deregisterAppInstanceUserEndpointAsync(array $args = [])
 * @method \Aws\Result describeAppInstance(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppInstanceAsync(array $args = [])
 * @method \Aws\Result describeAppInstanceAdmin(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppInstanceAdminAsync(array $args = [])
 * @method \Aws\Result describeAppInstanceBot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppInstanceBotAsync(array $args = [])
 * @method \Aws\Result describeAppInstanceUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppInstanceUserAsync(array $args = [])
 * @method \Aws\Result describeAppInstanceUserEndpoint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppInstanceUserEndpointAsync(array $args = [])
 * @method \Aws\Result getAppInstanceRetentionSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAppInstanceRetentionSettingsAsync(array $args = [])
 * @method \Aws\Result listAppInstanceAdmins(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppInstanceAdminsAsync(array $args = [])
 * @method \Aws\Result listAppInstanceBots(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppInstanceBotsAsync(array $args = [])
 * @method \Aws\Result listAppInstanceUserEndpoints(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppInstanceUserEndpointsAsync(array $args = [])
 * @method \Aws\Result listAppInstanceUsers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppInstanceUsersAsync(array $args = [])
 * @method \Aws\Result listAppInstances(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppInstancesAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result putAppInstanceRetentionSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putAppInstanceRetentionSettingsAsync(array $args = [])
 * @method \Aws\Result putAppInstanceUserExpirationSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putAppInstanceUserExpirationSettingsAsync(array $args = [])
 * @method \Aws\Result registerAppInstanceUserEndpoint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise registerAppInstanceUserEndpointAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateAppInstance(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAppInstanceAsync(array $args = [])
 * @method \Aws\Result updateAppInstanceBot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAppInstanceBotAsync(array $args = [])
 * @method \Aws\Result updateAppInstanceUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAppInstanceUserAsync(array $args = [])
 * @method \Aws\Result updateAppInstanceUserEndpoint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAppInstanceUserEndpointAsync(array $args = [])
 */
class ChimeSDKIdentityClient extends AwsClient {}
