import{o}from"./p-021b5199.js";import{o as s,s as i}from"./p-fab02ef6.js";import{o as l,a as r,b as d,c as n}from"./p-6c2d07a0.js";const t=()=>{const o=[...r().map((({processor_type:o})=>o)),...d().map((({id:o})=>o))];o.includes(i.id)||(i.id=(null==o?void 0:o.length)?null==o?void 0:o[0]:null)},u=()=>{const o=(n()||[]).map((({id:o})=>o));"mollie"===(null==i?void 0:i.id)?o.includes(i.method)||(i.method=(null==o?void 0:o.length)?null==o?void 0:o[0]:null):i.method=null};o("checkout",(()=>{t(),u()})),s("id",(()=>t())),l("processors",(()=>t())),l("methods",(()=>u()));