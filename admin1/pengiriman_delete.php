<?php
require 'connect.php';

mysql_query("UPDATE `pengiriman` SET `status`=0 WHERE id_pengiriman='$_GET[id_pengiriman]'");


mysql_close($con);
header("location: pengiriman_select.php");
?>