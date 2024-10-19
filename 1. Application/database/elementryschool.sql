-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2023 at 08:45 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elementryschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `name`) VALUES
(1, 1, 'Shakeel Ahmad');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `section` varchar(40) NOT NULL,
  `class_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `school_id`, `section`, `class_name`) VALUES
(1, 1, 'middle', '7th'),
(2, 1, 'middle', '8th'),
(3, 1, 'primary', '3th'),
(4, 1, 'primary', '1th'),
(5, 1, 'primary', '2th'),
(6, 1, 'primary', '4th'),
(7, 1, 'primary', '5th'),
(8, 1, 'middle', '6th'),
(9, 2, 'middle', '6th'),
(10, 2, 'primary', '2th'),
(11, 2, 'primary', '3th'),
(12, 2, 'primary', '4th'),
(13, 2, 'primary', '5th'),
(14, 2, 'middle', '7th'),
(15, 2, 'middle', '8th'),
(16, 3, 'primary', '1th'),
(17, 3, 'primary', '2th'),
(18, 3, 'middle', '3th'),
(19, 3, 'middle', '3th'),
(20, 3, 'primary', '4th'),
(21, 3, 'middle', '4th'),
(22, 3, 'primary', '5th'),
(23, 3, 'middle', '5th'),
(24, 3, 'primary', '6th'),
(25, 3, 'middle', '6th'),
(26, 3, 'primary', '7th'),
(27, 3, 'middle', '7th'),
(28, 3, 'primary', '8th'),
(29, 3, 'middle', '8th');

-- --------------------------------------------------------

--
-- Table structure for table `clerk`
--

CREATE TABLE `clerk` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clerk`
--

INSERT INTO `clerk` (`id`, `user_id`, `school_id`, `name`) VALUES
(1, 2, 1, 'Zaheer Abbas'),
(2, 20, 2, 'Bushra Yousaf'),
(3, 21, 3, 'Malik Noor');

-- --------------------------------------------------------

--
-- Table structure for table `head`
--

CREATE TABLE `head` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `section` varchar(40) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `head`
--

INSERT INTO `head` (`id`, `user_id`, `school_id`, `name`, `section`, `salary`) VALUES
(1, 9, 1, 'Ali Hassan', 'primary', 35000),
(2, 13, 1, 'Muhammad Zubair', 'middle', 30000),
(4, 23, 2, 'Ch Babber', 'primary', -40000),
(5, 24, 3, 'Rabia Usman', 'primary', 40000),
(6, 25, 3, 'Muhammad', 'middle', 40000),
(8, 46, 2, 'Abdul Haseeb', 'middle', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE `officer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`id`, `user_id`, `name`) VALUES
(1, 14, 'Naeem Tahir');

-- --------------------------------------------------------

--
-- Table structure for table `other_student`
--

CREATE TABLE `other_student` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `roll_no` varchar(40) NOT NULL,
  `name` varchar(80) NOT NULL,
  `status` varchar(80) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_student`
--

INSERT INTO `other_student` (`id`, `school_id`, `class_id`, `section_id`, `roll_no`, `name`, `status`, `description`) VALUES
(2, 1, 2, 2, '23', 'Basit Ali', 'Left School', 'He left the school due to his financially issues.'),
(3, 2, 9, 16, '1th', 'Muhmmad Ahdil', 'Left School', 'Due to illness'),
(4, 3, 16, 30, '1th', 'Abdul Haseeb', 'Migrated', 'Due To illness');

-- --------------------------------------------------------

--
-- Table structure for table `principal`
--

CREATE TABLE `principal` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cnic` varchar(40) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`id`, `user_id`, `school_id`, `name`, `cnic`, `salary`) VALUES
(1, 6, 1, 'Muhammad Afzal', '38402-4589745-1', 60000),
(2, 29, 2, 'Zubia Awan', '3720249880278', 12000),
(3, 57, 3, 'Buhra Malik', '37303-564832-19', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `principal_attendance`
--

CREATE TABLE `principal_attendance` (
  `id` int(11) NOT NULL,
  `principal_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `principal_attendance`
--

INSERT INTO `principal_attendance` (`id`, `principal_id`, `status`, `date`) VALUES
(1, 1, 'Present', '2021-05-05'),
(2, 2, 'Present', '2023-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `subject_id`, `class_id`, `section_id`) VALUES
(1, 5, 1, 1),
(2, 3, 7, 13),
(3, 3, 7, 13),
(4, 4, 3, 4),
(5, 3, 3, 4),
(6, 3, 7, 13),
(7, 3, 7, 13),
(8, 3, 3, 4),
(9, 3, 3, 4),
(10, 3, 3, 4),
(11, 3, 3, 4),
(12, 3, 3, 4),
(13, 4, 3, 4),
(14, 4, 7, 13),
(15, 3, 3, 4),
(16, 4, 3, 4),
(17, 3, 3, 4),
(18, 3, 3, 5),
(19, 4, 3, 4),
(20, 2, 3, 4),
(21, 4, 3, 4),
(22, 4, 3, 4),
(23, 2, 3, 4),
(24, 2, 3, 4),
(25, 2, 3, 4),
(26, 2, 3, 4),
(27, 2, 3, 4),
(28, 2, 3, 4),
(29, 5, 3, 4),
(30, 2, 6, 10),
(31, 2, 6, 10),
(32, 2, 3, 4),
(33, 2, 3, 4),
(34, 31, 16, 30);

-- --------------------------------------------------------

--
-- Table structure for table `result_details`
--

CREATE TABLE `result_details` (
  `id` int(11) NOT NULL,
  `result_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_details`
--

INSERT INTO `result_details` (`id`, `result_id`, `student_id`, `marks`) VALUES
(1, 1, 1, 80);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `school_name` varchar(80) NOT NULL,
  `city` varchar(80) NOT NULL,
  `district` varchar(80) NOT NULL,
  `location` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `admin_id`, `school_name`, `city`, `district`, `location`) VALUES
(1, 1, 'Govt. Public School No.1', 'Rawalpindi', 'Chaklala Scheme 1', 'Chaklala Scheme 1Rawalpindi'),
(2, 1, 'Govt. Public School No.2', 'Rawalpindi', 'Chaklala  Scheme 111 ', 'Chaklala Scheme 111 Rawalpindi'),
(3, 1, 'Govt. Public School No.3', 'Rawalpindi', 'Chaklala  Scheme 11', 'Chaklala Scheme 11, Rawalpindi');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `class_id`, `section_name`) VALUES
(1, 1, 'A'),
(2, 2, 'A'),
(3, 2, 'B'),
(4, 3, 'A'),
(5, 3, 'B'),
(6, 4, 'A'),
(7, 4, 'B'),
(8, 5, 'A'),
(9, 5, 'B'),
(10, 6, 'A'),
(11, 6, 'B'),
(12, 7, 'A'),
(13, 7, 'B'),
(14, 8, 'A'),
(15, 8, 'B'),
(16, 9, 'B'),
(17, 9, 'A'),
(18, 10, 'A'),
(19, 10, 'B'),
(20, 12, 'B'),
(21, 12, 'A'),
(22, 13, 'A'),
(23, 13, 'B'),
(24, 14, 'B'),
(25, 14, 'A'),
(26, 15, 'A'),
(27, 15, 'B'),
(28, 11, 'A'),
(29, 11, 'B'),
(30, 16, 'B'),
(31, 17, 'A'),
(32, 18, 'A'),
(33, 20, 'A'),
(34, 20, 'A'),
(35, 22, 'A'),
(36, 22, 'A'),
(37, 23, 'A'),
(38, 24, 'A'),
(39, 26, 'A'),
(40, 28, 'A'),
(41, 17, 'B'),
(42, 19, 'B'),
(43, 21, 'B'),
(44, 22, 'B'),
(45, 22, 'B'),
(46, 24, 'B'),
(47, 28, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `roll_no` varchar(50) NOT NULL,
  `school_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `vaccination` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `roll_no`, `school_id`, `class_id`, `section_id`, `name`, `vaccination`) VALUES
(1, '1', 1, 1, 1, 'Abdul Haseeb', 'Fully Vaccinated'),
(2, '14', 1, 2, 2, 'Ali Hamza', 'Partially Vaccinated'),
(3, '2', 1, 1, 1, 'Muhammad Kamran', 'Fully Vaccinated'),
(4, '3', 1, 1, 1, 'Muhammad Bilal', 'Not Vaccinated'),
(5, '4', 1, 1, 1, 'Zeeshan Ali', 'Partially Vaccinated'),
(6, '2th', 2, 14, 24, 'Aliya Noor', 'Partially Vaccinated'),
(7, '3th', 2, 10, 18, 'Kaniat Raiz', 'Partially Vaccinated'),
(8, '4th', 2, 12, 20, 'Iqra Yousaf', 'Not Vaccinated'),
(9, '6th', 2, 13, 23, 'Malik Aslam', 'Fully Vaccinated'),
(10, '5th', 2, 10, 18, 'Ali Habbib', 'Fully Vaccinated'),
(11, '3', 1, 5, 8, 'Noor Arsalan', 'Fully Vaccinated'),
(12, '2', 1, 5, 8, 'Kohmil Ali', 'Partially Vaccinated'),
(13, '5th', 1, 6, 11, 'Usman', 'Partially Vaccinated'),
(14, '1th', 1, 3, 5, 'Sana MALIK', 'Fully Vaccinated'),
(15, '3th', 1, 3, 4, 'Ali Habbib', 'Fully Vaccinated'),
(16, '1th', 1, 3, 5, 'Ameen Hassan', 'Fully Vaccinated'),
(17, '2th', 1, 3, 5, 'Toquree Satti', 'Fully Vaccinated'),
(18, '4th', 1, 3, 5, 'Naima Sultan', 'Fully Vaccinated'),
(19, '3th', 1, 3, 4, 'Awan', 'Fully Vaccinated'),
(20, '4th', 1, 3, 4, 'Ahsan Ali', 'Fully Vaccinated'),
(21, '1th', 1, 7, 12, 'Hassan', 'Fully Vaccinated'),
(22, '3th', 1, 7, 12, 'Yousaf Awan', 'Fully Vaccinated'),
(23, '5th', 1, 4, 6, 'Faisal Aslam', 'Fully Vaccinated'),
(24, '2th', 1, 6, 10, 'Imran', 'Fully Vaccinated'),
(25, '6th', 1, 3, 5, 'Asad Malik', 'Fully Vaccinated'),
(26, '1th', 1, 4, 6, 'Abdul Hassan', 'Fully Vaccinated'),
(27, '2th', 1, 4, 7, 'Muhammad Kamran', 'Fully Vaccinated'),
(28, '3th', 1, 4, 6, 'Muhammad Bilal', 'Fully Vaccinated'),
(29, '4th', 1, 4, 7, 'Ali Hamza', 'Fully Vaccinated'),
(30, '1th', 1, 5, 9, 'Sana Malik', 'Fully Vaccinated'),
(31, '2th', 1, 5, 9, 'Usman', 'Fully Vaccinated'),
(32, '2th', 1, 9, 16, 'Muhammad Bilal', 'Fully Vaccinated'),
(33, '3th', 1, 2, 3, 'Muhammad Bilal', 'Fully Vaccinated'),
(34, '2th', 1, 4, 6, 'Ali Hamza', 'Fully Vaccinated'),
(35, '2th', 1, 4, 6, 'Amal Faitma', 'Fully Vaccinated'),
(36, '1th', 1, 5, 9, 'Bushra Ali', 'Fully Vaccinated'),
(37, '2th', 1, 5, 8, 'Noor Arsalan', 'Fully Vaccinated'),
(38, '4TH', 1, 3, 4, 'Malik Noman', 'Fully Vaccinated'),
(39, '5th', 1, 6, 11, 'Sajad', 'Partially Vaccinated'),
(40, '6th', 1, 6, 10, 'Yousaf Awan', 'Fully Vaccinated'),
(41, '1th', 2, 9, 16, 'Abdul Haseeb', 'Fully Vaccinated'),
(42, '1th', 2, 9, 16, 'Amal Faitma', 'Fully Vaccinated'),
(43, '2th', 2, 10, 18, 'Esha', 'Fully Vaccinated'),
(44, '3th', 2, 10, 18, 'Amal noor', 'Fully Vaccinated'),
(45, '1th', 2, 13, 22, 'Hania Malik', 'Partially Vaccinated'),
(46, '5th', 2, 13, 23, 'Insub Aslam', 'Partially Vaccinated'),
(47, '6th', 2, 13, 23, 'Malik Noor', 'Partially Vaccinated'),
(48, '3th', 2, 15, 26, 'Amal Faitma Zara', 'Fully Vaccinated'),
(49, '1th', 2, 15, 26, 'Sana Malik', 'Fully Vaccinated'),
(50, '1th', 2, 14, 25, 'Bushra Ali', 'Partially Vaccinated'),
(51, '1th', 2, 11, 28, 'Ambreen', 'Fully Vaccinated'),
(52, '2th', 2, 11, 29, 'Amal Faitma', 'Fully Vaccinated'),
(53, '3th', 2, 11, 28, 'Anam', 'Partially Vaccinated'),
(54, '3th', 2, 12, 20, 'Maklia Fayyan', 'Partially Vaccinated'),
(55, '1th', 3, 16, 30, 'Abdul Haseeb', 'Fully Vaccinated'),
(56, '12h', 3, 16, 30, 'Amal Faitma', 'Fully Vaccinated'),
(57, '1th', 3, 17, 31, 'Asjid malik', 'Fully Vaccinated'),
(58, '2th', 3, 17, 41, 'Bushra Ali', 'Fully Vaccinated'),
(59, '2th', 3, 18, 32, 'Asjid malik', 'Partially Vaccinated'),
(60, '1th', 3, 18, 32, 'Sana Malik', 'Fully Vaccinated'),
(61, '1th', 3, 20, 33, 'Bushra Ali', 'Fully Vaccinated'),
(62, '2th', 3, 20, 33, 'Amal Faitma Zara', 'Fully Vaccinated'),
(63, '1th', 3, 22, 44, 'Maklia Fayyan', 'Partially Vaccinated'),
(64, '2th', 3, 22, 35, 'Sana Noor', 'Fully Vaccinated'),
(65, '1th', 3, 26, 39, 'Buhra Malik', 'Fully Vaccinated'),
(66, '2th', 3, 28, 40, 'Sana Noor', 'Fully Vaccinated'),
(67, '1th', 3, 28, 40, 'Buhra Malik', 'Fully Vaccinated');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `subject_id`, `class_id`, `section_id`, `date`) VALUES
(1, 5, 1, 1, '2021-05-05'),
(2, 3, 3, 4, '2023-08-06'),
(3, 3, 3, 4, '2023-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance_details`
--

CREATE TABLE `student_attendance_details` (
  `id` int(11) NOT NULL,
  `attendance_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance_details`
--

INSERT INTO `student_attendance_details` (`id`, `attendance_id`, `student_id`, `status`) VALUES
(1, 1, 1, 'Present'),
(2, 1, 3, 'Present'),
(3, 1, 4, 'Absent'),
(4, 2, 15, 'Present'),
(5, 3, 15, 'Present'),
(6, 3, 19, 'Present'),
(7, 3, 20, 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `subject_name` varchar(80) NOT NULL,
  `section` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `school_id`, `subject_name`, `section`) VALUES
(1, 1, 'Mathematics - 1', 'middle'),
(2, 1, 'Mathematics - 2', 'primary'),
(3, 1, 'English - 1', 'primary'),
(4, 1, 'English - 2', 'primary'),
(5, 1, 'Computer Science - 1', 'primary'),
(6, 1, 'Computer Science - 2', 'primary'),
(7, 1, 'English', 'middle'),
(8, 1, 'Urdu', 'middle'),
(9, 1, 'Science', 'middle'),
(10, 1, 'Mathematics', 'middle'),
(11, 1, 'Islamiyat', 'middle'),
(12, 1, 'Islamiyat', 'high'),
(13, 1, 'Pakistan Studies', 'high'),
(14, 2, 'English', 'primary'),
(15, 2, 'Urdu', 'middle'),
(16, 2, 'Maths', 'primary'),
(17, 2, 'Islamiyat', 'primary'),
(18, 2, 'Mathematics', 'primary'),
(19, 2, 'Computer', 'middle'),
(20, 2, 'Urdu', 'primary'),
(21, 2, 'Islamiyat', 'middle'),
(22, 2, 'Science', 'primary'),
(23, 2, 'Science', 'primary'),
(24, 2, 'Computer', 'primary'),
(25, 3, 'Computer', 'primary'),
(26, 3, 'Computer', 'middle'),
(27, 3, 'Mathematics-1', 'primary'),
(28, 3, 'Mathematics-1', 'middle'),
(29, 3, 'English', 'primary'),
(30, 3, 'English', 'middle'),
(31, 3, 'Urdu', 'primary'),
(32, 3, 'Urdu', 'middle'),
(33, 3, 'Islamiyat', 'primary'),
(34, 3, 'Islamiyat', 'middle'),
(35, 3, 'Social-Study', 'primary'),
(36, 3, 'Social-Study', 'middle'),
(37, 3, 'Science', 'primary'),
(38, 3, 'Science', 'middle');

-- --------------------------------------------------------

--
-- Table structure for table `teach`
--

CREATE TABLE `teach` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(50) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teach`
--

INSERT INTO `teach` (`id`, `teacher_id`, `subject_id`, `class_id`, `section_id`) VALUES
(2, 'RPC849561072', 5, 1, 1),
(4, 'WLF064853712', 1, 1, 1),
(5, 'AIR765014389', 2, 3, 4),
(6, 'SWC415968207', 3, 3, 4),
(7, 'AIR765014389', 5, 6, 10),
(8, 'WCK394251860', 4, 3, 4),
(9, 'WCK394251860', 2, 5, 8),
(10, 'SWC415968207', 4, 7, 13),
(11, 'AIR765014389', 2, 4, 6),
(12, 'SWC415968207', 3, 4, 6),
(13, 'SWC415968207', 6, 3, 5),
(14, 'RPC849561072', 7, 8, 14),
(15, 'RPC849561072', 9, 1, 1),
(16, 'HWK973264058', 8, 1, 1),
(17, 'PBN574680123', 9, 2, 2),
(18, 'YWT359742081', 8, 1, 1),
(19, 'YWT359742081', 7, 1, 1),
(20, 'SGO648753920', 8, 8, 14),
(21, 'PBN574680123', 11, 8, 14),
(22, 'HWK973264058', 9, 8, 14),
(23, 'KTJ520384691', 16, 10, 19),
(24, 'BAS190432857', 14, 10, 19),
(25, 'KTJ520384691', 17, 13, 23),
(26, 'EDI351048297', 25, 16, 30),
(27, 'GYE391275064', 25, 17, 31),
(28, 'VBO530798421', 31, 16, 30),
(29, 'TYI094123756', 29, 28, 40),
(30, 'GYE391275064', 27, 20, 33),
(31, 'EDI351048297', 33, 24, 46),
(32, 'RCK619430287', 19, 9, 16),
(33, 'OTG207519368', 15, 15, 26),
(34, 'YSB427305918', 21, 9, 16),
(35, 'YSB427305918', 19, 14, 24),
(36, 'OTG207519368', 19, 14, 25),
(37, 'SEU618073459', 18, 11, 28),
(38, 'MDE156798342', 16, 10, 19),
(39, 'UNZ096245783', 36, 18, 32),
(40, 'MXL803976125', 28, 19, 42),
(41, 'WQF194326705', 34, 23, 37),
(42, 'WQF194326705', 30, 18, 32);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `employee_id` varchar(80) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `section` varchar(40) NOT NULL,
  `cnic` varchar(40) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`employee_id`, `user_id`, `school_id`, `name`, `section`, `cnic`, `salary`) VALUES
('AIR765014389', 32, 1, 'Aman Faisal', 'primary', '37202-498802-69', 12355),
('BAS190432857', 28, 2, 'Muhammad Yousaf', 'primary', '37202-498802-78', 34000),
('BSL378256049', 50, 3, 'Sana Malik', 'middle', '37303-56432-28', 23400),
('DIF052867319', 43, 2, 'Farhan Rafus', 'primary', '37303-5732-13', 34566),
('EDI351048297', 53, 3, 'Ali Noor', 'primary', '37303-5732-13', 56000),
('GYE391275064', 51, 3, 'Amal Faitma Zara', 'primary', '37303-56432-29', 45677),
('HWK973264058', 33, 1, 'Ashsan Malik', 'middle', '3720249880260', 34000),
('IJT183497256', 47, 3, 'Abdul Haseeb', 'primary', '37303-56432-23', 56788),
('JXR916423570', 42, 2, 'Mani Malik ', 'primary', '37202-498802-78', 45221),
('KTJ520384691', 26, 2, 'Naima Faitma', 'primary', '37202-498802-60', 12300),
('MDE156798342', 45, 2, 'Faheen Malik', 'primary', '37303-5732-13', 213334),
('MXL803976125', 55, 3, 'Rehman', 'middle', '37303-56432-28', 56789),
('OTG207519368', 44, 2, 'Asjid malik', 'middle', '37303-56432-23', 13233),
('PBN574680123', 34, 1, 'Mareen Yousaf', 'middle', '37202-498802-78', 5600),
('QSN061827935', 38, 1, 'Sultan Awan', 'primary', '3720249810278', 12345),
('RCK619430287', 40, 2, 'Naba Bibi', 'middle', '37202-44402-69', 123456),
('RPC849561072', 4, 1, 'Muhammad Imran', 'middle', '38602-5423673-4', 40000),
('SEU618073459', 41, 2, 'Alina Ahsan', 'primary', '37202-498802-69', 23345),
('SGO648753920', 35, 1, 'Sulman', 'middle', '37202-498902-78', 34000),
('SWC415968207', 19, 1, 'Shakeel Ahmad', 'primary', '38201-2245890-3', 34302),
('TAJ602578139', 36, 1, 'Tareen Faitma', 'primary', '37202-49802-70', 12546),
('TYI094123756', 56, 3, 'Sana Noor', 'primary', '37303-56432-28', 45678),
('UNZ096245783', 48, 3, 'Amal Faitma', 'middle', '37303-56432-23', 12349),
('VBO530798421', 49, 3, 'Maklia Fayyan', 'primary', '37303-5732-13', 12344),
('WCK394251860', 31, 1, 'Mobeen', 'primary', '37202-498802-60', 123345),
('WLF064853712', 10, 1, 'Muhammad Ijaz', 'primary', '38201-2245890-3', 45000),
('WQF194326705', 52, 3, 'Bushra Ali', 'middle', '37303-56432-28', 67000),
('XEH706819432', 54, 3, 'Asjid malik', 'middle', '37303-56432-29', 34344),
('XQL014736529', 39, 2, 'Ahsan Malik', 'primary', '37202-498902-78', 23455),
('YSB427305918', 27, 2, 'Muhammad Ali', 'middle', '37202-498802-76', 45000),
('YWT359742081', 37, 1, 'Noor Bibi', 'middle', '37202-498802-60', 6566);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance`
--

CREATE TABLE `teacher_attendance` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`id`, `school_id`, `date`) VALUES
(1, 1, '2021-05-05'),
(2, 1, '2023-07-30'),
(3, 2, '2023-08-06'),
(4, 3, '2023-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance_details`
--

CREATE TABLE `teacher_attendance_details` (
  `id` int(11) NOT NULL,
  `attendance_id` int(11) NOT NULL,
  `teacher_id` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_attendance_details`
--

INSERT INTO `teacher_attendance_details` (`id`, `attendance_id`, `teacher_id`, `status`) VALUES
(1, 1, 'RPC849561072', 'Present'),
(2, 1, 'WLF064853712', 'Present'),
(3, 2, 'RPC849561072', 'Present'),
(4, 2, 'SWC415968207', 'Present'),
(5, 2, 'WLF064853712', 'Absent'),
(6, 3, 'BAS190432857', 'Present'),
(7, 3, 'JXR916423570', 'Present'),
(8, 3, 'KTJ520384691', 'Present'),
(9, 3, 'RCK619430287', 'Present'),
(10, 3, 'SEU618073459', 'Present'),
(11, 3, 'XQL014736529', 'Present'),
(12, 3, 'YSB427305918', 'Present'),
(13, 4, 'BSL378256049', 'Present'),
(14, 4, 'EDI351048297', 'Present'),
(15, 4, 'GYE391275064', 'Present'),
(16, 4, 'IJT183497256', 'Present'),
(17, 4, 'MXL803976125', 'Present'),
(18, 4, 'TYI094123756', 'Present'),
(19, 4, 'UNZ096245783', 'Present'),
(20, 4, 'VBO530798421', 'Present'),
(21, 4, 'WQF194326705', 'Present'),
(22, 4, 'XEH706819432', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_leave`
--

CREATE TABLE `teacher_leave` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(40) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_leave`
--

INSERT INTO `teacher_leave` (`id`, `teacher_id`, `from_date`, `to_date`, `date`, `reason`) VALUES
(1, 'RPC849561072', '2021-05-05', '2021-05-08', '2021-05-05', 'This is the reason of the leave.'),
(2, 'WLF064853712', '2021-05-07', '2021-05-09', '2021-05-05', 'Have an urgent piece of work.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `img`) VALUES
(1, 'admin', 'admin123', 'user.png'),
(2, 'zaheer321', 'MNOFw4dH', 'male.png'),
(4, 'imran123', '12345', 'profile.jpg'),
(6, 'afzal3321', 'vYFWGn1J', 'male6.jpg'),
(7, 'haseeb123', '5cUoN0xA', 'user.png'),
(8, 'hamza123', 'vmXwsfla', 'user.png'),
(9, 'alihassan001', '85YXOnKs', 'male6.jpg'),
(10, 'ijaz123', '3kerzBU9', 'male6.jpg'),
(11, 'kamran123', 'shU6xM3A', 'user.png'),
(12, 'bilal123', 'hjyGqzkf', 'user.png'),
(13, 'zubair123', 'VUo2YfP0', 'user.png'),
(14, 'naeemtahir123', 'FSAKBL3k', 'male.png'),
(15, 'asif213', 'Vyo8pR9D', 'male6.jpg'),
(16, 'shakeel123', 'Rb6owYJF', 'user.png'),
(17, 'shakeel123', 'rdf0IO1Y', 'female4.jpg'),
(19, 'alihassan001', 'ep5Acs3X', 'male.png'),
(20, 'BushraYousaf12', 'TgaZvkxm', 'female4.jpg'),
(21, 'MalikNoor12', '4bam8C93', 'male.png'),
(22, 'Zikran12', 'TH1Fjt3m', 'male.png'),
(23, 'Babber12', '3VdUhE2p', 'male.png'),
(24, 'Rabia12', 'KAUpi3dX', 'female4.jpg'),
(25, 'Muhammad12', 'tBS2brRJ', 'male.png'),
(26, 'Naima12', 'x0jEGWMt', 'female4.jpg'),
(27, 'Muhammad1222', 'fCwTtrDs', 'male.png'),
(28, 'MobeenYosaf123', '8ans9kSK', 'male.png'),
(29, 'Zubia12', 'nwtxO7Is', 'female4.jpg'),
(30, 'MuhammadAhdil21', 'mi5znpK6', 'male.png'),
(31, 'Mobeen12', 'WGLPBzCQ', 'female4.jpg'),
(32, 'AmanFaisal12', 'PuhSJgZc', 'female4.jpg'),
(33, 'AshsaMalik', 'anyQWdts', 'male.png'),
(34, 'Mareen Yousaf', 'ZYuvfd4s', 'female4.jpg'),
(35, 'Sulman', '1zUC9ach', 'male.png'),
(36, 'Tahreen12', 'dVNkiO8L', 'female4.jpg'),
(37, 'Noor123', 'XnRsd7b5', 'female4.jpg'),
(38, 'Sultan12', 'C7RHDv9L', 'male6.jpg'),
(39, 'Ahsan1233', 'AnN5BsrZ', 'person.jpg'),
(40, 'Naba', '3lVRJko6', 'female4.jpg'),
(41, 'Alina', 'hBvrQ14S', 'female4.jpg'),
(42, 'ManiAwan123', 'Tf7BVI32', 'male.png'),
(43, 'Farhan123', 'scHdxV5J', 'male.png'),
(44, 'Asjid21', 'oyxE3Xr9', 'male.png'),
(45, 'Faheen@12', 'CBhzJbvk', 'male.png'),
(46, 'Abdul1232', 'd1lUixWf', 'male.png'),
(47, 'Abdul2129', 'cFYRXsdq', 'male.png'),
(48, 'Amal@12', 'uRdDHZ7I', 'female4.jpg'),
(49, 'MalikNoor1223', '8aT7cJuZ', 'female4.jpg'),
(50, 'Sana231', 'kmAytTeX', 'female4.jpg'),
(51, 'Amal1234', 'htosTDaV', 'female4.jpg'),
(52, 'Ali1233', 'U1FpBYPX', 'male.png'),
(53, 'Alinoor34', '0bNovrQ9', 'male.png'),
(54, '34566', 'DAMGB6Hg', 'male.png'),
(55, 'Reheem231', 'egYPcy1W', 'male.png'),
(56, 'Sana3', 'HrLKGsdN', 'female4.jpg'),
(57, 'Bushra@12', 'Z5UbMw6g', 'female4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `clerk`
--
ALTER TABLE `clerk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `head`
--
ALTER TABLE `head`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `other_student`
--
ALTER TABLE `other_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `principal`
--
ALTER TABLE `principal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `principal_attendance`
--
ALTER TABLE `principal_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `principal_id` (`principal_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `result_details`
--
ALTER TABLE `result_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result_id` (`result_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `student_attendance_details`
--
ALTER TABLE `student_attendance_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_id` (`attendance_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `teach`
--
ALTER TABLE `teach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `teacher_attendance_details`
--
ALTER TABLE `teacher_attendance_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_id` (`attendance_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teacher_leave`
--
ALTER TABLE `teacher_leave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `clerk`
--
ALTER TABLE `clerk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `head`
--
ALTER TABLE `head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `officer`
--
ALTER TABLE `officer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `other_student`
--
ALTER TABLE `other_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `principal`
--
ALTER TABLE `principal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `principal_attendance`
--
ALTER TABLE `principal_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `result_details`
--
ALTER TABLE `result_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_attendance_details`
--
ALTER TABLE `student_attendance_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `teach`
--
ALTER TABLE `teach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher_attendance_details`
--
ALTER TABLE `teacher_attendance_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `teacher_leave`
--
ALTER TABLE `teacher_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`);

--
-- Constraints for table `clerk`
--
ALTER TABLE `clerk`
  ADD CONSTRAINT `clerk_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `clerk_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`);

--
-- Constraints for table `head`
--
ALTER TABLE `head`
  ADD CONSTRAINT `head_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `head_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`);

--
-- Constraints for table `officer`
--
ALTER TABLE `officer`
  ADD CONSTRAINT `officer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `principal`
--
ALTER TABLE `principal`
  ADD CONSTRAINT `principal_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `principal_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`);

--
-- Constraints for table `principal_attendance`
--
ALTER TABLE `principal_attendance`
  ADD CONSTRAINT `principal_attendance_ibfk_1` FOREIGN KEY (`principal_id`) REFERENCES `principal` (`id`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `result_ibfk_3` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`);

--
-- Constraints for table `result_details`
--
ALTER TABLE `result_details`
  ADD CONSTRAINT `result_details_ibfk_1` FOREIGN KEY (`result_id`) REFERENCES `result_details` (`id`),
  ADD CONSTRAINT `result_details_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `school_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `student_ibfk_4` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`);

--
-- Constraints for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD CONSTRAINT `student_attendance_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`),
  ADD CONSTRAINT `student_attendance_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `student_attendance_ibfk_3` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`);

--
-- Constraints for table `student_attendance_details`
--
ALTER TABLE `student_attendance_details`
  ADD CONSTRAINT `student_attendance_details_ibfk_1` FOREIGN KEY (`attendance_id`) REFERENCES `student_attendance` (`id`),
  ADD CONSTRAINT `student_attendance_details_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`);

--
-- Constraints for table `teach`
--
ALTER TABLE `teach`
  ADD CONSTRAINT `teach_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`),
  ADD CONSTRAINT `teach_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `teach_ibfk_4` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`),
  ADD CONSTRAINT `teach_ibfk_5` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`employee_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`);

--
-- Constraints for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD CONSTRAINT `teacher_attendance_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`);

--
-- Constraints for table `teacher_attendance_details`
--
ALTER TABLE `teacher_attendance_details`
  ADD CONSTRAINT `teacher_attendance_details_ibfk_1` FOREIGN KEY (`attendance_id`) REFERENCES `teacher_attendance` (`id`),
  ADD CONSTRAINT `teacher_attendance_details_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`employee_id`);

--
-- Constraints for table `teacher_leave`
--
ALTER TABLE `teacher_leave`
  ADD CONSTRAINT `teacher_leave_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
