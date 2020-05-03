-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2020 pada 16.55
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biodata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `no` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kota_asal` varchar(30) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `deskripsi` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`no`, `nama`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `kota_asal`, `agama`, `deskripsi`) VALUES
(1, 'Ida Bagus Mahendra', 'Jalan Pulau Salawati No. 2', 'Laki-Laki', 'Denpasar', '1999-05-19', 'Bangli', 'Hindu', 'Saya Mahasiswa Ilmu Komputer'),
(2, 'Ida Bagus Mahendra', 'Jalan Pulau Salawati No. 2', 'Laki-Laki', 'Denpasar', '1999-05-19', 'Bangli', 'Hindu', 'Saya Mahasiswa Ilmu Komputer'),
(3, 'Ida Bagus Mahendra', 'Jalan Pulau Salawati No. 2', 'Laki-Laki', 'Denpasar', '1999-05-19', 'Bangli', 'Hindu', 'Saya Mahasiswa Ilmu Komputer'),
(4, 'Bagus Mahaaditya', 'Jalan Pulau Moyo', 'Laki-Laki', 'Denpasar', '2005-01-04', 'Bangli', 'Hindu', 'Saya Adalah Orang yang Baik');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
