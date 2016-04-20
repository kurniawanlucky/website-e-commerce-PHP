<?php
if(isset($_POST["username"]))

include('connect.php');
{

  
  //received username value from registration page
  $username =  $_POST["username"]; 

  //check username in db
  $results = mysql_query("SELECT username FROM member WHERE username='$username'");

  $username_exist = mysql_num_rows($results); //records count

  
  //if returned value is more than 0, username is not available
  if($username_exist) {
      echo'username already used';
  }else{
      echo'you can use this username';
  }
}
?>


 