<?php
	session_start();
	$_SESSION['userid']=$_POST['userid'];
	$title="ע�����";
	require_once("reghead.php");
	$userid=$_POST["userid"]; $cardno=$_POST["cardno"]; $cash=$_POST["cash"];
	$username=$_POST["username"];$password=$_POST["password"];
	$email=$_POST["email"]; $addr=$_POST["phone"];
	include("sys_conf.inc");
	$connection=mysql_connect($DBHOST,$DBUSER,$DBPWD) or dir("�޷��������ݿ�!");
	mysql_query("set name 'gb2312'");
	mysql_select_db("member") or die("�޷�ѡ�����ݿ�!");
	$query="select * from userinfo where userid='$userid'";
	$result=mysql_query($query,$connection) or die("���ʧ�ܣ�1");  
	if($row=mysql_fetch_array($result)){
		$msg="�û�Աid�Ѿ�����ʹ�ã���������д";
		echo "<meta http-equiv='Refresh' content='0;url=applysrc.php?msg=$msg>";
	}
	else{
	//������Աid�͹��￨�ŵ���ϵ
	if($cardno!=""){
	$query="insert into usercard (userid,cardno) values ('$userid','$cardno')";
	$result=@mysql_query($query,$connection) or die("�������ݿ�ʧ��!");
	//�޸Ŀ���״̬
	$query="UPdate card set cardstatus='N' where cardno='$cardno'";
	$result=@mysql_query($query,$connection) or die("�������ݿ�ʧ��!");
}
//�����»�Ա���
$time=Date("Y")."��".Date("n")."��".Date("j")."��".Date("G").":".Date("i");
echo TIME;var_dump($time)   ;
$query="insert into userinfo(userid,username,password,email,addr,post,phone,createtime)";
$query.=" values ('$userid','$username','$password','$email','$addr','$post','$phone','$time')";
$result=@mysql_query($query,$connection) or die (mysql_error()."�������ݿ�ʧ��!");
mysql_close($connection) or die("�ر����ݿ�ʧ��!");
//�����ɹ���Ϣ
$msg="���Ļ�Ա��Ϊ��".$userid."<br/>";
if($cardno!=""){
$msg.="���鿨��:".$cardno."<br/>";
$msg.="���ý��:".$cash;
}
}
?>
	<div id="err">ע�Ṻ�鿨|��д��Ա��Ϣ|���</div>
	<div id="bt">��ϲ���Ѿ����������������<hr/></div>
	<div id="bd" class="td1" align="center"><?php echo $msg; ?></div>
	<hr/>
	<iframe scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheight="0" border="0" frameborder="0" align="center">��֧��</iframe>
</div>
</body>
</html>