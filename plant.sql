-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 10:49 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plant`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertiements`
--

CREATE TABLE `advertiements` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertiements`
--

INSERT INTO `advertiements` (`id`, `image`, `url`, `date`, `created_at`, `updated_at`) VALUES
(30, '1592214624.jpg', 'https://greengardian-plant-nursery.webnode.com/advertistment/', '2020-06-18', '2020-06-15 04:20:24', '2020-06-15 04:20:24'),
(31, '1592214726.jpg', 'https://greengardian-plant-nursery.webnode.com/advertistment/', '2020-06-20', '2020-06-15 04:22:06', '2020-06-15 04:22:06'),
(32, '1592214740.jpg', 'https://greengardian-plant-nursery.webnode.com/advertistment/', '2020-06-02', '2020-06-15 04:22:20', '2020-06-15 04:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `hotline` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `hotline`, `email`, `fax`, `created_at`, `updated_at`) VALUES
(1, '0114532345', 'np.madushamethsiri81@gmail.com', '0119234543', '2020-01-12 04:03:29', '2020-01-12 04:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_costs`
--

CREATE TABLE `delivery_costs` (
  `id` int(10) UNSIGNED NOT NULL,
  `homeTown` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_cost` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_costs`
--

INSERT INTO `delivery_costs` (`id`, `homeTown`, `delivery_cost`, `created_at`, `updated_at`) VALUES
(11, 'Kalawana', 600, '2020-06-15 10:17:30', '2020-06-15 10:17:30'),
(9, 'Ehaliyagoda', 500, '2020-06-15 10:16:57', '2020-06-15 10:16:57'),
(10, 'Rathnapura', 500, '2020-06-15 10:17:20', '2020-06-15 10:17:20'),
(12, 'Belihuloya', 600, '2020-06-15 10:17:55', '2020-06-15 10:17:55'),
(13, 'Kuruwita', 700, '2020-06-15 10:18:07', '2020-06-15 10:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pno` int(11) NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm` tinyint(10) NOT NULL DEFAULT 0,
  `message` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `dob`, `email`, `pno`, `address`, `gender`, `experience`, `image`, `confirm`, `message`, `created_at`, `updated_at`) VALUES
(8, 'nemo', '19980-10-12', 'lchamantha@gmail.com', 779741412, 'no26,hettimulla,kotadeniyawa.', 'male', 'no', '1592236956.jpg', 1, 'test', '2020-06-15 10:32:36', '2020-06-15 23:58:19'),
(9, 'madusha', '1990-12-23', 'np.madushamethsiri81@gmail.com', 779741412, 'no6,Unawatuna,Galle', 'male', 'have', '1592237033.jpg', 1, 'test', '2020-06-15 10:33:53', '2020-06-15 10:35:32'),
(10, 'Hiruni', '1995-10-21', 'kabil@gmail.com', 711234567, 'no6,Unawatuna,Galle', 'male', 'have', '1592237086.jpg', 0, NULL, '2020-06-15 10:34:46', '2020-06-15 10:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedno` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `supplierid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `created_at`, `updated_at`) VALUES
(3, '1588334538.jpg', '2019-12-28 10:53:39', '2020-05-01 06:32:18'),
(6, '1588334552.jpg', '2019-12-28 11:09:04', '2020-05-01 06:32:32'),
(15, '1588334565.jpg', '2020-01-03 12:11:21', '2020-05-01 06:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `plantname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(100) NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fertilizer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sproutingtime` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `plantname`, `price`, `amount`, `image`, `fertilizer`, `sproutingtime`, `created_at`, `updated_at`) VALUES
(8, 'Red rose', '100', 90, '1579086032.jpg', 'osmocote 20.20.20', '3 months', '2020-01-15 05:28:26', '2020-06-16 00:12:14'),
(9, 'Aglaonema Foxii', '500', 828, '1579086273.jpg', 'CS agro bloom compost', '2 months', '2020-01-15 05:34:33', '2020-06-15 00:39:35'),
(10, 'Peperomia', '300', 164, '1579086433.jpg', 'garden vitalizer 35ml', '3 months', '2020-01-15 05:37:13', '2020-12-03 23:26:27'),
(11, 'Euphorbia', '250', 185, '1579086506.jpg', 'Grow more k44', '5months', '2020-01-15 05:38:26', '2020-01-16 01:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_25_084022_create_items_table', 2),
(4, '2019_12_27_051215_create_managewebsites_table', 3),
(5, '2019_12_27_052741_create_adminmanagewebsites_table', 4),
(6, '2019_12_28_161412_create_images_table', 5),
(7, '2020_01_12_070033_create_paragraphs_table', 6),
(8, '2020_01_12_092617_create_contacts_table', 7),
(9, '2020_01_14_152614_create_advertiements_table', 8),
(10, '2019_11_20_132625_create_employee_table', 9),
(11, '2020_01_15_085558_create_suppliers_table', 10),
(14, '2020_03_17_130107_create_orders_table', 11),
(15, '2020_03_18_143817_create_payments_table', 12),
(16, '2020_05_01_093049_create_delivery_costs_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `refNo` int(11) DEFAULT NULL,
  `productId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'notconfirmed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `quantity`, `price`, `refNo`, `productId`, `customerId`, `status`, `created_at`, `updated_at`) VALUES
(51, 12, 100, 60, 8, 20, 'confirmed', '2020-05-01 02:31:00', '2020-05-01 02:31:00'),
(52, 15, 500, 60, 9, 20, 'confirmed', '2020-05-01 02:31:16', '2020-05-01 02:31:16'),
(85, 10, 500, 72, 9, 15, 'confirmed', '2020-06-15 22:36:06', '2020-06-15 22:36:06'),
(84, 80, 100, 72, 8, 15, 'confirmed', '2020-06-15 22:35:49', '2020-06-15 22:35:49'),
(81, 80, 100, 70, 8, 15, 'confirmed', '2020-06-15 22:16:11', '2020-06-15 22:16:11'),
(65, 10, 100, 65, 8, 20, 'confirmed', '2020-05-01 06:59:42', '2020-05-01 06:59:42'),
(89, 10, 100, NULL, 8, 15, 'notconfirmed', '2020-12-03 23:26:07', '2020-12-03 23:26:07'),
(78, 100, 100, 69, 8, 15, 'confirmed', '2020-06-15 05:43:12', '2020-06-15 05:43:12'),
(86, 50, 100, 72, 8, 15, 'confirmed', '2020-06-15 23:59:27', '2020-06-15 23:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `paragraphs`
--

CREATE TABLE `paragraphs` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstparagraph` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondparagraph` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paragraphs`
--

INSERT INTO `paragraphs` (`id`, `firstparagraph`, `secondparagraph`, `created_at`, `updated_at`) VALUES
(1, 'Our family-run nursery has an enviable reputation for growing premier Trees, Shrubs and for providing an extensive range of Sundries and Gift for the discerning gardener. We Offer the finest Shrubs,Conifers,Ornamental trees,Large specimen trees,Climbers,Roses,Herbs and Vegetables.', 'We produce plants for our retail garden center,landscape installations,commercial installation,wholesale, and fundraising program.See what is new at GreenGuardian nursery and stay up to date all upcoming and the behind the scenes actions.', '2020-01-12 01:33:09', '2020-01-15 05:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('np.madushamethsiri81@gmail.com', '$2y$10$H9rOjplQfJXJhpnrCtMzv.aHm/XP2QH9b4qd2kXq600BA5TY0HT4a', '2020-06-15 04:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `subTotal` double NOT NULL,
  `deliveryCost` double NOT NULL,
  `homeTown` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliveryAddress` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerId` int(11) NOT NULL,
  `payment` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'notchecked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `subTotal`, `deliveryCost`, `homeTown`, `deliveryAddress`, `customerId`, `payment`, `status`, `created_at`, `updated_at`) VALUES
(65, 1000, 1150, 'Eheliyagoda', '56, Eheliyagoda', 20, '2150', 'checked', '2020-05-01 07:00:13', '2020-05-01 07:19:40'),
(72, 18000, 500, 'Ehaliyagoda', 'no89,eheligoda,rathanapu', 15, '18500', 'checked', '2020-06-16 00:00:25', '2020-06-16 00:00:52'),
(70, 8000, 500, 'Ehaliyagoda', 'no34\r\nehaliyagda\r\nrathnapura', 15, '8500', 'checked', '2020-06-15 22:18:06', '2020-06-15 22:34:26'),
(71, 9000, 600, 'Belihuloya', 'no 23\r\nbelihuloya\r\nbalangoda', 15, '9600', 'notchecked', '2020-06-15 22:33:57', '2020-06-15 22:33:57'),
(60, 8700, 1800, 'Rathnapura', '56, Main Road, Eheliyagoda', 20, '10500', 'checked', '2020-05-01 02:31:56', '2020-05-01 02:39:55'),
(66, 100, 1000, 'Galle', 'no 26,hetti,ulla,kotadeniyawa', 15, '1100', 'checked', '2020-05-28 09:33:22', '2020-05-28 09:35:15'),
(67, 2900, 900, 'Rathnapura', 'no 26,hettimulla,kotadeniyawa', 15, '3800', 'checked', '2020-05-28 21:10:48', '2020-05-28 21:11:25'),
(68, 200, 900, 'Rathnapura', 'no 26,hettimulla,kotadeniyawa', 15, '1100', 'checked', '2020-06-15 04:32:13', '2020-06-15 10:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pno` int(11) NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plantname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plantprice` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm` tinyint(10) NOT NULL DEFAULT 0,
  `message` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `pno`, `address`, `plantname`, `plantprice`, `quantity`, `image`, `confirm`, `message`, `created_at`, `updated_at`) VALUES
(6, 'madusha', 'np.madushamethsiri81@gmail.com', 1231234321, 'no26,hettimulla,kotadeniyawa.', 'Aglaonema Foxii plant', '10', '12', '1590718657.png', 1, 'confirm', '2020-05-28 20:47:37', '2020-06-15 10:25:40'),
(7, 'chamantha', 'lchamantha@gmail.com', 779741412, 'no6,Unawatuna,Galle', 'Aglaonema Foxii plant', '100', '50', '1592236264.jpg', 1, 'confirm', '2020-06-15 10:21:04', '2020-06-15 10:26:17'),
(8, 'madusha', 'np.madushamethsiri81@gmail.com', 711234567, 'no26,hettimulla,kotadeniyawa.', 'Aglaonema Foxii', '200', '100', '1592236305.jpeg', 0, NULL, '2020-06-15 10:21:45', '2020-06-15 10:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` tinyint(1) DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `address`, `image`, `password`, `usertype`, `remember_token`, `created_at`, `updated_at`) VALUES
(14, 'chamantha', 'lchamantha@gmail.com', '071-7110866', 'no26,hettimulla,kotadeniyawa.', '1579088811.jpg', '$2y$10$dDwS.iovUpkeOU5Z1mg9U.imI1FHUbRHD9UxIw74qgtnMp/JD2AbO', 0, 'I1XED5czcC5CvOf3E1cRwBMiFnDU5w6G9QkeJfBLrdv48kOmKhY1No3oA5Zz', '2019-12-18 00:25:57', '2020-01-15 06:16:51'),
(15, 'Madusha Methsiri', 'np.madushamethsiri81@gmail.com', '071-7110866', 'no26,hettimulla,meerigama', '1588267916.jpg', '$2y$10$e1UAVqlNqEj6d.9RQsIpyumFCaijbL45QRYI1KQ53XG/XxBGOo7OG', 1, '9muuRhS4ZIsU3TfdFrbtNyyBGIMZO6GitsUyovV3SMZgtIsZmAYGC1RimgJz', '2019-12-18 00:27:30', '2020-05-01 00:41:18'),
(19, 'Hiruni', 'hiruni@gmail.com', '0776895244', 'no6,Unawatuna,Galle', '1579160528.jpg', '$2y$10$5MYD6f923esz8tvxDdOa/uw5CqeaSOkEv/VWZ7k1RxEp3mE4JEkH.', 1, 'M4MMFRXxLcIxGLNslD3d8KULWdQhi4eqGOAigDVUIPeLkdCUQAgptnyQn73y', '2020-01-15 23:43:19', '2020-01-16 02:12:08'),
(20, 'Hansana Pushpakumara', 'hansanapushpakumara@gmail.com', '0713022546', 'Bandarwela road, Badulla', '1588319858.jpg', '$2y$10$klgNltyrZaPDBLW6QzX01ujleZWrhnuO5g7w8qjXEgfoAMlAdeMXC', 1, 'NBs1GLAFYo3rIuKrv49iL5oMaqIpsMEgBJUbMnZ1np1TwVu2MjwzYJb6NQkK', '2020-05-01 02:25:41', '2020-05-01 02:27:38'),
(21, 'newuser', 'np.madushamethsiri102@gmail.com', '0717110866', 'no26,hettimulla,kotadeniyawa.', NULL, '$2y$10$sNSVe8qXfOPU8Zw7q6sZJ.smKYNS/0T67xj94B.Ay6YyYCCR5EqHO', 1, 'U2ZuuucL3J6JVN6tCxLHVZt0fWWaZ92Fs9OBnPcRU789z5H64JE6vZUKVJW0', '2020-06-15 05:34:04', '2020-06-15 05:34:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertiements`
--
ALTER TABLE `advertiements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_costs`
--
ALTER TABLE `delivery_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedno`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_name_unique` (`plantname`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paragraphs`
--
ALTER TABLE `paragraphs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertiements`
--
ALTER TABLE `advertiements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_costs`
--
ALTER TABLE `delivery_costs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `paragraphs`
--
ALTER TABLE `paragraphs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
