-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2022 at 11:56 AM
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
(5, 44, 'B+', 'Nothing', 20, 20, 20, 235, '2022-04-15', '2022-07-26'),
(7, 36, 'A+', 'Nothing', 10, 10, 10, 433, '2022-04-15', '2022-03-31'),
(9, 46, 'A+', 'Nothing', 32, 343, 433, 433, '2022-03-09', '2022-03-07'),
(13, 53, 'AB+', 'Nothing', 1231, 12312, 213, 433, '2022-05-04', '2022-05-06'),
(14, 48, 'A+', 'Nothing', 453, 3534, 3453, 450, '2022-05-26', '2022-06-11');

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
(11, 1, 'A+', 300, 'Approved', '31231', '2022-05-06');

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
(23, 7, 'hi', 'How can i donate blood', '2022-05-04'),
(24, 7, 'hi', 'I am checking my project', '2022-05-04'),
(25, 7, 'hi', 'How are you boss!', '2022-05-04'),
(26, 7, 'hi', 'You are really a programer,Aren\'t you?', '2022-05-04');

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
(36, 3, 'Doctor', 'Nothing', 45, 10, 10, 10, 10, '2022-04-23', 'Approved'),
(44, 2, 'Teacher', 'Nothing', 32, 25, 0, 20, 20, '2022-04-26', 'Approved'),
(46, 7, 'Software progra', 'Nothing', 56, 10, 10, 10, 10, '2022-05-03', 'Approved'),
(47, 7, 'Teacher', 'Nothing', 55, 10, 10, 10, 10, '2022-05-04', 'Approved'),
(48, 3, 'Teacher', 'Nothing', 66, 10, 10, 10, 10, '2022-05-04', 'Approved'),
(53, 11, 'Doctor', 'Nothing', 55, 10, 10, 10, 10, '2022-05-04', 'Approved');

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
  `event_name` varchar(15) NOT NULL,
  `event_place` varchar(15) NOT NULL,
  `event_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_place`, `event_date`) VALUES
(2, 'Siem', 'Assosa', '2022-05-06 02:06:06');

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
(5, 11, 'Homosha Hospital', 'Benshangul', 'Homosha', 'Homosha', '+25195254552', '2022-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `bs_id` int(15) NOT NULL,
  `Ap` int(20) NOT NULL,
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

INSERT INTO `stock` (`bs_id`, `Ap`, `An`, `Bp`, `Bn`, `ABp`, `ABn`, `Op`, `On`) VALUES
(1, 150, 0, 235, 0, 433, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(15) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `age` int(10) NOT NULL,
  `sex` text NOT NULL,
  `address` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `account_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `age`, `sex`, `address`, `dob`, `mobile`, `email`, `password`, `created_at`, `account_type`) VALUES
(2, 'haile', 'Gebrehiwet', 0, '', 'Gebrehiwet', '0000-00-00', '0987767675', 'teacher@demo.com', 'ss', '2022-04-19', 'nurse'),
(3, 'Lula', 'Siem', 19, '', 'adwa', '2022-04-01', '9898678687', 'admin@gmail.com', '9720e99be3f6516ce509957c73a70db2', '2022-04-19', 'donor'),
(7, 'Siem', 'Gebrehiwet', 25, 'Male', 'Assosa', '2021-09-09', '251953506407', 'siemghiwet@gmail.com', '306d3c08404a170ad546976a53a5c98a', '2022-05-01', 'admin'),
(11, 'Hiwet', 'Godefay', 23, 'Female', 'Assosa', '2022-05-04', '251953506409', 'hiwet@hiwet.com', '5bcb8bbe011705bdd0e18a444cdd7673', '2022-05-04', 'admin');

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
  ADD PRIMARY KEY (`event_id`);

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
  ADD PRIMARY KEY (`bs_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `blood_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  MODIFY `br_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `donor_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `donor_history`
--
ALTER TABLE `donor_history`
  MODIFY `dr_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `h_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `bs_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- Constraints for table `hospital`
--
ALTER TABLE `hospital`
  ADD CONSTRAINT `hospital_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
