<?php
	include_once("sys_conf.inc");
	$connection=@mysql_connect($DBHOST,$DBUSER,$DBPWD) or die ("�޷��������ݿ�");
	@mysql_query("set names 'gb2312'");
	@mysql_select_db("guest") or die ("�޷�ѡ�����ݿ�");
	$query="update replylist set flag='N' where serial=".$_GET[serial];
	$result=@mysql_query("query",$connection) or die ("���������ʧ��");
	mysql_close($connection) or die("�޷��Ͽ������ݿ������);
	echo "<meta http-equiv=\"Refresh\" content=\"0;url=adminviewinfo.php?btitle=
	".$_GET[btitle]."\">";
?>