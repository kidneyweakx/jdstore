-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.10-MariaDB
-- PHP 版本： 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `fp`
--

-- --------------------------------------------------------

--
-- 資料表結構 `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `tree` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `category`
--

INSERT INTO `category` (`id`, `name`, `tree`) VALUES
(1, '網頁程式設計', 0),
(2, '手機程式設計', 0),
(3, '數據科學程式', 0),
(4, '遊戲開發', 0),
(5, 'HTML5', 1),
(6, 'React', 1),
(7, 'Android', 2),
(8, 'IOS', 2),
(9, '資料探索', 3),
(10, '機器學習', 3),
(11, '3D物件', 4);

-- --------------------------------------------------------

--
-- 資料表結構 `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(11) NOT NULL,
  `pic` text DEFAULT NULL,
  `c1` int(11) NOT NULL,
  `c2` int(11) NOT NULL,
  `qt` int(11) NOT NULL,
  `type` text NOT NULL,
  `text` text NOT NULL,
  `sell` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `item`
--

INSERT INTO `item` (`id`, `name`, `price`, `pic`, `c1`, `c2`, `qt`, `type`, `text`, `sell`) VALUES
(1, 'HTML+CSS前端設計', 1200, 'html5.jpg', 1, 5, 2, '前端', 'html 三週\r\ncss 兩週\r\n共15小時的課程', 1),
(2, 'Javascript', 1800, 'javascript.png', 1, 5, 18, '前後端', 'JS基本用法 2週\r\nDOM 1週\r\nNode.js 2週\r\n基本框架介紹 1週\r\n共18小時', 1),
(3, 'React', 800, 'react.png', 1, 6, 2, '前端', 'JSX基本用法 1週\r\n特色 1週\r\n生命週期 1週\r\n共3週', 1),
(4, 'Adroid', 2000, 'android.png', 2, 7, 6, 'mobile', '環境建置及hello world 1週\r\n基本用法 xml 2週\r\nfirebase 連結 3週\r\n上架 1週\r\n共7週 21小時', 1),
(5, 'ios', 3000, 'ios.jpg', 2, 8, 8, 'mobile', 'SWIFT\r\n上課前須購買mac\r\n7週學會建置上架app', 1),
(6, 'Python', 1000, 'python.png', 3, 9, 1, '資料科學', '*雙11免費*\r\n基本用法及爬蟲\r\n3週\r\n', 1),
(7, 'R', 1200, 'R.png', 3, 9, 15, '資料科學', '*雙11免費*\r\n資料科學和探索', 1),
(8, 'Unity', 650, 'unity.png', 4, 11, 7, '遊戲開發', 'Unity環境建置\r\n基本遊戲製作-當個創世神\r\nVuforia AR遊戲製作\r\nVuforia VR遊戲製作\r\n共6週 18小時課程', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `ord`
--

CREATE TABLE `ord` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `item` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `acc` text NOT NULL,
  `pw` text NOT NULL,
  `name` text NOT NULL,
  `mail` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `tt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `acc`, `pw`, `name`, `mail`, `phone`, `address`, `tt`) VALUES
(1, 'mis', '999', 'admin', 'admin@admin.com', '999', '999', '0'),
(2, 'guest', 'guest', 'guest', 'guest@guest.com', '123456', 'guest', '0');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ord`
--
ALTER TABLE `ord`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ord`
--
ALTER TABLE `ord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
