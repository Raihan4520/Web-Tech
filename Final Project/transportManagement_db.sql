-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2021 at 06:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transportManagement_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `b_id` int(10) NOT NULL,
  `b_name` varchar(40) NOT NULL,
  `b_location` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`b_id`, `b_name`, `b_location`) VALUES
(1, 'Greenline', 'Sylet'),
(2, 'Shyamoli', 'khulna');

-- --------------------------------------------------------

--
-- Table structure for table `bus_manager`
--

CREATE TABLE `bus_manager` (
  `bm_id` int(10) NOT NULL,
  `bm_email` varchar(40) NOT NULL,
  `bm_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_manager`
--

INSERT INTO `bus_manager` (`bm_id`, `bm_email`, `bm_password`) VALUES
(1, 'sup@gmail.com', 'Sup123');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(10) NOT NULL,
  `c_name` varchar(40) NOT NULL,
  `c_email` varchar(40) NOT NULL,
  `c_phoneNumber` varchar(40) NOT NULL,
  `c_gender` varchar(20) NOT NULL,
  `c_dob` date NOT NULL,
  `c_password` varchar(40) NOT NULL,
  `c_profilePicture` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pa_id` int(10) NOT NULL,
  `pa_amount` varchar(40) NOT NULL,
  `pa_by` varchar(40) NOT NULL,
  `pa_date` date NOT NULL,
  `pa_transportType` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `plane`
--

CREATE TABLE `plane` (
  `p_id` int(10) NOT NULL,
  `p_name` varchar(40) NOT NULL,
  `p_location` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `plane_manager`
--

CREATE TABLE `plane_manager` (
  `pm_id` int(10) NOT NULL,
  `pm_email` varchar(40) NOT NULL,
  `pm_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(10) NOT NULL,
  `location_to` varchar(40) NOT NULL,
  `location_from` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `price` varchar(40) NOT NULL,
  `transportType` varchar(40) NOT NULL,
  `bookedBy` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `location_to`, `location_from`, `date`, `time`, `price`, `transportType`, `bookedBy`) VALUES
(1, 'Chittagong', 'Sylet', '2021-12-18', '22:30:00', '3000', 'Bus', ''),
(2, 'khulna', 'Dhaka', '2021-12-25', '09:00:00', '3500', 'Bus', '');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `t_id` int(10) NOT NULL,
  `t_name` varchar(40) NOT NULL,
  `t_location` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `train_manager`
--

CREATE TABLE `train_manager` (
  `tm_id` int(10) NOT NULL,
  `tm_email` varchar(40) NOT NULL,
  `tm_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `bus_manager`
--
ALTER TABLE `bus_manager`
  ADD PRIMARY KEY (`bm_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pa_id`);

--
-- Indexes for table `plane`
--
ALTER TABLE `plane`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `plane_manager`
--
ALTER TABLE `plane_manager`
  ADD PRIMARY KEY (`pm_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `train_manager`
--
ALTER TABLE `train_manager`
  ADD PRIMARY KEY (`tm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bus_manager`
--
ALTER TABLE `bus_manager`
  MODIFY `bm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pa_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plane`
--
ALTER TABLE `plane`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plane_manager`
--
ALTER TABLE `plane_manager`
  MODIFY `pm_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `t_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `train_manager`
--
ALTER TABLE `train_manager`
  MODIFY `tm_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
