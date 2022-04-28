  <?php
	session_start();

	$conn=mysqli_connect('localhost','sympengu','zitrone','sympengu') or die(mysqli_error());

	if(isset($_POST['melden'])){
		$user= $_POST['email'];
		$pass=$_POST['passwort'];
		

		$sql = "SELECT * FROM KUNDE , User,  WHERE KUNDE.UserID=User.UserID";
		$result = $conn->query($sql);
		if ($result->num_rows > 0  ) {

			while($row = $result->fetch_assoc() ) {

				if($row['Email']==$user && $row['Passwort']==$pass){
					$_SESSION['user']=$user;
					$_SESSION['id']= $row['KUNDE_ID'];
					$_SESSION['nachname']= $row['Nachname'];
					$_SESSION['vorname']= $row['Vorname'];
					$_SESSION['email']=$row['Email'];
					$_SESSION['pass']=$row['Passwort'];
					$_SESSION['indikator']=$row['Indikator'];


					header('location: profileconnect.php?action=index');

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



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/anmelden.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="wrapper">
	    <section class="login-container">
	        <div class="container2">
	          
	            <form action=" " method="POST">
	              <label for="email"><p>Email:</p></label>
	                <input type="text" name="username" placeholder="Benutzername eingeben" id="username" required="required"/><br><br>
	              <label for="password"><p>Passwort:</p></label>
	                <input type="password" name="password" placeholder="Password eingeben" id="password" required="required"/><br><br>
	                <p></p>
	                <p>Password vergessen?  Klicken Sie <a class="vergiss" href="passwordzurücksetzen.php">Hier</a></p>
	                <p></p>
	                <button type="submit" class="btn" name="melden">Anmelden</button>
	            </form>
	            <p>Haben Sie noch keine Konto?</p>
	            <button class="btn1" type="submit"><a href="registrieren.php">Registrieren</a></button>
	        </div>
	    </section>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br>
