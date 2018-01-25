<html>
<head>
  <title>ToolsForEver</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../styles.css">
</head>

<body>
<?php

include_once("connectie.php");

if(isset($_POST['update'])) {	
	$id = $_POST['id'];
	$voornaam = $_POST['voornaam'];
	$tussenvoegsel = $_POST['tussenvoegsel'];
	$achternaam = $_POST['achternaam'];
	$gebruikersnaam = $_POST['gebruikersnaam'];
	$wachtwoord = $_POST['wachtwoord'];
	$rol = $_POST['rol'];
	
	if(empty($voornaam) || empty($tussenvoegsel) || empty($achternaam) || empty($rol) || empty($gebruikersnaam)|| empty($wachtwoord)) {
				
		
		
		
	} else { 
				
		$sql = "UPDATE gebruikers SET voornaam=:voornaam, tussenvoegsel=:tussenvoegsel, achternaam=:achternaam, gebruikersnaam=:gebruikersnaam, wachtwoord=:wachtwoord, rol=:rol WHERE id=:id";
		$query = $dbConn->prepare($sql);
		
		$query->bindparam(':id', $id);
		$query->bindparam(':voornaam', $voornaam);
		$query->bindparam(':tussenvoegsel', $tussenvoegsel);
		$query->bindparam(':achternaam', $achternaam);
		$query->bindparam(':gebruikersnaam', $gebruikersnaam);
		$query->bindparam(':wachtwoord', $wachtwoord);
		$query->bindparam(':rol', $rol);
		$query->execute();
		
		
		header("location:gebruikers.php");
	}
}
?>
<?php

$id = $_GET['id'];


$sql = "SELECT * FROM gebruikers WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$voornaam = $row['voornaam'];
	$tussenvoegsel = $row['tussenvoegsel'];
	$achternaam = $row['achternaam'];
	$gebruikersnaam = $row['gebruikersnaam'];
	$wachtwoord = $row['wachtwoord'];
	$rol = $row['rol'];
}
?>
  <div class="bggrijs">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-1">
				<a href="index.php"><img src="../images/logo.png" class="img-responsive"></a>
			</div>
			<div class="col-sm-1">
							<h2 class="hoofdtekst">ToolsForEver</h2>
			</div>
		</div>
	</div>
   </div>
   <div class="container-fluid">
	  <div class="row">
		<div class="col-sm-3 col-lg-2 headgrijs">
			<?php include_once("admin_header.php"); ?>
		</div>
		<div class="col-sm-9 col-lg-10 mt30">
			<form class="form-horizontal" role="form" method="post" action="wijziggebruiker.php">
				<div class="form-group">
					<label for="vak" class="col-sm-2 control-label">Voornaam</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="voornaam" name="voornaam" value="<?php echo $voornaam;?>" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<label for="vak" class="col-sm-2 control-label">Tussenvoegsel</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="tussenvoegsel" name="tussenvoegsel" value="<?php echo $tussenvoegsel;?>" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<label for="vak" class="col-sm-2 control-label">Achternaam</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="achternaam" name="achternaam" value="<?php echo $achternaam;?>" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<label for="vak" class="col-sm-2 control-label">Gebruikersnaam</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="gebruikersnaam" value="<?php echo $gebruikersnaam;?>" name="gebruikersnaam" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<label for="vak" class="col-sm-2 control-label">Wachtwoord</label>
					<div class="col-sm-6">
						<input type="password" class="form-control" id="wachtwoord" value="<?php echo $wachtwoord;?>" name="wachtwoord" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<label for="vak" class="col-sm-2 control-label">Rol</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="rol" name="rol" value="<?php echo $rol;?>" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2 col-sm-offset-2 ">
						<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
						<input id="update" name="update" type="submit" value="Verstuur" class="btn btn-primary">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<! Will be used to display an alert to the user>
					</div>
				</div>
			</form>
		</div>
	</div>





</body>
</html>
