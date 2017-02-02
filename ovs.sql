-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2017 at 12:08 AM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ovs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `uname` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `pass`) VALUES
('demo', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
  `roll_no` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `image` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `vote_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`roll_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`roll_no`, `name`, `image`, `year`, `course`, `branch`, `vote_count`) VALUES
('iec2014002', 'goli', 'goli.jpg', 3, 'ug', 'ece', 1),
('iec2050012', 'roli', 'roli.jpg', 3, 'ug', 'ece', 1),
('iec2050019', 'soli', 'soli.jpg', 2, 'ug', 'ece', 67),
('iit2050071', 'xoli', 'xoli.jpg', 3, 'ug', 'it', 0),
('NONE OF THE ABOVE', '-', 'nota.jpg', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ldap`
--

CREATE TABLE IF NOT EXISTS `ldap` (
  `roll_no` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  PRIMARY KEY (`roll_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ldap`
--

INSERT INTO `ldap` (`roll_no`, `pass`) VALUES
('iit2014001', '123'),
('iit2014002', '123'),
('iit2014003', '123'),
('iit2014004', '123'),
('iit2014005', '123'),
('iit2014006', '123'),
('iit2014007', '123');

-- --------------------------------------------------------

--
-- Table structure for table `moderator`
--

CREATE TABLE IF NOT EXISTS `moderator` (
  `uname` varchar(50) NOT NULL,
  `id` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `system_ips` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moderator`
--

INSERT INTO `moderator` (`uname`, `id`, `password`, `system_ips`) VALUES
('abhi', 'a123', 'password', 'a:2:{i:0;s:11:"192.168.0.3";i:1;s:11:"192.168.0.4";}'),
('mod123', 'mod1234', 'abhi', 'a:2:{i:0;s:11:"192.168.0.3";i:1;s:11:"192.168.0.3";}'),
('ramu', 'r123', 'password', 'a:2:{i:0;s:11:"192.168.0.3";i:1;s:11:"192.168.0.4";}'),
('saloni', 's123', 'abhi', 'a:2:{i:0;s:11:"192.168.0.3";i:1;s:11:"192.168.0.4";}');

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE IF NOT EXISTS `system` (
  `ip` varchar(100) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `voter` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`ip`, `availability`, `voter`, `type`) VALUES
('172.20.34.2', '1', 'hello_world', 'moderator'),
('192.168.0.2', '1', 'hello_world', 'moderator'),
('192.168.0.3', '2', '-', 'voting_machine'),
('192.168.0.4', 'Not Available', 'iit2014141', 'voting_machine'),
('192.168.0.9', 'Available', '-', 'voting_machine');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE IF NOT EXISTS `voters` (
  `roll_no` varchar(20) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `active` int(2) NOT NULL DEFAULT '0',
  `year` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  PRIMARY KEY (`roll_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`roll_no`, `status`, `active`, `year`, `course`, `branch`) VALUES
('iec2014001', 0, 1, 3, 'ug', 'ece'),
('iec2014002', 0, 1, 3, 'ug', 'ece'),
('iec2015001', 0, 1, 2, 'ug', 'ece'),
('iit2014001', 1, 0, 3, 'ug', 'it');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
