'use strict';

/*
 * THE MODAL CONTROLLER
 * ------------------------------------
 * COntrols the modal that is called when
 * a square is clicked. Allows for user to
 * select & own square.
 */

angular.module('gridpoolsApp')
  .controller('ModalController',['$scope', '$modalInstance', function ($scope, $modalInstance) {

    $scope.close = function() {
        $modalInstance.close();
    };

  }]);