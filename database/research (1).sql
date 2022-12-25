-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 09:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `research`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` text DEFAULT NULL,
  `password` text NOT NULL,
  `bod` date NOT NULL,
  `part` text NOT NULL,
  `tell` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `bod`, `part`, `tell`) VALUES
(1, 'admin@gmail.com', '533203', '2000-03-05', 'کۆلێژی سۆران', '07503732421'),
(2, 'omed@gmail.com', '533203', '2000-03-05', 'تەکنەلۆجیای زانیاری', '07503732421'),
(3, 'xadija@gmail.com', '533203', '2000-03-05', 'لەدایکبوون', '07503732421'),
(4, 'bushra@gmail.com', '533203', '2000-03-05', 'پەرستاری', '07503732421'),
(5, 'elaf@gmail.com', '533203', '2000-03-05', 'کارگێری', '07503732421'),
(6, 'muslim@gmail.com', '533203', '2000-03-05', 'شیکاری نەخۆشیەکان', '07503732421'),
(11, 'edris@gmail.com', '533203', '2000-03-05', 'دەروناسی', '');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `part` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tell` int(11) NOT NULL,
  `idcode` int(11) NOT NULL,
  `place` varchar(255) NOT NULL,
  `blood` varchar(255) NOT NULL,
  `pic_stu` varchar(255) NOT NULL,
  `pic_ifo_card` varchar(255) NOT NULL,
  `pic_food_card` varchar(255) NOT NULL,
  `pic_centri` varchar(255) NOT NULL,
  `pscode` int(11) NOT NULL,
  `katt` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `suc` varchar(255) NOT NULL DEFAULT 'not',
  `parallel` int(255) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`ID`, `name`, `part`, `code`, `email`, `tell`, `idcode`, `place`, `blood`, `pic_stu`, `pic_ifo_card`, `pic_food_card`, `pic_centri`, `pscode`, `katt`, `comment`, `suc`, `parallel`, `type`) VALUES
(179, 'زارە بەهرەم ئەبدوللا', 'لەدایکبوون', 123, 'hero.aep@gmail.com', 2147483647, 2147483647, 'هەولێر/سۆران', 'O-', '1531450035.jpg', '1606796013.jpg', '52941795.jpg', '833941702.jpg', 123, '16/03/22 08:52:21 PM', 'هەڵە لە زانیاریەکانت هەیە تکایە بە زوترین کات سەردانی پەیمانگا بکە ، وە هەموو ئەو زانیاریانای پێویستن ڵەگەل خۆت بێنە', 'success', 1, 'ئێواران'),
(185, 'سارا باوەر بیرهات', 'کارگێری', 321, 'sara.barzje@gmail.com', 2147483647, 2147483647, 'هەولێر/سۆران', 'O-', '1703970755.jpg', '1067639218.jpg', '1813160870.jpg', '1286038055.jpg', 321, '18/03/22 06:12:26 PM', '', 'success', 0, 'بەیانیان'),
(186, 'پەیام کەمال بابان', 'شیکاری نەخۆشیەکان', 111, 'pala@gmail.com', 2147483647, 2147483647, 'سۆران/رواندز', 'O-', '1166475849.jpg', '1974451109.jpg', '389786076.jpg', '391303025.jpg', 111, '30/03/22 11:38:41 PM', '', 'success', 1, 'ئێواران'),
(187, 'رەسەن کاوە چیا', 'پەرستاری', 12345, 'rasan@yahoo.com', 2147483647, 2147483647, 'هەولێر/سۆران', 'A-', '1072453568.jpg', '2008724962.png', '544108391.jpg', '1556149855.jpg', 12345, '30/03/22 11:41:30 PM', '', 'success', 1, 'بەیانیان'),
(189, 'دارا رێبوار رەشید', 'لەدایکبوون', 222, 'rebo@gmail.com', 2147483647, 2147483647, 'هەولێر/سۆران', 'AB+', '425672655.jpg', '1773765941.png', '302810158.jpg', '1789801543.jpg', 222, '07/04/22 08:34:09 PM', '', 'success', 0, 'بەیانیان'),
(190, 'موسلیم فاخر', 'تەکنەلۆجیای زانیاری', 333, 'muslim@gmail.com', 2147483647, 2147483647, 'سۆران/رواندز', 'O-', '914519367.jpg', '2033956418.jpg', '1669573069.jpg', '1060388385.jpg', 333, '04/05/22 12:08:04 PM', '', 'success', 1, 'بەیانیان'),
(191, 'ئارمان رەحیم سادق', 'تەکنەلۆجیای زانیاری', 444, 'aro_sall@gmail.com', 2147483647, 2147483647, 'هەولێر/خەلیفان', 'AB-', '628397524.jpg', '1394287353.jpg', '1845706053.jpg', '925898896.jpg', 444, '04/05/22 12:09:26 PM', '', 'success', 0, 'ئێواران');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `passcode` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `part` enum('کارگێری','لەدایکبوون','ژمێریاری','پەرستاری','شیکاری نەخۆشیەکان','تەکنەلۆجیای زانیاری') NOT NULL,
  `send` varchar(255) NOT NULL DEFAULT 'no',
  `parallel` tinyint(1) NOT NULL,
  `type` enum('ئێواران','بەیانیان') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `code`, `passcode`, `name`, `part`, `send`, `parallel`, `type`) VALUES
(1, 12345, 12345, 'رەسەن کاوە چیا', 'پەرستاری', 'yes', 1, 'بەیانیان'),
(3, 533203, 533203, 'زانا رەوا کوردۆ', 'تەکنەلۆجیای زانیاری', 'no', 0, 'بەیانیان'),
(4, 123, 123, 'زارە بەهرەم ئەبدوللا', 'لەدایکبوون', 'yes', 1, 'ئێواران'),
(5, 321, 321, 'سارا باوەر بیرهات', 'کارگێری', 'yes', 0, 'بەیانیان'),
(6, 111, 111, 'پەیام کەمال بابان', 'شیکاری نەخۆشیەکان', 'yes', 1, 'ئێواران'),
(7, 222, 222, 'دارا رێبوار رەشید', 'لەدایکبوون', 'yes', 0, 'بەیانیان'),
(8, 333, 333, 'موسلیم فاخر', 'تەکنەلۆجیای زانیاری', 'yes', 1, 'بەیانیان'),
(9, 444, 444, 'ئارمان رەحیم سادق', 'تەکنەلۆجیای زانیاری', 'yes', 0, 'ئێواران'),
(10, 555, 555, 'سۆزان ماهیر مستەفا', 'لەدایکبوون', 'no', 1, 'بەیانیان'),
(11, 666, 666, 'جەبار مستەفا کردۆ', 'شیکاری نەخۆشیەکان', 'no', 1, 'بەیانیان'),
(12, 777, 777, 'زریان سیداد جبرایل', 'پەرستاری', 'no', 0, 'ئێواران'),
(13, 888, 888, 'هونەر ئاکرەم یاسین', 'شیکاری نەخۆشیەکان', 'no', 0, 'ئێواران'),
(14, 999, 999, 'ئایە کاروان محمد', 'شیکاری نەخۆشیەکان', 'no', 0, 'بەیانیان');

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id` int(255) NOT NULL,
  `part` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `part`) VALUES
(2, 'تەکنەلۆجیای زانیاری'),
(3, 'لەدایکبوون'),
(4, 'پەرستاری'),
(6, 'کارگێری'),
(7, 'شیکاری نەخۆشیەکان'),
(8, 'دەروناسی');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
