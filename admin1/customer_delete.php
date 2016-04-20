<?php
session_start();
require 'connect.php';

echo $_GET['id'];

mysql_query("UPDATE `ada`=0 WHERE `id_member`='$_GET[id]'");

mysql_close($con);

header("location: customer.php");

?>