    <!DOCTYPE html>
<html lang="de">
<head>
	<title>Hunde</title>
	<link rel="shortcut icon" href="img/logoKFSport2.png" type="image/x-icon">
	<meta charset="utf-8">
	
	<link rel="stylesheet" type="text/css" href="css/futter.css">
	
</head>
<body>


	<?php
	require_once('header.php');
	

			
	?>

	
	<?php

	$sql1 = "SELECT * FROM Artikel WHERE Kategorie= 'Hund'";
			$result1 = $conn->query($sql1);

			if ($result1->num_rows > 0) {
	    	// output data of each row
	    			while($row = $result1->fetch_assoc()) {

	    				?>
	    				
	    				<div class="article">
	    					<div class="entity">
		    				<img class="futter" src="images/<?php echo $row['Artikel_ID'];?>.png" width="300" height="250">
		    				<h3><?php echo $row['Artikelname'];?></h3>
		    				<h3>Preis: <?php echo number_format($row['Preis'],2,',',' ');?> €</h3>
		    				<h3>Typ: <?php echo $row['Typ'];?></h3>
		    				<?php if($row['bestand']!=0){?><a class="korb" href="warenkorb.php?action=add&amp;nr=<?php echo $row['ArtikelID'];?>&amp;s=<?php echo $row['Artikelname'];?>&amp;p=<?php echo $row['Preis'];?>"><p>In Warenkorb legen</p></a><?php }else{ echo'<h4 style="color:red;">Ausverkauft!</h4>';}?>
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