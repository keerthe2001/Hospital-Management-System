-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 06:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `date`) VALUES
(1, 'admin', 'admin', '2022-02-27 19:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(255) NOT NULL,
  `Hospital_name` varchar(255) NOT NULL,
  `Hospital_email` varchar(255) NOT NULL,
  `Hospital_Address` varchar(255) NOT NULL,
  `Hospital_phone` varchar(255) NOT NULL,
  `Hospital_id` varchar(255) NOT NULL,
  `Hospital_password` varchar(255) NOT NULL,
  `is_assigned` int(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `Hospital_name`, `Hospital_email`, `Hospital_Address`, `Hospital_phone`, `Hospital_id`, `Hospital_password`, `is_assigned`, `date`) VALUES
(50, 'Hospital1', 'Hospital1@gmail.com', 'no 18/6 xyz street', '9500163394', 'O1', '123', 0, '2022-05-17 21:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `hospital1`
--

CREATE TABLE `hospital1` (
  `id` int(255) NOT NULL,
  `outpatient` varchar(255) DEFAULT NULL,
  `surgeries` varchar(255) DEFAULT NULL,
  `camp` varchar(255) DEFAULT NULL,
  `camp_details` varchar(255) DEFAULT NULL,
  `lifeline_camp` varchar(255) DEFAULT NULL,
  `optical_Hospital` varchar(255) DEFAULT NULL,
  `other_treatments` varchar(255) DEFAULT NULL,
  `revenue_statement` varchar(255) DEFAULT NULL,
  `sot` varchar(255) DEFAULT NULL,
  `columndata` varchar(255) DEFAULT NULL,
  `updated_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital1`
--

INSERT INTO `hospital1` (`id`, `outpatient`, `surgeries`, `camp`, `camp_details`, `lifeline_camp`, `optical_Hospital`, `other_treatments`, `revenue_statement`, `sot`, `columndata`, `updated_date`) VALUES
(1, 'new', 'CATARACT', 'CATARACT', 'total_camp', 'Hospital_surgery', 'gp', 'HFA', 'OP_Registration', 'paying_orbit_sot', 'outpatient', '2022-05-17 21:47:47'),
(2, 'review', 'RETINA', 'RETINA', 'camp_name', 'train_surgery', 'order1', 'Yag_PI_Single_eye', 'OP_Treatment_Procedures', 'camp_orbit_sot', 'surgeries', '2022-05-17 21:47:47'),
(3, 'other', 'GLAUCOMA', 'GLAUCOMA', 'total_op', 'other', 'other', 'Yag_PI_Both_eyes', 'OP_Others', 'other', 'camp', '2022-05-17 21:47:47'),
(4, '', 'Pediatric_or_Squint', 'Pediatric_or_Squint', 'total_ip', '', '', 'Yag_Cap', 'IP_Advance', '', 'camp_details', '2022-05-17 21:47:47'),
(5, '', 'CORNEA_Pterygium', 'CORNEA_Pterygium', 'Surgery_Advice', '', '', 'CCT_Laser', 'OPTICAL', '', 'lifeline_camp', '2022-05-17 21:47:47'),
(6, '', 'Lasik_Surgery', 'Lasik_Surgery', 'Surgery_Admission', '', '', 'B_scan_single_eye', 'MEDICAL', '', 'optical_Hospital', '2022-05-17 21:47:47'),
(7, '', 'Oculoplasty', 'Oculoplasty', 'gp', '', '', 'B_scan_both_eye', 'CATARACT_CAMP', '', 'other_treatments', '2022-05-17 21:47:47'),
(8, '', 'OTHER_SURGERIES', 'OTHER_SURGERIES', 'order1', '', '', 'OCT', 'REFRACTION_CAMP', '', 'revenue_statement', '2022-05-17 21:47:47'),
(9, '', 'Sics_Pterygium', 'Sics_Pterygium', 'other', '', '', 'FFA', 'PHARMACY', '', 'sot', '2022-05-17 21:47:47'),
(10, '', 'Phaco_Pterygium', 'Phaco_Pterygium', '', '', '', 'PRP_Laser_Green_Laser', 'LIFELINE_CAMP', '', '', '2022-05-17 21:47:47'),
(11, '', 'Trab_Pterygium', 'Trab_Pterygium', '', '', '', 'Penta_Cam', 'CANTEEN', '', '', '2022-05-17 21:47:47'),
(12, '', '', '', '', '', '', 'Fundus_Photo', 'DONATIONS', '', '', '2022-05-17 21:47:47'),
(13, '', '', '', '', '', '', 'Inj_Manitol_Eye_Wash', 'other', '', '', '2022-05-17 21:47:47'),
(14, '', '', '', '', '', '', 'other', '', '', '', '2022-05-17 21:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `hospital1_camp`
--

CREATE TABLE `hospital1_camp` (
  `id` int(255) NOT NULL,
  `CATARACT` varchar(255) NOT NULL,
  `RETINA` varchar(255) NOT NULL,
  `GLAUCOMA` int(255) NOT NULL,
  `Pediatric_or_Squint` varchar(255) NOT NULL,
  `CORNEA_Pterygium` int(255) NOT NULL,
  `Lasik_Surgery` int(255) NOT NULL,
  `Oculoplasty` int(255) NOT NULL,
  `OTHER_SURGERIES` int(255) NOT NULL,
  `Sics_Pterygium` int(255) NOT NULL,
  `Phaco_Pterygium` int(255) NOT NULL,
  `Trab_Pterygium` int(255) NOT NULL,
  `date` date NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hospital1_camp_details`
--

CREATE TABLE `hospital1_camp_details` (
  `id` int(255) NOT NULL,
  `total_camp` int(255) NOT NULL,
  `camp_name` varchar(255) NOT NULL,
  `total_op` int(255) NOT NULL,
  `total_ip` int(255) NOT NULL,
  `Surgery_Advice` int(255) NOT NULL,
  `Surgery_Admission` int(255) NOT NULL,
  `gp` int(255) NOT NULL,
  `order1` int(255) NOT NULL,
  `other` int(255) NOT NULL,
  `date` date NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hospital1_lifeline_camp`
--

CREATE TABLE `hospital1_lifeline_camp` (
  `id` int(255) NOT NULL,
  `Hospital_surgery` int(255) NOT NULL,
  `train_surgery` int(255) NOT NULL,
  `other` int(255) NOT NULL,
  `date` date NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hospital1_optical_hospital`
--

CREATE TABLE `hospital1_optical_hospital` (
  `id` int(255) NOT NULL,
  `gp` int(255) NOT NULL,
  `order1` int(255) NOT NULL,
  `other` int(255) NOT NULL,
  `date` date NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hospital1_other_treatments`
--

CREATE TABLE `hospital1_other_treatments` (
  `id` int(255) NOT NULL,
  `HFA` varchar(255) NOT NULL,
  `Yag_PI_Single_eye` int(255) NOT NULL,
  `Yag_PI_Both_eyes` int(255) NOT NULL,
  `Yag_Cap` int(255) NOT NULL,
  `CCT_Laser` int(255) NOT NULL,
  `B_scan_single_eye` int(255) NOT NULL,
  `B_scan_both_eye` int(255) NOT NULL,
  `OCT` int(255) NOT NULL,
  `FFA` int(255) NOT NULL,
  `PRP_Laser_Green_Laser` int(255) NOT NULL,
  `Penta_Cam` int(255) NOT NULL,
  `Fundus_Photo` int(255) NOT NULL,
  `Inj_Manitol_Eye_Wash` int(255) NOT NULL,
  `other` int(255) NOT NULL,
  `date` date NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hospital1_outpatient`
--

CREATE TABLE `hospital1_outpatient` (
  `id` int(255) NOT NULL,
  `new` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `other` int(255) NOT NULL,
  `date` date NOT NULL,
  `updated_date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hospital1_revenue_statement`
--

CREATE TABLE `hospital1_revenue_statement` (
  `id` int(255) NOT NULL,
  `OP_Registration` varchar(255) NOT NULL,
  `OP_Treatment_Procedures` varchar(255) NOT NULL,
  `OP_Others` varchar(255) NOT NULL,
  `IP_Advance` varchar(255) NOT NULL,
  `OPTICAL` varchar(255) NOT NULL,
  `MEDICAL` varchar(255) NOT NULL,
  `CATARACT_CAMP` varchar(255) NOT NULL,
  `REFRACTION_CAMP` varchar(255) NOT NULL,
  `PHARMACY` varchar(255) NOT NULL,
  `LIFELINE_CAMP` varchar(255) NOT NULL,
  `CANTEEN` varchar(255) NOT NULL,
  `DONATIONS` varchar(255) NOT NULL,
  `other` int(255) NOT NULL,
  `date` date NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hospital1_sot`
--

CREATE TABLE `hospital1_sot` (
  `id` int(255) NOT NULL,
  `paying_orbit_sot` int(255) NOT NULL,
  `camp_orbit_sot` int(255) NOT NULL,
  `other` int(255) NOT NULL,
  `date` date NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hospital1_surgeries`
--

CREATE TABLE `hospital1_surgeries` (
  `id` int(255) NOT NULL,
  `CATARACT` varchar(255) NOT NULL,
  `RETINA` varchar(255) NOT NULL,
  `GLAUCOMA` int(255) NOT NULL,
  `Pediatric_or_Squint` varchar(255) NOT NULL,
  `CORNEA_Pterygium` int(255) NOT NULL,
  `Lasik_Surgery` int(255) NOT NULL,
  `Oculoplasty` int(255) NOT NULL,
  `OTHER_SURGERIES` int(255) NOT NULL,
  `Sics_Pterygium` int(255) NOT NULL,
  `Phaco_Pterygium` int(255) NOT NULL,
  `Trab_Pterygium` int(255) NOT NULL,
  `date` date NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `Assign_Hospital` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital1`
--
ALTER TABLE `hospital1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital1_camp`
--
ALTER TABLE `hospital1_camp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital1_camp_details`
--
ALTER TABLE `hospital1_camp_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital1_lifeline_camp`
--
ALTER TABLE `hospital1_lifeline_camp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital1_optical_hospital`
--
ALTER TABLE `hospital1_optical_hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital1_other_treatments`
--
ALTER TABLE `hospital1_other_treatments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital1_outpatient`
--
ALTER TABLE `hospital1_outpatient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital1_revenue_statement`
--
ALTER TABLE `hospital1_revenue_statement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital1_sot`
--
ALTER TABLE `hospital1_sot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital1_surgeries`
--
ALTER TABLE `hospital1_surgeries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `hospital1`
--
ALTER TABLE `hospital1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hospital1_camp`
--
ALTER TABLE `hospital1_camp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital1_camp_details`
--
ALTER TABLE `hospital1_camp_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital1_lifeline_camp`
--
ALTER TABLE `hospital1_lifeline_camp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital1_optical_hospital`
--
ALTER TABLE `hospital1_optical_hospital`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital1_other_treatments`
--
ALTER TABLE `hospital1_other_treatments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital1_outpatient`
--
ALTER TABLE `hospital1_outpatient`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital1_revenue_statement`
--
ALTER TABLE `hospital1_revenue_statement`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital1_sot`
--
ALTER TABLE `hospital1_sot`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital1_surgeries`
--
ALTER TABLE `hospital1_surgeries`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
