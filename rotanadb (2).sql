-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2019 at 03:58 PM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rotanadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cus_order`
--

CREATE TABLE `cus_order` (
  `oid` int(11) NOT NULL,
  `oname` varchar(100) NOT NULL,
  `oitem` varchar(20) NOT NULL,
  `optype` varchar(20) NOT NULL,
  `omethod` varchar(30) DEFAULT NULL,
  `oqty` int(11) NOT NULL,
  `oprice` int(30) DEFAULT NULL,
  `odate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sno` int(15) NOT NULL,
  `fatora_no` varchar(255) NOT NULL,
  `mjmoo` varchar(200) NOT NULL,
  `sw` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cus_order`
--

INSERT INTO `cus_order` (`oid`, `oname`, `oitem`, `optype`, `omethod`, `oqty`, `oprice`, `odate`, `sno`, `fatora_no`, `mjmoo`, `sw`) VALUES
(275, 'محمد بوي', '25ك', 'تجاري', NULL, 5, 850, '2019-11-16 11:15:34', 103, 'RT133071667', '4250', 1),
(266, 'omer', 'بكت10ك', 'تجاري', NULL, 3, 100, '2019-11-14 13:41:35', 104, 'RT133043545', '300', 1),
(264, 'بيرك', 'بكت10ك', 'تجاري', NULL, 2, 100, '2019-11-14 13:41:01', 104, 'RT133027404', '200', 1),
(276, 'محمد بوي', '50ك', 'مدعوم', NULL, 4, 800, '2019-11-16 11:15:48', 101, 'RT133071667', '3200', 1),
(269, 'ali', 'بكت10ك', 'تجاري', NULL, 1, 100, '2019-11-14 13:42:04', 104, 'RT133012130', '100', 1),
(270, 'حسبو', '50ك', 'مدعوم', NULL, 10, 800, '2019-11-14 15:52:27', 101, 'RT133054937', '8000', 1),
(271, 'ala', '50ك', 'مدعوم', NULL, 2, 800, '2019-11-15 04:07:59', 101, 'RT133072265', '1600', 1),
(277, 'بيرك', '25ك', 'تجاري', NULL, 2, 850, '2019-11-17 06:28:08', 103, 'RT13305679', '1700', 1),
(278, 'بيرك', '50ك', 'مدعوم', NULL, 1, 800, '2019-11-17 06:29:01', 101, 'RT13305679', '800', 1),
(279, 'ala', '50ك', 'مدعوم', NULL, 2, 800, '2019-11-17 06:31:50', 101, 'RT133071398', '1600', 1),
(280, 'بيرك', '50ك', 'مدعوم', NULL, 5, 800, '2019-11-17 06:48:27', 101, 'RT133059823', '4000', 1),
(281, 'ah', '50ك', 'مدعوم', NULL, 2, 800, '2019-11-17 06:52:08', 101, 'RT133016259', '1600', 1),
(282, 'ah', '50ك', 'مدعوم', NULL, 2, 800, '2019-11-17 06:53:48', 101, 'RT133016259', '1600', 1),
(284, 'احمد علي احمد', '50ك', 'مدعوم', NULL, 8, 800, '2019-11-17 06:58:49', 101, 'RT1330326', '6400', 1),
(285, 'محمد محمود عبدالله', '50ك', 'مدعوم', NULL, 12, 800, '2019-11-17 12:12:19', 101, 'RT133093579', '9600', 1),
(286, 'هارون', '50ك', 'مدعوم', NULL, 2, 800, '2019-11-17 12:39:49', 101, 'RT133037557', '1600', 1),
(287, 'هارون', 'خميرة', 'تجاري', NULL, 2, 1000, '2019-11-17 12:39:53', 108, 'RT133037557', '2000', 1),
(289, 'ابراهيم ادم علي موسى', '50ك', 'مدعوم', NULL, 3, 800, '2019-11-17 14:23:19', 101, 'RT133044863', '2400', 1),
(291, 'جلال عبدالله', '10ك', 'تجاري', NULL, 3, 300, '2019-11-17 14:33:03', 116, 'RT133070025', '900', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cus_order_money`
--

CREATE TABLE `cus_order_money` (
  `id` int(11) NOT NULL,
  `custom_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_fatora_no` varchar(200) DEFAULT NULL,
  `custom_money` varchar(200) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cus_order_money`
--

INSERT INTO `cus_order_money` (`id`, `custom_name`, `custom_fatora_no`, `custom_money`, `date`) VALUES
(162, 'بيرك', 'RT133077871', ' 2750', '2019-11-14 13:29:37'),
(163, 'بيرك', 'RT133027404', '200', '2019-11-14 13:41:17'),
(164, 'omer', 'RT133043545', '300', '2019-11-14 13:41:42'),
(165, 'ali', 'RT133012130', '900', '2019-11-14 13:42:05'),
(166, 'حسبو', 'RT133054937', ' 8000', '2019-11-14 15:52:33'),
(167, 'حسبو', 'RT133054937', ' 8000', '2019-11-14 15:52:54'),
(168, 'ala', 'RT133072265', ' 1600', '2019-11-15 04:08:13'),
(169, 'محمد بوي', 'RT133071667', ' 7450', '2019-11-16 11:15:52'),
(170, 'بيرك', 'RT13305679', ' 1700', '2019-11-17 06:28:53'),
(171, 'بيرك', 'RT13305679', ' 2500', '2019-11-17 06:29:07'),
(172, 'بيرك', 'RT13305679', ' 2500', '2019-11-17 06:31:27'),
(173, 'ala', 'RT133071398', ' 1600', '2019-11-17 06:31:51'),
(174, 'ala', 'RT133071398', ' 1600', '2019-11-17 06:48:12'),
(175, 'بيرك', 'RT133059823', ' 4000', '2019-11-17 06:48:28'),
(176, 'ah', 'RT133016259', ' 1600', '2019-11-17 06:52:09'),
(177, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:53:50'),
(178, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:55:46'),
(179, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:55:48'),
(180, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:55:49'),
(181, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:55:49'),
(182, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:55:49'),
(183, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:55:49'),
(184, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:55:50'),
(185, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:55:50'),
(186, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:11'),
(187, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:12'),
(188, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:12'),
(189, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:13'),
(190, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:13'),
(191, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:13'),
(192, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:13'),
(193, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:13'),
(194, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:14'),
(195, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:14'),
(196, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:14'),
(197, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:14'),
(198, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:14'),
(199, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:15'),
(200, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:15'),
(201, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:15'),
(202, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:16'),
(203, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:16'),
(204, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:16'),
(205, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:16'),
(206, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:16'),
(207, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:17'),
(208, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:17'),
(209, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:17'),
(210, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:18'),
(211, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:18'),
(212, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:42'),
(213, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:43'),
(214, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:44'),
(215, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:56:44'),
(216, 'ah', 'RT133016259', ' 3200', '2019-11-17 06:57:45'),
(217, 'احمد علي احمد', 'RT1330326', ' 6400', '2019-11-17 06:58:50'),
(218, 'محمد محمود عبدالله', 'RT133093579', ' 9600', '2019-11-17 12:12:26'),
(219, 'هارون', 'RT133037557', ' 3600', '2019-11-17 12:39:55'),
(220, 'ابراهيم ادم علي موسى', 'RT133044863', ' 2400', '2019-11-17 14:26:01'),
(221, 'جلال عبدالله', 'RT133070025', '900', '2019-11-17 14:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `eid` int(10) NOT NULL,
  `ename` varchar(50) DEFAULT NULL,
  `ephone` varchar(15) DEFAULT NULL,
  `ejob` varchar(50) DEFAULT NULL,
  `esal` int(20) DEFAULT NULL,
  `ehdate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`eid`, `ename`, `ephone`, `ejob`, `esal`, `ehdate`) VALUES
(38, 'احمد محمد', ' 24455 ', ' داتا انتري', 9000, '2019-11-14'),
(39, 'محي الدين', '0000', 'سائق', 10000, '2019-10-27'),
(40, 'علي محمد', '0000', 'محاسب', 15000, '2019-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `hid` int(11) NOT NULL,
  `sid` int(30) NOT NULL,
  `eid` int(30) NOT NULL,
  `cno` varchar(50) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `ptype` varchar(30) NOT NULL,
  `oldqty` int(30) NOT NULL,
  `pqty` int(30) NOT NULL,
  `miss` int(20) NOT NULL,
  `hsub` int(11) NOT NULL,
  `newqty` int(30) NOT NULL,
  `ldate1` date NOT NULL,
  `ldate2` date NOT NULL,
  `hdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `haction` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`hid`, `sid`, `eid`, `cno`, `dname`, `pname`, `ptype`, `oldqty`, `pqty`, `miss`, `hsub`, `newqty`, `ldate1`, `ldate2`, `hdate`, `haction`) VALUES
(86, 101, 112, '123 ج د', 'محمد علي', '50ك', 'مدعوم', 23976, 11998, 2, 0, 23974, '2019-11-11', '2019-11-14', '2019-11-15 18:59:37', 'تحديث'),
(87, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1200, 1190, 10, 0, 1190, '2019-11-01', '2019-11-14', '2019-11-15 19:06:54', 'تحديث'),
(88, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1190, 1190, 10, 0, 1180, '2019-11-01', '2019-11-14', '2019-11-15 19:29:56', 'تحديث'),
(89, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1180, 1190, 10, 0, 1170, '2019-11-01', '2019-11-14', '2019-11-15 19:31:14', 'تحديث'),
(90, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1170, 1185, 15, 0, 1155, '2019-11-01', '2019-11-14', '2019-11-15 21:01:28', 'تحديث'),
(91, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1170, 1180, 20, 0, 1150, '2019-11-01', '2019-11-14', '2019-11-15 21:01:48', 'تحديث'),
(92, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1165, 1175, 25, 0, 1140, '2019-11-01', '2019-11-14', '2019-11-15 21:07:07', 'تحديث'),
(93, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1160, 1170, 30, 0, 1160, '2019-11-01', '2019-11-14', '2019-11-15 21:08:28', 'تحديث'),
(94, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1155, 1165, 35, 0, 0, '2019-11-01', '2019-11-14', '2019-11-15 21:14:23', 'تحديث'),
(95, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1150, 1160, 40, 0, 0, '2019-11-01', '2019-11-14', '2019-11-16 07:47:44', 'تحديث'),
(96, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1145, 1155, 45, 0, 1140, '2019-11-01', '2019-11-14', '2019-11-16 07:56:53', 'تحديث'),
(97, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1140, 1170, 30, 0, 1155, '2019-11-01', '2019-11-14', '2019-11-16 07:58:56', 'تحديث'),
(98, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1155, 1200, 35, 0, 1150, '2019-11-01', '2019-11-14', '2019-11-16 10:16:25', 'تحديث'),
(99, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1150, 1200, 35, 0, 1150, '2019-11-01', '2019-11-14', '2019-11-16 10:20:58', 'تحديث'),
(100, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1150, 1200, 35, 0, 1150, '2019-11-01', '2019-11-14', '2019-11-16 10:21:27', 'تحديث'),
(101, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1150, 1200, 35, 0, 1150, '2019-11-01', '2019-11-14', '2019-11-16 10:21:50', 'تحديث'),
(102, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1150, 1200, 35, 0, 1150, '2019-11-01', '2019-11-14', '2019-11-16 10:23:13', 'تحديث'),
(103, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1150, 1200, 35, 0, 1150, '2019-11-01', '2019-11-14', '2019-11-16 10:24:19', 'تحديث'),
(104, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1150, 1200, 35, 0, 1150, '2019-11-01', '2019-11-14', '2019-11-16 10:26:56', 'تحديث'),
(105, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1150, 1200, 35, 0, 1150, '2019-11-01', '2019-11-14', '2019-11-16 10:29:27', 'تحديث'),
(106, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1150, 1200, 35, 0, 1150, '2019-11-01', '2019-11-14', '2019-11-16 10:29:39', 'تحديث'),
(107, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1150, 1200, 35, 0, 1150, '2019-11-01', '2019-11-14', '2019-11-16 10:30:25', 'تحديث'),
(108, 108, 114, '871 ج ك', 'عصام بدر', 'خميرة', 'تجاري', 1150, 1200, 35, 0, 1150, '2019-11-01', '2019-11-14', '2019-11-16 10:37:35', 'تحديث'),
(109, 0, 0, '111 ج ك', 'عبدالله', '10ك', 'تجاري', 0, 1500, 0, 0, 1500, '2019-11-12', '2019-11-17', '2019-11-17 14:07:11', 'ادخال'),
(110, 116, 113, '111 ج ك', 'عبدالله', '10ك', 'تجاري', 1500, 1500, 10, 0, 1500, '2019-11-12', '2019-11-17', '2019-11-17 14:10:59', 'تحديث');

-- --------------------------------------------------------

--
-- Table structure for table `imp_test`
--

CREATE TABLE `imp_test` (
  `did` int(20) NOT NULL,
  `dname` varchar(100) DEFAULT NULL,
  `dphone` varchar(15) DEFAULT NULL,
  `pname` varchar(20) DEFAULT NULL,
  `ptype` varchar(10) DEFAULT NULL,
  `pqty` int(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imp_test`
--

INSERT INTO `imp_test` (`did`, `dname`, `dphone`, `pname`, `ptype`, `pqty`) VALUES
(11, 'aaaa', '', '20Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 0),
(12, 'wwqr', '', '20Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 3),
(13, 'awqr', '', '20Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 434);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uid` int(10) NOT NULL,
  `ufname` varchar(50) DEFAULT NULL,
  `uphone` varchar(20) DEFAULT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `upass` varchar(30) DEFAULT NULL,
  `uper` varchar(30) DEFAULT NULL,
  `ustatus` varchar(30) DEFAULT NULL,
  `udate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `ufname`, `uphone`, `uname`, `upass`, `uper`, `ustatus`, `udate`) VALUES
(4, 'ahmed mohamed abbaker', '0914584929', 'amas', 'abc', '1', '1', '2019-11-06 08:27:17'),
(6, 'omer mohamed', '23423', 'omer', '111', '2', '1', '2019-11-06 08:27:17'),
(16, 'omer mohamed', '23423', 'omr', '123', '2', '0', '2019-11-06 08:27:17'),
(17, 'جلال عبدالله عبدالله', '0000', 'jal', '123', '3', '1', '2019-11-06 08:27:17'),
(18, 'حسبو عبدااله', '11111', 'has', '123', '2', '1', '2019-11-06 08:27:17'),
(19, 'Ø§Ù„ØµØ§Ø¯Ù‚ ØºØ¨Ø¯Ø§Ù„ÙƒØ±ÙŠÙ…', '1111', 'sadig', '2727', '2', '1', '2019-11-06 08:27:17'),
(20, 'Ø¬Ù„Ø§Ù„', '09123', 'jal', '12345', '2', '0', '2019-11-06 08:27:17'),
(21, 'Ù…Ø­Ù…Ø¯ Ø¹Ù„ÙŠ', '11111', 'moh', '123', '2', '0', '2019-11-06 08:27:17'),
(27, 'سلمي يونس', NULL, 'ali', '123', '4', '1', '2019-11-06 08:40:08'),
(29, 'شالوني  شين شالون s', NULL, 'shalony', '12345678', '4', '1', '2019-11-06 09:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(20) NOT NULL,
  `eid` int(20) NOT NULL,
  `esal` int(50) NOT NULL,
  `smonth` int(2) NOT NULL,
  `sdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `eid`, `esal`, `smonth`, `sdate`) VALUES
(10, 3, 12000, 11, '2019-07-16'),
(12, 1, 6000, 5, '2019-07-08'),
(13, 5, 5000, 8, '2019-07-31'),
(2, 4, 0, 8, '2019-07-31'),
(14, 8, 10000, 7, '2019-08-03'),
(15, 9, 12000, 9, '2019-09-10'),
(16, 10, 12000, 9, '2019-09-14'),
(17, 8, 10000, 9, '2019-09-07'),
(18, 35, 1200, 2, '2019-10-09'),
(19, 35, 1500, 2, '2019-10-01'),
(20, 33, 1200, 1, '2019-10-15'),
(21, 38, 9000, 3, '2019-11-01'),
(23, 38, 9000, 1, '2019-11-07'),
(24, 39, 10000, 11, '2019-11-01'),
(25, 39, 10000, 11, '2019-11-01'),
(26, 40, 15000, 11, '2019-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `sno` int(10) NOT NULL,
  `sname` varchar(50) DEFAULT NULL,
  `stype` varchar(10) DEFAULT NULL,
  `sqty` int(10) DEFAULT '0',
  `sprice` int(10) DEFAULT '0',
  `sval` int(10) DEFAULT '0',
  `slval` int(10) DEFAULT '0',
  `sdate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`sno`, `sname`, `stype`, `sqty`, `sprice`, `sval`, `slval`, `sdate`) VALUES
(104, 'بكت10ك', 'تجاري', 0, 100, 0, 0, '0000-00-00'),
(103, '25ك', 'تجاري', 0, 850, 0, 0, '2019-10-02'),
(116, '10ك', 'تجاري', 1497, 300, 0, 0, '0000-00-00'),
(101, '50ك', 'مدعوم', 23933, 800, 0, 0, '2019-10-31'),
(108, 'خميرة', 'تجاري', 1148, 1000, 0, 0, '2019-10-31'),
(109, '1000k', 'مدعوم', 0, 1000, 0, 0, '2019-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `store_exp`
--

CREATE TABLE `store_exp` (
  `eid` int(5) NOT NULL,
  `sid` int(2) NOT NULL,
  `rname` varchar(100) NOT NULL,
  `cno` varchar(50) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `pqty` int(10) NOT NULL,
  `ptype` varchar(10) NOT NULL,
  `bcost` int(11) NOT NULL,
  `dcost` int(20) NOT NULL,
  `lcost` int(20) NOT NULL,
  `manifist` int(30) NOT NULL,
  `tcost` int(30) NOT NULL,
  `ldate` date NOT NULL,
  `arrive` int(2) NOT NULL,
  `comm` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store_exp`
--

INSERT INTO `store_exp` (`eid`, `sid`, `rname`, `cno`, `dname`, `pname`, `pqty`, `ptype`, `bcost`, `dcost`, `lcost`, `manifist`, `tcost`, `ldate`, `arrive`, `comm`) VALUES
(112, 101, 'جمال عمر', '123 ج د', 'محمد علي', '50ك', 12000, 'مدعوم', 500000, 150000, 45000, 20000, 715000, '2019-11-11', 1, ''),
(113, 116, 'خالد', '111 ج ك', 'عبدالله', '10ك', 1500, 'تجاري', 400000, 90000, 45000, 12000, 547000, '2019-11-12', 1, ''),
(114, 108, 'جنيد محمد', '871 ج ك', 'عصام بدر', 'خميرة', 1200, 'تجاري', 4000, 0, 0, 0, 4000, '2019-11-01', 1, ''),
(115, 101, 'الهادي', '55ج د', 'فارس', '50ك', 12000, 'مدعوم', 0, 0, 0, 0, 0, '2019-11-13', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `store_imp`
--

CREATE TABLE `store_imp` (
  `eid` int(30) NOT NULL,
  `sid` int(20) NOT NULL,
  `dname` varchar(100) DEFAULT NULL,
  `cno` varchar(50) NOT NULL,
  `pname` varchar(20) DEFAULT NULL,
  `ptype` varchar(10) DEFAULT NULL,
  `pqty` int(20) DEFAULT NULL,
  `miss` int(10) DEFAULT NULL,
  `pbuy` double DEFAULT NULL,
  `pcost` int(20) DEFAULT NULL,
  `borsa` int(15) NOT NULL,
  `psel` double DEFAULT NULL,
  `ppro` int(20) DEFAULT NULL,
  `plos` int(20) DEFAULT NULL,
  `ldate1` date DEFAULT NULL,
  `ldate2` date DEFAULT NULL,
  `stor` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store_imp`
--

INSERT INTO `store_imp` (`eid`, `sid`, `dname`, `cno`, `pname`, `ptype`, `pqty`, `miss`, `pbuy`, `pcost`, `borsa`, `psel`, `ppro`, `plos`, `ldate1`, `ldate2`, `stor`) VALUES
(112, 101, 'محمد علي', '123 ج د', '50ك', 'مدعوم', 12000, 2, 500000, 715000, 0, 9598400, 8883400, 0, '2019-11-11', '2019-11-14', '1'),
(114, 108, 'عصام بدر', '871 ج ك', 'خميرة', 'تجاري', 1200, 35, 4000, 4000, 12000, 1165000, 1149000, 0, '2019-11-01', '2019-11-14', '1'),
(113, 116, 'عبدالله', '111 ج ك', '10ك', 'تجاري', 1500, 10, 400000, 547000, 0, 447000, 0, 100000, '2019-11-12', '2019-11-17', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tored`
--

CREATE TABLE `tored` (
  `t_id` int(20) NOT NULL,
  `t_amount` int(30) DEFAULT NULL,
  `t_comm` varchar(100) DEFAULT NULL,
  `t_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tored`
--

INSERT INTO `tored` (`t_id`, `t_amount`, `t_comm`, `t_date`) VALUES
(3, 1200, 'بنك النيلين-نيالا', '2019-11-01'),
(4, 47000, 'بنك النيلين-الفاشر-سوق الكبير', '2019-11-30'),
(5, 2000000, 'تحويل لحسابكم بنك البركة- الخرطوم', '2019-11-02'),
(6, 120000, 'توريد لحسابكم لبنك الفرنسي', '2019-11-14'),
(7, 40000, '25ك', '2019-11-14'),
(8, 12000, 'خميرة', '2019-11-01'),
(9, 66000, 'توريد بنك الفرنسي-ام درمان', '2019-11-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cus_order`
--
ALTER TABLE `cus_order`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `cus_order_money`
--
ALTER TABLE `cus_order_money`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `imp_test`
--
ALTER TABLE `imp_test`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `store_exp`
--
ALTER TABLE `store_exp`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `store_imp`
--
ALTER TABLE `store_imp`
  ADD KEY `eid` (`eid`);

--
-- Indexes for table `tored`
--
ALTER TABLE `tored`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cus_order`
--
ALTER TABLE `cus_order`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;
--
-- AUTO_INCREMENT for table `cus_order_money`
--
ALTER TABLE `cus_order_money`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;
--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `eid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `imp_test`
--
ALTER TABLE `imp_test`
  MODIFY `did` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `store_exp`
--
ALTER TABLE `store_exp`
  MODIFY `eid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `tored`
--
ALTER TABLE `tored`
  MODIFY `t_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
