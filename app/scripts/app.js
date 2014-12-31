'use strict';

/**
 * @ngdoc overview
 * @name gridpoolsApp
 * @description
 * # gridpoolsApp
 *
 * Main module of the application.
 */
angular
  .module('gridpoolsApp', [
    'ngAnimate',
    'ngCookies',
    'ngMessages',
    'ngResource',
    'ngSanitize',
    'ngTouch',
    // 3rd-Party Modules
    'ui.router'
  ])
  .config(['$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.otherwise('/');

    $stateProvider
      .state('home', {
        url: '/',
        templateUrl: 'views/landing.html',
        controller: 'LandingController',
        module: 'public'
      })

  }]);
