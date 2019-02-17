"use strict"
define("wp-ember-plugin/app",["exports","wp-ember-plugin/resolver","ember-load-initializers","wp-ember-plugin/config/environment"],function(e,t,n,i){Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0
var r=Ember.Application.extend({modulePrefix:i.default.modulePrefix,podModulePrefix:i.default.podModulePrefix,Resolver:t.default});(0,n.default)(r,i.default.modulePrefix)
var a=r
e.default=a}),define("wp-ember-plugin/helpers/app-version",["exports","wp-ember-plugin/config/environment","ember-cli-app-version/utils/regexp"],function(e,t,n){function i(e){var i=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},r=t.default.APP.version,a=i.versionOnly||i.hideSha,l=i.shaOnly||i.hideVersion,o=null
return a&&(i.showExtended&&(o=r.match(n.versionExtendedRegExp)),o||(o=r.match(n.versionRegExp))),l&&(o=r.match(n.shaRegExp)),o?o[0]:r}Object.defineProperty(e,"__esModule",{value:!0}),e.appVersion=i,e.default=void 0
var r=Ember.Helper.helper(i)
e.default=r}),define("wp-ember-plugin/helpers/pluralize",["exports","ember-inflector/lib/helpers/pluralize"],function(e,t){Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0
var n=t.default
e.default=n}),define("wp-ember-plugin/helpers/singularize",["exports","ember-inflector/lib/helpers/singularize"],function(e,t){Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0
var n=t.default
e.default=n}),define("wp-ember-plugin/initializers/app-version",["exports","ember-cli-app-version/initializer-factory","wp-ember-plugin/config/environment"],function(e,t,n){var i,r
Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0,n.default.APP&&(i=n.default.APP.name,r=n.default.APP.version)
var a={name:"App Version",initialize:(0,t.default)(i,r)}
e.default=a}),define("wp-ember-plugin/initializers/container-debug-adapter",["exports","ember-resolver/resolvers/classic/container-debug-adapter"],function(e,t){Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0
var n={name:"container-debug-adapter",initialize:function(){var e=arguments[1]||arguments[0]
e.register("container-debug-adapter:main",t.default),e.inject("container-debug-adapter:main","namespace","application:main")}}
e.default=n}),define("wp-ember-plugin/initializers/ember-data",["exports","ember-data/setup-container","ember-data"],function(e,t,n){Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0
var i={name:"ember-data",initialize:t.default}
e.default=i}),define("wp-ember-plugin/initializers/export-application-global",["exports","wp-ember-plugin/config/environment"],function(e,t){function n(){var e=arguments[1]||arguments[0]
if(!1!==t.default.exportApplicationGlobal){var n
if("undefined"!=typeof window)n=window
else if("undefined"!=typeof global)n=global
else{if("undefined"==typeof self)return
n=self}var i,r=t.default.exportApplicationGlobal
i="string"==typeof r?r:Ember.String.classify(t.default.modulePrefix),n[i]||(n[i]=e,e.reopen({willDestroy:function(){this._super.apply(this,arguments),delete n[i]}}))}}Object.defineProperty(e,"__esModule",{value:!0}),e.initialize=n,e.default=void 0
var i={name:"export-application-global",initialize:n}
e.default=i}),define("wp-ember-plugin/instance-initializers/ember-data",["exports","ember-data/initialize-store-service"],function(e,t){Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0
var n={name:"ember-data",initialize:t.default}
e.default=n}),define("wp-ember-plugin/resolver",["exports","ember-resolver"],function(e,t){Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0
var n=t.default
e.default=n}),define("wp-ember-plugin/router",["exports","wp-ember-plugin/config/environment"],function(e,t){Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0
var n=Ember.Router.extend({location:t.default.locationType,rootURL:t.default.rootURL})
n.map(function(){this.route("about"),this.route("users")})
var i=n
e.default=i}),define("wp-ember-plugin/routes/about",["exports"],function(e){Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0
var t=Ember.Route.extend({})
e.default=t}),define("wp-ember-plugin/routes/users",["exports"],function(e){Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0
var t=Ember.Route.extend({model:function(){return[{name:"gilles",town:"Mons"},{name:"joelle",town:"Frameries"},{name:"Bernard",town:"Bruxelles"}]}})
e.default=t}),define("wp-ember-plugin/services/ajax",["exports","ember-ajax/services/ajax"],function(e,t){Object.defineProperty(e,"__esModule",{value:!0}),Object.defineProperty(e,"default",{enumerable:!0,get:function(){return t.default}})}),define("wp-ember-plugin/templates/about",["exports"],function(e){Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0
var t=Ember.HTMLBars.template({id:"QPK8vpsa",block:'{"symbols":[],"statements":[[7,"h1"],[9],[0,"ABout page"],[10],[0,"\\n"],[1,[21,"outlet"],false]],"hasEval":false}',meta:{moduleName:"wp-ember-plugin/templates/about.hbs"}})
e.default=t}),define("wp-ember-plugin/templates/application",["exports"],function(e){Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0
var t=Ember.HTMLBars.template({id:"4pZZeZnT",block:'{"symbols":[],"statements":[[7,"h1"],[9],[0,"bienvenue sur notre app de démon"],[10],[0,"\\n"],[1,[21,"outlet"],false]],"hasEval":false}',meta:{moduleName:"wp-ember-plugin/templates/application.hbs"}})
e.default=t}),define("wp-ember-plugin/templates/users",["exports"],function(e){Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0
var t=Ember.HTMLBars.template({id:"kaVvx19Q",block:'{"symbols":["user"],"statements":[[7,"h1"],[9],[0,"Users List"],[10],[0,"\\n"],[7,"ul"],[9],[0,"\\n"],[4,"each",[[23,["model"]]],null,{"statements":[[0,"    "],[7,"li"],[9],[1,[22,1,["name"]],false],[0," is born "],[1,[22,1,["town"]],false],[10],[0,"\\n"]],"parameters":[1]},null],[10],[0,"\\n\\n"],[1,[21,"outlet"],false]],"hasEval":false}',meta:{moduleName:"wp-ember-plugin/templates/users.hbs"}})
e.default=t}),define("wp-ember-plugin/config/environment",[],function(){try{var e="wp-ember-plugin/config/environment",t=document.querySelector('meta[name="'+e+'"]').getAttribute("content"),n={default:JSON.parse(unescape(t))}
return Object.defineProperty(n,"__esModule",{value:!0}),n}catch(i){throw new Error('Could not read config from meta tag with name "'+e+'".')}}),runningTests||require("wp-ember-plugin/app").default.create({name:"wp-ember-plugin",version:"0.0.0+80533764"})
