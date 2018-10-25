-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2018 at 08:59 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kostku`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_fasilitas`
--

CREATE TABLE `daftar_fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `kategori` varchar(10) DEFAULT NULL,
  `nama_fasilitas` varchar(30) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_fasilitas`
--

INSERT INTO `daftar_fasilitas` (`id_fasilitas`, `kategori`, `nama_fasilitas`, `icon`) VALUES
(1, 'Umum', 'Kamar Mandi', 'a.jpg'),
(2, 'Kamar', 'Dapur', 'b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_fasilitas`
--

CREATE TABLE `data_fasilitas` (
  `id_kamar` int(11) DEFAULT NULL,
  `id_fasilitas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `ukuran` varchar(50) DEFAULT NULL,
  `foto_kamar` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `is_rented` tinyint(1) NOT NULL,
  `id_kost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `ukuran`, `foto_kamar`, `harga`, `is_rented`, `id_kost`) VALUES
(2, '4 x 6', 'bghome.jpg', 500000, 0, NULL),
(3, '4 x 6', 'bghome1.jpg', 500000, 0, 2),
(4, '3 x 4', 'bghome2.jpg', 450000, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kost`
--

CREATE TABLE `kost` (
  `id_kost` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text,
  `kota` varchar(30) DEFAULT NULL,
  `propinsi` varchar(30) DEFAULT NULL,
  `Kelamin` varchar(10) DEFAULT NULL,
  `deskripsi` text,
  `jumlah_kamar` int(3) DEFAULT NULL,
  `foto_kost` varchar(50) DEFAULT NULL,
  `id_pemilik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kost`
--

INSERT INTO `kost` (`id_kost`, `nama`, `alamat`, `kota`, `propinsi`, `Kelamin`, `deskripsi`, `jumlah_kamar`, `foto_kost`, `id_pemilik`) VALUES
(1, 'anna', 'jl. kembang turi no 2', 'Malang', 'Jawa Timur', 'Campur', 'wasd', 0, 'k1.jpg', 1),
(2, 'Kost Ulala', 'yoyo', 'Malang', 'Jawa Timur', 'Putra', 'ssss', 0, 'bghome2.jpg', 1),
(3, '', 'jfheuikjf', 'Malang', 'Jawa Timur', 'Pria', 'coba', 0, 'k130.jpg', NULL),
(4, '', 'a', 'Malang', 'Jawa Timur', 'a', 'a', 0, 'k131.jpg', NULL),
(6, '', 'l', 'Malang', 'Jawa Timur', 'l', 'l', 0, 'k133.jpg', NULL),
(7, '', 'jl. remujung', 'Malang', 'Jawa Timur', 'Perempuan', 'wasd', 0, 'k1.jpg', NULL),
(8, 'ssssssss', 'jl. remujung', 'Malang', 'Jawa Timur', 'Putra', 'wasd', 0, 'k11.jpg', 1),
(9, '', 'jl. remujung', 'Malang', 'Jawa Timur', 'Perempuan', 'wasd', 0, 'k12.jpg', 1),
(10, '', 'ww', 'Malang', 'Jawa Timur', 'Campur', 'aaa', 0, 'k1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `no_hp`, `level`, `is_activated`) VALUES
(1, 'ra', 'aab3238922bcc25a6f606eb525ffdc56', 'mail@mail.com', '14', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_fasilitas`
--
ALTER TABLE `daftar_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `data_fasilitas`
--
ALTER TABLE `data_fasilitas`
  ADD KEY `fk_fasilitas` (`id_fasilitas`),
  ADD KEY `fk_kamar` (`id_kamar`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `fk_kost` (`id_kost`);

--
-- Indexes for table `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`id_kost`),
  ADD KEY `fk_pemilik` (`id_pemilik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_fasilitas`
--
ALTER TABLE `daftar_fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kost`
--
ALTER TABLE `kost`
  MODIFY `id_kost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_fasilitas`
--
ALTER TABLE `data_fasilitas`
  ADD CONSTRAINT `fk_fasilitas` FOREIGN KEY (`id_fasilitas`) REFERENCES `daftar_fasilitas` (`id_fasilitas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kamar` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `fk_kost` FOREIGN KEY (`id_kost`) REFERENCES `kost` (`id_kost`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kost`
--
ALTER TABLE `kost`
  ADD CONSTRAINT `fk_pemilik` FOREIGN KEY (`id_pemilik`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
