-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 04:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(50) NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `nama_buku` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `penerbit` varchar(200) NOT NULL,
  `id_penerbit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `kategori`, `nama_buku`, `harga`, `stok`, `penerbit`, `id_penerbit`) VALUES
(1, 'K1001', 'Keilmuan', 'Analisis & Perancangan Sistem Informasi ', 50000, 65, 'Penerbit Informatika', 1),
(2, 'K1002', 'Keilmuan', 'Artifical Intelligence', 45000, 60, 'Penerbit informatika', 1),
(3, 'K2003', 'Keilmuan', 'Autocad 3 Dimensi', 40000, 25, 'Penerbit informatika', 1),
(5, 'K3004', 'Keilmuan', 'Cloud Computing Technology', 85000, 15, 'Penerbit informatika', 1),
(6, 'B1002', 'Bisnis', 'Etika Bisnis dan Tanggung Jawab Sosial', 68000, 20, 'Penerbit informatika', 1),
(7, 'N1001', 'Novel', 'Cahaya Di penjuru Hati', 68000, 13, 'Andi Offset', 2),
(8, 'N1002', 'Novel', 'Aku Ingin Cerita', 48000, 11, 'Danendra', 3),
(13, 'K1004', 'Keilmuan', 'Autcad ', 60000, 8, 'Penerbit informatika', 1),
(22, 'B1001', 'Bisnis', 'Bisnis Online', 75000, 3, 'Penerbit informatika', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `kode_penerbit` varchar(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `telepon` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `kode_penerbit`, `nama`, `alamat`, `kota`, `telepon`) VALUES
(1, 'SP01', 'Penerbit Informatika', 'Jl. Buah Batu No. 121 ', 'Bandung ', '0813-2220-01946'),
(2, 'SP02', 'Andi Offset', 'Jl. Suryalaya IX No.3', 'Bandung', '0878-3903-0688'),
(3, 'SP03', 'Danendra', 'Jl Moch.Toha 44', 'Bandung', '022-5201215');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penerbit` (`id_penerbit`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
