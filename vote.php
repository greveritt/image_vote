<?php
require 'dbFunctions.php';
$db = getDBAccess();
switch ($_POST['upordown']) {
		case 'up':
				$query = 'UPDATE images SET ups = ups + 1 WHERE id = :imgId';
		case 'down':
				$query = 'UPDATE images SET downs = downs + 1 WHERE id = :imgId';
}
$stmt = $db->prepare($query);
$stmt->bindParam(':imgId', $_POST['imgId'], PDO::PARAM_INT);
$stmt->execute();
$stmt->closeCursor();
?>
