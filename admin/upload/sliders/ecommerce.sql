-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2022 at 08:53 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

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
-- Table structure for table `admin_log`
--

CREATE TABLE `admin_log` (
  `id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_log`
--

INSERT INTO `admin_log` (`id`, `admin_email`, `password`) VALUES
(1, 'admin@admin.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `brand_image`, `status`) VALUES
(1, 'Echoteas', 'brand-organic.png', 1),
(2, 'Explore', 'brand-explore.png', 1),
(3, 'Organic Garage', 'brand-organic.png', 1),
(4, 'Organic', 'brand-organic-2.png', 1),
(7, 'njjk', 'gw520-01-500x500.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `ctg_name` varchar(255) NOT NULL,
  `ctg_desc` varchar(255) NOT NULL,
  `ctg_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `ctg_name`, `ctg_desc`, `ctg_status`) VALUES
(3, 'Laptop', 'Nothing', 1),
(4, 'Mobile', 'Nothing', 1),
(5, 'Accessories', 'Nothing', 1),
(6, 'Camera', 'Nothing', 1),
(7, 'Monitor', 'Nothing', 1),
(8, 'Tablet', 'Nothing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pdt_id` int(30) NOT NULL,
  `pdt_name` varchar(256) NOT NULL,
  `pdt_price` varchar(256) NOT NULL,
  `pdt_category` int(30) NOT NULL,
  `pdt_desc` varchar(256) NOT NULL,
  `pdt_image` varchar(256) NOT NULL,
  `pdt_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pdt_id`, `pdt_name`, `pdt_price`, `pdt_category`, `pdt_desc`, `pdt_image`, `pdt_status`) VALUES
(3, 'Lenovo IdeaPad Slim 3i 15IGL Intel Celeron N4020 15.6\" HD Laptop', '38520', 3, 'Key Features\r\nMPN: 81WQ00FAIN\r\nModel: IdeaPad Slim 3i\r\nProcessor: Intel Celeron N4020 (4M Cache, 1.10 GHz up to 2.80 GHz)\r\nMemory: 4GB DDR4 2400MHz RAM\r\nStorage: 1TB 5400rpm 2.5\" HDD\r\nDisplay: 15.6\" HD (1366 x 768)', 'ideapad-slim-3i-0010-500x500.jpg', 1),
(4, 'Lenovo IdeaPad D330 10IGL Intel CDC N4020 10.1\" HD Touch Laptop', '40150', 3, 'Key Features\r\nMPN: 82H0001VIN\r\nModel: IdeaPad D330 10IGL\r\nProcessor: Intel Celeron N4020 (4M Cache,1.10 GHz up to 2.80 GHz)\r\nRAM: 4GB DDR4\r\nStorage: 128GB eMMC\r\nDisplay: 10.1\" (1280 x 800) HD Touchscreen', 'd330-1-500x500.jpg', 1),
(5, 'Lenovo IdeaPad Slim 3i Celeron N4020 256GB SSD 15.6\" HD Laptop with 3 Years Warranty', '43940', 3, 'Key Features\r\nMPN: 81WQ00MKIN\r\nModel: IdeaPad Slim 3i\r\nProcessor: Intel Celeron N4020 (4M Cache,1.10 GHz up to 2.80 GHz)\r\nRAM: 4GB DDR4, Storage: 256GB SSD\r\nDisplay: 15.6\"HD (1366x768)\r\nFeatures: 3 Years Warranty', 'slim-3i-001-500x500.jpg', 1),
(6, 'Dell Inspiron 15 3510 Intel Celeron N4020 15.6\" HD Laptop', '55600', 3, 'Key Features\r\nMPN: WARLOCKN315GLK2205200\r\nModel: Inspiron 15 3510\r\nProcessor: Intel Celeron N4020 Dual Core (4MB Cache, 1.10 GHz Up To 2.80 GHz)\r\nRAM: 4GB DDR4, Storage: 1TB SATA HDD\r\nDisplay: 15.6\" HD (1366 x 768) LED\r\nFeatures: HD camera', 'inspiron-15-3510-01-500x500.jpg', 1),
(7, 'Asus Vivobook E510MA Celeron N4020 15.6\" HD Laptop', '41999', 3, 'Key Features\r\nMPN: BR635W\r\nModel: Vivobook E510MA\r\nProcessor: Intel Celeron N4020 (4M Cache, 1.10 GHz up to 2.80 GHz)\r\nRAM: 4GB DDR4 (Onboard), Storage 256GB PCIEG3 SSD\r\nDisplay: 15.6\" HD (1366X768) LED DISPLAY\r\nFeatures: Type-C, CHICLET KEYBOARD', 'e410ma-01-500x500.jpg', 1),
(8, 'HP 15s-du1117TU Pentium Silver N5030 15.6\" HD Laptop', '41500', 3, 'Key Features\r\nMPN: 340P4PA\r\nModel: 15s-du1117TU\r\nProcessor: Intel Pentium Silver N5030 (4M Cache, 1.10 GHz up to 3.10 GHz)\r\nRAM: 4GB DDR4, Storage: 1 TB SATA HDD\r\nDisplay: 15.6\" HD (1366 x 768)\r\nFeatures: Dual speakers, Type-C', '15s-du1117tu-001-500x500.jpg', 1),
(9, 'Acer Aspire 3 A315-56 Core i3 10th Gen 15.6\'FHD Laptop with Windows 10', '44500', 3, 'Key Features\r\nMPN: NX.HS5SI.00C\r\nModel: Acer Aspire 3 A315-56\r\nIntel Core i3-1005G1 Processor (4M Cache, 1.20 GHz up to 3.40 GHz)\r\n4GB DDR4 RAM\r\n1TB 2.5-inch 5400 RPM HDD\r\n15.6\" Full HD (1920 x 1080) Display', 'aspire-3-1-500x500.jpg', 1),
(11, 'Lenovo IdeaPad Slim 3i 15IGL Intel Celeron N4020 15.6\" HD Laptop', '566456', 7, 'dtff', 'ideapad-slim-3i-0010-500x500.jpg', 1),
(12, 'trtrdfdy', '4564', 6, 'gdfdf', 'logitech-h390-500x500.jpg', 0),
(13, 'Viewsonic VA1903H 18.5\" LED Monitor (HDMI, VGA)', '10890', 7, 'Model: VA1903H\r\nResolution: WXGA (1366 x 768)\r\nDisplay: TN, 60Hz, 5ms\r\nPorts: HDMI, VGA, 3.5mm Audio\r\nFeatures: Flicker Free\r\n', 'va1903h-500x500.jpg', 1),
(14, 'BenQ EW2480 23.8\" Eye-Care IPS Monitor', '25300', 7, 'Model: BenQ EW2480\r\nResolution: FHD (1920x 1080)\r\nDisplay: IPS, 75Hz, 5ms GTG\r\nPorts: 3x HDMI\r\nFeatures: Free Sync, Low Blue Light, Flicker Free', 'ew2480-1-500x500.jpg', 1),
(15, 'BenQ Zowie XL2411K 24\" 144Hz DyAC e-Sports Gaming Monitor', '24300', 7, 'Model: Zowie XL2411K\r\nResolution: FHD (1920 x 1080)\r\nDisplay: TN, 144Hz, 1ms\r\nPorts: HDMI, DP, 3.5mm Audio Out\r\nFeatures: Flicker Free, Low Blue Light', 'zowie-xl2411k-500x500.jpg', 1),
(16, 'Xiaomi Redmi 1A 23.8\" Monitor', '14000', 7, 'Model: Redmi 1A\r\nResolution: Full HD (1920 x 1080)\r\nDisplay: IPS, 60Hz, 6ms\r\nPorts: HDMI, VGA\r\nFeatures: Low Blue Light', 'redmi-display-1a-1-500x500.jpg', 1),
(17, 'Xiaomi Mi 34\" 144Hz FreeSync Curved Monitor', '42000', 7, 'Model: Xiaomi Mi 34\" 144Hz FreeSync Curved\r\nResolution: WQHD (3440x1440)\r\nDisplay: VA, 144Hz, 4ms\r\nPorts: HDMI, DP, Audio Jack\r\nFeatures: Low Blue Light', 'redmi-34-curved-500x500.jpg', 1),
(18, 'Logitech G402 Hyperion Fury ULTRA-FAST FPS GAMING MOUSE', '3793', 5, 'Model: Logitech G402\r\n8 programmable buttons\r\nResolution: 240-4000 dpi\r\n32-bit ARM processor\r\n1 millisecond report', 'logitech-g402-1-500x500.jpg', 1),
(19, ' Logitech Surround Sound Z623 2:1 Speaker', '19800', 5, 'MPN: 980-000403\r\nModel: Logitech Z623\r\nTHX CERTIFIED AUDIO\r\n400 WATTS OF POWERFUL SOUND\r\nCONTROLS AT YOUR FINGERTIPS', 'Logitech Surround Sound Z623-500x500.jpg', 1),
(20, 'WEBCAM LOGITECH WEBCAM C925E (960-001075)', '14000', 5, 'Model: Logitech C925e\r\nMORE PRODUCTIVE CALLS\r\nCERTIFIED FOR BUSINESS\r\nGREAT VIDEO ANY ENVIRONMENT\r\nVERSATILE MOUNTING OPTIONS\r\n', 'Logitech C925e-1-500x500.jpg', 1),
(21, 'Astrum GW520 Wireless Dual Shock Vibration Joystick Gamepad Controller', '1700', 5, 'Model: GW520\r\nDual Vibration Motors\r\n2.4ghz Wireless Freedom\r\n5 in 1 for Multi-Platform Compatibility\r\n12 Fire Buttons and 8 Direction Buttons', 'gw520-01-500x500.jpg', 1),
(22, 'Vertux Extent Multi-Purpose Mouse Bungee With Headphone Stand & USB Hub', '1500', 5, 'Model: Extent\r\nUltra-Fasst USB Ports\r\n3-in-1 Multipurpurpose Design\r\nInput: DC 5V,1A, Output: DC 5V,1A\r\nCable Length: 1.5m', 'extent-01-500x500.jpg', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_info_category`
-- (See below for the actual view)
--
CREATE TABLE `product_info_category` (
`pdt_id` int(30)
,`pdt_name` varchar(256)
,`pdt_price` varchar(256)
,`pdt_desc` varchar(256)
,`pdt_image` varchar(256)
,`pdt_status` tinyint(4)
,`id` int(30)
,`ctg_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slider_desc` varchar(255) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `slider_desc`, `slider_image`, `status`) VALUES
(2, 'HP EliteBook', 'The elegance with versatile functionality. ', 'business-communications-mockup-laptop-voip-260nw-1868474806.jpg', 1),
(3, 'Nothing', 'A blend of freshly squeezed green apple and fruits.', 'blog-r-2.jpg', 1),
(4, 'Nothing 2', 'A blend of freshly squeezed green apple and fruits.', 'blog-r-1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `userName` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(70) DEFAULT NULL,
  `user_mobile` varchar(70) DEFAULT NULL,
  `user_password` varchar(70) DEFAULT NULL,
  `user_roles` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `userName`, `first_name`, `last_name`, `user_email`, `user_mobile`, `user_password`, `user_roles`) VALUES
(11, 'Muhammad Raihan Sefat', 'MUUHAMMAD', 'UDDIN', 'sefat@admin.com', '12345678901', '12345', 5),
(12, 'Muhammad Raihan', 'MUHAMMAD', 'UDDIN', 'sefat@gamil.com', '12345678901', '123', 5);

-- --------------------------------------------------------

--
-- Structure for view `product_info_category`
--
DROP TABLE IF EXISTS `product_info_category`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_info_category`  AS SELECT `products`.`pdt_id` AS `pdt_id`, `products`.`pdt_name` AS `pdt_name`, `products`.`pdt_price` AS `pdt_price`, `products`.`pdt_desc` AS `pdt_desc`, `products`.`pdt_image` AS `pdt_image`, `products`.`pdt_status` AS `pdt_status`, `categories`.`id` AS `id`, `categories`.`ctg_name` AS `ctg_name` FROM (`products` join `categories`) WHERE (`products`.`pdt_category` = `categories`.`id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_log`
--
ALTER TABLE `admin_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pdt_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pdt_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
