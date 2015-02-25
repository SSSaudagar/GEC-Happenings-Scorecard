-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2015 at 10:54 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `happenings`
--
CREATE DATABASE IF NOT EXISTS `happenings` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `happenings`;

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--
-- Creation: Feb 25, 2015 at 01:59 AM
--

DROP TABLE IF EXISTS `colleges`;
CREATE TABLE IF NOT EXISTS `colleges` (
`college_id` int(11) NOT NULL,
  `college_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--
-- Creation: Feb 25, 2015 at 03:52 AM
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
`event_id` int(11) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `description`, `type`) VALUES
(1, 'Question Mark (surprise event)', '', 2),
(2, 'Mezzo Soprano (Duet Singing)', '', 2),
(3, 'Friction Index (Group Dance)', '', 1),
(4, 'Avenue Montaign (Fashion Show)', '', 1),
(5, 'Mum Caricature (Mime)', '', 2),
(6, 'Exibicao-de-forca (Show Of Spirit)', '', 1),
(7, 'Band of Brothers (battle of bands)', '', 2),
(8, 'Breaking Dead Male (Roadies)', '', 4),
(9, 'Game of Tones (Street Play)', '', 2),
(10, '&rsquo;Four&rsquo;ier Series (Control cricket)', '', 2),
(11, 'The Magic Feat (Futsal)', '', 2),
(12, 'Clash of Lens (Photography)', '', 3),
(13, 'Chocolate Hero (videomaking)', '', 2),
(14, 'The Last Brain Thinnking (chess)', '', 3),
(15, 'X-Quiz-It (GK Quiz Written)', '', 2),
(16, 'Wall of Expressions (wallpainting)', '', 3),
(17, 'The &rsquo;Pen&rsquo;orama (pen sketch)', '', 3),
(18, 'Bal&rsquo;ey-el-folth (Free Throws)', '', 3),
(19, 'The &rsquo;Race&rsquo;ist (The Amazing Race)', '', 3),
(20, 'Sales-Clown (Ad-Making)', '', 3),
(21, 'Mr Happenings', '', 1),
(22, 'Miss Happenings', '', 1),
(23, 'Breaking Dead Female (Roadies)', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--
-- Creation: Feb 25, 2015 at 03:05 AM
--

DROP TABLE IF EXISTS `event_type`;
CREATE TABLE IF NOT EXISTS `event_type` (
`id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `first` int(11) NOT NULL,
  `second` int(11) NOT NULL,
  `third` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`id`, `name`, `first`, `second`, `third`) VALUES
(1, 'Ace', 1000, 800, 600),
(2, 'King', 800, 600, 400),
(3, 'queen', 600, 400, 200),
(4, 'trump', 500, 400, 300);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--
-- Creation: Feb 25, 2015 at 04:06 AM
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `college_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `Incharge` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--
-- Creation: Feb 25, 2015 at 04:19 AM
--

DROP TABLE IF EXISTS `winners`;
CREATE TABLE IF NOT EXISTS `winners` (
  `event_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  `joker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
 ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
 ADD PRIMARY KEY (`college_id`,`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `event_type`
--
ALTER TABLE `event_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
