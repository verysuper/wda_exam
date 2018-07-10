-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-07-10 03:50:04
-- 伺服器版本: 10.1.31-MariaDB
-- PHP 版本： 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db00_q1`
--

-- --------------------------------------------------------

--
-- 資料表結構 `a_1_4_marquee`
--

CREATE TABLE `a_1_4_marquee` (
  `a_1_4_m_seq` int(10) UNSIGNED NOT NULL,
  `a_1_4_m_word` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_1_4_m_look` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `a_1_4_marquee`
--

INSERT INTO `a_1_4_marquee` (`a_1_4_m_seq`, `a_1_4_m_word`, `a_1_4_m_look`) VALUES
(3, '轉知臺北教育大學與臺灣師大合辦第11屆麋研齋全國硬筆書法比賽活動', 0),
(4, '轉知:法務部辦理「第五屆法規知識王網路闖關競賽辦法', 1),
(5, '轉知2012年全國青年水墨創作大賽活動', 1),
(6, '欣榮圖書館101年悅讀達人徵文比賽，歡迎全校師生踴躍投稿參加', 1),
(7, '轉知:教育是人類升沉的樞紐-2013教師生命成長營', 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `a_1_4_marquee`
--
ALTER TABLE `a_1_4_marquee`
  ADD PRIMARY KEY (`a_1_4_m_seq`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `a_1_4_marquee`
--
ALTER TABLE `a_1_4_marquee`
  MODIFY `a_1_4_m_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
