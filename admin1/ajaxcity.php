<?php
include('connect.php');

 $provinsi=$_POST["provinsi"];
   echo $provinsi;
  $resultajax=mysql_query("select id_kota,kota FROM kota where id_provinsi='$provinsi' ");
  while($city=mysql_fetch_array($resultajax)){
    echo"<option value=$city[id_kota]>$city[kota]</option>";
 
  }
?>