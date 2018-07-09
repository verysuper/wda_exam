-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-07-05 09:24:58
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
(1, '20180705074928.jpg', '卓越大學校園資訊戲', 0),
(2, '20180705074956.jpg', '卓越大學校園資訊戲', 0),
(3, '20180705075003.jpg', '卓越大學校園資訊戲', 1),
(4, '20180705075008.jpg', '卓越大學校園資訊戲', 0),
(5, '20180705084857.jpg', 'CCC', 0);

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
  MODIFY `a_1_3_t_p_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
