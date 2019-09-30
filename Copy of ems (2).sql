-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 07:46 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `created_at`, `updated_at`, `username`, `image`, `first_name`, `last_name`, `email`, `password`, `status`) VALUES
(1, '2019-04-16 00:56:05', NULL, '123456', '', 'abcd', 'efgh', 'admin@gmail.com', '$2y$10$aVrkMlJMf/.tBYr15DMw.evh0r81e12pm83Pbel//g3gQgqCBQnau', 1);

-- --------------------------------------------------------

--
-- Table structure for table `calendars`
--

CREATE TABLE `calendars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calendars`
--

INSERT INTO `calendars` (`id`, `title`, `color`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'sdf', '#ff8080', '2019-04-11', '2019-04-27', '2019-04-26 00:01:34', '2019-04-26 00:01:34'),
(2, 'hhfh', '#008000', '2019-04-30', '2019-04-12', '2019-04-26 00:04:23', '2019-04-26 00:04:23'),
(3, 'holiday', '#ff0080', '2019-04-30', '2019-05-01', '2019-04-28 04:05:18', '2019-04-28 04:05:18'),
(4, 'Holiday', '#ff0080', '2019-04-30', '2019-04-30', '2019-04-29 00:10:55', '2019-04-29 00:10:55'),
(5, 'rrt', '#8000ff', '2019-04-30', '2019-05-04', '2019-04-29 01:48:42', '2019-04-29 01:48:42'),
(6, 'leave', '#99eac4', '2019-06-21', '2019-06-24', '2019-06-11 04:08:13', '2019-06-11 04:08:13'),
(7, 't7i7i', '#645ced', '2019-06-07', '2019-06-21', '2019-06-13 04:13:56', '2019-06-13 04:13:56'),
(8, 'rain', '#400040', '2019-07-04', '2019-07-05', '2019-07-03 05:30:42', '2019-07-03 05:30:42'),
(9, 'talk', '#d04fec', '2019-07-08', '2019-07-08', '2019-07-05 04:57:04', '2019-07-05 04:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `designation_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `employee_id`, `designation_type`, `created_at`, `updated_at`) VALUES
(6, 1, 'abc', '2019-06-14 00:03:36', '2019-06-14 00:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `join_date` date NOT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` bigint(20) NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `date`, `event`, `description`, `created_at`, `updated_at`) VALUES
(1, '2019-04-10', 'Meeting', 'Related to project', '2019-04-23 00:44:30', '2019-04-23 00:44:30'),
(2, '2019-04-17', 'Holiday', 'Due to strike', '2019-04-22 00:55:06', '2019-04-23 00:55:06'),
(3, '2019-04-19', 'Meeting', '4 o\'clock', '2019-04-23 03:14:57', '2019-04-23 03:14:57'),
(4, '2019-04-17', 'Event organized by Concept', 'Event organized by Concept Event organized by Concept', '2019-04-23 04:58:58', '2019-04-23 04:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `leave_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_from` datetime NOT NULL,
  `date_to` date NOT NULL,
  `days` bigint(20) NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_type_offer` tinyint(1) NOT NULL DEFAULT '0',
  `is_approved` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `rejectionreason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `employee_id`, `leave_type`, `date_from`, `date_to`, `days`, `reason`, `leave_type_offer`, `is_approved`, `created_at`, `updated_at`, `department`, `status`, `rejectionreason`, `image`, `remark`) VALUES
(1, 5, 'sl', '2019-07-05 00:00:00', '2019-07-08', 4, 'jtyt', 0, 0, '2019-07-05 04:01:20', '2019-07-05 05:44:01', 'cmpn', 1, NULL, '1562299280.PNG', 'kkkkkkkkkkkkkkk'),
(2, 6, 'vac', '2019-07-05 00:00:00', '2019-07-30', 26, 'DLDA: 26 december', 0, 1, '2019-07-05 04:29:25', '2019-07-05 04:32:51', 'cmpn', 4, NULL, 'none', '');

-- --------------------------------------------------------

--
-- Table structure for table `managesalaries`
--

CREATE TABLE `managesalaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gross_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(203, '2014_10_12_000000_create_users_table', 1),
(204, '2014_10_12_100000_create_password_resets_table', 1),
(205, '2019_03_10_044553_create_employees_table', 1),
(206, '2019_03_10_050306_create_admins_table', 1),
(207, '2019_03_10_050652_create_cities_table', 1),
(208, '2019_03_10_050845_create_departments_table', 1),
(209, '2019_03_10_050953_create_salaries_table', 1),
(210, '2019_03_14_025243_create_shifts_table', 1),
(211, '2019_03_17_061433_create_leaves_table', 1),
(212, '2019_03_17_094258_create_totalleaves_table', 1),
(213, '2019_03_17_114000_create_profiles_table', 1),
(214, '2019_03_18_061726_create_downloads_table', 1),
(215, '2019_03_24_051434_create_managesalaries_table', 1),
(216, '2019_03_25_143643_create_designations_table', 1),
(217, '2019_04_10_113018_create_advancepayments_table', 1),
(218, '2019_04_21_111757_create_events_table', 2),
(219, '2019_04_26_023012_create_calendars_table', 3),
(220, '2019_06_13_053345_add_fields_to_users', 4),
(221, '2019_06_15_043934_add_department_to_leaves', 5),
(222, '2019_06_17_033735_add_status_to_leaves', 6),
(223, '2019_06_18_062249_add_leave_count_to_users', 7),
(224, '2019_06_19_062201_add_reason_to_leaves', 8),
(225, '2019_06_26_113548_add_late_count_to_users', 9),
(226, '2019_06_28_120249_add_vac_days_table', 10),
(227, '2019_07_04_130006_add_image_to_leaves', 11),
(228, '2019_07_05_102955_add_remark_to_leaves', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('employee1@gmail.com', '$2y$10$CThyyLdw5i/XvDSjmJ79VujiVF3AuCCvjtqnR28p0hu2m.7BnmUO.', '2019-06-21 06:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `salary_amount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `totalleaves`
--

CREATE TABLE `totalleaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `leaves_count` bigint(20) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `join_date` date NOT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `native` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sl` bigint(20) UNSIGNED NOT NULL DEFAULT '10',
  `cl` float UNSIGNED NOT NULL DEFAULT '8',
  `vac` bigint(20) UNSIGNED NOT NULL DEFAULT '35',
  `early` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `od` bigint(20) UNSIGNED NOT NULL DEFAULT '6',
  `late_count` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `leaves_count`, `username`, `image`, `first_name`, `last_name`, `role`, `email`, `password`, `status`, `phone`, `address`, `gender`, `dob`, `join_date`, `job_type`, `remember_token`, `created_at`, `updated_at`, `department`, `native`, `sl`, `cl`, `vac`, `early`, `od`, `late_count`) VALUES
(1, NULL, 'abcd', '1560483291.jpeg', 'abcd', 'efgh', 'employee', 'abcd@gmail.com', '$2y$10$DhPAagFOPtbAUP9EUfbZjOYH7NRQNxdN8BxB71lDU6CAMP8.qvZ/G', 1, 0, 'mumbai', 'male', '2019-05-06', '2019-05-06', 'test', NULL, '2019-04-16 00:56:04', '2019-07-04 05:23:43', 'cmpn', '', 40, 8, 70, 0, 6, 1),
(5, NULL, '11111', '1562297035.jpg', 'PURAV', 'RATHOD', 'admin', '2017.purav.rathod@ves.ac.in', '$2y$10$0yqUMIJfA2fg4GQPcGjlVON6wJEacwbIHK75oQzyX4CTjQHflZiau', NULL, 8469768349, 'Borivali, Mumbai', 'male', '1999-05-25', '2017-08-11', 'hod', NULL, '2019-07-05 03:23:55', '2019-07-05 03:23:55', 'cmpn', 'Silvassa', 10, 8, 35, 1, 6, NULL),
(6, NULL, '22222', '1562298146.jpg', 'Abha', 'Tewari', 'employee', 'abha.tewari@ves.ac.in', '$2y$10$FYoxhj/hE/IKNKeX21K2ZOSpLMYDpecDeCXITw9FisJmeKHeioAyi', NULL, 2222222222, 'Chembur', 'female', '1989-05-01', '2014-01-01', 'associateProfessor', NULL, '2019-07-05 03:42:26', '2019-07-05 04:32:51', 'cmpn', 'Sindhi Society', 10, 8, 9, 1, 6, NULL),
(7, NULL, '33333', '1562298262.jpg', 'Pooja', 'Nagdev', 'employee', 'pooja.nagdev@ves.ac.in', '$2y$10$/NsoOpqnenOECAc8ABPy5up4wGCzMmVHQmGRIQOVLaf5cggsC52GG', NULL, 3333333333, 'Ulhasnagar', 'female', '1989-01-05', '2014-01-01', 'associateProfessor', NULL, '2019-07-05 03:44:22', '2019-07-05 03:44:22', 'cmpn', 'Thane', 10, 8, 35, 1, 6, NULL),
(8, NULL, '44444', '1562298442.jpg', 'Anjali', 'Yeole', 'employee', 'anjali.yeole@ves.ac.in', '$2y$10$EhzboHjr8rmpm/hvMBzlVuYG3EtKzz2HzOCoSa1PRZqVR1KGN9BoK', NULL, 4444444444, 'Ulhasnagar', 'female', '1989-05-01', '2014-01-01', 'associateProfessor', NULL, '2019-07-05 03:47:22', '2019-07-05 03:47:22', 'cmpn', 'Sindhi Society', 10, 8, 35, 1, 6, NULL),
(9, NULL, '55555', '1562299644.jpg', 'Priya', 'R L', 'employee', 'priya.rl@ves.ac.in', '$2y$10$byqonFX8YKsvkZ.uozwoUOje6szNDjm4GoBTgi7.vPezA9OanJJE.', NULL, 5555555555, 'Mumbai', 'female', '1989-05-01', '2014-01-01', 'associateProfessor', NULL, '2019-07-05 04:07:24', '2019-07-05 04:07:24', 'cmpn', 'Thane', 10, 8, 35, 1, 6, NULL),
(10, NULL, '66666', '1562299769.jpg', 'Sunita', 'Sahu', 'employee', 'sunita.sahu@ves.ac.in', '$2y$10$wkWTvPlDruI6jHl.Z6W/4u.zANQna6BYqzb/G2Ohm4GT/0wsXL/1a', NULL, 6666666666, 'Sindhi Society', 'female', '1989-05-01', '2014-01-01', 'associateProfessor', NULL, '2019-07-05 04:09:29', '2019-07-05 04:09:29', 'cmpn', 'Ulhasnagar', 10, 8, 35, 1, 6, NULL),
(11, NULL, '77777', '1562299886.jpg', 'Library', 'Office', 'library', 'library@ves.ac.in', '$2y$10$WQU0NHQXIavAwudAZeAb8uXYeIPDsB7QoVArn/gG9XbvIaqM1EZV6', NULL, 7777777777, 'VESIT', 'male', '1983-05-01', '1983-05-01', 'associateProfessor', NULL, '2019-07-05 04:11:26', '2019-07-05 04:11:26', 'cmpn', 'CHEMBUR', 10, 8, 35, 1, 6, NULL),
(12, NULL, '88888', '1562299990.jpg', 'Exam', 'Department', 'examdept', 'exam@ves.ac.in', '$2y$10$J2IY.RChuLNrcxmjGzv/BeFq8xUB/GYyUIVdxNCeVOn0dPp3F6mnO', NULL, 8888888888, 'VESIT', 'male', '1983-05-01', '1983-01-01', 'associateProfessor', NULL, '2019-07-05 04:13:10', '2019-07-05 04:13:10', 'cmpn', 'CHEMBUR', 10, 8, 35, 1, 6, NULL),
(13, NULL, '99999', '1562300104.jpg', 'Hod', 'cmpn', 'hod', 'hod@ves.ac.in', '$2y$10$r1jRbQ4XJAGhUqt3KVTxleR9cfdNrCwA.2iVK1.DhZT7jnYsLDFHm', NULL, 9999999999, 'Vesit', 'male', '1983-01-01', '1983-01-01', 'associateProfessor', NULL, '2019-07-05 04:15:04', '2019-07-05 04:15:04', 'cmpn', 'Chembur', 10, 8, 35, 1, 6, NULL),
(14, NULL, '00000', '1562300220.jpg', 'Vice', 'Principal', 'vp', 'vp@ves.ac.in', '$2y$10$DSR8ukRGGuBteqMAe2S5Ie/knXp5ZHcD8A4j16mfw527PTPAC4O.2', NULL, 0, 'Vesit', 'male', '1983-01-01', '1983-01-01', 'associateProfessor', NULL, '2019-07-05 04:17:00', '2019-07-05 04:17:00', 'cmpn', 'Chembur', 10, 8, 35, 1, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vac_days`
--

CREATE TABLE `vac_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `current_sem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vac_days`
--

INSERT INTO `vac_days` (`id`, `current_sem`, `from_date`, `to_date`, `created_at`, `updated_at`) VALUES
(1, '07-2019', '2019-07-04', '2019-08-31', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendars`
--
ALTER TABLE `calendars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designations_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `managesalaries`
--
ALTER TABLE `managesalaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `totalleaves`
--
ALTER TABLE `totalleaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vac_days`
--
ALTER TABLE `vac_days`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calendars`
--
ALTER TABLE `calendars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `managesalaries`
--
ALTER TABLE `managesalaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `totalleaves`
--
ALTER TABLE `totalleaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vac_days`
--
ALTER TABLE `vac_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `designations`
--
ALTER TABLE `designations`
  ADD CONSTRAINT `designations_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
