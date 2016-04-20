<?php
	session_start();
	require 'connect.php';

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <?php
	include_once("head.php");
   ?>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <?php
	include_once("atas1.php");
   ?>
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <?php
		include_once("slidebar/slidebar_penjualan.php");
	  ?>
      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-navy-blue" data-style="navy-blue"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <h3 class="page-title">
                     History Pengiriman
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Penjualan</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="penjualan.php">Penjualan</a><span class="divider">&nbsp;</span></li>
					   <li><a href="penjualankirim.php">Penjualan Kirim</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            
            
           
            <!-- BEGIN ADVANCED TABLE widget-->
            <?php

			echo "<table class='table table-striped table-bordered' id='sample_1'>";
			echo "<thead>
			<tr>
			<th>No</th>
			<th>id Penjualan</th>
			<th>Tanggal</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>No Handphone</th>
			<th>Nama Jasa</th>
			<th>No.Resi</th>
			<th>Kota</th>
			<th>Provinsi</th>
			<th>Pengiriman</th>

			</tr>
			</thead>
			<tbody>";
			$no=1;
			$result=mysql_query("select *,DATE_FORMAT(waktu_kirim,'%d-%m-%Y') AS waktu2 from penjualan where id_penjualan=$_GET[id_penjualan]");
			if (!empty($result)){
				while($row=mysql_fetch_array($result))
				{
					$result2=mysql_query("select * from member where `id_member`=$row[id_member] and `ada`=1");
					$row2=mysql_fetch_array($result2);
					$result3=mysql_query("select * from kota where `id_kota`=$row[id_kota]");
					$row3=mysql_fetch_array($result3);
					$result4=mysql_query("select * from provinsi where `id_provinsi`=$row[id_provinsi]");
					$row4=mysql_fetch_array($result4);
					$result5=mysql_query("select * from nama_jasa_pengiriman where `id_nama_jasa`=$row[id_nama_jasa]");
					$row5=mysql_fetch_array($result5);
					echo "<tr>";
					echo "<td style='text-align:right'>".$no."</td>";
					echo "<td style='text-align:right'>".$row['id_penjualan']."</td>";
					echo "<td>".$row['waktu2']."</td>";
					echo "<td>".$row['nama']."</td>";
					echo "<td>".$row['alamat']."</td>";
					echo "<td>".$row['no_handphone']."</td>";
					echo "<td>".$row5['nama_jasa']."</td>";
					echo "<td>".$row['no_resi']."</td>";
					echo "<td>".$row3['kota']."</td>";
					echo "<td>".$row4['provinsi']."</td>";
					//echo "<td style='text-align:right'> Rp ".number_format($row['total'],0,".",".").",-</td>";
					echo "<td style='text-align:right'>".$row['harga_pengiriman']."</td>";
					//echo "<td style='text-align:right'>".$row['total_bayar']."</td>";
					//echo "<td>".$row['ada']."</td>";
					echo "</tr>";
					$no++;
				}
			}
			echo "</tbody>";
			mysql_close($con);
			?>
				</table>

            <!-- END ADVANCED TABLE widget-->

            <!-- END PAGE CONTENT-->
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <div id="footer">
       2013 &copy; Admin Lab Dashboard.
      <div class="span pull-right">
         <span class="go-top"><i class="icon-arrow-up"></i></span>
      </div>
   </div>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="js/jquery-1.8.3.min.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>   
   <script src="js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->   
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
   <script src="js/scripts.js"></script>
   <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
      });
   </script>
</body>
<!-- END BODY -->
</html>
