(function() {
    'use strict';

    angular
        .module('home')
        .controller('HomeController', controller);

    function controller($state, $http, moment) {
        var vm = this;

        vm.appointments = [];
        vm.delete = deleteAppointment;

        activate();


        function activate() {
            // initialization
            $http.get('/api/appointments')
            .then(response => processAppointment(response.data.content))
            .catch(error => errorHandler(error));
        }

        function deleteAppointment($event, appointment) {
            
            $event.stopPropagation();

            // this could use a confirmation dialog

            $http.delete('/api/appointments/' + appointment.id)
            .then(activate())
            .catch(error => errorHandler(error));
        }

        function processAppointment(appointments) {
            // reformat so that angular can use it
            appointments.forEach(appointment => {
                appointment.start = new Date(appointment.start);
                appointment.end = new Date(appointment.end);
            });

            vm.appointments = appointments;
        }

        function errorHandler(error) {
            console.log(error);
        }
    }

})();