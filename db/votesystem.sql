-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2024 at 07:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `firstname`, `lastname`, `mobile`, `photo`, `created_on`) VALUES
(1, 'mukul_00115', 'mukul00115@gmail.com', '$2y$10$1KClCgBhnmUGk7JpESWCsuH.saetqlXLQmP7ouHN4tzrGx4DHz15y', 'Mukul', 'Kumar', '8084987569', 'WhatsApp Image 2021-05-27 at 17.55.34.jpeg', '2018-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `platform` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `position_id`, `firstname`, `lastname`, `photo`, `platform`) VALUES
(18, 8, 'NAND KUMAR', 'JHA', 'download.jpeg', 'jnj lm knn '),
(19, 9, 'AJAY', 'JHA', 'WhatsApp Image 2024-06-13 at 19.32.07_7a5eb8d0.jpg', 'JJ');

-- --------------------------------------------------------

--
-- Table structure for table `pending_voters`
--

CREATE TABLE `pending_voters` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `fathersname` varchar(50) NOT NULL,
  `mothersname` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `house` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `state` varchar(100) NOT NULL,
  `parliamentary` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL DEFAULT '0000000000',
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `aadhar` varchar(12) NOT NULL,
  `aadharfile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_voters`
--

INSERT INTO `pending_voters` (`id`, `firstname`, `lastname`, `fathersname`, `mothersname`, `age`, `dob`, `gender`, `house`, `street`, `town`, `pincode`, `state`, `parliamentary`, `district`, `email`, `mobile`, `photo`, `created_at`, `aadhar`, `aadharfile`) VALUES
(12, 'Anju', 'Jha', 'Ghanshyam Jha', 'Putli Devi', 47, '1977-01-01', 'Female', '789', 'Postal Park', 'Patna', '800001', 'Bihar', 'Kumhrar', 'Patna', 'Anju1977@gmail.com', '8084987569', 'uploads/668e9daf4b2249.70542528.jpeg', '2024-07-10 14:41:51', '323947187394', 'uploads/668e9daf4b22f1.18521093.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `max_vote` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `description`, `max_vote`, `priority`) VALUES
(8, 'President', 1, 2),
(9, 'Prime Minister ', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `voters_id` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `voters_id`, `password`, `firstname`, `lastname`, `email`, `mobile`, `photo`) VALUES
(5, 'JDK6668001', '$2y$10$XKsSSweOqCQ0McXN2z3Kne3ZESpnDvuc0phqIPlqHvfZVoNvHyFLu', 'MUKUL', 'JHA', 'MUKUL00115@GMAIL.COM', '8084987569', 'profile.jpg'),
(6, '6685051398', '$2y$10$EvCqWWdu0qRPe2GpxnRdmOb3UYnwMjdNz/ivoFCaD0CbSelGOifA2', 'MUKUL', 'KUMAR', 'MUKUL@GMAIL.COM', '9122389243', 'uploads/668035ee783503.63231907.png'),
(7, '6681149416', '', 'Mukul', 'Kumar', 'Mukul0045115@gmail.com', '9122389243', 'uploads/66893a1fd61116.10494413.jpg'),
(8, '6687977006', '', 'Ajay', 'Jha', 'jha076117@gmail.com', '9931868315', 'uploads/668e9a4d4b7042.22208405.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `voters_detail`
--

CREATE TABLE `voters_detail` (
  `voters_id` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `fathersname` varchar(50) NOT NULL,
  `mothersname` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `house` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `state` varchar(100) NOT NULL,
  `parliamentary` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL DEFAULT '0000000000',
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `aadhar` varchar(12) DEFAULT NULL,
  `aadharfile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voters_detail`
--

INSERT INTO `voters_detail` (`voters_id`, `password`, `firstname`, `lastname`, `fathersname`, `mothersname`, `age`, `dob`, `gender`, `house`, `street`, `town`, `pincode`, `state`, `parliamentary`, `district`, `email`, `mobile`, `photo`, `created_at`, `aadhar`, `aadharfile`) VALUES
('6681149416', '$2y$10$r5cVKkhsjKu8kEnPWdDopeyJGL98PEINKbefohVpPV44wOme316ri', 'Mukul', 'Kumar', 'Ajay Kumar Jha', 'Anju Jha', 21, '2004-01-01', 'Male', 'bvjkda', 'blvf', 'bfsvks', '800001', 'Andaman & Nicobar Islands', '15njjn', 'nj,n', 'Mukul0045115@gmail.com', '9122389243', 'uploads/66893a1fd61116.10494413.jpg', '2024-07-07 16:27:42', '761124346141', 'uploads/66893a1fd612b6.64732126.png'),
('6684234969', '$2y$10$RM1KA.z1/JsWjnYNRnKpCetcRhoqnBbWfANyKeI54aFx3Ho83Id5O', 'vfe', 'bjkvfb', 'vbkv', 'vkfvk', 21, '2004-01-01', 'Male', '72', 'njk ', 'nkj', '800001', 'Bihar', 'nnoojn', 'huinji', 'mukul00115@gmail.com', '9554547554', 'uploads/66882166120a64.64981960.jpg', '2024-07-05 19:10:52', '758974587854', 'uploads/66882166120b32.97449382.jpg'),
('6685051398', '$2y$10$IcpVOSUE2vZxTtXH1OIJBueCDUYbaP2RW2Vopnq76XoPQM4kXdcye', 'MUKUL', 'KUMAR', 'AJAY', 'ANJU', 21, '2004-01-01', 'Male', '70', 'POSTAL ', 'PATNA', '800001', 'Kerala', 'KUMHRAR', 'PATNA', 'MUKUL@GMAIL.COM', '9122389243', 'uploads/668035ee783503.63231907.png', '2024-07-01 15:59:06', NULL, NULL),
('6686843964', '$2y$10$/.YlyF6qZDyrIPFQzGlY0OtAbb0fz347FFnzsUOn8CfNguS4BJDPq', 'kumar', 'kha', 'jhfw', 'jjjnb', 20, '2004-01-01', 'Male', '89', 'mdnn', 'ddnn', '800001', 'Andaman & Nicobar Islands', 'hdbdc', 'djddj', 'mukul@uid.com', '9635284375', 'uploads/6682eaee778527.17657559.jpg', '2024-07-01 18:20:00', NULL, NULL),
('6687977006', '$2y$10$74QNYJbZpnyA7EzxIa5/duLmvnYU3h2k8kanvx0pi6em1rGT71Vqi', 'Ajay', 'Jha', 'Nand Kumar Jha', 'Manju Jha', 50, '1974-12-05', 'Male', '289', 'POSTAL PARK', 'PATNA', '800001', 'Bihar', 'Kumhrar', 'Patna', 'jha076117@gmail.com', '9931868315', 'uploads/668e9a4d4b7042.22208405.jpg', '2024-07-10 14:32:01', '423947187394', 'uploads/668e9a4d4b72d2.32882269.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `voters_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `voters_id`, `candidate_id`, `position_id`) VALUES
(86, 6, 19, 9),
(87, 6, 18, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_voters`
--
ALTER TABLE `pending_voters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voters_id` (`voters_id`);

--
-- Indexes for table `voters_detail`
--
ALTER TABLE `voters_detail`
  ADD PRIMARY KEY (`voters_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pending_voters`
--
ALTER TABLE `pending_voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
