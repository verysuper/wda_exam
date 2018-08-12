-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-08-12 18:00:24
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
-- 資料庫： `wda_3_1`
--

-- --------------------------------------------------------

--
-- 資料表結構 `rr`
--

CREATE TABLE `rr` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '片名',
  `pic` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '海報',
  `rank` int(11) NOT NULL COMMENT '播放順序',
  `display` int(1) NOT NULL COMMENT '顯示',
  `ani` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `rr`
--

INSERT INTO `rr` (`id`, `name`, `pic`, `rank`, `display`, `ani`) VALUES
(2, '踏馬的', '03A02.jpg', 2, 1, '2'),
(3, '3', '03A03.jpg', 3, 1, '3'),
(4, '4', '03A04.jpg', 4, 1, '2'),
(5, '5', '03A05.jpg', 5, 1, '1'),
(7, '777', '20180810145830.jpg', 7, 1, '2'),
(9, '123', '20180810154258.gif', 1, 1, '3');

-- --------------------------------------------------------

--
-- 資料表結構 `vv`
--

CREATE TABLE `vv` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '序號',
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '片名',
  `lv` int(11) NOT NULL COMMENT '分級',
  `length` int(11) NOT NULL COMMENT '片長',
  `ondate` date NOT NULL COMMENT '上映日',
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '簡介',
  `supplier` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '廠商',
  `director` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '導演',
  `poster` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '海報',
  `trailer` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '预告片',
  `display` int(1) NOT NULL COMMENT '顯示',
  `rank` int(11) NOT NULL COMMENT '排序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `vv`
--

INSERT INTO `vv` (`id`, `name`, `lv`, `length`, `ondate`, `info`, `supplier`, `director`, `poster`, `trailer`, `display`, `rank`) VALUES
(15, '999qwe', 2, 999123, '2018-08-11', '999', '999', '999', '20180812013110.png', '20180812013053.png', 1, 999),
(16, '888', 2, 888, '2018-08-12', '888', '888', '888', '20180812020349.png', '20180812020333.avi', 0, 8),
(18, '999123', 2, 999123, '2018-08-12', '123', '999123', '999123', '20180812115802.png', '20180812160210.avi', 1, 1),
(19, '2', 2, 2, '2018-08-11', '2', '2', '2', '20180812115838.png', '20180812160221.avi', 1, 2),
(20, '3', 3, 3, '2018-08-10', '3', '3', '3', '20180812115902.png', '20180812115902.avi', 1, 3),
(21, '4', 3, 4, '2018-08-09', '4', '4', '4', '20180812115929.png', '20180812115929.avi', 1, 4),
(22, '5', 2, 5, '2018-08-11', '5', '888', '888', '20180812115959.png', '20180812115959.avi', 1, 5);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `rr`
--
ALTER TABLE `rr`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `vv`
--
ALTER TABLE `vv`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `rr`
--
ALTER TABLE `rr`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表 AUTO_INCREMENT `vv`
--
ALTER TABLE `vv`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '序號', AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
