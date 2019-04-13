-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2019 at 04:01 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartmcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `id` int(11) NOT NULL,
  `fName` varchar(100) NOT NULL,
  `lName` varchar(100) NOT NULL,
  `gender` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `bdate` date NOT NULL,
  `file_name` varchar(2000) NOT NULL,
  `file_ext` varchar(100) NOT NULL,
  `reg_date` varchar(1000) NOT NULL,
  `upd_date` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`id`, `fName`, `lName`, `gender`, `email`, `mobile`, `password`, `address`, `bdate`, `file_name`, `file_ext`, `reg_date`, `upd_date`) VALUES
(1, 'Mohamed', 'ElShafeey', 'Male', 'Mohamed@gmail.com', '01001234567', '123456789', 'Zag', '2019-02-20', '0', 'png', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `available_dates`
--

CREATE TABLE `available_dates` (
  `id` int(11) NOT NULL,
  `doctor_id` text NOT NULL,
  `date` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `available_dates`
--

INSERT INTO `available_dates` (`id`, `doctor_id`, `date`, `time`) VALUES
(7, '1', '2019-23-06', '09:00'),
(9, '1', '2019-23-05', '10:00'),
(11, '3', '2019-20-50', '04:00'),
(12, '2', '2019-05-05', '04:30'),
(15, '3', '2019-10-10', '11:11'),
(16, '4', '2019-03-01', '01:59'),
(17, '1', '2019-24-05', '07:00'),
(18, '2', '2019-07-05', '05:30'),
(19, '4', '2019-03-02', '03:59');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `specialization` text NOT NULL,
  `info` text NOT NULL,
  `file_name` varchar(2000) NOT NULL,
  `file_ext` varchar(100) NOT NULL,
  `working_time` text NOT NULL,
  `location_map` text NOT NULL,
  `location_text` text NOT NULL,
  `phones` text NOT NULL,
  `fees` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `specialization`, `info`, `file_name`, `file_ext`, `working_time`, `location_map`, `location_text`, `phones`, `fees`) VALUES
(1, 'Mahmod Saber', 'dermatology', 'The fucking best', '1', 'jpg', '02:00 - 10:00', '30.291379,31.752386', '10 street fuck', '01140378889', '200'),
(2, 'Manar Mousa', 'surgery', 'whatever', '2', 'jpg', '12:00 - 12:00', '30.291379,31.752386', 'Cairo', '01005475621', '120'),
(3, 'Hassan Abdellah', 'Ophthalmology ', 'Number one', '0', 'jpg', '02:00 - 10:00', '', 'Zagazig', '01068478576', '150'),
(4, 'khaled Elfaramwy', 'dermatology', 'Elfager', '3', 'png', '08:30 - 10:00', '', 'Portsaid', '01224103249', '145');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(11) NOT NULL,
  `fName` varchar(100) NOT NULL,
  `lName` varchar(100) NOT NULL,
  `gender` enum('0','1') NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `bdate` date NOT NULL,
  `file_name` varchar(2000) NOT NULL,
  `file_ext` varchar(100) NOT NULL,
  `reg_date` varchar(1000) NOT NULL,
  `upd_date` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `fName`, `lName`, `gender`, `email`, `mobile`, `password`, `address`, `bdate`, `file_name`, `file_ext`, `reg_date`, `upd_date`) VALUES
(65, 'John', 'Medhat', '0', 'john@gmail.com', '01224103249', '123456789', 'dsfsdfdsfsdf', '1996-03-14', '1555161923', 'jpeg', '2019-02-06 02:31:02am', '2019-02-06 02:31:02am'),
(66, 'Hassan', 'Abdellah', '0', 'hassan.abdellah1995@gmail.com', '01068478576', '123456789', 'Cairo', '1995-11-28', '1550024490', 'jpeg', '2019-02-06 02:31:51am', '2019-02-13 04:21:30am'),
(67, 'Khadija', 'Essa', '1', 'trtr_20102@yahoo.com', '01224103248', '123456789', 'Fayoum', '1997-11-05', '1549413168', 'jpeg', '2019-02-06 02:32:48am', '2019-02-06 02:32:48am'),
(68, 'Ahmed', 'Samy', '0', 'trtr_2010@yahoo.com', '01224565784', '123456789', 'Zagazig', '1996-03-21', '1549565821', 'jpeg', '2019-02-07 08:57:01pm', '2019-02-07 08:57:01pm'),
(69, 'Moataz', 'Mohsen', '0', 'momo@gmail.com', '01551234567', '123456789', 'sjsdfsdnf', '1989-01-01', '1555155547', 'jpeg', '2019-04-13 01:39:07pm', '2019-04-13 01:39:07pm'),
(70, 'Mona', 'Zaki', '1', 'mona@gmail.com', '01224103249', '123456789', 'adasdasd', '2005-12-27', '1555155811', 'jpeg', '2019-04-13 01:43:31pm', '2019-04-13 01:43:31pm'),
(72, 'Raechel', 'Green', '1', 'Rech@gmail.com', '01224103249', '123456789', 'dsfsdfsd', '1970-11-25', '1555156267', 'jpeg', '2019-04-13 01:51:07pm', '2019-04-13 01:51:07pm');

-- --------------------------------------------------------

--
-- Table structure for table `user_reservation`
--

CREATE TABLE `user_reservation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` text NOT NULL,
  `time` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_reservation`
--

INSERT INTO `user_reservation` (`id`, `user_id`, `doctor_id`, `date`, `time`, `status`) VALUES
(132, 66, 1, '02/02/2019', '12:00', 1),
(133, 66, 2, '02/03/2019', '01:00', 1),
(134, 66, 3, '01/02/2019', '05:00', 1),
(135, 67, 1, '02/02/2019', '11:00', 1),
(136, 68, 2, '02/03/2019', '01:00', 1),
(137, 67, 3, '01/02/2019', '05:00', 1),
(138, 65, 4, '02/02/2019', '05:00', 1),
(139, 65, 1, '02/03/2019', '06:00', 1),
(140, 68, 4, '01/02/2019', '02:00', 1),
(143, 65, 4, '01/02/2019', '05:00', 1),
(163, 66, 3, '2019-03-02', '17:00', 1),
(164, 66, 3, '2019-09-11', '15:30', 1),
(166, 66, 2, '2019-08-01', '00:00', 1),
(167, 66, 4, '2019-10-06', '14:00', 1),
(168, 68, 1, '2019-03-21', '13:30', 1),
(190, 66, 1, '2019-23-05', '12:00', 1),
(191, 66, 4, '2019-03-02', '00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admininfo`
--
ALTER TABLE `admininfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `available_dates`
--
ALTER TABLE `available_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reservation`
--
ALTER TABLE `user_reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admininfo`
--
ALTER TABLE `admininfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `available_dates`
--
ALTER TABLE `available_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `user_reservation`
--
ALTER TABLE `user_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
