<? require_once("chathead.php"); ?>
<script language="Javascript"> //检查用户输入的昵称和密码不能为空
	function checkvalid(){
		if(document.frmLogin.user_name.value=""){
			alter("请输入昵称!");
			document.frmLogin.user_name.focus();
			return false;
		}
		if(document.frmLogin.password.value==""){
			alert("请输入密码!");
			document.frmLogin.password.focus();
			return false;
		}
		return true;
	}
	</script>
	<div id="bt">请您注册<hr/></div>
	<div class="tdl" align="center">
		<form name="frmLogin" method="POST" action="check_user.php">
		昵称:<input type="text" name="user_name">&nbsp;&nbsp;
		密码:<input type="password" name="password" cols="20">&nbsp;&nbsp;
		<input type="submit" name="cmdLogin" value="登录" onClick="return
		checkvalid();">
		</form>
		</div>
		<div id="err" align="center">如果您是首次登录本聊天室,系统将自动注册您的信息</div>
		<hr/>
		<iframe scrolling="no" width="780" height="60" src="chatbottom.html"
	marginwidth="0" marginheight="0" border="0" frameborder="0" align="center">
	不支持</iframe>
	</div>
</body>
</html>