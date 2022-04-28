<?php
   session_start();
  $connection =mysqli_connect('localhost', 'sympengu' ,'zitrone' ,'sympengu' ) or die(mysqli_error());


  if( isset($_POST['melden'])){
  	 $username= $_POST['username'];
  	 $password= $_POST['password']; 
  	 $_SESSION['username']=$username; 
  	$sql = "SELECT *  FROM Administrator"; 
  	$result = $connection->query($sql);
  	if ( $result->num_rows > 0 ) {

  		while( $row = $result->fetch_assoc() ){
  			if ($row['Username'] ==$username && $row['Password']==$password){

  				header('location:admin.php');

  			}else{


  			}

  		}

  		echo"geht nicht";

  	}else{

  		echo"0 results";
  	}

  }



?>