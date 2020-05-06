-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2020 pada 17.23
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
-- Database: `simak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `fakultas` varchar(40) NOT NULL,
  `jurusan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `fakultas`, `jurusan`) VALUES
(1701332510, 'Ni Wayan Sari', 'Perempuan', 'Tabanan', '1999-03-21', 'Jalan Blahbatuh', '083123452122', 'Fakultas Ilmu Budaya', 'Sastra Indonesia'),
(1701345501, 'Ni Made Arti', 'Perempuan', 'Klungkung', '1999-02-13', 'Jalan Raya Klungkung', '084321456333', 'Fakultas Ilmu Budaya', 'Sastra Inggris'),
(1705431005, 'I Made Kaldu', 'Laki-Laki', 'Bangli', '1999-03-12', 'Jalan Pulau Ron', '084321456421', 'Fakultas Teknik', 'Teknik Sipil'),
(1708561054, 'I Made Satya Vyasa', 'Laki-Laki', 'Denpasar', '1999-03-12', 'Jalan Pulau Serang', '083456723122', 'FMIPA ', 'Ilmu Komputer'),
(1708561063, 'Agus Wisnawa', 'Laki-Laki', 'Denpasar', '1999-02-20', 'Jalan Padang Sambian', '081333451222', 'FMIPA', 'Ilmu Komputer'),
(1708561065, 'Ida Bagus Mahendra', 'Laki-Laki', 'Denpasar', '1999-05-19', 'Jalan Pulau Salawati No. 2', '081238368984', 'FMIPA', 'Ilmu Komputer'),
(1708561084, 'Gevin Janitto', 'Laki-Laki', 'Denpasar', '1999-04-25', 'Jalan Pulau Komodo', '085101517843', 'FMIPA', 'Ilmu Komputer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `nim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1708561085;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
