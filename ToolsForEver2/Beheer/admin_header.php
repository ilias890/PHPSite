    <?php 
    session_start();
    $role = $_SESSION['sessie_rol'];
    if(!isset($_SESSION['sessie_gebruikersnaam']) && $role!="Beheerder"){
      header('Location: inloggen.php');
    }
	?>
			  
	  <nav class="navbar navbar-default navbar-fixed-side">
		
					  <ul class="nav navbar-fixed-side">
					  
						   <li><a href="medewerkergegevens.php">Goedendag: <?php echo htmlentities($_SESSION['sessie_gebruikersnaam'], ENT_QUOTES, 'UTF-8'); ?></a></li>
						   <li><a href="#">Functie: <?php echo htmlentities($_SESSION['sessie_rol'], ENT_QUOTES, 'UTF-8'); ?></a></li>
						<li class="active"><a href="index.php">Producten Beheren</a></li>
						<li><a href="winkels.php">Winkels Beheren</a></li>
						<li><a href="locaties.php">Locaties Beheren</a></li>
						<li><a href="gebruikers.php">Medewerkers Beheren</a></li>
					<li><a href="uitloggen.php"> Uitloggen </a></li>
				  </ul>
				 
				
			
      </nav>