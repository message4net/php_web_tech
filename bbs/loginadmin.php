<?php require_once("bbshead.php") ?>
	<div id="bt">�����֤<hr/></div>
	<div id="bd">
		<form method="post" action="<?php echo "$_SERVER[PHP_SELF]?action=$action";?>">
		<table width="100%" border="0" cellspacing="0" class="tdl">
			<tr><td align="right">����Ա&nbsp;&nbsp;</td>
				<td><input name="name" type=text size="35" maxlenth="20"></td></tr>
			<tr><td align="right">��&nbsp;&nbsp;��&nbsp;&nbsp;</td>
				<td><input name="psd" type="password" size="20" /></td></tr>
			<tr><td align="center" colspan="2"><input type="submit" name="action"
			value="��¼"></tr>
		</table>
		</form>
	</div>
<?php
	$IP_m=$_SERVER['REMOTE_ADDR'];//ͨ��ip��ַȷ������Ա���
	include_once("sys_conf.inc");
	$connection=@mysql_connect($DBHOST,$DBUSER,$DBPWD) or die("�޷��������ݿ�");
	@mysql_query("set names 'gb2312'");
	@mysql_select_db("member") or die("�޷�ѡ�����ݿ�");
	$query="select * from administer where ip='$IP_m'";
	$result=@mysql_query($query,$connection) or die("��ȡ����ʧ��".mysql_error());
	mysql_close($connection) or die("�޷��Ͽ������ݿ������");
	if(mysql_num_rows($result)==0) $err="û��Ȩ��";
	elseif($action=="��¼")
		if($name!="" && $psd!="")
		while($row=mysql_fetch_array($result)){
				if(($name==$row[userid]) && ($psd==$row[password]))
		echo "<meta http-equiv=\"Refresh\" content=\"0;url=adminview.php\">";
				else $err="������Ϣ����,����������";  
}
		else $err="������Ϣ������";
?>
	<div id="err" align="center"><?php echo $err; ?></div>
	<hr/>
	<iframe scrolling="no" width="780" height="60" src="bbsbottom.html"
	marginwidth="0" marginheight="0" border="0" frameborder="0" align="center">
	��֧��</iframe>
</body>
</html>