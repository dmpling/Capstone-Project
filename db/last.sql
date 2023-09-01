-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 01:24 PM
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
-- Database: `last`
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
('20398sdflkj', 'Jkl', 'SDF', 'SDF', 'sdf@gmail.com', '$2y$10$O1ekCmx3uGya9s4GseAUHuPLbEWjQ.xtJA9pVlWUbZe2xvyA9b7c.', '92830LKJdi', 'Registrar'),
('AD232022CHMP', 'Anthony', 'Davis', 'ad_23', 'adavis23@gmail.com', '$2y$10$fyn.Nn7ancsv6eri84848OMDzpKfnPNawOAl.ocF41RSY4kwZaMZC', '00150898089', 'Admin'),
('Admin_02', 'Logi', 'Oda', 'Reg', 'reg@gmail.com', '$2y$10$3LsWUaQmejLl6Lss0nMOGOe9yyn/bxG.XLUCcKnVmWNbgpX2YNBdi', '00923JKL', 'Registrar'),
('Admin_1', 'Jose', 'Labso', 'Admin', 'admin@gmail.com', '$2y$10$bGyOeFGLnAuOHWUUBq/SxObM6J2Ec4MJexxkE7LQGFFw2lhS1WOEa', 'Admin-01', 'Admin'),
('Admin_3', 'Min', 'Ad', 'Min', 'min@gmail.com', '$2y$10$IN20zR80uiV/2QSMRRbybuDOLHW1Abwz3vksEjfsOtWJYCNsuVGm.', '23092JKLAS', 'Teacher'),
('JKL', 'J', 'K', 'JKL', 'jkl@gmail.com', '$2y$10$Eu6PWNs58RY9IEmIZBOZcuCJINgCNCmjEGI8UYcLbrbqNMklZtfL2', '232790JIDk', 'Admin');

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

INSERT INTO `storage` (`store_id`, `filename`, `file_description`, `file_type`, `date_uploaded`, `who_uploaded`, `stud_id`) VALUES
(1, 'sample.jpg', 'sample image', 'image/jpeg', '2020-04-08, 01:25 AM', 'Admin_1', 'Student_1'),
(2, 'last.sql', 'Sample', 'application/octet-stream', '2023-05-30, 03:16 PM', 'Admin_1', 'JKL123'),
(3, 'League of Legends (TM) Client 2023-05-23 02-30-37.mp4', 'Try', 'video/mp4', '2023-05-30, 03:19 PM', 'Admin_1', '098jdfk'),
(4, 'sample.jpg', 'jlhgjhgljhg', 'image/jpeg', '2023-05-31, 12:48 AM', 'Admin_1', 'Student_1'),
(5, 'sample.jpg', '123', 'image/jpeg', '2023-05-31, 06:47 PM', 'Admin_1', 'Student_1'),
(14, '9k=', 'Thank You Lord!', 'image/jpeg', '2023-05-31, 07:46 PM', 'Admin_1', 'Student_1'),
(15, '2Q==', 'kjhuuuu3545', 'image/jpeg', '2023-05-31, 07:48 PM', 'Admin_1', 'Student_1'),
(16, '9k=', 'THANK YOU LORD!!!!', 'image/jpeg', '2023-05-31, 07:53 PM', 'Admin_1', 'Student_1'),
(17, 'one-piece-monkey-d-luffy-hd-wallpaper-preview.jpg', 'ASD', 'image/jpeg', '2023-05-31, 07:55 PM', 'Admin_02', 'Student_1'),
(18, 'sample.jpg', 'Thank You Lord!', 'image/jpeg', '2023-05-31, 07:56 PM', 'Admin_02', '098jdfk'),
(19, 'Z', 'Thank You Lord!!!', 'image/jpeg', '2023-05-31, 07:57 PM', 'Admin_02', '098jdfk'),
(20, 'Z', 'Thank You Lord!', 'image/jpeg', '2023-05-31, 08:11 PM', 'Admin_02', 'JKL123'),
(21, '9k=', '3215', 'image/jpeg', '2023-05-31, 08:25 PM', 'Admin_02', 'JKL123'),
(22, 'Z', '56654', 'image/jpeg', '2023-05-31, 08:35 PM', 'Admin_02', 'JKL123'),
(23, '2Q==', '651', 'image/jpeg', '2023-05-31, 08:46 PM', 'Admin_02', 'JKL123'),
(24, 'Z', '6512', 'image/jpeg', '2023-05-31, 08:50 PM', 'Admin_02', 'JKL123'),
(25, '2Q==', '123456789', 'image/jpeg', '2023-05-31, 08:53 PM', 'Admin_02', 'JKL123'),
(26, 'Z', 'JKL', 'image/jpeg', '2023-05-31, 08:55 PM', 'Admin_02', 'JKL123'),
(27, 'TM', 'TM', 'image/jpeg', '2023-05-31, 08:59 PM', 'Admin_02', 'JKL123'),
(28, 'LKJKJI', '03210584874', 'image/jpeg', '2023-05-31, 09:01 PM', 'Admin_02', 'JKL123'),
(29, 'bruvkekew', '3241054548', 'image/jpeg', '2023-05-31, 09:03 PM', 'Admin_02', 'JKL123');

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
  `admin_id` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `firstname`, `middlename`, `lastname`, `gender`, `batch`, `yr_sec`, `admin_id`) VALUES
('098jdfk', 'Jer', 'Josth', 'Lungh', 'Female', '2000-2001', 'Trench - 2', 'Admin_02'),
('JKL123', 'Jus', 'Jik', 'Kil', 'Male', '2000-2001', 'Trench - 3', 'Admin_1'),
('Student_1', 'Juan', 'Tamad', 'Dela Cruz', 'Male', '1999-2000', '1999-2000', 'Admin_1');

--
-- Indexes for dumped tables
--
CREATE TABLE `appointment` (
  `appointment_id` varchar(500) NOT NULL,
  `ref_no` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `contact` varchar(500) NOT NULL,
  `type_docu` varchar(500) NOT NULL,
  `relation` varchar(500) NOT NULL,
  `name_stud` varchar(500) NOT NULL,
  `date` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

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
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `appointment_id` (`appointment_id`);
--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `store_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- Constraints for dumped tables
--

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
