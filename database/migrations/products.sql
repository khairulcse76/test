-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2017 at 05:25 PM
-- Server version: 10.1.9-MariaDB-log
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `subCategoryId` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `colorId` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productBrief` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productDescription` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `productPrice` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `minQuantity` int(11) NOT NULL,
  `availability` tinyint(4) NOT NULL DEFAULT '0',
  `clickCount` int(11) NOT NULL DEFAULT '0',
  `isFeatured` tinyint(4) NOT NULL DEFAULT '0',
  `reorder_level` int(11) DEFAULT NULL,
  `condition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productFile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productFile1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productFile2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productFile3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categoryId`, `subCategoryId`, `colorId`, `brandName`, `productName`, `modelNo`, `productBrief`, `productDescription`, `productPrice`, `quantity`, `minQuantity`, `availability`, `clickCount`, `isFeatured`, `reorder_level`, `condition`, `productFile`, `productFile1`, `productFile2`, `productFile3`, `deleted_at`, `created_at`, `updated_at`) VALUES
(10, NULL, '2', '4', 'ম্যাক্স', 'Max Cartoon Bag M-8030', 'M-8030', NULL, '<p style="margin: 10px 0px; color: #8b8b8f; padding: 0px; line-height: 1.5em; font-family: Arial, Helvetica, sans-serif;"><span style="margin: 0px; padding: 0px; color: #008000;"><strong style="margin: 0px; padding: 0px;">With Full Three Years Service Warranty</strong></span></p>\r\n<div style="color: #8b8b8f; margin: 0px; padding: 0px; font-family: Arial, Helvetica, sans-serif; line-height: 16.2px;">This versatile, casual Back Pack with Wheel design works for business , school, comuting and travel.&nbsp;</div>\r\n<div style="color: #8b8b8f; margin: 0px; padding: 0px; font-family: Arial, Helvetica, sans-serif; line-height: 16.2px;">Its tall, roomy Main compartment Has a special compartment for your laptop or files. Feature numerous orzanizer pockets;&nbsp;backpack front side have a matal lock for a lovely lock</div>', 432.00, 5, 1, 1, 0, 0, NULL, 'New', '795f562f2eb8cb65c34288964308cf781508432390.jpg', 'fa38fa3f29548b07254c72af8e7d01cf1508432391.jpg', NULL, NULL, NULL, '2017-10-19 10:59:52', '2017-10-19 10:59:52'),
(11, NULL, '1', '5', 'ম্যাক্স', 'Back pack M-44', 'M-44', NULL, '<p style="margin: 10px 0px; color: #8b8b8f; font-family: \'Segoe Ui\', arial; font-size: medium; padding: 0px; line-height: 1.5em;"><span style="margin: 0px; padding: 0px; color: #008000;"><strong style="margin: 0px; padding: 0px;">With Full Three Years Service Warranty</strong></span></p>\r\n<div style="color: #8b8b8f; font-family: \'Segoe Ui\', arial; font-size: medium; margin: 0px; padding: 0px;">This versatile, casual Back Pack with Wheel design works for business, school, commuting and travel.&nbsp;</div>\r\n<div style="color: #8b8b8f; font-family: \'Segoe Ui\', arial; font-size: medium; margin: 0px; padding: 0px;">Its tall, roomy main compartment has a special compartment for your laptop or files. Features numerous organizer pockets;&nbsp;fashionable design.</div>', 1350.00, 56, 5, 1, 0, 0, NULL, 'New', 'b3441b20706a68acd52ef039212970041508432801.jpg', 'd823b5a0d29cc7f0ac09ee30469c79981508432801.jpg', 'fe1cc331d0381b39c37843d5030b8d631508432801.jpg', NULL, NULL, '2017-10-19 11:06:41', '2017-10-19 11:06:41'),
(12, NULL, '9', '2', 'ম্যাক্স', 'Ladies Bag M-1503', 'M-1503', NULL, '<p style="margin: 10px 0px; color: #8b8b8f; padding: 0px; line-height: 1.5em; font-family: Arial, Helvetica, sans-serif;"><span style="margin: 0px; padding: 0px; color: #008000;"><strong style="margin: 0px; padding: 0px;">With Full Three Years Service Warranty</strong></span></p>\r\n<div style="color: #8b8b8f; margin: 0px; padding: 0px; font-family: Arial, Helvetica, sans-serif; line-height: 16.2px;">This versatile, casual Back Pack with Wheel design works for business , school, comuting and travel.&nbsp;</div>\r\n<div style="color: #8b8b8f; margin: 0px; padding: 0px; font-family: Arial, Helvetica, sans-serif; line-height: 16.2px;">Its tall, roomy Main compartment Has a special compartment for your laptop or files. Feature numerous orzanizer pockets;&nbsp;backpack front side have a matal lock for a lovely lock.</div>\r\n<div style="color: #8b8b8f; margin: 0px; padding: 0px; font-family: Arial, Helvetica, sans-serif; line-height: 16.2px;">&nbsp;</div>\r\n<div style="color: #8b8b8f; margin: 0px; padding: 0px; font-family: Arial, Helvetica, sans-serif; line-height: 16.2px;">\r\n<p style="margin: 10px 0px; padding: 0px; line-height: 1.5em;"><strong style="margin: 0px; padding: 0px;">Features:</strong></p>\r\n<ul style="padding: 0px; margin: 10px 0px; list-style: none outside none; line-height: 16.2px;">\r\n<li style="line-height: normal; margin: 0px; padding: 6px 0px 6px 20px; list-style: none; background: url(\'http://www.maxbagworld.com/templates/ot_digitalbox/images/tick-icon.png\') 0px 8px no-repeat;">construction metarials: fabricks</li>\r\n<li style="line-height: normal; margin: 0px; padding: 6px 0px 6px 20px; list-style: none; background: url(\'http://www.maxbagworld.com/templates/ot_digitalbox/images/tick-icon.png\') 0px 8px no-repeat;">Monograming Available: Yes</li>\r\n</ul>\r\n<strong style="margin: 0px; padding: 0px; line-height: 16.2px;">External Features:</strong>\r\n<ul style="padding: 0px; margin: 10px 0px; list-style: none outside none; line-height: 16.2px;">\r\n<li style="line-height: normal; margin: 0px; padding: 6px 0px 6px 20px; list-style: none; background: url(\'http://www.maxbagworld.com/templates/ot_digitalbox/images/tick-icon.png\') 0px 8px no-repeat;">Front Zip pockets .</li>\r\n<li style="line-height: normal; margin: 0px; padding: 6px 0px 6px 20px; list-style: none; background: url(\'http://www.maxbagworld.com/templates/ot_digitalbox/images/tick-icon.png\') 0px 8px no-repeat;">Top carry handle.</li>\r\n<li style="line-height: normal; margin: 0px; padding: 6px 0px 6px 20px; list-style: none; background: url(\'http://www.maxbagworld.com/templates/ot_digitalbox/images/tick-icon.png\') 0px 8px no-repeat;">Air vent hole .</li>\r\n</ul>\r\n</div>', 900.00, 54, 1, 1, 0, 0, NULL, 'New', '48c467883343fef7e5bd0bfac25033161508432963.jpg', '18708486be719fd6a1e85237b5945b5a1508432963.jpg', '16d72a68398315d8d19865483ea177c71508432964.jpg', '8e9247c1651a45735084e5bdc3aa108c1508432964.jpg', NULL, '2017-10-19 11:09:24', '2017-10-19 11:09:24'),
(13, NULL, '11.1.9', '3', 'ম্যাক্স', 'Shoulder Bag M-293', 'M-293', NULL, '<table style="max-width: 100%; background-color: transparent; border-collapse: collapse; border-spacing: 0px; margin: 0px; padding: 0px; width: 352px; font-family: Arial, Helvetica, sans-serif; line-height: 16.2px; height: 48px;" border="0" cellspacing="0" cellpadding="0">\r\n<tbody style="margin: 0px; padding: 0px;">\r\n<tr style="margin: 0px; padding: 0px;">\r\n<td style="outline: none 0px; margin: 0px; padding: 4px 5px;" valign="top" width="55%">\r\n<p style="margin: 10px 0px; padding: 0px; line-height: 1.5em;"><span style="margin: 0px; padding: 0px; color: #008000;"><strong style="margin: 0px; padding: 0px;">With Full Three Years Service Warranty</strong></span></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 600.00, 6, 1, 0, 0, 0, NULL, 'UpComing', 'e6cecc03d9ce4bd92c68938bc0d699a21508433151.jpg', '76ec77fcef38b82467a7de2232dca28d1508433151.jpg', '8c750e990611f75eca4b93bdbcc733ee1508433152.jpg', NULL, NULL, '2017-10-19 11:12:32', '2017-10-19 11:12:32'),
(14, NULL, '4', '4', 'ম্যাক্স', 'Max Travel Bag M-154/20"', 'M-154/20', NULL, '<p style="margin: 10px 0px; color: #8b8b8f; font-family: \'Segoe Ui\', arial; padding: 0px; line-height: 1.5em;"><span style="margin: 0px; padding: 0px; color: #008000;"><strong style="margin: 0px; padding: 0px;">With Full Three Years Service Warranty</strong></span></p>\r\n<div style="color: #8b8b8f; font-family: \'Segoe Ui\', arial; margin: 0px; padding: 0px;">A versatile case with removable garment sleeve and easy, pop-up expandable main comparment trips.<br style="margin: 0px; padding: 0px;" />Features removable framed garment sleeve, tie-down straps and zip pockets.</div>\r\n<p style="margin: 0px 0px 5px; color: #8b8b8f; font-family: \'Segoe Ui\', arial;">&nbsp;</p>\r\n<p style="margin: 10px 0px; color: #8b8b8f; font-family: \'Segoe Ui\', arial; padding: 0px; line-height: 1.5em;"><strong style="margin: 0px; padding: 0px;">Features:</strong></p>\r\n<ul style="padding: 0px; margin: 10px 0px; list-style: none outside none; color: #8b8b8f; font-family: \'Segoe Ui\', arial;">\r\n<li style="line-height: normal; margin: 0px; padding: 6px 0px 6px 20px; list-style: none; background: url(\'http://maxbagworld.com/old/templates/ot_digitalbox/images/tick-icon.png\') 0px 8px no-repeat;">Construction Material: Fabric</li>\r\n</ul>\r\n<p style="margin: 0px 0px 5px; color: #8b8b8f; font-family: \'Segoe Ui\', arial;"><strong style="margin: 0px; padding: 0px;">External Features:</strong></p>\r\n<ul style="padding: 0px; margin: 10px 0px; list-style: none outside none; color: #8b8b8f; font-family: \'Segoe Ui\', arial;">\r\n<li style="line-height: normal; margin: 0px; padding: 6px 0px 6px 20px; list-style: none; background: url(\'http://maxbagworld.com/old/templates/ot_digitalbox/images/tick-icon.png\') 0px 8px no-repeat;">U-zip pocket</li>\r\n<li style="line-height: normal; margin: 0px; padding: 6px 0px 6px 20px; list-style: none; background: url(\'http://maxbagworld.com/old/templates/ot_digitalbox/images/tick-icon.png\') 0px 8px no-repeat;">Front zip pockets.</li>\r\n<li style="line-height: normal; margin: 0px; padding: 6px 0px 6px 20px; list-style: none; background: url(\'http://maxbagworld.com/old/templates/ot_digitalbox/images/tick-icon.png\') 0px 8px no-repeat;">Add-A-Bag strap</li>\r\n<li style="line-height: normal; margin: 0px; padding: 6px 0px 6px 20px; list-style: none; background: url(\'http://maxbagworld.com/old/templates/ot_digitalbox/images/tick-icon.png\') 0px 8px no-repeat;">Top, side and carry handles</li>\r\n</ul>', 1000.00, 5, 1, 0, 0, 0, NULL, 'Old', 'b9fc3c31694267bb7564b57af4c9c2871508477566.jpg', '76c7df92c1e1b5039f539dfc38c3936d1508477568.jpg', 'cb7520d58f7216bcf28010f438b1edce1508477568.jpg', NULL, NULL, '2017-10-19 23:32:48', '2017-10-19 23:32:48'),
(15, NULL, '3.4', '4.5', 'ম্যাক্স', 'Trolley Case M-140/22"', 'M-140/22"', NULL, '<p>&nbsp;<strong style="color: #008000; font-family: \'Segoe Ui\', arial; font-size: medium; margin: 0px; padding: 0px;">With Full Three Years Service Warranty</strong></p>\r\n<div style="color: #8b8b8f; font-family: \'Segoe Ui\', arial; font-size: medium; margin: 0px; padding: 0px;">This versatile, casual Back Pack with Wheel design works for business, school, commuting and travel.&nbsp;</div>\r\n<div style="color: #8b8b8f; font-family: \'Segoe Ui\', arial; font-size: medium; margin: 0px; padding: 0px;">Its tall, roomy main compartment has a special compartment for your laptop or files. Features numerous organizer pockets;&nbsp;fashionable design.</div>', 3100.00, 54, 1, 0, 0, 0, NULL, 'Old', 'b21aaef2169a1c4f281ea7bd750771721508478921.jpg', '47c3e84b11206704bbbc8f392a1e92d61508478921.jpg', NULL, NULL, NULL, '2017-10-19 23:55:21', '2017-10-19 23:55:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_modelno_unique` (`modelNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
