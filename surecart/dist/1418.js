"use strict";(self.webpackChunk_surecart_surecart=self.webpackChunk_surecart_surecart||[]).push([[1418],{4493:function(e,t,i){function r(){return"rtl"===document.dir}i.d(t,{i:function(){return r}})},1418:function(e,t,i){i.r(t),i.d(t,{sc_line_item:function(){return o}});var r=i(3029),c=i(2901),s=i(1346),a=i(4493),o=function(){return(0,c.A)((function e(t){(0,r.A)(this,e),(0,s.r)(this,t),this.price=void 0,this.currency=void 0,this.hasImageSlot=void 0,this.hasTitleSlot=void 0,this.hasDescriptionSlot=void 0,this.hasPriceSlot=void 0,this.hasPriceDescriptionSlot=void 0,this.hasCurrencySlot=void 0}),[{key:"componentWillLoad",value:function(){this.hasImageSlot=!!this.hostElement.querySelector('[slot="image"]'),this.hasTitleSlot=!!this.hostElement.querySelector('[slot="title"]'),this.hasDescriptionSlot=!!this.hostElement.querySelector('[slot="description"]'),this.hasPriceSlot=!!this.hostElement.querySelector('[slot="price"]'),this.hasPriceDescriptionSlot=!!this.hostElement.querySelector('[slot="price-description"]'),this.hasCurrencySlot=!!this.hostElement.querySelector('[slot="currency"]')}},{key:"render",value:function(){return(0,s.h)("div",{key:"81fbd87e15174d0e85c97a92e55003d175a36a1f",part:"base",class:{item:!0,"item--has-image":this.hasImageSlot,"item--has-title":this.hasTitleSlot,"item--has-description":this.hasDescriptionSlot,"item--has-price":this.hasPriceSlot,"item--has-price-description":this.hasPriceDescriptionSlot,"item--has-price-currency":this.hasCurrencySlot,"item--is-rtl":(0,a.i)()}},(0,s.h)("div",{key:"b87d1cb75340a9c6bc50e41409652b9b074e6a33",class:"item__image",part:"image"},(0,s.h)("slot",{key:"509f019750ddf01b906508b4f6c56daf6a115065",name:"image"})),(0,s.h)("div",{key:"4ab68f58591454a0d14406f8259dc31ac583885b",class:"item__text",part:"text"},(0,s.h)("div",{key:"61f98363f424d785ff63c06374862c14df4c743d",class:"item__title",part:"title"},(0,s.h)("slot",{key:"702a5ff5223a1ccc19e5d932eae5f8e28686cb70",name:"title"})),(0,s.h)("div",{key:"2343778a44d7af3de1ec74ea3a9bcd8795d9e102",class:"item__description",part:"description"},(0,s.h)("slot",{key:"85643c53086ff4f89cdbf09b518615a5c005aec2",name:"description"}))),(0,s.h)("div",{key:"0e6e9dc872092228a2a59509c0ee811f6c785dc5",class:"item__end",part:"price"},(0,s.h)("div",{key:"76847c2426d11eaf8209dc498a5015b6c53ca125",class:"item__price-currency",part:"currency"},(0,s.h)("slot",{key:"2fbbfa520a9ba5e0a2b9d6ccdf7eb440e1f04b76",name:"currency"})),(0,s.h)("div",{key:"5c56e81138a766dba8b66109a487e8b056e0a5c0",class:"item__price-text",part:"price-text"},(0,s.h)("div",{key:"113bba1653dab380f43104d8e064fb590d415f25",class:"item__price",part:"price"},(0,s.h)("slot",{key:"f0c644f4a2b01cc6b4f750d4cb9a0cfec095d7c4",name:"price"})),(0,s.h)("div",{key:"440b9e221c7dfb8a6b533f95617036ce28ae7b10",class:"item__price-description",part:"price-description"},(0,s.h)("slot",{key:"a81319dc1b6c80a9739b4207254a9f3b07acae25",name:"price-description"})))))}},{key:"hostElement",get:function(){return(0,s.a)(this)}}])}();o.style=":host{display:block;--mobile-size:380px;--price-size:var(--sc-font-size-medium);line-height:var(--sc-line-height-dense)}.item{display:grid;align-items:center;grid-template-columns:auto 1fr 1fr}@media screen and (min-width: var(--mobile-size)){.item{flex-wrap:no-wrap}}.item__title{color:var(--sc-line-item-title-color)}.item__price{color:var(--sc-input-label-color)}.item__title,.item__price{font-size:var(--sc-font-size-medium);font-weight:var(--sc-font-weight-semibold)}.item__description,.item__price-description{font-size:var(--sc-font-size-small);line-height:var(--sc-line-height-dense);color:var(--sc-input-label-color)}::slotted([slot=price-description]){margin-top:var(--sc-line-item-text-margin, 5px);color:var(--sc-input-label-color);text-decoration:none}.item__end{flex:1;display:flex;align-items:center;justify-content:flex-end;flex-wrap:wrap;align-self:flex-end;width:100%;margin-top:20px}@media screen and (min-width: 280px){.item__end{width:auto;text-align:right;margin-left:20px;margin-top:0}.item--is-rtl .item__end{margin-left:0;margin-right:20px}.item__price-text{text-align:right}}.item__price-currency{font-size:var(--sc-font-size-small);color:var(--sc-input-label-color);text-transform:var(--sc-currency-transform, uppercase);margin-right:8px}.item__text{flex:1}.item__price-description{display:-webkit-box}::slotted([slot=image]){margin-right:20px;width:50px;height:50px;object-fit:cover;border-radius:4px;border:1px solid var(--sc-color-gray-200);display:block;box-shadow:var(--sc-input-box-shadow)}::slotted([slot=price-description]){display:inline-block;width:100%;line-height:1}.item__price-layout{font-size:var(--sc-font-size-x-large);font-weight:var(--sc-font-weight-semibold);display:flex;align-items:center}.item__price{font-size:var(--price-size)}.item_currency{font-weight:var(--sc-font-weight-normal);font-size:var(--sc-font-size-xx-small);color:var(--sc-input-label-color);margin-right:var(--sc-spacing-small);text-transform:var(--sc-currency-text-transform, uppercase)}.item--is-rtl.item__description,.item--is-rtl.item__price-description{text-align:right}.item--is-rtl .item__text{text-align:right}@media screen and (min-width: 280px){.item--is-rtl .item__end{width:auto;text-align:left;margin-left:0;margin-top:0}.item--is-rtl .item__price-text{text-align:left}}"}}]);