<?php    
	session_start(); //����session������ע��һ��Ҫ��������
	$userid=$_POST["userid"];//��ȡ��������ֵ
	$password=$_POST["password"];
	$sub=$_POST["subm"];
	session_register("userid");//ע��$userid������ע��û��$����
	include("sys_conf.inc");   
echo "userid".$userid."password".$password."sub".$sub."111111";	      
	if($sub=="��¼"){
echo "userid".$userid."password".$password."sub".$sub;	
}
?>