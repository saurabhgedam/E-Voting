-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2015 at 09:26 AM
-- Server version: 5.1.67-community
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `evoting_db`
--
CREATE DATABASE IF NOT EXISTS `evoting_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `evoting_db`;

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `party` varchar(100) NOT NULL,
  `party_logo` varchar(100) NOT NULL,
  `education` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `criminal_cases` int(11) NOT NULL,
  `profile` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`user_id`, `party`, `party_logo`, `education`, `category`, `criminal_cases`, `profile`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(9, 'BJP', '440a9e87882ed29fea063c2a6036191f.png', 'MCA', 'open', 0, 'adesad', '2015-06-12 10:27:06', 1, '2015-06-20 11:34:38', 1),
(13, 'Shiv Sena', 'ccd139f3350fd67c846b71bc3a00d30b.jpg', 'Be', 'Open', 0, 'Be civil', '2015-06-13 12:15:37', 1, '2015-06-20 11:34:49', 1),
(38, 'Shiv Sena', 'fd68dd81f31d264cb531f1cffb43b65b.jpg', 'BE Civil', 'open', 0, 'Be civil engg.', '2015-06-13 15:57:09', 1, '2015-06-20 11:34:57', 1),
(39, 'BJP', '773a8c1ed0e0059ab4944c358f75186a.png', 'BE (Comp.)', 'Open', 0, 'Scholar student', '2015-06-16 10:19:42', 1, '2015-06-15 17:25:13', 1),
(51, 'Shiv Sena', '4250fd440dca9157c641bfc62f524e63.png', 'MCA', 'open', 0, 'MCA First class', '2015-06-21 02:30:09', 1, '2015-06-20 14:00:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_election`
--

CREATE TABLE IF NOT EXISTS `candidate_election` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_id` int(11) NOT NULL,
  `election_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=134 ;

--
-- Dumping data for table `candidate_election`
--

INSERT INTO `candidate_election` (`id`, `candidate_id`, `election_id`) VALUES
(28, 38, 6),
(53, 39, 1),
(100, 13, 1),
(101, 13, 2),
(121, 13, 3),
(126, 9, 1),
(127, 9, 6),
(128, 9, 2),
(129, 13, 6),
(130, 38, 1),
(131, 38, 2),
(132, 51, 3),
(133, 51, 2);

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE IF NOT EXISTS `elections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `from` date NOT NULL,
  `ward` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` enum('Activated','Deactivated') NOT NULL DEFAULT 'Activated',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`id`, `name`, `from`, `ward`, `description`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Club President', '2015-06-20', 'Computer Department', 'Club President', 'Activated', '2015-01-21 14:38:07', 1, '2015-06-20 11:34:07', 1),
(2, 'Class Representative', '2015-06-20', 'Computer Department', 'Class Representative', 'Activated', '2015-04-15 11:37:10', 1, '2015-06-20 11:34:14', 1),
(3, 'sportman', '2015-06-19', 'sports', 'Best sportsman of the year', 'Activated', '2015-06-12 08:21:31', 1, '2015-06-18 05:50:45', 1),
(4, 'Gentelman', '2015-06-18', 'science', 'Gentelman of the year', 'Activated', '2015-06-12 08:22:46', 1, '2015-06-18 05:50:55', 1),
(5, 'Traditional head', '2015-06-19', 'traditional', 'Traditional head of collage', 'Activated', '2015-06-12 08:24:40', 1, '2015-06-12 18:57:38', 1),
(6, 'Collage president', '2015-06-20', 'Mecanical', 'C p election', 'Activated', '2015-06-13 14:21:19', 1, '2015-06-20 11:34:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `onetime_pass`
--

CREATE TABLE IF NOT EXISTS `onetime_pass` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `election_id` int(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `onetime_pass`
--

INSERT INTO `onetime_pass` (`id`, `user_id`, `election_id`, `password`, `created`) VALUES
(1, 2, 2, 'qkSZ&p$Q', '2015-06-09 13:16:04'),
(2, 5, 2, 'GItMi:w^', '2015-06-09 13:17:04'),
(3, 6, 2, 'MhQ:Dop(', '2015-06-09 13:25:40'),
(23, 33, 2, '_=grJCQl', '2015-06-09 14:18:41'),
(38, 33, 1, 'c.Au;IYa', '2015-06-09 14:52:00'),
(39, 35, 1, 'fSVbC,i$', '2015-06-10 07:35:20'),
(40, 35, 2, 'FNe=#xsS', '2015-06-12 08:01:05'),
(41, 35, 3, 'gCvEB?d!', '2015-06-12 08:33:48'),
(42, 35, 4, 'PQovg,(K', '2015-06-12 08:35:19'),
(43, 43, 1, '$aZh-OjU', '2015-06-21 00:49:43'),
(44, 43, 6, '.Io)tBfC', '2015-06-21 00:52:03'),
(45, 43, 2, 'Erg.Oo_R', '2015-06-21 01:03:05'),
(46, 44, 1, 'QNAchu=-', '2015-06-21 01:08:28'),
(47, 44, 6, 'fClXF#t*', '2015-06-21 01:11:11'),
(48, 44, 2, 'FzYq*=rQ', '2015-06-21 01:12:55'),
(49, 45, 1, '^uUgEe#I', '2015-06-21 01:17:28'),
(50, 45, 2, 'BbzI)g;Q', '2015-06-21 01:19:03'),
(51, 46, 1, 'S^MLhc+b', '2015-06-21 01:21:50'),
(52, 46, 6, 'n=N^KubS', '2015-06-21 01:24:04'),
(53, 47, 1, 'TfI.wvP;', '2015-06-21 01:33:55'),
(54, 47, 2, 'Swhy.U^Z', '2015-06-21 01:35:24'),
(55, 49, 1, 'uX@PQ%dp', '2015-06-21 01:51:29'),
(56, 49, 2, 'aVF#&gTu', '2015-06-21 01:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE IF NOT EXISTS `party` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `party_logo` varchar(250) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(10) NOT NULL,
  `status` enum('Activated','Deactivated') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `name`, `party_logo`, `created`, `created_by`, `modified`, `modified_by`, `status`) VALUES
(6, 'congress', '48809a1f6c6bc21b0fa4af2b1ce3f2a8.jpg', '2015-04-16 11:00:03', 1, '2015-06-12 19:54:56', 1, 'Activated'),
(7, 'BJP', 'a0c69d29d848fae228f9fa32674bddf3.jpg', '2015-04-16 11:00:32', 1, '2015-04-29 17:06:42', 1, 'Activated'),
(8, 'Shiv Sena', 'f03cd3686fa52e6eb71199ae8e5f2447.jpg', '2015-04-22 11:32:43', 1, '2015-04-29 17:07:01', 1, 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `address` varchar(100) NOT NULL,
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
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `first_name`, `last_name`, `gender`, `age`, `mobile`, `email`, `current_address`, `address`, `pro_pic`, `voting_card_no`, `pan_card_no`, `id_proof1`, `id_proof2`, `ward`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', 'Abhishek', 'Kumar', 'Male', 50, 8793398520, 'acumen.abhi@gmail.com', 'Pune', 'Pune', 'blank-avatar.png', '', '', '', '', '', 'Activated', '2014-11-06 20:10:20', 1, '2015-04-29 17:25:04', 1),
(2, 'Abhishek', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Voter', 'Abhishek', 'Kumar', 'Male', 23, 8793398520, 'acumen.abhi@gmail.com', 'Katraj, Pune', 'Pune', 'c9d3af82f29e3c35bea49c614b7c18d1.jpg', '1235', 'AUI255', 'ce9db0cbbedb07b46bb0ccb05884ada7.png', '91721e472a9edd2207bed00f2f1b42b9.png', 'Pune', 'Activated', '2015-01-21 03:17:11', 1, '2015-06-20 13:55:34', 1),
(3, 'vandana', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Booth Officer', 'Vandana', 'Gaikwad', 'Female', 23, 9856985698, 'vandana.gaikwad3@gmail.com', 'Pune', 'Pune', '2cef902b79dc3ddbb21fafd8f1a9a27c.jpg', '1235s', 'AUI255sd', '40a9942802a09ddf977821939c26015c.png', '80254fb9e9ec128a90415b14bacd844a.png', 'Pune', 'Activated', '2015-01-21 03:33:18', 1, '2015-06-20 13:55:16', 1),
(5, 'paras', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Voter', 'Paras', 'Sharma', 'Male', 24, 9545511095, 'paras.sharma32@gmail.com', 'kothrud, pune', 'kothrud', 'c1300b515e407fe5621f6a076ed4b483.jpg', '12161131313', 'axybpn122', '01f2c6050b05b359cdd99854cc03e7ec.jpg', '6d0d4cf58e2426c5aa86088caae42592.jpg', 'kothrud', 'Activated', '2015-04-15 03:08:16', 1, '2015-04-29 16:54:24', 1),
(6, 'saurabh', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Voter', 'Saurabh', 'Patil', 'Male', 23, 7894561230, 'saurabh.gedam@gmail.com', 'Narhe, Pune', 'pune', 'b46abfa542922509999fa99af642a042.jpg', 'vdjj12344', 'asbjd1223', 'e1ff9f60c771729353bd30ae88551231.png', 'e1ff9f60c771729353bd30ae88551231.png', 'kothrud', 'Activated', '2015-04-15 04:04:38', 0, '2015-04-29 16:55:36', 1),
(9, 'vivek', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Candidate', 'Vivek', 'Jaiswal', 'Male', 24, 9874563210, 'vivek65@gmail.com', 'Pune', 'Mumbai', 'fbc6b886ae7f57f9ba2e235ab66eebdc.jpg', 'ASDF5674', 'PAN76232', 'fc2ff16bf02f37b0dab3c57afa18c447.jpg', 'e2856696280dd3b7418c51540d7570fb.png', 'IT Department', 'Activated', '2015-04-30 07:51:16', 1, '2015-06-20 11:34:38', 1),
(10, 'soham', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 'soham', 'sawant$', 'Male', 25, 9545511095, 'soham@gmail.com', '', 'sawant wadi', '', '', '', '', '', '', 'Activated', '2015-04-16 06:12:01', 1, '2015-04-15 16:12:01', 1),
(11, 'mayur', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 'mayur', 'sawant$', 'Male', 28, 9547891095, 'mayur@gmail.com', '', 'mulshi', '', '', '', '', '', '', 'Activated', '2015-04-17 02:26:04', 1, '2015-04-16 12:26:04', 1),
(12, 'rahul', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Booth Officer', 'Rahul', 'Pawar', 'Male', 25, 9856231478, 'rahulkool@gmail.com', 'Pune', 'karmala', 'beee49abde6625523a4f2badfb9042da.jpg', 'qwrer122324234', 'afdfd12343434', '4a7c465c32a320ea67ad116080b26e1d.jpg', '84ca62e91ffd199a2a9c95b360192dd8.png', 'karmala', 'Activated', '2015-04-18 02:47:17', 1, '2015-04-29 17:00:42', 1),
(13, 'anup', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Candidate', 'Anup', 'Gulane', 'Male', 26, 1234567890, 'anup@gmail.com', 'wadgaon pune', 'wadgaon', '0a7f3f28e41a6d2f3d478f1306b9d299.JPG', 'asdf12345', 'fghgh23557', '4dfc9d692546c246d1f8cbc66ea8275b.png', '7ac1647a1b590bdbe098c6b60e9c7856.png', 'wadgaon', 'Activated', '2015-04-21 03:10:28', 1, '2015-06-20 11:34:49', 1),
(34, 'vikas', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'voter', 'vikas', 'Mene', 'Male', 25, 9545511095, 'pradip@gmail.com', '', 'kothrud', '', '', '', '', '', '', 'Activated', '2015-06-09 08:57:13', 0, '2015-06-08 18:57:13', 0),
(35, 'sachinbam', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'voter', 'Sachin', 'Bamgude', 'Male', 25, 9545511095, 'sachin@gmail.com', '', 'kothrud', '', '', '', '', '', '', 'Activated', '2015-06-10 02:04:27', 1, '2015-06-09 12:04:27', 1),
(36, 'samirshinde', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Booth Officer', 'Samir', 'shinde', 'Male', 45, 4444444444, 'samir@gmail.com', 'shadashiv peth', 'shadashiv peth', '2cf2a2044200be17ef18a004ca55cb50.JPG', 'ASDFDF233', 'WEREF1233', 'c1475cb7d1f6d76e1843a0de8e9465bd.jpg', 'abf4d68e1590f8e007b7896b1f3374a0.jpg', 'shadashiv peth', 'Activated', '2015-06-13 15:15:40', 1, '2015-06-12 19:51:54', 1),
(37, 'akash', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Booth Officer', 'Akash', 'mandake', 'Male', 45, 9856985698, 'akash@gmail.com', 'shadashiv peth', 'shadashiv peth', '85fde69fb8c787a4b711db68a64b0ea3.jpg', 'ASDFDF233QW', 'WEREF1233TYU', '9428be49fa89cfc1a5504e1b17c11511.png', 'da0a9fccf1db7d9c7ae21b11aec895ac.png', 'shadashiv peth', 'Activated', '2015-06-13 15:20:51', 1, '2015-06-12 19:50:51', 1),
(38, 'ravi', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Candidate', 'Ravi', 'Nivekar', 'Male', 25, 9021198413, 'ravi@gmail.com', 'kothrud', 'kothrud', 'c5d84dc3a7e37aa645d2cb0f15853682.jpg', 'ASDFDF23312', 'WEREF1233TYU89', 'b8194bb2dff10160aad710c08a1cdb26.jpg', 'f688184fb2a17f435a4e36a7c9031ee4.jpg', 'sports', 'Activated', '2015-06-13 15:57:09', 1, '2015-06-20 11:34:57', 1),
(39, 'sonam', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Candidate', 'sonam', 'sinha', 'Female', 26, 9021198413, 'sonam@gmail.com', 'pune', 'pune', '249230321409c173d5b6a1759992850e.jpg', 'ASDFDF23312T', 'WEREF1233RTT', '83eee2eb61bb765c86249ff46f66c6f8.png', '92a71d19a52ee8b30565ee61086f44b6.jpg', 'Mecanical', 'Activated', '2015-06-16 10:19:42', 1, '2015-06-15 17:25:13', 1),
(40, 'yash', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Voter', 'yash', 'Bhilare', 'Male', 29, 8569856985, 'yash@gmail.com', 'karve nagar', 'karve nagar', '', 'ASERRDF233QW', 'WAAAEF1233TYU', '', '', 'karve nagar', 'Activated', '2015-06-21 00:22:59', 1, '2015-06-20 11:53:27', 1),
(41, 'abcd', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'Voter', 'jsjwbs', 'hdjdjs', 'Male', 35, 8149092089, 'hshs@hsj.hdjs', '', 'hshsh', '', '', '', '', '', '', 'Activated', '2015-06-21 00:33:19', 0, '2015-06-20 12:03:19', 0),
(42, 'nimish1', 'd1854cae891ec7b29161ccaf79a24b00c274bdaa', 'Voter', 'havsjdu', 'hshwbsjs', 'Male', 22, 8149092089, 'hshsh@hxhd.hxhd', '', 'hdbsh', '', '', '', '', '', '', 'Activated', '2015-06-21 00:43:54', 0, '2015-06-20 12:13:54', 0),
(43, 'nim', 'd1854cae891ec7b29161ccaf79a24b00c274bdaa', 'Voter', 'jdhsbshs', 'hsjsjsjs', 'Male', 54, 8149092089, 'gshsh@gshs.xjdj', '', 'pune', '', '', '', '', '', '', 'Activated', '2015-06-21 00:48:55', 0, '2015-06-20 12:18:55', 0),
(44, 'ni', 'd1854cae891ec7b29161ccaf79a24b00c274bdaa', 'Voter', 'jdjsbshs', 'jjdhshd', 'Male', 24, 8149092089, 'hshs@gshs.cjd', '', 'jshsjs', '', '', '', '', '', '', 'Activated', '2015-06-21 01:07:47', 0, '2015-06-20 12:37:47', 0),
(45, 'asd', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'Voter', 'hshshskdkks', 'jdjsjs', 'Male', 21, 8149092089, 'hshs@gdhd.dhd', '', 'hdhjds', '', '', '', '', '', '', 'Activated', '2015-06-21 01:16:52', 0, '2015-06-20 12:46:52', 0),
(46, 'anu', '516b9783fca517eecbd1d064da2d165310b19759', 'Voter', 'udhsuss', 'hshshs', 'Male', 24, 8007165463, 'vshs@shs.jxjd', '', 'hdhd', '', '', '', '', '', '', 'Activated', '2015-06-21 01:21:17', 0, '2015-06-20 12:51:17', 0),
(47, 'nimish.thorat', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Voter', 'Nimish', 'Thorat', 'Male', 31, 7875187183, 'abcd@an.con', '', 'Pune', '', '', '', '', '', '', 'Activated', '2015-06-21 01:31:16', 0, '2015-06-20 13:01:16', 0),
(49, 'paras1', 'fd1f0c49d7b34d13a5ad0b42d8ac746c734543a9', 'Voter', 'paras', 'sharma', 'Male', 22, 7875187183, 'paras12493@gmail.com', '', 'asdfasdf', '', '', '', '', '', '', 'Activated', '2015-06-21 01:50:31', 0, '2015-06-20 13:20:31', 0),
(50, 'kunal', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Booth Officer', 'kunal', 'mane', 'Male', 30, 7456896541, 'kunal@gmail.com', 'vadgaon', 'vadgaon', '', 'ASDFDF233QW12', 'WEREF1233T45', '', '', 'vadgaon', 'Activated', '2015-06-21 02:25:05', 1, '2015-06-20 13:55:05', 1),
(51, 'sagar', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Candidate', 'sagar', 'chaudhari', 'Male', 29, 1234567896, 'sagar@gmail.com', 'kothrud', 'kothrud', 'db8cc8efc4843aea4011601e01714424.jpg', 'ASDFDF233111', 'WEREF1233555', '2cf6d15f414eb8b7fa8ecd80ad648ad4.png', '280596347802771ec2dc4b9b40c6d434.jpg', 'sports', 'Activated', '2015-06-21 02:30:09', 1, '2015-06-20 14:00:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `voter_id` int(50) NOT NULL,
  `election_id` int(50) NOT NULL,
  `candidate_id` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`id`, `voter_id`, `election_id`, `candidate_id`, `date`) VALUES
(25, 6, 2, 9, '2015-06-10 07:31:10'),
(26, 41, 2, 13, '2015-06-21 00:38:05'),
(27, 46, 6, 38, '2015-06-21 01:24:33'),
(28, 47, 2, 39, '2015-06-21 01:36:14'),
(29, 49, 2, 51, '2015-06-21 01:54:16'),
(30, 6, 1, 13, '2015-06-23 22:49:44'),
(31, 6, 3, 13, '2015-06-23 23:58:06'),
(32, 6, 4, 13, '2015-06-24 00:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE IF NOT EXISTS `voting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voter` int(11) NOT NULL,
  `candidate` int(11) NOT NULL,
  `election` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
