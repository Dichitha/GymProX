
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 05:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gympro`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateUserProgress` (IN `userId` INT, IN `iniWeight` INT, IN `currWeight` INT, IN `iniBodyType` VARCHAR(50), IN `currBodyType` VARCHAR(50))   BEGIN
    UPDATE members
    SET ini_weight = iniWeight,
        curr_weight = currWeight,
        ini_bodytype = iniBodyType,
        curr_bodytype = currBodyType,
        progress_date = NOW() -- Use the current timestamp
    WHERE user_id = userId;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `name`) VALUES
(2, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `curr_date` text NOT NULL,
  `curr_time` text NOT NULL,
  `present` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `user_id`, `curr_date`, `curr_time`, `present`) VALUES
(33, 34, '2023-11-11', '07:38 PM', 0),
(36, 34, '2023-11-12', '09:39 PM', 0),
(38, 30, '2023-11-15', '08:30 AM', 1);

--
-- Triggers `attendance`
--
DELIMITER $$
CREATE TRIGGER `update_attendance_count` AFTER INSERT ON `attendance` FOR EACH ROW BEGIN
    IF NEW.present = 1 THEN
        -- Increment the attendance count for the user
        UPDATE members
        SET attendance_count = (attendance_count + 1)
        WHERE user_id = NEW.user_id;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `amount` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `name`, `amount`, `quantity`, `description`) VALUES
(3, 'Treadmill', 100, 1, 'Edited Description'),
(5, 'Dumbell - Adjustable', 102, 1, 'Material: Steel, Rubber Plastic, Concrete');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--
CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `charge` varchar(255) NOT NULL
   
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `members` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dor` date NOT NULL,
  `services` varchar(50) NOT NULL,
  `amount` int(100) NOT NULL,
  `paid_date` date NOT NULL,
  `p_year` int(11) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `address` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `attendance_count` int(100) NOT NULL,
  `ini_weight` int(100) NOT NULL DEFAULT 0,
  `curr_weight` int(100) NOT NULL DEFAULT 0,
  `ini_bodytype` varchar(50) NOT NULL,
  `curr_bodytype` varchar(50) NOT NULL,
  `progress_date` date NOT NULL,
  `reminder` int(11) NOT NULL DEFAULT 0,
  `staff_id` int(11) default NULL,
  INDEX `idx_rates_name` (`services`),
  INDEX `idx_members_staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `fullname`, `username`, `password`, `gender`, `dor`, `services`, `amount`, `paid_date`, `p_year`, `plan`, `address`, `contact`, `status`, `attendance_count`, `ini_weight`, `curr_weight`, `ini_bodytype`, `curr_bodytype`, `progress_date`,`staff_id`) VALUES
(30, 'Namrata C V', 'namrata', 'e99a18c428cb38d5f260853678922e03', 'Male', '2023-10-28', 'Fitness', 55, '2023-10-28', 0, '1', 'Bangalore', '9876543211', 'Active', 13, 54, 51, 'Pear ', 'Hourglass', '2023-11-07',5),
(31, ' Bhavana ', 'bhavs@gmail.com', 'c64d91210e4c4896aa299d72e01d2348', 'Female', '2023-11-06', 'Cardio', 40, '2023-11-07', 0, '1', 'Bangalore', '9876543210', 'Active', 17, 0, 0, '', '', '0000-00-00',5),
(32, 'Dichitha', 'dichitha', '9da0d93cdff5b3d0eb3772e05d7028e9', 'Female', '2023-11-06', 'Sauna', 35, '2023-11-12', 2023, '1', 'Bangalore', '1234567890', 'Active', 15, 48, 45, '', '', '2023-11-07',7),
(33, 'Steve', 'steve', 'd69403e2673e611d4cbd3fad6fd1788e', 'Male', '2023-11-06', 'Cardio', 120, '2023-11-06', 2023, '3', 'Hawkins', '1234566520', 'Active', 31, 0, 0, '', '', '0000-00-00',9),
(34, 'Disha', 'disha', '741fd4e081208df4bb46052b08abb511', 'Female', '2023-11-07', 'Fitness', 165, '2023-11-09', 2023, '3', 'Bangalore', '1246578950', 'Active', 29, 0, 0, '', '', '0000-00-00',8),
(35, 'Nandita', 'nandita', 'b9127afa7ee8da9df7ea1c8d9ba08971', 'Female', '2023-11-15', 'Sauna', 105, '2023-11-15', 0, '3', 'Mangalore', '1234567890', 'Active', 5, 0, 0, '', '', '0000-00-00',9);
-- --------------------------------------------------------

--
-- Table structure for table `rates`
--



--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `name`, `charge`) VALUES
(1, 'Fitness', '55'),
(2, 'Sauna', '35'),
(3, 'Cardio', '40');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`user_id`, `username`, `password`, `email`, `fullname`, `address`, `designation`, `gender`, `contact`) VALUES
(5, 'harry', 'd0d2b883ffe11676af7e678cf45a36fa', 'harry@gmail.com', 'Harry Wilson', 'Bangalore', 'Trainer', 'Male', 1234567890),
(7, 'nammu', '6f49a3c53aba32154c32679c17264c76', 'nammu@gmail.com', 'Namrata', 'Bangalore', 'Trainer', 'Female', 1002003004),
(8, 'emma', '1f050242921954f2c734eec74ce2ecb6', 'emma@gmail.com', 'Emma Williams', 'Delhi', 'Trainer', 'Female', 987654321),
(9, 'jason', '2b877b4b825b48a9a0950dd5bd1f264d', 'jason@gmail.com', 'Jason', 'Bangalore', 'Trainer', 'Male', 1234567800);

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `task_status` varchar(50) NOT NULL,
  `task_desc` varchar(30) NOT NULL,
  `user_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `task_status`, `task_desc`, `user_id`) VALUES
(1, 'In Progress', 'hello 123', 33),
(2, 'In Progress', 'hell0 232', 33),
(3, 'In Progress', 'push up 3 sets of 50', 33);

--
-- Indexes for dumped tables
--
ALTER TABLE `rates`
  ADD INDEX `idx_rates_name` (`name`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);


--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_todo_user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `members` (`user_id`);

	
ALTER TABLE `members`
	ADD CONSTRAINT `fk_members_staff` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`user_id`) ;

ALTER TABLE `members`
  ADD CONSTRAINT `fk_members_rates_name` FOREIGN KEY (`services`) REFERENCES `rates` (`name`);	
--
-- Constraints for table `todo`
--
ALTER TABLE `todo`
  ADD CONSTRAINT `fk_todo_user` FOREIGN KEY (`user_id`) REFERENCES `members` (`user_id`) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




