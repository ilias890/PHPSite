<?php

include("connectie.php");


$winkelid = $_GET['winkelid'];


$sql = "UPDATE winkels 
SET locatie = NULL 
WHERE winkelid";
$query = $dbConn->prepare($sql);
$query->execute(array(':winkelid' => $winkelid));


header("location:winkels.php");
?>