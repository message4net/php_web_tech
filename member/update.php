<?php
	session_start();
	$userid=$_SESSION['userid'];
	$username=$_POST['username'];$password=$_POST['password'];
	$addr=$_POST['phone'];$sendup=$_POST['sendup'];
	$sql1="";
	if($sendup=="������д") header("Location:modify.php?isnew=1");//ҳ���ض���
	if($sendup=="ȷ���ύ"){//�����ȷ���ύ����ť��Ĵ���
		if($email!="") $sql1.=",email='$email'";
		if($username!="") $sql1.=",username='$username'";
		if($addr!="") $sql1.=",addr='$addr'";
		if($post!="") $sql1.=",post='$post'";
		if($phone!="") $sql1.=",phone='$phone'";
		require_once("opendata.php.inc");
		$sql="update userinfo set password='$password'".$sql1." where userid='$userid'";
		mysql_query($sql);
		mysql_close();
		$errmsg="�޸���Ϣ����ϲ�㣬������ɸ������ϵ��޸�!";//���÷�����Ϣ
		header("Location:modify.php?isnew=0&succend=1&errmsg=$errmsg");
	}
?>
		