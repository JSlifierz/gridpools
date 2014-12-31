'use strict';

/*
 * THE LANDING PAGE CONTROLLER
 * ------------------------------------
 * Controls the results view which contains
 * both the Data & Collaborators views
 */

angular.module('gridpoolsApp')
  .controller('LandingController',['$scope', '$window', function ($scope, $window) {
    console.log('LandingController')
    $scope.windowHeight = $window.innerHeight;
    console.log($scope.windowHeight)

  }]);
