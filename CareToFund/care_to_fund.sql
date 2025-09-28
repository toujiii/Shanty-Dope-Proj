-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2025 at 03:37 PM
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
-- Database: `care_to_fund`
--

-- --------------------------------------------------------

--
-- Table structure for table `charity`
--

CREATE TABLE `charity` (
  `charity_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `raised` int(6) NOT NULL,
  `charity_status` enum('Ongoing','Finished','Cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `charity_request`
--

CREATE TABLE `charity_request` (
  `request_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `datetime` datetime NOT NULL,
  `approved_datetime` datetime DEFAULT NULL,
  `fund_limit` int(6) NOT NULL,
  `duration` int(2) NOT NULL,
  `id_type_used` enum('Passport','Driver''s License','National ID') NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `id_att_link` varchar(255) NOT NULL,
  `front_face_link` varchar(255) NOT NULL,
  `side_face_link` varchar(255) NOT NULL,
  `request_status` enum('Pending','Approved','Rejected') NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donators`
--

CREATE TABLE `donators` (
  `donation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `charity_id` int(11) NOT NULL,
  `amount` int(6) NOT NULL,
  `datetime` datetime NOT NULL,
  `payment_method` enum('GCash') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gcash_number` varchar(11) NOT NULL,
  `status` enum('Active','Offline','Pending') NOT NULL,
  `role` varchar(11) DEFAULT NULL,
  `user_front_link` text DEFAULT NULL,
  `user_side_link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gcash_number`, `status`, `role`, `user_front_link`, `user_side_link`) VALUES
(1000, 'admin', 'admin@ctf.com', '$2y$10$YnVPwG74IBKkF5hBb97m2.Hk6ynN.l1eFGRvw2ZsZ7QDUAINTnFs.', '09000000000', 'Offline', 'admin', NULL, NULL),
(1002, 'bet', 'bet@email.com', '$2y$10$uLOO34v5X3ooJCyuECTDsuwXP3ebADL5rW43XSBvw/ziV.my.5kcC', '09123123123', 'Offline', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `charity`
--
ALTER TABLE `charity`
  ADD PRIMARY KEY (`charity_id`),
  ADD KEY `charity_request_fk` (`request_id`);

--
-- Indexes for table `charity_request`
--
ALTER TABLE `charity_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `donators`
--
ALTER TABLE `donators`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `charity_id_fk` (`charity_id`),
  ADD KEY `donator_user_id_fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `charity`
--
ALTER TABLE `charity`
  MODIFY `charity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT for table `charity_request`
--
ALTER TABLE `charity_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT for table `donators`
--
ALTER TABLE `donators`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `charity`
--
ALTER TABLE `charity`
  ADD CONSTRAINT `charity_request_fk` FOREIGN KEY (`request_id`) REFERENCES `charity_request` (`request_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `charity_request`
--
ALTER TABLE `charity_request`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `donators`
--
ALTER TABLE `donators`
  ADD CONSTRAINT `charity_id_fk` FOREIGN KEY (`charity_id`) REFERENCES `charity` (`charity_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `donator_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
