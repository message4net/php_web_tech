<?php
	session_start();
	require_once("sys_conf.inc");//�������ݿ�
	$user=$_SESSION["user_name"];
	$link_id=mysql_connect($DBHOST,$DBUSER,$DBPWD) or die("�޷��������ݿ�");
	@mysql_query("set names 'gb2312'");
	mysql_select_db($DBNAME) or die("�޷�ѡ�����ݿ�");//ѡ�����ݿ�
	$sql="update user set is_online='0' where name='$user'";//�����û�����������
	$result=mysql_query($sql,$link_id) or die("��ѯ���ݿ�ʧ��");//ִ�в�ѯ
	mysql_close($link_id);//�ر����ݿ�
	session_destroy();//���ٱ��λỰ(���ջỰ����ռ�)
	echo "<meta http-equiv='Refresh' content='0;url=chatindex.php'>";
?>