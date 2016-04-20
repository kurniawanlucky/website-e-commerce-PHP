-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2015 at 01:19 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `harga` int(20) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `id_merk` int(10) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `berat` int(11) NOT NULL,
  `keterangan` varchar(10000) NOT NULL,
  `jumlah_stock` int(255) NOT NULL,
  PRIMARY KEY (`id_barang`),
  KEY `id` (`id_barang`),
  KEY `id_2` (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=169 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `harga`, `deskripsi`, `id_kategori`, `id_merk`, `volume`, `berat`, `keterangan`, `jumlah_stock`) VALUES
(145, 'dynamic motion', 15000, 'Ukuran parfum : Tinggi: +- 15,7cm, Diameter : +- 2,4 cm', 1, 10, '30ml', 130, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(146, 'freash energy', 15000, 'Ukuran parfum : Tinggi: +- 15,7cm, Diameter : +- 2,4 cm', 1, 10, '30ml', 130, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(147, 'Night Dive', 15000, 'Ukuran parfum : Tinggi: +- 15,7cm, Diameter : +- 2,4 cm', 1, 10, '30ml', 130, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(148, 'Rush Hour', 15000, 'Ukuran parfum : Tinggi: +- 15,7cm, Diameter : +- 2,4 cm', 1, 10, '30', 130, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(149, 'Take Aim', 15000, 'Ukuran parfum : Tinggi: +- 15,7cm, Diameter : +- 2,4 cm', 1, 10, '30ml', 130, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(150, 'Beat Touch', 15000, 'Ukuran parfum : Tinggi: +- 15,7cm, Diameter : +- 2,4 cm', 2, 10, '30ml', 130, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(151, 'Floral Fruity', 15000, 'Ukuran parfum : Tinggi: +- 15,7cm, Diameter : +- 2,4 cm', 2, 10, '30ml', 130, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(152, 'Possion Dream', 15000, 'Ukuran parfum : Tinggi: +- 15,7cm, Diameter : +- 2,4 cm', 2, 10, '30ml', 130, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(153, 'Pure Sensation', 15000, 'Ukuran parfum : Tinggi: +- 15,7cm, Diameter : +- 2,4 cm', 2, 10, '30ml', 130, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(154, 'Summer Breeze', 15000, 'Ukuran parfum : Tinggi: +- 15,7cm, Diameter : +- 2,4 cm', 2, 10, '30ml', 130, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(155, 'Sweet Escape', 15000, 'Ukuran parfum : Tinggi: +- 15,7cm, Diameter : +- 2,4 cm', 2, 10, '30ml', 130, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(156, 'Tropical Punch', 15000, 'Ukuran parfum : Tinggi: +- 15,7cm, Diameter : +- 2,4 cm', 2, 10, '30ml', 130, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(157, 'Command', 20000, 'Ukuran parfum : Tinggi: +- 16,8cm, Diameter : +- 3,1 cm', 1, 11, '60ml', 230, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(158, 'Emotion', 20000, 'Ukuran parfum : Tinggi: +- 16,8cm, Diameter : +- 3,1 cm', 1, 11, '60ml', 230, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(159, 'Energize', 20000, 'Ukuran parfum : Tinggi: +- 16,8cm, Diameter : +- 3,1 cm', 1, 11, '60ml', 230, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(160, 'Macho', 20000, 'Ukuran parfum : Tinggi: +- 16,8cm, Diameter : +- 3,1 cm', 1, 11, '60ml', 230, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(161, 'Speed', 20000, 'Ukuran parfum : Tinggi: +- 16,8cm, Diameter : +- 3,1 cm', 1, 11, '60ml', 230, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(162, 'Stamina', 20000, 'Ukuran parfum : Tinggi: +- 16,8cm, Diameter : +- 3,1 cm', 1, 11, '60ml', 230, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(163, 'Adorable', 20000, 'Ukuran parfum : Tinggi: +- 16,8cm, Diameter : +- 3,1 cm', 2, 11, '60ml', 230, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(164, 'Beautiful', 20000, 'Ukuran parfum : Tinggi: +- 16,8cm, Diameter : +- 3,1 cm', 2, 11, '60ml', 230, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(165, 'Elegant', 20000, 'Ukuran parfum : Tinggi: +- 16,8cm, Diameter : +- 3,1 cm', 2, 11, '60ml', 230, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(166, 'Glamorous', 20000, 'Ukuran parfum : Tinggi: +- 16,8cm, Diameter : +- 3,1 cm', 2, 11, '60ml', 230, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(167, 'Miracle', 20000, 'Ukuran parfum : Tinggi: +- 16,8cm, Diameter : +- 3,1 cm', 2, 11, '60ml', 230, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200),
(168, 'Sexy', 20000, 'Ukuran parfum : Tinggi: +- 16,8cm, Diameter : +- 3,1 cm', 2, 11, '60ml', 230, 'Daya tahan rata-rata berkisar antara 5- 8 jam', 200);

-- --------------------------------------------------------

--
-- Table structure for table `bukti_transfer`
--

CREATE TABLE IF NOT EXISTS `bukti_transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_penjualan` int(11) NOT NULL,
  `bank_customer` varchar(255) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `image` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3202 ;

--
-- Dumping data for table `bukti_transfer`
--

INSERT INTO `bukti_transfer` (`id`, `id_penjualan`, `bank_customer`, `bank`, `image`) VALUES
(2, 37, 'lucky', 'bca', '2364/asdasdjn'),
(4, 38, 'lucky', 'BNI', 'images/38/2-564564-nightdive.jpg'),
(7, 26, 'lucky', 'BCA', 'images/26/26-789456-IMG-20140910-WA0000.jpg'),
(3201, 32, 'BCA', 'BNI', 'images/32/1-logo-ukp.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_paket`
--

CREATE TABLE IF NOT EXISTS `detail_paket` (
  `id_detail_paket` int(255) NOT NULL AUTO_INCREMENT,
  `id_paket_barang` int(255) NOT NULL,
  `id_barang` int(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  PRIMARY KEY (`id_detail_paket`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `detail_paket`
--

INSERT INTO `detail_paket` (`id_detail_paket`, `id_paket_barang`, `id_barang`, `jumlah`) VALUES
(2, 1, 145, 5),
(3, 1, 146, 10),
(7, 1, 147, 5),
(8, 1, 148, 12);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengiriman`
--

CREATE TABLE IF NOT EXISTS `detail_pengiriman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_penjualan` int(11) NOT NULL,
  `no_resi` varchar(20) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_handphone` int(11) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `totalberat` int(11) NOT NULL,
  `harga_pengiriman` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `detail_pengiriman`
--

INSERT INTO `detail_pengiriman` (`id`, `id_penjualan`, `no_resi`, `id_pengiriman`, `nama`, `alamat`, `no_handphone`, `kota`, `provinsi`, `totalberat`, `harga_pengiriman`, `keterangan`) VALUES
(12, 32, '123456', 0, 'lucky', 'petemon barat 112', 2147483647, 'jakarta', 'jawa timur', 0, 200, 'dsfsdfdsf'),
(17, 33, '', 0, 'lucky', 'petemon', 2147483647, 'jakarta', 'jawa timur', 200, 0, 'sadasd'),
(24, 34, '', 0, 'lucky', 'petemon', 2147483647, 'jakarta', 'jawa timur', 200, 5000, 'fgdfgdfg'),
(25, 35, '', 0, 'asdjnasjdk', 'skmfkldmfks', 626526, 'jakarta', 'jawa timur', 200, 0, 'sdjhsdbfh'),
(26, 36, '', 0, 'jsdncjsdn', 'jsdvnjd', 549814, 'jakarta', 'jawa timur', 200, 0, 'sdjjsdkf');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `detail_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `tipe_barang` varchar(10) NOT NULL,
  PRIMARY KEY (`id_penjualan`,`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_penjualan`, `id_barang`, `jumlah_barang`, `harga_barang`, `subtotal`, `tipe_barang`) VALUES
(4, 31, 1, 10000, 0, ''),
(5, 34, 12, 10000, 0, ''),
(5, 36, 1, 10000, 0, ''),
(6, 30, 1, 10000, 0, ''),
(7, 32, 78, 10000, 0, ''),
(8, 30, 10, 10000, 0, ''),
(8, 36, 1, 10000, 0, ''),
(9, 30, 1, 10000, 0, ''),
(10, 30, 12, 10000, 0, ''),
(10, 54, 10, 10000, 0, ''),
(11, 30, 15, 24500, 0, ''),
(11, 63, 1, 40000, 0, ''),
(12, 30, 15, 24500, 0, ''),
(12, 63, 1, 40000, 0, ''),
(13, 30, 1, 24500, 0, ''),
(13, 140, 1, 10000, 0, ''),
(14, 30, 1, 24500, 0, ''),
(14, 140, 1, 10000, 0, ''),
(15, 30, 1, 24500, 0, ''),
(15, 140, 1, 10000, 0, ''),
(16, 30, 1, 24500, 0, ''),
(16, 140, 1, 10000, 0, ''),
(17, 30, 1, 24500, 0, ''),
(17, 140, 1, 10000, 0, ''),
(18, 30, 1, 24500, 0, ''),
(18, 140, 1, 10000, 0, ''),
(19, 140, 1, 10000, 0, ''),
(20, 30, 1, 24500, 0, ''),
(21, 30, 1, 24500, 0, ''),
(22, 30, 1, 24500, 0, ''),
(23, 30, 1, 24500, 0, ''),
(24, 30, 1, 24500, 0, ''),
(25, 30, 1, 24500, 0, ''),
(26, 30, 1, 24500, 0, ''),
(27, 30, 1, 24500, 0, ''),
(28, 30, 1, 24500, 0, ''),
(29, 30, 1, 24500, 0, ''),
(30, 30, 1, 24500, 0, ''),
(31, 32, 1, 21500, 0, ''),
(31, 140, 1, 10000, 0, ''),
(32, 140, 1, 10000, 0, ''),
(33, 140, 1, 10000, 0, ''),
(34, 140, 1, 10000, 0, ''),
(35, 140, 1, 10000, 0, ''),
(36, 140, 1, 10000, 0, ''),
(40, 1, 4, 150000, 600000, 'paket'),
(40, 149, 15, 15000, 225000, 'barang'),
(41, 1, 4, 150000, 600000, 'paket'),
(41, 149, 15, 15000, 225000, 'barang'),
(42, 1, 4, 150000, 600000, 'paket'),
(42, 149, 15, 15000, 225000, 'barang'),
(43, 1, 4, 150000, 600000, 'paket'),
(43, 149, 15, 15000, 225000, 'barang'),
(44, 1, 4, 150000, 600000, 'paket'),
(44, 149, 15, 15000, 225000, 'barang'),
(45, 1, 4, 150000, 600000, 'paket'),
(45, 149, 15, 15000, 225000, 'barang'),
(46, 162, 51, 20000, 1020000, 'barang');

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE IF NOT EXISTS `diskon` (
  `id_diskon` int(20) NOT NULL AUTO_INCREMENT,
  `jumlah_barang` int(100) NOT NULL,
  `diskon` float(10,0) NOT NULL,
  `waktu` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  PRIMARY KEY (`id_diskon`),
  UNIQUE KEY `id_diskon` (`id_diskon`),
  UNIQUE KEY `id_diskon_2` (`id_diskon`),
  UNIQUE KEY `id_diskon_3` (`id_diskon`),
  UNIQUE KEY `id_diskon_4` (`id_diskon`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `jumlah_barang`, `diskon`, `waktu`, `waktu_selesai`) VALUES
(1, 12, 1, '2015-05-12 00:00:00', '2015-05-14 00:00:00'),
(3, 50, 2, '2015-05-13 03:16:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_barang`
--

CREATE TABLE IF NOT EXISTS `gambar_barang` (
  `id_gambar` int(20) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `image` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_gambar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar_barang`
--

INSERT INTO `gambar_barang` (`id_gambar`, `id_barang`, `image`) VALUES
(14201, 142, 'images/142/1-energise.jpg'),
(14301, 143, 'images/143/1-speed.jpg'),
(14401, 144, 'images/144/1-command.jpg'),
(14501, 145, 'images/145/1-dynamicmotion.jpg'),
(14601, 146, 'images/146/1-freashenergy.jpg'),
(14701, 147, 'images/147/1-nightdive.jpg'),
(14801, 148, 'images/148/1-rushhour.jpg'),
(14901, 149, 'images/149/1-takeaim.jpg'),
(15001, 150, 'images/150/1-beattouch.jpg'),
(15101, 151, 'images/151/1-floralfruity.jpg'),
(15201, 152, 'images/152/1-passiondream.jpg'),
(15301, 153, 'images/153/1-puresensation.jpg'),
(15401, 154, 'images/154/1-summerbreeze.jpg'),
(15501, 155, 'images/155/1-sweetescape.jpg'),
(15601, 156, 'images/156/1-tropicalpunch.jpg'),
(15701, 157, 'images/157/1-command.jpg'),
(15801, 158, 'images/158/1-emotion.jpg'),
(15901, 159, 'images/159/1-energise.jpg'),
(16001, 160, 'images/160/1-marcho.jpg'),
(16101, 161, 'images/161/1-speed.jpg'),
(16201, 162, 'images/162/1-stamina.jpg'),
(16301, 163, 'images/163/1-adorable.jpg'),
(16401, 164, 'images/164/1-beautiful.jpg'),
(16501, 165, 'images/165/1-elegant.jpg'),
(16601, 166, 'images/166/1-glamorus.jpg'),
(16701, 167, 'images/167/1-miracle.jpg'),
(16801, 168, 'images/168/1-sexy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori1`
--

CREATE TABLE IF NOT EXISTS `kategori1` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `ada` int(11) NOT NULL,
  `id_merk` int(11) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kategori1`
--

INSERT INTO `kategori1` (`id_kategori`, `nama`, `ada`, `id_merk`) VALUES
(1, 'pria', 1, 1),
(2, 'wanita', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` int(100) NOT NULL AUTO_INCREMENT,
  `kota` varchar(255) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `kota`, `id_provinsi`) VALUES
(1, 'jakarta', 1),
(2, 'surabaya', 1),
(3, 'papua', 0),
(4, 'jombang', 1),
(5, 'besuki', 3);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id_member` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_handphone` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `waktu_daftar` datetime NOT NULL,
  `ada` int(2) NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `username`, `password`, `status`, `nama`, `alamat`, `id_kota`, `id_provinsi`, `email`, `nomor_handphone`, `tanggal_lahir`, `waktu_daftar`, `ada`) VALUES
(10, 'lucky', '1234', 2, 'lucky kurniawan', 'petemon', 1, 1, 'pio.pio.s88@gmail.com', '087852597888', '2015-04-25', '0000-00-00 00:00:00', 1),
(11, 'lucky1', '1234', 1, 'lucky kurniawan', 'petemon', 1, 1, 'pio.pio.s88@gmail.com', '087852597888', '2015-01-17', '2015-01-18 11:23:15', 1),
(12, 'lucky2', '1234', 1, 'lucky k', 'adsd', 1, 1, 'pio.pio.s88@gmail.com', '545646', '2015-01-14', '2015-01-21 04:14:16', 1),
(13, 'pio', '1234', 2, 'pio', 'petemon', 1, 1, 'pio.pio.s88@gmail.com', '087852597888', '2015-01-06', '2015-01-21 04:18:22', 1),
(17, 'lucky3', '1234', 2, 'lucky', 'petemon', 0, 0, 'pio.pio.s88@gmail.com', '087852597888;;;', '0000-00-00', '0000-00-00 00:00:00', 1),
(19, 'felix', '1234', 2, 'felix', 'petemon', 2, 1, 'pio.pio.s88@gmail.com', '081', '2015-05-11', '0000-00-00 00:00:00', 1),
(20, 'lucky11', '1234', 1, 'lucky', 'petemon', 2, 1, 'pio.pio.s88@gmail.com', '081', '1993-12-07', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `merk1`
--

CREATE TABLE IF NOT EXISTS `merk1` (
  `id_merk` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `ada` int(11) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_merk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `merk1`
--

INSERT INTO `merk1` (`id_merk`, `nama`, `ada`, `keterangan`) VALUES
(10, 'musk by lilian ashley', 1, 'parfum yang cocok untuk pria atau wanita'),
(11, 'Christian Jornald', 1, 'karakter aroma lembut / soft tidak menyengat');

-- --------------------------------------------------------

--
-- Table structure for table `nama_jasa_pengiriman`
--

CREATE TABLE IF NOT EXISTS `nama_jasa_pengiriman` (
  `id_nama_jasa` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jasa` varchar(255) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id_nama_jasa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `nama_jasa_pengiriman`
--

INSERT INTO `nama_jasa_pengiriman` (`id_nama_jasa`, `nama_jasa`, `keterangan`, `status`) VALUES
(1, 'PCP', 'jl.petemon', 1),
(7, 'JNE', 'HOKKY', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paket_barang`
--

CREATE TABLE IF NOT EXISTS `paket_barang` (
  `id_paket_barang` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `berat` int(100) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_paket_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `paket_barang`
--

INSERT INTO `paket_barang` (`id_paket_barang`, `nama`, `harga`, `berat`, `keterangan`) VALUES
(1, 'promo', 150000, 500, 'hanya...'),
(2, 'reseller', 150000, 5000, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
  `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT,
  `id_kota` int(128) NOT NULL,
  `id_nama_jasa` int(128) NOT NULL,
  `ekonomi` int(255) NOT NULL,
  `ekspres` int(255) NOT NULL,
  `minimal_berat` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_pengiriman`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_kota`, `id_nama_jasa`, `ekonomi`, `ekspres`, `minimal_berat`, `status`) VALUES
(1, 1, 1, 5000, 1000, '5000', 1),
(2, 1, 1, 5000, 10000, '1', 1),
(3, 2, 1, 12000, 15000, '100', 1),
(4, 5, 7, 15000, 14000, '120', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_penjualan` int(10) NOT NULL AUTO_INCREMENT,
  `id_nama_jasa` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `id_member` int(10) NOT NULL,
  `id_kota` int(255) NOT NULL,
  `id_provinsi` int(255) NOT NULL,
  `total` int(20) NOT NULL,
  `diskon` int(100) NOT NULL,
  `total_bayar` int(20) NOT NULL,
  `no_resi` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_handphone` varchar(255) NOT NULL,
  `total_berat` int(255) NOT NULL,
  `harga_pengiriman` int(255) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `ada` int(2) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_nama_jasa`, `waktu`, `id_member`, `id_kota`, `id_provinsi`, `total`, `diskon`, `total_bayar`, `no_resi`, `nama`, `alamat`, `no_handphone`, `total_berat`, `harga_pengiriman`, `keterangan`, `ada`, `status`) VALUES
(10, 0, '2014-07-19 04:49:14', 9, 0, 0, 220000, 0, 16000, '', '', '', '', 0, 0, '', 1, 3),
(11, 0, '2014-07-25 09:13:11', 9, 0, 0, 407500, 0, 16000, '', '', '', '', 0, 0, '', 1, 1),
(12, 0, '2014-07-25 09:15:23', 9, 0, 0, 407500, 0, 16000, '', '', '', '', 0, 0, '', 0, 1),
(13, 1, '2015-01-22 01:34:29', 10, 1, 1, 34500, 0, 16000, 'L789', 'pio', 'petemon', '0878852597888', 10, 5000000, '', 1, 5),
(14, 1, '2015-01-22 01:36:03', 11, 1, 1, 34500, 0, 16000, 'B456789', 'pios', 'petemon', '0852', 10, 1512348, '', 1, 5),
(15, 0, '2015-01-22 01:41:15', 10, 0, 0, 34500, 0, 16000, '', '', '', '', 0, 0, '', 0, 1),
(16, 0, '2015-01-22 01:42:53', 10, 0, 0, 34500, 0, 16000, '', '', '', '', 0, 0, '', 1, 1),
(17, 0, '2015-01-22 01:44:57', 10, 0, 0, 34500, 0, 16000, '', '', '', '', 0, 0, '', 1, 2),
(18, 0, '2015-01-22 01:47:03', 10, 0, 0, 34500, 0, 16000, '', '', '', '', 0, 0, '', 1, 1),
(19, 0, '2015-01-22 01:50:17', 10, 0, 0, 10000, 0, 16000, '', '', '', '', 0, 0, '', 1, 1),
(20, 0, '2015-01-22 01:57:41', 10, 0, 0, 24500, 0, 16000, '', '', '', '', 0, 0, '', 1, 1),
(21, 0, '2015-01-22 02:01:25', 10, 0, 0, 24500, 0, 16000, '', '', '', '', 0, 0, '', 1, 1),
(22, 0, '2015-01-22 02:11:26', 10, 0, 0, 24500, 0, 16000, '', '', '', '', 0, 0, '', 1, 1),
(23, 0, '2015-01-22 02:17:13', 10, 0, 0, 24500, 0, 16000, '', '', '', '', 0, 0, '', 1, 1),
(24, 0, '2015-01-22 02:17:35', 10, 0, 0, 24500, 0, 16000, '', '', '', '', 0, 0, '', 1, 1),
(25, 0, '2015-01-22 02:17:44', 10, 0, 0, 24500, 0, 16000, '', '', '', '', 0, 0, '', 1, 1),
(26, 1, '2015-01-22 02:18:15', 10, 1, 1, 24500, 0, 16000, 'B12345', 'lucky', 'petemon barat 112', '087852597888', 10, 100000, '', 1, 3),
(27, 0, '2015-01-22 02:18:33', 10, 0, 0, 24500, 0, 16000, 'asad1354', '', '', '', 0, 0, '', 1, 4),
(28, 0, '2015-01-22 02:19:15', 13, 0, 0, 24500, 0, 16000, '', '', '', '', 0, 0, '', 1, 1),
(29, 0, '2015-01-22 02:19:44', 13, 0, 0, 24500, 0, 16000, '', '', '', '', 0, 0, '', 1, 1),
(30, 0, '2015-01-22 02:21:59', 13, 0, 0, 24500, 0, 16000, '', '', '', '', 0, 0, '', 1, 1),
(31, 0, '2015-02-02 07:21:42', 10, 0, 0, 10000, 0, 16000, '', '', '', '', 0, 0, '', 1, 1),
(32, 1, '2015-02-04 07:34:15', 10, 1, 1, 10000, 0, 16000, '', 'lucky', 'petemon barat 112', '087852597888', 5000, 12000, '', 1, 1),
(33, 0, '2015-02-06 03:57:25', 10, 0, 0, 10000, 0, 16000, '', '', '', '', 0, 0, '', 1, 1),
(34, 0, '2015-02-06 04:50:24', 10, 0, 0, 10000, 0, 17000, '', '', '', '', 0, 0, '', 1, 1),
(35, 0, '2015-02-11 04:49:24', 13, 0, 0, 10000, 0, 0, '', '', '', '', 0, 0, '', 1, 1),
(36, 0, '2015-03-09 05:47:44', 10, 0, 0, 10000, 0, 0, '', '', '', '', 0, 0, '', 1, 1),
(37, 0, '2015-05-12 15:47:27', 0, 0, 0, 0, 0, 225000, '', '', '', '', 1950, 0, '', 0, 0),
(38, 0, '2015-05-12 15:47:27', 0, 0, 0, 0, 0, 600000, '', '', '', '', 2000, 0, '', 0, 0),
(39, 0, '2015-05-12 15:48:46', 0, 0, 0, 0, 0, 825000, '', '', '', '', 3950, 0, '', 0, 0),
(40, 0, '2015-05-12 15:52:52', 0, 0, 0, 0, 0, 825000, '', '', '', '', 3950, 0, '', 0, 0),
(41, 0, '2015-05-12 15:56:01', 0, 0, 0, 0, 0, 825000, '', '', '', '', 3950, 0, '', 0, 0),
(42, 0, '2015-05-12 15:57:50', 0, 0, 0, 0, 0, 825000, '', '', '', '', 3950, 0, '', 0, 0),
(43, 0, '2015-05-12 16:00:22', 0, 0, 0, 0, 2250, 825000, '', '', '', '', 3950, 0, '', 0, 0),
(44, 0, '2015-05-12 16:03:09', 0, 0, 0, 0, 2250, 825000, '', '', '', '', 3950, 0, '', 0, 0),
(45, 0, '2015-05-12 16:31:14', 0, 0, 0, 0, 2250, 825000, '', '', '', '', 3950, 0, '', 0, 0),
(46, 1, '2015-05-12 20:39:45', 10, 2, 1, 1020000, 10200, 1024800, '', 'lucky kurniawan', 'petemon', '087852597888', 11730, 15000, 'tidak ada', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `id_provinsi` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(255) NOT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `provinsi`) VALUES
(1, 'jawa timur'),
(2, 'jawa tengah'),
(3, 'jawa barat');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `id_wishlist` int(100) NOT NULL AUTO_INCREMENT,
  `id_member` int(100) NOT NULL,
  `id_barang` int(11) NOT NULL,
  PRIMARY KEY (`id_wishlist`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
