<?php
	require_once("bbshead.php");
	include_once("sys_conf.inc");
	$connection=@mysql_connect($DBHOST,$DBUSER,$DBPWD) or die("无法连接数据库");
	@mysql_query("set names 'gb2312'");
	@mysql_select_db("guest") or die("无法选择数据库");
	$query="select * from guestlist where flag='Y' order by btime desc";
	$result=mysql_query($query,$connection) or die(mysql_error());
	$count=mysql_num_rows($result);//统计留言主题信息
	//制作信息条
	$bbsinfostr="目前本主题共有".$count."条留言恢复。";
	if($page<=0||$count==0) $page=0;
	$msgPerPage=10;//设置一页中显示的最多记录数
	$start=$page*$msgPerPage;//设置每页开始的记录序号
	$end=$start+$msgPerPage;//设置每页结束的记录序号
	if($end>$count) $end=$count;
	$totalpage=ceil($count/$msgPerPage);
	if($count>0) $bbsinfostr.="本页列出了第".($start+1)."至".$end."条\n";
	//制作页导航条
	if($page>0) $numestr="<a href='$_SERVER[PHP_SELF]?page=".($page-1)."'>
	上一页|</a>".$numestr;
	for($i=0;($i<$totalpage);$i++){
		if($i==$page) $numestr=$numestr.($i+1);
		else $numestr=$numestr."<a href='$_SERVER[PHP_SELF]?page=$i'>"
		.($i+1)."</a>";
	if($i!=($totalpage-1)) $numestr=$numestr."|";
	}
	if($page<($totalpage-1)) 
		$numestr=$numestr."<a href='$_SERVER[PHP_SELF]?page=".($page+1)."'>
	|下一页</a>";
	$query="select * from guestlist where flag='Y' order by btime desc limit $start,$msgPerPage";
	$result=mysql_query($query,$connection) or die("读取数据失败");//查询本页留言主题信息
?>
	<div id="bt">查看留言<hr/></div>
	<div id="err"><?php echo $bbsinfostr;?></div>
	<div id="bd">
		<table width="100%" border="1" cellspacing="1" class="tdl">
			<tr align="center" id="bitem"><td>主&nbsp;&nbsp;题</td><td>版&nbsp;&nbsp;主</td>
			<td>发帖时间</td><td>回复次数</td><td>删&nbsp;&nbsp;除</td></tr>
<?php
	while($row=@mysql_fetch_array($result)){//输出留言主题
		//格式化时间输出
		$dbdate=$row[btime];
		$year=substr($dbdate,0,4);//获取年
		$month=substr($dbdate,5,2);//获取月
		$day=substr($dbdate,8,2);//获取日
		$hour=substr($dbdate,11,2);//获取小时
		$min=substr($dbdate,14,2);//获取分钟
		$sec=substr($dbdate,17,2);//获取秒
		$time=$year."年".$month."月".$day."日".$hour."时".$min."分".$sec."秒";
		//输入一条留言主题的信息
		echo "<tr align='center'><td><a href='adminviewinfo.php?btitle=
		".$row[btitle]."'>".$row[btitle]."</a></td>";
		echo "<td>".$row[name]."</td><td>".$time."</td>";
		$query="select * from replylist where ( flag='Y' and btitle='".$row[btitle]."')";
		$result1=@mysql_query($query,$connection) or die("读取数据失败");
		$replynum=mysql_num_rows($result1);
		echo "<td>".$replynum."</td>";
		echo "<td><a href='delete.php?btitle=".$gb[$i][btitle]."'>删除</a></td></tr>";
	}
	@mysql_close($connection) or die("无法断开与数据库的连接");
	?>
		</table>
		</div>
		<div id="err" align="center"><?php echo $numestr;?></div>
		<hr/>
		<iframe scrolling="no" width="780" height="60" src="bbsbottom.html"
	marginwidth="0" marginheight="0" border="0" frameborder="0" align="center">
	不支持</iframe>
</body>
</html>