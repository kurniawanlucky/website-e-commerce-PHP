<?php
	include_once("../../../connect.php");
	$tahun = date("Y");

?>
<!DOCTYPE HTML>
<html>
<head>
<?php
	include_once("../../../head2.php");
?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Index Penjualan</title>
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
		 <small>Index Penjualan</small>
	  </h3>
	   <ul class="breadcrumb">
		   <li>
			   <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
		   </li>
		   <li>
			   <a href="../../../index.php">Index</a> <span class="divider">&nbsp;</span>
		   </li>
		   <li><a href="index.php">Index Penjualan</a><span class="divider-last">&nbsp;</span></li>
	   </ul>
	  <!-- END PAGE TITLE & BREADCRUMB-->
   </div>
</div>
<?php
	include_once("../../../atas2.php");
?>
<div id="container" style="height: 400px"></div>
<?php
		
	$datachart = "[";
	for($i=1; $i<=12; $i++)
	{
		if($i > 1)
		{
			$datachart .= ", ";
		}
		$totalpenjualan = 0;
		
		$query = "select sum(total) as total from penjualan where month(waktu) = '$i' and year(waktu)='$tahun'";
		//echo $query;
		$resultData = mysql_query($query);
		if($rowData = mysql_fetch_array($resultData)){
			if(isset($rowData["total"])){
				$totalpenjualan = $rowData["total"];
			}
		}
		
		$datachart .= $totalpenjualan;
	}
	$datachart .= "]";
?>

<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column',
            margin: 75,
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: 'Penjualan Tiap Bulan'
        },
        subtitle: {
            text: ''
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        xAxis: {
            categories: Highcharts.getOptions().lang.shortMonths
        },
        yAxis: {
            title: {
                text: null
            }
        },
        series: [{
            name: 'Penjualan',
            data: <?php echo $datachart; ?>
        }]
    });
});
</script>
	</body>
</html>
