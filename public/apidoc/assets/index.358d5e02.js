var e=Object.defineProperty,a=Object.defineProperties,r=Object.getOwnPropertyDescriptors,t=Object.getOwnPropertySymbols,o=Object.prototype.hasOwnProperty,s=Object.prototype.propertyIsEnumerable,n=(a,r,t)=>r in a?e(a,r,{enumerable:!0,configurable:!0,writable:!0,value:t}):a[r]=t;import{k as l,d,aS as i,m as p,o as c,s as m,t as g,H as y,x as u,aZ as b,c as f,b8 as O,z as v,aD as j,aW as k,aX as h}from"./index.122d1dde.js";import{M as w,a as D,S as P}from"./Skeleton.1e8f9381.js";const S={class:j(["md-detail"])},x={key:2,class:"md-content-wraper"},I={key:3,class:"md-anchor-wraper"},K=d((E=((e,a)=>{for(var r in a||(a={}))o.call(a,r)&&n(e,r,a[r]);if(t)for(var r of t(a))s.call(a,r)&&n(e,r,a[r]);return e})({},{name:"MdDetail"}),a(E,r({setup(e){const a=i(),r=p(),t=c({detail:"",title:"",loading:!1,error:{config:{},isAxiosError:!1,toJSON:()=>({}),name:"",message:""}});return(()=>{const e=a.query;t.loading=!0,k.getDocDetail({appKey:e.appKey?e.appKey:r.appKey,path:e.key,lang:e.lang?e.lang:r.lang}).then((a=>{t.title=decodeURIComponent(e.title),t.detail=a.data.content,t.loading=!1})).catch((e=>{t.loading=!1,h(e).then((a=>{!1===a&&(t.error=e)}))}))})(),(e,a)=>(m(),g("div",S,[t.loading?(m(),y(P,{key:0})):!t.loading&&(t.error.response&&200!=t.error.response.status||!t.error.response&&t.error.message)?(m(),y(u(b),{key:1,error:t.error},null,8,["error"])):(m(),g("div",x,[f(u(w),{md:t.detail},null,8,["md"])])),u(r).device==u(O).MOBILE||t.loading?v("",!0):(m(),g("div",I,[f(u(D),{md:t.detail},null,8,["md"])]))]))}}))));var E,M=l(K,[["__scopeId","data-v-8aa3270a"]]);export{M as default};
