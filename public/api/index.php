<?php
/**
 * Step 1: Require the Slim Framework
 *
 * If you are not using Composer, you need to require the
 * Slim Framework and register its PSR-0 autoloader.
 *
 * If you are using Composer, you can skip this step.
 */
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
$app = new \Slim\Slim();

/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete`
 * is an anonymous function.
 */

// GET route
$app->get('/contacts', 'getContacts');
$app->get('/contacts/:id',	'getContact');
$app->post('/contacts', 'addContact');
$app->put('/contact/:id', 'updateContact');
$app->delete('/contacts/:id',	'deleteContact');

$app->run();

function getContacts() {
	$sql = "select * FROM contacts";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$contacts = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($contacts);
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function getContact($id) {
	$sql = "SELECT * FROM contacts WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$contact = $stmt->fetchObject();  
		$db = null;
		echo json_encode($contact); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function addContact() {
	error_log('addContact\n', 3, '/var/tmp/php.log');
	$request = Slim::getInstance()->request();
	$contact = json_decode($request->getBody());
	$sql = "INSERT INTO contacts (firstName, lastName, phone, email, picture) VALUES (:firstName, :lastName, :phone, :email, :picture)";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("firstName", $contacts->firstName);
		$stmt->bindParam("lastName", $contacts->lastName);
		$stmt->bindParam("phone", $contacts->phone);
		$stmt->bindParam("email", $contacts->email);
		$stmt->bindParam("picture", $contacts->picture);
		$stmt->execute();
		$contact->id = $db->lastInsertId();
		$db = null;
		echo json_encode($contacts); 
	} catch(PDOException $e) {
		error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function updateContact($id) {
	$request = Slim::getInstance()->request();
	$body = $request->getBody();
	$wine = json_decode($body);
	$sql = "UPDATE contact SET firstName=:firstName, lastName=:lastName, phone=:phone, email=:email, picture=:picture WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("firstName", $contacts->firstName);
		$stmt->bindParam("lastName", $contacts->lastName);
		$stmt->bindParam("phone", $contacts->phone);
		$stmt->bindParam("email", $contacts->email);
		$stmt->bindParam("picture", $contacts->picture);
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$db = null;
		echo json_encode($contact); 
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
function deleteContact($id) {
	$sql = "DELETE FROM contacts WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$db = null;
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function getConnection() {
	$dbhost="127.0.0.1";
	$dbuser="root";
	$dbpass="root";
	$dbname="contactdb";
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
}



?>