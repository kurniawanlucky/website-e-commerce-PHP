<?php

// Database information
// Database username
define('PROYEK_TEKWEB_USER', 'root');
// Database password
define('PROYEK_TEKWEB_PASS', '');
// Database name
define('PROYEK_TEKWEB_NAME', 'proyek_tekweb');
// Database host
define('PROYEK_TEKWEB_HOST', 'localhost');

$con = mysql_connect("localhost","root");
if (!$con)
{
	die('Could not connect: '.mysql_error());
}
mysql_select_db("ta",$con);
?>
