import './appointment.module';
import './appointment.controller';

(function() {
    'use strict';

    angular
        .module('appointment')
        .config(['$stateProvider', function($stateProvider) {

            var config = {
                url: '/book-an-appointment',
                controllerAs: 'vm',
                template: require('./appointment.html'),
                controller: 'AppointmentController',
                params: { appointment: null }
            };

            $stateProvider.state('appointment', config);    
        }]);

})();
