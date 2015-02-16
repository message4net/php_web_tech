<?php
	session_start();//装载session库，一定要放在首行
	$user_name=$_POST["user_name"];$password=$_POST["password"];//获取提交的表单数据
	session_register("user_name");//注册user_name变量，注意没有$符号
	require_once("sys_conf.inc");//连接数据库
	$link_id=mysql_connect($DBHOST,$DBUSER,$DBPWD) or die ("无法连接数据库");
	@mysql_query("set names 'gb2312'");
	mysql_select_db($DBNAME) or die("无法选择数据库");
	$sql="select name,password from user where name='$user_name'";
	$result=mysql_query($sql,$link_id)or die("查询数据库失败");
	$rows=mysql_num_rows($result);
	if($rows!=0){//对于老用户
		list($name,$password)=mysql_fetch_row($result);
		if($password==$_POST["password"]){//密码输入正确
	$sql="update user set is_online='1' where name='$user_name' and password='$password'";
		$result=mysql_query($sql,$link_id) or die ("查询数据库失败");
		echo "<meta http-equiv='Refresh' content='0;url=main.php'>";//转到聊天室
	}
	else{//输入密码错误
		mysql_close($link_id) or die("关闭数据库失败");
		require("relogin.php");//重新登录
	}
}
else{//对于新用户，将其信息写入数据库
	$sql="insert into user(name,password,is_online) values('$user_name','$password',1)";
	$result=mysql_query($sql,$link_id) or die("查询数据库失败");
	mysql_close($link_id) or die ("关闭数据库失败");
	echo "<meta http-equiv='Refresh' content='0;url=main.php'>";
}
?>