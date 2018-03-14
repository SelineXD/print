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
		</div> <!--Ende container-->
	</div>
	<div id="content">
<?php
include("controlling.php");
?>	
	
	eingeloggt
	</div>
     
	 <div id="footer"></div>
    </body>
</html>
