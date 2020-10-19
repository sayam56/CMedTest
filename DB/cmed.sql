-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2020 at 05:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmed`
--

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
(2, '2020_10_17_120141_create_presctiptions_table', 2),
(3, '2014_10_12_100000_create_password_resets_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('asayam163071@bscse.uiu.ac.bd', '$2y$10$WG8Av8KchtOdTfWWf7VQAurHdE81.VB5u8GsHEF8V07QlNHC5Nsvm', '2020-10-17 11:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uploaderID` int(10) UNSIGNED NOT NULL,
  `prescription_date` date NOT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_age` double NOT NULL,
  `patient_gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_diagnosis` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_medicines` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nextVisit_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `uploaderID`, `prescription_date`, `patient_name`, `patient_age`, `patient_gender`, `patient_diagnosis`, `patient_medicines`, `nextVisit_date`, `created_at`, `updated_at`) VALUES
(1, 1, '2015-06-20', 'Sample user', 19, 'Male', 'Acute bronchitis', 'Mucinex', '2015-07-20', NULL, NULL),
(2, 1, '2016-06-20', 'Sample user 2', 20, 'Female', 'Asthma', 'Fluticasone (Flovent HFA),Budesonide (Pulmicort Flexhaler)', '2016-07-20', NULL, NULL),
(3, 1, '2021-06-20', 'Sample user3', 39, 'Male', 'Diabetes, Hyperlipidemia ,Hypertension', 'Sulfonylureas, Thiazolidinediones', '2015-07-20', NULL, NULL),
(4, 1, '2020-10-05', 'patient 1', 45, 'Male', 'Severe Headache, Backpain', 'exercise and rest', '2020-10-22', NULL, NULL),
(5, 1, '2020-10-05', 'patient 2', 55, 'Male', 'Knee pain, Severed knee cap', '100% rest with minimal medicattion', '2020-10-21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ali Iktider Sayam', 'asayam163071@bscse.uiu.ac.bd', NULL, '$2y$10$2GmU70zXxaIgmDwsUIKNge6CiR3GYZutlyxgXkpNwGeWuvePmXN62', NULL, '2020-10-17 11:22:08', '2020-10-17 11:22:08'),
(2, 'Test User 1', 'sample@doc.com', NULL, '$2y$10$7tF.h8puHXOUh6QhjfYBeOjKYlaWfoZ6mru6ZD/7IRU5lvvDF/IwW', NULL, '2020-10-17 12:14:06', '2020-10-17 12:14:06'),
(3, 'Test User 2', 'sample2@doc.com', NULL, '$2y$10$m7Y9//toF184QQCJWg5SkOkI72ZTqXiQOy7wlam/2ZjWqhs7J7QRe', NULL, '2020-10-17 12:23:20', '2020-10-17 12:23:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
