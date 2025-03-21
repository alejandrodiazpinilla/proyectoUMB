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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/coreui/menu-edit.js":
/*!******************************************!*\
  !*** ./resources/js/coreui/menu-edit.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/* 11.12.2019 */
var self = this;

this.buildSelectParent = function (data) {
  var result = '<option value="none">Do not have parent</option>';
  $parentId = document.getElementById('parentId').value;
  $menuElementId = document.getElementById('menuElementId').value;

  for (var i = 0; i < data.length; i++) {
    if (data[i].id != $menuElementId) {
      if (data[i].id == $parentId) {
        result += '<option value="' + data[i].id + '" selected>' + data[i].name + '</option>';
      } else {
        result += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
      }
    }
  }

  return result;
};

this.updateSelectParent = function () {
  axios.get('/menu/element/get-parents?menu=' + document.getElementById("menu").value).then(function (response) {
    document.getElementById("parent").innerHTML = self.buildSelectParent(response.data);
  })["catch"](function (error) {
    // handle error
    console.log(error);
  });
};

this.toggleDivs = function () {
  var value = document.getElementById("type").value;

  if (value === 'title') {
    document.getElementById('div-href').classList.add('d-none');
    document.getElementById('div-dropdown-parent').classList.add('d-none');
    document.getElementById('div-icon').classList.add('d-none');
  } else if (value === 'link') {
    document.getElementById('div-href').classList.remove('d-none');
    document.getElementById('div-dropdown-parent').classList.remove('d-none');
    document.getElementById('div-icon').classList.remove('d-none');
  } else {
    document.getElementById('div-href').classList.add('d-none');
    document.getElementById('div-dropdown-parent').classList.remove('d-none');
    document.getElementById('div-icon').classList.remove('d-none');
  }
};

this.updateSelectParent();
this.toggleDivs();

document.getElementById("menu").onchange = function () {
  self.updateSelectParent();
};

document.getElementById("type").onchange = function () {
  self.toggleDivs();
};

/***/ }),

/***/ 1:
/*!************************************************!*\
  !*** multi ./resources/js/coreui/menu-edit.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\core\resources\js\coreui\menu-edit.js */"./resources/js/coreui/menu-edit.js");


/***/ })

/******/ });