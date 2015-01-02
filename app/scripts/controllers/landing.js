'use strict';

/*
 * THE LANDING PAGE CONTROLLER
 * ------------------------------------
 * Controls the results view which contains
 * both the Data & Collaborators views
 */

angular.module('gridpoolsApp')
  .controller('LandingController',['$scope', '$state', function ($scope, $state) {

    // $scope.windowHeight = $window.innerHeight;
    // console.log($scope.windowHeight)

    $scope.play = function () {
        $state.go('grid');
    }

  }]);
