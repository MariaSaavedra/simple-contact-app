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
        <div class="top-navigation">
            <ul class="inner-navigation">
                <li class="navigation-link"><a href="#">Home</a></li>
                <li class="navigation-link"><a href="#">Groups</a></li>
                <li class="navigation-link"><a href="#">Contacts</a></li>
            </ul>
        </div>
        <div ng-controller="contactController">
            <span ng-repeat="contact in contacts">
                <span ng-bind="contact.firstName"></span>
            </span>
        </div>
        <div class="contact-search">
            <input type="search">
            <div class="search-icon"><i class="fa fa-search"></i></div>
        </div>
        
        <script src="node_modules/lodash/index.js"></script>
        <script src="node_modules/angular/angular.js"></script>
        <script src="app/app.js"></script>
        <script src="app/common/contact-service.js"></script>
        <script src="app/common/contact-controller.js"></script>
    </body>
</html>
