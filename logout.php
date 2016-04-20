<?php
session_start();

if(isset($_SESSION["nama"]))
{
	unset($_SESSION["nama"]);
	unset($_SESSION["id1"]);	
}

header("location: login.php");
?>