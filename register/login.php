<?php    
	session_start(); //启动session变量，注意一定要放在首行
	$userid=$_POST["userid"];//获取表单变量的值
	$password=$_POST["password"];
	$sub=$_POST["subm"];
	session_register("userid");//注册$userid变量，注意没有$符号
	include("sys_conf.inc");   
echo "userid".$userid."password".$password."sub".$sub."111111";	     
	if($sub=="登录"){
echo "userid".$userid."password".$password."sub".$sub;	     
//	//建立与sql数据库的连接
//	$connection=mysql_connect($DBHOST,$DBUSER,$DBPWD) or die ("无法连接数据库!".mysql_error());
//	mysql_query("set name 'gb2312'");//设置字符集，防止中文显示乱码                
//	mysql_select_db($DBNAME) or die("无法选择数据库!");                     
//	$query="select * from userinfo where userid='$userid'";//查询用户信息
//	$result=mysql_query($query,$connection) or die ("数据请求失败1！".mysql_error());
//	var_dump(mysql_fetch_array($result));
//	if($row=mysql_fetch_array($result)){
//		if($row[password]==$password){//身份认证成功
//		$query="select * from usercard where userid='$userid'";//查询用户卡信息
//		$result1=@mysql_query($query,$connection) or die(mysql_error()."数据请求失败2！");
//		if($rowc=mysql_fetch_array($result1)){
//		//查询购书卡信息
//		$query="select * from card where cardno='$rowc[cardno]'";
//		$result2=@mysql_query($query,$connection) or die("数据请求失败3！");
//		mysql_close($connection) or die("关闭数据库失败!");
//		$rowcc=mysql_fetch_array($result2);
//		if($rowcc[balance]<10){//判断购书卡余额
//			$msg="该卡中月不足10元，请向卡内注资或到会员管理中申请新购书卡！";
//			echo "<meta http-equiv='Refresh' content='0;url=regindex.php?meg=$msg'>";
//		}
//		else{
//		$_SESSION['userid']=$_POST['userid'];
//		$msg="注册成功!可以使用购书卡购书啦！";
//		$msg.="<a href='#';onclick=/'windows.close();return false;/''>返回</a>";
//		echo "<meta http-equiv='Refresh' content='0;url=regindex.php?msg=$msg'>";
//		}
//	}
//		else{
//			$_SESSION['userid']=$_POST['userid'];
//			$msg="注册成功！可以购书啦！但没有购书卡，可以到会员管理中申请购书卡。";
//			$msg.="<a href='#';onclick=/'windows.close();return false;/''>返回</a>";
//			$_SESSION['msg']="注册成功！可以购书啦！但没有购书卡，可以到会员管理中申请购书卡。";
//			echo "<meta http-equiv='Refresh' content='0;url=regindex.php'>";
//		}
//	}
//		else{
//			$msg="密码不正确，请重新输入!";
//			echo "<meta http-equiv='Refresh' content='0;url=regindex.php?meg=$msg'>";
//		}
//	}
//	else{
//			$msg="不存在该会员id，请注册为新会员!";
//			echo "<meta http-equiv='Refresh' content='0;url=regindex.php?meg=$msg'>";
//	}
	}
	else if($sub=="注册成为会员")
		echo "<meta http-equiv='Refresh' content='0;url=applycard.php'>";
?>