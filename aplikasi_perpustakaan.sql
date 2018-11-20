-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2018 at 12:46 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `admin` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passadmin` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `admin`, `passadmin`, `tgl_login`) VALUES
(2, 'Admin', '$2y$10$Ip3fFqK.j5zDPkTXe9hzveqxVt..JyZla3jmj9pRbS8FU.woUx4jm', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_anggota` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenkel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmp_lahir` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_entry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `jurusan`, `jenkel`, `tmp_lahir`, `tgl_lahir`, `status`, `tgl_entry`) VALUES
('14041011', 'Muhammad Aldi Renaldy', 'Teknik Inf', 'pria', 'Banjarmasin', '1996-07-23', 'aktif', '2018-11-16'),
('14041084', 'Ahmad Syarif', 'Teknik Inf', 'pria', 'Tabalong', '1010-01-01', 'aktif', '2018-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kd_buku` int(10) NOT NULL,
  `jdl_buku` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengarang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thn_terbit` year(4) NOT NULL,
  `lsbn` int(25) NOT NULL,
  `jml_buku` smallint(15) NOT NULL,
  `klasifikasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sinopsis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_entry` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kd_buku`, `jdl_buku`, `pengarang`, `penerbit`, `thn_terbit`, `lsbn`, `jml_buku`, `klasifikasi`, `sinopsis`, `tgl_entry`) VALUES
(9, 'oke', 'siap', 'mantap', 2019, 10, 20000, 'oke', 'siap oke matnp', '2018-11-16 00:49:19'),
(1011111, 'web apps', 'dodo', 'asuuuy', 2018, 100001, 20, 'oke siap', 'ini adlah buku web apps oke', '2018-11-16 00:46:09'),
(101010101, 'web untuk pemula', 'aldi', 'PT.Bekantan Jantat', 2018, 10, 20, 'oke', 'buku untuk pemula web apps', '2018-11-16 00:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `detail_buku`
--

CREATE TABLE `detail_buku` (
  `kd_detailBuku` int(15) NOT NULL,
  `kd_buku` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_buku`
--

CREATE TABLE `klasifikasi_buku` (
  `id` int(100) NOT NULL,
  `klasifikasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `no_kembali` int(5) NOT NULL,
  `no_pinjam` int(5) NOT NULL,
  `id_anggota` int(5) NOT NULL,
  `nama_anggota` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_buku` int(10) NOT NULL,
  `jdl_buku` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_pinjam` int(5) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` int(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(5) NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nrp` int(8) NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jekel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_entry` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `status`, `nrp`, `nama`, `jurusan`, `jekel`, `tgl_entry`) VALUES
(1, '1', 12313212, 'sudo', 'Teknik Inf', 'pria', '2018-11-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `nip` int(5) NOT NULL,
  `nama_petugas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenkel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`nip`, `nama_petugas`, `jabatan`, `jenkel`, `alamat`) VALUES
(14041037, 'Muhammad Aldi Renaldy', 'IT ', 'pria', 'Jalan Mahligai');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `no_pinjaman` int(5) NOT NULL,
  `nip` int(5) NOT NULL,
  `nama_petugas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_anggota` int(5) NOT NULL,
  `nama_anggota` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_buku` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jdl_buku` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`no_pinjaman`, `nip`, `nama_petugas`, `id_anggota`, `nama_anggota`, `kd_buku`, `jdl_buku`, `tgl_pinjam`, `tgl_kembali`) VALUES
(7, 14041037, 'Muhammad Aldi Renaldy', 14041011, 'Muhammad Aldi Renaldy', '1011111', 'web apps', '2018-10-20', '2018-10-28'),
(8, 14041037, 'Muhammad Aldi Renaldy', 14041011, 'Muhammad Aldi Renaldy', '101010101', 'web untuk pemula', '2018-10-20', '2018-10-28'),
(9, 14041037, 'Muhammad Aldi Renaldy', 14041011, 'Muhammad Aldi Renaldy', '9', 'oke', '2018-10-20', '2018-10-28'),
(10, 14041037, 'Muhammad Aldi Renaldy', 14041011, 'Muhammad Aldi Renaldy', '1011111', 'web apps', '2018-10-20', '2018-10-28'),
(11, 14041037, 'Muhammad Aldi Renaldy', 14041011, 'Muhammad Aldi Renaldy', '101010101', 'web untuk pemula', '2018-10-20', '2018-10-28'),
(12, 14041037, 'Muhammad Aldi Renaldy', 14041084, 'Ahmad Syarif', '9', 'oke', '2018-10-20', '2018-10-28'),
(13, 14041037, 'Muhammad Aldi Renaldy', 14041084, 'Ahmad Syarif', '101010101', 'web untuk pemula', '2018-10-20', '2018-10-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kd_buku`);

--
-- Indexes for table `detail_buku`
--
ALTER TABLE `detail_buku`
  ADD PRIMARY KEY (`kd_detailBuku`);

--
-- Indexes for table `klasifikasi_buku`
--
ALTER TABLE `klasifikasi_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`no_kembali`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`no_pinjaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_buku`
--
ALTER TABLE `detail_buku`
  MODIFY `kd_detailBuku` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klasifikasi_buku`
--
ALTER TABLE `klasifikasi_buku`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `no_kembali` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `no_pinjaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
