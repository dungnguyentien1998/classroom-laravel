-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2020 at 02:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_mng`
--

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `hint` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `name`, `hint`, `created_at`) VALUES
(6, 'challenge 1', 'first', '2020-10-08 10:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `files_homework`
--

CREATE TABLE `files_homework` (
  `id` int(11) NOT NULL,
  `path` varchar(500) NOT NULL,
  `size` int(100) DEFAULT NULL,
  `download` int(100) DEFAULT NULL,
  `upload_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files_homework`
--

INSERT INTO `files_homework` (`id`, `path`, `size`, `download`, `upload_by`) VALUES
(7, '02-kientruc-v4.pdf', NULL, NULL, 13);

-- --------------------------------------------------------

--
-- Table structure for table `files_submission`
--

CREATE TABLE `files_submission` (
  `id` int(11) NOT NULL,
  `path` varchar(500) NOT NULL,
  `size` int(100) DEFAULT NULL,
  `download` int(100) DEFAULT NULL,
  `upload_by` int(11) NOT NULL,
  `homework_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files_submission`
--

INSERT INTO `files_submission` (`id`, `path`, `size`, `download`, `upload_by`, `homework_id`) VALUES
(9, '08-FaultTolerance.pdf', NULL, NULL, 12, 7);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message_content`) VALUES
(11, 12, 13, 'Hiii again'),
(12, 13, 12, 'Hey you');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 2),
(3, '2019_08_19_000000_create_failed_jobs_table', 3),
(4, '2020_10_01_120232_add_column_to_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `contact`, `is_admin`) VALUES
(12, 'student1', '$2y$10$X7l6aHUkHn8UwGFRmKjwyOzANNXdHv2mtOx5NHCpgnRLyikNopbG.', 'NTD', 'user3@gmail.com', '0987654321', 0),
(13, 'teacher1', '$2y$10$O9.n7HuGKA190qoHXPuY2eFoDauUEFJGIiILR0ky0Cc28IfD1EtHK', 'NTQ', 'teacher3@gmail.com', '09988776655', 1),
(15, 'student2', '$2y$10$gVqA7hBApWx6YLac.K9WeeNBDElaWZXeAC1QHkzkLHI3QHdEa2HEG', 'NTH', 'user34@gmail.com', '0123456789', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files_homework`
--
ALTER TABLE `files_homework`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homework_teacher` (`upload_by`);

--
-- Indexes for table `files_submission`
--
ALTER TABLE `files_submission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submission_student` (`upload_by`),
  ADD KEY `submission_homework` (`homework_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `files_homework`
--
ALTER TABLE `files_homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `files_submission`
--
ALTER TABLE `files_submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files_homework`
--
ALTER TABLE `files_homework`
  ADD CONSTRAINT `homework_teacher` FOREIGN KEY (`upload_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `files_submission`
--
ALTER TABLE `files_submission`
  ADD CONSTRAINT `submission_homework` FOREIGN KEY (`homework_id`) REFERENCES `files_homework` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submission_student` FOREIGN KEY (`upload_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `receiver_id` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sender_id` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
