<?php
  include "connect.php";
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once("head.php"); ?>
	<script type="text/javascript">
        $(document).ready(function(){
            $("#provinsi").change(function(){
                var provinsi=$("#provinsi").val();
                $.ajax({
                    type:"post",
                    url:"ajaxcity.php",
					data:"provinsi="+provinsi,
                    success:function(data){
                        $("#kota").html(data);
                    }
                });
            });
        });
    </script>
<script type="text/javascript" src="js/bootstrap-typeahead.js"></script>
<link rel="stylesheet" href="css/bootstrap.css"/>	
</head><!--/head-->

<body>
	<style>
	.cclass {
	margin:0px;padding:0px;
	width:100%;
	border:1px solid #000000;
	
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
	
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
	
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
	
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}.cclass table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}.cclass tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}
.cclass table tr:first-child td:first-child {
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}
.cclass table tr:first-child td:last-child {
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
}.cclass tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
}.cclass tr:hover td{
	
}
.cclass tr:nth-child(odd){ background-color:#ffaa56; }
.cclass tr:nth-child(even)    { background-color:#ffffff; }.cclass td{
	vertical-align:middle;
	
	
	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:7px;
	font-size:10px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}.cclass tr:last-child td{
	border-width:0px 1px 0px 0px;
}.cclass tr td:last-child{
	border-width:0px 0px 1px 0px;
}.cclass tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.cclass tr:first-child td{
		background:-o-linear-gradient(bottom, #ff7f00 5%, #bf5f00 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ff7f00), color-stop(1, #bf5f00) );
	background:-moz-linear-gradient( center top, #ff7f00 5%, #bf5f00 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff7f00", endColorstr="#bf5f00");	background: -o-linear-gradient(top,#ff7f00,bf5f00);

	background-color:#ff7f00;
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:14px;
	font-family:Arial;
	font-weight:bold;
	color:#ffffff;
}
.cclass tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #ff7f00 5%, #bf5f00 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ff7f00), color-stop(1, #bf5f00) );
	background:-moz-linear-gradient( center top, #ff7f00 5%, #bf5f00 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff7f00", endColorstr="#bf5f00");	background: -o-linear-gradient(top,#ff7f00,bf5f00);

	background-color:#ff7f00;
}
.cclass tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.cclass tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
.kanan
{
	margin-left:100px;
}


	</style>
		<?php include_once("header/atas_riwayat_pembelian.php"); ?>	
	
	<section id="cart_items">
		<div class="container">

		<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Detail Pemesanan</li>
				</ol>
		</div>
		  <div class="cclass">
		  <table>
		    <tr>
			  <td>No</td>
			  <td>Name</td>
			  <td>package</td>
			  <td>Type</td>
			  <td>Quantity</td>
			  <td>Price</td>
			  <td>Sub Total</td>
			</tr>
	<?php
	$no=1;
	$jmltotal=0;
	$q="SELECT * FROM detail_penjualan d where d.id_penjualan=$_GET[id_penjualan]";
	//echo $q;
	$result=mysql_query($q);
	if (!empty($result)){
	while($row=mysql_fetch_array($result))
	{
		echo "<tr>";
			$p="SELECT * FROM barang where id_barang=$row[id_barang]";
			$result1=mysql_query($p);
			$row1=mysql_fetch_array($result1);
			$p="SELECT * FROM paket_barang where id_paket_barang=$row[id_barang]";
			$result2=mysql_query($p);
			$row2=mysql_fetch_array($result2);
			echo "<td style='text-align:right'>".$no."</td>";
			echo "<td>".$row1['nama']."</td>";
			echo "<td>".$row2['nama']."</td>";
			echo "<td>".$row['tipe_barang']."</td>";
			echo "<td style='text-align:right'>".$row['jumlah_barang']."</td>";
			echo "<td style='text-align:right'> RP ".number_format($row['harga_barang'])."</td>";
			echo "<td style='text-align:right'> Rp ".number_format($row['subtotal'])."</td>";
			$total=$row['jumlah_barang']*$row['harga_barang'];
			$jmltotal=$jmltotal+$total;
			//echo "<td>".$row['ada']."</td>";
		echo "</tr>";
		$no++;
	}
}
?>				   
		</table>
		</div>
		<?php 
			echo "<div class='kanan'>";
			echo "jumlah= ";
			echo number_format($jmltotal); 
			echo "</div>";
		?>
		</div>
	</section> <!--/#cart_items-->

	<p></p>
	<?php
		include_once("footer.php");
	?>
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>                                                                                                                                                                                                                                                                                                         