<?php
	require '../connect.php';
	
	$j=0;
	
	$data_username	=$_POST['username'];
	echo $tanggal=date("Y-m-d");
	$cek= "SELECT username FROM member";
	$hasil=mysql_query($cek);
	
	while($data=mysql_fetch_array($hasil))
	{	
		if($data_username == "$data[username]")
		{
			$j=1;	
		}
	}
	echo $data_username;
	if($j==1)
	{
		header("location: member_add.php");
	}
	else
	{
		echo $_POST['status'];
		echo $_POST['kota'];
		mysql_query("INSERT INTO `member`(`username`, `password`, `status`, `nama`, `alamat`, `id_kota`,`id_provinsi`, `email`, `nomor_handphone`, `tanggal_lahir`,`waktu_daftar`, `ada`) VALUES ('$_POST[username]','$_POST[password]','$_POST[status]','$_POST[nama]','$_POST[alamat]','$_POST[kota]','$_POST[provinsi]','$_POST[email]','$_POST[nomor_handphone]','$_POST[tanggal_lahir]','$tanggal',1)");
		
		header("location: member_add.php");
		
		
	}
?>