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
					?>
				</div>
			</div> <!--Ende container-->
		</div>
		<div id="content">
	
<?php
	$email_from = "absender@domain.de";   //Absender falls keiner angegeben wurde
	$sendermail_antwort = true;      //E-Mail Adresse des Besuchers als Absender. false= Nein ; true = Ja
	$name_von_emailfeld = "Email";   //Feld in der die Absenderadresse steht
	 
	$empfaenger = "seline.andenmatten@lernende.bfo-vs.ch"; //Empfänger-Adresse
	$mail_cc = ""; //CC-Adresse, diese E-Mail-Adresse bekommt einer weitere Kopie
	$betreff = "Anfrage"; //Betreff der Email
	 
	$url_ok = "mail-erfolg.php"; //Zielseite, wenn E-Mail erfolgreich versendet wurde
	$url_fehler = "mail-misserfolg.php"; //Zielseite, wenn E-Mail nicht gesendet werden konnte
	 
	 
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
	} else{	
	  echo $empfaenger . $betreff . $msg . $header;
	  //header("Location: ".$url_fehler); //Fehler beim Senden
	  exit();
	}
?>
<?php
	// Bearbeiten des Formulars //
		if ($_POST['captcha_code'] == $_SESSION['captcha_spam']) {
		// Das Captcha wurde korrekt ausgefüllt //
							
		// [HIER] kann jetzt der PHP-Code hin, den vorher ohnehin genutzt hast, um das Formular zu verarbeiten.
			} else {
		// Captcha wurde falsch ausgefüllt, Fehler ausgeben. //
			echo 'Du hast den Captcha-Code falsch eingegeben!';
		}
?>
<?php
	/* PHP-Captcha von:		http://www-coding.de
	 * Tutorial Artikel: 	http://www-coding.de/so-gehts-eigenes-captcha-mit-php/
	 */
 
 	session_start(); 
	unset($_SESSION['captcha_spam']); 
	
	// Variablen (können angepasst werden) //
	$captcha_bg_img 	= 'bg_captcha.png'; 						// Pfad zum Hintergrundbild
	$captcha_over_img 	= 'bg_captcha_over.png';					// Pfad zum Bild, was über das Captcha gelegt wird
	$font_file 			= dirname(__FILE__).'/railway-webfont.ttf';	// Pfad zur Schriftdatei
	$font_size			= 25; 										// Schriftgröße
	$text_angle			= mt_rand(0, 5);							// Schriftwinkel (Werte zwischen 0 und 5)
	$text_x				= mt_rand(0, 18);							// X-Position (Werte zwischen 0 und 18)
	$text_y				= 35;										// Y-Position
	$text_chars 		= 5;										// Länge des Textes
	$text_color			= array(0, 0 , 0);							// Textfarbe (R, G, B)
	
	// Funktion um zufälligen String zu generieren //
	function rand_string($length=5) {
		$str = array_merge(range('A', 'Z'), range(1, 9));
		for ($i = 1; $i <= (count($str)*2); $i++) {
			$swap = mt_rand(0,count($str)-1); $tmp = $str[$swap]; $str[$swap] = $str[0]; $str[0] = $tmp;
		}
		return substr(implode('', $str),0,$length);
	}

	// Zufälligen Text generieren und in der Session speichern //
	$text = rand_string($text_chars);
	$_SESSION['captcha_spam'] = $text;
    
	// Header: Mitteilen, dass es sich um ein Bild handelt und dass dieses nicht im Cache gespeichert werden soll //
	header('Expires: Mon, 26 Jul 1990 05:00:00 GMT');
	header("Last-Modified: ".date("D, d M Y H:i:s")." GMT");
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');
	header('Content-type: image/png');
	
	// Captcha Bild erstellen, Text schreiben & Bild darüber legen //
	$img = ImageCreateFromPNG($captcha_bg_img);
	$text_color = ImageColorAllocate($img, $text_color[0], $text_color[1], $text_color[2]);
	imagettftext($img, $font_size, $text_angle, $text_x, $text_y, $text_color, $font_file, $text);
	imagecopy($img, ImageCreateFromPNG($captcha_over_img), 0, 0, 0, 0, 140, 40);
	
	// Ausgabe und Löschen des Bildes //
	imagepng($img); 
	imagedestroy($img); 
?>

		</div>

	</body>
</html>