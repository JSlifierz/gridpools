'use strict';

/*
 * THE LANDING PAGE CONTROLLER
 * ------------------------------------
 * Controls the results view which contains
 * both the Data & Collaborators views
 */

angular.module('gridpoolsApp')
  .controller('LandingController',['$scope', '$state', 'Create', function ($scope, $state, Create) {

    // $scope.windowHeight = $window.innerHeight;
    // console.log($scope.windowHeight)

    $scope.creds = {};

    $scope.play = function (creds) {
        Create.createUser(creds).then(function(resolve) {
            Create.createGrid(creds);
            $state.go('grid');
        }, function (reject) {
            console.log(reject)
        });
    }

  }]);
