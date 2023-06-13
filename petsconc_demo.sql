-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2023 at 04:51 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petsconc_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `descripton` text NOT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `descripton`, `mission`, `vision`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Pets Concierge boasts a full concierge service, including grooming by trained, pet-loving professionals who provide high-quality services to pets and their owners. Eventually, our services will expand to include appointment bookings, reminders of appointments with vets, vet hotels, boarding houses, and much more. \r\n\r\n \r\n\r\nWe are dedicated to your pet’s welfare. Our priority is ensuring their comfort and safety.\r\n\r\nFor those pet owners who lack the time for in-store grooming, don’t worry. Our mobile pet grooming van will come straight to your doorstep and work in the comfort of your own home.', 'Pets Concierge fosters a social, calm, caring environment and treats every pet with the love, care, and respect they deserve. We have the experience to provide a variety of styles and clips for your beloved pet. Our staff work to ensure that your pet has a pleasant and calming grooming experience. Our proven methods of A, B, and C guarantee your pet remains healthy and safe throughout the process. Using carefully-selected grooming products, we offer a quality grooming experience and ensure high customer satisfaction. In this way, we help reduce the stress your pet experiences during the grooming process.', 'Our team at Pets Concierge is passionate about caring for pets. To us, grooming is not a job; it is a career and our passion. We offer affordable pet grooming services and guarantee you will not find anything comparable at the prices we offer.\r\n\r\nEntrust your pets to the experts at Pets Concierge and have peace of mind knowing that your pet is in the best hands possible.', '324349.jpg', '2022-10-08 23:21:13', '2022-10-09 04:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`id`, `name`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'De-matting', 85, '2022-10-09 04:15:39', '2022-10-09 04:15:39', NULL),
(6, 'Tick / Flea Removal', 80, '2022-10-09 04:15:51', '2022-10-09 04:15:51', NULL),
(7, 'Tick / Flea Drops', 40, '2022-10-09 04:16:03', '2022-10-09 04:16:03', NULL),
(8, 'Creative Styling', 90, '2022-10-09 04:16:13', '2022-10-09 04:16:13', NULL),
(9, 'Gland Cleaning', 20, '2022-10-09 04:16:24', '2022-10-09 04:16:24', NULL),
(10, 'Blue Berry Facial', 35, '2022-10-09 04:16:35', '2022-10-09 04:16:35', NULL),
(11, 'Teeth Brushing', 20, '2022-10-09 04:16:46', '2022-10-09 04:16:46', NULL),
(12, 'Relaxation Massage 45 min', 65, '2022-10-09 04:16:59', '2022-10-09 04:16:59', NULL),
(13, 'Hair Trim', 100, '2022-10-09 04:17:10', '2022-10-09 04:17:10', NULL),
(14, 'Nail Cut', 30, '2022-10-09 04:17:20', '2022-10-09 04:17:20', NULL),
(15, 'Ear Cleaning', 30, '2022-10-09 04:17:36', '2022-10-09 04:17:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `pet_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `addon_id` text,
  `time` text NOT NULL,
  `comment` text,
  `size` text NOT NULL,
  `price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `date`, `status`, `user_id`, `emp_id`, `pet_id`, `package_id`, `addon_id`, `time`, `comment`, `size`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, '2022-10-23', 2, 26, 3, 11, 7, '[\"7\",\"9\",\"15\"]', '10:00', '<p>تم عمل جميع الطلبات</p>', 'Small', 240, '2022-10-23 12:45:33', '2022-10-23 17:45:33', NULL),
(20, '2022-10-23', 0, 26, NULL, 11, 8, 'null', '11:30', NULL, 'Small', 250, '2022-10-23 17:51:33', '2022-10-23 17:51:33', NULL),
(21, '2022-10-23', 1, 26, 3, 11, 8, NULL, '19:00', NULL, 'Medium', 275, '2022-10-23 12:54:55', '2022-10-23 17:54:55', NULL),
(22, '2022-11-12', 0, 29, NULL, 12, 7, '[\"5\"]', '10:00', NULL, 'Medium', 260, '2022-11-11 17:19:11', '2022-11-11 17:19:11', NULL),
(23, '2022-11-25', 0, 29, NULL, 12, 7, NULL, '10:00', NULL, 'Medium', 175, '2022-11-14 18:52:35', '2022-11-14 18:52:35', NULL),
(24, '2022-12-20', 1, 30, 3, 13, 7, NULL, '10:00', NULL, 'Small', 150, '2022-12-18 12:53:36', '2022-12-18 18:53:36', NULL),
(25, '2022-12-20', 0, 30, NULL, 13, 7, '[\"9\"]', '11:30', NULL, 'Medium', 195, '2022-12-18 21:29:01', '2022-12-18 21:29:01', NULL),
(26, '2022-12-21', 0, 30, NULL, 13, 7, NULL, '10:00', NULL, 'Small', 150, '2022-12-18 21:32:59', '2022-12-18 21:32:59', NULL),
(27, '2022-12-05', 0, 30, NULL, 13, 7, NULL, '10:00', NULL, 'Medium', 175, '2022-12-18 21:33:29', '2022-12-18 21:33:29', NULL),
(28, '2022-12-13', 0, 30, NULL, 13, 7, NULL, '10:00', NULL, 'Medium', 175, '2022-12-18 21:35:04', '2022-12-18 21:35:04', NULL),
(29, '2022-12-26', 0, 30, NULL, 13, 7, NULL, '10:00', NULL, 'Medium', 175, '2022-12-18 21:38:59', '2022-12-18 21:38:59', NULL),
(30, '2022-12-05', 0, 30, NULL, 13, 7, NULL, '11:30', NULL, 'Medium', 175, '2022-12-18 21:42:01', '2022-12-18 21:42:01', NULL),
(31, '2022-12-12', 0, 30, NULL, 13, 7, NULL, '10:00', NULL, 'Medium', 175, '2022-12-18 21:43:37', '2022-12-18 21:43:37', NULL),
(32, '2022-12-19', 0, 30, NULL, 13, 7, NULL, '10:00', NULL, 'Medium', 175, '2022-12-18 21:45:20', '2022-12-18 21:45:20', NULL),
(33, '2022-12-13', 0, 30, NULL, 13, 7, NULL, '11:30', NULL, 'Small', 150, '2022-12-18 21:47:58', '2022-12-18 21:47:58', NULL),
(34, '2022-12-12', 0, 30, NULL, 13, 7, NULL, '11:30', NULL, 'Large', 200, '2022-12-18 21:49:26', '2022-12-18 21:49:26', NULL),
(35, '2022-12-13', 0, 30, NULL, 13, 7, NULL, '17:30', NULL, 'Medium', 175, '2022-12-18 21:53:51', '2022-12-18 21:53:51', NULL),
(36, '2023-06-06', 2, 35, 9, 14, 7, '[\"14\"]', '10:00', '<p>نمت</p>', 'Large', 60, '2023-06-06 08:20:52', '2023-06-06 13:20:52', NULL),
(37, '2023-06-06', 0, 35, NULL, 14, 7, '[\"15\"]', '11:30', NULL, 'Small', 40, '2023-06-06 13:26:36', '2023-06-06 13:26:36', NULL),
(38, '2023-06-22', 0, 35, NULL, 14, 7, '[\"5\"]', '10:00', NULL, 'Medium', 260, '2023-06-08 13:57:15', '2023-06-08 13:57:15', NULL),
(39, '2023-06-17', 0, 35, NULL, 14, 7, '[\"10\"]', '10:00', NULL, 'Small', 185, '2023-06-08 14:03:24', '2023-06-08 14:03:24', NULL),
(40, '2023-06-13', 0, 35, NULL, 14, 7, NULL, '10:00', NULL, 'Medium', 175, '2023-06-08 14:04:46', '2023-06-08 14:04:46', NULL),
(41, '2023-06-09', 0, 36, NULL, 15, 8, '[\"6\",\"7\"]', '10:00', NULL, 'Medium', 395, '2023-06-08 14:20:00', '2023-06-08 14:20:00', NULL),
(42, '2023-06-09', 0, 36, NULL, 15, 8, '[\"6\",\"7\"]', '10:00', NULL, 'Medium', 395, '2023-06-08 14:20:16', '2023-06-08 14:20:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Cats', '2022-09-05 02:10:05', '2022-09-05 02:10:05', NULL),
(7, 'Dogs', '2022-09-26 00:10:03', '2022-09-26 00:10:03', NULL),
(8, 'Birds', '2023-06-08 09:23:28', '2023-06-08 14:23:28', '2023-06-08 14:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'جده', '2022-09-05 02:06:10', '2022-09-05 02:06:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `address` text,
  `lat` text,
  `lng` text,
  `password` text NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `hear_about` text,
  `status` int(11) NOT NULL DEFAULT '0',
  `code` int(11) DEFAULT NULL,
  `token` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `email`, `address`, `lat`, `lng`, `password`, `city_id`, `hear_about`, `status`, `code`, `token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 'maged', '05151511511', 'magedtest@yahoo.com', 'مركز الخياط التجاري، Prince Sultan Road, Jeddah Saudi Arabia', '21.5723285', '39.1435852', '$2y$10$cS.NNtYpacxs.tj5WG8RPume8nrna01oMbTiOWMkZ7DbwX9DntgXO', 8, NULL, 0, NULL, NULL, '2023-06-05 15:03:52', '2023-06-05 20:03:52', '2023-06-05 20:03:52'),
(18, 'Ali Swesy', '+966051451515', 'aliswesy142@gmail.com', 'مركز الخياط التجاري، Jeddah Saudi Arabia', '21.5489913', '39.1510188', '$2y$10$Vqhjm7eJZvowFfhsUdl6DOZS6SkbVQ/16F2OJf/i6RGqBBVXXlAv2', 8, NULL, 0, NULL, NULL, '2023-06-05 15:05:30', '2023-06-05 20:05:30', '2023-06-05 20:05:30'),
(19, 'R', '00966505581796', 'info@petsconciergeksa.com', 'Al Khalidiyyah, Jeddah Saudi Arabia', '21.5593571', '39.1342301', '$2y$10$6hzWwgFW4VnItZHjFNO6OuUifvlh00a3ncq6p7sU6m7NgxTCNfFb6', NULL, NULL, 0, NULL, NULL, '2023-06-05 15:05:33', '2023-06-05 20:05:33', '2023-06-05 20:05:33'),
(20, 'heba', '01278780466', 'hebaelrawy86@gmail.com', NULL, NULL, NULL, '$2y$10$joWGHERU.lSnTolfgxbJ0eAbNKiR6pKK6UA628SMbXNpsr1toT1Si', NULL, NULL, 0, NULL, NULL, '2023-06-05 15:05:08', '2023-06-05 20:05:08', '2023-06-05 20:05:08'),
(21, 'admin', '+966051451515', 'aliswesy142@gmail.com', NULL, NULL, NULL, '$2y$10$pknsQS0qcYqxO/KhGoDBvufaluzW/OJdDEdepX6uwTUrf67FGhMEy', NULL, NULL, 0, NULL, NULL, '2023-06-05 15:04:51', '2023-06-05 20:04:51', '2023-06-05 20:04:51'),
(22, 'Roha', '009665342116', 'info@petsconciergeksa.com', NULL, NULL, NULL, '$2y$10$5GSqqcitcrn9kdu.MZnkROo5egKMk3YNEEFe/4VzBU2fs/E1xWplu', NULL, NULL, 0, NULL, NULL, '2023-06-05 15:04:44', '2023-06-05 20:04:44', '2023-06-05 20:04:44'),
(26, 'test', '01158640459', 'hamedmaged76@gmail.com', 'Jeddah Saudi Arabia', '21.485811', '39.19250479999999', '$2y$10$LDIGHqecjx2JAyBKHYckF.2.7pOrw9k7Pg6idxHoZRSAGn1d5LNgy', NULL, NULL, 1, 43342, NULL, '2022-10-23 13:21:45', '2022-10-23 18:21:45', NULL),
(27, '‪Designer Hany‬‏', '+201028974729', 'designer.hany2014@gmail.com', NULL, NULL, NULL, '$2y$10$wrX0ulOUQQbwKOedu8BNtuIdw4eQJWZSR4B8KmN5g67lp4BOTBdSK', NULL, NULL, 0, 45259, NULL, '2023-06-05 15:04:38', '2023-06-05 20:04:38', '2023-06-05 20:04:38'),
(28, 'omar', '0504656798', 'basomar6@gmail.com', NULL, NULL, NULL, '$2y$10$tJI2GwqSjYLmyNxOHUwaKuBa3FYLt.d5w1FHtAIj2yuF2QAzwOo/y', NULL, NULL, 1, 15997, NULL, '2023-06-05 15:04:24', '2023-06-05 20:04:24', '2023-06-05 20:04:24'),
(29, 'R', '0505581796', 'alnowaiseroha@gmail.com', 'Al Khalidiyyah, Jeddah Saudi Arabia', '21.5593571', '39.1342301', '$2y$10$c.VjWvgv0FUZsjdmvKlEHun7Wgf0.H7hKGoQH7W3Wv/ECNgrZ2Xnq', NULL, NULL, 1, 80285, NULL, '2022-11-11 11:19:00', '2022-11-11 17:19:00', NULL),
(30, 'محمد مصطفي عبد الجليل', '+966578951369', 'm.abdelgelel95@yahoo.com', '387H+43Q, Al Manteqah Al Oula, Nasr City, Cairo Governorate 4450202, Egypt', '30.062706', '46.738586', '$2y$10$A7uF7etjSIjgb2BvQ79vweoX3isjYdLqoo73r3VrdWkwlV5wsDDUy', NULL, NULL, 1, 99717, NULL, '2023-06-05 15:04:17', '2023-06-05 20:04:17', '2023-06-05 20:04:17'),
(31, 'test', '+966569944710', 'msbasb@gmail.com', NULL, NULL, NULL, '$2y$10$GkUtksOO7QuKFor4gtnPC.zp5loXdhMoKOyjMLPM9O6OMM/BhfdNO', NULL, NULL, 0, 62317, NULL, '2023-06-05 15:05:37', '2023-06-05 20:05:37', '2023-06-05 20:05:37'),
(32, 'محمد مصطفي عبد الجليل', '+966578951444', 'moh.abdelgelel95@gmail.com', NULL, NULL, NULL, '$2y$10$hhdlmIHNpBX.aRSJ1zGJpuYLN/uV5xV4Y.KEK1QBfkTi9FwE45/im', NULL, NULL, 0, 55267, NULL, '2023-06-05 15:04:05', '2023-06-05 20:04:05', '2023-06-05 20:04:05'),
(33, 'test', '+966506994471', 'alliancevisions@gmail.com', NULL, NULL, NULL, '$2y$10$.ldEI2UeGPfYUWdBeIekT.sEmXCd8ROownz7liMa3YEymktb2jwsi', NULL, NULL, 1, 45282, NULL, '2022-12-19 14:07:08', '2022-12-19 20:07:08', NULL),
(34, 'Helen Valentine', '+1 (318) 893-9857', 'feki@mailinator.com', NULL, NULL, NULL, '$2y$10$e0dQDfSmKj2QmXqd9pZF3.CyveiWRWxDcaFM2zdaBm8Uz6ScfwYL6', NULL, NULL, 0, 56763, NULL, '2023-06-06 12:00:17', '2023-06-06 12:00:17', NULL),
(35, 'Motaz', '+1 (793) 876-8272', 'motazhesham01@gmail.com', 'Saudi Arabia', '23.885942', '45.079162', '$2y$10$StxnFA1YE4vzuMFYUlJAHehw6UYQkJQAdAa.A9NqT7mubo2kh9Zim', NULL, NULL, 1, 79341, NULL, '2023-06-06 08:06:50', '2023-06-06 13:06:50', NULL),
(36, 'Motaz Hesham', '33333333', 'nedvd89@gmail.com', 'Saudi Arabia', '23.7703685533346', '45.07366883593751', '$2y$10$AyP/cPHelZsiaQWPo7RFG.uPmT8yPnw44Lrpt3J2TmT.OCmxoo54O', NULL, NULL, 1, 26640, NULL, '2023-06-08 09:15:15', '2023-06-08 14:15:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `client_id`, `appointment_id`, `flag`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', 26, 19, 1, '2022-10-23 15:30:19', '2022-10-23 20:30:19', NULL),
(4, 'qweqwe', 35, 36, 0, '2023-06-06 13:25:38', '2023-06-06 13:25:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(3, 'Ali Swesy', 'aliswesy142@gmail.com', 'test', 'test message', '2022-09-05 02:26:38', '2022-09-05 02:26:38'),
(4, 'admin', 'aliswesy142@gmail.com', 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras at mauris blandit, feugiat massa nec, tempor neque. Proin pellentesque vehicula libero id dapibus. Nullam purus dolor, efficitur nec risus et, porttitor maximus lorem. Sed pharetra dolor vel faucibus eleifend. Ut pulvinar arcu at turpis tincidunt aliquet. Nullam tempor pretium tincidunt. Donec molestie, lectus sed viverra venenatis, massa purus tincidunt velit, eget blandit diam augue eu felis. Nunc at odio hendrerit, tristique leo quis, luctus lectus. Nullam non volutpat dolor, sit amet porttitor enim. Suspendisse potenti. Vestibulum ultricies neque et lacus semper lobortis.', '2022-09-26 00:08:51', '2022-09-26 00:08:51'),
(5, 'omar ahmed', 'elrubyomar@gmail.com', 'this is subject', 'message', '2022-12-15 22:13:38', '2022-12-15 22:13:38'),
(6, 'omar ahmed', 'elrubyomar@gmail.com', 'this is subject', 'this is meassage', '2022-12-16 02:00:32', '2022-12-16 02:00:32'),
(7, 'omar ahmed', 'elrubyomar@gmail.com', 'this is subject', 'message', '2022-12-16 02:02:04', '2022-12-16 02:02:04'),
(8, 'omar ahmed', 'elruby@gmail.com', 'subject teeest', 'message teest', '2022-12-16 02:04:13', '2022-12-16 02:04:13'),
(9, 'محمد عبدالجليل', 'mohamedali@gmail.com', 'this is subject', 'mmmmmmmmmmmmm', '2022-12-16 02:21:30', '2022-12-16 02:21:30'),
(10, 'omar ahmed', 'elruby@gmail.com', 'this is subject', 'this is message', '2022-12-16 17:45:21', '2022-12-16 17:45:21'),
(11, 'محمد عبدالجليل', 'elrubyomar@gmail.com', 'this is subject', 'ssssssss', '2022-12-16 17:46:24', '2022-12-16 17:46:24'),
(12, 'محمد عبدالجليل', 'elrubyomar@gmail.com', 'this is subject', 'sssssssssssssss', '2022-12-16 17:47:08', '2022-12-16 17:47:08'),
(13, 'محمد عبدالجليل', 'elrubyomar@gmail.com', 'this is subject', 'شششششششششششششش', '2022-12-16 17:57:45', '2022-12-16 17:57:45'),
(14, 'محمد عبدالجليل', 'elrubyomar@gmail.com', 'this is subject', 'ssssssssssss', '2022-12-16 18:01:28', '2022-12-16 18:01:28'),
(15, 'محمد عبدالجليل', 'aaaaaaa@gmail.com', 'this is subject', 'eeeeeeeeeeeeeeee', '2022-12-16 18:05:06', '2022-12-16 18:05:06'),
(16, 'محمد عبدالجليل', 'aaaaaaa@gmail.com', 'this is subject', 'eeeeeeeeeeeeeeee', '2022-12-16 18:07:30', '2022-12-16 18:07:30'),
(17, 'محمد عبدالجليل', 'aaaaaaa@gmail.com', 'this is subject', 'eeeeeeeeeeeeeeee', '2022-12-16 18:08:36', '2022-12-16 18:08:36'),
(18, 'محمد عبدالجليل', 'aaaaaaa@gmail.com', 'this is subject', 'eeeeeeeeeeeeeeee', '2022-12-16 18:10:00', '2022-12-16 18:10:00'),
(19, 'mohamed abdelgelel', 'm.abdelgelel95@yahoo.com', 'this subject test', 'this is message teeest', '2022-12-16 18:10:27', '2022-12-16 18:10:27'),
(20, 'Vera Wiley', 'wazifypir@mailinator.com', 'Vel sint nemo omnis', 'Facere hic voluptas', '2023-06-06 13:30:56', '2023-06-06 13:30:56'),
(21, 'Charlotte Randall', 'vehexo@mailinator.com', 'Est temporibus corpo', 'Qui itaque laborum', '2023-06-08 14:10:42', '2023-06-08 14:10:42'),
(22, 'ggggggg', 'ggggg@Ggg.gg', 'qwgqwg', 'gwqgqwg', '2023-06-08 14:10:58', '2023-06-08 14:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'maged', 'maged_9595@yahoo.com', '$2y$10$q1isCMjzF1D1kB5L7/npFO3rXTxS1G4etcrOcbYU1vRGrbTOwQ/v.', '2022-10-23 12:43:59', '2022-09-11 18:22:33', NULL),
(4, 'Ahmad', 'a@a.com', '$2y$10$WnT8PhT/D4QDKfUi7UXYpupwK0G79jpLHKAxhmHH4JV7NQWiUqObC', '2023-06-05 15:02:09', '2023-06-05 20:02:09', '2023-06-05 20:02:09'),
(5, 'Ahmad', 'alliancevisions@gmail.com', '$2y$10$pk58dnm8vvzs35SyA4eD8OuuTovLoAM5B/56bq450Qaynl6t2Uo/y', '2023-06-05 20:02:30', '2023-06-05 20:02:30', NULL),
(6, 'Liberty Holman', 'vasum@mailinator.com', '$2y$10$7tKvrw9C/rELuWRTt/GMX.2wbH79rm1mRpvyMbNFEDaNVkYlq8q2y', '2023-06-06 12:20:24', '2023-06-06 12:20:24', NULL),
(7, 'test', 'test@test.com', '$2y$10$d2yCVczo4q9FWsG1sysZQ.cioZ717CYjS6f2PAdw95UxFI5Ia8qNe', '2023-06-06 13:10:00', '2023-06-06 13:10:00', NULL),
(8, 'motaz', 'motazhesham@gmail.com', '$2y$10$1vcL.LP4syL1XS2P2s8sQOQW2jXbceZlyF.M7NsR/GeTYgjI56Ib6', '2023-06-06 08:11:34', '2023-06-06 13:11:34', '2023-06-06 13:11:34'),
(9, 'motaz', 'motazhesham01@gmail.com', '$2y$10$.UXPR4/25TS/Xc4NOuKDSu.tq0V2N1jFbtF2n0l.YWEzXbziu6u2G', '2023-06-06 13:11:43', '2023-06-06 13:11:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `category_id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 6, '484609.jpg', '2022-10-17 10:09:30', '2022-10-17 15:09:30', '2022-10-17 15:09:30'),
(4, 7, '304688.jpg', '2022-09-25 19:10:21', '2022-09-26 00:10:21', '2022-09-26 00:10:21'),
(5, 7, '250375.jpg', '2022-09-26 00:10:28', '2022-09-26 00:10:28', NULL),
(6, 8, '722018.jpg', '2023-06-06 07:23:56', '2023-06-06 12:23:56', '2023-06-06 12:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `small_price` float NOT NULL,
  `mid_price` float NOT NULL,
  `hi_price` float NOT NULL,
  `services_id` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `small_price`, `mid_price`, `hi_price`, `services_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'BASIC', 150, 175, 200, '[\"11\",\"12\",\"13\",\"14\"]', '2023-06-06 08:33:05', '2023-06-06 13:33:05', NULL),
(8, 'DELUXE', 250, 275, 300, '[\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\"]', '2022-10-09 04:11:50', '2022-10-09 04:11:50', NULL),
(9, 'PLATINUM', 325, 350, 375, '[\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\"]', '2022-10-09 04:13:10', '2022-10-09 04:13:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `image` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `name`, `age`, `gender`, `category_id`, `client_id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'logy', 5, 'Female', 6, 16, '209284.jpg', '2022-09-05 23:27:01', '2022-09-05 02:10:52', NULL),
(7, 'Dodo', NULL, 'Female', 6, 16, '369382.jpg', '2022-09-06 04:59:27', '2022-09-06 04:59:27', NULL),
(8, 'test', 20, 'Male', 6, 17, '237251.jpg', '2022-09-11 14:19:16', '2022-09-11 14:19:16', NULL),
(9, 'Brownie', 9, 'Male', 6, 19, '745422.psd', '2022-09-18 15:20:45', '2022-09-18 15:20:45', NULL),
(10, 'dogo', 10, 'Male', 6, 18, '265800.jpg', '2022-09-23 02:00:38', '2022-09-23 02:00:38', NULL),
(11, 'acsa', 324, 'Female', 7, 26, NULL, '2022-10-23 17:14:09', '2022-10-23 17:14:09', NULL),
(12, 'B', 10, 'Male', 7, 29, NULL, '2022-11-11 17:18:02', '2022-11-11 17:18:02', NULL),
(13, 'test', 2, 'Male', 7, 30, '989447.jpg', '2022-12-18 18:45:07', '2022-12-18 18:45:07', NULL),
(14, 'test', 1, 'Male', 6, 35, '528748.jpg', '2023-06-06 13:04:09', '2023-06-06 13:04:09', NULL),
(15, 'test', 2, 'Male', 6, 36, '748906.jpg', '2023-06-08 14:17:15', '2023-06-08 14:17:15', NULL),
(16, 'qqqq', 3, 'Female', 7, 36, '752492.jpg', '2023-06-08 14:23:37', '2023-06-08 14:23:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text,
  `image` text NOT NULL,
  `price` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `description`, `image`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Fluff Dry', 'Fluff Dry', '434322.jpg', 60, '2022-10-08 22:53:56', '2022-10-09 03:53:56', '2022-10-09 03:53:56'),
(8, 'test service', 'q', '736417.jpg', 8, '2022-10-08 22:53:59', '2022-10-09 03:53:59', '2022-10-09 03:53:59'),
(9, 'Tail Hair Trim', 'leo quis, luctus lectus. Nullam non volutpat dolor, sit amet porttitor enim. Suspendisse potenti. Vestibulum ultricies neque et lacus semper lobortis.', '580632.jpg', NULL, '2022-10-08 22:54:02', '2022-10-09 03:54:02', '2022-10-09 03:54:02'),
(10, 'shower', 'test', '578589.jpg', NULL, '2022-10-08 22:54:05', '2022-10-09 03:54:05', '2022-10-09 03:54:05'),
(11, 'Bath', 'Bath', '545462.jpg', NULL, '2022-10-09 03:54:49', '2022-10-09 03:54:49', NULL),
(12, 'Shampoo', 'Shampoo - Depending On Pet Skin', '130858.jpg', NULL, '2022-10-08 23:18:52', '2022-10-09 04:18:52', NULL),
(13, 'Brush', 'Brush', '721215.jpg', NULL, '2022-10-09 03:55:22', '2022-10-09 03:55:22', NULL),
(14, 'Fluff Dry', 'Fluff Dry', '822693.jpg', NULL, '2022-10-09 03:55:35', '2022-10-09 03:55:35', NULL),
(15, 'Hair Cut', 'Hair Cut, Trim Or Shave', '783986.jpg', NULL, '2022-10-08 23:20:46', '2022-10-09 04:20:46', NULL),
(16, 'Face Trim', 'Face Trim', '927308.jpg', NULL, '2022-10-09 03:56:08', '2022-10-09 03:56:08', NULL),
(17, 'Paws Trim', 'Paws Trim', '860786.jpg', NULL, '2022-10-09 03:56:21', '2022-10-09 03:56:21', NULL),
(18, 'Sanitary Trim', 'Sanitary Trim', '261804.jpg', NULL, '2022-10-09 03:56:41', '2022-10-09 03:56:41', NULL),
(19, 'Tail Hair Trim', 'Tail Hair Trim', '513137.jpg', NULL, '2022-10-09 03:56:56', '2022-10-09 03:56:56', NULL),
(20, 'Nail Cut', 'Nail Cut', '506396.jpg', NULL, '2022-10-09 03:57:17', '2022-10-09 03:57:17', NULL),
(21, 'Ear Cleaning', 'Ear Cleaning', '117203.jpg', NULL, '2022-10-09 03:57:25', '2022-10-09 03:57:25', NULL),
(22, 'Tear Stain Remover', 'Tear Stain Remover', '457477.jpg', NULL, '2022-10-09 03:57:38', '2022-10-09 03:57:38', NULL),
(23, 'Teeth Brushing', 'Teeth Brushing', '60299.jpg', NULL, '2022-10-09 03:57:50', '2022-10-09 03:57:50', NULL),
(24, 'Gland Cleaning', 'Gland Cleaning', '520699.jpg', NULL, '2022-10-09 03:58:12', '2022-10-09 03:58:12', NULL),
(25, 'Cleo Mcintosh', 'Omnis quia possimus', '848102.jpg', NULL, '2023-06-06 07:33:37', '2023-06-06 12:33:37', '2023-06-06 12:33:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$q1isCMjzF1D1kB5L7/npFO3rXTxS1G4etcrOcbYU1vRGrbTOwQ/v.', 0, 'g67HLWNDW7BHJ43EtXqkLIVjHr24ibNc9050pazwuAkcGW2UD5jzhD3wmGZN', NULL, '2022-04-08 01:58:28', NULL),
(2, 'wezza', 'wezza@gmail.com', NULL, '$2y$10$StxnFA1YE4vzuMFYUlJAHehw6UYQkJQAdAa.A9NqT7mubo2kh9Zim', 1, NULL, '2023-06-06 15:24:42', '2023-06-06 15:24:42', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
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
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
