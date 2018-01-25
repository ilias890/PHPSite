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

if(isset($_POST['submit'])) {	
	$productnaam = $_POST['productnaam'];
	$producttype = $_POST['producttype'];
	$inkoopprijs = $_POST['inkoopprijs'];
	$verkoopprijs = $_POST['verkoopprijs'];
	$winkelid = $_POST['winkelid'];
	
	
	if(empty($productnaam) || empty($producttype) || empty($inkoopprijs) || empty($verkoopprijs) || empty($winkelid)) {
				
		
		
		
	} else { 
				
		$sql = "INSERT INTO producten (productnaam, producttype, inkoopprijs, verkoopprijs, winkelid) VALUES(:productnaam, :producttype, :inkoopprijs, :verkoopprijs, :winkelid)";
		$query = $dbConn->prepare($sql);
				
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
			<form class="form-horizontal" role="form" method="post" action="producttoevoegen.php">
				<div class="form-group">
					<label for="vak" class="col-sm-2 control-label">Product Naam</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="productnaam" name="productnaam" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<label for="vak" class="col-sm-2 control-label">Product Type</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="producttype" name="producttype" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<label for="vak" class="col-sm-2 control-label">Inkoopprijs</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="inkoopprijs" name="inkoopprijs" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
					<label for="vak" class="col-sm-2 control-label">Verkoopprijs</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="verkoopprijs" name="verkoopprijs" placeholder="" required>
					</div>
				</div>
				<div class="form-group">
				<label for="winkelid" class="col-sm-2 control-label">Winkelnaam</label>
				<div class="col-sm-6">

				<?php 

					require 'connectie.php';    

					try
					{
							 $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
							 $sql = "select winkelid, winkelnaam from winkels";
							 $projresult = $db->query($sql);
							 $projresult->setFetchMode(PDO::FETCH_ASSOC);

							 echo '<select name="winkelid"  id="winkelid" class="form-control" >';

						 while ( $row = $projresult->fetch() ) 
						 {
							echo '<option value="'.$row['winkelid'].'">'.$row['winkelnaam'].'</option>';
						 }

						 echo '</select>';
						}
						catch (PDOException $e)
						{   
							die("Geen connectie met de database" . $e->getMessage());
						}



				?>

			   </div>
			</div>
				
				<div class="form-group">
					<div class="col-sm-2 col-sm-offset-2 ">
						<input id="submit" name="submit" type="submit" value="Verstuur" class="btn btn-primary">
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
