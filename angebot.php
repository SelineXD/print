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
			<form action="ausgabe.php" method="post">
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
		</div>

	</body>
</html>
