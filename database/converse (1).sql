-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2018 at 09:04 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `converse`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(11) DEFAULT NULL,
  `editedby` int(11) DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `username`, `password`, `level`, `image`, `datecreated`, `createdby`, `editedby`, `deletedby`) VALUES
(3, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'default.jpg', '2018-05-22 09:57:33', 0, 0, NULL),
(4, 'super', 'super', '7fd2a4aaf011d90d59d7601c03aeeac6', 'admin', 'default.jpg', '2018-05-26 11:52:01', 3, 3, 3),
(5, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'admin', 'default.jpg', '2018-05-26 14:50:36', 3, NULL, NULL),
(6, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'admin', 'default.jpg', '2018-05-26 14:50:40', 3, NULL, NULL),
(7, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'admin', 'default.jpg', '2018-05-26 14:50:44', 3, NULL, NULL),
(8, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'admin', 'default.jpg', '2018-05-26 14:50:47', 3, NULL, NULL),
(9, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'admin', 'default.jpg', '2018-05-26 14:50:51', 3, NULL, NULL),
(10, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'admin', 'default.jpg', '2018-05-26 14:50:55', 3, NULL, NULL),
(11, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'admin', 'default.jpg', '2018-05-26 14:50:58', 3, NULL, NULL),
(12, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'admin', 'default.jpg', '2018-05-26 14:51:02', 3, NULL, NULL),
(13, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'admin', 'default.jpg', '2018-05-26 14:51:07', 3, NULL, NULL),
(14, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'admin', 'default.jpg', '2018-05-26 14:51:15', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jeniskelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `status_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isdeleted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `jeniskelamin`, `nohp`, `email`, `username`, `password`, `image`, `status`, `status_comment`, `datecreated`, `isdeleted`) VALUES
(1, 'Jelita', 'Malang', 'Laki-laki', '199201', 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '', 0, NULL, '2018-05-23 08:46:09', NULL),
(2, 'A', '', NULL, '', 'a@gmail.com', 'aaa', 'aaaaaaaa', '', 1, NULL, '2018-05-26 11:08:35', NULL),
(3, 'Aldhan', '', NULL, '', 'alsad@asdqwe.com', 'aldansorry', '6faa5a545c6f9137352ece8f1295c3d1', '', 1, 'Maling', '2018-05-26 11:13:13', NULL),
(4, 'dita', 'dita', 'Perempuan', '082245414188', 'frtiarad@gmail.com', 'dita', '8ee24bf1f0894c7df33eab5ca36dfaa2', '', 1, NULL, '2018-05-30 09:51:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `date_order` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_order` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum dibayar',
  `fk_id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `date_order`, `status_order`, `fk_id_pelanggan`) VALUES
(7, '2018-05-23 08:50:33', 'sudah di bayar', 1),
(8, '2018-05-23 08:53:04', 'belum di bayar', 1),
(9, '2018-05-23 08:53:35', 'belum di bayar', 1),
(10, '2018-05-23 08:53:59', 'belum di bayar', 1),
(11, '2018-05-23 09:03:52', 'belum di bayar', 1),
(13, '2018-05-23 09:20:34', 'sudah di bayar', 1),
(14, '2018-05-30 10:00:44', 'belum di bayar', 1),
(15, '2018-05-30 10:05:20', 'belum di bayar', 1),
(16, '2018-05-30 10:06:30', 'sudah di kirim', 4),
(17, '2018-05-30 10:17:54', 'sudah di kirim', 4),
(18, '2018-05-30 10:27:04', 'belum di bayar', 4),
(19, '2018-05-30 10:53:02', 'belum di bayar', 3),
(20, '2018-07-11 08:42:05', 'belum di bayar', 1),
(21, '2018-07-11 08:57:58', 'belum di bayar', 1),
(22, '2018-07-11 08:59:15', 'belum di bayar', 1),
(23, '2018-07-11 09:14:07', 'belum di bayar', 1),
(24, '2018-07-11 11:35:53', 'belum di bayar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_detail`
--

CREATE TABLE `pemesanan_detail` (
  `fk_id_pemesanan` int(11) NOT NULL,
  `fk_id_produk` int(11) NOT NULL,
  `ukuran` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanan_detail`
--

INSERT INTO `pemesanan_detail` (`fk_id_pemesanan`, `fk_id_produk`, `ukuran`, `jumlah`) VALUES
(7, 3, '36', 2),
(8, 3, '36', 1),
(9, 3, '36', 1),
(10, 3, '36', 1),
(11, 3, '36', 1),
(13, 3, '36', 1),
(14, 4, '2', 1),
(15, 3, '38', 1),
(16, 4, '2', 1),
(17, 3, '38', 1),
(18, 4, '38', 1),
(19, 3, '38', 1),
(20, 3, '38', 1),
(21, 7, '37', 1),
(22, 15, 'S', 2),
(22, 8, '38', 2),
(23, 3, '37', 1),
(24, 15, 'S', 1);

--
-- Triggers `pemesanan_detail`
--
DELIMITER $$
CREATE TRIGGER `mengurangi_stok_otomatis` AFTER INSERT ON `pemesanan_detail` FOR EACH ROW UPDATE produk_detail set produk_detail.stok = (select pd.stok from (select * from produk_detail) as pd where pd.fk_id_produk=NEW.fk_id_produk AND pd.ukuran = NEW.ukuran limit 1)-NEW.jumlah where produk_detail.fk_id_produk = NEW.fk_id_produk AND produk_detail.ukuran=NEW.ukuran
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jasa_layanan` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_resi` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_id_pemesanan` int(11) NOT NULL,
  `fk_id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `series` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(50) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT '0',
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(11) DEFAULT NULL,
  `editedby` int(11) DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `deskripsi`, `image`, `gender`, `tipe`, `series`, `warna`, `harga`, `discount`, `datecreated`, `createdby`, `editedby`, `deletedby`) VALUES
(3, 'Chuck Taylor All Star High Street', 'The Converse Chuck Taylor All Star Street recasts the iconic original with a modern look. A cushioned collar and tongue enhance comfort, while a rubber outsole delivers reliable traction wherever your go.', 'ChuckTaylorAllStarHighStreetblack1.JPG', 'men', 'sneaker', 'chuck taylor all star', 'black', 799000, 0, '2018-05-23 08:18:07', NULL, 3, NULL),
(4, 'Chuck Taylor All Star High Street', 'The Converse Chuck Taylor All Star Street recasts the iconic original with a modern look. A cushioned collar and tongue enhance comfort, while a rubber outsole delivers reliable traction wherever your go.', 'ChuckTaylorAllStarHighStreetblack1.JPG', 'men', 'sneaker', 'chuck taylor all star', 'black', 799000, 0, '2018-05-23 08:52:43', NULL, 3, 3),
(5, 'Chuck Taylor All Star High Street', 'The Converse Chuck Taylor All Star Street recasts the iconic original with a modern look. A cushioned collar and tongue enhance comfort, while a rubber outsole delivers reliable traction wherever your go.', 'ChuckTaylorAllStarHighStreetblack1.JPG', 'men', 'sneaker', 'chuck taylor all star', 'black', 799000, 0, '2018-05-26 11:48:53', 3, 3, 3),
(6, 'Chuck Taylor All Star High Street', 'The Converse Chuck Taylor All Star Street recasts the iconic original with a modern look. A cushioned collar and tongue enhance comfort, while a rubber outsole delivers reliable traction wherever your go.', 'ChuckTaylorAllStarHighStreetwhite1.JPG', 'men', 'sneaker', 'chuck taylor all star', 'white', 799000, 0, '2018-07-03 11:03:13', 3, 3, NULL),
(7, 'Chuck Taylor All Star', 'These lace-up Converse CT Ox Trainers have a textile with a geometric pattern. Converse branding is found on the heel & tongue. The toe shell and sole are white with black stripe detail. The brown waffle tread is deep for excellent grip.', 'ChuckTaylorAllStarnavy1.JPG', 'men', 'sneaker', 'chuck taylor all star', 'navy', 659000, 50, '2018-07-03 11:08:54', 3, 3, NULL),
(8, 'Chuck Taylor All Star', 'These lace-up Converse CT Ox Trainers have a textile with a geometric pattern. Converse branding is found on the heel & tongue. The toe shell and sole are white with black stripe detail. The brown waffle tread is deep for excellent grip.', 'ChuckTaylorAllStargrey1.JPG', 'men', 'sneaker', 'chuck taylor all star', 'grey', 659000, 0, '2018-07-03 11:10:58', 3, NULL, NULL),
(9, 'Chuck Taylor All Star Lift', 'This summer is all about living carefree in the Chuck Taylor All Star Lift. The canvas upper features fresh new colors, perfect for celebrating the season and your bold style. The stack sole elevates any look while the EVA insole for cushioning adds even ', 'ChuckTaylorAllStarLiftpink1.JPG', 'women', 'sneaker', 'chuck taylor all star', 'pink', 699000, 0, '2018-07-03 11:14:35', 3, 3, NULL),
(10, 'One Star', 'Inspired by countries from all over the world, this collection of One Star sneakers is all about coming together in celebration. Each unique sneaker features a canvas upper with suede eyerow details, an EVA insole for cushioning, and our embroidered One S', 'OneStarblack1.JPG', 'men', 'sneaker', 'converse cons', 'black', 799000, 0, '2018-07-03 11:22:52', 3, NULL, NULL),
(11, 'One Star', 'Inspired by countries from all over the world, this collection of One Star sneakers is all about coming together in celebration. Each unique sneaker features a canvas upper with suede eyerow details, an EVA insole for cushioning, and our embroidered One S', 'OneStarnavy1.JPG', 'men', 'sneaker', 'converse cons', 'navy', 799000, 0, '2018-07-03 11:25:45', 3, 3, NULL),
(12, 'Chuck Taylor All Star Dainty', 'This slim line classic Dainty Ox is a must for all wardrobes. With its simple thinner sole and slimmer look it works with all outfits and looks.', 'ChuckTaylorAllStarDaintypink1.JPG', 'women', 'sneaker', 'chuck taylor all star', 'blue', 559000, 0, '2018-07-03 11:30:36', 3, NULL, NULL),
(13, 'Star Chevron Tri Color Tee', 'Tees, None', 'StarChevronTriColorTeeblue1.JPG', 'men', 'clothing', 'chuck taylor all star', 'blue', 259000, 0, '2018-07-04 08:32:55', 3, NULL, NULL),
(14, 'Star Chevron Tri Color Tee', 'Tees, None', 'StarChevronTriColorTeeblack1.JPG', 'men', 'clothing', 'chuck taylor all star', 'black', 259000, 0, '2018-07-04 08:35:13', 3, NULL, NULL),
(15, 'Graphic Boxstar PO Hoodie', 'Hoodie, None', 'GraphicBoxstarPOHoodieblue1.JPG', 'women', 'clothing', 'chuck taylor all star', 'blue', 559000, 0, '2018-07-04 08:37:04', 3, NULL, NULL),
(16, 'Graphic Boxstar PO Hoodie', 'Hoodie, None', 'GraphicBoxstarPOHoodieblack1.JPG', 'women', 'clothing', 'chuck taylor all star', 'black', 559000, 0, '2018-07-04 08:39:07', 3, NULL, NULL),
(17, 'One Star 2V', 'Cushioning: Sponge Rubber Lining: Textile Closure: Hook and Loop Closure', 'OneStar2Vred1.JPG', 'kids', 'sneaker', 'converse cons', 'red', 359000, 0, '2018-07-04 08:41:53', 3, 3, NULL),
(18, 'Poly Chuck Plus Backpack', 'An affordable backpack for your laptop and all of your gear. Designed for comfort, this backpack has a place for everything. The front section provides a big zipped pocket for convenient storage. Two side pockets for water bottle/small accessories', 'PolyChuckPlusBackpack1.JPG', 'women', 'sneaker', 'converse cons', 'orange', 539100, 0, '2018-07-04 08:48:30', 3, NULL, NULL),
(19, 'Women''s Chuck Seasonal Camo Print Backpack', 'An affordable backpack for your laptop and all of your gear. Designed for comfort, this backpack has a place for everything. The front section provides a big zipped pocket for convenient storage. Two side pockets for water bottle/small accessories', 'WomensChuckSeasonalCamoPrintBackpack1.JPG', 'women', 'accessories', 'chuck taylor all star', 'pink', 539100, 0, '2018-07-04 08:50:43', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk_detail`
--

CREATE TABLE `produk_detail` (
  `fk_id_produk` int(11) NOT NULL,
  `ukuran` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(11) DEFAULT NULL,
  `deletedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk_detail`
--

INSERT INTO `produk_detail` (`fk_id_produk`, `ukuran`, `stok`, `datecreated`, `createdby`, `deletedby`) VALUES
(3, '37', 0, '2018-05-26 11:47:21', 0, NULL),
(4, '2', 1, '2018-05-30 09:58:55', 3, NULL),
(4, '38', 4, '2018-05-30 10:26:24', 4, NULL),
(3, '38', 8, '2018-05-30 10:56:38', 3, NULL),
(7, '37', 4, '2018-07-08 15:31:17', 3, NULL),
(8, '38', 8, '2018-07-08 15:31:31', 3, NULL),
(12, '36', 3, '2018-07-08 15:31:57', 3, NULL),
(3, '36', 5, '2018-07-08 15:32:31', 3, NULL),
(15, 'S', 2, '2018-07-08 15:35:02', 3, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_pelanggan` (`fk_id_pelanggan`);

--
-- Indexes for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD KEY `fk_id_pemesanan` (`fk_id_pemesanan`),
  ADD KEY `fk_id_produk` (`fk_id_produk`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_pemesanan` (`fk_id_pemesanan`),
  ADD KEY `fk_id_pegawai` (`fk_id_pegawai`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_detail`
--
ALTER TABLE `produk_detail`
  ADD KEY `fk_id_produk` (`fk_id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`fk_id_pelanggan`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD CONSTRAINT `pemesanan_detail_ibfk_1` FOREIGN KEY (`fk_id_pemesanan`) REFERENCES `pemesanan` (`id`),
  ADD CONSTRAINT `pemesanan_detail_ibfk_2` FOREIGN KEY (`fk_id_produk`) REFERENCES `produk` (`id`);

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`fk_id_pegawai`) REFERENCES `pegawai` (`id`),
  ADD CONSTRAINT `pengiriman_ibfk_2` FOREIGN KEY (`fk_id_pemesanan`) REFERENCES `pemesanan` (`id`);

--
-- Constraints for table `produk_detail`
--
ALTER TABLE `produk_detail`
  ADD CONSTRAINT `produk_detail_ibfk_1` FOREIGN KEY (`fk_id_produk`) REFERENCES `produk` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
