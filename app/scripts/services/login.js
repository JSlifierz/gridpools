'use strict';

/**
 * THE LOGIN SERVICE
 * ------------------------------------
 * Send's feedback to the Flask API
 */

angular
    .module('gridpoolsApp')
    .factory('Login', ['$firebase', '$q', '$cookies', '$state', function ($firebase, $q, $cookies, $state) {

        var ref = new Firebase("https://scorching-torch-8007.firebaseio.com/");

        return {

            login: function (user) {

                var deferred = $q.defer();

                ref.authWithPassword({
                    email    : user.email,
                    password : user.password
                }, function(error) {
                    if (error) {
                        deferred.reject("Login failed!", error);
                    } else {
                        $cookies.gridpools = 'welcome back';
                        deferred.resolve("Authenticated successfully with payload:");
                    }
                });

                return deferred.promise;

            },

            logout: function() {
                delete $cookies['gridpools'];
                $state.go('home');
            },

            forgotPw: function (forgot) {

                var deferred = $q.defer();

                ref.resetPassword({
                    email : forgot.email
                }, function(error) {
                    if (error === null) {
                        deferred.resolve('Password reset email sent successfully');
                } else {
                        deferred.reject("Sorry, we have no account with that email address");
                    }
                });

                return deferred.promise;
            }

        }

    }]);