-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2018 at 02:54 PM
-- Server version: 5.1.32
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yuqainghu475343`
--

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Gender` varchar(32) NOT NULL,
  `Country` varchar(32) NOT NULL,
  `State` varchar(32) NOT NULL,
  `City` varchar(32) NOT NULL,
  `Satisfaction` varchar(32) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `survey`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Access` int(11) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Name`, `DOB`, `Email`, `Access`, `Created`) VALUES
(1, 'huyuqiang1', '123', '', '0000-00-00', '', 3, '2018-11-07 19:37:38'),
(2, '', '', '', '0000-00-00', '', 3, '2018-11-07 19:45:07'),
(3, 'huyuqiang2', '123', '', '0000-00-00', '', 3, '2018-11-07 19:59:45'),
(4, 'huyuqiang3', '123', 'aqiang3', '0000-00-00', '', 3, '2018-11-07 20:02:16'),
(5, 'huyuqiang4', '123', 'aqiang4', '1997-07-16', '', 3, '2018-11-07 20:05:50'),
(6, 'huyuqiang5', '123', 'aqiang5', '1997-07-16', '123@qq.com', 3, '2018-11-07 20:12:06');
