<?php

function connect() {
	$parameters = file('dbInfo.inc.php');
	error_log($parameters[1]);
	try {
		$db = new PDO('mysql:host='.trim($parameters[1]).';dbname='.trim($parameters[4]), trim($parameters[2]), trim($parameters[3]));
    	return $db;
	} catch(PDOException $e) {
		error_log('dat connection string tho: mysql:host='.$parameters[1].';dbname='.$parameters[4]);
		handlePdoException($e);
	}
}

function handlePdoException($e) {
		error_log('Database access failed. Error message: '.$e->getMessage());
		die();
}

// executes package of functions so that each source file need only call one function to get access to MySQL
function getDBAccess() {
	$db = connect();
	return $db;
}

?>
