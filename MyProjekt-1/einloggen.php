
<!DOCTYPE html>
<html lang="de">
<head>
	<title>Anmelden</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/login.css"> 
</head>
<body>

	<?php

	require_once('head.php');

	session_start();

	$conn=mysqli_connect('localhost','sympengu','zitrone','sympengu') or die(mysqli_error());

	if(isset($_POST['melden'])){
		$email= $_POST['email'];
		$pass=$_POST['password'];
		

		$sql = "SELECT * FROM KUNDE , Users WHERE KUNDE.KUNDE_ID=Users.KUNDE_ID";
		$result = $conn->query($sql);
		if ($result->num_rows > 0  ) {

			while($row = $result->fetch_assoc() ) {

				if($row['Email']==$email && $row['Passwort']==$pass){
					$_SESSION['user']=$row['Name'];
					$_SESSION['id']= $row['KUNDE_ID'];
					$_SESSION['nachname']= $row['Name'];
					$_SESSION['vorname']= $row['Vorname'];
					$_SESSION['email']=$row['Email'];
					$_SESSION['pass']=$row['Passwort'];


					header('location: artikel.php');

				}else{
					
				}


			}

			?>

			<br><br>
			<center>
			<h2 style="color: red;">Falsches Passwort oder Falscher Benutzername !!!</h2>
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
	              <label for="email">Email:</label>
	                <input type="email" name="email" placeholder="Email eingeben" id="email" required="required"/><br><br>
	              <label for="password">Password:</label>
	                <input type="password" name="password" placeholder="Password eingeben" id="password" required="required"/><br><br>
	                 <p>Password vergessen?  Klicken Sie <a class="vergiss" href="Passwortzurücksetzen.php">Hier</a></p><br><br>
	                <button type="submit" class="btn" name="melden">Einloggen</button>
	            </form>
	            <p>Haben Sie noch keine Konto? <a href="register.php">Registrieren<a/></p>
	           
	        </div>
	</div>
	<br><br><br>
	

</body>
</html>