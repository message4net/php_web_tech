<?php require("bbshead.php")?>
<div id="bt">写留言<hr/></div>
<div id="bd">
	<form method="post" action="<?php echo "$_SERVER[PHP_SELF]";?>">
		<table width="100%" border="0" cellspacing="0" class="tdl">
			<tr><td align="right">&nbsp;称:</td>
			<td><input name="name" type="text" size="40" maxlenth="20"></td>
			<td align="right">Email:</td>
			<td><input name="email" type="text" size="42" maxlength="20"></td></tr>
			<tr><td align="right" name="email">&nbsp;主&nbsp;题:</td>
			<td colspan="3"><input name="bttile" type="text" size="96" maxlength="80"/></td></tr>
			<tr><td align="right">&nbsp;内&nbsp;容:</td>
			<td colspan="3"><textarea name="msg" cols="95" rows="8"></texarea></td></tr>
			<tr><td align="center" colspan="4"><input type="submit" name="action" value="写好了">
			<input type="reset" value="重写"><input type="submit" name="action" value="放弃">
			</td></tr>
		</table>
	</form>
	</div>
<?php if($action=="放弃")