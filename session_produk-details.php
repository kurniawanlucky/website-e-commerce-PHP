<?php
session_start();
echo $_SESSION["idBarang"]=$_GET["id"];
header("location: product-details.php");
?>