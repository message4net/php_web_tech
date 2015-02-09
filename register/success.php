<?php
	session_start();
	$_SESSION['userid']=$_POST['userid'];
	$title="注册完成";
	require_once("reghead.php");
	$userid=$_POST["userid"]; $cardno=$_POST["cardno"]; $cash=$_POST["cash"];
	$username=$_POST["username"];$password=$_POST["password"];
	$email=$_POST["email"]; $addr=$_POST["phone"];
	include("sys_conf.inc");
	$connection=mysql_connect($DBHOST,$DBUSER,$DBPWD) or dir("无法连接数据库!");
	mysql_query("set name 'gb2312'");
	mysql_select_db("member") or die("无法选择数据库!");
	$query="select * from userinfo where userid='$userid'";
	$result=mysql_query($query,$connection) or die("浏览失败！1");  
	if($row=mysql_fetch_array($result)){
		$msg="该会员id已经被人使用，请重新填写";
		echo "<meta http-equiv='Refresh' content='0;url=applysrc.php?msg=$msg>";
	}
	else{
	//建立会员id和购物卡号的联系
	if($cardno!=""){
	$query="insert into usercard (userid,cardno) values ('$userid','$cardno')";
	$result=@mysql_query($query,$connection) or die("存入数据库失败!");
	//修改卡号状态
	$query="UPdate card set cardstatus='N' where cardno='$cardno'";
	$result=@mysql_query($query,$connection) or die("存入数据库失败!");
}
//建立新会员身份
$time=Date("Y")."年".Date("n")."月".Date("j")."日".Date("G").":".Date("i");
echo TIME;var_dump($time)   ;
$query="insert into userinfo(userid,username,password,email,addr,post,phone,createtime)";
$query.=" values ('$userid','$username','$password','$email','$addr','$post','$phone','$time')";
$result=@mysql_query($query,$connection) or die (mysql_error()."存入数据库失败!");
mysql_close($connection) or die("关闭数据库失败!");
//反馈成功信息
$msg="您的会员名为：".$userid."<br/>";
if($cardno!=""){
$msg.="购书卡号:".$cardno."<br/>";
$msg.="可用金额:".$cash;
}
}
?>
	<div id="err">注册购书卡|填写会员信息|完成</div>
	<div id="bt">恭喜您已经完成所有申请手续<hr/></div>
	<div id="bd" class="td1" align="center"><?php echo $msg; ?></div>
	<hr/>
	<iframe scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheight="0" border="0" frameborder="0" align="center">不支持</iframe>
</div>
</body>
</html>