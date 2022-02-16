-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2022 at 06:07 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `url_banner` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `url_banner`, `status`, `id_pengguna`) VALUES
(2, 'image-620a6f8f88c2d3.93716156.png', 0, 13),
(3, 'image-620a70022eb683.40919143.png', 0, 13),
(4, 'image-620bf80adb26e9.93807938.png', 1, 13),
(5, 'image-620bfea476e496.26136522.jfif', 1, 13);

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

--
-- Dumping data for table `detail_kelompok`
--

INSERT INTO `detail_kelompok` (`id_detail_kelompok`, `no_identitas`, `nama_penjual`, `id_kelompok`) VALUES
(48, '10118020', 'Vina Nihayatul', 24),
(50, '10118090', 'Rifan Fahrizal', 25),
(51, '10119010', 'Asmarani Nuramalina', 26),
(52, '10119020', 'Haura Zahra', 26),
(53, '10119030', 'Rida Annurfaida', 26),
(54, '10119100', 'Azzam', 27),
(55, '10119111', 'Reihan', 27),
(56, '123552991000', 'Muhammad Alif', 28),
(57, '123552991010', 'Muh Nur Sanjaya', 28),
(58, '10118132', 'Anggi Siska Hariyana', 29),
(59, '10118008', 'Benno', 30),
(60, '10119029', 'Ivan', 30),
(66, '10118025', 'Benno ', 24);

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

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `url`, `is_primary`, `id_produk`) VALUES
(18, 'image-620bfe69b908b0.35826438.jpg', 1, 33),
(19, 'image-6206afd70640f7.91927143.jpg', 0, 33),
(20, 'image-6206b049eca057.84230661.jpg', 1, 34),
(21, 'image-6206b049ed9aa5.10317698.jpg', 0, 34),
(22, 'image-6206b049ee6a75.84671939.jpg', 0, 34),
(23, 'image-620bc4cf7a4278.29715613.png', 1, 35),
(24, 'image-6206b1efafc727.60475768.png', 0, 35),
(25, 'image-6206b1efb08823.00354124.png', 0, 35),
(26, 'image-6206b43a2d1e66.38301999.jpg', 1, 36),
(27, 'image-6206b43a2ddc67.47270199.jpg', 0, 36),
(28, 'image-6206b43a2e74d0.96013609.jpg', 0, 36),
(29, 'image-6206b43a2efc60.48269316.jpg', 0, 36),
(30, 'image-6206b5108ae045.32491042.png', 1, 37),
(31, 'image-6206b5108bfb88.38915953.png', 0, 37),
(32, 'image-6206b6a013b5b9.25783532.jpg', 1, 38),
(33, 'image-6206b6a014edf9.61517320.jpg', 0, 38),
(34, 'image-6206b6a015fcb4.84136559.jpg', 1, 39),
(35, 'image-6206b800e0d224.56773878.jfif', 1, 40),
(36, 'image-6206b800e1b509.42714712.jpg', 0, 40),
(37, 'image-6206b9d5357d10.11181432.jpg', 1, 41),
(38, 'image-6206b9d536c820.99969562.jpg', 1, 42),
(39, 'image-6206b9d5373f12.91324394.jpg', 0, 42),
(40, 'image-6206b9d537b708.62725794.jpg', 0, 42),
(41, 'image-6209c2c33f1d24.68886054.jpg', 1, 43),
(49, 'image-620bfe69b9d8c4.05859630.png', 0, 33);

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
(4, 'Makanan Berat', 13),
(7, 'Craft', 13),
(9, 'Fashion', 13),
(10, 'Jasa', 13),
(11, 'Pertanian & Perkebunan', 13);

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

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id_kelompok`, `nama_kelompok`, `angkatan`, `deskripsi_kelompok`, `tipe_kelompok`, `url_logo_toko`, `id_kategori`, `id_pengguna`) VALUES
(24, '3R Official', 2020, 'Menjual berbagai macam masker dengan tampilan menarik', 'mahasiswa', 'image-6206afd700d4c6.09901273.jpg', 9, 13),
(25, 'Rebellion Footwear', 2019, 'Memproduksi sepatu berkualitas', 'umum', 'image-6206b1efab70d9.76399551.png', 9, 13),
(26, 'Customize Mini x Banner', 2020, 'Custom Mini X Banner merupakan bidang jasa yang menjual produk percetakan berdasarkan request dari buyer. Dalam hal ini buyer bebas memilih gambar apapun sesuai keinginannya dalam mecetak berupa banner ukuran kecil yang dapat dipajang dimana saja.', 'mahasiswa', 'image-6206b43a299541.82316895.jfif', 10, 13),
(27, 'Delicious Setup', 2020, 'Produk kami yaitu dessert diproduksi di Purwakarta dengan banyak variasi dessert yang bisa di pilih', 'mahasiswa', 'image-6206b6a0107880.55702285.jpg', 4, 13),
(28, 'Kamu Coffee', 2020, 'Kamu Coffee berfokus pada penjualan kopi', 'umum', 'image-6206b800dc6914.57680400.jpeg', 4, 13),
(29, 'Mba Kebon Ijo', 2020, 'Mba Kebon Ijo bergerak di bidang produk. Merupakan toko yang menyediakan berbagai jenis tanaman hias dan tumbuh-tumbuhan lainnya, seperti sayur-sayuran, phon, tanaman pagar, tanaman herbal, buah, dan masih banyak lagi. Tidak hanya tanaman, tetapi pupuk, pot bunga, penyubur tanaman, rak bunga, dll juga tersedia di Mba Kebon Ijo', 'mahasiswa', 'image-6206b9d532bdb0.10067838.jpg', 11, 13),
(30, 'Dian clothes', 2022, 'Bu dian jualan baju bagus', 'mahasiswa', 'image-6209c2c3199b27.54671176.jpg', 9, 13);

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

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `nip`, `nama_ketua`, `url_logo`, `alamat_inbiskom`, `no_hp`, `no_wa`, `email`, `username_ig`, `id_pengguna`) VALUES
(1, '0401057501', 'Dr.Hj. Dewi Kurniasih S.IP.,M.Si.', 'image-61f3e7fb95a1c1.21181789.png', 'Jl. Dipati Ukur No.102-118, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132', '08122390598', '081223990355', 'inbiskom@email.unikom.ac.id', 'inbiskom', 13),
(2, '0401057501', 'Dr.Hj. Dewi Kurniasih S.IP.,M.Si.', 'image-62068a38dcb560.08005026.png', 'Jl. Dipati Ukur No.102-118, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132', '08122390598', '081223990355', 'inbiskom@email.unikom.ac.id', 'inbiskom', 13);

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
(13, 'Password kurang panjang', 'password', '$2y$10$DHHh6ptHmmf4YsK3Ta3uH.Hxk8lqAh3mHub73klc0W/1N4CpXcvT.', 'sekretaris', 1, 2000),
(15, 'Sekretaris', 'sekre', '$2y$10$sUqks1RNX7RmivxJ8Ag6hOVntqgh7lmHdC5MG1C8JPOCUst4iBaUG', 'sekretaris', 1, 2021),
(19, 'Ketua', 'ketua', '$2y$10$y5BJ3B4L.FftmoGiIyrjp.8d9IRl0xbiisU37cQheE6LHU55nhwqa', 'kepala_divisi', 1, 2021),
(20, 'Test', 'test', '$2y$10$aHYQqQrsMxQ95p2wAQSwJOGymK7axQ1PNCV9N.bikaGCo5yaXG0hm', 'kepala_divisi', 1, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `view_count` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `deskripsi_produk`, `id_kelompok`, `view_count`) VALUES
(33, 'Masker kf94 Mouson motif bunga 4ply', 9000, 'Masker kf94 Mouson motif bunga isi 10pcs', 24, 2),
(34, 'Masker Kain JUMBO MOTIF Premium 3ply Ukuran Ekstra', 12000, 'UKURAN EKTRA BESAR (Lebih besar dari masker biasa cocok untuk yang berwajah lebar/besar)\r\nSize : 25cm x 15,5cm\r\n\r\npek :\r\n- 3 lapis bahan PREMIUM. Halus, breatheable, dan tebal.\r\n- Bisa Dicuci berkali-kali\r\n- Jahitan Tailor/Modiste, bukan kompeksi\r\n- Model pola masker korea slim fit, karet, earloop\r\n- Sudah di steril menggunakan uap panas. Untuk menghilangkan bau kain, silahkan cuci dahulu\r\n- Diplastikin per pcs. Jenis plastik tidak selalu sama, tergantuk stok yg ada\r\n- Sudah ngikutin standard SNI, CDC guideline, Acsnano journal\r\n- Filter tidak perlu di ganti (dijahit mati), menggunakan bahan synthetic dengan tingkat efisiensi filterisasi yg tinggi\r\n\r\nCara cuci : disarankan cuci manual tanpa mesin. Bagian Karet jgn di setrika, kucek, peras.', 24, NULL),
(35, 'Sepatu pria casual Kuzatura 9 varian warna K483ZS ', 127800, 'Sepatu Premium original KUZATURA, Brand sepatu yang terkenal dari Bandung.\r\nAsli produksi lokal, harga lebih murah tapi kualitasnya setara sepatu luar.\r\nKeren dan Casual untuk bekerja maupun gaul.\r\n\r\nTerbuat dari bahan SUEDE yaitu bagian dalam kulit hewan yang memiliki tekstur yang nyaman dan kuat. Sepatu dengan bahan SUEDE akan terasa lebih adem sehingga tidak mudah berbau apek.\r\n\r\nSol anti slip, terbuat dari karet pabrikan.\r\n\r\nWarna tersedia saat ini: olive muda, abu-abu, navy, coklat tua, army, maroon\r\nWarna kosong: hitam, coklat muda, krem\r\n\r\nUkuran:\r\nNomer 39: 26,0 cm\r\nNomer 40: 26,5 cm\r\nNomer 41: 27,5 cm\r\nNomer 42: 28,0 cm\r\nNomer 43: 28,5 cm\r\nNomer 44: 29,0 cm', 25, 1),
(36, 'Cetak Foto Polaroid Instax Fujifilm Asli Murah', 9300, '⚠️POLAROID FUJIFILM INSTAX ASLI (bukan art carton)\r\n⚠️HARGA untuk 1 FOTO frame putih / white\r\n⚠️STOK SELALU READY :)\r\n\r\nSIZE kertas instax mini = 54 mm x 86 mm.\r\nBEBAS ONGKIR min. order 6 foto.\r\nHarga GROSIR MURAH untuk pembelian diatas 10, 30, dan 50 foto.\r\nFREE kotak instax frame min. order 10pcs.\r\n\r\n✅DIKIRIM DI HARI YANG SAMA (order dan kirim foto sebelum 16.00)\r\n✅Untuk kurir GOSEND - akan dikirim diatas jam 5 atau H+1 (weekdays)\r\n✅FREE bubble wrap, packaging dijamin aman\r\n\r\nCARA ORDER\r\n📍Order sesuai jumlah foto yang ingin dicetak\r\n📍Foto langsung dikirim ke email\r\n📍Konfirmasi via chat\r\n📍Tim Picstax akan cek kualitas foto\r\n📍Jika ada foto yang kurang baik kami akan konfirmasi kembali via chat\r\n\r\nPERHATIAN!\r\nJika tidak kirim foto max 1x24 jam maka pesanan otomatis batal\r\n\r\nPENGIRIMAN FOTO\r\n💌EMAIL ke picstax.id@gmail.com dengan SUBJECT: (nama akun tokopedia)\r\n💌File JANGAN di zip/gdrive. Jika file besar, pisah 2 email.\r\n💌RASIO FOTO 3:4 atau 4:3 untuk instax mini, ukuran tidak sesuai akan terpotong otomatis.\r\n💌Foto harap sudah diedit JANGAN terlalu gelap/terang untuk hasil cetak maksimal.\r\n💌Bisa konsultasi dahulu via chat.\r\n', 26, 5),
(37, 'Poster Dinding Aesthetic A6 24pcs Poster Kamar Pos', 23000, 'ALLPOSTER COLOUR SERIES\r\nSOLUSI DEKOR KAMAR SEMAUMU!\r\nBanyak Koleksi gambar Favoritmu ❤\r\nTANPA PO GAES..\r\n\r\nUkuran A6 (15,5 x 11,5)\r\n\r\n\r\n✔ FREE BUBBLE WRAP TANPA MIN. ORDER\r\n✔ CEK KATALOG DI HIGHLIGHT\r\n✔ MAU CUSTOM? MESSAGE KAMI..\r\n✔ PROSES CEPAT (1-2 HARI)\r\n✔ GAMBAR FULL HD\r\n✔ KERTAS ART CARTON 260 GSM (TEBAL BGT)\r\n✔ BISA REQUEST LAMINASI DOFF / GLOSSY\r\n*(TAMBAHKAN BIAYA LAMINASI, DI DAFTAR PRODUK, ATAU MINTA LINK KE ADMIN)\r\n✔ BANYAK PILIHAN PAKET GAMBAR\r\n✔ KAMI BARU, INSYAALLAH AMANAH\r\n✔ KUALITAS ADALAH PRIORITAS KAMI', 26, 5),
(38, 'Turkish Choco Dessert Box', 60000, 'Turkish Dessert Box\r\nThe Star of The Dessert Box\r\nButtercake coklat dilapisi dengan mousse cokelat dan vanila. Ditambah dengan lelehan cokelat turkish dan bola-bola coklat cripsy.', 27, 7),
(39, 'Tiramisu Dessert Box', 52000, 'Feel The Coffee Sensation Inside\r\nCoffee Vanilla buttercake yang moist dilapisi dengan white cheesy mousse dan pasta kopi.', 27, 1),
(40, 'Kopi Susu Gula Aren 1 Liter', 50998, 'KOMPOSISI PRODUK\r\no Espresso\r\no Fresh Milk\r\no Condensed Milk\r\no Gula Aren\r\n\r\nTINGKAT KEMANISAN\r\n*HARAP CANTUMKAN PADA NOTES UNTUK TINGKAT KEMANISAN YANG DIINGINKAN, TIDAK DICANTUMKAN = LEVEL NORMAL\r\nNormal = 100%\r\nLess = 70%\r\nLight = 50%', 28, 2),
(41, 'Tanaman Hias Begonia Polkadot', 25000, 'Tanaman Hias Begonia Polkadot', 29, NULL),
(42, 'pot bunga tanaman kotak tinggi HOYA 40 HITAM diame', 25000, 'edisi terbaru dari NKT\r\n\r\nPot NKT HOYA warna hitam 40\r\nBahan bagus dan sangat cantik dan elegan\r\nDi jamin kuat dan awet\r\nSangat cocok untuk meletakan tanaman sebagai hiasan rumah\r\n\r\ndetail ukuran\r\n\r\ndiameter silang : 40 cm\r\ndiameter atas. : 31 cm\r\ndiameter bawah: 17 cm\r\ntinggi. : 35,5 cm', 29, 1),
(43, 'JAKET SWEATER HOODIE ZIPPER POLOS', 119999, 'Jaketnya bagus', 30, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengguna_banner` (`id_pengguna`);

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
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_kelompok`
--
ALTER TABLE `detail_kelompok`
  MODIFY `id_detail_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `pengguna_banner` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

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
