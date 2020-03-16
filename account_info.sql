-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.6-MariaDB
-- PHP 版本： 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `account`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account_info`
--

CREATE TABLE `account_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `account_info`
--

INSERT INTO `account_info` (`id`, `acc`, `gender`, `name`, `birthday`, `email`, `text`) VALUES
(5, 'adf888', '1', '源源', '1973-03-09', 'ad56789', 'adf'),
(6, 'abc123', '1', '小明', '1996-08-26', 'a5555123', '1234'),
(7, 'abc567', '1', '明明', '1994-07-06', 'a1234', '1234'),
(9, 'avdadsf311', '0', '小雨', '1993-11-08', 'adf55589', '5678'),
(11, 'bbb555', '1', '小黃', '2000-02-15', '78998', '1234'),
(12, 'admmm11', '0', '如花', '1989-01-07', 'adf897', '5678555'),
(15, 'abc567', '1', '小名', '1986-05-04', 'a5555', '1234'),
(16, 'ad222', '0', '美美', '1991-06-12', '456789', 'adfsa'),
(17, 'lliian22', '1', '小王', '1990-06-20', 'dsfsd25', '5678'),
(18, 'sun2345', '1', '王王', '1980-09-27', '456yyyy', 'asdf'),
(19, 'ooo12345', '0', '妞妞', '1991-04-27', 'uuu89878', 'adf'),
(20, '1345abc', '1', '亮亮', '1981-07-24', '456555', 'dsfds');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `account_info`
--
ALTER TABLE `account_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
