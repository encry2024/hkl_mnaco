/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/views/backend/request/form/liquidation/js/create.js":
/***/ (function(module, exports) {

$(window).on('load', function () {
   var numberOfRequestedItem = document.getElementById("total_requested_item");

   numberOfRequestedItem.value = 1;
});

$(document).ready(function () {
   var numberOfRequestedItem = document.getElementById("total_requested_item"),
       additionalRequestedItem = 0;

   $("#add_request_button").on('click', function () {
      $("#request-field").append('<tr id="request-container">' + '<td class="text-center">' + '<input type="text" id="amount_field" class="form-control" name="amount[]">' + '</td>' + '<td class=" text-center">' + '<input type="text" id="purpose_field" class="form-control" name="purpose[]">' + '</td>' + '<td class=" text-center">' + '<select id="receipt_field" class="form-control" name="receipt[]">' + '<option value="1">Yes</option>' + '<option value="0">No</option>' + '</select>' + '</td>' + '<td class=" text-center">' + '<a class="btn btn-danger btn-sm" id="remove_request_button"><i class="fa fa-remove"></i></a>' + '</td>' + '</tr>');

      numberOfRequestedItem.value = parseInt(numberOfRequestedItem.value) + 1;
   });

   $("#request-field").on('click', '#remove_request_button', function () {
      $(this).closest("tr").remove();

      numberOfRequestedItem.value -= 1;
   });
});

/***/ }),

/***/ 3:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/views/backend/request/form/liquidation/js/create.js");


/***/ })

/******/ });