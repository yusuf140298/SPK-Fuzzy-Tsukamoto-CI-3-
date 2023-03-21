-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jan 2022 pada 19.23
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(2) NOT NULL COMMENT '[1]Admin,[2]User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `level`) VALUES
(5, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(7, 'user', '12dea96fec20593566ab75692c9949596833adc9', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_fuzzyfikasi`
--

CREATE TABLE `data_fuzzyfikasi` (
  `id_fuzzyfikasi` int(11) NOT NULL,
  `id_ip` int(11) NOT NULL,
  `x_sedikit` double NOT NULL,
  `x_sedang` double NOT NULL,
  `x_banyak` double NOT NULL,
  `y_sedikit` double NOT NULL,
  `y_sedang` double NOT NULL,
  `y_banyak` double NOT NULL,
  `z_sedikit` double NOT NULL,
  `z_sedang` double NOT NULL,
  `z_banyak` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_fuzzyfikasi`
--

INSERT INTO `data_fuzzyfikasi` (`id_fuzzyfikasi`, `id_ip`, `x_sedikit`, `x_sedang`, `x_banyak`, `y_sedikit`, `y_sedang`, `y_banyak`, `z_sedikit`, `z_sedang`, `z_banyak`) VALUES
(1, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1),
(2, 2, 0, 1, 0, 0, 0.83, 0.167, 0, 0.57, 0.428),
(5, 3, 0, 0.75, 0.25, 0, 0.66, 0.33, 0, 0.285, 0.714);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_input_produksi`
--

CREATE TABLE `data_input_produksi` (
  `id_ip` int(11) NOT NULL,
  `tanggal_ip` date NOT NULL,
  `permintaan` int(100) NOT NULL,
  `persediaan` int(100) NOT NULL,
  `produksi` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_input_produksi`
--

INSERT INTO `data_input_produksi` (`id_ip`, `tanggal_ip`, `permintaan`, `persediaan`, `produksi`) VALUES
(1, '2021-03-01', 2800, 1200, 3200),
(2, '2021-03-08', 2400, 950, 3000),
(3, '2021-03-15', 2500, 1000, 3100),
(4, '2021-03-22', 2000, 600, 2500);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_fuzzyfikasi`
--
ALTER TABLE `data_fuzzyfikasi`
  ADD PRIMARY KEY (`id_fuzzyfikasi`),
  ADD KEY `id_ip` (`id_ip`);

--
-- Indeks untuk tabel `data_input_produksi`
--
ALTER TABLE `data_input_produksi`
  ADD PRIMARY KEY (`id_ip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `data_fuzzyfikasi`
--
ALTER TABLE `data_fuzzyfikasi`
  MODIFY `id_fuzzyfikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `data_input_produksi`
--
ALTER TABLE `data_input_produksi`
  MODIFY `id_ip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_fuzzyfikasi`
--
ALTER TABLE `data_fuzzyfikasi`
  ADD CONSTRAINT `data_fuzzyfikasi_ibfk_1` FOREIGN KEY (`id_ip`) REFERENCES `data_input_produksi` (`id_ip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
