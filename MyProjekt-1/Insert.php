<?php

	session_start();

	$conn=mysqli_connect('localhost','sympengu','zitrone','sympengu') or die(mysqli_error());

	if(isset($_POST['submit1'])){


		$Artikelname=$_POST['Artikelname'];
		$preis=$_POST['preis'];
		$marke =$_POST['marke'];
		$typ = $_POST['Artikeltyp'];
		$kategorie = $_POST['kategorie'];
		$status =$_POST['status'];
		$bestand = $_POST['anzahl'];
		$preis = $_POST['preis'];


		$req="INSERT INTO Artikel (Typ, Preis, bestand, Artikelname, Kategorie, Marke, Status) values ('$typ','$preis', '$bestand', '$Artikelname', '$kategorie','$marke', '$status')";
		$res=mysqli_query($conn,$req);
		header('location:adminpage.php?action=add');

	}



	

	?>