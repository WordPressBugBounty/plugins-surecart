import*as e from"@wordpress/interactivity";var t,r,o={d:function(e,t){for(var r in t)o.o(t,r)&&!o.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:t[r]})},o:function(e,t){return Object.prototype.hasOwnProperty.call(e,t)}},n=(t={getElement:function(){return e.getElement},store:function(){return e.store}},r={},o.d(r,t),r);const{state:a,actions:c}=(0,n.store)("surecart/checkout"),{__}=wp.i18n,{state:l,actions:s}=(0,n.store)("surecart/cart",{state:{get ariaLabel(){return l.label+" "+__("Review your cart.","surecart")},get dialog(){let e=document?.querySelector(".sc-cart-drawer")||null;if(!e){const{ref:t}=(0,n.getElement)();e=t.parentElement.querySelector("dialog")||t.closest("dialog")||null}if(e instanceof HTMLDialogElement!=0)return e}},actions:{open(){l.dialog?.showModal(),l.label=__("Cart opened.","surecart"),c.fetch(),s.processCartViewEvent(a?.checkout)},processCartViewEvent:function*(e){const{processCartViewEvent:t}=yield import("@surecart/checkout-events");t(a?.checkout)},close:()=>{l.dialog?.close(),l.label=__("Cart closed.","surecart")},toggle:e=>{e?.key&&" "!==e?.key&&"Enter"!==e?.key||(e?.preventDefault(),l?.dialog?.open?s.close():s.open())},closeOverlay:e=>{e.target===e.currentTarget&&e.currentTarget.close()}}});addEventListener("scToggleCart",s.toggle);