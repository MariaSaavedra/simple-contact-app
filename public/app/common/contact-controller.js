angular.module('contacts', [])
.controller('contactController', ['$scope', 'ContactFactory', function ($scope, ContactFactory) {
    
$scope.loadContacts = function () {
    ContactFactory.loadContacts().success(function (contacts) {
        $scope.contacts = contacts;
    });
};
$scope.loadContacts();
    
$scope.deleteContact = function(id){
    var r = confirm("You're about to delete a contact, are you sure?");
    if (r == true){
        ContactFactory.deleteContact(id).success(function(){
            alert("Contact Deleted");
            location.reload();
        });
    } else {
        alert("Contact not deleted!");
    }
};
    
}]);