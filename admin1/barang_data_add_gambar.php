<?php
session_start();
require 'connect.php';
if ($_FILES['file_gambar']['error'] > 0){
	echo "Error Uploading File";
} 
else 
{
	if (is_dir("images/".$_SESSION['id_barang'])==false)
	{
		mkdir("images/".$_SESSION['id_barang']);
	}
	$result=mysql_query("SELECT COUNT(*) FROM gambar_barang where id_barang=$_SESSION[id_barang]");
	if (!empty($result)){
		while($row=mysql_fetch_array($result))
		{
			$id=$row['COUNT(*)'];
		}
	}
	$id++;
	$alamat_foto = "images/".$_SESSION['id_barang']."/".$id."-".$_FILES['file_gambar']['name'];
	$nama_folder = $_SESSION['id_barang'];
	$nama_file = $id."-".$_FILES['file_gambar']['name'];
	move_uploaded_file ($_FILES['file_gambar']['tmp_name'],$target = $alamat_foto);	
	chmod("images/$nama_folder/", 0777);
	chmod("images/$nama_folder/$nama_file", 0777);
	//echo $alamat_foto." ".$nama_folder." ".$nama_file;
	$id_gambar=$_SESSION['id_barang']*100+$id;
	mysql_query("INSERT INTO gambar_barang (id_gambar,id_barang,image) VALUES ($id_gambar,$_SESSION[id_barang],'$alamat_foto')");
}

mysql_close($con);
header("location: barang_gambar_select.php");
?>