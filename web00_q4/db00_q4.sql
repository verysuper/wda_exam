-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-07-31 02:40:06
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
-- 資料庫： `db00_q4`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `a_seq` int(10) UNSIGNED NOT NULL,
  `a_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_pw` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_tel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_cc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `account`
--

INSERT INTO `account` (`a_seq`, `a_name`, `a_id`, `a_pw`, `a_tel`, `a_cc`, `a_email`, `a_day`) VALUES
(1, 'x1', 'ccc', 'cccc', 'gf', 'v3', 'w2', '2018-07-26'),
(3, 'q', 'xxx', 'xxx', 'r', 'e', 'w', '2018-07-26'),
(4, '00', '00', '0000', '00', '00', '00', '2018-07-26');

-- --------------------------------------------------------

--
-- 資料表結構 `admin_member`
--

CREATE TABLE `admin_member` (
  `a_m_seq` int(10) UNSIGNED NOT NULL,
  `a_m_id` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '帳號',
  `a_m_pw` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密碼',
  `a_m_1` int(1) NOT NULL,
  `a_m_2` int(1) NOT NULL,
  `a_m_3` int(1) NOT NULL,
  `a_m_4` int(1) NOT NULL,
  `a_m_5` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `admin_member`
--

INSERT INTO `admin_member` (`a_m_seq`, `a_m_id`, `a_m_pw`, `a_m_1`, `a_m_2`, `a_m_3`, `a_m_4`, `a_m_5`) VALUES
(2, 'admin', '1234', 1, 1, 1, 1, 1),
(9, 'xx', 'ooo', 1, 0, 1, 0, 1),
(10, 'aaa', 'aaa', 0, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `item_1`
--

CREATE TABLE `item_1` (
  `i1_seq` int(10) UNSIGNED NOT NULL,
  `i1_name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `item_2`
--

CREATE TABLE `item_2` (
  `i2_seq` int(10) UNSIGNED NOT NULL,
  `i2_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `i2_i1` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `item_3`
--

CREATE TABLE `item_3` (
  `i3_seq` int(10) UNSIGNED NOT NULL,
  `i3_name` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品名稱',
  `i3_sell` int(10) NOT NULL COMMENT '商品價格',
  `i3_type` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品規格',
  `i3_cnt` int(10) NOT NULL COMMENT '商品庫存',
  `i3_pic` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品圖片',
  `i3_con` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品介紹',
  `i3_i1` int(10) NOT NULL COMMENT '對應的大類',
  `i3_i2` int(10) NOT NULL COMMENT '對應的中類',
  `i3_look` int(1) NOT NULL COMMENT '是否上架'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `myfooter`
--

CREATE TABLE `myfooter` (
  `m_seq` int(10) UNSIGNED NOT NULL,
  `m_footer` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `myfooter`
--

INSERT INTO `myfooter` (`m_seq`, `m_footer`) VALUES
(1, 'UUU');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`a_seq`);

--
-- 資料表索引 `admin_member`
--
ALTER TABLE `admin_member`
  ADD PRIMARY KEY (`a_m_seq`);

--
-- 資料表索引 `item_1`
--
ALTER TABLE `item_1`
  ADD PRIMARY KEY (`i1_seq`);

--
-- 資料表索引 `item_2`
--
ALTER TABLE `item_2`
  ADD PRIMARY KEY (`i2_seq`);

--
-- 資料表索引 `item_3`
--
ALTER TABLE `item_3`
  ADD PRIMARY KEY (`i3_seq`);

--
-- 資料表索引 `myfooter`
--
ALTER TABLE `myfooter`
  ADD PRIMARY KEY (`m_seq`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `account`
--
ALTER TABLE `account`
  MODIFY `a_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表 AUTO_INCREMENT `admin_member`
--
ALTER TABLE `admin_member`
  MODIFY `a_m_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表 AUTO_INCREMENT `item_1`
--
ALTER TABLE `item_1`
  MODIFY `i1_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `item_2`
--
ALTER TABLE `item_2`
  MODIFY `i2_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `item_3`
--
ALTER TABLE `item_3`
  MODIFY `i3_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `myfooter`
--
ALTER TABLE `myfooter`
  MODIFY `m_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
