-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Bulan Mei 2021 pada 12.07
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrecord`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `company`
--

INSERT INTO `company` (`id_company`, `company_name`) VALUES
(1, 'SEGARA ARTHA INVESTAMA'),
(4, 'PARATEKNO'),
(5, 'XSYS'),
(7, 'PERISHABLE LOGISTIC INDONESIA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kb`
--

CREATE TABLE `kb` (
  `id_kb` int(11) NOT NULL,
  `tanggal_kb` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_login` varchar(11) NOT NULL,
  `deskripsi_kb` varchar(100) NOT NULL,
  `id_company` varchar(11) NOT NULL,
  `nominal_kb` int(11) NOT NULL,
  `transfer_kb` varchar(20) NOT NULL,
  `status_terima` varchar(10) NOT NULL DEFAULT 'belum',
  `status_tfkb` varchar(10) NOT NULL DEFAULT 'belum',
  `bukti_tfkb` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kb`
--

INSERT INTO `kb` (`id_kb`, `tanggal_kb`, `id_login`, `deskripsi_kb`, `id_company`, `nominal_kb`, `transfer_kb`, `status_terima`, `status_tfkb`, `bukti_tfkb`) VALUES
(6, '2021-05-11 04:42:02', '3', 'Kas bon UPS untuk keperluan finance paratekno ibu siska jumlah (2)', '1', 120000066, 'ilham tegar', 'belum', 'belum', ''),
(13, '2021-05-13 12:09:28', '1', 'Renewal domain allindonesian.com 17/05/2021', '1', 350000, 'ilham tegar', 'belum', 'belum', ''),
(16, '2021-05-17 03:09:14', '1', 'kas bon ssd untuk upgrade pc ibu siska finance qty(3)', '4', 2200000, 'ilham', 'belum', 'belum', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `nama`, `email`, `password`) VALUES
(1, 'ADMIN', 'admin@gmail.com', 'admin'),
(3, 'Ilham Tegar', 'ilhambintang399@gmail.com', 'Zlnzee!!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb`
--

CREATE TABLE `tb` (
  `id_tb` int(11) NOT NULL,
  `tanggal_tb` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_login` int(11) NOT NULL,
  `id_kb` int(11) NOT NULL,
  `ket_tb` varchar(50) NOT NULL,
  `status_trmtb` varchar(10) NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb`
--

INSERT INTO `tb` (`id_tb`, `tanggal_tb`, `id_login`, `id_kb`, `ket_tb`, `status_trmtb`) VALUES
(9, '2021-05-11 05:43:31', 1, 9, 'test5', 'belum'),
(10, '2021-05-11 06:19:29', 1, 10, 'tes44', 'belum'),
(11, '2021-05-13 08:15:07', 1, 6, 'ok', 'belum'),
(12, '2021-05-13 12:09:55', 3, 13, 'ok', 'belum'),
(13, '2021-05-14 11:20:58', 3, 12, '', 'belum'),
(14, '2021-05-14 11:37:05', 3, 14, 'ok', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl`
--

CREATE TABLE `tbl` (
  `id_tbl` int(11) NOT NULL,
  `tanggal_tbl` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_login` int(11) NOT NULL,
  `deskripsi_tbl` varchar(100) NOT NULL,
  `id_company` int(11) NOT NULL,
  `nominal_tbl` int(11) NOT NULL,
  `transfer_tbl` varchar(30) NOT NULL,
  `status_trmtbl` varchar(10) NOT NULL DEFAULT 'belum',
  `status_trftbl` varchar(10) NOT NULL DEFAULT 'belum',
  `bukti_tftbl` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl`
--

INSERT INTO `tbl` (`id_tbl`, `tanggal_tbl`, `id_login`, `deskripsi_tbl`, `id_company`, `nominal_tbl`, `transfer_tbl`, `status_trmtbl`, `status_trftbl`, `bukti_tftbl`) VALUES
(1, '2021-05-11 07:17:59', 1, 'service printer pli opration', 7, 20000, 'blue line', 'belum', 'belum', ''),
(2, '2021-05-13 12:05:10', 1, 'Service printer epson l3110 punya finance PLI', 7, 1500000, 'blue line', 'belum', 'belum', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indeks untuk tabel `kb`
--
ALTER TABLE `kb`
  ADD PRIMARY KEY (`id_kb`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `tb`
--
ALTER TABLE `tb`
  ADD PRIMARY KEY (`id_tb`);

--
-- Indeks untuk tabel `tbl`
--
ALTER TABLE `tbl`
  ADD PRIMARY KEY (`id_tbl`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kb`
--
ALTER TABLE `kb`
  MODIFY `id_kb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb`
--
ALTER TABLE `tb`
  MODIFY `id_tb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl`
--
ALTER TABLE `tbl`
  MODIFY `id_tbl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
