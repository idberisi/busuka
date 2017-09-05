-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24 Jul 2017 pada 11.15
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_busuka_new`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_halte`
--

CREATE TABLE `dta_halte` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `longtitude` varchar(50) NOT NULL,
  `langtitude` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dta_halte`
--

INSERT INTO `dta_halte` (`id`, `nama`, `longtitude`, `langtitude`, `icon`, `gambar`) VALUES
(1, 'Sekupang', '103.9262353', '1.126193', '', ''),
(2, 'Batam Center', '104.0541272', '1.1299186', '', 'batam_center.jpg'),
(3, 'Mega Mall 2', '104.0567635', '1.1299461', '', 'megamall2.jpg'),
(4, 'Ikan Daun', '104.0480109', '1.129366', '', 'ikan_daun.jpg'),
(5, 'Shangrila', '103.943932', '1.1139773', '', 'shangrila.jpg'),
(6, 'Kampung Becek', '103.9469414', '1.1117834', '', 'kampung_becek.jpg'),
(7, 'Kartini', '103.9509014', '1.1086725', '', 'kartini.jpg'),
(8, 'STC', '103.9532394', '1.1068312', '', 'stc.jpg'),
(9, 'GOR Tiban', '103.9582525', '1.1087538', '', 'gor_riban.jpg'),
(10, 'Cipta Puri', '103.9647084', '1.1090823', '', 'Cipta_puri.jpg'),
(11, 'Kantor Pos', '104.0513719', '1.1305117', '', 'kantor_pos.jpg'),
(12, 'Harmoni One', '104.0478745', '1.1307466', '', 'harmoni_one.jpg'),
(13, 'Yos Sudarso', '104.0427752', '1.1255068', '', 'yos_sudarso.jpg'),
(14, 'RSOB', '103.9320773', '1.1293364', '', 'rsob.jpg'),
(15, 'Stadion Sei. Harapan', '103.9535139', '1.1037639', '', 'Stadion_sei_harapan.jpg'),
(16, 'Pasar Sei Harapan', '103.9526141', '1.1029423', '', 'pasar_sei_harapan.jpg'),
(17, 'Harris Resort', '103.9374911', '1.0816281', '', 'harris.jpg'),
(18, 'Merlion', '103.9476617', '1.0566095', '', 'merlion.jpg'),
(19, 'MTS Batu Aji', '103.9392677', '1.0464631', '', 'mts.jpg'),
(20, 'Pool Damri', '103.9261306', '1.0545211', '', 'pool_damri.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_rute`
--

CREATE TABLE `dta_rute` (
  `id` int(11) NOT NULL,
  `nama_rute` varchar(50) NOT NULL,
  `warna` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `dta_rute`
--

INSERT INTO `dta_rute` (`id`, `nama_rute`, `warna`) VALUES
(1, 'Sekupang-Batam Center', '4F87FF'),
(2, 'Batam Center-Sekupang', '5CF1FF'),
(3, 'Sekupang - Tanjung Uncang', 'F4FF19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtx_jalur`
--

CREATE TABLE `dtx_jalur` (
  `id` int(11) NOT NULL,
  `id_halte` int(11) NOT NULL,
  `id_rute` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=Start,2=End,3=Mid,4=Transit'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dtx_jalur`
--

INSERT INTO `dtx_jalur` (`id`, `id_halte`, `id_rute`, `urutan`, `type`) VALUES
(1, 1, 1, 1, 1),
(2, 2, 1, 10, 2),
(3, 3, 1, 9, 5),
(4, 4, 1, 7, 5),
(5, 5, 1, 2, 3),
(6, 6, 1, 3, 3),
(7, 7, 1, 4, 3),
(8, 8, 1, 5, 3),
(9, 2, 2, 1, 1),
(10, 11, 2, 2, 5),
(11, 13, 2, 3, 5),
(12, 14, 2, 9, 5),
(13, 1, 2, 10, 2),
(14, 1, 3, 1, 1),
(15, 15, 3, 2, 5),
(16, 16, 3, 3, 3),
(17, 17, 3, 8, 5),
(18, 18, 3, 8, 5),
(19, 19, 3, 11, 5),
(20, 20, 3, 12, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dta_halte`
--
ALTER TABLE `dta_halte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dta_rute`
--
ALTER TABLE `dta_rute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtx_jalur`
--
ALTER TABLE `dtx_jalur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dta_halte`
--
ALTER TABLE `dta_halte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `dta_rute`
--
ALTER TABLE `dta_rute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dtx_jalur`
--
ALTER TABLE `dtx_jalur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
