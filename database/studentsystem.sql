-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2021 at 01:21 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'Admin', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `description`) VALUES
(8, 'Bachelor of Elementary Education'),
(9, 'Bachelor of Science in Nursing'),
(17, 'Bachelor of Science in Psychology');

-- --------------------------------------------------------

--
-- Table structure for table `finals`
--

CREATE TABLE `finals` (
  `id` int(11) NOT NULL,
  `student_id` varchar(128) NOT NULL,
  `subject` varchar(123) NOT NULL,
  `grade` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finals`
--

INSERT INTO `finals` (`id`, `student_id`, `subject`, `grade`) VALUES
(18, '2018-00070-cl-0', 'Mathematics', '83'),
(19, '2018-00070-cl-0', 'English', '74');

-- --------------------------------------------------------

--
-- Table structure for table `gradingstatus`
--

CREATE TABLE `gradingstatus` (
  `id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gradingstatus`
--

INSERT INTO `gradingstatus` (`id`, `status`) VALUES
(1, 'open');

-- --------------------------------------------------------

--
-- Table structure for table `midterms`
--

CREATE TABLE `midterms` (
  `id` int(11) NOT NULL,
  `student_id` varchar(128) NOT NULL,
  `subject` varchar(123) NOT NULL,
  `grade` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `midterms`
--

INSERT INTO `midterms` (`id`, `student_id`, `subject`, `grade`) VALUES
(12, '2018-00070-cl-0', 'Mathematics', '82'),
(13, '2018-00073-cl-0', 'Mathematics', '80'),
(14, '2018-00070-cl-0', 'English', '88');

-- --------------------------------------------------------

--
-- Table structure for table `prelims`
--

CREATE TABLE `prelims` (
  `id` int(11) NOT NULL,
  `student_id` varchar(128) NOT NULL,
  `subject` varchar(123) NOT NULL,
  `grade` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prelims`
--

INSERT INTO `prelims` (`id`, `student_id`, `subject`, `grade`) VALUES
(44, '2018-00070-cl-0', 'Mathematics', '88'),
(45, '2018-00070-cl-0', 'English', '81');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `course` varchar(128) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `year` varchar(128) NOT NULL,
  `sem` varchar(128) NOT NULL,
  `subject_code` varchar(128) NOT NULL,
  `units` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `course`, `subject`, `year`, `sem`, `subject_code`, `units`) VALUES
(54, 'bachelor of elementary education', 'Mathematics', 'first', 'first', '', 0),
(56, 'bachelor of science in psychology', 'Mathematics', 'first', 'first', '', 0),
(57, 'bachelor of science in psychology', 'English', 'first', 'first', '', 0),
(58, 'bachelor of science in psychology', 'Filipino', 'first', 'second', '', 0),
(59, 'bachelor of science in psychology', 'Physical Education', 'first', 'second', '', 0),
(60, 'bachelor of elementary education', 'Physical Education', 'first', 'first', '', 0),
(61, 'bachelor of elementary education', 'Filipino', 'first', 'second', '', 0),
(62, 'bachelor of elementary education', 'English', 'first', 'second', '', 0),
(63, 'bachelor of science in nursing', 'Filipino', 'first', 'first', '', 0),
(64, 'bachelor of science in nursing', 'Physical Education', 'first', 'first', '', 0),
(65, 'bachelor of science in nursing', 'Mathematics', 'first', 'second', '', 0),
(66, 'bachelor of science in nursing', 'English', 'first', 'second', '', 0),
(71, 'bachelor of science in psychology', 'GEN Math', 'second', 'first', '', 0),
(72, 'Bachelor of Science in Nursing', 'GEN Math', 'second', 'first', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `request_type` varchar(128) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studentrecords`
--

CREATE TABLE `studentrecords` (
  `id` int(11) NOT NULL,
  `student_id` varchar(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `cellphone` varchar(11) NOT NULL,
  `bday` varchar(128) NOT NULL,
  `bplace` varchar(128) NOT NULL,
  `address` text NOT NULL,
  `course` text NOT NULL,
  `status` text NOT NULL,
  `year` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentrecords`
--

INSERT INTO `studentrecords` (`id`, `student_id`, `name`, `gender`, `cellphone`, `bday`, `bplace`, `address`, `course`, `status`, `year`) VALUES
(51, '2018-00071-cl-0', 'Lagancia, Boknoy D', 'male', '09065187987', '2021-06-30', 'tadlac', 'tadlac', 'Bachelor of Elementary Education', 'regular', ''),
(52, '2018-00070-cl-0', 'Bello, Jerome L', 'male', '09065187987', '2021-07-08', 'Quezon', 'Laguna', 'Bachelor of Science in Psychology', 'irregular', ''),
(53, '2018-00073-cl-0', 'Cobijano, Erika A', 'female', '09348576857', '2021-06-30', 'Calauan', 'Calauan', 'Bachelor of Elementary Education', 'regular', '');

-- --------------------------------------------------------

--
-- Table structure for table `studentsubs`
--

CREATE TABLE `studentsubs` (
  `id` int(11) NOT NULL,
  `student_id` varchar(123) NOT NULL,
  `subject` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentsubs`
--

INSERT INTO `studentsubs` (`id`, `student_id`, `subject`) VALUES
(68, '2018', 'Mathematics '),
(71, '2018-00071-cl-0', 'Mathematics'),
(72, '2018-00071-cl-0', 'Physical Education'),
(73, '2018-00071-cl-0', 'Filipino'),
(74, '2018-00071-cl-0', 'English'),
(78, '2018-00070-cl-0', 'Mathematics '),
(79, '2018-00070-cl-0', 'English '),
(84, '2018-00073-cl-0', 'Mathematics'),
(85, '2018-00073-cl-0', 'Physical Education'),
(86, '2018-00073-cl-0', 'Filipino'),
(87, '2018-00073-cl-0', 'English'),
(89, '2018-00070-cl-0', 'Physical Education ');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(123) NOT NULL,
  `description` varchar(123) NOT NULL,
  `subcode` varchar(123) NOT NULL,
  `units` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `teacher_id`, `description`, `subcode`, `units`) VALUES
(44, '1999-00071-proc-1', 'Physical Education', 'P.E-01', 0),
(45, '1999-00072-proc-1', 'Filipino', 'F-01', 0),
(46, '1999-00070-proc-0', 'Mathematics', 'M-01', 3),
(47, '1999-00070-proc-0', 'English', 'E-01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sublists`
--

CREATE TABLE `sublists` (
  `id` int(11) NOT NULL,
  `subject_code` varchar(111) NOT NULL,
  `description` varchar(111) NOT NULL,
  `units` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sublists`
--

INSERT INTO `sublists` (`id`, `subject_code`, `description`, `units`) VALUES
(1, 'M-01', 'Mathematics', '3'),
(3, 'E-01', 'English', '3'),
(4, 'F-01', 'Filipino', '2'),
(6, 'P.E-01', 'Physical Education', '2'),
(7, 'M-02', 'General Math', '3');

-- --------------------------------------------------------

--
-- Table structure for table `teacherrecords`
--

CREATE TABLE `teacherrecords` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `cellphone` varchar(11) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacherrecords`
--

INSERT INTO `teacherrecords` (`id`, `teacher_id`, `name`, `gender`, `cellphone`, `address`) VALUES
(38, '1999-00070-proc-0', 'Jerome Bello', 'male', '09221232123', 'Tadlac, Los Banos, Laguna'),
(39, '1999-00071-proc-1', 'Marvel', 'male', '0935234456', 'Los Banos Laguna'),
(40, '1999-00072-proc-1', 'Jake', 'male', '09346574657', 'San Pablo');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(12) NOT NULL,
  `code` varchar(128) NOT NULL,
  `units` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `code`, `units`) VALUES
(30, 'qq', 1),
(31, 'aa', 2),
(32, 'ww', 3),
(33, 'Bachelor of ', 0),
(34, 'Bachelor of ', 0),
(35, 'Bachelor of ', 0),
(36, 'Bachelor of Science in Psychology  ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `password` text NOT NULL,
  `role` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `password`, `role`) VALUES
(63, '1999-00070-proc-0', 'pass', 'faculty'),
(75, '1999-00071-proc-1', 'pass', 'faculty'),
(76, '1999-00072-proc-1', 'pass', 'faculty'),
(100, '2018-00071-cl-0', 'RaQzF', 'student'),
(101, '2018-00070-cl-0', 'CNbxB', 'student'),
(102, '2018-00073-cl-0', 'l2Mon', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finals`
--
ALTER TABLE `finals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gradingstatus`
--
ALTER TABLE `gradingstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `midterms`
--
ALTER TABLE `midterms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prelims`
--
ALTER TABLE `prelims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentrecords`
--
ALTER TABLE `studentrecords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentsubs`
--
ALTER TABLE `studentsubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sublists`
--
ALTER TABLE `sublists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacherrecords`
--
ALTER TABLE `teacherrecords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `finals`
--
ALTER TABLE `finals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `gradingstatus`
--
ALTER TABLE `gradingstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `midterms`
--
ALTER TABLE `midterms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `prelims`
--
ALTER TABLE `prelims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentrecords`
--
ALTER TABLE `studentrecords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `studentsubs`
--
ALTER TABLE `studentsubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `sublists`
--
ALTER TABLE `sublists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacherrecords`
--
ALTER TABLE `teacherrecords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
