-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 08:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy1`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `doctor_name` varchar(255) DEFAULT NULL,
  `doctor_address` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact_number`, `address`, `doctor_name`, `doctor_address`, `created_at`, `updated_at`) VALUES
(5, 'Mizan', '2132243', 'Rajbari', 'Nadia', 'Dhaka', '2024-02-24 16:47:53', '2024-02-24 16:47:53'),
(6, 'Mamun', '5465465', 'Vola', 'Trisha', 'Gazipur', '2024-02-24 16:48:29', '2024-02-24 16:48:29'),
(7, 'Sadid', '546546', 'Mirpur', 'Ikbal', 'Rampura', '2024-02-24 16:49:25', '2024-02-24 16:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `net_total` varchar(255) DEFAULT NULL,
  `invoices_date` date DEFAULT NULL,
  `customers_id` int(11) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `total_discount` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `net_total`, `invoices_date`, `customers_id`, `total_amount`, `total_discount`, `created_at`, `updated_at`) VALUES
(1, '333', '2024-02-19', 5, '3333', '33', '2024-02-24 16:50:30', '2024-02-24 19:24:24'),
(2, '100', '2024-02-21', 7, '110', '10', '2024-02-24 16:53:54', '2024-02-24 19:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `packing` varchar(255) DEFAULT NULL,
  `generic_name` varchar(255) DEFAULT NULL,
  `supplier_name` varchar(255) DEFAULT NULL,
  `isDeleted` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0:NO Delete,1:Yes Delete',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `packing`, `generic_name`, `supplier_name`, `isDeleted`, `created_at`, `updated_at`) VALUES
(1, 'd', 'd', 'd', 'd', 0, '2024-02-04 20:54:02', '2024-02-04 20:54:02'),
(2, 'ggg', 'ggggg', 'ggg', 'ggggg', 0, '2024-02-04 21:01:49', '2024-02-04 21:01:49'),
(3, 'dsss', 'd', 'd', 'd', 0, '2024-02-04 21:29:44', '2024-02-04 21:29:44'),
(4, 'd333', 'd', 'd', 'd', 0, '2024-02-04 21:30:01', '2024-02-04 21:30:01'),
(5, 'd3334', 'd', 'd', 'd', 0, '2024-02-04 21:38:09', '2024-02-04 21:38:09'),
(6, 'd33346', 'd', 'd', 'd', 0, '2024-02-04 21:42:56', '2024-02-04 21:42:56'),
(7, 'd33345', 'd', 'd', 'd', 0, '2024-02-05 01:41:51', '2024-02-05 01:41:51'),
(8, 'd9', 'd', 'd', 'd', 0, '2024-02-05 01:42:11', '2024-02-05 01:42:11'),
(9, 'd777', 'd', 'd', 'd', 0, '2024-02-05 06:25:17', '2024-02-05 06:25:17'),
(10, 'd2', 'd', 'd', 'd', 0, '2024-02-11 03:47:33', '2024-02-11 03:47:33'),
(11, 'd5555555', 'd', 'd', 'd', 0, '2024-02-12 03:24:52', '2024-02-12 03:24:52'),
(12, 'dwwww', 'd', 'd', 'd', 0, '2024-02-12 03:32:34', '2024-02-12 03:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `medicines_stock`
--

CREATE TABLE `medicines_stock` (
  `id` int(11) NOT NULL,
  `medicines_id` int(11) DEFAULT NULL,
  `batch_id` varchar(255) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `mrp` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines_stock`
--

INSERT INTO `medicines_stock` (`id`, `medicines_id`, `batch_id`, `expiry_date`, `quantity`, `mrp`, `rate`, `created_at`, `updated_at`) VALUES
(1, 2, '4D', '2024-02-29', '8', '54', '9', '2024-02-22 04:05:09', '2024-02-22 04:05:09'),
(2, 9, '4D88222', '2024-02-29', '10', '100', '10', '2024-02-22 04:23:07', '2024-02-22 04:43:47'),
(3, 3, '4D333', '2024-03-28', '33', '3333', '33', '2024-02-22 04:44:35', '2024-02-22 04:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `member_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `suppliers_id` int(11) DEFAULT NULL,
  `invoices_id` int(11) DEFAULT NULL,
  `voucher_number` varchar(255) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:-Pending,2:-Accept,3:-Cancel',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `suppliers_id`, `invoices_id`, `voucher_number`, `purchase_date`, `total_amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '4444', '2024-02-20', '100', 2, '2024-02-24 21:18:57', '2024-02-25 01:30:26'),
(4, 2, 1, '33333', '2024-02-14', '111111111', 2, '2024-02-25 01:18:30', '2024-02-25 01:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `total_items` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `paid` varchar(255) DEFAULT NULL,
  `received` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_details`
--

CREATE TABLE `sale_details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `medicines_stock_id` int(11) NOT NULL,
  `selling_price` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `subtotal` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `suppliers_name` varchar(255) DEFAULT NULL,
  `suppliers_email` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `suppliers_name`, `suppliers_email`, `contact_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Nadia', 'nadia@gmail.com', '0165765782', 'UK', '2024-02-21 12:26:37', '2024-02-22 12:26:23'),
(2, 'Masum2', 'masum@gmail.com', '879878766', 'Dhaka,Mirpur', '2024-02-24 05:48:18', '2024-02-24 07:38:06'),
(4, 'Masum', 'masum@gmail.com', '6757657', 'Savar', '2024-02-24 07:46:53', '2024-02-24 07:46:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_role` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_role`, `created_at`, `updated_at`) VALUES
(2, 'Rojoni', 'admin@gmail.com', NULL, '$2y$12$NtIY64qro854.y40hWLkSOllH0VdCxJS7l0MGoy.Sza.KgdSSQHI.', 'Sg5luLxUxdPWcGzQpCLBfsxI0dt2aamgOjwkMr9hl4oNYl4ZJp87j3xJmiea', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines_stock`
--
ALTER TABLE `medicines_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_details`
--
ALTER TABLE `sale_details`
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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `medicines_stock`
--
ALTER TABLE `medicines_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
