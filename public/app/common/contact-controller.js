angular.module('contacts', [])
.controller('contactController', ['$scope', 'ContactFactory', function ($scope, ContactFactory) {
    
$scope.loadContacts = function () {
    ContactFactory.loadContacts().success(function (contacts) {
        $scope.contacts = contacts;
    });
};
    
$scope.loadContacts();
    
}]);