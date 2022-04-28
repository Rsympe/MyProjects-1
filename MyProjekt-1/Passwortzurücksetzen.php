        <!DOCTYPE html>
<html>
<head>
	<title>Password Zurücksetzen</title>
	<link rel="shortcut icon" href="img/pet.logo.php" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="css/anmelden.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<?php
	session_start();
	$conn=mysqli_connect('localhost','sympengu','zitrone','sympengu') or die(mysqli_error());
	require_once('header.php');
	
			
	?>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<center>
	<div>
		<form method="get" action=" ">
			<input type="email" name="email" placeholder="Ihr Email eingeben" required="required" style="padding: 15px; width: 30%;">
			<button type="input" name="send" style="padding: 15px; width: 10%;">Senden</button>

			
		</form>
	</div>
</center>
<br><br><br><br><br><br><br><br>

	
	<?php
	session_start();

		if(isset($_GET['send'])){

			$email2=$_GET['email'];
			$_SESSION['email']=$email2;

			$sql = "SELECT * FROM User ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0  ) {

				while($row = $result->fetch_assoc() ) {

					if($row['Email']==$email2){

						$_SESSION['id1'] = $row['UserID'];

						header('location: zurück.php');

					}else{
						
					}


				}

				?>
				<center>
				<h2 style="color:red;">False Email !!!</h2>
				</center>

				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

				<?php
			}else{

				echo '0 results';
			}
		}
	?>




	<?php
		
		require_once('footer.php');

	?>

</body>
</html>
