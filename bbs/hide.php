<?php
	include_once("sys_conf.inc");
	$connection=@mysql_connect($DBHOST,$DBUSER,$DBPWD) or die ("无法连接数据库");
	@mysql_query("set names 'gb2312'");
	@mysql_select_db("guest") or die ("无法选择数据库");
	$query="update replylist set flag='N' where serial=".$_GET[serial];
	$result=@mysql_query("query",$connection) or die ("存入输入库失败");
	mysql_close($connection) or die("无法断开与数据库的连接);
	echo "<meta http-equiv=\"Refresh\" content=\"0;url=adminviewinfo.php?btitle=
	".$_GET[btitle]."\">";
?>