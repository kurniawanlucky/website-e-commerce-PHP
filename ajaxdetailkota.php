<?php	
include('connect.php');
$total_berat=$_GET["berat"];
$id_kota=$_GET["kota"];
	echo "<table class='table table-bordered'>";
		echo "<thead>
			<tr>
				<th>No</th>
				<th>Kota</th>
				<th>Provinsi</th>
				<th>Jasa</th>
				<th>Ekspres</th>
				<th>Economi</th>
			</tr>
		</thead>";
									
		echo "<tbody>";
		$no=1;
		$resultx=mysql_query("select * from pengiriman a,kota b,nama_jasa_pengiriman d,provinsi p where a.id_kota=b.id_kota and a.id_nama_jasa=d.id_nama_jasa and p.id_provinsi=b.id_provinsi and a.minimal_berat<=$total_berat and a.id_kota=$id_kota");
		if (!empty($resultx))
		{
			while($rowx=mysql_fetch_array($resultx))
			{
				echo "<tr>";
						echo "<td>".$no."</td>";
						echo "<td>".$rowx['kota']."</td>";
						echo "<td>".$rowx['provinsi']."</td>";
						echo "<td>"."<input type='radio' name='jasa' value='". $rowx["id_nama_jasa"] ."'>".$rowx['nama_jasa']."</td>";
						$ex=$rowx['ekspres'];
						$ec=$rowx['ekonomi'];
						
						echo "<td>"."<input name='str' type='radio' value='$ex'>"; echo $rowx['ekspres'] ."</input>"."</td>";
						echo "<td>"."<input name='str' type='radio' value='$ec'>"; echo $rowx['ekonomi'] ."</input>"."</td>";
						
						$no++;
				echo "</tr>";
			}	
		}
		echo "</tbody>";		
	echo "</table>";
mysql_close($con);
?>