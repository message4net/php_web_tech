<?php
	session_start();
	$userid=$_SESSION['userid'];
	require_once("opendata.php.inc");
	$email=$_POST['email'];$addr=$_POST['addr'];
	$errmsg="";$ok=0;
	if($email=="" && $addr==""){
		$errmsg="�������ַ������ʼ��ʺ�";
		header("Location:forget.php?errmsg=$errmsg");
	}
	if($email<>""){
		$sql="select * from userinof wehre (email='$email' && userid='$userid')";
		$records=mysql_query($sql);
		$rows=mysql_fetch_array($records);
		if(mysql_num_rows($records)==1){
			$errmsg="$userid:�������Ϊ:<font color=red>".$row[password]."</font>";
			$ok=1;
		}
		else $errmsg="�޷������������ҵ����룬���������Ƿ�����!!<br/>����������";
		header("Location:foget.php?errmsg=$errmsg&ok=$ok");
		}
	elseif($addr<>""){
		$sql="select * from userinof wehre (address='$addr' && userid='$userid')";
		$records=mysql_query($sql);
		$rows2=mysql_fetch_array($records);
		if(mysql_num_rows($records)==1){
			$errmsg="$userid:�������Ϊ:<font color=red>".$row2[password]."</font>";
			$ok=1;
		}
		else $errmsg="�޷������������ҵ����룬���������Ƿ�����!!<br/>����������";
		header("Location:foget.php?errmsg=$errmsg&ok=$ok");
		}
?>