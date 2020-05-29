-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2020 pada 12.17
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
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `email`, `nama`, `pendidikan_terakhir`, `jabatan_terakhir`, `fakultas`, `jurusan`, `jenis_kelamin`, `status`) VALUES
('1984445556677880 ', 'admin@cs.unud.ac.id', 'I Putu Bawa', 'S2', 'LEKTOR', 'Fakultas MIPA', 'S1 Teknik Informatika', 'Laki-Laki', 'Aktif'),
('1984445556677881', 'kadexlinux@unud.ac.id', 'I Kadek Linux', 'S3', 'LEKTOR', 'Fakultas MIPA', 'S1 Teknik Informatika', 'Laki-Laki', 'Aktif'),
('1984445556677882', 'sastra@unud.ac.id', 'I Putu Sastra', 'S2', 'LEKTOR KEPALA', 'Fakultas MIPA', 'S1 Teknik Informatika', 'Laki-Laki', 'Menempuh Pendidikan'),
('1984445556677883', 'wayanatom@unud.ac.id', 'I Wayan Atom', 'S3', 'PROFESOR', 'Fakultas MIPA', 'S1 Teknik Informatika', 'Laki-Laki', 'Aktif'),
('1984445556677884', 'putuseneng@unud.ac.id', 'I Putu Seneng', 'S2', 'LEKTOR', 'Fakultas MIPA', 'S1 Teknik Informatika', 'Laki-Laki', 'Aktif'),
('1984445556677885', 'bagusadi@unud.ac.id', 'Putu Bagus Adi', 'S3', 'LEKTOR', 'Fakultas MIPA', 'S1 Teknik Informatika', 'Laki-Laki', 'Aktif'),
('1984445556677886', 'budiadmaja@cs.unud.ac.id', 'Made Buji Admaja', 'S2', 'LEKTOR', 'Fakultas MIPA', 'S1 Teknik Informatika', 'Laki-Laki', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(15) NOT NULL,
  `nama_kelas` varchar(40) NOT NULL,
  `nip_dosen` varchar(30) NOT NULL,
  `hari` varchar(15) NOT NULL,
  `jam_kuliah` varchar(20) NOT NULL,
  `sks` varchar(2) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `nama_kelas`, `nip_dosen`, `hari`, `jam_kuliah`, `sks`, `status`) VALUES
('IP001', 'Praktikum Berbasis Web', '1984445556677881', 'Selasa', '09.00 - 10.30', '2', 'Aktif'),
('IP002', 'Pemrograman Berorientasi Objek', '1984445556677882', 'Selasa', '09.00 - 11.00', '3', 'Aktif'),
('IP003', 'Kalkulus', '1984445556677883', 'Selasa', '09.00 - 11.00', '3', 'Aktif'),
('IP004', 'Matematika Diskrit', '1984445556677884', 'Selasa ', '11.00 - 13.00', '3', 'Aktif'),
('IP005', 'Algoritma dan Pemrograman', '1984445556677885', 'Rabu ', '09.00 - 10.30', '3', 'Aktif'),
('IP006', 'Sistem Digital', '1984445556677881', 'Kamis', '09.00 - 11.00', '3', 'Tidak Aktif'),
('IP007', 'Sistem Operasi', '1984445556677884', 'Jumat', '09.00 - 11.00', '3', 'Aktif'),
('IP008', 'Basis Data', '1984445556677881', 'Jumat', '11.00 - 13.00', '3', 'Aktif'),
('IP009', 'Basis Data Lanjut', '1984445556677881', 'Kamis', '11.00 - 13.00', '3', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelasmhs`
--

CREATE TABLE `kelasmhs` (
  `id` int(20) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `kode_kelas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelasmhs`
--

INSERT INTO `kelasmhs` (`id`, `nim`, `kode_kelas`) VALUES
(1, '1708561065', 'IP001'),
(2, '1708561065', 'IP002'),
(5, '1708561065', 'IP003'),
(6, '1708561065', 'IP004'),
(9, '1708561065', 'IP005'),
(10, '1705431005', 'IP002'),
(11, '1705431005', 'IP001'),
(12, '1705431005', 'IP008'),
(13, '1705431005', 'IP009'),
(14, '1705431005', 'IP007');

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
('bagusadi@unud.ac.id', 'bagusadi', 'Dosen'),
('gevinjanitto@gmail.com', '123456', 'Mahasiswa'),
('gungesa@gmail.com', '123456', 'Mahasiswa'),
('ibmhndr@gmail.com', '123456', 'Mahasiswa'),
('kadexlinux@unud.ac.id', 'kadeklinux', 'Dosen'),
('madearti@gmail.com', '123456', 'Mahasiswa'),
('madekaldu@gmail.com', '123456', 'Mahasiswa'),
('putuseneng@unud.ac.id', 'putuseneng', 'Dosen'),
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
('1701332510', 'wayansari@gmail.com', 'Ni Wayan Sari', 'Perempuan', 'Tabanan', '1999-03-21', 'Jalan Blahbatuh', '083123452122', 'Fakultas MIPA', 'S1 Teknik Informatika', 'Aktif'),
('1701345501', 'madearti@gmail.com', 'Ni Made Arti', 'Perempuan', 'Klungkung', '1999-02-13', 'Jalan Raya Klungkung', '084321456333', 'Fakultas MIPA', 'S1 Teknik Informatika', 'Aktif'),
('1705431005', 'madekaldu@gmail.com', 'I Made Kaldu', 'Laki-Laki', 'Bangli', '1999-03-12', 'Jalan Pulau Ron', '084321456421', 'Fakultas MIPA', 'S1 Teknik Informatika', 'Aktif'),
('1708561054', 'satyav@gmail.com', 'I Made Satya Vyasa', 'Laki-Laki', 'Denpasar', '1999-03-12', 'Jalan Pulau Serang', '083456723122', 'Fakultas MIPA ', 'S1 Teknik Informatika', 'Cuti Semester'),
('1708561064', 'gungesa@gmail.com', 'I Gusti Agung Esa Nanda Adnyana', '', '', '0000-00-00', '', '', '', '', 'Belum Divalidasi'),
('1708561065', 'ibmhndr@gmail.com', 'Ida Bagus Mahendra', 'Laki-Laki', 'Denpasar', '1999-05-19', 'Jalan Pulau Salawati No. 2', '081238368984', 'Fakultas MIPA', 'S1 Teknik Informatika', 'Aktif'),
('1708561084', 'gevinjanitto@gmail.com', 'Gevin Janitto', 'Laki-Laki', 'Denpasar', '1999-04-25', 'Jalan Pulau Komodo', '085101517843', 'Fakultas MIPA', 'S1 Teknik Informatika', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembimbing`
--

INSERT INTO `pembimbing` (`id`, `nim`, `nip`) VALUES
(1, '1708561065', '1984445556677881'),
(2, '1708561084', '1984445556677882');

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
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indeks untuk tabel `kelasmhs`
--
ALTER TABLE `kelasmhs`
  ADD PRIMARY KEY (`id`);

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

--
-- Indeks untuk tabel `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelasmhs`
--
ALTER TABLE `kelasmhs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
