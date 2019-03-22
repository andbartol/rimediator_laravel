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

/***/ "./resources/js/scelta.js":
/*!********************************!*\
  !*** ./resources/js/scelta.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof2(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof2 = function _typeof2(obj) { return typeof obj; }; } else { _typeof2 = function _typeof2(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof2(obj); }

function _typeof(obj) {
  if (typeof Symbol === "function" && _typeof2(Symbol.iterator) === "symbol") {
    _typeof = function _typeof(obj) {
      return _typeof2(obj);
    };
  } else {
    _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : _typeof2(obj);
    };
  }

  return _typeof(obj);
}

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

function _possibleConstructorReturn(self, call) {
  if (call && (_typeof(call) === "object" || typeof call === "function")) {
    return call;
  }

  return _assertThisInitialized(self);
}

function _getPrototypeOf(o) {
  _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  return _getPrototypeOf(o);
}

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) _setPrototypeOf(subClass, superClass);
}

function _setPrototypeOf(o, p) {
  _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  return _setPrototypeOf(o, p);
}

var Selector =
/*#__PURE__*/
function (_React$Component) {
  _inherits(Selector, _React$Component);

  function Selector(props) {
    var _this;

    _classCallCheck(this, Selector);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(Selector).call(this, props));
    _this.tipi = tipi;
    _this.state = {
      count: 1,
      selectors: [0]
    };
    _this.rimuovi = _this.rimuovi.bind(_assertThisInitialized(_this));
    _this.aggiungi = _this.aggiungi.bind(_assertThisInitialized(_this));
    return _this;
  }

  _createClass(Selector, [{
    key: "rimuovi",
    value: function rimuovi(id, e) {
      selectors = this.state.selectors;
      selectors = selectors.filter(function (s) {
        return id != s;
      });
      this.setState({
        selectors: selectors
      });
    }
  }, {
    key: "aggiungi",
    value: function aggiungi(e) {
      this.state.selectors.push(this.state.count);
      this.setState({
        selectors: this.state.selectors,
        count: this.state.count + 1
      });
    }
  }, {
    key: "render",
    value: function render() {
      rimuovi = this.rimuovi;
      s = this.state.selectors.map(function (sel) {
        return React.createElement(SelectorVestito, {
          key: sel,
          id: sel,
          rimuovi: rimuovi,
          tipi: this.tipi
        });
      });
      return React.createElement("div", {
        className: "row mt-2"
      }, s, React.createElement(AggiungiButton, {
        aggiungi: this.aggiungi
      }));
    }
  }]);

  return Selector;
}(React.Component);

var SelectorVestito =
/*#__PURE__*/
function (_React$Component2) {
  _inherits(SelectorVestito, _React$Component2);

  function SelectorVestito(props) {
    var _this2;

    _classCallCheck(this, SelectorVestito);

    _this2 = _possibleConstructorReturn(this, _getPrototypeOf(SelectorVestito).call(this, props));
    _this2.tipi = _this2.props.tipi.map(function (tipo) {
      return React.createElement("option", {
        value: tipo.id
      }, tipo.nome);
    });
    _this2.state = {
      image: '#',
      tipoSelezionato: false,
      vestitoSelezionato: false
    };
    _this2.tipoChange = _this2.tipoChange.bind(_assertThisInitialized(_this2));
    _this2.vestitiSuccess = _this2.vestitiSuccess.bind(_assertThisInitialized(_this2));
    _this2.vestitoChange = _this2.vestitoChange.bind(_assertThisInitialized(_this2));
    return _this2;
  }

  _createClass(SelectorVestito, [{
    key: "tipoChange",
    value: function tipoChange(e) {
      $.ajax({
        url: '/vestiti/tipo/' + e.target.value,
        success: this.vestitiSuccess
      });
    }
  }, {
    key: "vestitiSuccess",
    value: function vestitiSuccess(result) {
      this.setState({
        tipoSelezionato: true,
        vestiti: result.map(function (vestito) {
          return React.createElement(VestitoOption, {
            img: vestito.immagine,
            nome: vestito.nome,
            id: vestito.id
          });
        })
      });
    }
  }, {
    key: "vestitoChange",
    value: function vestitoChange(e) {
      vestito = this.state.vestiti.find(function (vestito) {
        return vestito.props.id == e.target.value;
      });
      this.setState({
        vestitoSelezionato: true,
        image: '/images/' + vestito.props.img
      });
    }
  }, {
    key: "render",
    value: function render() {
      var _this3 = this;

      vestiti = this.state.tipoSelezionato ? this.state.vestiti : null;
      imgVestito = this.state.vestitoSelezionato ? React.createElement("img", {
        id: "vestito_image",
        src: this.state.image,
        className: "my-2 img-fluid"
      }) : null;
      return React.createElement("div", {
        className: "offset-md-3 col-md-6 border shadow-small my-2 p-2 text-center"
      }, imgVestito, React.createElement("select", {
        onChange: this.tipoChange,
        name: "tipo[]",
        className: "col-12 form-control"
      }, React.createElement("option", {
        value: "",
        disabled: true,
        selected: true
      }, "Scegli una tipologia"), this.tipi), React.createElement("select", {
        onChange: this.vestitoChange,
        className: "col-12 mt-2 form-control",
        name: "vestito[]",
        disabled: !this.state.tipoSelezionato
      }, React.createElement("option", {
        className: "vestito",
        value: "",
        disabled: true,
        selected: true
      }, "Vestito"), vestiti), React.createElement("button", {
        type: "button",
        onClick: function onClick(e) {
          return _this3.props.rimuovi(_this3.props.id, e);
        },
        className: "col-12 mt-2 btn btn-danger"
      }, "Rimuovi"));
    }
  }]);

  return SelectorVestito;
}(React.Component);

var VestitoOption =
/*#__PURE__*/
function (_React$Component3) {
  _inherits(VestitoOption, _React$Component3);

  function VestitoOption(props) {
    _classCallCheck(this, VestitoOption);

    return _possibleConstructorReturn(this, _getPrototypeOf(VestitoOption).call(this, props));
  }

  _createClass(VestitoOption, [{
    key: "render",
    value: function render() {
      vestito = this.props;
      return React.createElement("option", {
        className: "vestito",
        value: vestito.id
      }, vestito.nome);
    }
  }]);

  return VestitoOption;
}(React.Component);

var AggiungiButton =
/*#__PURE__*/
function (_React$Component4) {
  _inherits(AggiungiButton, _React$Component4);

  function AggiungiButton(props) {
    _classCallCheck(this, AggiungiButton);

    return _possibleConstructorReturn(this, _getPrototypeOf(AggiungiButton).call(this, props));
  }

  _createClass(AggiungiButton, [{
    key: "render",
    value: function render() {
      return React.createElement("div", {
        className: "col-12 offset-md-3 col-md-6 border shadow-small p-2 text-center"
      }, React.createElement("a", {
        id: "aggiungi",
        onClick: this.props.aggiungi,
        href: "#"
      }, React.createElement("img", {
        src: "/images/plus.svg",
        className: "img-fluid"
      })));
    }
  }]);

  return AggiungiButton;
}(React.Component);

var container = document.getElementById('selezioni');
ReactDOM.render(React.createElement(Selector, null), container);

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/scelta.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/andrea/workspace/laravel/rimediator/resources/js/scelta.js */"./resources/js/scelta.js");


/***/ })

/******/ });