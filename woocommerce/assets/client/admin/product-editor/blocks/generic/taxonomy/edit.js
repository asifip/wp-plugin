"use strict";var __importDefault=this&&this.__importDefault||function(e){return e&&e.__esModule?e:{default:e}};Object.defineProperty(exports,"__esModule",{value:!0}),exports.Edit=void 0;const element_1=require("@wordpress/element");require("@woocommerce/settings");const block_templates_1=require("@woocommerce/block-templates"),components_1=require("@woocommerce/components"),compose_1=require("@wordpress/compose"),data_1=require("@wordpress/data"),create_taxonomy_modal_1=require("./create-taxonomy-modal"),use_taxonomy_search_1=__importDefault(require("./use-taxonomy-search")),use_product_entity_prop_1=__importDefault(require("../../../hooks/use-product-entity-prop")),label_1=require("../../../components/label/label");function Edit({attributes:e,context:{postType:t,isInSelectedTab:a}}){const o=(0,block_templates_1.useWooBlockProps)(e),{hierarchical:l}=(0,data_1.useSelect)((t=>t("core").getTaxonomy(e.slug)||{hierarchical:!1})),{label:r,help:n,slug:i,property:s,createTitle:m,dialogNameHelpText:c,parentTaxonomyText:p,disabled:u,placeholder:_}=e,[d,b]=(0,element_1.useState)(""),[y,h]=(0,element_1.useState)([]),{searchEntity:x,isResolving:f}=(0,use_taxonomy_search_1.default)(i,{fetchParents:l}),g=(0,compose_1.useDebounce)((0,element_1.useCallback)((e=>{b(e),x(e||"").then(h)}),[l]),150);(0,element_1.useEffect)((()=>{a&&g("")}),[a]);const[S,v]=(0,use_product_entity_prop_1.default)(s,{postType:t,fallbackValue:[]}),T=(S||[]).map((e=>({value:String(e.id),label:e.name}))),[C,w]=(0,element_1.useState)(!1),E=y.map((e=>({parent:l&&e.parent&&e.parent>0?String(e.parent):void 0,label:e.name,value:String(e.id)})));return(0,element_1.createElement)("div",{...o},(0,element_1.createElement)(element_1.Fragment,null,(0,element_1.createElement)(components_1.__experimentalSelectTreeControl,{id:(0,compose_1.useInstanceId)(components_1.__experimentalSelectTreeControl,"woocommerce-taxonomy-select"),label:(0,element_1.createElement)(label_1.Label,{label:r,tooltip:n}),isLoading:f,disabled:u,multiple:!0,createValue:d,onInputChange:g,placeholder:_,shouldNotRecursivelySelect:!0,shouldShowCreateButton:e=>!e||-1===E.findIndex((t=>t.label.toLowerCase()===e.toLowerCase())),onCreateNew:()=>w(!0),items:E,selected:T,onSelect:e=>{Array.isArray(e)?v([...e.map((e=>({id:+e.value,name:e.label,parent:+(e.parent||0)}))),...S||[]]):v([{id:+e.value,name:e.label,parent:+(e.parent||0)},...S||[]])},onRemove:e=>{Array.isArray(e)?v((S||[]).filter((t=>!e.find((e=>e.value===String(t.id)))))):v((S||[]).filter((t=>String(t.id)!==e.value)))},onClear:function(){v([])},isClearingAllowed:(S||[]).length>0}),C&&(0,element_1.createElement)(create_taxonomy_modal_1.CreateTaxonomyModal,{slug:i,hierarchical:l,title:m,dialogNameHelpText:c,parentTaxonomyText:p,onCancel:()=>w(!1),onCreate:e=>{w(!1),b(""),v([{id:e.id,name:e.name,parent:e.parent},...S||[]])},initialName:d})))}exports.Edit=Edit;