<?php
session_start();
require 'connect.php';

echo $_POST['id'];

mysql_query("UPDATE `member` SET `username`='$_POST[username]',`password`='$_POST[password]',`status`='$_POST[status]',`nama`='$_POST[nama]',`alamat`='$_POST[alamat]',`id_kota`='$_POST[kota]',`id_provinsi`='$_POST[provinsi]',`email`='$_POST[email]',`nomor_handphone`='$_POST[nomor_handphone]',`tanggal_lahir`='$_POST[tanggal_lahir]',`ada`=1 WHERE `id_member`='$_POST[id]'");

echo $_POST['nama'];
echo $_POST['id'];

mysql_close($con);

if($_POST['status']==2)
{
	header("location: customer.php");
}
else
{
	header("location: admin.php");
}
?>