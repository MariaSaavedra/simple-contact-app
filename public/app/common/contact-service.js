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
        loadContact: function () {
            return $http({
                url: '../',
                method: "GET"
            });
        },
        loadAllContacts: function (){
            return $http({
                url: '../',
                method: "GET"
            });
        }
    };
}]);