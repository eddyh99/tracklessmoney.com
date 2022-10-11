-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2022 at 07:43 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankofsatoshi_trackless`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currency`
--

CREATE TABLE `tbl_currency` (
  `currency` varchar(5) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `min_amt` double NOT NULL,
  `status` enum('active','disabled') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_currency`
--

INSERT INTO `tbl_currency` (`currency`, `symbol`, `name`, `min_amt`, `status`) VALUES
('AED', 'AED', 'Arab Emira', 0, 'disabled'),
('ARS', 'ARS', 'Argentine ', 150, 'disabled'),
('AUD', '&#8371;', 'Australian', 1, 'disabled'),
('BDT', 'BDT', 'Bangladesh', 0, 'active'),
('BGN', 'BGN', 'Bulgarian ', 5, 'active'),
('BWP', 'BWP', 'Botswanan ', 200, 'disabled'),
('CAD', 'CAD', 'Canadian D', 1, 'active'),
('CHF', 'CHF', 'Swiss Fran', 5, 'active'),
('CLP', 'CLP', 'Chilean Pe', 4500, 'active'),
('CNY', '&#20803;', 'Chinese Yu', 10, 'active'),
('CRC', 'CRC', 'Costa Rica', 2666, 'active'),
('CZK', 'CZK', 'Czech Koru', 5, 'active'),
('DKK', 'DKK', 'Danish Kro', 5, 'active'),
('EGP', 'EGP', 'Egyptian P', 34, 'active'),
('EUR', '&euro;', 'Euro', 1, 'disabled'),
('GBP', '&pound;', 'Pound ster', 1, 'active'),
('GEL', 'GEL', 'Georgian L', 5, 'active'),
('GHS', 'GHS', 'Ghanaian C', 10, 'active'),
('HKD', 'HKD', 'Hongkong D', 5, 'active'),
('HRK', 'HRK', 'Croatian K', 5, 'active'),
('HUF', 'HUF', 'Hungarian ', 5, 'active'),
('IDR', 'Rp.', 'Indonesian', 0, 'active'),
('ILS', '&#8362;', 'Israeli Ne', 18, 'active'),
('INR', '&#8377;', 'Indian Rup', 0, 'active'),
('JPY', '&yen;', 'Japanese Y', 5, 'active'),
('KES', 'KES', 'Kenyan Shi', 181, 'active'),
('KRW', '&#8361;', 'South Kore', 1541, 'active'),
('LKR', 'LKR', 'Sri Lankan', 164, 'active'),
('MAD', 'MAD', 'Morrocan D', 25, 'active'),
('MXN', 'MXN', 'Mexican Pe', 13, 'active'),
('MYR', 'MYR', 'Malaysian ', 0, 'active'),
('NGN', 'NGN', 'Nigerian N', 232, 'active'),
('NOK', 'NOK', 'Norwegian ', 5, 'active'),
('NPR', 'NPR', 'Nepalese R', 323, 'active'),
('NZD', 'NZD', 'New Zealan', 1, 'active'),
('PEN', 'PEN', 'Peruvian S', 10, 'active'),
('PHP', 'PHP', 'Philippine', 12, 'active'),
('PKR', 'PKR', 'Pakistani ', 0, 'active'),
('PLN', 'PLN', 'Poland zło', 5, 'active'),
('RON', 'RON', 'Romanian L', 5, 'active'),
('RUB', '&#8381;', 'Russian Ru', 141, 'active'),
('SEK', 'SEK', 'Swedish Kr', 5, 'active'),
('SGD', 'S$', 'Singapore ', 1, 'active'),
('THB', '&#3647;', 'Thailand B', 31, 'active'),
('TRY', '&#8378;', 'Turkish Li', 0, 'active'),
('TZS', 'TZS', 'Tanzanian ', 0, 'active'),
('UAH', 'UAH', 'Ukranian H', 5, 'active'),
('UGX', 'UGX', 'Ugandan Sh', 0, 'active'),
('USD', '&dollar;', 'US. Dollar', 1, 'active'),
('UYU', 'UYU', 'Uruguayan ', 164, 'active'),
('VND', '&#8363;', 'Vietnamese', 32538, 'active'),
('XOF', 'XOF', 'CFA Franc', 2058, 'active'),
('ZAR', 'ZAR', 'South Afri', 87, 'active'),
('ZMW', 'ZMW', 'Zambian Kw', 71, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_defaultcost`
--

CREATE TABLE `tbl_defaultcost` (
  `currency` varchar(5) NOT NULL,
  `transfer_cf` decimal(9,2) NOT NULL DEFAULT '0.00',
  `transfer_ocf` decimal(9,2) NOT NULL DEFAULT '0.00',
  `min_amount` decimal(9,2) NOT NULL DEFAULT '0.00',
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_defaultcost`
--

INSERT INTO `tbl_defaultcost` (`currency`, `transfer_cf`, `transfer_ocf`, `min_amount`, `last_modified`) VALUES
('AED', '5.62', '0.00', '6.62', '2022-08-24 21:55:07'),
('ARS', '124.25', '0.00', '125.25', '2022-08-24 21:55:07'),
('AUD', '0.57', '0.00', '1.57', '2022-08-24 21:55:08'),
('BDT', '145.39', '0.00', '146.39', '2022-08-24 21:55:08'),
('BGN', '0.84', '0.00', '1.84', '2022-08-24 21:55:08'),
('BWP', '60.07', '0.00', '61.07', '2022-08-24 21:55:09'),
('CAD', '0.61', '0.00', '1.61', '2022-08-24 21:55:09'),
('CHF', '0.50', '0.00', '1.50', '2022-08-24 21:55:10'),
('CLP', '3374.99', '0.00', '3376.00', '2022-08-24 21:55:10'),
('CNY', '4.27', '0.00', '5.27', '2022-08-24 21:55:11'),
('CRC', '2665.34', '0.00', '2666.41', '2022-08-24 21:55:11'),
('CZK', '7.99', '0.00', '8.99', '2022-08-24 21:55:12'),
('DKK', '2.92', '0.00', '3.92', '2022-08-24 21:55:12'),
('EGP', '33.50', '0.00', '34.50', '2022-08-24 21:55:13'),
('EUR', '0.28', '3.83', '1.28', '2022-08-24 21:55:14'),
('GBP', '0.32', '0.00', '1.32', '2022-08-24 21:55:14'),
('GEL', '0.73', '0.00', '1.73', '2022-08-24 21:55:14'),
('GHS', '9.02', '0.00', '10.02', '2022-08-24 21:55:15'),
('HKD', '5.33', '0.00', '6.33', '2022-08-24 21:55:15'),
('HRK', '8.44', '0.00', '9.44', '2022-08-24 21:55:16'),
('HUF', '88.00', '0.00', '89.00', '2022-08-24 21:55:16'),
('IDR', '9145.09', '0.00', '9146.00', '2022-08-24 21:55:17'),
('ILS', '17.95', '0.00', '18.95', '2022-08-24 21:55:17'),
('INR', '30.03', '0.00', '31.03', '2022-08-24 21:55:18'),
('JPY', '200.00', '0.00', '201.00', '2022-08-24 21:55:18'),
('KES', '180.00', '0.00', '181.00', '2022-08-24 21:55:18'),
('KRW', '1449.98', '0.00', '1451.00', '2022-08-24 21:55:19'),
('LKR', '163.83', '0.00', '164.84', '2022-08-24 21:55:19'),
('MAD', '24.28', '0.00', '25.28', '2022-08-24 21:55:20'),
('MXN', '14.28', '0.00', '15.28', '2022-08-24 21:55:20'),
('MYR', '1.34', '0.00', '2.34', '2022-08-24 21:55:21'),
('NGN', '231.44', '0.00', '232.44', '2022-08-24 21:55:21'),
('NOK', '3.25', '0.00', '4.25', '2022-08-24 21:55:22'),
('NPR', '322.00', '0.00', '323.00', '2022-08-24 21:55:22'),
('NZD', '0.76', '0.00', '1.76', '2022-08-24 21:55:22'),
('PEN', '9.45', '0.00', '10.45', '2022-08-24 21:55:23'),
('PHP', '43.92', '0.00', '44.92', '2022-08-24 21:55:23'),
('PKR', '108.15', '0.00', '109.15', '2022-08-24 21:55:24'),
('PLN', '1.82', '0.00', '2.82', '2022-08-24 21:55:24'),
('RON', '2.67', '0.00', '3.67', '2022-08-24 21:55:25'),
('RUB', '140.11', '0.00', '141.11', '2022-08-24 21:55:25'),
('SEK', '3.83', '0.00', '4.83', '2022-08-24 21:55:25'),
('SGD', '0.61', '0.00', '1.61', '2022-08-24 21:55:26'),
('THB', '31.70', '0.00', '32.70', '2022-08-24 21:55:26'),
('TRY', '24.34', '0.00', '25.34', '2022-08-24 21:55:27'),
('TZS', '3012.40', '0.00', '3013.30', '2022-08-24 21:55:27'),
('UAH', '7.20', '0.00', '8.20', '2022-08-24 21:55:28'),
('UGX', '4419.12', '0.00', '4420.00', '2022-08-24 21:55:28'),
('USD', '0.39', '3.29', '1.39', '2022-08-24 21:55:29'),
('UYU', '163.30', '0.00', '164.30', '2022-08-24 21:55:30'),
('VND', '32538.00', '0.00', '32538.00', '2022-08-24 21:55:30'),
('XOF', '2056.97', '0.00', '2058.00', '2022-08-24 21:55:31'),
('ZAR', '86.34', '0.00', '87.34', '2022-08-24 21:55:31'),
('ZMW', '70.72', '0.00', '71.72', '2022-08-24 21:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_defaultfee`
--

CREATE TABLE `tbl_defaultfee` (
  `currency` varchar(5) NOT NULL,
  `topup_cf` decimal(9,2) NOT NULL DEFAULT '0.00',
  `wallet2wallet_cf` decimal(9,2) NOT NULL DEFAULT '0.00',
  `wallet2bank_cf` decimal(9,2) NOT NULL DEFAULT '0.00',
  `wallet2bank_ocf` decimal(9,2) NOT NULL DEFAULT '0.00',
  `swap_cf` decimal(9,2) NOT NULL DEFAULT '0.00',
  `referral_cf` decimal(9,2) NOT NULL DEFAULT '0.00',
  `referral_ocf` decimal(9,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_defaultfee`
--

INSERT INTO `tbl_defaultfee` (`currency`, `topup_cf`, `wallet2wallet_cf`, `wallet2bank_cf`, `wallet2bank_ocf`, `swap_cf`, `referral_cf`, `referral_ocf`) VALUES
('USD', '0.10', '0.12', '0.13', '0.14', '0.50', '0.05', '0.06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fee`
--

CREATE TABLE `tbl_fee` (
  `id_member` int NOT NULL,
  `currency` varchar(5) NOT NULL,
  `topup_cf` decimal(9,2) NOT NULL DEFAULT '0.00',
  `topup_cp` decimal(9,8) NOT NULL DEFAULT '0.00000000',
  `topup_ocf` decimal(9,2) NOT NULL DEFAULT '0.00',
  `topup_ocp` decimal(9,8) NOT NULL DEFAULT '0.00000000',
  `wallet2wallet_cf` decimal(9,2) NOT NULL DEFAULT '0.00',
  `wallet2wallet_cp` decimal(9,8) NOT NULL DEFAULT '0.00000000',
  `wallet2bank_cf` decimal(9,2) NOT NULL DEFAULT '0.00',
  `wallet2bank_cp` decimal(9,8) NOT NULL DEFAULT '0.00000000',
  `wallet2bank_ocf` decimal(9,2) NOT NULL DEFAULT '0.00',
  `wallet2bank_ocp` decimal(9,8) NOT NULL DEFAULT '0.00000000',
  `swap_cf` decimal(9,2) NOT NULL DEFAULT '0.00',
  `swap_cp` decimal(9,8) NOT NULL DEFAULT '0.00000000',
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_fee`
--

INSERT INTO `tbl_fee` (`id_member`, `currency`, `topup_cf`, `topup_cp`, `topup_ocf`, `topup_ocp`, `wallet2wallet_cf`, `wallet2wallet_cp`, `wallet2bank_cf`, `wallet2bank_cp`, `wallet2bank_ocf`, `wallet2bank_ocp`, `swap_cf`, `swap_cp`, `last_modified`) VALUES
(-1, 'USD', '0.02', '0.00010000', '0.01', '0.00030000', '1.00', '0.00030000', '0.03', '0.00020000', '0.02', '0.00010000', '3.00', '0.02020000', '2022-08-19 12:11:16'),
(13, 'USD', '2.00', '0.01000000', '0.00', '0.03000000', '0.00', '0.00000000', '0.00', '0.00000000', '0.00', '0.00000000', '0.00', '0.00000000', '2022-08-19 12:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int NOT NULL,
  `ucode` char(8) NOT NULL,
  `refcode` char(8) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `status` enum('new','active','disabled') NOT NULL DEFAULT 'new',
  `token` varchar(48) DEFAULT NULL,
  `id_referral` int DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_accessed` datetime DEFAULT NULL,
  `location` varchar(60) DEFAULT NULL,
  `activated` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `ucode`, `refcode`, `email`, `passwd`, `status`, `token`, `id_referral`, `date_created`, `last_accessed`, `location`, `activated`) VALUES
(-1, 'PR1NC3XX', 'aa2', 'a@a.a', '356a192b7913b04c54574d18c28d46e6395428ab', 'active', NULL, NULL, '2022-08-13 02:17:33', NULL, 'Asia/Singapore', 'yes'),
(3, 'dk8wnx3r', 'dwwtxfxn', 'b@b.b', '356a192b7913b04c54574d18c28d46e6395428ab', 'active', NULL, -1, '2022-08-13 10:22:40', NULL, 'Asia/Makassar', 'yes'),
(6, 'pe8mny3n', 'dzkcyf74', 'c@c.c', '356a192b7913b04c54574d18c28d46e6395428ab', 'active', NULL, -1, '2022-08-13 10:37:38', NULL, 'Asia/Makassar', 'yes'),
(7, 'rq3z4k3y', 'e2nfrfpn', 'd@d.d', '356a192b7913b04c54574d18c28d46e6395428ab', 'active', NULL, -1, '2022-08-13 10:40:47', NULL, 'Asia/Makassar', 'yes'),
(8, 'dzrh4fnx', 'e3whkfj4', 'e@e.e', '356a192b7913b04c54574d18c28d46e6395428ab', 'new', 'qyjolv6x4k3y1pg21b3vn599xuvppl335erm8qw02nz957p1', NULL, '2022-08-13 10:42:39', NULL, 'Asia/Makassar', 'no'),
(9, 'e2wtmf4q', 'e4jt2fwq', 'f1@f.f', '356a192b7913b04c54574d18c28d46e6395428ab', 'active', NULL, NULL, '2022-08-15 09:29:15', NULL, 'Asia/Makassar', 'yes'),
(10, 'e3ma8fmk', 'e7ra4fjr', 'g@g.g', 'd4f55dec8c7bc9675182779e564fae1327d30f9b', 'new', 'qyjolv6x4k3y1pg24f3voqkn4c4xlo7o1erm8qw02nz957p1', NULL, '2022-08-18 15:16:50', NULL, 'Asia/Makassar', 'no'),
(11, 'e4pbpf82', 'e8xbyf3j', 'h@h.h', 'd4f55dec8c7bc9675182779e564fae1327d30f9b', 'new', '5m1qv4xmr97zy5go1h0omvq3qhrv6omvrdpjown360lk82xo', NULL, '2022-08-18 15:18:09', NULL, 'Asia/Makassar', 'no'),
(12, 'e7yc2fnw', 'djjcrfxw', 'i@i.i', 'd4f55dec8c7bc9675182779e564fae1327d30f9b', 'new', '5m1qv4xmr97zy5goni0omvjpwfpl84417epjown360lk82xo', NULL, '2022-08-18 15:22:53', NULL, 'Asia/Makassar', 'no'),
(13, 'e8kf3frz', 'dkjf8fmz', 'office.moneyindustrialfactory@gmail.com', 'd4f55dec8c7bc9675182779e564fae1327d30f9b', 'new', 'k7qr6x8mwk15p2ev5sp2qvrkrh0z57kzlgjyvn97lo30z4vj', NULL, '2022-08-18 15:26:34', NULL, 'Asia/Makassar', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_currency`
--

CREATE TABLE `tbl_member_currency` (
  `id_member` int NOT NULL,
  `currency` varchar(5) NOT NULL,
  `status` enum('active','disabled') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_member_currency`
--

INSERT INTO `tbl_member_currency` (`id_member`, `currency`, `status`) VALUES
(3, 'AUD', 'active'),
(6, 'EUR', 'active'),
(8, 'EUR', 'active'),
(9, 'AUD', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mifbank`
--

CREATE TABLE `tbl_mifbank` (
  `currency` varchar(5) NOT NULL,
  `c_registered_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `c_account_number` varchar(100) NOT NULL,
  `c_routing_number` varchar(100) NOT NULL,
  `c_bank_name` varchar(100) DEFAULT NULL,
  `c_bank_address` varchar(200) DEFAULT NULL,
  `oc_registered_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `oc_iban` varchar(20) NOT NULL,
  `oc_bic` varchar(20) NOT NULL,
  `oc_bank_name` varchar(100) DEFAULT NULL,
  `oc_bank_address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_mifbank`
--

INSERT INTO `tbl_mifbank` (`currency`, `c_registered_name`, `c_account_number`, `c_routing_number`, `c_bank_name`, `c_bank_address`, `oc_registered_name`, `oc_iban`, `oc_bic`, `oc_bank_name`, `oc_bank_address`) VALUES
('USD', 'PT MONEY MIF US', '234', 'JNAMNB', 'bank cuk', '1001 jancok st, fl, USA', 'PT MONEY MIF US', '234', 'JNAMNB', NULL, '1001 jancok st, fl, USA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` char(40) NOT NULL,
  `role` enum('admin','operator') NOT NULL DEFAULT 'operator',
  `status` enum('active','disabled') NOT NULL DEFAULT 'active',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_accessed` datetime DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `passwd`, `role`, `status`, `date_created`, `last_accessed`, `location`) VALUES
(1, 'si+', 'f@f.f', '356a192b7913b04c54574d18c28d46e6395428ab', 'admin', 'active', '2022-08-15 00:52:03', NULL, 'Asia/Makasar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wise`
--

CREATE TABLE `tbl_wise` (
  `currency` varchar(5) NOT NULL,
  `profile` varchar(50) NOT NULL,
  `error` varchar(255) NOT NULL,
  `min_fee` double NOT NULL,
  `fee_persen` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_wise`
--

INSERT INTO `tbl_wise` (`currency`, `profile`, `error`, `min_fee`, `fee_persen`) VALUES
('AED', '', '', 6.62, 0.8489),
('ARS', '', 'You\'d need to send 125.25 ARS from your balance account, which is more than the available funds of 1 ARS.', 125.25, 0.992),
('AUD', '', '', 1.57, 0.3631),
('BDT', '', 'Sorry, we can\'t make BDT to BDT business transfers.', 146.39, 0.9932),
('BGN', '', '', 1.75, 0.4286),
('BWP', '', 'The smallest amount a recipient can get is 100 BWP.', 61.07, 0.9836),
('CAD', '', '', 2.23, 0.5516),
('CHF', '', '', 1.83, 0.4536),
('CLP', '', 'The smallest amount a recipient can get is 1,000 CLP.', 3376, 0.9997),
('CNY', '', 'You\'d need to send 5.27 CNY from your balance account, which is more than the available funds of 1 CNY.', 5.27, 0.8102),
('CRC', '', 'The smallest amount a recipient can get is 1,000 CRC.', 2666.41, 0.9996),
('CZK', '', '', 6.92, 0.8555),
('DKK', '', '', 3.84, 0.7396),
('EGP', '', 'You\'d need to send 34.5 EGP from your balance account, which is more than the available funds of 1 EGP.', 34.5, 0.971),
('EUR', '', '', 1.28, 0.2188),
('GBP', '', '', 1.32, 0.2424),
('GEL', '', 'You\'d need to send 1.73 GEL from your balance account, which is more than the available funds of 1 GEL.', 1.73, 0.422),
('GHS', '', 'The smallest amount a recipient can get is 5 GHS.', 10.02, 0.9002),
('HKD', '', '', 5.1, 0.8039),
('HRK', '', 'Sorry, you can\'t pay with this method for transfers less than 25 HRK.', 10.33, 0.9032),
('HUF', '', '', 70, 0.9857),
('IDR', '', 'Sorry, we can\'t make IDR to IDR business transfers.', 16971, 0.9999),
('ILS', '', 'You\'d need to send 18.95 ILS from your balance account, which is more than the available funds of 1 ILS.', 18.95, 0.9472),
('INR', '', 'Sorry, we can\'t make INR to INR business transfers.', 135.38, 0.9926),
('JPY', '', '', 245, 0.9959),
('KES', '', 'The smallest amount a recipient can get is 10 KES.', 181, 0.9945),
('KRW', '', 'You\'d need to send 1,451 KRW from your balance account, which is more than the available funds of 1 KRW.', 1451, 0.9993),
('LKR', '', 'You\'d need to send 164.84 LKR from your balance account, which is more than the available funds of 1 LKR.', 164.84, 0.9939),
('MAD', '', 'You\'d need to send 25.07 MAD from your balance account, which is more than the available funds of 1 MAD.', 25.07, 0.9601),
('MXN', '', 'You\'d need to send 13.77 MXN from your balance account, which is more than the available funds of 1 MXN.', 13.77, 0.9274),
('MYR', '', 'Sorry, we can\'t make MYR to MYR business transfers.', 2.91, 0.6564),
('NGN', '', 'You\'d need to send 232.44 NGN from your balance account, which is more than the available funds of 0 NGN.', 232.44, 0.9957),
('NOK', '', '', 3.24, 0.6914),
('NPR', '', 'The smallest amount a recipient can get is 10 NPR.', 323, 0.9969),
('NZD', '', '', 3.9, 0.7436),
('PEN', '', 'The smallest amount a recipient can get is 10 PEN.', 10.45, 0.9043),
('PHP', '', 'The smallest amount a recipient can get is 10 PHP.', 35.38, 0.9717),
('PKR', '', 'Sorry, we can\'t make PKR to PKR business transfers.', 104.77, 0.9905),
('PLN', '', '', 3.04, 0.6711),
('RON', '', '', 3.07, 0.6743),
('RUB', '', 'You\'d need to send 141.11 RUB from your balance account, which is more than the available funds of 0 RUB.', 141.11, 0.9929),
('SEK', '', '', 4.71, 0.7877),
('SGD', '', '', 1.54, 0.3506),
('THB', '', 'You\'d need to send 31.89 THB from your balance account, which is more than the available funds of 1 THB.', 31.89, 0.9686),
('TRY', '', 'Sorry, we can\'t make TRY to TRY business transfers.', 41.26, 0.9758),
('TZS', '', 'Sorry, we can\'t make TZS to TZS business transfers.', 3013.3, 0.9997),
('UAH', '', 'We’re not able offer transfers from UAH right now, due to a change in regulation by the National Bank of Ukraine.', 11.33, 0.9117),
('UGX', '', 'Sorry, we can\'t make UGX to UGX business transfers.', 4420, 0.9998),
('USD', '', '', 1.39, 0.2806),
('UYU', '', 'The smallest amount a recipient can get is 100 UYU.', 164.3, 0.9939),
('VND', '', 'The smallest amount a recipient can get is 10,000 VND.', 32538, 1),
('XOF', '', 'You\'d need to send 2,058 XOF from your balance account, which is more than the available funds of 0 XOF.', 2058, 0.9995),
('ZAR', '', 'You\'d need to send 87.34 ZAR from your balance account, which is more than the available funds of 1 ZAR.', 87.34, 0.9886),
('ZMW', '', 'You\'d need to send 71.72 ZMW from your balance account, which is more than the available funds of 1 ZMW.', 71.72, 0.9861);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_currency`
--
ALTER TABLE `tbl_currency`
  ADD PRIMARY KEY (`currency`);

--
-- Indexes for table `tbl_defaultcost`
--
ALTER TABLE `tbl_defaultcost`
  ADD PRIMARY KEY (`currency`);

--
-- Indexes for table `tbl_defaultfee`
--
ALTER TABLE `tbl_defaultfee`
  ADD PRIMARY KEY (`currency`);

--
-- Indexes for table `tbl_fee`
--
ALTER TABLE `tbl_fee`
  ADD PRIMARY KEY (`id_member`,`currency`),
  ADD KEY `currency` (`currency`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ucode` (`ucode`),
  ADD UNIQUE KEY `refcode` (`refcode`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_referral` (`id_referral`);

--
-- Indexes for table `tbl_member_currency`
--
ALTER TABLE `tbl_member_currency`
  ADD PRIMARY KEY (`id_member`,`currency`),
  ADD KEY `currency` (`currency`);

--
-- Indexes for table `tbl_mifbank`
--
ALTER TABLE `tbl_mifbank`
  ADD PRIMARY KEY (`currency`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_wise`
--
ALTER TABLE `tbl_wise`
  ADD PRIMARY KEY (`currency`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_defaultcost`
--
ALTER TABLE `tbl_defaultcost`
  ADD CONSTRAINT `tbl_defaultcost_ibfk_1` FOREIGN KEY (`currency`) REFERENCES `tbl_currency` (`currency`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_defaultfee`
--
ALTER TABLE `tbl_defaultfee`
  ADD CONSTRAINT `tbl_defaultfee_ibfk_1` FOREIGN KEY (`currency`) REFERENCES `tbl_currency` (`currency`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_fee`
--
ALTER TABLE `tbl_fee`
  ADD CONSTRAINT `tbl_fee_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tbl_member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_fee_ibfk_2` FOREIGN KEY (`currency`) REFERENCES `tbl_currency` (`currency`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD CONSTRAINT `tbl_member_ibfk_1` FOREIGN KEY (`id_referral`) REFERENCES `tbl_member` (`id`);

--
-- Constraints for table `tbl_member_currency`
--
ALTER TABLE `tbl_member_currency`
  ADD CONSTRAINT `tbl_member_currency_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tbl_member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_member_currency_ibfk_2` FOREIGN KEY (`currency`) REFERENCES `tbl_currency` (`currency`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_mifbank`
--
ALTER TABLE `tbl_mifbank`
  ADD CONSTRAINT `tbl_mifbank_ibfk_1` FOREIGN KEY (`currency`) REFERENCES `tbl_currency` (`currency`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
