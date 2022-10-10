-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2022 at 07:16 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gotogro`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `item_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`item_category`) VALUES
('Baby/Pet Items'),
('Beverages'),
('Bread/Bakery'),
('Canned Goods'),
('Cereal'),
('Cleaning'),
('Dairy'),
('Dried Goods'),
('Frozen Food'),
('Meat'),
('Others'),
('Paper Goods'),
('Personal Care'),
('Produce'),
('Seafood');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` varchar(50) NOT NULL,
  `employee_password` varchar(50) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `employee_ic` varchar(20) NOT NULL,
  `employee_dob` date NOT NULL,
  `employee_age` int(2) NOT NULL,
  `employee_phone_number` varchar(20) NOT NULL,
  `employee_address` varchar(255) NOT NULL,
  `employee_position` varchar(50) NOT NULL,
  `employee_emer_name` varchar(100) NOT NULL,
  `employee_emer_num` varchar(20) NOT NULL,
  `employee_emer_rela` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_password`, `employee_name`, `employee_ic`, `employee_dob`, `employee_age`, `employee_phone_number`, `employee_address`, `employee_position`, `employee_emer_name`, `employee_emer_num`, `employee_emer_rela`) VALUES
('M001', 'aarontung', 'Aaron Tung Xingron', '020519100891', '2002-05-19', 20, '0108301999', 'B-22-05, Residensi Skyluxe on the Park, Jalan Jalil Perkasa 1, Bukit Jalil, 57000, Kuala Lumpur', 'Manager', 'Tung Men Sang', '0108484777', 'Father'),
('M002', 'aifei', 'Ong Ai Fei', '6161616161', '2022-10-06', 19, '616161', '11616161', 'Manager', '6161616', '616161616', '1223536'),
('S001', 'hayes', 'Hayes Warren Lum', '5656565', '2022-10-03', 20, '898985', '611616161', 'Staff', '6161616', '92661616', '8282455'),
('SV001', 'adrian', 'Khoo Chee Seng', '665656565', '2022-10-09', 20, '75575', 'iluukygty', 'Supervisor', 'fefefefef', 'fefefefef', 'fefff');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` varchar(50) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` float NOT NULL,
  `item_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_price`, `item_category`) VALUES
('B001', 'Bottled Mineral Water (6 Bottles, 250ml)', 16.9, 'Beverages'),
('B002', 'Bottled Mineral Water (1 Bottle, 250ml)', 2.9, 'Beverages'),
('B003', 'Bottled Chinese Tea (6 Bottles, 250ml)', 16.9, 'Beverages'),
('B004', 'Bottled Chinese Tea (1 Bottle, 250ml)', 2.9, 'Beverages'),
('B005', 'Bottled Sparkling Water (6 Bottles, 250ml)', 16.9, 'Beverages'),
('B006', 'Bottled Sparkling Water (1 Bottle, 250ml)', 2.9, 'Beverages'),
('B007', 'Bottled Green Tea (6 Bottles, 250ml)', 16.9, 'Beverages'),
('B008', 'Bottled Green tea (1 Bottle, 250ml)', 2.9, 'Beverages'),
('B009', 'Bottled 100 Plus (6 Bottles, 250ml)', 16.9, 'Beverages'),
('B010', 'Bottled 100 Plus (1 Bottle, 250ml)', 2.9, 'Beverages'),
('B011', 'Bottled Coca-Cola (6 Bottles, 250ml)', 16.9, 'Beverages'),
('B012', 'Bottled Coca-Cola (1 Bottle, 250ml)', 2.9, 'Beverages'),
('B013', 'Bottled Sprite (6 Bottles, 250ml)', 16.9, 'Beverages'),
('B014', 'Bottled Sprite (1 Bottle, 250ml)', 2.9, 'Beverages'),
('B015', 'Bottled Pepsi (6 Bottles, 250ml)', 16.9, 'Beverages'),
('B016', 'Bottled Pepsi (1 Bottle, 250ml)', 2.9, 'Beverages'),
('B017', 'Bottled 7-Up (6 Bottles, 250ml)', 16.9, 'Beverages'),
('B018', 'Bottled 7-Up (1 Bottle, 250ml)', 2.9, 'Beverages'),
('B019', 'Bottled Root Beer (6 Bottles, 250ml)', 16.9, 'Beverages'),
('B020', 'Bottled Root Beer (1 Bottle, 250ml)', 2.9, 'Beverages'),
('B021', 'Bottled Ice Cream Soda (6 Bottles, 250ml)', 16.9, 'Beverages'),
('B022', 'Bottled Ice Cream Soda (1 Bottle, 250ml)', 2.9, 'Beverages'),
('B023', 'Bottled Apple Juice (6 Bottles, 250ml)', 16.9, 'Beverages'),
('B024', 'Bottled Apple Juice (1 Bottle, 250ml)', 2.9, 'Beverages'),
('B025', 'Bottled Orange Juice (6 Bottles, 250ml)', 16.9, 'Beverages'),
('B026', 'Bottled Orange Juice (1 Bottles, 250ml)', 2.9, 'Beverages'),
('B027', 'Bottled Lemonade (6 Bottles, 250ml)', 16.9, 'Beverages'),
('B028', 'Bottled Lemonade (1 Bottle, 250ml)', 2.9, 'Beverages'),
('B029', 'Bottled Mango Juice (6 Bottles, 250ml)', 16.9, 'Beverages'),
('B030', 'Bottled Mango Juice (1 Bottle, 250ml)', 2.9, 'Beverages'),
('B031', 'Bottled Coconut Juice (6 Bottles, 250ml)', 16.9, 'Beverages'),
('B032', 'Bottled Coconut Juice (1 Bottle, 250ml)', 2.9, 'Beverages'),
('B033', 'Canned Energy Drink (6 Cans, 125ml)', 10.9, 'Beverages'),
('B034', 'Canned Energy Drink (1 Can, 125ml)', 1.9, 'Beverages'),
('BP001', 'Dog Leash (1 Dog Leash, 1m)', 10.9, 'Baby/Pet Items'),
('BP002', 'Ear Cleaning Solution for Dogs (1 Bottle, 125ml)', 8.9, 'Baby/Pet Items'),
('BP003', 'Jumbo Earwipes for Cats (1 Pack, 100 ply)', 12.5, 'Baby/Pet Items'),
('BP004', 'Eye Cleaning Solution for Dogs (1 Bottle, 125ml)', 8.9, 'Baby/Pet Items'),
('BP005', 'Jumbo Eyewipes for Cats (1 Pack, 100 ply)', 12.5, 'Baby/Pet Items'),
('BP006', 'Anti-Tick Powder for Dogs (1 Bottle, 50g)', 5.9, 'Baby/Pet Items'),
('BP007', 'Plague Toothwipes for Dogs (1 Pack, 50g)', 7.9, 'Baby/Pet Items'),
('BP008', 'Plague Toothwipes for Cats (1 Pack, 50g)', 7.9, 'Baby/Pet Items'),
('BP009', 'Salmon Treats for Cats (1 Pack, 20g)', 4.9, 'Baby/Pet Items'),
('BP010', 'Tuna Treats for Cats (1 Pack, 20g)', 4.9, 'Baby/Pet Items'),
('BP011', 'Litter Box for Cats ', 49.9, 'Baby/Pet Items'),
('BP012', 'Scratchers for Cats (1 Scratcher)', 37.9, 'Baby/Pet Items'),
('BP013', 'Chicken Jerkey for Dogs (1 Pack, 50g)', 6.9, 'Baby/Pet Items'),
('BP014', 'Beef Jerkey for Dogs (1 Pack, 50g)', 6.9, 'Baby/Pet Items'),
('BP015', 'Duck Jerkey for Dogs (1 Pack, 50g)', 6.9, 'Baby/Pet Items'),
('BP016', 'Turkey Jerkey for Dogs (1 Pack, 50g)', 6.9, 'Baby/Pet Items'),
('BP017', 'Kennels for Dogs (1 Kennel)', 59.9, 'Baby/Pet Items'),
('BP018', 'Grooming Set for Dogs (1 Grooming Set)', 29.9, 'Baby/Pet Items'),
('BP019', 'Grooming Set for Cats (1 Grooming Set)', 29.9, 'Baby/Pet Items'),
('BP020', 'Dried Dog Food (1 Bag, 1kg)', 89.9, 'Baby/Pet Items'),
('BP021', 'Canned Dog Food (1 Can)', 12.9, 'Baby/Pet Items'),
('BP022', 'Dried Cat Food (1 Bag, 1kg)', 89.9, 'Baby/Pet Items'),
('BP023', 'Canned Cat Food (1 Can)', 5.9, 'Baby/Pet Items'),
('BP024', 'Clothes for Baby Boys (1 One-Piece Shirt)', 39.9, 'Baby/Pet Items'),
('BP025', 'Clothes for Baby Girls (1 One-Piece Shirt)', 39.9, 'Baby/Pet Items'),
('BP026', 'Diapers for Newborns (1 Bag, 1kg)', 79.9, 'Baby/Pet Items'),
('BP027', 'Diapers for 1 to 3 Year-Olds (1 Bag, 1kg)', 99.9, 'Baby/Pet Items'),
('BP028', 'Car Seat for 1 to 3 Year Olds (1 Car Seat)', 235.9, 'Baby/Pet Items'),
('BP029', 'Stroller for Newborns (1 Stroller)', 299.9, 'Baby/Pet Items'),
('BP030', 'Stroller for 1 to 3 Year Olds (1 Stroller)', 345.9, 'Baby/Pet Items'),
('BP031', 'Nursing Pillow (1 Nursing Pillow)', 69.9, 'Baby/Pet Items'),
('BP032', 'Burp Cloth (1 Burp Cloth)', 45.9, 'Baby/Pet Items'),
('BP033', 'Feeding Bottles for 1 to 3 Year Olds (1 Feeding Bottle)', 49.9, 'Baby/Pet Items'),
('BP034', 'Feeding Bottles for 4 to 6 Year Olds (1 Feeding Bottle)', 55.9, 'Baby/Pet Items'),
('BP035', 'Feeding Bottle Brush Set (1 Brush Set)', 29.9, 'Baby/Pet Items'),
('BP036', 'Feeding Bottle Sterilizer (1 Sterilizer)', 35.9, 'Baby/Pet Items'),
('BP037', 'Feeding Bottle Warmer (1 Warmer)', 26.9, 'Baby/Pet Items'),
('BP038', 'Cold Gel Pack (1 Gel Pack)', 29.9, 'Baby/Pet Items'),
('BP039', 'Baby Eating Set (1 Eating Set)', 59.9, 'Baby/Pet Items'),
('BP040', 'Baby Bathing Set (1 Bathing Set)', 89.9, 'Baby/Pet Items'),
('P001', 'Lettuce (1 Bag Lettuce, 150g)', 3.7, 'Produce'),
('P002', 'Spinach (1 Bag Spinach, 200g)\r\n', 2.5, 'Produce'),
('P003', 'Cabbage (1 Cabbage)', 4, 'Produce'),
('P004', 'Broccoli (1 Broccoli)', 3.1, 'Produce'),
('P005', 'Cauliflower (1 Cauliflower)', 3, 'Produce'),
('P006', 'Brussel Sprouts (1 Bag Brussel Sprouts, 500g)', 8.9, 'Produce'),
('P007', 'Pumpkin (1/4 Pumpkin)', 4.9, 'Produce'),
('P008', 'Japanese Cucumber (3 Cucumbers)', 6.9, 'Produce'),
('P009', 'Zucchini (1 Zucchini)', 4.1, 'Produce'),
('P010', 'Potato (1 Potato)', 0.9, 'Produce'),
('P011', 'Tomato (1 Tomato)', 0.85, 'Produce'),
('P012', 'Onion (1 Onion)', 0.5, 'Produce'),
('P013', 'Garlic (1 Garlic)', 0.4, 'Produce'),
('P014', 'Shallot (1 Shallot)', 0.1, 'Produce'),
('P015', 'Onion (1 Bag Onion, 200g)', 5.1, 'Produce'),
('P016', 'Garlic (1 Bag Garlic, 200g)', 3.5, 'Produce'),
('P017', 'Shallot (1 Bag Shallot, 200g)', 2.9, 'Produce'),
('P018', 'Sweet Potato (1 Sweet Potato)', 1, 'Produce'),
('P019', 'Yam (1 Yam)', 0.8, 'Produce'),
('P020', 'Celery (1 Stem Celery)', 2.9, 'Produce'),
('P021', 'Asparagus (1 Bag Asparagus, 200g)', 4, 'Produce'),
('P022', 'Pea (1 Bag Pea, 200g)', 3.2, 'Produce'),
('P023', 'Corn (1 Corn)', 2.4, 'Produce'),
('P024', 'Spring Onion (1 Stem Spring Onion)', 0.15, 'Produce'),
('P025', 'Leek (1 Stem Leek)', 0.19, 'Produce'),
('P026', 'Coriander (1 Bag Coriander, 20g)', 2.4, 'Produce'),
('P027', 'Ginger (1 Bag Ginger, 50g)', 3.4, 'Produce'),
('P028', 'Radish (1 Radish)', 0.9, 'Produce'),
('P029', 'Carrot (3 Carrots)', 4.1, 'Produce'),
('P030', 'Red Chili Pepper (1 Bag Red Chili Pepper, 20g)', 1.2, 'Produce'),
('P031', 'Green Chili Pepper (1 Bag Green Chili Pepper, 20g)', 1.22, 'Produce'),
('P032', 'Green Bean (1 Bag Green Beans, 100g)', 2.3, 'Produce'),
('P033', 'Curry Leaves (1 Bag Curry Leaves, 10g)', 0.3, 'Produce'),
('P034', 'Mint (1 Bag Mint, 10g)', 0.3, 'Produce'),
('P035', 'Perilla Leaves (1 Bag Perilla Leaves, 20g)', 1.2, 'Produce'),
('P036', 'Parsley (1 Bag Parsley, 10g)', 0.15, 'Produce'),
('P037', 'Basil (1 Bag Pasil, 10g)', 0.2, 'Produce'),
('P038', 'Chinese Cabbage (1/2 Chinese Cabbage)', 3.8, 'Produce'),
('P039', 'Okra (1 Bag Okra, 100g)', 2.7, 'Produce'),
('P040', 'Olives (1 Bag Olives, 100g)', 2.8, 'Produce'),
('P041', 'Apple (1 Apple)', 3.5, 'Produce'),
('P042', 'Orange (1 Orange)', 2.9, 'Produce'),
('P043', 'Pear (1 Pear)', 2.3, 'Produce'),
('P044', 'Lemon (1 Lemon)', 3.5, 'Produce'),
('P045', 'Banana (1 Comb Banana)', 7.9, 'Produce'),
('P046', 'Mango (1 Mango)', 3.5, 'Produce'),
('P047', 'Strawberries (1 Box Strawberries)', 10.9, 'Produce'),
('P048', 'Blueberries (1 Box Blueberries)', 10.9, 'Produce'),
('P049', 'Blackcurrent (1 Box Blackcurrent)', 10.9, 'Produce'),
('P050', 'Raspberries (1 Box Raspberries)', 10.9, 'Produce'),
('P051', 'Kiwifruit (1 Kiwifruit)', 4.9, 'Produce'),
('P052', 'Passionfruit (1 Passionfruit)', 4.9, 'Produce'),
('P053', 'Watermelon (1/4 Watermelon)', 8.9, 'Produce'),
('P054', 'Papaya (1/2 Papaya)', 5.9, 'Produce'),
('P055', 'Honeydew (1/2 Honeydew)', 8.9, 'Produce'),
('P056', 'Avocado (1 Avocado)', 6.9, 'Produce'),
('P057', 'Pineapple (1 Pineapple)', 12.9, 'Produce'),
('P058', 'Grapes (1 Box Grapes)', 10.9, 'Produce'),
('P059', 'Cherries (1 Box Cherries)', 10.9, 'Produce'),
('P060', 'Dragon Fruit (1 Dragon Fruit)', 5.9, 'Produce');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` varchar(50) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `member_ic` varchar(20) NOT NULL,
  `member_phone_number` varchar(20) NOT NULL,
  `member_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_ic`, `member_phone_number`, `member_address`) VALUES
('MB001', 'Nicholas Ng Qi Han', '991215103254', '0165552365', 'A-08-06, Residensi KM1 West Condo, Jalan Jalil Perkasa 1, Bukit Jalil 57000, Kuala Lumpur'),
('MB002', 'Victory Wong Jian Cong ', '001023105529', '0125598457', 'A-25-01, Residensi Pamera Livings, Jalan Sri Petaling 1, Sri Petaling, 57000, Kuala Lumpur'),
('MB003', 'Feisal', '100825141126', '0108484777', 'dwdwddwddwdwddwd'),
('MB004', 'Feisal', '100825141123', '0108484777', 'dwdwddwddwdwddwd');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `employee_position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`employee_position`) VALUES
('Manager'),
('Staff'),
('Supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `record_id` int(10) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` int(10) NOT NULL,
  `item_quantity` int(10) NOT NULL,
  `item_total_price` int(10) NOT NULL,
  `item_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `record_receipt`
--

CREATE TABLE `record_receipt` (
  `record_id` int(10) NOT NULL,
  `total` float NOT NULL,
  `grand_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(10) NOT NULL,
  `record_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`item_category`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `employee_position` (`employee_position`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_category` (`item_category`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`employee_position`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`record_id`,`item_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `item_category` (`item_category`);

--
-- Indexes for table `record_receipt`
--
ALTER TABLE `record_receipt`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `record_id` (`record_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `record_id` (`record_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`employee_position`) REFERENCES `position` (`employee_position`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`item_category`) REFERENCES `category` (`item_category`);

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`item_category`) REFERENCES `category` (`item_category`),
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);

--
-- Constraints for table `record_receipt`
--
ALTER TABLE `record_receipt`
  ADD CONSTRAINT `record_receipt_ibfk_1` FOREIGN KEY (`record_id`) REFERENCES `record` (`record_id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`record_id`) REFERENCES `record` (`record_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
