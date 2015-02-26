<?php
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');//请求包含相应类的文件
	$bookid=$_GET['bookid'];//获取图书序列号bookid
	$book_s=new control();//创建图书对象
	$sql="select * from bookinfo where book_ID=".$bookid;
	$book=$book_s->select($sql);//使用基本操作类中的方法select($sql)查询数据集
	$user=new control();//创建反馈用户对象
	$sql2="select * from usermessage where book_ID=".$bookid;
	$usermsg=$user->select($sql2);
	if(count($usermsg)==0) $msg="暂无评价信息";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>图书详细信息显示</title>
		<base target="mainFrame" />
		<link href="css/bscss.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="appb">
			<div id="bt">查询的图书详细信息<hr/></div>
			<table width="100%" border="0" cellspacing="0">
				<tr><td id="bb">&nbsp;$nbsp;</td></tr>
			</table>
			<table width="100%" border="1" cellspacing="1" class="tdl">
			<tr><td width="10%" align="right">书名</td>
				<td width="%50" class="tdd"><?php echo $book[0][book_name];?></td>
			<td rowspan="9" align="center"><img src="<?php echo $book[0][book_pic]; ?>"
			/></td></tr>
			<tr><td align="right">作者</td>
				<td class="tdd"><?php echo $book[0][author]; ?></td></tr>
			<tr><td align="right">出版社</td>
				<td class="tdd"><?php echo $book[0][publisher]; ?>&nbsp;出版社
				</td></tr>
			<tr><td align="right">出版日期</td>
				<td class="tdd"><?php echo substr($book[0][pub_date],0,10); ?>
				</td></tr>
			<tr><td align="right">书号</td>
				<td class="tdd"><?php echo $book[0][book_no]);?></td></tr>
			<tr><td align="right">折扣价</td>
				<td class="tdd"><?php pritf("%.2f",$book[0][book_l_price];?></td></tr>
			<tr><td align="right">会员价</td>
				<td class="tdd"><?php echo $book[0][price_m];?></td></tr>
			<tr><td align="right">等级</td>
				<td class="tdd"><font corlor="#FF0000"><?php echo $book[0][book_level];?>
				</font>&nbsp;级&nbsp;&nbsp;<img src="<?php echo $book[0][book_level_pic];?>"
				/></td></tr>
			<tr><td colspan="3">摘要&nbsp;&nbsp;<span class="tdd"><?php echo $book[0][book_absract];?></span>
			</td></tr>
			<tr><td colspan="3">目录<pre class="tdd"><?php echo $book[0][book_index];?></pre>
			</td></tr>
			<tr><td colspan="3" align="center"><a href="#" onClick="javascript:window.close();return false;">
			返回</a></td></tr>
		</table>
		<table width="100%" border="1" cellspacing="1" class="tdl">
			<tr><td id="bt">访客评价信息<hr/></td></tr></table>
		<table width="100%" border="1" cellspacing="1" class="tdl">
			<tr><td colspan="3">&nbsp;目前对本书的评价有<?php echo count($usermsg);?>
			条。</td></tr>
<?php
	for($j=0;$j<count($usermsg);$j++){
		echo "<tr class='tdl'><td>".$usermsg[$j][user_ID]."</td>";
		echo "<td>".$usermsg[$j][book_level]."</td>";
		echo '<td>'.$usermsg[$j][message_content].'</td></tr>';
	}
?>
		<tr><td colspan="3" align="center">&nbsp;<?php echo $msg;?></td></tr>
		<tr align="center" id="bb"><td colspan="3">我要评书</td></tr>
	</table>
	<table width="100%" border="1" align="center" cellspacing="1" class="tdl">
	<form action="user_fback.php?bookid=<?php echo $bookid;?>"method="post">
	<tr><td width="10%" align="right">用户名</td>
		<td class="tdd">input name="user_id" type="text" id="textfield"
		size="70"/>*</td></tr>
		<tr><td align="right">评价等级</td>
		<td class="tdd"><input type="radio" name="book_level" value="推荐"
		id="RadioGroup1_0"/>
		推荐<input name="book_level" type="radio" id="RadioGroup1_1" value="一般"
		checked="checked"/>一般<input type="radio" name="book_level" value="不推荐"
		id="RadioGroup1_2"/>不推荐</td></tr>
		<tr><td align="right">评语内容</td>
		<td class="tdd"><textarea name="comm" cols="73" rows="5" id="textfield3">
		</textarea></td></tr>
		<tr><td colspan="2" align="center"><input type="submit" name="button" 
		id="button" value="提交"/></td></tr>
		</form>
		</table>
		</div>
	</body>
</html>