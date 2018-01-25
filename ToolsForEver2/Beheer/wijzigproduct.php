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
	$productnaam = $_POST['productnaam'];
	$producttype = $_POST['producttype'];
	$inkoopprijs = $_POST['inkoopprijs'];
	$verkoopprijs = $_POST['verkoopprijs'];
	$winkelid = $_POST['winkelid'];
	
	if(empty($productnaam) || empty($producttype) || empty($inkoopprijs) || empty($verkoopprijs) || empty($winkelid)) {
				
		
		
		
	} else { 
				
		$sql = "UPDATE producten SET productnaam=:productnaam, producttype=:producttype, inkoopprijs=:inkoopprijs, verkoopprijs=:verkoopprijs, winkelid=:winkelid  WHERE id=:id";
		$query = $dbConn->prepare($sql);
		
		$query->bindparam(':id', $id);
		$query->bindparam(':productnaam', $productnaam);
		$query->bindparam(':producttype', $producttype);
		$query->bindparam(':inkoopprijs', $inkoopprijs);
		$query->bindparam(':verkoopprijs', $verkoopprijs);
		$query->bindparam(':winkelid', $winkelid);
		$query->execute();
		
		
		header("location:index.php");
	}
}
?>
<?php

$id = $_GET['id'];


$sql = "SELECT * FROM producten WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$productnaam = $row['productnaam'];
	$producttype = $row['producttype'];
	$inkoopprijs = $row['inkoopprijs'];
	$verkoopprijs = $row['verkoopprijs'];
	$winkelid = $row['winkelid'];
	
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
			<form class="form-horizontal" role="form" method="post" action="wijzigproduct.php">
				<div class="form-group">
					<label for="vak" class="col-sm-2 control-label">Product Naam</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="productnaam" value="<?php echo $productnaam;?>" name="productnaam" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<label for="vak" class="col-sm-2 control-label">Product Type</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="producttype" value="<?php echo $producttype;?>" name="producttype" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<label for="vak" class="col-sm-2 control-label">Inkoopprijs</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="inkoopprijs" value="<?php echo $inkoopprijs;?>" name="inkoopprijs" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<label for="vak" class="col-sm-2 control-label">Verkoopprijs</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="verkoopprijs" value="<?php echo $verkoopprijs;?>" name="verkoopprijs" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<label for="vak" class="col-sm-2 control-label">Winkelnaam</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="winkelid" value="<?php echo $winkelid;?>" name="winkelid" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2 col-sm-offset-2 ">
						<input type="hidden" name="id" id="id" value=<?php echo $_GET['id'];?>>
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
