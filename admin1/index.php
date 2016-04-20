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
		include_once("slidebar/slidebar.php");
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
                     Data Index
                     
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Penjualan</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Order</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            
            
           
            <!-- BEGIN OVERVIEW STATISTIC BARS-->
                    <div class="row-fluid circle-state-overview">
                        <div class="span2 responsive clearfix" data-tablet="span3" data-desktop="span2">
							<?php
									$tanggal=date("Y/m/d");
									$resultuser=mysql_query("SELECT COUNT(*) FROM  `member` WHERE waktu_daftar =  '$tanggal'");
									while($rowuser=mysql_fetch_array($resultuser))
									{
										$new_user=$rowuser['COUNT(*)'];
									}
									//echo $new_user;
								?>
                            <div class="circle-wrap">
                                <div class="stats-circle turquoise-color">
                                    <i class="icon-user"></i>
                                </div>
                                <p>
                                    <strong>+<?php echo $new_user; ?></strong>
                                    New Users
                                </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
							<?php
									$resultpenjualan=mysql_query("SELECT sum(jumlah) FROM `penjualan` WHERE waktu= '$tanggal'");
									while($rowpenjualan=mysql_fetch_array($resultpenjualan))
									{
										$penjualan=$rowpenjualan['sum(jumlah)'];
									}
							?>
                            <div class="circle-wrap">
                                <div class="stats-circle red-color">
                                    <i class="icon-tags"></i>
                                </div>
                                <p>
                                    <strong>Rp <?php echo number_format($penjualan); ?></strong>
                                    Sales
                                </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
							<?php
								$resultorder=mysql_query("SELECT COUNT(*) FROM  `penjualan` WHERE waktu =  '$tanggal'");
								while($roworder=mysql_fetch_array($resultorder))
								{
									$new_order=$roworder['COUNT(*)'];
								}
							?>
                            <div class="circle-wrap">
                                <div class="stats-circle green-color">
                                    <i class="icon-shopping-cart"></i>
                                </div>
                                <p>
                                    <strong>+<?php echo $new_order; ?></strong>
                                    New Order
                                </p>
                            </div>
                        </div>
                        <!--<div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle gray-color">
                                    <i class="icon-comments-alt"></i>
                                </div>
                                <p>
                                    <strong>+530</strong>
                                    Comments
                                </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle purple-color">
                                    <i class="icon-eye-open"></i>
                                </div>
                                <p>
                                    <strong>+430</strong>
                                    Unique Visitor
                                </p>
                            </div>
                        </div>
                        <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle blue-color">
                                    <i class="icon-bar-chart"></i>
                                </div>
                                <p>
                                    <strong>+230</strong>
                                    Updates
                                </p>
                            </div>
                        </div>-->


                    </div>
                    <!-- END OVERVIEW STATISTIC BARS-->
					<?php
						$resultmerk=mysql_query("SELECT * FROM `merk1`");
						while($rowmerk=mysql_fetch_array($resultmerk))
						{
							echo "<div class='row-fluid circle-state-overview'>";
							echo "<center>"."<h1>".$rowmerk['nama']."</h1>"."</center>";
							$z="SELECT * FROM `barang` WHERE id_merk=$rowmerk[id_merk]";
							$resultbarang=mysql_query($z);
							while($rowbarang=mysql_fetch_array($resultbarang))
							{
					?>
					 
						<div class="span2 responsive" data-tablet="span3" data-desktop="span2">
                            <div class="circle-wrap">
                                <div class="stats-circle grey-color">
								<?php
									$x="SELECT * FROM `gambar_barang` WHERE id_barang=$rowbarang[id_barang]";
									$resultgambar=mysql_query($x);
									$rowgambar=mysql_fetch_array($resultgambar)
								?>
                                    <?php echo "<a href='stock_tambah.php?id_barang=".$rowbarang['id_barang']."'>"; ?> <img style='margin-top:15px'; src= <?php echo $rowgambar['image']; ?> height="70" width="50"></a>
                                </div>
                                <p>
                                    <strong><?php echo $rowbarang["jumlah_belum_kirim"]; ?></strong>
                                    <?php echo $rowbarang["nama"]; ?>
                                </p>
                            </div>
                        </div>
					 
					<?php
							}
						echo "</div>";
						}
					?>
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
