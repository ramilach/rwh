-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 04:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rwhdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_text` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender_id`, `receiver_id`, `message_text`, `timestamp`, `image_path`) VALUES
(1, 17, 16, 'أهلا', '2024-04-01 20:57:03', NULL),
(2, 16, 17, 'مرحبا', '2024-04-01 20:57:03', NULL),
(3, 17, 16, 'أحتاج الى خدمة', '2024-04-01 21:18:40', NULL),
(4, 17, 18, 'مرحبا بك كيف استطيع المساعدة ', '2024-05-20 12:09:43', NULL),
(5, 17, 18, 'its finally working :) ', '2024-05-20 12:12:10', NULL),
(6, 17, 18, 'testing again', '2024-05-20 12:20:45', NULL),
(7, 18, 17, 'test ', '2024-05-20 12:40:08', NULL),
(8, 18, 16, 'test', '2024-05-20 12:57:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `postdescription` text DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `postlocation` varchar(255) DEFAULT NULL,
  `posttitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postid`, `userid`, `postdescription`, `skills`, `price`, `category`, `time`, `postlocation`, `posttitle`) VALUES
(2310, 17, 'التركيب الكامل للكهرباء في المنزل', 'تركيب الكهرباء', 200.00, 'تركيب', '2024-05-16 12:31:11', 'المنزل', 'عملية تركيب كهرباء'),
(2311, 17, 'تنظيف منزل كامل', 'تنظيف', 150.00, 'تنظيف', '2024-05-13 12:31:22', 'المنزل', 'تنظيف المنزل'),
(2313, 17, 'تقليم وتنظيف الحديقة', 'تقليم', 120.00, 'تقليم', '2024-05-07 12:31:41', 'الحديقة', 'تقليم الحديقة'),
(2314, 17, 'دهان غرفة المعيشة', 'دهان', 80.00, 'دهان', '2024-05-21 12:31:56', 'المنزل', 'دهان غرفة'),
(2315, 16, 'تركيب مكيف هواء في المنزل', 'تركيب المكيفات', 250.00, 'تركيب', '0000-00-00 00:00:00', 'المنزل', 'تركيب مكيف هواء'),
(2316, 16, 'تنظيف سجاد المنزل بشكل دقيق', 'تنظيف', 180.00, 'تنظيف', '0000-00-00 00:00:00', 'المنزل', 'تنظيف السجاد'),
(2317, 16, 'تلميع وتنظيف الأرضيات في المنزل', 'تلميع', 150.00, 'تلميع', '0000-00-00 00:00:00', 'المنزل', 'تلميع الأرضيات'),
(2318, 16, 'تركيب نوافذ زجاجية جديدة في المنزل', 'تركيب النوافذ', 200.00, 'تركيب', '0000-00-00 00:00:00', 'المنزل', 'تركيب نوافذ جديدة'),
(2319, 16, 'تجديد وتنظيف الحديقة الخلفية للمنزل', 'تجديد', 300.00, 'تجديد', '0000-00-00 00:00:00', 'الحديقة', 'تجديد حديقة'),
(2320, 18, 'تركيب الأثاث الجديد في المنزل', 'تركيب الأثاث', 300.00, 'تركيب', '0000-00-00 00:00:00', 'المنزل', 'تركيب الأثاث'),
(2321, 18, 'تركيب نظام أمان متطور للمنزل', 'تركيب الأنظمة', 350.00, 'تركيب', '0000-00-00 00:00:00', 'المنزل', 'تركيب نظام أمان'),
(2322, 18, 'تركيب نظام تكييف مركزي للمنزل', 'تركيب', 450.00, 'تركيب', '0000-00-00 00:00:00', 'المنزل', 'تركيب نظام تكييف'),
(2324, 17, 'تغيير الباب', 'نجارة', 1000.00, 'اصلاحات المنزل', '2024-05-05 10:00:00', 'المنزل', 'تغيير باب المنزل');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `proposalid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `sellerid` int(11) DEFAULT NULL,
  `postid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`proposalid`, `userid`, `sellerid`, `postid`) VALUES
(1, 17, 16, 2310),
(2, 17, 17, 2311),
(3, 17, 16, 2316),
(4, 17, 18, 2322),
(5, 17, 18, 2321),
(6, 17, 16, 2315),
(7, 17, 17, 2310),
(8, 17, 16, 2319),
(9, 19, 17, 2310);

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `supportid` int(11) NOT NULL,
  `supportdesc` text DEFAULT NULL,
  `category` enum('technical','account','other') DEFAULT NULL,
  `priority` enum('low','medium','high') DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`supportid`, `supportdesc`, `category`, `priority`, `userid`) VALUES
(1, 'test', '', '', NULL),
(2, 'test 2', '', '', NULL),
(3, 'test3', '', '', NULL),
(4, 'test', '', '', NULL),
(5, 'test99', '', '', NULL),
(6, 'ssasa', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `userid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `userlocation` varchar(255) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `role` enum('buyer','seller','both','admin') DEFAULT 'buyer',
  `birthdate` date DEFAULT NULL,
  `verify_token` varchar(255) DEFAULT NULL,
  `rating` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`userid`, `name`, `password`, `email`, `userlocation`, `skills`, `description`, `role`, `birthdate`, `verify_token`, `rating`) VALUES
(16, 'djamel aissoui', '$2y$10$SvSxk4MfifTQVNPEBYZBxOdbOs4IgZdjkfoQ8FeggsL9DqiaRzFQO', 'djamel@gmail.com', NULL, NULL, NULL, 'buyer', '2001-01-01', '9073f437695f236a1026fda08ac96115', 4.75),
(17, 'rami', '$2y$10$mEk2ctkfVe2qcq/LYDvTkOODzhVjeMF6hJqtN.Ze/AIUymIUfFzGG', 'rami@gmail.com', NULL, NULL, NULL, 'buyer', '2002-08-23', '8c0486255c1f48d2ab2840068fe66226', 3.875),
(18, 'Attab Aymen', '$2y$10$CNFlHOd.JeYvjmz8TnChFeOScd.WD1I4y2qgZvI/wRKkgkM.jIDPO', 'aymen@gmail.com', NULL, NULL, NULL, 'buyer', '2004-12-08', 'cc562543cb27881d5cf832e9999b091e', 3),
(19, 'Ahmed Mouhcen', '$2y$10$R.Ayam/v59PP9mEHmrDJ4Op6fN8WDmxJr8bqCJ6aEVLv7JBPhuz9e', 'ahmed@gmail.com', NULL, NULL, NULL, 'buyer', '2000-02-02', '2a797784b35675cb3a5fd2b12cc75984', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`proposalid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `sellerid` (`sellerid`),
  ADD KEY `postid` (`postid`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`supportid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2325;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `proposalid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `supportid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `userdata` (`userid`);

--
-- Constraints for table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `userdata` (`userid`),
  ADD CONSTRAINT `proposal_ibfk_2` FOREIGN KEY (`sellerid`) REFERENCES `userdata` (`userid`),
  ADD CONSTRAINT `proposal_ibfk_3` FOREIGN KEY (`postid`) REFERENCES `post` (`postid`);

--
-- Constraints for table `support`
--
ALTER TABLE `support`
  ADD CONSTRAINT `support_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `userdata` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
