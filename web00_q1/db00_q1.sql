-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-07-10 08:06:56
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
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `a_seq` int(10) UNSIGNED NOT NULL,
  `a_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_pw` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_lv` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `admin`
--

INSERT INTO `admin` (`a_seq`, `a_id`, `a_pw`, `a_lv`) VALUES
(1, 'admin', '1234', 9);

-- --------------------------------------------------------

--
-- 資料表結構 `a_1_3_title_pic`
--

CREATE TABLE `a_1_3_title_pic` (
  `a_1_3_t_p_seq` int(10) UNSIGNED NOT NULL,
  `a_1_3_t_p_title` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '圖片',
  `a_1_3_t_p_alt` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '替代文字',
  `a_1_3_t_p_look` int(1) NOT NULL COMMENT '顯示'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `a_1_3_title_pic`
--

INSERT INTO `a_1_3_title_pic` (`a_1_3_t_p_seq`, `a_1_3_t_p_title`, `a_1_3_t_p_alt`, `a_1_3_t_p_look`) VALUES
(9, '20180705101745.jpg', 'gsdgdf', 0),
(10, '20180705102122.jpg', ' xx', 1),
(11, '20180705102134.jpg', 'dwefdwqe', 0);

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
(4, '轉知:法務部辦理「第五屆法規知識王網路闖關競賽辦法', 0),
(5, '轉知2012年全國青年水墨創作大賽活動', 0),
(6, '欣榮圖書館101年悅讀達人徵文比賽，歡迎全校師生踴躍投稿參加', 1),
(7, '轉知:教育是人類升沉的樞紐-2013教師生命成長營', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `a_1_5_mv_pic`
--

CREATE TABLE `a_1_5_mv_pic` (
  `a_1_5_m_p_seq` int(10) UNSIGNED NOT NULL,
  `a_1_5_m_p_pic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_1_5_m_p_look` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `a_1_5_mv_pic`
--

INSERT INTO `a_1_5_mv_pic` (`a_1_5_m_p_seq`, `a_1_5_m_p_pic`, `a_1_5_m_p_look`) VALUES
(11, '20180710070355.swf', 1),
(12, '20180710070359.swf', 1),
(13, '20180710071046.gif', 0),
(14, '20180710071050.gif', 0),
(15, '20180710071056.swf', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `a_1_7_total`
--

CREATE TABLE `a_1_7_total` (
  `a_1_7_t_seq` int(10) UNSIGNED NOT NULL,
  `a_1_7_t_cnt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `a_1_7_total`
--

INSERT INTO `a_1_7_total` (`a_1_7_t_seq`, `a_1_7_t_cnt`) VALUES
(1, 13);

-- --------------------------------------------------------

--
-- 資料表結構 `a_1_8_bottom`
--

CREATE TABLE `a_1_8_bottom` (
  `a_1_8_b_seq` int(10) UNSIGNED NOT NULL,
  `a_1_7_t_footer` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `a_1_8_bottom`
--

INSERT INTO `a_1_8_bottom` (`a_1_8_b_seq`, `a_1_7_t_footer`) VALUES
(1, 'YAYAYA');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_seq`);

--
-- 資料表索引 `a_1_3_title_pic`
--
ALTER TABLE `a_1_3_title_pic`
  ADD PRIMARY KEY (`a_1_3_t_p_seq`);

--
-- 資料表索引 `a_1_4_marquee`
--
ALTER TABLE `a_1_4_marquee`
  ADD PRIMARY KEY (`a_1_4_m_seq`);

--
-- 資料表索引 `a_1_5_mv_pic`
--
ALTER TABLE `a_1_5_mv_pic`
  ADD PRIMARY KEY (`a_1_5_m_p_seq`);

--
-- 資料表索引 `a_1_7_total`
--
ALTER TABLE `a_1_7_total`
  ADD PRIMARY KEY (`a_1_7_t_seq`);

--
-- 資料表索引 `a_1_8_bottom`
--
ALTER TABLE `a_1_8_bottom`
  ADD PRIMARY KEY (`a_1_8_b_seq`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `a_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `a_1_3_title_pic`
--
ALTER TABLE `a_1_3_title_pic`
  MODIFY `a_1_3_t_p_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表 AUTO_INCREMENT `a_1_4_marquee`
--
ALTER TABLE `a_1_4_marquee`
  MODIFY `a_1_4_m_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表 AUTO_INCREMENT `a_1_5_mv_pic`
--
ALTER TABLE `a_1_5_mv_pic`
  MODIFY `a_1_5_m_p_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表 AUTO_INCREMENT `a_1_7_total`
--
ALTER TABLE `a_1_7_total`
  MODIFY `a_1_7_t_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `a_1_8_bottom`
--
ALTER TABLE `a_1_8_bottom`
  MODIFY `a_1_8_b_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
