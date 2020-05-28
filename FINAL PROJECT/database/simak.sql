-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2020 pada 12.57
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `nip` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nip`, `email`, `nama`, `jenis_kelamin`, `no_telp`, `alamat`) VALUES
('1984445556677880', 'admin@cs.unud.ac.id', 'I Putu Bawa', 'Laki-Laki', '08123567890', 'Jalan Padang Sambian No 23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pendidikan_terakhir` varchar(10) NOT NULL,
  `jabatan_terakhir` varchar(15) NOT NULL,
  `fakultas` varchar(40) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `email`, `nama`, `pendidikan_terakhir`, `jabatan_terakhir`, `fakultas`, `jurusan`, `jenis_kelamin`, `no_telp`, `alamat`, `status`) VALUES
('1984445556677881', 'kadexlinux@unud.ac.id', 'I Kadek Linux', 'S3', 'LEKTOR', 'Fakultas MIPA', 'S1 Teknik Informatika', 'Laki-Laki', '085101567123', 'Jalan Blahbatuh No. 25', 'Aktif'),
('1984445556677882', 'sastra@unud.ac.id', 'I Putu Sastra', 'S2', 'LEKTOR KEPALA', 'Fakultas Ilmu Budaya', 'S1 Sastra Indonesia', 'Laki-Laki', '083456723432', 'Jalan Raya Klungkung No. 32X', 'Menempuh Pendidikan'),
('1984445556677883', 'wayanatom@unud.ac.id', 'I Wayan Atom', 'S3', 'PROFESOR', 'Fakultas Teknik', 'S1 Teknik Elektro', 'Laki-Laki', '081238365673', 'Jalan Pulau Serang No 01', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `email` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`email`, `password`, `level`) VALUES
('admin@cs.unud.ac.id', 'admin', 'Admin'),
('gevinjanitto@gmail.com', '123456', 'Mahasiswa'),
('gungesa@gmail.com', '123456', 'Mahasiswa'),
('ibmhndr@gmail.com', '123456', 'Mahasiswa'),
('kadexlinux@unud.ac.id', 'kadeklinux', 'Dosen'),
('madearti@gmail.com', '123456', 'Mahasiswa'),
('madekaldu@gmail.com', '123456', 'Mahasiswa'),
('sastra@unud.ac.id', 'putusastra', 'Dosen'),
('satyav@gmail.com', '123456', 'Mahasiswa'),
('wayanatom@unud.ac.id', 'wayanatom', 'Dosen'),
('wayansari@gmail.com', '123456', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `fakultas` varchar(40) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `email`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `fakultas`, `jurusan`, `status`) VALUES
('1701332510', 'wayansari@gmail.com', 'Ni Wayan Sari', 'Perempuan', 'Tabanan', '1999-03-21', 'Jalan Blahbatuh', '083123452122', 'Fakultas Ilmu Budaya', 'S1 Sastra Indonesia', 'Aktif'),
('1701345501', 'madearti@gmail.com', 'Ni Made Arti', 'Perempuan', 'Klungkung', '1999-02-13', 'Jalan Raya Klungkung', '084321456333', 'Fakultas Ilmu Budaya', 'S1 Sastra Indonesia', 'Aktif'),
('1705431005', 'madekaldu@gmail.com', 'I Made Kaldu', 'Laki-Laki', 'Bangli', '1999-03-12', 'Jalan Pulau Ron', '084321456421', 'Fakultas Teknik', 'S1 Teknik Elektro', 'Aktif'),
('1708561054', 'satyav@gmail.com', 'I Made Satya Vyasa', 'Laki-Laki', 'Denpasar', '1999-03-12', 'Jalan Pulau Serang', '083456723122', 'Fakultas MIPA ', 'S1 Teknik Informatika', 'Cuti Semester'),
('1708561064', 'gungesa@gmail.com', 'Gungesa', '', '', '0000-00-00', '', '', '', '', 'Belum Divalidasi'),
('1708561065', 'ibmhndr@gmail.com', 'Ida Bagus Mahendra', 'Laki-Laki', 'Denpasar', '1999-05-19', 'Jalan Pulau Salawati No. 2', '081238368984', 'Fakultas MIPA', 'S1 Teknik Informatika', 'Aktif'),
('1708561084', 'gevinjanitto@gmail.com', 'Gevin Janitto', 'Laki-Laki', 'Denpasar', '1999-04-25', 'Jalan Pulau Komodo', '085101517843', 'Fakultas MIPA', 'S1 Teknik Informatika', 'Tidak Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
