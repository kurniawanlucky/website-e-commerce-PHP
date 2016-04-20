<?php
	function get_nama_barang($pid){
		$result=mysql_query("select nama from barang where id_barang=$pid");
		$row=mysql_fetch_array($result);
		return $row['nama'];
	}
	function get_warna_barang($cid){
		$result=mysql_query("select image from gambar_barang where id_barang=$cid");
		$row=mysql_fetch_array($result);
		return $row['image'];
	}
	function get_harga($pid){
		$result=mysql_query("select harga from barang where id_barang=$pid");
		$row=mysql_fetch_array($result);
		return $row['harga'];
	}
	function remove_barang($pid,$cid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['id_barang'] && $cid==$_SESSION['cart'][$i]['id_gambar']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
	}
	function get_order_total(){
		if(!isset($_SESSION['cart'])){
		$max=0;
		}
		else{
		$max=count($_SESSION['cart']);
		}
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['id_barang'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_harga($pid);
			$sum+=$price*$q;
		}
		return $sum;
	}
	function get_jumlah_total(){
		if(!isset($_SESSION['cart'])){
		$max=0;
		}
		else{
		$max=count($_SESSION['cart']);
		}
		$sum=0;
		for($i=0;$i<$max;$i++){
			$q=$_SESSION['cart'][$i]['qty'];
			$sum+=$q;
		}
		return $sum;
	}
	function addtocart($pid,$cid,$q){
		if($pid<1 or $cid<1 or $q<1) return;
		
		if(is_array($_SESSION['cart'])){
			if(barang_ada($pid,$cid)) return;
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['id_barang']=$pid;
			$_SESSION['cart'][$max]['id_gambar']=$cid;
			$_SESSION['cart'][$max]['qty']=$q;
		}
		else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['id_barang']=$pid;
			$_SESSION['cart'][0]['id_gambar']=$cid;
			$_SESSION['cart'][0]['qty']=$q;
		}
	}
	function barang_ada($pid, $cid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['id_barang'] && $cid==$_SESSION['cart'][$i]['id_gambar']){
				$flag=1;
				break;
			}
		}
		return $flag;
	}

?>