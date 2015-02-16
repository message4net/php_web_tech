<?php
	require_once("chathead.php");
	include_once("sys_conf.inc");
	$connection=@mysql_connect($DBHOST,$DBUSER,$DBPWD) or die("无法连接数据库");
	@mysql_query("set names 'gb2312'");
	@mysql_select_db("chat") or die ("无法选择数据库");
	$query="select * from chatroom";
	$result=mysql_query($query,$connection) or die("读取数据库失败".mysql_error());
	@mysql_close($connection) or die("无法断开与数据库的连接");
	$chatnum=mysql_num_rows($result);
	$chatinfostr="本聊天室共有".$chatnum."条聊天记录。";//制作信息条
	if($page<=0||$chatnum==0) $page=0;
	$msgPerPage=10;//设置一夜中显示的最多记录数
	$start=$page*$msgPerPage;//设置每页开始的记录序号
	$end=$start+$msgPerPage;//设置每页结束的记录序号
	if($end>$chatnum) $end=$chatnum;
	$totalpage=ceil($chatnum/$msgPerPage);
	if($chatnum>0) $chatinfostr.="本页列出了第".($start+1)."至".$end."条。";
?>
	<div id="bt">查看聊天记录<hr/></div>
	<div id="err"><?echo $chatinfostr;?></div>
	<div id="bd">
		<table width="100%" border="1" cellspacing="1" class="tdl">
			<tr align="center" id="err"><td width="8%">序号</td><td width="10%">
			聊客</td>
			<td width="20%">聊天时间</td><td>聊天内容</td></tr>
<?php
	for($i=$start;$i<$end;$i++){//输出聊天信息
		@mysql_data_seek($result,$i);
		list($cid,$cauthor,$cctime,$cemotion,$caction,$ccolor,$ctext)=mysql_fetch_row($result);
		if($ctext!==""|| $cemotion!="") $chatstr.=$cemotion."说道：<font color=$ccolor>".$ctext."</font><br/>";
		else $chatstr.="<font color='blue'>".$caction."</font><br/>";
		//输出一条聊天信息
		echo "<tr><td>".$cid."</td><td>".$cauthor."</td><td>".$cctime."</td><td>".$chatstr."</td></tr>";
		$chatstr="";
	}
	if($page==$totalpage-1)
		for($j=$msgPerPage;$j>($i-10*floor($i/10));$j--){//一页中记录不足最大数时，补充空行
			echo "<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
		}
		//制作页导航
		if($page>0)
			$numestr="<a href=$_SERVER[PHP_SELF]?page=".($page-1).">上一页</a>|".$numestr;
		for($i=0;($i<$totalpage);$i++){
		if($i==$page) $numestr=$numestr.($i+1);
		else $numestr=$numestr."<a href=$_SERVER[PHP_SELF]?page=$i>".($i+1)."</a>";
		if($i!=($totalpage-1)) $numestr=$numestr."|";
	}
	if($page<($totalpage-1)) $numestr=$numestr."|<a href=$_SERVER[PHP_SELF]?page=".($page+1).">下一页</a>";
?>
	</table>
	</div>
	<div id="err" align="center"><?php echo "$numestr"; ?></div><hr/>
	<iframe scrolling="no" width="780" height="60" src="chatbottom.html"
	marginwidth="0" marginheight="0" border="0" frameborder="0" align="center">
	不支持</iframe>
	</div>
</body>
</html>