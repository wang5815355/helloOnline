-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 11 月 17 日 15:26
-- 服务器版本: 5.5.8
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `hello_db`
--

-- --------------------------------------------------------

--
-- 表的结构 `hello_friendapply`
--

CREATE TABLE IF NOT EXISTS `hello_friendapply` (
  `id` int(50) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `uemail1` varchar(40) NOT NULL COMMENT '被申请人email',
  `uemail2` varchar(40) NOT NULL COMMENT '申请人email',
  `uname2` varchar(20) NOT NULL COMMENT '申请人姓名',
  `ufaceimg2` varchar(40) DEFAULT NULL COMMENT '申请人头像2',
  `info` varchar(20) DEFAULT NULL COMMENT '申请备注信息',
  `status` char(1) NOT NULL COMMENT '申请信息处理状态（0,代表未处理.1,申请通过2,申请未通过）',
  `msgreadstatus` char(1) NOT NULL DEFAULT '0' COMMENT '信息查看状态（0，代表未被查看，1，代表已被查看）',
  `circleid` varchar(50) NOT NULL COMMENT '提交申请的circleid',
  `circlename` varchar(20) DEFAULT NULL COMMENT '圈子名称',
  `time` varchar(20) NOT NULL COMMENT '申请时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
-- 转存表中的数据 `hello_friendapply`
--


-- --------------------------------------------------------

--
-- 表的结构 `hello_group`
--

CREATE TABLE IF NOT EXISTS `hello_group` (
  `name` varchar(11) DEFAULT NULL COMMENT '圈子名称',
  `password` varchar(20) DEFAULT NULL COMMENT '圈子密码（可以为空，设置密码后只有知道密码的人才能加入这个圈子）',
  `count` int(20) DEFAULT NULL COMMENT '圈子总人数',
  `type` tinyint(2) DEFAULT NULL COMMENT '圈子类型',
  `createuser` varchar(50) DEFAULT NULL COMMENT '圈子创建人（email账号）',
  `createname` varchar(10) DEFAULT NULL COMMENT '创建人姓名',
  `location` int(11) DEFAULT NULL COMMENT '圈子所在地（例如公司或者学校类型的圈子）',
  `fcircle` int(11) DEFAULT NULL COMMENT '圈子所属（父圈子）',
  `time` varchar(11) DEFAULT NULL COMMENT '创建时间',
  `id` int(40) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='圈子表' AUTO_INCREMENT=0 ;

--
-- 转存表中的数据 `hello_group`
--


-- --------------------------------------------------------

--
-- 表的结构 `hello_grouprelationship`
--

CREATE TABLE IF NOT EXISTS `hello_grouprelationship` (
  `id` int(50) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `circleid` varchar(50) NOT NULL COMMENT '圈子id',
  `uemail` varchar(50) NOT NULL COMMENT '用户email',
  `uname` varchar(20) DEFAULT NULL COMMENT '用户姓名',
  `phonenumber` varchar(20) DEFAULT NULL COMMENT '用户手机号',
  `faceimg` varchar(40) DEFAULT NULL COMMENT '用户头像',
  `status` char(1) DEFAULT NULL COMMENT '圈子状态（1，为待审核状态2，加入成功，3，审核未通过）',
  `isCreater` char(1) DEFAULT NULL COMMENT '是否创始人（1,代表是创始人，空则代表不是）',
  `time` varchar(20) NOT NULL COMMENT '加入圈子时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
-- 转存表中的数据 `hello_grouprelationship`
--


-- --------------------------------------------------------

--
-- 表的结构 `hello_user`
--

CREATE TABLE IF NOT EXISTS `hello_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `uname` varchar(20) NOT NULL COMMENT '姓名',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `password` varchar(30) NOT NULL COMMENT '密码',
  `phonenumber` varchar(20) NOT NULL COMMENT '手机号',
  `faceimage` varchar(40) DEFAULT NULL COMMENT '头像图片名',
  `auth` char(1) NOT NULL DEFAULT '0' COMMENT '账号认证状态（3,未认证且非首次登陆0,未认证首次登陆1,已邮箱认证，且首次登陆。2,已认证且非首次登陆）',
  `regtime` char(15) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户注册表' AUTO_INCREMENT=0 ;

--
-- 转存表中的数据 `hello_user`
--


-- --------------------------------------------------------

--
-- 表的结构 `hello_userrelationship`
--

CREATE TABLE IF NOT EXISTS `hello_userrelationship` (
  `id` int(50) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `uemail1` varchar(40) NOT NULL COMMENT '用户1id',
  `uname1` varchar(20) NOT NULL COMMENT '用户1姓名',
  `uphonenumber1` varchar(20) NOT NULL COMMENT '用户1电话号码',
  `faceimage1` varchar(40) DEFAULT NULL COMMENT '用户头像',
  `uemail2` varchar(40) NOT NULL COMMENT '用户2id',
  `uname2` varchar(20) NOT NULL COMMENT '用户2姓名',
  `uphonenumber2` varchar(20) NOT NULL COMMENT '用户2电话号码',
  `faceimage2` varchar(40) DEFAULT NULL COMMENT '用户头像',
  `time` varchar(20) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='好友关系表' AUTO_INCREMENT=0 ;

--
-- 转存表中的数据 `hello_userrelationship`
--

