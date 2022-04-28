
<!DOCTYPE html>
<html lang="de">
<head>
	<title>Anmelden Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/admin1.css"> 
</head>
<body>

	<?php

	require_once('head.php');

	session_start();

	$conn=mysqli_connect('localhost','sympengu','zitrone','sympengu') or die(mysqli_error());

	if(isset($_POST['melden'])){
		$user= $_POST['user'];
		$pass=$_POST['password'];
		$_SESSION['user']=$user;

		

		$sql = "SELECT * FROM Administrator";
		$result = $conn->query($sql);
		if ($result->num_rows > 0  ) {

			while($row = $result->fetch_assoc() ) {

				if($row['Username']==$user && $row['Password']==$pass){
					header('location:adminpage.php');

				}else{
					
				}


			}

			?>
						<br><br><br><br>
						<center>
						<div>
						<h2>Falsche Identifikatoren</h2>
						</center>

			<?php
		}else{

			echo '0 results';
		}
	}

	

			
	?>
<br><br>
<div class="wrapper">
	        <div class="container2">
	          
	            <form action=" " method="POST">
	              <label for="user">Adminname:</label>
	                <input type="text" name="user" placeholder="Username eingeben" id="user" required="required"/><br><br>
	              <label for="password">Password:</label>
	                <input type="password" name="password" placeholder="Password eingeben" id="password" required="required"/><br><br>
	                <button type="submit" class="btn2" name="melden">Anmelden</button>
	            </form>
	        </div>
	</div>
	<br><br><br>
	<?php
		
		
	?>

</body>
</html>