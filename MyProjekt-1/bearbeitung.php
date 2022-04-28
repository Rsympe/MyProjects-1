<?php

session_start();
$conn=mysqli_connect('localhost','sympengu','zitrone','sympengu') or die(mysqli_error());
if(isset($_SESSION['username'])){


}else{
	header('location: index.php');
}

	include 'header.php';
?>


<!DOCTYPE html>
<html lang="de">
<head>

	<meta charset="utf-8">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	
</head>
<body>
	<nav class="admin1">
		<h1 class="admin"><img src="img/admin.png" width="30" height="25"> Website-Verwaltung </h1>
		<h1 class="logout"><a href="?action=logout">Abmelden</a></h1>
	</nav>


	<div class="champ">

		<ul>
			<li><center><a href="?action=add"><p><img src="img/administrator.png" width="20" height="20">Artikel anlegen</p></a></center></li>
			<li><center><a href="?action=modifyanddelete"><p><img src="img/administrator.png" width="20" height="20">Artikel bearbeiten</p></a></center></li>

		</ul>
	</div>

	<br><br>
</body>
</html>


	