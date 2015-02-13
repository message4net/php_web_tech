<?php
	session_start();//获取session的userid值
	$userid=$_SESSION['userid'];
	$sendadd=$_POST['sendapp'];$cardno=$_POST['cardno'];//获取提交的表单数据
	$password=$_POST['password'];$password2=$_POST['password2'];
	if($sendadd=='确定'){//单击【确定】按钮的处理
		if(cardno==""){//对表单输入的合法性检查
			$msg="输入购书卡号不能为空";
			echo "<meta http-equiv='Refresh' content='0;url=applycard?msg=$msg'>";
			}
		else if($password==""||$password2==""){
			$msg="输入购书卡密码不能为空";
			echo "<meta http-equiv='Refresh' content='0;url=applycard?msg=$msg'>";
			}
		else if($password!=$password2){
			$msg="输入密码不一致";
			echo "<meta http-equiv='Refresh' content='0;url=applycard?msg=$msg'>";
			}//对输入表单合法性的检查
		require("opendata.php.inc");//连接数据库，查询数据表card
		$query="select * from card where cardno='$cardno'";
		$result=@mysql_query($query,$connection) or die("浏览失败！a");
		if($row=mysql_fetch_array($result)){//数据表card中存在用户输入的卡号
			if($row[cardstatus]=="N"){//卡号状态不可用
				$msg="该卡不能使用!";
				echo "<meta http-equiv='Refresh' content='0;url=applycard.php?msg=$msg'>";
			}
			elseif($row[cardpsd]==$password){//卡号状态可用并且输入密码正确
				$errmsg="申请成功!";
				$query="insert into usercard (userid,cardno) values('$userid','$cardno')";
				$result=@mysql_query($query,$connection) or die("浏览失败!b".mysql_error());
				$query="update card set cardstatus='N' where cardno='$cardno'";
				$result=@mysql_query($query,$connection) or die("浏览失败!c");
				echo "<meta http-equiv='Refresh' content='0;url=usercard.php?errmsg=$errmsg'>";
			}
			else{//卡号状态可用且用户输入的密码不正确
				$msg="密码错误，请重新输入!";
				echo "<meta http-equiv='Refresh' content='0;url=applycard.php?msg=$msg'>";
			}
		}
		else{//数据表card中没有用户输入的卡号
			$msg="不存在该卡号，请重新输入!";
				echo "<meta http-equiv='Refresh' content='0;url=applycard.php?msg=$msg'>";
			}
		}
		elseif($sendapp=='跳过') header("Location:memindex.php");
		$title="购书卡申请";
		include_once("memhead.php")
?>
	<div id="bt">购书卡申请<hr/></div>
	<div id="bd">
	<div id="err"><?php echo $_SESSION['userid']; ?>->正在申请购书卡</div>
	<form action="applycard.php" method="post">
	<table width="100%" border="0" cellspacing="0" class="td1">
		<tr><td width="30%" align="right">输入购书卡号</td><td><input type="text" name="cardno"
		size="30"/>(位数4-30,必须由字母与数字组成</td></tr>
		<tr><td align="right">输入购书卡密码</td><td><input type="password" name="password"
		size="20"/>(位数6-20,必须有字母数字组成)</td></tr>
		<tr><td align="right">确认购书卡密码</td><td><input type="password" name="password2"
		size="20"/></td></tr>
		<tr><td align="center" colspan=2><input type="submit" name="sendapp" value="确定">
		<input type="submit" name="sendapp" value="跳过"></td></tr>
		</table>
	</form>
	<div id="err: align="center"><?php echo $msg; ?></div><!--反馈信息蓝-->
	</div>
	<hr/>
		<iframe scrolling="no" width="780" height="60" src="membottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">不支持</iframe>
</div>
</body>
</html>