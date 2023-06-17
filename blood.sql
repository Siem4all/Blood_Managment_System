-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 10:38 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `blood_id` int(15) NOT NULL,
  `donor_id` int(15) NOT NULL,
  `blood_type` varchar(15) NOT NULL,
  `disease` varchar(55) DEFAULT NULL,
  `wbc_count` double DEFAULT NULL,
  `rbc_count` double DEFAULT NULL,
  `platelet_count` double DEFAULT NULL,
  `unit` int(15) NOT NULL,
  `recieved_date` date NOT NULL,
  `expiration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`blood_id`, `donor_id`, `blood_type`, `disease`, `wbc_count`, `rbc_count`, `platelet_count`, `unit`, `recieved_date`, `expiration_date`) VALUES
(20, 68, 'A+', 'Nothing', 243, 432, 432, 432, '2022-05-07', '2022-06-12'),
(21, 69, 'AB+', 'HIV', 343, 321, 122, 450, '2022-05-07', '2022-06-12'),
(22, 70, 'B+', 'Nothing', 433, 455, 454, 450, '2022-05-14', '2022-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `bloodrequest`
--

CREATE TABLE `bloodrequest` (
  `br_id` int(15) NOT NULL,
  `h_id` int(15) NOT NULL,
  `blood_type` varchar(3) NOT NULL,
  `unit` int(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `reason` text NOT NULL,
  `requested_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloodrequest`
--

INSERT INTO `bloodrequest` (`br_id`, `h_id`, `blood_type`, `unit`, `status`, `reason`, `requested_date`) VALUES
(1, 1, 'A+', 133, 'rejected', '', '2022-04-30'),
(2, 1, 'B+', 23, 'rejected', '', '2022-04-30'),
(3, 1, 'B+', 100, 'rejected', 'We need it urgently', '2022-05-01'),
(4, 2, 'B+', 100, 'rejected', 'dfvd', '2022-05-04'),
(8, 1, 'A+', 111, 'rejected', '11', '2022-05-04'),
(9, 2, 'A+', 12, 'rejected', 'SCac', '2022-05-04'),
(10, 5, 'AB+', 122, 'rejected', '1e1', '2022-05-04'),
(11, 1, 'A+', 300, 'rejected', '31231', '2022-05-06'),
(12, 5, 'B+', 224, 'rejected', 'ares', '2022-05-07'),
(13, 5, 'B+', 10, 'rejected', 'bdzfgdf', '2022-05-07'),
(14, 1, 'B+', 350, 'Approved', 'zdfbvbcv', '2022-05-14'),
(15, 1, 'A+', 32, 'Approved', 'urgently', '2022-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank`
--

CREATE TABLE `blood_bank` (
  `bb_id` int(15) NOT NULL,
  `bb_name` varchar(15) NOT NULL,
  `phone_no` int(15) NOT NULL,
  `bb_address` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_bank`
--

INSERT INTO `blood_bank` (`bb_id`, `bb_name`, `phone_no`, `bb_address`, `email`, `created_at`) VALUES
(1, 'Assosa Blood ba', 509886985, 'Assosa', 'assosabloodbank@emai', '2022-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `user_id`, `subject`, `message`, `date`) VALUES
(22, 7, 'hi', 'ZDFSDF', '2022-05-03'),
(24, 7, 'hi', 'I am checking my project', '2022-05-04'),
(25, 7, 'hi', 'How are you boss!', '2022-05-04'),
(26, 7, 'hi', 'You are really a programer,Aren\'t you?', '2022-05-04'),
(27, 7, 'hi', 'hhhhhhhhhhh', '2022-05-07'),
(28, 7, 'hi', 'hhhhhhhhhhh', '2022-05-07'),
(29, 7, 'hi', 'where can i donate blood?', '2022-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `donor_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `work` varchar(15) NOT NULL,
  `health_status` varchar(55) NOT NULL,
  `wieght` int(6) NOT NULL,
  `b_pressure` int(15) NOT NULL,
  `r_rate` double NOT NULL,
  `pulse` int(15) NOT NULL,
  `temp` double NOT NULL,
  `date` date NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`donor_id`, `user_id`, `work`, `health_status`, `wieght`, `b_pressure`, `r_rate`, `pulse`, `temp`, `date`, `status`) VALUES
(68, 7, 'Teacher', 'nothing', 56, 10, 10, 10, 10, '2022-05-07', 'Approved'),
(69, 11, 'Teacher', 'nothing', 455, 10, 10, 10, 10, '2022-05-07', 'Approved'),
(70, 12, 'Teacher', 'nothing', 66, 10, 10, 10, 10, '2022-05-14', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `donor_history`
--

CREATE TABLE `donor_history` (
  `dr_id` int(15) NOT NULL,
  `donor_id` int(15) NOT NULL,
  `blood_type` varchar(3) DEFAULT NULL,
  `disease` varchar(55) DEFAULT NULL,
  `unit` double DEFAULT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_history`
--

INSERT INTO `donor_history` (`dr_id`, `donor_id`, `blood_type`, `disease`, `unit`, `date`) VALUES
(1, 45, '---', '', 231, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(15) NOT NULL,
  `bb_id` int(15) NOT NULL,
  `event_name` varchar(15) NOT NULL,
  `event_place` varchar(15) NOT NULL,
  `event_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `bb_id`, `event_name`, `event_place`, `event_date`) VALUES
(2, 1, 'Homosha Hospita', 'Assosa', '2022-05-28 05:06:00'),
(8, 1, 'Blood donation', 'Assosa', '2022-05-28 02:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `h_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `h_name` varchar(25) NOT NULL,
  `region` varchar(20) NOT NULL,
  `wereda` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `h_phone` varchar(18) NOT NULL,
  `h_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`h_id`, `user_id`, `h_name`, `region`, `wereda`, `city`, `h_phone`, `h_date`) VALUES
(1, 2, 'Assosa Hospital', 'Benshangul', 'Assosa', 'assosa', '+25195254552', '2022-04-27'),
(2, 3, 'Banbasi hospital', 'Benshangul', 'Banbasi', 'banbasi', '+25195254552', '2022-05-04'),
(5, 11, 'Homosha Hospital', 'Benshangul', 'Homosha', 'Homosha', '+25195254552', '2022-05-04'),
(6, 12, 'mendia Hospital', 'Benshangul', 'Homosha', 'Homosha', '+25195254556', '2022-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `bs_id` int(15) NOT NULL,
  `Ap` int(20) NOT NULL,
  `bb_id` int(20) NOT NULL,
  `An` int(20) NOT NULL,
  `Bp` int(15) NOT NULL,
  `Bn` int(15) NOT NULL,
  `ABp` int(15) NOT NULL,
  `ABn` int(15) NOT NULL,
  `Op` int(15) NOT NULL,
  `On` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`bs_id`, `Ap`, `bb_id`, `An`, `Bp`, `Bn`, `ABp`, `ABn`, `Op`, `On`) VALUES
(1, 400, 1, 0, 100, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(15) NOT NULL,
  `bb_id` int(15) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `age` int(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `address` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `account_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `bb_id`, `fname`, `lname`, `age`, `sex`, `address`, `dob`, `mobile`, `email`, `password`, `created_at`, `account_type`) VALUES
(2, 1, 'haile', 'Gebrehiwet', 0, '', 'Gebrehiwet', '0000-00-00', '0987767675', 'teacher@demo.com', 'ss', '2022-04-19', 'nurse'),
(3, 1, 'Lula', 'Siem', 19, '', 'adwa', '2022-04-01', '9898678687', 'admin@gmail.com', '9720e99be3f6516ce509957c73a70db2', '2022-04-19', 'donor'),
(7, 1, 'Admin', 'Man', 25, 'Male', 'Assosa', '2021-09-09', '251953506407', 'siemghiwet@gmail.com', 'e4bd814b7e1b7edb1ce5681fe52d3958', '2022-05-01', 'admin'),
(11, 1, 'Hiwet', 'Godefay', 23, 'Female', 'Assosa', '2022-05-04', '251953506409', 'hiwet@hiwet.com', '5bcb8bbe011705bdd0e18a444cdd7673', '2022-05-04', 'admin'),
(12, 1, 'Wubalem', 'Aweke', 18, 'Female', 'Assosa', '1990-05-01', '251953506411', 'wubalem@asu.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-07', 'hospital');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`blood_id`),
  ADD KEY `donor_id` (`donor_id`);

--
-- Indexes for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  ADD PRIMARY KEY (`br_id`),
  ADD KEY `h_id` (`h_id`);

--
-- Indexes for table `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD PRIMARY KEY (`bb_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`donor_id`),
  ADD KEY `donor_ibfk_1` (`user_id`);

--
-- Indexes for table `donor_history`
--
ALTER TABLE `donor_history`
  ADD PRIMARY KEY (`dr_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `bb_id` (`bb_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`h_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`bs_id`),
  ADD KEY `bb_id` (`bb_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `bb_id` (`bb_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `blood_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  MODIFY `br_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `donor_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `donor_history`
--
ALTER TABLE `donor_history`
  MODIFY `dr_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `h_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `bs_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood`
--
ALTER TABLE `blood`
  ADD CONSTRAINT `blood_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`donor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  ADD CONSTRAINT `bloodrequest_ibfk_1` FOREIGN KEY (`h_id`) REFERENCES `hospital` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donors`
--
ALTER TABLE `donors`
  ADD CONSTRAINT `donors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`bb_id`) REFERENCES `blood_bank` (`bb_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hospital`
--
ALTER TABLE `hospital`
  ADD CONSTRAINT `hospital_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`bb_id`) REFERENCES `blood_bank` (`bb_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`bb_id`) REFERENCES `blood_bank` (`bb_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
