/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/vendor/I18n.js":
/*!*************************************!*\
  !*** ./resources/js/vendor/I18n.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ I18n)
/* harmony export */ });
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { var _i = arr == null ? null : typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"]; if (_i == null) return; var _arr = []; var _n = true; var _d = false; var _s, _e; try { for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var I18n = /*#__PURE__*/function () {
  /**
   * Initialize a new translation instance.
   *
   * @param  {string}  key
   * @return {void}
   */
  function I18n() {
    var key = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'translations';

    _classCallCheck(this, I18n);

    this.key = key;
  }
  /**
   * Get and replace the string of the given key.
   *
   * @param  {string}  key
   * @param  {object}  replace
   * @return {string}
   */


  _createClass(I18n, [{
    key: "trans",
    value: function trans(key) {
      var replace = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
      return this._replace(this._extract(key), replace);
    }
    /**
     * Get and pluralize the strings of the given key.
     *
     * @param  {string}  key
     * @param  {number}  count
     * @param  {object}  replace
     * @return {string}
     */

  }, {
    key: "trans_choice",
    value: function trans_choice(key) {
      var _this = this;

      var count = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 1;
      var replace = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {};

      var translations = this._extract(key, '|').split('|'),
          translation;

      translations.some(function (t) {
        return translation = _this._match(t, count);
      });
      translation = translation || (count > 1 ? translations[1] : translations[0]);
      translation = translation.replace(/\[.*?\]|\{.*?\}/, '');
      return this._replace(translation, replace);
    }
    /**
     * Match the translation limit with the count.
     *
     * @param  {string}  translation
     * @param  {number}  count
     * @return {string|null}
     */

  }, {
    key: "_match",
    value: function _match(translation, count) {
      var match = translation.match(/^[\{\[]([^\[\]\{\}]*)[\}\]](.*)/);
      if (!match) return;

      if (match[1].includes(',')) {
        var _match$1$split = match[1].split(',', 2),
            _match$1$split2 = _slicedToArray(_match$1$split, 2),
            from = _match$1$split2[0],
            to = _match$1$split2[1];

        if (to === '*' && count >= from) {
          return match[2];
        } else if (from === '*' && count <= to) {
          return match[2];
        } else if (count >= from && count <= to) {
          return match[2];
        }
      }

      return match[1] == count ? match[2] : null;
    }
    /**
     * Replace the placeholders.
     *
     * @param  {string}  translation
     * @param  {object}  replace
     * @return {string}
     */

  }, {
    key: "_replace",
    value: function _replace(translation, replace) {
      if (_typeof(translation) === 'object') {
        return translation;
      }

      for (var placeholder in replace) {
        translation = translation.toString().replace(":".concat(placeholder), replace[placeholder]).replace(":".concat(placeholder.toUpperCase()), replace[placeholder].toString().toUpperCase()).replace(":".concat(placeholder.charAt(0).toUpperCase()).concat(placeholder.slice(1)), replace[placeholder].toString().charAt(0).toUpperCase() + replace[placeholder].toString().slice(1));
      }

      return translation.toString().trim();
    }
    /**
     * Extract values from objects by dot notation.
     *
     * @param  {string}  key
     * @param  {mixed}  value
     * @return {mixed}
     */

  }, {
    key: "_extract",
    value: function _extract(key) {
      var value = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
      var path = key.toString().split('::'),
          keys = path.pop().toString().split('.');

      if (path.length > 0) {
        path[0] += '::';
      }

      return path.concat(keys).reduce(function (t, i) {
        return t[i] || value || key;
      }, window[this.key]);
    }
  }]);

  return I18n;
}();



/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!**************************************!*\
  !*** ./resources/js/relationship.js ***!
  \**************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _vendor_I18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./vendor/I18n */ "./resources/js/vendor/I18n.js");

window.I18n = _vendor_I18n__WEBPACK_IMPORTED_MODULE_0__.default;
$(document).on('click', '#btn-unfollow', function () {
  var translator = new _vendor_I18n__WEBPACK_IMPORTED_MODULE_0__.default();

  var _token = $('input[name="_token"]').val();

  var id = $('#followed_id').val();
  console.log(id);
  $.ajax({
    type: "delete",
    url: "http://127.0.0.1:8000/relationships/" + id,
    data: {
      _token: _token
    },
    success: function success(data) {
      $('#btn-unfollow').html(translator.trans('message.follow'));
      $('#btn-unfollow').attr("id", "btn-follow");
    }
  });
});
$(document).on('click', '#btn-follow', function () {
  var translator = new _vendor_I18n__WEBPACK_IMPORTED_MODULE_0__.default();

  var _token = $('input[name="_token"]').val();

  console.log($('#followed_id').val());
  $.ajax({
    type: "POST",
    url: "http://127.0.0.1:8000/relationships",
    data: {
      _token: _token,
      followed_id: $('#followed_id').val()
    },
    success: function success(data) {
      $('#btn-follow').html(translator.trans('message.unfollow'));
      $('#btn-follow').attr("id", "btn-unfollow");
    }
  });
});
})();

/******/ })()
;