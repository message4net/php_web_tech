<?php
$title="注册";
require_once("reghead.php");?>
<script language="JavaScript">
	function jcud(){
		var cds1=window.frm.userid.value;
		var cds2=window.frm.password.value;
		if (cds1==""){
			window.alert("会员号不能为空");
			window.frm.userid.focus();
		}
		else if (cds2==""){
			window.alert("密码不能为空");
			window.frm.password.focus();
		}
	}
</script>
<div id="bt">请登录--输入用户名和密码</div>
<div id="bd" class="td1"><hr/>
<!--	<form method="POST" name="frm" action="test.php">-->
	<form method="POST" name="frm" action="test.php">
		<table width="100%" boder="0">
			<tr><td align="right">请输入会员号</td>
				<td><input type="text" name="userid" size="30" />*</td>
			</tr>
			<tr><td align="right">请输入密&nbsp;&nbsp;码</td>
				<td><input type="password" name="password" size="21" />*</td>
			</tr>
			<tr><td align="right">
				<input type="submit" name="subm" value="登陆" onmousedown="jcud()" /></td>
				<td>
				<input type="submit" name="subm" value="注册成为会员" /></td>
			</tr>
		</table>
	</form>
</div>
<div id="err"><?php echo "$msg"; ?><br/><br/></div>
<hr/>
<iframe scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">不支持</iframe>
</div>
</body>
</html>