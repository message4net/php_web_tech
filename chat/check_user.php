<?php
	session_start();//װ��session�⣬һ��Ҫ��������
	$user_name=$_POST["user_name"];$password=$_POST["password"];//��ȡ�ύ�ı�����
	session_register("user_name");//ע��user_name������ע��û��$����
	require_once("sys_conf.inc");//�������ݿ�
	$link_id=mysql_connect($DBHOST,$DBUSER,$DBPWD) or die ("�޷��������ݿ�");
	@mysql_query("set names 'gb2312'");
	mysql_select_db($DBNAME) or die("�޷�ѡ�����ݿ�");
	$sql="select name,password from user where name='$user_name'";
	$result=mysql_query($sql,$link_id)or die("��ѯ���ݿ�ʧ��");
	$rows=mysql_num_rows($result);
	if($rows!=0){//�������û�
		list($name,$password)=mysql_fetch_row($result);
		if($password==$_POST["password"]){//����������ȷ
	$sql="update user set is_online='1' where name='$user_name' and password='$password'";
		$result=mysql_query($sql,$link_id) or die ("��ѯ���ݿ�ʧ��");
		echo "<meta http-equiv='Refresh' content='0;url=main.php'>";//ת��������
	}
	else{//�����������
		mysql_close($link_id) or die("�ر����ݿ�ʧ��");
		require("relogin.php");//���µ�¼
	}
}
else{//�������û���������Ϣд�����ݿ�
	$sql="insert into user(name,password,is_online) values('$user_name','$password',1)";
	$result=mysql_query($sql,$link_id) or die("��ѯ���ݿ�ʧ��");
	mysql_close($link_id) or die ("�ر����ݿ�ʧ��");
	echo "<meta http-equiv='Refresh' content='0;url=main.php'>";
}
?>