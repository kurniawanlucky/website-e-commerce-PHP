<?php
session_start();
require 'connect.php';

mysql_query("DELETE FROM `wishlist` WHERE `id_wishlist`=$_GET[id_wishlist]");

echo $_GET['id_wishlist'];
mysql_close($con);
header("location: wishlist.php");
?>