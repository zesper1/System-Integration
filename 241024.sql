-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 05:08 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_user_and_profile` (IN `p_user_id` INT, IN `p_fname` VARCHAR(255), IN `p_Lname` VARCHAR(255), IN `p_email` VARCHAR(255), IN `p_role` INT)   BEGIN
    -- Update users table
    UPDATE user
    SET email = p_email, role_ID = p_role
    WHERE user_ID = p_user_id;

    -- Update profiles table
    UPDATE userdetails 
    SET first_name = p_fname, last_name = p_Lname 
    WHERE userID = p_user_id;
END$$

DELIMITER ;

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
(9, 33, 'IMG-67161a5602c2f6.11502898.jpg', '', '2024-10-21 17:09:42'),
(10, 34, 'IMG-67161ac40e0324.61900515.png', 'Violation', '2024-10-21 17:11:32'),
(11, 43, 'IMG-671a54efc01043.45217872.jpg', 'Violation', '2024-10-24 22:08:47'),
(12, 51, 'IMG-671a57ca794444.74530006.png', 'Complain', '2024-10-24 22:20:58'),
(13, 52, 'IMG-671a5862b0d842.59844111.jpg', 'Complain', '2024-10-24 22:23:30'),
(14, 55, 'IMG-671a592b6e3981.25454277.jpg', 'Complain', '2024-10-24 22:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `complainsreport`
--

CREATE TABLE `complainsreport` (
  `cr_ID` int(11) NOT NULL,
  `reportID` int(11) NOT NULL,
  `cr_Category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complainsreport`
--

INSERT INTO `complainsreport` (`cr_ID`, `reportID`, `cr_Category`) VALUES
(1, 33, 2),
(2, 38, 1),
(3, 41, 1),
(4, 42, 1),
(5, 44, 1),
(6, 45, 1),
(7, 46, 2),
(8, 47, 1),
(9, 48, 1),
(10, 49, 1),
(11, 50, 2),
(12, 51, 1),
(13, 52, 1),
(14, 54, 1),
(15, 55, 2);

-- --------------------------------------------------------

--
-- Table structure for table `complains_category`
--

CREATE TABLE `complains_category` (
  `ccID` int(11) NOT NULL,
  `ccName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complains_category`
--

INSERT INTO `complains_category` (`ccID`, `ccName`) VALUES
(1, 'Service'),
(2, 'Behavior'),
(3, 'Policy'),
(4, 'Bulbol');

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
  `reportType` enum('Violation','Complaint') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_ID`, `reportOwnerID`, `reportName`, `reportType`) VALUES
(33, 202217101, 'Nakalipbite si sir', 'Complaint'),
(34, 202217101, 'Violation test', 'Violation'),
(35, 202217101, 'a', 'Violation'),
(36, 202217101, 'test report vio 2', 'Violation'),
(37, 202217101, 'a', 'Violation'),
(38, 202217101, 'testComplaint', 'Complaint'),
(39, 202217101, 'testViolation', 'Violation'),
(40, 202217101, 'a', 'Violation'),
(41, 202217101, 'test2complaint', 'Complaint'),
(42, 202217101, 'a', 'Complaint'),
(43, 202217101, 'a', 'Violation'),
(44, 202217101, 'a', 'Complaint'),
(45, 202217101, 'a', 'Complaint'),
(46, 202217101, 'a', 'Complaint'),
(47, 202217101, 'complaint1', 'Complaint'),
(48, 202217101, 'complaint', 'Complaint'),
(49, 202217101, 'a', 'Complaint'),
(50, 202217101, 'a', 'Complaint'),
(51, 202217101, 'a', 'Complaint'),
(52, 202217101, 'a', 'Complaint'),
(53, 202217101, 'a', 'Violation'),
(54, 202217101, 'test123', 'Complaint'),
(55, 202217101, 'testwithattach', 'Complaint');

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
(14, 33, '2024-10-21 17:09:42', 'test descript', 'Read'),
(15, 34, '2024-10-21 17:11:32', 'test descript', 'Read'),
(16, 35, '2024-10-24 19:03:40', 'a', 'Read'),
(17, 36, '2024-10-24 19:07:11', 'test descript2', 'Read'),
(18, 37, '2024-10-24 19:09:50', 'a', 'Read'),
(19, 38, '2024-10-24 21:58:50', 'testcomplaintdesc', 'Read'),
(20, 39, '2024-10-24 22:00:54', 'test', 'Read'),
(21, 40, '2024-10-24 22:03:09', 'a', 'Read'),
(22, 41, '2024-10-24 22:05:31', 'a', 'Read'),
(23, 42, '2024-10-24 22:08:27', 'a', 'Read'),
(24, 43, '2024-10-24 22:08:47', 'a', 'Read'),
(25, 44, '2024-10-24 22:12:47', '1', 'Read'),
(26, 45, '2024-10-24 22:13:13', 'a', 'Read'),
(27, 46, '2024-10-24 22:14:22', 'a', 'Read'),
(28, 47, '2024-10-24 22:16:22', 'comlainttest', 'Read'),
(29, 48, '2024-10-24 22:17:39', 'a', 'Read'),
(30, 49, '2024-10-24 22:19:00', 'a', 'Read'),
(31, 50, '2024-10-24 22:19:43', 'a', 'Read'),
(32, 51, '2024-10-24 22:20:58', 'a', 'Read'),
(33, 52, '2024-10-24 22:23:30', 'a', 'Read'),
(34, 53, '2024-10-24 22:23:43', 'a', 'Read'),
(35, 54, '2024-10-24 22:26:25', 'a', 'Read'),
(36, 55, '2024-10-24 22:26:51', 'a', 'Read');

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
  `email` varchar(255) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `role_ID`, `email`, `password`) VALUES
(1, 1, 'zed@admin.nu-dasma.e', '12345678'),
(202401, 1, 'mtfzed123@admin.nu-dasma.edu.ph', '12341234'),
(202217101, 3, 'abahalla@student', '12341234'),
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
('202401', 'Starboy', '', 'Zedrick');

-- --------------------------------------------------------

--
-- Table structure for table `violation`
--

CREATE TABLE `violation` (
  `violation_ID` int(11) NOT NULL,
  `severity_ID` int(11) DEFAULT NULL,
  `violationType_ID` int(50) DEFAULT NULL,
  `violation_Date` datetime DEFAULT current_timestamp(),
  `violationDetail_ID` int(11) NOT NULL,
  `violator_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `violation`
--

INSERT INTO `violation` (`violation_ID`, `severity_ID`, `violationType_ID`, `violation_Date`, `violationDetail_ID`, `violator_ID`) VALUES
(1, 1, 1, '2024-10-21 18:24:14', 34, 202217101);

-- --------------------------------------------------------

--
-- Table structure for table `violationreport`
--

CREATE TABLE `violationreport` (
  `violationReportID` int(11) NOT NULL,
  `reportID` int(11) NOT NULL,
  `violationTypeID` int(11) NOT NULL,
  `accusedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `violationreport`
--

INSERT INTO `violationreport` (`violationReportID`, `reportID`, `violationTypeID`, `accusedID`) VALUES
(5, 34, 1, 2022171101),
(6, 35, 2, 2022171101),
(7, 36, 2, 2022171101),
(8, 37, 1, 202217101),
(9, 39, 4, 2022171101),
(10, 40, 1, 202217101),
(11, 43, 2, 202217101),
(12, 53, 1, 202217101);

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
-- Indexes for table `complainsreport`
--
ALTER TABLE `complainsreport`
  ADD PRIMARY KEY (`cr_ID`),
  ADD KEY `cr_Category_fk` (`cr_Category`),
  ADD KEY `reportID_fk` (`reportID`);

--
-- Indexes for table `complains_category`
--
ALTER TABLE `complains_category`
  ADD PRIMARY KEY (`ccID`);

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
  ADD KEY `fk_reportOwnerID` (`reportOwnerID`) USING BTREE;

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
  ADD KEY `violationDetail_ID` (`violationDetail_ID`),
  ADD KEY `violatorID_fk` (`violator_ID`);

--
-- Indexes for table `violationreport`
--
ALTER TABLE `violationreport`
  ADD PRIMARY KEY (`violationReportID`),
  ADD KEY `reportID_fk_violation` (`reportID`),
  ADD KEY `violationType_fk` (`violationTypeID`),
  ADD KEY `accusedID_fk_violation` (`accusedID`);

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
  MODIFY `attachmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `complainsreport`
--
ALTER TABLE `complainsreport`
  MODIFY `cr_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `complains_category`
--
ALTER TABLE `complains_category`
  MODIFY `ccID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2022171001;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `reportstatus`
--
ALTER TABLE `reportstatus`
  MODIFY `status_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `violation_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `violationreport`
--
ALTER TABLE `violationreport`
  MODIFY `violationReportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- Constraints for table `complainsreport`
--
ALTER TABLE `complainsreport`
  ADD CONSTRAINT `cr_Category_fk` FOREIGN KEY (`cr_Category`) REFERENCES `complains_category` (`ccID`),
  ADD CONSTRAINT `reportID_fk` FOREIGN KEY (`reportID`) REFERENCES `report` (`report_ID`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`fac_id`) REFERENCES `user` (`user_ID`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `fk_reportOwnerID` FOREIGN KEY (`reportOwnerID`) REFERENCES `user` (`user_ID`);

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
  ADD CONSTRAINT `violation_ibfk_1` FOREIGN KEY (`severity_ID`) REFERENCES `severity` (`severity_ID`),
  ADD CONSTRAINT `violatorID_fk` FOREIGN KEY (`violator_ID`) REFERENCES `user` (`user_ID`);

--
-- Constraints for table `violationreport`
--
ALTER TABLE `violationreport`
  ADD CONSTRAINT `accusedID_fk_violation` FOREIGN KEY (`accusedID`) REFERENCES `user` (`user_ID`),
  ADD CONSTRAINT `reportID_fk_violation` FOREIGN KEY (`reportID`) REFERENCES `report` (`report_ID`),
  ADD CONSTRAINT `violationType_fk` FOREIGN KEY (`violationTypeID`) REFERENCES `violationtype` (`violationType_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
