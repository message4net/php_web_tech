<?php
	include("sys_conf.inc");
	$connection=@mysql_connect($DBHOST,$DBUSER,$DBPWD) or die ("无法连接数据库!");
	@mysql_query("set name 'gb2312'");//设置字符集，防止中文显示乱码
	@mysql_select_db($DBNAME) or die("无法选择数据库!");
	$query="select count(*) from userinfo";//查询用户信息
	$result=@mysql_query($query,$connection) or die ("数据请求失败1！");
	var_dump($result);
?>