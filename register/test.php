<?php
	include("sys_conf.inc");
	$connection=@mysql_connect($DBHOST,$DBUSER,$DBPWD) or die ("�޷��������ݿ�!");
	@mysql_query("set name 'gb2312'");//�����ַ�������ֹ������ʾ����
	@mysql_select_db($DBNAME) or die("�޷�ѡ�����ݿ�!");
	$query="select count(*) from userinfo";//��ѯ�û���Ϣ
	$result=@mysql_query($query,$connection) or die ("��������ʧ��1��");
	var_dump($result);
?>