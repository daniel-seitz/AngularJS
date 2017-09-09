import './home.module';
import './home.controller';

(function() {
    'use strict';

    angular
        .module('home')
        .config(['$stateProvider', function($stateProvider) {

            var config = {
                url: '/home',
                controllerAs: 'vm',
                template: require('./home.html'),
                controller: 'HomeController',
            };

            $stateProvider.state('home', config);    
        }]);

})();
