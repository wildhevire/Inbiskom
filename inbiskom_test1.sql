-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2022 at 10:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inbiskom_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_kelompok`
--

CREATE TABLE `detail_kelompok` (
  `id_detail_kelompok` int(11) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `nama_penjual` varchar(50) NOT NULL,
  `id_kelompok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `is_primary` tinyint(1) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `id_pengguna`) VALUES
(4, 'Makanan', 13),
(5, 'Minuman', 13),
(7, 'Handcraft', 13);

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `id_kelompok` int(11) NOT NULL,
  `nama_kelompok` varchar(50) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `deskripsi_kelompok` text NOT NULL,
  `tipe_kelompok` enum('mahasiswa','umum') NOT NULL,
  `url_logo_toko` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_ketua` varchar(50) NOT NULL,
  `url_logo` varchar(255) NOT NULL,
  `alamat_inbiskom` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `no_wa` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username_ig` varchar(20) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` enum('kepala_divisi','sekretaris') NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `tahun_aktif` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `hak_akses`, `status`, `tahun_aktif`) VALUES
(4, 'Wildan Muhammad Fikri', 'will', 'rahasia', 'kepala_divisi', 1, 2020),
(5, 'Wildan', 'admin', '$2y$10$GZbwfqo2HbBnztikA308He3ILZTszFG3xEKagq8vb1d', 'sekretaris', 1, 2020),
(6, 'Wildan', 'asss', '$2y$10$BgqQwhzIHy27gJ0HvyHx3u3GRu4JNn.byLr60uOmBi8', 'sekretaris', 1, 2020),
(7, 'Bambang', ' asssdsddd', '$2y$10$SL/PL.opbLkGrDwu9GMeyOqyAKZsnUkFY54umU4w1I8', 'sekretaris', 1, 2020),
(8, 'Cocok', 'sdafasdfas', '$2y$10$qGxiOEBCNm09AapA5lu05eFgS87HLtu2mz4QLWtn2Lw', 'sekretaris', 1, 2020),
(9, 'Wildan', 'admin14', '$2y$10$boaf0VLECetjs7iCjZF6COnskgcR9cYmGAONIKZOeRK', 'sekretaris', 1, 2020),
(10, 'Wildan', 'asdf', '123456789', 'sekretaris', 1, 2020),
(11, 'wildan14', 'wildan14', '$2y$10$viDji2GqPIQZEbgm13JVP.C0Uuwu/27LXTqQAqvhN.7', 'sekretaris', 1, 0000),
(12, '123456789', '123456789', '$2y$10$YTmD8TNwejEC07IKs7SZPOy336.TJ6bG.P6Z1pkKMQp', 'sekretaris', 1, 2000),
(13, 'Password kurang panjang', 'password', '$2y$10$DHHh6ptHmmf4YsK3Ta3uH.Hxk8lqAh3mHub73klc0W/1N4CpXcvT.', 'sekretaris', 1, 2000),
(14, 'COCOK', 'COCOK', '$2y$10$XxROcm2N3JhicIMMSa6R3u1lj3crHJdi5OPQxND7B6EB3T6llUpGG', 'sekretaris', 1, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `id_kelompok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_kelompok`
--
ALTER TABLE `detail_kelompok`
  ADD PRIMARY KEY (`id_detail_kelompok`),
  ADD KEY `kelompok_penjual` (`id_kelompok`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `produk_foto` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `pengguna_kategori` (`id_pengguna`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id_kelompok`),
  ADD KEY `kategori_kelompok` (`id_kategori`),
  ADD KEY `pengguna_kelompok` (`id_pengguna`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`),
  ADD KEY `pengguna_konfigurasi` (`id_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `kelompok_produk` (`id_kelompok`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_kelompok`
--
ALTER TABLE `detail_kelompok`
  MODIFY `id_detail_kelompok` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_kelompok`
--
ALTER TABLE `detail_kelompok`
  ADD CONSTRAINT `kelompok_penjual` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok` (`id_kelompok`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `produk_foto` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `pengguna_kategori` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD CONSTRAINT `kategori_kelompok` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengguna_kelompok` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD CONSTRAINT `pengguna_konfigurasi` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kelompok_produk` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok` (`id_kelompok`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
