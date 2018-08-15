-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-08-15 17:51:12
-- 伺服器版本: 10.1.32-MariaDB
-- PHP 版本： 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `wda_3_2`
--

-- --------------------------------------------------------

--
-- 資料表結構 `rr`
--

CREATE TABLE `rr` (
  `rrid` int(11) UNSIGNED NOT NULL,
  `rrname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rrpic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rrrank` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rrani` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rrlook` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `rr`
--

INSERT INTO `rr` (`rrid`, `rrname`, `rrpic`, `rrrank`, `rrani`, `rrlook`) VALUES
(1, '03A01.jpg', '03A01.jpg', '1', '1', 1),
(2, '03A02.jpg', '03A02.jpg', '2', '1', 1),
(3, '03A03.jpg', '03A03.jpg', '3', '1', 1),
(4, '03A04.jpg', '03A04.jpg', '4', '1', 1),
(5, '03A05.jpg', '03A05.jpg', '5', '1', 1),
(6, '03A06.jpg', '03A06.jpg', '6', '1', 1),
(7, '03A07.jpg', '03A07.jpg', '7', '1', 1),
(8, '03A08.jpg', '03A08.jpg', '8', '1', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `ticket`
--

CREATE TABLE `ticket` (
  `tid` int(11) UNSIGNED NOT NULL,
  `tno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tdate` date NOT NULL,
  `tsess` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tchair` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `ticket`
--

INSERT INTO `ticket` (`tid`, `tno`, `tmid`, `tname`, `tdate`, `tsess`, `tchair`) VALUES
(1, '123123123120', '1', '123', '2018-08-15', '18:00~20:00', '11');

-- --------------------------------------------------------

--
-- 資料表結構 `vv`
--

CREATE TABLE `vv` (
  `vvid` int(11) UNSIGNED NOT NULL,
  `vvname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vvlv` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vvlength` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vvondate` date NOT NULL,
  `vvsupplier` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vvdirector` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vvvideo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vvpic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vvinfo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vvdisplat` int(11) NOT NULL,
  `vvrank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `vv`
--

INSERT INTO `vv` (`vvid`, `vvname`, `vvlv`, `vvlength`, `vvondate`, `vvsupplier`, `vvdirector`, `vvvideo`, `vvpic`, `vvinfo`, `vvdisplat`, `vvrank`) VALUES
(1, '03B01', '1', '100', '2018-08-15', '03B01', '03B01', '03B01.avi', '03B01.png', '03B01.png', 1, 1),
(2, '03B02', '1', '100', '2018-08-14', '03B02', '03B02', '03B02.avi', '03B02.png', '03B02.png', 1, 2),
(3, '03B03', '1', '100', '2018-08-13', '03B03', '03B03', '03B03.avi', '03B03.png', '03B03.png', 1, 3),
(4, '03B04', '1', '100', '2018-08-12', '03B04', '03B04', '03B04.avi', '03B04.png', '03B04.png', 1, 4),
(5, '03B05', '1', '100', '2018-08-15', '03B05', '03B05', '03B05.avi', '03B05.png', '03B05.png', 1, 5),
(6, '03B06', '1', '100', '2018-08-14', '03B06', '03B06', '03B06.avi', '03B06.png', '03B06.png', 1, 6),
(7, '03B07', '1', '100', '2018-08-13', '03B07', '03B07', '03B07.avi', '03B07.png', '03B07.png', 1, 7),
(8, '03B08', '1', '100', '2018-08-12', '03B08', '03B08', '03B08.avi', '03B08.png', '03B08.png', 1, 8),
(9, '03B09', '1', '100', '2018-08-15', '03B09', '03B09', '03B09.avi', '03B09.png', '03B09.png', 1, 9);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `rr`
--
ALTER TABLE `rr`
  ADD PRIMARY KEY (`rrid`);

--
-- 資料表索引 `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`tid`);

--
-- 資料表索引 `vv`
--
ALTER TABLE `vv`
  ADD PRIMARY KEY (`vvid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `rr`
--
ALTER TABLE `rr`
  MODIFY `rrid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表 AUTO_INCREMENT `ticket`
--
ALTER TABLE `ticket`
  MODIFY `tid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `vv`
--
ALTER TABLE `vv`
  MODIFY `vvid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
