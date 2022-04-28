   <?php


	function createkorb(){

		if(!isset($_SESSION['korb'])){

			$_SESSION['korb']= array();
			$_SESSION['korb']['Artikel_ID']=array();
			$_SESSION['korb']['Artikelname']=array();
			$_SESSION['korb']['preis']=array();
			$_SESSION['korb']['menge']=array();
			$_SESSION['korb']['close']=false;

		}

		return true;
	}

	function schuhanlegen($Artikel_ID,$Artikelname,$preis,$menge,$groesse){

		if(createkorb() && !isclose()){

			$standschuh = array_search($Artikel_ID, $_SESSION['korb']['Artikel_ID']);

			if($standschuh !== false){

				$_SESSION['korb']['menge'][$standschuh] += $menge;

			}else{

				array_push($_SESSION['korb']['Artikel_ID'], $Artikel_ID);
				array_push($_SESSION['korb']['Artikelname'], $Artikelname);
				array_push($_SESSION['korb']['preis'], $preis);
				array_push($_SESSION['korb']['menge'], $menge);
			}
		}else{

			echo"Fehler wenden Sie sich bitte an den Administrator";
		}

	}


	function mengeändern($Artikel_ID,$menge){

		if(createkorb() && !isclose()){

			if($menge>0){

				for($i=0; $i< count($_SESSION['korb']['Artikel_ID']); $i++){
					if($Artikel_ID == $_SESSION['korb']['Artikel_ID'][$i]){

						$_SESSION['korb']['menge'][$i] = $menge;
					}

				}

				

					
				
			}else{

				deleteschuh($Artikel_ID);

			}
		}else{

			echo"Fehler wenden Sie sich bitte an den Administrator";
		}
	}


	function deleteschuh($Artikel_ID){

		if(createkorb() && !isclose()){

			
				$tmp = array();
				$tmp['Artikel_ID']= array();
				$tmp['Artikelname']= array();
				$tmp['preis']= array();	
				$tmp['menge']= array();
				$tmp['close']= false;

				for($i=0; $i< count($_SESSION['korb']['Artikel_ID']); $i++){

					if($_SESSION['korb']['Artikel_ID'][$i] !== $Artikel_ID){

						array_push($tmp['Artikel_ID'], $_SESSION['korb']['Artikel_ID'][$i]);
						array_push($tmp['Artikelname'], $_SESSION['korb']['Artikelname'][$i]);
						array_push($tmp['preis'], $_SESSION['korb']['preis'][$i]);
						array_push($tmp['menge'], $_SESSION['korb']['menge'][$i]);
					}

				}

				$_SESSION['korb']= $tmp;

				unset($tmp);
	


		}else{
			echo"Fehler wenden Sie sich bitte an den Administrator";
		}
	}

	function isclose(){

		if(isset($_SESSION['korb']) && $_SESSION['korb']['close']== true){
			return true;

		}else{
			return false;
		}
	}

	function deletekorb(){

		if(isset($_SESSION['korb'])){
			unset($_SESSION['korb']);
		}
		
	}


	function schuhzahlen($Artikel_ID){

		$zahlen= false;

		for($i=0; $i< count($_SESSION['korb']['Artikel_ID']); $i++){

			if($_SESSION['korb']['Artikel_ID'][$i] == $Artikel_ID)
        		$nombre = $_SESSION['korb']['menge'][$i]; 
		}

		return $nombre;
	}

	function betrag(){

		$betrag= 0;

		for($i=0; $i< count($_SESSION['korb']['Artikel_ID']); $i++){

			$betrag+=$_SESSION['korb']['menge'][$i]*$_SESSION['korb']['preis'][$i];
		}

		return $betrag;
	}

?>