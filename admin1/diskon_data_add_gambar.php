<?php
session_start();
require 'connect.php';
$result=mysql_query("SELECT max(id_diskon_gambar) FROM `diskon_gambar`");
$row=mysql_fetch_array($result);
$id=$row['max(id_diskon_gambar)'];
echo $id=$id+1;

if ($_FILES['file_gambar']['error'] > 0){
	echo "Error Uploading File";
} 
else 

{
	if (is_dir("diskon/".$id)==false)
	{
		mkdir("diskon/".$id);
	}

	$alamat_foto = "diskon/".$id."-".$_FILES['file_gambar']['name'];
	$nama_folder = $id;
	$nama_file = $id."-".$_FILES['file_gambar']['name'];
	move_uploaded_file ($_FILES['file_gambar']['tmp_name'],$target = $alamat_foto);	
	chmod("diskon/$nama_folder/", 0777);
	echo $alamat_foto." ".$nama_folder." ".$nama_file;
	$id_gambar=$id;
	mysql_query("INSERT INTO diskon_gambar (id_diskon_gambar,image) VALUES ($id_gambar,'$alamat_foto')");
}

mysql_close($con);
header("location: diskon_select_gambar.php");
?>