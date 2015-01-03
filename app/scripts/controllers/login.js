'use strict';

/*
 * THE LOGIN CONTROLLER
 * ------------------------------------
 * COntrols the modal that is called when
 * a square is clicked. Allows for user to
 * select & own square.
 */

angular.module('gridpoolsApp')
  .controller('LoginController',['$scope', '$modalInstance', 'Login', '$state', function ($scope, $modalInstance, Login, $state) {

    $scope.user = {};

    $scope.login = function (user) {
        Login.login(user).then(function(resolve) {
            console.log(resolve)
            $modalInstance.close();
            $state.go('grid');
        }, function (reject) {
            console.log(reject)
        });
    }

    // $scope.close = function() {
    //     $modalInstance.close();
    // };

  }]);