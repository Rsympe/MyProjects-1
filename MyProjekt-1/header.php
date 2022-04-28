<?php
  session_start();

  $conn=mysqli_connect('localhost','sympengu','zitrone','sympengu') or die(mysqli_error());
?>


   <!DOCTYPE html>
    <html lang ="de-De">
     <head> 
    <title>E-commerce</title>
   <link rel="stylesheet" href="css/head.css">
    <link rel ="stylesheet" type= "text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>

    <body>
      <header>
      <h1>Melo</h1>
        <img src = "images/pet.logo.png"  witdth = "40" height= "40"/>
     <a href="register.php"><button type="submit">Regitrieren</button></a>
          <style> 
           button{
       color:white;
background-color :blue;
    font-family: arial;
     border-radius : 10px;
     margin-right:20px;
  margin-left:90px;
    float:right;
   height: "70%" ;
   width: 100px;
   margin-bottom: 20px;
   
   }
   
    </style>
  
      
     
    <nav> 
       <ul> 
       <li> <a href ="hund.php">Hund</a></li> 
        <li> <a href = "katze.php">Katze</a> </li> 
        <li> <a href = "hilfe.php"> Hilfe </a></li> 
        <li> <a href = "kontaktc.php"> Kontakt</a> </li> 
        <li><a href  = "feedback.php">Feedback</a> </li>   
         <li class="register"><a href  = "einloggen.php">Einloggen</a> </li>
         </ul> 
          </nav> 
      
  </header>


</body>
</html>