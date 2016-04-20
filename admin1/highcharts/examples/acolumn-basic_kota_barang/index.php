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
<?php
	$query = "select * from merk1";
	$resultMerk = mysql_query($query);
	$i = 1;
	while($rowMerk = mysql_fetch_array($resultMerk)){
		$id_merk = $rowMerk["id_merk"];
		$nama_merk = $rowMerk["nama"];
		
		$categories = "[";
		$data_categories = array();
		$query = "select * from barang where id_merk='$id_merk'";
		$resultBarang = mysql_query($query);
		$j = 0;
		while($rowBarang = mysql_fetch_array($resultBarang)){
			array_push($data_categories,$rowBarang["id_barang"]);
			if($j > 0)
			{
				$categories .= ", ";
			}
			$categories .= "'".$rowBarang["nama"]."'";
			
			$j++;
		}
		$categories .= "]";
		
?>
<div id="container_<?php echo $i; ?>" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<script type="text/javascript">
$(function () {
    $('#container_<?php echo $i; ?>').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Penjualan Parfum <?php echo  $nama_merk; ?>'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: <?php echo $categories; ?>,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} pcs</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
		<?php
			$query = "select * from provinsi";
			$resultProvinsi = mysql_query($query);
			while($rowProvinsi = mysql_fetch_array($resultProvinsi)){
				$id_provinsi = $rowProvinsi["id_provinsi"];
				$provinsi = $rowProvinsi["provinsi"];
				
				$data = "[";
				for($j=0; $j<count($data_categories); $j++){
					$id_barang = $data_categories[$j];
					if($j > 0)
					{
						$data .= ",";
					}
					$totalterjual = 0;
					
					$query = "select sum(jumlah_barang) as total from detail_penjualan 
								inner join penjualan on detail_penjualan.id_penjualan=penjualan.id_penjualan
							where penjualan.id_provinsi='$id_provinsi' and detail_penjualan.tipe_barang='barang'
								and detail_penjualan.id_barang='$id_barang' ";
					//echo $query;
					$resultData = mysql_query($query);
					if($rowData = mysql_fetch_array($resultData)){
						if(isset($rowData["total"])){
							$totalterjual = $rowData["total"];
						}
					}
					
					$data .= $totalterjual;
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
<?php
		$i++;
	}
?>
	</body>
</html>
