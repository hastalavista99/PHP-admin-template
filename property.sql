-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 03:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `property`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `commission` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `deposit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billing_two`
--

CREATE TABLE `billing_two` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `commission` int(11) NOT NULL,
  `deposit` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `service_charge` int(11) DEFAULT NULL,
  `water_deposit` int(11) DEFAULT NULL,
  `electricity_deposit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing_two`
--

INSERT INTO `billing_two` (`id`, `unit_id`, `commission`, `deposit`, `rent`, `service_charge`, `water_deposit`, `electricity_deposit`) VALUES
(1, 2, 300, 90, 400, 80, 90, 90),
(2, 4, 600, 393, 9000, 90, 890, 890),
(64, 7, 500, 400, 5000, 80, 90, 80),
(115, 0, 9000, 343, 3400, 222, 323, 223),
(116, 9, 8000, 8990, 1000, 900, 900, 900),
(117, 10, 900, 900, 900, 900, 900, 900),
(241, 15, 34234, 84834, 338, 8, 4, 8),
(242, 16, 3423, 43, 43, 43, 34, 43),
(243, 19, 400, 800, 400, 77, 77, 77),
(244, 33, 700, 800, 800, 3737, 737, 737),
(245, 37, 500, 8776, 898, 677, 7, 7),
(246, 29, 600, 444, 233, 455, 44, 555),
(247, 43, 8000, 800, 12000, 900, 900, 800),
(248, 30, 200, 650, 700, 60, 700, 400),
(249, 40, 3000, 300, 40000, 3400, 4000, 5600);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `tenant_name` varchar(50) NOT NULL,
  `property_name` varchar(50) NOT NULL,
  `unit_name` varchar(50) NOT NULL,
  `unit_number` int(11) NOT NULL,
  `contract` varchar(20) NOT NULL,
  `rent_due` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `tenant_name`, `property_name`, `unit_name`, `unit_number`, `contract`, `rent_due`) VALUES
(7, 'Karanja Kimani', 'dishon', 'mit', 59, 'rent', 800),
(8, 'Neema Nanyama', 'dishon', 'est', 7, 'rent', 4484),
(9, 'Margaret Kitambo', 'dishon', 'wst', 8, 'rent', 200),
(10, 'Karanja Kimani', 'dishon', 'mit', 59, 'rent', 800),
(11, 'Neema Nanyama', 'dishon', 'est', 7, 'rent', 4484),
(12, 'Margaret Kitambo', 'dishon', 'wst', 8, 'rent', 200);

-- --------------------------------------------------------

--
-- Table structure for table `invoices_two`
--

CREATE TABLE `invoices_two` (
  `id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices_two`
--

INSERT INTO `invoices_two` (`id`, `tenant_id`, `property_id`, `unit_id`) VALUES
(1, 9, 6, 7),
(2, 10, 4, 10),
(3, 11, 8, 15),
(4, 7, 8, 15),
(5, 10, 8, 16),
(6, 13, 9, 19),
(7, 13, 9, 19),
(8, 5, 9, 19),
(9, 11, 4, 9),
(10, 6, 9, 19),
(11, 14, 11, 33),
(12, 15, 12, 37),
(13, 5, 5, 29),
(14, 7, 6, 7),
(15, 18, 9, 19),
(16, 19, 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `landlords`
--

CREATE TABLE `landlords` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `landlords`
--

INSERT INTO `landlords` (`id`, `name`, `phone_number`, `email`) VALUES
(4, 'kimani kimanino', '075355533', 'kimani@gmail.com'),
(5, 'charles omollo', '0735353535', 'omollo@gmail.com'),
(6, 'Peter Kilonzo', '07464646464', 'kllonxff@gmail.com'),
(7, 'Joseph Kamau', '07645454533', 'kamau@gmail.com'),
(8, 'mit Persona', '074646464', 'persona@gmail.com'),
(9, 'toitan toiran', '076665653', 'torona@gmail.com'),
(10, 'Jsckdkdk kakakak', '9494884854', 'jack@mitit.com'),
(11, 'Emmanuel Kinai', '08383838', 'kinai@gmail.com'),
(12, 'Winfred Mutuku', '0734343343', 'mutuku@gmail.com'),
(13, 'Kimaniiiiiiiii', '0764646464', 'kim@gmail.com'),
(15, 'shiwa Shiwa ', '075555555', 'shiwa@gmail.com'),
(16, 'Alicia Alice', '077777777', 'alice@gmail.com'),
(17, 'kazan kazan', '0838383838', 'kazan@gmail.com'),
(18, 'mushsts shtua', '0999998', 'shtus@gmail.com'),
(20, 'Ian Ianoh', '9999999', 'ian@gmail.com'),
(21, 'Zeu Matan', '07888888', 'matan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `type_payment` enum('cash','cheque','bank_transfer') NOT NULL,
  `cheque_no` varchar(50) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `buyer_id` int(11) NOT NULL,
  `paid` enum('Yes','No') NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `amount`, `type_payment`, `cheque_no`, `bank_name`, `buyer_id`, `paid`, `date`) VALUES
(1, 3000000, 'cash', '', '', 1, 'Yes', '2023-12-13 14:24:48'),
(4, 600000, 'cash', '', '', 6, 'Yes', '2024-01-05 10:19:13'),
(5, 800000, 'cash', '', '', 7, 'Yes', '2024-01-05 10:22:27'),
(6, 90000, 'cash', '', '', 8, 'Yes', '2024-01-05 10:32:24'),
(7, 800000, 'cash', '', '', 9, 'Yes', '2024-01-05 10:34:12'),
(8, 900000, 'cash', '', '', 10, 'Yes', '2024-01-05 10:35:55'),
(9, 100000, 'cash', '', '', 11, 'Yes', '2024-01-05 10:41:50'),
(10, 1500000, 'cash', '', '', 14, 'Yes', '2024-01-06 14:56:11'),
(11, 1600000, 'cash', '', '', 5, 'Yes', '2024-01-08 09:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `landlord_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `active_status` enum('active','inactive') DEFAULT NULL,
  `number_of_units` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `location`, `landlord_id`, `type_id`, `active_status`, `number_of_units`) VALUES
(4, 'dishon', 'wote', 4, 2, 'inactive', NULL),
(5, 'Kilo Apartments', 'Kitengela', 6, 1, 'active', NULL),
(6, 'Kahska', 'Kabete', 5, 5, 'active', NULL),
(7, 'Kitale Flats', 'Kitale', 5, 3, 'inactive', NULL),
(8, 'Irman House', 'Kitengela', 8, 1, 'active', NULL),
(9, 'Cemak', 'Kitengela', 8, 1, 'active', NULL),
(11, 'eagles', 'roadblock', 11, 1, 'active', NULL),
(12, 'Naivas', 'Kitengela', 12, 1, 'active', NULL),
(13, 'Quickmatt', 'Kitengela', 12, 1, 'active', NULL),
(14, 'Olloooosl', 'Noonkopir', 7, 1, 'active', NULL),
(15, 'Montevideo', 'Skyline', 18, 1, 'active', NULL),
(17, 'Baraka apartments', 'Kitengela', 20, 1, 'active', NULL),
(18, 'Crystal Building', 'Kisaju', 21, 1, 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_sale`
--

CREATE TABLE `property_sale` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `landlord_id` int(11) NOT NULL,
  `no_of_units` int(11) NOT NULL DEFAULT 1,
  `location` varchar(50) NOT NULL,
  `image` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_sale`
--

INSERT INTO `property_sale` (`id`, `name`, `landlord_id`, `no_of_units`, `location`, `image`) VALUES
(1, 'Dykan', 5, 1, 'Kisaju', ''),
(2, 'lichen', 8, 2, 'kitengela', ''),
(3, 'steelfarm', 6, 2, 'Athi River', ''),
(4, 'Irman', 6, 1, 'Athi River', 0x6c616e64322e6a706567),
(5, 'Kimas', 5, 2, 'Kitengela', ''),
(6, 'Trokas', 7, 3, 'Mlolongo', ''),
(7, 'KAG', 12, 4, 'Korompoi', ''),
(8, 'Kisaju', 20, 2, 'Kitengela', ''),
(9, 'Kimalat', 21, 1, 'Kitengela', ''),
(10, 'Skylar', 21, 2, 'Athi River', 0x647261676f6e2e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `name`) VALUES
(1, 'flat'),
(2, 'mansion'),
(3, 'bungalow'),
(4, 'villa'),
(5, 'townhouse');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `booked` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`id`, `name`, `email`, `mobile`, `unit_id`, `date`, `booked`) VALUES
(1, 'kimani kalonzo', 'kalli@gmail.com', '0735353535', 1, '2023-12-12 09:21:05', 'No'),
(2, 'joseph omondi', 'omosh@gmail.com', '0777474474', 2, '2023-12-12 09:24:28', 'No'),
(3, 'sylvia kamande', 'kama@gmail.com', '0848484', 3, '2023-12-12 09:25:40', 'Yes'),
(5, 'joseph', 'ksksk@gmail.com', '0994949', 4, '2023-12-13 10:34:15', 'Yes'),
(6, 'Charles', 'charlie@gmail.com', '0383939', 6, '2023-12-13 10:37:32', 'Yes'),
(7, 'Gregory', 'greg@gmail.com', '08484848', 7, '2023-12-15 07:05:44', 'Yes'),
(8, 'Zeu Matan', 'zeu@gmail.com', '07555555', 5, '2024-01-05 10:28:09', 'Yes'),
(9, 'Kionzo kionzo', 'kionzo@gmail.com', '0766666', 4, '2024-01-05 10:33:57', 'Yes'),
(10, 'Jenepha', 'jen@gmail.com', '0711111', 9, '2024-01-05 10:35:44', 'Yes'),
(11, 'Kimeu Kimatu', 'kimeu@gmail.com', '09999999', 10, '2024-01-05 10:41:30', 'Yes'),
(12, 'Jenepha Dinda', 'jen@gmai.com', '0000000', 1, '2024-01-05 12:06:18', 'No'),
(13, 'Jenepha Dinda', 'jen@gmail.com', '0000000', 1, '2024-01-05 12:07:59', 'No'),
(14, 'Jenepha Gesare', 'jen@gmail.com', '0733333', 11, '2024-01-06 14:55:36', 'Yes'),
(15, 'John Kidaya', 'john@gmail.com', '0711111111', 12, '2024-01-08 09:33:09', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `property_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `tenant_status` enum('unassigned','assigned') NOT NULL,
  `tenant_contract` enum('rent','lease','hire') NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `name`, `email`, `phone_number`, `id_number`, `property_id`, `unit_id`, `tenant_status`, `tenant_contract`, `date`) VALUES
(4, 'Kimanxo manid', 'manid@gmail.con', '04844949', '99444', 5, 13, 'assigned', 'rent', NULL),
(5, 'Jakckck Njototo', 'njo@gaild.com', '07474442', '4848844', 7, 18, 'assigned', 'rent', NULL),
(6, 'Hileayt kjkeid', 'kskj@gmail.com', '0748484484', '66747', 6, 14, 'assigned', 'rent', NULL),
(7, 'kirangks kdkkdjjd', 'jdjd@gmail.com', '0746446464', '8484848', 5, 17, 'unassigned', 'rent', NULL),
(8, 'Kimolo omolo', 'om@dkd.com', '04049', '8484848', 6, 14, '', 'rent', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenants_two`
--

CREATE TABLE `tenants_two` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `contract` enum('rent','lease','hire') DEFAULT NULL,
  `tenant_status` enum('unassigned','assigned') NOT NULL,
  `property_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `billing_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenants_two`
--

INSERT INTO `tenants_two` (`id`, `name`, `email`, `phone_number`, `id_number`, `contract`, `tenant_status`, `property_id`, `unit_id`, `billing_id`) VALUES
(5, 'Greg Omondina', 'omondi@gmail.com', '08474747', '84848', 'rent', 'unassigned', NULL, NULL, NULL),
(6, 'Karanja Kimani', 'karan@gmail.com', '07353535', '847474', 'rent', 'unassigned', NULL, NULL, NULL),
(7, 'Neema Nanyama', 'neema@gmail.com', '0742273727', '334734', 'rent', 'unassigned', NULL, NULL, NULL),
(8, 'Margaret Kitambo', 'kitambo@gmail.com', '07423838383', '99939', 'rent', 'unassigned', NULL, NULL, NULL),
(9, 'kevin kevin', 'kevin@gmail.com', '0303003', '00303', 'rent', 'unassigned', NULL, NULL, NULL),
(10, 'Joseph Ngugi', 'ngugi@gmail.com', '07333333', '444444', 'rent', 'assigned', 8, 16, NULL),
(11, 'Kalonzo Mwale', 'mwale@gmail.com', '07363636', '44646', 'rent', 'assigned', 4, 9, NULL),
(12, 'Charles Ninja', 'ninja@gmail.com', '0377477474', '77474', NULL, 'unassigned', NULL, NULL, NULL),
(13, 'Sidian Kimatu', 'kimatu@gmail.com', '2452523325', '22353', 'rent', 'unassigned', NULL, NULL, NULL),
(14, 'Gregory Omonci', 'omondi@gmail.com', '0734343', '535335', 'rent', 'assigned', 11, 33, NULL),
(15, 'eueeueue eueueu', 'ee@gmail.com', '049848', '84848', 'rent', 'assigned', 12, 37, NULL),
(16, 'Rae Sremmurd', '0999999', 'drum@gmail.com', '99999', NULL, 'unassigned', NULL, NULL, NULL),
(17, 'Jon Jon', '000000', 'jon@gmail.com', '88888', NULL, 'unassigned', NULL, NULL, NULL),
(18, 'John Kimani', '078888888', 'ian@gmail.com', '775745', 'rent', 'unassigned', NULL, NULL, NULL),
(19, 'Joel Mutanu', '0733333', 'mutanu@gmail.com', '3676766', 'rent', 'unassigned', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenant _assign`
--

CREATE TABLE `tenant _assign` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `unit_number` varchar(20) NOT NULL,
  `floor_number` int(11) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `balconies` int(11) NOT NULL,
  `commission` varchar(50) NOT NULL,
  `rent` varchar(50) NOT NULL,
  `deposit` varchar(50) NOT NULL,
  `available` enum('Yes','No') NOT NULL,
  `reserved` enum('Yes','No') NOT NULL,
  `is_occupied` enum('Yes','No') NOT NULL,
  `availability_date` date NOT NULL,
  `unit_description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `property_id`, `name`, `unit_number`, `floor_number`, `bedrooms`, `bathrooms`, `balconies`, `commission`, `rent`, `deposit`, `available`, `reserved`, `is_occupied`, `availability_date`, `unit_description`) VALUES
(10, 5, '', '0025', 0, 3, 2, 2, '5700', '65000', '5200', 'No', 'Yes', 'Yes', '2023-12-08', ''),
(13, 7, '', '1', 0, 1, 1, 1, '32432', '4332', '2431', 'No', 'Yes', 'Yes', '2023-11-23', ''),
(14, 6, '', '1', 0, 1, 1, 1, '334', '43', '434', 'Yes', 'Yes', 'Yes', '2023-11-30', ''),
(16, 6, '', '1', 0, 1, 1, 1, '25555', '62', '584', 'Yes', 'No', 'Yes', '2023-11-30', ''),
(17, 6, '', '1', 0, 11, 1, 1, '561321', '321', '212', 'No', 'No', 'Yes', '2023-11-30', ''),
(18, 6, '', '5', 0, 5, 5, 5, '4654', '6456', '554', 'Yes', 'No', 'No', '2023-11-30', ''),
(32, 8, 'mit59', '59', 0, 1, 1, 1, '3434', '343', '43', 'Yes', 'No', 'No', '2023-11-25', ''),
(33, 8, 'clsa89', '34', 0, 1, 1, 1, '343', '3434', '433', 'No', 'No', 'Yes', '2023-11-30', ''),
(34, 7, 'moji', '1', 0, 2, 22, 2, '225', '555', '55', 'No', 'No', 'Yes', '0000-00-00', ''),
(35, 7, 'look', '9', 0, 3, 2, 2, '54454', '545', '5454', 'No', 'Yes', 'No', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `units_sale`
--

CREATE TABLE `units_sale` (
  `id` int(11) NOT NULL,
  `property_sale_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `commission` int(11) NOT NULL,
  `deposit` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `booked` enum('No','Yes') NOT NULL DEFAULT 'No',
  `sold` enum('No','Yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units_sale`
--

INSERT INTO `units_sale` (`id`, `property_sale_id`, `name`, `description`, `commission`, `deposit`, `price`, `booked`, `sold`) VALUES
(1, 2, 'A1', '', 353333, 35353, 5323532, 'No', 'No'),
(2, 4, 'A059', '50*100', 2323, 434234, 434343, 'No', 'No'),
(3, 2, 'A02', '', 5345, 545, 454, 'No', 'No'),
(4, 3, 'B01', '', 3333, 535355, 53533533, 'No', 'Yes'),
(5, 5, 'z01', '', 8888, 8888, 8888, 'Yes', 'No'),
(6, 6, 'Mit59', '', 433, 4343, 43343, 'Yes', 'Yes'),
(7, 7, 'A03', '50*100', 8, 8, 7788, 'Yes', 'No'),
(8, 6, 'J7', '50*100', 3434, 353, 600000, 'No', 'No'),
(9, 7, 'Mile', '1 acre', 34434, 53433, 900000, 'Yes', 'Yes'),
(10, 7, 'B5', '50*100', 23243, 324, 100000, 'Yes', 'Yes'),
(11, 8, 'Q9', '50*100', 6000, 70000, 1500000, 'Yes', 'Yes'),
(12, 10, 'H6', '1/8 acre', 3000, 140000, 1600000, 'No', 'No');

--
-- Triggers `units_sale`
--
DELIMITER $$
CREATE TRIGGER `after_unit_delete` AFTER DELETE ON `units_sale` FOR EACH ROW BEGIN
    UPDATE property_sale
    SET no_of_units = no_of_units - 1
    WHERE id = OLD.property_sale_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_unit_insert` AFTER INSERT ON `units_sale` FOR EACH ROW BEGIN
    UPDATE property_sale
    SET no_of_units = no_of_units + 1
    WHERE id = NEW.property_sale_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `units_two`
--

CREATE TABLE `units_two` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `unit_name` varchar(50) NOT NULL,
  `unit_number` varchar(20) DEFAULT NULL,
  `description` varchar(2000) NOT NULL,
  `available` enum('No','Yes') NOT NULL,
  `reserved` enum('No','Yes') NOT NULL,
  `occupied` enum('No','Yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units_two`
--

INSERT INTO `units_two` (`id`, `property_id`, `unit_name`, `unit_number`, `description`, `available`, `reserved`, `occupied`) VALUES
(2, 6, 'shop', '001', '3500 sq ft', 'No', 'No', 'Yes'),
(4, 4, 'mit', '059', '', 'No', 'No', 'Yes'),
(7, 6, 'kaka', '048', '', 'Yes', 'No', 'No'),
(9, 4, 'est', '007', '', 'No', 'No', 'Yes'),
(10, 4, 'wst', '008', '', 'Yes', 'No', 'No'),
(15, 8, 'free', '005', '', 'Yes', 'No', 'No'),
(16, 8, 'salon', '002', '', 'No', 'No', 'Yes'),
(19, 9, 'g01', '001', '', 'Yes', 'No', 'No'),
(29, 5, 'a1', '099', '', 'No', 'No', 'Yes'),
(30, 8, 'shiran', '058', '', 'Yes', 'No', 'No'),
(33, 11, 'shop', '008', '', 'No', 'No', 'Yes'),
(37, 12, 'Q01', '004', 'shop', 'No', 'No', 'Yes'),
(40, 13, 'D02', '002', '', 'Yes', 'No', 'No'),
(42, 14, 'shop', '009', '', 'Yes', 'No', 'No'),
(43, 17, 'Shop', '001', '', 'Yes', 'No', 'No'),
(50, 18, 'stall ', '009', '100 sq ft', 'Yes', 'No', 'No');

--
-- Triggers `units_two`
--
DELIMITER $$
CREATE TRIGGER `after_units_delete` AFTER DELETE ON `units_two` FOR EACH ROW BEGIN
    UPDATE properties
    SET number_of_units = number_of_units - 1
    WHERE id = OLD.property_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_units_insert` AFTER INSERT ON `units_two` FOR EACH ROW BEGIN
    UPDATE properties
    SET number_of_units = number_of_units + 1
    WHERE id = NEW.property_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('admin','user','tenant','staff') NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'admin', 'jack jack', 'jack@gmail.com', '12345'),
(7, 'user', 'Greg', 'greg@gmail.com', '1234'),
(8, 'admin', 'Peter', 'peter@gmail.com', '12345'),
(9, 'admin', 'John', 'john@gmail.com', '12345'),
(10, 'user', 'Kanya', 'kanya@gmail.com', '$2y$10$8L0A91TPjeVaBlsGnFIjN.joipTr9Y/nljCCx2/17RU'),
(11, 'user', 'James', 'jamie@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `vacate`
--

CREATE TABLE `vacate` (
  `id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vacate`
--

INSERT INTO `vacate` (`id`, `tenant_id`, `unit_id`, `property_id`, `comment`, `date`) VALUES
(1, 5, 19, 9, '', '2023-12-08 13:34:58'),
(2, 7, NULL, NULL, 'hhhdhdhd', '2024-01-04 07:50:01'),
(3, 6, NULL, NULL, 'lllllll', '2024-01-04 07:50:21'),
(4, 8, NULL, NULL, 'sfsfdfdfsdf', '2024-01-04 10:38:51'),
(5, 7, NULL, NULL, 'theft', '2024-01-05 12:09:26'),
(6, 18, NULL, NULL, 'theft', '2024-01-06 14:49:17'),
(7, 19, NULL, NULL, 'theft', '2024-01-08 09:22:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billing_ibfk_3` (`unit_id`);

--
-- Indexes for table `billing_two`
--
ALTER TABLE `billing_two`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices_two`
--
ALTER TABLE `invoices_two`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant_id` (`tenant_id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `landlords`
--
ALTER TABLE `landlords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `landlord_id` (`landlord_id`);

--
-- Indexes for table `property_sale`
--
ALTER TABLE `property_sale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landlord_id` (`landlord_id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id_ten` (`property_id`),
  ADD KEY `unit_id_ten` (`unit_id`);

--
-- Indexes for table `tenants_two`
--
ALTER TABLE `tenants_two`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `tenant _assign`
--
ALTER TABLE `tenant _assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `units_sale`
--
ALTER TABLE `units_sale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_sale_id` (`property_sale_id`);

--
-- Indexes for table `units_two`
--
ALTER TABLE `units_two`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `vacate`
--
ALTER TABLE `vacate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `tenant_id` (`tenant_id`),
  ADD KEY `property_id` (`property_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `billing_two`
--
ALTER TABLE `billing_two`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `invoices_two`
--
ALTER TABLE `invoices_two`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `landlords`
--
ALTER TABLE `landlords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `property_sale`
--
ALTER TABLE `property_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tenants_two`
--
ALTER TABLE `tenants_two`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tenant _assign`
--
ALTER TABLE `tenant _assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `units_sale`
--
ALTER TABLE `units_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `units_two`
--
ALTER TABLE `units_two`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vacate`
--
ALTER TABLE `vacate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`),
  ADD CONSTRAINT `billing_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units_two` (`id`),
  ADD CONSTRAINT `billing_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `units_two` (`id`);

--
-- Constraints for table `invoices_two`
--
ALTER TABLE `invoices_two`
  ADD CONSTRAINT `invoices_two_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenants_two` (`id`),
  ADD CONSTRAINT `invoices_two_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `invoices_two_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `units_two` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `sell` (`id`);

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`landlord_id`) REFERENCES `landlords` (`id`),
  ADD CONSTRAINT `properties_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `property_types` (`id`),
  ADD CONSTRAINT `properties_ibfk_3` FOREIGN KEY (`landlord_id`) REFERENCES `landlords` (`id`);

--
-- Constraints for table `property_sale`
--
ALTER TABLE `property_sale`
  ADD CONSTRAINT `property_sale_ibfk_1` FOREIGN KEY (`landlord_id`) REFERENCES `landlords` (`id`);

--
-- Constraints for table `sell`
--
ALTER TABLE `sell`
  ADD CONSTRAINT `sell_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units_sale` (`id`);

--
-- Constraints for table `tenants`
--
ALTER TABLE `tenants`
  ADD CONSTRAINT `tenants_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `tenants_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `tenants_two`
--
ALTER TABLE `tenants_two`
  ADD CONSTRAINT `tenants_two_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `tenants_two_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units_two` (`id`),
  ADD CONSTRAINT `tenants_two_ibfk_3` FOREIGN KEY (`billing_id`) REFERENCES `billing_two` (`id`);

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `units_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `units_sale`
--
ALTER TABLE `units_sale`
  ADD CONSTRAINT `units_sale_ibfk_1` FOREIGN KEY (`property_sale_id`) REFERENCES `property_sale` (`id`),
  ADD CONSTRAINT `units_sale_ibfk_2` FOREIGN KEY (`property_sale_id`) REFERENCES `property_sale` (`id`);

--
-- Constraints for table `units_two`
--
ALTER TABLE `units_two`
  ADD CONSTRAINT `units_two_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `units_two_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `vacate`
--
ALTER TABLE `vacate`
  ADD CONSTRAINT `vacate_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units_two` (`id`),
  ADD CONSTRAINT `vacate_ibfk_2` FOREIGN KEY (`tenant_id`) REFERENCES `tenants_two` (`id`),
  ADD CONSTRAINT `vacate_ibfk_3` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
