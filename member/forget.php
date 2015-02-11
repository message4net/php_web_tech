<?php
 session_start();
 $userid=$_SESSION['userid'];
 $errmsg="";$ok=0;//初始化自定义变量，$ok记录是否成功的查询到了密码
 if(isset($_GET['ok'])}//如果$ok值以GET方式传递，就获取他做为当前isnew的值
 $ok=$_GET['ok'];
 if(isset($_GET['errsmg'])) $errmsg=$_GET['errmsg']'
 $title="密码查询";
 include("memhead.php");
?>
	<div id="bd">
	<div id="bt">密码查询--输入住址或电子邮件帐号<hr/></div>
<?php if($ok==0){?>//查询成功后隐藏表单
	<form action="search.php" method="post">
		<table width="100%" border="0" cellspacing="0" class="td1">
			<tr><td width="30%" align="right">输入 E-mail</td><td><input type="text" 
			 name="email" size="30" value="<?php echo $email;?>"</td></tr>
			<tr><td align="right" class="td1">输入住址</td><td><input type="text"
				size="60" name="addr" value="<?php echo $addr;?>"/></td></tr>
			<tr><td align="center" colspac=2 class="td1"><input type="submit"
				name="send" value="查询"></td></tr>
		</table>
	</form>
<?php } ?>//查询成功后隐藏表单
	<div id="err" align="center"><? echo $errmsg;?></div>
	</div>
	<hr/>
		<iframe scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">不支持</iframe>
</div>
</body>
</html>