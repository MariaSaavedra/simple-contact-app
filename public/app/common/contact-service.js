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
        deleteContact: function(id){
            return $http({
               url: 'api/contacts/' + id,
                methodd: "DELETE"
            });
        },
        loadContacts: function () {
            return $http({
                url: 'api/contacts',
                method: "GET"
            });
        }
    };
}]);