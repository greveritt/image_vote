<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Image Vote&reg;: The Only Place on the Internet&trade; Where You Can Vote on Images</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

		<?php
			require 'dbFunctions.php';
			$db = getDBAccess();

			// get number of images
			$idQuery = 'SELECT id FROM images ORDER BY RAND() LIMIT 1';
			$idStmt = $db->prepare($idQuery);
			$idStmt->bind_result($imgId);
			$idStmt->execute();
			$idStmt->fetch();
			$idStmt->close();

			$urlQuery= 'SELECT url FROM images WHERE id = ?';
			$urlStmt = $db->prepare($urlQuery);
			$urlStmt->bind_param('i', $imgId);
			$urlStmt->bind_result($imgUrl);
			$urlStmt->execute();
			$urlStmt->fetch();
			$urlStmt->close();
			echo '<img id="voteonme" src="'.$imgUrl.'" alt="Vote on this image">';
		?>
		<img id="upButton" src="up-button.png" onclick="upVote()" alt="vote up">
		<img id="downButton" src="down-button.png" onclick="downVote()" alt="vote down">

		<form id="rating" action="vote.php" method="post">
			<input type="radio" name="upordown" value="up" id="up">
			<input type="radio" name="upordown" value="down" id="down">
			<input type="submit" value="Send">
		</form>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
