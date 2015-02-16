<? require_once("chathead.php");?>
<script language="JavaScript">//检查用户输入的昵称和密码是否合法
	function checkvalid(){
		if(document.frmLogin.user_name.value==""){
			alert("请输入昵称");
			document.frmLogin.user_name.focus();
			return false;
		}
		if(document.frmLogin.password.value==""){
			alter("请输入密码");
			document.frmLogin.password.focus();
			return false;
		}
		return ture;
	}
</script>
	<div id="bt">请您重新注册<hr/></div>
	<div class="tdl" align="center">
	<form name="frmLogin" method="POST" action="check_user.php">
	昵称:<input type="text" name="user_name" value=<?php echo $_SESSION
	["user_name"];?>>
	密码:<input type="password" name="password">
	<input type="submit" name"cmdLogin" value="登录" onClick="return chackvalid();">
	</form>
	</div>
	<div id="err" align="center">如果您是首次登录本聊天室，系统将自动注明您的信息</div>
	<hr/>
	<iframe scrolling="no" width="780" height="60" src="chatbottom.html"
	marginwidth="0" marginheight="0" border="0" frameborder="0" align="center">
	不支持</iframe>
	</div>
</body>
</html>
