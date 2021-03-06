-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-08-07 04:20:29
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
-- 資料庫： `wda_4_1`
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
(1, 'admin', '1234', '11111', '999'),
(9, 'aaa', 'aaa', '10111', '1'),
(11, 'bbb', 'bbb', '00000', '1'),
(12, 'bbb', 'bbb', '00000', '1'),
(13, 'ccc', 'ccc', '00000', '1');

-- --------------------------------------------------------

--
-- 資料表結構 `footer`
--

CREATE TABLE `footer` (
  `footer` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `footer`
--

INSERT INTO `footer` (`footer`) VALUES
('1111rty');

-- --------------------------------------------------------

--
-- 資料表結構 `p_cat`
--

CREATE TABLE `p_cat` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `p_cat`
--

INSERT INTO `p_cat` (`id`, `name`, `parent`) VALUES
(1, '流行皮件', 0),
(2, '流行鞋區', 0),
(3, '流行飾品', 0),
(4, '背包', 0),
(5, '男用皮件', 1),
(6, '女用皮件', 1),
(7, '少女鞋區', 2),
(8, '紳士流行鞋區', 2),
(9, '時尚手錶', 3),
(10, '時尚珠寶', 3),
(11, '背包', 4),
(29, '123', 4),
(30, 'ppp', 1),
(31, '123', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `p_item`
--

CREATE TABLE `p_item` (
  `id` int(11) UNSIGNED NOT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qt` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `p_item`
--

INSERT INTO `p_item` (`id`, `c1`, `c2`, `no`, `name`, `type`, `qt`, `price`, `info`, `img`, `sell`) VALUES
(1, 1, 5, '000001', '手工訂製長夾', '全牛皮', 2, 1200, '手工製作長夾卡片層6*2 鈔票層 *2 零錢拉鍊層 *1 \r\n採用愛馬仕相同的雙針縫法,皮件堅固耐用不脫線 \r\n材質:直革鞣(馬鞍皮)牛皮製作  \r\n手工染色 ', '0403.jpg', 1),
(2, 1, 5, '000002', '兩用式磁扣腰包', '中型', 18, 685, '材質:進口牛皮\r\n顏色:黑色荔枝紋+黑色珠光面皮(黑色縫線)\r\n尺寸:15cm*14cm(高)*6cm(前後)\r\n產地:臺灣', '0404.jpg', 1),
(3, 1, 5, '000003', '超薄設計男士長款真皮', 'L號', 61, 800, '基本:編織皮革對摺長款零錢包\r\n特色:最潮流最時尚的單品 \r\n顏色:黑色珠光面皮(黑色縫線)\r\n形狀:黑白格編織皮革對摺 ', '0405.jpg', 1),
(4, 2, 7, '000004', '經典牛皮少女帆船鞋', 'S號', 6, 1000, '以傳統學院派風格聞名，創始近百年工藝製鞋精神\r\n共用獨家專利氣墊技術，兼具紐約工藝精神，與舒適跑格靈魂\r\n', '0406.jpg', 1),
(5, 2, 8, '000005', '經典優雅時尚流行涼鞋', 'LL', 8, 2650, '優雅流線方型楦頭設計，結合簡潔線條綴飾，\r\n獨特的弧度與曲線美，突顯年輕優雅品味，\r\n是年輕上班族不可或缺的鞋款！\r\n全新美國運回，現貨附鞋盒', '0407.jpg', 1),
(6, 3, 10, '000006', '寵愛天然藍寶女戒', '1克拉', 1, 28000, '◎典雅設計品味款\r\n◎藍寶為珍貴天然寶石之一，具有保值收藏\r\n◎專人設計製造，以貴重珠寶精緻鑲工製造', '0408.jpg', 1),
(7, 4, 11, '000007', '反折式大容量手提肩背包\r\n', 'L號', 15, 888, '特色:反折式的包口設計,釘釦的裝飾,讓簡單的包型更增添趣味性\r\n材質:棉布\r\n顏色:藍色\r\n尺寸:長50cm寬20cm高41cm\r\n產地:日本\r\n', '0409.jpg', 1),
(8, 4, 11, '000008', '男單肩包男', '多功能', 7, 650, '特色:男單肩包/電腦包/公文包/雙肩背包多用途\r\n材質:帆不\r\n顏色:黑色\r\n尺寸:深11cm寬42cm高33cm\r\n產地:香港\r\n', '0410.jpg', 1),
(10, 1, 5, '122435', '1111', '1111', 1111, 1111, '1111', '1533138967.jpg', 1),
(11, 4, 11, '122505', 'aaa', 'aaa', 0, 0, 'aaa', '122505.jpg', 0),
(12, 2, 8, '132768', 'asd213', 'asd', 123, 123, 'asd32132154', '1533172317.jpg', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `p_order`
--

CREATE TABLE `p_order` (
  `id` int(11) UNSIGNED NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` int(11) NOT NULL,
  `p_item` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_qt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`id`, `acc`, `pw`, `name`, `tel`, `address`, `mail`, `created`) VALUES
(1, 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', ''),
(2, 'bbb', 'bbb', 'bbb', 'bbb', 'bbb', 'bbb', '2018/07/29 23:23:39'),
(3, 'ccc', 'ccc', 'ccc', 'ccc', 'ccc', 'ccc', '2018/07/29 23:30:54'),
(4, 'ddd', 'ddd', 'ddd', 'ddd', 'ddd', 'ddd', '2018/07/29 23:31:57'),
(5, 'eee', 'eee', 'eee', 'eee', 'eee', 'eee', '2018/07/29 23:33:29'),
(6, 'fff', 'fff', 'fff', 'fff', 'fff', 'fff', '2018/07/29 23:34:35'),
(7, '123', '123', '123', '123', '123', '123', '2018/08/02 09:39:40');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `p_cat`
--
ALTER TABLE `p_cat`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `p_order`
--
ALTER TABLE `p_order`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表 AUTO_INCREMENT `p_cat`
--
ALTER TABLE `p_cat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- 使用資料表 AUTO_INCREMENT `p_item`
--
ALTER TABLE `p_item`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表 AUTO_INCREMENT `p_order`
--
ALTER TABLE `p_order`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
