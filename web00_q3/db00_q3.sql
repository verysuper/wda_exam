-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-08-14 05:01:33
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
-- 資料庫： `db00_q3`
--

-- --------------------------------------------------------

--
-- 資料表結構 `ding_log`
--

CREATE TABLE `ding_log` (
  `d_l_seq` int(10) UNSIGNED NOT NULL,
  `d_l_m` int(10) NOT NULL COMMENT '電影',
  `d_l_day` date NOT NULL COMMENT '日期',
  `d_l_time` int(1) NOT NULL COMMENT '場次',
  `d_l_jo` int(10) NOT NULL COMMENT '座位',
  `d_l_no` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '編號',
  `d_l_cnt` int(4) NOT NULL COMMENT '下訂次數'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `ding_log`
--

INSERT INTO `ding_log` (`d_l_seq`, `d_l_m`, `d_l_day`, `d_l_time`, `d_l_jo`, `d_l_no`, `d_l_cnt`) VALUES
(1, 6, '2019-03-28', 5, 3, '201808140000', 0),
(2, 6, '2019-03-28', 5, 8, '201808140000', 0),
(3, 6, '2019-03-28', 5, 13, '201808140000', 0),
(4, 6, '2019-03-28', 5, 18, '201808140000', 0),
(5, 6, '2019-03-28', 5, 1, '201808140000', 0),
(6, 6, '2019-03-28', 5, 6, '201808140000', 0),
(7, 6, '2019-03-28', 5, 5, '201808140001', 1),
(8, 6, '2019-03-28', 5, 20, '201808140001', 1),
(9, 11, '2018-08-15', 3, 7, '201808140002', 2),
(10, 11, '2018-08-15', 3, 14, '201808140002', 2),
(11, 11, '2018-08-15', 1, 3, '201808143', 3),
(12, 11, '2018-08-15', 1, 8, '201808143', 3),
(13, 7, '2019-01-24', 1, 3, '197001010004', 4),
(14, 11, '2018-08-16', 4, 2, '201808160005', 5);

-- --------------------------------------------------------

--
-- 資料表結構 `move`
--

CREATE TABLE `move` (
  `m_seq` int(10) UNSIGNED NOT NULL,
  `m_name` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '片名',
  `m_con` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '簡介',
  `m_time` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '片長',
  `m_lv` int(1) NOT NULL COMMENT '分級',
  `m_day` date NOT NULL COMMENT '上映日期',
  `m_fa` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '發行商',
  `m_d` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '導演',
  `m_u` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '預告片',
  `m_pic` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '海報',
  `m_look` int(1) NOT NULL COMMENT '顯示',
  `m_desc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `move`
--

INSERT INTO `move` (`m_seq`, `m_name`, `m_con`, `m_time`, `m_lv`, `m_day`, `m_fa`, `m_d`, `m_u`, `m_pic`, `m_look`, `m_desc`) VALUES
(6, 'test', 'tetetete', 'test', 4, '2019-03-27', 'test1', 'test2', '20180808103234.avi', '20180808103234.png', 1, 2),
(7, 'QQQ', 'OO\r\nXX\r\nVV', 'RR', 4, '2019-01-22', 'OO', 'XX', '20180808111839.avi', '20180808111839.png', 1, 5),
(8, 'a1', '', 'aaa', 1, '2018-08-08', 'a', 'c', '20180808130802.avi', '20180808130802.png', 1, 23),
(9, 'dsadas', 'asdas', 'asd', 3, '2018-08-07', 'asd', 'asdas', '20180808130825.avi', '20180808130825.png', 1, 51),
(10, 'asd', '5t\r\ngt5\r\n435\r\nh5', 'fgdh', 2, '2018-08-10', '5j', 't32', '20180808130842.avi', '20180808130842.png', 1, 8),
(11, 'g45g4', 'wqrg4', 'fwqerfe', 4, '2018-08-15', 'wqe', 'cqw', '20180808130902.avi', '20180808130902.png', 1, 7),
(12, '魔物獵人', '和怪物\r\n打來打去的影片', '1分30秒', 4, '2018-08-09', '卡普通', '你', '20180808142929.avi', '20180808142929.png', 1, 999);

-- --------------------------------------------------------

--
-- 資料表結構 `pp`
--

CREATE TABLE `pp` (
  `p_seq` int(10) UNSIGNED NOT NULL,
  `p_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_pic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_look` int(1) NOT NULL,
  `p_desc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `ding_log`
--
ALTER TABLE `ding_log`
  ADD PRIMARY KEY (`d_l_seq`);

--
-- 資料表索引 `move`
--
ALTER TABLE `move`
  ADD PRIMARY KEY (`m_seq`);

--
-- 資料表索引 `pp`
--
ALTER TABLE `pp`
  ADD PRIMARY KEY (`p_seq`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `ding_log`
--
ALTER TABLE `ding_log`
  MODIFY `d_l_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表 AUTO_INCREMENT `move`
--
ALTER TABLE `move`
  MODIFY `m_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表 AUTO_INCREMENT `pp`
--
ALTER TABLE `pp`
  MODIFY `p_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
