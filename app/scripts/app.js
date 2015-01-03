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
    'ui.router',
    'ui.bootstrap',
    'akoenig.deckgrid'
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
      .state('grid', {
        url: '/grid',
        templateUrl: 'views/grid.html',
        controller: 'GridController',
        module: 'public'
      })

  }]);
