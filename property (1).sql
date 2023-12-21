-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 03:53 PM
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
(243, 19, 400, 800, 400, 77, 77, 77);

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
(10, 6, 9, 19);

-- --------------------------------------------------------

--
-- Table structure for table `landlords`
--

CREATE TABLE `landlords` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `number_of_properties` int(11) DEFAULT 0,
  `occupied` int(11) NOT NULL,
  `vacant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `landlords`
--

INSERT INTO `landlords` (`id`, `name`, `phone_number`, `email`, `number_of_properties`, `occupied`, `vacant`) VALUES
(4, 'kimani kimani', '075355533', 'kimani@gmail.com', 1, 0, 0),
(5, 'charles omollo', '0735353535', 'omollo@gmail.com', 2, 0, 0),
(6, 'Peter Kilonzo', '07464646464', 'kllonx@gmail.com', 1, 0, 0),
(7, 'Joseph Kamau', '07645454533', 'kamau@gmail.com', 0, 0, 0),
(8, 'mit Persona', '074646464', 'persona@gmail.com', 0, 0, 0),
(9, 'toitan toiran', '076665653', 'torona@gmail.com', 0, 0, 0),
(10, 'Jsckdkdk kakakak', '9494884854', 'jack@mitit.com', 0, 0, 0);

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
  `number_of_units` int(11) NOT NULL DEFAULT 1,
  `occupied_units` int(11) NOT NULL,
  `vacant_units` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `location`, `landlord_id`, `type_id`, `active_status`, `number_of_units`, `occupied_units`, `vacant_units`) VALUES
(4, 'dishon', 'wote', 4, 2, 'inactive', 1, 0, 0),
(5, 'Kilo Apartments', 'Kitengela', 6, 1, 'active', 1, 1, 0),
(6, 'Kahska', 'Kabete', 5, 5, 'active', 4, 3, 1),
(7, 'Kitale Flats', 'Kitale', 5, 3, 'inactive', 1, 1, 0),
(8, 'Irman House', 'Kitengela', 8, 1, 'active', 2, 0, 0),
(9, 'Cemak', 'Kitengela', 8, 1, 'active', 1, 0, 0);

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
(2, 'lichen', 8, 1, 'kitengela', ''),
(3, 'steelfarm', 6, 1, 'Athi River', ''),
(4, 'Irman', 6, 1, 'Athi River', 0x6c616e64322e6a706567);

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
(5, 'Greg Omondi', 'omondi@gmail.com', '08474747', '84848', 'rent', 'unassigned', NULL, NULL, NULL),
(6, 'Karanja Kimani', 'karan@gmail.com', '07353535', '847474', 'rent', 'assigned', 9, 19, NULL),
(7, 'Neema Nanyama', 'neema@gmail.com', '0742273727', '334734', 'rent', 'assigned', 8, 15, NULL),
(8, 'Margaret Kitambo', 'kitambo@gmail.com', '07423838383', '99939', 'rent', 'assigned', 4, 10, NULL),
(9, 'kevin kevin', 'kevin@gmail.com', '0303003', '00303', 'rent', 'assigned', 6, 7, NULL),
(10, 'Joseph Ngugi', 'ngugi@gmail.com', '07333333', '444444', 'rent', 'assigned', 8, 16, NULL),
(11, 'Kalonzo Mwale', 'mwale@gmail.com', '07363636', '44646', 'rent', 'assigned', 4, 9, NULL),
(12, 'Charles Ninja', 'ninja@gmail.com', '0377477474', '77474', NULL, 'unassigned', NULL, NULL, NULL),
(13, 'Sidian Kimatu', 'kimatu@gmail.com', '2452523325', '22353', 'rent', 'unassigned', NULL, NULL, NULL);

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
  `sold` enum('No','Yes') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units_sale`
--

INSERT INTO `units_sale` (`id`, `property_sale_id`, `name`, `description`, `commission`, `deposit`, `price`, `sold`) VALUES
(1, 2, 'A1', '', 353333, 35353, 5323532, 'No'),
(2, 4, 'A059', '50*100', 2323, 434234, 434343, 'No');

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
(7, 6, 'kaka', '048', '', 'No', 'No', 'Yes'),
(9, 4, 'est', '007', '', 'No', 'No', 'Yes'),
(10, 4, 'wst', '008', '', 'Yes', 'No', 'No'),
(15, 8, 'free', '005', '', 'No', 'No', 'Yes'),
(16, 8, 'salon', '002', '', 'No', 'No', 'Yes'),
(19, 9, 'g01', '001', '', 'No', 'No', 'Yes'),
(29, 5, 'a1', '099', '', 'Yes', 'No', 'No'),
(30, 8, 'shiran', '058', '', 'Yes', 'No', 'No');

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
(1, 5, 19, 9, '', '2023-12-08 13:34:58');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `invoices_two`
--
ALTER TABLE `invoices_two`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `landlords`
--
ALTER TABLE `landlords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `property_sale`
--
ALTER TABLE `property_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tenants_two`
--
ALTER TABLE `tenants_two`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units_two`
--
ALTER TABLE `units_two`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `vacate`
--
ALTER TABLE `vacate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `units_two_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

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
