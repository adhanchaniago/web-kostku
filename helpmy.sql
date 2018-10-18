-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2018 at 07:41 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpmy`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id_a` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `id_user` varchar(35) NOT NULL,
  `jawaban` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_a`, `id_question`, `id_user`, `jawaban`, `tanggal`) VALUES
(17, 18, 'wildanal2', 'Aisyah aaaaa', '2018-07-11 11:25:32'),
(18, 19, 'pororo', '10', '2018-07-11 13:07:05'),
(20, 17, 'pororo', '2', '2018-07-11 13:12:41'),
(22, 18, 'pororo', 'ok', '2018-07-11 13:24:40'),
(24, 10, 'pororo', '17 Agustus', '2018-07-12 03:02:16'),
(25, 21, 'wildanal2', 'bernafas', '2018-07-12 03:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(75) NOT NULL,
  `icon` varchar(75) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `icon`, `priority`) VALUES
(1, 'Ujian Nasio', 'un1.PNG', 3),
(2, 'Matematika', 'mtk.PNG', 4),
(3, 'Biologi', 'bio.PNG', 8),
(4, 'Kimia', 'kim.PNG', 13),
(5, 'Geografi', 'geo.PNG', 14),
(6, 'TI', 'it.PNG', 15),
(7, 'Penjaskes', 'penjas.PNG', 18),
(8, 'Seni', 'seni.PNG', 12),
(9, 'Wirausaha', 'wirausaha.PNG', 21),
(10, 'Sosiologi', 'sosiologi.PNG', 20),
(11, 'Akutansi', 'akutansi.PNG', 19),
(12, 'Semua', 'all.PNG', 1),
(13, 'Bahasa Arab', 'barab.PNG', 17),
(14, 'Bahasa Perancis', 'bfrance.PNG', 22),
(15, 'Ekonomi', 'ekonomi.PNG', 16),
(16, 'Bahasa Inggris', 'en.PNG', 11),
(17, 'IPS', 'ips.PNG', 7),
(18, 'PPkn', 'ppkn.PNG', 6),
(19, 'SBMPTN', 'sbmptn.PNG', 2),
(20, 'Sejarah', 'sejarah.PNG', 10),
(21, 'Bahasa Indonesia', 'bindo.PNG', 5),
(22, 'Fisika', 'fisika.PNG', 9),
(23, 'aaaa', 'images.png', 24);

-- --------------------------------------------------------

--
-- Table structure for table `likejawaban`
--

CREATE TABLE `likejawaban` (
  `id` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `id_jawaban` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_q` int(11) NOT NULL,
  `id_user` varchar(25) NOT NULL,
  `pertanyaan` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `hadiah` int(11) NOT NULL,
  `count` int(11) DEFAULT '0',
  `tingkatan` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_q`, `id_user`, `pertanyaan`, `kategori`, `hadiah`, `count`, `tingkatan`, `tanggal`) VALUES
(4, 'qwe', 'Arti \"YOLO\" ?', 'Bahasa Indonesia', 5, 0, 'Umum', '2018-06-23 05:23:58'),
(5, 'wildanal2', 'Indonesia disebut negara kepulauan beribu-ribu pulau yang ada di indonesia pulau apakah penghasil tamba terbanyak?', 'Ujian Nasional', 15, 0, 'Sekolah Dasar', '2018-06-30 14:36:45'),
(8, 'qwe', 'Perbedaan Who is he dan What is he jelaskan!!', 'Bahasa Inggris', 15, 0, 'Sekolah Menengah Pertama', '2018-06-27 12:05:45'),
(10, 'qwe', 'Kapan indoneaia merdeka', 'PPkn', 5, 0, 'Sekolah Menengah Pertama', '2018-06-27 12:07:28'),
(12, 'wildanal2', 'appa ya?', 'Seni', 5, 0, 'Umum', '2018-06-30 15:36:52'),
(17, 'qwe', '1+1= \r\nberapa ?', 'Matematika', 5, 0, 'Sekolah Dasar', '2018-07-05 02:01:16'),
(18, 'qwe', 'How are you ?', 'SBMPTN', 5, 0, 'Umum', '2018-07-05 02:03:09'),
(19, 'admin', 'yoo/oloooo\r\noooooooo', 'Matematika', 1000, 0, 'Umum', '2018-07-12 03:29:58'),
(20, 'pororo', 'halooo', 'Matematika', 45, 0, 'Umum', '2018-07-11 13:06:41'),
(21, 'pororo', 'Apa arti dari fotosintesis ?', 'Biologi', 5, 0, 'Sekolah Dasar', '2018-07-12 00:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `username` varchar(35) NOT NULL,
  `poin` int(11) NOT NULL,
  `note` text,
  `pendidikan` varchar(100) DEFAULT NULL,
  `passion_1` varchar(50) DEFAULT NULL,
  `passion_2` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`username`, `poin`, `note`, `pendidikan`, `passion_1`, `passion_2`, `foto`) VALUES
('admin', -50, NULL, NULL, NULL, NULL, 'nopic.jpg'),
('aku', 87, NULL, NULL, NULL, NULL, 'nopic.jpg'),
('ok', 100, NULL, NULL, NULL, NULL, 'nopic.jpg'),
('oke', 100, NULL, NULL, NULL, NULL, 'nopic.jpg'),
('pororo', 38, '', '', 'Ujian Nasio', 'Ujian Nasio', 'bb24379a34b70b3a572292557766bd49.png'),
('qwe', 95, 'Yolooooooooo', 'S2 Teknik Elektro', 'TI', 'Seni', 'Zoro.png'),
('wildanal2', 370, 'yolo yol', 'S1', 'Akutansi', 'TI', '5722a0bd71164026eefb0ae8d53662eb.png'),
('yo', 65, NULL, NULL, NULL, NULL, 'nopic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pwd` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `pwd`, `email`, `level`, `tanggal`) VALUES
(1, 'aku', 'aku', 'aku', 'aku@ak.co', 2, '2018-05-29 04:59:27'),
(2, 'wildanal2', 'Wildan Almubarok', 'a', 'wildanal2@gmail.com', 2, '2018-05-29 05:30:33'),
(3, 'yo', 'yo', 'yo', 'yo', 2, '2018-05-31 21:00:15'),
(4, 'qwe', 'Dang nmed', 'qwe', 'dangeaa.de@gmail.com', 2, '2018-06-04 06:44:21'),
(5, 'admin', 'admin ku', 'a', 'ad@gmail.com', 1, '2018-06-30 16:07:18'),
(7, 'ok', 'ok', 'ok', 'ok@ok.co', 2, '2018-06-30 21:43:14'),
(9, 'oke', 'oke', 'oke', 'ok@ok.co', 2, '2018-07-08 17:32:33'),
(10, 'pororo', 'p', 'p', 'po@po.co', 2, '2018-07-11 13:06:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_a`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likejawaban`
--
ALTER TABLE `likejawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_q`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `likejawaban`
--
ALTER TABLE `likejawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_q` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
