-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2022 at 03:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment2`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `user_id`, `first_name`, `middle_name`, `last_name`) VALUES
(1, 1, 'Tarzan', NULL, 'Nulls');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `publication_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `publication_title` varchar(100) NOT NULL,
  `publication_text` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `publication_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 is public, 1 is private'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`publication_id`, `profile_id`, `publication_title`, `publication_text`, `timestamp`, `publication_status`) VALUES
(2, 1, 'The Title', 'adding some text\r\nmore random text\r\ntest\r\nfndsklglkdsrfjhilwrgijwaraklnhnkl', '2022-02-21 21:36:05', 0),
(3, 1, 'Another publication (0)', 'some text\r\nsdjgkdsjgoidfjgdjgdfjlkgjdlfgjldgjldfjg', '2022-02-21 21:36:05', 0),
(4, 1, 'Private Publication', 'sdfngjfdsngkjdfngkejkrgherghjwqedrftghyjmnbvgfcdesfrghbvn vgredstfghnbgtfrdfghnbhgtfrdghn mbvhcgthntrghnm htgrhntrhntr', '2022-02-21 21:36:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `publication_comment`
--

CREATE TABLE `publication_comment` (
  `publication_comment_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `publication _id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publication_comment`
--

INSERT INTO `publication_comment` (`publication_comment_id`, `profile_id`, `publication _id`, `comment`, `timestamp`) VALUES
(1, 1, 2, 'your publication is total shit', '2022-02-21 21:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`) VALUES
(1, 'tarzan', '$2y$10$ZojIgKDcRX6wfj2uDcGPlO2NljkofYD7qqRswyEmXI8Jj6gv6mZdO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `profile_to_user` (`user_id`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`publication_id`),
  ADD KEY `publication_to_profile` (`profile_id`);

--
-- Indexes for table `publication_comment`
--
ALTER TABLE `publication_comment`
  ADD PRIMARY KEY (`publication_comment_id`),
  ADD KEY `comment_to_profile` (`profile_id`),
  ADD KEY `comment_to_publication` (`publication _id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `publication_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `publication_comment`
--
ALTER TABLE `publication_comment`
  MODIFY `publication_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `publication_comment`
--
ALTER TABLE `publication_comment`
  ADD CONSTRAINT `comment_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`),
  ADD CONSTRAINT `comment_to_publication` FOREIGN KEY (`publication _id`) REFERENCES `publication` (`publication_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
