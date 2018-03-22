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
			<a href="angebot.php">Angebot</a>
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

	<h1>Diese Fussballer haben am selben Tag wie du Geburtstag:</h1>    
		 <?php 
		 $enter= $_POST['Format'];
        
		
            $sql = "SELECT * FROM print WHERE Format = '$enter'";
            $result = $pdo->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                echo "<table><tr><td>Format</td><td>Bedruckt</td><td>Farbe</td><td>Papier</td><td>Preis</td><td>Währung</td></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . "<img src='" . $row["Format"]. "</td><td>" . $row["doppelseitig"]. "</td><td>" . $row["Farbe"]. "</td><td>" . $row["Papier"]. "</td><td>" . $row["Preis"]. "</td><td>" . $row["Währung"]. "</td></tr>";
                }
                echo "</table>";
            }   else {
                echo "Bitte geben Sie ein anderes Format ein. z.B. A4";
            }
            ?>
	
	
	
	
	</div>

	</body>
</html>
