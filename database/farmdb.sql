-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2015 at 05:09 下午
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE `land` (
  `farmid` int(11) NOT NULL,
  `uid` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lid` int(11) NOT NULL DEFAULT '1',
  `lmoney` int(11) NOT NULL,
  `llevel` int(11) NOT NULL DEFAULT '1',
  `lstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `land`
--

INSERT INTO `land` (`farmid`, `uid`, `lid`, `lmoney`, `llevel`, `lstatus`) VALUES
(1, 'sheng', 1, 0, 1, 0),
(2, 'sheng', 2, 0, 1, 0),
(3, 'sheng', 3, 0, 1, 0),
(4, 'sheng', 4, 0, 1, 0),
(5, 'sheng', 5, 5000, 2, 1),
(6, 'sheng', 6, 5000, 2, 1),
(7, 'sheng', 7, 5000, 2, 1),
(8, 'jack', 1, 0, 1, 0),
(9, 'jack', 2, 0, 1, 0),
(10, 'jack', 3, 0, 1, 0),
(11, 'jack', 4, 0, 1, 0),
(12, 'jack', 5, 5000, 2, 1),
(13, 'jack', 6, 5000, 2, 1),
(14, 'jack', 7, 5000, 2, 1),
(15, 'cat', 1, 0, 1, 0),
(16, 'cat', 2, 0, 1, 0),
(17, 'cat', 3, 0, 1, 0),
(18, 'cat', 4, 0, 1, 0),
(19, 'cat', 5, 5000, 2, 1),
(20, 'cat', 6, 5000, 2, 1),
(21, 'cat', 7, 5000, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pprice` int(11) NOT NULL,
  `pcount` int(11) NOT NULL,
  `penergy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pprice`, `pcount`, `penergy`) VALUES
('tomato', 100, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `seed`
--

CREATE TABLE `seed` (
  `sid` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sprice` int(11) NOT NULL,
  `stime` time NOT NULL,
  `sexp` int(11) NOT NULL,
  `senergy` int(11) NOT NULL,
  `slevel` int(11) NOT NULL,
  `scount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seed`
--

INSERT INTO `seed` (`sid`, `sprice`, `stime`, `sexp`, `senergy`, `slevel`, `scount`) VALUES
('tomato', 100, '00:01:00', 20, 2, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uname` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uexp` int(11) NOT NULL,
  `ulevel` int(11) NOT NULL DEFAULT '1',
  `uenergy` int(11) NOT NULL DEFAULT '10',
  `umoney` int(11) NOT NULL DEFAULT '1000',
  `ucount` int(11) NOT NULL,
  `ulogtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `pwd`, `uname`, `uexp`, `ulevel`, `uenergy`, `umoney`, `ucount`, `ulogtime`) VALUES
('cat', '123', 'cat', 0, 1, 10, 1000, 2, '0000-00-00 00:00:00'),
('jack', '123', 'Jack', 0, 1, 10, 1000, 1, '0000-00-00 00:00:00'),
('sheng', '123', 'Sheng', 0, 1, 10, 1000, 4, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `land`
--
ALTER TABLE `land`
  ADD PRIMARY KEY (`farmid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `seed`
--
ALTER TABLE `seed`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `land`
--
ALTER TABLE `land`
  MODIFY `farmid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
