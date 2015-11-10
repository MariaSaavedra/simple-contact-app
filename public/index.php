<?php
// require "api/Slim/Slim.php";
// \Slim\Slim::registerAutoloader();
// create new Slim instance
// $app = new \Slim\Slim();
// add new Route 
// $app->get("/", function () {
//    echo "<h1>Hello Slim World</h1>";
// });

// run the Slim app
// $app->run();
?> 

<!doctype html>
<html ng-app="app">
   <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Contact Application</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <body>
        <div ng-controller="contactController">
        <div class="header">
            <h1>Contacts</h1>
        </div>
        <div class="contact-form modal" style="border: 1px solid red;">
            <form>
                <input class="contact-input" ng-model="user.firstName" id="firstName" type="text" placeholder="First Name">
                <input class="contact-input" ng-model="user.lastName" id="lastName" type="text" placeholder="Last Name"> 
                <input class="contact-input" ng-model="user.phone" id="phone" type="phone" placeholder="000-000-0000">
                <input class="contact-input" ng-model="user.email" id="email" type="email" placeholder="E-mail Address">
                <input type="submit" ng-click="addContact(user)">
            </form>
        </div>
         <pre>user = {{user | json}}</pre>
        <div class="contact-search">
            <input type="search" class="search">
            <span class="search-icon"><i class="fa fa-search"></i></span>
        </div>
        
        
            <div class="contact-card" ng-repeat="contact in contacts" ng-attr-contact-id="{{contact.id}}">
                <div class="full-name">
                    <span class="first-name" ng-bind="contact.firstName"></span>
                    <span class="last-name" ng-bind="contact.lastName"></span>
                </div>
                <div class="contact-details">
                    <span class="phone" ng-bind="contact.phone"></span>
                    <span class="email" ng-bind="contact.email"></span>
                </div>
                <div class="icons">
                    <span><i class="fa fa-pencil"></i></span>
                    <span><i class="fa fa-star-o"></i></span>
                    <span ng-click="deleteContact(contact.id);"><i class="fa fa-times"></i></span>
                </div>
            </div>
            
            <div class="add-contact">
                <span class="user-plus"><i class="fa fa-user-plus"></i></span>
            </div>
            
        </div>

        
        <script src="node_modules/lodash/index.js"></script>
        <script src="node_modules/angular/angular.js"></script>
        <script src="app/app.js"></script>
        <script src="app/common/contact-service.js"></script>
        <script src="app/common/contact-controller.js"></script>
    </body>
</html>
