<? require_once("chathead.php");?>
<script language="JavaScript">//����û�������ǳƺ������Ƿ�Ϸ�
	function checkvalid(){
		if(document.frmLogin.user_name.value==""){
			alert("�������ǳ�");
			document.frmLogin.user_name.focus();
			return false;
		}
		if(document.frmLogin.password.value==""){
			alter("����������");
			document.frmLogin.password.focus();
			return false;
		}
		return ture;
	}
</script>
	<div id="bt">��������ע��<hr/></div>
	<div class="tdl" align="center">
	<form name="frmLogin" method="POST" action="check_user.php">
	�ǳ�:<input type="text" name="user_name" value=<?php echo $_SESSION
	["user_name"];?>>
	����:<input type="password" name="password">
	<input type="submit" name"cmdLogin" value="��¼" onClick="return chackvalid();">
	</form>
	</div>
	<div id="err" align="center">��������״ε�¼�������ң�ϵͳ���Զ�ע��������Ϣ</div>
	<hr/>
	<iframe scrolling="no" width="780" height="60" src="chatbottom.html"
	marginwidth="0" marginheight="0" border="0" frameborder="0" align="center">
	��֧��</iframe>
	</div>
</body>
</html>
