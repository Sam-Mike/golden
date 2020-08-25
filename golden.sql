-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 03:50 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `golden`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocations`
--

CREATE TABLE `allocations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `cargo_id` bigint(20) UNSIGNED NOT NULL,
  `people_id` bigint(20) UNSIGNED NOT NULL,
  `truck_trailer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE `cargo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cargo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`id`, `cargo_name`, `cargo_type_id`, `created_at`, `updated_at`) VALUES
(1, 'sand', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cargo_type`
--

CREATE TABLE `cargo_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cargo_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cargo_type`
--

INSERT INTO `cargo_type` (`id`, `cargo_type_name`, `created_at`, `updated_at`) VALUES
(1, 'poison', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_name`, `address`, `phone`, `contact_name`, `mobile`, `email`, `created_at`, `updated_at`) VALUES
(1, 'business10', 'changanyikeni', '0789908747', 'samike', '0674114372', 'samikemashiku@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cluster`
--

CREATE TABLE `cluster` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cluster_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cluster`
--

INSERT INTO `cluster` (`id`, `cluster_name`, `created_at`, `updated_at`) VALUES
(1, 'local', NULL, NULL),
(2, 'transit', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `created_at`, `updated_at`) VALUES
(1, 'Golden coach', NULL, NULL),
(2, 'Golden fleet', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 'operations', NULL, NULL),
(2, 'administration', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `fuel_desposit`
--

CREATE TABLE `fuel_desposit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fuel_supplier_id` bigint(20) UNSIGNED NOT NULL,
  `fuel_tank_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fuel_dispense`
--

CREATE TABLE `fuel_dispense` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `truck_id` bigint(20) UNSIGNED NOT NULL,
  `fuel_tank_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fuel_supplier`
--

CREATE TABLE `fuel_supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fuel_supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fuel_tank`
--

CREATE TABLE `fuel_tank` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fue_tank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel_tank_size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `license_classes`
--

CREATE TABLE `license_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `licence_class` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `license_classes`
--

INSERT INTO `license_classes` (`id`, `licence_class`, `created_at`, `updated_at`) VALUES
(1, 'a', NULL, NULL),
(2, 'b', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location_name`, `created_at`, `updated_at`) VALUES
(1, 'buli', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lube`
--

CREATE TABLE `lube` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lube_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lube_dispense`
--

CREATE TABLE `lube_dispense` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `truck_id` bigint(20) UNSIGNED NOT NULL,
  `lube_id` bigint(20) UNSIGNED NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_08_13_065738_create_company_table', 1),
(4, '2020_08_13_065859_create_tyre_class_table', 1),
(5, '2020_08_13_070240_create_tyres_table', 1),
(6, '2020_08_13_071156_create_spare_parts_table', 1),
(7, '2020_08_13_075303_create_cluster_table', 1),
(8, '2020_08_13_075550_create_status_table', 1),
(9, '2020_08_13_075854_create_truck_type_table', 1),
(10, '2020_08_13_075930_create_trucks_table', 1),
(11, '2020_08_13_084923_create_trailer_type_table', 1),
(12, '2020_08_13_085055_create_trailer_table', 1),
(13, '2020_08_13_085222_create_truck_trailer_table', 1),
(14, '2020_08_13_085534_create_fuel_supplier_table', 1),
(15, '2020_08_13_085614_create_fuel_tank_table', 1),
(16, '2020_08_13_085627_create_lube_table', 1),
(17, '2020_08_13_090503_create_fuel_desposit_table', 1),
(18, '2020_08_13_090705_create_fuel_dispense_table', 1),
(19, '2020_08_13_090719_create_lube_dispense_table', 1),
(20, '2020_08_13_091121_create_location_table', 1),
(21, '2020_08_13_091708_create_cargo_type_table', 1),
(22, '2020_08_13_091809_create_clients_table', 1),
(23, '2020_08_13_091825_create_cargo_table', 1),
(24, '2020_08_18_060243_create_training_group_table', 1),
(25, '2020_08_18_060258_create_training_table', 1),
(26, '2020_08_18_061224_create_departments_table', 1),
(27, '2020_08_18_061236_create_role_position_table', 1),
(28, '2020_08_18_061252_create_license_classes_table', 1),
(29, '2020_08_18_061310_create_people_table', 1),
(30, '2020_08_18_091342_create_people_training_table', 1),
(31, '2020_08_21_134113_create_allocations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `license_number` bigint(20) NOT NULL,
  `license_issue_number` date NOT NULL,
  `license_class_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `first_name`, `middle_name`, `last_name`, `dob`, `mobile`, `start_date`, `company_id`, `department_id`, `license_number`, `license_issue_number`, `license_class_id`, `created_at`, `updated_at`) VALUES
(1, 'kevin', 'good', 'boy', '2020-08-11', '92384793749', '2020-08-03', 1, 1, 934875923847, '2020-08-11', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `people_training`
--

CREATE TABLE `people_training` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `people_id` bigint(20) UNSIGNED NOT NULL,
  `training_group_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_position`
--

CREATE TABLE `role_position` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_position`
--

INSERT INTO `role_position` (`id`, `position_name`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'operations manager', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spare_parts`
--

CREATE TABLE `spare_parts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(15,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `purchases` int(11) NOT NULL,
  `purchase_value` decimal(15,2) NOT NULL,
  `issued` int(11) NOT NULL,
  `issued_value` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'assigned', NULL, NULL),
(2, 'free', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trailer`
--

CREATE TABLE `trailer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tl_number` int(11) NOT NULL,
  `reg_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trailer`
--

INSERT INTO `trailer` (`id`, `tl_number`, `reg_number`, `trailer_type_id`, `created_at`, `updated_at`) VALUES
(1, 101, 't234bza', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trailer_type`
--

CREATE TABLE `trailer_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trailer_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer_size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trailer_type`
--

INSERT INTO `trailer_type` (`id`, `trailer_type_name`, `trailer_size`, `created_at`, `updated_at`) VALUES
(1, 'flat bed', 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `training_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `training_date` date NOT NULL,
  `next_training_date` date NOT NULL,
  `retrain_days` int(11) NOT NULL,
  `training_group_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training_group`
--

CREATE TABLE `training_group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `training_group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reg_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `cluster_id` bigint(20) UNSIGNED NOT NULL,
  `truck_type_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`id`, `reg_number`, `company_id`, `cluster_id`, `truck_type_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 't678tyh', 1, 1, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `truck_trailer`
--

CREATE TABLE `truck_trailer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `truck_id` bigint(20) UNSIGNED NOT NULL,
  `trailer_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `truck_type`
--

CREATE TABLE `truck_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `truck_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `truck_type`
--

INSERT INTO `truck_type` (`id`, `truck_type_name`, `created_at`, `updated_at`) VALUES
(1, '10ton', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tyres`
--

CREATE TABLE `tyres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tyre_class_id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tyre_class`
--

CREATE TABLE `tyre_class` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tyre_class_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocations`
--
ALTER TABLE `allocations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `allocations_client_id_foreign` (`client_id`),
  ADD KEY `allocations_cargo_id_foreign` (`cargo_id`),
  ADD KEY `allocations_people_id_foreign` (`people_id`),
  ADD KEY `allocations_truck_trailer_id_foreign` (`truck_trailer_id`);

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cargo_cargo_type_id_foreign` (`cargo_type_id`);

--
-- Indexes for table `cargo_type`
--
ALTER TABLE `cargo_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cluster`
--
ALTER TABLE `cluster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_desposit`
--
ALTER TABLE `fuel_desposit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fuel_desposit_fuel_supplier_id_foreign` (`fuel_supplier_id`),
  ADD KEY `fuel_desposit_fuel_tank_id_foreign` (`fuel_tank_id`);

--
-- Indexes for table `fuel_dispense`
--
ALTER TABLE `fuel_dispense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fuel_dispense_truck_id_foreign` (`truck_id`),
  ADD KEY `fuel_dispense_fuel_tank_id_foreign` (`fuel_tank_id`);

--
-- Indexes for table `fuel_supplier`
--
ALTER TABLE `fuel_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_tank`
--
ALTER TABLE `fuel_tank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `license_classes`
--
ALTER TABLE `license_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lube`
--
ALTER TABLE `lube`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lube_dispense`
--
ALTER TABLE `lube_dispense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lube_dispense_truck_id_foreign` (`truck_id`),
  ADD KEY `lube_dispense_lube_id_foreign` (`lube_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `people_company_id_foreign` (`company_id`),
  ADD KEY `people_department_id_foreign` (`department_id`),
  ADD KEY `people_license_class_id_foreign` (`license_class_id`);

--
-- Indexes for table `people_training`
--
ALTER TABLE `people_training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `people_training_people_id_foreign` (`people_id`),
  ADD KEY `people_training_training_group_id_foreign` (`training_group_id`);

--
-- Indexes for table `role_position`
--
ALTER TABLE `role_position`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_position_department_id_foreign` (`department_id`);

--
-- Indexes for table `spare_parts`
--
ALTER TABLE `spare_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trailer`
--
ALTER TABLE `trailer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trailer_trailer_type_id_foreign` (`trailer_type_id`);

--
-- Indexes for table `trailer_type`
--
ALTER TABLE `trailer_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_training_group_id_foreign` (`training_group_id`);

--
-- Indexes for table `training_group`
--
ALTER TABLE `training_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trucks_company_id_foreign` (`company_id`),
  ADD KEY `trucks_cluster_id_foreign` (`cluster_id`),
  ADD KEY `trucks_truck_type_id_foreign` (`truck_type_id`),
  ADD KEY `trucks_status_id_foreign` (`status_id`);

--
-- Indexes for table `truck_trailer`
--
ALTER TABLE `truck_trailer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `truck_trailer_truck_id_foreign` (`truck_id`),
  ADD KEY `truck_trailer_trailer_id_foreign` (`trailer_id`);

--
-- Indexes for table `truck_type`
--
ALTER TABLE `truck_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tyres`
--
ALTER TABLE `tyres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tyres_tyre_class_id_foreign` (`tyre_class_id`);

--
-- Indexes for table `tyre_class`
--
ALTER TABLE `tyre_class`
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
-- AUTO_INCREMENT for table `allocations`
--
ALTER TABLE `allocations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cargo_type`
--
ALTER TABLE `cargo_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cluster`
--
ALTER TABLE `cluster`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuel_desposit`
--
ALTER TABLE `fuel_desposit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuel_dispense`
--
ALTER TABLE `fuel_dispense`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuel_supplier`
--
ALTER TABLE `fuel_supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuel_tank`
--
ALTER TABLE `fuel_tank`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `license_classes`
--
ALTER TABLE `license_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lube`
--
ALTER TABLE `lube`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lube_dispense`
--
ALTER TABLE `lube_dispense`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `people_training`
--
ALTER TABLE `people_training`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_position`
--
ALTER TABLE `role_position`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spare_parts`
--
ALTER TABLE `spare_parts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trailer`
--
ALTER TABLE `trailer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trailer_type`
--
ALTER TABLE `trailer_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_group`
--
ALTER TABLE `training_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `truck_trailer`
--
ALTER TABLE `truck_trailer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `truck_type`
--
ALTER TABLE `truck_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tyres`
--
ALTER TABLE `tyres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tyre_class`
--
ALTER TABLE `tyre_class`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocations`
--
ALTER TABLE `allocations`
  ADD CONSTRAINT `allocations_cargo_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`id`),
  ADD CONSTRAINT `allocations_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `allocations_people_id_foreign` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`),
  ADD CONSTRAINT `allocations_truck_trailer_id_foreign` FOREIGN KEY (`truck_trailer_id`) REFERENCES `truck_trailer` (`id`);

--
-- Constraints for table `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `cargo_cargo_type_id_foreign` FOREIGN KEY (`cargo_type_id`) REFERENCES `cargo_type` (`id`);

--
-- Constraints for table `fuel_desposit`
--
ALTER TABLE `fuel_desposit`
  ADD CONSTRAINT `fuel_desposit_fuel_supplier_id_foreign` FOREIGN KEY (`fuel_supplier_id`) REFERENCES `fuel_supplier` (`id`),
  ADD CONSTRAINT `fuel_desposit_fuel_tank_id_foreign` FOREIGN KEY (`fuel_tank_id`) REFERENCES `fuel_tank` (`id`);

--
-- Constraints for table `fuel_dispense`
--
ALTER TABLE `fuel_dispense`
  ADD CONSTRAINT `fuel_dispense_fuel_tank_id_foreign` FOREIGN KEY (`fuel_tank_id`) REFERENCES `fuel_tank` (`id`),
  ADD CONSTRAINT `fuel_dispense_truck_id_foreign` FOREIGN KEY (`truck_id`) REFERENCES `trucks` (`id`);

--
-- Constraints for table `lube_dispense`
--
ALTER TABLE `lube_dispense`
  ADD CONSTRAINT `lube_dispense_lube_id_foreign` FOREIGN KEY (`lube_id`) REFERENCES `lube` (`id`),
  ADD CONSTRAINT `lube_dispense_truck_id_foreign` FOREIGN KEY (`truck_id`) REFERENCES `trucks` (`id`);

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `people_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `people_license_class_id_foreign` FOREIGN KEY (`license_class_id`) REFERENCES `license_classes` (`id`);

--
-- Constraints for table `people_training`
--
ALTER TABLE `people_training`
  ADD CONSTRAINT `people_training_people_id_foreign` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`),
  ADD CONSTRAINT `people_training_training_group_id_foreign` FOREIGN KEY (`training_group_id`) REFERENCES `training_group` (`id`);

--
-- Constraints for table `role_position`
--
ALTER TABLE `role_position`
  ADD CONSTRAINT `role_position_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `trailer`
--
ALTER TABLE `trailer`
  ADD CONSTRAINT `trailer_trailer_type_id_foreign` FOREIGN KEY (`trailer_type_id`) REFERENCES `trailer_type` (`id`);

--
-- Constraints for table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `training_training_group_id_foreign` FOREIGN KEY (`training_group_id`) REFERENCES `training_group` (`id`);

--
-- Constraints for table `trucks`
--
ALTER TABLE `trucks`
  ADD CONSTRAINT `trucks_cluster_id_foreign` FOREIGN KEY (`cluster_id`) REFERENCES `cluster` (`id`),
  ADD CONSTRAINT `trucks_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `trucks_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `trucks_truck_type_id_foreign` FOREIGN KEY (`truck_type_id`) REFERENCES `truck_type` (`id`);

--
-- Constraints for table `truck_trailer`
--
ALTER TABLE `truck_trailer`
  ADD CONSTRAINT `truck_trailer_trailer_id_foreign` FOREIGN KEY (`trailer_id`) REFERENCES `trailer` (`id`),
  ADD CONSTRAINT `truck_trailer_truck_id_foreign` FOREIGN KEY (`truck_id`) REFERENCES `trucks` (`id`);

--
-- Constraints for table `tyres`
--
ALTER TABLE `tyres`
  ADD CONSTRAINT `tyres_tyre_class_id_foreign` FOREIGN KEY (`tyre_class_id`) REFERENCES `tyre_class` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
