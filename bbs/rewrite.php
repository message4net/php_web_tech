<?php require("bbshead.php");
$btl=$_GET[btitle];$p=$_GET[p];//��������������
if($p==0) $pp="bbsviewinfo.php";
if($p==1) $pp="adminviewinfo.php";
?>
<div id="bt">д����<hr/></div>
<div id="bd">
	<form method="post" action="<?php echo "$_SERVER[PHP_SELF]";?>">
		<table width="100%" border="0" cellspacing="0" class="tdl">
			<tr><td align="right">��&nbsp;��:</td>
			<td><input name="name" type="text" size="40" maxlenth="20"></td>
			<td align="right">Email:</td>
			<td><input name="email" type="text" size="42" maxlength="20"></td></tr>
			<tr><td align="right" name="email">&nbsp;��&nbsp;��:</td>
			<td colspan="3"><input name="btitle" type="text" value="<?php echo "$btl";?>" size="96" maxlength="80" readonly="readonly"/></td></tr>
<!--			//<td colspan="3"><input name="bttile" type="text" size="96" maxlength="80"/></td></tr>-->
			<tr><td align="right">&nbsp;��&nbsp;��:</td>
			<td colspan="3"><textarea name="msg" cols="95" rows="8"></textarea></td></tr>
			<tr><td align="center" colspan="4"><input type="submit" name="action" value="д����">
			<input type="reset" value="��д"><input type="submit" name="action" value="����">
			</td></tr>
		</table>
	</form>
	</div>
<?php 
	if($action=="����")		echo "<meta http-equiv='Refresh' content='0;url=".$pp."?btitle=".$btl."'>";
	else if ($action=="д����"){
			if($name!="" && $email!="" && $msg!=""){
				include_once("sys_conf.inc");
			//������Mysql���ݿ������
				$connection=mysql_connect($DBHOST,$DBUSER,$DBPWD) or dir("�޷��������ݿ�");
				mysql_query("set names 'gb2312'");//�����ַ���
				mysql_select_db("guest") or dir("�޷�ѡ�����ݿ�");//ѡ�����ݿ�
				//����������Ͳ�ѯ����
				$query="insert into replylist (name,btime,msg,email,btitle) values('$name',now(),
				'$msg','$email','$btitle')";
				$result=mysql_query($query,$connection) or die("�������ݿ�ʧ��");
				mysql_close($connection) or dir("�޷��Ͽ������ݿ������");
				$err="��д���Գɹ�<br/>2����Զ�����.\n";
				echo "<meta http-equiv=\"Refresh\" content=\"2;url=".$pp."?btitle=".$btl."\">";
			}
			else{
				$err="������!\n��Ϣ��ȫ!�ǳơ����䡢����������Ǳ�����д��\n";
				echo "<meta http-equiv=\"Refresh\" content=\"2;url=$_SERVER[PHP_SELF]\">";
			}
		}
	?>
		<div id="err" align="center"><?php echo $err;?></div><!--��ʾ��Ϣ��ʾ����-->
		<hr/>
		<iframe scrolling="no" width="780" height="60" src="bbsbottom.html"
	marginwidth="0" marginheight="0" border="0" frameborder="0" align="center">
	��֧��</iframe>
</body>
</html>