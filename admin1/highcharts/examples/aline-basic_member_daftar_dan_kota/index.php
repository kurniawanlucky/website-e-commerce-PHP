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
<script src="../../js/modules/exporting.js"></script>
<div class="row-fluid">
   <div class="span12">
	  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
	  <h3 class="page-title">
		 <small>Index Daftar Member</small>
	  </h3>
	   <ul class="breadcrumb">
		   <li>
			   <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
		   </li>
		   <li>
			   <a href="../../../index.php">Index</a> <span class="divider">&nbsp;</span>
		   </li>
		   <li><a href="index.php">Index Daftar Member</a><span class="divider-last">&nbsp;</span></li>
	   </ul>
	  <!-- END PAGE TITLE & BREADCRUMB-->
   </div>
</div>
<?php
	include_once("../../../atas2.php");
?>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Daftar Member',
            x: -20 //center
        },
        subtitle: {
            text: 'Tahun <?php echo $tahun; ?>',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: 'orang'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [
		<?php
			$query = "select * from provinsi";
			$resultProvinsi = mysql_query($query);
			while($rowProvinsi = mysql_fetch_array($resultProvinsi)){
				$id_provinsi = $rowProvinsi["id_provinsi"];
				$provinsi = $rowProvinsi["provinsi"];
				$data = "[";
				for($bulan = 1; $bulan <= 12; $bulan++){
					if($bulan > 1){
						$data .= ", ";
					}
					$jumlah_member = 0;
					$query = "select count(*) as total from member 
							where id_provinsi='$id_provinsi' and month(waktu_daftar)='$bulan'
								and year(waktu_daftar)='$tahun' ";
					//echo $query;
					$resultData = mysql_query($query);
					if($rowData = mysql_fetch_array($resultData)){
						$jumlah_member = $rowData["total"];
					}
					
					$data .= $jumlah_member; 
				}
				$data .= "]";
		?>
		{
            name: '<?php echo $provinsi; ?>',
            data: <?php echo $data; ?>
        },
		<?php
			}
		?>]
    });
});
</script>
	</body>
</html>
