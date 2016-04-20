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
		include_once("slidebar/slidebar_dikemas.php");
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
                     Dikemas
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="dikemas.php">Dikemas</a> <span class="divider-last">&nbsp;</span>
                       </li>
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
                                    <th class="hidden-phone">Tanggal</th>
									<th class="hidden-phone">Nama</th>
									<th class="hidden-phone">Alamat</th>
									<th class="hidden-phone">No.Hanpdhone</th>
									<th class="hidden-phone">Nama Jasa</th>
									<th class="hidden-phone">Kota</th>
									<th class="hidden-phone">Provinsi</th>
                                    <th class="hidden-phone">Pengiriman</th>
									<th class="hidden-phone">Detail Barang</th>
									<th class="hidden-phone">Kirim</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
								$no=1;
								$q="SELECT *,DATE_FORMAT(p.waktu,'%d-%m-%Y') AS waktu2 FROM penjualan p,member m,kota a,provinsi b,nama_jasa_pengiriman c where p.id_member=m.id_member and  p.id_kota=a.id_kota and p.id_provinsi=b.id_provinsi and p.id_nama_jasa=c.id_nama_jasa and p.status=3";

								$result=mysql_query($q);
								if (!empty($result)){
									while($row=mysql_fetch_array($result))
									{
										$qx="select * from member where `id_member`=$row[id_member] and `ada`=1";

										$result2=mysql_query($qx);
										$row2=mysql_fetch_array($result2);
										
							?>
                                <tr class="odd gradeX">
                                    <td style="text-align:right"><?php echo $no; ?></td>
                                    <td class="hidden-phone"><?php echo $row['waktu2']; ?></td>
									<td><?php echo $row['nama']; ?></td>
									<td><?php echo $row['alamat']; ?></td>
									<td><?php echo $row['no_handphone']; ?></td>
									<td><?php echo $row['nama_jasa']; ?></td>
									<td><?php echo $row['kota']; ?></td>
									<td><?php echo $row['provinsi']; ?></td>
									<td style='text-align:right' style='text-align:right' class="center hidden-phone"><?php echo number_format($row['harga_pengiriman']); ?></td>
									<?php
										echo "<td><a href='penjualan_select_detail_barang.php?id_penjualan=".$row['id_penjualan']."'><center><button type='button' class='btn-info'><i class='icon-list-alt icon-white'></i></button></center></a>  "."</td>";
										echo "<td><a href='updatekirim.php?id_penjualan=".$row['id_penjualan']."'><center><button type='button' class='btn-success'><i class='icon-ok-circle icon-white'></i></button></center></a>  "."</td>";
									?>
                                </tr>
							<?php
										$no++;
									}
								}
							?>
                            </tbody>
                        </table>
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
