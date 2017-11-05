-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2017 at 08:14 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `society`
--

-- --------------------------------------------------------

--
-- Table structure for table `broker`
--

CREATE TABLE `broker` (
  `id` int(11) NOT NULL,
  `introducer_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `broker_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `broker`
--

INSERT INTO `broker` (`id`, `introducer_id`, `member_id`, `broker_type`, `status`, `date`) VALUES
(1, 1, 1, '1', 'active', '2017-07-19 07:26:02'),
(7, 1, 2, '1', 'active', '2017-07-26 15:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `broker_type`
--

CREATE TABLE `broker_type` (
  `id` int(11) NOT NULL,
  `broker_type` varchar(255) NOT NULL,
  `commission` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `broker_type`
--

INSERT INTO `broker_type` (`id`, `broker_type`, `commission`) VALUES
(1, 'ADVISER (RANK 1)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `state_id`, `city_name`) VALUES
(1, 1, 'KARNAL'),
(2, 1, 'PANIPAT'),
(3, 2, 'JALANDHAR');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `ledger` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_type` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `in_out` varchar(255) NOT NULL,
  `narration` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `ledger`, `customer_id`, `customer_type`, `amount`, `payment_mode`, `in_out`, `narration`, `date`) VALUES
(3, 1, 1, 'rd', 40772, 'bank_acc', 'out', 'kch', '2017-07-17 09:02:29'),
(5, 7, 0, '', 20000, 'Cash', 'out', 'LOAN', '2017-07-26 07:44:19'),
(6, 1, 0, '', 20000, 'cash', 'out', 'qwerty', '2017-07-26 08:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `fd_customer`
--

CREATE TABLE `fd_customer` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `introducer_id` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `plan_name` int(11) NOT NULL,
  `adjustment_amount` int(11) NOT NULL,
  `plan_amount` int(11) NOT NULL,
  `compounding` varchar(255) NOT NULL,
  `payment_period` float NOT NULL,
  `total_amount` int(11) NOT NULL,
  `maturity_amount` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fd_customer`
--

INSERT INTO `fd_customer` (`id`, `member_id`, `introducer_id`, `payment_mode`, `plan_name`, `adjustment_amount`, `plan_amount`, `compounding`, `payment_period`, `total_amount`, `maturity_amount`, `status`, `date`) VALUES
(1, 2, 1, 'bycash', 1, 0, 10000, 'quarterly', 3.5, 10000, 10617, 'active', '2017-07-03 18:26:05'),
(2, 2, 1, 'bycash', 2, 0, 200000, 'quarterly', 5.5, 200000, 220979, 'active', '2017-07-04 09:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `fd_plans`
--

CREATE TABLE `fd_plans` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `time_period` int(11) NOT NULL,
  `maturity_time` decimal(10,0) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fd_plans`
--

INSERT INTO `fd_plans` (`id`, `plan_name`, `time_period`, `maturity_time`, `rate`) VALUES
(1, 'FD 3 YEAR', 3, '6', 10),
(2, 'FD 5 YEAR', 5, '6', 10.25),
(3, 'FD 1 YEAR', 1, '6', 8.5);

-- --------------------------------------------------------

--
-- Table structure for table `installment_types`
--

CREATE TABLE `installment_types` (
  `id` int(11) NOT NULL,
  `installment_name` varchar(255) NOT NULL,
  `period` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `id` int(11) NOT NULL,
  `ledger` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`id`, `ledger`) VALUES
(1, 'APPLICATION FEE'),
(2, 'PRE-MATURITY'),
(3, 'MATURITY'),
(4, 'AC MAINTENANCE'),
(5, 'FUND TRANSFER'),
(7, 'LOAN');

-- --------------------------------------------------------

--
-- Table structure for table `loan_customers`
--

CREATE TABLE `loan_customers` (
  `id` int(11) NOT NULL,
  `introducer_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `application_number` varchar(255) NOT NULL,
  `loan_type` int(11) NOT NULL,
  `plan_name` int(11) NOT NULL,
  `loan_amount` int(11) NOT NULL,
  `installment` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_customers`
--

INSERT INTO `loan_customers` (`id`, `introducer_id`, `member_id`, `application_number`, `loan_type`, `plan_name`, `loan_amount`, `installment`, `status`, `date`) VALUES
(1, 1, 2, '1', 1, 1, 20000, 1829, 'disburse', '2017-07-20 22:26:13'),
(2, 1, 2, '2', 1, 1, 50000, 4572, 'pending', '2017-07-25 09:42:43'),
(3, 1, 1, '3', 1, 1, 100000, 9144, 'disburse', '2017-07-20 22:26:22'),
(4, 1, 3, '4', 1, 1, 20000, 1829, 'disburse', '2017-07-27 11:55:16'),
(6, 1, 4, '5', 1, 1, 100000, 9144, 'disburse', '2017-08-01 07:17:43');

-- --------------------------------------------------------

--
-- Table structure for table `loan_plans`
--

CREATE TABLE `loan_plans` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `time_period` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_plans`
--

INSERT INTO `loan_plans` (`id`, `plan_name`, `time_period`) VALUES
(1, '1 YEAR', 12),
(2, '2 YEAR', 24),
(3, '3 YEAR', 36),
(4, '4 YEAR', 48),
(5, '5 YEAR', 60),
(6, '6 YEAR', 6);

-- --------------------------------------------------------

--
-- Table structure for table `loan_transactions`
--

CREATE TABLE `loan_transactions` (
  `id` int(11) NOT NULL,
  `loan_customer_id` int(11) NOT NULL,
  `installment_no` int(11) NOT NULL,
  `installment_amount` int(11) NOT NULL,
  `installment_date` date NOT NULL,
  `is_paid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_transactions`
--

INSERT INTO `loan_transactions` (`id`, `loan_customer_id`, `installment_no`, `installment_amount`, `installment_date`, `is_paid`) VALUES
(1, 1, 1, 1829, '2017-08-21', 0),
(2, 1, 2, 1829, '2017-09-21', 0),
(3, 1, 3, 1829, '2017-10-21', 0),
(4, 1, 4, 1829, '2017-11-21', 0),
(5, 1, 5, 1829, '2017-12-21', 0),
(6, 1, 6, 1829, '2018-01-21', 0),
(7, 1, 7, 1829, '2018-02-21', 0),
(8, 1, 8, 1829, '2018-03-21', 0),
(9, 1, 9, 1829, '2018-04-21', 0),
(10, 1, 10, 1829, '2018-05-21', 0),
(11, 1, 11, 1829, '2018-06-21', 0),
(12, 1, 12, 1829, '2018-07-21', 0),
(13, 3, 1, 9144, '2017-08-21', 0),
(14, 3, 2, 9144, '2017-09-21', 0),
(15, 3, 3, 9144, '2017-10-21', 0),
(16, 3, 4, 9144, '2017-11-21', 0),
(17, 3, 5, 9144, '2017-12-21', 0),
(18, 3, 6, 9144, '2018-01-21', 0),
(19, 3, 7, 9144, '2018-02-21', 0),
(20, 3, 8, 9144, '2018-03-21', 0),
(21, 3, 9, 9144, '2018-04-21', 0),
(22, 3, 10, 9144, '2018-05-21', 0),
(23, 3, 11, 9144, '2018-06-21', 0),
(24, 3, 12, 9144, '2018-07-21', 0),
(25, 4, 1, 1829, '2017-08-27', 0),
(26, 4, 2, 1829, '2017-09-27', 0),
(27, 4, 3, 1829, '2017-10-27', 0),
(28, 4, 4, 1829, '2017-11-27', 0),
(29, 4, 5, 1829, '2017-12-27', 0),
(30, 4, 6, 1829, '2018-01-27', 0),
(31, 4, 7, 1829, '2018-02-27', 0),
(32, 4, 8, 1829, '2018-03-27', 0),
(33, 4, 9, 1829, '2018-04-27', 0),
(34, 4, 10, 1829, '2018-05-27', 0),
(35, 4, 11, 1829, '2018-06-27', 0),
(36, 4, 12, 1829, '2018-07-27', 0),
(37, 6, 1, 9144, '2017-09-01', 1),
(38, 6, 2, 9144, '2017-10-01', 0),
(39, 6, 3, 9144, '2017-11-01', 0),
(40, 6, 4, 9144, '2017-12-01', 0),
(41, 6, 5, 9144, '2018-01-01', 0),
(42, 6, 6, 9144, '2018-02-01', 0),
(43, 6, 7, 9144, '2018-03-01', 0),
(44, 6, 8, 9144, '2018-04-01', 0),
(45, 6, 9, 9144, '2018-05-01', 0),
(46, 6, 10, 9144, '2018-06-01', 0),
(47, 6, 11, 9144, '2018-07-01', 0),
(48, 6, 12, 9144, '2018-08-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loan_type`
--

CREATE TABLE `loan_type` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_type`
--

INSERT INTO `loan_type` (`id`, `plan_name`, `rate`) VALUES
(1, 'PERSONAL LOAN', 17.5),
(2, 'HOME LOAN', 12.5),
(3, 'CAR LOAN', 12.5),
(4, 'EDUCATION', 8.25);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `introducer_id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `guardian_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pin_code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `introducer_id`, `member_name`, `guardian_name`, `date_of_birth`, `age`, `gender`, `contact_no`, `email`, `address`, `city`, `district`, `state`, `pin_code`, `status`, `date`) VALUES
(1, 1, 'Mr mohit', 's/o jagdish', '1996-01-03', '21', 'male', '8559098967', 'mohitdemon755@gmail.com', 'jyoti nagar', '1', 'karnal', '1', '132001', 'active', '2017-06-29 09:44:03'),
(2, 1, 'Mr vikas', 's/o ram', '1996-06-19', '21', 'male', '7404136591', '', 'prem nagar', '1', 'karnal', '1', '132001', 'active', '2017-06-30 10:30:38'),
(3, 1, 'Mr afsd', 's/o sdfs', '2017-07-08', '21', 'male', '645368', 'moh@gmail.com', 'afdsdfs', '1', 'sfd', '1', '12313', 'active', '2017-07-27 10:09:03'),
(4, 1, 'Ms Shalini', 's/o papa', '1997-04-17', '20', 'female', '789456123', 's@gmail.com', 'ramamandi', '1', 'jalandhar', '2', '144001', 'active', '2017-08-01 06:57:26');

-- --------------------------------------------------------

--
-- Table structure for table `nominee`
--

CREATE TABLE `nominee` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `relation` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `pan_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nominee`
--

INSERT INTO `nominee` (`id`, `member_id`, `name`, `age`, `relation`, `address`, `bank_name`, `branch_name`, `ifsc_code`, `account_no`, `pan_no`) VALUES
(1, 1, 'sd', '2', '1', 'sd', 'sd', 'sd', 'sd', 'sd', 'sd'),
(2, 2, 'mohit', '21', '7', 'jyoti nagar', 'pnb', 'prem nagar', '567', '1234', '89'),
(3, 3, 'sdf', '32', '1', 'wef', 'sdfsdf', 'sdfsd', 'sdfsdsfd', 'sdfsdf', 'sdfsd'),
(4, 4, 'shalini', '20', '8', 'same', 'qwerty', 'wertyuiol', '5', '4148614', 'a5');

-- --------------------------------------------------------

--
-- Table structure for table `rd_customer`
--

CREATE TABLE `rd_customer` (
  `id` int(11) NOT NULL,
  `introducer_id` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `adjustment_amount` int(11) NOT NULL,
  `installment_amount` int(11) NOT NULL,
  `compounding` varchar(255) NOT NULL,
  `payment_period` float NOT NULL,
  `total_amount` int(11) NOT NULL,
  `maturity_amount` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rd_customer`
--

INSERT INTO `rd_customer` (`id`, `introducer_id`, `payment_mode`, `plan_name`, `adjustment_amount`, `installment_amount`, `compounding`, `payment_period`, `total_amount`, `maturity_amount`, `status`, `date`, `member_id`) VALUES
(1, 1, 'bycash', '1', 0, 1000, 'quarterly', 3, 36000, 40772, 'deactive', '2017-07-03 18:32:45', 1),
(2, 1, 'bycash', '2', 0, 1000, 'quarterly', 5, 60000, 73862, 'active', '2017-07-07 13:40:00', 2),
(3, 1, 'bycash', '2', 0, 1000, 'quarterly', 5, 60000, 73862, 'active', '2017-07-07 13:52:01', 2),
(4, 1, 'bycash', '2', 0, 1000, 'quarterly', 5, 60000, 73862, 'active', '2017-07-07 13:54:13', 2),
(5, 1, 'bycash', '1', 0, 1000, 'quarterly', 3, 36000, 40772, 'active', '2017-07-07 14:12:18', 2),
(6, 1, 'bycash', '1', 0, 1000, 'quarterly', 3, 36000, 40772, 'active', '2017-07-07 14:34:14', 2),
(7, 1, 'bycash', '1', 0, 500, 'monthly', 3, 18000, 20484, 'active', '2017-07-27 10:10:23', 3),
(8, 1, 'bycash', '2', 0, 1000, 'quarterly', 5, 60000, 73862, 'active', '2017-08-02 17:26:20', 2),
(9, 1, 'bycash', '2', 0, 1000, 'quarterly', 5, 60000, 73862, 'active', '2017-08-02 17:26:47', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rd_plans`
--

CREATE TABLE `rd_plans` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `time_period` int(11) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rd_plans`
--

INSERT INTO `rd_plans` (`id`, `plan_name`, `time_period`, `rate`) VALUES
(1, 'RD 3 YEAR', 3, 8.25),
(2, 'RD 5 YEAR', 5, 8),
(3, 'RD 1 YEAR', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `rd_transactions`
--

CREATE TABLE `rd_transactions` (
  `id` int(11) NOT NULL,
  `rd_customer_id` int(11) NOT NULL,
  `installment_amount` int(11) NOT NULL,
  `installment_no` int(11) NOT NULL,
  `plan_name` int(11) NOT NULL,
  `due_date` date NOT NULL,
  `payment_date` date NOT NULL,
  `late_fee` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `paid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rd_transactions`
--

INSERT INTO `rd_transactions` (`id`, `rd_customer_id`, `installment_amount`, `installment_no`, `plan_name`, `due_date`, `payment_date`, `late_fee`, `total_amount`, `paid`) VALUES
(1, 6, 1000, 1, 1, '2017-07-07', '0000-00-00', 0, 0, 1),
(2, 6, 1000, 2, 1, '2017-08-07', '0000-00-00', 0, 0, 1),
(3, 6, 1000, 3, 1, '2017-09-07', '0000-00-00', 0, 0, 1),
(4, 6, 1000, 4, 1, '2017-10-07', '0000-00-00', 0, 0, 1),
(5, 6, 1000, 5, 1, '2017-11-07', '0000-00-00', 0, 0, 1),
(6, 6, 1000, 6, 1, '2017-12-07', '0000-00-00', 0, 0, 0),
(7, 6, 1000, 7, 1, '2018-01-07', '0000-00-00', 0, 0, 0),
(8, 6, 1000, 8, 1, '2018-02-07', '0000-00-00', 0, 0, 0),
(9, 6, 1000, 9, 1, '2018-03-07', '0000-00-00', 0, 0, 0),
(10, 6, 1000, 10, 1, '2018-04-07', '0000-00-00', 0, 0, 0),
(11, 6, 1000, 11, 1, '2018-05-07', '0000-00-00', 0, 0, 0),
(12, 6, 1000, 12, 1, '2018-06-07', '0000-00-00', 0, 0, 0),
(13, 6, 1000, 13, 1, '2018-07-07', '0000-00-00', 0, 0, 0),
(14, 6, 1000, 14, 1, '2018-08-07', '0000-00-00', 0, 0, 0),
(15, 6, 1000, 15, 1, '2018-09-07', '0000-00-00', 0, 0, 0),
(16, 6, 1000, 16, 1, '2018-10-07', '0000-00-00', 0, 0, 0),
(17, 6, 1000, 17, 1, '2018-11-07', '0000-00-00', 0, 0, 0),
(18, 6, 1000, 18, 1, '2018-12-07', '0000-00-00', 0, 0, 0),
(19, 6, 1000, 19, 1, '2019-01-07', '0000-00-00', 0, 0, 0),
(20, 6, 1000, 20, 1, '2019-02-07', '0000-00-00', 0, 0, 0),
(21, 6, 1000, 21, 1, '2019-03-07', '0000-00-00', 0, 0, 0),
(22, 6, 1000, 22, 1, '2019-04-07', '0000-00-00', 0, 0, 0),
(23, 6, 1000, 23, 1, '2019-05-07', '0000-00-00', 0, 0, 0),
(24, 6, 1000, 24, 1, '2019-06-07', '0000-00-00', 0, 0, 0),
(25, 6, 1000, 25, 1, '2019-07-07', '0000-00-00', 0, 0, 0),
(26, 6, 1000, 26, 1, '2019-08-07', '0000-00-00', 0, 0, 0),
(27, 6, 1000, 27, 1, '2019-09-07', '0000-00-00', 0, 0, 0),
(28, 6, 1000, 28, 1, '2019-10-07', '0000-00-00', 0, 0, 0),
(29, 6, 1000, 29, 1, '2019-11-07', '0000-00-00', 0, 0, 0),
(30, 6, 1000, 30, 1, '2019-12-07', '0000-00-00', 0, 0, 0),
(31, 6, 1000, 31, 1, '2020-01-07', '0000-00-00', 0, 0, 0),
(32, 6, 1000, 32, 1, '2020-02-07', '0000-00-00', 0, 0, 0),
(33, 6, 1000, 33, 1, '2020-03-07', '0000-00-00', 0, 0, 0),
(34, 6, 1000, 34, 1, '2020-04-07', '0000-00-00', 0, 0, 0),
(35, 6, 1000, 35, 1, '2020-05-07', '0000-00-00', 0, 0, 0),
(36, 6, 1000, 36, 1, '2020-06-07', '0000-00-00', 0, 0, 0),
(37, 7, 500, 1, 1, '2017-07-27', '0000-00-00', 0, 0, 0),
(38, 7, 500, 2, 1, '2017-08-27', '0000-00-00', 0, 0, 0),
(39, 7, 500, 3, 1, '2017-09-27', '0000-00-00', 0, 0, 0),
(40, 7, 500, 4, 1, '2017-10-27', '0000-00-00', 0, 0, 0),
(41, 7, 500, 5, 1, '2017-11-27', '0000-00-00', 0, 0, 0),
(42, 7, 500, 6, 1, '2017-12-27', '0000-00-00', 0, 0, 0),
(43, 7, 500, 7, 1, '2018-01-27', '0000-00-00', 0, 0, 0),
(44, 7, 500, 8, 1, '2018-02-27', '0000-00-00', 0, 0, 0),
(45, 7, 500, 9, 1, '2018-03-27', '0000-00-00', 0, 0, 0),
(46, 7, 500, 10, 1, '2018-04-27', '0000-00-00', 0, 0, 0),
(47, 7, 500, 11, 1, '2018-05-27', '0000-00-00', 0, 0, 0),
(48, 7, 500, 12, 1, '2018-06-27', '0000-00-00', 0, 0, 0),
(49, 7, 500, 13, 1, '2018-07-27', '0000-00-00', 0, 0, 0),
(50, 7, 500, 14, 1, '2018-08-27', '0000-00-00', 0, 0, 0),
(51, 7, 500, 15, 1, '2018-09-27', '0000-00-00', 0, 0, 0),
(52, 7, 500, 16, 1, '2018-10-27', '0000-00-00', 0, 0, 0),
(53, 7, 500, 17, 1, '2018-11-27', '0000-00-00', 0, 0, 0),
(54, 7, 500, 18, 1, '2018-12-27', '0000-00-00', 0, 0, 0),
(55, 7, 500, 19, 1, '2019-01-27', '0000-00-00', 0, 0, 0),
(56, 7, 500, 20, 1, '2019-02-27', '0000-00-00', 0, 0, 0),
(57, 7, 500, 21, 1, '2019-03-27', '0000-00-00', 0, 0, 0),
(58, 7, 500, 22, 1, '2019-04-27', '0000-00-00', 0, 0, 0),
(59, 7, 500, 23, 1, '2019-05-27', '0000-00-00', 0, 0, 0),
(60, 7, 500, 24, 1, '2019-06-27', '0000-00-00', 0, 0, 0),
(61, 7, 500, 25, 1, '2019-07-27', '0000-00-00', 0, 0, 0),
(62, 7, 500, 26, 1, '2019-08-27', '0000-00-00', 0, 0, 0),
(63, 7, 500, 27, 1, '2019-09-27', '0000-00-00', 0, 0, 0),
(64, 7, 500, 28, 1, '2019-10-27', '0000-00-00', 0, 0, 0),
(65, 7, 500, 29, 1, '2019-11-27', '0000-00-00', 0, 0, 0),
(66, 7, 500, 30, 1, '2019-12-27', '0000-00-00', 0, 0, 0),
(67, 7, 500, 31, 1, '2020-01-27', '0000-00-00', 0, 0, 0),
(68, 7, 500, 32, 1, '2020-02-27', '0000-00-00', 0, 0, 0),
(69, 7, 500, 33, 1, '2020-03-27', '0000-00-00', 0, 0, 0),
(70, 7, 500, 34, 1, '2020-04-27', '0000-00-00', 0, 0, 0),
(71, 7, 500, 35, 1, '2020-05-27', '0000-00-00', 0, 0, 0),
(72, 7, 500, 36, 1, '2020-06-27', '0000-00-00', 0, 0, 0),
(73, 8, 1000, 1, 2, '2017-08-02', '0000-00-00', 0, 0, 0),
(74, 8, 1000, 2, 2, '2017-09-02', '0000-00-00', 0, 0, 0),
(75, 8, 1000, 3, 2, '2017-10-02', '0000-00-00', 0, 0, 0),
(76, 8, 1000, 4, 2, '2017-11-02', '0000-00-00', 0, 0, 0),
(77, 8, 1000, 5, 2, '2017-12-02', '0000-00-00', 0, 0, 0),
(78, 8, 1000, 6, 2, '2018-01-02', '0000-00-00', 0, 0, 0),
(79, 8, 1000, 7, 2, '2018-02-02', '0000-00-00', 0, 0, 0),
(80, 8, 1000, 8, 2, '2018-03-02', '0000-00-00', 0, 0, 0),
(81, 8, 1000, 9, 2, '2018-04-02', '0000-00-00', 0, 0, 0),
(82, 8, 1000, 10, 2, '2018-05-02', '0000-00-00', 0, 0, 0),
(83, 8, 1000, 11, 2, '2018-06-02', '0000-00-00', 0, 0, 0),
(84, 8, 1000, 12, 2, '2018-07-02', '0000-00-00', 0, 0, 0),
(85, 8, 1000, 13, 2, '2018-08-02', '0000-00-00', 0, 0, 0),
(86, 8, 1000, 14, 2, '2018-09-02', '0000-00-00', 0, 0, 0),
(87, 8, 1000, 15, 2, '2018-10-02', '0000-00-00', 0, 0, 0),
(88, 8, 1000, 16, 2, '2018-11-02', '0000-00-00', 0, 0, 0),
(89, 8, 1000, 17, 2, '2018-12-02', '0000-00-00', 0, 0, 0),
(90, 8, 1000, 18, 2, '2019-01-02', '0000-00-00', 0, 0, 0),
(91, 8, 1000, 19, 2, '2019-02-02', '0000-00-00', 0, 0, 0),
(92, 8, 1000, 20, 2, '2019-03-02', '0000-00-00', 0, 0, 0),
(93, 8, 1000, 21, 2, '2019-04-02', '0000-00-00', 0, 0, 0),
(94, 8, 1000, 22, 2, '2019-05-02', '0000-00-00', 0, 0, 0),
(95, 8, 1000, 23, 2, '2019-06-02', '0000-00-00', 0, 0, 0),
(96, 8, 1000, 24, 2, '2019-07-02', '0000-00-00', 0, 0, 0),
(97, 8, 1000, 25, 2, '2019-08-02', '0000-00-00', 0, 0, 0),
(98, 8, 1000, 26, 2, '2019-09-02', '0000-00-00', 0, 0, 0),
(99, 8, 1000, 27, 2, '2019-10-02', '0000-00-00', 0, 0, 0),
(100, 8, 1000, 28, 2, '2019-11-02', '0000-00-00', 0, 0, 0),
(101, 8, 1000, 29, 2, '2019-12-02', '0000-00-00', 0, 0, 0),
(102, 8, 1000, 30, 2, '2020-01-02', '0000-00-00', 0, 0, 0),
(103, 8, 1000, 31, 2, '2020-02-02', '0000-00-00', 0, 0, 0),
(104, 8, 1000, 32, 2, '2020-03-02', '0000-00-00', 0, 0, 0),
(105, 8, 1000, 33, 2, '2020-04-02', '0000-00-00', 0, 0, 0),
(106, 8, 1000, 34, 2, '2020-05-02', '0000-00-00', 0, 0, 0),
(107, 8, 1000, 35, 2, '2020-06-02', '0000-00-00', 0, 0, 0),
(108, 8, 1000, 36, 2, '2020-07-02', '0000-00-00', 0, 0, 0),
(109, 8, 1000, 37, 2, '2020-08-02', '0000-00-00', 0, 0, 0),
(110, 8, 1000, 38, 2, '2020-09-02', '0000-00-00', 0, 0, 0),
(111, 8, 1000, 39, 2, '2020-10-02', '0000-00-00', 0, 0, 0),
(112, 8, 1000, 40, 2, '2020-11-02', '0000-00-00', 0, 0, 0),
(113, 8, 1000, 41, 2, '2020-12-02', '0000-00-00', 0, 0, 0),
(114, 8, 1000, 42, 2, '2021-01-02', '0000-00-00', 0, 0, 0),
(115, 8, 1000, 43, 2, '2021-02-02', '0000-00-00', 0, 0, 0),
(116, 8, 1000, 44, 2, '2021-03-02', '0000-00-00', 0, 0, 0),
(117, 8, 1000, 45, 2, '2021-04-02', '0000-00-00', 0, 0, 0),
(118, 8, 1000, 46, 2, '2021-05-02', '0000-00-00', 0, 0, 0),
(119, 8, 1000, 47, 2, '2021-06-02', '0000-00-00', 0, 0, 0),
(120, 8, 1000, 48, 2, '2021-07-02', '0000-00-00', 0, 0, 0),
(121, 8, 1000, 49, 2, '2021-08-02', '0000-00-00', 0, 0, 0),
(122, 8, 1000, 50, 2, '2021-09-02', '0000-00-00', 0, 0, 0),
(123, 8, 1000, 51, 2, '2021-10-02', '0000-00-00', 0, 0, 0),
(124, 8, 1000, 52, 2, '2021-11-02', '0000-00-00', 0, 0, 0),
(125, 8, 1000, 53, 2, '2021-12-02', '0000-00-00', 0, 0, 0),
(126, 8, 1000, 54, 2, '2022-01-02', '0000-00-00', 0, 0, 0),
(127, 8, 1000, 55, 2, '2022-02-02', '0000-00-00', 0, 0, 0),
(128, 8, 1000, 56, 2, '2022-03-02', '0000-00-00', 0, 0, 0),
(129, 8, 1000, 57, 2, '2022-04-02', '0000-00-00', 0, 0, 0),
(130, 8, 1000, 58, 2, '2022-05-02', '0000-00-00', 0, 0, 0),
(131, 8, 1000, 59, 2, '2022-06-02', '0000-00-00', 0, 0, 0),
(132, 8, 1000, 60, 2, '2022-07-02', '0000-00-00', 0, 0, 0),
(133, 9, 1000, 1, 2, '2017-08-02', '0000-00-00', 0, 0, 0),
(134, 9, 1000, 2, 2, '2017-09-02', '0000-00-00', 0, 0, 0),
(135, 9, 1000, 3, 2, '2017-10-02', '0000-00-00', 0, 0, 0),
(136, 9, 1000, 4, 2, '2017-11-02', '0000-00-00', 0, 0, 0),
(137, 9, 1000, 5, 2, '2017-12-02', '0000-00-00', 0, 0, 0),
(138, 9, 1000, 6, 2, '2018-01-02', '0000-00-00', 0, 0, 0),
(139, 9, 1000, 7, 2, '2018-02-02', '0000-00-00', 0, 0, 0),
(140, 9, 1000, 8, 2, '2018-03-02', '0000-00-00', 0, 0, 0),
(141, 9, 1000, 9, 2, '2018-04-02', '0000-00-00', 0, 0, 0),
(142, 9, 1000, 10, 2, '2018-05-02', '0000-00-00', 0, 0, 0),
(143, 9, 1000, 11, 2, '2018-06-02', '0000-00-00', 0, 0, 0),
(144, 9, 1000, 12, 2, '2018-07-02', '0000-00-00', 0, 0, 0),
(145, 9, 1000, 13, 2, '2018-08-02', '0000-00-00', 0, 0, 0),
(146, 9, 1000, 14, 2, '2018-09-02', '0000-00-00', 0, 0, 0),
(147, 9, 1000, 15, 2, '2018-10-02', '0000-00-00', 0, 0, 0),
(148, 9, 1000, 16, 2, '2018-11-02', '0000-00-00', 0, 0, 0),
(149, 9, 1000, 17, 2, '2018-12-02', '0000-00-00', 0, 0, 0),
(150, 9, 1000, 18, 2, '2019-01-02', '0000-00-00', 0, 0, 0),
(151, 9, 1000, 19, 2, '2019-02-02', '0000-00-00', 0, 0, 0),
(152, 9, 1000, 20, 2, '2019-03-02', '0000-00-00', 0, 0, 0),
(153, 9, 1000, 21, 2, '2019-04-02', '0000-00-00', 0, 0, 0),
(154, 9, 1000, 22, 2, '2019-05-02', '0000-00-00', 0, 0, 0),
(155, 9, 1000, 23, 2, '2019-06-02', '0000-00-00', 0, 0, 0),
(156, 9, 1000, 24, 2, '2019-07-02', '0000-00-00', 0, 0, 0),
(157, 9, 1000, 25, 2, '2019-08-02', '0000-00-00', 0, 0, 0),
(158, 9, 1000, 26, 2, '2019-09-02', '0000-00-00', 0, 0, 0),
(159, 9, 1000, 27, 2, '2019-10-02', '0000-00-00', 0, 0, 0),
(160, 9, 1000, 28, 2, '2019-11-02', '0000-00-00', 0, 0, 0),
(161, 9, 1000, 29, 2, '2019-12-02', '0000-00-00', 0, 0, 0),
(162, 9, 1000, 30, 2, '2020-01-02', '0000-00-00', 0, 0, 0),
(163, 9, 1000, 31, 2, '2020-02-02', '0000-00-00', 0, 0, 0),
(164, 9, 1000, 32, 2, '2020-03-02', '0000-00-00', 0, 0, 0),
(165, 9, 1000, 33, 2, '2020-04-02', '0000-00-00', 0, 0, 0),
(166, 9, 1000, 34, 2, '2020-05-02', '0000-00-00', 0, 0, 0),
(167, 9, 1000, 35, 2, '2020-06-02', '0000-00-00', 0, 0, 0),
(168, 9, 1000, 36, 2, '2020-07-02', '0000-00-00', 0, 0, 0),
(169, 9, 1000, 37, 2, '2020-08-02', '0000-00-00', 0, 0, 0),
(170, 9, 1000, 38, 2, '2020-09-02', '0000-00-00', 0, 0, 0),
(171, 9, 1000, 39, 2, '2020-10-02', '0000-00-00', 0, 0, 0),
(172, 9, 1000, 40, 2, '2020-11-02', '0000-00-00', 0, 0, 0),
(173, 9, 1000, 41, 2, '2020-12-02', '0000-00-00', 0, 0, 0),
(174, 9, 1000, 42, 2, '2021-01-02', '0000-00-00', 0, 0, 0),
(175, 9, 1000, 43, 2, '2021-02-02', '0000-00-00', 0, 0, 0),
(176, 9, 1000, 44, 2, '2021-03-02', '0000-00-00', 0, 0, 0),
(177, 9, 1000, 45, 2, '2021-04-02', '0000-00-00', 0, 0, 0),
(178, 9, 1000, 46, 2, '2021-05-02', '0000-00-00', 0, 0, 0),
(179, 9, 1000, 47, 2, '2021-06-02', '0000-00-00', 0, 0, 0),
(180, 9, 1000, 48, 2, '2021-07-02', '0000-00-00', 0, 0, 0),
(181, 9, 1000, 49, 2, '2021-08-02', '0000-00-00', 0, 0, 0),
(182, 9, 1000, 50, 2, '2021-09-02', '0000-00-00', 0, 0, 0),
(183, 9, 1000, 51, 2, '2021-10-02', '0000-00-00', 0, 0, 0),
(184, 9, 1000, 52, 2, '2021-11-02', '0000-00-00', 0, 0, 0),
(185, 9, 1000, 53, 2, '2021-12-02', '0000-00-00', 0, 0, 0),
(186, 9, 1000, 54, 2, '2022-01-02', '0000-00-00', 0, 0, 0),
(187, 9, 1000, 55, 2, '2022-02-02', '0000-00-00', 0, 0, 0),
(188, 9, 1000, 56, 2, '2022-03-02', '0000-00-00', 0, 0, 0),
(189, 9, 1000, 57, 2, '2022-04-02', '0000-00-00', 0, 0, 0),
(190, 9, 1000, 58, 2, '2022-05-02', '0000-00-00', 0, 0, 0),
(191, 9, 1000, 59, 2, '2022-06-02', '0000-00-00', 0, 0, 0),
(192, 9, 1000, 60, 2, '2022-07-02', '0000-00-00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

CREATE TABLE `relations` (
  `id` int(11) NOT NULL,
  `relation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relations`
--

INSERT INTO `relations` (`id`, `relation`) VALUES
(1, 'SON'),
(2, 'DAUGHTER'),
(3, 'FATHER'),
(4, 'MOTHER'),
(5, 'HUSBAND'),
(6, 'WIFE'),
(7, 'BROTHER'),
(8, 'SISTER'),
(9, 'UNCAL'),
(10, 'AUNTY'),
(11, 'GUARDIAN'),
(12, 'MOTHER-IN-LAW'),
(13, 'FATHER-IN-LAW'),
(14, 'BROTHER-IN-LAW'),
(15, 'SISTER-IN-LAW'),
(16, 'GRAND MOTHER'),
(17, 'GRAND FATHER'),
(18, 'GRAND SON'),
(19, 'GRAND DAUGHTER');

-- --------------------------------------------------------

--
-- Table structure for table `saving_account`
--

CREATE TABLE `saving_account` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `introducer_id` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saving_account`
--

INSERT INTO `saving_account` (`id`, `member_id`, `introducer_id`, `balance`, `status`, `date`) VALUES
(2, 2, 1, 1500, 'active', '2017-07-01 08:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `saving_transaction`
--

CREATE TABLE `saving_transaction` (
  `id` int(11) NOT NULL,
  `saving_id` int(11) NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `before_balance` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `after_balance` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_mode` varchar(255) NOT NULL,
  `voucher_no` varchar(255) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saving_transaction`
--

INSERT INTO `saving_transaction` (`id`, `saving_id`, `transaction_type`, `before_balance`, `amount`, `after_balance`, `date`, `payment_mode`, `voucher_no`, `remarks`) VALUES
(1, 2, 'deposit', 0, 500, 500, '2017-07-08 11:21:08', 'cash', '1', 'adding'),
(2, 2, 'deposit', 500, 1000, 1500, '2017-07-24 07:09:59', 'cash', '3', 'dfvas');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state_name`) VALUES
(1, 'HARYANA'),
(2, 'PUNJAB');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `name`, `username`, `password`) VALUES
(1, 1, 'vikas', 'admin', 'qwerty'),
(2, 2, 'mohit', 'empknl', 'qwerty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `broker`
--
ALTER TABLE `broker`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_id` (`member_id`);

--
-- Indexes for table `broker_type`
--
ALTER TABLE `broker_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fd_customer`
--
ALTER TABLE `fd_customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `fd_plans`
--
ALTER TABLE `fd_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installment_types`
--
ALTER TABLE `installment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_customers`
--
ALTER TABLE `loan_customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `application_number` (`application_number`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `loan_plans`
--
ALTER TABLE `loan_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_transactions`
--
ALTER TABLE `loan_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_customer_id` (`loan_customer_id`);

--
-- Indexes for table `loan_type`
--
ALTER TABLE `loan_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nominee`
--
ALTER TABLE `nominee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_id_2` (`member_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `rd_customer`
--
ALTER TABLE `rd_customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `rd_plans`
--
ALTER TABLE `rd_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rd_transactions`
--
ALTER TABLE `rd_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rd_customer_id` (`rd_customer_id`);

--
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saving_account`
--
ALTER TABLE `saving_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_id_2` (`member_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `saving_transaction`
--
ALTER TABLE `saving_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saving_id` (`saving_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `state_name` (`state_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `broker`
--
ALTER TABLE `broker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `broker_type`
--
ALTER TABLE `broker_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fd_customer`
--
ALTER TABLE `fd_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fd_plans`
--
ALTER TABLE `fd_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `installment_types`
--
ALTER TABLE `installment_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `loan_customers`
--
ALTER TABLE `loan_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `loan_plans`
--
ALTER TABLE `loan_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `loan_transactions`
--
ALTER TABLE `loan_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `loan_type`
--
ALTER TABLE `loan_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nominee`
--
ALTER TABLE `nominee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rd_customer`
--
ALTER TABLE `rd_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rd_plans`
--
ALTER TABLE `rd_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rd_transactions`
--
ALTER TABLE `rd_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;
--
-- AUTO_INCREMENT for table `relations`
--
ALTER TABLE `relations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `saving_account`
--
ALTER TABLE `saving_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `saving_transaction`
--
ALTER TABLE `saving_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `broker`
--
ALTER TABLE `broker`
  ADD CONSTRAINT `broker_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`);

--
-- Constraints for table `fd_customer`
--
ALTER TABLE `fd_customer`
  ADD CONSTRAINT `fd_customer_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `loan_customers`
--
ALTER TABLE `loan_customers`
  ADD CONSTRAINT `loan_customers_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `loan_transactions`
--
ALTER TABLE `loan_transactions`
  ADD CONSTRAINT `loan_transactions_ibfk_1` FOREIGN KEY (`loan_customer_id`) REFERENCES `loan_customers` (`id`);

--
-- Constraints for table `nominee`
--
ALTER TABLE `nominee`
  ADD CONSTRAINT `nominee_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rd_customer`
--
ALTER TABLE `rd_customer`
  ADD CONSTRAINT `rd_customer_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `rd_transactions`
--
ALTER TABLE `rd_transactions`
  ADD CONSTRAINT `rd_transactions_ibfk_1` FOREIGN KEY (`rd_customer_id`) REFERENCES `rd_customer` (`id`);

--
-- Constraints for table `saving_account`
--
ALTER TABLE `saving_account`
  ADD CONSTRAINT `saving_account_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `saving_transaction`
--
ALTER TABLE `saving_transaction`
  ADD CONSTRAINT `saving_transaction_ibfk_1` FOREIGN KEY (`saving_id`) REFERENCES `saving_account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
