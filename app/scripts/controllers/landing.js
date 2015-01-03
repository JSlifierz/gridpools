'use strict';

/*
 * THE LANDING PAGE CONTROLLER
 * ------------------------------------
 * Controls the results view which contains
 * both the Data & Collaborators views
 */

angular.module('gridpoolsApp')
  .controller('LandingController',['$scope', '$state', 'Create', '$modal', function ($scope, $state, Create, $modal) {

    $scope.openModal = function () {

        var modalInstance = $modal.open({
            templateUrl: 'views/login.html',
            controller: 'LoginController'
        });

        modalInstance.result.then(function (selectedItem) {
            $scope.selected = selectedItem;
        });
    };

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
