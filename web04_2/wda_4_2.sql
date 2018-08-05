-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-08-05 17:47:15
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
-- 資料庫： `wda_4_2`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `permit` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `admin`
--

INSERT INTO `admin` (`id`, `acc`, `pw`, `permit`, `type`) VALUES
(1, 'admin', '1234', '111111', '999'),
(4, 'aaa', 'aaa', '01110', '1'),
(5, 'bbb12', 'bbb', '11001', '1'),
(6, 'ccc', 'ccc', '10111', '1');

-- --------------------------------------------------------

--
-- 資料表結構 `footer`
--

CREATE TABLE `footer` (
  `id` int(11) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `footer`
--

INSERT INTO `footer` (`id`, `text`) VALUES
(1, 'ss');

-- --------------------------------------------------------

--
-- 資料表結構 `p_cat`
--

CREATE TABLE `p_cat` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `p_cat`
--

INSERT INTO `p_cat` (`id`, `name`, `parent`) VALUES
(1, '流行皮件', '0'),
(2, '流行鞋區', '0'),
(3, '流行飾品', '0'),
(4, '背包', '0'),
(5, '男用皮件', '1'),
(6, '女用皮件', '1'),
(7, '少女鞋區', '2'),
(8, '紳士流行鞋區', '2'),
(9, '時尚手錶', '3'),
(10, '時尚珠寶', '3'),
(11, '背包', '4');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `p_cat`
--
ALTER TABLE `p_cat`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表 AUTO_INCREMENT `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `p_cat`
--
ALTER TABLE `p_cat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
