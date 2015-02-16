<?php
	$opt1="";$opt2="";$slt_text_color="";//初始化自定义变量
	require_once("sys_conf.inc");//选择数据库
	$link_id=mysql_connect($DBHOST,$DBUSER,$DBPWD) or die("无法连接数据库");
	@mysql_query("set names 'gb2312'");
	@mysql_select_db($DBNAME) or die("无法选择数据库");
	$author=$_SESSION["user_name"];
	if(isset($_POST["slt_text_color"])){//选择字体颜色
		switch($_POST["slt_text_color"]){
			case "红色": $color="red";break;
			case "蓝色": $color="blue";break;
			case "灰色": $color="gray";break;
			default: $color="black";
		}
	}
	if($behavior=="发言"){//发言
		if($_POST["text"]!=""||$_POST["emotion"]!=""){
		$sql="insert into chatroom (author,chattime,emotion,action,color,text)";
		$sql.=" values('$author',CURRENT_TIMESTAMP,'$emotion','','$color','$text')";
		$result=mysql_query($sql,$link_id) or die("存入数据库失败1".mysql_error());
		echo "<meta http-equiv='Refresh' content='0;url=main.php'>";
	}
		$behavior="";
	}
	if($behavior=="发送"){//动作
		if($_POST["action"]!=""){
			$sql="insert into chatroom (author,chattime,emotion,action,color,text)";
			$sql.=" values('$author',CURRENT_TIMESTAMP,'','$action','','')";
			$result=mysql_query($sql,$link_id) or die("存入数据库失败".mysql_error());
		echo "<meta http-equiv='Refresh' content='0;url=main.php'>";
		}
		$behavior="";
	}
	if($behavior=="踢人"){//踢人
		$sql="update chat.user set is_online='0' where user.name='$kick'";
		$result=mysql_query($sql,$link_id) or die("查询数据库失败".mysql_error());
		echo "<meta http-equiv='Refresh' content='0;url=main.php'>";
		$behavior="";
	}
?>
		<hr/>
		<form action="main.php" method="POST" target="_self">
			<table width="100%" border="1" align="center" cellspacing="0" id="err">
			<tr>
			<td rowspan="2" align="center">本机聊客<br/><?php echo $_SESSION["user_name"];?></td>
			<td>表情<select name="emotion" size="1"><!--表情-->
<?php if($emotion) $opt1=$emotion;?>
	<option selected><?php echo $opt1; ?></option>
	<option>害羞的</option>
	<option>高兴的</option>
	<option>难过的</option>
	<option>傻呆呆的</option>
	<option>惊奇的</option>
	<option>笑眯眯的</option>
	<option>吞吞吐吐的</option>
	<option>愤怒的</option>
	<option>语重心长的</option>
	<option>迷惑的</option></select>
	文本颜色<select size="1" name="slt_text_color"><!--文字颜色-->
<?php if(isset($slt_text_color)){?>
	<option selected><?php echo $slt_text_color;}?></option>
	<option>红色</option><option>蓝色</option><option>灰色</option></select>
	<input name="text" type="text" size="40"/></td>
	<td><input type="submit" name="behavior" value="发言"/></td></tr>
	<tr><td>动作<select size="1" name="action"><!--动作-->
<?php if($action) $opt2=$action;?>
	<option selected><?php echo $opt2 ?></option>
	<option>双手抱拳,作个辑道：各位朋友请了!</option>
	<option>开始认真考虑</option>
	<option>挺起胸膛，大声喊道：让我来说</option>
	<option>摇了摇头，叹道：还不明白</option>
	<option>板着脸，咬着牙说：不！我怎么这么笨</option>
	<option>凄婉说道：看来，我还得再看看书</option>
	<option>捧着肚子，嘻嘻哈哈直笑得两眼翻白，喘不过气来</option>
	<option>快乐唱到：我明白了</option>
	<option>叹了口气，说道：还得努力</option>
	<option>深深叹了口气</option></select></td>
	<td><input type="submit" name="behavior" value="发送"/></td></tr>
	<tr><td align="center">在线聊客</td><td>&nbsp;
<?php
	$sql="select * from user where is_online='1' order by user_id";//查询在线用户
	$result=@mysql_query($sql,$link_id) or die("查询数据库失败");//执行查询
	@mysql_close($link_id);//关闭数据库
	while($row=mysql_fetch_row($result)){//取得查询结果记录数
			$username=$row[1];
		if($username!=$_SESSION["user_name"])
			echo "<input type='radio' name='kick' value='".$username."'/>
			[$username]&nbsp";
		}
	?>
		</td><td><input type="submit" name="behavior" value="踢人"/>
	</td></tr>
		</table>
	</form>
			