-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2021 a las 21:47:41
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `madecms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` int(11) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `module`, `parent`, `name`, `slug`, `file_path`, `icono`, `order`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 'Ropa - Formal', 'ropa-formal', '2021-02-13', '61-man.png', 0, NULL, '2021-02-14 04:39:46', '2021-02-14 04:47:48'),
(2, 0, 0, 'Gafas', 'gafas', '2021-02-13', '691-accessory.png', 0, NULL, '2021-02-14 04:41:07', '2021-02-14 04:41:07'),
(3, 0, 0, 'Tecnologia', 'tecnologia', '2021-02-13', '796-iphone.png', 0, NULL, '2021-02-14 04:41:48', '2021-02-14 04:41:48'),
(4, 0, 0, 'Ropa - Deportiva', 'ropa-deportiva', '2021-02-13', '603-sport-wear.png', 0, NULL, '2021-02-14 04:43:37', '2021-02-14 04:43:37'),
(5, 0, 1, 'Sacos', 'sacos', '2021-02-13', '453-smoking.png', 0, NULL, '2021-02-14 04:44:31', '2021-02-14 04:48:04'),
(6, 0, 1, 'Corbatas', 'corbatas', '2021-02-13', '686-tie.png', 0, NULL, '2021-02-14 04:45:08', '2021-02-14 04:45:08'),
(7, 0, 4, 'Pantalones', 'pantalones', '2021-02-13', '550-pantalones-deportivos.png', 0, NULL, '2021-02-14 04:45:20', '2021-02-14 04:45:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coverage`
--

CREATE TABLE `coverage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `ctype` int(11) NOT NULL,
  `state_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `days` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `coverage`
--

INSERT INTO `coverage` (`id`, `status`, `ctype`, `state_id`, `name`, `price`, `days`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 'Francisco Morazan', '0.00', 2, NULL, '2021-02-14 04:48:52', '2021-02-14 04:48:52'),
(2, 1, 0, 0, 'Cortez', '0.00', 4, NULL, '2021-02-14 04:48:59', '2021-02-14 04:48:59'),
(3, 1, 0, 0, 'Choluteca', '0.00', 4, NULL, '2021-02-14 04:49:04', '2021-02-14 04:49:04'),
(4, 1, 1, 1, 'Tegucigalpa', '50.00', 2, NULL, '2021-02-14 04:49:40', '2021-02-14 04:49:40'),
(5, 1, 1, 1, 'Comayaguela', '50.00', 2, NULL, '2021-02-14 04:49:53', '2021-02-14 04:49:53'),
(6, 1, 1, 3, 'Choluteca', '150.00', 4, NULL, '2021-02-14 04:50:08', '2021-02-14 04:50:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_19_004836_create_categories_table', 2),
(5, '2019_12_19_005521_add_soft_deleted_to_categories_table', 3),
(6, '2020_01_08_012803_create_products_table', 4),
(7, '2020_02_09_020520_add_field_file_path_to_products_table', 5),
(8, '2020_04_15_225719_create_product_gallery_table', 6),
(9, '2020_04_30_214455_add_field_avatar_status_to_users_table', 7),
(10, '2020_05_09_214033_add_password_code_to_users_table', 8),
(11, '2020_06_06_155618_add_field_permissions_to_users_table', 9),
(12, '2020_06_06_163844_add_field_permissions_to_users_table', 10),
(13, '2020_06_13_153410_add_field_inventory_and_code_to_products_table', 11),
(14, '2020_07_05_224205_add_fields_phone_year_gender', 12),
(15, '2020_07_25_202054_add_field_file_path_to_categories_table', 13),
(16, '2020_08_15_165208_create_sliders_table', 14),
(17, '2020_09_05_165109_create_table_user_favorites', 15),
(18, '2020_09_05_170038_complete_user_favorites_table', 16),
(19, '2020_10_11_201353_add_field_parent_to_categories', 17),
(20, '2020_10_11_205604_add_field_order_to_categories_table', 18),
(21, '2020_10_11_213320_add_field_sub_category_id_to_products_table', 19),
(22, '2020_10_25_171740_create_products_inventory_table', 20),
(23, '2020_10_25_222309_create_product_inventory_variants', 21),
(24, '2020_10_25_225346_drop_products_table_price_inventory', 22),
(25, '2020_11_07_151600_add_price_field_to_products_table', 23),
(26, '2020_11_28_161419_create_orders_table', 24),
(27, '2020_11_28_165858_create_orders_items_table', 25),
(28, '2020_12_05_162520_add_field_price_org_to_table_orders_items', 26),
(29, '2020_12_05_172050_add_field_discount_until_date_to_table_products', 27),
(30, '2020_12_12_214231_add_field_discount_until_date_to_table_orders_items', 28),
(31, '2020_12_19_212417_create_coverage_table', 29),
(32, '2020_12_19_212741_add_field_state_id_to_table_coverage', 30),
(33, '2020_12_26_214758_add_field_status_to_coverage_table', 31),
(34, '2021_01_30_162338_create_user_address_table', 32),
(35, '2021_01_30_163821_add_field_default_to_user_address_table', 33),
(36, '2021_03_06_150258_add_times_activity_fields_to_order_table', 34),
(37, '2021_03_06_153240_add_times_activity_fields2_to_order_table', 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `o_number` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `o_type` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `user_address_id` int(11) DEFAULT NULL,
  `user_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` decimal(11,2) NOT NULL DEFAULT 0.00,
  `delivery` decimal(11,2) NOT NULL DEFAULT 0.00,
  `total` decimal(11,2) DEFAULT 0.00,
  `payment_method` int(11) DEFAULT NULL,
  `payment_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_at` datetime DEFAULT NULL,
  `request_at` timestamp NULL DEFAULT NULL,
  `process_at` timestamp NULL DEFAULT NULL,
  `send_at` timestamp NULL DEFAULT NULL,
  `delivery_at` timestamp NULL DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `o_number`, `status`, `o_type`, `user_id`, `user_address_id`, `user_comment`, `subtotal`, `delivery`, `total`, `payment_method`, `payment_info`, `paid_at`, `request_at`, `process_at`, `send_at`, `delivery_at`, `rejected_at`, `created_at`, `updated_at`) VALUES
(2, '1', 1, 0, 1, 2, 'Comentario #1', '1500.00', '150.00', '1650.00', 0, NULL, NULL, '2021-03-06 12:11:13', NULL, NULL, NULL, NULL, '2021-03-07 00:11:05', '2021-03-07 00:11:13'),
(3, '2', 1, 0, 1, 2, 'Comentario #2', '475.00', '150.00', '625.00', 0, NULL, NULL, '2021-03-06 12:11:45', NULL, NULL, NULL, NULL, '2021-03-07 00:11:28', '2021-03-07 00:11:45'),
(4, '3', 100, 0, 1, 2, 'Comentario #3', '1500.00', '150.00', '1650.00', 0, NULL, NULL, '2021-03-06 12:12:30', NULL, NULL, NULL, '2021-03-06 10:01:03', '2021-03-07 00:12:00', '2021-03-06 22:01:03'),
(5, '4', 6, 0, 1, 2, 'Comentario en blanco', '1500.00', '150.00', '1650.00', 0, NULL, NULL, '2021-03-06 18:14:41', '2021-03-06 09:41:07', '2021-03-06 09:41:20', '2021-03-06 10:00:40', NULL, '2021-03-06 18:14:30', '2021-03-06 22:00:40'),
(6, '5', 6, 1, 1, NULL, 'Comantario', '1500.00', '0.00', '1500.00', 0, NULL, NULL, '2021-03-06 07:20:20', '2021-03-06 09:40:27', '2021-03-06 09:40:34', '2021-03-06 09:40:38', NULL, '2021-03-06 19:20:06', '2021-03-06 21:40:38'),
(7, '6', 100, 0, 1, 2, NULL, '1975.00', '150.00', '2125.00', 0, NULL, NULL, '2021-03-06 08:39:07', '2021-03-06 09:31:39', '2021-03-06 09:32:01', '2021-03-06 09:32:11', '2021-03-06 09:35:46', '2021-03-06 20:38:41', '2021-03-06 21:35:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders_items`
--

CREATE TABLE `orders_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `label_item` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `discount_status` int(11) NOT NULL DEFAULT 0,
  `discount` int(11) NOT NULL DEFAULT 0,
  `discount_until_date` date DEFAULT NULL,
  `price_initial` decimal(11,2) DEFAULT NULL,
  `price_unit` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders_items`
--

INSERT INTO `orders_items` (`id`, `user_id`, `order_id`, `product_id`, `inventory_id`, `variant_id`, `label_item`, `quantity`, `discount_status`, `discount`, `discount_until_date`, `price_initial`, `price_unit`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2, NULL, 'Pantalón deportivo #1 / Talla #32', 1, 0, 0, NULL, '475.00', '475.00', '475.00', '2021-03-07 00:10:10', '2021-03-07 00:10:10'),
(2, 1, 2, 2, 3, 6, 'Set deportivo y ocacional / Talla Small / Negro', 1, 0, 0, NULL, '1500.00', '1500.00', '1500.00', '2021-03-07 00:11:05', '2021-03-07 00:11:05'),
(3, 1, 3, 1, 2, NULL, 'Pantalón deportivo #1 / Talla #32', 1, 0, 0, NULL, '475.00', '475.00', '475.00', '2021-03-07 00:11:28', '2021-03-07 00:11:28'),
(4, 1, 4, 2, 3, 5, 'Set deportivo y ocacional / Talla Small / Gris Claro', 1, 0, 0, NULL, '1500.00', '1500.00', '1500.00', '2021-03-07 00:12:00', '2021-03-07 00:12:00'),
(5, 1, 5, 2, 3, 5, 'Set deportivo y ocacional / Talla Small / Gris Claro', 1, 0, 0, NULL, '1500.00', '1500.00', '1500.00', '2021-03-06 18:14:30', '2021-03-06 18:14:30'),
(6, 1, 6, 2, 3, 5, 'Set deportivo y ocacional / Talla Small / Gris Claro', 1, 0, 0, NULL, '1500.00', '1500.00', '1500.00', '2021-03-06 19:20:06', '2021-03-06 19:20:06'),
(7, 1, 7, 1, 2, NULL, 'Pantalón deportivo #1 / Talla #32', 1, 0, 0, NULL, '475.00', '475.00', '475.00', '2021-03-06 20:38:41', '2021-03-06 20:38:41'),
(8, 1, 7, 2, 3, 5, 'Set deportivo y ocacional / Talla Small / Gris Claro', 1, 0, 0, NULL, '1500.00', '1500.00', '1500.00', '2021-03-06 20:39:01', '2021-03-06 20:39:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL DEFAULT 0,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(11,2) NOT NULL DEFAULT 0.00,
  `in_discount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `discount_until_date` date DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `status`, `code`, `name`, `slug`, `category_id`, `subcategory_id`, `file_path`, `image`, `price`, `in_discount`, `discount`, `discount_until_date`, `content`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '0', 'Pantalón deportivo #1', 'pantalon-deportivo-1', 4, 7, '2021-02-13', '772-pantalon-deportivo-classics-negro-gd2059-21-model.jpg', '450.00', 0, 0, NULL, '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing, elit. Sint debitis veritatis, libero deserunt facere? Nam eaque voluptatum, odit veritatis architecto ex similique earum. In debitis repellendus laborum hic ipsa iusto!&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing, elit. Sint debitis veritatis, libero deserunt facere? Nam eaque voluptatum, odit veritatis architecto ex similique earum. In debitis repellendus laborum hic ipsa iusto!&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing, elit. Sint debitis veritatis, libero deserunt facere? Nam eaque voluptatum, odit veritatis architecto ex similique earum. In debitis repellendus laborum hic ipsa iusto!&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing, elit. Sint debitis veritatis, libero deserunt facere? Nam eaque voluptatum, odit veritatis architecto ex similique earum. In debitis repellendus laborum hic ipsa iusto!&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing, elit. Sint debitis veritatis, libero deserunt facere? Nam eaque voluptatum, odit veritatis architecto ex similique earum. In debitis repellendus laborum hic ipsa iusto!&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing, elit. Sint debitis veritatis, libero deserunt facere? Nam eaque voluptatum, odit veritatis architecto ex similique earum. In debitis repellendus laborum hic ipsa iusto!&lt;/p&gt;', NULL, '2021-02-14 04:56:39', '2021-02-14 05:06:28'),
(2, 1, '0', 'Set deportivo y ocacional', 'set-deportivo-y-ocacional', 4, 7, '2021-03-15', '574-av-939-treee.jpg', '1500.00', 0, 0, NULL, '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing, elit. Sint debitis veritatis, libero deserunt facere? Nam eaque voluptatum, odit veritatis architecto ex similique earum. In debitis repellendus laborum hic ipsa iusto!&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing, elit. Sint debitis veritatis, libero deserunt facere? Nam eaque voluptatum, odit veritatis architecto ex similique earum. In debitis repellendus laborum hic ipsa iusto!Lorem ipsum dolor sit amet consectetur adipisicing, elit. Sint debitis veritatis, libero deserunt facere? Nam eaque voluptatum, odit veritatis architecto ex similique earum. In debitis repellendus laborum hic ipsa iusto!&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing, elit. Sint debitis veritatis, libero deserunt facere? Nam eaque voluptatum, odit veritatis architecto ex similique earum. In debitis repellendus laborum hic ipsa iusto!&lt;/p&gt;\r\n\r\n&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing, elit. Sint debitis veritatis, libero deserunt facere? Nam eaque voluptatum, odit veritatis architecto ex similique earum. In debitis repellendus laborum hic ipsa iusto!&lt;/p&gt;', NULL, '2021-02-14 05:03:10', '2021-03-16 01:07:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_gallery`
--

CREATE TABLE `product_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `product_gallery`
--

INSERT INTO `product_gallery` (`id`, `product_id`, `file_path`, `file_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-02-13', '956-pantalon-deportivo-classics-negro-gd2059-21-model.jpg', NULL, '2021-02-14 04:57:59', '2021-02-14 04:57:59'),
(2, 1, '2021-02-13', '203-pantalon-deportivo-classics-negro-gd2059-21-model.jpg', NULL, '2021-02-14 04:58:03', '2021-02-14 04:58:03'),
(3, 2, '2021-02-13', '312-hd63f4056bbe7432ba402f32f98fe5a8ap-q50.jpg', NULL, '2021-02-14 05:03:16', '2021-02-14 05:03:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_inventory`
--

CREATE TABLE `product_inventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `limited` int(11) NOT NULL,
  `minimum` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `product_inventory`
--

INSERT INTO `product_inventory` (`id`, `product_id`, `name`, `quantity`, `price`, `limited`, `minimum`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Talla #28', 10, '450.00', 0, 5, NULL, '2021-02-14 04:57:31', '2021-02-14 04:59:38'),
(2, 1, 'Talla #32', 16, '475.00', 0, 3, NULL, '2021-02-14 05:00:21', '2021-02-14 05:00:21'),
(3, 2, 'Talla Small', 25, '1500.00', 0, 1, NULL, '2021-02-14 05:03:49', '2021-02-14 05:03:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_inventory_variants`
--

CREATE TABLE `product_inventory_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `product_inventory_variants`
--

INSERT INTO `product_inventory_variants` (`id`, `product_id`, `inventory_id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Color Negro', NULL, '2021-02-14 04:59:09', '2021-02-14 04:59:09'),
(2, 1, 1, 'Color Gris', NULL, '2021-02-14 04:59:15', '2021-02-14 04:59:15'),
(3, 1, 1, 'Color Verde Militar', NULL, '2021-02-14 04:59:21', '2021-02-14 04:59:21'),
(4, 2, 3, 'Gris Oscuro', NULL, '2021-02-14 05:04:04', '2021-02-14 05:04:04'),
(5, 2, 3, 'Gris Claro', NULL, '2021-02-14 05:04:08', '2021-02-14 05:04:08'),
(6, 2, 3, 'Negro', NULL, '2021-02-14 05:04:12', '2021-02-14 05:04:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sorder` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `user_id`, `status`, `name`, `file_path`, `file_name`, `content`, `sorder`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 'Slider - Pasterles #1', '2020-08-15', '959-1.jpg', '&lt;h2&gt;Los mejores pasteles de la ciudad&lt;/h2&gt;\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum illum iure quos possimus, fugiat expedita dolor, voluptatum, neque tenetur rem accusamus corporis. Doloribus quasi excepturi facilis earum quos rerum.&lt;/p&gt;\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum illum iure quos possimus, fugiat expedita dolor, voluptatum, neque tenetur rem accusamus corporis. Doloribus quasi excepturi facilis earum quos rerum.&lt;/p&gt;\r\n&lt;a href=&quot;https://www.google.com&quot; class=&quot;btn&quot;&gt;Detalles&lt;/a&gt;', 0, '2020-08-16 02:53:41', '2020-08-16 03:32:27'),
(5, 1, 1, 'Slider - Pasterles #2', '2020-08-15', '413-2.jpg', '&lt;h2&gt;Como los imaginas&lt;/h2&gt;\r\n&lt;p&gt;Creamos el pastel de tu sueño para tu evento&lt;/p&gt;\r\n&lt;iframe src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.991625693756!2d2.2922926156396772!3d48.858370079287525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTorre%20Eiffel!5e0!3m2!1ses!2shn!4v1597527247111!5m2!1ses!2shn&quot; width=&quot;600&quot; height=&quot;250&quot; frameborder=&quot;0&quot; style=&quot;border:0;&quot; allowfullscreen=&quot;&quot; aria-hidden=&quot;false&quot; tabindex=&quot;0&quot;&gt;&lt;/iframe&gt;', 1, '2020-08-16 02:54:35', '2020-08-16 03:35:40'),
(6, 1, 1, 'Amor por los Cupcakes', '2020-08-15', '537-3.jpg', '&lt;h2&gt;Pequeños momentos mágicos&lt;/h2&gt;\r\n&lt;p&gt;Enamorate de estos deliciosos cupcakes&lt;/p&gt;', 2, '2020-08-16 02:55:27', '2020-08-16 02:55:27'),
(7, 1, 1, 'Servicio de Catering', '2020-08-15', '450-4.jpg', '&lt;h2&gt;Estamos listos para tu evento&lt;/h2&gt;\r\n&lt;p&gt;Todo tipo de bocadillos deliciosos para esa ocasión especial&lt;/p&gt;', 3, '2020-08-16 02:56:45', '2020-08-16 02:56:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `role` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `status`, `role`, `name`, `lastname`, `email`, `avatar`, `phone`, `birthday`, `gender`, `email_verified_at`, `password`, `password_code`, `permissions`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Mauricio', 'Developer', 'info@mauriciodeveloper.com', '78_av-939-treee.jpg', 22334455, '1987-08-04', 1, NULL, '$2y$10$1ASPIx1BjJhOHlG0cZNdc.XNRpVjK68YhuIkomHyGyQYALDd95gJ6', NULL, '{\"dashboard\":\"true\",\"dashboard_small_stats\":\"true\",\"dashboard_sell_today\":\"true\",\"products\":\"true\",\"product_add\":\"true\",\"product_edit\":\"true\",\"product_search\":\"true\",\"product_delete\":\"true\",\"product_gallery_add\":\"true\",\"product_gallery_delete\":\"true\",\"product_inventory\":\"true\",\"categories\":\"true\",\"category_add\":\"true\",\"category_edit\":\"true\",\"category_delete\":\"true\",\"user_list\":\"true\",\"user_view\":\"true\",\"user_edit\":\"true\",\"user_banned\":\"true\",\"user_permissions\":\"true\",\"sliders_list\":\"true\",\"slider_add\":\"true\",\"slider_edit\":\"true\",\"slider_delete\":\"true\",\"settings\":\"true\",\"orders_list\":\"true\",\"order_view\":\"true\",\"orders_change_status\":\"true\",\"coverage_list\":\"true\",\"coverage_add\":\"true\",\"coverage_edit\":\"true\",\"coverage_delete\":\"true\"}', 'maiFjRkroqcJ1UTS9R61qoA8OE08CFhk8zKvjUi0cTJksPZC7Bq1UmGjLzEd', '2021-02-14 03:50:32', '2021-03-16 01:06:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_address`
--

CREATE TABLE `user_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `state_id`, `city_id`, `name`, `addr_info`, `default`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, 'Mi Casa', '{\"add1\":\"Barrio Belen\",\"add2\":\"16 Calle\",\"add3\":\"234\",\"add4\":\"Casa blanca\"}', 0, NULL, '2021-02-14 04:50:58', '2021-02-14 05:01:46'),
(2, 1, 3, 6, 'Casa Mamá', '{\"add1\":\"Barrio Belen\",\"add2\":\"16 Calle\",\"add3\":\"234\",\"add4\":\"Casa blanca\"}', 1, NULL, '2021-02-14 04:51:20', '2021-02-14 05:01:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_favorites`
--

CREATE TABLE `user_favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `module` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_favorites`
--

INSERT INTO `user_favorites` (`id`, `user_id`, `module`, `object_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2021-02-14 04:58:20', '2021-02-14 04:58:20'),
(2, 1, 1, 2, '2021-02-27 21:44:33', '2021-02-27 21:44:33');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coverage`
--
ALTER TABLE `coverage`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product_inventory`
--
ALTER TABLE `product_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product_inventory_variants`
--
ALTER TABLE `product_inventory_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_favorites`
--
ALTER TABLE `user_favorites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `coverage`
--
ALTER TABLE `coverage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `product_inventory`
--
ALTER TABLE `product_inventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `product_inventory_variants`
--
ALTER TABLE `product_inventory_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user_favorites`
--
ALTER TABLE `user_favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
