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
	$locatie = $_POST['locatie'];
	$winkelid = $_POST['winkelid'];
	if(empty($locatie)){
				
		
		
		
	} else { 
				
		$sql = "UPDATE winkels SET locatie=:locatie WHERE winkelid=:winkelid";
		$query = $dbConn->prepare($sql);
		
		$query->bindparam(':winkelid', $winkelid);
		$query->bindparam(':locatie', $locatie);
		$query->execute();
		
		
		header("location:winkels.php");
	}
}
?>
<?php

$winkelid = $_GET['winkelid'];


$sql = "SELECT * FROM winkels WHERE winkelid=:winkelid";
$query = $dbConn->prepare($sql);
$query->execute(array(':winkelid' => $winkelid));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$winkelnaam = $row['winkelnaam'];
	$locatie = $row['locatie'];
	
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
			<form class="form-horizontal" role="form" method="post" action="locatieswijzigen.php">
				<div class="form-group">
					<label for="vak" class="col-sm-2 control-label">Locatie</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="locatie" name="locatie" value="<?php echo $locatie;?>" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2 col-sm-offset-2 ">
						<input type="hidden" name="winkelid" value=<?php echo $_GET['winkelid'];?>>
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
	</div>





</body>
</html>
