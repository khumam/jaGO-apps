-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2019 at 07:11 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jago`
--

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `hari` varchar(250) NOT NULL,
  `jam` varchar(250) NOT NULL,
  `biaya` int(11) NOT NULL,
  `biaya_per` varchar(250) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `jenjang` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_jasa` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `mapel_pesanan` varchar(250) NOT NULL,
  `waktu` varchar(250) NOT NULL,
  `durasi` int(11) NOT NULL,
  `catatan` text,
  `status` varchar(250) NOT NULL,
  `nilai` int(11) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id_testi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `testimonial` text,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `bio` text NOT NULL,
  `password` varchar(250) NOT NULL,
  `lokasi` text NOT NULL,
  `lat` float NOT NULL,
  `lon` float NOT NULL,
  `role` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `time_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `bio`, `password`, `lokasi`, `lat`, `lon`, `role`, `is_active`, `time_register`) VALUES
(1, 'Khoerul Umam', 'khoerul27@gmail.com', 'Seorang Blogger biasa yah', 'd38f7bc09f3e54d467a1dedcf9fc24d9', 'Gg Hasanudin No 3 Blok B, Gunung Pati, Semarang, Jawa Tengah', 31.8525, 35.9393, 2, 0, '2019-04-30 13:06:30'),
(5, 'Khoerul Umam', 'notectus@gmail.com', '', '25d55ad283aa400af464c76d713c07ad', '', 0, 0, 3, 0, '2019-04-30 11:44:37'),
(6, 'Khoerul Umam', 'notech27@gmail.com', '', '0640f9d4fc02c430110b4ceede56ba6a', '', 0, 0, 3, 0, '2019-04-30 13:35:40'),
(7, 'Notectus Robert', '123@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, 3, 0, '2019-04-30 23:38:02'),
(8, 'Khoerul Umam', '1234@gmail.com', '', '0640f9d4fc02c430110b4ceede56ba6a', 'Gg Hasanudin, Sekaran, Gunung Pati, Semarang', 0, 0, 2, 0, '2019-05-01 00:00:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id_testi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id_testi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
