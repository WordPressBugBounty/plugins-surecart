import{r as a,h as t}from"./p-e97fde0a.js";const e=":host{display:inline-block;--sc-avatar-size:3rem}.avatar{display:inline-flex;align-items:center;justify-content:center;position:relative;width:var(--sc-avatar-size);height:var(--sc-avatar-size);background-color:var(--sc-color-gray-400);font-family:var(--sc-font-sans);font-size:calc(var(--sc-avatar-size) * 0.5);font-weight:var(--sc-font-weight-normal);color:var(--sc-color-white);user-select:none;vertical-align:middle}.avatar--circle,.avatar--circle .avatar__image{border-radius:var(--sc-border-radius-circle)}.avatar--rounded,.avatar--rounded .avatar__image{border-radius:var(--sc-border-radius-medium)}.avatar--square{border-radius:0}.avatar__icon{display:flex;align-items:center;justify-content:center;position:absolute;top:0;left:0;width:100%;height:100%}.avatar__initials{line-height:1;text-transform:uppercase}.avatar__image{position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;overflow:hidden}";const r=e;const i=class{constructor(t){a(this,t);this.hasError=false;this.image="";this.label="";this.initials="";this.loading="eager";this.shape="circle"}handleImageChange(){this.hasError=false}render(){return t("div",{key:"7e8ebd8a9bb78091915ce19ca4db44c3d7a6ab8e",part:"base",class:{avatar:true,"avatar--circle":this.shape==="circle","avatar--rounded":this.shape==="rounded","avatar--square":this.shape==="square"},role:"img","aria-label":this.label},this.initials?t("div",{part:"initials",class:"avatar__initials"},this.initials):t("div",{part:"icon",class:"avatar__icon","aria-hidden":"true"},t("slot",{name:"icon"},t("sl-icon",{name:"person-fill",library:"system"}))),this.image&&!this.hasError&&t("img",{key:"c969f15e7c10758f80058bad810813b819445009",part:"image",class:"avatar__image",src:this.image,loading:this.loading,alt:"",onError:()=>this.hasError=true}))}static get watchers(){return{image:["handleImageChange"]}}};i.style=r;export{i as sc_avatar};
//# sourceMappingURL=p-34268666.entry.js.map