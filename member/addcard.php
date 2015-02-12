<?php
 $sendadd=$_POST['sendadd'];$cardno=$_POST['cardno'];
 $password=$_POST['password'];$balance=$_POST['balance'];
 if($sendadd=='确定添加'){//单击【确定】按钮的处理
 	if($cardno=="") $msg="输入购书卡号不能为空";
 	else if($password=="") $msg="输入购书卡密码不能为空";
 	else if($balance=="") $msg="输入购书卡金额不能为空";
 	else(
 		switch($balance){
 			case 2000: $cardlevel="钻石卡";break;
 			case 1500: $cardlevel="金卡";break;
 			case 1000: $cardlevel="银卡";break;
 			case 500: $cardlevel="普通卡";break;
 		}
 	require_once("opendata.php.inc");
 	$sql="select * from card where cardno=$cardno";
 	$records=myql_query($sql);
 	if(myqsl_num_rows($records)>0) $msg="购书卡已经存在";
 	else(
 		$sql="insert into card (cardno,cardpsd,balance,cardlevel,cardstatus,
 		ctime) values('$cardno','$password','$balance','$cardlevel','Y',CURRENT_TIMESTAMP)";
 		$records=mysql_query($sql);
 		$msg="添加成功";
 	}
 }
 echo "<meta http-equiv='Refresh' content='0;url=addcard.php?msg=$msg'>";
 }
 else if($sendadd=='返回') header("Location:manager.php");//单击【返回】按钮的处理
 $title="购书卡管理&mdash;&mdash;添加";
 include("memhead.php");
?>
	<div id="bt">购书卡管理&mdash;&mdash;添加<hr/></div>
	<div id="bd">
		<form action="addcard.php" method="post">
			<table width="100%" border="0" cellspacing="0" calss="td1">
				<tr><td width="30%" align="right">输入购书卡号</td>
					<td><input type="text" name="cardno" size="30"/></td></tr>
				<tr><td align="right">输入购书卡密码</td>
					<td><input type="text" name="password" size="20"/></td></tr>
				<tr><td align="right">选择购书卡类别</td>
					<td><select name="balance" size="1">
						<option value="500">普通卡</option>
						<option value="1000">银卡</option>
						<option value="1500">金卡</option>
						<option value="2000">钻石卡</option>
					</select></td></tr>
				<tr><td align="center" colspan=2>
					<input type="submit" name="sendadd" value="确定添加"/>
					<input type="submit" name="sendadd" value="返回"/>
				</table>
			</form>
			<div id="err" align="center"><? echo $msg;?></div>
			</div>
			<hr/>
		<iframe scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">不支持</iframe>
</div>
</body>
</html>