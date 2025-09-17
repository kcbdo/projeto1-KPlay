"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_imports_js"],{

/***/ "./resources/js/imports.js":
/*!*********************************!*\
  !*** ./resources/js/imports.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _site_home_site_home__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./site-home/site-home */ "./resources/js/site-home/site-home.js");
/* harmony import */ var _site_home_site_home__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_site_home_site_home__WEBPACK_IMPORTED_MODULE_0__);


/***/ }),

/***/ "./resources/js/site-home/site-home.js":
/*!*********************************************!*\
  !*** ./resources/js/site-home/site-home.js ***!
  \*********************************************/
/***/ (() => {



$(function () {
  $('.card-body-home').each(function () {
    var $card = $(this);
    var lastScrollTop = 0;
    var cardHeight = 770;
    var isProgrammaticScroll = true;
    $card.scrollTop(cardHeight);
    function onScroll() {
      if (isProgrammaticScroll) {
        isProgrammaticScroll = false;
        var currentScroll = $card.scrollTop();
        currentScroll = currentScroll > lastScrollTop ? lastScrollTop + cardHeight : lastScrollTop - cardHeight;
        $card.scrollTop(currentScroll);
        setTimeout(function () {
          isProgrammaticScroll = true;
        }, 800);
        lastScrollTop = currentScroll;
      }
    }
    $card.on('scroll', onScroll);
    $card.find('.teste').on('click', function () {
      onScroll();
    });
  });
});

/***/ })

}]);