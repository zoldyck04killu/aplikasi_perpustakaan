-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2018 at 03:38 AM
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
('13041287', 'Rusnawan', 'Teknik Inf', 'pria', 'Banjarmasin', '1998-12-12', 'Aktif', '2018-12-02'),
('14041011', 'Muhammad Bambang', 'Teknik Inf', 'pria', 'Banjarmasin', '1996-07-23', 'Aktif', '2018-12-02'),
('14041084', 'Momon', 'Teknik Inf', 'pria', 'Tabalong', '1010-01-01', 'Aktif', '2018-12-02');

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
  `lsbn` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_buku` smallint(15) NOT NULL,
  `klasifikasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sinopsis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_entry` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kd_buku`, `jdl_buku`, `pengarang`, `penerbit`, `thn_terbit`, `lsbn`, `jml_buku`, `klasifikasi`, `sinopsis`, `tgl_entry`) VALUES
(9374, 'PHP', 'Bodi ', 'PT. Muba', 2018, 'ISBN 978-602-8519-93-9', 4, 'Pembelajaran', 'PHP: Hypertext Preprocessor[4] adalah bahasa skrip yang dapat ditanamkan atau disisipkan ke dalam HTML.[5][6] PHP banyak dipakai untuk memprogram situs web dinamis. PHP dapat digunakan untuk membangun sebuah CMS. ', '2018-12-02 01:39:02'),
(12312, 'Javascript', 'Dodi Waluyo', 'PT. Arus', 2018, 'ISBN 901-901-7821-78-3', 2, 'Pembelajaran', 'JavaScript adalah bahasa pemrograman tingkat tinggi dan dinamis. JavaScript populer di internet dan dapat bekerja di sebagian besar penjelajah web populer seperti Google Chrome, Internet Explorer, Mozilla Firefox, Netscape dan Opera. Kode JavaScript dapat disisipkan dalam halaman web menggunakan tag SCRIPT.', '2018-12-02 01:30:41');

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

--
-- Dumping data for table `klasifikasi_buku`
--

INSERT INTO `klasifikasi_buku` (`id`, `klasifikasi`, `kode`) VALUES
(1, 'jwgvedwed', 9);

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
  `kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nrp` int(8) NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jekel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_entry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `status`, `kategori`, `nrp`, `nama`, `jurusan`, `jekel`, `tgl_entry`) VALUES
(2, 'Aktif', '2', 2147483647, 'sudarsono', '', 'pria', '2018-12-02'),
(3, 'Aktif', '1', 12038721, 'Anjas', 'Sistem Informasi', 'pria', '2018-12-02'),
(4, 'Aktif', '2', 2147483647, 'Susi', '', 'wanita', '2018-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `nip` int(5) NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_petugas` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenkel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`nip`, `password`, `nama_petugas`, `jabatan`, `jenkel`, `alamat`) VALUES
(12312, '$2y$10$Y46wehCykscM0/FjzDyq2OfbopAZ9gax6R8AcbUYFt/8wB65uE5W2', 'asaas', 'asa', 'pria', 'asadasd'),
(14041037, '$2y$10$EdHaUg99IMd06w1B40wQ9uwUY6h7lOl27J3rsHUl5Zf7ON5U3ICK2', 'Muhammad Aldi Renaldy', 'IT', 'pria', 'Jalan Mahligai');

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
(3, 14041037, 'Muhammad Aldi Renaldy', 13041287, 'Rusnawan', '9374', 'PHP', '2018-12-02', '2018-12-10'),
(4, 14041037, 'Muhammad Aldi Renaldy', 13041287, 'Rusnawan', '12312', 'Javascript', '2018-12-02', '2018-12-10');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `no_kembali` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `no_pinjaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
