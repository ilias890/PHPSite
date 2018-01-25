<?php 
	require 'connectie.php';

	session_start();

	$gebruikersnaam = "";
	$wachtwoord = "";
	
	if(isset($_POST['gebruikersnaam'])){
		$gebruikersnaam = $_POST['gebruikersnaam'];
	}
	if (isset($_POST['wachtwoord'])) {
		$wachtwoord = $_POST['wachtwoord'];

	}
	
	echo $gebruikersnaam ." : ".$wachtwoord;

	$q = 'SELECT * FROM gebruikers WHERE gebruikersnaam=:gebruikersnaam AND wachtwoord=:wachtwoord';

	$query = $dbConn->prepare($q);

	$query->execute(array(':gebruikersnaam' => $gebruikersnaam, ':wachtwoord' => $wachtwoord));


	if($query->rowCount() == 0){
		header('Location: inloggen.php?err=1');
	}else{

		$row = $query->fetch(PDO::FETCH_ASSOC);

		session_regenerate_id();
		$_SESSION['sessie_gebruiker_id'] = $row['id'];
		$_SESSION['sessie_gebruikersnaam'] = $row['gebruikersnaam'];
        $_SESSION['sessie_rol'] = $row['rol'];

        echo $_SESSION['sessie_rol'];
		session_write_close();

		if( $_SESSION['sessie_rol'] == "Beheerder"){
			header('Location: index.php');
		}else{
			header('Location: index.php');
		}
		
		
	}


?>