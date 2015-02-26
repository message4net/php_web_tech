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
}
?>