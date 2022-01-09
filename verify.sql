-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 09:10 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `verify`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_documents`
--

CREATE TABLE `applicant_documents` (
  `Document_id` int(11) NOT NULL,
  `Document_name` varchar(100) NOT NULL,
  `Document_ref` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `Document_Job_file` varchar(50) NOT NULL DEFAULT 'file',
  `Document_verification_status` varchar(15) NOT NULL DEFAULT 'UNVERIFIED',
  `Document_Job_Application_id` int(11) NOT NULL,
  `Document_University_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `Employer_id` int(11) NOT NULL,
  `Employer_name` varchar(50) NOT NULL,
  `Employer_email` varchar(50) NOT NULL,
  `Employer_mobile_number` varchar(15) NOT NULL,
  `Employer_physical_address` varchar(20) NOT NULL,
  `Employer_Login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `Job_id` int(11) NOT NULL,
  `Job_Description` text NOT NULL,
  `Job_Ref_no` varchar(15) NOT NULL,
  `Job_application_end_date` date NOT NULL,
  `Job_Employer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_applicant`
--

CREATE TABLE `job_applicant` (
  `Applicant_id` int(11) NOT NULL,
  `Applicant_name` varchar(50) NOT NULL,
  `Applicant_email` varchar(50) NOT NULL,
  `Applicant_mobile_number` varchar(15) NOT NULL,
  `Applicant_national_id` varchar(20) NOT NULL,
  `Applicant_login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `Job_Appliction_id` int(11) NOT NULL,
  `Job_Appliction_date` datetime NOT NULL DEFAULT current_timestamp(),
  `Job_Appliction_Applicant_id` int(11) NOT NULL,
  `Job_Appliction_Job_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Login_id` int(11) NOT NULL,
  `Login_user_name` varchar(50) NOT NULL,
  `Login_password` varchar(300) NOT NULL,
  `Login_rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `University_id` int(11) NOT NULL,
  `University_name` varchar(100) NOT NULL,
  `University_type` varchar(50) NOT NULL,
  `University_mobile` varchar(15) NOT NULL,
  `University_email` varchar(50) NOT NULL,
  `University_physical_location` varchar(20) DEFAULT NULL,
  `University_desc` text DEFAULT NULL,
  `University_login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `verification_payments`
--

CREATE TABLE `verification_payments` (
  `Payment_id` int(11) NOT NULL,
  `Payment_date` date NOT NULL DEFAULT current_timestamp(),
  `Payment_mode` varchar(50) NOT NULL DEFAULT 'MPESA',
  `Payment_ref` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `Payment_amount` int(11) NOT NULL DEFAULT 50,
  `Payment_Verification_Request_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `verification_requests`
--

CREATE TABLE `verification_requests` (
  `Verification_Request_id` int(11) NOT NULL,
  `Verification_Request_Date` date NOT NULL DEFAULT current_timestamp(),
  `Verification_Request_Document_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `verification_response`
--

CREATE TABLE `verification_response` (
  `Verification_Response_id` int(11) NOT NULL,
  `Verification_Response_date` date NOT NULL DEFAULT current_timestamp(),
  `Verification_Response_comment` text NOT NULL,
  `Verification_Response_Document_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_documents`
--
ALTER TABLE `applicant_documents`
  ADD PRIMARY KEY (`Document_id`),
  ADD KEY `Document_Job_Application_id` (`Document_Job_Application_id`),
  ADD KEY `Document_University_id` (`Document_University_id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`Employer_id`),
  ADD KEY `Employer_Login_id` (`Employer_Login_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`Job_id`),
  ADD KEY `Job_Employer_id` (`Job_Employer_id`);

--
-- Indexes for table `job_applicant`
--
ALTER TABLE `job_applicant`
  ADD PRIMARY KEY (`Applicant_id`),
  ADD KEY `Applicant_login_id` (`Applicant_login_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`Job_Appliction_id`),
  ADD KEY `Job_Appliction_Applicant_id` (`Job_Appliction_Applicant_id`),
  ADD KEY `job_applications_ibfk_2` (`Job_Appliction_Job_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Login_id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`University_id`),
  ADD KEY `University_login_id` (`University_login_id`);

--
-- Indexes for table `verification_payments`
--
ALTER TABLE `verification_payments`
  ADD PRIMARY KEY (`Payment_id`),
  ADD KEY `Payment_Verification_Request_id` (`Payment_Verification_Request_id`);

--
-- Indexes for table `verification_requests`
--
ALTER TABLE `verification_requests`
  ADD PRIMARY KEY (`Verification_Request_id`),
  ADD KEY `Verification_Request_Document_id` (`Verification_Request_Document_id`);

--
-- Indexes for table `verification_response`
--
ALTER TABLE `verification_response`
  ADD PRIMARY KEY (`Verification_Response_id`),
  ADD KEY `Verification_Response_Document_id` (`Verification_Response_Document_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_documents`
--
ALTER TABLE `applicant_documents`
  MODIFY `Document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `Employer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `Job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `job_applicant`
--
ALTER TABLE `job_applicant`
  MODIFY `Applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `Job_Appliction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `University_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `verification_payments`
--
ALTER TABLE `verification_payments`
  MODIFY `Payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `verification_requests`
--
ALTER TABLE `verification_requests`
  MODIFY `Verification_Request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `verification_response`
--
ALTER TABLE `verification_response`
  MODIFY `Verification_Response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant_documents`
--
ALTER TABLE `applicant_documents`
  ADD CONSTRAINT `applicant_documents_ibfk_1` FOREIGN KEY (`Document_Job_Application_id`) REFERENCES `job_applications` (`Job_Appliction_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_documents_ibfk_2` FOREIGN KEY (`Document_University_id`) REFERENCES `university` (`University_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employer`
--
ALTER TABLE `employer`
  ADD CONSTRAINT `employer_ibfk_1` FOREIGN KEY (`Employer_Login_id`) REFERENCES `login` (`Login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`Job_Employer_id`) REFERENCES `employer` (`Employer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_applicant`
--
ALTER TABLE `job_applicant`
  ADD CONSTRAINT `job_applicant_ibfk_1` FOREIGN KEY (`Applicant_login_id`) REFERENCES `login` (`Login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_ibfk_1` FOREIGN KEY (`Job_Appliction_Applicant_id`) REFERENCES `job_applicant` (`Applicant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_applications_ibfk_2` FOREIGN KEY (`Job_Appliction_Job_id`) REFERENCES `job` (`Job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `university`
--
ALTER TABLE `university`
  ADD CONSTRAINT `university_ibfk_1` FOREIGN KEY (`University_login_id`) REFERENCES `login` (`Login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verification_payments`
--
ALTER TABLE `verification_payments`
  ADD CONSTRAINT `verification_payments_ibfk_1` FOREIGN KEY (`Payment_Verification_Request_id`) REFERENCES `verification_requests` (`Verification_Request_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verification_requests`
--
ALTER TABLE `verification_requests`
  ADD CONSTRAINT `verification_requests_ibfk_1` FOREIGN KEY (`Verification_Request_Document_id`) REFERENCES `applicant_documents` (`Document_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verification_response`
--
ALTER TABLE `verification_response`
  ADD CONSTRAINT `verification_response_ibfk_1` FOREIGN KEY (`Verification_Response_Document_id`) REFERENCES `applicant_documents` (`Document_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
