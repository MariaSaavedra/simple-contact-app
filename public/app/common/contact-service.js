angular.module('contactService', [])
.factory('ContactFactory', ['$q','$timeout', '$http', function ($q, $timeout, $http) {
    return {
        saveContact: function (contact) {
            return $http({
                url: '../',
                method: "POST",
                data: JSON.stringify(contact)
            });
        },
        loadContacts: function () {
            return $http({
                url: 'api/names',
                method: "GET"
            });
        }
    };
}]);