-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 09:35 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roombooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `rooms_tbl`
--

CREATE TABLE `rooms_tbl` (
  `room_number` int(11) NOT NULL,
  `room_image` blob NOT NULL,
  `room_type` varchar(30) NOT NULL,
  `capacity` int(10) NOT NULL,
  `price` int(20) NOT NULL,
  `room_status` varchar(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms_tbl`
--

INSERT INTO `rooms_tbl` (`room_number`, `room_image`, `room_type`, `capacity`, `price`, `room_status`) VALUES
(101, 0x726f6f6d332e6a7067, 'Family Room', 3, 1300, 'Vacant'),
(102, 0x67616c6c657279312e6a7067, 'Couple Room', 2, 1600, 'Vacant'),
(103, 0x726f6f6d332e6a7067, 'Deluxe Room', 2, 2500, 'Vacant');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `username`, `email`, `phone`, `password`) VALUES
(13, 'Binod', 'baraibinod76@gmail.com', '9803333000', 'qfZDKIhxSbgBL2NKEp/AxA==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rooms_tbl`
--
ALTER TABLE `rooms_tbl`
  ADD PRIMARY KEY (`room_number`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rooms_tbl`
--
ALTER TABLE `rooms_tbl`
  MODIFY `room_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
