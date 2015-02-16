<?php
	session_start();
	require_once("sys_conf.inc");//连接数据库
	$user=$_SESSION["user_name"];
	$link_id=mysql_connect($DBHOST,$DBUSER,$DBPWD) or die("无法连接数据库");
	@mysql_query("set names 'gb2312'");
	mysql_select_db($DBNAME) or die("无法选择数据库");//选择数据库
	$sql="update user set is_online='0' where name='$user'";//更新用户的在线属性
	$result=mysql_query($sql,$link_id) or die("查询数据库失败");//执行查询
	mysql_close($link_id);//关闭数据库
	session_destroy();//销毁本次会话(回收会话数组空间)
	echo "<meta http-equiv='Refresh' content='0;url=chatindex.php'>";
?>