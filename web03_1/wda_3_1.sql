-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-08-10 10:25:14
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
  `name` text COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT '片名',
  `pic` text COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT '海報',
  `rank` int(11) NOT NULL COMMENT '播放順序',
  `display` int(1) NOT NULL COMMENT '顯示',
  `ani` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- 資料表的匯出資料 `rr`
--

INSERT INTO `rr` (`id`, `name`, `pic`, `rank`, `display`, `ani`) VALUES
(2, '2', '03A02.jpg', 2, 1, '2'),
(3, '3', '03A03.jpg', 3, 1, '3'),
(4, '4', '03A04.jpg', 4, 0, '2'),
(5, '5', '03A05.jpg', 5, 0, '1'),
(7, '777', '20180810145830.jpg', 7, 1, '1'),
(9, '123', '20180810154258.gif', 0, 0, '1');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `rr`
--
ALTER TABLE `rr`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `rr`
--
ALTER TABLE `rr`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
