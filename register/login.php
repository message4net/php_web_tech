<?php
	session_start(); //����session������ע��һ��Ҫ��������
	$userid=$_POST["userid"];//��ȡ��������ֵ
	$password=$_POST["password"];
	$sub=$_POST["subm"];
	session_register("userid");//ע��$userid������ע��û��$����
	include("sys_conf.inc");
	if($sub=="��¼"){
	//������sql���ݿ������
	$connection=mysql_connect($DBHOST,$DBUSER,$DBPWD) or die ("�޷��������ݿ�!");
	mysql_query("set name 'gb2312'");//�����ַ�������ֹ������ʾ����
	mysql_select_db($DBNAME) or die("�޷�ѡ�����ݿ�!");
	$query="select * from userinfo where userid='$userid'";//��ѯ�û���Ϣ
	$result=mysql_query($query,$connection) or die ("��������ʧ��1��".mysql_error());
	if($row=mysql_fetch_array($result)){
		if($row[password]==$password){//�����֤�ɹ�
		$query="select * from usercard where user_id='$userid'";//��ѯ�û�����Ϣ
		$result1=@mysql_query($query,$connection) or die("��������ʧ��2��");
		if($rowc=mysql_fetch_array($result1)){
		//��ѯ���鿨��Ϣ
		$query="select * from card where cardno='$rowc[cardno]'";
		$result2=@mysql_query($query,$connection) or die("��������ʧ��3��");
		mysql_close($connection) or die("�ر����ݿ�ʧ��!");
		$rowcc=mysql_fetch_array($result2);
		if($rowcc[balance]<10){//�жϹ��鿨���
			$msg="�ÿ����²���10Ԫ��������ע�ʻ򵽻�Ա�����������¹��鿨��";
			echo "<meta http-equiv='Refresh' content='0;url=regindex.php?meg=$msg'>";
		}
		else{
		$_SESSION['userid']=$_POST['userid'];
		$msg="ע��ɹ�!����ʹ�ù��鿨��������";
		$msg.="<a href='#';onclick=/'windows.close();return false;/''>����</a>";
		echo "<meta http-equiv='Refresh' content='0;url=regindex.php?msg=$msg'>";
		}
	}
		else{
			$_SESSION['userid']=$_POST['userid'];
			$msg="ע��ɹ������Թ���������û�й��鿨�����Ե���Ա���������빺�鿨��";
			$msg.="<a href='#';onclick=/'windows.close();return false;/''>����</a>";
			echo "<meta http-equiv='Refresh' content='0;url=regindex.php?msg=$msg'>";
		}
	}
		else{
			$msg="���벻��ȷ������������!";
			echo "<meta http-equiv='Refresh' content='0;url=regindex.php?meg=$msg'>";
		}
	}
	else{
			$msg="�����ڸû�Աid����ע��Ϊ�»�Ա!";
			echo "<meta http-equiv='Refresh' content='0;url=regindex.php?meg=$msg'>";
	}
	}
	else if($sub=="ע���Ϊ��Ա")
		echo "<meta http-equiv='Refresh' content='0;url=applycard.php'>";
?>