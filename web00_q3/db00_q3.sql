-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-08-15 09:25:07
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
(21, 11, '2018-08-17', 3, 3, '201808170001', 1),
(22, 11, '2018-08-17', 5, 14, '201808170002', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `look_pic`
--

CREATE TABLE `look_pic` (
  `l_p_seq` int(10) UNSIGNED NOT NULL,
  `l_p_look` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `look_pic`
--

INSERT INTO `look_pic` (`l_p_seq`, `l_p_look`) VALUES
(1, 1);

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
-- 資料表的匯出資料 `pp`
--

INSERT INTO `pp` (`p_seq`, `p_name`, `p_pic`, `p_look`, `p_desc`) VALUES
(1, 'a1', '20180814152104.jpg', 1, 0),
(2, 'a2', '20180814152110.jpg', 1, 0),
(3, 'a3', '20180814152114.jpg', 1, 0),
(4, 'a4', '20180814152124.jpg', 1, 0),
(5, 'a5', '20180814152131.jpg', 1, 0),
(6, 'a6', '20180814152140.jpg', 1, 0),
(7, 'a7', '20180814152146.jpg', 1, 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `ding_log`
--
ALTER TABLE `ding_log`
  ADD PRIMARY KEY (`d_l_seq`);

--
-- 資料表索引 `look_pic`
--
ALTER TABLE `look_pic`
  ADD PRIMARY KEY (`l_p_seq`);

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
  MODIFY `d_l_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用資料表 AUTO_INCREMENT `look_pic`
--
ALTER TABLE `look_pic`
  MODIFY `l_p_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `move`
--
ALTER TABLE `move`
  MODIFY `m_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表 AUTO_INCREMENT `pp`
--
ALTER TABLE `pp`
  MODIFY `p_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
