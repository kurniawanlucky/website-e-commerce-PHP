<?php
	session_start();
	require '../connect.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Pembayaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="../css/mystyle.css" rel="stylesheet" media="screen">
  </head>
<body>

<div class="container">
<section id="atas" class="hero-unit span10">
<h3>Lihat Bukti Transfer</h3><a href="../admin1/pembayaran.php"><button type="button" class="btn-custom5 btn-small"><i class="icon-circle-arrow-left icon-white"></i></button></a>
<?php
	$id_penjualan=$_GET['id_penjualan'];
	//echo $id_penjualan;
	echo "<table class='table table-bordered'>";
	echo "<thead>
	<tr>
	<th>No</th>
	<th>ID Penjualan</th>
	<th>Jumlah</th>
	<th>Gambar</th>
	</tr>
	</thead>
	<tbody>";
	$no=1;
	$q="select * from bukti_transfer where `id_penjualan`=$id_penjualan";
	$result=mysql_query($q);
	if (!empty($result)){
		while($row=mysql_fetch_array($result))
		{
			$x="select * from penjualan where `id_penjualan`=$id_penjualan";
			$result1=mysql_query($x);
			$row1=mysql_fetch_array($result1);
			echo "<tr>";
			echo "<td>".$no."</td>";
			echo "<td>".$row['id_penjualan']."</td>";
			echo "<td style='text-align:right'>".number_format($row1['total_bayar'])."</td>";
			echo "<td><img height='200' width='300' class='select' src='".$row['image']."' /></td>";
			echo "</tr>";
			$no++;
		}
	}
	echo "</tbody></table>";
	mysql_close($con);
?>
	
</section>
</div>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>