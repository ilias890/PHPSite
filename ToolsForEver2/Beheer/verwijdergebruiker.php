<?php

include("connectie.php");


$id = $_GET['id'];


$sql = "DELETE FROM gebruikers WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));


header("location:index.php");
?>