import{r as i,h as s,F as t}from"./p-e97fde0a.js";import{a as e}from"./p-6135d661.js";import{p as n,i as l}from"./p-6ec14893.js";import{a}from"./p-401e165e.js";import"./p-d3366af3.js";import"./p-3f6362a4.js";const o=(i,s)=>["BIF","BYR","CLP","DJF","GNF","ISK","JPY","KMF","KRW","PYG","RWF","UGX","VND","VUV","XAF","XAG","XAU","XBA","XBB","XBC","XBD","XDR","XOF","XPD","XPF","XPT","XTS"].includes(s?.toUpperCase())?i:i/100;const r=(i,s="")=>new Intl.NumberFormat([],{style:"currency",currency:s.toUpperCase(),currencyDisplay:"symbol"}).format(o(i,s.toUpperCase()));const d=":host{display:block}.subscription-details{display:grid;gap:0.25em;color:var(--sc-input-label-color)}.subscription-details__missing-method{display:flex;align-items:center;gap:var(--sc-spacing-x-small)}";const c=d;const u=class{constructor(s){i(this,s);this.subscription=undefined;this.pendingPrice=undefined;this.hideRenewalText=undefined;this.activationsModal=undefined;this.loading=undefined;this.hasPendingUpdate=undefined}renderName(){var i,s,t;if(typeof((s=(i=this.subscription)===null||i===void 0?void 0:i.price)===null||s===void 0?void 0:s.product)!=="string"){return n((t=this.subscription)===null||t===void 0?void 0:t.price)}return wp.i18n.__("Subscription","surecart")}async handleSubscriptionChange(){var i,s,t,e;this.hasPendingUpdate=!!((s=Object.keys(((i=this===null||this===void 0?void 0:this.subscription)===null||i===void 0?void 0:i.pending_update)||{}))===null||s===void 0?void 0:s.length);if(((e=(t=this===null||this===void 0?void 0:this.subscription)===null||t===void 0?void 0:t.pending_update)===null||e===void 0?void 0:e.price)&&!(this===null||this===void 0?void 0:this.pendingPrice)&&!this.hideRenewalText){this.pendingPrice=await this.fetchPrice(this.subscription.pending_update.price)}}componentWillLoad(){this.handleSubscriptionChange()}async fetchPrice(i){try{this.loading=true;const s=await e({path:a(`surecart/v1/prices/${i}`,{expand:["product"]})});return s}catch(i){console.error(i)}finally{this.loading=false}}renderRenewalText(){var i,t,e,n,a,o,d,c,u,v,h,p,f,w,b,y,g,m,k,x,X,Y,P;const _=s("sc-subscription-status-badge",{subscription:this===null||this===void 0?void 0:this.subscription});if(((i=this===null||this===void 0?void 0:this.subscription)===null||i===void 0?void 0:i.cancel_at_period_end)&&((t=this===null||this===void 0?void 0:this.subscription)===null||t===void 0?void 0:t.current_period_end_at)){return s("span",{"aria-label":wp.i18n.sprintf(wp.i18n.__("Renewal Update - Your plan will be canceled on %s","surecart"),this.subscription.current_period_end_at_date)},_," "," ",wp.i18n.sprintf(wp.i18n.__("Your plan will be canceled on %s","surecart"),this.subscription.current_period_end_at_date))}if(this.hasPendingUpdate){if(!this.pendingPrice&&!((n=(e=this.subscription)===null||e===void 0?void 0:e.pending_update)===null||n===void 0?void 0:n.ad_hoc_amount)){return s("sc-skeleton",null)}if((o=(a=this.subscription)===null||a===void 0?void 0:a.pending_update)===null||o===void 0?void 0:o.ad_hoc_amount){return s("span",{"aria-label":wp.i18n.sprintf(wp.i18n.__("Renewal Update - Your plan switches to %1s on %2s","surecart"),r((c=(d=this.subscription)===null||d===void 0?void 0:d.pending_update)===null||c===void 0?void 0:c.ad_hoc_amount,((u=this.pendingPrice)===null||u===void 0?void 0:u.currency)||((h=(v=this.subscription)===null||v===void 0?void 0:v.price)===null||h===void 0?void 0:h.currency)),this.subscription.current_period_end_at_date)},wp.i18n.__("Your plan switches to","surecart")," ",s("strong",null,s("sc-format-number",{type:"currency",currency:((p=this.pendingPrice)===null||p===void 0?void 0:p.currency)||((w=(f=this.subscription)===null||f===void 0?void 0:f.price)===null||w===void 0?void 0:w.currency),value:(y=(b=this.subscription)===null||b===void 0?void 0:b.pending_update)===null||y===void 0?void 0:y.ad_hoc_amount})," ",l(this.pendingPrice||((g=this.subscription)===null||g===void 0?void 0:g.price)))," ",wp.i18n.__("on","surecart")," ",this.subscription.current_period_end_at_date)}return s("span",{"aria-label":wp.i18n.sprintf(wp.i18n.__("Renewal Update - Your plan switches to %1s on %2s","surecart"),this.pendingPrice.product.name,this.subscription.current_period_end_at_date)},wp.i18n.__("Your plan switches to","surecart")," ",s("strong",null,this.pendingPrice.product.name)," ",wp.i18n.__("on","surecart")," ",this.subscription.current_period_end_at_date)}if(((m=this===null||this===void 0?void 0:this.subscription)===null||m===void 0?void 0:m.status)==="trialing"&&((k=this===null||this===void 0?void 0:this.subscription)===null||k===void 0?void 0:k.trial_end_at)){return s("span",{"aria-label":wp.i18n.sprintf(wp.i18n.__("Renewal Update - Your plan begins on %s.","surecart"),this.subscription.trial_end_at_date)},_," ",wp.i18n.sprintf(wp.i18n.__("Your plan begins on %s","surecart"),(x=this===null||this===void 0?void 0:this.subscription)===null||x===void 0?void 0:x.trial_end_at_date))}if(((X=this.subscription)===null||X===void 0?void 0:X.status)==="active"&&((Y=this.subscription)===null||Y===void 0?void 0:Y.current_period_end_at)){return s("span",{"aria-label":wp.i18n.sprintf(wp.i18n.__("Renewal Update - Your next payment is on %s","surecart"),this.subscription.current_period_end_at_date)},_," ",((P=this.subscription)===null||P===void 0?void 0:P.remaining_period_count)===null?wp.i18n.sprintf(wp.i18n.__("Your plan renews on %s","surecart"),this.subscription.current_period_end_at_date):wp.i18n.sprintf(wp.i18n.__("Your next payment is on %s","surecart"),this.subscription.current_period_end_at_date))}return _}getActivations(){var i,s,t,e;return(((e=(t=(s=(i=this.subscription)===null||i===void 0?void 0:i.purchase)===null||s===void 0?void 0:s.license)===null||t===void 0?void 0:t.activations)===null||e===void 0?void 0:e.data)||[]).filter((i=>i===null||i===void 0?void 0:i.counted))}renderActivations(){var i;const t=this.getActivations();if(!(t===null||t===void 0?void 0:t.length))return null;return s("sc-flex",{justifyContent:"flex-start",alignItems:"center"},s("sc-tag",{size:"small"},(i=t===null||t===void 0?void 0:t[0])===null||i===void 0?void 0:i.name),(t===null||t===void 0?void 0:t.length)>1&&s("sc-text",{style:{"--font-size":"var(--sc-font-size-small)",cursor:"pointer"},onClick:i=>{i.preventDefault();i.stopImmediatePropagation();this.activationsModal=true}},"+ ",(t===null||t===void 0?void 0:t.length)-1," More"))}showWarning(){var i,s,t,e,n,l,a;if(((i=this.subscription)===null||i===void 0?void 0:i.payment_method)||this.subscription.manual_payment){return false}if(!["active","past_due","unpaid","incomplete"].includes((s=this.subscription)===null||s===void 0?void 0:s.status)){return false}if((e=(t=this.subscription)===null||t===void 0?void 0:t.price)===null||e===void 0?void 0:e.ad_hoc){return((n=this.subscription)===null||n===void 0?void 0:n.ad_hoc_amount)!==0}return((a=(l=this.subscription)===null||l===void 0?void 0:l.price)===null||a===void 0?void 0:a.amount)!==0}render(){return s("div",{key:"cf831edde3bfc8a1216f87e2f78c2120ddfc9c08",class:"subscription-details"},this.hasPendingUpdate&&s("div",{key:"f952d4ff5d641ca852a9c5449846864c667ff204"},s("sc-tag",{key:"f30265be642e183135f2c7f7928003808220d9e6",size:"small",type:"warning"},wp.i18n.__("Update Scheduled","surecart"))),s("sc-flex",{key:"2cf3e8c6239499154a8f744e3c6a6956647fdf69",alignItems:"center",justifyContent:"flex-start"},s("sc-text",{key:"92343b43b2d3def03896baa1394deb669f0af456","aria-label":wp.i18n.sprintf(wp.i18n.__("Plan name - %s","surecart"),this.renderName()),style:{"--font-weight":"var(--sc-font-weight-bold)"}},this.renderName()),this.renderActivations()),!this.hideRenewalText&&s("div",{key:"9a9f3fb6c288780c5873f26326ff1b44a52a5424"},this.renderRenewalText()," "),s("slot",{key:"6a3a019c11d81476846c6ce50174472d180c8721"}),s("sc-dialog",{key:"0ab9ac467ad2d8700e5bc57b96770cf451aeb3e8",label:wp.i18n.__("Activations","surecart"),onScRequestClose:()=>this.activationsModal=false,open:!!this.activationsModal},s("sc-card",{key:"58ae6a0b6488e824cfc335502b3355032d360f33","no-padding":true,style:{"--overflow":"hidden"}},s("sc-stacked-list",{key:"a0e701f486f7e8e2644a63d4b2c973f7bcd2aef4"},(this.getActivations()||[]).map((i=>s("sc-stacked-list-row",{style:{"--columns":"2"},mobileSize:0},s("sc-text",{style:{"--line-height":"var(--sc-line-height-dense)"}},s("strong",null,i===null||i===void 0?void 0:i.name),s("div",null,s("sc-text",{style:{"--color":"var(--sc-color-gray-500)"}},i===null||i===void 0?void 0:i.fingerprint))),s("sc-text",{style:{"--color":"var(--sc-color-gray-500)"}},i===null||i===void 0?void 0:i.created_at_date))))))),this.showWarning()&&s("div",{key:"7cf0247ba10ccafb275090fd87e157ad9b0217a9"},s("sc-tag",{key:"c80722f8068e6ea7272ce8ab14a1c7c97471eb7e",type:"warning"},s("div",{key:"4ff3fdd5a010557ae0c53ed94c56957c0bd1d61e",class:"subscription-details__missing-method"},s("sc-icon",{key:"a7f3aa814c32a8fb325193de376d7ecd8c94e7f4",name:"alert-triangle"}),wp.i18n.__("Payment Method Missing","surecart")))))}static get watchers(){return{subscription:["handleSubscriptionChange"]}}};u.style=c;const v=":host{display:inline-block}";const h=v;const p=class{constructor(s){i(this,s);this.status=undefined;this.subscription=undefined;this.size="medium";this.pill=false;this.clearable=false}getType(){var i,s,t;if((i=this.subscription)===null||i===void 0?void 0:i.cancel_at_period_end){return"info"}switch(this.status||((s=this.subscription)===null||s===void 0?void 0:s.status)){case"incomplete":return"warning";case"trialing":return"info";case"active":return"success";case"completed":return"success";case"past_due":return"warning";case"canceled":if((t=this.subscription)===null||t===void 0?void 0:t.restore_at){return"info"}return"danger";case"unpaid":return"warning"}}getText(){var i,e,n,l,a;if(((i=this.subscription)===null||i===void 0?void 0:i.cancel_at_period_end)&&this.subscription.current_period_end_at&&((e=this.subscription)===null||e===void 0?void 0:e.status)!=="canceled"){return s(t,null,!!((n=this.subscription)===null||n===void 0?void 0:n.restore_at)?wp.i18n.__("Pauses","surecart"):wp.i18n.__("Cancels","surecart")," ",this.subscription.current_period_end_at_date)}switch(this.status||((l=this.subscription)===null||l===void 0?void 0:l.status)){case"incomplete":return wp.i18n.__("Incomplete","surecart");case"trialing":return wp.i18n.__("Trialing","surecart");case"active":return wp.i18n.__("Active","surecart");case"past_due":return wp.i18n.__("Past Due","surecart");case"canceled":if((a=this.subscription)===null||a===void 0?void 0:a.restore_at){return"Paused"}return wp.i18n.__("Canceled","surecart");case"completed":return wp.i18n.__("Completed","surecart");case"unpaid":return wp.i18n.__("Unpaid","surecart")}}render(){return s("sc-tag",{key:"1ac73efd661a9d997b52552ff94c963fed3fd962","aria-label":wp.i18n.sprintf(wp.i18n.__("Plan Status - %s","surecart"),this.getText()),type:this.getType()},this.getText())}};p.style=h;export{u as sc_subscription_details,p as sc_subscription_status_badge};
//# sourceMappingURL=p-558dbeda.entry.js.map