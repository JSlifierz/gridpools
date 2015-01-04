'use strict';

/*
 * THE LOGIN CONTROLLER
 * ------------------------------------
 * Controls the login and forgot
 * password form.
 */

angular.module('gridpoolsApp')
  .controller('LoginController',['$scope', '$modalInstance', 'Login', '$state', function ($scope, $modalInstance, Login, $state) {

    $scope.user = {};

    $scope.login = function (user) {
        Login.login(user).then(function(resolve) {
            $modalInstance.close();
            $state.go('dashboard');
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

  }]);