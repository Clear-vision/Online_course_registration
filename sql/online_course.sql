-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2020 at 02:41 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_course`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '$2y$10$Ikc9qujOT/dwwKBrxf5KceqtLalcD3SqQOBeVzebx6VSIgIJDyB8q', '2017-01-24 16:21:18', '21-05-2018 03:31:37 PM');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `courseCode` varchar(255) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `courseUnit` varchar(255) NOT NULL,
  `noofSeats` int(11) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `courseCode`, `courseName`, `courseUnit`, `noofSeats`, `creationDate`, `updationDate`) VALUES
(1, 'PHP001', 'Core PHP', '1-5', 10, '2017-02-11 17:39:10', '08-02-2020 04:11:24 AM'),
(2, 'JAVA_SCRIPT01', 'Java Script', '1-6', 6, '2017-02-11 17:52:25', '26-07-2018 09:36:14 AM'),
(4, 'MYSQL001', 'MYSQL', '1-8', 10, '2017-02-11 18:47:25', ''),
(5, 'JAVA01', 'JAVA', '1-6', 10, '2018-07-26 03:31:15', ''),
(6, 'C++001', 'C++', '1-7', 12, '2018-08-02 11:19:24', ''),
(7, 'PY001', 'PYTHON', '1-9', 29, '2018-09-21 01:44:46', '');

-- --------------------------------------------------------

--
-- Table structure for table `courseenrolls`
--

CREATE TABLE `courseenrolls` (
  `id` int(11) NOT NULL,
  `studentRegno` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `session` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `enrollDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseenrolls`
--

INSERT INTO `courseenrolls` (`id`, `studentRegno`, `pincode`, `session`, `department`, `level`, `semester`, `course`, `enrollDate`) VALUES
(4, '10806121', '715948', 4, 7, 6, 5, 2, '2018-05-21 10:19:41'),
(5, '125966', '385864', 4, 7, 6, 4, 1, '2018-07-22 17:23:15'),
(6, 'UPA/DCS/17/92885', '158749', 4, 1, 5, 6, 4, '2018-07-22 17:38:39'),
(7, '125966', '385864', 13, 8, 7, 6, 5, '2018-07-26 05:04:46'),
(8, 'UPA/DCS/17/92884', '396136', 13, 8, 5, 4, 2, '2018-08-02 08:58:45'),
(9, '1234509', '521270', 13, 7, 6, 4, 6, '2018-08-02 11:20:13'),
(10, '1234509', '521270', 13, 1, 5, 4, 1, '2018-09-21 01:31:33'),
(11, '1234509', '521270', 13, 1, 5, 4, 1, '2018-09-21 01:32:42'),
(12, '1234509', '521270', 13, 1, 5, 4, 1, '2018-09-21 01:37:02'),
(13, '1234509', '521270', 13, 8, 6, 4, 7, '2018-09-21 01:45:25'),
(14, 'UPA/DCS/17/92885', '125708', 13, 8, 7, 4, 7, '2020-02-09 00:54:37'),
(15, 'UPA/DCS/17/92885', '125708', 14, 8, 7, 4, 5, '2020-02-09 01:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `creationDate`) VALUES
(1, 'Account', '2017-02-09 18:52:00'),
(2, 'HR', '2017-02-09 18:52:04'),
(7, 'IT', '2018-05-21 10:03:15'),
(8, 'Computer science', '2018-07-26 03:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`, `creationDate`) VALUES
(5, 'Level 1', '2017-02-09 19:04:04'),
(6, 'level 2', '2017-02-09 19:04:12'),
(7, 'level 4', '2017-02-09 19:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`, `creationDate`, `updationDate`) VALUES
(4, 'Second sem', '2017-02-09 18:47:59', '');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session`, `creationDate`) VALUES
(1, '2015', '2017-02-09 18:16:51'),
(2, '2016', '2017-02-09 18:27:41'),
(3, '2017', '2018-05-21 10:01:54'),
(4, '2018', '2018-05-21 10:01:58'),
(13, '2019', '2018-07-26 04:59:18'),
(14, '2020', '2020-02-09 01:04:08'),
(15, '2021', '2020-02-09 01:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(12) NOT NULL,
  `StudentRegno` varchar(255) NOT NULL,
  `studentPhoto` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `cgpa` decimal(10,2) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `StudentRegno`, `studentPhoto`, `password`, `studentName`, `pincode`, `session`, `department`, `semester`, `cgpa`, `creationdate`, `updationDate`) VALUES
(1, '1234509', 'girl_face_black_and_white_makeup.jpg', '$2y$10$CqRy3VEnq42YQuXoasJwvOZM/G1awAnBWZv8AIFgR1DF0v./drzdG', 'Sofia', '521270', '', '', '', '8.00', '2018-08-02 10:41:48', ''),
(2, '125966', '815522a85743b5317e7cb518515695e3.jpg', '81dc9bdb52d04dc20036dbd8313ed055', 'Mr. Black', '385864', '', '', '', '0.00', '2017-02-11 19:48:03', '22-07-2018 10:49:19 PM'),
(3, 'UPA/DCS/17/92884', 'a0ba0496fbcef11058c20081cd36c057.jpg', '81dc9bdb52d04dc20036dbd8313ed055', 'Jane ', '396136', '', '', '', '6.00', '2018-08-01 09:09:26', ''),
(4, 'UPA/DCS/17/92886', '4e1b9c978f239d108883e5279bb081c5.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'John Charles Lukondo', '158749', '', '', '', '8.00', '2018-07-22 17:34:22', ''),
(5, 'UPA/DCS/17/92885', 'image.jpg', '$2y$10$y4ougHJbuCFBue4jktxiW.FvZNptLPlhKGbHDOqfAyxl0BTmLIhrC', 'John Lukondo', '125708', '', '', '', '5.00', '2020-02-08 00:06:17', '09-02-2020 12:20:43 AM'),
(6, 'UPA/DCS/17/87657', NULL, '$2y$10$Ikc9qujOT/dwwKBrxf5KceqtLalcD3SqQOBeVzebx6VSIgIJDyB8q', 'Juma Jamson', '878738', '', '', '', '0.00', '2020-02-08 01:06:44', '');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `studentRegno` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `studentRegno`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:05:58', '', 1),
(2, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:07:18', '', 1),
(3, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:08:46', '', 1),
(4, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:26:15', '', 1),
(5, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:27:11', '', 1),
(6, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:28:19', '', 1),
(7, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:29:30', '', 1),
(8, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:30:39', '12-02-2017 02:00:40 AM', 1),
(9, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:32:12', '12-02-2017 02:21:40 AM', 1),
(10, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-11 20:51:50', '12-02-2017 05:14:45 AM', 1),
(11, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-12 05:41:24', '12-02-2017 11:49:58 AM', 1),
(12, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-12 06:20:05', '', 1),
(13, '10806121', 0x3a3a3100000000000000000000000000, '2017-02-12 06:20:23', '12-02-2017 12:09:59 PM', 1),
(14, '10806121', 0x3a3a3100000000000000000000000000, '2018-05-21 09:49:06', '21-05-2018 03:30:53 PM', 1),
(15, '10806121', 0x3a3a3100000000000000000000000000, '2018-05-21 10:19:15', '', 1),
(16, '125966', 0x3132372e302e302e3100000000000000, '2018-07-22 17:16:58', '22-07-2018 10:55:35 PM', 1),
(17, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-07-22 17:37:20', '22-07-2018 11:10:25 PM', 1),
(18, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-07-22 17:42:58', '22-07-2018 11:13:42 PM', 1),
(19, '125966', 0x3132372e302e302e3100000000000000, '2018-07-25 02:41:21', '25-07-2018 08:15:38 AM', 1),
(20, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-07-26 03:11:23', '26-07-2018 08:59:03 AM', 1),
(21, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-07-26 04:08:45', '26-07-2018 09:53:12 AM', 1),
(22, '125966', 0x3132372e302e302e3100000000000000, '2018-07-26 05:03:23', '26-07-2018 10:41:18 AM', 1),
(23, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-08-01 08:41:00', '01-08-2018 02:21:38 PM', 1),
(24, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-08-01 08:52:02', '01-08-2018 02:25:28 PM', 1),
(25, 'upa/dcs/17/92884', 0x3132372e302e302e3100000000000000, '2018-08-02 08:56:58', '02-08-2018 04:45:55 PM', 1),
(26, '1234509', 0x3132372e302e302e3100000000000000, '2018-08-02 11:16:16', '', 1),
(27, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2018-08-03 07:51:44', '03-08-2018 01:22:41 PM', 1),
(28, '1234509', 0x3132372e302e302e3100000000000000, '2018-09-21 01:23:49', '21-09-2018 07:15:35 AM', 1),
(29, '125966', 0x3132372e302e302e3100000000000000, '2018-09-21 01:45:59', '', 1),
(30, 'UPA/DCS/17/92885', 0x3132372e302e302e3100000000000000, '2020-02-09 00:06:33', '', 1),
(31, 'UPA/DCS/17/92885', 0x3132372e302e302e3100000000000000, '2020-02-09 00:10:25', '09-02-2020 12:20:09 AM', 1),
(32, 'UPA/DCS/17/92885', 0x3132372e302e302e3100000000000000, '2020-02-09 00:20:28', '09-02-2020 12:20:47 AM', 1),
(33, 'UPA/DCS/17/92885', 0x3132372e302e302e3100000000000000, '2020-02-09 00:21:05', '09-02-2020 12:21:08 AM', 1),
(34, 'upa/dcs/17/92885', 0x3132372e302e302e3100000000000000, '2020-02-09 00:23:03', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD UNIQUE KEY `StudentRegno` (`StudentRegno`),
  ADD KEY `student_id_2` (`student_id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
