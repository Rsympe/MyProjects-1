   <!DOCTYPE html>
<html lang="de">
<head>
	<title>Hunde</title>
	<link rel="shortcut icon" href="images/pet.logo.php" type="image/x-icon">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/Artikel.css">
	
</head>
<body>

	<?php

	session_start();
	require_once('profileconnectnav.php');
	$conn=mysqli_connect('localhost','sympengu','zitone','sympengu') or die(mysqli_error());

			
	?>

	
	<?php

	echo'<br><br><br><br>';

	$sql1 = "SELECT * FROM Artikel WHERE Kategorie= 'Hunde' ";
			$result1 = $conn->query($sql1);

			if ($result1->num_rows > 0) {
	    	// output data of each row
	    			while($row = $result1->fetch_assoc()) {

	    				?>
	    				
	    				<div class="article">
	    					<div class="entity">
		    				<img class="Artikel10" src="img/<?php echo $row['Artikelnr'];?>.jpg" width="400" height="360">
		    				<h3><?php echo $row['Artikelname'];?></h3>
		    				<h3>Preis: <?php echo number_format($row['Preis'],2,',',' ');?> €</h3>
		    				<h3>Größe: <?php echo $row['Groesse'];?></h3>
		    				<?php if($row['Bestand']!=0){?><a class="korb" href="warenkorb1.php?action=add&amp;nr=<?php echo $row['Artikelnr'];?>&amp;s=<?php echo $row['Artikelname'];?>&amp;p=<?php echo $row['Preis'];?>"><p>In Warenkorb legen</p></a><?php }else{ echo'<h4 style="color:red;">Ausverkauft!</h4>';}?>  
			    			</div>
		    			</div>

	    			<?php
	    			}

			} else {
   				 echo "0 results";
			}

	?>


	<?php
