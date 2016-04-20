<?php
session_start();
require 'connect.php';

mysql_query("DELETE FROM `wishlist` WHERE id_wishlist=$_GET[id_wish]");

echo $_GET['id'];
echo "  ";
echo $_GET['id_wish'];

mysql_close($con);
header("location: product-details.php?id=".$_GET['id']."");
?>