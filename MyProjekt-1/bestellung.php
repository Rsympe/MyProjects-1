 <!DOCTYPE html>
<html lang="de">
<head>
	<title>Bestellung</title>
	<link rel="shortcut icon" href="img/pet.logo.php" type="image/x-icon">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bstellung.css">
	
</head>
<body>
	<?php
	$conn=mysqli_connect('localhost','sympengu','zitrone','sympengu') or die(mysqli_error());
	session_start();

	
	require_once('functn.php');

	?>

	<center><h1>Bestellung</h1></center>

	<center>
		<div class="bestell">
			<form method="post" action=" ">

				

		<?php

			$i = 0;

			$id=$_GET['id'];

			while($i< count($_SESSION['korb']['Artikel_ID'])){

				$Artikel_ID= $_SESSION['korb']['Artikel_ID'][$i];
				$menge= $_SESSION['korb']['Menge'][$i];
				$name=$_SESSION['korb']['Artikelname'][$i];
				$preis=$_SESSION['korb']['Preis'][$i];


				?>
				
						<label for="Artikel">Artikel:</label>
					
						<input class="Artikel_ID" type="text" name="Artikel_ID[]" id="Artikel" value="<?php echo $Artikel_ID;?>" required="required" size="3">
					
						<input class="Artikelname" type="text" name="Artikelname[]" id="Artikel" value="<?php echo $Artikelname;?>" required="required"><br><br><br>
				
					
						<label for="menge">Menge:</label>
						
						<input class="menge" type="text" name="menge[]" id="menge" value="<?php echo $Menge;?>" required="required"><br><br><br>
				
						<label for="preis">Preis:</label>
					
						<input class="preis" type="text" name="preis[]" id="preis" value="<?php echo $Preis;?>" required="required" >  <b> €</b>  
						<br><br><br>
				


				<?php
				$i++;
			}
		
		?>
				
						<label for="date">Datum:</label>
					
						<input class="datum" type="date" name="date" id="date" value="<?php echo date("Y-m-d");?>" required="required"><br><br>
				
						<label for="betrag">Betrag:</label>
					
						<input class="betrag" type="text" name="betrag" id="betrag" value="<?php echo $_GET['betrag'];?>" required="required"> €<br><br>
				
						<label for="adresse">Adresse:</label>
					
						<input class="straße" type="text" name="straße" id="adresse" placeholder="Straße eingeben" required="required">
					
						<input class="hausnr" type="text" name="hausnummer" id="adresse" placeholder="Hausnr eingeben" required="required">
					
						<input class="plz" type="text" name="postleitzahl" id="adresse" placeholder="PLZ eingeben" required="required">
					
						<input class="ort" type="text" name="ort" id="adresse" placeholder="Ort eingeben" required="required"><br><br><br>
						
						<button type="submit" name="bestell">Bestellen</button>
			
			</form>
		</div>
	</center>


	<?php

		if(isset($_POST['bestell'])){



			$Artikel_ID=$_POST['Artikel_ID'];
			$menge=$_POST['menge'];
			$betrag=$_POST['betrag'];
			$date=$_POST['date'];
			$straße=$_POST['straße'];
			$hausnr=$_POST['hausnummer'];
			$plz=$_POST['postleitzahl'];
			$ort=$_POST['ort'];

			

			


			$req="INSERT INTO Ort (Postleitzahl, Ort) values ('$plz','$ort')";
			$res=mysqli_query($conn,$req);

			$select = "SELECT * FROM Adresse";
				$result1 = $conn->query($select);

				if($result1->num_rows > 0 ){

					while($data = $result1->fetch_assoc() ){

						if($strasse==$data['Straße'] AND $hausnr==$data['Hausnummer'] AND $Postleitzahl==$data['Postleitzahl']){

							$etat= true;
							
						}else{
							$etat2= false;
						}

					}
							

				}else{

					echo'result 0';
				}

				if($etat==true){

				}elseif($etat2==false){

					$req2="INSERT INTO Versandadresse (Strasse, Hausnummer, Postleitzahl) values ('$strasse','$hausnr', (SELECT Postleitzahl FROM Ort WHERE Postleitzahl='$plz'))";
					$res2=mysqli_query($conn,$req2);
				}


			$req3="INSERT INTO Bestellung (KUNDE_ID, Betrag, Datum, VersandadresseID) values ('$id','$betrag', '$date', (SELECT VersandadresseID FROM Versandadresse WHERE Straße='$straße' AND Hausnummer='$hausnr' AND Postleitzahl='$plz'))";
			$res3=mysqli_query($conn,$req3);

			
			$i = 0;
			while($i< count($_POST['menge'])){

				$select1 = "SELECT Bestand FROM Artikel WHERE Artikel_ID = $Artikel_ID[$i] ";
				$result2 = $conn->query($select1);
				$data1 = $result2->fetch_assoc();
				$bestand=$data1['Bestand'];

				$req4="INSERT INTO Ist_für (BestellungID, Artikel_ID, Menge) values ((SELECT BestellungID FROM Bestellung  ORDER BY BestellungID DESC LIMIT 1), (SELECT Artikel_ID FROM Artikel WHERE Artikel.Artikel_ID=$Artikel_ID[$i]), $menge[$i])";
				$res4=mysqli_query($conn,$req4);

				$req5="UPDATE Artikel SET  Bestand=$bestand-$menge[$i]  WHERE Artikel_ID=$Artikel_ID[$i]  ";
				$res5=mysqli_query($conn,$req5);

				$i++;

			}

			

			?>
			<center>
			<div>
			<h2>Herzlichen Glückwunsch zu Ihrem Kauf</h2>
			<a href="warenkorb.php?deletekorb=true" style="text-decoration: none; color: blue; font-size: 18px;">Kaufen Sie noch!</a>
			</div>
			</center>

			<?php

		}

	?>


	<?php
	echo"<br><br><br><br><br>";
	require_once('footer.php');

	?>
</body>
</html>