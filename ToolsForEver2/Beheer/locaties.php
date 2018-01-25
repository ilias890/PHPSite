
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
			<div class="col-sm-9 col-lg-10">
			  <h1>Beheer Omgeving</h1>
			  <?php

		include_once("connectie.php");


		$result = $dbConn->query("SELECT * FROM winkels ORDER BY winkelid DESC");
		?>
						<table class="table table-striped table-bordered">
							  <thead>
								<tr>
									<td>Locatie</td>
								</tr>
							  </thead>
							  <tbody>
							  <?php
							   
							   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
							   
							   $sql = 'SELECT * FROM winkels ORDER BY winkelid DESC';
							   foreach ($conn->query($sql) as $row) {
										echo '<tr>';
										echo '<td>'. $row['locatie'] . '</td>';
										echo '<td width=250>';
										echo '<a class="btn btn-success" href="locatieswijzigen.php?winkelid='.$row['winkelid'].'">Wijzigen</a>';
										echo ' ';
										echo '<a class="btn btn-danger" href="verwijderlocatie.php?winkelid='.$row['winkelid'].'">Verwijderen</a>';
										echo '</td>';
										echo '</tr>';
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

