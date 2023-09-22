-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2023 at 02:15 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mutli_vendor_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `confirm` enum('No','Yes') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `vendor_id`, `email`, `password`, `image`, `mobile`, `status`, `created_at`, `updated_at`, `confirm`) VALUES
(1, 'Kishor Pun Magar', 'admin', 0, 'admin@admin.com', '$2y$10$hm9p6icymEW9jLi9zDSQGO4jufJsc/RiZjnUh8/I9WA7UEuEf4Vzi', 'storage/images/admin_image/1669125572.png', '98000000000000', 1, '2022-10-31 05:01:20', '2023-06-23 05:49:31', 'No'),
(2, 'Jhon', 'vendor', 1, 'johan@admin.com', '$2y$10$hm9p6icymEW9jLi9zDSQGO4jufJsc/RiZjnUh8/I9WA7UEuEf4Vzi', 'storage/images/vendor_image/1688728741.jpg', '980000', 1, '2022-10-31 05:04:37', '2023-07-27 12:01:20', 'No'),
(5, 'Pradip', 'vendor', 2, 'pradipsyster@gmail.com', '$2y$10$JO8xXoQYmLjUxG4oczlW3u5ZBd9cL2QHAqLSjIH7mX/4CbBDw1x4G', '', '9754545454545', 1, '2023-07-07 06:44:26', '2023-07-10 08:52:19', 'No'),
(6, 'Kishor Pun', 'vendor', 3, 'kishorpun55@gmail.com', '$2y$10$Tws853mmJObQnvlKVI6NqOynAMvtg476twm7vAzgwO/kJbnHdw.mO', '', '0988777663', 1, '2023-07-07 11:18:57', '2023-07-15 19:46:39', 'No'),
(7, 'Kishor Pun', 'vendor', 4, 'kishorpun555@gmail.com', '$2y$10$umxIPYPinka2MjwtAWm5WeuasmgLJrWByUiYrjbCDQSnLAYJr.apu', '', '09887776635', 1, '2023-07-07 11:20:20', '2023-07-27 11:57:51', 'Yes'),
(8, 'Kishor PUN', 'vendor', 5, 'kishorpun@gmail.com', '$2y$10$W3IYxrXBFarG2ywWPNsaxezxXWXRPJOtrl5Lls.si6mzu0tEd2zB6', '', '97545454545', 1, '2023-07-07 12:46:46', '2023-07-10 08:52:28', 'Yes'),
(9, 'wovixideri', 'vendor', 6, 'xetux@mailinator.com', '$2y$10$GquSZ72olSu7yZ6SQBVLCeNC5WI3qm8Jys6SJj9xHMJ9./SpIqcnq', '', '98778667623', 1, '2023-07-09 21:29:18', '2023-07-27 12:00:11', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banner_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `link`, `title`, `alt`, `status`, `created_at`, `updated_at`, `banner_type`) VALUES
(13, 'storage/images/banner_image/1688178016.png', 'Sed harum corporis p', 'Cupidatat aut et pra', 'Temporibus consequat', 1, '2023-06-30 20:35:16', '2023-09-16 14:46:07', 'Slider'),
(14, 'storage/images/banner_image/1688178029.png', 'Eaque ipsam hic qui', 'Cupidatat facilis in', 'Debitis quas invento', 1, '2023-06-30 20:35:29', '2023-06-30 21:01:04', 'Slider'),
(15, 'storage/images/banner_image/1688179591.png', 'Quia est consectetu', 'Quo officiis officia', 'Adipisicing delectus', 1, '2023-06-30 21:01:31', '2023-06-30 21:01:31', 'Fix'),
(16, 'storage/images/banner_image/1688180804.jpg', 'Voluptatem sunt ex', 'Optio qui at archit', 'Eveniet aute perfer', 1, '2023-06-30 21:21:44', '2023-07-21 22:23:54', 'Fix');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brands` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brands`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Adidas', 1, '2022-11-23 14:48:01', '2023-09-18 10:20:05'),
(3, 'Levi\'s', 1, '2022-11-23 14:51:29', '2023-09-18 10:20:33'),
(5, 'Nike', 1, '2023-07-01 03:27:39', '2023-07-01 03:27:39'),
(6, 'Ralph Lauren', 1, '2023-07-01 03:27:49', '2023-09-18 10:21:04'),
(7, 'GUCCI', 1, '2023-07-01 03:28:00', '2023-09-18 10:21:33'),
(8, 'Burberry', 1, '2023-07-01 03:28:14', '2023-09-18 10:21:51'),
(9, 'Prada', 1, '2023-07-01 03:28:46', '2023-09-18 10:22:06'),
(10, 'Apple', 1, '2023-07-01 03:29:08', '2023-09-18 10:28:19'),
(13, 'Huavwei', 1, '2023-09-18 10:28:49', '2023-09-18 10:28:49'),
(14, 'Sony', 1, '2023-09-18 10:29:20', '2023-09-18 10:29:20'),
(15, 'Samsung', 1, '2023-09-18 10:30:03', '2023-09-18 10:30:03'),
(16, 'HP', 1, '2023-09-18 10:30:16', '2023-09-18 10:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `section_id`, `category_name`, `category_image`, `category_discount`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 2, 'Smartphones', 'storage/images/category/1669213241.jpg', '0', 'Maxime corrupti est', 'smart-phones', 'Ex assumenda minima', 'Error quo non nostru', 'Autem ipsum aliqua', 1, '2022-11-23 08:28:50', '2023-07-05 06:01:00'),
(4, 0, 1, 'Clothing', 'storage/images/category/1688198303.jpg', '0', '', 'clothing', 'Men\'s Fashion', '', '', 1, '2023-06-23 07:29:23', '2023-07-27 23:33:54'),
(5, 4, 1, 'Shrits', '', '0', '', 'shirts', 'Men\'s Fashion', '', '', 1, '2023-07-05 06:03:33', '2023-07-27 23:33:19'),
(6, 0, 2, 'Laptops', '', '0', '', 'lap-tops', '', '', '', 1, '2023-07-05 06:04:17', '2023-07-05 06:04:17'),
(7, 0, 2, 'Desktops', '', '0', '', 'desktops', '', '', '', 1, '2023-07-05 06:05:07', '2023-07-05 06:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `coupon_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `users` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brands` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `vendor_id`, `coupon_option`, `coupon_code`, `categories`, `users`, `brands`, `coupon_type`, `amount_type`, `amount`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 0, 'Manual', 'H7CmMC3x', '4, 5', '', '1', 'Single Time', 'Fixed', 1000.00, '2023-07-29', 1, '2023-07-18 05:33:08', '2023-07-28 03:32:15'),
(3, 0, 'Manual', '2354zfz', '4, 5', 'kishorpun55@gmail.com', '1, 3, 4', 'Multiple Times', 'Percentage', 20.00, '2023-07-28', 1, '2023-07-18 05:34:06', '2023-07-18 11:33:02'),
(4, 3, 'Automatic', 'ZMnU6rXC', '4, 5', '', '8, 9, 10', 'Multiple Times', 'Percentage', 20.00, '2023-08-05', 1, '2023-07-19 05:19:44', '2023-07-19 05:22:55'),
(5, 0, 'Automatic', 'BVi3Wdxn', '4, 5', 'kishorpun55@gmail.com, codemaster890@gmail.com', '', 'Single Time', 'Percentage', 20.00, '2023-07-24', 1, '2023-07-23 08:26:49', '2023-07-27 22:32:06'),
(6, 3, 'Automatic', 'YYJm3xKM', '4, 5', 'kishorpun55@gmail.com', '', 'Single Time', 'Percentage', 20.00, '2023-08-05', 1, '2023-07-26 07:16:15', '2023-07-26 07:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `user_id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kishor Pun', 'Ruma', 'Beni', 'Beni', 'Nepal', '44600', '98644346555', '', '', 1, NULL, '2023-07-25 07:23:35'),
(6, 19, 'Kishor Pun', 'Ruma', 'Beni', 'Kathmandu', 'Azerbaijan', '23423', '9864434655', '', '', 0, '2023-07-23 08:45:16', '2023-07-23 08:45:16'),
(7, 1, 'Kishor Pun', 'Ruma', 'Beni', 'Beni', 'Afghanistan', '4460', '9864434655', '', '', 0, '2023-07-23 23:52:44', '2023-07-25 07:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_statuses`
--

CREATE TABLE `item_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_statuses`
--

INSERT INTO `item_statuses` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pending', 1, NULL, NULL),
(2, 'In Process', 1, NULL, NULL),
(3, 'Shipped', 1, NULL, NULL),
(4, 'Delivered', 1, NULL, NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_16_111222_create_admins_table', 1),
(6, '2022_08_31_090515_create_vendors_table', 1),
(7, '2022_08_31_105534_create_vendor_bussiness_details_table', 1),
(8, '2022_08_31_105624_create_vendor_bank_details_table', 1),
(9, '2022_09_01_072543_add_address_pro_to_vendor_bussiness_details_table', 1),
(10, '2022_09_02_052832_add_confirm_to_admins_table', 1),
(11, '2022_09_02_053415_add_confirm_to_vendors_table', 1),
(12, '2022_11_22_140146_create_sections_table', 2),
(13, '2022_11_22_144514_create_categories_table', 3),
(14, '2022_11_23_201654_create_brands_table', 4),
(16, '2022_11_23_215333_add_admin_id_to_products_table', 6),
(17, '2022_12_04_002343_create_products_attributes_table', 7),
(18, '2022_12_04_002934_add_sku_to_products_attributes_table', 8),
(19, '2023_04_13_104907_create_products_images_table', 9),
(20, '2023_06_23_131931_create_banners_table', 10),
(21, '2023_07_01_022319_add_banner_type_to_banners_table', 11),
(23, '2022_11_23_204707_create_products_table', 12),
(24, '2023_07_01_081857_add_is_best_seller_to_products_table', 13),
(26, '2023_07_02_074851_create_products_filters_values_table', 15),
(27, '2023_07_02_070513_create_products_filters_table', 16),
(28, '2023_07_06_104351_add_product_url_to_products_table', 17),
(29, '2023_07_12_100618_create_recently_viewed_products_table', 18),
(30, '2023_07_12_131318_add_group_code_to_products_table', 19),
(31, '2023_07_15_033436_create_carts_table', 20),
(32, '2014_10_12_000000_create_users_table', 21),
(33, '2023_07_16_074758_add_mobile_to_users_table', 22),
(36, '2023_07_18_092710_create_coupons_table', 23),
(38, '2023_07_20_080407_create_delivery_addresses_table', 24),
(39, '2023_07_21_105847_create_orders_products_table', 25),
(40, '2023_07_21_105903_create_orders_table', 25),
(41, '2023_07_22_100906_create_order_statuses_table', 26),
(43, '2023_07_22_104057_create_item_statuses_table', 27),
(44, '2023_07_22_105830_add_item_status_to_orders_products_table', 28),
(46, '2023_07_23_085425_create_order_logs_table', 29),
(47, '2023_07_23_091755_add_courier_name_to_orders_table', 30),
(48, '2023_07_23_101458_add_column_to_orders_products_table', 31),
(49, '2023_07_23_104526_add_column_to_order_logs_table', 32),
(50, '2023_07_24_031752_create_shipping_charges_table', 33),
(51, '2023_07_24_100745_drop_column_from_shipping_charges_table', 34),
(52, '2023_07_24_100944_add_column_to_shipping_charges_table', 35),
(53, '2023_07_25_084548_create_postal_codes_table', 36),
(54, '2023_07_25_135508_add_column_to_vendors_table', 37),
(55, '2023_07_27_132709_create_contacts_table', 38),
(56, '2023_07_28_114702_create_newslater_subscribers_table', 38),
(57, '2023_07_30_103550_create_ratings_table', 39);

-- --------------------------------------------------------

--
-- Table structure for table `newslater_subscribers`
--

CREATE TABLE `newslater_subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newslater_subscribers`
--

INSERT INTO `newslater_subscribers` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'kishorpun55@gmail.com', 1, NULL, '2023-07-28 07:04:24'),
(2, 'codemaster890@gmail.com', 1, '2023-07-28 07:51:01', '2023-07-28 07:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charges` double(8,2) NOT NULL,
  `coupon_amount` double(8,2) DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_geteway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` double(8,2) NOT NULL,
  `courier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `shipping_charges`, `coupon_amount`, `coupon_code`, `order_status`, `payment_method`, `payment_geteway`, `grand_total`, `courier_name`, `tracking_number`, `created_at`, `updated_at`) VALUES
(7, 1, 'Kishor Pun', 'Kishor Pun', 'Beni', 'Beni', 'Nepal', '234234', '98644346555', 'kishorpun55@gmail.com', 0.00, 2070.00, '2354zfz', 'Shipped', 'COD', 'COD', 8280.00, 'Fedex', '2342326', '2023-07-21 07:25:48', '2023-07-23 21:29:49'),
(8, 1, 'Kishor Pun', 'Kishor Pun', 'Beni', 'Beni', 'Nepal', '234234', '98644346555', 'kishorpun55@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 900.00, '', '', '2023-07-21 14:17:46', '2023-07-21 14:17:46'),
(9, 1, 'Kishor Pun', 'Kishor Pun', 'Beni', 'Beni', 'Nepal', '234234', '98644346555', 'kishorpun55@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 36000.00, '', '', '2023-07-22 02:01:25', '2023-07-22 02:01:25'),
(10, 1, 'Kishor Pun', 'Kishor Pun', 'Beni', 'Beni', 'Nepal', '234234', '98644346555', 'kishorpun55@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 1350.00, '', '', '2023-07-23 00:21:16', '2023-07-23 00:21:16'),
(11, 1, 'Kishor Pun', 'Kishor Pun', 'Beni', 'Beni', 'Nepal', '234234', '98644346555', 'kishorpun55@gmail.com', 0.00, NULL, NULL, 'Shipped', 'COD', 'COD', 1350.00, 'Fedex', '2342326', '2023-07-23 00:21:47', '2023-07-23 06:00:07'),
(12, 1, 'Kishor Pun', 'Kishor Pun', 'Beni', 'Beni', 'Nepal', '234234', '98644346555', 'kishorpun55@gmail.com', 0.00, NULL, NULL, 'Partially Shipped', 'COD', 'COD', 1350.00, '', '', '2023-07-23 00:23:11', '2023-07-23 03:06:02'),
(13, 1, 'Kishor Pun', 'Kishor Pun', 'Beni', 'Beni', 'Nepal', '234234', '98644346555', 'kishorpun55@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 10350.00, '', '', '2023-07-23 06:11:57', '2023-07-23 06:11:57'),
(14, 1, 'Kishor Pun', 'Kishor Pun', 'Beni', 'Kath', 'Armenia', '45634', '9864434655', 'codemaster890@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 10350.00, '', '', '2023-07-23 08:12:44', '2023-07-23 08:12:44'),
(15, 1, 'Kishor Pun', 'Kishor Pun', 'Beni', 'Kath', 'Armenia', '45634', '9864434655', 'codemaster890@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 10350.00, '', '', '2023-07-23 08:16:07', '2023-07-23 08:16:07'),
(16, 1, 'Kishor Pun', 'Kishor Pun', 'Beni', 'Kath', 'Armenia', '45634', '9864434655', 'codemaster890@gmail.com', 0.00, 90.00, 'g9k5BOe6', 'New', 'COD', 'COD', 360.00, '', '', '2023-07-23 08:29:52', '2023-07-23 08:29:52'),
(17, 1, 'Kishor Pun', 'Kishor Pun', 'Beni', 'Kathmandu', 'Azerbaijan', '23423', '9864434655', 'codemaster890@gmail.com', 0.00, NULL, NULL, 'New', 'COD', 'COD', 450.00, '', '', '2023-07-23 08:45:43', '2023-07-23 08:45:43'),
(18, 1, 'Kishor Pun', 'Kishor Pun', 'Beni', 'Beni', 'Afghanistan', '23423', '9864434655', 'kishorpun55@gmail.com', 100.00, 180.00, 'BVi3Wdxn', 'New', 'COD', 'COD', 820.00, '', '', '2023-07-24 00:06:36', '2023-07-24 00:06:36'),
(19, 1, 'Kishor Pun', 'Kishor Pun', 'Beni', 'Beni', 'Afghanistan', '23423', '9864434655', 'kishorpun55@gmail.com', 50.00, NULL, NULL, 'New', 'COD', 'COD', 3650.00, '', '', '2023-07-24 05:26:22', '2023-07-24 05:26:22'),
(20, 1, 'Kishor Pun', 'Kishor Pun', 'Beni', 'Beni', 'Afghanistan', '23423', '9864434655', 'kishorpun55@gmail.com', 50.00, NULL, NULL, 'New', 'COD', 'COD', 3650.00, '', '', '2023-07-24 05:28:52', '2023-07-24 05:28:52'),
(21, 1, 'Kishor Pun', 'Kishor Pun', 'Beni', 'Beni', 'Afghanistan', '23423', '9864434655', 'kishorpun55@gmail.com', 50.00, NULL, NULL, 'New', 'COD', 'COD', 3650.00, '', '', '2023-07-24 05:30:29', '2023-07-24 05:30:29'),
(23, 1, 'Kishor Pun', 'Kishor Pun', 'Beni', 'Beni', 'Afghanistan', '23423', '9864434655', 'kishorpun55@gmail.com', 50.00, NULL, NULL, 'New', 'COD', 'COD', 2750.00, '', '', '2023-07-24 05:58:38', '2023-07-24 05:58:38'),
(24, 1, 'Kishor Pun', 'Kishor Pun', 'Beni', 'Beni', 'Nepal', '234234', '98644346555', 'kishorpun55@gmail.com', 50.00, NULL, NULL, 'New', 'COD', 'COD', 1850.00, '', '', '2023-07-24 06:00:31', '2023-07-24 06:00:31'),
(25, 1, 'Kishor Pun', 'Kishor Pun', 'Beni', 'Beni', 'Nepal', '44600', '98644346555', 'kishorpun55@gmail.com', 0.00, 1800.00, 'YYJm3xKM', 'New', 'COD', 'COD', 7200.00, '', '', '2023-07-26 07:17:12', '2023-07-26 07:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `user_id`, `vendor_id`, `admin_id`, `product_id`, `product_name`, `product_code`, `product_color`, `product_size`, `product_price`, `product_qty`, `courier_name`, `tracking_number`, `item_status`, `created_at`, `updated_at`) VALUES
(4, 7, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XLL', '900', '6', 'Fedex', '12345', 'Shipped', '2023-07-21 07:25:48', '2023-07-23 21:28:25'),
(5, 7, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XL', '450', '3', '', '', 'In Process', '2023-07-21 07:25:48', '2023-07-22 05:23:08'),
(6, 7, 1, 0, 1, 3, 'Summer Shirt', '077', 'White', 'Small', '900', '4', '', '', 'In Process', '2023-07-21 07:25:48', '2023-07-23 21:19:24'),
(7, 8, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XL', '450', '2', '', '', 'Pending', '2023-07-21 14:17:46', '2023-07-22 05:19:03'),
(8, 9, 1, 3, 6, 9, 'Black Shirt', '888343', 'Black', 'XL', '9000', '4', '', '', '', '2023-07-22 02:01:25', '2023-07-22 02:01:25'),
(9, 10, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XL', '450', '1', '', '', '', '2023-07-23 00:21:16', '2023-07-23 00:21:16'),
(10, 10, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XLL', '900', '1', '', '', '', '2023-07-23 00:21:16', '2023-07-23 00:21:16'),
(11, 11, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XL', '450', '1', 'Fedex', '12345', 'Shipped', '2023-07-23 00:21:47', '2023-07-23 05:03:45'),
(12, 11, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XLL', '900', '1', 'Fedex', '213213', 'Shipped', '2023-07-23 00:21:47', '2023-07-23 05:59:41'),
(13, 12, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XL', '450', '1', '', '', '', '2023-07-23 00:23:11', '2023-07-23 00:23:11'),
(14, 12, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XLL', '900', '1', '', '', '', '2023-07-23 00:23:11', '2023-07-23 00:23:11'),
(15, 13, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XL', '450', '1', '', '', '', '2023-07-23 06:11:57', '2023-07-23 06:11:57'),
(16, 13, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XLL', '900', '1', '', '', '', '2023-07-23 06:11:57', '2023-07-23 06:11:57'),
(17, 13, 1, 3, 6, 9, 'Black Shirt', '888343', 'Black', 'XL', '9000', '1', 'Fedex', '12345', 'Shipped', '2023-07-23 06:11:57', '2023-07-23 06:29:14'),
(18, 14, 19, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XL', '450', '1', '', '', '', '2023-07-23 08:12:44', '2023-07-23 08:12:44'),
(19, 14, 19, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XLL', '900', '1', '', '', '', '2023-07-23 08:12:44', '2023-07-23 08:12:44'),
(20, 14, 19, 3, 6, 9, 'Black Shirt', '888343', 'Black', 'XL', '9000', '1', '', '', '', '2023-07-23 08:12:44', '2023-07-23 08:12:44'),
(21, 15, 19, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XL', '450', '1', '', '', '', '2023-07-23 08:16:07', '2023-07-23 08:16:07'),
(22, 15, 19, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XLL', '900', '1', '', '', '', '2023-07-23 08:16:08', '2023-07-23 08:16:08'),
(23, 15, 19, 3, 6, 9, 'Black Shirt', '888343', 'Black', 'XL', '9000', '1', '', '', '', '2023-07-23 08:16:08', '2023-07-23 08:16:08'),
(24, 16, 19, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XL', '450', '1', '', '', '', '2023-07-23 08:29:52', '2023-07-23 08:29:52'),
(25, 17, 19, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XL', '450', '1', '', '', '', '2023-07-23 08:45:43', '2023-07-23 08:45:43'),
(26, 18, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XL', '450', '2', '', '', '', '2023-07-24 00:06:36', '2023-07-24 00:06:36'),
(27, 19, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XL', '450', '2', '', '', '', '2023-07-24 05:26:22', '2023-07-24 05:26:22'),
(28, 19, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XLL', '900', '3', '', '', '', '2023-07-24 05:26:22', '2023-07-24 05:26:22'),
(29, 20, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XL', '450', '2', '', '', '', '2023-07-24 05:28:52', '2023-07-24 05:28:52'),
(30, 20, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XLL', '900', '3', '', '', '', '2023-07-24 05:28:52', '2023-07-24 05:28:52'),
(31, 21, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XL', '450', '2', '', '', '', '2023-07-24 05:30:29', '2023-07-24 05:30:29'),
(32, 21, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XLL', '900', '3', '', '', '', '2023-07-24 05:30:29', '2023-07-24 05:30:29'),
(34, 23, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XLL', '900', '3', '', '', '', '2023-07-24 05:58:38', '2023-07-24 05:58:38'),
(35, 24, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XL', '450', '2', '', '', '', '2023-07-24 06:00:31', '2023-07-24 06:00:31'),
(36, 24, 1, 0, 1, 4, 'Full Shirt', '0011', 'Black', 'XLL', '900', '1', '', '', '', '2023-07-24 06:00:31', '2023-07-24 06:00:31'),
(37, 25, 1, 3, 6, 9, 'Black Shirt', '888343', 'Black', 'XL', '9000', '1', 'Fedex', '12345', 'Shipped', '2023-07-26 07:17:12', '2023-07-26 07:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_logs`
--

CREATE TABLE `order_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_item_id` int(11) NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_logs`
--

INSERT INTO `order_logs` (`id`, `order_id`, `order_item_id`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 7, 0, 'Partially Shipped', '2023-07-23 03:17:58', '2023-07-23 03:17:58'),
(2, 7, 0, 'Delivered', '2023-07-23 03:19:15', '2023-07-23 03:19:15'),
(3, 11, 0, 'Pending', '2023-07-23 03:55:21', '2023-07-23 03:55:21'),
(4, 11, 0, 'Pending', '2023-07-23 03:56:01', '2023-07-23 03:56:01'),
(5, 11, 0, 'Shipped', '2023-07-23 04:05:43', '2023-07-23 04:05:43'),
(6, 11, 0, 'Shipped', '2023-07-23 04:12:41', '2023-07-23 04:12:41'),
(7, 11, 11, 'Shipped', '2023-07-23 05:02:49', '2023-07-23 05:02:49'),
(8, 11, 11, 'Shipped', '2023-07-23 05:03:45', '2023-07-23 05:03:45'),
(9, 11, 12, 'Pending', '2023-07-23 05:04:01', '2023-07-23 05:04:01'),
(10, 11, 12, 'In Process', '2023-07-23 05:24:40', '2023-07-23 05:24:40'),
(11, 11, 12, 'Shipped', '2023-07-23 05:57:24', '2023-07-23 05:57:24'),
(12, 11, 12, 'Shipped', '2023-07-23 05:58:28', '2023-07-23 05:58:28'),
(13, 11, 12, 'Shipped', '2023-07-23 05:59:41', '2023-07-23 05:59:41'),
(14, 11, 0, 'Shipped', '2023-07-23 06:00:07', '2023-07-23 06:00:07'),
(15, 13, 17, 'Pending', '2023-07-23 06:18:03', '2023-07-23 06:18:03'),
(16, 13, 17, 'Pending', '2023-07-23 06:18:26', '2023-07-23 06:18:26'),
(17, 13, 17, 'Pending', '2023-07-23 06:23:04', '2023-07-23 06:23:04'),
(18, 13, 17, 'Shipped', '2023-07-23 06:29:14', '2023-07-23 06:29:14'),
(19, 7, 6, 'In Process', '2023-07-23 21:19:24', '2023-07-23 21:19:24'),
(20, 7, 4, 'Shipped', '2023-07-23 21:23:08', '2023-07-23 21:23:08'),
(21, 7, 4, 'Shipped', '2023-07-23 21:26:10', '2023-07-23 21:26:10'),
(22, 7, 4, 'Shipped', '2023-07-23 21:28:25', '2023-07-23 21:28:25'),
(23, 7, 0, 'Shipped', '2023-07-23 21:29:49', '2023-07-23 21:29:49'),
(24, 25, 37, 'Shipped', '2023-07-26 07:45:36', '2023-07-26 07:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'New', 1, NULL, NULL),
(2, 'Pending', 1, NULL, NULL),
(3, 'Cancelled', 1, NULL, NULL),
(4, 'In Process', 1, NULL, NULL),
(5, 'Shipped', 1, NULL, NULL),
(6, 'Partially Shipped', 1, NULL, NULL),
(7, 'Delivered', 1, NULL, NULL),
(8, 'Partially Delivered', 1, NULL, NULL),
(9, 'Paid', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pin_codes`
--

CREATE TABLE `pin_codes` (
  `id` int(20) UNSIGNED NOT NULL,
  `pincode` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pin_codes`
--

INSERT INTO `pin_codes` (`id`, `pincode`, `created_at`, `updated_at`) VALUES
(1, 44600, '2023-07-25 12:54:25', '2023-07-25 12:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `admin_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` double(8,2) DEFAULT NULL,
  `product_discount` double(8,2) DEFAULT NULL,
  `product_weight` int(11) DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pattern` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storage_cpacity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occasion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seleeves` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` enum('No','Yes') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_best_seller` enum('No','Yes') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `admin_id`, `section_id`, `category_id`, `brand_id`, `vendor_id`, `admin_type`, `product_name`, `product_code`, `product_color`, `product_price`, `product_discount`, `product_weight`, `product_image`, `product_video`, `description`, `pattern`, `display`, `storage_cpacity`, `processor`, `occasion`, `seleeves`, `product_url`, `meta_title`, `meta_description`, `meta_keywords`, `is_featured`, `is_best_seller`, `status`, `created_at`, `updated_at`, `group_code`) VALUES
(1, 1, 1, 4, 5, 0, 'admin', 'Black Shirt', '0999', 'Black', 346.00, 0.00, 20, 'black-t-shirt-1000x1000.jpg-33524.jpg', '', 'Consequatur similiqu', NULL, NULL, NULL, NULL, NULL, NULL, 'black-shirt', 'Enim laboris dolores', 'Excepteur accusamus', 'Delectus aut conseq', 'Yes', 'Yes', 1, '2023-07-01 02:10:06', '2023-07-12 23:56:46', '200'),
(2, 1, 1, 5, 3, 0, 'admin', 'Strip Shirt', '0990', 'black', 891.00, 8.00, 0, '7e639a28573c04a8f2731996dd1825be.jpg-85774.jpg', '', 'Reiciendis velit imp', NULL, NULL, NULL, NULL, NULL, NULL, 'strip-shirt', 'Veritatis proident', 'Distinctio Minim am', 'Dolorem ipsa conseq', 'Yes', 'Yes', 1, '2023-07-01 02:10:39', '2023-07-13 00:03:56', '200'),
(3, 1, 1, 4, 1, 0, 'admin', 'Summer Shirt', '077', 'White', 1000.00, 10.00, 1, 'f3db31cb11b14b872c75ba9cd7923475.jpg-47924.jpg', '', 'Atque beatae sit es', NULL, NULL, NULL, NULL, 'Casual', 'Long Seleeve', 'summer-shirt', 'Eu fugit officiis q', 'Id libero provident', 'Sit iste tempora fug', 'Yes', 'Yes', 1, '2023-07-01 02:11:20', '2023-07-10 06:14:45', ''),
(4, 1, 1, 5, 5, 0, 'admin', 'Full Shirt', '0011', 'Black', 1000.00, 10.00, 100, 'efb3b01f1d3eaf91a42812ea4791d8f1.jpg-12375.jpg', '', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos assumenda labore vel, ea excepturi ipsam quos qui nisi reprehenderit distinctio possimus voluptatem, praesentium pariatur minima, provident ut soluta commodi laudantium!', 'Solid', NULL, NULL, NULL, 'Casual', 'Short Seleeve', 'full-shirt', 'Cum adipisicing qui', 'Cum in provident do', 'Beatae in omnis eaqu', 'Yes', 'Yes', 1, '2023-07-01 02:11:50', '2023-07-24 06:20:34', '200'),
(5, 1, 1, 5, 8, 0, 'admin', 'Check Shirt', '09909', 'Black', 2000.00, 0.00, 0, '9240c25cdf807d27498350becef1c188.jpg-68119.jpg', '', 'Consequatur laborios', 'Plain', NULL, '', NULL, 'Outdoor', 'Long Seleeve', 'check-shirt', 'Esse sit id magnam e', 'Sed quos est necessi', 'Ipsum omnis ex ut si', 'Yes', 'Yes', 1, '2023-07-01 07:30:15', '2023-09-18 10:38:49', ''),
(6, 9, 1, 5, 4, 6, 'vendor', 'Black Shirt', '09999', 'Red', 500.00, 0.00, 0, 'efb3b01f1d3eaf91a42812ea4791d8f1.jpg-54249.jpg', '', '', 'Solid', NULL, NULL, NULL, 'Outdoor', 'Short Seleeve', 'black-shirt-3', '', '', '', 'Yes', 'No', 1, '2023-07-10 00:56:46', '2023-09-19 04:54:12', ''),
(7, 1, 2, 1, 5, 0, 'admin', 'Samsung Galaxy', 'sam-100', 'Black', 10000.00, 0.00, 0, '7ba30fc2ea86cf0114baf10af3a0897d.jpg-89916.jpg', '', '', NULL, '15.6 inch', '256 GB', NULL, NULL, NULL, 'sumsung-product', 'Mobile', '', '', 'No', 'Yes', 1, '2023-07-10 06:28:56', '2023-09-19 04:54:04', '100'),
(8, 9, 2, 6, 7, 6, 'vendor', 'Acer Nitro', 'rayzan-33', 'Black', 99000.00, 0.00, 1000, '9681e4664b57f92acde514dc470049c5.jpg-11541.jpg', '', '', NULL, '14 inch', '256 GB', NULL, NULL, NULL, 'rayzan-5', NULL, NULL, NULL, 'Yes', 'Yes', 1, '2023-07-12 03:02:06', '2023-09-18 10:40:03', NULL),
(9, 6, 2, 1, 6, 3, 'vendor', 'Black Shirt', '888343', 'Black', 10000.00, 10.00, 0, '71lMeBh52wL.__AC_SX300_SY300_QL70_ML2_.jpg-99894.jpg', '', '', NULL, NULL, NULL, NULL, 'Casual', 'Short Seleeve', 'black-shirt-ss', NULL, NULL, NULL, 'Yes', 'Yes', 1, '2023-07-19 05:55:44', '2023-09-18 15:17:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `size`, `price`, `stock`, `status`, `created_at`, `updated_at`, `sku`) VALUES
(1, 4, 'XL', 500.00, 0, 1, '2022-12-03 19:53:24', '2023-07-24 06:39:13', 'GTX-000'),
(3, 3, 'XXX', 357.00, 100, 1, '2023-02-16 06:01:23', '2023-09-20 03:43:38', 'Praesentium quis eiu'),
(4, 3, 'XLLL', 401.00, 20, 1, '2023-02-16 06:01:23', '2023-09-20 03:43:38', 'Lorem culpa minim s'),
(5, 4, 'XLL', 1000.00, 96, 1, '2023-04-13 04:24:11', '2023-07-24 06:00:31', 'GTXx-000'),
(6, 5, 'XLL', 2000.00, 100, 1, '2023-07-06 21:56:03', '2023-07-06 21:56:03', 'O99'),
(7, 5, 'XL', 1800.00, 100, 1, '2023-07-06 21:56:03', '2023-07-06 21:56:03', '009'),
(8, 3, 'Small', 1000.00, 100, 1, '2023-07-10 04:41:01', '2023-09-20 03:43:38', '077-small'),
(9, 3, 'Medium', 1500.00, 100, 1, '2023-07-10 04:41:01', '2023-09-20 03:43:38', '077-medium'),
(10, 3, 'Large', 2000.00, 100, 1, '2023-07-10 04:41:01', '2023-09-20 03:43:38', '077-large'),
(11, 7, 'XL', 10000.00, 100, 1, '2023-07-10 06:29:51', '2023-07-10 06:29:51', 'GTX-001'),
(12, 9, 'XL', 10000.00, 99, 1, '2023-07-22 01:59:51', '2023-07-26 07:17:12', 'GTX-00011'),
(13, 5, 'Xxl', 100.00, 100, 1, '2023-09-20 04:39:37', '2023-09-20 04:39:37', 'GTX-00029');

-- --------------------------------------------------------

--
-- Table structure for table `products_filters`
--

CREATE TABLE `products_filters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_ids` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filter_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filter_column` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_filters`
--

INSERT INTO `products_filters` (`id`, `cat_ids`, `filter_name`, `filter_column`, `status`, `created_at`, `updated_at`) VALUES
(9, '4,5', 'Seleeves', 'seleeves', 1, '2023-07-06 05:14:52', '2023-07-06 05:14:52'),
(10, '4,5', 'Occasion', 'occasion', 1, '2023-07-06 05:16:27', '2023-07-06 05:16:27'),
(11, '1,6', 'Processor', 'processor', 1, '2023-07-06 05:16:51', '2023-09-19 14:09:12'),
(12, '1,2,6,7', 'Storage Cpacity', 'storage_cpacity', 1, '2023-07-06 05:18:06', '2023-07-06 05:18:06'),
(13, '1,2,6,7', 'Display', 'display', 1, '2023-07-06 05:18:56', '2023-07-06 05:18:56'),
(14, '4,5', 'Pattern', 'pattern', 1, '2023-07-06 05:22:20', '2023-07-06 05:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `products_filters_values`
--

CREATE TABLE `products_filters_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filter_id` int(11) NOT NULL,
  `filter_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_filters_values`
--

INSERT INTO `products_filters_values` (`id`, `filter_id`, `filter_value`, `status`, `created_at`, `updated_at`) VALUES
(5, 9, 'Short Seleeve', 1, '2023-07-06 05:19:40', '2023-07-06 05:19:40'),
(6, 9, 'Long Seleeve', 1, '2023-07-06 05:21:47', '2023-07-06 05:21:47'),
(7, 14, 'Plain', 1, '2023-07-06 05:22:44', '2023-07-06 05:22:44'),
(8, 14, 'Solid', 1, '2023-07-06 05:23:01', '2023-07-06 05:23:01'),
(9, 14, 'Strip', 1, '2023-07-06 05:23:51', '2023-07-06 05:23:51'),
(10, 12, '256 GB', 1, '2023-07-06 05:24:18', '2023-07-06 05:24:18'),
(11, 12, '512 GB', 1, '2023-07-06 05:24:35', '2023-07-06 05:24:35'),
(12, 12, '1 TB', 1, '2023-07-06 05:25:02', '2023-07-06 05:25:02'),
(13, 10, 'Casual', 1, '2023-07-06 05:25:27', '2023-07-06 05:25:27'),
(14, 10, 'Outdoor', 1, '2023-07-06 05:25:56', '2023-07-06 05:25:56'),
(15, 11, 'Intel Core i5', 1, '2023-07-06 05:26:39', '2023-07-06 05:26:39'),
(16, 11, 'Intel Core i3', 1, '2023-07-06 05:26:52', '2023-07-06 05:26:52'),
(17, 11, 'Intel Core i7', 1, '2023-07-06 05:27:02', '2023-07-06 05:27:02'),
(18, 11, 'ADM', 1, '2023-07-06 05:27:14', '2023-07-06 05:27:14'),
(19, 13, '15.6 inch', 1, '2023-07-06 05:28:24', '2023-07-06 05:28:24'),
(20, 13, '14 inch', 1, '2023-07-06 05:28:42', '2023-07-06 05:28:42'),
(21, 13, '13 inch', 1, '2023-07-06 05:28:56', '2023-07-06 05:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, '85520.jpg', 1, '2023-06-23 03:24:25', '2023-06-23 04:15:44'),
(2, 4, '65270.png', 1, '2023-06-23 03:37:33', '2023-06-23 04:09:38'),
(3, 4, '12894.jpeg', 1, '2023-06-23 03:37:33', '2023-06-23 04:11:15'),
(5, 5, '98920.jpg', 1, '2023-07-06 22:10:08', '2023-07-06 22:10:08'),
(6, 3, '428.jpg', 1, '2023-07-10 08:17:17', '2023-07-10 08:17:17'),
(7, 3, '5486.jpg', 1, '2023-07-10 08:17:41', '2023-07-10 08:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `product_id`, `review`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 8, 'Lorem ipsum dolor sit amet consectetur .', '3', 1, '2023-07-30 07:11:28', '2023-07-30 23:01:56'),
(3, 19, 2, 'excellent', '4', 1, '2023-07-31 01:42:36', '2023-07-31 01:43:16'),
(4, 19, 8, 'good', '4', 1, '2023-07-31 01:52:10', '2023-07-31 01:52:52'),
(5, 1, 1, 'excellent', '3', 1, '2023-08-01 00:21:24', '2023-08-01 00:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `recently_viewed_products`
--

CREATE TABLE `recently_viewed_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recently_viewed_products`
--

INSERT INTO `recently_viewed_products` (`id`, `product_id`, `user_id`, `session_id`, `created_at`, `updated_at`) VALUES
(5, 4, 0, 'b5c389ed0f65a6a87cb07e2b431de5e2', '2023-07-12 04:36:40', '2023-07-12 04:36:40'),
(6, 2, 0, 'b5c389ed0f65a6a87cb07e2b431de5e2', '2023-07-12 04:36:55', '2023-07-12 04:36:55'),
(7, 5, 0, 'b5c389ed0f65a6a87cb07e2b431de5e2', '2023-07-12 07:21:01', '2023-07-12 07:21:01'),
(8, 5, 0, '169fe6d9941faa6496dfab9ce880c7b7', '2023-07-12 23:00:57', '2023-07-12 23:00:57'),
(9, 5, 0, 'c5f9947211617b1ce80272769bdf6df1', '2023-07-12 23:01:21', '2023-07-12 23:01:21'),
(10, 2, 0, 'c5f9947211617b1ce80272769bdf6df1', '2023-07-12 23:01:29', '2023-07-12 23:01:29'),
(11, 4, 0, 'c5f9947211617b1ce80272769bdf6df1', '2023-07-12 23:54:11', '2023-07-12 23:54:11'),
(12, 1, 0, 'c5f9947211617b1ce80272769bdf6df1', '2023-07-13 00:15:11', '2023-07-13 00:15:11'),
(13, 2, 0, '9f861b38fb4c14a68ede647a60877128', '2023-07-14 04:26:22', '2023-07-14 04:26:22'),
(14, 5, 0, '9f861b38fb4c14a68ede647a60877128', '2023-07-14 04:26:40', '2023-07-14 04:26:40'),
(15, 4, 0, '5f77170d4b5604b241334a014ee3c155', '2023-07-14 21:14:22', '2023-07-14 21:14:22'),
(16, 2, 0, '5f77170d4b5604b241334a014ee3c155', '2023-07-14 22:45:39', '2023-07-14 22:45:39'),
(17, 1, 0, '5f77170d4b5604b241334a014ee3c155', '2023-07-15 01:05:20', '2023-07-15 01:05:20'),
(18, 5, 0, '5f77170d4b5604b241334a014ee3c155', '2023-07-15 01:07:44', '2023-07-15 01:07:44'),
(19, 6, 0, '5f77170d4b5604b241334a014ee3c155', '2023-07-15 03:52:47', '2023-07-15 03:52:47'),
(20, 3, 0, '5f77170d4b5604b241334a014ee3c155', '2023-07-15 04:48:24', '2023-07-15 04:48:24'),
(21, 3, 0, '39e96e89bb033521f6b95a3f60434812', '2023-07-15 09:34:02', '2023-07-15 09:34:02'),
(22, 4, 0, '634a5d4842fbbcca20caccda12c63023', '2023-07-15 19:44:35', '2023-07-15 19:44:35'),
(23, 6, 0, '634a5d4842fbbcca20caccda12c63023', '2023-07-15 21:33:44', '2023-07-15 21:33:44'),
(24, 2, 0, '634a5d4842fbbcca20caccda12c63023', '2023-07-15 22:00:06', '2023-07-15 22:00:06'),
(25, 4, 0, 'c1472e3b71e6617d8df6f9ea9b65f5cf', '2023-07-16 01:31:08', '2023-07-16 01:31:08'),
(26, 4, 0, '58c0b8da1edf1765ecbd76c87d72fab0', '2023-07-17 01:53:24', '2023-07-17 01:53:24'),
(27, 6, 0, '58c0b8da1edf1765ecbd76c87d72fab0', '2023-07-17 02:03:25', '2023-07-17 02:03:25'),
(28, 4, 0, '20df25a413e5517981b995da8823565f', '2023-07-18 03:13:03', '2023-07-18 03:13:03'),
(29, 1, 0, 'ef32a6192e6ed85d4ebc0752ebf6cde4', '2023-07-18 20:57:28', '2023-07-18 20:57:28'),
(30, 3, 0, 'ef32a6192e6ed85d4ebc0752ebf6cde4', '2023-07-18 20:57:39', '2023-07-18 20:57:39'),
(31, 4, 0, 'ef32a6192e6ed85d4ebc0752ebf6cde4', '2023-07-18 23:08:22', '2023-07-18 23:08:22'),
(32, 4, 0, 'dfb00dc51f914343ea8f981192eeb704', '2023-07-21 04:18:51', '2023-07-21 04:18:51'),
(33, 4, 0, '4c9bf874d64024522e6a76794573e4a3', '2023-07-21 14:15:06', '2023-07-21 14:15:06'),
(34, 3, 0, '4c9bf874d64024522e6a76794573e4a3', '2023-07-21 15:12:53', '2023-07-21 15:12:53'),
(35, 3, 0, 'e7eb262c3b322bd2b3cf2364fc689ec9', '2023-07-21 22:20:06', '2023-07-21 22:20:06'),
(36, 9, 0, '37c55ffb055923ec9e945b70faf642cb', '2023-07-22 02:00:20', '2023-07-22 02:00:20'),
(37, 4, 0, '5fa1db179ab8e13eb1050624474364af', '2023-07-23 00:20:22', '2023-07-23 00:20:22'),
(38, 2, 0, '5fa1db179ab8e13eb1050624474364af', '2023-07-23 00:20:40', '2023-07-23 00:20:40'),
(39, 4, 0, 'bc3a1a84353321fd4137ee39f0b5a30c', '2023-07-23 06:11:16', '2023-07-23 06:11:16'),
(40, 9, 0, 'bc3a1a84353321fd4137ee39f0b5a30c', '2023-07-23 06:11:36', '2023-07-23 06:11:36'),
(41, 4, 0, '48f8feda9291ca665d49f4e751eca614', '2023-07-23 08:27:21', '2023-07-23 08:27:21'),
(42, 4, 0, '0c68166f907a23db122d695a0481a7fe', '2023-07-23 23:15:52', '2023-07-23 23:15:52'),
(43, 4, 0, '3b7dcd68a44f19704cbf9b1153825074', '2023-07-24 03:25:32', '2023-07-24 03:25:32'),
(44, 6, 0, '3b7dcd68a44f19704cbf9b1153825074', '2023-07-24 06:48:28', '2023-07-24 06:48:28'),
(45, 4, 0, '651e6d2cfdf3ba271c62e7643f9f9eb5', '2023-07-24 20:36:09', '2023-07-24 20:36:09'),
(46, 4, 0, '1b9c8393efbd89d0ed3ac2fd22097112', '2023-07-24 21:04:43', '2023-07-24 21:04:43'),
(47, 4, 0, 'bda62125f766e7cd9696fb15aea8f62d', '2023-07-25 07:46:23', '2023-07-25 07:46:23'),
(48, 4, 0, 'a8c402931a1de017cbba869fe42ebbdd', '2023-07-25 12:20:12', '2023-07-25 12:20:12'),
(49, 4, 0, 'a02b7b49ff66e7e8f9066473bcf5f8ec', '2023-07-25 12:40:26', '2023-07-25 12:40:26'),
(50, 4, 0, '6b77e2901ad1739635a6f5a141a47813', '2023-07-25 20:10:32', '2023-07-25 20:10:32'),
(51, 4, 0, 'ee9c252a9d721a969fe2d09e330b3aa8', '2023-07-25 20:12:29', '2023-07-25 20:12:29'),
(52, 4, 0, '4740852e7ea36ca28e1d625863ef374b', '2023-07-26 07:03:29', '2023-07-26 07:03:29'),
(53, 9, 0, '4740852e7ea36ca28e1d625863ef374b', '2023-07-26 07:15:00', '2023-07-26 07:15:00'),
(54, 7, 0, 'eff76869ec4aade37fc437bda4d2b361', '2023-07-27 23:40:18', '2023-07-27 23:40:18'),
(55, 4, 0, '478119d5d72729de3b525c7728e56bfe', '2023-07-28 03:34:25', '2023-07-28 03:34:25'),
(56, 4, 0, '4df61d37fd91bddaa3877f6cf968b661', '2023-07-30 04:23:49', '2023-07-30 04:23:49'),
(57, 1, 0, '4df61d37fd91bddaa3877f6cf968b661', '2023-07-30 05:27:02', '2023-07-30 05:27:02'),
(58, 2, 0, '4df61d37fd91bddaa3877f6cf968b661', '2023-07-30 06:29:44', '2023-07-30 06:29:44'),
(59, 5, 0, '4df61d37fd91bddaa3877f6cf968b661', '2023-07-30 06:30:01', '2023-07-30 06:30:01'),
(60, 8, 0, '4df61d37fd91bddaa3877f6cf968b661', '2023-07-30 06:30:30', '2023-07-30 06:30:30'),
(61, 8, 0, '1b662ca1f96ef7406d6abc34d4c22d63', '2023-07-30 07:11:56', '2023-07-30 07:11:56'),
(62, 8, 0, '3209a6cb534ba25d79909b7661883cd2', '2023-07-30 07:16:09', '2023-07-30 07:16:09'),
(63, 4, 0, '3209a6cb534ba25d79909b7661883cd2', '2023-07-30 07:16:41', '2023-07-30 07:16:41'),
(64, 1, 0, '3209a6cb534ba25d79909b7661883cd2', '2023-07-30 07:24:15', '2023-07-30 07:24:15'),
(65, 1, 0, '71dfb8154eed2e96f07828e0ae7a8c60', '2023-07-30 22:45:03', '2023-07-30 22:45:03'),
(66, 8, 0, '71dfb8154eed2e96f07828e0ae7a8c60', '2023-07-30 23:33:08', '2023-07-30 23:33:08'),
(67, 8, 0, 'be331be13689c3010a066096ad9d2f28', '2023-07-31 00:09:44', '2023-07-31 00:09:44'),
(68, 2, 0, 'be331be13689c3010a066096ad9d2f28', '2023-07-31 01:41:09', '2023-07-31 01:41:09'),
(69, 9, 0, 'eca7b1b64ff7d382b82bf1d5238e7fdd', '2023-08-01 00:20:35', '2023-08-01 00:20:35'),
(70, 1, 0, 'eca7b1b64ff7d382b82bf1d5238e7fdd', '2023-08-01 00:21:00', '2023-08-01 00:21:00'),
(71, 8, 0, 'eca7b1b64ff7d382b82bf1d5238e7fdd', '2023-08-01 00:31:30', '2023-08-01 00:31:30'),
(72, 9, 0, 'dedd5b6adc5e2b7b4d208b7c80fcd327', '2023-09-18 16:11:36', '2023-09-18 16:11:36'),
(73, 5, 0, 'a0bdf5aece759b7963787db87613025a', '2023-09-22 06:12:13', '2023-09-22 06:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s Fashion', 1, NULL, '2023-07-27 12:04:03'),
(2, 'Electronics', 1, NULL, '2023-07-15 19:50:13'),
(4, 'Healthy & Beauty', 1, '2022-11-22 08:51:00', '2023-07-05 05:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `0_500g` double(8,2) NOT NULL,
  `501_1000g` double(8,2) NOT NULL,
  `1001_2000g` double(8,2) NOT NULL,
  `2001_5000g` double(8,2) NOT NULL,
  `above_5000g` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `country`, `0_500g`, `501_1000g`, `1001_2000g`, `2001_5000g`, `above_5000g`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Afghanistan', 50.00, 100.00, 150.00, 250.00, 250.00, 1, '2023-07-23 21:48:05', '2023-07-24 05:19:59'),
(3, 'Albania', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(4, 'Algeria', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(5, 'American Samoa', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(6, 'Andorra', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(7, 'Angola', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(8, 'Anguilla', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(9, 'Antarctica', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(10, 'Antigua and Barbuda', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(11, 'Argentina', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 22:58:30'),
(12, 'Armenia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(13, 'Aruba', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(14, 'Australia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(15, 'Austria', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(16, 'Azerbaijan', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(17, 'Bahamas', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(18, 'Bahrain', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(19, 'Bangladesh', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(20, 'Barbados', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(21, 'Belarus', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(22, 'Belgium', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(23, 'Belize', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(24, 'Benin', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(25, 'Bermuda', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(26, 'Bhutan', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(27, 'Bolivia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(28, 'Bosnia and Herzegovina', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(29, 'Botswana', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(30, 'Bouvet Island', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(31, 'Brazil', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(32, 'British Indian Ocean Territory', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(33, 'Brunei Darussalam', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(34, 'Bulgaria', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:05', '2023-07-23 21:52:38'),
(35, 'Burkina Faso', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(36, 'Burundi', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(37, 'Cambodia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(38, 'Cameroon', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(39, 'Canada', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(40, 'Cape Verde', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(41, 'Cayman Islands', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(42, 'Central African Republic', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(43, 'Chad', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(44, 'Chile', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(45, 'China', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(46, 'Christmas Island', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(47, 'Cocos (Keeling) Islands', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(48, 'Colombia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(49, 'Comoros', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(50, 'Congo', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(51, 'Congo, the Democratic Republic of the', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(52, 'Cook Islands', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(53, 'Costa Rica', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(54, 'Cote D\'Ivoire', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(55, 'Croatia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(56, 'Cuba', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(57, 'Cyprus', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(58, 'Czech Republic', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(59, 'Denmark', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(60, 'Djibouti', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(61, 'Dominica', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(62, 'Dominican Republic', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(63, 'Ecuador', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(64, 'Egypt', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(65, 'El Salvador', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(66, 'Equatorial Guinea', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(67, 'Eritrea', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(68, 'Estonia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(69, 'Ethiopia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(70, 'Falkland Islands (Malvinas)', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(71, 'Faroe Islands', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(72, 'Fiji', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(73, 'Finland', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(74, 'France', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(75, 'French Guiana', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(76, 'French Polynesia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(77, 'French Southern Territories', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(78, 'Gabon', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(79, 'Gambia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(80, 'Georgia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(81, 'Germany', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(82, 'Ghana', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(83, 'Gibraltar', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(84, 'Greece', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(85, 'Greenland', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(86, 'Grenada', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(87, 'Guadeloupe', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(88, 'Guam', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(89, 'Guatemala', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(90, 'Guinea', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(91, 'Guinea-Bissau', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(92, 'Guyana', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(93, 'Haiti', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(94, 'Heard Island and Mcdonald Islands', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(95, 'Holy See (Vatican City State)', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(96, 'Honduras', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(97, 'Hong Kong', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(98, 'Hungary', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(99, 'Iceland', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(100, 'India', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(101, 'Indonesia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(102, 'Iran, Islamic Republic of', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(103, 'Iraq', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(104, 'Ireland', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(105, 'Israel', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(106, 'Italy', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(107, 'Jamaica', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(108, 'Japan', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(109, 'Jordan', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(110, 'Kazakhstan', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(111, 'Kenya', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(112, 'Kiribati', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(113, 'Korea, Democratic People\'s Republic of', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(114, 'Korea, Republic of', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(115, 'Kuwait', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(116, 'Kyrgyzstan', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(117, 'Lao People\'s Democratic Republic', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(118, 'Latvia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(119, 'Lebanon', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(120, 'Lesotho', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(121, 'Liberia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(122, 'Libyan Arab Jamahiriya', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(123, 'Liechtenstein', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(124, 'Lithuania', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(125, 'Luxembourg', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(126, 'Macao', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(127, 'Macedonia, the Former Yugoslav Republic of', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(128, 'Madagascar', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(129, 'Malawi', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(130, 'Malaysia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(131, 'Maldives', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(132, 'Mali', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(133, 'Malta', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(134, 'Marshall Islands', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(135, 'Martinique', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(136, 'Mauritania', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(137, 'Mauritius', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(138, 'Mayotte', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(139, 'Mexico', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(140, 'Micronesia, Federated States of', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(141, 'Moldova, Republic of', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(142, 'Monaco', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(143, 'Mongolia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(144, 'Montserrat', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(145, 'Morocco', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(146, 'Mozambique', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(147, 'Myanmar', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(148, 'Namibia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(149, 'Nauru', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(150, 'Nepal', 50.00, 100.00, 150.00, 200.00, 250.00, 1, '2023-07-23 21:48:06', '2023-07-24 04:52:11'),
(151, 'Netherlands', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(152, 'Netherlands Antilles', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(153, 'New Caledonia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(154, 'New Zealand', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(155, 'Nicaragua', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(156, 'Niger', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(157, 'Nigeria', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(158, 'Niue', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(159, 'Norfolk Island', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(160, 'Northern Mariana Islands', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(161, 'Norway', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(162, 'Oman', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(163, 'Pakistan', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(164, 'Palau', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(165, 'Palestinian Territory, Occupied', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(166, 'Panama', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(167, 'Papua New Guinea', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(168, 'Paraguay', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(169, 'Peru', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(170, 'Philippines', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(171, 'Pitcairn', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(172, 'Poland', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(173, 'Portugal', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(174, 'Puerto Rico', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(175, 'Qatar', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(176, 'Reunion', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(177, 'Romania', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(178, 'Russian Federation', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(179, 'Rwanda', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(180, 'Saint Helena', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(181, 'Saint Kitts and Nevis', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(182, 'Saint Lucia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(183, 'Saint Pierre and Miquelon', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(184, 'Saint Vincent and the Grenadines', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(185, 'Samoa', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(186, 'San Marino', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(187, 'Sao Tome and Principe', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(188, 'Saudi Arabia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(189, 'Senegal', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(190, 'Serbia and Montenegro', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(191, 'Seychelles', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(192, 'Sierra Leone', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(193, 'Singapore', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(194, 'Slovakia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(195, 'Slovenia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(196, 'Solomon Islands', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(197, 'Somalia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(198, 'South Africa', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(199, 'South Georgia and the South Sandwich Islands', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(200, 'Spain', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(201, 'Sri Lanka', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(202, 'Sudan', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(203, 'Suriname', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(204, 'Svalbard and Jan Mayen', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(205, 'Swaziland', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(206, 'Sweden', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(207, 'Switzerland', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(208, 'Syrian Arab Republic', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(209, 'Taiwan, Province of China', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(210, 'Tajikistan', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(211, 'Tanzania, United Republic of', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(212, 'Thailand', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(213, 'Timor-Leste', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(214, 'Togo', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(215, 'Tokelau', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(216, 'Tonga', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(217, 'Trinidad and Tobago', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(218, 'Tunisia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(219, 'Turkey', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(220, 'Turkmenistan', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(221, 'Turks and Caicos Islands', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(222, 'Tuvalu', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(223, 'Uganda', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(224, 'Ukraine', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(225, 'United Arab Emirates', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(226, 'United Kingdom', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(227, 'United States', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(228, 'United States Minor Outlying Islands', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(229, 'Uruguay', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(230, 'Uzbekistan', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(231, 'Vanuatu', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(232, 'Venezuela', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(233, 'Viet Nam', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(234, 'Virgin Islands, British', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(235, 'Virgin Islands, U.s.', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(236, 'Wallis and Futuna', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(237, 'Western Sahara', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(238, 'Yemen', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(239, 'Zambia', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 21:52:38'),
(240, 'Zimbabwe', 0.00, 0.00, 0.00, 0.00, 0.00, 1, '2023-07-23 21:48:06', '2023-07-23 22:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kishor Pun', 'kathmandu', 'Kathmandu', 'kathmandu', 'Nepal', '344', '9800000000000', 'kishorpun55@gmail.com', NULL, '$2y$10$mgy6G/40Tkr.xPhz/4L1LercCHD4C4cxAPBZzdTRzMqCGbmqGNzDi', 1, NULL, '2023-07-16 03:14:49', '2023-07-23 05:35:07'),
(19, 'kishor', '', '', '', '', '', '98000000000', 'codemaster890@gmail.com', NULL, '$2y$10$YXIQin5/U4Bdp6Je4oCfmealMllz5p1dzzi5iC8Jw1IA1ifgnA9Ge', 1, NULL, '2023-07-19 03:26:56', '2023-07-19 23:51:01'),
(20, 'Keefe Pickett', '', '', '', '', '', '534324325', 'kishorpun@gmail.com', NULL, '$2y$10$Lv4K9fbHiISFnGyV1XBdaOp3N4dk1QotkWsyOlaqee82VCCpkv3w.', 1, NULL, '2023-07-19 03:27:29', '2023-07-19 03:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `confirm` enum('No','Yes') COLLATE utf8mb4_unicode_ci NOT NULL,
  `commissions` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `status`, `created_at`, `updated_at`, `confirm`, `commissions`) VALUES
(1, 'Jhon', 'Kathmandu', 'Kathmandu', 'Kathmandu', 'Malta', '1991010', '980000', 'johann@gmail.com', 1, '2022-10-31 05:01:20', '2023-07-27 12:01:20', 'No', 0.00),
(2, 'Pradip', '', '', '', '', '', '9754545454545', 'pradipsyster@gmail.com', 1, '2023-07-07 06:44:26', '2023-07-10 08:52:19', 'No', 0.00),
(3, 'Kishor Pun', '', '', '', '', '', '0988777663', 'kishorpun55@gmail.com', 1, '2023-07-07 11:18:56', '2023-07-25 20:30:48', 'No', 10.00),
(4, 'Kishor Pun', '', '', '', '', '', '09887776635', 'kishorpun555@gmail.com', 1, '2023-07-07 11:20:20', '2023-07-27 11:57:51', 'Yes', 0.00),
(5, 'Kishor PUN', '', '', '', '', '', '97545454545', 'kishorpun@gmail.com', 1, '2023-07-07 12:46:46', '2023-07-10 08:52:28', 'Yes', 0.00),
(6, 'wovixideri', '', '', '', '', '', '98778667623', 'xetux@mailinator.com', 1, '2023-07-09 21:29:18', '2023-07-27 12:00:11', 'Yes', 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_bank_details`
--

CREATE TABLE `vendor_bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `account_holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_ifsc_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_bank_details`
--

INSERT INTO `vendor_bank_details` (`id`, `vendor_id`, `account_holder_name`, `bank_name`, `account_number`, `bank_ifsc_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kishor Pun', 'Prabhu Bank', '09987364734673', '75485948598898', '2022-10-31 05:01:20', '2022-10-31 05:01:20'),
(2, 6, 'Kishor', 'Himal', NULL, NULL, NULL, '2023-07-10 01:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_bussiness_details`
--

CREATE TABLE `vendor_bussiness_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_proof_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bussiness_license_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address_proof_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_bussiness_details`
--

INSERT INTO `vendor_bussiness_details` (`id`, `vendor_id`, `shop_name`, `shop_address`, `shop_city`, `shop_state`, `shop_country`, `shop_pincode`, `shop_mobile`, `shop_website`, `shop_email`, `address_proof`, `shop_proof_image`, `bussiness_license_number`, `pan_number`, `created_at`, `updated_at`, `address_proof_image`) VALUES
(1, 1, 'Rara Soft', 'Kathmandu', 'Kathmandu', 'Kathmandu', 'Mayotte', '0033884', '9866655555', 'shop.com', 'shop@shop.com', 'Citizenship', '', '78734837', '354343', '2022-10-31 05:01:20', '2023-07-07 05:50:48', 'storage/images/vendor_bussiness_detail/1688729748.jpg'),
(2, 6, 'KM Store', 'Pokhara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Citizenship', NULL, NULL, NULL, '2023-07-10 01:41:05', '2023-07-12 02:56:49', ''),
(3, 3, 'KS Store', NULL, NULL, NULL, NULL, NULL, '9864434655', NULL, NULL, 'Citizenship', NULL, NULL, NULL, '2023-07-25 20:32:15', '2023-07-25 20:32:15', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `item_statuses`
--
ALTER TABLE `item_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newslater_subscribers`
--
ALTER TABLE `newslater_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_logs`
--
ALTER TABLE `order_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pin_codes`
--
ALTER TABLE `pin_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_filters`
--
ALTER TABLE `products_filters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_filters_values`
--
ALTER TABLE `products_filters_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`),
  ADD KEY `ratings_product_id_foreign` (`product_id`);

--
-- Indexes for table `recently_viewed_products`
--
ALTER TABLE `recently_viewed_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`);

--
-- Indexes for table `vendor_bank_details`
--
ALTER TABLE `vendor_bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_bussiness_details`
--
ALTER TABLE `vendor_bussiness_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_statuses`
--
ALTER TABLE `item_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `newslater_subscribers`
--
ALTER TABLE `newslater_subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `order_logs`
--
ALTER TABLE `order_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pin_codes`
--
ALTER TABLE `pin_codes`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products_filters`
--
ALTER TABLE `products_filters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products_filters_values`
--
ALTER TABLE `products_filters_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recently_viewed_products`
--
ALTER TABLE `recently_viewed_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vendor_bank_details`
--
ALTER TABLE `vendor_bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor_bussiness_details`
--
ALTER TABLE `vendor_bussiness_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
