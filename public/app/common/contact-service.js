angular.module('contactService', [])
.factory('ContactFactory', ['$q','$timeout', '$http', function ($q, $timeout, $http) {
    return {
        addContact: function (contact) {
            return $http({
                url: 'api/contacts',
                method: "POST",
                data: JSON.stringify(contact)
            });
        },
        deleteContact: function(id){
            return $http({
               url: 'api/contacts/' + id,
                method: "DELETE"
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