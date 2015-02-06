CREATE TABLE `userinfo` (
  `serial` int(5) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `addr` varchar(20) DEFAULT NULL,
  `post` varchar(30) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `createtime` datetime NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `card` (
  `serial` int(5) NOT NULL AUTO_INCREMENT,
  `cardno` varchar(20) NOT NULL,
  `cardpsd` varchar(20) NOT NULL,
  `balance` float NOT NULL,
  `cardlevel` varchar(20) DEFAULT NULL,
  `cardstatus` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

set names gbk;insert into card (cardno,cardpsd,balance,cardlevel,cardstatus) values (62853966,333333,100,'普通卡','Y'),(62852966,222222,500,'银卡','Y'),(62851966,111111,1000,'金卡','Y'),(62850966,000000,10000,'钻石卡','Y');

CREATE TABLE `usercard` (
  `serial` int(5) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL,
  `cardno` varchar(20) NOT NULL,
	PRIMARY KEY (`serial`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
