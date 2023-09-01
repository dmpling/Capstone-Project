-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 04:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` varchar(500) NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `employee_id` varchar(500) NOT NULL,
  `position` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `firstname`, `lastname`, `username`, `email`, `password`, `employee_id`, `position`) VALUES
('Admin', 'Admin', 'Admin', 'Admin', 'altshifting@gmail.com', '$2y$10$bGyOeFGLnAuOHWUUBq/SxObM6J2Ec4MJexxkE7LQGFFw2lhS1WOEa', 'Admin-01', 'Admin');


-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(200) NOT NULL,
  `ref_no` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `contact` varchar(500) NOT NULL,
  `type_docu` varchar(500) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `name_stud` varchar(500) NOT NULL,
  `date` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment`
--
CREATE TABLE `reports` (
  `report_id` int(200) NOT NULL,
  `ref_no` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `contact` varchar(500) NOT NULL,
  `type_docu` varchar(500) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `name_stud` varchar(500) NOT NULL,
  `appointment_date` varchar(500) NOT NULL,
  `received_date` varchar(500) DEFAULT NULL,
  `appointment_id` int(200) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `store_id` int(200) NOT NULL,
  `filename` varchar(1000) NOT NULL,
  `file_description` varchar(1000) NOT NULL,
  `file_type` varchar(1000) NOT NULL,
  `date_uploaded` varchar(1000) NOT NULL,
  `who_uploaded` varchar(1000) NOT NULL,
  `stud_id` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `storage`
--



-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` varchar(500) NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `middlename` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `batch` varchar(500) NOT NULL,
  `yr_sec` varchar(500) NOT NULL,
  `advisor` varchar(500) NOT NULL,
  `admin_id` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- 
--

CREATE TABLE `password_reset` (
  `reset_id` int(200) NOT NULL,
  `admin_id` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `verification_code` varchar(500) NOT NULL,
  `expiration_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `stud_id` (`stud_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`),
  ADD KEY `admin_id` (`admin_id`);

--
ALTER TABLE `reports`
ADD PRIMARY KEY (`report_id`),
ADD KEY `appointment_id` (`appointment_id`);
-- AUTO_INCREMENT for dumped tables

--
ALTER TABLE `password_reset`
ADD PRIMARY KEY (`reset_id`),
ADD KEY `admin_id` (`admin_id`),
ADD KEY `verification_code` (`verification_code`);

--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `store_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `reports`
  MODIFY `report_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
ALTER TABLE `password_reset`
  MODIFY `reset_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- Constraints for dumped tables
--

--
-- Constraints for table `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `storage_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `student` (`stud_id`);

ALTER TABLE `reports`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointment` (`appointment_id`);

  ALTER TABLE `password_reset`
  ADD CONSTRAINT `reset_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`);
--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
