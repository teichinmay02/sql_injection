-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 04:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql_injection`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

CREATE TABLE `emp_details` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `hire_date` date NOT NULL,
  `job_id` varchar(20) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `commission_pct` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_details`
--

INSERT INTO `emp_details` (`employee_id`, `first_name`, `last_name`, `email`, `phone_number`, `hire_date`, `job_id`, `salary`, `commission_pct`) VALUES
(104, 'Michael', 'Lee', 'michael.lee@example.com', '+1472583690', '2023-07-20', 'JR_DEV', 52000.00, 0.04),
(105, 'Sarah', 'Nguyen', 'sarah.nguyen@example.com', '+9638527410', '2023-07-25', 'SR_DEV', 68000.00, 0.06),
(106, 'David', 'Garcia', 'david.garcia@example.com', '+8529637410', '2023-07-28', 'JR_DEV', 51000.00, 0.04),
(107, 'Linda', 'Chen', 'linda.chen@example.com', '+7418529630', '2023-07-30', 'SR_DEV', 70000.00, 0.08),
(108, 'Daniel', 'Kim', 'daniel.kim@example.com', '+3698521470', '2023-08-01', 'JR_DEV', 50000.00, 0.05),
(109, 'Laura', 'Martinez', 'laura.martinez@example.com', '+2581473690', '2023-08-05', 'SR_DEV', 71000.00, 0.07);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(3, 'user@email.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2023-07-22 12:47:03'),
(4, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '2023-07-22 23:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `userid` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dtob` date NOT NULL,
  `country` varchar(100) NOT NULL,
  `user_rating` decimal(3,2) NOT NULL,
  `emailid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`userid`, `password`, `fname`, `lname`, `gender`, `dtob`, `country`, `user_rating`, `emailid`) VALUES
('john', 'admin', 'John', 'Doe', 'Male', '1990-07-23', 'United States', 4.50, 'john.doe@example.com'),
('jane.smith', 'admin', 'Jane', 'Smith', 'Female', '1992-05-15', 'Canada', 4.30, 'jane.smith@example.com'),
('alex.wong', 'admin', 'Alex', 'Wong', 'Male', '1988-11-30', 'Singapore', 3.80, 'alex.wong@example.com'),
('emily.johnson', 'admin', 'Emily', 'Johnson', 'Female', '1995-03-10', 'United Kingdom', 4.10, 'emily.johnson@example.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_details`
--
ALTER TABLE `emp_details`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
