'use strict';

/*
 * THE DASHBOARD CONTROLLER
 * ------------------------------------
 * Controls the dashboard
 */

angular.module('gridpoolsApp')
  .controller('DashboardController',['$scope', 'Login',  function ($scope, Login) {

    $scope.login = Login;

  }]);