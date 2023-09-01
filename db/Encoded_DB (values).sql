-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql305.infinityfree.com
-- Generation Time: Jul 28, 2023 at 08:57 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_34371419_lnchsrms`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `ref_no`, `name`, `email`, `contact`, `type_docu`, `purpose`, `name_stud`, `date`) VALUES
(1, 'N/A', 'Venice Mae', 'liela.cantillana001@deped.gov.ph', 'Tarronas', 'Form 137', 'Study Abroad', 'N/A', '2023-07-25');

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
('108839060030', 'John Cyrus', 'Villasanta', 'Tarronas', 'Male', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('107594120245', 'Ma. Lorien', 'Jorvina', 'Dizon', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108225060249', 'Antonette', 'Biredo', 'Oriel', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108297060123', 'Azunta Nicole', 'Mendoza', 'Dimas', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108426060083', 'John Ralph', 'Landicho', 'Dela Rosa', 'Male', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108537060048', 'Kenrick', 'Leorin', 'Cayabat', 'Male', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108589060013', 'Marialyn', 'Dimabilis', 'Guim', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108595060005', 'Mark Bryan', 'Caricot', 'Agubang', 'Male', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108595060035', 'Judea', 'Dones', 'Ramiro', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108622060099', 'Marc Daryl', 'Resuma', 'Ona', 'Male', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108763060023', 'Kevin', 'Benosa', 'Calvelo', 'Male', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108763060073', 'Dane Khryssel', 'Lobrin', 'Severa', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108797060003', 'Sheena Mae', 'Paraiso', 'Capistrano', 'Female', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108797060008', 'Charlene Jo', 'Candelaria', 'Noscal', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108797060009', 'Rewell', 'Verdera', 'Paraiso', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108797060011', 'Efren Jay', 'Paraiso', 'Reyes', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108798060009', 'Marjorie', ' ', 'Gacang', 'Female', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108798060016', 'Benjie', 'Malto', 'Medenella', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108798060018', 'Kim Christian', 'Malto', 'Monge', 'Male', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108798060022', 'Rechelle', 'Noma', 'RaÃ±asa', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108800050024', 'Ramil', 'Blasco', 'Romero', 'Male', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108800050027', 'Michael', 'Casulla', 'Velasco', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108800060006', 'Mark Lester', 'Cantillana', 'Alano', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108800060019', 'Monica', 'Menor', 'Escobido', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108800060037', 'Jerome', 'Factor', 'Rayos', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108800060040', 'Ana Marie', 'Villalon', 'Toledo', 'Female', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108801050027', 'Ronalyn', 'Daliva', 'OdoÃ±o', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108801060002', 'Mac Royland', 'Payadan', 'Amazona', 'Male', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108801060011', 'Kent Lou Jay', 'Lubuguin', 'Encina', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108801060014', 'Carl Andrei', 'Mapaye', 'Gunos', 'Male', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108801060021', 'Victoriano', 'Daliva', 'Moring Jr.', 'Male', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108801060032', 'Glenda', 'Beltran', 'Rebamba', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108801060039', 'Irish Bianca', 'Agtay', 'Valencia', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108803060032', 'Ericka Jane', 'Quijano', 'Parena', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108803060042', 'Rigor', 'Argudo', 'Valenzuela ', 'Male', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108804060012', 'Lyka Ann', 'Garcia', 'Verdera', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108805050159', 'Aprail Jhon', 'Ansano', 'Saberola', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108805060002', 'Mykaela', 'Estrada', 'Argente', 'Female', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108805060003', 'Andrei Jade', 'Cipriano', 'Agot', 'Male', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108805060004', 'Jeferson', 'Florido', 'Aguilar', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108805060012', 'Marydee', 'Cabangon', 'Andal', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108805060017', 'Diosalyn Rose', 'Dela Cruz', 'Argamosa', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108805060020', 'John Albert', 'Dahay', 'Atienza', 'Male', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108805060022', 'Lean Joy', 'Disuasido', 'Baltazar', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108805060023', 'Princess Diane', 'Pasta', 'Bandoja', 'Female', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108805060025', 'Linzie', 'Alvarado', 'Basanta', 'Female', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108805060027', 'Miguel Ruoie', 'Zurbano', 'Biglete', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108805060028', 'Mark Francis', 'Gunay', 'Bitoin', 'Male', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108805060029', 'Remmuel', 'Maravilla', 'Borbon', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108805060032', 'Cresia Jenny', 'Babiera', 'Caballas', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108805060033', 'Aleah', 'Vergara', 'Caldit', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108805060034', 'Aloysius Cesar', 'Valencia', 'Calubayan', 'Male', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108805060036', 'Azhleigh Ann', 'De Santos', 'Cañafranca', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108805060039', 'Luis', 'Barreno', 'Canimo', 'Male', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108805060044', 'Renz Ryan', 'Bitoin', 'Casiracan', 'Male', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108805060052', 'Krizzia Mae', 'Garcia', 'De Asis', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108805060055', 'Mica Glyza', 'De Luna', 'Del Banco', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108805060056', 'Brent', 'Durante', 'Dela Cruz', 'Male', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108805060057', 'Daniel', 'Cera', 'Deocales', 'Male', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108805060065', 'Carl Joshua', 'Ragil', 'Escleto', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108805060073', 'Mernel', 'Relles', 'Garduque', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108805060078', 'Denmark Lester', 'Zaporteza', 'Gonzales', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108805060085', 'Jazz Dean ', 'Pitero', 'Hiloma', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108805060087', 'Alicia Nicole', 'Nero', 'Juego', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108805060088', 'Jose Juramer', 'Evangelista', 'Labso', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108805060092', 'Maricris', 'Cainap', 'Lagrama', 'Female', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108805060096', 'Vhia Symonette', 'Obnial', 'Libantino', 'Female', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108805060097', 'Christian ', 'Jamin', 'Llenas', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108805060098', 'Franz Melo', 'Briones', 'Lopez', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108805060101', 'Enrihco', 'Severa', 'Malubay', 'Male', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108805060102', 'Sherwin', 'Bantayan', 'MaÃ±ago', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108805060103', 'Aldrin Jake', 'Torrero', 'Mancera', 'Male', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108805060116', 'Sarah Joy', 'Mimay', 'Mendillo', 'Female', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108805060118', 'Chloe Kaye', 'Egos', 'Mercado', 'Female', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108805060119', 'Zaianne', 'Mendoza', 'Merjudio', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108805060124', 'Renato', 'Erinco', 'Nero III', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108805060127', 'Leonard', 'Pinon', 'Nonzol', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108805060128', 'John Paul', 'Moraleda', 'Noscal', 'Male', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108805060130', 'Jommel', 'Aguilar', 'Nova', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108805060139', 'John Olsen', 'Madera', 'Pangilinan', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108805060150', 'Jusper', 'Arnaldo ', 'Raza', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108805060154', 'Alyssa Lucelle', 'Ekong', 'Reynales', 'Female', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108805060160', 'Merdessa', 'Savedra', 'Salumbides', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108805060171', 'Beatrice Danelle', 'Abo', 'Surio', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108805060175', 'Kim Angelo', 'Flavier', 'Tenorio', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108805060177', 'Lyka Joy', 'Abrigo', 'Trenio', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108805060188', 'Marjorie', 'Aguirre', 'Villamor', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108805060190', 'John Paolo', 'Taa', 'Villanueva ', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108805060194', 'Geoffrey', ' ', 'Villate', 'Male', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('10880506193', 'Merry Joy', 'ViriÃ±a', 'VillaseÃ±or', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108805120282', 'Demnes Nikko', ' ', 'AraÃ±as', 'Male', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('10880560160', 'Gwyneth Jan', 'Carelo', 'Royandoyan', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108809060007', 'John Mark', 'Candolita', 'Anacion', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108809060013', 'Princess Dianne', 'Villatoro', 'Barreno', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108809060014', 'Sarah May', 'Villegas', 'Barreno', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108809060034', 'Mary Grace', 'Villanueva ', 'Espenida', 'Female', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108809060053', 'Ella Jane', 'Verdera', 'Otivar', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108809060069', 'Jeffrey', 'Abanes', 'Verdera', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108812050028', 'Aivy', 'CariÃ±o', 'Llacona', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108812060010', 'Claire', 'Mapula', 'Bronzal', 'Female', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108812060023', 'Estela', 'Colminar', 'Ferrer', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108813050031', 'Jerome', 'Ellera', 'VillafaÃ±e', 'Male', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108813060032', 'Lyniel', 'De Guzman', 'Paraiso', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108815060005', 'Lilibeth', 'OseÃ±a', 'Argamosa', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108815060011', 'Dhan Kenny', 'Vergara', 'Ebora', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108815060018', 'Evelen', 'Manjares', 'OdoÃ±o', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108815060019', 'Liezel', 'Ais', 'OseÃ±a', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108815060020', 'Leonil', 'Lopez', 'OseÃ±a', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108815060028', 'Kier', 'Velasco', 'Zamora', 'Male', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108821060006', 'Maricel', 'MuÃ±oz', 'Beloa', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108822060010', 'Jhon Luis', 'Parro', 'Lozande', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108822060019', 'Paulo', 'De Leon', 'Racelis', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108822060023', 'John Deylord', 'Flavier', 'Tiama', 'Male', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108823060014', 'Joshua', 'Jamiro', 'Santuyo', 'Male', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108826060001', 'Cherielyn', 'Santos', 'Capellan', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108827060002', 'Ive Joy', 'Mercado', 'Datario', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108829050018', 'Cristene', 'Belista', 'Chavenia', 'Female', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108829050032', 'Aileene', 'Francisco', 'Mejorada', 'Female', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108829060005', 'Ronalyn', 'Morillo', 'Ayangco', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108829060021', 'Mark Angelo', 'Ayangco', 'Desembrana', 'Male', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108829060024', 'Westlyn Love', 'Pabia', 'Hernandez', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108829060025', 'Ian Dale', 'Borbe', 'Iledan', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108829060030', 'John Paul', 'Limpiada', 'Mancera', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108829060038', 'Jeycel', 'Novero', 'Otano', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108829060053', 'Nicole Angela', 'Arella', 'Vital', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108829060055', 'Joyce', 'Pricilla', 'Zamora', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108834060012', 'Lorraine', 'Yulo', 'Libranda', 'Female', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108834060015', 'John Adams', 'Lacuarin', 'Saspa', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108836060002', 'Kristenn May', 'Quintana', 'Agot', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108836060016', 'Jackylou', 'Pedraza', 'Comargo', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108836060020', 'Renalyn', 'Villafuerte', 'Eguillos', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108836060021', 'Joan', 'Himor', 'Embile', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108836060041', 'Daphnie Jane', 'Dela Cruz', 'Luna', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108836060054', 'Erica Jane', 'Marco', 'Obera', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108836060061', 'Wendel', 'Longcop', 'Planas', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108836060065', 'Marjory', 'MaÃ±osa', 'Rosales', 'Female', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108836060067', 'Michelle', 'Bravante', 'Salva', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108836060068', 'Jelian', 'Bola', 'San Felipe', 'Female', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108836060071', 'Louie', 'Sionicio', 'Sario', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108836060072', 'Marvin', 'Peritez', 'Sario', 'Male', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108836060076', 'Marjorie', 'Capellan', 'Vargas', 'Female', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108836060080', 'Vincent', 'Aborde', 'Villasanta', 'Male', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108839050031', 'Gerald', 'Carabet', 'Villancio', 'Male', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108839060001', 'Princess Myca', 'Dela Trinidad', 'Abetchuela', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108839060019', 'Rodel Jordan', 'De Guzman', 'Mique', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108839060025', 'Je-arr', 'Andama', 'Rivera', 'Male', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108839060028', 'Kent Jemuel', 'Hinalinan', 'Severa', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108839060032', 'Aries', 'Silang', 'Valencia', 'Male', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108839060037', 'Zyra May', 'BolaÃ±os', 'Zamodio', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108840060005', 'Unice', 'Flores', 'Andal', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108840060010', 'Alyssa', 'Barreno', 'Arenque', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108840060029', 'Angel Pearl', 'Paraiso', 'Calayag', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108840060052', 'Joselle', 'Batanes', 'Empleo', 'Female', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108840060057', 'Jhasmin Joy', 'Nacional', 'Florido', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108840060064', 'Jovelyn', 'Perdialva', 'Guzman', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108840060067', 'Monica Joy', ' ', 'Harabejo', 'Female', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108840060070', 'Lemuel', 'Olanda', 'Lopez', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108840060071', 'Ariana Grace', 'Nisperos', 'Losito', 'Female', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108840060072', 'Halsea', 'Velasco', 'Macabangon', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108840060082', 'Francis', 'De Villa', 'Manza', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108840060083', 'Kaisser Ian', 'Corpuz', 'Manza', 'Male', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108840060094', 'Meliza May', 'Cabahug', 'Maries', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108840060103', 'Jude', 'Oliquino', 'Navarra', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108840060113', 'Justine Leo', 'Abelito', 'Palad', 'Male', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108840060117', 'Hazel', 'De Guzman', 'Petalvo', 'Female', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108840060120', 'Ben Jay', 'Overa', 'Pulgar', 'Male', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108840060143', 'Krystal', 'Edora', 'Uy', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108840060144', 'Liezel Ann', 'Verdera', 'Uy', 'Female', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108840060146', 'Raymart', 'Sta. Ana', 'Supillo', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108840060149', 'Marlene', 'Fontanilla', 'Villafuerte ', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108841050013', 'Jomari', 'Marinda', 'Malaca', 'Male', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108841050014', 'Monica', 'Miranda', 'Malaca', 'Female', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108842060014', 'Clarice', 'Valencia', 'Llorera', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('10884506003', 'Jovelene', 'Regondon', 'Jimenez ', 'Female', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108846060027', 'Riza', 'Rosales', 'Indrinal', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108847050006', 'Nicole', 'Argelio ', 'Agot', 'Female', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108847050102', 'Jeffrey', 'Zurbano', 'Gatdula', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108847050126', 'Jhun Lester', ' ', 'Romero', 'Male', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108847050153', 'Arlan', 'Porka', 'Mercado', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108847060002', 'Shara Maureen', 'Capistrano ', 'Abelilla', 'Female', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108847060003', 'Richelda', 'Acosta', 'Adan', 'Female', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108847060004', 'Arzel Cris', 'Cangao', 'Agorto', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060006', 'Mark Timson', 'Balmaceda', 'Amortizado', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108847060010', 'Jessa', 'Saralde', 'Apelacion', 'Female', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108847060011', 'Ma. Rinaliza', 'Mercado', 'Araya', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108847060014', 'Jamia Antonette', 'Zuela', 'Arevalo', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060016', 'Rosheena Dia', 'Vilar', 'Arguelles', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060017', 'Jenny Lyn', 'Villaver', 'Ariengo', 'Female', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108847060018', 'Kimberly', 'Leonor', 'Aureada', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060019', 'Clark Henry', 'Jalina', 'Autor', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108847060021', 'Francis John', 'Yngente', 'Azares', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108847060022', 'Marjory Joy', 'Valles', 'Balbaira', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108847060023', 'Angelica', 'Layola', 'Baltazar', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108847060026', 'Marlyn', 'Diaz', 'Barcelona', 'Female', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108847060027', 'Greatchen', 'Apelacion', 'Barretto', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060029', 'Mariane Grace', 'Cantillana', 'Baylon', 'Female', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108847060033', 'Emmanuel', 'Aranillo', 'Calimag', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108847060034', 'Mitz Onice', 'Jimenez', 'Cantara', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108847060037', 'Luiz Nicole', 'Perolino', 'Caparros', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108847060040', 'Diana', 'Sevial', 'Capistrano', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060043', 'Camille Jane', 'Reynales', 'Capucion', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060044', 'Caryl Jane', 'Monterde', 'Carrios', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060051', 'Joanna Jane', 'Zamora', 'Coral', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108847060055', 'Celso', 'Asis', 'Del Castillo II', 'Male', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060057', 'Len Rose', 'Valencia', 'Dungca', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060058', 'Sherwin', 'Florido', 'Embile', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108847060059', 'Rein Vincent', 'Beniegas', 'EreÃ±o', 'Male', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108847060063', 'Anjil', 'Panal', 'Escobido', 'Female', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108847060065', 'Dom Joshua', 'Reynales', 'Esperanzate', 'Male', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108847060066', 'Jomiel Cielo', 'Ayroso', 'Estrosas', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060068', 'Nikka Joie', 'Bustos', 'Faller', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108847060070', 'Janella Joi', 'Mison', 'Flavier', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060075', 'Nan Henly', 'De Roma', 'Hernandez', 'Male', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108847060080', 'Kimberly Rose', 'Sacnanas', 'Itable', 'Female', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108847060081', 'Wendell', 'Villanueva ', 'Larowa', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108847060085', 'Christian ', 'Fortuna', 'Loniza', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108847060098', 'Mark Jared', 'Ayangco', 'Marasigan', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108847060107', 'Andrey Dominic', 'De Asis', 'Mendonis', 'Male', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108847060110', 'Anette', 'Argete', 'Merjudio', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060112', 'Mica Rose', 'Paraiso', 'Miranda', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108847060120', 'King CJ', 'Lait', 'Nerida', 'Male', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060122', 'Margie Criselle', 'Lizano', 'Norada', 'Female', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108847060124', 'Eah Yna Igraine', 'Jundak', 'Noscal', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108847060125', 'Ferly Ann', 'Babiera', 'Noscal', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060126', 'Jamaica', 'Paraiso', 'Noscal', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108847060130', 'Hessa Mae', ' ', 'Oleta', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108847060131', 'Brian Khayl', 'Englatiera', 'Oliveros', 'Male', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108847060135', 'April Rose', 'Abaja', 'Palima', 'Female', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108847060136', 'Dianne', 'Andrade', 'Panganiban', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108847060140', 'John Russel', 'Iglesia', 'Pelingon', 'Male', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108847060142', 'Jessabel', 'Banog', 'Pitero', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108847060143', 'Darrlo', 'Avellana', 'Preclaro', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108847060144', 'John Clarence', 'Andayon', 'Punzalan', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108847060145', 'Jerome', 'Reyes', 'Purio', 'Male', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108847060153', 'Renz Lester', 'Hinalinan', 'Ricohermoso', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108847060166', 'Sean Andy', 'Siaron', 'Taba', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108847060169', 'Kelsey Mae', 'Isturis', 'Tardecilla', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060172', 'Diesebel', 'Destor', 'Uabina', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108847060174', 'Jemmalyn', 'Templonuevo', 'Valencia', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060175', 'Angelica', 'Japon', 'Valencia ', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108847060176', 'Michael Angelo ', 'Villate', 'Valencia', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108847060183', 'Crystille', 'Lacopia', 'Villafuerte', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060184', 'Monica Grace', 'Lumen', 'Villancio', 'Female', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108847060187', 'NiÃ±o John Kenneth', 'Reyes', 'Villanueva ', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108847060188', 'Princess Arianne', 'CaÃ±izares', 'Villarama', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108847060191', 'Eugene Adrian', 'Pilirca', 'Villaver', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('108847060192', 'Nicole Andrea', 'Abunda', 'Vito', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108847060193', 'Jr. Leopoldo', 'Montales', 'Zamora', 'Male', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108848050020', 'Kenneth', 'Francisco ', 'Dognidon', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108848050043', 'Arven', 'Targa', 'Veran', 'Male', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108848060003', 'Trexia Mae', 'Derilo', 'Aprado', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108848060006', 'Aireen', 'Arellano', 'Bacareza', 'Female', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('108848060009', 'Myca Marie', 'Cabungcal', 'Cabangon', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108848060011', 'Rhonadel', 'Argelio', 'Caparros', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108848060016', 'Lalaine', 'Pabis', 'Lagat', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108848060017', 'Crystal May', ' ', 'MaÃ±as', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108848060018', 'Jomil', 'Villafuerte', 'Masaganda', 'Male', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108848060025', 'Rozette', 'LoteriÃ±a', 'Ocfemia', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('108848060027', 'Khaysel', 'Lopez', 'Oliveros', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108848060035', 'Leila Marie', 'Espedido', 'Solina', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108848060036', 'King Israel Ernest Rhoel', 'Mascardo', 'Taylan', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108848060037', 'Clerine Gay', 'De Rosas', 'Tiama', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108848120024', 'Jayvee', 'Montalbo', 'Sanchez', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('10885100414', 'Jay', 'Dumasig', 'Resurreccion', 'Male', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108851060016', 'Maria Therese', 'Ablitas', 'Dino', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('108851060021', 'Loren', 'Zamora', 'Estiller', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108851060024', 'Jerico', 'Deroy', 'Flores', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('108851060027', 'Vallerie Ann', 'Villapando', 'Garcia', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108851060064', 'Charlyn', 'Pasta', 'Villapando', 'Female', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108851120004', 'Jennelyn', 'Nullan', 'Caparas', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108852060013', 'Carlo', 'Del Moro', 'Dadap', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('108855060001', 'Claidine Joy ', 'Montes', 'Apuyan', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('108887050013', 'Joanna Jean', 'Villanueva', 'Narvaez', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('108915060013', 'Mary Joyce', 'Marcelo', 'Villa', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('109172060017', 'Edward Joseph', 'Bon', 'Dimaano', 'Male', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('109203060009', 'Jhon Carlo Castillo ', 'Ayangco', 'Dimailig', 'Male', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('109350060690', 'Hannah Grace', 'Esumadia', 'Villar', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('109495060333', 'Lyka', 'Macatol', 'Olea', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('112924120240', 'Marvin', 'Lagrama', 'De Guzman', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('113272060029', 'Mark Thed ', 'Nedua', 'Canon', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('173011060005', 'Anthony Carl', 'De Torres', 'Argente', 'Male', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('173012060046', 'Kylle', 'Barias', 'Raza', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('300688120015', 'Alma Gehren', 'Taa', 'AbaÃ±o', 'Female', '2016-2017', 'SVM', 'Sarah Jane V. Manza', 'Admin'),
('301311100005', 'Loren Jay', 'De Chavez', 'Argudo', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('301345100414', 'Rodelmar', 'Maravilla', 'Nate', 'Male', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('301345110554', 'Mark Joseph', 'Villasanta', 'Precones', 'Male', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('301345120147', 'Jonnel', 'Anacion', 'Alday', 'Male', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('301345130003', 'Mary Joy', 'Osillo', 'Alfuen', 'Female', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('301345130006', 'Cyron Jake', 'Leopando', 'Sante', 'Male', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('301345130011', 'John Carl', 'Arias', 'Avila', 'Male', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('301345130027', 'Wea Mae', 'Arceo', 'Mercurio', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('301345130028', 'Frances Mary', 'Olanda', 'Mirandilla', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('301345130029', 'Krisha Frelle', 'Arias', 'Mique', 'Female', '2016-2017', 'NBA', 'Norman B. Añir', 'Admin'),
('301345130048', 'Ronald Jasper', 'Pinalba', 'Bulfa', 'Male', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('301345130058', 'Vince Cedric', 'Higuerra', 'Siazon', 'Male', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('301345130062', 'Patricia Clarisse', 'Dela Rosa', 'Reyes', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('301345130063', 'Maria Luisa', 'Apelacion', 'Sanglay', 'Female', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('301345130064', 'Regina Abigail', 'Laque', 'Santos', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('301345130066', 'Claire', 'Basanta', 'Villaflor', 'Female', '2016-2017', 'RAZ', 'Reziel A. Zurbano', 'Admin'),
('301345130073', 'Sarah Joy', 'Santonia', 'Gadil', 'Female', '2016-2017', 'AAE', 'Ailene A. Ebora', 'Admin'),
('301345130074', 'Ma. Alexandria', 'Paraiso', 'Godoy', 'Female', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('301345130075', 'Rolene', 'Mercado', 'Victoria ', 'Female', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('301345130085', 'Clarise', 'Del Moro', 'Colllada', 'Female', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('301345130091', 'John Rey', 'Ruiz', 'Zabella', 'Male', '2016-2017', 'HPA', 'Homer P. Ardiente', 'Admin'),
('301345130124', 'Marvie Anne', 'Ramirez', 'Alvara', 'Female', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin'),
('301352140002', 'Jerico', 'Balbaira', 'Dator', 'Male', '2016-2017', 'GVA', 'Geronimo Rolly V. Alfuerte', 'Admin'),
('305342130052', 'Kristaffer', 'Arella', 'Tierra', 'Female', '2016-2017', 'DAA', 'Edita A. Arandela', 'Admin'),
('402759151014', 'John Louie', 'Onato', 'Gregorio', 'Male', '2016-2017', 'LDL', 'Lerma Madiory D. Lotereña', 'Admin');

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
  MODIFY `appointment_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `store_id` int(200) NOT NULL AUTO_INCREMENT;

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
