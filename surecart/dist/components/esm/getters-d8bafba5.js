import{s as sortByArray}from"./util-64ee5262.js";import{c as createStore}from"./index-1046c77e.js";import{g as getSerializedState}from"./utils-00526fde.js";import{s as state$1}from"./mutations-52c77df8.js";const{processors:processors}=getSerializedState(),{state:state,onChange:onChange,on:on,dispose:dispose}=createStore({processors:[],methods:[],manualPaymentMethods:[],disabled:{processors:[]},sortOrder:{processors:["stripe","paystack","paypal","mollie","mock"],manualPaymentMethods:[],paymentMethods:{mollie:["creditcard","paypal"]}},instances:{stripe:void 0},config:{stripe:{paymentElement:!1}},...processors},((e,s)=>JSON.stringify(e)!==JSON.stringify(s))),availableProcessors=()=>sortByArray(state.processors,"processor_type",state.sortOrder.processors).filter((e=>(null==e?void 0:e.live_mode)===("live"===(null==state$1?void 0:state$1.mode)))).filter((e=>!(state.disabled.processors||[]).includes(e.processor_type))).filter((e=>{var s;return!(null===(s=null==state$1?void 0:state$1.checkout)||void 0===s?void 0:s.reusable_payment_method_required)||!!(null==e?void 0:e.recurring_enabled)})).filter(((e,s,a)=>!a.some((e=>"mollie"===e.processor_type))||"mollie"===e.processor_type||"mock"===e.processor_type)),getProcessorByType=e=>availableProcessors().find((({processor_type:s})=>s===e)),getAvailableProcessor=e=>availableProcessors().find((({processor_type:s})=>s===e)),hasOtherAvailableCreditCardProcessor=e=>availableProcessors().some((({processor_type:s})=>s!==e&&"paypal"!==s&&"mock"!==s)),availableManualPaymentMethods=()=>sortByArray(state.manualPaymentMethods,"id",state.sortOrder.manualPaymentMethods).filter((e=>!(state.disabled.processors||[]).includes(null==e?void 0:e.id))).filter((e=>{var s;return!(null===(s=null==state$1?void 0:state$1.checkout)||void 0===s?void 0:s.reusable_payment_method_required)||!!(null==e?void 0:e.reusable)})),availableMethodTypes=()=>sortByArray(state.methods,"id",state.sortOrder.paymentMethods.mollie).filter((e=>{var s,a;return"applepay"!==e.id||(null===window||void 0===window?void 0:window.ApplePaySession)&&(null===(a=null===(s=null===window||void 0===window?void 0:window.ApplePaySession)||void 0===s?void 0:s.canMakePayments)||void 0===a?void 0:a.call(s))})),availableProcessorChoices=()=>[...availableProcessors(),...availableManualPaymentMethods()],hasMultipleProcessorChoices=()=>{var e;return(null===(e=[...availableProcessors(),...availableManualPaymentMethods()])||void 0===e?void 0:e.length)>1},availableMethodChoices=()=>[...availableMethodTypes(),...availableManualPaymentMethods(),getProcessorByType("mock")].filter(Boolean),hasMultipleMethodChoices=()=>{var e;return(null===(e=[...availableMethodTypes(),...availableManualPaymentMethods(),getProcessorByType("mock")].filter(Boolean))||void 0===e?void 0:e.length)>1};export{availableProcessors as a,availableManualPaymentMethods as b,availableMethodTypes as c,hasMultipleProcessorChoices as d,getAvailableProcessor as e,hasMultipleMethodChoices as f,getProcessorByType as g,hasOtherAvailableCreditCardProcessor as h,onChange as o,state as s};