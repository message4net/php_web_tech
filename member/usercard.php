<?php
session_start();//启动对话
$user_id=$_SESSION['userid'];//获取SESSION的userid值
if($pageno<>$_GET["pageno"])$pageno=$_POST["pageno"];//获取pageno的值
require_once("opendata.php.inc");
$sql="select * from usercard where userid='$userid'";
$records=mysql_query($sql);//查询数据表usercard中指定会员id的信息
if(mysql_num_rows($records)==0){//数据表usercard中没有指定会员id的信息
 $errmsg="没有申请过购书卡!";
 header("Location:applycard.php?errmsg=$errmsg");
  }
$total=mysql_num_rows($records);//统计数据表usercard中有指定会员id的信息数
$lastp=ceil($total/$pagemax);//计算最大页码
$infostr="目前共有$nbsp;<font color=red>".$total."</font>$nbsp;张购书卡,共
&nbsp;<font color=blue>".$lastp."</font>&nbsp;页。";//设置信息栏上的信息
if($pageno>$lastp)$pageno=$lastp;//当前页码超出最大页码时，设置为最大页码
elseif($pageno<1) $pageno=1;
$numf=($pageno-1)*$pagemax+1;//设置当前页的第一条记录数码
$numl=$numf+$pagemax-1;//设置当前页最后一条记录码
if($numl>$total) $numl=$total;//当前最后记录超出总记录时，设置为超出总记录数
$infostr.="本页是$nbsp;<font color=red>".$pageno."</font>&nbsp;页,";
$infostr.="列出了第&nbsp;<font color=red>".$numf."</font>&nbsp;到&nbsp;<font color=red> "
.$numl."</font>$nbsp;条记录。";
if($pageno!=1)$msg.="<a href=".$_SERVER['PHP_SELF']."?pageno=1>第1页</a>";
else $msg.="第1页";//当前页是第一页时，不要设置连接
$msg.="|";//加分隔符|
if($pageno>1)//当前页大于第一页时，对"上一页"要设置超链接
$msg.="<a href=".$_SERVER['PHP_SELF']."?pageno=".($pageno-1).">上一页</a>|";
if($pageno<$lastp)//当前页小于走后页时，要设置连接
$msg.="<a href=".$_SERVER['PHP_SELF']."?pageno=".($pageno+1).">下一页</a>|";
if($pageno!=$lastp)//当前页不是最后页时，对“上一页”要设置连接
$msg.="<a href=".$_SERVER['PHP_SELF']."?pageno=".($lastp).">最后页</a>";
else $msg.="最后页";//当前页是最后页时，不要设置连接
$i=1;//读取指定会员的id卡号信息
while($row=mysql_fetch_array($records)){
$cardno[$i]=$row[cardno];
$i++;
}
$title="会员购书卡查询";//设置当前页标题
include("memhead.php");//包含头部
?>
	<div id="bt">会员购书卡查询<hr/></div>
	<div id="bd">
		<form action="<?php echo $_SERVER['PHP_SELF']?>?pageno=<?php echo $pageno; ?>" method="post">
	<table width="100%" border="0" cellspacing="0" class="td1">
		<tr id="err"><td><div><?php echo $infostr; ?></div></td><!--状态栏-->
			<td align="right">输入页次:<input type="text" size="3" name="pageno">
				<input type="submit" value="转到"/></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr><!--状态栏-->
	</table>
		</form>
		<form action="applycard.php" method="post">
			<table width="100%" border="1" cellspacing="1" class="td1">
				<tr id="err" align="center"><td>序号</td><td>卡号</td><td>余额</td>
				<td>等级</td><td>密码</td><td>有效日期</td></tr>
<?php 
 for($i=$numf;$i<=$numl;$i++){//显示当前页的购书卡信息
 	mysql_query("set names gbk;");
 	$sql3="select * from card where cardno='$cardno[$i]'";
 	$records3=mysql_query($sql3);//查询指定卡号的购书卡信息
 	$row2=mysql_fetch_array($records3);
 	$dbdate=$row2[ctime];//获取购书卡生成日期
 	$year=substr($dbdate,0,4);//获取字符串中的年
 	$month=substr($dbdate,5,2);//获取字符串中的月
 	$day=substr($dbdate,8,2);//获取字符串中的日
 	$time=($year+2)."年".$month."月".$day."日";//生成购书卡的有效期
 	echo "<tr align='center'><td>NO.".$i."</td>";
 	echo "<td>&nbsp;".$row2[cardno]."</td><td>&nbsp;".$row2[balance]."元</td><td>&nbsp;".
 	$row2[cardlevel]."</td>";
 	echo "<td>&nbsp;".$row2[cardpsd]."</td><td>&nbsp;".$time."</td></tr>";
 	}
 	?>
	<tr align="center">
		<td colspac="6"><input type="submit" name="send" value="申请购书卡"></td></tr>
		</table>
		</form>
	<div id="err" align="center"><?php echo "$msg"; ?></div> <!--翻页导航栏-->
	<div id="err"><?php echo "$errmsg";?></div>
	</div>
	<hr/>
		<iframe scrolling="no" width="780" height="60" src="membottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">不支持</iframe>
</div>
</body>
</html>