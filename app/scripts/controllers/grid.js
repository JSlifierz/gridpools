'use strict';

/*
 * THE GRID CONTROLLER
 * ------------------------------------
 * Controls the page the grid displays on
 */

angular.module('gridpoolsApp')
  .controller('GridController',[ '$scope', '$modal', function ($scope, $modal) {

    $scope.squares = [
        {'sq': '0 & 0'}, {'sq': '0 & 1'}, {'sq': '0 & 2'}, {'sq': '0 & 3'}, {'sq': '0 & 4'}, {'sq': '0 & 5'}, {'sq': '0 & 6'}, {'sq': '0 & 7'}, {'sq': '0 & 8'}, {'sq': '0 & 9'},
        {'sq': '1 & 0'}, {'sq': '1 & 1'}, {'sq': '1 & 2'}, {'sq': '1 & 3'}, {'sq': '1 & 4'}, {'sq': '1 & 5'}, {'sq': '1 & 6'}, {'sq': '1 & 7'}, {'sq': '1 & 8'}, {'sq': '1 & 9'},
        {'sq': '2 & 0'}, {'sq': '2 & 1'}, {'sq': '2 & 2'}, {'sq': '2 & 3'}, {'sq': '2 & 4'}, {'sq': '2 & 5'}, {'sq': '2 & 6'}, {'sq': '2 & 7'}, {'sq': '2 & 8'}, {'sq': '2 & 9'},
        {'sq': '3 & 0'}, {'sq': '3 & 1'}, {'sq': '3 & 2'}, {'sq': '3 & 3'}, {'sq': '3 & 4'}, {'sq': '3 & 5'}, {'sq': '3 & 6'}, {'sq': '3 & 7'}, {'sq': '3 & 8'}, {'sq': '3 & 9'},
        {'sq': '4 & 0'}, {'sq': '4 & 1'}, {'sq': '4 & 2'}, {'sq': '4 & 3'}, {'sq': '4 & 4'}, {'sq': '4 & 5'}, {'sq': '4 & 6'}, {'sq': '4 & 7'}, {'sq': '4 & 8'}, {'sq': '4 & 9'},
        {'sq': '5 & 0'}, {'sq': '5 & 1'}, {'sq': '5 & 2'}, {'sq': '5 & 3'}, {'sq': '5 & 4'}, {'sq': '5 & 5'}, {'sq': '5 & 6'}, {'sq': '5 & 7'}, {'sq': '5 & 8'}, {'sq': '5 & 9'},
        {'sq': '6 & 0'}, {'sq': '6 & 1'}, {'sq': '6 & 2'}, {'sq': '6 & 3'}, {'sq': '6 & 4'}, {'sq': '6 & 5'}, {'sq': '6 & 6'}, {'sq': '6 & 7'}, {'sq': '6 & 8'}, {'sq': '6 & 9'},
        {'sq': '7 & 0'}, {'sq': '7 & 1'}, {'sq': '7 & 2'}, {'sq': '7 & 3'}, {'sq': '7 & 4'}, {'sq': '7 & 5'}, {'sq': '7 & 6'}, {'sq': '7 & 7'}, {'sq': '7 & 8'}, {'sq': '7 & 9'},
        {'sq': '8 & 0'}, {'sq': '8 & 1'}, {'sq': '8 & 2'}, {'sq': '8 & 3'}, {'sq': '8 & 4'}, {'sq': '8 & 5'}, {'sq': '8 & 6'}, {'sq': '8 & 7'}, {'sq': '8 & 8'}, {'sq': '8 & 9'},
        {'sq': '9 & 0'}, {'sq': '9 & 1'}, {'sq': '9 & 2'}, {'sq': '9 & 3'}, {'sq': '9 & 4'}, {'sq': '9 & 5'}, {'sq': '9 & 6'}, {'sq': '9 & 7'}, {'sq': '9 & 8'}, {'sq': '9 & 9'}
    ]

    $scope.openModal = function () {
        console.log('Modal function on click')
        var modalInstance = $modal.open({
            templateUrl: 'views/modal.html',
            controller: 'ModalController'
        });

        modalInstance.result.then(function (selectedItem) {
            $scope.selected = selectedItem;
        });
    };


  }]);
