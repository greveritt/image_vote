<?php
	require 'dbFunctions.php';
	if ($_POST['upordown'] === 'up') {
			echo 'sure';
	}
	else if ($_POST['upordown'] === 'down') {
			echo 'nope';
	}
	else {
			echo 'Neither up nor down was selected.';
	}
?>
