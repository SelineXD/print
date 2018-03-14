<html>
   <head>
        <title>Print</title>
		<link rel="stylesheet" href="style.css">
    </head>
	<body>
		
	<div id="header">
	<?phpinclude("connection-logout.php");?>
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
	Hier findest du die Angebote auf einem Blick. Gib das Papierformat ein!<br/><br/>
<form action="angebot.php" method="post">
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
		</form>
		
		<?php 
		$format = $_POST['Format']; 
			echo "<b>Du hast nach dem Format: \"<u>$format</u>\" gesucht. Dadurch wurden folgende Einträge gefunden:</b><br /><br />"; 
				//* Überprüfung der Eingabe     
				$abfrage = "SELECT * FROM angebote WHERE name LIKE '%$format%'"; 
				$ergebnis = mysql_query($abfrage) or die(mysql_error()); 
					if($ausgabe = mysql_fetch_assoc($ergebnis)) 
						{ echo "".$ausgabe['format'].""; } //* Wenn was gefunden wurde, wird es hier ausgegeben. 
					else 
						{ echo "Es wurde kein Angebot unter dem Format \"<u>$format</u>\" gefunden.<br /> 
						Bitte versuche es mit einem anderen Format.<br /> 
						<a href='suchen.html'>Zur&uuml;ck!</a>"; 
					}    // * Wenn nichts gefunden wurde, dann kommt diese Fehlermeldung. 
									 
		?>  

	
	
	
	
	</div>

	</body>
</html>
