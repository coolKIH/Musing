-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-09-20 21:00:27
-- 服务器版本： 5.7.15-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WebDb`
--

-- --------------------------------------------------------

--
-- 表的结构 `Discuss`
--

CREATE TABLE `Discuss` (
  `d_id` bigint(20) NOT NULL,
  `d_content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `Discuss`
--

INSERT INTO `Discuss` (`d_id`, `d_content`) VALUES
(1, 'yes'),
(2, 'Good!'),
(3, 'I don\'t know why\r\nBut it seems that\r\ni cannot store the content\r\nwhy??why????\r\nwhy??'),
(4, 'I don\'t know why\r\nBut it seems that\r\ni cannot store the content\r\nwhy??why????\r\nwhy??'),
(5, 'don\'t be\r\nhe said "Yes"!'),
(6, '\'\'\'\'\'\'\'\'\'\'\'\'\'\'\''),
(7, 'no\\no');

-- --------------------------------------------------------

--
-- 表的结构 `PND`
--

CREATE TABLE `PND` (
  `p_id` bigint(20) NOT NULL,
  `d_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `PND`
--

INSERT INTO `PND` (`p_id`, `d_id`) VALUES
(1, 0),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7);

-- --------------------------------------------------------

--
-- 表的结构 `Post`
--

CREATE TABLE `Post` (
  `p_id` bigint(20) NOT NULL,
  `p_title` text NOT NULL,
  `p_detail` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `Post`
--

INSERT INTO `Post` (`p_id`, `p_title`, `p_detail`) VALUES
(1, 'Yes', 'This is my first post!'),
(2, 'ff', 'ff'),
(3, 'hh', 'fg'),
(4, 'ff', 'sss\r\nsss\r\nss\r\ns\r\ns\r\ns\r\ns\r\nsss'),
(5, 'Hello!', 'This is my first post\r\nso..'),
(7, 'ff', 'ff'),
(9, 'fff', 'I dont know why\r\nBut it seems that\r\ni cannot store the content\r\nwhy??why????\r\nwhy??'),
(10, '发发发', 'I dont know why\r\nBut it seems that\r\ni cannot store the content\r\nwhy??why????\r\nwhy??'),
(11, 'Yes', 'i don\'t like it');

-- --------------------------------------------------------

--
-- 表的结构 `UND`
--

CREATE TABLE `UND` (
  `user_name` varchar(30) NOT NULL,
  `d_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `UND`
--

INSERT INTO `UND` (`user_name`, `d_id`) VALUES
('小明', 0),
('小明', 1),
('小明', 2),
('小明', 3),
('小明', 4),
('小明', 5),
('小明', 6),
('小明', 7);

-- --------------------------------------------------------

--
-- 表的结构 `UNP`
--

CREATE TABLE `UNP` (
  `user_name` varchar(30) NOT NULL,
  `p_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `UNP`
--

INSERT INTO `UNP` (`user_name`, `p_id`) VALUES
('小明', 1),
('小明', 2),
('小明', 3),
('小明', 4),
('小明', 5),
('小明', 7),
('小明', 9),
('小明', 10),
('小明', 11);

-- --------------------------------------------------------

--
-- 表的结构 `Web_user`
--

CREATE TABLE `Web_user` (
  `user_name` varchar(30) NOT NULL,
  `user_pwd` varchar(100) NOT NULL,
  `user_mail` varchar(30) NOT NULL,
  `user_gender` enum('m','f') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `Web_user`
--

INSERT INTO `Web_user` (`user_name`, `user_pwd`, `user_mail`, `user_gender`) VALUES
('Yellow Hao', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'hao2@gmail.com', 'm'),
('小明', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'hao@gmail.com', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Discuss`
--
ALTER TABLE `Discuss`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `PND`
--
ALTER TABLE `PND`
  ADD UNIQUE KEY `p_id` (`p_id`,`d_id`);

--
-- Indexes for table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `UND`
--
ALTER TABLE `UND`
  ADD UNIQUE KEY `user_name` (`user_name`,`d_id`);

--
-- Indexes for table `UNP`
--
ALTER TABLE `UNP`
  ADD UNIQUE KEY `user_name` (`user_name`,`p_id`);

--
-- Indexes for table `Web_user`
--
ALTER TABLE `Web_user`
  ADD PRIMARY KEY (`user_name`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `Discuss`
--
ALTER TABLE `Discuss`
  MODIFY `d_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `Post`
--
ALTER TABLE `Post`
  MODIFY `p_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
