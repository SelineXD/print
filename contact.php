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

<!--Captcha einfügen-->
<?php
	session_start(); // Session initialisieren

	/**
	 * generate captcha
	 *
	 * @param   _SESSIONNAME        session name
	 * @return  void
	 */
	function generateCaptcha($_SESSIONNAME) {
		
		if(trim($_SESSIONNAME) == '') // Überprüfen ob der Sessionname leer ist
			die('Sessionname ist leer!'); // Script beenden und String ausgeben
		
		$font = './captcha.ttf'; // TTF Schriftart für Captcha
		
		$image = imagecreate(125, 30); // Bild erstellen mit 125 Pixel Breite und 30 Pixel Höhe
		imagecolorallocate($image, 255, 255, 255); // Bild weis färben, RGB
		
		$left = 5; // Initialwert, von links 5 Pixel
		$signs = 'aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ0123456789';
			// Alle Buchstaben und Zahlen
		$string = ''; // Der später per Zufall generierte Code
		
		for($i = 1;$i <= 6;$i++) // 6 Zeichen
		{
			$sign = $signs{rand(0, strlen($signs) - 1)};
						/*
							Zufälliges Zeichen aus den oben aufgelisteten
							strlen($signs) = Zählen aller Zeichen
							rand = Zufällig zwischen 0 und der Länge der Zeichen - 1
							
							Grund für diese Rechnung:
							Mit den Geschweiften Klammern kann man auf ein Zeichen zugreifen
							allerdings fängt man dort genauso wie im Array mit 0 an zu zählen
							
						*/
			$string .= $sign; // Das Zeichen an den gesamten Code anhängen
			imagettftext($image, 20, rand(-10, 10), $left + (($i == 1?5:15) * $i), 25, imagecolorallocate($image, 200, 200, 200), $font, $sign);
					// Das gerade herausgesuchte Zeichen dem Bild hinzufügen
			imagettftext($image, 16, rand(-15, 15), $left + (($i == 1?5:15) * $i), 25, imagecolorallocate($image, 69, 103, 137), $font, $sign);
					// Das Zeichen noch einmal hinzufügen, damit es für einen Bot nicht zu leicht lesbar ist
		}
		
		$_SESSION[$_SESSIONNAME] = $string; // Den Code in die Session mit dem Sessionname speichern für die Überprüfung
		
		header("Content-type: image/png"); // Header für ein PNG Bild setzen
		imagepng($image); // Ausgaben des Bildes
		imagedestroy($image); // Bild zerstören
		
	}

	$sessionName = 'captchacode'; // Sessionname

	if(isset($_GET['captcha']))
	{
		generateCaptcha($sessionName); // Funktionsaufruf, erste Parameter ist der Name für die Session
		exit(); // Script beenden, es soll keine weitere Ausgabe stattfinden
	}

	if(isset($_POST['check'])) // Wurde das Formular abgeschickt
	{
		if($_SESSION[$sessionName] == trim($_POST['captcha'])) // Stimmt die Eingabe mit dem Code überein
			echo "Richtig";
		else
			echo "Falsch";
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
			<textarea id="Nachricht" name="Nachricht" rows="10" cols="50"></textarea> <br><br><br>
			
		<a action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<fieldset>
			<label for="captcha">
				Captcha
			</label>
			<input type="text" name="captcha" id="captcha" />
			<img src="<?php echo $_SERVER['PHP_SELF']; ?>?captcha" alt="" />
			<button type="submit" name="check">Überprüfen</button>
		</fieldset><br><br><br>
		 
		<input type="submit" name="submit">
	</form>
	</div>
     
	 <div id="footer"></div>
    </body>
</html>
