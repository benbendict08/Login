-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 06:57 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `Auth_ID` int(11) NOT NULL,
  `auth_code` int(255) DEFAULT NULL,
  `U_ID` int(11) DEFAULT NULL,
  `code_start` datetime DEFAULT NULL,
  `code_expire` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`Auth_ID`, `auth_code`, `U_ID`, `code_start`, `code_expire`) VALUES
(787, 859459, 7, '2021-05-01 17:11:28', '2021-05-01 17:11:33'),
(788, 651622, 7, '2021-05-01 17:14:09', '2021-05-01 17:14:14'),
(789, 608763, 7, '2021-05-01 17:19:27', '2021-05-01 17:19:32'),
(790, 208105, 7, '2021-05-01 17:23:28', '2021-05-01 17:23:33'),
(791, 618050, 13, '2021-05-01 17:24:22', '2021-05-01 17:24:27'),
(792, 126671, 7, '2021-05-01 17:28:56', '2021-05-01 17:29:01'),
(793, 240784, 7, '2021-05-01 17:29:03', '2021-05-01 17:29:08'),
(794, 980502, 7, '2021-05-01 17:30:55', '2021-05-01 17:31:00'),
(795, 412647, 7, '2021-05-01 17:32:37', '2021-05-01 17:32:42'),
(796, 827843, 7, '2021-05-01 18:24:32', '2021-05-01 18:24:37'),
(797, 844352, 7, '2021-05-01 18:25:53', '2021-05-01 18:25:58'),
(798, 806651, 7, '2021-05-01 18:28:11', '2021-05-01 18:28:16'),
(799, 756558, 7, '2021-05-01 18:33:28', '2021-05-01 18:33:33'),
(800, 938461, 7, '2021-05-01 18:33:42', '2021-05-01 18:33:47'),
(801, 833981, 13, '2021-05-01 18:35:58', '2021-05-01 18:36:03'),
(802, 200197, 13, '2021-05-01 18:37:42', '2021-05-01 18:37:47'),
(803, 397495, 13, '2021-05-01 18:38:00', '2021-05-01 18:38:05'),
(804, 446526, 13, '2021-05-01 18:41:32', '2021-05-01 18:41:37'),
(805, 682627, 13, '2021-05-01 18:44:49', '2021-05-01 18:44:54'),
(806, 335307, 13, '2021-05-01 18:47:40', '2021-05-01 18:47:45'),
(807, 562463, 13, '2021-05-01 18:47:52', '2021-05-01 18:47:57'),
(808, 963239, 7, '2021-05-01 18:49:07', '2021-05-01 18:49:12'),
(809, 595581, 7, '2021-05-01 18:50:07', '2021-05-01 18:50:12'),
(810, 946437, 7, '2021-05-01 18:52:56', '2021-05-01 18:53:01'),
(811, 638088, 7, '2021-05-01 18:53:08', '2021-05-01 18:53:13'),
(812, 108679, 7, '2021-05-01 19:03:09', '2021-05-01 19:03:14'),
(813, 704734, 7, '2021-05-01 19:07:52', '2021-05-01 19:07:57'),
(814, 616787, 7, '2021-05-01 19:08:00', '2021-05-01 19:08:05'),
(815, 385917, 13, '2021-05-01 19:11:14', '2021-05-01 19:11:19'),
(816, 127286, 13, '2021-05-01 19:13:29', '2021-05-01 19:13:34'),
(817, 580712, 7, '2021-05-01 19:19:54', '2021-05-01 19:19:59'),
(818, 327232, 13, '2021-05-01 19:45:07', '2021-05-01 19:45:12'),
(819, 919602, 21, '2021-05-01 19:54:08', '2021-05-01 19:54:13'),
(820, 803423, 21, '2021-05-01 19:59:12', '2021-05-01 19:59:17'),
(821, 389009, 7, '2021-05-01 20:07:07', '2021-05-01 20:07:12'),
(822, 372121, 7, '2021-05-01 20:14:06', '2021-05-01 20:14:11'),
(823, 392286, 7, '2021-05-01 20:26:16', '2021-05-01 20:26:21'),
(824, 749575, 7, '2021-05-01 20:50:29', '2021-05-01 20:50:34'),
(825, 952721, 7, '2021-05-01 20:57:57', '2021-05-01 20:58:02'),
(826, 526504, 7, '2021-05-03 16:59:11', '2021-05-03 16:59:16'),
(827, 588799, 7, '2021-05-03 18:12:19', '2021-05-03 18:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `event_log`
--

CREATE TABLE `event_log` (
  `EID` int(11) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_log`
--

INSERT INTO `event_log` (`EID`, `UID`, `activity`, `date_time`) VALUES
(589, 'benedict', 'login', '2021-05-01 17:54:07'),
(590, 'benedict', 'logout', '2021-05-01 17:59:04'),
(591, 'benedict', 'login', '2021-05-01 17:59:11'),
(592, 'benedict', 'change_pass', '2021-05-01 18:05:21'),
(593, 'admin', 'login', '2021-05-01 18:07:04'),
(594, 'admin', 'change_pass', '2021-05-01 18:07:45'),
(595, 'admin', 'change_pass', '2021-05-01 18:10:15'),
(596, 'admin', 'change_pass', '2021-05-01 18:12:33'),
(597, 'admin', 'logout', '2021-05-01 18:13:52'),
(598, 'admin', 'login', '2021-05-01 18:14:01'),
(599, 'admin', 'change_pass', '2021-05-01 18:14:20'),
(600, 'admin', 'login', '2021-05-01 18:26:14'),
(601, 'admin', 'change_pass', '2021-05-01 18:26:34'),
(602, 'admin', 'change_pass', '2021-05-01 18:29:59'),
(603, 'admin', 'change_pass', '2021-05-01 18:37:56'),
(604, 'admin', 'change_pass', '2021-05-01 18:42:31'),
(605, 'admin', 'change_pass', '2021-05-01 18:43:03'),
(606, 'admin', 'change_pass', '2021-05-01 18:43:43'),
(607, 'admin', 'change_pass', '2021-05-01 18:44:15'),
(608, 'admin', 'logout', '2021-05-01 18:50:22'),
(609, 'admin', 'login', '2021-05-01 18:50:27'),
(610, 'admin', 'change_pass', '2021-05-01 18:50:51'),
(611, 'admin', 'change_pass', '2021-05-01 18:54:58'),
(612, 'admin', 'login', '2021-05-01 18:57:55'),
(613, 'admin', 'change_pass', '2021-05-01 18:58:17'),
(614, 'admin', 'change_pass', '2021-05-01 19:06:12'),
(615, 'admin', 'change_pass', '2021-05-01 19:08:04'),
(616, 'admin', 'change_pass', '2021-05-01 19:08:29'),
(617, 'admin', 'login', '2021-05-03 14:59:08'),
(618, 'admin', 'change_pass', '2021-05-03 15:00:14'),
(619, 'admin', 'change_pass', '2021-05-03 15:06:05'),
(620, 'admin', 'login', '2021-05-03 16:12:17'),
(621, 'admin', 'change_pass', '2021-05-03 16:12:36'),
(622, 'admin', 'logout', '2021-05-03 16:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `U_ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`U_ID`, `username`, `email`, `password`, `create_datetime`) VALUES
(7, 'admin', 'be', 'admin1234', '2021-03-25 02:09:15'),
(12, 'admin2', 'admin@ss.com', '21232f297a57a5a743894a0e4a801fc3', '2021-03-26 03:29:46'),
(13, 'benedict', 'benbendict@gmail.com', 'benedict0', '2021-04-13 10:55:38'),
(21, 'benedict', 'benbendict08@yahoo.com', 'benedict0', '2021-04-26 03:52:36'),
(29, 'ben10', 'bbendict08@gmail.com', '1f10c3073bb46ca5ea9f7adf677d3230', '2021-04-29 02:59:17'),
(30, 'ben20', 'bbendict08@gmail.com', 'ben', '2021-04-29 03:01:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`Auth_ID`);

--
-- Indexes for table `event_log`
--
ALTER TABLE `event_log`
  ADD PRIMARY KEY (`EID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`U_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `Auth_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=828;

--
-- AUTO_INCREMENT for table `event_log`
--
ALTER TABLE `event_log`
  MODIFY `EID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=623;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `U_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authentication`
--
ALTER TABLE `authentication`
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`U_ID`) REFERENCES `users` (`U_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
