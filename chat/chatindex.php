<? require_once("chathead.php"); ?>
<script language="Javascript"> //����û�������ǳƺ����벻��Ϊ��
	function checkvalid(){
		if(document.frmLogin.user_name.value=""){
			alter("�������ǳ�!");
			document.frmLogin.user_name.focus();
			return false;
		}
		if(document.frmLogin.password.value==""){
			alert("����������!");
			document.frmLogin.password.focus();
			return false;
		}
		return true;
	}
	</script>
	<div id="bt">����ע��<hr/></div>
	<div class="tdl" align="center">
		<form name="frmLogin" method="POST" action="check_user.php">
		�ǳ�:<input type="text" name="user_name">&nbsp;&nbsp;
		����:<input type="password" name="password" cols="20">&nbsp;&nbsp;
		<input type="submit" name="cmdLogin" value="��¼" onClick="return
		checkvalid();">
		</form>
		</div>
		<div id="err" align="center">��������״ε�¼��������,ϵͳ���Զ�ע��������Ϣ</div>
		<hr/>
		<iframe scrolling="no" width="780" height="60" src="chatbottom.html"
	marginwidth="0" marginheight="0" border="0" frameborder="0" align="center">
	��֧��</iframe>
	</div>
</body>
</html>