<?php
	session_start();
	$userid=$_SESSION['userid'];
	$username=$_POST['username'];$password=$_POST['password'];
	$addr=$_POST['phone'];$sendup=$_POST['sendup'];
	$sql1="";
	if($sendup=="重新填写") header("Location:modify.php?isnew=1");//页面重定向
	if($sendup=="确认提交"){//点击【确认提交】按钮后的处理
		if($email!="") $sql1.=",email='$email'";
		if($username!="") $sql1.=",username='$username'";
		if($addr!="") $sql1.=",addr='$addr'";
		if($post!="") $sql1.=",post='$post'";
		if($phone!="") $sql1.=",phone='$phone'";
		require_once("opendata.php.inc");
		$sql="update userinfo set password='$password'".$sql1." where userid='$userid'";
		mysql_query($sql);
		mysql_close();
		$errmsg="修改信息：恭喜你，你已完成个人资料的修改!";//设置反馈信息
		header("Location:modify.php?isnew=0&succend=1&errmsg=$errmsg");
	}
?>
		