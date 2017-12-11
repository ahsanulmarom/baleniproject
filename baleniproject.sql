-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2017 at 11:08 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baleniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `adminName` varchar(100) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastLogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `adminName`, `role`, `timeCreated`, `lastLogin`) VALUES
(1, 'mimintamvan@baleni', '2779d16cd82a84b1efe928fbd758f6c2', 'Super Admin', 1, '2017-11-29 15:01:42', '2017-12-10 04:17:56'),
(2, 'adminbiasa@gmail.com', '2779d16cd82a84b1efe928fbd758f6c2', 'Admin Biasa Aja Doang', 0, '2017-11-30 03:12:35', '2017-12-09 00:01:09'),
(3, 'testenc@gmail.com', '2779d16cd82a84b1efe928fbd758f6c2', 'Test Enc', 0, '2017-12-10 04:16:33', '2017-12-10 04:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `buktibayar`
--

CREATE TABLE `buktibayar` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `namabayar` varchar(100) NOT NULL,
  `jumlahbayar` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buktibayar`
--

INSERT INTO `buktibayar` (`id`, `kode`, `username`, `namabayar`, `jumlahbayar`, `image`) VALUES
(4, '562', 'ahsanulmarom', 'Ahsan', 350562, 'assets/buktibayar/BAYAR_562.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detil_order`
--

CREATE TABLE `detil_order` (
  `id` int(11) NOT NULL,
  `orderid` varchar(10) NOT NULL,
  `kodebarang` varchar(10) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `deskripsi_order` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_order`
--

INSERT INTO `detil_order` (`id`, `orderid`, `kodebarang`, `kuantitas`, `harga`, `deskripsi_order`) VALUES
(1, '562', 'DXTR1000', 10, '2000000', 'Cabai 1'),
(2, '562', 'BOTL1000', 12, '19000', 'Pedas tanpa cabai'),
(6, '710', 'BOTL1000', 31, '10000', 'qwqwq'),
(7, '710', 'ORMN1000', 30, '50000', 'qeq');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `namaKategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `namaKategori`) VALUES
(1, 'SEAFOOD'),
(2, 'MAKANANBERAT'),
(3, 'MINUMANRINGAN');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `kode`, `nama`, `kategori`, `harga`, `deskripsi`, `image`) VALUES
(10, 'DXTR1000', 'NASI GORENG SPESIAL', 'MAKANANBERAT', 100000, 'Nasi Goreng Spesial', 'assets/fotomenu/MAKANANBERAT_DXTR1000.jpg'),
(11, 'BOTL1000', 'NASI GORENG TIDAK SPESIAL', 'MINUMANRINGAN', 10000, 'Nasi Goreng Tidak Spesial', 'assets/fotomenu/MINUMANRINGAN_CHLK1000.jpg'),
(12, 'ORMN1000', 'NASI GORENG BIASA AJA', 'SEAFOOD', 50000, 'Nasi Goreng Biasa Aja', 'assets/fotomenu/SEAFOOD_ORMN1000.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `kode_order` varchar(11) NOT NULL,
  `tanggalorder` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usercustomer` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `noTelp` varchar(20) NOT NULL,
  `tanggalkirim` datetime NOT NULL,
  `totalbayar` int(11) NOT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'Menunggu Pembayaran'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `kode_order`, `tanggalorder`, `usercustomer`, `alamat`, `noTelp`, `tanggalkirim`, `totalbayar`, `status`) VALUES
(1, '562', '2017-12-03 09:32:57', 'ahsanulmarom', 'ITS Surabaya', '08986767688', '2017-12-31 18:00:00', 350562, 'Pembayaran Telah Dilakukan'),
(4, '710', '2017-12-09 00:21:08', 'ahsanulmarom', 'uhhikj, Cakung Timur,  Cakung, Kota Jakarta Timur', '868768768768', '2017-12-25 15:00:00', 1810710, 'Menunggu Pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastLogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `nama`, `timeCreated`, `lastLogin`) VALUES
(1, 'ahsanulmarom', 'ahsanulmarom@gmail.com', '2779d16cd82a84b1efe928fbd758f6c2', 'Ahsanul Marom', '2017-11-29 14:28:42', '2017-11-29 15:05:48'),
(6, 'userenc', 'user1@gmail.com', '50bfb44558265ad517f1906032aad168', 'User Enc', '2017-12-10 04:22:02', '2017-12-10 04:22:02'),
(7, 'Savirajatnika', 'savirajatnika@gmail.com', '0cef45fd8063be400498e678dd44b404', 'savirajatnika', '2017-12-11 09:32:36', '2017-12-11 09:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_desa`
--

CREATE TABLE `wilayah_desa` (
  `id` varchar(10) NOT NULL,
  `kecamatan_id` varchar(7) DEFAULT NULL,
  `nama` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah_desa`
--

INSERT INTO `wilayah_desa` (`id`, `kecamatan_id`, `nama`) VALUES
('3171010001', '3171010', 'Cipedak'),
('3171010002', '3171010', 'Srengseng Sawah'),
('3171010003', '3171010', 'Ciganjur'),
('3171010004', '3171010', 'Jagakarsa'),
('3171010005', '3171010', 'Lenteng Agung'),
('3171010006', '3171010', 'Tanjung Barat'),
('3171020001', '3171020', 'Cilandak Timur'),
('3171020002', '3171020', 'Ragunan'),
('3171020003', '3171020', 'Kebagusan'),
('3171020004', '3171020', 'Pasar Minggu'),
('3171020005', '3171020', 'Jati Padang'),
('3171020006', '3171020', 'Pejaten Barat'),
('3171020007', '3171020', 'Pejaten Timur'),
('3171030001', '3171030', 'Lebak Bulus'),
('3171030002', '3171030', 'Pondok Labu'),
('3171030003', '3171030', 'Cilandak Barat'),
('3171030004', '3171030', 'Gandaria Selatan'),
('3171030005', '3171030', 'Cipete Selatan'),
('3171040001', '3171040', 'Bintaro'),
('3171040002', '3171040', 'Pesanggrahan'),
('3171040003', '3171040', 'Ulujami'),
('3171040004', '3171040', 'Petukangan Selatan'),
('3171040005', '3171040', 'Petukangan Utara'),
('3171050001', '3171050', 'Pondok Pinang'),
('3171050002', '3171050', 'Kebayoran Lama Selatan'),
('3171050003', '3171050', 'Kebayoran Lama Utara'),
('3171050004', '3171050', 'Cipulir'),
('3171050005', '3171050', 'Grogol Selatan'),
('3171050006', '3171050', 'Grogol Utara'),
('3171060001', '3171060', 'Gandaria Utara'),
('3171060002', '3171060', 'Cipete Utara'),
('3171060003', '3171060', 'Pulo'),
('3171060004', '3171060', 'Petogogan'),
('3171060005', '3171060', 'Melawai'),
('3171060006', '3171060', 'Kramat Pela'),
('3171060007', '3171060', 'Gunung'),
('3171060008', '3171060', 'Selong'),
('3171060009', '3171060', 'Rawa Barat'),
('3171060010', '3171060', 'Senayan'),
('3171070001', '3171070', 'Bangka'),
('3171070002', '3171070', 'Pela Mampang'),
('3171070003', '3171070', 'Tegal Parang'),
('3171070004', '3171070', 'Mampang Prapatan'),
('3171070005', '3171070', 'Kuningan Barat'),
('3171080001', '3171080', 'Kalibata'),
('3171080002', '3171080', 'Rawajati'),
('3171080003', '3171080', 'Duren Tiga'),
('3171080004', '3171080', 'Pancoran'),
('3171080005', '3171080', 'Pengadegan'),
('3171080006', '3171080', 'Cikoko'),
('3171090001', '3171090', 'Menteng Dalam'),
('3171090002', '3171090', 'Tebet Barat'),
('3171090003', '3171090', 'Tebet Timur'),
('3171090004', '3171090', 'Kebon Baru'),
('3171090005', '3171090', 'Bukit Duri'),
('3171090006', '3171090', 'Manggarai Selatan'),
('3171090007', '3171090', 'Manggarai'),
('3171100001', '3171100', 'Karet Semanggi'),
('3171100002', '3171100', 'Kuningan Timur'),
('3171100003', '3171100', 'Karet Kuningan'),
('3171100004', '3171100', 'Karet'),
('3171100005', '3171100', 'Menteng Atas'),
('3171100006', '3171100', 'Pasar Manggis'),
('3171100007', '3171100', 'Guntur'),
('3171100008', '3171100', 'Setia Budi'),
('3172010001', '3172010', 'Pekayon'),
('3172010002', '3172010', 'Kalisari'),
('3172010003', '3172010', 'Baru'),
('3172010004', '3172010', 'Cijantung'),
('3172010005', '3172010', 'Gedong'),
('3172020001', '3172020', 'Cibubur'),
('3172020002', '3172020', 'Kelapa Dua Wetan'),
('3172020003', '3172020', 'Ciracas'),
('3172020004', '3172020', 'Susukan'),
('3172020005', '3172020', 'Rambutan'),
('3172030001', '3172030', 'Pondok Ranggon'),
('3172030002', '3172030', 'Cilangkap'),
('3172030003', '3172030', 'Munjul'),
('3172030004', '3172030', 'Cipayung'),
('3172030005', '3172030', 'Setu'),
('3172030006', '3172030', 'Bambu Apus'),
('3172030007', '3172030', 'Ceger'),
('3172030008', '3172030', 'Lubang Buaya'),
('3172040001', '3172040', 'Pinang Ranti'),
('3172040002', '3172040', 'Makasar'),
('3172040003', '3172040', 'Kebon Pala'),
('3172040004', '3172040', 'Halim Perdana Kusumah'),
('3172040005', '3172040', 'Cipinang Melayu'),
('3172050001', '3172050', 'Bale Kambang'),
('3172050002', '3172050', 'Batu Ampar'),
('3172050003', '3172050', 'Kampung Tengah'),
('3172050004', '3172050', 'Dukuh'),
('3172050005', '3172050', 'Kramat Jati'),
('3172050006', '3172050', 'Cililitan'),
('3172050007', '3172050', 'Cawang'),
('3172060001', '3172060', 'Bidara Cina'),
('3172060002', '3172060', 'Cipinang Cempedak'),
('3172060003', '3172060', 'Cipinang Besar Selatan'),
('3172060004', '3172060', 'Cipinang Muara'),
('3172060005', '3172060', 'Cipinang Besar Utara'),
('3172060006', '3172060', 'Rawa Bunga'),
('3172060007', '3172060', 'Bali Mester'),
('3172060008', '3172060', 'Kampung Melayu'),
('3172070001', '3172070', 'Pondok Bambu'),
('3172070002', '3172070', 'Duren Sawit'),
('3172070003', '3172070', 'Pondok Kelapa'),
('3172070004', '3172070', 'Pondok Kopi'),
('3172070005', '3172070', 'Malaka Jaya'),
('3172070006', '3172070', 'Malaka Sari'),
('3172070007', '3172070', 'Klender'),
('3172080001', '3172080', 'Jatinegara'),
('3172080002', '3172080', 'Penggilingan'),
('3172080003', '3172080', 'Pulo Gebang'),
('3172080004', '3172080', 'Ujung Menteng'),
('3172080005', '3172080', 'Cakung Timur'),
('3172080006', '3172080', 'Cakung Barat'),
('3172080007', '3172080', 'Rawa Terate'),
('3172090001', '3172090', 'Pisangan Timur'),
('3172090002', '3172090', 'Cipinang'),
('3172090003', '3172090', 'Jatinegara Kaum'),
('3172090004', '3172090', 'Jati'),
('3172090005', '3172090', 'Rawamangun'),
('3172090006', '3172090', 'Kayu Putih'),
('3172090007', '3172090', 'Pulo Gadung'),
('3172100001', '3172100', 'Kebon Manggis'),
('3172100002', '3172100', 'Pal Meriem'),
('3172100003', '3172100', 'Pisangan Baru'),
('3172100004', '3172100', 'Kayu Manis'),
('3172100005', '3172100', 'Utan Kayu Selatan'),
('3172100006', '3172100', 'Utan Kayu Utara'),
('3173010001', '3173010', 'Gelora'),
('3173010002', '3173010', 'Bendungan Hilir'),
('3173010003', '3173010', 'Karet Tengsin'),
('3173010004', '3173010', 'Kebon Melati'),
('3173010005', '3173010', 'Petamburan'),
('3173010006', '3173010', 'Kebon Kacang'),
('3173010007', '3173010', 'Kampung Bali'),
('3173020001', '3173020', 'Menteng'),
('3173020002', '3173020', 'Pegangsaan'),
('3173020003', '3173020', 'Cikini'),
('3173020004', '3173020', 'Gondangdia'),
('3173020005', '3173020', 'Kebon Sirih'),
('3173030001', '3173030', 'Kenari'),
('3173030002', '3173030', 'Paseban'),
('3173030003', '3173030', 'Kramat'),
('3173030004', '3173030', 'Kwitang'),
('3173030005', '3173030', 'Senen'),
('3173030006', '3173030', 'Bungur'),
('3173040001', '3173040', 'Johar Baru'),
('3173040002', '3173040', 'Kampung Rawa'),
('3173040003', '3173040', 'Tanah Tinggi'),
('3173040004', '3173040', 'Galur'),
('3173050001', '3173050', 'Rawa Sari'),
('3173050002', '3173050', 'Cempaka Putih Timur'),
('3173050003', '3173050', 'Cempaka Putih Barat'),
('3173060001', '3173060', 'Harapan Mulya'),
('3173060002', '3173060', 'Cempaka Baru'),
('3173060003', '3173060', 'Sumur Batu'),
('3173060004', '3173060', 'Serdang'),
('3173060005', '3173060', 'Utan Panjang'),
('3173060006', '3173060', 'Kebon Kosong'),
('3173060007', '3173060', 'Kemayoran'),
('3173060008', '3173060', 'Gunung Sahari Selatan'),
('3173070001', '3173070', 'Pasar Baru'),
('3173070002', '3173070', 'Gunung Sahari Utara'),
('3173070003', '3173070', 'Kartini'),
('3173070004', '3173070', 'Karang Anyar'),
('3173070005', '3173070', 'Mangga Dua Selatan'),
('3173080001', '3173080', 'Cideng'),
('3173080002', '3173080', 'Petojo Selatan'),
('3173080003', '3173080', 'Gambir'),
('3173080004', '3173080', 'Kebon Kelapa'),
('3173080005', '3173080', 'Petojo Utara'),
('3173080006', '3173080', 'Duri Pulo'),
('3276010003', '3276010', 'Pengasinan'),
('3276010004', '3276010', 'Bedahan'),
('3276010005', '3276010', 'Pasir Putih'),
('3276010006', '3276010', 'Sawangan Baru'),
('3276010007', '3276010', 'Sawangan Lama'),
('3276010013', '3276010', 'Kedaung'),
('3276010014', '3276010', 'Cinangka'),
('3276011001', '3276011', 'Duren Seribu'),
('3276011002', '3276011', 'Duren Mekar'),
('3276011003', '3276011', 'Bojongsari Lama'),
('3276011004', '3276011', 'Bojongsari Baru'),
('3276011005', '3276011', 'Curug'),
('3276011006', '3276011', 'Pondok Petir'),
('3276011007', '3276011', 'Serua'),
('3276020006', '3276020', 'Rangkapan Jaya Baru'),
('3276020007', '3276020', 'Rangkapan Jaya'),
('3276020008', '3276020', 'Mampang'),
('3276020009', '3276020', 'Pancoran Mas'),
('3276020010', '3276020', 'Depok Jaya'),
('3276020011', '3276020', 'Depok'),
('3276021001', '3276021', 'Cipayung Jaya'),
('3276021002', '3276021', 'Bojong Pondok Terong'),
('3276021003', '3276021', 'Pondok Jaya'),
('3276021004', '3276021', 'Ratujaya'),
('3276021005', '3276021', 'Cipayung'),
('3276030006', '3276030', 'Sukmajaya'),
('3276030007', '3276030', 'Tirtajaya'),
('3276030008', '3276030', 'Mekar Jaya'),
('3276030009', '3276030', 'Abadijaya'),
('3276030010', '3276030', 'Bakti Jaya'),
('3276030011', '3276030', 'Cisalak'),
('3276031001', '3276031', 'Kalimulya'),
('3276031002', '3276031', 'Jatimulya'),
('3276031003', '3276031', 'Kalibaru'),
('3276031004', '3276031', 'Cilodong'),
('3276031005', '3276031', 'Sukamaju'),
('3276040007', '3276040', 'Curug'),
('3276040009', '3276040', 'Harjamukti'),
('3276040010', '3276040', 'Cisalak Pasar'),
('3276040011', '3276040', 'Mekarsari'),
('3276040012', '3276040', 'Tugu'),
('3276040013', '3276040', 'Pasir Gunung Selatan'),
('3276041001', '3276041', 'Cilangkap'),
('3276041002', '3276041', 'Cimpaeun'),
('3276041003', '3276041', 'Tapos'),
('3276041004', '3276041', 'Leuwinaggung'),
('3276041005', '3276041', 'Jatijajar'),
('3276041006', '3276041', 'Sukamaju Baru'),
('3276041007', '3276041', 'Sukatani'),
('3276050001', '3276050', 'Beji'),
('3276050002', '3276050', 'Beji Timur'),
('3276050003', '3276050', 'Kemirimuka'),
('3276050004', '3276050', 'Pondok Cina'),
('3276050005', '3276050', 'Kukusan'),
('3276050006', '3276050', 'Tanah Baru'),
('3276060001', '3276060', 'Meruyung'),
('3276060002', '3276060', 'Grogol'),
('3276060003', '3276060', 'Krukut'),
('3276060004', '3276060', 'Limo'),
('3276061001', '3276061', 'Cinere'),
('3276061002', '3276061', 'Gandul'),
('3276061003', '3276061', 'Pangkalanjati Baru'),
('3276061004', '3276061', 'Pangkalanjati');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_kabupaten`
--

CREATE TABLE `wilayah_kabupaten` (
  `id` varchar(4) NOT NULL,
  `provinsi_id` varchar(2) NOT NULL DEFAULT '',
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah_kabupaten`
--

INSERT INTO `wilayah_kabupaten` (`id`, `provinsi_id`, `nama`) VALUES
('3171', '31', 'Kota Jakarta Selatan'),
('3172', '31', 'Kota Jakarta Timur'),
('3173', '31', 'Kota Jakarta Pusat'),
('3276', '32', 'Kota Depok');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_kecamatan`
--

CREATE TABLE `wilayah_kecamatan` (
  `id` varchar(7) NOT NULL,
  `kabupaten_id` varchar(4) NOT NULL DEFAULT '',
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah_kecamatan`
--

INSERT INTO `wilayah_kecamatan` (`id`, `kabupaten_id`, `nama`) VALUES
('3171010', '3171', ' Jagakarsa'),
('3171020', '3171', ' Pasar Minggu'),
('3171030', '3171', ' Cilandak'),
('3171040', '3171', ' Pesanggrahan'),
('3171050', '3171', ' Kebayoran Lama'),
('3171060', '3171', ' Kebayoran Baru'),
('3171070', '3171', ' Mampang Prapatan'),
('3171080', '3171', ' Pancoran'),
('3171090', '3171', ' Tebet'),
('3171100', '3171', ' Setia Budi'),
('3172010', '3172', ' Pasar Rebo'),
('3172020', '3172', ' Ciracas'),
('3172030', '3172', ' Cipayung'),
('3172040', '3172', ' Makasar'),
('3172050', '3172', ' Kramat Jati'),
('3172060', '3172', ' Jatinegara'),
('3172070', '3172', ' Duren Sawit'),
('3172080', '3172', ' Cakung'),
('3172090', '3172', ' Pulo Gadung'),
('3172100', '3172', ' Matraman'),
('3173010', '3173', ' Tanah Abang'),
('3173020', '3173', ' Menteng'),
('3173030', '3173', ' Senen'),
('3173040', '3173', ' Johar Baru'),
('3173050', '3173', ' Cempaka Putih'),
('3173060', '3173', ' Kemayoran'),
('3173070', '3173', ' Sawah Besar'),
('3173080', '3173', ' Gambir'),
('3276010', '3276', ' Sawangan'),
('3276011', '3276', ' Bojongsari'),
('3276020', '3276', ' Pancoran Mas'),
('3276021', '3276', ' Cipayung'),
('3276030', '3276', ' Sukma Jaya'),
('3276031', '3276', ' Cilodong'),
('3276040', '3276', ' Cimanggis'),
('3276041', '3276', ' Tapos'),
('3276050', '3276', ' Beji'),
('3276060', '3276', ' Limo'),
('3276061', '3276', ' Cinere');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `buktibayar`
--
ALTER TABLE `buktibayar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `detil_order`
--
ALTER TABLE `detil_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_order` (`kode_order`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `wilayah_desa`
--
ALTER TABLE `wilayah_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wilayah_kabupaten`
--
ALTER TABLE `wilayah_kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wilayah_kecamatan`
--
ALTER TABLE `wilayah_kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `buktibayar`
--
ALTER TABLE `buktibayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `detil_order`
--
ALTER TABLE `detil_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
