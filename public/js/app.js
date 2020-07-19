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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
utility = {
  isExists: function isExists(elem) {
    if ($(elem).length > 0) {
      return true;
    }

    return false;
  },
  bootstrapSelectEmptyRefreshDisabled: function bootstrapSelectEmptyRefreshDisabled(target, caseType) {
    if (caseType === "1") {
      // only empty
      $(target).empty();
    } else if (caseType === "2") {
      // only refresh
      $(target).selectpicker('refresh');
    } else if (caseType === "3") {
      // Only disable
      $(target).prop('disabled', true);
    } else {
      $(target).empty();
      $(target).prop('disabled', true);
      $(target).selectpicker('refresh');
    }
  },
  bootstrapSelectData: function bootstrapSelectData(target, response) {
    if (response !== null) {
      $(target).prop('disabled', false);
      utility.bootstrapSelectEmptyRefreshDisabled(target, '1');
      $.each(response, function (key, value) {
        $(target).append('<option value="' + value.id + '">' + value.name + '</option>');
      });
      utility.bootstrapSelectEmptyRefreshDisabled(target, '2');
    } else {
      utility.bootstrapSelectEmptyRefreshDisabled(target, '4');
    }
  },
  formatErrorMessage: function formatErrorMessage(jqXHR, exception) {
    if (jqXHR.status === 0) {
      return utility.swalError('Not connected.\nPlease verify your network connection.');
    } else if (jqXHR.status == 404) {
      return utility.swalError('The requested page not found.');
    } else if (jqXHR.status == 401) {
      return utility.swalError('Sorry!! You session has expired. Please login to continue access.');
    } else if (jqXHR.status == 500) {
      return utility.swalError('Internal Server Error.');
    } else if (exception === 'parsererror') {
      return utility.swalError('Requested JSON parse failed.');
    } else if (exception === 'timeout') {
      return utility.swalError('Time out error.');
    } else if (exception === 'abort') {
      return utility.swalError('Ajax request aborted.');
    } else {
      if (jqXHR.status == 403) {
        return utility.swalError('You do not have authorization!');
      }

      if (exception === 'Symfony\\Component\\HttpKernel\\Exception\\AccessDeniedHttpException') {
        return utility.swalError('You do not have authorization!');
      }

      return utility.swalError('Unknown error occured. Please try again.');
    }
  },
  swalError: function swalError(message) {
    Swal.fire({
      title: 'Error!',
      text: message,
      icon: 'error',
      showConfirmButton: false,
      timer: 2000
    });
  }
};

if (utility.isExists('#showcase-datatables')) {
  $('#showcase-datatables').DataTable({
    "order": [[0, "asc"]],
    "pagingType": "full_numbers",
    "lengthMenu": [[50, 100, 150, -1], [50, 100, 150, "All"]],
    processing: true,
    serverSide: true,
    ajax: {
      url: '/dashboard/showcase/dataTable',
      type: 'POST'
    },
    columns: [{
      data: 'title',
      name: 'title'
    }, {
      data: 'content',
      name: 'content'
    }, {
      data: 'group',
      name: 'group'
    }, {
      data: 'action',
      className: "text-center",
      orderable: false,
      searchable: false
    }],
    language: {
      "url": "/dashboard/dataTable/language"
    },
    fnDrawCallback: function fnDrawCallback() {}
  });
}

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/tringuyen/Desktop/Sites/capstone/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /Users/tringuyen/Desktop/Sites/capstone/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });