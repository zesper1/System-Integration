-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2024 at 07:45 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complainsreport`
--

CREATE TABLE `complainsreport` (
  `cr_ID` int(11) NOT NULL,
  `reportID` int(11) NOT NULL,
  `cr_Category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complains_category`
--

CREATE TABLE `complains_category` (
  `ccID` int(11) NOT NULL,
  `ccName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `schoolID` int(11) NOT NULL,
  `courseName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_verifications`
--

CREATE TABLE `email_verifications` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fac_id` int(11) NOT NULL,
  `facultyname` varchar(50) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `reportstatus`
--

CREATE TABLE `reportstatus` (
  `status_ID` int(11) NOT NULL,
  `reportID` int(11) NOT NULL,
  `status_DATE` datetime DEFAULT current_timestamp(),
  `status_DETAILS` varchar(255) DEFAULT NULL,
  `status` enum('Read','Unread') NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(3, 'Student\r\n'),
(4, 'Super Admin\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `SchoolName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `sectionName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2022171109, 4, 'sdaonud@gmail.com', '12341234');

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
('2022171109', 'Admin 1', '', '');

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
(6, 'nakabusangot');

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
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course` (`schoolID`);

--
-- Indexes for table `email_verifications`
--
ALTER TABLE `email_verifications`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course_section` (`course`);

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
  MODIFY `attachmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email_verifications`
--
ALTER TABLE `email_verifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2022171001;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `reportstatus`
--
ALTER TABLE `reportstatus`
  MODIFY `status_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `severity`
--
ALTER TABLE `severity`
  MODIFY `severity_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2022171109;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2022171110;

--
-- AUTO_INCREMENT for table `violation`
--
ALTER TABLE `violation`
  MODIFY `violation_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `violationreport`
--
ALTER TABLE `violationreport`
  MODIFY `violationReportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `violationtype`
--
ALTER TABLE `violationtype`
  MODIFY `violationType_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_course` FOREIGN KEY (`schoolID`) REFERENCES `school` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `fk_course_section` FOREIGN KEY (`course`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
