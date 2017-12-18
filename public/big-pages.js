webpackJsonp([0],{

/***/ 138:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(139)
}
var normalizeComponent = __webpack_require__(0)
/* script */
var __vue_script__ = __webpack_require__(141)
/* template */
var __vue_template__ = __webpack_require__(142)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/assets/js/components/dashboard/admin-dashboard.Profile.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-a408dea2", Component.options)
  } else {
    hotAPI.reload("data-v-a408dea2", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 139:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(140);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(2)("011bb527", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-a408dea2\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0&bustCache!./admin-dashboard.Profile.vue", function() {
     var newContent = require("!!../../../../../node_modules/css-loader/index.js!../../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-a408dea2\",\"scoped\":false,\"hasInlineConfig\":true}!../../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0&bustCache!./admin-dashboard.Profile.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 140:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(1)(undefined);
// imports


// module
exports.push([module.i, "", ""]);

// exports


/***/ }),

/***/ 141:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      imgObj: {
        preLoad: 1.3,
        error: 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif',
        loading: 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif'
      },
      imgUrl: 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/fancybox_loading.gif'
    };
  }
});

/***/ }),

/***/ 142:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("div", { staticClass: "wrapper-profile-head" }, [
      _c("div", { staticClass: "profile-head marginMagic" }, [
        _c("div", { staticClass: "profile-head__avatar marginBottom-s" }, [
          _c(
            "div",
            { staticClass: "avatar avatar--xl avatar--glow marginMagic" },
            [
              _c("img", {
                directives: [
                  {
                    name: "lazy",
                    rawName: "v-lazy",
                    value: _vm.imgObj,
                    expression: "imgObj"
                  }
                ],
                staticClass: "avatar-img",
                attrs: {
                  "data-srcset":
                    "https://trello-attachments.s3.amazonaws.com/59eaf823376e9802e77847d6/300x365/d2ccb4e13ea060791c30c85dc16d8e65/tumblr_oxq71xgWFC1wa2pdlo1_500.gif"
                }
              })
            ]
          )
        ]),
        _vm._v(" "),
        _vm._m(0),
        _vm._v(" "),
        _vm._m(1)
      ]),
      _vm._v(" "),
      _vm._m(2)
    ]),
    _vm._v(" "),
    _c("section", { staticStyle: { height: "1000px" } }, [
      _c("main", [
        _c("div", { staticClass: "wrapper-feed padding-l" }, [
          _c("div", { staticClass: "feedpage" }, [
            _c("div", { staticClass: "feed-items clearfix" }, [
              _vm._m(3),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass: "feed-items__content marginLeft-m borderRadius-s"
                },
                [
                  _c(
                    "div",
                    { staticClass: "feed-items__images" },
                    [
                      _c("progressive-img", {
                        attrs: {
                          blur: 30,
                          alt: "",
                          placeholder:
                            "https://wallinsider.com/wp-content/uploads/2017/05/Himiko-Toga-Wallpapers-2.jpg",
                          src:
                            "https://wallinsider.com/wp-content/uploads/2017/05/Himiko-Toga-Wallpapers-2.jpg"
                        }
                      })
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _vm._m(4)
                ]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "feed-items clearfix" }, [
              _vm._m(5),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass: "feed-items__content marginLeft-m borderRadius-s"
                },
                [
                  _c(
                    "div",
                    { staticClass: "feed-items__images" },
                    [
                      _c("progressive-img", {
                        attrs: {
                          blur: 30,
                          alt: "",
                          placeholder:
                            "https://scontent.fcgk6-1.fna.fbcdn.net/v/t1.0-9/19748608_1233452060115955_4042941187335383999_n.jpg?_nc_eui2=v1%3AAeEmWWfVRhe974pFso2UV3breYtrHtIiPe-sdbdqgVccMHVRIO5RQD-Cv7ve249m2JPvTInL6LBE8B_EQK34IIX3gzc5Injntxpuwx92UOyzVQ&oh=38bee9731ad5b1cae6236bf7059e0c8b&oe=5AA825AA",
                          src:
                            "https://scontent.fcgk6-1.fna.fbcdn.net/v/t1.0-9/19748608_1233452060115955_4042941187335383999_n.jpg?_nc_eui2=v1%3AAeEmWWfVRhe974pFso2UV3breYtrHtIiPe-sdbdqgVccMHVRIO5RQD-Cv7ve249m2JPvTInL6LBE8B_EQK34IIX3gzc5Injntxpuwx92UOyzVQ&oh=38bee9731ad5b1cae6236bf7059e0c8b&oe=5AA825AA"
                        }
                      })
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _vm._m(6)
                ]
              )
            ])
          ])
        ])
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "profile-head__title" }, [
      _c("h4", { staticClass: "fontSize-l" }, [_vm._v("Fahmi irsyad k")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "profile-head__quotes" }, [
      _c(
        "q",
        {
          staticStyle: { color: "#6F6F6F" },
          attrs: { cite: "https://facebook.com" }
        },
        [_vm._v("semua bisa diraih kalau punya niat dan semangat")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "wrapper-profile-menu paddingBottom-l" }, [
      _c("ul", { staticClass: "profile-menu marginMagic" }, [
        _c("li", { staticClass: "profile-menu__items" }, [
          _c("a", { attrs: { href: "#" } }, [_vm._v("Feed")])
        ]),
        _vm._v(" "),
        _c("li", { staticClass: "profile-menu__items" }, [
          _c("a", { attrs: { href: "#" } }, [_vm._v("Activity")])
        ]),
        _vm._v(" "),
        _c("li", { staticClass: "profile-menu__items" }, [
          _c("a", { attrs: { href: "#" } }, [_vm._v("Contribution")])
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "feed-items__dp avatar avatar--m" }, [
      _c("img", {
        staticClass: "avatar-img",
        attrs: { alt: "", src: "/resources/assets/images/avatar0.jpg" }
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "feed-items__desc padding-m" }, [
      _c("div", { staticClass: "text-limit" }, [
        _c("span", [_vm._v("Update Link : https://google.com")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "feed-items__dp avatar avatar--m" }, [
      _c("img", {
        staticClass: "avatar-img",
        attrs: { alt: "", src: "/resources/assets/images/avatar0.jpg" }
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "feed-items__desc padding-m" }, [
      _c("div", { staticClass: "text-limit" }, [
        _c("span", [_vm._v("Update Link : https://google.com")])
      ])
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-a408dea2", module.exports)
  }
}

/***/ })

});