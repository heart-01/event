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
/******/ 	return __webpack_require__(__webpack_require__.s = 10);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/calendarEvent/modal.js":
/*!***************************************************!*\
  !*** ./resources/js/admin/calendarEvent/modal.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

//modal Add
var name = document.getElementById('name');

name.oninvalid = function (event) {
  event.target.setCustomValidity('Please enter a Event name. Thai or English or Number only !');
};

name.oninput = function (event) {
  event.target.setCustomValidity('');
};

var description = document.getElementById('description');

description.oninvalid = function (event) {
  event.target.setCustomValidity('Please enter a Description. Thai or English or Number only !');
};

description.oninput = function (event) {
  event.target.setCustomValidity('');
};

var eventDateFormTo = document.getElementById('eventDateFormTo');

eventDateFormTo.oninvalid = function (event) {
  event.target.setCustomValidity('Please select format Event DateForm - DateTo !');
};

eventDateFormTo.oninput = function (event) {
  event.target.setCustomValidity('');
};

var registerStartEndDate = document.getElementById('registerStartEndDate');

registerStartEndDate.oninvalid = function (event) {
  event.target.setCustomValidity('Please select format Register Event DateForm - DateTo !');
};

registerStartEndDate.oninput = function (event) {
  event.target.setCustomValidity('');
};

$('#poster').change(function (e) {
  var files = this.files[0];
  var n = files.name,
      s = files.size,
      t = files.type.split('/')[0];

  if (t != "image") {
    Swal.fire("<span class='kanin'>Please select image file type.</span>", "", "warning");
    $('#btnfrmAdd').prop('disabled', true);
    $(this).css("border", "#FF0000 solid 2px");
    return false;
  } else if (s > 1048576) {
    //1MB
    Swal.fire("<span class='kanin'>Please deselect this \nfile: " + n + " it\'s larger than the maximum filesize allowed. Sorry!</span>", "", "warning");
    $('#btnfrmAdd').prop('disabled', true);
    $(this).css("border", "#FF0000 solid 2px");
    return false;
  }

  $('#btnfrmAdd').prop('disabled', false);
});
var organizer = document.getElementById('organizer');

organizer.oninvalid = function (event) {
  event.target.setCustomValidity('Please enter a Name organizer. Thai or English or Number only !');
};

organizer.oninput = function (event) {
  event.target.setCustomValidity('');
};

$("#frmAdd").on("submit", function () {
  var eventDateFormTo = $('#eventDateFormTo').val();
  var registerStartEndDate = $('#registerStartEndDate').val();

  if (eventDateFormTo === '') {
    Swal.fire("<span class='kanin'>Please select Event Date !</span>", "", "warning").then(function () {
      $('#eventDateFormTo').focus();
    });
    return false;
  } else if (registerStartEndDate === '') {
    Swal.fire("<span class='kanin'>Please select Register Event Date !</span>", "", "warning").then(function () {
      $('#registerStartEndDate').focus();
    });
    return false;
  }

  return true;
}); //modal Edit

var name_edit = document.getElementById('name-edit');

name_edit.oninvalid = function (event) {
  event.target.setCustomValidity('Please enter a Event name. Thai or English only !');
};

name_edit.oninput = function (event) {
  event.target.setCustomValidity('');
};

var description_edit = document.getElementById('description-edit');

description_edit.oninvalid = function (event) {
  event.target.setCustomValidity('Please enter a Description. Thai or English or Number only !');
};

description_edit.oninput = function (event) {
  event.target.setCustomValidity('');
};

var eventDateFormTo_edit = document.getElementById('eventDateFormTo-edit');

eventDateFormTo_edit.oninvalid = function (event) {
  event.target.setCustomValidity('Please select format Event DateForm - DateTo !');
};

eventDateFormTo_edit.oninput = function (event) {
  event.target.setCustomValidity('');
};

var registerStartEndDate_edit = document.getElementById('registerStartEndDate-edit');

registerStartEndDate_edit.oninvalid = function (event) {
  event.target.setCustomValidity('Please select format Register Event DateForm - DateTo !');
};

registerStartEndDate_edit.oninput = function (event) {
  event.target.setCustomValidity('');
};

$('#poster-edit').change(function (e) {
  var files = this.files[0];
  var n = files.name,
      s = files.size,
      t = files.type.split('/')[0];

  if (t != "image") {
    Swal.fire("<span class='kanin'>Please select image file type.</span>", "", "warning");
    $('#btnfrmEdit').prop('disabled', true);
    $(this).css("border", "#FF0000 solid 2px");
    return false;
  } else if (s > 1048576) {
    //1MB
    Swal.fire("<span class='kanin'>Please deselect this \nfile: " + n + " it\'s larger than the maximum filesize allowed. Sorry!</span>", "", "warning");
    $('#btnfrmEdit').prop('disabled', true);
    $(this).css("border", "#FF0000 solid 2px");
    return false;
  }

  $('#btnfrmEdit').prop('disabled', false);
});
var organizer_edit = document.getElementById('organizer-edit');

organizer_edit.oninvalid = function (event) {
  event.target.setCustomValidity('Please enter a Name organizer. Thai or English or Number only !');
};

organizer_edit.oninput = function (event) {
  event.target.setCustomValidity('');
};

$("#frmEdit").on("submit", function () {
  var eventDateFormTo_edit = $('#eventDateFormTo-edit').val();
  var registerStartEndDate_edit = $('#registerStartEndDate-edit').val();

  if (eventDateFormTo_edit === '') {
    Swal.fire("<span class='kanin'>Please select Event Date !</span>", "", "warning").then(function () {
      $('#eventDateFormTo-edit').focus();
    });
    return false;
  } else if (registerStartEndDate_edit === '') {
    Swal.fire("<span class='kanin'>Please select Register Event Date !</span>", "", "warning").then(function () {
      $('#registerStartEndDate-edit').focus();
    });
    return false;
  }

  return true;
});

/***/ }),

/***/ 10:
/*!*********************************************************!*\
  !*** multi ./resources/js/admin/calendarEvent/modal.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\EventManage\resources\js\admin\calendarEvent\modal.js */"./resources/js/admin/calendarEvent/modal.js");


/***/ })

/******/ });