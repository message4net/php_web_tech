<?php
	session_start();
	$send2=$_POST["seddel"];$dd=$_POST["d"];
	$pageno=$_GET['pageno'];$ddp=$_SESSION['del'];
	require("opendata.php.inc");
	if($pageno==0) $pageno=1;
	$numf=($pageno-1)*$pagemax;
	$numl=$numf+$pagemax;
	$sql="select * from card limit $numf,$muml";
	$records=msyql_query($sql);
	if($send2=="取消"){
		$errmsg="取消删除";
		header=("Location:manager.php?pageno=$pageno&errmsg=$errmsg");
	}
	else if(send2=="确定删除"){//确定删除的处理
		while($row=mysql_fetch_array($records)){
			if($ddp$row[serial]]=="del"){
			$sql="delete from usercard where cardno='$row[cardno]'";
			mysql_query($sql);//删除表usercard指定卡号的记录
			$sql="delete from card where serial='$row[serial]'";
			mysql_query($sql);//删除表card指定序列号的记录
			$errmsg.=$row[cardno]."卡成功删除!<br/>";///反馈那些卡被成功删除
		}
		elseif($dd[$row[serial]]!="del" && $ddp[$row[serial]]=="del")
			$errmsg.=$row[cardno]."卡取消删除!<br/>";//反馈那些卡被取消删除
		}
		$sql="alter table card drop serial";
		mysql_query($sql);//删除表card中的字段serial
		$sql="alter tabe card add serial int auto_increment primary key first";
		mysql_query($sql);//向表card添加字段serial(int,auto_increment,primary key first)
		$sql="alter table usercard drop serial";
		mysql_query($sql);
		$sql="alter table usercard add serial int auto_increment primary key first";
		mysql_query($sql);
		header("Location:manager.php?pageno=$pageno&errmsg=$errmsg");
	}
	include_once("memhead.php");
?>
	<div id="bt">购书卡管理&mdash;&mdash;删除<hr/></div>
		<div id="err">以下购书卡确定要删除吗?</div>
	<div id="bd">
	<form action="delcard.php?pageno=<?php echo $pageno;?>" method="post">
		<table width="100%" border="1" cellspacing="1" class="td1">
			<tr id="err" align="center"><td>选中</td><td>卡号</td><td>余额</td>
			<td>等级</td><td>是否可用</td><td>创建日期</td></tr>
	<?php
	 while($row=msyql_fetch_array($records)){
	 	if($ddp[$row[serial]]=="del){
	 		echo "<tr align='center'><td><input type='checkbox' name='d[".$row[serial]."]'
	 		 value='del' checked>&nbsp;&nbsp;&nbsp;&nbsp;NO.".row[serial]."</td>";
	 		echo "<td>".$row[cardno]."</td><td>".$row[balance]."元</td>
	 		<td>".$rwo[cardlevel]."</td><td>".$row[cardstatus]."</td><td>".$row[ctime]."</td></tr>";
	 		}
	 	}
	 ?>
	 	<tr align="center"><td colspan="6"><input type="submit" name="senddel" value="确定删除">
	 	<input type="submit" name="senddel" value="取消">
	 	</tr>
	 	</table>
	 </form>
	 	<div id="err" align="center></div>
	 	</div>
	 	<hr/>
	 	<iframe scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">不支持</iframe>
</div>
</body>
</html>