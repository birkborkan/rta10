-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 03, 2019 at 09:03 AM
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
  `odate` date DEFAULT NULL,
  `sno` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cus_order`
--

INSERT INTO `cus_order` (`oid`, `oname`, `oitem`, `optype`, `omethod`, `oqty`, `oprice`, `odate`, `sno`) VALUES
(49, 'Ø¹Ù…Ø¯Ø© Ø³Ù„ÙŠÙ…Ø§Ù†', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 20, 17000, '2019-06-26', 49),
(73, 'Ø·ÙŠÙÙˆØ±', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 2, 1700, '2019-06-28', 49),
(51, 'Ø¹Ù…Ø± ØªØ³Ø§Ø¨ÙŠØ­', '50ÙƒØª', 'ØªØ¬Ø§Ø±ÙŠ', 'ÙƒØ§Ø´', 10, 15000, '2019-06-26', 53),
(121, 'Ø¹Ù…Ø¯Ø© Ø³Ù„ÙŠÙ…Ø§Ù†', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 2, 1700, '2019-08-31', 49),
(61, 'Ø§Ù„Ù‡Ø§Ø¯ÙŠ', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 45, 38250, '2019-06-26', 49),
(62, 'Ø§Ù„Ù‡Ø§Ø¯ÙŠ', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 40, 34000, '2019-06-28', 49),
(68, 'Ø§Ù„Ù‡Ø§Ø¯ÙŠ', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 55, 46750, '2019-06-28', 49),
(69, 'Ø¨ÙˆÙŠ', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 112, 95200, '2019-06-28', 49),
(70, 'Ø¹Ù…Ø¯Ø© Ø³Ù„ÙŠÙ…Ø§Ù†', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 300, 255000, '2019-06-28', 49),
(71, 'Ø¹Ù…Ø± ØªØ³Ø§Ø¨ÙŠØ­', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 93, 79050, '2019-06-28', 49),
(114, 'Ø¹Ù…Ø±', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 10, 8500, '2019-08-30', 49),
(115, 'fff', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 1, 850, '2019-08-31', 49),
(116, 'Ù…Ø­Ù…Ø¯ Ø¹Ø¨Ø¯Ø§Ù„Ù„Ù‡', 'Ø¨ÙƒØª10Ùƒ', 'ØªØ¬Ø§Ø±ÙŠ', 'ÙƒØ§Ø´', 100, 40000, '2019-08-31', 59),
(117, 'Ø«', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 1, 850, '2019-08-31', 49),
(118, 'Ø§Ø­Ù…Ø¯ Ù…Ø­Ù…Ø¯ Ø§Ø¨ÙƒØ±', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 2, 1700, '2019-08-31', 49),
(119, 'Ø¹Ù…Ø¯Ø© Ø³Ù„ÙŠÙ…Ø§Ù†', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 2, 1700, '2019-08-31', 49),
(120, 'Ø¹Ù…Ø¯Ø© Ø³Ù„ÙŠÙ…Ø§Ù†', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 2, 1700, '2019-08-31', 49),
(88, 'Ù…Ø­Ù…Ø¯ Ø¨ÙˆÙŠ', 'Ø¨ÙƒØª10Ùƒ', 'ØªØ¬Ø§Ø±ÙŠ', 'ÙƒØ§Ø´', 30, 12000, '2019-07-04', 50),
(89, 'Ø§Ø¯Ù…  Ø§Ø¨Ùˆ Ø¹Ù…Ø±', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 10, 8500, '2019-07-09', 49),
(91, 'ÙƒÙ…Ø§Ù„', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 2, 1700, '2019-07-09', 49),
(92, 'Ø§Ù„Ù‡Ø§Ø¯ÙŠ Ø¹Ù…Ø±', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 3, 7650, '2019-07-09', 49),
(122, 'Ø¹Ù…Ø¯Ø© Ø³Ù„ÙŠÙ…Ø§Ù†', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 2, 1700, '2019-08-31', 49),
(99, 'Ø§Ø­Ù…Ø¯ Ù…Ø­Ù…Ø¯', 'Ø¨ÙƒØª10Ùƒ', 'ØªØ¬Ø§Ø±ÙŠ', 'ÙƒØ§Ø´', 50, 20000, '2019-07-13', 59),
(100, 'Ø¨Ø§Ø±Ù‚ÙŠ', 'Ø¨ÙƒØª10Ùƒ', 'ØªØ¬Ø§Ø±ÙŠ', 'ÙƒØ§Ø´', 10, 4000, '2019-07-13', 59),
(101, 'ahmed ali', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 1, 850, '2019-07-30', 49),
(102, 'Ø§Ø­Ù…Ø¯ Ø¹Ù„ÙŠ  Ø¹Ø¨Ø¯Ø§Ù„ÙƒØ±ÙŠÙ… Ø¹Ø¨Ø¯Ø§Ù„Ù„Ù‡', '25Ùƒ', 'ØªØ¬Ø§Ø±ÙŠ', 'ÙƒØ§Ø´', 6, 4920, '2019-07-31', 49),
(123, 'Ø¹Ø¨Ø¯Ø§Ù„Ù„Ù‡  Ø³Ù…Ø¨Ùˆ', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 2, 1700, '2019-08-31', 49),
(124, 'Ø·ÙŠÙÙˆØ±', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 1, 850, '2019-08-31', 49),
(125, 'Ø·ÙŠÙÙˆØ±', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 1, 850, '2019-09-01', 49),
(126, 'Ø·ÙŠÙÙˆØ±', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 1, 850, '2019-09-01', 49),
(127, 'Ø·ÙŠÙÙˆØ±', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 1, 850, '2019-09-01', 49),
(128, 'Ø·ÙŠÙÙˆØ±', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 1, 850, '2019-09-01', 49),
(129, 'Ø·ÙŠÙÙˆØ±', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 1, 850, '2019-09-01', 49),
(130, 'Ø·ÙŠÙÙˆØ±', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 1, 850, '2019-09-01', 49),
(131, 'Ø¹Ø¨Ø¯Ø§Ù„Ù„Ù‡  Ø³Ù…Ø¨Ùˆ', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 2, 1700, '2019-09-01', 49),
(162, 'Ø§Ø­Ù…Ø¯', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', '3ÙƒØ§Ø´', 20, 17000, '2019-09-11', 49),
(163, 'ÙŠØ§Ø³Ø±', 'Ø¨ÙƒØª10Ùƒ', 'ØªØ¬Ø§Ø±ÙŠ', 'Ø´ÙŠÙƒ', 10, 4000, '2019-09-12', 59),
(164, 'Ø§Ù„ØµØ§Ø¯Ù‚ Ø¹Ø¨Ø¯Ø§Ù„ÙƒØ±ÙŠÙ…', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'Ø´ÙŠÙƒ', 60, 51000, '2019-09-12', 49),
(165, 'Ø¬Ù„Ø§Ù„', 'Ø¨ÙƒØª10Ùƒ', 'ØªØ¬Ø§Ø±ÙŠ', 'Ø´ÙŠÙƒ', 100, 40000, '2019-09-12', 59),
(166, 'Ø¨ÙŠØ±Ùƒ', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', '3ÙƒØ§Ø´', 9, 7650, '2019-09-16', 49),
(167, 'Rabaa', 'Ø¨ÙƒØª10Ùƒ', 'ØªØ¬Ø§Ø±ÙŠ', '3ÙƒØ§Ø´', 70, 28000, '2019-09-16', 59),
(168, 'ahmed', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', '3ÙƒØ§Ø´', 10, 8500, '2019-09-16', 49),
(169, 'ÙŠØ¹Ù‚ÙˆØ¨ Ø§Ø¨ÙƒØ±', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', '3ÙƒØ§Ø´', 10, 8500, '2019-09-17', 49),
(171, 'Ø­Ø§ÙØ¸ Ø¨Ø´Ø§Ø±Ø© Ù…Ø­Ù…Ø¯ Ù‚Ø§Ø¯Ù…', 'Ø¨ÙƒØª10Ùƒ', 'ØªØ¬Ø§Ø±ÙŠ', '3ÙƒØ§Ø´', 10, 4000, '2019-09-18', 59),
(172, 'Asim', '50Ùƒ', 'Ù…Ø¯Ø¹ÙˆÙ…', 'ÙƒØ§Ø´', 20, 17000, '2019-09-26', 49),
(173, 'بيرك', 'بكت10ك', 'تجاري', 'كاش', 20, 8000, '2019-10-24', 59);

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
(38, 'احمد محمد', ' 24455 ', ' داتا انتري', 9000, '2019-11-14');

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
  `hsub` int(11) NOT NULL,
  `newqty` int(30) NOT NULL,
  `ldate1` date NOT NULL,
  `ldate2` date NOT NULL,
  `hdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`hid`, `sid`, `eid`, `cno`, `dname`, `pname`, `ptype`, `oldqty`, `pqty`, `hsub`, `newqty`, `ldate1`, `ldate2`, `hdate`) VALUES
(61, 0, 0, '', '', 'خميرة', '', 8400, 3000, 0, 11400, '0000-00-00', '0000-00-00', '2019-10-31 16:55:27'),
(62, 0, 0, '', '', 'خميرة', '', 11400, 3000, 0, 14400, '0000-00-00', '0000-00-00', '2019-10-31 09:05:14'),
(63, 0, 0, '', '', '50ك', '', 27006400, 9000000, 0, 36006400, '0000-00-00', '0000-00-00', '2019-10-31 09:05:16'),
(64, 0, 0, '', '', 'خميرة', '', 12000, 600, 0, 12600, '0000-00-00', '0000-00-00', '2019-10-31 09:07:36'),
(65, 0, 0, '', 'omer', '50ك', 'مدعوم', 200, 1200, 0, 1400, '2019-10-01', '2019-10-31', '2019-11-01 04:23:58'),
(66, 0, 0, '', 'تامر', '50ك', 'مدعوم', 200, 1000, 0, 1200, '2019-10-05', '2019-10-31', '2019-11-01 05:07:13'),
(67, 0, 0, '', 'الهادي', '50ك', 'مدعوم', 200, 1500, 0, 1700, '2019-10-19', '2019-10-30', '2019-11-01 05:13:06'),
(68, 0, 0, '', 'الهادي', '50ك', 'مدعوم', 200, 1500, 0, 1700, '2019-10-19', '2019-10-30', '2019-11-01 05:13:16'),
(69, 0, 0, '12ج د', 'الهادي', '50ك', 'مدعوم', 200, 1500, 0, 1700, '2019-10-19', '2019-10-30', '2019-11-01 05:13:49'),
(70, 0, 0, '12ج د', 'الهادي', '50ك', 'مدعوم', 200, 1500, 0, 1700, '2019-10-19', '2019-10-30', '2019-11-01 05:14:52'),
(71, 0, 0, '6862 ج د', 'كمال عمر', '50ك', 'مدعوم', 1400, 1200, 0, 2600, '2019-10-29', '2019-10-30', '2019-11-02 06:39:30'),
(72, 0, 0, '121 ج ك', 'احمد عباس', 'خميرة', 'تجاري', 12000, 3000, 0, 15000, '2019-10-25', '2019-10-31', '2019-11-02 06:48:42'),
(73, 0, 0, '540 ', 'الهادي عمر', 'بكت10ك', 'تجاري', 0, 1500, 0, 1500, '2019-11-01', '2019-11-02', '2019-11-02 07:10:55'),
(74, 0, 0, '6862 ج د', 'كمال عمر', 'خميرة', 'تجاري', 15000, 600, 0, 15600, '2019-10-02', '2019-10-31', '2019-11-02 07:24:31'),
(75, 0, 0, 'kk98', 'mnal', '50ك', 'مدعوم', 1400, 9000000, 0, 9001400, '2019-10-25', '2019-10-31', '2019-11-03 05:17:07'),
(76, 0, 0, '131 ج د', 'كمال عمر محمد', '25ك', 'تجاري', 0, 1200, 0, 1200, '2019-11-08', '2019-11-02', '2019-11-03 05:17:24'),
(77, 0, 0, '122', 'ali', 'خميرة', 'تجاري', 15600, 297, 0, 15897, '0000-00-00', '2019-11-03', '2019-11-03 07:18:17');

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
  `uper` int(1) NOT NULL,
  `ustatus` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `ufname`, `uphone`, `uname`, `upass`, `uper`, `ustatus`) VALUES
(4, 'ahmed mohamed abbaker', '0914584929', 'amas', 'abc', 1, 1),
(6, 'omer mohamed', '23423', 'omer', '111', 2, 1),
(16, 'omer mohamed', '23423', 'omr', '123', 2, 0),
(17, 'mubrak', '0000', 'mo', '12345', 2, 0),
(18, 'ÙŠØ§Ø³Ø±', '11111', 'yaser', 'y123', 2, 0),
(19, 'Ø§Ù„ØµØ§Ø¯Ù‚ ØºØ¨Ø¯Ø§Ù„ÙƒØ±ÙŠÙ…', '1111', 'sadig', '2727', 2, 1),
(20, 'Ø¬Ù„Ø§Ù„', '09123', 'jal', '12345', 2, 0),
(21, 'Ù…Ø­Ù…Ø¯ Ø¹Ù„ÙŠ', '11111', 'moh', '123', 2, 0),
(22, 'Ø¨ÙŠØ±Ùƒ', '11111', 'birk', 'b123', 2, 1),
(23, 'Ø§Ù„ÙŠØ§Ø³ Ø§Ù„Ø²ÙŠÙ†', '0000', 'eias', 'e123', 1, 1),
(24, 'Ø­Ø³Ø¨Ùˆ Ø¹Ø¨Ø¯Ø§Ù„Ù„Ù‡', '091', 'has', 'h123', 2, 1),
(25, 'Ø³Ø§Ø±Ø© ÙƒÙ…Ø§Ù„', '0000', 'sara', '5683', 1, 1);

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
(21, 38, 9000, 3, '2019-11-01');

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
(104, 'بكت10ك', 'تجاري', 1500, 100, 0, 0, '0000-00-00'),
(103, '25ك', 'تجاري', 1200, 850, 0, 0, '2019-10-02'),
(102, '50كت', 'تجاري', 0, 850, 0, 0, '2019-10-25'),
(101, '50ك', 'مدعوم', 9001400, 800, 0, 0, '2019-10-31'),
(108, 'خميرة', 'تجاري', 15897, 1000, 0, 0, '2019-10-31');

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
(94, 101, 'ahmed', '122', 'ali', '50ك', 100, 'مدعوم', 70000, 4000, 2000, 100, 76100, '2019-11-07', 1, ''),
(95, 101, 'ahmed', '122', 'ali', '50ك', 120, 'مدعوم', 50000, 4000, 2000, 150, 56150, '0000-00-00', 1, ''),
(96, 101, 'ahmed', '122', 'ali', '50ك', 200, 'مدعوم', 80000, 4500, 2500, 170, 87170, '2019-11-09', 0, ''),
(97, 108, 'ahmed', '122', 'ali', 'خميرة', 200, 'تجاري', 80000, 4500, 2500, 170, 87170, '2019-11-09', 0, ''),
(98, 108, 'ahmed', '122', 'ali', 'خميرة', 300, 'تجاري', 15000, 5000, 2500, 170, 22670, '0000-00-00', 1, ''),
(99, 104, 'محمد ادم', '5455', 'علي ابراهيم', 'بكت10ك', 1200, 'تجاري', 5000, 500, 200, 10, 5710, '0000-00-00', 1, '');

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
(94, 101, 'ali', '122', '50ك', 'مدعوم', 100, 2, 70000, 76100, 300, 78400, 0, 68000, '2019-11-07', '2019-11-03', '0'),
(95, 101, 'ali', '122', '50ك', 'مدعوم', 120, 3, 50000, 56150, 170, 93600, 0, 12720, '0000-00-00', '2019-11-03', '0'),
(98, 108, 'ali', '122', 'خميرة', 'تجاري', 300, 3, 15000, 22670, 180, 297000, 259150, 0, '0000-00-00', '2019-11-03', '1'),
(99, 104, 'علي ابراهيم', '5455', 'بكت10ك', 'تجاري', 1200, NULL, 5000, 5710, 0, 120000, 109290, 0, '0000-00-00', '2019-11-03', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cus_order`
--
ALTER TABLE `cus_order`
  ADD PRIMARY KEY (`oid`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cus_order`
--
ALTER TABLE `cus_order`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `eid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `imp_test`
--
ALTER TABLE `imp_test`
  MODIFY `did` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `store_exp`
--
ALTER TABLE `store_exp`
  MODIFY `eid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
