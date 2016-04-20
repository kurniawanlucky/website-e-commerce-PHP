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
<style>
.kanan
{
	margin-left:900px;
}
</style>
   <?php
	include_once("atas1.php");
   ?>
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <?php
		include_once("slidebar/slidebar_order.php");
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
                     Detail Penjualan
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="order.php">Penjualan</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="order.php">Order</a><span class="divider-last">&nbsp;</span></li>
					   <li><a href="penjualan_select_detail_barang.php">Detail Order</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            
            
           
            <!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>Managed Table</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th>No</th>
									<th>ID Barang</th>
									<th>Tipe</th>
									<th>Nama Barang</th>
									<th>Nama Paket</th>
                                    <th class="hidden-phone">Jumlah</th>
									<th class="hidden-phone">Harga</th>
                                    <th class="hidden-phone">Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
								$no=1;
								$jumtot=0;
								$result3=mysql_query("select * from penjualan where `id_penjualan`=$_GET[id_penjualan]");
								$row3=mysql_fetch_array($result3);
								$result=mysql_query("select * from detail_penjualan where `id_penjualan`=$_GET[id_penjualan]");
								if (!empty($result)){
									while($row=mysql_fetch_array($result))
									{
										$x="select * from barang where `id_barang`=$row[id_barang]";
										
										$result2=mysql_query($x);
										$row2=mysql_fetch_array($result2);
										
										$y="select * from paket_barang where `id_paket_barang`=$row[id_barang]";
										//echo $y;
										$result3=mysql_query($y);
										$row3=mysql_fetch_array($result3);
										$jml=$row['jumlah_barang'];
										$hrg=$row['harga_barang'];
										$sub=$row['subtotal'];
										$jumtot=$jumtot+$sub;
							?>
                                <tr class="odd gradeX">
								<?php
                                    echo "<td style='text-align:right'>".$no."</td>";
									echo "<td style='text-align:right'>".$row['id_barang']."</td>";
									echo "<td>".$row['tipe_barang']."</td>";
									echo "<td>".$row2['nama']."</td>";
									echo "<td>".$row3['nama']."</td>";
									echo "<td style='text-align:right'>".$row['jumlah_barang']."</td>";
									echo "<td style='text-align:right'> RP ".number_format($row2['harga'])."</td>";
									echo "<td style='text-align:right'> Rp ".number_format($row['subtotal'],0,".",".").",-</td>";
								?>
                                </tr>
							<?php
										$no++;
									}
								}
								
							?>
                            </tbody>
                        </table>
						<?php
							/*echo "<div class='kanan'>";
								echo "jumlah= ";
								echo number_format($jumtot); 
							echo "</div>"; */
						?>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>

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
