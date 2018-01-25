<?php

include("connectie.php");


$winkelid = $_GET['winkelid'];


$sql = "DELETE FROM winkels WHERE winkelid=:winkelid";
$query = $dbConn->prepare($sql);
$query->execute(array(':winkelid' => $winkelid));


header("location:winkels.php");
?>