
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+05:30";


CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL ,
  `hostel` varchar(4) ,
  `up_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`,`hostel`, `up_time`) VALUES
(1, 'Lalit Mohanani', 'Lalit','21cs02006@iitbbs.ac.in','MHR','May, Saturday, 05:24 pm');


-- --------------------------------------------------------




CREATE TABLE `cmp_log` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone no` varchar(10) NOT NULL,
  `complain` varchar(300) NOT NULL,
  `ref_no` int(100) NOT NULL,
  `nameOfHostel` VARCHAR(100) NOT NULL ,
`CategoryOfIssue` VARCHAR(100) NOT NULL ,
`address` VARCHAR(100) NOT NULL ,
`availability` VARCHAR(100) NOT NULL 

) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `cmp_log` ADD `visibility` VARCHAR(100) NOT NULL AFTER `availability`;

--
-- Dumping data for table `cmp_log`
--

INSERT INTO `cmp_log` (`id`, `name`,`email`, `phone no`, `complain`, `ref_no`,`nameOfHostel`,`CategoryOfIssue`,`address`,`availability`) VALUES
(1, 'Demo',  'demo@demo.com', '7854125400', 'Test1 with demo', 1747926,'BHR','Food','B-404','Night (20:00 - 00:00)'),
(2, 'Liam Johnson', 'liam@gmail.com', '8520001269',  'Dear Sir/Madam, I\'ve recently ordered a new pair of soccer cleats (item #69694582) from your website last week (May 7th). I received the order on May 10th, but unfortunately when I opened it, I saw that the cleats were used. Cleats were dirty enough and there was a small tear in front part where the', 1845767,'MHR','Cleanliness','B-404','Morning (6:00 - 11:59)'),
(3, 'Erma Anderson', 'erma@gmail.com', '1547800002',  'I am disappointed with your company\'s service because the provided service was much unsatisfactory as . . . . . . . . . . . . . . . .', 689799,'GHR','Electricity','B-404','Afternoon (12:00 - 16:00)'),
(4, 'Jamie Morgan', 'jamie@gmail.com', '3540002158', 'Dear Sir/Madam, On May 10th I enrolled in a debt repayment plan with company. The purpose of the repayment plan was to help me repay my debts quickly and efficiently. Company\'s fee structure of explanation of fee structure is excessive and not in the best interest of the client. These fees were not ', 2993246,'SHR','Broken Items','B-404','Evening (16:00 - 20:00)'),
(5, 'George Carlson', 'george@gmail.com', '3450002547', 'Dear Sir/Madam, I bought an item (#ASTRO58_D7) last week, I\'ve also attached a copy of my receipt for your kind information. I\'m writing to you because the service was not carried out with necessary skill, care and diligence. Used materials were not of merchantable quality. I also rang and spoke to ', 1018191,'RHR','Internet Issue','B-404','Night (20:00 - 00:00)');


CREATE TABLE `stats` (
  `ref_no` varchar(20) NOT NULL,
  `status` int(2) DEFAULT 1,
  `time` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `stats` (`ref_no`,`status`,`time`) VALUES
  (1747926,1,'2022-08-20 15:27:38'),
  (1845767,2,'2022-08-20 15:27:38'),
  (689799,1,'2022-08-20 15:27:38'),
  (2993246,2,'2022-08-20 15:27:38'),
  (1018191,1,'2022-08-20 15:27:38');


ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Query for Auto Escalate after 7 days 
--

CREATE EVENT IF NOT EXISTS daily_update
ON SCHEDULE 
   EVERY 1 DAY STARTS DATE(NOW())
ON COMPLETION PRESERVE
DO
  UPDATE hrmd.stats SET status=status+1,time=now() WHERE time>= NOW() - INTERVAL 7*24 HOUR AND status in (1,2);



