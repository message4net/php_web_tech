<?php $title="ע�Ṻ�鿨";
require_once("reghead.php");?>
<script language="JavaScript">
function jcidd(){
	var idss=window.frm.userid.value;
	var cds=window.frm.cardno.value;
	var pds=window.frm.cardpsd.value;
	if (idss==""){
		window.alert("�»�Աid����Ϊ��");
		widown.frm.userid.focus();
	}
	else if (idss.length<4||pds.length>30){
		window.alert{"�»�Աid���Ȳ��Ϸ�������������");
		window.frm.userid.value="";
		window.frm.userid.focus();
	}
	else if (cds==""){
		window.alert("���鿨�Ų���Ϊ��");
		window.frm.cardno.focus();
	}
	else if (pds==""){
		window.alert("���鿨���벻��Ϊ��");
		window.frm.cardpsd.focus();
	}
}
</script>
	<div id="err">ע�Ṻ�鿨&gt;$gt;</div>
	<div id="bt">��д���鿨��Ϣ<hr/></div>
	<div id="bd"><form method="POST" name="frm" action="apply.php">
	<table width="100%" boder="0" cellspacing="0" class="td1">
		<tr><td align="right">�»�Աid</td>
		<td><input type="TEXT" name="userid" size="30"/>
		(λ��4-30,��������ĸ���������)</td></tr>
		<tr><td align="right">���鿨��</td>
		<td><input type="TEXT" name="cardno" size="30"/>
		(���ѽ��ڹ��￨�м���)</td></tr>
		<tr><td align="right">���鿨����</td>
		<td><input type="password" name="cardpsd" size="30"/></td></tr>
		<tr><td colspac="2" align="center">
		<input type="submit" name="select" value="��һ��" onmousedown="jcidd()">
		<input type="sbumit" name="select" value="����"></td></tr>
	</table>
</form>
</div>
<div id="err">
<div align="center"><?php echo $msg;?></div><br/>
1.������빺�鿨������д����Ϣ��Ȼ�󵥻�����һ������ť��<br/>
2.����������빺�鿨���͵�������������ť��
</div>
<hr/>
<ifame scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheight="0" border="0" frameborder="0" align="center">��֧��</iframe>
</div>
</body>
</html>