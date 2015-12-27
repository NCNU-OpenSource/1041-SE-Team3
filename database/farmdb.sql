-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2015 �?12 ??27 ??14:26
-- 伺服器版本: 5.6.24
-- PHP 版本： 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
  `lstatus` int(11) NOT NULL,
  `ltime` time DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `land`
--

INSERT INTO `land` (`farmid`, `uid`, `lid`, `lmoney`, `llevel`, `lstatus`, `ltime`) VALUES
(1, 'sheng', 1, 0, 1, 0, NULL),
(2, 'sheng', 2, 0, 1, 0, NULL),
(3, 'sheng', 3, 0, 1, 0, NULL),
(4, 'sheng', 4, 0, 1, 0, NULL),
(5, 'sheng', 5, 5000, 2, 1, NULL),
(6, 'sheng', 6, 5000, 2, 1, NULL),
(7, 'sheng', 7, 5000, 2, 1, NULL),
(8, 'jack', 1, 0, 1, 0, NULL),
(9, 'jack', 2, 0, 1, 0, NULL),
(10, 'jack', 3, 0, 1, 0, NULL),
(11, 'jack', 4, 0, 1, 0, NULL),
(12, 'jack', 5, 5000, 2, 1, NULL),
(13, 'jack', 6, 5000, 2, 1, NULL),
(14, 'jack', 7, 5000, 2, 1, NULL),
(15, 'cat', 1, 0, 1, 0, NULL),
(16, 'cat', 2, 0, 1, 0, NULL),
(17, 'cat', 3, 0, 1, 0, NULL),
(18, 'cat', 4, 0, 1, 0, NULL),
(19, 'cat', 5, 5000, 2, 1, NULL),
(20, 'cat', 6, 5000, 2, 1, NULL),
(21, 'cat', 7, 5000, 2, 1, NULL),
(22, 'a', 1, 0, 1, 0, NULL),
(23, 'a', 2, 0, 1, 0, NULL),
(24, 'a', 3, 0, 1, 0, NULL),
(25, 'a', 4, 0, 1, 0, NULL),
(26, 'a', 5, 5000, 2, 1, NULL),
(27, 'a', 6, 5000, 2, 1, NULL),
(28, 'a', 7, 5000, 2, 1, NULL),
(29, 'taco', 1, 0, 1, 0, NULL),
(30, 'taco', 2, 0, 1, 0, NULL),
(31, 'taco', 3, 0, 1, 0, NULL),
(32, 'taco', 4, 0, 1, 0, NULL),
(33, 'taco', 5, 5000, 2, 1, NULL),
(34, 'taco', 6, 5000, 2, 1, NULL),
(35, 'taco', 7, 5000, 2, 1, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pid` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pprice` int(11) NOT NULL,
  `penergy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`pid`, `pprice`, `penergy`) VALUES
('beetroot', 120, 8),
('carrot', 150, 5),
('eggplant', 200, 10),
('tomato', 100, 5),
('yellowbean', 250, 15);

-- --------------------------------------------------------

--
-- 資料表結構 `seed`
--

CREATE TABLE IF NOT EXISTS `seed` (
  `sid` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sprice` int(11) NOT NULL,
  `stime` time NOT NULL,
  `sexp` int(11) NOT NULL,
  `senergy` int(11) NOT NULL,
  `slevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `seed`
--

INSERT INTO `seed` (`sid`, `sprice`, `stime`, `sexp`, `senergy`, `slevel`) VALUES
('beetroot', 120, '00:02:00', 15, 5, 1),
('carrot', 150, '00:03:00', 10, 4, 1),
('eggplant', 200, '00:05:00', 20, 10, 2),
('tomato', 100, '00:01:00', 5, 2, 1),
('yellowbean', 250, '00:06:00', 25, 9, 3);

-- --------------------------------------------------------

--
-- 資料表結構 `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `uid` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sid` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pid` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `ucount` int(11) NOT NULL,
  `ulogtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`uid`, `pwd`, `uname`, `uexp`, `ulevel`, `uenergy`, `umoney`, `ucount`, `ulogtime`) VALUES
('a', '123', 'a', 0, 1, 10, 1000, 2, '0000-00-00 00:00:00'),
('cat', '123', 'cat', 0, 1, 10, 1000, 2, '0000-00-00 00:00:00'),
('jack', '123', 'Jack', 0, 1, 10, 1000, 1, '0000-00-00 00:00:00'),
('sheng', '123', 'Sheng', 0, 1, 10, 1000, 4, '0000-00-00 00:00:00'),
('taco', '123', 'Taco', 0, 1, 10, 1000, 7, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `warehouse`
--

CREATE TABLE IF NOT EXISTS `warehouse` (
  `uid` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sid` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scount` int(11) NOT NULL,
  `pid` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pcount` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `warehouse`
--

INSERT INTO `warehouse` (`uid`, `sid`, `scount`, `pid`, `pcount`, `id`) VALUES
('a', 'tomato', 1, 'tomato', 0, 1),
('a', 'beetroot', 1, 'beetroot', 0, 2),
('a', 'carrot', 1, 'carrot', 0, 3),
('a', 'eggplant', 1, 'eggplant', 0, 4),
('a', 'yellowbean', 1, 'yellowbean', 0, 5),
('taco', 'tomato', 1, 'tomato', 0, 6),
('taco', 'beetroot', 1, 'beetroot', 0, 7),
('taco', 'carrot', 1, 'carrot', 0, 8),
('taco', 'eggplant', 0, 'eggplant', 0, 9),
('taco', 'yellowbean', 0, 'yellowbean', 0, 10);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `land`
--
ALTER TABLE `land`
  ADD PRIMARY KEY (`farmid`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- 資料表索引 `seed`
--
ALTER TABLE `seed`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- 資料表索引 `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `land`
--
ALTER TABLE `land`
  MODIFY `farmid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- 使用資料表 AUTO_INCREMENT `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
