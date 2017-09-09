import angular from 'angular';
import uirouter from '@uirouter/angularjs';

require('angular-moment/angular-moment.js');
require('moment/moment.js');

import './home/home.routes';
import './appointment/appointment.routes';

(function() {
    'use strict';

    var app = angular.module('app', ['ui.router', 'angularMoment', 'home', 'appointment']);

    app.config(function($locationProvider, $stateProvider, $urlRouterProvider, $httpProvider) {

        $locationProvider.html5Mode(true);

        // default state
        $stateProvider.state('default', {
            url: '/',
            controller: function($state) {
                $state.go('home');
            },
        });

        // state does not exist
        $urlRouterProvider.otherwise(function($injector){
            var $state = $injector.get("$state");
            $state.go('home');
        });

    });

    app.controller('MainController', function($scope) {});

})();

