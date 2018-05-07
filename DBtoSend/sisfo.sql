-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2016 at 11:58 PM
-- Server version: 10.0.20-MariaDB-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sandiwar_sis`
--

-- --------------------------------------------------------

--
-- Table structure for table `comet`
--

CREATE TABLE IF NOT EXISTS `comet` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `lab` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `kordas` tinyint(1) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comet`
--

INSERT INTO `comet` (`username`, `password`, `lab`, `admin`, `kordas`) VALUES
('a', 'a', 'Administrator', 1, 0),
('admin', 'admin', 'Administrator', 1, 0),
('k', 'k', 'Neotransmitter Laboratorium', 0, 1),
('k2', 'k2', 'Atomic Laboratorium', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` varchar(40) NOT NULL,
  `id_news` varchar(40) CHARACTER SET utf8 NOT NULL,
  `lab` varchar(60) CHARACTER SET utf8 NOT NULL,
  `isikomen` mediumtext NOT NULL,
  `tgl_komen` varchar(18) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` varchar(40) NOT NULL,
  `judul` varchar(80) NOT NULL,
  `lab` varchar(60) NOT NULL,
  `berita` mediumtext NOT NULL,
  `tgl_post` varchar(18) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pesanproposal`
--

CREATE TABLE IF NOT EXISTS `pesanproposal` (
  `id` varchar(40) CHARACTER SET utf8 NOT NULL,
  `id_proposal` varchar(40) CHARACTER SET utf8 NOT NULL,
  `lab` varchar(60) CHARACTER SET utf8 NOT NULL,
  `pesan` mediumtext CHARACTER SET utf8 NOT NULL,
  `tgl_pesan` varchar(18) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE IF NOT EXISTS `proposal` (
  `id` varchar(40) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `lab` varchar(50) NOT NULL,
  `tgl_upload` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `filepro` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
