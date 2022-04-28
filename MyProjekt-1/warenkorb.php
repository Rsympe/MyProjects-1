     
      <!DOCTYPE html>
<html lang="de">
<head>
	<title>Warenkorb</title>
	<link rel="shortcut icon" href="images/melogo.png" type="image/x-icon">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/warenkorb.css">
	
</head>
<body>
	<?php
	session_start();
	require_once('header.php');
	
	require_once('functn.php');


	$error= false;


	$action = (isset($_POST['action'])?$_POST['action']:(isset($_GET['action'])?$_GET['action']:null));

	if($action !==null){

		if(!in_array($action, array('add','delete','refresh')))

			$error= true;
			$nr = (isset($_POST['ID'])?$_POST['ID']:(isset($_GET['ID'])?$_GET['ID']:null));
			$s = (isset($_POST['s'])?$_POST['s']:(isset($_GET['s'])?$_GET['s']:null));
			$p = (isset($_POST['p'])?$_POST['p']:(isset($_GET['p'])?$_GET['p']:null));
			$m = (isset($_POST['m'])?$_POST['m']:(isset($_GET['m'])?$_GET['m']:null));
			

			$nr = preg_replace('#\v#', ' ', $ID);
			$s = preg_replace('#\v#', ' ', $s);

			$p=floatval($p);
			

			if(is_array($m)){

				$menge = array();

				$i = 0;

				foreach($m as $contenu){

					$menge[$i++]= intval($contenu);
				}

			}else{

				$m = intval($m);
			}

			$g= intval($g);

	}

	if(!$error){

		switch ($action) {
			case "add":
				Artikelanlegen($nr,$s,$p,$m,$g);
				break;

			case "delete":
				deletekorb($nr);
				break;

			case "refresh":
				for($i=0; $i< count($menge); $i++){

					mengeändern($_SESSION['korb']['Artikel_ID'][$i], round($menge[$i]));
				}
				break;
			
			default:
				break;
		}
	}

	


	?>

	<br><br><br><br><br><br>
	<center>
	<div  class="waren">
		<form method="post" action=" ">
			<table width="1100" style="border:5px double black;">
				

				<?php

					if(isset($_GET['deletekorb']) && $_GET['deletekorb'] == true){

						deletekorb();
					}

					if(createkorb()){

						$nb= count($_SESSION['korb']['Artikel_ID']);


						if($nb <= 0){

							?><p class="status" style="color:red; font-size: 35px;"><?php echo 'Ihr Warenkorb ist leer!!!';?></p><?php

						}else{
							?><tr class="titre">
					
								<td>     </td>
								<td>Name </td>
								<td>Preis</td>
								<td>Menge</td>
								
								
				
							</tr><?php

							for($i=0; $i< $nbschuh; $i++){

								?>

								<tr>
									
									<td>
									<img src="images/<?php echo $_SESSION['korb']['Artikel_ID'][$i]; ?>.png" width="100" height="100"></td>
									<td><?php echo $_SESSION['korb']['Artikelname'][$i]; ?></td>
									<td><?php echo number_format($_SESSION['korb']['Preis'][$i],2,',', ' '); ?> €</td>
									<td><input type="number" min="0" name="m[]" value="<?php echo $_SESSION['korb']['Menge'][$i];?>" size="5">
										<input type="submit"  value="Speichern"/>
										<input type="hidden" name="action" value="refresh"></td>
									
									<td><center><a href="warenkorb.php?action=delete&amp;nr=<?php echo rawurlencode($_SESSION['korb']['Artikel_ID'][$i]);?>"><img src="images/delete.png" width="30" height="30"></a></center></td>
								</tr>

								<?php
									}


								?>

								<tr class="betr">
									<td colspan="2"><p>Betrag: <?php echo number_format(betrag(),2,',', ' '); ?> €</p>
										
									</td>
								</tr>

								<tr>
									<td></td>
									<td colspan="4">
										<?php if(isset($_SESSION['id'])){?><?php }else{?> <center><h4> Sie müssen angemeldet sein, um Ihre Bestellung zu bezahlen </h4></center><?php } ?>
										<center><a href="?deletekorb=true"><p class="ware">Warenkorb löschen</p></a></center>
									</td>
								</tr>


								<?php



						}
					}


				?>
				

			</table>

		</form>
	</div>
</center>

	


	<?php
	echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	require_once('footer.php');

	?>
</body>
</html>