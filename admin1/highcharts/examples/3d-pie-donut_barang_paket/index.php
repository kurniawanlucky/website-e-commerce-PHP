<?php
	include_once("../../../connect.php");
	echo 123456;
?>
<!DOCTYPE HTML>
<html>
	<head>
	<?php
	include_once("../../../head2.php");
   ?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<style type="text/css">
	#container {
		height: 400px; 
		min-width: 310px; 
		max-width: 800px;
		margin: 0 auto;
	}
</style>
		
	</head>
	<body>
<div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <h3 class="page-title">
                     Data Tables
                     <small>Full DataTables Integration</small>
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="../../../index.php">Index</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="index.php">Index Barang</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
<script src="../../js/highcharts.js"></script>
<script src="../../js/highcharts-3d.js"></script>
<script src="../../js/modules/exporting.js"></script>
<?php
	include_once("../../../atas2.php");
?>
<?php
	$q="SELECT distinct b.id_merk,m.nama FROM detail_penjualan d,barang b,merk1 m where tipe_barang='barang' and b.id_barang=d.id_barang and b.id_merk=m.id_merk";
	$sth = mysql_query($q);
		$data_chart = "[";
		while($r = mysql_fetch_array($sth)){
			$p="SELECT sum(d.jumlah_barang) FROM detail_penjualan d,merk1 m,barang b where d.id_barang=b.id_barang and b.id_merk=m.id_merk and b.id_merk=$r[id_merk]";
			$sth1 = mysql_query($p);
			$r1 = mysql_fetch_assoc($sth1);
			$data_chart .= "['".$r["nama"]."',  ".$r1["sum(d.jumlah_barang)"]."],";
		}
		$data_chart .= "]";
?>
<div id="container" class="row-fluid">

<?php //echo $data_chart; ?>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'penjualan '
        },
        subtitle: {
            text: 'Tiap Merk'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: 'jumlah:',
            data: <?php echo $data_chart; ?>
        }]
    });
});
		</script>
</div>
	</body>
</html>
