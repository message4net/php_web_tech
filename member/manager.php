<?php
	if($pageno<>$_GET["pageno"]) $pageno=$_POST["pageno"];
	require("opendata.php.inc");
	$sql="select * from card";
	$records=mysql_query($sql);
	$total=mysql_num_rows($records);
	$lastp=ceil($total/$pagemax);
	$infostr="Ŀǰ����&nbsp;<font color=red>".$total."</font>&nbsp;�Ź��鿨����&nbsp;
	<font color=blue>".$lastp."</font>&nbsp;ҳ��";
	if($pageno>$lastp) $pageno=$lastp;
	elseif($pageno<1) $pageno=1;
	$numf=($pagenum-1)*$pagemax+1;
	$numl=($numf+$pagemax-1);
	if($numl>$total) $numl=$total;
	$infostr.="��ҳ�ǵ�&nbsp;<font color=red>".pageno."</font>&nbsp;ҳ,";
	infostr.="�г��˵�&nbsp;<font color=red>".$numf."</font>&nbsp;��";
	$infostr.="nbsp;<font color=red>".$numl."</font>&nbsp;����¼��";
	if($pageno!=1) $msg.="<a href=manager.php?pageno=1>��һҳ</a>";
	else $msg.="��1ҳ";
	$msg.="|";
	if($pageno>1) $msg.="<a href=manager.php?pageno=".($pageno-1).">��һҳ</a>|";
	if($pageno<$lastp) $msg.="<a href=manager.php?pageno=".($pageno+1).">��һҳ</a>|";
	if($pageno!=$lastp) $msg.="<a href=manager.php?pageno=".($lastp).">���ҳ</a>|";
	else $msg.=""���ҳ;
	$sql="select * from card where (serial>='$numf' and serail<='$numl')";
	$records=mysql_query($sql);
	include("memhead.php");
?>
	<div id="bt">���鿨����&mdash;&mdash;��ѯ<hr/></div>
	<div id="bd">
	<form action="manager.php?pageno=<?echo $pageno; ?>" method="post">
	<table width="100%" border="0" cellspacing="0" class="td1">
		<tr id="err"><td><div><?php echo $infostr;?></div></td>
			<td align="right">����ҳ��:<input type="text" size="3" name="pageno">
			<input type="submit" value="ת��"/></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
	</table>
	</form>
	<form action="card_p.php?pageno=<?php echo $pageno; ?>" method="post">
		<table width="100%" border="1" cellspacing="1" class="td1">
			<tr id="err" align="center"><td>ѡ��</td><td>����</td><td align="center">���</td>
			<td>�ȼ�</td><td>�Ƿ����</td><td>��Ч����</td></tr>
	<?php
		while(list($cserial,$cno,,$cbalance,$clevel,$cstatus,$cctime)=mysql_fetch_row($records)){
			$dbdate=$ctime
			$year=substr($dbdate,0,4);$month=substr($dbdate,5,2);$day=substr($dbdate,8,2);
			$time=($year+1)."��".$month."��",$day,"��";
			echo "<tr align='center'><td><input type='checkbox' name='d[".$cserial."] value='del'>";
			echo "&nbsp;No.".$cserial."</td>"."<td>".$cno."</td><td>".$cbalance."Ԫ</td>";
			echo "<td>".$clevel."</td><td>".$cstatus."</td><td>".$time."</td></tr>";
		}
	?>
		<tr align="center"><td colspan="6"><input type="submit" name="send" value="ɾ��">
		&nbsp;&nbsp;<input type="submit" name="send" value="���">&nbsp;&nbsp;<input type="submit" 
		name="send" value="��ֵ"/></td></tr>
		</table>
		</form>
		<div id="err" align="center"><?php echo "$msg"; ?></div>
		<div id="err"><?php echo "$errmsg"; ?></div>
		</div>
		<hr/>
		<iframe scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">��֧��</iframe>
</div>
</body>
</html>
	