<header id="header"><!--header-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/usahaparfum.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a class="active" href="profile.php"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="session_shopping_cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="wishlist.php"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="logout.php"><i class="fa fa-crosshairs"></i> Logout</a></li>
								<?php
									if(!isset($_SESSION['nama']))
									{
										?>
											<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
										<?php	
									}
									else
									{
										//echo "<a href='php_do/logout.php' ><div class='logout-hex'></div></a>";
										
										echo "<li>";
										echo "<div class='warna'>";
										echo "Logged in as <a href='memberpage/profile.php'>";
										echo "</div>";
										echo "</li>";
										echo "<li>";
										echo $_SESSION['nama'];
										echo "</a>";
										echo "</li>";
										
										//echo "</div>";
										
									}
								 ?>
								
							</ul>
					</div>
				</div>
			</div>
	
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home</a></li>
								<li><a href="kirim_bukti_transfer.php">Send Payment Confirmation</a></li>
								<li><a href="status_order.php">Order Status</a></li>
								<li><a href="riwayat_pembelian.php">Order History</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
	</header><!--/header-->