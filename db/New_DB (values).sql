-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 08:45 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `firstname`, `lastname`, `username`, `email`, `password`, `employee_id`, `position`) VALUES
('Admin', 'Admin', 'Admin', 'Admin', 'altshifting@gmail.com', '$2y$10$bGyOeFGLnAuOHWUUBq/SxObM6J2Ec4MJexxkE7LQGFFw2lhS1WOEa', 'Admin-01', 'Admin'),
('Admin - 01', 'John Doe', 'Segoe', 'John Doe', 'johndoe@gmail.com', '$2y$10$W0swmaUZVPYLcxbqrAlluOJCUin7SCldk8QzS/a32b8TzjVQrjcsO', 'EMP1001', 'Registrar'),
('Admin - 02', 'Emily', 'Reynolds', 'Emily', 'emily.reynolds@gmail.com', '$2y$10$JQH3/Tai/12G4LIUvZiQFOoTKQwvLFVrC9kFTQNfX2LVNRGndJrGS', 'PR3567', 'Admin'),
('Registrar - 01', 'Alexander', 'Pierce', 'Alex', 'alexander.pierce@gmail.com', '$2y$10$wnqGWIvMHHchpalgLW4c4.Mwm4lQwTJe91OxqAykBPJht5wWoz7y6', 'ID2023', 'Registrar');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `reset_id` int(200) NOT NULL,
  `admin_id` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `verification_code` varchar(500) NOT NULL,
  `expiration_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`store_id`, `filename`, `file_description`, `file_type`, `date_uploaded`, `who_uploaded`, `stud_id`) VALUES
(1, '2341646.jpg', 'Sample', 'image/jpeg', '2023-07-07, 03:14 PM', 'Admin', 'STU001'),
(2, '2341646.jpg', 'Sample', 'image/jpeg', '2023-07-07, 03:14 PM', 'Admin', 'STU102'),
(3, '2341646.jpg', 'Sample', 'image/jpeg', '2023-07-07, 03:14 PM', 'Admin', 'STU203'),
(4, '2341646.jpg', 'Sample', 'image/jpeg', '2023-07-07, 03:15 PM', 'Admin', 'STU304'),
(5, '2341646.jpg', 'Sample', 'image/jpeg', '2023-07-07, 03:15 PM', 'Admin', 'STU405'),
(6, '2341646.jpg', 'Sample', 'image/jpeg', '2023-07-07, 03:15 PM', 'Admin', 'STU506'),
(7, '2341646.jpg', 'Sample', 'image/jpeg', '2023-07-07, 03:18 PM', 'Admin', 'STU607'),
(8, '2341646.jpg', 'Sample', 'image/jpeg', '2023-07-07, 03:18 PM', 'Admin', 'STU708'),
(9, '2341646.jpg', 'Sample', 'image/jpeg', '2023-07-07, 03:18 PM', 'Admin', 'STU809'),
(10, '2341646.jpg', 'Sample', 'image/jpeg', '2023-07-07, 03:18 PM', 'Admin', 'STU910');

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
  `section` varchar(500) NOT NULL,
  `advisor` varchar(500) NOT NULL,
  `admin_id` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `firstname`, `middlename`, `lastname`, `gender`, `batch`, `section`, `advisor`, `admin_id`) VALUES
('STU001', 'Ethan', 'James', 'Anderson', 'Male', '2016', 'Oak', 'Mr. David Thompson', 'Admin'),
('STU102', 'Ava', 'Grace', 'Thompson', 'Female', '2016', 'Oak', 'Mr. David Thompson', 'Admin'),
('STU203', 'Liam', 'Michael', 'Martinez', 'Male', '2017', 'Maple', 'Mrs. Emily Johnson', 'Admin'),
('STU304', 'Sophia', 'Elizabeth', 'Johnson', 'Female', '2017', 'Maple', 'Mrs. Emily Johnson', 'Admin'),
('STU405', 'Noah ', 'Alexander', 'Williams', 'Male', '2018', 'Pine', 'Ms. Samantha Davis', 'Admin'),
('STU506', 'Isabella', 'Rose', 'Davis', 'Female', '2018', 'Pine', 'Ms. Samantha Davis', 'Admin'),
('STU607', 'Benjamin', 'Daniel', 'Rodriguez', 'Male', '2019', 'Willow', 'Mr. Michael Wilson', 'Admin'),
('STU708', 'Olivia', 'Nicole', 'Wilson', 'Female', '2019', 'Willow', 'Mr. Michael Wilson', 'Admin'),
('STU809', 'Lucas', 'Benjamin', 'Taylor', 'Male', '2020', 'Birch', 'Ms. Olivia Roberts', 'Admin'),
('STU910', 'Mia', 'Olivia', 'Anderson', 'Female', '2020', 'Birch', 'Ms. Olivia Roberts', 'Admin');

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
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`reset_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `verification_code` (`verification_code`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`),
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `reset_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `store_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD CONSTRAINT `reset_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointment` (`appointment_id`);

--
-- Constraints for table `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `storage_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `student` (`stud_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
