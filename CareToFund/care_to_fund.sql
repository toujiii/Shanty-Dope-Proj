-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2025 at 07:03 PM
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

--
-- Dumping data for table `charity`
--

INSERT INTO `charity` (`charity_id`, `request_id`, `raised`, `charity_status`) VALUES
(1001, 1014, 22797, 'Ongoing'),
(1002, 1013, 18720, 'Ongoing'),
(1003, 1012, 25831, 'Ongoing'),
(1004, 1011, 18532, 'Ongoing'),
(1005, 1010, 17322, 'Ongoing'),
(1006, 1009, 22602, 'Ongoing'),
(1007, 1008, 14891, 'Ongoing'),
(1008, 1007, 12517, 'Ongoing'),
(1009, 1006, 13824, 'Ongoing'),
(1010, 1005, 23976, 'Ongoing'),
(1011, 1004, 12410, 'Ongoing'),
(1012, 1003, 12177, 'Ongoing'),
(1013, 1002, 12453, 'Ongoing'),
(1014, 1001, 49568, 'Ongoing');

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

--
-- Dumping data for table `charity_request`
--

INSERT INTO `charity_request` (`request_id`, `description`, `datetime`, `approved_datetime`, `fund_limit`, `duration`, `id_type_used`, `id_number`, `id_att_link`, `front_face_link`, `side_face_link`, `request_status`, `user_id`) VALUES
(1001, '🚨 Real talk: Many kids in our community are going to bed hungry. 🍽️💔\r\nWe’re raising funds to provide daily meals and school supplies so they can focus on learning, not worrying about their next bite.\r\n\r\nEven a small donation = a big impact. 🙌 Let’s pull up for them, fam.\r\nLink in bio — let’s make sure no kid gets left behind. 💖✨', '2025-09-28 23:55:45', '2025-09-29 00:27:35', 50000, 12, 'Passport', 'TEST-PASSPORT-7abe0084-81c2-48a4-8c79-520c2b10c65a', 'resources/img/charity_requests_attachments/request_1003_20250928235545/id_68d95a81ec3549.63848529.png', 'resources/img/charity_requests_attachments/request_1003_20250928235545/face_front_68d95a81ec35c5.23249400.png', 'resources/img/charity_requests_attachments/request_1003_20250928235545/face_side_68d95a81ec35d7.78874538.png', 'Approved', 1003),
(1002, '🌍 Charity Post\r\nToo many families are still struggling to afford clean water. 💧\r\nWe’re raising funds to set up safe water stations in rural communities — because no one should have to choose between drinking dirty water or none at all.\r\n\r\nEvery little donation goes toward building a healthier tomorrow. 🙌✨', '2025-09-28 23:59:31', '2025-09-29 00:27:33', 20000, 7, 'National ID', 'TEST-NID-6c9d8e72-1b3a-44f5-93a2-d18b2f4e6c1a', 'resources/img/charity_requests_attachments/request_1004_20250928235931/id_68d95b63c9b771.63471458.png', 'resources/img/charity_requests_attachments/request_1004_20250928235931/face_front_68d95b63c9b7d4.30312409.png', 'resources/img/charity_requests_attachments/request_1004_20250928235931/face_side_68d95b63c9b7e9.41177323.png', 'Approved', 1004),
(1003, 'Our local community clinic is the only place where hundreds of families can get affordable medicine and lab tests. Without your help, it might shut down. Every peso counts toward keeping this lifeline open.', '2025-09-29 00:06:16', '2025-09-29 00:27:31', 100000, 31, 'National ID', 'NID-000482905731', 'resources/img/charity_requests_attachments/request_1005_20250929000616/id_68d95cf81b4a52.86405163.png', 'resources/img/charity_requests_attachments/request_1005_20250929000616/face_front_68d95cf81b4b89.07799159.png', 'resources/img/charity_requests_attachments/request_1005_20250929000616/face_side_68d95cf81b4b96.70350414.png', 'Approved', 1005),
(1004, 'Juan lost everything in the recent flood — his home, belongings, even his tools for work. Let’s come together to provide him with shelter, food, and basic needs while he rebuilds.', '2025-09-29 00:07:53', '2025-09-29 00:27:29', 70000, 13, 'Driver\'s License', 'DL-TRI-660214', 'resources/img/charity_requests_attachments/request_1006_20250929000753/id_68d95d5923e968.79939191.png', 'resources/img/charity_requests_attachments/request_1006_20250929000753/face_front_68d95d5923e9e9.54611709.png', 'resources/img/charity_requests_attachments/request_1006_20250929000753/face_side_68d95d5923e9f0.05354736.png', 'Approved', 1006),
(1005, 'Education shouldn’t stop because a child has no supplies. We aim to provide books, uniforms, and backpacks for 120 kids in need. Give them the tools to dream bigger.', '2025-09-29 00:09:56', '2025-09-29 00:27:27', 35000, 15, 'Driver\'s License', 'DL-EDU-012357', 'resources/img/charity_requests_attachments/request_1007_20250929000956/id_68d95dd43ff256.41470796.png', 'resources/img/charity_requests_attachments/request_1007_20250929000956/face_front_68d95dd43ff316.85138939.png', 'resources/img/charity_requests_attachments/request_1007_20250929000956/face_side_68d95dd43ff323.86085498.png', 'Approved', 1007),
(1006, 'Maria is in urgent need of surgery. Without it, her life is at risk. Let’s help her family cover hospital bills and post-surgery care. Time is critical.', '2025-09-29 00:12:21', '2025-09-29 00:27:24', 60000, 5, 'Passport', 'PASS-9F0B7E6C', 'resources/img/charity_requests_attachments/request_1008_20250929001221/id_68d95e65b28291.53776471.png', 'resources/img/charity_requests_attachments/request_1008_20250929001221/face_front_68d95e65b28319.55773606.png', 'resources/img/charity_requests_attachments/request_1008_20250929001221/face_side_68d95e65b28327.29318532.png', 'Approved', 1008),
(1007, 'Many seniors in our town go to sleep hungry. With your support, we can provide weekly nutritious meals for 60 elders for the next 3 months. They deserve dignity and care.', '2025-09-29 00:15:01', '2025-09-29 00:27:22', 100000, 24, 'Passport', 'PASS-4C8D2E1F', 'resources/img/charity_requests_attachments/request_1009_20250929001501/id_68d95f059576d6.03981087.png', 'resources/img/charity_requests_attachments/request_1009_20250929001501/face_front_68d95f05957779.38348353.png', 'resources/img/charity_requests_attachments/request_1009_20250929001501/face_side_68d95f05957785.73403464.png', 'Approved', 1009),
(1008, 'One student earned a full scholarship but has no laptop to attend online classes. Let’s invest in their future and give them the chance to excel in school.', '2025-09-29 00:16:18', '2025-09-29 00:27:13', 50000, 15, 'National ID', 'NID-000559400627', 'resources/img/charity_requests_attachments/request_1010_20250929001618/id_68d95f5295b291.14879863.png', 'resources/img/charity_requests_attachments/request_1010_20250929001618/face_front_68d95f5295b315.55408366.png', 'resources/img/charity_requests_attachments/request_1010_20250929001618/face_side_68d95f5295b324.58676954.png', 'Approved', 1010),
(1009, 'A typhoon wrecked the local library, damaging books and furniture. Help us restore it so children and adults alike can have a space to learn and grow again.', '2025-09-29 00:18:08', '2025-09-29 00:27:11', 100000, 31, 'Driver\'s License', 'DL-REC-223410', 'resources/img/charity_requests_attachments/request_1011_20250929001808/id_68d95fc09ed815.66616539.png', 'resources/img/charity_requests_attachments/request_1011_20250929001808/face_front_68d95fc09ed8b3.98256791.png', 'resources/img/charity_requests_attachments/request_1011_20250929001808/face_side_68d95fc09ed8c5.34592392.png', 'Approved', 1011),
(1010, 'Displaced youth are struggling with trauma and hopelessness. With your help, we can sponsor counseling and therapy sessions to guide them toward healing.', '2025-09-29 00:19:42', '2025-09-29 00:27:08', 100000, 20, 'Passport', 'PASS-C9D8E7F1', 'resources/img/charity_requests_attachments/request_1012_20250929001942/id_68d9601e3ce151.17868992.png', 'resources/img/charity_requests_attachments/request_1012_20250929001942/face_front_68d9601e3ce1d4.37891143.png', 'resources/img/charity_requests_attachments/request_1012_20250929001942/face_side_68d9601e3ce1e8.38125982.png', 'Approved', 1012),
(1011, 'Access to clean water is a right, not a privilege. We plan to install 3 community water filters so families no longer risk illness from unsafe water.', '2025-09-29 00:20:59', '2025-09-29 00:27:07', 90000, 25, 'National ID', 'NID-000668931074', 'resources/img/charity_requests_attachments/request_1013_20250929002059/id_68d9606b038434.36647240.png', 'resources/img/charity_requests_attachments/request_1013_20250929002059/face_front_68d9606b0384b9.73742033.png', 'resources/img/charity_requests_attachments/request_1013_20250929002059/face_side_68d9606b0384c0.46744178.png', 'Approved', 1013),
(1012, 'A hardworking single mom is struggling to pay rent and buy baby supplies. Let’s help her cover essentials for a months while she secures stable work.', '2025-09-29 00:22:52', '2025-09-29 00:27:05', 100000, 31, 'Driver\'s License', 'DL-HOPE-907011', 'resources/img/charity_requests_attachments/request_1014_20250929002252/id_68d960dcaf4e35.43742658.png', 'resources/img/charity_requests_attachments/request_1014_20250929002252/face_front_68d960dcaf4e97.54024850.png', 'resources/img/charity_requests_attachments/request_1014_20250929002252/face_side_68d960dcaf4ea4.93162454.png', 'Approved', 1014),
(1013, 'Street dogs need urgent medical care and vaccinations. With your support, we can treat dozens of them and prevent outbreaks while giving them a second chance at life.', '2025-09-29 00:24:31', '2025-09-29 00:27:03', 65000, 24, 'National ID', 'NID-000993217480', 'resources/img/charity_requests_attachments/request_1015_20250929002431/id_68d9613fc3f416.21820007.png', 'resources/img/charity_requests_attachments/request_1015_20250929002431/face_front_68d9613fc3f499.15202889.png', 'resources/img/charity_requests_attachments/request_1015_20250929002431/face_side_68d9613fc3f4a6.72291263.png', 'Approved', 1015),
(1014, 'Many children dream of becoming artists but can’t afford materials. Help us keep art classes free by covering materials and instructor fees.', '2025-09-29 00:26:39', '2025-09-29 00:26:59', 75000, 12, 'Passport', 'PASS-0D1E2F3A', 'resources/img/charity_requests_attachments/request_1016_20250929002639/id_68d961bfe683e9.69542651.png', 'resources/img/charity_requests_attachments/request_1016_20250929002639/face_front_68d961bfe68446.22604554.png', 'resources/img/charity_requests_attachments/request_1016_20250929002639/face_side_68d961bfe68454.56616295.png', 'Approved', 1016);

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

--
-- Dumping data for table `donators`
--

INSERT INTO `donators` (`donation_id`, `user_id`, `charity_id`, `amount`, `datetime`, `payment_method`) VALUES
(1002, 1003, 1013, 1000, '2025-09-29 00:29:24', 'GCash'),
(1003, 1003, 1013, 200, '2025-09-29 00:29:30', 'GCash'),
(1004, 1003, 1012, 500, '2025-09-29 00:29:41', 'GCash'),
(1005, 1003, 1012, 300, '2025-09-29 00:29:56', 'GCash'),
(1006, 1003, 1011, 2000, '2025-09-29 00:30:09', 'GCash'),
(1007, 1003, 1010, 12312, '2025-09-29 00:30:17', 'GCash'),
(1008, 1003, 1009, 666, '2025-09-29 00:30:26', 'GCash'),
(1009, 1003, 1008, 1222, '2025-09-29 00:30:34', 'GCash'),
(1010, 1003, 1007, 500, '2025-09-29 00:30:45', 'GCash'),
(1011, 1003, 1006, 2200, '2025-09-29 00:30:55', 'GCash'),
(1012, 1003, 1005, 5000, '2025-09-29 00:31:08', 'GCash'),
(1013, 1003, 1004, 2000, '2025-09-29 00:31:16', 'GCash'),
(1014, 1003, 1004, 3000, '2025-09-29 00:31:24', 'GCash'),
(1015, 1003, 1003, 200, '2025-09-29 00:31:34', 'GCash'),
(1016, 1003, 1003, 300, '2025-09-29 00:31:40', 'GCash'),
(1017, 1003, 1003, 500, '2025-09-29 00:31:45', 'GCash'),
(1018, 1003, 1002, 5000, '2025-09-29 00:32:00', 'GCash'),
(1019, 1003, 1001, 4444, '2025-09-29 00:32:09', 'GCash'),
(1020, 1003, 1001, 3333, '2025-09-29 00:32:14', 'GCash'),
(1021, 1004, 1014, 533, '2025-09-29 00:33:30', 'GCash'),
(1022, 1004, 1014, 5442, '2025-09-29 00:33:35', 'GCash'),
(1023, 1004, 1012, 334, '2025-09-29 00:33:40', 'GCash'),
(1024, 1004, 1011, 665, '2025-09-29 00:33:46', 'GCash'),
(1025, 1004, 1010, 5664, '2025-09-29 00:33:51', 'GCash'),
(1026, 1004, 1009, 5633, '2025-09-29 00:33:57', 'GCash'),
(1027, 1004, 1009, 600, '2025-09-29 00:34:03', 'GCash'),
(1028, 1004, 1008, 3000, '2025-09-29 00:34:19', 'GCash'),
(1029, 1004, 1007, 4000, '2025-09-29 00:34:26', 'GCash'),
(1030, 1004, 1006, 5000, '2025-09-29 00:34:33', 'GCash'),
(1031, 1004, 1005, 300, '2025-09-29 00:34:40', 'GCash'),
(1032, 1004, 1004, 2000, '2025-09-29 00:34:48', 'GCash'),
(1033, 1004, 1003, 2222, '2025-09-29 00:34:54', 'GCash'),
(1034, 1004, 1002, 3333, '2025-09-29 00:34:58', 'GCash'),
(1035, 1004, 1001, 444, '2025-09-29 00:35:05', 'GCash'),
(1036, 1005, 1014, 350, '2025-09-29 00:36:31', 'GCash'),
(1037, 1005, 1014, 500, '2025-09-29 00:36:37', 'GCash'),
(1038, 1005, 1013, 500, '2025-09-29 00:36:44', 'GCash'),
(1039, 1005, 1013, 300, '2025-09-29 00:36:52', 'GCash'),
(1040, 1005, 1011, 2000, '2025-09-29 00:36:58', 'GCash'),
(1041, 1005, 1010, 200, '2025-09-29 00:37:04', 'GCash'),
(1042, 1005, 1009, 500, '2025-09-29 00:37:15', 'GCash'),
(1043, 1005, 1008, 450, '2025-09-29 00:37:23', 'GCash'),
(1044, 1005, 1007, 400, '2025-09-29 00:37:40', 'GCash'),
(1045, 1005, 1003, 5000, '2025-09-29 00:37:51', 'GCash'),
(1046, 1005, 1001, 4500, '2025-09-29 00:37:59', 'GCash'),
(1047, 1005, 1002, 300, '2025-09-29 00:38:05', 'GCash'),
(1048, 1006, 1014, 2000, '2025-09-29 00:38:40', 'GCash'),
(1049, 1006, 1013, 400, '2025-09-29 00:38:49', 'GCash'),
(1050, 1006, 1012, 500, '2025-09-29 00:39:01', 'GCash'),
(1051, 1006, 1012, 800, '2025-09-29 00:39:09', 'GCash'),
(1052, 1006, 1012, 300, '2025-09-29 00:39:19', 'GCash'),
(1053, 1006, 1010, 200, '2025-09-29 00:39:25', 'GCash'),
(1054, 1006, 1009, 1500, '2025-09-29 00:39:34', 'GCash'),
(1055, 1006, 1003, 5000, '2025-09-29 00:39:47', 'GCash'),
(1056, 1006, 1004, 800, '2025-09-29 00:39:54', 'GCash'),
(1057, 1006, 1005, 2000, '2025-09-29 00:40:02', 'GCash'),
(1058, 1006, 1006, 5002, '2025-09-29 00:40:18', 'GCash'),
(1059, 1006, 1008, 500, '2025-09-29 00:40:27', 'GCash'),
(1060, 1007, 1014, 35443, '2025-09-29 00:41:32', 'GCash'),
(1061, 1007, 1013, 4453, '2025-09-29 00:41:39', 'GCash'),
(1062, 1007, 1012, 3543, '2025-09-29 00:41:45', 'GCash'),
(1063, 1007, 1011, 1245, '2025-09-29 00:41:52', 'GCash'),
(1064, 1007, 1009, 125, '2025-09-29 00:41:58', 'GCash'),
(1065, 1007, 1008, 2356, '2025-09-29 00:42:05', 'GCash'),
(1066, 1007, 1007, 2356, '2025-09-29 00:42:10', 'GCash'),
(1067, 1007, 1006, 5000, '2025-09-29 00:42:18', 'GCash'),
(1068, 1007, 1005, 5222, '2025-09-29 00:42:27', 'GCash'),
(1069, 1007, 1004, 5332, '2025-09-29 00:42:33', 'GCash'),
(1070, 1007, 1003, 3242, '2025-09-29 00:42:38', 'GCash'),
(1071, 1007, 1002, 5122, '2025-09-29 00:42:45', 'GCash'),
(1072, 1007, 1001, 5000, '2025-09-29 00:42:54', 'GCash'),
(1073, 1008, 1014, 500, '2025-09-29 00:44:48', 'GCash'),
(1074, 1008, 1013, 200, '2025-09-29 00:44:55', 'GCash'),
(1075, 1008, 1012, 500, '2025-09-29 00:45:02', 'GCash'),
(1076, 1008, 1011, 500, '2025-09-29 00:45:09', 'GCash'),
(1077, 1008, 1010, 800, '2025-09-29 00:45:15', 'GCash'),
(1078, 1008, 1008, 789, '2025-09-29 00:45:22', 'GCash'),
(1079, 1008, 1007, 3435, '2025-09-29 00:45:28', 'GCash'),
(1080, 1008, 1006, 600, '2025-09-29 00:45:33', 'GCash'),
(1081, 1008, 1005, 600, '2025-09-29 00:45:40', 'GCash'),
(1082, 1008, 1004, 600, '2025-09-29 00:45:46', 'GCash'),
(1083, 1008, 1003, 4567, '2025-09-29 00:45:52', 'GCash'),
(1084, 1008, 1002, 765, '2025-09-29 00:45:56', 'GCash'),
(1085, 1008, 1001, 876, '2025-09-29 00:46:03', 'GCash'),
(1086, 1009, 1014, 600, '2025-09-29 00:46:42', 'GCash'),
(1087, 1009, 1013, 600, '2025-09-29 00:46:47', 'GCash'),
(1088, 1009, 1012, 600, '2025-09-29 00:46:51', 'GCash'),
(1089, 1009, 1011, 600, '2025-09-29 00:46:56', 'GCash'),
(1090, 1009, 1011, 600, '2025-09-29 00:47:01', 'GCash'),
(1091, 1009, 1010, 600, '2025-09-29 00:47:06', 'GCash'),
(1092, 1009, 1009, 600, '2025-09-29 00:47:09', 'GCash'),
(1093, 1009, 1007, 600, '2025-09-29 00:47:14', 'GCash'),
(1094, 1009, 1006, 600, '2025-09-29 00:47:19', 'GCash'),
(1095, 1009, 1005, 600, '2025-09-29 00:47:24', 'GCash'),
(1096, 1009, 1004, 600, '2025-09-29 00:47:30', 'GCash'),
(1097, 1009, 1004, 600, '2025-09-29 00:47:34', 'GCash'),
(1098, 1009, 1003, 600, '2025-09-29 00:47:40', 'GCash'),
(1099, 1009, 1003, 600, '2025-09-29 00:47:44', 'GCash'),
(1100, 1009, 1002, 600, '2025-09-29 00:47:48', 'GCash'),
(1101, 1009, 1001, 600, '2025-09-29 00:47:54', 'GCash'),
(1102, 1010, 1014, 600, '2025-09-29 00:48:34', 'GCash'),
(1103, 1010, 1013, 600, '2025-09-29 00:48:38', 'GCash'),
(1104, 1010, 1013, 600, '2025-09-29 00:48:42', 'GCash'),
(1105, 1010, 1012, 600, '2025-09-29 00:49:17', 'GCash'),
(1106, 1010, 1012, 600, '2025-09-29 00:49:21', 'GCash'),
(1107, 1010, 1011, 600, '2025-09-29 00:49:25', 'GCash'),
(1108, 1010, 1011, 600, '2025-09-29 00:49:29', 'GCash'),
(1109, 1010, 1010, 600, '2025-09-29 00:49:33', 'GCash'),
(1110, 1010, 1009, 600, '2025-09-29 00:49:37', 'GCash'),
(1111, 1010, 1008, 600, '2025-09-29 00:49:42', 'GCash'),
(1112, 1010, 1006, 600, '2025-09-29 00:49:49', 'GCash'),
(1113, 1010, 1006, 600, '2025-09-29 00:49:53', 'GCash'),
(1114, 1010, 1001, 600, '2025-09-29 00:51:04', 'GCash'),
(1115, 1010, 1002, 600, '2025-09-29 00:51:08', 'GCash'),
(1116, 1010, 1003, 600, '2025-09-29 00:51:12', 'GCash'),
(1117, 1010, 1004, 600, '2025-09-29 00:51:17', 'GCash'),
(1118, 1010, 1005, 600, '2025-09-29 00:51:22', 'GCash'),
(1119, 1011, 1014, 600, '2025-09-29 00:51:56', 'GCash'),
(1120, 1011, 1013, 600, '2025-09-29 00:52:01', 'GCash'),
(1121, 1011, 1012, 600, '2025-09-29 00:52:05', 'GCash'),
(1122, 1011, 1011, 600, '2025-09-29 00:52:10', 'GCash'),
(1123, 1011, 1010, 600, '2025-09-29 00:52:14', 'GCash'),
(1124, 1011, 1009, 600, '2025-09-29 00:52:19', 'GCash'),
(1125, 1011, 1008, 600, '2025-09-29 00:52:23', 'GCash'),
(1126, 1011, 1007, 600, '2025-09-29 00:52:28', 'GCash'),
(1127, 1011, 1005, 600, '2025-09-29 00:52:33', 'GCash'),
(1128, 1011, 1004, 600, '2025-09-29 00:52:37', 'GCash'),
(1129, 1011, 1003, 600, '2025-09-29 00:52:42', 'GCash'),
(1130, 1011, 1002, 600, '2025-09-29 00:52:46', 'GCash'),
(1131, 1011, 1001, 600, '2025-09-29 00:52:51', 'GCash'),
(1132, 1012, 1014, 600, '2025-09-29 00:53:25', 'GCash'),
(1133, 1012, 1013, 600, '2025-09-29 00:53:29', 'GCash'),
(1134, 1012, 1012, 600, '2025-09-29 00:53:33', 'GCash'),
(1135, 1012, 1011, 600, '2025-09-29 00:53:39', 'GCash'),
(1136, 1012, 1010, 600, '2025-09-29 00:53:43', 'GCash'),
(1137, 1012, 1009, 600, '2025-09-29 00:53:49', 'GCash'),
(1138, 1012, 1008, 600, '2025-09-29 00:53:54', 'GCash'),
(1139, 1012, 1007, 600, '2025-09-29 00:53:59', 'GCash'),
(1140, 1012, 1006, 600, '2025-09-29 00:54:03', 'GCash'),
(1141, 1012, 1004, 600, '2025-09-29 00:54:08', 'GCash'),
(1142, 1012, 1003, 600, '2025-09-29 00:54:12', 'GCash'),
(1143, 1012, 1002, 600, '2025-09-29 00:54:18', 'GCash'),
(1144, 1012, 1001, 600, '2025-09-29 00:54:22', 'GCash'),
(1145, 1013, 1014, 600, '2025-09-29 00:55:00', 'GCash'),
(1146, 1013, 1013, 600, '2025-09-29 00:55:05', 'GCash'),
(1147, 1013, 1012, 600, '2025-09-29 00:55:09', 'GCash'),
(1148, 1013, 1011, 600, '2025-09-29 00:55:13', 'GCash'),
(1149, 1013, 1010, 600, '2025-09-29 00:55:18', 'GCash'),
(1150, 1013, 1009, 600, '2025-09-29 00:55:22', 'GCash'),
(1151, 1013, 1008, 600, '2025-09-29 00:55:28', 'GCash'),
(1152, 1013, 1007, 600, '2025-09-29 00:55:32', 'GCash'),
(1153, 1013, 1006, 600, '2025-09-29 00:55:37', 'GCash'),
(1154, 1013, 1005, 600, '2025-09-29 00:55:42', 'GCash'),
(1155, 1013, 1003, 600, '2025-09-29 00:55:47', 'GCash'),
(1156, 1013, 1002, 600, '2025-09-29 00:55:51', 'GCash'),
(1157, 1013, 1001, 600, '2025-09-29 00:55:59', 'GCash'),
(1158, 1014, 1014, 600, '2025-09-29 00:56:52', 'GCash'),
(1159, 1014, 1013, 600, '2025-09-29 00:56:57', 'GCash'),
(1160, 1014, 1012, 600, '2025-09-29 00:57:00', 'GCash'),
(1161, 1014, 1011, 600, '2025-09-29 00:57:05', 'GCash'),
(1162, 1014, 1010, 600, '2025-09-29 00:57:09', 'GCash'),
(1163, 1014, 1009, 600, '2025-09-29 00:57:14', 'GCash'),
(1164, 1014, 1008, 600, '2025-09-29 00:57:17', 'GCash'),
(1165, 1014, 1007, 600, '2025-09-29 00:57:22', 'GCash'),
(1166, 1014, 1006, 600, '2025-09-29 00:57:26', 'GCash'),
(1167, 1014, 1005, 600, '2025-09-29 00:57:31', 'GCash'),
(1168, 1014, 1004, 600, '2025-09-29 00:57:35', 'GCash'),
(1169, 1014, 1002, 600, '2025-09-29 00:57:41', 'GCash'),
(1170, 1014, 1001, 600, '2025-09-29 00:57:47', 'GCash'),
(1171, 1015, 1014, 600, '2025-09-29 00:59:11', 'GCash'),
(1172, 1015, 1013, 600, '2025-09-29 00:59:15', 'GCash'),
(1173, 1015, 1012, 600, '2025-09-29 00:59:20', 'GCash'),
(1174, 1015, 1011, 600, '2025-09-29 00:59:25', 'GCash'),
(1175, 1015, 1010, 600, '2025-09-29 00:59:29', 'GCash'),
(1176, 1015, 1009, 600, '2025-09-29 00:59:35', 'GCash'),
(1177, 1015, 1008, 600, '2025-09-29 00:59:39', 'GCash'),
(1178, 1015, 1007, 600, '2025-09-29 00:59:44', 'GCash'),
(1179, 1015, 1006, 600, '2025-09-29 00:59:48', 'GCash'),
(1180, 1015, 1005, 600, '2025-09-29 00:59:52', 'GCash'),
(1181, 1015, 1004, 600, '2025-09-29 00:59:56', 'GCash'),
(1182, 1015, 1003, 600, '2025-09-29 01:00:01', 'GCash'),
(1183, 1015, 1001, 600, '2025-09-29 01:00:05', 'GCash'),
(1184, 1016, 1014, 600, '2025-09-29 01:00:51', 'GCash'),
(1185, 1016, 1013, 600, '2025-09-29 01:00:56', 'GCash'),
(1186, 1016, 1012, 600, '2025-09-29 01:01:00', 'GCash'),
(1187, 1016, 1011, 600, '2025-09-29 01:01:05', 'GCash'),
(1188, 1016, 1010, 600, '2025-09-29 01:01:10', 'GCash'),
(1189, 1016, 1009, 600, '2025-09-29 01:01:14', 'GCash'),
(1190, 1016, 1008, 600, '2025-09-29 01:01:18', 'GCash'),
(1191, 1016, 1007, 600, '2025-09-29 01:01:23', 'GCash'),
(1192, 1016, 1006, 600, '2025-09-29 01:01:28', 'GCash'),
(1193, 1016, 1005, 600, '2025-09-29 01:01:33', 'GCash'),
(1194, 1016, 1004, 600, '2025-09-29 01:01:37', 'GCash'),
(1195, 1016, 1003, 600, '2025-09-29 01:01:42', 'GCash'),
(1196, 1016, 1002, 600, '2025-09-29 01:01:48', 'GCash');

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
(1003, 'Jefferson Mikael', 'jeff@gmail.com', '$2y$10$n0tu0c0dC3gBbKBRx4JFNe7cQ10tQGIr3OR7DG15vX3w2vQ.fE6WO', '09817263541', 'Active', NULL, 'resources/img/user_verifications/verify_1003/face_front_1003.png', 'resources/img/user_verifications/verify_1003/face_side_1003.png'),
(1004, 'Anna Marie', 'ann@gmail.com', '$2y$10$RZ4RcQTwwwopMZWmkMUpzOh0gztbrY0RQfjKRy3J5Z4JbahamShQK', '09564738200', 'Active', NULL, 'resources/img/user_verifications/verify_1004/face_front_1004.png', 'resources/img/user_verifications/verify_1004/face_side_1004.png'),
(1005, 'Robin Mayers', 'robin@gmail.com', '$2y$10$MKhT3m8itQCTRQy00v65Num1wVCnAnu8WY689dTuN7z/JZe53uvci', '09000123412', 'Active', NULL, 'resources/img/user_verifications/verify_1005/face_front_1005.png', 'resources/img/user_verifications/verify_1005/face_side_1005.png'),
(1006, 'Lance Culap', 'lance@gmail.com', '$2y$10$gpiUOdpOobM6nKAJ69gQu.81y9UIoKBkIwkMGyF8ZA2GAtPw9ZVfu', '09121212131', 'Active', NULL, 'resources/img/user_verifications/verify_1006/face_front_1006.png', 'resources/img/user_verifications/verify_1006/face_side_1006.png'),
(1007, 'Andrew Roberts', 'andrew@gmail.com', '$2y$10$kIs5prWV8pNX1ta4pgC2BeePZnKqVzROb5OZOkvNwpQuPaz0Rvkba', '09123412312', 'Active', NULL, 'resources/img/user_verifications/verify_1007/face_front_1007.png', 'resources/img/user_verifications/verify_1007/face_side_1007.png'),
(1008, 'Ferdinand Arnold', 'ferd@gmail.com', '$2y$10$nV8tE65Gn96ISwwckvMAKu24bZUZMdk/e6AXnxW2DAwzyei1P7Kw2', '09912415562', 'Active', NULL, 'resources/img/user_verifications/verify_1008/face_front_1008.png', 'resources/img/user_verifications/verify_1008/face_side_1008.png'),
(1009, 'Davie Rosales', 'dave@gmail.com', '$2y$10$DSQmNPfxiIQGIoLum5rIGen2auh41MsHKbOGGioC2AksyYJTmyzuW', '09012566445', 'Active', NULL, 'resources/img/user_verifications/verify_1009/face_front_1009.png', 'resources/img/user_verifications/verify_1009/face_side_1009.png'),
(1010, 'Akko Gomez', 'akko@gmail.com', '$2y$10$6Ead.ehbhEDjccc1MOgRwu.OQJAtQ7sC85PGOAa5IopvfMr0eN4M2', '09912445677', 'Active', NULL, 'resources/img/user_verifications/verify_1010/face_front_1010.png', 'resources/img/user_verifications/verify_1010/face_side_1010.png'),
(1011, 'Colman Salez', 'col@gmail.com', '$2y$10$CY3dpgDR4tTncy5tBiBr6OA2B1xyvskzrMlDpM7o0kztrcCs/pvMy', '09882356512', 'Active', NULL, 'resources/img/user_verifications/verify_1011/face_front_1011.png', 'resources/img/user_verifications/verify_1011/face_side_1011.png'),
(1012, 'Rowell Magalang', 'rowell@gmail.com', '$2y$10$V4Ej2SeunZIRunYwM9qqU.K1JJkbV.YGh8R2FqK0pnVS9vqKcNPxu', '09124551233', 'Active', NULL, 'resources/img/user_verifications/verify_1012/face_front_1012.png', 'resources/img/user_verifications/verify_1012/face_side_1012.png'),
(1013, 'Ivan Everest', 'ivan@gmail.com', '$2y$10$xSr001.LVO4QeGZ5mC/DIegO.1nul4pjGR3dBwXmih0i3QZnswJb6', '09191242686', 'Active', NULL, 'resources/img/user_verifications/verify_1013/face_front_1013.png', 'resources/img/user_verifications/verify_1013/face_side_1013.png'),
(1014, 'Dick Cruz', 'dick@gmail.com', '$2y$10$wm53p5GWN1LkzFj7aLuHJeIhHUvDi/C8xoiD8FxScqU8WGFFFkLYm', '09083647568', 'Active', NULL, 'resources/img/user_verifications/verify_1014/face_front_1014.png', 'resources/img/user_verifications/verify_1014/face_side_1014.png'),
(1015, 'Laurence Semacio', 'jay@gmail.com', '$2y$10$lDdE93ZiRcNY.AAQu54c4.F3Ft..YOBBWXjh.oaI9jeOJVpabpftm', '09988543345', 'Active', NULL, 'resources/img/user_verifications/verify_1015/face_front_1015.png', 'resources/img/user_verifications/verify_1015/face_side_1015.png'),
(1016, 'Joy Dela Rosa', 'joy@gmail.com', '$2y$10$qhLhpDE5VF4Z4iVV9Psk8ezwCsWQFdM1s.YfE6aVw6z0R1YzBIwRu', '09005644464', 'Active', NULL, 'resources/img/user_verifications/verify_1016/face_front_1016.png', 'resources/img/user_verifications/verify_1016/face_side_1016.png');

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
  MODIFY `charity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- AUTO_INCREMENT for table `charity_request`
--
ALTER TABLE `charity_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- AUTO_INCREMENT for table `donators`
--
ALTER TABLE `donators`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1197;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1017;

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
