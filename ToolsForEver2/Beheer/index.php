

<!DOCTYPE html>
<html>
<head>
    <title>Beheer Omgeving</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../styles.css">
</head>
<body>

  <div class="bggrijs">
	<div class="container-fluid">
		<div class="row mt10">
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
		<div class="col-sm-9 col-lg-10">
		  <h1>Beheer Omgeving</h1>
				  <?php

					include_once("connectie.php");



					?>

				
					<form style="margin-bottom:20px;" method="post" action="index.php" class="form-inline" >
						<input  type="text" name="zoeken" class="search-query form-control" placeholder="Zoeken" />
						<button class="btn btn-success" type="button">
							<span type="submit" class=" glyphicon glyphicon-search"></span>
						</button>               
					</form>

					<p>
						<a href="producttoevoegen.php" class="btn btn-success">Toevoegen</a>
					</p>
					  

					<table class="table table-striped table-bordered">
						  <thead>
							<tr>
								<td>Productid</td>
								<td>Productnaam</td>
								<td>Producttype</td>
								<td>Winkelnummer</td>
								<td>Inkoopprijs</td>
								<td>Verkoopprijs</td>
							</tr>
						  </thead>
						  <tbody>
						  <?php
							
							   $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
							   $zoeken = (isset($_POST["zoeken"])?$_POST["zoeken"]:"");
							   $query = $db->prepare("select * from producten where producttype LIKE '%$zoeken%' OR productnaam LIKE '%$zoeken%'  LIMIT 0 , 10");
							   $query->bindValue(1, "%$zoeken%", PDO::PARAM_STR);
							   $query->execute();
							 
								
							   

						  
								

								if ($query->rowCount() == 0) {
								  echo "<div class='alert alert-danger'>
										  <strong>Waarschuwing!</strong> Er zijn geen producten meer in het assortiment
										</div>";
								}
								else
								{
								foreach($query as $row)
								{
									echo '<tr>';
									echo '<td>'. $row['id'] . '</td>';
									echo '<td>'. $row['productnaam'] . '</td>';
									echo '<td>'. $row['producttype'] . '</td>';
									echo '<td>'. $row['winkelid'] . '</td>';
									echo '<td>'. $row['inkoopprijs'] . '</td>';
									echo '<td>'. $row['verkoopprijs'] . '</td>';
									echo '<td width=250>';
									echo '<a class="btn btn-success" href="wijzigproduct.php?id='.$row['id'].'">Wijzigen</a>';
									echo ' ';
									echo '<a class="btn btn-danger" href="verwijderproduct.php?id='.$row['id'].'">Verwijderen</a>';
									echo '</td>';
									echo '</tr>';
						   }
						   }  
						   $conn = null;
						  ?>
						  </tbody>
					</table>

		</div>
	  </div>
	</div>
			<?php include_once("../footer.php"); ?>
</body>
</html>