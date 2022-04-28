<!DOCTYPE html>
<html lang="de">
<head>
	<title>Artikel</title>
	<meta charset="utf-8">
	
	<link rel="stylesheet" type="text/css" href="css/artikel.css">
	
</head>
<body>

	<?php

	session_start();
	require_once('header.php');
	$conn=mysqli_connect('localhost','sympengu','zitrone','sympengu') or die(mysqli_error());

			
	?>

	<?php

	echo'<br><br><br><br>';

	$sql1 = "SELECT * FROM Artikel";
			$result1 = $conn->query($sql1);

			if ($result1->num_rows > 0) {
	    	// output data of each row
	    			while($row = $result1->fetch_assoc()) {

	    				?>
	    				
	    				<div class="article">
	    					<div class="entity">
	    					<img class="futter" src="images/<?php echo $row['Artikel_ID'];?>.png" width="300" height="250"></a>
		    				<h3><?php echo $row['Artikelname'];?></h3></a>
		    				<h3>Preis: <?php echo number_format($row['Preis'],2,',',' ');?> €</h3>
		    				<h3>Typ: <?php echo $row['Typ'];?></h3>

			    			</div>
		    			</div>

	    			<?php
	    			}

			} else {
   				 echo "0 results";
			}

	?>


	<?php

		
		require_once('footer.php');

	?>

</body>
</html>