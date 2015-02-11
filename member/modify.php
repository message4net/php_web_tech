<?php
	session_start();
	$userid=$_SESSION['userid'];
	$password=$_SESSION['password'];
	$isnew=0;//设置反馈信息自定义变量
	if(isset($_GET['isnew'])) $isnew=$_GET['isnew'];
	if($isnew==0){//获取用户资料
	 require_once("opendata.php.inc");
	 $sql="select * from userinfo where userid='$userid'";
	 $records=mysql_query($sql);
	 $rows=mysql_fetch_array($records);
	 $username=$rows[username];
	 $email=$rows[email];
	 $addr=$rows[address];
	 $phone=$rows[phone];
	 $post=$rows[post];
	}
	else if($isnew==1){$username="";$addr="";$email="";$post="";$phone="";}
	$title="修改会员申请资料";
	include("memhead.php");
?>
<script language="javaScript" type="text/javascript">//客户端用户输入的有效性检查
	function pdsr(){
		var pds=window.frm.password.value;
		var pds1=window.frm.confirm1.value;
		if(pds.length<6||pds.length>20){
			window.alert("密码长度不合法,请重新输入");
			window.frm.password.value="";
			window.frm.password.focus();
		}
		else if(pds!=pds1){
			window.alert("确认密码,请再次输入");
			window.frm.confirm1.value="";
			window.frm.confirm1.focus();
		}
	}
</script>
	<div id="bt">修改护院申请资料<hr/></div>
	<div id="bd">
		<div id="err" align="center">带&nbsp;*&nbsp;的选项是必须填写的</div>
	<form action="update.php" method="post" name="frm"
	<table width="100%" border="0" cellspacing="0" class="td1">
		<tr><td align="right">会员id</td><td><input name="userid" type="text" disabled="disabled" value="<?php echo $userid;?>"
		 size="40"/></td></tr>
		<tr><td align="right">姓名</td><td><input type="text" size="40" name="username"
		value="<?php echo $username";?>"/></td></tr>
		<tr><td align="right">Email</td><td><input type="text" size="40" name="eamil"
		value="<?php echo $email";?>"/></td></tr>
		<tr><td align="right">会员密码</td><td><input type="text" size="40" name="password"
		value="<?php echo $password";?>"/>&nbsp;&nbsp;&nbsp;</td></tr>
		<tr><td align="right">再次输入密码</td><!--输入两次密码以确保修改密码无误-->
		<td><input type="text" size="40" name="confirm1"
		value="<?php echo $password";?>"/>&nbsp;&nbsp;&nbsp;</td></tr>
		<tr><td align="right">邮编</td><td><input type="text" size="20" name="post"
		value="<?php echo $post";?>"/></td></tr>
		<tr><td align="right">地址</td><td><input type="text" size="80" name="addr"
		value="<?php echo $addr";?>"/></td></tr>
		<tr><td align="right">电话号码</td><td><input type="text" size="20" name="phone"
		value="<?php echo $phone";?>"/></td></tr>
	<?php if($_GET['succeed']!=1){//修改成功后屏蔽下面的两个按钮?>
		<tr><td colspan="2" align="center"><input name="sendup" type="submit" value="确认提交"
		onmousedown="pdsr()">&nbsp;&nbsp;<input name="sendup" type="submit" value="重新填写"></td></tr>
<?php }?>
	</table>
	</form>
	<div id="err" align="center"><?php echo "$errmsg";?></div>
	</div>
	<hr/>
		<iframe scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">不支持</iframe>
</div>
</body>
</html>
		