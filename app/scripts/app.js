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
    'ngMaterial',
    // 3rd-Party Modules
    'ui.router',
    'ui.bootstrap',
    'akoenig.deckgrid',
    'firebase',
    'angularFileUpload',
    'base64'
  ])
  .config(['$stateProvider', '$urlRouterProvider', '$mdThemingProvider', function ($stateProvider, $urlRouterProvider, $mdThemingProvider) {
    $urlRouterProvider.otherwise('/');

    $stateProvider
      .state('home', {
        url: '/',
        templateUrl: 'views/landing.html',
        controller: 'LandingController',
        module: 'public'
      })
      .state('dashboard', {
        url: '/dashboard',
        templateUrl: 'views/dashboard.html',
        controller: 'DashboardController',
        module: 'private'
      })
      .state('dashboard.grid', {
        url: '/',
        templateUrl: 'views/grid.html',
        controller: 'GridController'
      })
      .state('dashboard.profile', {
        url: '/',
        templateUrl: 'views/profile.html',
        controller: 'ProfileController'
      });

    $mdThemingProvider.theme('default')
        .primaryColor('blue')
        .accentColor('blue-grey');

  }])

  .run(['Profile', '$rootScope', '$state', '$cookies', function(Profile, $rootScope, $state, $cookies){

    Profile.requestUser().then(function(resolve) {
        Profile.getData().then(function() {
            $state.go('dashboard');
        });
    }, function(reject) {
        $state.go('home');
    });

    $rootScope.$on('$stateChangeStart', function(e, toState, toParams, fromState, fromParams, scope, next, current) {

        if (toState.module === 'private' && !$cookies.gridpools) {
            // If logged out and transitioning to a logged in page:
            e.preventDefault();
            $state.go('home');
        } else if (toState.module === 'public' && $cookies.gridpools) {
            // If logged in and transitioning to a logged out page:
            e.preventDefault();
            $state.go('dashboard');
        }

    });

  }]);
