'use strict';

/*
|--------------------------------------------------------------------------
| Main Module for AngularJS uploader
|--------------------------------------------------------------------------
|
*/
var uploader = angular.module('uploader', [])
    .config(['$interpolateProvider', function ($interpolateProvider) {
        // Adjust the templating of angularJS to avoid conflicts (w/ Twig, Blade, Moustache, etc...)
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    }])
    .filter('byteCount', function() {
        // Adjust file size output so it is more user familiar
        return function(input) {
          var out;
          if(input > 1024*1024){
            out = (input / 1024 / 1024).toFixed(2) + 'MB';
          }
          else{
            out = Math.round(input / 1024) + 'KB';
          }
          return out;
        }
    });

/*
|--------------------------------------------------------------------------
| Directives / Controlers / Services
|--------------------------------------------------------------------------
|
*/
// @codekit-append "directives/fileThumbnail.js";
// @codekit-append "controllers/fileUploadCtrl.js";

/*
|--------------------------------------------------------------------------
| Non AngularJS site scripts
|--------------------------------------------------------------------------
|
*/
// @codekit-append "main.js";