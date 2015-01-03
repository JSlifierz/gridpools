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
            $modalInstance.close();
            $state.go('grid');
        }, function (reject) {
            $scope.errorMsg = reject;
        });
    }

    $scope.forgotPw = function (forgot) {
        Login.forgotPw(forgot).then(function(resolve) {
            $scope.success = resolve;
        }, function (reject) {
            $scope.error = reject;
        });
    }

    // $scope.close = function() {
    //     $modalInstance.close();
    // };

  }]);