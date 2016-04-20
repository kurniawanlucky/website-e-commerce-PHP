<?php
session_start();
require 'connect.php';

echo $_SESSION["id1"];
$pass1=$_POST['passwordlama'];
$passbaru=$_POST['passwordbaru'];
$ketik=$_POST['ketikulang'];
echo $pass1;
$q="select * from member where id_member=$_SESSION[id1]";
$result=mysql_query($q);
if (!empty($result)){
	while($row=mysql_fetch_array($result))
	{
		$pass=$row['password'];
	}
}
echo $pass;
if($pass==$pass1)
{
	if($passbaru==$ketik)
	{
		mysql_query("UPDATE `member` SET `password`=$passbaru WHERE id_member=$_SESSION[id1]");
		echo "123";
	}
}							

mysql_close($con);
header("location: profile.php");
?>