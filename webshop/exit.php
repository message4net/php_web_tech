<?php
	$userIP=$_SERVER[REMOTE_ADDR];//获取用户的ip地址，已识别用户
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');
	$bcob=new control();//创建购物车对象
	$sql="delete from bookchat where chat_seesion_ID='".$userIP."'";
	$bcob->delete($sql);
	$sql="alter table bookchat add chat_ID int(11) not NULL auto_incerment Primary key first;";
	$bcob->delete($sql);
	echo "<meta http-equiv='Refresh' content='0;url=../main.php'>";
?>