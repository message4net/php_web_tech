<?php
	session_start();
	$userid=$_SESSION['userid'];
	$password=$_SESSION['password'];
	$isnew=0;//���÷�����Ϣ�Զ������
	if(isset($_GET['isnew'])) $isnew=$_GET['isnew'];
	if($isnew==0){//��ȡ�û�����
	 require_once("opendata.php.inc");
	 $sql="select * from userinfo where userid='$userid'";
	 $records=mysql_query($sql);
	 $rows=mysql_fetch_array($records);
	 $username=$rows[username];
	 $email=$rows[email];
	 $addr=$rows[address];
	 $phone=$rows[phone];
	 $post=$rows[post];
	}
	else if($isnew==1){$username="";$addr="";$email="";$post="";$phone="";}
	$title="�޸Ļ�Ա��������";
	include("memhead.php");
?>
<script language="javaScript" type="text/javascript">//�ͻ����û��������Ч�Լ��
	function pdsr(){
		var pds=window.frm.password.value;
		var pds1=window.frm.confirm1.value;
		if(pds.length<6||pds.length>20){
			window.alert("���볤�Ȳ��Ϸ�,����������");
			window.frm.password.value="";
			window.frm.password.focus();
		}
		else if(pds!=pds1){
			window.alert("ȷ������,���ٴ�����");
			window.frm.confirm1.value="";
			window.frm.confirm1.focus();
		}
	}
</script>
	<div id="bt">�޸Ļ�Ժ��������<hr/></div>
	<div id="bd">
		<div id="err" align="center">��&nbsp;*&nbsp;��ѡ���Ǳ�����д��</div>
	<form action="update.php" method="post" name="frm"
	<table width="100%" border="0" cellspacing="0" class="td1">
		<tr><td align="right">��Աid</td><td><input name="userid" type="text" disabled="disabled" value="<?php echo $userid;?>"
		 size="40"/></td></tr>
		<tr><td align="right">����</td><td><input type="text" size="40" name="username"
		value="<?php echo $username";?>"/></td></tr>
		<tr><td align="right">Email</td><td><input type="text" size="40" name="eamil"
		value="<?php echo $email";?>"/></td></tr>
		<tr><td align="right">��Ա����</td><td><input type="text" size="40" name="password"
		value="<?php echo $password";?>"/>&nbsp;&nbsp;&nbsp;</td></tr>
		<tr><td align="right">�ٴ���������</td><!--��������������ȷ���޸���������-->
		<td><input type="text" size="40" name="confirm1"
		value="<?php echo $password";?>"/>&nbsp;&nbsp;&nbsp;</td></tr>
		<tr><td align="right">�ʱ�</td><td><input type="text" size="20" name="post"
		value="<?php echo $post";?>"/></td></tr>
		<tr><td align="right">��ַ</td><td><input type="text" size="80" name="addr"
		value="<?php echo $addr";?>"/></td></tr>
		<tr><td align="right">�绰����</td><td><input type="text" size="20" name="phone"
		value="<?php echo $phone";?>"/></td></tr>
	<?php if($_GET['succeed']!=1){//�޸ĳɹ������������������ť?>
		<tr><td colspan="2" align="center"><input name="sendup" type="submit" value="ȷ���ύ"
		onmousedown="pdsr()">&nbsp;&nbsp;<input name="sendup" type="submit" value="������д"></td></tr>
<?php }?>
	</table>
	</form>
	<div id="err" align="center"><?php echo "$errmsg";?></div>
	</div>
	<hr/>
		<iframe scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">��֧��</iframe>
</div>
</body>
</html>
		