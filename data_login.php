<?php
require 'connect.php';
session_start();
$myusername=$_POST['username'];
$mypassword=$_POST['password'];

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM member WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);
$cek=mysql_fetch_array($result);

$count=mysql_num_rows($result);

if($count==1)
{
	$status=$cek['status'];
	echo $status;
	if($status==1)
	{
		//$row=mysql_fetch_array($result);
		$nama=$cek['nama'];
		$id=$cek['id_member'];
		
		echo $_SESSION["anama"]= $nama;
		$_SESSION["id"]= $id;
		header("Location:admin1/index.php");
	}
	else
	{
		//$row=mysql_fetch_array($result);
		$nama=$cek['nama'];
		$id1=$cek['id_member'];
		
		$_SESSION["nama"]= $nama;
		$_SESSION["id1"]= $id1;
		header("Location: index.php");
	}
}
else{
$_SESSION["salah"]=1;
header("Location:login.php");
}?>
