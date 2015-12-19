-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2015-12-19 12:59:17
-- 伺服器版本: 5.6.26
-- PHP 版本： 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `farmdb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `land`
--

CREATE TABLE IF NOT EXISTS `land` (
  `farmid` int(11) NOT NULL,
  `uid` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lid` int(11) NOT NULL DEFAULT '1',
  `lmoney` int(11) NOT NULL,
  `llevel` int(11) NOT NULL DEFAULT '1',
  `lstatus` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `land`
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
(14, 'jack', 7, 5000, 2, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uname` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uexp` int(11) NOT NULL,
  `ulevel` int(11) NOT NULL DEFAULT '1',
  `uenergy` int(11) NOT NULL DEFAULT '10',
  `umoney` int(11) NOT NULL DEFAULT '1000',
  `ucount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`uid`, `pwd`, `uname`, `uexp`, `ulevel`, `uenergy`, `umoney`, `ucount`) VALUES
('jack', '123', 'Jack', 0, 1, 10, 1000, 1),
('sheng', '123', 'Sheng', 0, 1, 10, 1000, 4);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `land`
--
ALTER TABLE `land`
  ADD PRIMARY KEY (`farmid`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `land`
--
ALTER TABLE `land`
  MODIFY `farmid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
