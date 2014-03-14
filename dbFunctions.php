<?php

function connect() {
	$parameters = file('dbInfo.inc.php');
	$db = new mysqli(trim($parameters[1]), trim($parameters[2]), trim($parameters[3]), trim($parameters[4]));
    return $db;
}

function checkConnection($db) {
	// check connection for errors 
	if ($db->connect_errno) {
	printf("Connection failed: %s\n", $db->connect_errno);
	exit();
	}
}

// executes package of functions so that each source file need only call one function to get access to MySQL
function getDBAccess() {
	$db = connect();
	checkConnection($db);
	return $db;
}

?>
