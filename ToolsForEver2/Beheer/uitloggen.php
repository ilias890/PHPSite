<?php
//uitloggen van gebruiker
session_start();
session_destroy();
header("location: ../index.php");
exit();
?>