-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-07-17 02:26:43
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
(1, 'admin', '1234', 9),
(7, 'xx', 'aa', 0);

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
(11, '20180710070355.swf', 0),
(12, '20180710070359.swf', 0),
(13, '20180710071046.gif', 1),
(14, '20180710071050.gif', 1),
(15, '20180710071056.swf', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `a_1_6_pic`
--

CREATE TABLE `a_1_6_pic` (
  `a_1_5_m_p_seq` int(10) UNSIGNED NOT NULL,
  `a_1_5_m_p_pic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_1_5_m_p_look` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `a_1_6_pic`
--

INSERT INTO `a_1_6_pic` (`a_1_5_m_p_seq`, `a_1_5_m_p_pic`, `a_1_5_m_p_look`) VALUES
(1, '20180712043914.jpg', 1),
(2, '20180712044358.jpg', 0),
(3, '20180712044406.jpg', 1),
(4, '20180712044412.jpg', 1),
(5, '20180712044421.jpg', 1),
(6, '20180712044427.jpg', 1),
(7, '20180712044447.jpg', 0),
(8, '20180712044455.jpg', 1);

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
(1, 23);

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
(1, '(╯°▽°)╯ ┻━┻');

-- --------------------------------------------------------

--
-- 資料表結構 `a_1_9_news`
--

CREATE TABLE `a_1_9_news` (
  `a_1_4_m_seq` int(10) UNSIGNED NOT NULL,
  `a_1_4_m_word` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_1_4_m_look` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `a_1_9_news`
--

INSERT INTO `a_1_9_news` (`a_1_4_m_seq`, `a_1_4_m_word`, `a_1_4_m_look`) VALUES
(5, '教師研習「世界公民生命園丁國內研習會」\r\n1.主辦單位：世界展望會\r\n2.研習日期：101年11月14日（三）～15日（四）\r\n3.詳情請參考：\r\nhttp://gc.worldvision.org.tw/seed.html。\r\n請線上報名。                                            ', 1),
(6, '公告綜合高中一年級英數補救教學時間\r\n上課日期:10/27.11/3.11/10.11/24共計四次\r\n上課時間:早上8:00~11:50半天\r\n費用:全程免費\r\n參加同學:綜合科一年級第一次段考成績需加強者\r\n已將名單送交各班及導師\r\n參加同學請帶紙筆.課本.第一次段考考卷\r\n並將家長通知單給家長\r\n若有任何疑問\r\n請洽綜合高中學程主任                                            ', 1),
(7, '102年全國大專校院運動會\r\n「主題標語及吉祥物命名」\r\n網路票選活動\r\n一、活動期間：自10月25日起至11月4日止。\r\n二、相關訊息請上宜蘭大學首頁連結「102全大運在宜大」\r\n活動網址：http://102niag.niu.edu.tw/                                            ', 1),
(8, '台灣亞洲藝術文化教育交流學會第一屆年會國際研討會\r\n活動日期：101年3月3～4日(六、日)\r\n活動主題：創造力、文化、全人教育\r\n有意參加者請至http://www.caaetaiwan.org下載報名表\r\n                                            ', 1),
(9, '11月23日(星期五)將於彰化縣田尾鄉菁芳園休閒農場\r\n舉辦「高中職生涯輔導知能研習」\r\n中區學校每校至多2名\r\n以普通科、專業類科教師優先報名參加\r\n生涯規劃教師次之，參加人員公差假\r\n並核實派代課\r\n當天還有專車接送(8:35前在員林火車站集合)\r\n如此好康的機會，怎能錯過？！\r\n熱烈邀請師長們向輔導室(分機234)報名\r\n名額有限，動作要快！！\r\n報名截止日期：本周四 10月25日17:00前！                                            ', 1),
(10, '台視百萬大明星節目辦理海選活動\r\n時間:101年10月27日下午13時\r\n地點:彰化                                                          ', 0),
(12, '財團法人漢光教育基金會\r\n辦理2012「舊愛新歡-古典詩詞譜曲創作暨歌唱表演競賽」\r\n參賽獎金豐厚!!\r\n                                                ', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `a_1_12_1`
--

CREATE TABLE `a_1_12_1` (
  `a_1_12_1_seq` int(10) UNSIGNED NOT NULL,
  `a_1_12_1_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_1_12_1_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_1_12_1_look` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `a_1_12_2`
--

CREATE TABLE `a_1_12_2` (
  `a_1_12_2_seq` int(10) UNSIGNED NOT NULL,
  `a_1_12_2_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_1_12_2_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_1_12_2_a_1_12_1` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- 資料表索引 `a_1_6_pic`
--
ALTER TABLE `a_1_6_pic`
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
-- 資料表索引 `a_1_9_news`
--
ALTER TABLE `a_1_9_news`
  ADD PRIMARY KEY (`a_1_4_m_seq`);

--
-- 資料表索引 `a_1_12_1`
--
ALTER TABLE `a_1_12_1`
  ADD PRIMARY KEY (`a_1_12_1_seq`);

--
-- 資料表索引 `a_1_12_2`
--
ALTER TABLE `a_1_12_2`
  ADD PRIMARY KEY (`a_1_12_2_seq`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `a_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- 使用資料表 AUTO_INCREMENT `a_1_6_pic`
--
ALTER TABLE `a_1_6_pic`
  MODIFY `a_1_5_m_p_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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

--
-- 使用資料表 AUTO_INCREMENT `a_1_9_news`
--
ALTER TABLE `a_1_9_news`
  MODIFY `a_1_4_m_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表 AUTO_INCREMENT `a_1_12_1`
--
ALTER TABLE `a_1_12_1`
  MODIFY `a_1_12_1_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `a_1_12_2`
--
ALTER TABLE `a_1_12_2`
  MODIFY `a_1_12_2_seq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
