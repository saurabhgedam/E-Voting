-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2015 at 09:03 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-voting_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `party` varchar(100) NOT NULL,
  `party_logo` varchar(100) NOT NULL,
  `education` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `criminal_cases` int(11) NOT NULL,
  `profile` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `user_id`, `party`, `party_logo`, `education`, `category`, `criminal_cases`, `profile`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 4, 'Swarajya Vikas Panel', '7e41bb9e4d25f80d1421ba0d39f2d53a.png', 'Com Sci', 'Open', 3, 'Sarpanch', '2015-01-20 10:14:25', 1, '2015-01-20 15:44:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE IF NOT EXISTS `elections` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `ward` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` enum('Activated','Deactivated') NOT NULL DEFAULT 'Activated',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`id`, `name`, `date`, `ward`, `description`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'sdfff', '28/12/2014 - 19/01/2015', 'fsdfsf', 'fsdfsf', 'Activated', '2015-01-20 12:38:07', 1, '2015-01-20 18:08:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE IF NOT EXISTS `party` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `party_logo` varchar(250) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `status` enum('Activated','Deactivated') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `name`, `party_logo`, `created`, `created_by`, `status`) VALUES
(1, 'Sharad Sena', '7440d819726ce5de0d3cb05e2427229a.png', '2015-03-23 08:10:30', 0, 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `mobile` bigint(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `current_address` varchar(100) NOT NULL,
  `permanant_address` varchar(100) NOT NULL,
  `pro_pic` varchar(100) NOT NULL,
  `voting_card_no` varchar(50) NOT NULL,
  `pan_card_no` varchar(50) NOT NULL,
  `id_proof1` varchar(100) NOT NULL,
  `id_proof2` varchar(100) NOT NULL,
  `ward` varchar(100) NOT NULL,
  `status` enum('Activated','Deactivated') NOT NULL DEFAULT 'Activated',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `first_name`, `last_name`, `gender`, `age`, `mobile`, `email`, `current_address`, `permanant_address`, `pro_pic`, `voting_card_no`, `pan_card_no`, `id_proof1`, `id_proof2`, `ward`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'krushna', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', 'Krushna', 'Thube', 'Male', 0, 7387476746, 'krushnathube11@gmail.com', 'Pune', 'Pune', '', '', '', '', '', '', 'Deactivated', '2014-11-05 23:40:20', 1, '2015-01-16 18:35:58', 1),
(2, 'krushna.thube', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Voter', 'Krushna', 'Thube', 'Male', 23, 7387476746, 'krushnathube11@gmail.com', 'Pune', 'Pune', 'd760fc95275db9630ba5f4bef1634c73.png', '1235', 'AUI255', 'ce9db0cbbedb07b46bb0ccb05884ada7.png', '91721e472a9edd2207bed00f2f1b42b9.png', 'Pune', 'Activated', '2015-01-20 06:47:11', 1, '2015-01-20 12:17:11', 1),
(3, 'krushnathube', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Booth Officer', 'Krushna', 'Thube', 'Male', 23, 7387476746, 'krushnathube11@gmail.com', 'Pune', 'Pune', 'f03f775d2ecf6aac693a1061865a7cc6.png', '1235s', 'AUI255sd', '40a9942802a09ddf977821939c26015c.png', '80254fb9e9ec128a90415b14bacd844a.png', 'Pune', 'Activated', '2015-01-20 07:03:18', 1, '2015-01-20 12:33:18', 1),
(4, 'swarajya', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Candidate', 'Krushna', 'Thube', 'Male', 23, 7387476746, 'krushnathube11@gmail.com', 'Pune', 'Pune', 'e1ff9f60c771729353bd30ae88551231.png', '1235ssd', 'AUI255sdsd', '3afa5cf54501cdc4d4a759bb1140660c.png', '7bbc2e83ae977df9b2d63b74e08401e2.jpg', 'Vesdare', 'Activated', '2015-01-20 10:14:25', 1, '2015-01-20 15:44:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE IF NOT EXISTS `voting` (
`id` int(11) NOT NULL,
  `voter` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `election` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `voting`
--
ALTER TABLE `voting`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
