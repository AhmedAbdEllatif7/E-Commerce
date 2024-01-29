-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 03:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Sports', 'images (12).jpeg', '2024-01-29 11:21:35', '2024-01-29 11:29:37'),
(2, 'Women', 'photo_2023-08-30_20-38-24.jpg', '2024-01-29 11:22:08', '2024-01-29 11:22:08'),
(3, 'Children', 'category-2.jpg', '2024-01-29 11:22:38', '2024-01-29 11:22:38'),
(4, 'Mobiles', 'photo_2022-02-01_12-42-41.jpg', '2024-01-29 11:23:58', '2024-01-29 11:23:58'),
(5, 'Laptops', 'cu4.jpeg', '2024-01-29 11:24:45', '2024-01-29 11:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jeanette Sharp', 'nekivyfo@mailinator.com', NULL, '$2y$10$yPcuN800IvsT14w.vbNfn.w3odvyRtxHwOG8klO7iylczo6Kdk..q', NULL, '2024-01-29 10:46:31', '2024-01-29 10:46:31'),
(2, 'Ahmed Abd Ellatif', 'customer@gmail.com', NULL, '$2y$10$pLxyHIzj4t3NQaSVYDej0e1tX6677g4tuwboBoIYYHDJn7v9FT3hK', NULL, '2024-01-29 12:17:29', '2024-01-29 12:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `customer_addersses`
--

CREATE TABLE `customer_addersses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `address_title` varchar(255) NOT NULL DEFAULT 'Main',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_08_132128_create_customers_table', 1),
(6, '2023_08_09_120846_create_categories_table', 1),
(7, '2023_08_09_160123_create_products_table', 1),
(8, '2023_08_25_214115_create_notifications_table', 1),
(9, '2023_08_25_215002_create_orders_table', 1),
(10, '2023_08_26_205503_create_customer_addersses_table', 1),
(11, '2023_09_02_114801_create_wishlists_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'false',
  `address_title` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `discount_price` decimal(8,2) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `discount_price`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Nike Dri-FIT Running Jacket', 'lightweight and breathable running jacket designed with Nike\'s Dri-FIT technology to wick away moisture, keeping the wearer dry and comfortable during workouts. It features reflective details for enhanced visibility during low-light conditions.', 'images (10).jpeg', '6544.00', '654.00', 1, '2024-01-29 11:27:19', '2024-01-29 11:32:28'),
(2, 'Adidas Ultraboost Running Shoes', 'Running shoes with responsive cushioning, perfect for runners seeking comfort and energy return.', 'images (13).jpeg', '500.00', '56.00', 1, '2024-01-29 11:31:45', '2024-01-29 11:31:45'),
(3, 'Under Armour Tech 2.0 Short Sleeve T-Shirt', 'Lightweight and breathable training shirt made with quick-drying fabric for optimal comfort during workouts.', 'images (14).jpeg', '456.00', '65.00', 1, '2024-01-29 11:33:36', '2024-01-29 11:33:36'),
(4, 'Puma Classics T7 Track Jacket', 'Retro-inspired track jacket featuring iconic Puma T7 stripes for a sporty and stylish look.', 'images (15).jpeg', '789.00', '98.00', 1, '2024-01-29 11:35:11', '2024-01-29 11:35:11'),
(5, 'Reebok CrossFit Nano 8.0 Training', 'Versatile training shoes with stability and durability, suitable for various cross-training activities.', 'photo_2023-08-30_20-43-15.jpg', '343.00', '34.00', 1, '2024-01-29 11:36:10', '2024-01-29 11:36:10'),
(6, 'Zara Midi Wrap Dress', 'A versatile and chic midi wrap dress suitable for both casual outings and more formal events.', 'images (6).jpeg', '654.00', '46.00', 2, '2024-01-29 11:37:18', '2024-01-29 11:37:18'),
(7, 'H&M High-Rise Skinny Jeans', 'Classic high-rise skinny jeans that offer a flattering fit and comfortable stretch.', 'images (7).jpeg', '789.00', '89.00', 2, '2024-01-29 11:37:55', '2024-01-29 11:37:55'),
(8, 'Forever 21 Ribbed Knit Sweater', 'Cozy and stylish rib-knit sweater, perfect for keeping warm during colder seasons.', 'photo_2023-08-30_20-38-56.jpg', '687.00', '78.00', 2, '2024-01-29 11:38:39', '2024-01-29 11:38:39'),
(9, 'Anthropologie Floral Maxi Skirt', 'Flowy and feminine maxi skirt with a floral pattern, ideal for a bohemian-inspired look.', 'photo_2023-08-30_20-39-13.jpg', '978.00', '78.00', 2, '2024-01-29 11:39:17', '2024-01-29 11:39:17'),
(10, 'Topshop Belted Trench Coat', 'Timeless belted trench coat that adds sophistication to any outfit, suitable for various weather conditions.', 'photo_2023-08-30_20-37-14.jpg', '687.00', '78.00', 2, '2024-01-29 11:39:56', '2024-01-29 11:39:56'),
(11, 'Carter\'s Baby Bodysuit Set', 'Cute and practical bodysuit set for infants, made from soft cotton for comfort and easy diaper changes.', 'photo_2023-08-30_20-39-53.jpg', '987.00', '87.00', 3, '2024-01-29 11:40:38', '2024-01-29 11:40:38'),
(12, 'GapKids Graphic Tee', 'Fun and vibrant graphic T-shirt for kids featuring playful designs and characters.', 'photo_2023-08-30_20-40-00.jpg', '654.00', '56.00', 3, '2024-01-29 11:41:16', '2024-01-29 11:41:16'),
(13, 'Old Navy Denim Overalls', 'Classic denim overalls for toddlers, providing a comfortable and stylish playtime outfit.', 'photo_2023-08-30_20-40-04.jpg', '789.00', '87.00', 3, '2024-01-29 11:41:59', '2024-01-29 11:41:59'),
(14, 'H&M Kids Patterned Leggings', 'Colorful and patterned leggings for girls, perfect for mixing and matching with different tops.', 'category-2.jpg', '564.00', '456.00', 3, '2024-01-29 11:42:54', '2024-01-29 11:42:54'),
(15, 'Adidas Kids\' Tracksuit', 'Sporty tracksuit for active kids, offering a comfortable fit and showcasing the iconic Adidas logo.', 'photo_2023-08-30_20-40-12.jpg', '465.00', '45.00', 3, '2024-01-29 11:43:33', '2024-01-29 11:43:33'),
(16, 'iPhone 13 Pro', 'Apple\'s flagship smartphone with a powerful A15 Bionic chip, advanced camera system, and ProMotion display technology.', 'photo_2022-01-30_16-19-56.jpg', '15655.00', '655.00', 4, '2024-01-29 11:50:21', '2024-01-29 11:50:21'),
(17, 'Samsung Galaxy Z Flip 3', 'Foldable smartphone with a sleek design, featuring a flexible AMOLED display and high-quality camera capabilities.', 'images (2).jpeg', '45555.00', '455.00', 4, '2024-01-29 11:51:54', '2024-01-29 11:51:54'),
(18, 'Google Pixel 6', 'Android smartphone known for its exceptional camera performance, clean user interface, and regular software updates.', 'photo_2023-08-24_22-42-08.jpg', '78888.00', '788.00', 4, '2024-01-29 11:52:56', '2024-01-29 11:52:56'),
(19, 'OnePlus 9:', 'High-performance Android phone with a fast-charging Warp Charge feature and a versatile camera system.', 'photo_2023-08-30_21-17-27.jpg', '65545.00', '545.00', 4, '2024-01-29 11:55:55', '2024-01-29 11:55:55'),
(20, 'Xiaomi Poco X3 Pro', 'Budget-friendly smartphone with a large display, high-capacity battery, and a capable processor.', 'photo_2023-08-30_21-18-36.jpg', '89888.00', '988.00', 4, '2024-01-29 11:56:33', '2024-01-29 11:56:33'),
(21, 'MacBook Air (M2, 2022)', 'Apple\'s thin and light laptop with the latest M2 chip, Retina display, and improved battery life.', 'photo_2023-08-30_21-17-37.jpg', '9865.00', '788.00', 5, '2024-01-29 12:11:19', '2024-01-29 12:11:19'),
(22, 'HP Spectre x360', 'Convertible laptop with a 360-degree hinge, premium build quality, and high-resolution display.', 'photo_2023-08-30_21-17-52.jpg', '79889.00', '988.00', 5, '2024-01-29 12:12:09', '2024-01-29 12:12:09'),
(23, 'Dell Inspiron 14 2-in-1', 'Versatile 2-in-1 laptop with a touchscreen display, suitable for both work and entertainment.', 'photo_2023-08-30_21-18-12.jpg', '79878.00', '321.00', 5, '2024-01-29 12:14:43', '2024-01-29 12:14:43'),
(24, 'Lenovo ThinkPad X1 Carbon:', 'Business-focused ultrabook with a durable build, excellent keyboard, and robust security features.', 'cu.jpeg', '88887.00', '879.00', 5, '2024-01-29 12:15:22', '2024-01-29 12:15:22'),
(25, 'Asus ROG Zephyrus G14', 'Gaming laptop known for its powerful AMD Ryzen processor and NVIDIA GeForce RTX graphics, ideal for gamers and content creators.', 'cu2.jpeg', '79879.00', '654.00', 5, '2024-01-29 12:16:12', '2024-01-29 12:16:12');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$TKEnd2zp55udxQKPB9xenuy1tqviUM0Id62arm1.TgafzaJZ6shh.', NULL, '2024-01-29 10:45:01', '2024-01-29 10:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `customer_addersses`
--
ALTER TABLE `customer_addersses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_addersses_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_category_id_foreign` (`category_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`),
  ADD KEY `wishlists_customer_id_foreign` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_addersses`
--
ALTER TABLE `customer_addersses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_addersses`
--
ALTER TABLE `customer_addersses`
  ADD CONSTRAINT `customer_addersses_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
