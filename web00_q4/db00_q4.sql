-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-07-26 02:14:41
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
(9, 'sdf', 'sdgfg', 0, 0, 0, 0, 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `admin_member`
--
ALTER TABLE `admin_member`
  ADD PRIMARY KEY (`a_m_seq`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `admin_member`
--
ALTER TABLE `admin_member`
  MODIFY `a_m_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
