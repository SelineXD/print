<!DOCTYPE HTML>
<html>
    <head>
        <title>Print</title>
		<link rel="stylesheet" href="style.css">
    </head>
    <body>
<div id="header">
	<div class="container">
		<div id="logo">Printers</div>
		<div id="share-buttons">
			<a href="http://www.facebook.com/sharer.php?u=https://simplesharebuttons.com" target="_blank">
	        		<img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" /></a>
			<a href="https://twitter.com/share?url=https://simplesharebuttons.com&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
	        		<img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" /></a>
			</div>
			<a href="contact.php">Kontakt</a>
			<a href="angebot2.php">Angebot </a>
			<a href="logout.php">Logout</a>
			
		</div> <!--Ende container-->
	</div>
	<div id="content">
	<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=searchlove', 'root', '');

if(!isset($_SESSION['userid'])) {
 die('Bitte zuerst <a href="login.php">einloggen</a>');
}
 
//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];
 
echo "Hallo User: ".$userid;
?>
	
	
	eingeloggt
	</div>
     
	 <div id="footer"></div>
    </body>
</html>
