-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2017 at 08:29 AM
-- Server version: 5.6.25
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karyabee_x111`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `id` int(11) NOT NULL,
  `jid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `stat` int(11) NOT NULL DEFAULT '1',
  `adate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dir_phone`
--

CREATE TABLE `dir_phone` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `city` varchar(10) NOT NULL,
  `count` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `addt` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_service`
--

CREATE TABLE `emp_service` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dis` text NOT NULL,
  `price` int(11) NOT NULL,
  `sdate` date NOT NULL,
  `fethure` text NOT NULL,
  `hit` int(11) NOT NULL,
  `cur` varchar(5) NOT NULL,
  `type` varchar(50) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slug`
--

CREATE TABLE `slug` (
  `slug` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dis` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_adds`
--

CREATE TABLE `sob_adds` (
  `id` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `place` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_crd`
--

CREATE TABLE `sob_crd` (
  `id` int(11) NOT NULL,
  `crdnum` varchar(18) NOT NULL,
  `munt` decimal(11,0) NOT NULL,
  `user` int(11) NOT NULL,
  `stat` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_files`
--

CREATE TABLE `sob_files` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `stat` int(11) NOT NULL DEFAULT '1',
  `fty` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_jcate`
--

CREATE TABLE `sob_jcate` (
  `id` int(11) NOT NULL,
  `catename` varchar(50) NOT NULL,
  `catemo` int(4) NOT NULL DEFAULT '1',
  `catedi` varchar(255) NOT NULL,
  `if` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_jobs`
--

CREATE TABLE `sob_jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cate` varchar(255) NOT NULL DEFAULT '1',
  `location` varchar(50) NOT NULL,
  `education` varchar(255) NOT NULL,
  `org` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `count` varchar(255) NOT NULL DEFAULT 'Afghanistan',
  `dur` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `slrang` varchar(255) NOT NULL,
  `adate` date NOT NULL,
  `edate` date NOT NULL,
  `nation` varchar(255) NOT NULL,
  `jobno` varchar(255) NOT NULL,
  `jobtyp` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `repons` text NOT NULL,
  `qualifications` text NOT NULL,
  `guid` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `show_x` int(11) NOT NULL DEFAULT '1',
  `author` int(11) NOT NULL,
  `vist` int(11) NOT NULL DEFAULT '0',
  `exper` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `addt` varchar(255) NOT NULL,
  `jobid` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `pend` int(1) NOT NULL DEFAULT '1',
  `postedfrom` varchar(10) NOT NULL DEFAULT 'site'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_jobs_city`
--

CREATE TABLE `sob_jobs_city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cid` int(11) NOT NULL DEFAULT '1',
  `stat` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_jobs_count`
--

CREATE TABLE `sob_jobs_count` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dis` varchar(100) NOT NULL,
  `stat` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_logemp`
--

CREATE TABLE `sob_logemp` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `pemail` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `cate` int(4) NOT NULL DEFAULT '1',
  `address` varchar(255) NOT NULL,
  `city` varchar(30) NOT NULL DEFAULT 'Kabul',
  `con` varchar(30) NOT NULL DEFAULT '1',
  `phone` varchar(15) NOT NULL DEFAULT '+93700000000',
  `last_lg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logo` varchar(255) NOT NULL,
  `crdt` int(11) NOT NULL DEFAULT '50',
  `active` int(11) NOT NULL DEFAULT '0',
  `rank` int(11) NOT NULL DEFAULT '0',
  `twt` varchar(100) NOT NULL,
  `fb` varchar(150) NOT NULL,
  `li` varchar(150) NOT NULL,
  `ym` varchar(150) NOT NULL,
  `gp` varchar(150) NOT NULL,
  `hit` int(11) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT 'User',
  `img` varchar(255) NOT NULL DEFAULT '/upload/user/avatar/defult.jpg'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_resume`
--

CREATE TABLE `sob_resume` (
  `id` int(11) NOT NULL,
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
  `img` varchar(255) NOT NULL DEFAULT '/upload/user/avatar/defult.jpg',
  `pemail` varchar(255) NOT NULL,
  `fbid` varchar(100) NOT NULL DEFAULT 'website'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_res_edu`
--

CREATE TABLE `sob_res_edu` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `org` varchar(50) NOT NULL,
  `sdate` date NOT NULL,
  `edate` varchar(30) NOT NULL,
  `city` varchar(100) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_res_exp`
--

CREATE TABLE `sob_res_exp` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `org` varchar(100) NOT NULL,
  `sdate` date NOT NULL,
  `edate` varchar(30) NOT NULL,
  `dis` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `count` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_res_it`
--

CREATE TABLE `sob_res_it` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_res_lang`
--

CREATE TABLE `sob_res_lang` (
  `rid` int(11) NOT NULL,
  `lang` varchar(100) NOT NULL,
  `much` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_res_ref`
--

CREATE TABLE `sob_res_ref` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `org` varchar(100) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_settings`
--

CREATE TABLE `sob_settings` (
  `id` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `discri` int(11) NOT NULL,
  `theme` int(11) NOT NULL,
  `postspp` int(11) NOT NULL,
  `allr` int(11) NOT NULL,
  `freep` int(11) NOT NULL,
  `hh` int(11) NOT NULL,
  `pp` int(11) NOT NULL,
  `ll` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sob_stat`
--

CREATE TABLE `sob_stat` (
  `id` int(11) NOT NULL,
  `ip` varchar(68) NOT NULL,
  `refer` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `url` varchar(255) NOT NULL,
  `agent` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dir_phone`
--
ALTER TABLE `dir_phone`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_service`
--
ALTER TABLE `emp_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slug`
--
ALTER TABLE `slug`
  ADD PRIMARY KEY (`slug`);

--
-- Indexes for table `sob_adds`
--
ALTER TABLE `sob_adds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sob_crd`
--
ALTER TABLE `sob_crd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sob_files`
--
ALTER TABLE `sob_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sob_jcate`
--
ALTER TABLE `sob_jcate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `catename` (`catename`);

--
-- Indexes for table `sob_jobs`
--
ALTER TABLE `sob_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sob_jobs_city`
--
ALTER TABLE `sob_jobs_city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sob_jobs_count`
--
ALTER TABLE `sob_jobs_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sob_logemp`
--
ALTER TABLE `sob_logemp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sob_resume`
--
ALTER TABLE `sob_resume`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sob_res_edu`
--
ALTER TABLE `sob_res_edu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sob_res_exp`
--
ALTER TABLE `sob_res_exp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sob_res_it`
--
ALTER TABLE `sob_res_it`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sob_res_lang`
--
ALTER TABLE `sob_res_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sob_res_ref`
--
ALTER TABLE `sob_res_ref`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sob_settings`
--
ALTER TABLE `sob_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sob_stat`
--
ALTER TABLE `sob_stat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;
--
-- AUTO_INCREMENT for table `dir_phone`
--
ALTER TABLE `dir_phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emp_service`
--
ALTER TABLE `emp_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sob_adds`
--
ALTER TABLE `sob_adds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sob_crd`
--
ALTER TABLE `sob_crd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `sob_files`
--
ALTER TABLE `sob_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sob_jcate`
--
ALTER TABLE `sob_jcate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `sob_jobs`
--
ALTER TABLE `sob_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16936;
--
-- AUTO_INCREMENT for table `sob_jobs_city`
--
ALTER TABLE `sob_jobs_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `sob_jobs_count`
--
ALTER TABLE `sob_jobs_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sob_logemp`
--
ALTER TABLE `sob_logemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2088;
--
-- AUTO_INCREMENT for table `sob_resume`
--
ALTER TABLE `sob_resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=689;
--
-- AUTO_INCREMENT for table `sob_res_edu`
--
ALTER TABLE `sob_res_edu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=432;
--
-- AUTO_INCREMENT for table `sob_res_exp`
--
ALTER TABLE `sob_res_exp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;
--
-- AUTO_INCREMENT for table `sob_res_it`
--
ALTER TABLE `sob_res_it`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=341;
--
-- AUTO_INCREMENT for table `sob_res_lang`
--
ALTER TABLE `sob_res_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=606;
--
-- AUTO_INCREMENT for table `sob_res_ref`
--
ALTER TABLE `sob_res_ref`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sob_settings`
--
ALTER TABLE `sob_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sob_stat`
--
ALTER TABLE `sob_stat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
