CREATE TABLE IF NOT EXISTS `hello_grouprelationship` (
  `id` int(50) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `circleid` varchar(50) NOT NULL COMMENT '圈子id',
  `uemail` varchar(50) NOT NULL COMMENT '用户email',
  `time` varchar(20) NOT NULL COMMENT '加入圈子时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
