'use strict';

/**
 * THE CREATE SERVICE
 * ------------------------------------
 * Creates a new user account and grid
 */

angular
    .module('gridpoolsApp')
    .factory('Create', ['$firebase', '$q', function ($firebase, $q) {

        var ref = new Firebase("https://scorching-torch-8007.firebaseio.com/");

        return {

            createUser: function (creds) {

                var deferred = $q.defer();

                ref.createUser({
                    email    : creds.email,
                    password : creds.password
                }, function(error) {
                    if (error === null) {
                        deferred.resolve("User created successfully");
                    } else {
                        deferred.reject("Error creating user:", error);
                    }
                });

                return deferred.promise;

            },

            createGrid: function (creds) {
                ref.set({grid: creds.gridName});
            }


        }

    }]);