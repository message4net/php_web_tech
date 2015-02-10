<?php
$login=$_GET[login]
if($login==1) $title="进入购书卡专区--请先输入ID及密码";
elseif($login==2) $title="修改个人资料--请先输入ID及密码";
elseif($login==3) $title="密码查询--请先输入ID";
elseif($login==4) $title="站长登录--请输入管理员帐号及密码";
include_once("memhead.php");
?>
<script language="javaScript" type="text/javascript">
function pdsr(){
var id=window.frm.userid.value;
var pds=window.frm.password.value;
if(id==""){
window.alert("密码不能为空");
window.frm.password.focus();
}
}
</script>
	<div id="bd">
	<div id="bt"><? echo $title;?><hr/></div>
	<form name="frm" action="check.php?login=<?php echo $login;?>" method="post">
		<table width="100%" boder="0" cellspacing="0" class="td1">
		 <tr><td width="30%" align="right">输入会员ID</td><td><input type="text" 
		 name="userid" size="30" /></td></tr>
		<?php if($login!=3) { ?>
			<tr><td align="right">输入会员密码</td><td><input type="password" 
			name="password" size="20"></td></tr>
		<?php } ?>
			<tr><td align="center" colspan=2><input type="submit" name="send" value="登录"
			onmousedown="pdsr()"><input type="reset" value="重新输入"></td></tr>
		</table>
	</form>
	<div id="err" align="center"><? echo $errmsg;?><br/></div>
	</div>
	<hr/>
	<iframe scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">不支持</iframe>
</div>
</body>
</html>