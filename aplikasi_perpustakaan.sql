-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2018 at 03:29 PM
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
(2, 'Admin', '$2y$10$Ip3fFqK.j5zDPkTXe9hzveqxVt..JyZla3jmj9pRbS8FU.woUx4jm', '0000-00-00 00:00:00'),
(3, 'admin1', '$2y$10$prc6nItamlA05tJX24712eSxan7Ck4id/pD/hFHze72eXKTbmBcLm', '0000-00-00 00:00:00');

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
('12041020', 'Fatimah', 'Teknik Inf', 'wanita', 'Banjarmasin', '1992-06-07', 'Aktif', '2018-12-08'),
('13021085', 'Agus Trisno', 'Manajemen ', 'pria', 'Palangkaraya', '1996-12-08', 'Aktif', '2018-12-08'),
('13041287', 'Rusnawan', 'Teknik Inf', 'pria', 'Banjarmasin', '1998-12-12', 'Aktif', '2018-12-02'),
('14031022', 'Siti Zahra', 'Teknik Inf', 'pria', 'Banjarmasin', '1996-08-12', 'Aktif', '2018-12-08'),
('14031072', 'Muhammad Ridho', 'Sistem Inf', 'pria', 'Balikpapan', '1995-08-08', 'Aktif', '2018-12-08'),
('14031075', 'Melly', 'Sistem Inf', 'pria', 'Banjarmasin', '1995-12-04', 'Aktif', '2018-12-08'),
('14041011', 'Muhammad Bambang', 'Teknik Inf', 'pria', 'Banjarmasin', '1996-07-23', 'Aktif', '2018-12-02'),
('14041029', 'Muhammad Fernando', 'Komputer A', 'pria', 'Bandung', '1994-07-07', 'Aktif', '2018-12-08'),
('14041084', 'Momon', 'Teknik Inf', 'pria', 'Tabalong', '1010-01-01', 'Aktif', '2018-12-02'),
('14041111', 'Muhammad Syrif', 'Teknik Inf', 'pria', 'Tanjung', '1996-09-12', 'Aktif', '2018-12-08');

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
(9374, 'PHP', 'Bodi ', 'PT. Muba', 2018, 'ISBN 978-602-8519-93-9', 3, 'Pembelajaran', 'PHP: Hypertext Preprocessor[4] adalah bahasa skrip yang dapat ditanamkan atau disisipkan ke dalam HTML.[5][6] PHP banyak dipakai untuk memprogram situs web dinamis. PHP dapat digunakan untuk membangun sebuah CMS. ', '2018-12-02 01:39:02'),
(12312, 'Javascript', 'Dodi Waluyo', 'PT. Arus', 2018, 'ISBN 901-901-7821-78-3', 1, 'Pembelajaran', 'JavaScript adalah bahasa pemrograman tingkat tinggi dan dinamis. JavaScript populer di internet dan dapat bekerja di sebagian besar penjelajah web populer seperti Google Chrome, Internet Explorer, Mozilla Firefox, Netscape dan Opera. Kode JavaScript dapat disisipkan dalam halaman web menggunakan tag SCRIPT.', '2018-12-02 01:30:41'),
(128404237, 'Network', 'Basuki', 'PT.Gramedia', 2017, 'ISBN 978-231-5233-23-1', 4, 'jaringan', 'belajar jaringan basic', '2018-12-08 09:22:28'),
(438371987, 'Smart Thinks', 'Abraham', 'PT.Gramedia', 0000, 'ISBN 978-231-90754-23-2', 9, 'Membuat cara berfikir mudah', 'mudahnya cara berfikit logika', '2018-12-08 09:25:34'),
(483726489, 'Belajar Koding', 'Syamsul', 'PT. Bekantan Jantan', 2017, 'ISBN 978-231-5233-64-2', 2, 'Belajar Koding', 'Koding itu mudah', '2018-12-08 09:23:29'),
(483729384, 'Mahir Office', 'Subar', 'PT.Gramedia', 2012, 'ISBN 978-231-5233-23-8', 11, 'Mudahnya belajar office sampai mahir', 'Buku ini akan memberikan solusi belajar office yang baik', '2018-12-08 09:28:39'),
(673967599, 'Installasi Windows sampai MAHIR', 'Rico', 'PT.Gramedia', 2009, 'ISBN 978-322-1333-23-2', 5, 'Installasi Windows', 'Instalkas windows dari awal sampai mahir', '2018-12-08 09:24:40'),
(676579258, 'Sholat 5 Waktu', 'Utz. Ilmi', 'PT. Bekantan Jantan', 2013, 'ISBN 978-909-1123-23-2', 19, 'Cara Sholat yang baik', 'Mengetahui cara yang baik dan benar dalam melakukan sholat', '2018-12-08 09:26:39'),
(898392049, 'Akupuntur', 'Dr.Zohir', 'PT.Gramedia', 2008, 'ISBN 978-231-4213-23-2', 3, 'Akupuntur sendiri', 'Mudahnya meluakukan akupuntur sendiri', '2018-12-08 09:27:37'),
(2147483647, 'Sejarah Kancil', 'KordS', 'PT.Gramedia', 2002, 'ISBN 978-231-5233-23-2', 3, 'Novel', 'Bercerita Tentang Kancil', '2018-12-08 09:09:29');

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
(3, 'Aktif', '1', 12038721, 'Anjas', 'Sistem Informasi', 'pria', '2018-12-03'),
(4, 'Aktif', '2', 2147483647, 'Susi', '', 'wanita', '2018-12-03');

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
(12312, '$2y$10$ov.6Ti1wukmTzl9etSf8vuXwi6XL7WT83zGG5jjlYzUsDMkg3ISzC', 'Kuci', 'IT', 'pria', 'jln. Banua Hanyar'),
(24823, '$2y$10$.sy1dOOfhkqzhI0w23h6DubzXjurXedZmNuq01nSAfa0PXnRmiXKu', 'Basuki', 'IT', 'pria', 'Jalan Mahligai'),
(48375, '$2y$10$hCglMeuoLwUkr7DNmcXsweam7juU8Ggwl8emyI6G6BEMvfLiZdjfy', 'Johan', 'Staff Buku', 'pria', 'Jalan dharmapraja'),
(48673, '$2y$10$vdLKOImkrhsEfQgcjyTuiezxDA0xJvzxHfQx5ba/huvXYix4x6R7O', 'Muhammad Alpha', 'Staff', 'pria', 'jalan benuaanyar'),
(49574, '$2y$10$11zRHf63PgSUDSvFSg5kSO83hiJDOzVRCcf1ZVcJtkXzwjhOTgWbi', 'Herlambang', 'Staff', 'pria', 'Jalan pramuka'),
(49583, '$2y$10$rOZGlot2qJ7GtpXhBlVzFudDsabl923IB2Fwgm5gvteZKsNbiksZC', 'Yahya', 'Penjaga Buku', 'pria', 'Jalan sultan adam'),
(58573, '$2y$10$EoDVlABvDHeQA1i3U7raJeaaT3bTXlGwqvu8c3WQPXMdp6igUkfDe', 'Bambang', 'Staff Buku', 'pria', 'Jalan kayu tangi 2'),
(78476, '$2y$10$e0JRi/3LGz78hu77pvLmGewkSxbf9iMDIIzKwf3PYhiLa6IoOmFYe', 'Rizki', 'Staff', 'pria', 'Jalan bati bati'),
(89879, '$2y$10$Gd/P7FJo7VdXVCM2YC0iBenyAHTAclwkVnwKwaALz1HdzsGOoXhC.', 'Siska', 'Staff', 'wanita', 'Jalan mahligai'),
(949394343, '$2y$10$64tMrzbS.JHxE4eBMCR89eAmBLHH.qKH9Kw.J3qtrjH3M8o1DSgeW', 'Cika', 'Wakil Staff', 'wanita', 'Jalan veteran');

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
(3, 14041037, 'Muhammad Aldi Renaldy', 13041287, 'Rusnawan', '9374', 'PHP', '2018-12-02', '2017-12-10'),
(4, 14041037, 'Muhammad Aldi Renaldy', 13041287, 'Rusnawan', '12312', 'Javascript', '2018-12-02', '2018-11-04'),
(5, 12312, 'Kuci', 12041020, 'Fatimah', '438371987', 'Smart Thinks', '2018-12-08', '2018-12-16'),
(6, 12312, 'Kuci', 12041020, 'Fatimah', '12312', 'Javascript', '2018-12-08', '2018-12-16'),
(7, 12312, 'Kuci', 12041020, 'Fatimah', '483726489', 'Belajar Koding', '2018-12-08', '2018-12-16'),
(8, 12312, 'Kuci', 13021085, 'Agus Trisno', '483729384', 'Mahir Office', '2018-12-08', '2018-12-16'),
(9, 12312, 'Kuci', 13021085, 'Agus Trisno', '9374', 'PHP', '2018-12-08', '2018-12-16'),
(10, 12312, 'Kuci', 13021085, 'Agus Trisno', '673967599', 'Installasi Windows sampai MAHIR', '2018-12-08', '2018-12-16'),
(11, 12312, 'Kuci', 14041011, 'Muhammad Bambang', '2147483647', 'Sejarah Kancil', '2018-12-08', '2018-12-16'),
(12, 12312, 'Kuci', 14041011, 'Muhammad Bambang', '483726489', 'Belajar Koding', '2018-12-08', '2018-12-16');

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
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `no_kembali` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `no_pinjaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
