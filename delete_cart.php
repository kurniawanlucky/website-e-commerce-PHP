<?php
  session_start();
  //$_SESSION[$_GET["key"]]=null;
   $arData=$_SESSION["shopping_cart"];
   print_r($arData);
   echo $_GET["key"];
   $arData[$_GET["key"]]=null;
   echo "<br/>";
   print_r($arData);
   $_SESSION["shopping_cart"]=$arData;
   
  header("location:cart.php");
?>