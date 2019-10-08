-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2017 at 06:07 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `name_of_doctor` text NOT NULL,
  `alert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`id`, `message`, `name_of_doctor`, `alert_date`) VALUES
(30, 'there is a strange disease', 'igbinobaebenezer@gmail.com', '2017-05-05 00:05:25'),
(33, 'Good Job', 'igbinobaebenezer@gmail.com', '2017-05-20 09:27:05'),
(34, 'charger', 'igbinobaebenezer@gmail.com', '2017-05-20 09:31:14'),
(35, 'Nice stuff', 'igbinobaebenezer@gmail.com', '2017-05-20 09:56:19'),
(36, 'Thers is a cock croach', 'igbinobaebenezer@gmail.com', '2017-05-25 04:15:58'),
(0, 'hey man', 'bosun@gmail.com', '2017-06-06 11:50:41'),
(0, 'Shit', 'bosun@gmail.com', '2017-06-06 00:50:20'),
(0, 'Mr sam is here with me', 'bosun@gmail.com', '2017-06-06 11:21:54'),
(0, 'Daniel is Arround', 'bosun@gmail.com', '2017-06-13 08:24:28'),
(0, 'There is an outbreak of diseases', 'bosun@gmail.com', '2017-06-26 11:16:29'),
(0, 'i need ', 'bosun@gmail.com', '2017-06-26 06:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `appointment` text NOT NULL,
  `appointment_date` varchar(200) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reply` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `user_id`, `status`, `appointment`, `appointment_date`, `date_sent`, `reply`) VALUES
(110, 175, 'Approved', 'Brain', '06/16/2017', '2017-06-27 15:15:57', ' Nioce'),
(111, 189, 'Approve', 'Nice job', '06/08/2017', '2017-06-27 15:53:27', ' Fool'),
(112, 189, 'Approve', 'Yeep!', '06/16/2017', '2017-06-27 11:48:17', '');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `msg_id` int(11) NOT NULL,
  `sender` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`msg_id`, `sender`, `message`, `role`) VALUES
(78, 'paul paul', 'I Love this', ''),
(80, 'Donbay Ekwenem', 'Hey', 'Patient'),
(84, 'paul paul', 'hello doctor', ''),
(85, 'Medical Professional', 'how are you doing today', '');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_report`
--

CREATE TABLE `emergency_report` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `report` varchar(1000) NOT NULL,
  `emergency_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reply` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergency_report`
--

INSERT INTO `emergency_report` (`id`, `user_id`, `name`, `report`, `emergency_date`, `reply`) VALUES
(62, 185, 'Oladipupo  Suleyat', 'OIL', '2017-06-21 15:54:58', ' I need slight'),
(63, 175, 'Rat  Rattus', 'I need a drug', '2017-06-27 15:47:27', '');

-- --------------------------------------------------------

--
-- Table structure for table `medical_profile`
--

CREATE TABLE `medical_profile` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `Location` varchar(300) NOT NULL,
  `document` text NOT NULL,
  `age` varchar(200) NOT NULL,
  `height` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `weight` varchar(200) NOT NULL,
  `sickness` varchar(200) NOT NULL,
  `last_visit` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_profile`
--

INSERT INTO `medical_profile` (`user_id`, `first_name`, `last_name`, `phone`, `Location`, `document`, `age`, `height`, `user`, `email`, `weight`, `sickness`, `last_visit`) VALUES
(221, 'Rat', ' Rattus', '08182320479', 'CUCRID', '5.jpg', '4yrs', '4yrs', 'Rat  Rattus', 'rat@gmail.com', ' 4yrs', '06/14/2017', 'Fine'),
(222, 'paul', ' paul', '08034280892', 'PG Hall', 'modern-certificate-_1035-8151.jpg', '30yrs', '30yrs', 'paul  paul', 'paul@gmail.com', '30kg', '06/15/2017', 'Malaria'),
(229, '', '', '', '', '', '10000yrs', '10000cm', '', 'flash@gmail.com', '10000kg', '', 'Typhoid'),
(230, 'Gbenga ', 'Adeniyi', '08182320479', 'CUCRID', '', '', '', '', '', '', '', ''),
(231, 'Charles', 'Ayo', '08182320479', 'CUCRID', '', '', '', '', '', '', '', ''),
(234, 'Donbay', 'Ekwenem', '08182320479', 'CUCRID', 'geometric-business-report-template_1146-124.jpg', '101yrs', '101yrs', '', 'donbay@gmail.com', '101kg', '06/14/2017', 'Null'),
(239, 'Darlene', 'zeche', '08182320479', 'CUCRID', 'armaganvideos-thumb.jpg', '41yrs', '41yrs', '', 'darlene@yahoo.com', '41yrs', '06/28/2017', 'Malaria'),
(240, 'Ramota', 'Suleyat', '08182320479', 'CUCRID', 'white-polo-shirt-collection_23-2147629179.jpg', '3yrs', '3yrs', '', 'ramota@yahoomail.com', '3yrs', '06/14/2017', 'Malaria & Typhoid'),
(241, 'Shoyemi', 'Ogunvadejho', '08034280892', 'PG', 'Lighthouse.jpg', '100000000yrs', '100000000cm', '', 'shoyemi@gmail.com', '1000000kg', '06/08/2017', 'Malaira'),
(242, 'Kayode', 'Rotmas', '8182320479', 'CUCRID', '', '', '', '', 'kayode@gmail.com', '', '', ''),
(243, 'Bucky', 'Alao', '09032099139', 'CU', '', '', '', '', 'buky@gmail.com', '', '', ''),
(244, 'Segun', 'Igbinoba', '8182320479', 'CUCRID', 'Capture.PNG', '30yrs', '30yrs', '', 'segun@gmail.com', '30yrs', '06/14/2017', 'Malaria'),
(245, 'David', 'Arausi', '08182320479', 'CUCRID', 'IMG_6560.JPG', '18yrs', '18cm', '', 'david@gmail.com', '18kg', '06/19/2017', 'Sharp memory'),
(246, 'Funmilayo', 'Ogunmo', '8182320479', 'Hebrojn Startup Labs', '', '', '', '', 'funmi@gmail.com', '', '', ''),
(247, 'Funmilayo', 'Ogunmo', '08182320479', 'Hebron Labs', '', '', '', '', 'funmi@gmail.com', '', '', ''),
(248, 'Oladipupo', 'Suleyat', '08182320479', 'CU', 'a.PNG', '30yrs', '30cm', '', 'oladipupo@gmail.com', '70kg', '06/08/2017', 'Malaria & Typhoid'),
(249, 'sand', 'sand', '08173407497', 'CSIS', '', '', '', '', 'sand@t.com', '', '', ''),
(250, 'Paper', 'paper', '08182320479', 'wv', '', '', '', '', 'paper@gmail.com', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `medica_confirmation`
--

CREATE TABLE `medica_confirmation` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `medical_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medica_confirmation`
--

INSERT INTO `medica_confirmation` (`id`, `name`, `medical_id`, `email`) VALUES
(41, 'Lizard Lizard', 3, 'lizard@gmail.com'),
(42, 'Rodent rat', 4, 'rodent@gmail.com'),
(43, 'Flash Dog', 5, 'flash@gmail.com'),
(44, 'Ayo Oluwabusola', 6, 'ayo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request` text NOT NULL,
  `status` text NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reply` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `request`, `status`, `request_date`, `reply`) VALUES
(116, 185, 'Fool', 'Approve', '2017-06-26 17:26:34', ' I need you to come'),
(117, 185, 'Cover', 'Approved', '2017-06-26 17:59:14', ' Yay'),
(118, 189, 'I Love this', 'Approved', '2017-06-26 19:11:38', ' yes'),
(119, 189, 'I love life', 'Approved', '2017-06-26 17:13:44', ''),
(120, 189, 'I love life', 'Approved', '2017-06-27 15:55:19', ' yeah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `Location` text NOT NULL,
  `role` text NOT NULL,
  `medical_id` varchar(1000) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `alert` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `Location`, `role`, `medical_id`, `phone`, `email`, `password`, `alert`) VALUES
(174, 'bosun', 'bosun', '', 'Medical Professional', '', '08182320479', 'bosun@gmail.com', 'bosun', ''),
(175, 'Rat', 'Rattus', 'CUCRID', 'Patient', '', '08182320479', 'rat@gmail.com', 'rat', 'God is Love'),
(184, 'Funmilayo', 'Ogunmo', 'Hebron Labs', 'Patient', '95', '08182320479', 'funmi@gmail.com', 'funmi', 'God is Love'),
(185, 'Oladipupo', 'Suleyat', 'CU', 'Patient', '54', '08182320479', 'oladipupo@gmail.com', 'oladipupo', 'God is Love'),
(189, 'sand', 'sand', 'CSIS', 'Patient', '44', '08173407497', 'sand@t.com', 'sand', 'hewl'),
(190, 'Paper', 'paper', 'wv', 'Patient', '54', '08182320479', 'paper@gmail.com', 'paper', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `emergency_report`
--
ALTER TABLE `emergency_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_profile`
--
ALTER TABLE `medical_profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `medica_confirmation`
--
ALTER TABLE `medica_confirmation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `emergency_report`
--
ALTER TABLE `emergency_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `medical_profile`
--
ALTER TABLE `medical_profile`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;
--
-- AUTO_INCREMENT for table `medica_confirmation`
--
ALTER TABLE `medica_confirmation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
