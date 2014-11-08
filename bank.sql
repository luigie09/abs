-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2014 at 12:03 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_settings`
--

CREATE TABLE IF NOT EXISTS `bank_settings` (
  `q_num` int(11) NOT NULL AUTO_INCREMENT,
  `fixed_deposit` decimal(10,2) NOT NULL,
  `fixeddep_date` date NOT NULL,
  `interest_rate` decimal(10,3) NOT NULL,
  `interest_date` date NOT NULL,
  `minimun_years` int(11) NOT NULL,
  PRIMARY KEY (`q_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bank_settings`
--

INSERT INTO `bank_settings` (`q_num`, `fixed_deposit`, `fixeddep_date`, `interest_rate`, `interest_date`, `minimun_years`) VALUES
(1, '35000.00', '2014-09-28', '0.500', '2014-09-28', 35);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `unq_num` int(11) NOT NULL AUTO_INCREMENT,
  `atm_pass` varchar(50) NOT NULL,
  `client_name` text NOT NULL,
  `client_add` varchar(250) NOT NULL,
  `card_number` int(12) NOT NULL,
  `client_pin` varchar(60) NOT NULL,
  `savings` decimal(10,2) NOT NULL,
  `time_savings` int(200) NOT NULL,
  `interest` float NOT NULL,
  `interest_earned` decimal(10,2) NOT NULL,
  `date_updated` date NOT NULL,
  `int_perday` decimal(10,2) NOT NULL,
  `date_started` date NOT NULL,
  `account_type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`unq_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`unq_num`, `atm_pass`, `client_name`, `client_add`, `card_number`, `client_pin`, `savings`, `time_savings`, `interest`, `interest_earned`, `date_updated`, `int_perday`, `date_started`, `account_type`, `status`) VALUES
(90, '0', 'Edge Glory', 'Hahahah', 1750540554, '', '0.00', 345332, 0.5, '517998.00', '2014-10-07', '473.06', '2014-10-07', 2, 1),
(93, '0664a49739a32a9240b9007274f21859', 'firstsample lastnamesample', 'addresssample', 2147483647, '', '0.00', 0, 0, '0.00', '2014-10-07', '0.00', '0000-00-00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_activity`
--

CREATE TABLE IF NOT EXISTS `client_activity` (
  `row_num` int(11) NOT NULL AUTO_INCREMENT,
  `act_no` int(11) NOT NULL,
  `dep_timedep` int(11) NOT NULL,
  `deposit` decimal(10,2) NOT NULL,
  `withdraw` decimal(10,2) NOT NULL,
  `client_name` varchar(60) NOT NULL,
  `client_add` varchar(60) NOT NULL,
  `savings_total` decimal(10,2) NOT NULL,
  `saving_timedep` int(11) NOT NULL,
  `date` date NOT NULL,
  `date_timedep` date NOT NULL,
  `date_num` int(11) NOT NULL,
  `service_type` int(11) NOT NULL,
  PRIMARY KEY (`row_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=154 ;

--
-- Dumping data for table `client_activity`
--

INSERT INTO `client_activity` (`row_num`, `act_no`, `dep_timedep`, `deposit`, `withdraw`, `client_name`, `client_add`, `savings_total`, `saving_timedep`, `date`, `date_timedep`, `date_num`, `service_type`) VALUES
(153, 0, 0, '15000.00', '0.00', '', '', '15000.00', 0, '2014-10-07', '0000-00-00', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_db`
--

CREATE TABLE IF NOT EXISTS `employee_db` (
  `q_num` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` text NOT NULL,
  `department` varchar(50) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`q_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `employee_db`
--

INSERT INTO `employee_db` (`q_num`, `id`, `password`, `full_name`, `department`, `position`) VALUES
(2, 'sample09', '5f4dcc3b5aa765d61d8327deb882cf99', 'Full Name Teller1', 'Teller', 3),
(3, 'manager', '36b68e3f7816c7688d06fc1bf699c24d', 'Full Name Manager1', 'Manager', 4),
(4, 'cust_rep', '2a775affcb089fd7305208e73750672c', 'Full Name Customer_Rep1', 'Customer Representative', 5),
(5, 'admin', '25e4ee4e9229397b6b17776bfceaf8e7', 'Full Name Admin1', 'Administrator', 1),
(8, 'Journey', 'd41d8cd98f00b204e9800998ecf8427e', 'Highway  Run', 'Manager', 4),
(9, 'BerryMe', '5f4dcc3b5aa765d61d8327deb882cf99', 'Rachel Berry', 'Manager', 4),
(10, 'employee', '5f4dcc3b5aa765d61d8327deb882cf99', 'emp', 'Teller', 3),
(11, 'Username', '5f4dcc3b5aa765d61d8327deb882cf99', 'Full Name', 'Teller', 3),
(12, 'RepUserName', '5f4dcc3b5aa765d61d8327deb882cf99', 'CustRep', 'Customer Representative', 5),
(13, 'base', '593616de15330c0fb2d55e55410bf994', 'base', 'Teller', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
