<?php
require 'connect.php';

mysql_query("UPDATE `merk1` SET `nama`='$_POST[nama]',`keterangan`='$_POST[keterangan]' WHERE id_merk='$_POST[idmerk]'");

echo $_POST['idmerk'];
echo $_POST['nama'];
echo $_POST['keterangan'];
mysql_close($con);
header("location: barang_merk_select.php");
?>