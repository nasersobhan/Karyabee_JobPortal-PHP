-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2012 at 02:38 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `sob_resume`
--

CREATE TABLE IF NOT EXISTS `sob_resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sex` varchar(8) NOT NULL,
  `hstedu` varchar(30) NOT NULL,
  `totlex` int(11) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `citzns` varchar(100) NOT NULL,
  `dborn` date NOT NULL,
  `about` varchar(255) NOT NULL,
  `cover` text NOT NULL,
  `feild` varchar(255) NOT NULL,
  `poburn` varchar(100) NOT NULL DEFAULT 'Afghanistan',
  `password` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `city` varchar(20) NOT NULL,
  `cate` int(9) NOT NULL,
  `keyf` varchar(100) NOT NULL,
  `mobi` varchar(16) NOT NULL,
  `pem` varchar(255) NOT NULL,
  `sus` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cvs` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sob_resume`
--

INSERT INTO `sob_resume` (`id`, `fullname`, `email`, `sex`, `hstedu`, `totlex`, `tel`, `address`, `citzns`, `dborn`, `about`, `cover`, `feild`, `poburn`, `password`, `count`, `city`, `cate`, `keyf`, `mobi`, `pem`, `sus`, `active`, `cvs`) VALUES
(1, 'Ahmad', 'info@sobhansoft.com', 'Female', 'Bachelor', 6, '0797280900', 'Darleman, Kabol', 'Afghan', '1991-01-17', '', '<p>fgsdfgsdfgsdfg</p>\r\n<p>sd</p>\r\n<p>fg</p>\r\n<p>sd</p>\r\n<p>fg</p>\r\n<p>sdfg</p>\r\n<p>s</p>\r\n<p>dfg</p>\r\n<p>sdfgdfgsdfg</p>', 'IT', 'Mashhad', '777d715caf16b5cf8897d3251ff8a27f', 1, 'Farah', 17, 'Software Development', '234234', 'naser@sobhansoft.com', 0, 0, '4028Naser.doc');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
