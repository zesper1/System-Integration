-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2024 at 10:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdao`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `attachmentID` int(11) NOT NULL,
  `reportID` int(11) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  `fileType` enum('Complain','Violation','','') NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`attachmentID`, `reportID`, `fileName`, `fileType`, `dateAdded`) VALUES
(7, 23, 'IMG-670ab0c0449002.32200212.png', 'Violation', '2024-10-13 01:24:16'),
(8, 25, 'IMG-670ab26c271954.35273923.png', '', '2024-10-13 01:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fac_id` int(11) NOT NULL,
  `facultyname` varchar(50) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fac_id`, `facultyname`, `dept`) VALUES
(2020172123, NULL, 'SECA'),
(2022171000, NULL, 'SECA');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_ID` int(11) NOT NULL,
  `reportOwnerID` int(11) NOT NULL,
  `reportName` varchar(100) NOT NULL,
  `reportType` enum('Violation','Complaint') NOT NULL,
  `violation_ID` int(11) DEFAULT NULL,
  `accused_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_ID`, `reportOwnerID`, `reportName`, `reportType`, `violation_ID`, `accused_ID`) VALUES
(23, 202217101, 'a', 'Violation', 1, 202217101),
(24, 202217101, 'a', '', NULL, NULL),
(25, 202217101, 'a', 'Complaint', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reportstatus`
--

CREATE TABLE `reportstatus` (
  `status_ID` int(11) NOT NULL,
  `reportID` int(11) NOT NULL,
  `status_DATE` datetime DEFAULT current_timestamp(),
  `status_DETAILS` varchar(30) DEFAULT NULL,
  `status` enum('Read','Unread') NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reportstatus`
--

INSERT INTO `reportstatus` (`status_ID`, `reportID`, `status_DATE`, `status_DETAILS`, `status`) VALUES
(4, 23, '2024-10-13 01:24:16', 'a', 'Unread'),
(5, 24, '2024-10-13 01:31:13', 'a', 'Unread'),
(6, 25, '2024-10-13 01:31:24', 'a', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_ID` int(11) NOT NULL,
  `rolename` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_ID`, `rolename`) VALUES
(1, 'Admin'),
(2, 'Faculty'),
(3, 'Student\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `severity`
--

CREATE TABLE `severity` (
  `severity_ID` int(11) NOT NULL,
  `severity_LEVEL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `severity`
--

INSERT INTO `severity` (`severity_ID`, `severity_LEVEL`) VALUES
(1, '1st Offense'),
(2, '2nd Offense'),
(3, '3rd Offense');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(100) NOT NULL,
  `program` varchar(50) DEFAULT NULL,
  `yearlevel` varchar(10) DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `program`, `yearlevel`, `section`) VALUES
(202217101, 'BSIT-MWA', '3', 'INF223'),
(2022171101, 'BSIT-MWA', '3', 'INF223');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(11) NOT NULL,
  `role_ID` int(11) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `role_ID`, `email`, `password`) VALUES
(1, 1, 'admin123@gmail.com', '12345678'),
(202401, 1, 'admin1@gmail.com', '12341234'),
(202217101, 3, 'abahalla@nu-dasma.st', '12341234'),
(2020172123, 2, 'edward@faculty.nu-da', '12341234'),
(2022171000, 2, 'm.olag@faculty.nu-da', '12341234'),
(2022171101, 3, 'rbatacandolo@student', '12341234');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `userID` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`userID`, `first_name`, `middle_name`, `last_name`) VALUES
('2020172123', 'Edward', 'Mcjoben', 'Blacklist'),
('2022171000', 'Michael', 'V.', 'Olag'),
('202217101', 'Alyssa', ' ', 'Bahalla'),
('2022171101', 'Rovic', ' ', 'Batacandolo'),
('202401', 'Zedrick', '', 'Espere\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `violation`
--

CREATE TABLE `violation` (
  `violation_ID` int(11) NOT NULL,
  `severity_ID` int(11) DEFAULT NULL,
  `violationType_ID` int(50) DEFAULT NULL,
  `violation_Date` datetime DEFAULT NULL,
  `violationDetail_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `violationtype`
--

CREATE TABLE `violationtype` (
  `violationType_ID` int(11) NOT NULL,
  `violationTypeName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `violationtype`
--

INSERT INTO `violationtype` (`violationType_ID`, `violationTypeName`) VALUES
(1, 'Public Display of Affection'),
(2, 'Brawl'),
(3, 'Direct Assault'),
(4, 'Nakabusangot'),
(5, 'Threatening');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`attachmentID`),
  ADD KEY `reportID` (`reportID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_ID`),
  ADD KEY `fk_reportOwnerID` (`reportOwnerID`) USING BTREE,
  ADD KEY `fk_violation_ID` (`violation_ID`) USING BTREE,
  ADD KEY `fk_accused_ID` (`accused_ID`);

--
-- Indexes for table `reportstatus`
--
ALTER TABLE `reportstatus`
  ADD PRIMARY KEY (`status_ID`),
  ADD KEY `reportID` (`reportID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_ID`);

--
-- Indexes for table `severity`
--
ALTER TABLE `severity`
  ADD PRIMARY KEY (`severity_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_ID` (`role_ID`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `violation`
--
ALTER TABLE `violation`
  ADD PRIMARY KEY (`violation_ID`),
  ADD KEY `severity_ID` (`severity_ID`),
  ADD KEY `violationType_ID` (`violationType_ID`) USING BTREE,
  ADD KEY `violationDetail_ID` (`violationDetail_ID`);

--
-- Indexes for table `violationtype`
--
ALTER TABLE `violationtype`
  ADD PRIMARY KEY (`violationType_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `attachmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2022171001;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reportstatus`
--
ALTER TABLE `reportstatus`
  MODIFY `status_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `severity`
--
ALTER TABLE `severity`
  MODIFY `severity_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2022171102;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2022171105;

--
-- AUTO_INCREMENT for table `violation`
--
ALTER TABLE `violation`
  MODIFY `violation_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `violationtype`
--
ALTER TABLE `violationtype`
  MODIFY `violationType_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attachment`
--
ALTER TABLE `attachment`
  ADD CONSTRAINT `attachment_ibfk_2` FOREIGN KEY (`reportID`) REFERENCES `report` (`report_ID`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`fac_id`) REFERENCES `user` (`user_ID`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `fk_accused_ID` FOREIGN KEY (`accused_ID`) REFERENCES `user` (`user_ID`),
  ADD CONSTRAINT `fk_reportOwnerID` FOREIGN KEY (`reportOwnerID`) REFERENCES `user` (`user_ID`),
  ADD CONSTRAINT `fk_violation_ID` FOREIGN KEY (`violation_ID`) REFERENCES `violationtype` (`violationType_ID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `user` (`user_ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_ID`) REFERENCES `roles` (`role_ID`);

--
-- Constraints for table `violation`
--
ALTER TABLE `violation`
  ADD CONSTRAINT `violatIonDetail_ID` FOREIGN KEY (`violationDetail_ID`) REFERENCES `report` (`report_ID`),
  ADD CONSTRAINT `violationType_ID` FOREIGN KEY (`violationType_ID`) REFERENCES `violationtype` (`violationType_ID`),
  ADD CONSTRAINT `violation_ibfk_1` FOREIGN KEY (`severity_ID`) REFERENCES `severity` (`severity_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
