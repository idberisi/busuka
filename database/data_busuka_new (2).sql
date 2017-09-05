-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 Jul 2017 pada 12.14
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
(0, 'Sekupang', '103.9262353', '1.126193', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dta_rute`
--

CREATE TABLE `dta_rute` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `warna` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `dta_rute`
--

INSERT INTO `dta_rute` (`id`, `nama`, `warna`) VALUES
(1, 'Sekupang-Batam Center', 'FFFFFF'),
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
(1, 0, 1, 1, 1);

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
-- AUTO_INCREMENT for table `dta_rute`
--
ALTER TABLE `dta_rute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dtx_jalur`
--
ALTER TABLE `dtx_jalur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
