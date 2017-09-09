(function() {
    'use strict';

    angular
        .module('appointment')
        .controller('AppointmentController', controller);

    function controller($state, $stateParams, $http) {
        var vm = this;

        vm.appointment = $stateParams.appointment;
        vm.isNewAppoinment = true;
        vm.reasons = [];
        vm.save = save;

        activate();


        function activate() {
            vm.reasons = [
                {id: 1, title: "Yearly Checkup"},
                {id: 2, title: "Pregnancy"},
                {id: 3, title: "Sickness"},
                {id: 4, title: "Other"},
            ];

            // it is an existing appointment
            if(vm.appointment) vm.isNewAppoinment = false;
        }

        function save() {
            if(vm.isNewAppoinment) {
                $http.post('/api/appointments', vm.appointment)
                .then(() => {$state.go('home');})
                .catch(error => errorHandler(error));
            } else {
                $http.patch('/api/appointments/' + vm.appointment.id, vm.appointment)
                .then(() => {$state.go('home');})
                .catch(error => errorHandler(error));
            }        
        }

        function errorHandler(error) {
            console.log(error);
        }
    }

})();