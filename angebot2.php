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
	Hier findest du die Angebote auf einem Blick. Gib das Papierformat ein!<br/><br/>
		<form action="ausgabe2.php" method="post">
			<table width="200">
				<tr>
					<td width="40%">Papierformat:</td>
					<td width="60%"><input name="Format" type="text" maxlength="2" size="20" /></td>
				</tr>
				<tr></tr>
				<tr>
					<td colspan="2"><input type="submit" value="Angebote suchen" /></td>
				</tr>
			</table>
		</form>	</div>

	</body>
</html>