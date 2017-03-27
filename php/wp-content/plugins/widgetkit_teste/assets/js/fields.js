!function(){function e(e,t){var i=jQuery.Deferred(),n=document.createElement("script");return n.async=!0,n.onload=function(){i.resolve(),t&&t(n)},n.onerror=function(){i.reject(e)},n.src=e,document.getElementsByTagName("head")[0].appendChild(n),i.promise()}angular.module("Fields",[]).directive("fieldMedia",["mediaPicker","mediaInfo",function(e,t){function i(i){var a=this;a.selectMedia=function(){e.select().then(function(e){i.media=e.url,i.height=e.height,i.width=e.width,i.title||(i.title=String(e.title).replace(/(-|_)/g," ").replace(/^([a-z\u00E0-\u00FC])|\s+([a-z\u00E0-\u00FC])/g,function(e){return e.toUpperCase()}))})},a.selectPoster=function(){e.select().then(function(e){i.options||(i.options={}),i.options.poster=e.url})},a.isVideo=function(e){return!(!e||!(e.match(/\.(mp4|ogv|webm)$/)||e.match(/(\/\/.*?)vimeo\.[a-z]+\/(?:\w*\/)*(\d+)/i)||e.match(/(\/\/.*?youtube\.[a-z]+)\/watch\?v=([^&]+)(.*)/i)||e.match(/(\/\/.*?youtu\.be)\/([^\?]+)(.*)/i)))},i.$watch("media",function(){return(!i.options||angular.isArray(i.options))&&(i.options={}),n[i.media]?(i.options.width=n[i.media].width,void(i.options.height=n[i.media].height)):void t(i.media,!0).then(function(e){i.height="",i.width="",e.type&&(i.options.width=e.width,i.options.height=e.height,n[i.media]=e)})},!0)}var n={};return{scope:{media:"=",options:"=?",title:"=?"},restrict:"E",controller:["$scope",i],controllerAs:"vm",template:'<div>                                  <div class="uk-flex">                                      <div class="uk-form-icon uk-flex-item-1 uk-margin-small-right">                                          <i class="uk-icon-photo"></i><input class="uk-width-1-1" ng-model="media">                                      </div>                                      <button class="uk-button" ng-click="vm.selectMedia()">Select</button>                                  </div>                                  <div class="uk-grid uk-margin-top">                                      <div class="uk-width-small-1-2">                                          <media-preview src="{{ media }}"></media-preview>                                      </div>                                      <div class="uk-width-small-1-2" ng-show="vm.isVideo(media)">                                          <div class="uk-margin-small-bottom" ng-show="options.poster"><media-preview src="{{ options.poster }}"></media-preview></div>                                          <a ng-click="vm.selectPoster()">Select Poster</button>                                          <a class="uk-margin-small-left" ng-show="options.poster" ng-click="(options.poster = \'\')">Reset</a>                                      </div>                                  </div>                               </div>'}}]).directive("fieldHtmleditor",["$timeout","$q",function(t,i){function n(){return a||(a=jQuery.Deferred(),e(widgetkit.config.adminBase+"/assets/lib/codemirror/codemirror.js").then(function(){e(widgetkit.config.adminBase+"/vendor/assets/uikit/js/components/htmleditor.min.js").then(function(){a.resolve()})})),a.promise()}var a;return{restrict:"EA",require:"?ngModel",link:function(e,i,a,o){n().then(function(){var n,l=jQuery("<textarea></textarea>"),r={mdparser:function(){}};r=jQuery.extend(!0,{},r,e.$eval(a.options)),i.after(l).hide();var s=function(){o.$render=function(){l.data("htmleditor")&&l.data("htmleditor").editor.setValue(o.$viewValue||"")},setTimeout(function(){n=UIkit.htmleditor(l,r),n.editor.on("change",UIkit.Utils.debounce(function(){o.$setViewValue(n.editor.getValue()),e.$root.$$phase||e.$apply()},50)),n.fit(),o.$render()})};t(s)})}}}]).directive("fieldLocation",["$timeout","$q",function(t,i){function n(){return a||(a=jQuery.Deferred(),e(widgetkit.config.adminBase+"/plugins/widgets/map/assets/marker-helper.js").then(function(){a.resolve()})),a.promise()}var a,o=0,l=function(){var e,t=function(){if(!e){e=i.defer();var t=document.createElement("script");t.async=!0,t.onload=function(){google.load("maps","3",{other_params:"sensor=false&libraries=places",callback:function(){google&&google.maps.places&&e.resolve()}})},t.onerror=function(){alert("Failed loading google maps api.")},t.src="https://www.google.com/jsapi",document.getElementsByTagName("head")[0].appendChild(t)}return e.promise};return t}();return{restrict:"EA",require:"?ngModel",scope:{latlng:"@"},replace:!0,template:'<div>                                    <div class="uk-grid uk-grid-small">                                         <div class="uk-form uk-form-icon uk-margin-small-bottom uk-width-3-5">                                            <i class="uk-icon-search"></i><input class="uk-width-1-1">                                        </div>                                        <div class="uk-form uk-form-horizontal uk-margin-small-bottom uk-width-2-5">                                            <input class="uk-width-1-1" type="text" placeholder="Custom marker: URL or #000" ng-model="latlng.marker">                                        </div>                                    </div>                                    <div class="js-map" style="min-height:300px;">                                     Loading map...                                     </div>                                     <div class="uk-text-small uk-margin-small-top">LAT: <span class="uk-text-muted">{{ latlng.lat }}</span> LNG: <span class="uk-text-muted">{{ latlng.lng }}</span> <span ng-if="latlng.place">PLACE: <span class="uk-text-muted">{{ latlng.place.name }}</span></span></div>                                </div>',link:function(e,i,a,r){function s(i){var n=jQuery.extend({lat:c.getPosition().lat(),lng:c.getPosition().lng(),marker:"",place:!1},r.$viewValue,i);r.$setViewValue(n),e.latlng=n,t(function(){e.$apply()})}var c;n().then(function(){l().then(function(){t(function(){var t,n,a,l="wk-location-"+ ++o,u=new google.maps.LatLng(53.55909862554551,9.998652343749995);e.latlng=r.$viewValue||{lat:u.lat(),lng:u.lng(),marker:"",place:!1},void 0===e.latlng.marker&&(e.latlng.marker=""),i.find(".js-map").attr("id",l),t=new google.maps.Map(document.getElementById(l),{zoom:6,center:u}),c=new google.maps.Marker({position:u,map:t,draggable:!0}),MapsMarkerHelper.setIcon(c,e.latlng.marker),google.maps.event.addListener(c,"dragend",function(){var e=c.getPosition();s({lat:e.lat(),lng:e.lng(),place:!1}),n.value=""}),jQuery.UIkit.$win.on("resize",function(){google.maps.event.trigger(t,"resize"),t.setCenter(c.getPosition())}),n=i.find("input")[0],a=new google.maps.places.Autocomplete(n),a.bindTo("bounds",t),google.maps.event.addListener(a,"place_changed",function(){var e=a.getPlace();if(e.geometry){e.geometry.viewport?t.fitBounds(e.geometry.viewport):t.setCenter(e.geometry.location),c.setPosition(e.geometry.location),n.value="";var i=c.getPosition();s({lat:i.lat(),lng:i.lng(),place:e})}}),google.maps.event.addDomListener(n,"keydown",function(e){13==e.keyCode&&e.preventDefault()}),e.$watch("latlng.marker",function(e){e&&s({marker:e}),MapsMarkerHelper.setIcon(c,e)}),r.$render=function(){try{if(r.$viewValue&&r.$viewValue.lat&&r.$viewValue.lng){var i=new google.maps.LatLng(r.$viewValue.lat,r.$viewValue.lng);c.setPosition(i),t.setCenter(i),r.$viewValue.marker!==e.latlng.marker&&s({marker:r.$viewValue.marker}),MapsMarkerHelper.setIcon(c,latlng.marker)}else s({lat:c.getPosition().lat(),lng:c.getPosition().lng(),marker:"",place:!1})}catch(n){}},r.$render()})})})}}}]).directive("fieldPathpicker",["mediaPicker","mediaInfo",function(e,t){function i(t){var i=this;i.selectPath=function(){filetypes=/\.*$/i,e.select({allowedFiletypes:filetypes}).then(function(e){t.path=e.url})},t.$watch("path",function(e){t.path=e},!0)}return{scope:{path:"="},restrict:"E",controller:["$scope",i],controllerAs:"vm",template:'<div>                                  <div class="uk-flex">                                      <div class="uk-form-icon uk-flex-item-1 uk-margin-small-right">                                        <i class="uk-icon-paperclip"></i><input class="uk-width-1-1" ng-model="path">                                      </div>                                      <button class="uk-button" ng-click="vm.selectPath()">Select</button>                                  </div>                               </div>'}}]).directive("fieldDate",["$timeout","$q",function(t,i){function n(){return a||(a=jQuery.Deferred(),e(widgetkit.config.adminBase+"/vendor/assets/uikit/js/components/datepicker.min.js").then(function(){a.resolve()})),a.promise()}var a;return{restrict:"E",require:"?ngModel",scope:{date:"@"},template:'<div class="uk-form-icon">                                  <i class="uk-icon-calendar"></i>                                  <input type="text" ng-model="date" data-uk-datepicker>                               </div>',link:function(e,i,a,o){n().then(function(){function i(i){o.$setViewValue(i),e.date=i,t(function(){e.$apply()})}e.date=o.$viewValue||"",e.$watch("date",function(e){i(e)}),o.$render=function(){try{i(o.$viewValue)}catch(e){}},o.$render()}),window.MooTools&&(i.find("input")[0].hide=function(){return!1})}}}]).factory("Fields",function(){var e={text:{label:"Text",template:function(e,t){var i=angular.element('<input class="uk-width-1-1" type="text"  ng-model="'+e+'">').attr(t.attributes||{});return t&&t.icon&&(i=i.wrap('<div class="uk-form-icon uk-width-1-1"></div>').before('<i class="uk-icon-'+t.icon+'"></i>').parent()),i}},textarea:{label:"Textarea",template:function(e,t){return angular.element('<textarea id="wk-content" class="uk-width-1-1" ng-model="'+e+'" rows="10"></textarea>').attr(t.attributes||{})}},htmleditor:{label:"HTML Editor",template:function(e,t){return angular.element('<field-htmleditor class="uk-width-1-1" ng-model="'+e+'"></field-htmleditor>').attr(t.attributes||{})}},tags:{label:"Tags",template:function(e,t){return angular.element('<div class="uk-form-icon uk-width-1-1"><i class="uk-icon-tags"></i><input class="uk-width-1-1" type="text" ng-list ng-model="'+e+'" placeholder="tag, tag, ..."></div><div>').find("input").attr(t.attributes||{}).parent()}},"boolean":{label:"Boolean",template:function(e,t){return angular.element('<input type="checkbox" ng-model="'+e+'">').attr(t.attributes||{})}},media:{label:"Media",template:function(e,t){return'<field-media media="'+e+'"></field-media>'}},pathpicker:{label:"Pathpicker",template:function(e,t){return'<field-pathpicker path="'+e+'"></field-pathpicker>'}},location:{label:"Location",template:function(e,t){return'<field-location  ng-model="'+e+'"></field-location>'}},date:{label:"Date",template:function(e,t){return'<field-date ng-model="'+e+'"></field-date>'}}};return{register:function(t,i){e[t]=angular.extend({label:t,assets:[],template:function(){}},i)},exists:function(t){return e[t]?!0:!1},get:function(t){return e[t]},fields:function(){var t=[];return Object.keys(e).forEach(function(i){t.push({name:i,label:e[i].label})}),t}}}).directive("field",["$timeout","$compile","Fields",function(e,t,i){return{require:"?ngModel",restrict:"E",link:function(n,a,o,l){var r=function(){var e=angular.extend({},JSON.parse(o.options||"{}")),l=o.type||"text";if(i.exists(l)){var r,s=i.get(l);r=s.template(o.ngModel,e),r.then?r.then(function(e){t(a.html(e).contents())(n)}):t(a.html(r).contents())(n)}else t(a.html(i.get("text").template(o.ngModel)).contents())(n)};e(r)}}}])}();