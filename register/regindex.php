<?php
$title="ע��";
require_once("reghead.php");?>
<script language="JavaScript">
	function jcud(){
		var cds1=window.frm.userid.value;
		var cds2=window.frm.password.value;
		if (cds1==""){
			window.alert("��Ա�Ų���Ϊ��");
			window.frm.userid.focus();
		}
		else if (cds2==""){
			window.alert("���벻��Ϊ��");
			window.frm.password.focus();
		}
	}
</script>
<div id="bt">���¼--�����û���������</div>
<div id="bd" class="td1"><hr/>
	<form method="POST" name="frm" action="login.php">
		<table width="100%" boder="0">
			<tr><td align="right">�������Ա��</td>
				<td><input type="text" name="userid" size="30" />*</td>
			</tr>
			<tr><td align="right">��������&nbsp;&nbsp;��</td>
				<td><input type="password" name="password" size="21" />*</td>
			</tr>
			<tr><td align="right">
				<input type="submit" name="subm" value="��¼" onmousedown="jcud()" /></td>
				<td>
				<input type="submit" name="subm" value="ע���Ϊ��Ա" /></td>
			</tr>
		</table>
	</form>
</div>
<div id="err"><?php echo "$msg"; ?><br/><br/></div>
<hr/>
<iframe scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">��֧��</iframe>
</div>
</body>
</html>