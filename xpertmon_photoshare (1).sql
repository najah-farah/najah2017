-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2017 at 05:39 PM
-- Server version: 5.5.40-36.1
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xpertmon_photoshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobileNumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `firstName`, `lastName`, `userName`, `password`, `mobileNumber`, `email`, `profile`) VALUES
(1, 'Rohan', 'Sanghani', 'xpertlab', 'xpertlab', '9426449988', 'rohansmart333@gmail.com', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `chatId` int(11) NOT NULL AUTO_INCREMENT,
  `photographerIdFrom` int(11) NOT NULL,
  `photographerIdTo` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`chatId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatId`, `photographerIdFrom`, `photographerIdTo`, `message`, `date`) VALUES
(1, 2, 1, 'Hi...', '2017-07-22 11:04:32'),
(2, 1, 2, 'Hello...', '2017-07-22 11:04:33'),
(3, 2, 1, 'How R U?', '2017-07-22 11:04:34'),
(4, 1, 2, 'Hiii', '2017-07-22 15:49:56'),
(5, 2, 1, 'HRU', '2017-07-22 15:50:12'),
(6, 1, 2, 'Fine', '2017-07-22 15:54:09'),
(7, 2, 3, 'Hi', '2017-07-22 15:54:26'),
(8, 1, 3, 'Hi', '2017-07-25 07:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `paymentsId` int(11) NOT NULL AUTO_INCREMENT,
  `photographerId` int(11) NOT NULL,
  `photosId` int(11) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `payment_gross` float NOT NULL,
  `currency_code` varchar(5) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  PRIMARY KEY (`paymentsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `photographer`
--

CREATE TABLE IF NOT EXISTS `photographer` (
  `photographerId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `mobileNumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'ON',
  `login` varchar(5) NOT NULL,
  `loginTime` datetime NOT NULL,
  PRIMARY KEY (`photographerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `photographer`
--

INSERT INTO `photographer` (`photographerId`, `firstName`, `lastName`, `mobileNumber`, `password`, `email`, `profile`, `about`, `status`, `login`, `loginTime`) VALUES
(1, 'Chris', 'Wolfe', '9426449988', '9426449988', 'artqolfe@photography.com', 'PHOTO-SHARE-PHOTOGRAPHER-PROFILE-1500641676.jpg', 'Hi I am a Art Wolfe...', 'ON', 'YES', '2017-07-25 07:43:44'),
(2, 'Garry', 'Winogrand', '8866228211', '8866228211', 'garrywinogrand@photography.com', 'PHOTO-SHARE-PHOTOGRAPHER-PROFILE-1500641767.jpg', 'Hi I am a Garry Winogrand...', 'ON', 'NO', '2017-07-22 18:57:03'),
(3, 'Edward', 'Weston', '8866710408', '8866710408', 'edwardweston@photography.com', 'PHOTO-SHARE-PHOTOGRAPHER-PROFILE-1500641854.jpg', 'Hi I am a Edward Weston...', 'ON', 'YES', '2017-07-17 00:00:00'),
(4, 'Annie', 'Leibovitz', '7600107656', '7600107656', 'annieleibovitz@photography.com', 'PHOTO-SHARE-PHOTOGRAPHER-PROFILE-1500641971.jpg', 'Hi I am a Annie Leibovitz...', 'OFF', 'YES', '2017-07-11 00:00:00'),
(5, 'Jon', 'Doe', '0798666543', '1234567', 'abc@mail.com', 'PHOTO-SHARE-PHOTOGRAPHER-PROFILE-1500968534.PNG', 'n / a', 'OFF', '', '0000-00-00 00:00:00'),
(6, 'Jon', 'Doe', '0798666543', '1234567', 'abcd@mail.com', 'PHOTO-SHARE-PHOTOGRAPHER-PROFILE-1500968765.PNG', 'n a', 'OFF', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `photosId` int(11) NOT NULL AUTO_INCREMENT,
  `photographerId` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `photosName` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`photosId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photosId`, `photographerId`, `category`, `photosName`, `image`, `price`) VALUES
(1, 1, 'Nature', 'Nature Part 1', 'PHOTO-SHARE-PHOTOGRAPHER-IMAGE-1500642143.jpg', 20),
(2, 1, 'Nature', 'Nature Part 2', 'PHOTO-SHARE-PHOTOGRAPHER-IMAGE-1500642166.jpg', 35),
(3, 1, 'City Lite', 'Nature Part 3', 'PHOTO-SHARE-PHOTOGRAPHER-IMAGE-1500642185.jpg', 60),
(4, 1, 'City Lite', 'Nature Part 4', 'PHOTO-SHARE-PHOTOGRAPHER-IMAGE-1500642204.jpg', 15),
(5, 2, 'Cycle', 'Cycle Moon Night 1', 'PHOTO-SHARE-PHOTOGRAPHER-IMAGE-1500642426.jpg', 13),
(6, 2, 'Cycle', 'Cycle Moon Night 2', 'PHOTO-SHARE-PHOTOGRAPHER-IMAGE-1500642447.jpg', 18),
(7, 3, 'Animal', 'Animals 1', 'PHOTO-SHARE-PHOTOGRAPHER-IMAGE-1500642614.jpg', 19),
(8, 3, 'Insects', 'Animal 2', 'PHOTO-SHARE-PHOTOGRAPHER-IMAGE-1500642633.png', 32),
(9, 3, 'Insects', 'Animal 3', 'PHOTO-SHARE-PHOTOGRAPHER-IMAGE-1500642650.jpg', 17),
(10, 4, 'City Art', 'Citty Arrrt Part One', 'PHOTO-SHARE-PHOTOGRAPHER-IMAGE-1500643058.jpg', 45),
(11, 4, 'City Art', 'Cityyy Artt Partt Two', 'PHOTO-SHARE-PHOTOGRAPHER-IMAGE-1500643079.jpg', 29),
(12, 4, 'Jungle Art', 'Jungle Art One', 'PHOTO-SHARE-PHOTOGRAPHER-IMAGE-1500643099.jpg', 24),
(13, 4, 'Jungle Art', 'Jungle Arrrt Two', 'PHOTO-SHARE-PHOTOGRAPHER-IMAGE-1500643119.jpg', 50);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
