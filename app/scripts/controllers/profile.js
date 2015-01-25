'use strict';

/*
 * THE PROFILE CONTROLLER
 * ------------------------------------
 * Controls the entire profile view.
 */

angular.module('gridpoolsApp')
  .controller('ProfileController',['$scope', 'Profile', '$firebase', '$base64', function ($scope, Profile, $firebase, $base64) {

    $scope.sweet = Profile;

    $scope.profile = {
        name: Profile.getProfileSettings().name,
        email: Profile.getProfileSettings().email,
        image: Profile.getProfileSettings().photo
    }

    $scope.data = {
        selectedIndex : 0,
        secondLocked : true,
        secondLabel : "Item Two"
    };
    $scope.next = function() {
        $scope.data.selectedIndex = Math.min($scope.data.selectedIndex + 1, 2) ;
    };
    $scope.previous = function() {
        $scope.data.selectedIndex = Math.max($scope.data.selectedIndex - 1, 0);
    };

  }]);








