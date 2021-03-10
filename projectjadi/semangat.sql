-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2021 at 10:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `semangat`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `information` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ekspedisi`
--

CREATE TABLE `ekspedisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elektronikas`
--

CREATE TABLE `elektronikas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `howtobuy`
--

CREATE TABLE `howtobuy` (
  `information` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double(8,2) NOT NULL,
  `longitude` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_11_25_094308_create_pesanans_table', 1),
(4, '2020_11_25_094323_create_pesanan_details_table', 1),
(5, '2020_12_09_011727_create_vendors_table', 1),
(6, '2020_12_12_044716_create_products_table', 1),
(7, '2020_12_12_092826_create_purchase_d_table', 1),
(8, '2020_12_12_093139_create_purchase_h_table', 1),
(9, '2020_12_12_093549_create_sales_d_table', 1),
(10, '2020_12_12_093628_create_sales_h_table', 1),
(11, '2020_12_21_000921_create-howtobuy-table', 1),
(12, '2020_12_21_005620_create-aboutus-table', 1),
(13, '2020_12_21_012732_create-ekspedisi-table', 1),
(14, '2020_12_23_002108_create-location-table', 1),
(15, '2021_02_13_055859_create_stock_table', 1),
(16, '2021_02_20_215120_create-bank-table', 1),
(17, '2021_03_07_105344_create_failed_jobs_table', 1),
(18, '2021_03_07_105535_create_elektronikas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pemesanan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_harga` int(11) NOT NULL,
  `kode_unik` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_details`
--

CREATE TABLE `pesanan_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL DEFAULT 100000,
  `elektronika_id` int(11) NOT NULL,
  `is_ready` tinyint(1) DEFAULT 1,
  `jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Barang Baru',
  `berat` double(8,2) NOT NULL DEFAULT 1.00,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_available` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama`, `harga`, `elektronika_id`, `is_ready`, `jenis`, `berat`, `gambar`, `stock_available`, `stock_total`, `created_at`, `updated_at`) VALUES
(3, 'Samsung', 2000000, 1, NULL, 'elektronik', 3.00, 'samsung.jpg', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_d`
--

CREATE TABLE `purchase_d` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_purchase` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_h`
--

CREATE TABLE `purchase_h` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_invoice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) DEFAULT NULL,
  `id_ven` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `status` enum('order','received') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_modified` int(11) NOT NULL,
  `date` date NOT NULL,
  `information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_h`
--

INSERT INTO `purchase_h` (`id`, `no_invoice`, `total`, `id_ven`, `active`, `status`, `user_modified`, `date`, `information`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, 1, 1, 'order', 1, '2021-03-01', 'sowjdj', '2021-03-07 05:14:57', '2021-03-07 05:14:57'),
(2, '1', NULL, 1, 1, 'order', 1, '2021-03-01', 'sowjdj', '2021-03-07 05:15:41', '2021-03-07 05:15:41'),
(3, '1', NULL, 1, 1, 'order', 1, '2021-03-01', 'sowjdj', '2021-03-07 05:16:10', '2021-03-07 05:16:10'),
(4, '1', NULL, 1, 1, 'order', 1, '2021-03-01', 'sowjdj', '2021-03-07 05:16:54', '2021-03-07 05:16:54'),
(5, '1', NULL, 1, 1, 'order', 1, '2021-03-01', 'sowjdj', '2021-03-07 05:17:21', '2021-03-07 05:17:21'),
(6, '1', NULL, 1, 1, 'order', 1, '2021-03-01', 'sowjdj', '2021-03-07 05:17:50', '2021-03-07 05:17:50'),
(7, '4', NULL, 2, 1, 'order', 1, '2021-03-16', 'gg', '2021-03-07 05:20:09', '2021-03-07 05:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `sales_d`
--

CREATE TABLE `sales_d` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_sales` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_h`
--

CREATE TABLE `sales_h` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_invoice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `total` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `user_modified` int(11) NOT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` int(11) NOT NULL,
  `information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `type` enum('buy','sell','correction') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nur', 'nurlela14@gmail.com', NULL, '$2y$10$I/tqroO3.fBKTalHL6uupu5lHjCYeZXFmpx3gLpNv5sVc37Lvdns6', NULL, '2021-03-07 04:01:37', '2021-03-07 04:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Contact Person',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL COMMENT '0=Inactive, 1=Active, 2=delete',
  `user_modified` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `address`, `cp`, `phone`, `active`, `user_modified`, `created_at`, `updated_at`) VALUES
(1, 'nur', 'sukabumi', '08', '085872776864', 0, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elektronikas`
--
ALTER TABLE `elektronikas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_d`
--
ALTER TABLE `purchase_d`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_h`
--
ALTER TABLE `purchase_h`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_d`
--
ALTER TABLE `sales_d`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_h`
--
ALTER TABLE `sales_h`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `elektronikas`
--
ALTER TABLE `elektronikas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_d`
--
ALTER TABLE `purchase_d`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_h`
--
ALTER TABLE `purchase_h`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales_d`
--
ALTER TABLE `sales_d`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_h`
--
ALTER TABLE `sales_h`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
