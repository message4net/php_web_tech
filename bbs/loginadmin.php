<?php require_once("bbshead.php") ?>
	<div id="bt">身份验证<hr/></div>
	<div id="bd">
		<form method="post" action="<?php echo "$_SERVER[PHP_SELF]?action=$action";?>">
		<table width="100%" border="0" cellspacing="0" class="tdl">
			<tr><td align="right">管理员&nbsp;&nbsp;</td>
				<td><input name="name" type=text size="35" maxlenth="20"></td></tr>
			<tr><td align="right">密&nbsp;&nbsp;码&nbsp;&nbsp;</td>
				<td><input name="psd" type="password" size="20" /></td></tr>
			<tr><td align="center" colspan="2"><input type="submit" name="action"
			value="登录"></tr>
		</table>
		</form>
	</div>
<?php
	$IP_m=$_SERVER['REMOTE_ADDR'];//通过ip地址确定管理员身份
	include_once("sys_conf.inc");
	$connection=@mysql_connect($DBHOST,$DBUSER,$DBPWD) or die("无法连接数据库");
	@mysql_query("set names 'gb2312'");
	@mysql_select_db("member") or die("无法选择数据库");
	$query="select * from administer where ip='$IP_m'";
	$result=@mysql_query($query,$connection) or die("提取数据失败".mysql_error());
	mysql_close($connection) or die("无法断开与数据库的连接");
	if(mysql_num_rows($result)==0) $err="没有权限";
	elseif($action=="登录")
		if($name!="" && $psd!="")
		while($row=mysql_fetch_array($result)){
				if(($name==$row[userid]) && ($psd==$row[password]))
		echo "<meta http-equiv=\"Refresh\" content=\"0;url=adminview.php\">";
				else $err="输入信息有误,请重新输入";  
}
		else $err="输入信息不完整";
?>
	<div id="err" align="center"><?php echo $err; ?></div>
	<hr/>
	<iframe scrolling="no" width="780" height="60" src="bbsbottom.html"
	marginwidth="0" marginheight="0" border="0" frameborder="0" align="center">
	不支持</iframe>
</body>
</html>