<?php
	// Session Beginn und Verbindung zur Datenbank
	session_start();
	$pdo = new PDO('mysql:host=localhost;dbname=print', 'root', '');
		
?>
