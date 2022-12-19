-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 02:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrmd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
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
(1, 'hv789', 'Harsha Vardhan', '21ec01010@iitbbs.ac.in', 'GHR', 'MAY 5TH '),
(1, 'hor_RHR', 'Rushikulya Hall of Residence', 'hor.rushikulya@iitbbs.ac.in', 'RHR', 'DEC 13TH '),
(1, 'hor_BHR', 'Brahmaputra Hall of Residence', 'hor.brahmaputra@iitbbs.ac.in', 'BHR', 'DEC 13TH '),
(1, 'hor_GHR', 'Ganga Hall of Residence', 'hor.ganga@iitbbs.ac.in', 'GHR', 'DEC 13TH '),
(1, 'hor_MHR', 'Mahanadi Hall of Residence', 'hor.mahanadi@iitbbs.ac.in', 'MHR', 'DEC 13TH '),
(1, 'hor_SHR', 'Subarnarekha Hall of Residence', 'hor.subarnarekha@iitbbs.ac.in', 'SHR', 'DEC 13TH '),
(2, 'Warden_RHR', 'Warden RHR IIT Bhubaneswar', 'warden.rhr@iitbbs.ac.in', 'RHR', 'DEC 13TH '),
(2, 'Warden_BHR', 'Warden BHR IIT Bhubaneswar', 'warden.bhr@iitbbs.ac.in', 'BHR', 'DEC 13TH '),
(2, 'Warden_MHR', 'Warden MHR IIT Bhubaneswar', 'warden.mhr@iitbbs.ac.in', 'MHR', 'DEC 13TH '),
(2, 'Warden_GHR', 'Warden GHR IIT Bhubaneswar', 'warden.ghr@iitbbs.ac.in', 'GHR', 'DEC 13TH '),
(2, 'Warden_SHR', 'Warden SHR IIT Bhubaneswar', 'warden.shr@iitbbs.ac.in', 'SHR', 'DEC 13TH '),
(2, 'Asst_Warden_RHR', 'Assistant Warden RHR IIT Bhubaneswar', 'asstwarden.rhr@iitbbs.ac.in', 'RHR', 'DEC 13TH '),
(2, 'Asst_Warden_BHR', 'Assistant Warden BHR IIT Bhubaneswar', 'asstwarden.bhr@iitbbs.ac.in', 'BHR', 'DEC 13TH '),
(2, 'Asst_Warden_MHR', 'Assistant Warden MHR IIT Bhubaneswar', 'asstwarden.mhr@iitbbs.ac.in', 'MHR', 'DEC 13TH '),
(2, 'Asst_Warden_GHR', 'Assistant Warden GHR IIT Bhubaneswar', 'asstwarden.ghr@iitbbs.ac.in', 'GHR', 'DEC 13TH '),
(2, 'Asst_Warden_SHR', 'Assistant Warden SHR IIT Bhubaneswar', 'asstwarden.shr@iitbbs.ac.in', 'SHR', 'DEC 13TH '),
(3, 'Chief_Warden', 'Chief Warden IIT Bhubaneswar', 'chiefwarden@iitbbs.ac.in', 'SHR ', 'DEC 13TH ');

-- --------------------------------------------------------

--
-- Table structure for table `cmp_log`
--

CREATE TABLE `cmp_log` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone no` varchar(20) NOT NULL,
  `complain` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_no` int(11) NOT NULL,
  `nameOfHostel` varchar(100) NOT NULL,
  `CategoryOfIssue` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `availability` varchar(100) NOT NULL,
  `visibility` varchar(100) NOT NULL,
  `remark` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_cmp_freq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmp_log`
--

INSERT INTO `cmp_log` (`id`, `name`, `email`, `phone no`, `complain`, `ref_no`, `nameOfHostel`, `CategoryOfIssue`, `address`, `availability`, `visibility`, `remark`, `public_cmp_freq`) VALUES
(1, 'Demo', 'demo@demo.com', '7854125400', 'Test1 with demo', 1747926, 'BHR', 'Food', 'B-404', 'Night (20:00 - 00:00)', 'Public', NULL, 5),
(2, 'Liam Johnson', 'liam@gmail.com', '8520001269', 'Dear Sir/Madam, I\'ve recently ordered a new pair of soccer cleats (item #69694582) from your website last week (May 7th). I received the order on May 10th, but unfortunately when I opened it, I saw that the cleats were used. Cleats were dirty enough and there was a small tear in front part where the', 1845767, 'MHR', 'Cleanliness', 'B-404', 'Morning (6:00 - 11:59)', 'Public', NULL, 3),
(3, 'Erma Anderson', 'erma@gmail.com', '1547800002', 'I am disappointed with your company\'s service because the provided service was much unsatisfactory as . . . . . . . . . . . . . . . .', 689799, 'GHR', 'Electricity', 'B-404', 'Afternoon (12:00 - 16:00)', 'Public', NULL, 3),
(4, 'Jamie Morgan', 'jamie@gmail.com', '3540002158', 'Dear Sir/Madam, On May 10th I enrolled in a debt repayment plan with company. The purpose of the repayment plan was to help me repay my debts quickly and efficiently. Company\'s fee structure of explanation of fee structure is excessive and not in the best interest of the client. These fees were not ', 2993246, 'SHR', 'Broken Items', 'B-404', 'Evening (16:00 - 20:00)', 'Public', NULL, 1),
(5, 'George Carlson', 'george@gmail.com', '3450002547', 'Dear Sir/Madam, I bought an item (#ASTRO58_D7) last week, I\'ve also attached a copy of my receipt for your kind information. I\'m writing to you because the service was not carried out with necessary skill, care and diligence. Used materials were not of merchantable quality. I also rang and spoke to ', 1018191, 'RHR', 'Internet Issue', 'B-404', 'Night (20:00 - 00:00)', 'Public', NULL, 1),
(6, 'LALIT LALCHAND MOHANANI', '21cs02006@iitbbs.ac.in', '1234567890', 'test', 3416120, 'MHR', 'Electricity', 'B-404', 'Afternoon (12:00 - 16:00)', 'Public', '', 1),
(7, 'Test Test', 'coding830test@gmail.com', '1231256789', 'Net nhi chal rha  hai', 159409, 'BHR', 'Other', 'B-212', 'Morning (6:00 - 11:59)', 'Public', '', 2),
(8, 'LALIT LALCHAND MOHANANI', '21cs02006@iitbbs.ac.in', '1234567890', 'test 2231', 1990336, 'MHR', 'Electricity', 'B-404', 'Evening (16:00 - 20:00)', 'Public', '', 2),
(9, 'Test Test', 'coding830test@gmail.com', '565656', 'dsfdsfsdf', 3052919, 'Choose...', 'Choose...', 'fsdfsd', 'Afternoon (12:00 - 16:00)', 'Private', '', 1),
(10, 'SHASHWAT SINGH', '20me02039@iitbbs.ac.in', '7985417601', 'Wifi router not working', 1212303, 'BHR', 'Internet Issue', 'A-521', 'Evening (16:00 - 20:00)', 'Private', 'Jaldi hi thik kar denge ham', 1),
(11, 'LALIT LALCHAND MOHANANI', '21cs02006@iitbbs.ac.in', '831565856', 'zindagi jhand hai', 3738178, 'BHR', 'Internet Issue', '123', 'Afternoon (12:00 - 16:00)', 'Private', '', 1),
(12, 'HARSHA VARDHAN', '21ec01010@iitbbs.ac.in', '1234567890', 'Slow internet hai yaar... Thik karo jaldi.', 857341, 'BHR', 'Internet Issue', 'B-413', 'Night (20:00 - 00:00)', 'Public', 'Jaldi hi thik kar denge ham', 2),
(13, 'KANKANALA SIVA SAI AMRUTHA', '21cs02005@iitbbs.ac.in', '6300857597', ' pantry rooms are closed. Please open those.', 1747219, 'GHR', 'Other', 'A-230', 'Choose...', 'Private', 'sure I will open It', 1),
(14, 'BANDARU YASWANTH SAI SAKETH PATRUDU', '21ec01038@iitbbs.ac.in', '4825878665', 'Wifi not working ', 707782, 'BHR', 'Internet Issue', 'B-492', 'Afternoon (12:00 - 16:00)', 'Public', 'I will resolve ', 1),
(15, 'AKSHIT DUDEJA', '21cs01026@iitbbs.ac.in', '1234567890', 'Bhai kya karega complain jaanke.....kuch nahi ho sakta iss college ka...tum bhi job chor do', 2908218, 'BHR', 'Internet Issue', '229', 'Night (20:00 - 00:00)', 'Private', 'fuck off', 1),
(16, 'SUBHRANSU PRIYARANJAN NAYAK', '21me02007@iitbbs.ac.in', '7846860041', 'No oight', 1826471, 'BHR', 'Electricity', 'B-624', 'Morning (6:00 - 11:59)', 'Private', 'kabhi solve nahi hongi', 1),
(17, 'SAGNIK BASU', '21cs02004@iitbbs.ac.in', '9433238041', 'Light in balcony does not work. Please check ASAP....', 3720414, 'BHR', 'Electricity', 'B-403', 'Evening (16:00 - 20:00)', 'Private', 'bhag bhosdike', 1),
(18, 'LALIT LALCHAND MOHANANI', '21cs02006@iitbbs.ac.in', '1234567890212', 'test emoji 🥲', 2985423, 'BHR', 'Broken Items', 'B-404', 'Afternoon (12:00 - 16:00)', 'Private', '', 1),
(19, 'KANKANALA SIVA SAI AMRUTHA', '21cs02005@iitbbs.ac.in', '6300857597', 'No complaint 😂', 1189692, 'GHR', 'Other', 'A-230', 'Night (20:00 - 00:00)', 'Private', 'timepass', 1),
(20, 'NISCHAL SONI', 'sn329@iitbbs.ac.in', '7597103641', 'hello', 1118597, 'MHR', 'Electricity', 'B-214', 'Evening (16:00 - 20:00)', 'Public', '', 1),
(21, 'NISCHAL SONI', 'sn329@iitbbs.ac.in', '7597103641', 'hhhh', 3417068, 'BHR', 'Internet Issue', 'B-214', 'Afternoon (12:00 - 16:00)', 'Public', '', 2),
(22, 'AKSHAT RAMPURIA', '20CS02013@iitbbs.ac.in', '546345634634', 'kgyjgyh', 3086658, 'BHR', 'Cleanliness', 'ghch', 'Afternoon (12:00 - 16:00)', 'Public', '', 2),
(23, 'HARSHA VARDHAN', '21ec01010@iitbbs.ac.in', '1234567890', 'Jfgh', 1807405, 'BHR', 'Internet Issue', 'B-413', 'Night (20:00 - 00:00)', 'Private', '', 1),
(24, 'LALIT LALCHAND MOHANANI', '21cs02006@iitbbs.ac.in', '23687126738', 'Fuck off', 1631521, 'BHR', 'Broken Items', 'B-404', 'Night (20:00 - 00:00)', 'Private', 'You Fuck Off', 1),
(25, 'HARSHA VARDHAN', '21ec01010@iitbbs.ac.in', '1234567890', 'Depression mei hun...', 2255584, 'BHR', 'Other', 'B-413', 'Night (20:00 - 00:00)', 'Public', '', 2),
(26, 'HARSHA VARDHAN', '21ec01010@iitbbs.ac.in', '1111111111', 'xcvbnm', 1674661, 'MHR', 'Cleanliness', 'B-222', 'Morning (6:00 - 11:59)', 'Public', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `ref_no` varchar(20) NOT NULL,
  `status` int(11) DEFAULT 1,
  `time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`ref_no`, `status`, `time`) VALUES
('1747926', 1, '2022-08-20 15:27:38'),
('1845767', 2, '2022-08-20 15:27:38'),
('689799', 2, '2022-08-20 15:27:38'),
('2993246', 2, '2022-08-20 15:27:38'),
('1018191', 1, '2022-08-20 15:27:38'),
('3416120', 4, '2022-10-15 07:47:33'),
('159409', 1, '2022-10-18 00:00:00'),
('1990336', 4, '2022-10-18 00:00:00'),
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
('3417068', 0, '2022-11-03 00:00:01'),
('3086658', 4, '2022-11-03 00:00:01'),
('1807405', 4, '2022-11-05 14:22:10'),
('1631521', 2, '2022-11-11 13:55:32'),
('2255584', 4, '2022-11-11 14:01:48'),
('1674661', 4, '2022-12-14 18:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `upvotes`
--

CREATE TABLE `upvotes` (
  `cmp_refnc` int(11) NOT NULL,
  `user_email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upvotes`
--

INSERT INTO `upvotes` (`cmp_refnc`, `user_email`) VALUES
(1747926, 'liam@gmail.com'),
(1845767, 'demo@demo.com'),
(2255584, '21ec01010@iitbbs.ac.in'),
(1747926, '21ec01010@iitbbs.ac.in'),
(1747926, '21ec01010@iitbbs.ac.in'),
(1747926, '21ec01010@iitbbs.ac.in'),
(1747926, '21ec01010@iitbbs.ac.in'),
(1845767, '21ec01010@iitbbs.ac.in'),
(689799, '21ec01010@iitbbs.ac.in'),
(689799, '21ec01010@iitbbs.ac.in'),
(1845767, '21ec01010@iitbbs.ac.in'),
(857341, '21ec01010@iitbbs.ac.in'),
(1990336, '21ec01010@iitbbs.ac.in'),
(3417068, '21ec01010@iitbbs.ac.in'),
(3086658, '21ec01010@iitbbs.ac.in'),
(159409, '21ec01010@iitbbs.ac.in');

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
