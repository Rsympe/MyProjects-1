    <?php
	session_start();
	$conn=mysqli_connect('localhost','wafotots','Franklinw1997','wafotots') or die(mysqli_error());

	echo'<br><br>';

?>

<meta charset="utf-8">
<title>Druecken</title>
<link rel="shortcut icon" href="images/pet.logo.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="css/drucken.css">




<body>

<?php
	if(isset($_GET['action'])){

		if($_GET['action']=='print'){

			$bid=$_GET['id'];
			$kid=$_GET['kid'];

			$select = "SELECT * FROM Bestellung ,Ist_für, Artikel, KUNDE WHERE Bestellung.BestellungID=Ist_für.BestellungID AND Ist_für.BestellungID=$bid AND Artikel.Artikelnr= Ist_für.Artikelnr AND KUNDE.KundeID = Bestellung.KundeID ";
				$result = $conn->query($select);
				

			if ($result->num_rows > 0  ) {
    		// output data of each row

				?>

				<br><br>
				<div class="button"><button onclick="window.print();"><img src="img/print.png" width="30"></button></div>
				<br><br>
					<center>
						<div class="druck">

							
							<table  class="tab" width='1200' style="border:5px double black;">

								<tr>
									<td><img src="img/logoKFSport2.png" alt="logo" width="70" height="60"class="logo"></td>
									<td></td>
									<td></td>
									<td></td>
									<td style="font-weight: bolder;"><p>AuftragNr: <?php echo $_SESSION['Besid']; ?></p></td>
								</tr>
		        					<tr class="gra">
		        						<td><p>Auftragnr</p></td>
		        						<td><p>Artikelname</p></td>
		        						<td><p>Kunde</p></td>
		        						<td><p>Menge</p></td>
		        						<td><p>Preis</p></td>
		        						
		        						
		        						
		        					</tr>
						<?php

		    			while($row = $result->fetch_assoc() ) {

		    				$_SESSION['betrag'] = $row['Betrag'];
		    				$_SESSION['datum']=$row['Datum'];
		    				$_SESSION['Besid']=$row['BestellungID'];

		    				
		        			
		        			?>
		        			<tr>
		        						<td><p><?php echo $row["BestellungID"];?></p></td>
		        						<td ><P><?php echo $row["Artikelname"];?></P></td>
		        						<td><p><?php echo $row["Nachname"];?>  <?php echo $row["Vorname"];?></p></td>
		        						<td ><p><?php echo $row["Menge"];?></p></td>
		        						<td ><p><?php echo $row["Preis"];?> €</p></td>
			        					
			        				</tr>

			        				
		        			
		  
		        			<?php
		        				
		    			}

		    			?>

		    			<tr class="betrag">
		    				
		    				<td>
		    					<label for="betrag">Betrag:</label>
		    				</td>
		    				<td>
		    					<p><?php echo $_SESSION['betrag'];?> €</p>
		    				</td>
		    				<td>
		    					
		    				</td>
		    				<td>
		    					
		    				</td>
		    				<td>
		    					
		    				</td>
		    			</tr>

		    			<tr class="date">
		    				<td>
		    					<label for="date">Datum:</label>
		    				</td>
		    				<td>
				
								<center><input type="date" name="date" id="date" value="<?php echo $_SESSION['datum'];?>" required="required"></center>
		    				</td>
		    			</tr>

		    		
		    					

		    		</table>

		 

		    		</div>
		    	</center>

		    			<?php
					} else {
		   				 echo "0 results";
					}
		}
	}

?>
</body>