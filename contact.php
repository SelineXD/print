<!DOCTYPE HTML>
<html>
    <head>
        <title>Print</title>
		<link rel="stylesheet" href="style.css">
    </head>
    <body>
	<div id="header">
	<?php
include("connection.php");
include("controlling.php");
?>
	<div id="logo">Printers
	</div>
	
	<div class="container">
			<a href="contact.php">Kontakt</a>
			<a href="angebot2.php">Angebot </a>
			<a href="logout.php">Logout</a>
<div id="share-buttons">
			<a href="http://www.facebook.com/sharer.php?u=https://simplesharebuttons.com" target="_blank">
	        		<img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" /></a>
			<a href="https://twitter.com/share?url=https://simplesharebuttons.com&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
	        		<img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" /></a>
			</div>
<div id="eingeloggt">
			<?php	//Abfrage der Nutzer ID vom Login

				$sql = "SELECT nachname,vorname FROM users WHERE id = '$userid'";
				$result = $pdo->query($sql);
 
				if ($result->rowCount() > 0) {
						while($row = $result->fetch()) {
							echo $row["vorname"]. " " . $row["nachname"] . "</br>";
								}
							}   else {
								echo "ERROR";
							}
			?></div>
</div> <!--Ende container-->
		
	</div>
	<div id="content">	
<h1>Kontaktformular</h1>

	<form method="post" action="send_email.php">
		<label for="Name"><b>Name:</b></label><br>
			<input type="text" id="Name" name="Name"><br><br>
		
		<label for="Vorname"><b>Vorname:</b></label><br>
			<input type="text" id="Vorname" name="Vorname"><br><br>
		 
		<label for="Email"><b>E-Mail:</b></label><br>
			<input type="text" id="Email" name="Email"><br><br>
		 
		<label for="Betreff"><b>Betreff:</b></label><br>
			<input type="text" id="Betreff" name="Betreff"><br><br>
		 
		<label for="Nachricht"><b>Nachricht:</b></label><br>
			<textarea id="Nachricht" name="Nachricht" rows="10" cols="50"></textarea> <br><br><br>
			
		<img src="captcha.php" border="0" title="Sicherheitscode"><br><br>
		<input type="text" name="sicherheitscode" size="5">

		 
		<input type="submit" name="submit">
	</form>
	</div>
     
	 <div id="footer"></div>
    </body>
</html>
