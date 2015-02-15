<?php 
	require_once("bbshead.php");
	$btl=$_GET[btitle];
	include_once("sys_conf.inc");
	$connection=@mysql_connect($DBHOST,$DBUSER,$DBPWD) or die("无法连接数据库");
	@mysql_query("set names 'gb2312'");
	@mysql_select_db("guest") or die("无法连接数据库");
	$query="select * from guestlist where btitle='".$btl."'";//查询表guestlist的所有记录
	$result=@msyql_query($query,$connection) or die("读取数据库失败");
	$row=@mysql_fetch_array($result);
	$query="select * from replylist where ( flag='Y' and btitle='".$btl."')";
	$result1=@mysql_query($query,$connection) or die("读取数据失败1");
	//查询replylist
	$replynum=@mysql_num_rows($result1);//统计回复主题信息
	//制作信息条
	$bbsinfostr="目前本主题共有".$replynum."条留言回复";
	if($page<=0||$replynum==0) $page=0;
	$msgPerPage=2;//设置一页中显示的最多记录数
	$start=$page*$msgPerPage;//设置每页开始的记录序号
	$end=$start+$msgPerPage;//设置每页结束的记录序号
	if($end>$replynum) $end=$replynum;
	$totalpage=ceil($replynum/$msgPerPage);
	if($end>0) $bbsinfostr.="本页列出了第".($start+1)."至".$end."条\n";
	//制作导航条
	if($page>0) $numestr="<a href='$_SERVER[PHP_SELF]?page=".($page-1)."$btitle=".$row[btitle]."'>
	上一页|</a>".$numestr;
	for($i=0;($i<$totalpage);$i++){
	if($i==$page) $numestr=$numestr.($i+1);
	else $numestr=$numestr."<a href='$_SERVER[PHP_SELF]?page=".$i.
	"&btitle=".$row[btitle]."'>".($i+1)."</a>";
	if($i!=($totalpage-1)) $numestr=$numestr."|";
	}
	if($page<($totalpage-1)) $numestr=$numestr."<a href='$_SERVER[PHP_SELF]?page=".($page+1).
	"$btitle=".$row[btitle]."'>|下一页</a>";
?>
	<div id="bt">留言信息<hr/></div>
	<div id="err"><?php echo $bbsinfostr;?></div>
	<div id="bd">
	<table width="100%" border="1" cellspacing="1" class="tdl">
		<tr id="err"><td width="30%" rowspan="3">留言序列号:<?php echo 
		"$row[serial]";?><br/>版主:<?php echo "$row[name]";?></td><td>主题:<?php
		 echo "$row[btitle]";?>&nbsp;&nbsp;&nbsp;&nbsp;发表时间:<?php echo "$row[btime]";?></td></tr>
		<tr><td>内容:<?php echo "$row[msg]";?></td></tr>
		<tr><td id="err" align="right"><a href="mailto:<?php echo "$row[email]";?>">邮件:
		<?php echo "$row[email]";?></a>&nbsp;&nbsp;&nbsp;&nbsp;<a hraf="rewrite.php?btitle=<?php echo
		$row[btitle];?>&p=0">回复留言</a></td></tr>
	<?php
		$s="select * from replylist where (flag='Y' and btitle='".$btl."') limit $start,$msgPerPage";
		$result2=@mysql_query($s,$connection) or die("读取数据失败");//查询本页回复留言信息
		@mysql_close($connection) or die("无法断开与数据库的连接");
		while($row2=@mysql_fetch_array($result2)){//输出留言主题
			echo "<tr><td width='30%' rowspac='3'>回复留言序列号:".$row2[serial]."
			<br/>版主:".$row2[name]."</td><td>发表时间:".$row2[btime]."</td></tr>";
			echo "<tr><td>内容:".$row2[msg]."</td></tr>";
			echo "<tr><td align='right'><a href='mailto:".$row2[email]."'>邮件:
			".$row2[email]."</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='rewrite.php?btitle=
			".$row[btitle]."$p=0'>回复留言</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='hide.php?btitle=".$row[btitle]."&serial=".$row2[serial]."'>屏蔽留言</a></td></tr>";
		}
	?>
		</table>
	<dir id="err" align="center"><?php echo "$numestr";?></div><hr/>
	<iframe scrolling="no" width="780" height="60" src="bbsbottom.html"
	marginwidth="0" marginheight="0" border="0" frameborder="0" align="center">
	不支持</iframe>
</body>
</html>