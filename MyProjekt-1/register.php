<!DOCTYPE html>
<html lang="de">
<head>
  <title>Registrierung</title>
  <meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="css/register.css"> 
 
</head>


  <?php
  require_once('header.php');

            session_start();


            $conn=mysqli_connect('localhost','sympengu','zitrone','sympengu') or die(mysqli_error());
            $name=$_POST['nachname'];
            $vname=$_POST['vorname'];
            $email=$_POST['email'];
            $pwd=$_POST['password'];
            $pwd2=$_POST['password2'];
            $msg=$_POST['message'];

            if(isset($_POST['registrieren'])){
              if($pwd==$pwd2){

                if(isset($msg)){
                      
                  $req5="INSERT INTO KUNDE (Name,Vorname) values ('$name','$vname')";

                  $res5=mysqli_query($conn,$req5);

                  $req3="INSERT INTO Users (Email,KUNDE_ID,Passwort) values ('$email', (SELECT KUNDE_ID FROM KUNDE WHERE Name='$name' AND Vorname='$vname'),'$pwd')";
                  $res3=mysqli_query($conn,$req3);

                  header('location:login.php');
                }else{
                  echo'';
                }

              }else{
                echo'';
              }



            }

  

      
  ?>
  <br><br><br>
  <body>
    <section class=sform>
    <div class="formular">
    <div class="titled"><p class="h1">Registrierung</p>
      <form action=" " class="register" method="POST">
        <label for="vorname"><p>Vorname:</p></label>
        <input class="name" type="text" name="vorname" id="vorname" placeholder="Vorname eingeben" required="required"><br><br>

        <label for="nachname"><p>Nachname:</p></label>
        <input class="name" type="text" name="nachname" id="nachname" placeholder="Nachname eingeben" required="required"><br><br>

        <label for="email"><p>E-Mail:</p></label>
        <input class="name" type="email" name="email" id="email" placeholder="E-Mail eingeben" required="required"><br><br>

        <label for="passwd"><p>Password:</p></label>
        <input class="pass" type="password" name="password" id="passwd" placeholder="Password eingeben" required="required"><br><br>

        <label for="passwd2"><p>Password wiederholen:</p></label>
        <input class="pass" type="password" name="password2" id="passwd2" placeholder="Password eingeben" required="required"><br><br>

        <input class="check" type="checkbox" name="message" id="message" required="required" checked="checked" >
        <label class="mss" for="message">Ja, ich stimme den AGB und den Datenschutzbestimmungen<br> von Melo sowie einer Bonitätsprüfung zu.*</label><br><br>
        <button class="btn" type="submit" name="registrieren">Registrieren</button>
      </form>
    </div>
  </div>
</section>

<br><br>


</body>
</html>