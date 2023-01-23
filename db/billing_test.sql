-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 10:46 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billing_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `nm_lengkap` varchar(50) NOT NULL,
  `nm_instansi` varchar(50) NOT NULL,
  `alamat_instansi` text NOT NULL,
  `email` varchar(35) NOT NULL,
  `no_wa` varchar(13) NOT NULL,
  `jenis_kegiatan` enum('Kegiatan 1','Kegiatan 2','Kegiatan 3','Kegiatan 4') NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `lokasi_kegiatan` text NOT NULL,
  `durasi` time NOT NULL,
  `nominal` int(10) NOT NULL,
  `metode_bayar` enum('Tripay','Midtrans') NOT NULL,
  `status` enum('Belum Lunas','Lunas') NOT NULL,
  `id_billing` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `id_billing` int(11) NOT NULL,
  `metode_bayar` enum('Tripay','Midtrans') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id_billing`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`),
  ADD UNIQUE KEY `id_billing` (`id_billing`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
