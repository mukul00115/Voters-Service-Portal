-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 03:12 PM
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
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"votesystem\",\"table\":\"votes\"},{\"db\":\"votesystem\",\"table\":\"voters_detail\"},{\"db\":\"votesystem\",\"table\":\"admin\"},{\"db\":\"votesystem\",\"table\":\"positions\"},{\"db\":\"votesystem\",\"table\":\"candidates\"},{\"db\":\"votesystem\",\"table\":\"voters\"},{\"db\":\"votesystem\",\"table\":\"pending_voters\"},{\"db\":\"voting\",\"table\":\"admin\"},{\"db\":\"voting\",\"table\":\"voting\"},{\"db\":\"voting\",\"table\":\"register\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-11-10 14:11:33', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `votesystem`
--
CREATE DATABASE IF NOT EXISTS `votesystem` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `votesystem`;

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
(1, 'mukul_00115', 'mukul00115@gmail.com', '$2y$10$NLCDKbe1oqStB8D3kRr0S.RctqtTdWImUsxkr/TdO0YjpLgy5k.Fm', 'Mukul', 'Kumar', '8084987569', 'ss19.png', '2018-04-02');

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
(18, 8, 'NAND KUMAR', 'JHA', 'Screenshot (34).png', 'jnj lm knn ');

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
(8, 'President', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id` int(11) NOT NULL,
  `voter_id` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('6681131681', '$2y$10$23UCaKHbHxIzZf3raDMvB.0PBmImYqk0QNeIeVMqie8Ow7cR3U9LK', 'RAGHAV', 'JHA', 'PRITAM KUMAR JHA', 'CHANDNI JHA', 21, '2004-01-01', 'Male', '70', 'POSTAL PARK', 'PATNA', '800001', 'Bihar', 'KUMHRAR', 'PATNA', 'raghav@gmail.com', '8252543051', 'images/668fea96262637.74870440.png', '2024-07-11 14:34:13', '656565656565', 'images/668fea96262899.89467716.jpg'),
('6687626708', '$2y$10$RrClY.b77nv7Sc3cTKzKEO/Gn19KPrUlPlGVNRonrul7Rd9jRgZCO', 'MUKUL', 'KUMAR', 'AJAY KUMAR JHA', 'ANJU JHA', 21, '2004-01-01', 'Male', '70', 'POSTAL PARK', 'PATNA', '800001', 'Bihar', 'KUMHRAR', 'PATNA', 'mukul00115@gmail.com', '9122389243', '21.jpeg', '2024-07-11 12:47:20', '761124346141', 'images/668fd43dd73859.76897812.jpg'),
('6694704546', '$2y$10$jhc0kHDBeJ5920C3JCZdgOCw5FUR0sWaTD09lSkZqVVIwoN/yD9lK', 'Dev', 'Jha', 'Pritam Kumar Jha', 'Chandni Jha', 21, '2004-01-01', 'Male', '70', 'Postal Park', 'Patna', '800001', 'Bihar', 'Kumhrar', 'Patna', 'Dev@gmail.com', '9784561230', 'images/66916e9a0b4d50.34852389.jpg', '2024-07-12 17:59:29', '123456789012', 'images/66916e9a0b4de3.84866656.jpg'),
('66A6702210', '$2y$10$8RWvM2KVYcD74uuEAyA5NOlrdVWJCYgcBrq/33XhQu.2J2hE7ByLu', 'Anand ', 'Kumar', 'Umesh Prasad', 'Sushma devi', 22, '2023-09-12', 'Male', 'dfds', 'dfef', 'dfdfhgt', '434333', 'Andaman & Nicobar Islands', 'Gaya', 'Gaya', 'jagdamb1292023@yahoo.com', '6204078706', 'images/66ae646023c930.42068923.png', '2024-08-03 17:11:26', '343543324322', 'images/66ae646023c9f3.25964114.pdf');

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
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;
--
-- Database: `voting`
--
CREATE DATABASE IF NOT EXISTS `voting` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `voting`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'ssvps', 'ssvps@gmail.com', 'pass@123');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `symbol` varchar(50) NOT NULL,
  `symphoto` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `tvotes` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `cname`, `symbol`, `symphoto`, `position`, `tvotes`) VALUES
(20, 'Mohan Sharma', 'Mobile', 'symbol/e3.png', 'Secretary', 3),
(21, 'Rohit Misra', 'Football', 'symbol/s2.png', 'Chairman', 6),
(22, 'Aniket Sharma', 'Camera', 'symbol/e4.png', 'Secretary', 6),
(23, 'Vivek Joshi', 'Helmet', 'symbol/a6.png', 'Chairman', 4),
(24, 'Vivek Varma', 'Wheel', 'symbol/a5.png', 'Chairman', 10),
(25, 'Kamalesh Pawar', 'Tree', 'symbol/tree.jfif', 'Secretary', 8),
(26, 'Ajinkya Patil', 'Computer', 'symbol/cmptr.jfif', 'Chairman', 7),
(27, 'Vaibhav Sonar', 'Helicopter', 'symbol/helicptr.jfif', 'Secretary', 10);

-- --------------------------------------------------------

--
-- Table structure for table `can_position`
--

CREATE TABLE `can_position` (
  `id` int(255) NOT NULL,
  `position_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `can_position`
--

INSERT INTO `can_position` (`id`, `position_name`) VALUES
(1, 'Chairman'),
(2, 'Secretary');

-- --------------------------------------------------------

--
-- Table structure for table `phno_change`
--

CREATE TABLE `phno_change` (
  `id` int(255) NOT NULL,
  `vname` varchar(50) NOT NULL,
  `idname` varchar(20) NOT NULL,
  `idcard` varchar(300) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `old_phno` varchar(15) NOT NULL,
  `new_phno` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phno_change`
--

INSERT INTO `phno_change` (`id`, `vname`, `idname`, `idcard`, `dob`, `old_phno`, `new_phno`) VALUES
(5, 'Rohan Khairnar', 'Aadhar', 'phnochange/Aadhar-Card-UIDAI-.jpg', '2003-03-11', '7420087741', '9576564324'),
(6, 'Prashant Patil', 'other Id Proof', 'phnochange/4.jpeg', '2003-01-09', '9562663773', '8377266277');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `idname` varchar(50) NOT NULL,
  `idnum` varchar(50) NOT NULL,
  `idcard` varchar(300) NOT NULL,
  `inst_id` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `verify` varchar(10) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `lname`, `idname`, `idnum`, `idcard`, `inst_id`, `dob`, `gender`, `phone`, `address`, `verify`, `status`) VALUES
(46, 'Krishna', 'Agrawal', 'Other ID Card', 'P01CO20197498', 'img/3R (1).jpg', '22617', '2003-05-14', 'male', '9307107790', 'Dhule', 'yes', 'voted'),
(47, 'Shantanu', 'Ahirrao', 'Other ID Card', 'P01CO20197301', 'img/4R (1).jpg', '22618', '2003-03-18', 'male', '9423100666', 'Dhule', 'yes', 'voted'),
(48, 'Vishal', 'Bagal', 'Other ID Card', 'P01CO20197173', 'img/5R (1).jpg', '22619', '2003-02-24', 'male', '8600929366', 'Dhule', 'yes', 'voted'),
(49, 'Shruti', 'Bhavsar', 'Other ID Card', 'P01CO20197428', 'img/6R (1).jpg', '22620', '2003-02-24', 'female', '9421532533', 'Dhule', 'yes', 'voted'),
(50, 'Sayali', 'Borse', 'Other ID Card', 'P01CO20197450', 'img/7R (1).jpg', '22621', '2003-04-02', 'female', '9145800416', 'Dhule', 'yes', 'voted'),
(52, 'Dhanashri', 'Chaudhari', 'Other ID Card', 'P01CO20197340', 'img/8OIP.jpg', '22622', '2003-04-02', 'female', '9309559668', 'Dhule', 'yes', 'voted'),
(53, 'Hitesh', 'Chaudhari', 'Passport', 'P01CO20197491', 'img/963221_0.jpg', '22623', '2003-07-15', 'male', '9921288245', 'Dhule', 'yes', 'voted'),
(54, 'Prerana', 'Chaudhari', 'Other ID Card', 'P01CO20197338', 'img/10OIP.jpg', '22624', '2003-04-05', 'female', '9657546077', 'Dhule', 'yes', 'voted'),
(55, 'Deepak', 'Chavan', 'Other ID Card', 'P01CO20197388', 'img/11R (1).jpg', '22625', '2003-06-06', 'male', '8669831973', 'Dhule', 'yes', 'voted'),
(56, 'Harshada', 'Chavan', 'Other ID Card', 'P01CO20197364', 'img/12OIP.jpg', '22626', '2003-06-06', 'female', '9527154274', 'Dhule', 'yes', 'voted'),
(57, 'Tanuja', 'Deo', 'Other ID Card', 'P01CO20197409', 'img/13OIP.jpg', '22627', '2003-07-05', 'female', '9423744921', 'Dhule', 'yes', 'voted'),
(58, 'Krishna', 'Gawali', 'Other ID Card', 'P01CO20197359', 'img/14R (1).jpg', '22628', '2003-04-07', 'male', '9922097726', 'Dhule', 'yes', 'voted'),
(59, 'Vidya', 'Gawali', 'Other ID Card', 'P01CO20197506', 'img/15OIP.jpg', '22629', '2003-05-19', 'female', '9922554582', 'Dhule', 'yes', 'voted'),
(60, 'Sojal', 'Gudhe', 'Aadhar', '874535327362', 'img/16Aadhar-Card-UIDAI-.jpg', '22630', '2003-06-04', 'male', '9921220486', 'Dhule', 'yes', 'voted'),
(61, 'Gujar', 'Rakshanda', 'Other ID Card', '3423645536', 'img/17OIP.jpg', '22631', '2003-04-02', 'female', '9823863244', 'Dhule', 'yes', 'voted'),
(62, 'Simaran', 'Kalda', 'Other ID Card', '89546637732', 'img/18OIP.jpg', '22632', '2003-07-05', 'female', '9579617110', 'Dhule', 'yes', 'voted'),
(63, 'Mihir', 'Lund', 'Aadhar', '324435564988', 'img/19Aadhar-Card-UIDAI-.jpg', '22633', '2003-03-08', 'male', '8669228898', 'Dhule', 'yes', 'voted'),
(65, 'Nilesh', 'Parakhe', 'Other ID Card', 'P01CO20197285', 'img/20R (1).jpg', '22634', '2003-06-03', 'male', '7972680750', 'Dhule', 'yes', 'voted'),
(66, 'Ashwini', 'Patil', 'Other ID Card', 'P01CO20197463', 'img/21OIP.jpg', '22635', '2003-03-06', 'female', '9595289977', 'Dhule', 'yes', 'voted'),
(68, 'Dhanashri', 'Patil', 'Other ID Card', 'P01CO20197539', 'img/22OIP.jpg', '22636', '2003-05-06', 'female', '9923800188', 'Dhule', 'yes', 'voted'),
(69, 'Khushal', 'Patil', 'Other ID Card', 'P01CO20197352', 'img/23R (1).jpg', '22637', '2003-07-03', 'male', '9689020129', 'Dhule', 'yes', 'voted'),
(70, 'Khushi', 'Patil', 'Other ID Card', 'P01CO20197464', 'img/24R (1).jpg', '22638', '2003-06-09', 'female', '8390472454', 'Dhule', 'yes', 'voted'),
(71, 'Madhuri', 'Patil', 'Other ID Card', 'P01CO20197310', 'img/25OIP.jpg', '22639', '2003-08-12', 'female', '7875110922', 'Dhule', 'yes', 'voted'),
(72, 'Priyanka', 'Patil', 'Other ID Card', 'P01CO20197185', 'img/26OIP.jpg', '22640', '2003-05-06', 'female', '8208578027', 'Dhule', 'yes', 'voted'),
(73, 'Roshani', 'Patil', 'Other ID Card', 'P01CO20197296', 'img/27OIP.jpg', '22641', '2003-09-28', 'female', '9960347233', 'Dhule', 'yes', 'voted'),
(74, 'Rupali', 'Patil', 'Other ID Card', 'P01CO20197442', 'img/25OIP.jpg', '22642', '2003-04-02', 'female', '8805407698', 'Dhule', 'yes', 'voted'),
(75, 'Anjali', 'Pawar', 'Other ID Card', 'P01CO20197214', 'img/26OIP.jpg', '22643', '2003-02-03', 'female', '8788871264', 'Dhule', 'yes', 'voted'),
(87, 'Prashant', 'Patil', 'Aadhar', '234556366453', 'img/27Aadhar-Card-UIDAI-.jpg', '22644', '2003-04-15', 'male', '9766031610', 'Dhule', 'yes', 'not voted'),
(88, 'Sahil', 'Mahajan', 'Aadhar', '345543222121', 'img/28Aadhar-Card-UIDAI-.jpg', '22645', '2003-02-18', 'male', '9834750758', 'Dhule', '', 'not voted'),
(89, 'Rohan', 'Khairnar', 'Aadhar', '345543222322', 'img/29Aadhar-Card-UIDAI-.jpg', '22646', '2003-02-07', 'male', '7420087741', 'Dhule', '', 'not voted'),
(90, 'Jayesh', 'Bhandarkar', 'Aadhar', '645535526623', 'img/30Aadhar-Card-UIDAI-.jpg', '22647', '2003-04-07', 'male', '9545040940', 'Dhule', '', 'not voted');

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `id` int(50) NOT NULL,
  `voting_title` varchar(50) NOT NULL,
  `vot_start_date` datetime NOT NULL,
  `vot_end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voting`
--

INSERT INTO `voting` (`id`, `voting_title`, `vot_start_date`, `vot_end_date`) VALUES
(1, 'Voting 2022', '2022-06-01 17:01:00', '2022-06-01 17:18:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `symbol` (`symbol`);

--
-- Indexes for table `can_position`
--
ALTER TABLE `can_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phno_change`
--
ALTER TABLE `phno_change`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `idnum` (`idnum`),
  ADD UNIQUE KEY `inst_id` (`inst_id`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `can_position`
--
ALTER TABLE `can_position`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phno_change`
--
ALTER TABLE `phno_change`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `voting`
--
ALTER TABLE `voting`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
