-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 08:51 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trippens`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(2) NOT NULL,
  `customer_name` varchar(250) DEFAULT NULL,
  `customer_address` varchar(250) DEFAULT NULL,
  `customer_phone` varchar(250) DEFAULT NULL,
  `customer_whatsapp` varchar(250) DEFAULT NULL,
  `customer_location` varchar(500) DEFAULT NULL,
  `customer_vehicle` varchar(250) DEFAULT NULL,
  `customer_count` int(2) DEFAULT NULL,
  `vehicle_type` varchar(250) DEFAULT NULL,
  `customer_type` varchar(1) DEFAULT NULL,
  `customer_category_id` int(11) DEFAULT NULL,
  `tour_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_address`, `customer_phone`, `customer_whatsapp`, `customer_location`, `customer_vehicle`, `customer_count`, `vehicle_type`, `customer_type`, `customer_category_id`, `tour_id`) VALUES
(1, 'Rayan', 'Nilambur', '7736656121', '', '', '', 1, '1', '1', 6, 1),
(2, 'Athiq', 'Nill', '95671551152', '', '', '', 1, '2', '2', 2, 1),
(3, 'Nishanth', 'Kannur', '9605759257', '', '', '', 1, '2', '2', 1, 1),
(4, 'Shinas tt', 'Malappuram', '7736656121', '', '', '', 1, '2', '2', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_category`
--

CREATE TABLE `customer_category` (
  `customer_category_id` int(11) NOT NULL,
  `customer_code` varchar(250) NOT NULL,
  `customer_category` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_category`
--

INSERT INTO `customer_category` (`customer_category_id`, `customer_code`, `customer_category`) VALUES
(1, '0', 'NIL'),
(2, 'A', 'Enquiry'),
(3, 'B', 'Customer'),
(4, 'C', 'Active'),
(5, 'D', 'Secure'),
(6, 'E', 'Privilege'),
(7, 'F', 'UPCOMING'),
(8, 'G', 'FOREIGNERS');

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `response` text NOT NULL,
  `reply` text NOT NULL,
  `staff` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`id`, `customer_id`, `date`, `response`, `reply`, `staff`) VALUES
(3086, 2, '2022-07-06', '  CALL ATTEND CHEYTHU.BUT CUSTOMER PARAYUNNATH ONNUM CLEAR AAYILLA.CUT CHEYTHU', '  ', 'BIJEESH'),
(3087, 2, '2022-06-21', '  MONEY ISSUES', '  Canceled', ''),
(3088, 2, '2022-06-29', '  HE IS NOT HERE', '  ', 'SHYBI'),
(3089, 1, '2021-05-07', ' hhhh', ' kkkklk', '5533'),
(3090, 1, '2021-05-07', ' 44', ' yes', '44'),
(3091, 1, '2022-06-21', ' 22', ' 33', '11'),
(3092, 1, '2022-06-21', ' CAME TO OFFICE', ' Willing to come, 5000 deposited', ''),
(3093, 1, '2022-06-21', ' 33', ' 333', '33'),
(3094, 1, '2022-06-21', ' ok', ' call back', 'athul'),
(3095, 4, '2021-06-29', '   NOT INTERESTED', '   ', 'SHYBI'),
(3096, 4, '2021-07-06', '   INTERESTED AANU.CONFIRM CHEYTHITT ARIYIKKAAM ENNAANU PARANJATH.NEED TO CALL ON THURSDAY (JULY 8TH)', '   ', 'BIJEESH'),
(3097, 3, '2021-07-08', '   UNAVAILABLE ', '    ', 'SHYBI'),
(3098, 3, '2021-06-29', '     SWITCHED OFF', '     ', 'SHYBI'),
(3099, 3, '2028-06-21', '     MONEY ISSUES', '     Canceled', ''),
(3100, 3, '2021-07-06', '     CALL NOT ATTENDING', '     ', 'BIJEESH'),
(3101, 3, '2021-07-09', '  UNAVAILABLE ', '   ', 'SHYBI');

-- --------------------------------------------------------

--
-- Table structure for table `tour_type`
--

CREATE TABLE `tour_type` (
  `tour_id` int(11) NOT NULL,
  `tour_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour_type`
--

INSERT INTO `tour_type` (`tour_id`, `tour_type`) VALUES
(1, 'NIL'),
(2, 'K2ks310'),
(3, 'K2ks311'),
(4, 'CNR01'),
(5, 'CNR11'),
(6, 'CNR12'),
(7, 'ITM11'),
(8, 'ITM12'),
(9, 'ITM13'),
(10, 'ITM14'),
(11, 'SAE10'),
(12, 'SAE11'),
(13, 'SAE13'),
(14, 'DAE11'),
(15, 'DAE12'),
(16, 'DAD13'),
(17, 'K2ks39'),
(18, 'RD10D'),
(19, 'RBD5R');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `status`) VALUES
(1, 'admin2', '$2y$10$N5pgXy2DtqvPrFxfTedLiecm96ZGZCkWlAWExHi2qJyGKqfqMVfL.', '2020-06-12 00:00:00', 0),
(2, 'staff', '$2y$10$ZXB86FEoLfe.UD.Nf9GvquRksfa4zOqZDW41KF3oUYLIbQqu47eSq', '2020-06-12 00:00:00', 0),
(3, 'estimation', '$2y$10$ZXB86FEoLfe.UD.Nf9GvquRksfa4zOqZDW41KF3oUYLIbQqu47eSq', '2020-06-10 00:00:00', 0),
(4, 'invoice', '$2y$10$ZXB86FEoLfe.UD.Nf9GvquRksfa4zOqZDW41KF3oUYLIbQqu47eSq', '2020-06-10 00:00:00', 0),
(5, 'admin', '$2y$10$rKjNefPxetSgJmwfs2D23uyfWOA5uh1fQGmmPnpWeOT8RIGVtOgcu', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_category`
--
ALTER TABLE `customer_category`
  ADD PRIMARY KEY (`customer_category_id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_type`
--
ALTER TABLE `tour_type`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=753;

--
-- AUTO_INCREMENT for table `customer_category`
--
ALTER TABLE `customer_category`
  MODIFY `customer_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3102;

--
-- AUTO_INCREMENT for table `tour_type`
--
ALTER TABLE `tour_type`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
