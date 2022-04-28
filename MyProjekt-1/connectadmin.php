<?php

   		session_start();
   		$connection =mysqli_connect('localhost', 'sympengu' ,'zitrone' ,'sympengu' ) or die(mysqli_error());

   	
   ?>
                   <center>

   <div class="wrapper">
	        <div class="container2">
	            <form action="artikel.php" method="POST">
	              <label for="username"><p>Benutzername:</p></label>
	                <input type="text" name="username" placeholder="Benutzername eingeben" id="username" required="required"/><br><br>
	              <label for="password"><p>Password:</p></label>
	                <input type="password" name="password" placeholder="Password eingeben" id="password" required="required"/><br><br>
	                <p></p>
	                <br><br>
	                <button type="submit" class="btn" name="melden">Anmelden</button>
	            </form>
	        </div>
	</div>
	            </center>