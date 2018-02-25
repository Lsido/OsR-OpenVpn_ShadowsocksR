-- phpMyAdmin SQL Dump
-- version 4.0.10.15
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017-02-20 01:39:57
-- 服务器版本: 5.5.52-MariaDB
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


-- --------------------------------------------------------

--
-- 表的结构 `alive_ip`
--

CREATE TABLE IF NOT EXISTS `alive_ip` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nodeid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `ip` text NOT NULL,
  `datetime` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

-- --------------------------------------------------------

--
-- 表的结构 `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `content` longtext NOT NULL,
  `markdown` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `auto`
--

CREATE TABLE IF NOT EXISTS `auto` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `value` longtext NOT NULL,
  `sign` longtext NOT NULL,
  `datetime` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `blockip`
--

CREATE TABLE IF NOT EXISTS `blockip` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nodeid` int(11) NOT NULL,
  `ip` text NOT NULL,
  `datetime` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bought`
--

CREATE TABLE IF NOT EXISTS `bought` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) NOT NULL,
  `shopid` bigint(20) NOT NULL,
  `datetime` bigint(20) NOT NULL,
  `renew` bigint(11) NOT NULL,
  `coupon` text NOT NULL,
  `price` decimal(12,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `code`
--

CREATE TABLE IF NOT EXISTS `code` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` text NOT NULL,
  `type` int(11) NOT NULL,
  `number` decimal(11,2) NOT NULL,
  `isused` int(11) NOT NULL DEFAULT '0',
  `userid` bigint(20) NOT NULL,
  `usedatetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` text NOT NULL,
  `onetime` int(11) NOT NULL,
  `expire` bigint(20) NOT NULL,
  `shop` text NOT NULL,
  `credit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `detect_list`
--

CREATE TABLE IF NOT EXISTS `detect_list` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  `text` longtext NOT NULL,
  `regex` longtext NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `detect_log`
--

CREATE TABLE IF NOT EXISTS `detect_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `list_id` bigint(20) NOT NULL,
  `datetime` bigint(20) NOT NULL,
  `node_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `disconnect_ip`
--

CREATE TABLE IF NOT EXISTS `disconnect_ip` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) NOT NULL,
  `ip` text NOT NULL,
  `datetime` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `email_verify`
--

CREATE TABLE IF NOT EXISTS `email_verify` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `ip` text NOT NULL,
  `code` text NOT NULL,
  `expire_in` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `address` text NOT NULL,
  `port` int(11) NOT NULL,
  `token` text NOT NULL,
  `ios` int(11) NOT NULL DEFAULT '0',
  `userid` bigint(20) NOT NULL,
  `isp` text,
  `geo` int(11) DEFAULT NULL,
  `method` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `link`
--

INSERT INTO `link` (`id`, `type`, `address`, `port`, `token`, `ios`, `userid`, `isp`, `geo`, `method`) VALUES
(1, -1, 'smart', 0, 'Ks1IGRNknvflsI6a', 1, 1, NULL, 0, 'smart'),
(2, 9, 'smart', 0, '7T09IDrQXpR15nVt', 0, 1, NULL, 0, 'smart'),
(3, 10, '', 0, 'lhYx7g8iWU1RYoiH', 0, 1, NULL, 0, ''),
(4, 10, '', 0, 'R41DalEHGDwAWklF', 0, 1, NULL, 1, ''),
(5, -1, 'smart', 0, 'ysGcIVSq45cfngmo', 1, 2, NULL, 0, 'smart'),
(6, 9, 'smart', 0, 'PmuW3fCVE8Tztee8', 0, 2, NULL, 0, 'smart'),
(7, 10, '', 0, 'yUxOvDoNx5uaxv3j', 0, 2, NULL, 0, ''),
(8, 10, '', 0, 't1nMpx7FvqMShNu0', 0, 2, NULL, 1, ''),
(9, 0, '8080', 18474, 'GE7MKT72gZgbGkyi', 1, 1, NULL, 0, 'aes-256-cfb'),
(10, 0, '8080', 18474, 'dKRBgJeyrgaJfOXe', 1, 1, NULL, 1, 'aes-256-cfb'),
(11, 0, '8080', 8080, 'ZbTnX0QtblTZHDTn', 1, 2, NULL, 0, 'rc4-md5'),
(12, 0, '8080', 8080, 'wR31OZdy7y6qeDhx', 1, 2, NULL, 1, 'rc4-md5'),
(13, -1, 'smart', 0, '1lGNIjtfHb9OUnHJ', 1, 3, NULL, 0, 'smart'),
(14, 9, 'smart', 0, 'hGwOsp296so5h6fw', 0, 3, NULL, 0, 'smart'),
(15, 10, '', 0, '5Jmr552G1A7A8r5K', 0, 3, NULL, 0, ''),
(16, 10, '', 0, 'Qmaa6aAUFa1ZqRYg', 0, 3, NULL, 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `llpaynum`
--

CREATE TABLE IF NOT EXISTS `llpaynum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `llvalue` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lltian` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `i` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- 表的结构 `login_ip`
--

CREATE TABLE IF NOT EXISTS `login_ip` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) NOT NULL,
  `ip` text NOT NULL,
  `datetime` bigint(20) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- 表的结构 `openvpn`
--

CREATE TABLE IF NOT EXISTS `openvpn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iuser` varchar(16) NOT NULL,
  `isent` bigint(128) DEFAULT '0',
  `irecv` bigint(128) DEFAULT '0',
  `maxll` bigint(128) NOT NULL,
  `pass` varchar(18) NOT NULL,
  `i` int(1) NOT NULL,
  `starttime` varchar(30) DEFAULT NULL,
  `endtime` int(11) DEFAULT '0',
  `dlid` int(11) DEFAULT NULL,
  `fwqid` int(11) DEFAULT '1',
  `notes` varchar(255) DEFAULT NULL,
  `tian` int(11) NOT NULL COMMENT 'mlhtml.cn',
  `user_name` varchar(200) NOT NULL,
  `bill_id` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `iuser` (`iuser`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- 表的结构 `payback`
--

CREATE TABLE IF NOT EXISTS `payback` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `total` decimal(12,2) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `ref_by` bigint(20) NOT NULL,
  `ref_get` decimal(12,2) NOT NULL,
  `datetime` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `paylist`
--

CREATE TABLE IF NOT EXISTS `paylist` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `tradeno` text,
  `datetime` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `radius_ban`
--

CREATE TABLE IF NOT EXISTS `radius_ban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `relay`
--

CREATE TABLE IF NOT EXISTS `relay` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `source_node_id` bigint(20) NOT NULL,
  `dist_node_id` bigint(20) NOT NULL,
  `dist_ip` text NOT NULL,
  `port` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `content` text NOT NULL,
  `auto_renew` int(11) NOT NULL,
  `auto_reset_bandwidth` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `speedtest`
--

CREATE TABLE IF NOT EXISTS `speedtest` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nodeid` int(11) NOT NULL,
  `datetime` bigint(20) NOT NULL,
  `telecomping` text NOT NULL,
  `telecomeupload` text NOT NULL,
  `telecomedownload` text NOT NULL,
  `unicomping` text NOT NULL,
  `unicomupload` text NOT NULL,
  `unicomdownload` text NOT NULL,
  `cmccping` text NOT NULL,
  `cmccupload` text NOT NULL,
  `cmccdownload` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `speedtest`
--

INSERT INTO `speedtest` (`id`, `nodeid`, `datetime`, `telecomping`, `telecomeupload`, `telecomedownload`, `unicomping`, `unicomupload`, `unicomdownload`, `cmccping`, `cmccupload`, `cmccdownload`) VALUES
(1, 1, 1486654410, '11.594 ms', '321.2 Mbit/s', '33.05 Mbit/s', '9.767 ms', '560.98 Mbit/s', '35.16 Mbit/s', '9.767 ms', '285.21 Mbit/s', '33.48 Mbit/s'),
(2, 1, 1486655323, '7.046 ms', '326.94 Mbit/s', '33.67 Mbit/s', '11.571 ms', '526.59 Mbit/s', '35.34 Mbit/s', '11.571 ms', '325.28 Mbit/s', '34.76 Mbit/s'),
(3, 1, 1487025843, '16.16 ms', '403.7 Mbit/s', '34.67 Mbit/s', '9.313 ms', '384.11 Mbit/s', '34.6 Mbit/s', '9.313 ms', '307.03 Mbit/s', '30.06 Mbit/s'),
(4, 1, 1487030697, '12.546 ms', '465.03 Mbit/s', '25.87 Mbit/s', '12.629 ms', '510.8 Mbit/s', '34.62 Mbit/s', '12.629 ms', '285.79 Mbit/s', '34.54 Mbit/s');

-- --------------------------------------------------------

--
-- 表的结构 `ss_invite_code`
--

CREATE TABLE IF NOT EXISTS `ss_invite_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '2016-06-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ss_node`
--

CREATE TABLE IF NOT EXISTS `ss_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `type` int(3) NOT NULL,
  `server` varchar(128) NOT NULL,
  `method` varchar(64) NOT NULL,
  `info` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `sort` int(3) NOT NULL,
  `custom_method` tinyint(1) NOT NULL DEFAULT '0',
  `traffic_rate` float NOT NULL DEFAULT '1',
  `node_class` int(11) NOT NULL DEFAULT '0',
  `node_speedlimit` decimal(12,2) NOT NULL DEFAULT '0.00',
  `node_connector` int(11) NOT NULL DEFAULT '0',
  `node_bandwidth` bigint(20) NOT NULL DEFAULT '0',
  `node_bandwidth_limit` bigint(20) NOT NULL DEFAULT '0',
  `bandwidthlimit_resetday` int(11) NOT NULL DEFAULT '0',
  `node_heartbeat` bigint(20) NOT NULL DEFAULT '0',
  `node_ip` text,
  `node_group` int(11) NOT NULL DEFAULT '0',
  `custom_rss` int(11) NOT NULL DEFAULT '0',
  `mu_only` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ss_node`
--

INSERT INTO `ss_node` (`id`, `name`, `type`, `server`, `method`, `info`, `status`, `sort`, `custom_method`, `traffic_rate`, `node_class`, `node_speedlimit`, `node_connector`, `node_bandwidth`, `node_bandwidth_limit`, `bandwidthlimit_resetday`, `node_heartbeat`, `node_ip`, `node_group`, `custom_rss`, `mu_only`) VALUES
(1, '统一验证登陆', 0, 'zhaojin97.cn', 'radius', '统一登陆验证', '可用', 999, 0, 1, 0, '0.00', 0, 201756872, 0, 0, 1487525965, '', 0, 0, 0),
(2, 'VPN 统一流量结算', 0, 'zhaojin97.cn', 'radius', 'VPN 统一流量结算', '可用', 999, 0, 1, 0, '0.00', 0, 0, 0, 0, 0, NULL, 0, 0, 0),
(3, '18474 - ssr', 1, '18474', 'aes-256-cfb', '1123123', '启用', 9, 1, 1, 0, '0.00', 0, 0, 0, 0, 0, '', 0, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ss_node_info`
--

CREATE TABLE IF NOT EXISTS `ss_node_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `node_id` int(11) NOT NULL,
  `uptime` float NOT NULL,
  `load` varchar(32) NOT NULL,
  `log_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=293 ;

--
-- 转存表中的数据 `ss_node_info`
--

INSERT INTO `ss_node_info` (`id`, `node_id`, `uptime`, `load`, `log_time`) VALUES
(264, 1, 5263.18, '1.37 0.73 0.3', 1487525218),
(265, 1, 5268.26, '1.26 0.71 0.3', 1487525223),
(266, 1, 5278.7, '1.07 0.69 0.3', 1487525233),
(267, 1, 5278.7, '1.07 0.69 0.3', 1487525233),
(268, 1, 5289.97, '0.90 0.67 0.3', 1487525245),
(269, 1, 5338.71, '0.39 0.56 0.3', 1487525293),
(270, 1, 5349.97, '0.33 0.55 0.3', 1487525305),
(271, 1, 5398.72, '0.14 0.46 0.3', 1487525353),
(272, 1, 5409.98, '0.12 0.45 0.3', 1487525365),
(273, 1, 5458.73, '0.05 0.38 0.2', 1487525413),
(274, 1, 5469.99, '0.04 0.37 0.2', 1487525425),
(275, 1, 5518.74, '0.02 0.31 0.2', 1487525473),
(276, 1, 5530, '0.02 0.30 0.2', 1487525485),
(277, 1, 5578.75, '0.01 0.25 0.2', 1487525533),
(278, 1, 5590.01, '0.01 0.24 0.2', 1487525545),
(279, 1, 5638.75, '0.00 0.21 0.2', 1487525593),
(280, 1, 5650.02, '0.00 0.20 0.2', 1487525605),
(281, 1, 5698.76, '0.00 0.17 0.2', 1487525653),
(282, 1, 5710.02, '0.00 0.16 0.2', 1487525665),
(283, 1, 5758.77, '0.00 0.14 0.2', 1487525713),
(284, 1, 5770.03, '0.00 0.13 0.2', 1487525725),
(285, 1, 5818.78, '0.00 0.11 0.2', 1487525773),
(286, 1, 5830.04, '0.00 0.11 0.2', 1487525785),
(287, 1, 5878.79, '0.00 0.09 0.1', 1487525833),
(288, 1, 5890.05, '0.00 0.09 0.1', 1487525845),
(289, 1, 5938.8, '0.04 0.09 0.1', 1487525893),
(290, 1, 5950.06, '0.03 0.09 0.1', 1487525905),
(291, 1, 5998.8, '0.01 0.07 0.1', 1487525953),
(292, 1, 6010.07, '0.01 0.07 0.1', 1487525965);

-- --------------------------------------------------------

--
-- 表的结构 `ss_node_online_log`
--

CREATE TABLE IF NOT EXISTS `ss_node_online_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `node_id` int(11) NOT NULL,
  `online_user` int(11) NOT NULL,
  `log_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=293 ;

--
-- 转存表中的数据 `ss_node_online_log`
--

INSERT INTO `ss_node_online_log` (`id`, `node_id`, `online_user`, `log_time`) VALUES
(264, 1, 0, 1487525218),
(265, 1, 0, 1487525223),
(266, 1, 0, 1487525233),
(267, 1, 0, 1487525233),
(268, 1, 0, 1487525245),
(269, 1, 0, 1487525293),
(270, 1, 0, 1487525305),
(271, 1, 0, 1487525353),
(272, 1, 0, 1487525365),
(273, 1, 0, 1487525413),
(274, 1, 0, 1487525425),
(275, 1, 0, 1487525473),
(276, 1, 0, 1487525485),
(277, 1, 0, 1487525533),
(278, 1, 0, 1487525545),
(279, 1, 0, 1487525593),
(280, 1, 0, 1487525605),
(281, 1, 0, 1487525653),
(282, 1, 0, 1487525665),
(283, 1, 0, 1487525713),
(284, 1, 0, 1487525725),
(285, 1, 0, 1487525773),
(286, 1, 0, 1487525785),
(287, 1, 0, 1487525833),
(288, 1, 0, 1487525845),
(289, 1, 0, 1487525893),
(290, 1, 0, 1487525905),
(291, 1, 0, 1487525953),
(292, 1, 0, 1487525965);

-- --------------------------------------------------------

--
-- 表的结构 `ss_password_reset`
--

CREATE TABLE IF NOT EXISTS `ss_password_reset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(32) NOT NULL,
  `token` varchar(128) NOT NULL,
  `init_time` int(11) NOT NULL,
  `expire_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `telegram_session`
--

CREATE TABLE IF NOT EXISTS `telegram_session` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `type` int(11) NOT NULL,
  `session_content` text NOT NULL,
  `datetime` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `telegram_session`
--

INSERT INTO `telegram_session` (`id`, `user_id`, `type`, `session_content`, `datetime`) VALUES
(1, 1, 0, 'wQBwdkKHngow8Mz1', 1486651903),
(2, 2, 0, '9JoSdyv2aFoGqiCI', 1486653704);

-- --------------------------------------------------------

--
-- 表的结构 `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` longtext NOT NULL,
  `content` longtext NOT NULL,
  `rootid` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `datetime` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `unblockip`
--

CREATE TABLE IF NOT EXISTS `unblockip` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip` text NOT NULL,
  `datetime` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `passwd` varchar(16) NOT NULL,
  `t` int(11) NOT NULL DEFAULT '0',
  `u` bigint(20) NOT NULL,
  `d` bigint(20) NOT NULL,
  `plan` varchar(2) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'A',
  `transfer_enable` bigint(20) NOT NULL,
  `port` int(11) NOT NULL,
  `switch` tinyint(4) NOT NULL DEFAULT '1',
  `enable` tinyint(4) NOT NULL DEFAULT '1',
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `last_get_gift_time` int(11) NOT NULL DEFAULT '0',
  `last_check_in_time` int(11) NOT NULL DEFAULT '0',
  `last_rest_pass_time` int(11) NOT NULL DEFAULT '0',
  `reg_date` datetime NOT NULL,
  `invite_num` int(8) NOT NULL,
  `money` decimal(12,2) NOT NULL,
  `ref_by` int(11) NOT NULL DEFAULT '0',
  `expire_time` int(11) NOT NULL DEFAULT '0',
  `method` varchar(64) NOT NULL DEFAULT 'rc4-md5',
  `is_email_verify` tinyint(4) NOT NULL DEFAULT '0',
  `reg_ip` varchar(128) NOT NULL DEFAULT '127.0.0.1',
  `node_speedlimit` decimal(12,2) NOT NULL DEFAULT '0.00',
  `node_connector` int(11) NOT NULL DEFAULT '0',
  `is_admin` int(2) NOT NULL DEFAULT '0',
  `im_type` int(11) DEFAULT '1',
  `im_value` text,
  `last_day_t` bigint(20) NOT NULL DEFAULT '0',
  `sendDailyMail` int(11) NOT NULL DEFAULT '1',
  `class` int(11) NOT NULL DEFAULT '0',
  `class_expire` datetime NOT NULL DEFAULT '1989-06-04 00:05:00',
  `expire_in` datetime NOT NULL DEFAULT '2099-06-04 00:05:00',
  `theme` text NOT NULL,
  `ga_token` text NOT NULL,
  `ga_enable` int(11) NOT NULL DEFAULT '0',
  `pac` longtext,
  `remark` text,
  `node_group` int(11) NOT NULL DEFAULT '0',
  `auto_reset_day` int(11) NOT NULL DEFAULT '0',
  `auto_reset_bandwidth` decimal(12,2) NOT NULL DEFAULT '0.00',
  `protocol` varchar(128) DEFAULT 'origin',
  `protocol_param` varchar(128) DEFAULT NULL,
  `obfs` varchar(128) DEFAULT 'plain',
  `obfs_param` varchar(128) DEFAULT NULL,
  `forbidden_ip` longtext,
  `forbidden_port` longtext,
  `disconnect_ip` longtext,
  `is_hide` int(11) NOT NULL DEFAULT '0',
  `is_multi_user` int(11) NOT NULL DEFAULT '0',
  `telegram_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- 表的结构 `user_token`
--

CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `expire_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user_traffic_log`
--

CREATE TABLE IF NOT EXISTS `user_traffic_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `u` int(11) NOT NULL,
  `d` int(11) NOT NULL,
  `node_id` int(11) NOT NULL,
  `rate` float NOT NULL,
  `traffic` varchar(32) NOT NULL,
  `log_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

-- --------------------------------------------------------

--
-- 表的结构 `web_admin`
--

CREATE TABLE IF NOT EXISTS `web_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `site_name` varchar(200) DEFAULT 'Html',
  `site_title` varchar(500) DEFAULT 'Html OS 流量控制系统 V2.0 - mlhtml.cn',
  `site_keyword` varchar(500) DEFAULT 'Html,Html流控,HtmlOS,openvpn,shadowsock,SSR',
  `site_desc` varchar(500) DEFAULT 'HTML,脚本免流,真正让你免流量上网的神器!IOS免流最新版,html脚本，电脑、手机免流量！',
  `site_foot` text NOT NULL,
  `smtpserver` varchar(200) NOT NULL,
  `smtpuser` varchar(200) NOT NULL,
  `smtppass` varchar(200) NOT NULL,
  `issmtp` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `web_admin`
--

INSERT INTO `web_admin` (`id`, `username`, `password`, `site_name`, `site_title`, `site_keyword`, `site_desc`, `site_foot`, `smtpserver`, `smtpuser`, `smtppass`, `issmtp`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Html', 'Html OS 流量控制系统 V2.0 - mlhtml.cn	', 'Html,Html流控,HtmlOS,openvpn,shadowsock,SSR	', 'HTML,脚本免流,真正让你免流量上网的神器!IOS免流最新版,html脚本，电脑、手机免流量！	', 'HTMLVPN | <a href="http://www.miitbeian.gov.cn/" target="_blank">蜀ICP备15025201号-1</a> <br/><h6 style="margin: 0;"><br>VPN运营团队坚决维护祖国统一并坚决拥护党的领导，提供本软件仅供学习工作和游戏使用，请勿用于非法用途。请广大用户自觉遵守当地法律。我们将积极配合当地公安机关对使用VPN进行非法活动的组织及个人进行违法行为的追溯。</h6>					', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `web_alipay`
--

CREATE TABLE IF NOT EXISTS `web_alipay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payid` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `paykey` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `isopen` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `web_alipay`
--

INSERT INTO `web_alipay` (`id`, `payid`, `paykey`, `isopen`) VALUES
(1, '0', '0', '0');

-- --------------------------------------------------------

--
-- 表的结构 `web_bill`
--

CREATE TABLE IF NOT EXISTS `web_bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `b_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `b_price` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `b_time` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `b_end_time` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `b_i` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `b_pd` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `b_tid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `attach` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `web_cart`
--

CREATE TABLE IF NOT EXISTS `web_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pd_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pd_tid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pd_price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `attach` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `web_gg`
--

CREATE TABLE IF NOT EXISTS `web_gg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `g_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `g_conetent` text COLLATE utf8_unicode_ci NOT NULL,
  `g_time` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `web_gg`
--

INSERT INTO `web_gg` (`id`, `g_name`, `g_conetent`, `g_time`) VALUES
(1, '2017 - 本站服务器已增加多台负载', '欢迎使用本站云加速服务，本站节点已增加世界各地加速节点，例如：美国 CN2 日本 德国 加拿大 法国 英国 香港 等地。\r\n\r\n国内节点已全部部署完毕！欢迎您的使用！有任何问题，请提交工单至售后部门，谢谢合作！', '20/02/2017');

-- --------------------------------------------------------

--
-- 表的结构 `web_op_node`
--

CREATE TABLE IF NOT EXISTS `web_op_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `times` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


-- --------------------------------------------------------

--
-- 表的结构 `web_paylog`
--

CREATE TABLE IF NOT EXISTS `web_paylog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ptime` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `money` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `attach` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `web_pdtype`
--

CREATE TABLE IF NOT EXISTS `web_pdtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `web_pdtype`
--

INSERT INTO `web_pdtype` (`id`, `type_name`, `type_id`) VALUES
(1, 'Ssr体验套餐', 1),
(2, 'Op免流体验套餐', 2);

-- --------------------------------------------------------

--
-- 表的结构 `web_product`
--

CREATE TABLE IF NOT EXISTS `web_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pd_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pd_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pd_price` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pd_llvalues` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pd_time` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pd_content1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pd_tid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `web_product`
--

INSERT INTO `web_product` (`id`, `pd_type`, `pd_name`, `pd_price`, `pd_llvalues`, `pd_time`, `pd_content1`, `pd_tid`) VALUES
(1, '1', '每日体验 - 1天1G', '5', '1', '1', '今日特价流量包，欲购从速！Come on！', '1'),
(2, '2', '测试卡 - 1G', '5', '1', '1', 'openvpn免流测试卡 - 今日特价', '2');

-- --------------------------------------------------------

--
-- 表的结构 `web_ss_node`
--

CREATE TABLE IF NOT EXISTS `web_ss_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `node_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `node_ip` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `node_port` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `node_parm` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `is_multi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `add_time` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `web_user`
--

CREATE TABLE IF NOT EXISTS `web_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `safeid` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `money` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `RegTime` varchar(22) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `web_word`
--

CREATE TABLE IF NOT EXISTS `web_word` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `w_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `w_user` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `w_level` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `w_relation` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `w_content` text COLLATE utf8_unicode_ci NOT NULL,
  `w_image1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `w_image2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `w_image3` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `w_image4` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `w_starttime` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `w_endtime` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `w_is_over` int(10) NOT NULL,
  `to_w_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
