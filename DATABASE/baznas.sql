-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2023 pada 18.04
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baznas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_zakat` int(11) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `besaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_zakat`, `jenis`, `besaran`) VALUES
(1, 'Solok / Sokan', 45000),
(2, 'Anak Daro', 35000),
(3, 'IR 42', 32500),
(4, 'Dolok / Bulog', 27500),
(6, 'emas', 990000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_byr` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_bayar` int(11) NOT NULL,
  `namabyr` varchar(50) NOT NULL,
  `jmlh` int(11) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `foto` text NOT NULL,
  `status_byr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_byr`, `tgl`, `id_bayar`, `namabyr`, `jmlh`, `jenis`, `foto`, `status_byr`) VALUES
(1, '2023-07-28', 1, 'Alexander Iqbal', 50000, 'Donasi', 'logo.png', 'Terverifikasi'),
(2, '2023-08-01', 5, 'Babal', 70000, 'Fitrah', 'logo.png', 'Terverifikasi'),
(3, '2023-08-01', 5, 'Alex', 162500, 'Fitrah', 'logo.png', 'Terverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerima`
--

CREATE TABLE `penerima` (
  `id_penerima` int(11) NOT NULL,
  `penerima` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `id_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penerima`
--

INSERT INTO `penerima` (`id_penerima`, `penerima`, `alamat`, `id_pembayaran`) VALUES
(1, 'Rifano', 'Padang', 1),
(2, 'Rifano', 'Padang', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pasw` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `pasw`, `level`, `status`) VALUES
(1, 'Alexander Iqbal', 'alex', 'alex', 'User', 'Terverifikasi'),
(2, 'alex', 'alex', 'alex', 'User', 'Terverifikasi'),
(3, 'Iqbal', 'iqbal', 'iqbal', 'User', 'Terverifikasi'),
(5, 'Admin', 'admin', 'admin', 'Admin', 'Terverifikasi'),
(6, 'Rizal', 'rizal', 'rizal', 'User', 'Unverifikasi'),
(7, 'Syifa', 'syifa', 'syifa', 'User', 'Unverifikasi'),
(8, 'Syifa', 'Syifa', 'admin', 'Admin', 'Terverifikasi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_zakat`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_byr`);

--
-- Indeks untuk tabel `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`id_penerima`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_zakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_byr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penerima`
--
ALTER TABLE `penerima`
  MODIFY `id_penerima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
