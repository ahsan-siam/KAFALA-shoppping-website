-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221224.47627104f2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 05:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kafala`
--

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE `analytics` (
  `interface` varchar(50) NOT NULL,
  `inc` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `analytics`
--

INSERT INTO `analytics` (`interface`, `inc`) VALUES
('shop', 58704);

-- --------------------------------------------------------

--
-- Table structure for table `analytics_graph`
--

CREATE TABLE `analytics_graph` (
  `month` varchar(15) NOT NULL,
  `sales` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `analytics_graph`
--

INSERT INTO `analytics_graph` (`month`, `sales`) VALUES
('sept-22', 23000),
('oct-22', 23000),
('nov-22', 23000),
('dec-22', 39000),
('jan-23', 42000),
('feb-22', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `number` int(15) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `gross_amount` double DEFAULT NULL,
  `confirm` binary(1) DEFAULT NULL,
  `confirmed_by` varchar(50) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` binary(1) DEFAULT NULL,
  `req` varchar(100) NOT NULL,
  `Payment` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `order_id`, `customer_name`, `number`, `location`, `gross_amount`, `confirm`, `confirmed_by`, `order_date`, `order_status`, `req`, `Payment`) VALUES
(1, 51, 'new', 12, 'new', 500, 0x31, '102', '2022-12-24 13:29:36', 0x00, 'DROP ORDER', ''),
(1, 53, '', 0, '', 1500, 0x31, '101', '2023-02-10 16:09:48', 0x00, 'DROP ORDER', 'COD'),
(1, 57, 'White-T shirt', 179452121, 'asdasf', 850, 0x00, '', '2023-02-10 11:10:20', 0x00, '', 'GATEW'),
(6, 58, '', 0, '', 2700, 0x00, '', '2023-02-15 04:47:33', 0x00, '', 'COD'),
(6, 59, 'mm', 179452121, 'Babor road', 1800, 0x00, '', '2023-02-15 04:48:15', 0x00, '', 'COD'),
(7, 60, 'ss', 179452121, '', 850, 0x00, '', '2023-02-24 03:45:52', 0x00, '', 'GATEW'),
(9, 61, 'Ahsan', 1795418826, 'Babor Road, 5-6b', 560, 0x00, '', '2023-03-17 10:30:44', 0x00, '', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `cus_login`
--

CREATE TABLE `cus_login` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `phone` int(13) DEFAULT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hash` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cus_login`
--

INSERT INTO `cus_login` (`id`, `name`, `pass`, `phone`, `reg_time`, `hash`) VALUES
(4, 'sifat', 'thankyou11&', 179452121, '2023-02-14 14:19:54', '$2y$10$A7kgxLYQukAj4Wx8xTJU4eI.FZJNliaFM.PpjLtDecfXHjjOXNlFi'),
(5, 'sifat', 'thankyou11&', 179452121, '2023-02-14 14:22:08', '$2y$10$sy36g5QduFvIr3YcitQYNO3wf4/IXGJF/h/4blFRWsTDKERpaSI/6'),
(6, 'miraz', '666', 179452121, '2023-04-12 15:09:25', '$2y$10$k700NJtM7n3ize5KcvkuJuXsCQ1mQ5dKIXL9cwXRIIevVULYOS1Qy'),
(7, 'ss', '666', 179452121, '2023-04-11 15:17:18', '$2y$10$9zJFb/YTBiRBStJRwsup6OZ1G32Fdg65tUhTRVBv7oLLb6hZd7ag2'),
(8, 'mm', '123', 179452121, '2023-02-18 16:29:11', '$2y$10$8SGWfLK3AtzoiCcQ928fQuW0mSCbpeDTlJa1xvzueqKSPHWd2gzBO'),
(9, 'Siam', '666', 179452121, '2023-03-17 18:57:02', '$2y$10$mODWR93DHbMS31nZ8k6iIOoY90IiVgTsiSoytoGz5UBIK/djwinGS'),
(10, 'New', 'as123', 342342, '2023-02-18 16:30:05', '$2y$10$IdGs3HqrbodGCY4i9bK4z.M2Z4km1UiIzpUyCOpBq4tEI5bnGW3F2');

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE `description` (
  `pid` int(11) DEFAULT NULL,
  `passage` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`pid`, `passage`) VALUES
(1012, 'Cotton T-shirt, for men. Winter Collection'),
(1015, 'Womens Shirt, Casual. Summer outfit'),
(1016, 'Winter Collection. Well Warm , made for men/women both'),
(1017, 'World cup edition. official Tracksuit. Argentina world cup'),
(1018, 'Official Edition, Spain track suit. world cup special by kafala'),
(1019, 'Red for women, Shirt Casual Clothing. Summer Edition'),
(1020, 'Eid arrival, Thin Cotton 100% Authentic. Special Edition men clothin '),
(1021, 'White T shirt for both men and wo-men, Unisex product, designed Efficiently');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(5) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pos` varchar(100) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `pos`, `phone`, `reg_time`) VALUES
(101, 'siam', 'admin', 0, '2022-12-24 12:51:48'),
(102, 'Rifat', 'Moderator', 1922468233, '2023-02-18 11:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `customer_id` int(11) DEFAULT NULL,
  `favourite` int(11) DEFAULT NULL,
  `added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`customer_id`, `favourite`, `added`) VALUES
(9, 1020, '2023-03-17 13:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` int(11) DEFAULT NULL,
  `words` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `words`) VALUES
(1021, 'White, T-shirt, Half Sleeve, Men, Summer, Generic'),
(1020, 'Panjabi, Brown, Traditional, Eid, men'),
(1019, 'Shirt, Ladies, Women, Red, Red Shirt, casual'),
(1018, 'Spain,Tracksuit,suit,track,jacket, worldcup,world cup,winter'),
(1017, 'Argentina, Tracksuit,World Cup,Winter,Football,Jacket'),
(1016, 'Leather, Jacket, Men ,Winter'),
(1012, 'Red, T-shirt, Tshirt,genji,Men, Summer,Half sleeve'),
(1015, 'Shirt, casual,Women, Green,Ladies,');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `pass` varchar(16) DEFAULT NULL,
  `hash` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `pass`, `hash`) VALUES
(101, 'admin', '$2y$10$1yjCUtVcdQJu02zHPvf0MOp7T8C.dDU5GIqvRP.E2JnMXr2F7p/82'),
(102, '', '$2y$10$mHqaEDDQUzeEqaMw.xmKHO.JuyANKNrS1E/LfBTge9HMB/uvK0EVa');

-- --------------------------------------------------------

--
-- Table structure for table `messenger`
--

CREATE TABLE `messenger` (
  `id` varchar(100) DEFAULT NULL,
  `conv_code` int(100) NOT NULL,
  `text` varchar(1000) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messenger`
--

INSERT INTO `messenger` (`id`, `conv_code`, `text`, `time`) VALUES
('admin', 10005, 'hello', '2023-04-06 19:21:35'),
('saiful', 10005, 'hi', '2023-04-06 19:21:44'),
('admin', 10005, 'ok', '2023-04-06 19:21:55'),
('miraz', 10005, 'asen ', '2023-04-06 20:56:26'),
('miraz', 10005, 'Hello!!! ', '2023-04-06 21:27:51'),
('miraz', 10005, 'Hello!!! ', '2023-04-06 21:28:02'),
('miraz', 10005, '111', '2023-04-06 21:28:18'),
('miraz', 10005, 'jjjj', '2023-04-06 21:28:25'),
('ss', 10006, 'Hi', '2023-04-11 14:43:36'),
('admin', 10006, 'Yes', '2023-04-11 14:43:44'),
('ss', 10006, 'How ar eyou', '2023-04-11 14:43:50'),
('admin', 10006, 'I am fine', '2023-04-11 14:43:58'),
('ss', 10006, 'Delivery?', '2023-04-12 09:16:49'),
('admin', 10006, 'Ok', '2023-04-12 09:17:16'),
('admin', 10005, '', '2023-04-12 09:31:50'),
('admin', 10005, 'Are you still there?', '2023-04-12 10:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `not_id` int(11) NOT NULL,
  `notification_title` varchar(100) DEFAULT NULL,
  `notification` varchar(1000) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`not_id`, `notification_title`, `notification`, `time`) VALUES
(4, 'PRODUCT INFO : ', 'PRODUCT  : REGISTRATION SUCCESSFULL , Take more Actions', '2022-12-26 10:48:01'),
(5, '104 JOINNED KAFALA', 'New Member 104 successfully registered,change id and pass from portal ', '2022-12-26 05:52:26'),
(6, ' [1011] Product REG', 'PRODUCT [1011] : REGISTRATION SUCCESSFULL , Upload Photos', '2022-12-26 05:57:18'),
(7, ' [1011] Product REG', 'PRODUCT [1011] : UPLOADED SUCCESSFULLY ', '2022-12-26 05:57:35'),
(8, '105 JOINNED KAFALA', 'New Member 105 successfully registered,change id and pass from portal ', '2022-12-26 06:02:03'),
(9, ' [1012] Product REG', 'PRODUCT [1012] : REGISTRATION SUCCESSFULL , Upload Photos', '2022-12-27 16:11:48'),
(10, ' [1012] Product REG', 'PRODUCT [1012] : UPLOADED SUCCESSFULLY ', '2022-12-27 16:12:04'),
(11, ' [1015] Product REG', 'PRODUCT [1015] : REGISTRATION SUCCESSFULL , Upload Photos', '2022-12-27 16:14:25'),
(12, ' [1015] Product REG', 'PRODUCT [1015] : UPLOADED SUCCESSFULLY ', '2022-12-27 16:14:40'),
(13, '106 JOINNED KAFALA', 'New Member 106 successfully registered,change id and pass from portal ', '2022-12-27 17:20:59'),
(14, 'NEW ORDER[Update]', 'TAKE ACTIONS', '2022-12-30 20:38:32'),
(15, ' [1016] Product REG', 'PRODUCT [1016] : REGISTRATION SUCCESSFULL , Upload Photos', '2022-12-31 08:58:30'),
(16, ' [1016] Product REG', 'PRODUCT [1016] : UPLOADED SUCCESSFULLY ', '2022-12-31 08:59:08'),
(17, ' [1017] Product REG', 'PRODUCT [1017] : REGISTRATION SUCCESSFULL , Upload Photos', '2022-12-31 09:00:37'),
(18, ' [1017] Product REG', 'PRODUCT [1017] : UPLOADED SUCCESSFULLY ', '2022-12-31 09:00:45'),
(19, ' [1018] Product REG', 'PRODUCT [1018] : REGISTRATION SUCCESSFULL , Upload Photos', '2022-12-31 09:01:48'),
(20, ' [1018] Product REG', 'PRODUCT [1018] : UPLOADED SUCCESSFULLY ', '2022-12-31 09:01:58'),
(21, ' [1019] Product REG', 'PRODUCT [1019] : REGISTRATION SUCCESSFULL , Upload Photos', '2022-12-31 09:03:58'),
(22, ' [1019] Product REG', 'PRODUCT [1019] : UPLOADED SUCCESSFULLY ', '2022-12-31 09:04:05'),
(23, ' [1020] Product REG', 'PRODUCT [1020] : REGISTRATION SUCCESSFULL , Upload Photos', '2022-12-31 09:05:17'),
(24, ' [1020] Product REG', 'PRODUCT [1020] : UPLOADED SUCCESSFULLY ', '2022-12-31 09:05:23'),
(25, ' [1021] Product REG', 'PRODUCT [1021] : REGISTRATION SUCCESSFULL , Upload Photos', '2022-12-31 09:08:02'),
(26, ' [1021] Product REG', 'PRODUCT [1021] : UPLOADED SUCCESSFULLY ', '2022-12-31 09:08:07'),
(27, 'NEW ORDER[Update]', 'TAKE ACTIONS', '2022-12-31 09:36:38'),
(28, 'NEW ORDER[Update]', 'TAKE ACTIONS', '2022-12-31 09:37:35'),
(29, 'NEW ORDER[Update]', 'TAKE ACTIONS', '2023-02-10 11:10:20'),
(30, '102 JOINNED KAFALA', 'New Member 102 successfully registered,change id and pass from portal ', '2023-02-14 00:44:10'),
(31, '102 JOINNED KAFALA', 'New Member 102 successfully registered,change id and pass from portal ', '2023-02-14 00:47:31'),
(32, '103 JOINNED KAFALA', 'New Member 103 successfully registered,change id and pass from portal ', '2023-02-14 00:48:52'),
(33, '102 JOINNED KAFALA', 'New Member 102 successfully registered,change id and pass from portal ', '2023-02-14 00:49:39'),
(34, '103 JOINNED KAFALA', 'New Member 103 successfully registered,change id and pass from portal ', '2023-02-14 00:50:30'),
(35, '102 JOINNED KAFALA', 'New Member 102 successfully registered,change id and pass from portal ', '2023-02-14 00:50:49'),
(36, '102 JOINNED KAFALA', 'New Member 102 successfully registered,change id and pass from portal ', '2023-02-14 04:02:59'),
(37, '103 JOINNED KAFALA', 'New Member 103 successfully registered,change id and pass from portal ', '2023-02-14 04:03:32'),
(38, '104 JOINNED KAFALA', 'New Member 104 successfully registered,change id and pass from portal ', '2023-02-14 04:04:24'),
(39, '105 JOINNED KAFALA', 'New Member 105 successfully registered,change id and pass from portal ', '2023-02-14 04:10:55'),
(40, '102 JOINNED KAFALA', 'New Member 102 successfully registered,change id and pass from portal ', '2023-02-14 04:12:06'),
(41, '103 JOINNED KAFALA', 'New Member 103 successfully registered,change id and pass from portal ', '2023-02-14 04:14:09'),
(42, '104 JOINNED KAFALA', 'New Member 104 successfully registered,change id and pass from portal ', '2023-02-14 04:16:37'),
(43, '105 JOINNED KAFALA', 'New Member 105 successfully registered,change id and pass from portal ', '2023-02-14 04:17:53'),
(44, '106 JOINNED KAFALA', 'New Member 106 successfully registered,change id and pass from portal ', '2023-02-14 04:18:45'),
(45, '107 JOINNED KAFALA', 'New Member 107 successfully registered,change id and pass from portal ', '2023-02-14 04:18:54'),
(46, '102 JOINNED KAFALA', 'New Member 102 successfully registered,change id and pass from portal ', '2023-02-14 04:20:12'),
(47, '103 JOINNED KAFALA', 'New Member 103 successfully registered,change id and pass from portal ', '2023-02-14 04:21:02'),
(48, '104 JOINNED KAFALA', 'New Member 104 successfully registered,change id and pass from portal ', '2023-02-14 04:22:28'),
(49, '105 JOINNED KAFALA', 'New Member 105 successfully registered,change id and pass from portal ', '2023-02-14 04:23:10'),
(50, '106 JOINNED KAFALA', 'New Member 106 successfully registered,change id and pass from portal ', '2023-02-14 04:23:28'),
(51, '107 JOINNED KAFALA', 'New Member 107 successfully registered,change id and pass from portal ', '2023-02-14 04:24:36'),
(52, '108 JOINNED KAFALA', 'New Member 108 successfully registered,change id and pass from portal ', '2023-02-14 04:28:14'),
(53, '109 JOINNED KAFALA', 'New Member 109 successfully registered,change id and pass from portal ', '2023-02-14 04:29:28'),
(54, '102 JOINNED KAFALA', 'New Member 102 successfully registered,change id and pass from portal ', '2023-02-14 04:31:49'),
(55, '103 JOINNED KAFALA', 'New Member 103 successfully registered,change id and pass from portal ', '2023-02-14 04:32:47'),
(56, '102 JOINNED KAFALA', 'New Member 102 successfully registered,change id and pass from portal ', '2023-02-14 13:29:31'),
(57, '103 JOINNED KAFALA', 'New Member 103 successfully registered,change id and pass from portal ', '2023-02-14 13:39:31'),
(58, '104 JOINNED KAFALA', 'New Member 104 successfully registered,change id and pass from portal ', '2023-02-14 13:42:04'),
(59, '105 JOINNED KAFALA', 'New Member 105 successfully registered,change id and pass from portal ', '2023-02-14 13:43:01'),
(60, '102 JOINNED KAFALA', 'New Member 102 successfully registered,change id and pass from portal ', '2023-02-14 14:02:53'),
(61, ' [1022] Product REG', 'PRODUCT [1022] : REGISTRATION SUCCESSFULL , Upload Photos', '2023-02-15 04:29:51'),
(62, 'NEW ORDER[Update]', 'TAKE ACTIONS', '2023-02-15 04:47:33'),
(63, 'NEW ORDER[Update]', 'TAKE ACTIONS', '2023-02-15 04:48:15'),
(64, '103 JOINNED KAFALA', 'New Member 103 successfully registered,change id and pass from portal ', '2023-02-17 10:26:20'),
(65, '104 JOINNED KAFALA', 'New Member 104 successfully registered,change id and pass from portal ', '2023-02-17 10:28:53'),
(66, '105 JOINNED KAFALA', 'New Member 105 successfully registered,change id and pass from portal ', '2023-02-17 10:38:32'),
(67, '106 JOINNED KAFALA', 'New Member 106 successfully registered,change id and pass from portal ', '2023-02-17 10:38:59'),
(68, '102 JOINNED KAFALA', 'New Member 102 successfully registered,change id and pass from portal ', '2023-02-17 10:42:16'),
(69, '103 JOINNED KAFALA', 'New Member 103 successfully registered,change id and pass from portal ', '2023-02-17 10:56:53'),
(70, '104 JOINNED KAFALA', 'New Member 104 successfully registered,change id and pass from portal ', '2023-02-17 11:21:30'),
(71, '104 JOINNED KAFALA', 'New Member 104 successfully registered,change id and pass from portal ', '2023-02-17 11:22:37'),
(72, '105 JOINNED KAFALA', 'New Member 105 successfully registered,change id and pass from portal ', '2023-02-17 13:18:41'),
(73, '107 JOINNED KAFALA', 'New Member 107 successfully registered,change id and pass from portal ', '2023-02-17 13:23:07'),
(74, '108 JOINNED KAFALA', 'New Member 108 successfully registered,change id and pass from portal ', '2023-02-17 13:24:21'),
(75, '102 JOINNED KAFALA', 'New Member 102 successfully registered,change id and pass from portal ', '2023-02-18 11:33:26'),
(76, 'NEW ORDER[Update]', 'TAKE ACTIONS', '2023-02-24 03:45:52'),
(77, 'NEW ORDER[Update]', 'TAKE ACTIONS', '2023-03-17 10:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `pid`, `price`) VALUES
(0, 1002, 500),
(51, 1002, 500),
(53, 1012, 1500),
(53, 1019, 400),
(53, 1020, 2300),
(59, 1017, 1800),
(61, 1015, 560);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `pid` int(11) DEFAULT NULL,
  `photo_id` varchar(100) DEFAULT NULL,
  `photo_url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`pid`, `photo_id`, `photo_url`) VALUES
(1012, '1012_1.jpg', 'products/1012_1.jpg'),
(1015, '1015_1.jpg', 'products/1015_1.jpg'),
(1016, '1016_1.jpg', 'products/1016_1.jpg'),
(1017, '1017_1.jpg', 'products/1017_1.jpg'),
(1018, '1018_1.jpg', 'products/1018_1.jpg'),
(1019, '1019_1.jpg', 'products/1019_1.jpg'),
(1020, '1020_1.jpg', 'products/1020_1.jpg'),
(1021, '1021_1.jpg', 'products/1021_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(60) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo_url` varchar(100) NOT NULL,
  `visibility` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `customer_id`, `time`, `photo_url`, `visibility`) VALUES
(1, 'What is so unique about NOBORUPA', 5, '2023-03-15 17:37:07', 'post/1.jpg', 0),
(2, 'Authenticity of AARONG', 9, '2023-03-15 17:38:58', 'post/2.jpg', 0),
(3, 'FIT ELEGANCE on top', 6, '2023-03-15 19:36:35', 'post/3.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts2`
--

CREATE TABLE `posts2` (
  `post_id` int(11) DEFAULT NULL,
  `paragraph` varchar(15000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts2`
--

INSERT INTO `posts2` (`post_id`, `paragraph`) VALUES
(1, 'Duty and Standard of Care Concepts\r\nIntroduction The legal framework of business is the structure by which commercial decision is made. Basic knowledge is that legal issues are important in forming a solid foundation for the study of business (Pentony, 2011). There are different aspects of business law, they include the law of agency contract law,...\r\n\r\nTopic: Law\r\nWords: 3007 Pages: 11\r\nCreativity and Problem-Solving in Education & Economics\r\nAldous, C.R. (2005) ‘Creativity in problem solving: uncovering the origin of new ideas,’ International Education Journal, 5(5), pp.43-56. This article is based on a study involving a protocol analysis in which five expert problem-solvers were investigated, and different contexts were used to assess how they solved problems. Three secondary school...\r\n\r\nTopic: Sociology\r\nWords: 3007 Pages: 16\r\nConstruction Management: Organizations, Cash Flow & Controls on Site\r\nTypes of organizations Organizations are formed based on certain factors such as ease of formation, ability to raise capital, taxation, control of the business, and distribution of liability. Construction businesses are formed in different types of organizations. They can be a proprietorship, partnership, or corporations. Joint ventures When a project...\r\n\r\nTopic: Construction\r\nWords: 3009 Pages: 12\r\nJono Limited: Implementation of an Information Technology System\r\nExecutive Summary Jono Limited is a medium-sized firm that handles the manufacture and export of meat to the Middle East. Owing to the fact that the company has been recently increasing its business base, it is faced with a crisis in handling the various levels of paperwork that are required...\r\n\r\nTopic: Tech & Engineering\r\nWords: 3009 Pages: 9\r\nThe Problem of Residential Environment in America\r\nThe issue of housing is important for every human being. People tend to critically evaluate the environment they live in. It usually begins with discussing the ecological situation till the details of interior accessories. The main aim for this urge is to maintain more or less comfortable conditions for living...\r\n\r\nTopic: Design\r\nWords: 3009 Pages: 10\r\nOperations Management and Production System: Case of Olive Garden Restaurant\r\nAbstract The presented paper is devoted to the discussion of operations management and production system. The given field of knowledge delves into the peculiarities of organizations’ functioning with the primary goal to outline problematic areas and offer positive changes to align the sufficient work. At the same time, as a...\r\n\r\nTopic: Operations Management\r\nWords: 3009 Pages: 11\r\nPopular Research Paper Topics\r\nConstruction\r\nGlobalization\r\nOperations Management\r\nFamily\r\nCinema\r\nHealthcare\r\nNike Company: Marketing Principles and Concepts\r\nThis sample paper focuses on the marketing concept of Nike. Here, you’ll find Nike’s marketing principles and concepts, branding, organisational culture, and other information that might be useful for your essay writing. Nike is an American multinational corporation, which was founded in 1964 as Blue Ribbon Sports, and later changed...\r\n\r\nTopic: Nike\r\nWords: 3011 Pages: 11\r\nPontiac’s Rebellion and Its History\r\nIntroduction The Pontiac’s Rebellion is an uprising of Native American Indians who were unsatisfied with British colonial politics. The participants were several tribes who lived in the territories in the Great Lakes region and the modern states of Illinois and Ohio, which were controlled by the French before the Seven...\r\n\r\nTopic: History\r\nWords: 3011 Pages: 11\r\nThe Interrelationship Between Fashion and Architecture\r\nThis work is concerned with the interrelationship between fashion and architecture. By starting with a description of the fashion system, the work focuses on answering the three criteria set questions, namely, how fashion and architecture interrelate, how architecture can be explained to exploit the fashion system and to what extent...\r\n\r\nTopic: Fashion\r\nWords: 3012 Pages: 10\r\n“The Circus” Film: Cognition and Neuroscience\r\nThe Circus Introduction The concluding scene that belongs to the realistic genre will be framed in color 35 mm format (Super 35) having an aspect ratio of 1: 2.35 to reduce grain. The film stock selected is Kodak Vision-3; 500T. This arrangement will certainly enable the cinematographer to capture superior...\r\n\r\nTopic: Cinema\r\nWords: 3012 Pages: 7\r\nJohnnie Walker’s vs. Jack Daniels’ Websites\r\nExecutive Summary The major focus of this report is finding viable and effective marketing strategies for the client website to implement for the purpose of powering their business and strengthening its market presence. The aforementioned strategies are identified with the help of detailed and thorough analysis of the website of...'),
(2, 'A highly valued product. '),
(3, 'Turn heads at the next outing with this comfortable and incredibly versatile modern chocolate check readymade suit. Turn heads at the next outing with this comfortable and incredibly versatile modern chocolate check readymade suit. Turn heads at the next outing with this comfortable and incredibly versatile modern chocolate check readymade suit. Turn heads at the next outing with this comfortable and incredibly versatile modern chocolate check readymade suit.'),
(4, 'My Name is Siam My name is siam');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `price` int(7) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `rating` double DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `priority` int(11) NOT NULL,
  `up_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prod_name` varchar(100) NOT NULL,
  `sale` int(10) NOT NULL,
  `class` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `price`, `stock`, `rating`, `gender`, `type`, `category`, `priority`, `up_time`, `prod_name`, `sale`, `class`) VALUES
(1012, 1500, 0, 0, 'Male', 'Casual', 'T-shirt', 0, '2023-03-14 21:08:37', 'T shirt ', 0, 'A'),
(1015, 560, 0, 0, 'Femal', 'Generic', 'Shirt', 0, '2023-03-17 15:30:44', 'Shirt', 1, 'B'),
(1016, 3000, 0, 0, 'Male', 'Generic', 'Jacket', 0, '2023-03-14 20:38:30', 'Leather Jacket', 0, 'A'),
(1017, 1800, 0, 0, 'Male', 'casual', 'Winter', 0, '2023-02-15 09:48:15', 'Argentina Track Suit', 1, '0'),
(1018, 1870, 0, 0, 'Male', 'casual', 'Track Suit', 0, '2023-03-14 21:08:28', 'Spain Official Tracksuit', 0, 'A'),
(1019, 400, 0, 0, 'Femal', 'casual', 'T-Shirt', 0, '2023-02-15 09:47:33', 'Shirt', 1, '0'),
(1020, 2300, 0, 0, 'male', 'Casual', 'Pants', 0, '2023-03-14 21:29:41', 'Panjabi', 1, 'B'),
(1021, 850, 0, 0, 'Male', 'Generic', 'T-shirt', 0, '2022-12-31 09:08:02', 'White-T shirt', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `pid` int(11) DEFAULT NULL,
  `size` varchar(5) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`pid`, `size`, `color`, `stock`) VALUES
(0, '', '', 0),
(666, '', '', 0),
(1012, 'M', 'Blue', 10),
(1012, 'L', 'Red', 20),
(1015, 'M', 'Red', 34),
(1015, 'S', 'Orange', 22),
(1016, 's', 'blue', 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `cus_login`
--
ALTER TABLE `cus_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `cus_login`
--
ALTER TABLE `cus_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
