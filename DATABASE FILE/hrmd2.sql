-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 13, 2022 at 01:11 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hostel` varchar(4) DEFAULT NULL,
  `up_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `hostel`, `up_time`) VALUES
(1, 'Lalit Mohanani', 'Lalit', '21cs02006@iitbbs.ac.in', 'MHR', 'May, Saturday, 05:24 pm'),
(1, 'hv789', 'Harsha Vardhan', '21ec01010@iitbbs.ac.in', 'GHR', 'MAY 5TH ');

-- --------------------------------------------------------

--
-- Table structure for table `cmp_log`
--

CREATE TABLE `cmp_log` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone no` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `complain` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_no` int NOT NULL,
  `nameOfHostel` varchar(100) NOT NULL,
  `CategoryOfIssue` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `availability` varchar(100) NOT NULL,
  `visibility` varchar(100) NOT NULL,
  `remark` varchar(300) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmp_log`
--

INSERT INTO `cmp_log` (`id`, `name`, `email`, `phone no`, `complain`, `ref_no`, `nameOfHostel`, `CategoryOfIssue`, `address`, `availability`, `visibility`, `remark`) VALUES
(1, 'Demo', 'demo@demo.com', '7854125400', 'Test1 with demo', 1747926, 'BHR', 'Food', 'B-404', 'Night (20:00 - 00:00)', 'Public', NULL),
(2, 'Liam Johnson', 'liam@gmail.com', '8520001269', 'Dear Sir/Madam, I\'ve recently ordered a new pair of soccer cleats (item #69694582) from your website last week (May 7th). I received the order on May 10th, but unfortunately when I opened it, I saw that the cleats were used. Cleats were dirty enough and there was a small tear in front part where the', 1845767, 'MHR', 'Cleanliness', 'B-404', 'Morning (6:00 - 11:59)', 'Public', NULL),
(3, 'Erma Anderson', 'erma@gmail.com', '1547800002', 'I am disappointed with your company\'s service because the provided service was much unsatisfactory as . . . . . . . . . . . . . . . .', 689799, 'GHR', 'Electricity', 'B-404', 'Afternoon (12:00 - 16:00)', 'Public', NULL),
(4, 'Jamie Morgan', 'jamie@gmail.com', '3540002158', 'Dear Sir/Madam, On May 10th I enrolled in a debt repayment plan with company. The purpose of the repayment plan was to help me repay my debts quickly and efficiently. Company\'s fee structure of explanation of fee structure is excessive and not in the best interest of the client. These fees were not ', 2993246, 'SHR', 'Broken Items', 'B-404', 'Evening (16:00 - 20:00)', 'Public', NULL),
(5, 'George Carlson', 'george@gmail.com', '3450002547', 'Dear Sir/Madam, I bought an item (#ASTRO58_D7) last week, I\'ve also attached a copy of my receipt for your kind information. I\'m writing to you because the service was not carried out with necessary skill, care and diligence. Used materials were not of merchantable quality. I also rang and spoke to ', 1018191, 'RHR', 'Internet Issue', 'B-404', 'Night (20:00 - 00:00)', 'Public', NULL),
(6, 'LALIT LALCHAND MOHANANI', '21cs02006@iitbbs.ac.in', '1234567890', 'test', 3416120, 'MHR', 'Electricity', 'B-404', 'Afternoon (12:00 - 16:00)', 'Public', ''),
(7, 'Test Test', 'coding830test@gmail.com', '1231256789', 'Net nhi chal rha  hai', 159409, 'BHR', 'Other', 'B-212', 'Morning (6:00 - 11:59)', 'Public', ''),
(8, 'LALIT LALCHAND MOHANANI', '21cs02006@iitbbs.ac.in', '1234567890', 'test 2231', 1990336, 'MHR', 'Electricity', 'B-404', 'Evening (16:00 - 20:00)', 'Public', ''),
(9, 'Test Test', 'coding830test@gmail.com', '565656', 'dsfdsfsdf', 3052919, 'Choose...', 'Choose...', 'fsdfsd', 'Afternoon (12:00 - 16:00)', 'Private', ''),
(10, 'SHASHWAT SINGH', '20me02039@iitbbs.ac.in', '7985417601', 'Wifi router not working', 1212303, 'BHR', 'Internet Issue', 'A-521', 'Evening (16:00 - 20:00)', 'Private', 'Jaldi hi thik kar denge ham'),
(11, 'LALIT LALCHAND MOHANANI', '21cs02006@iitbbs.ac.in', '831565856', 'zindagi jhand hai', 3738178, 'BHR', 'Internet Issue', '123', 'Afternoon (12:00 - 16:00)', 'Private', ''),
(12, 'HARSHA VARDHAN', '21ec01010@iitbbs.ac.in', '1234567890', 'Slow internet hai yaar... Thik karo jaldi.', 857341, 'BHR', 'Internet Issue', 'B-413', 'Night (20:00 - 00:00)', 'Public', 'Jaldi hi thik kar denge ham'),
(13, 'KANKANALA SIVA SAI AMRUTHA', '21cs02005@iitbbs.ac.in', '6300857597', ' pantry rooms are closed. Please open those.', 1747219, 'GHR', 'Other', 'A-230', 'Choose...', 'Private', 'sure I will open It'),
(14, 'BANDARU YASWANTH SAI SAKETH PATRUDU', '21ec01038@iitbbs.ac.in', '4825878665', 'Wifi not working ', 707782, 'BHR', 'Internet Issue', 'B-492', 'Afternoon (12:00 - 16:00)', 'Public', 'I will resolve '),
(15, 'AKSHIT DUDEJA', '21cs01026@iitbbs.ac.in', '1234567890', 'Bhai kya karega complain jaanke.....kuch nahi ho sakta iss college ka...tum bhi job chor do', 2908218, 'BHR', 'Internet Issue', '229', 'Night (20:00 - 00:00)', 'Private', 'fuck off'),
(16, 'SUBHRANSU PRIYARANJAN NAYAK', '21me02007@iitbbs.ac.in', '7846860041', 'No oight', 1826471, 'BHR', 'Electricity', 'B-624', 'Morning (6:00 - 11:59)', 'Private', 'kabhi solve nahi hongi'),
(17, 'SAGNIK BASU', '21cs02004@iitbbs.ac.in', '9433238041', 'Light in balcony does not work. Please check ASAP....', 3720414, 'BHR', 'Electricity', 'B-403', 'Evening (16:00 - 20:00)', 'Private', 'bhag bhosdike'),
(18, 'LALIT LALCHAND MOHANANI', '21cs02006@iitbbs.ac.in', '1234567890212', 'test emoji 🥲', 2985423, 'BHR', 'Broken Items', 'B-404', 'Afternoon (12:00 - 16:00)', 'Private', ''),
(19, 'KANKANALA SIVA SAI AMRUTHA', '21cs02005@iitbbs.ac.in', '6300857597', 'No complaint 😂', 1189692, 'GHR', 'Other', 'A-230', 'Night (20:00 - 00:00)', 'Private', 'timepass'),
(20, 'NISCHAL SONI', 'sn329@iitbbs.ac.in', '7597103641', 'hello', 1118597, 'MHR', 'Electricity', 'B-214', 'Evening (16:00 - 20:00)', 'Public', ''),
(21, 'NISCHAL SONI', 'sn329@iitbbs.ac.in', '7597103641', 'hhhh', 3417068, 'BHR', 'Internet Issue', 'B-214', 'Afternoon (12:00 - 16:00)', 'Public', ''),
(22, 'AKSHAT RAMPURIA', '20CS02013@iitbbs.ac.in', '546345634634', 'kgyjgyh', 3086658, 'BHR', 'Cleanliness', 'ghch', 'Afternoon (12:00 - 16:00)', 'Public', ''),
(23, 'HARSHA VARDHAN', '21ec01010@iitbbs.ac.in', '1234567890', 'Jfgh', 1807405, 'BHR', 'Internet Issue', 'B-413', 'Night (20:00 - 00:00)', 'Private', ''),
(24, 'LALIT LALCHAND MOHANANI', '21cs02006@iitbbs.ac.in', '23687126738', 'Fuck off', 1631521, 'BHR', 'Broken Items', 'B-404', 'Night (20:00 - 00:00)', 'Private', 'You Fuck Off'),
(25, 'HARSHA VARDHAN', '21ec01010@iitbbs.ac.in', '1234567890', 'Depression mei hun...', 2255584, 'BHR', 'Other', 'B-413', 'Night (20:00 - 00:00)', 'Public', '');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `ref_no` varchar(20) NOT NULL,
  `status` int DEFAULT '1',
  `time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`ref_no`, `status`, `time`) VALUES
('1747926', 1, '2022-08-20 15:27:38'),
('1845767', 2, '2022-08-20 15:27:38'),
('689799', 1, '2022-08-20 15:27:38'),
('2993246', 2, '2022-08-20 15:27:38'),
('1018191', 1, '2022-08-20 15:27:38'),
('3416120', 4, '2022-10-15 07:47:33'),
('159409', 1, '2022-10-18 00:00:00'),
('1990336', 1, '2022-10-18 00:00:00'),
('3052919', 1, '2022-10-18 00:00:00'),
('1212303', 1, '2022-10-18 00:00:00'),
('3738178', 1, '2022-10-18 00:00:00'),
('857341', 1, '2022-10-18 00:00:00'),
('1747219', 1, '2022-10-18 00:00:00'),
('707782', 0, '2022-10-15 17:27:29'),
('2908218', 4, '2022-10-16 12:04:01'),
('1826471', 0, '2022-10-17 15:48:43'),
('3720414', 0, '2022-10-17 16:03:49'),
('2985423', 1, '2022-10-19 00:00:00'),
('1189692', 1, '2022-10-21 00:00:00'),
('1118597', 1, '2022-10-27 00:00:00'),
('3417068', 1, '2022-11-03 00:00:01'),
('3086658', 1, '2022-11-03 00:00:01'),
('1807405', 1, '2022-11-05 14:22:10'),
('1631521', 2, '2022-11-11 13:55:32'),
('2255584', 1, '2022-11-11 14:01:48');

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`webnduser`@`%` EVENT `daily_update` ON SCHEDULE EVERY 1 DAY STARTS '2022-10-15 00:00:00' ON COMPLETION PRESERVE DISABLE DO UPDATE hostel_db.stats SET status=status+1,time=now() WHERE time>= NOW() - INTERVAL 7*24 HOUR AND status in (1,2)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
