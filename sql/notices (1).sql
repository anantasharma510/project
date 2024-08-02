-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 03:18 PM
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
-- Database: `notices`
--

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'pre board', 'ffhiuiwhfuwfjije', '2024-05-04 07:36:07'),
(2, 'pre board', 'ffhiuiwhfuwfjije', '2024-05-04 07:39:54'),
(3, 'result published ', '24 pass', '2024-05-04 07:43:39'),
(4, 'result published ', '24 pass', '2024-05-04 07:43:51'),
(5, 'work', '24 pass', '2024-05-04 07:58:12'),
(6, 'pre board', 'ndejndew', '2024-05-04 08:01:51'),
(7, 'hello', 'how are you', '2024-05-04 08:02:02'),
(8, 'nnfkj', 'fioijifoi', '2024-05-04 08:15:36'),
(9, '34782', 'fioijifoi', '2024-05-04 08:23:22'),
(10, '34782', 'fioijifoi', '2024-05-04 08:26:20'),
(11, '34782', 'fioijifoi', '2024-05-04 08:26:30'),
(12, '34782', 'fioijifoikmekl', '2024-05-04 08:26:40'),
(13, '3478265', 'fioijifoikmekl', '2024-05-04 08:32:46'),
(14, 'hello  bca', 'how  are you', '2024-05-04 08:37:36'),
(15, 'prepare for your pre board examinaton', 'dsa day may 10\r\nweb maay 11\r\nsad may 12\r\n', '2024-05-04 09:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `student_notices`
--

CREATE TABLE `student_notices` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_notices`
--
ALTER TABLE `student_notices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_notices`
--
ALTER TABLE `student_notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
