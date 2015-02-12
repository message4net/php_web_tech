<?php
	if($pageno<>$_GET["pageno"]) $pageno=$_POST["pageno"];
	require("opendata.php.inc");
	$sql="select * from card";
	$records=mysql_query($sql);
	$total=mysql_num_rows($records);
	$lastp=ceil($total/$pagemax);
	$infostr="目前共有&nbsp;<font color=red>".$total."</font>&nbsp;张购书卡，共&nbsp;
	<font color=blue>".$lastp."</font>&nbsp;页。";
	if($pageno>$lastp) $pageno=$lastp;
	elseif($pageno<1) $pageno=1;
	$numf=($pagenum-1)*$pagemax+1;
	$numl=($numf+$pagemax-1);
	if($numl>$total) $numl=$total;
	$infostr.="本页是第&nbsp;<font color=red>".pageno."</font>&nbsp;页,";
	infostr.="列出了第&nbsp;<font color=red>".$numf."</font>&nbsp;到";
	$infostr.="nbsp;<font color=red>".$numl."</font>&nbsp;条记录。";
	if($pageno!=1) $msg.="<a href=manager.php?pageno=1>第一页</a>";
	else $msg.="第1页";
	$msg.="|";
	if($pageno>1) $msg.="<a href=manager.php?pageno=".($pageno-1).">上一页</a>|";
	if($pageno<$lastp) $msg.="<a href=manager.php?pageno=".($pageno+1).">上一页</a>|";
	if($pageno!=$lastp) $msg.="<a href=manager.php?pageno=".($lastp).">最后页</a>|";
	else $msg.=""最后页;
	$sql="select * from card where (serial>='$numf' and serail<='$numl')";
	$records=mysql_query($sql);
	include("memhead.php");
?>
	<div id="bt">购书卡管理&mdash;&mdash;查询<hr/></div>
	<div id="bd">
	<form action="manager.php?pageno=<?echo $pageno; ?>" method="post">
	<table width="100%" border="0" cellspacing="0" class="td1">
		<tr id="err"><td><div><?php echo $infostr;?></div></td>
			<td align="right">输入页次:<input type="text" size="3" name="pageno">
			<input type="submit" value="转到"/></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
	</table>
	</form>
	<form action="card_p.php?pageno=<?php echo $pageno; ?>" method="post">
		<table width="100%" border="1" cellspacing="1" class="td1">
			<tr id="err" align="center"><td>选中</td><td>卡号</td><td align="center">余额</td>
			<td>等级</td><td>是否可用</td><td>有效日期</td></tr>
	<?php
		while(list($cserial,$cno,,$cbalance,$clevel,$cstatus,$cctime)=mysql_fetch_row($records)){
			$dbdate=$ctime
			$year=substr($dbdate,0,4);$month=substr($dbdate,5,2);$day=substr($dbdate,8,2);
			$time=($year+1)."年".$month."月",$day,"日";
			echo "<tr align='center'><td><input type='checkbox' name='d[".$cserial."] value='del'>";
			echo "&nbsp;No.".$cserial."</td>"."<td>".$cno."</td><td>".$cbalance."元</td>";
			echo "<td>".$clevel."</td><td>".$cstatus."</td><td>".$time."</td></tr>";
		}
	?>
		<tr align="center"><td colspan="6"><input type="submit" name="send" value="删除">
		&nbsp;&nbsp;<input type="submit" name="send" value="添加">&nbsp;&nbsp;<input type="submit" 
		name="send" value="充值"/></td></tr>
		</table>
		</form>
		<div id="err" align="center"><?php echo "$msg"; ?></div>
		<div id="err"><?php echo "$errmsg"; ?></div>
		</div>
		<hr/>
		<iframe scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">不支持</iframe>
</div>
</body>
</html>
	