import{o as onChange}from"./mutations-52c77df8.js";import{o as onChange$1,s as state}from"./watchers-7ddfd1b5.js";import{o as onChange$2,a as availableProcessors,b as availableManualPaymentMethods,c as availableMethodTypes}from"./getters-d8bafba5.js";const maybeUpdateProcessor=()=>{const a=[...availableProcessors().map((({processor_type:a})=>a)),...availableManualPaymentMethods().map((({id:a})=>a))];a.includes(state.id)||(state.id=(null==a?void 0:a.length)?null==a?void 0:a[0]:null)},maybeUpdateMethod=()=>{const a=(availableMethodTypes()||[]).map((({id:a})=>a));"mollie"===(null==state?void 0:state.id)?a.includes(state.method)||(state.method=(null==a?void 0:a.length)?null==a?void 0:a[0]:null):state.method=null};onChange("checkout",(()=>{maybeUpdateProcessor(),maybeUpdateMethod()})),onChange$1("id",(()=>maybeUpdateProcessor())),onChange$2("processors",(()=>maybeUpdateProcessor())),onChange$2("methods",(()=>maybeUpdateMethod()));