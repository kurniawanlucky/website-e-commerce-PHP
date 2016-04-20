<?php
	require '../connect.php';
	
	$j=0;
	$waktu=date("Y-m-d");
	$data_username	=$_POST['username'];
	
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
	echo '<br/>';
	$pass=$_POST['password'];
	echo $pass1=strlen($pass);
	if($pass1<=7)
	{
		$_SESSION["passkurang"]=1;
		header("location: ../login.php");
	}
	$passcek=$_POST['password'];
	$passcek1=$_POST['password1'];
	if($j==1)
	{
		session_start();
		$_SESSION["username"]=$data_username;
		$_SESSION["password"]=$_POST['password'];
		$_SESSION["nama"]=$_POST['nama'];
		$_SESSION["alamat"]=$_POST['alamat'];
		$_SESSION["kota"]=$_POST['kota'];
		$_SESSION["provinsi"]=$_POST['provinsi'];
		$_SESSION["email"]=$_POST['email'];
		$_SESSION["nomorhp"]=$_POST['nomorhp'];
		$_SESSION["tgl_lahir"]=$_POST['tgl_lahir'];
		header("location: ../index.php");
	}
	else
	{
		if($passcek==$passcek1)
		{
			echo $q="INSERT INTO `member`(`username`, `password`, `status`, `nama`, `alamat`, `id_kota`,`id_provinsi`, `email`, `nomor_handphone`, `tanggal_lahir`, `waktu_daftar`, `ada`) VALUES ('$_POST[username]','$_POST[password]',2,'$_POST[nama]','$_POST[alamat]','$_POST[kota]','$_POST[provinsi]','$_POST[email]','$_POST[nomorhp]','$_POST[tgl_lahir]','$waktu',1)";
			mysql_query($q);
			header("location: ../login.php");
		}
		else
		{
			$_SESSION["passtidak"]=1;
			header("location: ../login.php");
		}
	}
?>