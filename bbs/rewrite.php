<?php require("bbshead.php");
$btl=$_GET[btitle];$p=$_GET[p];//这三行是新增的
if($p==0) $pp="bbsviewinfo.php";
if($p==1) $pp="adminviewinfo.php";
?>
<div id="bt">写留言<hr/></div>
<div id="bd">
	<form method="post" action="<?php echo "$_SERVER[PHP_SELF]";?>">
		<table width="100%" border="0" cellspacing="0" class="tdl">
			<tr><td align="right">呢&nbsp;称:</td>
			<td><input name="name" type="text" size="40" maxlenth="20"></td>
			<td align="right">Email:</td>
			<td><input name="email" type="text" size="42" maxlength="20"></td></tr>
			<tr><td align="right" name="email">&nbsp;主&nbsp;题:</td>
			<td colspan="3"><input name="btitle" type="text" value="<?php echo "$btl";?>" size="96" maxlength="80" readonly="readonly"/></td></tr>
<!--			//<td colspan="3"><input name="bttile" type="text" size="96" maxlength="80"/></td></tr>-->
			<tr><td align="right">&nbsp;内&nbsp;容:</td>
			<td colspan="3"><textarea name="msg" cols="95" rows="8"></textarea></td></tr>
			<tr><td align="center" colspan="4"><input type="submit" name="action" value="写好了">
			<input type="reset" value="重写"><input type="submit" name="action" value="放弃">
			</td></tr>
		</table>
	</form>
	</div>
<?php 
	if($action=="放弃")		echo "<meta http-equiv='Refresh' content='0;url=".$pp."?btitle=".$btl."'>";
	else if ($action=="写好了"){
			if($name!="" && $email!="" && $msg!=""){
				include_once("sys_conf.inc");
			//建立与Mysql数据库的连接
				$connection=mysql_connect($DBHOST,$DBUSER,$DBPWD) or dir("无法连接数据库");
				mysql_query("set names 'gb2312'");//设置字符集
				mysql_select_db("guest") or dir("无法选择数据库");//选择数据库
				//向服务器发送查询请求
				$query="insert into replylist (name,btime,msg,email,btitle) values('$name',now(),
				'$msg','$email','$btitle')";
				$result=mysql_query($query,$connection) or die("存入数据库失败");
				mysql_close($connection) or dir("无法断开与数据库的连接");
				$err="填写留言成功<br/>2秒后自动返回.\n";
				echo "<meta http-equiv=\"Refresh\" content=\"2;url=".$pp."?btitle=".$btl."\">";
			}
			else{
				$err="出错了!\n信息不全!昵称、邮箱、主题和内容是必须填写的\n";
				echo "<meta http-equiv=\"Refresh\" content=\"2;url=$_SERVER[PHP_SELF]\">";
			}
		}
	?>
		<div id="err" align="center"><?php echo $err;?></div><!--提示信息显示区域-->
		<hr/>
		<iframe scrolling="no" width="780" height="60" src="bbsbottom.html"
	marginwidth="0" marginheight="0" border="0" frameborder="0" align="center">
	不支持</iframe>
</body>
</html>