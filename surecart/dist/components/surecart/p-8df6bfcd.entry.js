import{r as s,c as t}from"./p-cc7ce8c7.js";const i=class{constructor(i){s(this,i);this.mountEmitter=t(this,"mountConsumer",7);this.setContext=async s=>{this.context=s;return this.promise};this.renderer=undefined;this.context=undefined;this.promise=undefined;this.resolvePromise=undefined;this.promise=new Promise((s=>{this.resolvePromise=s}))}componentWillLoad(){this.mountEmitter.emit(this.setContext)}disconnectedCallback(){this.resolvePromise()}render(){if(!this.context){return null}return this.renderer(this.context)}};export{i as sc_consumer};
//# sourceMappingURL=p-8df6bfcd.entry.js.map