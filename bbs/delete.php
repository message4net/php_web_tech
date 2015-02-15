<?php
	include_once("sys_conf.inc");
	$connection=@mysql_connect($DBHOST,$DBUSER,$DBPWD) or die("无法连接数据库");
	@mysql_query("set names 'gb2312'");
	@mysql_select_db("guest") or die("无法连接数据库");
	$sql="delete from guestlist where btitle='$_GET[btitle]'";
	@mysql_query($sql,$connection);
	$sql="alter table guestlist drop serial";
	@mysql_query($sql,$connection);
	$sql="alter table guestlist add serial int auto_increment primary key";
	@mysql_query($sql,$connection);
	$sql="delete from guestlist where btitle='$_GET[btitle]'";
	@mysql_query($sql,$connection);
	$sql="alter table replylist drop serial";
	@mysql_query($sql,$connection);
	$sql="alter table replylist add serial int auto_increment primary key";
	@mysql_query($sql,$connection);
	@mysql_close($connection) or die("无法断开与数据库的连接");
	echo "<meta http-equiv=\"Refresh\" content=\"0;url=adminview.php\">";
?>