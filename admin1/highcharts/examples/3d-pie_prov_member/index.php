<?php
	include_once("../../../connect.php");
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
<script src="../../js/highcharts.js"></script>
<script src="../../js/highcharts-3d.js"></script>
<script src="../../js/modules/exporting.js"></script>
<div class="row-fluid">
   <div class="span12">
	  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
	  <h3 class="page-title">
		 <small>Full DataTables Integration</small>
	  </h3>
	   <ul class="breadcrumb">
		   <li>
			   <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
		   </li>
		   <li>
			   <a href="../../../index.php">Index</a> <span class="divider">&nbsp;</span>
		   </li>
		   <li><a href="index.php">Index Provinsi</a><span class="divider-last">&nbsp;</span></li>
	   </ul>
	  <!-- END PAGE TITLE & BREADCRUMB-->
   </div>
</div>
<?php
	include_once("../../../atas2.php");
?>
<?php
	$q="SELECT * from provinsi";
	//echo $q;
	$sth = mysql_query($q);
		$data_chart = "[";
		while($r = mysql_fetch_array($sth)){
			$p="SELECT count(id_provinsi) FROM `penjualan` where id_provinsi=$r[id_provinsi]";
			$sth1 = mysql_query($p);
			$r1 = mysql_fetch_assoc($sth1);
			$data_chart .= "['".$r["provinsi"]."',  ".$r1["count(id_provinsi)"]."],";
		}
		$data_chart .= 
		"]";
?>

<div id="container" style="height: 400px"></div>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Provinsi dan Penjualan'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'penjualan',
            data:<?php echo $data_chart; ?> 
                
            
        }]
    });
});
</script>
	</body>
</html>
