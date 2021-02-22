-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2020 at 08:22 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `contact`, `password`) VALUES
(1, 'admin', '01625554454', '123');

-- --------------------------------------------------------

--
-- Table structure for table `admin_chat`
--

CREATE TABLE `admin_chat` (
  `id` int(11) NOT NULL,
  `sender` varchar(40) NOT NULL,
  `receiver` varchar(40) NOT NULL,
  `sender_type` int(11) NOT NULL,
  `message` text NOT NULL,
  `attachment` varchar(40) NOT NULL,
  `send_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `seen_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `anonymous`
--

CREATE TABLE `anonymous` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

CREATE TABLE `bed` (
  `id` int(11) NOT NULL,
  `bed_no` varchar(40) NOT NULL,
  `room_no` varchar(40) NOT NULL,
  `nurse_id` int(11) NOT NULL,
  `ac` varchar(40) NOT NULL,
  `rent` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bed`
--

INSERT INTO `bed` (`id`, `bed_no`, `room_no`, `nurse_id`, `ac`, `rent`) VALUES
(2, '003', 'g3', 3, 'Ac', '3000'),
(6, '7000', 'q5', 4, 'Non-ac', '2500'),
(7, '607', 'B8', 4, 'Non-ac', '6500');

-- --------------------------------------------------------

--
-- Table structure for table `bed_allotment`
--

CREATE TABLE `bed_allotment` (
  `id` int(11) NOT NULL,
  `bed_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `admit_date` datetime NOT NULL DEFAULT current_timestamp(),
  `release_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bed_allotment`
--

INSERT INTO `bed_allotment` (`id`, `bed_id`, `patient_id`, `admit_date`, `release_date`) VALUES
(1, 2, 2, '2019-12-04 10:41:16', '2019-12-08 22:37:18'),
(4, 6, 13, '2019-12-09 00:28:34', '2019-12-09 00:28:46'),
(5, 2, 14, '2019-12-09 12:35:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank`
--

CREATE TABLE `blood_bank` (
  `id` int(11) NOT NULL,
  `blood_group_id` varchar(40) NOT NULL,
  `num_of_bags` varchar(255) NOT NULL,
  `bed_allotment_id` int(11) NOT NULL,
  `received_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `released_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_bank`
--

INSERT INTO `blood_bank` (`id`, `blood_group_id`, `num_of_bags`, `bed_allotment_id`, `received_date`, `released_date`) VALUES
(1, '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '4', '5', 1, '1996-12-01 18:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Donate Blood` varchar(255) NOT NULL,
  `Receive Blood` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`id`, `name`, `Donate Blood`, `Receive Blood`, `details`) VALUES
(1, 'A+', 'A+ AB+', 'A+ A- O+ O-', ''),
(2, 'A-', 'A+ A- AB+ AB-', 'A- O-', ''),
(3, 'B+', 'B+ AB+', 'B+ B- O+ O-', ''),
(4, 'B-', 'B+ B- AB+ AB-', 'B- O-', ''),
(5, 'AB+', 'AB+', 'Everyone', ''),
(6, 'AB-', 'AB+ AB-', 'AB- A- B- O-', ''),
(7, 'O+', 'O+ A+ B+ AB+', 'O+ O-', ''),
(8, 'O-', 'Everyone', 'O-', '');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(40) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`, `details`) VALUES
(1, 'cardiology', 'ok'),
(2, 'Dermatology', ''),
(3, 'Microbiology', ''),
(4, 'Pathology', ''),
(5, 'Histopathology', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `designation` varchar(40) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `fees` varchar(40) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `doctor_image` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `designation`, `dept_id`, `status`, `fees`, `contact`, `doctor_image`, `username`, `password`) VALUES
(20, 'jabed', 'Professor', 5, 1, '5000', '01622438306', '5dad371a82ffa.jpg', 'jabedhosen', '123'),
(23, 'Md jahangir', 'Professor', 4, 1, '1000', '01914564564', '5dc0675404093.jpg', 'jahangir Alom', '123'),
(25, 'dr obaidul kader', 'MBBS', 2, 1, '300', '01714568957', '5dc075ce71f38.jpg', 'kader', '456789'),
(26, 'Dr. Saddik', 'Asst. Professor', 2, 1, '1000', '0171548625', '5dc077aebdfdb.jpg', 'saddik', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_schedule`
--

CREATE TABLE `doctors_schedule` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors_schedule`
--

INSERT INTO `doctors_schedule` (`id`, `doctor_id`, `day_id`, `start`, `end`) VALUES
(1, 20, 6, '24:12:00', '24:12:00'),
(5, 20, 6, '14:35:00', '20:35:00'),
(8, 20, 4, '14:35:00', '20:35:00'),
(9, 20, 6, '16:24:00', '16:25:00'),
(10, 20, 1, '16:24:00', '16:25:00'),
(11, 20, 3, '16:24:00', '16:25:00'),
(14, 4, 4, '08:01:00', '16:00:00'),
(15, 19, 6, '16:33:00', '16:33:00'),
(17, 23, 6, '24:48:00', '16:48:00'),
(18, 23, 1, '24:48:00', '16:48:00'),
(19, 23, 3, '24:48:00', '16:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_appointment`
--

CREATE TABLE `doctor_appointment` (
  `id` int(11) NOT NULL,
  `doctors_id` int(11) NOT NULL,
  `patient_name` varchar(40) NOT NULL,
  `patient_contact` varchar(40) NOT NULL,
  `patient_details` varchar(255) NOT NULL,
  `doctors_schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `generic_name` varchar(255) NOT NULL,
  `price` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `name`, `generic_name`, `price`) VALUES
(1, 'napa1', '1', '10'),
(3, 'histacine50', '1', '30'),
(4, 'ciprocine', '1', '5');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_sell_info`
--

CREATE TABLE `medicine_sell_info` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `sold_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_sell_info`
--

INSERT INTO `medicine_sell_info` (`id`, `patient_id`, `sold_at`) VALUES
(6, 2, '0000-00-00 00:00:00'),
(7, 3, '2019-11-26 22:50:50'),
(8, 10, '2019-11-26 22:58:16'),
(9, 10, '2019-12-02 12:21:06'),
(10, 11, '2019-12-04 10:14:24'),
(11, 12, '2019-12-04 10:42:50'),
(12, 13, '2019-12-09 00:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_sell_line`
--

CREATE TABLE `medicine_sell_line` (
  `id` int(11) NOT NULL,
  `sell_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine_sell_line`
--

INSERT INTO `medicine_sell_line` (`id`, `sell_id`, `medicine_id`, `quantity`) VALUES
(1, 6, 1, 3),
(2, 6, 3, 5),
(3, 6, 4, 1),
(4, 0, 1, 10),
(5, 0, 3, 12),
(6, 8, 1, 10),
(7, 8, 3, 12),
(8, 0, 3, 7),
(9, 0, 4, 3),
(10, 0, 1, 1000),
(11, 0, 3, 7),
(12, 0, 3, 2),
(13, 0, 0, 0),
(14, 0, 0, 0),
(15, 0, 0, 0),
(16, 9, 1, 1),
(17, 10, 3, 0),
(18, 11, 3, 2),
(19, 0, 1, 3),
(20, 0, 0, 0),
(21, 12, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` varchar(40) NOT NULL,
  `reciever` varchar(40) NOT NULL,
  `sender_type` int(11) NOT NULL,
  `message` text NOT NULL,
  `send_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `seen_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `reciever`, `sender_type`, `message`, `send_at`, `seen_at`) VALUES
(1, 'asas', '23', 1, 'kire', '2019-11-06 04:39:46', NULL),
(2, '23', 'asas', 2, 'ok', '2019-11-06 04:44:45', NULL),
(71, 'null', '23', 1, 'sadf', '2020-01-15 07:19:28', NULL),
(72, 'null', '23', 1, 'sdfsd', '2020-01-15 07:19:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `name`, `contact`, `status`, `image`, `username`, `password`) VALUES
(3, 'tania12', '019758223231', 1, '5dabd9f8f29dd.jpg', 'taniaakter', '01715'),
(4, 'bilkis', '016226456544', 1, '5dabdc0d90265.jpg', 'bilkis', '123');

-- --------------------------------------------------------

--
-- Table structure for table `nurse_duty`
--

CREATE TABLE `nurse_duty` (
  `id` int(11) NOT NULL,
  `nurse_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurse_duty`
--

INSERT INTO `nurse_duty` (`id`, `nurse_id`, `day_id`, `start`, `end`) VALUES
(5, 4, 6, '08:01:00', '18:01:00'),
(6, 4, 0, '08:01:00', '18:01:00'),
(7, 4, 2, '08:01:00', '18:01:00'),
(8, 3, 6, '14:14:00', '16:14:00'),
(9, 3, 1, '14:14:00', '16:14:00'),
(10, 3, 2, '14:14:00', '16:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(40) NOT NULL,
  `department_id` int(11) NOT NULL,
  `refer_doctor` int(11) NOT NULL,
  `details` varchar(255) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `guardian_name` varchar(40) NOT NULL,
  `guardian_contact` varchar(40) NOT NULL,
  `paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `patient_name`, `department_id`, `refer_doctor`, `details`, `contact`, `guardian_name`, `guardian_contact`, `paid`) VALUES
(2, 'piash', 3, 20, '', '01917605587', 'Uncle', '01742349541', 0),
(13, 'Zahir khan', 2, 25, 'Write details your Problems.', '0163558744', 'Shah alom', '01917845236', 0),
(14, 'sojib', 4, 23, 'Write details your Problems.', '01484759866', ' Abul hosen', '0156875466', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `method` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `paid` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `contact` varchar(40) NOT NULL,
  `image` varchar(255) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`id`, `name`, `contact`, `image`, `username`, `password`) VALUES
(2, 'arifhosen', '0158796522', '5dad2376494d2.jpg', 'hosen', '01918');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist_duty`
--

CREATE TABLE `pharmacist_duty` (
  `id` int(11) NOT NULL,
  `pharmacist_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacist_duty`
--

INSERT INTO `pharmacist_duty` (`id`, `pharmacist_id`, `day_id`, `start`, `end`) VALUES
(8, 2, 2, '08:00:00', '18:00:00'),
(9, 2, 4, '08:00:00', '18:00:00'),
(13, 2, 2, '21:04:00', '17:04:00'),
(14, 2, 6, '20:31:00', '20:31:00'),
(15, 2, 2, '20:31:00', '20:31:00'),
(16, 2, 4, '20:31:00', '20:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `print_check`
--

CREATE TABLE `print_check` (
  `id` int(11) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `paid` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `test_price` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `test_name`, `test_price`, `details`) VALUES
(1, 'a4', '500', 'asd adsf sdf'),
(2, 'dd4', '5000', 'af aasfdasdf dsafsf'),
(3, 'a10', '500', 'asfd asfsdfasdf sa asdf');

-- --------------------------------------------------------

--
-- Table structure for table `test_reports`
--

CREATE TABLE `test_reports` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `tests_id` int(11) NOT NULL,
  `examined_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delivered_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_reports`
--

INSERT INTO `test_reports` (`id`, `patient_id`, `tests_id`, `examined_at`, `delivered_at`) VALUES
(1, 2, 1, '2019-12-04 18:51:09', NULL),
(2, 10, 2, '2019-12-04 18:51:14', NULL),
(3, 13, 3, '2019-12-09 08:28:57', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_chat`
--
ALTER TABLE `admin_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anonymous`
--
ALTER TABLE `anonymous`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bed`
--
ALTER TABLE `bed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bed_allotment`
--
ALTER TABLE `bed_allotment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors_schedule`
--
ALTER TABLE `doctors_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_appointment`
--
ALTER TABLE `doctor_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_sell_info`
--
ALTER TABLE `medicine_sell_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_sell_line`
--
ALTER TABLE `medicine_sell_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse_duty`
--
ALTER TABLE `nurse_duty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacist_duty`
--
ALTER TABLE `pharmacist_duty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `print_check`
--
ALTER TABLE `print_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_reports`
--
ALTER TABLE `test_reports`
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
-- AUTO_INCREMENT for table `admin_chat`
--
ALTER TABLE `admin_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `anonymous`
--
ALTER TABLE `anonymous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bed`
--
ALTER TABLE `bed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bed_allotment`
--
ALTER TABLE `bed_allotment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blood_bank`
--
ALTER TABLE `blood_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `doctors_schedule`
--
ALTER TABLE `doctors_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `doctor_appointment`
--
ALTER TABLE `doctor_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicine_sell_info`
--
ALTER TABLE `medicine_sell_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `medicine_sell_line`
--
ALTER TABLE `medicine_sell_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nurse_duty`
--
ALTER TABLE `nurse_duty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pharmacist_duty`
--
ALTER TABLE `pharmacist_duty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `print_check`
--
ALTER TABLE `print_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test_reports`
--
ALTER TABLE `test_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
