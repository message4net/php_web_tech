<?php
$login=$_GET[login]
if($login==1) $title="���빺�鿨ר��--��������ID������";
elseif($login==2) $title="�޸ĸ�������--��������ID������";
elseif($login==3) $title="�����ѯ--��������ID";
elseif($login==4) $title="վ����¼--���������Ա�ʺż�����";
include_once("memhead.php");
?>
<script language="javaScript" type="text/javascript">
function pdsr(){
var id=window.frm.userid.value;
var pds=window.frm.password.value;
if(id==""){
window.alert("���벻��Ϊ��");
window.frm.password.focus();
}
}
</script>
	<div id="bd">
	<div id="bt"><? echo $title;?><hr/></div>
	<form name="frm" action="check.php?login=<?php echo $login;?>" method="post">
		<table width="100%" boder="0" cellspacing="0" class="td1">
		 <tr><td width="30%" align="right">�����ԱID</td><td><input type="text" 
		 name="userid" size="30" /></td></tr>
		<?php if($login!=3) { ?>
			<tr><td align="right">�����Ա����</td><td><input type="password" 
			name="password" size="20"></td></tr>
		<?php } ?>
			<tr><td align="center" colspan=2><input type="submit" name="send" value="��¼"
			onmousedown="pdsr()"><input type="reset" value="��������"></td></tr>
		</table>
	</form>
	<div id="err" align="center"><? echo $errmsg;?><br/></div>
	</div>
	<hr/>
	<iframe scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">��֧��</iframe>
</div>
</body>
</html>