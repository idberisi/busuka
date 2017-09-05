-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Jul 2017 pada 11.28
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
(10, 'Cipta Puri', '103.9647084', '1.1090823', '', 'Cipta_puri.jpg');

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
(2, 'Batam Center-Sekupang', '76728GH');

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
(8, 8, 1, 5, 3);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dta_rute`
--
ALTER TABLE `dta_rute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dtx_jalur`
--
ALTER TABLE `dtx_jalur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
