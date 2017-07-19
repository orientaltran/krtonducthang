-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 22, 2017 at 04:42 AM
-- Server version: 5.5.52-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `website_vr`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotspots`
--

CREATE TABLE IF NOT EXISTS `hotspots` (
`id` int(11) NOT NULL,
  `target_id` int(11) DEFAULT NULL,
  `scene_id` int(11) DEFAULT NULL,
  `scene_destination_id` int(11) DEFAULT NULL,
  `ath` float DEFAULT NULL,
  `atv` float DEFAULT NULL,
  `style_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotspots`
--

INSERT INTO `hotspots` (`id`, `target_id`, `scene_id`, `scene_destination_id`, `ath`, `atv`, `style_id`, `created`, `name`) VALUES
(2, 1, 1, 1, 23, 24, 1, '2017-05-31 02:42:11', NULL),
(6, 7, NULL, NULL, 0, 0, 1, '2017-06-19 04:12:54', NULL),
(7, 8, NULL, NULL, 0, 0, 1, '2017-06-19 04:17:56', NULL),
(8, 9, NULL, NULL, 0, 0, 1, '2017-06-19 04:24:59', NULL),
(9, 10, NULL, NULL, 0, 0, 1, '2017-06-19 14:55:52', NULL),
(10, 11, NULL, NULL, 0, 0, 1, '2017-06-20 06:33:30', 'spot10'),
(11, 12, NULL, NULL, 0, 0, 1, '2017-06-20 06:34:02', 'spot11'),
(17, 18, NULL, NULL, 0, 0, 1, '2017-06-22 04:32:45', 'spot17');

-- --------------------------------------------------------

--
-- Table structure for table `scenes`
--

CREATE TABLE IF NOT EXISTS `scenes` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `uri` text,
  `description` text,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scenes`
--

INSERT INTO `scenes` (`id`, `name`, `title`, `uri`, `description`, `created`) VALUES
(1, 'loggy', 'love', 'uri', 'testing', '2017-05-30 09:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `scene_tours`
--

CREATE TABLE IF NOT EXISTS `scene_tours` (
`id` int(11) NOT NULL,
  `tour_id` int(11) DEFAULT NULL,
  `scene_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `styles`
--

CREATE TABLE IF NOT EXISTS `styles` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `styles`
--

INSERT INTO `styles` (`id`, `name`, `url`, `width`, `height`, `created`) VALUES
(1, 'Left', '/home/test', 2, 34, '2017-05-30 10:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `targets`
--

CREATE TABLE IF NOT EXISTS `targets` (
`id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `name` varchar(255) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `html5_url` text,
  `flash_url` text,
  `video_url` text,
  `poster_url` text,
  `rx` float DEFAULT NULL,
  `ry` float DEFAULT NULL,
  `rz` float DEFAULT NULL,
  `ox` float DEFAULT NULL,
  `oy` float DEFAULT NULL,
  `edge` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `targets`
--

INSERT INTO `targets` (`id`, `title`, `description`, `name`, `width`, `height`, `type`, `html5_url`, `flash_url`, `video_url`, `poster_url`, `rx`, `ry`, `rz`, `ox`, `oy`, `edge`, `created`) VALUES
(1, 'article thinhn', 'try category add', 'Left', 45, NULL, 'su', 'tet', 'tet', 'tet', NULL, 56, 65, 56, 65, 56, 'rt', '2017-05-31 02:21:42'),
(9, 'Hotspot 1', 'test 1', NULL, NULL, NULL, 'su', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-19 04:24:59'),
(10, 'Hotspot 1', 'hp1', NULL, NULL, NULL, 'su', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-19 14:55:52'),
(11, 'nhm,', 'ghjkl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-20 06:33:30'),
(12, 'fvghjkl', 'ghjkl;', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-20 06:34:02'),
(13, 'Test', 'test 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-20 07:08:09'),
(14, 'erdtdr', 'detretr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-21 14:16:59'),
(15, '1231', '312312', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-21 14:19:19'),
(16, 'Test', 'tes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-21 14:50:57'),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-21 14:56:01'),
(18, 'Test', 'dfe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-22 04:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE IF NOT EXISTS `tours` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `name`, `alias`, `user_id`, `created`) VALUES
(2, 'TonDucThang', 'tdt1', NULL, '2017-06-16 01:54:39'),
(3, 'try', 'loy2', NULL, '2017-06-16 01:59:10'),
(4, 'Left1', 'let1', NULL, '2017-06-16 02:05:59'),
(10, 'loggy', 'lgy', NULL, '2017-06-16 10:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created`) VALUES
(1, NULL, 'dongtp', '2017-05-30 08:36:18'),
(2, NULL, 'dongtp', '2017-05-30 08:37:12'),
(3, 'thinhn', 'dongtp', '2017-05-30 08:40:36'),
(4, 'add', 'dongtp', '2017-05-30 08:43:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotspots`
--
ALTER TABLE `hotspots`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scenes`
--
ALTER TABLE `scenes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scene_tours`
--
ALTER TABLE `scene_tours`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `styles`
--
ALTER TABLE `styles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `targets`
--
ALTER TABLE `targets`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotspots`
--
ALTER TABLE `hotspots`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `scenes`
--
ALTER TABLE `scenes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `scene_tours`
--
ALTER TABLE `scene_tours`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `styles`
--
ALTER TABLE `styles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `targets`
--
ALTER TABLE `targets`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
