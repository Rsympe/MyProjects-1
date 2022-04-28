<?php

session_start();
$conn=mysqli_connect('localhost','sympengu','zitrone','sympengu') or die(mysqli_error());


	include 'head.php';
?>


<!DOCTYPE html>
<html lang="de">
<head>

	<meta charset="utf-8">
	<title>E-commerce</title>
	<link rel="shortcut icon" href="images/melogo.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/adminpage.css">
	
</head>
<body>
	<nav class="admin1">
		<h1 class="admin"> Website-Verwaltung <?php echo $_SESSION['username'];?></h1>
		<h1 class="logout"><a href="?action=logout">Abmelden</a></h1>
	</nav>


	<div class="champ">

		<ul>
			<li><center><a href="?action=add"><p><img src="images/adminp.png" width="20" height="20">Artikel anlegen</p></a></center></li>
			<li><center><a href="?action=modifyanddelete"><p><img src="images/adminp.png" width="20" height="20">Artikel bearbeiten</p></a></center></li>
			<li><center><a href="?action=printandcancel"><p><img src="images/adminp.png" width="20" height="20">Auftrag bearbeiten </p></a></center></li>
			<li><center><a href="?action=storniert"><p><img src="images/adminp.png" width="20" height="20">Stornierung validieren</p></a></center></li>
		</ul>
	</div>

	<br><br>
</body>
</html>



<?php
	

	if(isset($_GET['action'])){
	if($_GET['action'] =='add'){



	?>
	<div class="anlegen">
		<form class="form" action="Insert.php" method="post" enctype="multipart/form-data">
			<label id="Name"><p>Artikelname:</p></label>
			<input type="text" name="Artikelname" id="Name" required="required">
			<label id="marke"><p>Marke:</p></label>
			<select name="marke" id="marke" required="required">
				<option value = "none">_</option>
  				<option value="Carny">Carny</option>
  				<option value="Whiskas" >Whiskas</option>
  				<option value="Mac's">Mac's</option>
 			 	<option value="Gourmet" >Gourmet</option>
 			 	<option value="Müllers Naturhof" >Müllers Naturhof</option>
 			 	<option value="Hills" >Hills</option>
 			 	<option value="Josera" >Josera</option>
 			 	<option value="Yakara" >Yakara</option>
 			 	<option value="Vitakraft" >Vitakraft</option>
                <option value="kitekat" >Kitekat</option>
                <option value="frolic" >Frolic</option>

			</select>
			<label id="Typ"><p>Artikel_Typ:</p></label>
			<select name="Artikeltyp" id="Typ" required="required">
				<option value = "none">_</option>
  				<option value="Nassfutter" >Nassfutter</option>
  				<option value="Trockenfutter" >Trockenfutter</option>
  				 <option value="Snacks" >Snacks</option>
  				
			</select>
			<label id="kategorie"><p>Kategorie:</p></label>
			<select name="kategorie" id="kategorie" required="required">
				<option value = "none">_</option>
  				<option value="Hund">Hund</option>
  				<option value="Katze" >Katze</option>
			</select>
			<label id="status"><p>Status:</p></label>
			<select name="status" id="status" required="required">
				<option value = "none">_</option>
  				<option value="Sale" >Sale</option>
  				<option value="Neuheiten" >Neuheiten</option>
			</select>
			<label id="anzahl"><p>Bestand:</p></label>
			<input type="number" name="anzahl" id="anzahl" required="required">
			<label id="Preis"><p>Preis:</p></label>
			<input type="text" name="preis" id="preis" required="required">
			<label id="Gewicht"><p>Gewicht:</p></label>
			<input type="text" name="gewicht" id="gewicht" required="required">
			
			
			
			<center><button type="submit" name="submit1"><p>Anlegen</p></button></center>

			
			
		</form>
	</div>



	<?php

		

		}else if($_GET['action'] =='modifyanddelete'){

			
			$sql = "SELECT * FROM Artikel ORDER BY Artikel_ID";
			$result = $conn->query($sql);

		
			if ($result->num_rows > 0  ) {
    		// output data of each row


				?>
		
	        		
				
				<table class="table"  width='1200'>
        					<tr>
        						<th class="Artikel_ID">Artikel_ID</th>
        						<th>Artikelname</th>
        						<th>Typ</th>
        						<th>Status</th>
        						<th>Marke</th>
        						<th>Kategorie</th>
        						<th>Bestand</th>
        						<th>Preis</th>
        						<th>Gewicht(kg)</th>
     
        					    <th>Ändern</th>
        						<th>Löschen</th>
        					</tr>

				<?php

    			while($row = $result->fetch_assoc() ) {


        			
        			?>
        				
   
        				
        				
        					<tr>
        						<td class="td" width="80"><P><?php echo $row["Artikel_ID"];?></P></td>
        						<td class="td" width="300"><P><?php echo $row["Artikelname"];?></P></td>
        						<td class="td" width="100"><P><?php echo $row["Typ"];?></P></td>
        						<td class="td" width="100"><P><?php echo $row["Status"];?></P></td>
        						<td class="td" width="100"><P><?php echo $row["Marke"];?></P></td>
        						<td class="td" width="100"><P><?php echo $row["Kategorie"];?></P></td>
        						<td class="td" width="100"><P><?php echo $row["bestand"];?></P></td>
        						<td class="td" width="100"><P><?php echo $row["Preis"];?></P></td>
        						 <td class="td" width="100"><P><?php echo $row["Gewicht"];?></P></td>
        						
        						
        						
        					
        						<td width="90"><center><a href="?action=modify&amp; Artikel_ID=<?php echo $row['Artikel_ID']; ?>"><img src="images/edit.png" width="30" height="30"></a></center></td>
  
	        					<td width="90"><center><a href="?action=delete&amp; Artikel_ID=<?php echo $row['Artikel_ID']; ?>"><img src="images/delete.png" width="30" height="30"></a></center></td>
	        				</tr>

	        			
        			

        			<?php
        		
        				
    			}

    		
    			?>

    			</table>



    			<?php

			} else {
   				 echo "0 results";
			}

			$conn->close();
            
	

		}else if($_GET['action'] =='delete'){

			$id=$_GET['Artikel_ID'];

			$sql = "DELETE FROM Artikel WHERE Artikel_ID=$id";
			$result = $conn->query($sql);
			header('location:adminpage.php?action=modifyanddelete');

		}else if($_GET['action']=='logout'){

			session_destroy();
			header('location: admin.php');
			



		}else if($_GET['action']=='modify'){

			$id1=$_GET['Artikel_ID'];
			$_SESSION['id']= $id1;

			$select = "SELECT * FROM Artikel WHERE Artikel_ID=$id1";
			$result1 = $conn->query($select);
			$data = $result1->fetch_assoc();


			if(isset($_POST['submit2'])){
				$Artikelname=$_POST['Artikelname'];
				$preis=$_POST['preis'];
				$marke =$_POST['marke'];
				$typ = $_POST['Artikeltyp'];
				$kategorie = $_POST['kategorie'];
				$status =$_POST['status'];
				$bestand= $_POST['anzahl'];
				$Gewicht= $_POST['gewicht'];

				


				$req="UPDATE Artikel SET Artikelname='$Artikelname', Kategorie='$kategorie', Status='$status', Marke='$marke', Typ='$typ', bestand='$bestand', Preis='$preis' ,Gewicht='gewicht',WHERE Artikel_ID=$id1 ";
					$res=mysqli_query($conn,$req);
				header('location:adminpage.php?action=modifyanddelete');

			}



		?>

		<div class="anlegen">
		<form class="form" action=" " method="post">
			<label id="Artikelname"><p>Artikelname:</p></label>
			<input value="<?php echo $data['Artikelname'];?>" type="text" name="Artikelname" id="Artikelname" required="required">
			<label id="marke"><p>Marke:</p></label>
			<select name="marke" id="marke" required="required">

				
				<option value = "none">_</option>
  				<option value="Carny">Carny</option>
  				<option value="Whiskas" >Whiskas</option>
  				<option value="Mac's">Mac's</option>
 			 	<option value="Gourmet" >Gourmet</option>
 			 	<option value="Müllers Naturhof" >Müllers Naturhof</option>
 			 	<option value="Hills" >Hills</option>
 			 	<option value="Josera" >Josera</option>
 			 	
 			 	
			</select>
			<h4 class="kl" style="color:red;"><?php echo $data['Marke'];?></h4>
			
			<label id="Artikeltyp"><p>Artikel_Typ:</p></label>
			<select name="Artikeltyp" id="Artikeltyp" required="required">

				<option value = "none">_</option>
  				<option value="Nassfutter" >Nassfutter</option>
  				<option value="Trockenfutter" >Trockenfutter</option>
  				
  				
  				
			</select>
			<h4 class="kl" style="color:red;"><?php echo $data['Typ'];?></h4>

			<label id="kategorie"><p>Kategorie:</p></label>
			<select name="kategorie" id="kategorie" required="required" >

				
				<option value = "none">_</option>
  				<option value="Hund">Hund</option>
  				<option value="Katze" >Katze</option>
			</select>
			<h4 class="kl" style="color:red;"><?php echo $data['Kategorie'];?></h4>

			<label id="status"><p>Status:</p></label>
			<select name="status" id="status" required="required">

				
				<option value = "none">_</option>
  				<option value="Sale" >Sale</option>
  				<option value="Neuheiten" >Neuheiten</option>
			</select>
			<h4 class="kl" style="color:red;"><?php echo $data['Status'];?></h4>

			<label id="anzahl"><p>Bestand:</p></label>
			<input value="<?php echo $data['bestand'];?>" type="number" name="anzahl" id="anzahl" required="required">
			<label id="preis"><p>Preis:</p></label>
			<input value="<?php echo $data['Preis'];?>" type="text" name="preis" id="preis" required="required">
			<label id="gewicht"><p>Gewicht:</p></label>
			<input value="<?php echo $data['gewicht'];?>" type="number" name="gewicht" id="gewicht" required="required"><br><br>
			<center><button type="submit" name="submit2"><p>Ändern</p></button></center>

			
			
		</form>
	</div>

	<?php


		}else if($_GET['action']=='printandcancel'){

			$sql = "SELECT * FROM Bestellung, Ist_für, Artikel, KundeKF, Versandadresse, Ort WHERE Bestellung.BestellungID=Ist_für.BestellungID  AND Ist_für.ArtikelID=Artikel.ArtikelID AND Bestellung.KundeID=KundeKF.KundeID  AND Bestellung.VersandadresseID = Versandadresse.VersandadresseID AND Versandadresse.Postleitzahl=Ort.Postleitzahl";
					$result = $conn->query($sql);

					if ($result->num_rows > 0  ) {
		    		// output data of each row


						?>
						<div>
							<table class="table"  width='1200'>
		        					<tr>
		        						<th>Auftragnr</th>
		        						<th>Artikelname</th>
		        						<th>Menge</th>
		        						<th>Preis</th>
		        						<th>Datum</th>
		        						<th>Nachname</th>
		        						<th>Vorname</th>
		        						<th>Versandadresse</th>
		        						<th>Print</th>
		        						
		        						
		        						
		        						
		        					</tr>
						<?php

						

		    			while($row = $result->fetch_assoc() ) {

		
		        			
		        			?>
		        			<tr>
		        					
										<td width="70"><p><?php echo $row["BestellungID"];?></p></td>
		        						<td ><P><?php echo $row["Artikelname"];?></P></td>
		        						<td ><P><?php echo $row["Menge"];?></P></td>
		        						<td ><P><?php echo $row["Preis"];?> €</P></td>
		        						<td ><P><?php echo $row["Datum"];?></P></td>
		        						<td ><P><?php echo $row["Nachname"];?></P></td>
		        						<td ><P><?php echo $row["Vorname"];?></P></td>
		        						<td ><P><?php echo $row["Strasse"];?> <?php echo $row["Hausnummer"];?> <?php echo $row["Postleitzahl"];?> <?php echo $row["Ort"];?></p></td>
		        						<td width="90"><center><a href="drucken.php?action=print&amp; id=<?php echo $row['BestellungID']; ?>&amp; kid=<?php echo $row['KundeID']; ?>" target="_blank"><img src="img/print.png" width="30"></a></center></td>
		        						
			        					
			        				</tr>
			        		

			        				
		        			
		  
		        			<?php
		        				
		    			}

		    			?>
		    		</table>

		    		</div>


		    			<?php
					} else {
		   				 echo "<center><p style='color:red; font-size:30px; font-weight: bold;'>Keine Auftrag vorhanden</p></center>";
					}

		}else if($_GET['action']=='storniert'){

			$sql = "SELECT * FROM Storniert, KundeMelo, User, Telefonnummer_Kunde WHERE KundeKF.NutzerID=User.UserID AND Storniert.KundeID=KundeKF.KundeID AND KundeKF.Kontakt=Telefonnummer_Kunde.ID ";
					$result = $conn->query($sql);

					if ($result->num_rows > 0  ) {
		    		// output data of each row


						?>
						<div>
							<table class="table"  width='1200'>
		        					<tr>
		        						<th>Auftragnr</th>
		        						<th>Datum</th>
		        						<th>Nachname</th>
		        						<th>Vorname</th>
		        						<th>Kontakt</th>
		        						<th>Validierung</th>
		        						
		        						
		        						
		        					</tr>
						<?php

						

		    			while($row = $result->fetch_assoc() ) {

		
		        			
		        			?>
		        			<tr>
		        					
										<td><p><?php echo $row["BestellungID"];?></p></td>
		        						<td ><P><?php echo $row["Datum"];?></P></td>
		        						<td ><P><?php echo $row["Nachname"];?></P></td>
		        						<td ><P><?php echo $row["Vorname"];?></P></td>
		        						<td ><a href="mailto:<?php echo $row['Email'];?>"><p><?php echo $row["Email"];?></a></p></td>
		        					
		        						<td><center><a href="?action=cancel&amp; id=<?php echo $row['BestellungID']; ?>"><img src="img/valide.png" width="33"></a></center></td>
			        					
			        				</tr>
			        		

			        				
		        			
		  
		        			<?php
		        				
		    			}

		    			?>
		    		</table>

		    		</div>


		    			<?php
					} else {

		   				 ?>
		   				 <center><h1 style="color:red;">keine Stornierung vorhanden</h1></center>

		   				 <?php
					}


		}else if($_GET['action']=='cancel'){

			$bid2=$_GET['id'];

			$sql = "SELECT * FROM Storniert, KundeKF, Artikel, Ist_für WHERE  Storniert.KundeID=KundeKF.KundeID AND Storniert.BestellungID=Ist_für.BestellungID AND Ist_für.ArtikelID=Artikel.ArtikelID AND Storniert.BestellungID=$bid2 ";
					$result = $conn->query($sql);

					if ($result->num_rows > 0  ) {
		    		// output data of each row


						?>
						<div>
							<form method="post" action=" ">
							<table class="table"  width='1200'>
		        					<tr>
		        						<th>Auftragnr</th>
		        						
		        						<th>Artikelname</th>
		        						<th>Menge</th>
		        						<th>Datum</th>
		        						<th>Kunde</th>
		        						
		        						
		        						
		        						
		        						
		        						
		        					</tr>
						<?php

						

		    			while($row = $result->fetch_assoc() ) {

		    				$_SESSION['bid3']=$row['BestellungID'];

		
		        			
		        			?>
		        			<tr>
		        					
										<td><p><?php echo $row["BestellungID"];?></p></td>
		        						<td ><P><input type="text" name="ArtikelID[]" value="<?php echo $row['ArtikelID'];?>" size="2">  <?php echo $row["Artikelname"];?></P></td>
		        						<td ><p> </p><input type="number" name="menge1[]" value="<?php echo $row["Menge"];?>" required="required"></td>
		        						<td ><P><?php echo $row["Datum"];?></P></td>
		        						<td ><p><?php echo $row["Nachname"];?>  <?php echo $row["Vorname"];?></p></td>
		        					
		        		
			        					
			        				</tr>
			        		

			        				
		        			
		  
		        			<?php
		        				
		    			}

		    			?>
		    		</table>

		    		<br><br><br><br>

		    		<center><button class="btn10" type="submit" name="stornier">Bestellung stonieren</button></center>
		    	</form>


		    		</div>


		    			<?php
					} else {
		   				 echo "0 results";
					}


		}
}


if(isset($_POST['stornier'])){

	$menge1=$_POST['menge1'];
	$ArtikelID=$_POST['Artikel_ID'];
	$bid3=$_SESSION['bid3'];

	$i = 0;
	while($i< count($_POST['menge1'])){

		

		$select1 = "SELECT Bestand FROM Artikel WHERE Artikel_ID = $Artikel_ID[$i] ";
		$result2 = $conn->query($select1);
		$data1 = $result2->fetch_assoc();
		$bestand=$data1['Bestand'];

		$req5="UPDATE Artikel SET  Bestand=$bestand+$menge1[$i]  WHERE Artikel_ID=$Artikel_ID[$i]  ";
		$res5=mysqli_query($conn,$req5);

		$i++;

	}


	$sql1 = "DELETE FROM Storniert WHERE BestellungID=$bid3";
	$result1 = $conn->query($sql1);

	$sql2 = "DELETE FROM Ist_für WHERE BestellungID=$bid3";
	$result2 = $conn->query($sql2);

	$sql3 = "DELETE FROM Bestellung WHERE BestellungID=$bid3";
	$result3 = $conn->query($sql3);

	header('Location:admin.php?action=storniert');

}
		

?>