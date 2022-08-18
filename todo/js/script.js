(function(t){function e(e){for(var i,r,l=e[0],s=e[1],u=e[2],c=0,f=[];c<l.length;c++)r=l[c],Object.prototype.hasOwnProperty.call(o,r)&&o[r]&&f.push(o[r][0]),o[r]=0;for(i in s)Object.prototype.hasOwnProperty.call(s,i)&&(t[i]=s[i]);d&&d(e);while(f.length)f.shift()();return a.push.apply(a,u||[]),n()}function n(){for(var t,e=0;e<a.length;e++){for(var n=a[e],i=!0,l=1;l<n.length;l++){var s=n[l];0!==o[s]&&(i=!1)}i&&(a.splice(e--,1),t=r(r.s=n[0]))}return t}var i={},o={app:0},a=[];function r(e){if(i[e])return i[e].exports;var n=i[e]={i:e,l:!1,exports:{}};return t[e].call(n.exports,n,n.exports,r),n.l=!0,n.exports}r.m=t,r.c=i,r.d=function(t,e,n){r.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},r.r=function(t){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},r.t=function(t,e){if(1&e&&(t=r(t)),8&e)return t;if(4&e&&"object"===typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var i in t)r.d(n,i,function(e){return t[e]}.bind(null,i));return n},r.n=function(t){var e=t&&t.__esModule?function(){return t["default"]}:function(){return t};return r.d(e,"a",e),e},r.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},r.p="/";var l=window["webpackJsonp"]=window["webpackJsonp"]||[],s=l.push.bind(l);l.push=e,l=l.slice();for(var u=0;u<l.length;u++)e(l[u]);var d=s;a.push([0,"chunk-vendors"]),n()})({0:function(t,e,n){t.exports=n("56d7")},"034f":function(t,e,n){"use strict";var i=n("85ec"),o=n.n(i);o.a},"24c9":function(t,e,n){},"56d7":function(t,e,n){"use strict";n.r(e);n("e260"),n("e6cf"),n("cca6"),n("a79d");var i=n("2b0e"),o=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{attrs:{id:"app"}},[n("h1",[t._v("To-Do List")]),n("to-do-form",{on:{"todo-added":t.addToDo}}),n("h2",{ref:"listSummary",attrs:{id:"list-summary",tabindex:"-1"}},[t._v(t._s(t.listSummary))]),n("ul",{staticClass:"stack-large",attrs:{"aria-labelledby":"list-summary"}},t._l(t.ToDoItems,(function(e){return n("li",{key:e.id},[n("to-do-item",{attrs:{label:e.label,done:e.done,id:e.id},on:{"checkbox-changed":function(n){return t.updateDoneStatus(e.id)},"item-deleted":function(n){return t.deleteToDo(e.id)},"item-edited":function(n){return t.editToDo(e.id,n)}}})],1)})),0)],1)},a=[],r=(n("99af"),n("4de4"),n("7db0"),n("c740"),n("a434"),function(){var t=this,e=t.$createElement,n=t._self._c||e;return t.isEditing?n("to-do-item-edit-form",{attrs:{id:t.id,label:t.label},on:{"item-edited":t.itemEdited,"edit-cancelled":t.editCancelled}}):n("div",{staticClass:"stack-small"},[n("div",{staticClass:"custom-checkbox"},[n("input",{staticClass:"checkbox",attrs:{type:"checkbox",id:t.id},domProps:{checked:t.isDone},on:{change:function(e){return t.$emit("checkbox-changed")}}}),n("label",{staticClass:"checkbox-label",attrs:{for:t.id}},[t._v(t._s(t.label))])]),n("div",{staticClass:"btn-group"},[n("button",{ref:"editButton",staticClass:"btn",attrs:{type:"button"},on:{click:t.toggleToItemEditForm}},[t._v(" Edit "),n("span",{staticClass:"visually-hidden"},[t._v(t._s(t.label))])]),n("button",{staticClass:"btn btn__danger",attrs:{type:"button"},on:{click:t.deleteToDo}},[t._v(" Delete "),n("span",{staticClass:"visually-hidden"},[t._v(t._s(t.label))])])])])}),l=[],s=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("form",{staticClass:"stack-small",on:{submit:function(e){return e.preventDefault(),t.onSubmit(e)}}},[n("div",[n("label",{staticClass:"edit-label"},[t._v('Edit Name for "'+t._s(t.label)+'"')]),n("input",{directives:[{name:"model",rawName:"v-model.lazy.trim",value:t.newLabel,expression:"newLabel",modifiers:{lazy:!0,trim:!0}}],ref:"labelInput",attrs:{id:t.id,type:"text",autocomplete:"off"},domProps:{value:t.newLabel},on:{change:function(e){t.newLabel=e.target.value.trim()},blur:function(e){return t.$forceUpdate()}}})]),n("div",{staticClass:"btn-group"},[n("button",{staticClass:"btn",attrs:{type:"button"},on:{click:t.onCancel}},[t._v(" Cancel "),n("span",{staticClass:"visually-hidden"},[t._v("editing "+t._s(t.label))])]),n("button",{staticClass:"btn btn__primary",attrs:{type:"submit"}},[t._v(" Save "),n("span",{staticClass:"visually-hidden"},[t._v("edit for "+t._s(t.label))])])])])},u=[],d={props:{label:{type:String,required:!0},id:{type:String,required:!0}},data:function(){return{newLabel:this.label}},methods:{onSubmit:function(){this.newLabel&&this.newLabel!==this.label&&this.$emit("item-edited",this.newLabel)},onCancel:function(){this.$emit("edit-cancelled")}},mounted:function(){var t=this.$refs.labelInput;t.focus()}},c=d,f=(n("876d"),n("2877")),b=Object(f["a"])(c,s,u,!1,null,"22014d60",null),m=b.exports,p={components:{ToDoItemEditForm:m},props:{label:{required:!0,type:String},done:{default:!1,type:Boolean},id:{required:!0,type:String}},data:function(){return{isEditing:!1}},computed:{isDone:function(){return this.done}},methods:{deleteToDo:function(){this.$emit("item-deleted")},toggleToItemEditForm:function(){console.log(this.$refs.editButton),this.isEditing=!0},itemEdited:function(t){this.$emit("item-edited",t),this.isEditing=!1,this.focusOnEditButton()},editCancelled:function(){this.isEditing=!1,this.focusOnEditButton()},focusOnEditButton:function(){var t=this;this.$nextTick((function(){var e=t.$refs.editButton;e.focus()}))}}},h=p,v=(n("f369"),Object(f["a"])(h,r,l,!1,null,"088c29ae",null)),_=v.exports,y=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("form",{on:{submit:function(e){return e.preventDefault(),t.onSubmit(e)}}},[t._m(0),n("input",{directives:[{name:"model",rawName:"v-model.lazy.trim",value:t.label,expression:"label",modifiers:{lazy:!0,trim:!0}}],staticClass:"input__lg",attrs:{type:"text",id:"new-todo-input",name:"new-todo",autocomplete:"off"},domProps:{value:t.label},on:{change:function(e){t.label=e.target.value.trim()},blur:function(e){return t.$forceUpdate()}}}),n("button",{staticClass:"btn btn__primary btn__lg",attrs:{type:"submit"}},[t._v(" Add ")])])},g=[function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("h2",{staticClass:"label-wrapper"},[n("label",{staticClass:"label__lg",attrs:{for:"new-todo-input"}},[t._v(" What needs to be done? ")])])}],C={methods:{onSubmit:function(){""!==this.label&&(this.$emit("todo-added",this.label),this.label="")}},data:function(){return{label:""}}},D=C,T=Object(f["a"])(D,y,g,!1,null,null,null),w=T.exports,x=n("f5cb"),E=n.n(x),S={name:"app",components:{ToDoItem:_,ToDoForm:w},data:function(){return{ToDoItems:[{id:E()("todo-"),label:"Learn Vue",done:!1},{id:E()("todo-"),label:"Create a Vue project with the CLI",done:!0},{id:E()("todo-"),label:"Have fun",done:!0},{id:E()("todo-"),label:"Create a to-do list",done:!1}]}},methods:{addToDo:function(t){this.ToDoItems.push({id:E()("todo-"),label:t,done:!1})},updateDoneStatus:function(t){var e=this.ToDoItems.find((function(e){return e.id===t}));e.done=!e.done},deleteToDo:function(t){var e=this.ToDoItems.findIndex((function(e){return e.id===t}));this.ToDoItems.splice(e,1),this.$refs.listSummary.focus()},editToDo:function(t,e){var n=this.ToDoItems.find((function(e){return e.id===t}));n.label=e}},computed:{listSummary:function(){var t=this.ToDoItems.filter((function(t){return t.done})).length;return"".concat(t," out of ").concat(this.ToDoItems.length," items completed")}}},$=S,k=(n("034f"),Object(f["a"])($,o,a,!1,null,null,null)),O=k.exports;n("b059");i["a"].config.productionTip=!1,new i["a"]({render:function(t){return t(O)}}).$mount("#app")},"85ec":function(t,e,n){},"876d":function(t,e,n){"use strict";var i=n("24c9"),o=n.n(i);o.a},b059:function(t,e,n){},dac9:function(t,e,n){},f369:function(t,e,n){"use strict";var i=n("dac9"),o=n.n(i);o.a}});