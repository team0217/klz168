(function(){var h={},mt={},c={id:"07ec70a2791fd661e9a2bab057e3b46a",dm:["huizhe.com"],js:"tongji.baidu.com/hm-web/js/",etrk:[],icon:'',ctrk:false,align:-1,nv:-1,vdur:1800000,age:31536000000,rec:0,rp:[],trust:0,vcard:0,qiao:0,lxb:0,conv:0,apps:''};var p=!0,q=null,s=!1;mt.g={};mt.g.xa=/msie (\d+\.\d+)/i.test(navigator.userAgent);mt.g.cookieEnabled=navigator.cookieEnabled;mt.g.javaEnabled=navigator.javaEnabled();mt.g.language=navigator.language||navigator.browserLanguage||navigator.systemLanguage||navigator.userLanguage||"";mt.g.ia=(window.screen.width||0)+"x"+(window.screen.height||0);mt.g.colorDepth=window.screen.colorDepth||0;mt.cookie={};
mt.cookie.set=function(a,f,g){var d;g.z&&(d=new Date,d.setTime(d.getTime()+g.z));document.cookie=a+"="+f+(g.domain?"; domain="+g.domain:"")+(g.path?"; path="+g.path:"")+(d?"; expires="+d.toGMTString():"")+(g.Ba?"; secure":"")};mt.cookie.get=function(a){return(a=RegExp("(^| )"+a+"=([^;]*)(;|$)").exec(document.cookie))?a[2]:q};mt.event={};mt.event.e=function(a,f,g){a.attachEvent?a.attachEvent("on"+f,function(d){g.call(a,d)}):a.addEventListener&&a.addEventListener(f,g,s)};
mt.event.preventDefault=function(a){a.preventDefault?a.preventDefault():a.returnValue=s};mt.m={};mt.m.parse=function(){return(new Function('return (" + source + ")'))()};
mt.m.stringify=function(){function a(a){/["\\\x00-\x1f]/.test(a)&&(a=a.replace(/["\\\x00-\x1f]/g,function(a){var d=g[a];if(d)return d;d=a.charCodeAt();return"\\u00"+Math.floor(d/16).toString(16)+(d%16).toString(16)}));return'"'+a+'"'}function f(a){return 10>a?"0"+a:a}var g={"\b":"\\b","\t":"\\t","\n":"\\n","\f":"\\f","\r":"\\r",'"':'\\"',"\\":"\\\\"};return function(d){switch(typeof d){case "undefined":return"undefined";case "number":return isFinite(d)?String(d):"null";case "string":return a(d);case "boolean":return String(d);
default:if(d===q)return"null";if(d instanceof Array){var g=["["],n=d.length,m,e,b;for(e=0;e<n;e++)switch(b=d[e],typeof b){case "undefined":case "function":case "unknown":break;default:m&&g.push(","),g.push(mt.m.stringify(b)),m=1}g.push("]");return g.join("")}if(d instanceof Date)return'"'+d.getFullYear()+"-"+f(d.getMonth()+1)+"-"+f(d.getDate())+"T"+f(d.getHours())+":"+f(d.getMinutes())+":"+f(d.getSeconds())+'"';m=["{"];e=mt.m.stringify;for(n in d)if(Object.prototype.hasOwnProperty.call(d,n))switch(b=
d[n],typeof b){case "undefined":case "unknown":case "function":break;default:g&&m.push(","),g=1,m.push(e(n)+":"+e(b))}m.push("}");return m.join("")}}}();mt.lang={};mt.lang.d=function(a,f){return"[object "+f+"]"==={}.toString.call(a)};mt.lang.ya=function(a){return mt.lang.d(a,"Number")&&isFinite(a)};mt.lang.Aa=function(a){return mt.lang.d(a,"String")};mt.localStorage={};
mt.localStorage.s=function(){if(!mt.localStorage.f)try{mt.localStorage.f=document.createElement("input"),mt.localStorage.f.type="hidden",mt.localStorage.f.style.display="none",mt.localStorage.f.addBehavior("#default#userData"),document.getElementsByTagName("head")[0].appendChild(mt.localStorage.f)}catch(a){return s}return p};
mt.localStorage.set=function(a,f,g){var d=new Date;d.setTime(d.getTime()+g||31536E6);try{window.localStorage?(f=d.getTime()+"|"+f,window.localStorage.setItem(a,f)):mt.localStorage.s()&&(mt.localStorage.f.expires=d.toUTCString(),mt.localStorage.f.load(document.location.hostname),mt.localStorage.f.setAttribute(a,f),mt.localStorage.f.save(document.location.hostname))}catch(k){}};
mt.localStorage.get=function(a){if(window.localStorage){if(a=window.localStorage.getItem(a)){var f=a.indexOf("|"),g=a.substring(0,f)-0;if(g&&g>(new Date).getTime())return a.substring(f+1)}}else if(mt.localStorage.s())try{return mt.localStorage.f.load(document.location.hostname),mt.localStorage.f.getAttribute(a)}catch(d){}return q};
mt.localStorage.remove=function(a){if(window.localStorage)window.localStorage.removeItem(a);else if(mt.localStorage.s())try{mt.localStorage.f.load(document.location.hostname),mt.localStorage.f.removeAttribute(a),mt.localStorage.f.save(document.location.hostname)}catch(f){}};mt.sessionStorage={};mt.sessionStorage.set=function(a,f){if(window.sessionStorage)try{window.sessionStorage.setItem(a,f)}catch(g){}};
mt.sessionStorage.get=function(a){return window.sessionStorage?window.sessionStorage.getItem(a):q};mt.sessionStorage.remove=function(a){window.sessionStorage&&window.sessionStorage.removeItem(a)};mt.G={};mt.G.log=function(a,f){var g=new Image,d="mini_tangram_log_"+Math.floor(2147483648*Math.random()).toString(36);window[d]=g;g.onload=g.onerror=g.onabort=function(){g.onload=g.onerror=g.onabort=q;g=window[d]=q;f&&f(a)};g.src=a};mt.H={};
mt.H.ba=function(){var a="";if(navigator.plugins&&navigator.mimeTypes.length){var f=navigator.plugins["Shockwave Flash"];f&&f.description&&(a=f.description.replace(/^.*\s+(\S+)\s+\S+$/,"$1"))}else if(window.ActiveXObject)try{if(f=new ActiveXObject("ShockwaveFlash.ShockwaveFlash"))(a=f.GetVariable("$version"))&&(a=a.replace(/^.*\s+(\d+),(\d+).*$/,"$1.$2"))}catch(g){}return a};
mt.H.ta=function(a,f,g,d,k){return'<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="'+a+'" width="'+g+'" height="'+d+'"><param name="movie" value="'+f+'" /><param name="flashvars" value="'+(k||"")+'" /><param name="allowscriptaccess" value="always" /><embed type="application/x-shockwave-flash" name="'+a+'" width="'+g+'" height="'+d+'" src="'+f+'" flashvars="'+(k||"")+'" allowscriptaccess="always" /></object>'};mt.url={};
mt.url.k=function(a,f){var g=a.match(RegExp("(^|&|\\?|#)("+f+")=([^&#]*)(&|$|#)",""));return g?g[3]:q};mt.url.va=function(a){return(a=a.match(/^(https?:)\/\//))?a[1]:q};mt.url.Z=function(a){return(a=a.match(/^(https?:\/\/)?([^\/\?#]*)/))?a[2].replace(/.*@/,""):q};mt.url.K=function(a){return(a=mt.url.Z(a))?a.replace(/:\d+$/,""):a};mt.url.ua=function(a){return(a=a.match(/^(https?:\/\/)?[^\/]*(.*)/))?a[2].replace(/[\?#].*/,"").replace(/^$/,"/"):q};
h.I={wa:"http://tongji.baidu.com/hm-web/welcome/ico",P:"hm.baidu.com/hm.gif",S:"baidu.com",ea:"hmmd",fa:"hmpl",da:"hmkw",ca:"hmci",ga:"hmsr",l:0,h:Math.round(+new Date/1E3),protocol:"https:"==document.location.protocol?"https:":"http:",za:0,qa:6E5,ra:10,sa:1024,pa:1,q:2147483647,Q:"cc cf ci ck cl cm cp cw ds ep et fl ja ln lo lt nv rnd si st su v cv lv api tt u".split(" ")};
(function(){var a={i:{},e:function(a,g){this.i[a]=this.i[a]||[];this.i[a].push(g)},o:function(a,g){this.i[a]=this.i[a]||[];for(var d=this.i[a].length,k=0;k<d;k++)this.i[a][k](g)}};return h.w=a})();
(function(){function a(a,d){var k=document.createElement("script");k.charset="utf-8";f.d(d,"Function")&&(k.readyState?k.onreadystatechange=function(){if("loaded"===k.readyState||"complete"===k.readyState)k.onreadystatechange=q,d()}:k.onload=function(){d()});k.src=a;var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(k,n)}var f=mt.lang;return h.load=a})();
(function(){function a(){return function(){h.b.a.nv=0;h.b.a.st=4;h.b.a.et=3;h.b.a.ep=h.t.$()+","+h.t.Y();h.b.j()}}function f(){clearTimeout(x);var a;v&&(a="visible"==document[v]);y&&(a=!document[y]);e="undefined"==typeof a?p:a;if((!m||!b)&&e&&l)w=p,t=+new Date;else if(m&&b&&(!e||!l))w=s,r+=+new Date-t;m=e;b=l;x=setTimeout(f,100)}function g(b){var a=document,e="";if(b in a)e=b;else for(var t=["webkit","ms","moz","o"],r=0;r<t.length;r++){var l=t[r]+b.charAt(0).toUpperCase()+b.slice(1);if(l in a){e=
l;break}}return e}function d(b){if(!("focus"==b.type||"blur"==b.type)||!(b.target&&b.target!=window))l="focus"==b.type||"focusin"==b.type?p:s,f()}var k=mt.event,n=h.w,m=p,e=p,b=p,l=p,u=+new Date,t=u,r=0,w=p,v=g("visibilityState"),y=g("hidden"),x;f();(function(){var b=v.replace(/[vV]isibilityState/,"visibilitychange");k.e(document,b,f);k.e(window,"pageshow",f);k.e(window,"pagehide",f);"object"==typeof document.onfocusin?(k.e(document,"focusin",d),k.e(document,"focusout",d)):(k.e(window,"focus",d),
k.e(window,"blur",d))})();h.t={$:function(){return+new Date-u},Y:function(){return w?+new Date-t+r:r}};n.e("pv-b",function(){k.e(window,"unload",a())});return h.t})();
(function(){function a(b){for(var e in b)if({}.hasOwnProperty.call(b,e)){var f=b[e];d.d(f,"Object")||d.d(f,"Array")?a(f):b[e]=String(f)}}function f(b){return b.replace?b.replace(/'/g,"'0").replace(/\*/g,"'1").replace(/!/g,"'2"):b}var g=mt.G,d=mt.lang,k=mt.m,n=h.I,m=h.w,e={L:q,n:[],r:0,M:s,init:function(){e.c=0;e.L={push:function(){e.D.apply(e,arguments)}};m.e("pv-b",function(){e.V();e.W()});m.e("pv-d",e.X);m.e("stag-b",function(){h.b.a.api=e.c||e.r?e.c+"_"+e.r:""});m.e("stag-d",function(){h.b.a.api=
0;e.c=0;e.r=0})},V:function(){var b=window._hmt;if(b&&b.length)for(var a=0;a<b.length;a++){var d=b[a];switch(d[0]){case "_setAccount":1<d.length&&/^[0-9a-z]{32}$/.test(d[1])&&(e.c|=1,window._bdhm_account=d[1]);break;case "_setAutoPageview":if(1<d.length&&(d=d[1],s===d||p===d))e.c|=2,window._bdhm_autoPageview=d}}},W:function(){if("undefined"===typeof window._bdhm_account||window._bdhm_account===c.id){window._bdhm_account=c.id;var b=window._hmt;if(b&&b.length)for(var a=0,f=b.length;a<f;a++)d.d(b[a],
"Array")&&"_trackEvent"!==b[a][0]&&"_trackRTEvent"!==b[a][0]?e.D(b[a]):e.n.push(b[a]);window._hmt=e.L}},X:function(){if(0<e.n.length)for(var b=0,a=e.n.length;b<a;b++)e.D(e.n[b]);e.n=q},D:function(b){if(d.d(b,"Array")){var a=b[0];if(e.hasOwnProperty(a)&&d.d(e[a],"Function"))e[a](b)}},_trackPageview:function(b){if(1<b.length&&b[1].charAt&&"/"==b[1].charAt(0)){e.c|=4;h.b.a.et=0;h.b.a.ep="";h.b.B?(h.b.a.nv=0,h.b.a.st=4):h.b.B=p;var a=h.b.a.u,d=h.b.a.su;h.b.a.u=n.protocol+"//"+document.location.host+b[1];
e.M||(h.b.a.su=document.location.href);h.b.j();h.b.a.u=a;h.b.a.su=d}},_trackEvent:function(b){2<b.length&&(e.c|=8,h.b.a.nv=0,h.b.a.st=4,h.b.a.et=4,h.b.a.ep=f(b[1])+"*"+f(b[2])+(b[3]?"*"+f(b[3]):"")+(b[4]?"*"+f(b[4]):""),h.b.j())},_setCustomVar:function(b){if(!(4>b.length)){var a=b[1],d=b[4]||3;if(0<a&&6>a&&0<d&&4>d){e.r++;for(var t=(h.b.a.cv||"*").split("!"),r=t.length;r<a-1;r++)t.push("*");t[a-1]=d+"*"+f(b[2])+"*"+f(b[3]);h.b.a.cv=t.join("!");b=h.b.a.cv.replace(/[^1](\*[^!]*){2}/g,"*").replace(/((^|!)\*)+$/g,
"");""!==b?h.b.setData("Hm_cv_"+c.id,encodeURIComponent(b),c.age):h.b.ha("Hm_cv_"+c.id)}}},_setReferrerOverride:function(b){1<b.length&&(h.b.a.su=b[1].charAt&&"/"==b[1].charAt(0)?n.protocol+"//"+window.location.host+b[1]:b[1],e.M=p)},_trackOrder:function(b){b=b[1];d.d(b,"Object")&&(a(b),e.c|=16,h.b.a.nv=0,h.b.a.st=4,h.b.a.et=94,h.b.a.ep=k.stringify(b),h.b.j())},_trackMobConv:function(b){if(b={webim:1,tel:2,map:3,sms:4,callback:5,share:6}[b[1]])e.c|=32,h.b.a.et=93,h.b.a.ep=b,h.b.j()},_trackRTPageview:function(b){b=
b[1];d.d(b,"Object")&&(a(b),b=k.stringify(b),512>=encodeURIComponent(b).length&&(e.c|=64,h.b.a.rt=b))},_trackRTEvent:function(b){b=b[1];if(d.d(b,"Object")){a(b);b=encodeURIComponent(k.stringify(b));var f=function(b){var a=h.b.a.rt;e.c|=128;h.b.a.et=90;h.b.a.rt=b;h.b.j();h.b.a.rt=a},g=b.length;if(900>=g)f.call(this,b);else for(var g=Math.ceil(g/900),t="block|"+Math.round(Math.random()*n.q).toString(16)+"|"+g+"|",r=[],m=0;m<g;m++)r.push(m),r.push(b.substring(900*m,900*m+900)),f.call(this,t+r.join("|")),
r=[]}},_setUserId:function(b){b=b[1];if(d.d(b,"String")||d.d(b,"Number")){var a=h.b.A(),f="hm-"+h.b.a.v;e.O=e.O||Math.round(Math.random()*n.q);g.log("//datax.baidu.com/x.gif?si="+c.id+"&dm="+encodeURIComponent(a)+"&ac="+encodeURIComponent(b)+"&v="+f+"&li="+e.O+"&rnd="+Math.round(Math.random()*n.q))}}};e.init();h.T=e;return h.T})();
(function(){function a(){"undefined"==typeof window["_bdhm_loaded_"+c.id]&&(window["_bdhm_loaded_"+c.id]=p,this.a={},this.B=s,this.init())}var f=mt.url,g=mt.G,d=mt.H,k=mt.lang,n=mt.cookie,m=mt.g,e=mt.localStorage,b=mt.sessionStorage,l=h.I,u=h.w;a.prototype={C:function(a,b){a="."+a.replace(/:\d+/,"");b="."+b.replace(/:\d+/,"");var e=a.indexOf(b);return-1<e&&e+b.length==a.length},N:function(a,b){a=a.replace(/^https?:\/\//,"");return 0===a.indexOf(b)},p:function(a){for(var b=0;b<c.dm.length;b++)if(-1<
c.dm[b].indexOf("/")){if(this.N(a,c.dm[b]))return p}else{var e=f.K(a);if(e&&this.C(e,c.dm[b]))return p}return s},A:function(){for(var a=document.location.hostname,b=0,e=c.dm.length;b<e;b++)if(this.C(a,c.dm[b]))return c.dm[b].replace(/(:\d+)?[\/\?#].*/,"");return a},J:function(){for(var b=0,a=c.dm.length;b<a;b++){var e=c.dm[b];if(-1<e.indexOf("/")&&this.N(document.location.href,e))return e.replace(/^[^\/]+(\/.*)/,"$1")+"/"}return"/"},aa:function(){if(!document.referrer)return l.h-l.l>c.vdur?1:4;var b=
s;this.p(document.referrer)&&this.p(document.location.href)?b=p:(b=f.K(document.referrer),b=this.C(b||"",document.location.hostname));return b?l.h-l.l>c.vdur?1:4:3},getData:function(a){try{return n.get(a)||b.get(a)||e.get(a)}catch(d){}},setData:function(a,d,f){try{n.set(a,d,{domain:this.A(),path:this.J(),z:f}),f?e.set(a,d,f):b.set(a,d)}catch(g){}},ha:function(a){try{n.set(a,"",{domain:this.A(),path:this.J(),z:-1}),b.remove(a),e.remove(a)}catch(d){}},na:function(){var a,b,e,d,f;l.l=this.getData("Hm_lpvt_"+
c.id)||0;13==l.l.length&&(l.l=Math.round(l.l/1E3));b=this.aa();a=4!=b?1:0;if(e=this.getData("Hm_lvt_"+c.id)){d=e.split(",");for(f=d.length-1;0<=f;f--)13==d[f].length&&(d[f]=""+Math.round(d[f]/1E3));for(;2592E3<l.h-d[0];)d.shift();f=4>d.length?2:3;for(1===a&&d.push(l.h);4<d.length;)d.shift();e=d.join(",");d=d[d.length-1]}else e=l.h,d="",f=1;this.setData("Hm_lvt_"+c.id,e,c.age);this.setData("Hm_lpvt_"+c.id,l.h);e=l.h==this.getData("Hm_lpvt_"+c.id)?"1":"0";if(0===c.nv&&this.p(document.location.href)&&
(""===document.referrer||this.p(document.referrer)))a=0,b=4;this.a.nv=a;this.a.st=b;this.a.cc=e;this.a.lt=d;this.a.lv=f},ma:function(){for(var a=[],b=0,d=l.Q.length;b<d;b++){var e=l.Q[b],f=this.a[e];"undefined"!=typeof f&&""!==f&&a.push(e+"="+encodeURIComponent(f))}b=this.a.et;this.a.rt&&(0===b?a.push("rt="+encodeURIComponent(this.a.rt)):90===b&&a.push("rt="+this.a.rt));return a.join("&")},oa:function(){this.na();this.a.si=c.id;this.a.su=document.referrer;this.a.ds=m.ia;this.a.cl=m.colorDepth+"-bit";
this.a.ln=m.language;this.a.ja=m.javaEnabled?1:0;this.a.ck=m.cookieEnabled?1:0;this.a.lo="number"==typeof _bdhm_top?1:0;this.a.fl=d.ba();this.a.v="1.0.77";this.a.cv=decodeURIComponent(this.getData("Hm_cv_"+c.id)||"");1==this.a.nv&&(this.a.tt=document.title||"");var a=document.location.href;this.a.cm=f.k(a,l.ea)||"";this.a.cp=f.k(a,l.fa)||"";this.a.cw=f.k(a,l.da)||"";this.a.ci=f.k(a,l.ca)||"";this.a.cf=f.k(a,l.ga)||""},init:function(){try{this.oa(),0===this.a.nv?this.la():this.F(".*"),h.b=this,this.U(),
u.o("pv-b"),this.ka()}catch(a){var b=[];b.push("si="+c.id);b.push("n="+encodeURIComponent(a.name));b.push("m="+encodeURIComponent(a.message));b.push("r="+encodeURIComponent(document.referrer));g.log(l.protocol+"//"+l.P+"?"+b.join("&"))}},ka:function(){function a(){u.o("pv-d")}"undefined"===typeof window._bdhm_autoPageview||window._bdhm_autoPageview===p?(this.B=p,this.a.et=0,this.a.ep="",this.j(a)):a()},j:function(a){var b=this;b.a.rnd=Math.round(Math.random()*l.q);u.o("stag-b");var d=l.protocol+"//"+
l.P+"?"+b.ma();u.o("stag-d");b.R(d);g.log(d,function(d){b.F(d);k.d(a,"Function")&&a.call(b)})},U:function(){var a=document.location.hash.substring(1),b=RegExp(c.id),d=-1<document.referrer.indexOf(l.S)?p:s,e=f.k(a,"jn"),g=/^heatlink$|^select$/.test(e);a&&(b.test(a)&&d&&g)&&(a=document.createElement("script"),a.setAttribute("type","text/javascript"),a.setAttribute("charset","utf-8"),a.setAttribute("src",l.protocol+"//"+c.js+e+".js?"+this.a.rnd),e=document.getElementsByTagName("script")[0],e.parentNode.insertBefore(a,
e))},R:function(a){var d=b.get("Hm_unsent_"+c.id)||"",e=this.a.u?"":"&u="+encodeURIComponent(document.location.href),d=encodeURIComponent(a.replace(/^https?:\/\//,"")+e)+(d?","+d:"");b.set("Hm_unsent_"+c.id,d)},F:function(a){var d=b.get("Hm_unsent_"+c.id)||"";d&&((d=d.replace(RegExp(encodeURIComponent(a.replace(/^https?:\/\//,"")).replace(/([\*\(\)])/g,"\\$1")+"(%26u%3D[^,]*)?,?","g"),"").replace(/,$/,""))?b.set("Hm_unsent_"+c.id,d):b.remove("Hm_unsent_"+c.id))},la:function(){var a=this,d=b.get("Hm_unsent_"+
c.id);if(d)for(var d=d.split(","),e=function(b){g.log(l.protocol+"//"+decodeURIComponent(b).replace(/^https?:\/\//,""),function(b){a.F(b)})},f=0,m=d.length;f<m;f++)e(d[f])}};return new a})();
(function(){if("378f3aa9b8779062c8de4dc247dd8874"===c.id){var a={click:function(){for(var a=[],d=[].slice.call(document.getElementsByTagName("a")),d=[].concat.apply(d,document.getElementsByTagName("area")),b=/openZoosUrl\(/,f=0,g=d.length;f<g;f++)b.test(d[f].getAttribute("onclick"))&&a.push(d[f]);return a}},f=function(a,d){for(var b in a)if(a.hasOwnProperty(b)&&d.call(a,b,a[b])===s)return s},g=function(a,d){return Object.prototype.toString.call(a)==="[object "+d+"]"};window._hmt=window._hmt||[];var d,
k="/zoosnet"+(/\/$/.test("/zoosnet")?"":"/"),n=function(a,e){if(d===e){window._hmt.push(["_trackPageview",k+a]);for(var b=+new Date;500>=+new Date-b;);return s}if(g(e,"Array")||g(e,"NodeList"))for(var b=0,f=e.length;b<f;b++)if(d===e[b]){window._hmt.push(["_trackPageview",k+a+"/"+(b+1)]);for(b=+new Date;500>=+new Date-b;);return s}};(function(a,d,b){a.addEventListener?a.addEventListener(d,b,p):a.attachEvent&&a.attachEvent("on"+d,b)})(document,"click",function(k){k=k||window.event;d=k.target||k.srcElement;
var e={};for(f(a,function(a,d){e[a]=g(d,"Function")?d():document.getElementById(d)});d&&d!==document&&f(e,n)!==s;)d=d.parentNode})}})();})();
