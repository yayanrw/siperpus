-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2017 at 11:09 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `foto`) VALUES
('admin', '0b94c64ff294ec420f772b0743cbbcf5012bbe307bdb9d6cc6f64cd50f11aa3503cd578c183c7762e85953d698d9fcd81a73e3fa1e0ebd5fa94932e34cbe397czxtmYeCYO/8ouycTggA9oRnGwLEb6geFue6rGpVUK1Q=', 'Administrator', 'admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jurusan` enum('Teknologi Informasi','Teknik Kimia','Teknik Elektro','Teknik Sipil','Teknik Mesin','Administrasi Niaga','Akuntansi') NOT NULL,
  `prodi` enum('D4 Teknik Informatika','D3 Manajemen Informatika','D4 Sistem Kelistrikan','D4 Teknik Elektronika','D4 Jaringan Telekomunikasi Digital','D3 Teknik Elektronika','D3 Teknik Listrik','D3 Teknik Telekomunikasi','D4 Manajemen Rekayasa Konstruksi','D4 Teknik Otomotif Elektronika','D4 Teknik Mesin Produksi dan Perawatan','D4 Teknik Kimia Industri','D3 Teknik Sipil','D3 Teknik Mesin','D3 Teknik Kimia','D4 Akuntansi Manajemen','D4 Keuangan','D4 Manajemen Pemasaran','D3 Administrasi Bisnis','D3 Akuntansi') NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`nim`, `nama`, `jurusan`, `prodi`, `jk`, `tempat`, `tgl_lahir`, `no_telp`, `alamat`, `foto`) VALUES
('1531140148', 'Yayan Rahmat', 'Teknologi Informasi', 'D3 Teknik Listrik', 'Laki-laki', 'Malang', '2017-05-02', '343', 'ko', 'Lakeside_SunRise_1920x1080.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(4) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `pengarang` varchar(40) NOT NULL,
  `penerbit` varchar(40) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `jenis`, `pengarang`, `penerbit`, `tahun_terbit`, `jumlah`, `lokasi`, `tgl_input`) VALUES
(1, 'Sehari bersama Rasul', 'Islami', 'Ustadz Naufal (Novel)', 'Taman Ilmu', 2015, 1, 'AA-01', '2017-05-01'),
(3, 'Laskar Pelangi', 'Novel', 'Siapa', 'Kamu', 2014, 2, 'AA-02', '2017-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_buku`
--

CREATE TABLE `jenis_buku` (
  `id_jenis` int(11) NOT NULL,
  `jenis` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_buku`
--

INSERT INTO `jenis_buku` (`id_jenis`, `jenis`) VALUES
(1, 'Novel'),
(2, 'Islami'),
(3, 'Programming'),
(4, 'Sastra');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(2) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `password`, `nama`, `jk`, `tempat`, `tgl_lahir`, `no_telp`, `alamat`, `foto`) VALUES
('yayanrw', '11a9d487080152236e7321dad71f30ab853a5133b0bfa952b2d894a0ab98425273f8204dda490991e0ce1e74d36bedd6f9691d831e8102a972cb672d84b5fb77b8UmxWWPHovrQUbez3rzOfihUJ0KrvgfJdm/U+jWQRU=', 'Yayan Rahmat Wijaya', 'Laki-laki', 'Malang', '2017-05-01', '0989849458', 'Asrikaton', 'Lakeside_SunRise_1920x1080.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(2) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(2) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
