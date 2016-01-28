-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2015 at 07:53 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE IF NOT EXISTS `donhang` (
  `madonhang` int(11) NOT NULL,
  `makhachhang` varchar(10) NOT NULL,
  `ngaydathang` date NOT NULL,
  `ngaygiaohang` date NOT NULL,
  `diachigiaohang` text NOT NULL,
  `nguoinhan` varchar(50) NOT NULL,
  `dienthoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donhangchitiet`
--

CREATE TABLE IF NOT EXISTS `donhangchitiet` (
  `madhct` int(11) NOT NULL,
  `masanpham` varchar(10) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` double NOT NULL,
  `madonhang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hangsanpham`
--

CREATE TABLE IF NOT EXISTS `hangsanpham` (
  `mahang` varchar(10) NOT NULL,
  `tenhang` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hangsanpham`
--

INSERT INTO `hangsanpham` (`mahang`, `tenhang`) VALUES
('01', 'Adidas'),
('02', 'Bitis'),
('03', 'Converse'),
('04', 'Diesel'),
('05', 'DrMartens'),
('06', 'Ecko'),
('07', 'Kappa'),
('08', 'Nike'),
('09', 'Reebok'),
('10', 'Toms');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
  `makhachhang` int(10) NOT NULL,
  `hovatenlot` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phai` tinyint(1) NOT NULL,
  `diachi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `dienthoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `machucvu` tinyint(1) NOT NULL DEFAULT '0',
  `xacnhanmatkhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makhachhang`, `hovatenlot`, `ten`, `phai`, `diachi`, `ngaysinh`, `dienthoai`, `username`, `password`, `machucvu`, `xacnhanmatkhau`, `email`) VALUES
(1, 'Lê', 'Huy', 1, 'Long Thành - Đồng Nai', '1994-07-26', '01238014905', 'huy', '123', 1, '123', 'huyle@gmail.com'),
(2, 'Trần Văn', 'Tèo', 1, 'Bình Dương', '1998-05-12', '0123456789', 'teo', '123', 0, '123', 'teotran@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `maloai` varchar(10) NOT NULL,
  `tenloai` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`maloai`, `tenloai`) VALUES
('bt', 'Boots'),
('ff', 'Flip-flop'),
('sh', 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `quangcao`
--

CREATE TABLE IF NOT EXISTS `quangcao` (
  `maquangcao` int(11) NOT NULL,
  `thongdiepngan` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thongdiepdai` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinh` varchar(200) NOT NULL,
  `ngaynhap` date NOT NULL,
  `mau` varchar(7) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quangcao`
--

INSERT INTO `quangcao` (`maquangcao`, `thongdiepngan`, `thongdiepdai`, `hinh`, `ngaynhap`, `mau`) VALUES
(1, 'Let''s the color touch your soul', 'All for your hobbies and desires!', 'ad1.jpg', '2015-09-02', '#000'),
(2, 'We provide the best quality of all.', 'It''s so arrogant, isn''t it? But you know what? It 100% true.', 'ad2.jpg', '2015-09-02', '#000'),
(3, 'Sports, Formal, Street footwear.', 'We guarantee that you can find the best type of shoes for your own.', 'ad3.jpg', '2015-09-02', '#fff'),
(4, 'We know!', 'We know what you want and we can help you with all the best we could.', 'ad4.jpg', '2015-09-02', '#fff'),
(5, 'Let''s go!', '"Dreams don''t work unless you do!"', 'ad5.jpg', '2015-09-02', '#000');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
  `masp` varchar(11) NOT NULL,
  `tensanpham` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mahang` varchar(10) NOT NULL,
  `maloai` varchar(10) NOT NULL,
  `mota` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` double NOT NULL,
  `hinh` varchar(200) NOT NULL,
  `ngaynhap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensanpham`, `mahang`, `maloai`, `mota`, `soluong`, `dongia`, `hinh`, `ngaynhap`) VALUES
('ad01', 'Adistar', '01', 'sh', 'Adidas Adidas Adidas Adidas Adidas Adidas', 300, 2000000, 'adistar.jpg', '2015-09-01'),
('ad02', 'Adidas Boost', '01', 'sh', 'Adidas Adidas Adidas Adidas Adidas Adidas', 300, 2500000, 'boost.jpg', '2015-09-01'),
('ad03', 'Adidas Duramo', '01', 'sh', 'Adidas Adidas Adidas Adidas Adidas Adidas', 300, 2000000, 'duramo.jpg', '2015-09-01'),
('ad04', 'Adidas Rideboost', '01', 'sh', 'Adidas Adidas Adidas Adidas Adidas Adidas', 300, 2300000, 'rideboost.jpg', '2015-09-01'),
('ad05', 'Adidas Sonic', '01', 'sh', 'Adidas Adidas Adidas Adidas Adidas Adidas', 300, 2500000, 'sonic.jpg', '2015-09-01'),
('ad06', 'Adidas Spring Blade', '01', 'sh', 'Adidas Adidas Adidas Adidas Adidas Adidas', 300, 2500000, 'springblade.jpg', '2015-09-01'),
('ad07', 'Adidas Ultra Boost', '01', 'sh', 'Adidas Adidas Adidas Adidas Adidas Adidas', 300, 2400000, 'ultraboost.jpg', '2015-09-01'),
('bi01', 'Dép lào vàng', '02', 'ff', 'Bitis Bitis Bitis Bitis Bitis Bitis Bitis', 200, 150000, 'dlm.jpg', '2015-09-02'),
('bi02', 'Dép lào xanh', '02', 'ff', 'Bitis Bitis Bitis Bitis Bitis Bitis Bitis', 200, 150000, 'dlmb.jpg', '2015-09-02'),
('bi03', 'Dép lào nâu', '02', 'ff', 'Bitis Bitis Bitis Bitis Bitis Bitis Bitis', 150, 154000, 'dlmd.jpg', '2015-09-02'),
('bi04', 'Dép lào xanh rêu', '02', 'ff', 'Bitis Bitis Bitis Bitis Bitis Bitis Bitis', 200, 120000, 'dlmr.jpg', '2015-09-02'),
('bi05', 'Bitis Red Monsters', '02', 'sh', 'Bitis Bitis Bitis Bitis Bitis Bitis Bitis', 300, 250000, 'dsm.jpg', '2015-09-02'),
('bi06', 'Dép lào nâu đất', '02', 'ff', 'Bitis Bitis Bitis Bitis Bitis Bitis Bitis', 150, 150000, 'slm.jpg', '2015-09-01'),
('bi07', 'Dép lào xanh lá', '02', 'ff', 'Bitis Bitis Bitis Bitis Bitis Bitis Bitis', 250, 200000, 'sxm.jpg', '2015-09-02'),
('bi08', 'Dép lào đỏ', '02', 'ff', 'Bitis Bitis Bitis Bitis Bitis Bitis Bitis', 200, 150000, 'sxmd.jpg', '2015-09-02'),
('co01', 'All Star Fulton', '03', 'sh', 'Converse Converse Converse Converse', 300, 1500000, 'AllStarFulton.png', '2015-09-01'),
('co02', 'Chuck Taylor All Star 70', '03', 'sh', 'Converse Converse Converse Converse', 300, 2000000, 'ChuckTaylorAllStar70.png', '2015-09-02'),
('co03', 'Chuck Taylor All Star Batman', '03', 'sh', 'Converse Converse Converse Converse', 300, 1500000, 'ChuckTaylorAllStarBatman.png', '2015-09-02'),
('co04', 'Chuck Taylor All Star By John Varvatos', '03', 'sh', 'Converse Converse Converse Converse', 260, 1900000, 'ChuckTaylorAllStarByJohnVarvatos.png', '2015-09-01'),
('co05', 'Chuck Taylor All Star Classic Colors', '03', 'sh', 'Converse Converse Converse Converse', 300, 2100000, 'ChuckTaylorAllStarClassicColors.png', '2015-09-01'),
('co06', 'Chuck Taylor All Star Fresh Color', '03', 'sh', 'Converse Converse Converse Converse', 300, 2500000, 'ChuckTaylorAllStarFreshColors.png', '2015-09-01'),
('co07', 'Chuck Taylor All Star II', '03', 'sh', 'Converse Converse Converse Converse', 300, 2000000, 'ChuckTaylorAllStarII.png', '2015-09-02'),
('co08', 'Chuck Taylor All Star II Red', '03', '', 'Converse Converse Converse Converse', 320, 2300000, 'ChuckTaylorAllStarIIRed.png', '2015-09-02'),
('co09', 'Chuck Taylor All Star Jack Purce ll', '03', 'sh', 'Converse Converse Converse Converse', 250, 2500000, 'ChuckTaylorAllStarJackPurcell.png', '2015-09-03'),
('co10', 'Chuck Taylor All Star Leather', '03', 'sh', 'Converse Converse Converse Converse', 260, 2600000, 'ChuckTaylorAllStarLeather.png', '2015-09-02'),
('co11', 'Chuck Taylor All Star Superman', '03', 'sh', 'Converse Converse Converse Converse', 240, 2100000, 'ChuckTaylorAllStarSuperman.png', '2015-09-01'),
('co12', 'Chuck Taylor All Star Washed', '03', 'sh', 'Converse Converse Converse Converse', 240, 1200000, 'ChuckTaylorAllStarWashed.png', '2015-09-02'),
('co13', 'Chuck Taylor Monochrome Canvas', '03', 'sh', 'Converse Converse Converse Converse', 200, 2000000, 'ChuckTaylorMonochromeCanvas.png', '2015-09-01'),
('di01', 'Diesel Basket', '04', 'bt', 'Diesel Diesel Diesel Diesel Diesel Diesel', 200, 1000000, 'basket.jpg', '2015-09-01'),
('di02', 'Diesel Cassidy', '04', 'bt', 'Diesel Diesel Diesel Diesel Diesel Diesel', 150, 1500000, 'cassidy.jpg', '2015-09-01'),
('di03', 'Diesel Boolthed', '04', 'bt', 'Diesel Diesel Diesel Diesel Diesel Diesel', 200, 1600000, 'dboolthed.jpg', '2015-09-02'),
('di04', 'Diesel Ddaahgger', '04', 'bt', 'Diesel Diesel Diesel Diesel Diesel Diesel', 150, 1500000, 'ddaahgger.jpg', '2015-09-01'),
('di05', 'Diesel Ddeshort', '04', 'bt', 'Diesel Diesel Diesel Diesel Diesel Diesel', 200, 2000000, 'ddeshort.jpg', '2015-09-01'),
('di06', 'Diesel Dfridas', '04', 'bt', 'Diesel Diesel Diesel Diesel Diesel Diesel', 210, 2000000, 'dfridas.jpg', '2015-09-02'),
('dr01', 'DrMartens 1', '05', 'sh', 'DrMartens DrMartens DrMartens DrMartens', 100, 1500000, 'drmartens1.png', '2015-09-01'),
('dr02', 'DrMartens 2', '05', 'sh', 'DrMartens DrMartens DrMartens DrMartens', 100, 2000000, 'drmartens2.png', '2015-09-01'),
('dr03', 'DrMartens 3', '05', 'sh', 'DrMartens DrMartens DrMartens DrMartens', 100, 1500000, 'drmartens3.png', '2015-09-02'),
('dr04', 'DrMartens 4', '05', 'sh', 'DrMartens DrMartens DrMartens DrMartens', 100, 1500000, 'drmartens4.png', '2015-09-01'),
('dr05', 'DrMartens', '05', 'bt', 'DrMartens DrMartens DrMartens DrMartens', 100, 1300000, 'drmartens5.png', '2015-09-02'),
('dr06', 'DrMartens', '05', 'bt', 'DrMartens DrMartens DrMartens DrMartens', 100, 1500000, 'drmartens6.png', '2015-09-11'),
('dr07', 'DrMartens', '05', 'sh', 'DrMartens DrMartens DrMartens DrMartens', 100, 1500000, 'drmartens7.png', '2015-09-09'),
('dr08', 'DrMartens', '05', 'bt', 'DrMartens DrMartens DrMartens DrMartens', 100, 1520000, 'drmartens8.png', '2015-09-02'),
('ec01', 'Ecko 1', '06', 'sh', 'Ecko Ecko Ecko Ecko Ecko Ecko', 200, 1400000, 'ecko1.jpg', '2015-09-02'),
('ec02', 'Ecko 2', '06', 'sh', 'Ecko Ecko Ecko Ecko Ecko Ecko', 200, 1200000, 'ecko2.jpg', '2015-09-02'),
('ec03', 'Ecko 3', '06', 'sh', 'Ecko Ecko Ecko Ecko Ecko Ecko', 200, 1500000, 'ecko3.jpg', '2015-09-02'),
('ec04', 'Ecko 4', '06', 'sh', 'Ecko Ecko Ecko Ecko Ecko Ecko', 200, 1200000, 'ecko4.jpg', '2015-09-02'),
('ec05', 'Ecko 5', '06', 'sh', 'Ecko Ecko Ecko Ecko Ecko Ecko', 200, 1300000, 'ecko5.jpg', '2015-09-08'),
('ka01', 'Kappa Authenti', '07', 'sh', 'Kappa Kappa Kappa Kappa Kappa Kappa Kappa', 100, 1500000, 'authentic.jpg', '2015-09-02'),
('ka02', 'Kappa Authentic 2', '07', 'sh', 'Kappa Kappa Kappa Kappa Kappa Kappa Kappa', 100, 1600000, 'authentic2.jpg', '2015-09-02'),
('ka03', 'Kappa Authentic 3', '07', 'sh', 'Kappa Kappa Kappa Kappa Kappa Kappa Kappa', 100, 1400000, 'authentic3.jpg', '2015-09-02'),
('ka04', 'Kappa Authentic 5', '07', 'sh', 'Kappa Kappa Kappa Kappa Kappa Kappa Kappa', 100, 1500000, 'authentic4.jpg', '2015-09-02'),
('ka05', 'Kappa Powerd', '07', 'sh', 'Kappa Kappa Kappa Kappa Kappa Kappa Kappa', 100, 1200000, 'powerd.jpg', '2015-09-02'),
('ka06', 'Kappa Tenembau', '07', 'sh', 'Kappa Kappa Kappa Kappa Kappa Kappa Kappa', 100, 1600000, 'tenembaum.jpg', '2015-09-02'),
('ka07', 'Kappa Tikelm', '07', 'sh', 'Kappa Kappa Kappa Kappa Kappa Kappa Kappa', 100, 1600000, 'tikelme.jpg', '2015-09-02'),
('ka08', 'Kappa Tinevr', '07', 'sh', 'Kappa Kappa Kappa Kappa Kappa Kappa Kappa', 100, 1600000, 'tinevra.jpg', '2015-09-02'),
('ka09', 'Kappa Tinkerbel', '07', 'sh', 'Kappa Kappa Kappa Kappa Kappa Kappa Kappa', 100, 1200000, 'tinkerbel.jpg', '2015-09-02'),
('ka10', 'Kappa Tippete', '07', 'sh', 'Kappa Kappa Kappa Kappa Kappa Kappa Kappa', 100, 1400000, 'tippete.jpg', '2015-09-02'),
('ka11', 'Kappa Unikeni', '07', 'sh', 'Kappa Kappa Kappa Kappa Kappa Kappa Kappa', 100, 1500000, 'unikeni.jpg', '2015-09-02'),
('ka12', 'Kappa Usistik', '07', 'sh', 'Kappa Kappa Kappa Kappa Kappa Kappa Kappa', 100, 1600000, 'usistik.jpg', '2015-09-02'),
('ka13', 'Kappa Vemofet', '07', 'sh', 'Kappa Kappa Kappa Kappa Kappa Kappa Kappa', 100, 1900000, 'vemofet.jpg', '2015-09-02'),
('ka14', 'Kappa Vertiole', '07', 'sh', 'shKappa Kappa Kappa Kappa Kappa Kappa Kappa', 100, 1600000, 'vertioled.jpg', '2015-09-02'),
('ni01', 'NIKE Air force', '08', 'sh', 'NIKE NIKE NIKE NIKE NIKE NIKE', 350, 3000000, 'airforce.png', '2015-09-09'),
('ni02', 'NIKE Air force Mid', '08', 'sh', 'NIKE NIKE NIKE NIKE NIKE NIKE', 360, 3200000, 'airforcemid.png', '2015-09-09'),
('ni03', 'NIKE Air Max', '08', 'sh', 'NIKE NIKE NIKE NIKE NIKE NIKE', 350, 3600000, 'airmax.jpg', '2015-09-08'),
('ni04', 'NIKE Air Zoom', '08', 'sh', 'NIKE NIKE NIKE NIKE NIKE NIKE', 350, 3500000, 'airzoom.jpg', '2015-09-08'),
('ni05', 'NIKE Free', '08', 'sh', 'NIKE NIKE NIKE NIKE NIKE NIKE', 350, 3000000, 'free.png', '2015-09-08'),
('ni06', 'NIKE Huarache', '08', 'sh', 'NIKE NIKE NIKE NIKE NIKE NIKE', 350, 3600000, 'huarache.jpg', '2015-09-08'),
('ni07', 'NIKE Rosheron', '08', 'sh', 'NIKE NIKE NIKE NIKE NIKE NIKE', 350, 5000000, 'rosheron.jpg', '2015-09-08'),
('ree01', 'Reebok Court', '09', 'sh', 'Reebok Reebok Reebok Reebok Reebok', 260, 1500000, 'court.jpg', '2015-09-10'),
('ree02', 'Reebok Cross Fit', '09', 'sh', 'Reebok Reebok Reebok Reebok Reebok', 260, 2000000, 'crossfit.jpg', '2015-09-10'),
('ree03', 'Reebok Dual Rush', '09', 'sh', 'Reebok Reebok Reebok Reebok Reebok', 260, 1600000, 'dualrush.jpg', '2015-09-10'),
('ree04', 'Reebok Kamikaze', '09', 'sh', 'Reebok Reebok Reebok Reebok Reebok', 260, 3000000, 'kamikaze.jpg', '2015-09-10'),
('ree05', 'Reebok Kamikaze 2', '09', 'sh', 'Reebok Reebok Reebok Reebok Reebok', 260, 3000000, 'kamikaze1.jpg', '2015-09-10'),
('ree06', 'Reebok NPC', '09', 'sh', 'Reebok Reebok Reebok Reebok Reebok', 260, 2800000, 'npc.jpg', '2015-09-10'),
('ree07', 'Reebok Sublite Duo', '09', 'sh', 'Reebok Reebok Reebok Reebok Reebok', 260, 2300000, 'subliteduo.jpg', '2015-09-10'),
('ree08', 'Reebok Ventilator', '09', 'sh', 'Reebok Reebok Reebok Reebok Reebok', 260, 2000000, 'ventilator.jpg', '2015-09-10'),
('to01', 'TOMS Bark Earth', '10', 'sh', 'TOMS TOMS TOMS TOMS TOMS TOMS TOMS', 360, 1500000, 'barkearth.jpg', '2015-09-03'),
('to02', 'TOMS Black Cotton', '10', 'sh', 'TOMS TOMS TOMS TOMS TOMS TOMS TOMS', 360, 1000000, 'blackcotton.jpg', '2015-09-03'),
('to03', 'TOMS Black Full Graim', '10', 'bt', 'TOMS TOMS TOMS TOMS TOMS TOMS TOMS', 360, 3000000, 'blackfullgraim.jpg', '2015-09-03'),
('to04', 'TOMS Black Gamers', '10', 'sh', 'TOMS TOMS TOMS TOMS TOMS TOMS TOMS', 360, 1500000, 'blackgamer.jpg', '2015-09-03'),
('to05', 'TOMS Camo Leather', '10', 'sh', 'TOMS TOMS TOMS TOMS TOMS TOMS TOMS', 360, 1800000, 'camoleather.jpg', '2015-09-03'),
('to06', 'TOMS Dark Olive', '10', 'sh', 'TOMS TOMS TOMS TOMS TOMS TOMS TOMS', 360, 2500000, 'darkolive.jpg', '2015-09-03'),
('to07', 'TOMS Navy Coated', '10', 'sh', 'TOMS TOMS TOMS TOMS TOMS TOMS TOMS', 360, 2600000, 'navycoated.jpg', '2015-09-03'),
('to08', 'TOMS White', '10', 'sh', 'TOMS TOMS TOMS TOMS TOMS TOMS TOMS', 360, 1500000, 'white.jpg', '2015-09-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madonhang`);

--
-- Indexes for table `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  ADD PRIMARY KEY (`madhct`);

--
-- Indexes for table `hangsanpham`
--
ALTER TABLE `hangsanpham`
  ADD PRIMARY KEY (`mahang`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makhachhang`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`maloai`);

--
-- Indexes for table `quangcao`
--
ALTER TABLE `quangcao`
  ADD PRIMARY KEY (`maquangcao`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `madonhang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  MODIFY `madhct` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makhachhang` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `quangcao`
--
ALTER TABLE `quangcao`
  MODIFY `maquangcao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
