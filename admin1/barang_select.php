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
		include_once("slidebar/slidebar_barang.php");
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
                     Data Barang
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Barang</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="barang_select.php">Barang</a><span class="divider-last">&nbsp;</span></li>
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
						<a href="barang_add_barang.php"><button class="btn btn-primary">Add barang</button></a>
						<p>
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
									<th>No</th>
									<th>ID Barang</th>
									<th>Nama Barang</th>
									<th>Jenis</th>
									<th>Harga</th>
									<th>Volume</th>
									<th>Berat</th>
									<th>Stock</th>
									<th>Deskripsi</th>
									<th>keterangan</th>
									<th>Ke Gambar</th>
									<th>Komentar</th>
									<th>Hapus</th>
									<th>Edit</th>
								</tr>
                            </thead>
                            <tbody>
							<?php 
								$no=1;
								$result=mysql_query("select * from barang where `id_merk`=$_SESSION[id_merk] and `id_kategori`=$_SESSION[id_kategori] and `jumlah_stock`>=1");
								if (!empty($result)){
									while($row=mysql_fetch_array($result))
									{
							?>
                                <tr class="odd gradeX">
								<?php
									$result1=mysql_query("select * from jenis where id_jenis=$row[id_jenis]");
									$row1=mysql_fetch_array($result1);
									echo "<td style='text-align:right'>".$no."</td>";
									echo "<td style='text-align:right'>".$row['id_barang']."</td>";
									echo "<td>".$row['nama']."</td>";
									echo "<td>".$row1['jenis']."</td>";
									echo "<td style='text-align:right'> Rp ".number_format($row['harga'],0,".",".").",-</td>";
									echo "<td>".$row['volume']."</td>";
									echo "<td>".$row['berat']."</td>";
									echo "<td>".$row['jumlah_stock']."</td>";
									echo "<td>".$row['deskripsi']."</td>";		
									echo "<td>".$row['keterangan']."</td>";
									//echo "<td>".$row['release_date']."</td>";
									//echo "<td>".$row['ada']."</td>";
									echo "<td><a href='barang_simpan_session_barang.php?id_barang=".$row['id_barang']."'><button type='button' class='btn-custom6 btn-small'><i class='icon-chevron-right'></i></button></a></td>  ";
									$result1=mysql_query("SELECT count(*) FROM `komentar` WHERE status=0 and id_barang=$row[id_barang]");
									$row1=mysql_fetch_array($result1);
									if($row1['count(*)']==0)
									{
										echo "<td><a href='barang_select_komentar.php?id_barang=".$row['id_barang']."'><button type='button' class='btn btn-info btn-small'><i class='icon-comment icon-white'></i></button></a></td>  ";		
									}
									else
									{
										echo "<td><a href='barang_select_komentar.php?id_barang=".$row['id_barang']."'><button type='button' class='btn btn-inverse btn-small'><i class='icon-comment icon-white'></i></button></a></td>  ";
									}
									echo "<td><a href='barang_delete_barang.php?id_barang=".$row['id_barang']."'><button type='button' class='btn-custom5 btn-small'><i class='icon-trash icon-white'></i></button></a></td>  ";
									echo "<td><a href='barang_barang_edit.php?id_barang=".$row['id_barang']."'><button type='button' class='btn-custom7 btn-small'><i class='icon-pencil icon-white'></i></button></a></td>";
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
