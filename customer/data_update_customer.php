<?php
session_start();
require '../connect.php';

mysql_query("UPDATE `member` SET `nama`='$_POST[nama]',`alamat`='$_POST[alamat]',`kota`='$_POST[kota]',`provinsi`='$_POST[provinsi]',`email`='$_POST[email]',`nomor_handphone`='$_POST[nomor_handphone]',`tanggal_lahir`='$_POST[tanggal_lahir]' WHERE `username`='$_POST[username]'");

mysql_close($con);
header("location: ../index.php");
?>