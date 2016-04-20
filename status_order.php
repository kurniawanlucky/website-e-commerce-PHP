<?php
  include "connect.php";
  session_start();
  if(!isset($_SESSION['nama']))
	{
		header("location:login.php");
	}
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
.status
{
	color:red;
}

	</style>
		<?php include_once("header/atas_status_order.php"); ?>	
	
	<section id="cart_items">
		<div class="container">

		  <div class="cclass">
		  <table>
		    <tr>
			  <td>No</td>
			  <td>Tanggal Memesan</td>
			  <td>Total Pembayaran</td>
			  <td>Nama Jasa</td>
			  <td>Nama Penerima</td>
			  <td>Alamat</td>
			  <td>No Handphone</td>
			  <td>Provinsi</td>
			  <td>Kota</td>
			  <td>No.Resi</td>
			  <td>Status</td>
			  <td>Detail Pesanan</td>
			</tr>
	<?php
	$no=1;
	$q="SELECT *,DATE_FORMAT(p.waktu,'%d-%m-%Y %h:%i:%s') AS waktu2,p.status FROM penjualan p,kota a,provinsi b,nama_jasa_pengiriman c where p.id_kota=a.id_kota and p.id_provinsi=b.id_provinsi and p.id_nama_jasa=c.id_nama_jasa and p.id_member=$_SESSION[id1] and p.status between 2 and 4";
	$result=mysql_query($q);
	if (!empty($result)){
	while($row=mysql_fetch_array($result))
	{

		echo "<tr>";
			echo "<td style='text-align:right'>".$no."</td>";
			echo "<td>".$row['waktu2']."</td>";
			echo "<td style='text-align:right'> Rp ".number_format($row['total_bayar'])."</td>";
			echo "<td>".$row['nama_jasa']."</td>";
			echo "<td>".$row['nama']."</td>";
			echo "<td>".$row['alamat']."</td>";
			echo "<td>".$row['no_handphone']."</td>";
			echo "<td>".$row['provinsi']."</td>";
			echo "<td>".$row['kota']."</td>";
			echo "<td>".$row['no_resi']."</td>";
			echo "<td>";
			echo "<div  class='status'>";
			echo "<h5>";
				if($row['status']==2)
				{
					echo "Pengecekan";
				}
				elseif($row['status']==3)
				{
					echo "Dikemas";
				}
				else
				{
					//echo $row['status']; 
					echo "Dikirim";
				}
			echo "</h5>";
			echo "</div>";
			echo "</td>";
			//echo "<td>".$row['ada']."</td>";
			echo "<td><a href='detail_barang.php?id_penjualan=".$row['id_penjualan']."'><center><button type='button' class='btn-custom6 btn-small'><i class='icon-list-alt icon-white'></i></button></center></a>  "."</td>";
			echo "</tr>";
		$no++;
	}
}
?>				   
		</table>
		</div>
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