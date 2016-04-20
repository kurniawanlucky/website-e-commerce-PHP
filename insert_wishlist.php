<?php
session_start();
require 'connect.php';

mysql_query("INSERT INTO `wishlist`(`id_member`, `id_barang`) VALUES ('$_SESSION[id1]','$_SESSION[id_barang]')");

echo $_SESSION["id1"];
echo $_SESSION["id_barang"];

mysql_close($con);
header("location: index.php");
?>