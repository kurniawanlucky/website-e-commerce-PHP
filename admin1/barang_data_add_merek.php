<?php
require '../connect.php';

mysql_query("INSERT INTO `merk1`(`nama`, `ada`, `keterangan`) VALUES ('$_POST[nama]',1,'$_POST[keterangan]')");

echo $_POST['idmerk'];
echo $_POST['nama'];
echo $_POST['keterangan'];
mysql_close($con);
header("location: barang_merk_select.php");
?>