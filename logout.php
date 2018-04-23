<!DOCTYPE html>
<html>
   <head>
        <title>Print</title>
		<link rel="stylesheet" href="style.css">
    </head>
	<body>
		<div id="header">
			<?php
			include("connection.php");
			?>

			<div id="logo">Printers</div>
			<div class="container">
		
				<a href="index.php">Home</a>
				<a href="angebot.php">Angebot </a>
				<a href="login.php">Login </a>
				<div id="share-buttons">
					<a href="http://www.facebook.com/sharer.php?u=https://simplesharebuttons.com" target="_blank">
							<img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" /></a>
					<a href="https://twitter.com/share?url=https://simplesharebuttons.com&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
							<img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" /></a>
				</div>
			</div> <!--Ende container-->
		</div>
		<div id="content">
			<?php
				session_destroy();
				echo "Sie haben sich erfolgreich ausgeloggt.";
			?>
		</div>
	</body>
</html>
