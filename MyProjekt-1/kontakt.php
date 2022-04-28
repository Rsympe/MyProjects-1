 <?php
	session_start();

	$conn=mysqli_connect('localhost','sympengu','zitrone','sympengu') or die(mysqli_error());


	if(isset ($_SESSION['user'])){

	}else{
		header('location: index.php');
	}

?>





<?php
	
	
	include 'footer.php';
			
?>


<!DOCTYPE html>
<html lang="de">
<head>

	<meta charset="utf-8">
	<title>E-commerce</title>
	<link rel="shortcut icon" href="img/pet.logo.com" type="image/x-icon">
	
</head>
<body>


</body>
</html>