-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-01-08 12:10:34
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
  `lstatus` int(11) NOT NULL,
  `ltime` int(11) DEFAULT NULL,
  `sid` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `land`
--

INSERT INTO `land` (`farmid`, `uid`, `lid`, `lmoney`, `llevel`, `lstatus`, `ltime`, `sid`) VALUES
(29, 'taco', 1, 0, 1, 2, 1452268636, 'yellowbean'),
(30, 'taco', 2, 0, 1, 2, 1452267980, 'tomato'),
(31, 'taco', 3, 0, 1, 2, 1452267977, 'tomato'),
(32, 'taco', 4, 0, 1, 2, 1452267983, 'tomato'),
(33, 'taco', 5, 5000, 2, 0, NULL, NULL),
(34, 'taco', 6, 5000, 2, 1, NULL, NULL),
(35, 'taco', 7, 5000, 2, 1, NULL, NULL),
(64, 'sheng', 1, 0, 1, 0, NULL, NULL),
(65, 'sheng', 2, 0, 1, 0, NULL, NULL),
(66, 'sheng', 3, 0, 1, 0, NULL, NULL),
(67, 'sheng', 4, 0, 1, 0, NULL, NULL),
(68, 'sheng', 5, 5000, 2, 0, NULL, NULL),
(69, 'sheng', 6, 5000, 2, 1, NULL, NULL),
(70, 'sheng', 7, 5000, 2, 1, NULL, NULL);

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
('beetroot', 120, 4),
('carrot', 150, 6),
('eggplant', 200, 8),
('tomato', 100, 2),
('yellowbean', 250, 10);

-- --------------------------------------------------------

--
-- 資料表結構 `seed`
--

CREATE TABLE IF NOT EXISTS `seed` (
  `sid` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sprice` int(11) NOT NULL,
  `stime` int(11) NOT NULL,
  `sexp` int(11) NOT NULL,
  `senergy` int(11) NOT NULL,
  `slevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `seed`
--

INSERT INTO `seed` (`sid`, `sprice`, `stime`, `sexp`, `senergy`, `slevel`) VALUES
('beetroot', 120, 200, 15, 4, 1),
('carrot', 150, 300, 10, 6, 1),
('eggplant', 200, 500, 20, 8, 2),
('tomato', 100, 20, 5, 2, 1),
('yellowbean', 250, 600, 25, 10, 3);

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

--
-- 資料表的匯出資料 `store`
--

INSERT INTO `store` (`uid`, `sid`, `pid`, `lid`) VALUES
('a', 'tomato', 'tomato', 0),
('a', 'beetroot', 'beetroot', 0),
('a', 'carrot', 'carrot', 0),
('a', 'eggplant', 'eggplant', 0),
('a', 'yellowbean', 'yellowbean', 0),
('r', 'tomato', 'tomato', 0),
('r', 'beetroot', 'beetroot', 0),
('r', 'carrot', 'carrot', 0),
('r', 'eggplant', 'eggplant', 0),
('r', 'yellowbean', 'yellowbean', 0),
('taco', 'tomato', 'tomato', 0),
('taco', 'beetroot', 'beetroot', 0),
('taco', 'carrot', 'carrot', 0),
('taco', 'eggplant', 'eggplant', 0),
('taco', 'yellowbean', 'yellowbean', 0),
('amy', 'tomato', 'tomato', 0),
('amy', 'beetroot', 'beetroot', 0),
('amy', 'carrot', 'carrot', 0),
('amy', 'eggplant', 'eggplant', 0),
('amy', 'yellowbean', 'yellowbean', 0),
('sheng', 'tomato', 'tomato', 0),
('sheng', 'beetroot', 'beetroot', 0),
('sheng', 'carrot', 'carrot', 0),
('sheng', 'eggplant', 'eggplant', 0),
('sheng', 'yellowbean', 'yellowbean', 0);

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
('a', '123', 'apple', 50, 1, 3, 1000, 2),
('amy', '123', 'amy', 0, 1, 10, 1000, 0),
('r', '123', 'ray', 50, 1, 3, 1000, 2),
('sheng', '123', 'sheng', 30, 2, 10, 1000, 3),
('taco', '123', 'Taco', 0, 1, 10, 0, 57);

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `warehouse`
--

INSERT INTO `warehouse` (`uid`, `sid`, `scount`, `pid`, `pcount`, `id`) VALUES
('taco', 'tomato', 12, 'tomato', 17, 21),
('taco', 'beetroot', 2, 'beetroot', 1, 22),
('taco', 'carrot', 1, 'carrot', 1, 23),
('taco', 'eggplant', 3, 'eggplant', 7, 24),
('taco', 'yellowbean', 0, 'yellowbean', 0, 25),
('amy', 'tomato', 12, 'tomato', 0, 26),
('amy', 'beetroot', 3, 'beetroot', 0, 27),
('amy', 'carrot', 2, 'carrot', 0, 28),
('amy', 'eggplant', 0, 'eggplant', 0, 29),
('amy', 'yellowbean', 1, 'yellowbean', 0, 30),
('sheng', 'tomato', 0, 'tomato', 4, 31),
('sheng', 'beetroot', 0, 'beetroot', 1, 32),
('sheng', 'carrot', 1, 'carrot', 0, 33),
('sheng', 'eggplant', 0, 'eggplant', 0, 34),
('sheng', 'yellowbean', 0, 'yellowbean', 0, 35);

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
  MODIFY `farmid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- 使用資料表 AUTO_INCREMENT `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
