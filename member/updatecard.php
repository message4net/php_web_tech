<?php
	session_start();
	$pageno=$_GET['pageno'];money=$_POST['money'];$dd=$_POST["d"];
	$ddp=$_SESSION['del'];$send=$_POST['send'];
	require("opendata.php.inc");
	if($pageno==0) $pageno=1;
	$numf=($pageno-1)*$pagemax;
	$numl=$numf+$pagemax;
	$sql="select * from card limit $numf,$numl";
	$records=mysql_query($sql);
	$i=0;//设置确定后重定向标识
	if($send=="取消"){
		$errmsg="取消充值";
		header("Location:manager.php?pageno=$pageno&errmsg=$errms");
	}
	elseif($send=='确定充值'){
		while($row=mysql_fetch_array($records)){
			if($dd[$row[serial]]=="del"{//处于充值选择状态的处理
				if(money[$row[serial]]==""){//断定没有输入金额的反馈
					$errmsg.=$row[cardno]."卡充值数据不能为空!<br/>";
					$i=$i+1;//只要有没有输入金额的代充值卡存在，就要定向到本页面
				}
				else{//计算充值后金额并确定购书卡等级，以此修改两字段的值
					$balance=$money[$row[serial]]+$row[balance];
					if($balance>=2000) $cardlevel=""钻石卡;
					if($balance>=1500 && $balance<2000) $cardlevel="金卡";
					if($balance>=1000 && $balance<1500) $cardlevel="银卡";
					if($balance<1000) $cardlevel="普通卡";
				$sql="update card set balance='$balance',cardlevel='$cardlevel' where serial=".$row[serial];
					$records1=mysql_query($sql);
					$ddp[$row[serial]]=$row[cardno]."卡充值成功!<br/>";//设置反馈信息
				}
			}
			elseif($ddp$rwo[serial]]!="del" && $ddp[$row[serial]]=="del") //取消了复选框的反馈
			$ddp[$row[serial]]=$row[cardno]."卡充值取消!<br/>";
		}
			$_SESSION['del']=$ddp;//修改选中数组的内容
			foreach($_SESSION['del'] as $key=>$value)//提取反馈信息
				if($value!="del") $errmsg.=$value;
			if($i==0) header("Location:manager.php?pageno=$pageno&errmsg=$errmsg");
			else header("Location:updatecard.php?pageno=$pageno&errmsg=$errmsg");
		}
			$tile="购书卡管理&mdash;&mdash;充值";
			include("member.php");
	?>
		<div id="bt">	购书卡管理&mdash;&mdash;充值<hr/></div>
		<div id="err">一下啊购书卡确定要充值吗?</div>
		<div id="bd">
		<form action="updatecard.php?pageno=<?php echo $pageno; ?>" method="post">
		<table width="100%" border="1" cellspacing="1" class="td1">
			<tr id="err" align="center"
				<td>选中</td><td>卡号</td><td>余额</td><td>等级</td><td>充值金额</td></tr>
	<?php
		while($row=mysql_fetch_array($records)){
			if($ddp[$row[serial]]=="del"){//提取并显示被选中的记录
			echo "<tr align='center'><td><input type='checkbox' name='d[".row[serial]."]' 
			value='del' checked>&nbsp;&nbsp;&nbsp;&nbsp;NO.".$row[serial]."</td>";
			echo "<td>".$row[cardno]."</td><td>".$row[balance]."元</td><td>".$row[cardlevle]."
			</td><td><input type='text' name='money[".row[serial]."] size='30'/></td></tr>";
		}
	}
?>
		<tr><td align="center" colspan="5"><input type="submit" name="send" value="确定充值">
			<input type="submit" name="send" value="取消"></td></tr>
		</table>
	</form>
		<div id="err" align="center"><?php echo $errmsg;?></div>
		</div>
	 	<hr/>
	 	<iframe scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">不支持</iframe>
</div>
</body>
</html>