-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2018 at 10:31 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bets_converter`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversion_chart`
--

CREATE TABLE `conversion_chart` (
  `ID` int(10) NOT NULL,
  `fractional_odds` varchar(10) NOT NULL,
  `decimal_odds` varchar(10) NOT NULL,
  `moneyline_odds` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `conversion_chart`
--

INSERT INTO `conversion_chart` (`ID`, `fractional_odds`, `decimal_odds`, `moneyline_odds`) VALUES
(1, '1/5', '1.20', '-500'),
(2, '2/9', '1.22', '-450'),
(3, '1/4', '1.25', '-400'),
(4, '2/7', '1.28', '-350'),
(5, '3/10', '1.30', '-333.30'),
(6, '1/3', '1.33', '-300'),
(7, '7/20', '1.35', '-285.70'),
(8, '4/11', '1.36', '-275'),
(9, '2/5', '1.40', '-250'),
(10, '4/9', '1.44', '-225'),
(11, '9/20', '1.45', '-222.20');

-- --------------------------------------------------------

--
-- Table structure for table `input_log`
--

CREATE TABLE `input_log` (
  `id` int(20) NOT NULL,
  `field_value` varchar(10) NOT NULL,
  `field_id` varchar(15) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `input_log`
--

INSERT INTO `input_log` (`id`, `field_value`, `field_id`, `date_created`) VALUES
(2, '1/5', 'fractional_odds', '2018-07-14 18:15:17'),
(3, '-500', 'moneyline_odds', '2018-07-14 18:16:34'),
(4, '-500', 'moneyline_odds', '2018-07-14 18:40:34'),
(5, '-450', 'moneyline_odds', '2018-07-14 18:43:04'),
(6, '-500', 'moneyline_odds', '2018-07-14 18:43:49'),
(7, '-500', 'moneyline_odds', '2018-07-14 18:44:58'),
(8, '-450', 'moneyline_odds', '2018-07-14 18:46:04'),
(9, '1.20', 'any_odds', '2018-07-14 22:14:39'),
(10, '-500', 'moneyline_odds', '2018-07-14 23:15:07'),
(11, '-500', 'moneyline_odds', '2018-07-14 23:23:09'),
(12, '2/9', 'fractional_odds', '2018-07-14 23:23:16'),
(13, '-500', 'moneyline_odds', '2018-07-14 23:25:17'),
(14, '1/5', 'fractional_odds', '2018-07-14 23:27:55'),
(15, '-500', 'moneyline_odds', '2018-07-14 23:28:02'),
(16, '-333.30', 'moneyline_odds', '2018-07-14 23:28:12'),
(17, '1.30', 'any_odds', '2018-07-15 08:47:08'),
(18, '1.22', 'any_odds', '2018-07-15 10:14:13'),
(19, '1.20', 'decimal_odds', '2018-07-15 11:29:47'),
(20, '1.20', 'any_odds', '2018-07-15 11:40:08'),
(21, '1.22', 'decimal_odds', '2018-07-15 12:10:01'),
(22, '1.22', 'any_odds', '2018-07-15 12:10:06'),
(23, '1.20', 'any_odds', '2018-07-15 14:31:28'),
(24, '-450', 'any_odds', '2018-07-15 14:31:37'),
(25, '-500', 'any_odds', '2018-07-15 14:31:41'),
(26, '1.20', 'any_odds', '2018-07-15 14:31:47'),
(27, '1.20', 'decimal_odds', '2018-07-15 14:37:31'),
(28, '1.22', 'any_odds', '2018-07-15 14:37:36'),
(29, '1.22', 'any_odds', '2018-07-15 14:40:41'),
(30, '1.22', 'any_odds', '2018-07-15 14:41:03'),
(31, '1.20', 'decimal_odds', '2018-07-15 14:42:11'),
(32, '1.20', 'any_odds', '2018-07-15 14:42:24'),
(33, '1.22', 'any_odds', '2018-07-15 15:10:50'),
(34, '1.20', 'decimal_odds', '2018-07-15 17:25:42'),
(35, '1.22', 'any_odds', '2018-07-15 17:25:45'),
(36, '1.22', 'decimal_odds', '2018-07-15 17:28:51'),
(37, '1.22', 'any_odds', '2018-07-15 17:38:07'),
(38, '1.22', 'decimal_odds', '2018-07-15 17:45:40'),
(39, '1.30', 'any_odds', '2018-07-15 17:45:52'),
(40, '1.20', 'any_odds', '2018-07-15 18:09:00'),
(41, '1.22', 'decimal_odds', '2018-07-15 19:09:46'),
(42, '1.22', 'decimal_odds', '2018-07-15 19:25:03'),
(43, '1.22', 'any_odds', '2018-07-15 19:25:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversion_chart`
--
ALTER TABLE `conversion_chart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `input_log`
--
ALTER TABLE `input_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversion_chart`
--
ALTER TABLE `conversion_chart`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `input_log`
--
ALTER TABLE `input_log`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
