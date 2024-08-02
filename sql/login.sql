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
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'aman@gmail.com', '1dbae6c289c08191bbb8ae5d494d75e51ad69d5cda61688f6b18ed6f0c4cbcf1', '2024-05-04 07:05:24'),
(2, 'aman@gmail.com', '0d186ff0493af4615d980a5297497d9dc3fe7aa90c27abb3b237995140d38093', '2024-05-04 07:07:26'),
(3, 'aman@gmail.com', 'd7e73a72b8ce0762c4993e21869c8bf5794a748c48c8511ca1dbcb8815c4906d', '2024-05-04 07:07:32'),
(4, 'aman@gmail.com', '0cab782e8bc7600810b35fda3813dd354b62268e85c06cbefc64e47863ea538a', '2024-05-04 07:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `semester`, `contact`, `username`, `email`, `password`) VALUES
(1, 'biplove', '3rd', '9826727627', 'bip1', 'bip1@gmail.com', '$2y$10$CzO8uCqVrTh8mkI.GBB2qOedfN2yU3v8ffwyEfUoVFxNjcQzZyuyu'),
(2, 'samir sharma', '3rd', '973683772', 'samir', 'mjdjen@gmail.com', '$2y$10$hNfjQMO/Pi8LjF7GTlm0Y.Ang3zxQZW37Gd98fZiL28S9TjWx9DsC'),
(3, 'samir sharma', '1', '9826727627', 'ss', 'asd@gmail.com', '$2y$10$b6EgCv2r/5bPaKvP5oqg9u42EobVpf8CfusUxH3bOVPciKJc.3Gdy'),
(4, 'samir samir', '3rd', '9771234567', 'samir100', 'samir@gmail.com', '$2y$10$aXJrh2I54EqtwRJHME69W.zNVTMSDFgsv.JkOyxTAEJ.pcwvhM9aW'),
(5, 'kushal', '3rd', '98377346382', 'kushal1', 'kushal@gmail.com', '$2y$10$z/pu2QV3HHvjYAHf/4HSCe5vZobdckwDEctBRMdw/34jl1VmjYOvW'),
(6, 'samirsir', '4', '98462727', 's2', 's@gmail.com', '$2y$10$V9H/njaF2dKovFZ928CIaOysaaDEuQMlq6STgCNgJfCaxYtQ41tcq'),
(7, 'fadfgh', 'sdfg', '98765432', 'beep', 'bip1@gmail.com', '$2y$10$7BS/mAfY9iz98WD7lNFJzefrMx2eSBeVBFOZZF5vaxRna8NZkHZx6'),
(8, 'hello', '4', '532457533', 'hey', 'hello1@gmail.com', '$2y$10$EUFETZbxxT5VhUzCl1BAT.Goheg0dSjoLTU1ApSpZrfuRen3RozNu'),
(9, 'samir sharma', '3rd', '9826727627', 'sss', 'sss@gmail.com', '$2y$10$oztIlrckwEVnp2S07dEKPOFCBlrfucWxlVqe0/mfJxLaON8nJgJcW'),
(10, 'samir sharma', '2nd', '984658221', 'aman', 'aman@gmail.com', '$2y$10$HNb6BDny10pgr1zUQjrYt.XAF2tomSDG/egaUQj.IVudNRsb8gG42'),
(11, 'sujan', '3rd', '75677565', 'sujan', 'sujan1@gmail.com', '$2y$10$choJzgUy8JWwzE3ICDKcDOhyRt/Ng0yn0jYgBp/yu5Sh574MCpQOK');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_photo_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
