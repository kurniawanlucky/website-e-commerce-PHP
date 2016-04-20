<?php
	session_start();
	require '../connect.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <?php require 'head.php'; ?>
  </head>
<body>
<?php include_once ("atas_bukti_transfer.php"); ?>	
<div class="container">
<section id="atas" class="hero-unit span12">

<?php
if(isset($_SESSION["salah"]))
{
	echo "File terlalu Besar";
}
?>

<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="../kirim_bukti_transfer.php">Kirim</a></li>
		  <li class="active">Upload Bukti Transfer</li>
		</ol>
</div>
<p></p>

<?php
	
	$id_penjualan=$_SESSION['id_penjualan'];
	//echo $id_penjualan;
	echo "<table class='table table-bordered'>";
	echo "<thead>
	<tr>
	<th>No</th>
	
	<th>Image</th>
	<th>Delete</th>
	</tr>
	</thead>
	<tbody>";
	$no=1;
	$result=mysql_query("select * from bukti_transfer where `id_penjualan`=$id_penjualan");
	if (!empty($result)){
		while($row=mysql_fetch_array($result))
		{
			echo "<tr>";
			echo "<td style='text-align:right'>".$no."</td>";
			//echo "<td>".$row['id_penjualan']."</td>";
			echo "<td><img class='select' src='".$row['image']."' /></td>";
			echo "<td><a href='delete_bukti_transfer.php?id_penjualan=".$row['id_penjualan']."'><button type='button' class='btn-custom5 btn-small'><i class='icon-trash icon-white'></i></button></a></td>";
			echo "</tr>";
			$no++;
		}
	}
	echo "</tbody></table>";
	mysql_close($con);
?>
	
</section>
<?php 
	$_SESSION["id_penjualan"]=$id_penjualan;
?>
<a href="add_bukti_transfer.php"><button class="btn-custom5">Tambah Bukti Transfer</button></a>
<p></p>
</div>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<?php
	include_once("../footer.php");
?>
</body>
</html>