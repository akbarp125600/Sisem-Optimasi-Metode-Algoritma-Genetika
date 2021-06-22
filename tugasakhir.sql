-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2021 at 02:31 PM
-- Server version: 10.5.2-MariaDB-log
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_pekerjaan`
--

CREATE TABLE `bahan_pekerjaan` (
  `id_bahan_pekerjaan` varchar(50) NOT NULL,
  `id_jenis_pekerjaan` varchar(50) NOT NULL,
  `id_pekerjaan` varchar(50) NOT NULL,
  `id_harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bmt`
--

CREATE TABLE `bmt` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pk` bigint(200) NOT NULL,
  `em` float NOT NULL,
  `met` float NOT NULL,
  `lis` float NOT NULL,
  `ca` float NOT NULL,
  `p` float NOT NULL,
  `harga` bigint(50) NOT NULL,
  `waktu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bmt`
--

INSERT INTO `bmt` (`id`, `nama`, `pk`, `em`, `met`, `lis`, `ca`, `p`, `harga`, `waktu`, `id_jenis`) VALUES
(1, 'Karyawan PT.Dpi', 800000, 0, 0, 0, 0, 0, 800000, '2', 4),
(2, 'Karyawan PT.Dpi', 1000000, 0, 0, 0, 0, 0, 1000000, '1', 4),
(3, 'Karyawan PT.Dpi', 1500000, 0, 0, 0, 0, 0, 1500000, '1', 4),
(4, 'karyawan pt.dpi', 1000000, 0, 0, 0, 0, 0, 1000000, '1', 5),
(5, 'karyawan pt.dpi', 7500000, 0, 0, 0, 0, 0, 7500000, '3', 5),
(6, 'karyawan pt.dpi', 1100000, 0, 0, 0, 0, 0, 1100000, '2', 5),
(7, 'Karyawan PT.Dpi', 900000, 0, 0, 0, 0, 0, 900000, '5', 6),
(8, 'Karyawan PT.Dpi', 1200000, 0, 0, 0, 0, 0, 1200000, '3', 6),
(9, 'Karyawan PT.Dpi', 1000000, 0, 0, 0, 0, 0, 1000000, '4', 6),
(10, 'Vendor 1', 128000000, 0, 0, 0, 0, 0, 128000000, '19', 7),
(11, 'Vendor 2', 124000000, 0, 0, 0, 0, 0, 124000000, '22', 7),
(12, 'Vendor 3', 125000000, 0, 0, 0, 0, 0, 125000000, '20', 7),
(13, 'Vendor 1', 365000000, 0, 0, 0, 0, 0, 365000000, '59', 8),
(14, 'Vendor 2', 360000000, 0, 0, 0, 0, 0, 360000000, '60', 8),
(15, 'Vendor 3 ', 358000000, 0, 0, 0, 0, 0, 358000000, '62', 8),
(16, 'Vendor 1', 78000000, 0, 0, 0, 0, 0, 78000000, '17', 9),
(17, 'Vendor 2', 80000000, 0, 0, 0, 0, 0, 80000000, '15', 9),
(18, 'Vendor 3', 81000000, 0, 0, 0, 0, 0, 81000000, '14', 9),
(19, 'Vendor 1', 28000000, 0, 0, 0, 0, 0, 28000000, '17', 10),
(20, 'Vendor 2', 32000000, 0, 0, 0, 0, 0, 32000000, '14', 10),
(21, 'Vendor 3', 30000000, 0, 0, 0, 0, 0, 30000000, '15', 10),
(22, 'Vendor 1', 35000000, 0, 0, 0, 0, 0, 35000000, '15', 11),
(23, 'Vendor 2', 38000000, 0, 0, 0, 0, 0, 38000000, '13', 11),
(24, 'Vendor 3', 31000000, 0, 0, 0, 0, 0, 31000000, '17', 11),
(25, 'Vendor 1', 1000000, 0, 0, 0, 0, 0, 1000000, '2', 12),
(26, 'Vendor 2', 1500000, 0, 0, 0, 0, 0, 1500000, '1', 12),
(27, 'Vendor 3 ', 800000, 0, 0, 0, 0, 0, 800000, '3', 12),
(28, 'Vendor 1', 38000000, 0, 0, 0, 0, 0, 38000000, '5', 13),
(29, 'Vendor 2', 35000000, 0, 0, 0, 0, 0, 35000000, '7', 13),
(30, 'Vendor 3 ', 33000000, 0, 0, 0, 0, 0, 33000000, '9', 13),
(31, 'Karyawan PT.Dpi', 12000000, 0, 0, 0, 0, 0, 12000000, '7', 14),
(32, 'Karyawan PT.Dpi', 11000000, 0, 0, 0, 0, 0, 11000000, '9', 14),
(33, 'Karyawan PT.Dpi', 14000000, 0, 0, 0, 0, 0, 14000000, '6', 14),
(34, 'Karyawan PT.Dpi', 1400000, 0, 0, 0, 0, 0, 1400000, '1', 15),
(35, 'Karyawan PT.Dpi', 1000000, 0, 0, 0, 0, 0, 1000000, '2', 15),
(36, 'Karyawan PT.Dpi', 900000, 0, 0, 0, 0, 0, 900000, '3', 15);

-- --------------------------------------------------------

--
-- Table structure for table `data_pekerjaan`
--

CREATE TABLE `data_pekerjaan` (
  `id_pekerjaan` varchar(50) NOT NULL,
  `id_jenis_pekerjaan` varchar(50) NOT NULL,
  `nama_pekerjaan` varchar(50) NOT NULL,
  `biaya` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_satuan`
--

CREATE TABLE `data_satuan` (
  `id_satuan` varchar(50) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_satuan`
--

INSERT INTO `data_satuan` (`id_satuan`, `nama_satuan`, `keterangan`) VALUES
('1', 'M', 'Meter'),
('2', 'M2', 'Meterpersegi');

-- --------------------------------------------------------

--
-- Table structure for table `harga_bahan`
--

CREATE TABLE `harga_bahan` (
  `id_harga` varchar(11) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `satuan` varchar(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `tahun` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga_bahan`
--

INSERT INTO `harga_bahan` (`id_harga`, `nama_bahan`, `satuan`, `harga`, `tahun`, `keterangan`) VALUES
('1', 'Plat Besii', 'M', 200000, 2019, 'Harga Tahun 2010');

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE `histori` (
  `id` int(11) NOT NULL,
  `popsize` int(11) NOT NULL,
  `generasi` int(11) NOT NULL,
  `cr` float NOT NULL,
  `mr` float NOT NULL,
  `fitness` float NOT NULL,
  `id_usia` int(11) NOT NULL,
  `jml_komp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histori_detailbmt`
--

CREATE TABLE `histori_detailbmt` (
  `id` int(11) NOT NULL,
  `id_bmt` int(11) NOT NULL,
  `id_histori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histori_detailrekom`
--

CREATE TABLE `histori_detailrekom` (
  `id` int(11) NOT NULL,
  `id_rekom` int(11) NOT NULL,
  `id_histori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bmt`
--

CREATE TABLE `jenis_bmt` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_bmt`
--

INSERT INTO `jenis_bmt` (`id`, `nama_jenis`) VALUES
(4, 'Pengukuran Volume Proyek'),
(5, 'Negosiasi Harga'),
(6, 'Perancangan Pembuatan Mesin'),
(7, 'Pembuatan Centrifugal Blower'),
(8, 'Pembuatan Bag Filter'),
(9, 'Instalalsi Pipa Ducting'),
(10, 'Pemasangan Pipa Ducting'),
(11, 'Paemasangan Bag Filter'),
(12, 'Pemasangan Centrifugal Blower'),
(13, 'Pembuatan dan Pemasangan Panel'),
(14, 'Finishing Keseluruhan'),
(15, 'Uji Coba Kelayakan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pekerjaan`
--

CREATE TABLE `jenis_pekerjaan` (
  `id_jenis_pekerjaan` int(50) NOT NULL,
  `jenis_pekerjaan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pekerjaan`
--

INSERT INTO `jenis_pekerjaan` (`id_jenis_pekerjaan`, `jenis_pekerjaan`, `keterangan`) VALUES
(1, 'Pengukuran Volume Proyekkk', '-'),
(2, 'Negosiasi Harga', '-'),
(3, 'Perancangan Pembuatan Mesin', '-'),
(4, 'Pembuatan Centrifugal Blower', '-'),
(5, 'Pembuatan Bag Filter', '-'),
(6, 'Instalasi Pipa Ducting', '-'),
(7, 'Pemasangan Pipa Ducting', '-'),
(8, 'Pemasangan Bag Filter', '-'),
(9, 'Pemasangan Centrifugal Blower', '-'),
(10, 'Pembuatan dan Pemasangan Panel', '-'),
(11, 'Finishing Keseluruhan', '-'),
(12, 'Uji Coba  Kelayakan', '-');

-- --------------------------------------------------------

--
-- Table structure for table `kebutuhan`
--

CREATE TABLE `kebutuhan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pk` float NOT NULL,
  `em` float NOT NULL,
  `met` float NOT NULL,
  `lis` float NOT NULL,
  `ca` float NOT NULL,
  `p` float NOT NULL,
  `harga` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kebutuhan`
--

INSERT INTO `kebutuhan` (`id`, `nama`, `umur`, `pk`, `em`, `met`, `lis`, `ca`, `p`, `harga`, `waktu`) VALUES
(2, 'Centrifugal Blower', '9-20', 16, 2700, 0.29, 0.74, 0.8, 0.6, '682000000', '149'),
(3, 'Back Filter', '>20', 18, 2700, 0.37, 1.05, 3, 0.6, '682000000', '149'),
(4, 'Dust Collector System', '>30', 0, 0, 0, 0, 0, 0, '682000000', '149');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `pwd`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_pekerjaan`
--
ALTER TABLE `bahan_pekerjaan`
  ADD PRIMARY KEY (`id_bahan_pekerjaan`),
  ADD KEY `id_jenis_pekerjaan` (`id_jenis_pekerjaan`,`id_pekerjaan`,`id_harga`),
  ADD KEY `id_harga` (`id_harga`),
  ADD KEY `id_pekerjaan` (`id_pekerjaan`);

--
-- Indexes for table `bmt`
--
ALTER TABLE `bmt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `data_pekerjaan`
--
ALTER TABLE `data_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`),
  ADD KEY `id_jenis_pekerjaan` (`id_jenis_pekerjaan`);

--
-- Indexes for table `data_satuan`
--
ALTER TABLE `data_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `harga_bahan`
--
ALTER TABLE `harga_bahan`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usia` (`id_usia`);

--
-- Indexes for table `histori_detailbmt`
--
ALTER TABLE `histori_detailbmt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_histori` (`id_histori`),
  ADD KEY `id_bmt` (`id_bmt`);

--
-- Indexes for table `histori_detailrekom`
--
ALTER TABLE `histori_detailrekom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_histori` (`id_histori`);

--
-- Indexes for table `jenis_bmt`
--
ALTER TABLE `jenis_bmt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  ADD PRIMARY KEY (`id_jenis_pekerjaan`);

--
-- Indexes for table `kebutuhan`
--
ALTER TABLE `kebutuhan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `histori`
--
ALTER TABLE `histori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `histori_detailbmt`
--
ALTER TABLE `histori_detailbmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `histori_detailrekom`
--
ALTER TABLE `histori_detailrekom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahan_pekerjaan`
--
ALTER TABLE `bahan_pekerjaan`
  ADD CONSTRAINT `bahan_pekerjaan_ibfk_1` FOREIGN KEY (`id_harga`) REFERENCES `harga_bahan` (`id_harga`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bahan_pekerjaan_ibfk_3` FOREIGN KEY (`id_pekerjaan`) REFERENCES `data_pekerjaan` (`id_pekerjaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bmt`
--
ALTER TABLE `bmt`
  ADD CONSTRAINT `bmt_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_bmt` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `histori`
--
ALTER TABLE `histori`
  ADD CONSTRAINT `histori_ibfk_1` FOREIGN KEY (`id_usia`) REFERENCES `kebutuhan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `histori_detailbmt`
--
ALTER TABLE `histori_detailbmt`
  ADD CONSTRAINT `histori_detailbmt_ibfk_4` FOREIGN KEY (`id_bmt`) REFERENCES `bmt` (`id`),
  ADD CONSTRAINT `histori_detailbmt_ibfk_5` FOREIGN KEY (`id_histori`) REFERENCES `histori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `histori_detailrekom`
--
ALTER TABLE `histori_detailrekom`
  ADD CONSTRAINT `histori_detailrekom_ibfk_1` FOREIGN KEY (`id_histori`) REFERENCES `histori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
