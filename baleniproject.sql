-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05 Des 2017 pada 04.43
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `adminName`, `role`, `timeCreated`, `lastLogin`) VALUES
(1, 'mimintamvan@baleni', '12345', 'Super Admin', 1, '2017-11-29 15:01:42', '2017-12-05 03:37:30'),
(2, 'adminbiasa@gmail.com', '12345', 'Admin Biasa Aja Doang', 0, '2017-11-30 03:12:35', '2017-11-30 03:56:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detil_order`
--

CREATE TABLE `detil_order` (
  `id` int(11) NOT NULL,
  `orderid` varchar(10) NOT NULL,
  `kodebarang` varchar(10) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detil_order`
--

INSERT INTO `detil_order` (`id`, `orderid`, `kodebarang`, `kuantitas`, `harga`) VALUES
(1, 'COBA123', 'DXTR1000', 100, '2000000'),
(2, 'COBA123', 'BOTL1000', 12, '19000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `namaKategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `namaKategori`) VALUES
(1, 'SEAFOOD'),
(2, 'MAKANAN BERAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
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
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `kode`, `nama`, `kategori`, `harga`, `deskripsi`, `image`) VALUES
(3, 'CHLK1000', 'RANTAI BAJA', 'SEAFOOD', 1500, 'entahlah ini apa :v', 'assets/fotomenu/SEAFOOD_CHLK1000.jpg'),
(7, 'DXTR1000', 'SEPEDA DELUXE', 'MAKANAN BERAT', 30000, 'asasasasa', 'assets/fotomenu/MAKANAN_BERAT_DXTR1000.jpg'),
(8, 'BOTL1000', 'BOTOL AIR', 'SEAFOOD', 2000, 'lalalala', 'assets/fotomenu/SEAFOOD_BOTL1000.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `kode_order` varchar(11) NOT NULL,
  `tanggalorder` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usercustomer` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tanggalkirim` datetime NOT NULL,
  `totalbayar` int(11) NOT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'Belum Dikonfirmasi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id`, `kode_order`, `tanggalorder`, `usercustomer`, `alamat`, `tanggalkirim`, `totalbayar`, `status`) VALUES
(1, 'COBA123', '2017-12-03 09:32:57', 'ahsanulmarom', 'ITS Surabaya', '2017-12-31 18:00:00', 350000, 'Pesanan Telah Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastLogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `timeCreated`, `lastLogin`) VALUES
(1, 'ahsanulmarom', 'usertamvan@gmail.com', '12345', '2017-11-29 14:28:42', '2017-11-29 15:05:48');

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
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detil_order`
--
ALTER TABLE `detil_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
