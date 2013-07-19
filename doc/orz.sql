-- phpMyAdmin SQL Dump
-- version 3.4.8
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 07 月 19 日 23:27
-- 服务器版本: 5.5.28
-- PHP 版本: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `orz`
--

-- --------------------------------------------------------

--
-- 表的结构 `channel`
--

CREATE TABLE IF NOT EXISTS `channel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `alias` char(100) NOT NULL,
  `description` text NOT NULL,
  `type` tinyint(4) NOT NULL,
  `dateline` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `channel`
--

INSERT INTO `channel` (`id`, `name`, `alias`, `description`, `type`, `dateline`) VALUES
(1, 'CC', 'cc', '踩踩', 1, 0),
(2, 'dd', 'dd', '等等', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `channel_id` int(10) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `content` text,
  `link` varchar(300) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `delete_code` varchar(100) NOT NULL COMMENT '删除码，用户删除信息的时必填',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `dateline` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `channel_id`, `title`, `content`, `link`, `email`, `delete_code`, `status`, `dateline`) VALUES
(1, 0, '贵人社区送豪车，速来抢吧~', '', 'upload/2013/07/19/20/137423667592359.jpg', 'admin@exephp.com', 'asdf123456', 0, 1374236675),
(2, 1, '贵人社区送豪车，速来抢吧~', '', 'upload/2013/07/19/21/137424225394015.jpg', 'admin@exephp.com', 'asdf123456', 0, 1374242253);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
