'use strict';

/**
 * THE PROFILE SERVICE
 * ------------------------------------
 * PROVIDE FUNCTIONS FOR PROFILE VIEW
 */

angular
    .module('gridpoolsApp')
    .factory('Profile', ['$firebase', '$cookies', '$q', '$timeout', '$base64', function ($firebase, $cookies, $q, $timeout, $base64) {

        var cookieExists = false;

        var profileSettings = {};

        return {
            requestUser: function () {

                var deferred = $q.defer();

                var gridCookie = $cookies.gridpools;

                $timeout(function() {
                if(! gridCookie) {
                    cookieExists = false;
                    deferred.reject();
                } else if(gridCookie) {
                    cookieExists = true;
                    deferred.resolve();
                } else {
                    deferred.reject();
                }
            }, 500);
                return deferred.promise;
            },

            getData: function() {

                var deferred = $q.defer();

                var ref = new Firebase("https://scorching-torch-8007.firebaseio.com/users");

                ref.on("value", function(snapshot) {
                    profileSettings = snapshot.val().ID000001;
                    deferred.resolve();
                }, function (errorObject) {
                    deferred.reject();
                });

                return deferred.promise;
            },

            getProfileSettings: function() {
                return profileSettings;
            },

            photoChange: function(profile) {
                var deferred = $q.defer();
                console.log(profile)
                return deferred.promise;

                // var newPhoto = $
            }


        }




    }]);