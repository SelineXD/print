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
				include("controlling.php");
			?>
			<div id="logo">Printers</div>
			
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
					?>
				</div>
				
			</div> <!--Ende container-->
		</div>
	
		<div id="content">
			Papierformate<br/><br/>

			<?php 
				include ("connection-logout.php");
				$enter= $_POST['Format'];
			
			
				$sql = "SELECT * FROM angebot WHERE Format = '$enter'";
				$result = $pdo->query($sql);

				if ($result->rowCount() > 0) {
					// output data of each row
					echo "<table><tr><td>Format</td><td>Bedruckt</td><td>Farbe</td><td>Papier</td><td>Preis</td><td>Währung</td></tr>";
					while($row = $result->fetch()) {
						echo "<tr><td>" . $row["Format"]. "</td><td>" . $row["doppelseitig"]. "</td><td>" . $row["Farbe"]. "</td><td>" . $row["Papier"]. "</td><td>" . $row["Preis"]. "</td><td>" . $row["Waehrung"]. "</td></tr>";
					}
					echo "</table>";
					echo "<a href='angebot2.php'>zurück</a>";
				}   else {
					echo "Bitte geben Sie <a href='angebot2.php'>erneut</a> ein Format ein. z.B. A4";
				}
			?>	
		</div>
	</body>
</html>
