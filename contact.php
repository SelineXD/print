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
			?></div>
	<div id="content">
	</div> <!--Ende container-->
	</div>
	
<h1>Kontaktformular</h1>
<?php
	//send_email.php
	$email_from = "absender@domain.de";   //Absender falls keiner angegeben wurde
	$sendermail_antwort = true;      //E-Mail Adresse des Besuchers als Absender. false= Nein ; true = Ja
	$name_von_emailfeld = "Email";   //Feld in der die Absenderadresse steht
	 
	$empfaenger = "empfaenger@domain.de"; //Empfänger-Adresse
	$mail_cc = ""; //CC-Adresse, diese E-Mail-Adresse bekommt einer weitere Kopie
	$betreff = "Neue Kontaktanfrage"; //Betreff der Email
	 
	$url_ok = "http://www.domain.de/ok.php"; //Zielseite, wenn E-Mail erfolgreich versendet wurde
	$url_fehler = "http://www.domain.de/fehler.php"; //Zielseite, wenn E-Mail nicht gesendet werden konnte
	 
	 
		//Diese Felder werden nicht in der Mail stehen
		$ignore_fields = array('submit');
		 
			//Datum, wann die Mail erstellt wurde
			$name_tag = array();
			$name_tag[0] = "Sonntag";
			$name_tag[1] = "Montag";
			$name_tag[2] = "Dienstag";
			$name_tag[3] = "Mittwoch";
			$name_tag[4] = "Donnerstag";
			$name_tag[5] = "Freitag";
			$name_tag[6] = "Samstag";
			$num_tag = date("w");
			$tag = $name_tag[$num_tag];
			$jahr = date("Y");
			$n = date("d");
			$monat = date("m");
			$time = date("H:i");
			 
				//Erste Zeile unserer Email
				$msg = ":: Gesendet am $tag, den $n.$monat.$jahr - $time Uhr ::\n\n";
				 
					//Hier werden alle Eingabefelder abgefragt
					while (list($name,$value) = each($_POST)) {
					   if (in_array($name, $ignore_fields)) {
							continue; //Ignore Felder wird nicht in die Mail eingefügt
					   }
					   $msg .= "::: $name :::\n$value\n\n";
					}
					 		 
						//E-Mail Adresse des Besuchers als Absender
						if ($sendermail_antwort and isset($_POST[$name_von_emailfeld]) and filter_var($_POST[$name_von_emailfeld], FILTER_VALIDATE_EMAIL)) {
						   $email_from = $_POST[$name_von_emailfeld];
						}
							$header="From: $email_from";
								if (!empty($mail_cc)) {
								   $header .= "\n";
								   $header .= "Cc: $mail_cc";
								}
								  
								$mail_senden = mail($empfaenger,$betreff,$msg,$header);
								 
									//Weiterleitung, hier konnte jetzt per echo auch Ausgaben stehen
									if($mail_senden){
									  header("Location: ".$url_ok); //Mail wurde gesendet
									  exit();
									} 
										else{
										  header("Location: ".$url_fehler); //Fehler beim Senden
										  exit();
										}
?>

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
			<textarea id="Nachricht" name="Nachricht" rows="10" cols="50"></textarea> <br><br>
		 
		<input type="submit" name="submit">
	</form>
	</div>
     
	 <div id="footer"></div>
    </body>
</html>
