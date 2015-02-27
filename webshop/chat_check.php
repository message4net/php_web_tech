<?php
	session_stat();
	$userid=$_SESSION['userid'];//启动会话
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');
	require_once(Include_Path.'display.inc.php');//请求包含相应类的文件
	$page=$_GET['page'];
	$userIP=$_SERVER[REMOTE_ADDR];//获取用户的ip地址，以识别用户
	if($page<1) $page=1;
	$chats=new control();//创建购物车对象
	$DTname="bookchat"; $serach="chat_seesion_ID='".$userIP."'";
	$chat_s=$chats->GetDTdataset($DTname,$serach);//获取购物车信息
	$book_s=$chat->Getbookdata($DTname,$serach);//获取购物车上所有的图书信息
	$url="chat_check.php?page=";
	$dispalychat=new display();//创建购物车显示对象
	$displaychat->_pageSize=$chats->_pageSize;
	$pagelast=$displaychat->GetpageNum($chat_s);
	$chat=$chats->GetcontrolList($chat_s,$page);
	$displaybar=$displaychat->GetJumpBar($chat_s,$page,$url);//生成购物车显示的页面导航栏
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>查看购物车</title>
		<base target="mainFrame" />
		<link href="css/bscss.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="appb">
			<div id="bt">查看购物车<hr/></div>
			<form action="<?php echo $url.$page1;?>" method="post">
			<table width="600" border="0" cellspacing="0" class="tdl">
				<tr><td height="24">共有<?php echo count($chat_s);?>本书&nbsp;&nbsp;共
				<?php echo $pagelast;?>页&nbsp;&nbsp;<?php echo $displaybar['JumpBar'];?>
				</td>
					<td align="right">输入页次:<input type="text" size="3" name="page1" 
					value="<?php echo $page1;?>"><input type="submit" name="send2" value="转到"/>
					</td></tr>
					</table>
					</form>
					<table width="600" border="1" cellspacing="1" class="tdl">
					<form method="post" action="chat_update.php?page=<?php echo $page;?>">
						<tr align="center" id="bb"><td>取消</td><td>书名</td><td>作者</td>
						<td>出版社</td><td>单价</td><td>购买数量</td><td>合计</td></tr>
<?php
	for($j=0;$j<count($chat);$j++){//输入选购图书的信息
		echo '<tr><td><input type="checkbox" name="bookbm['.$chat[$j][book_ID].']"
		value="del">'.$chat[$j][book_ID].'</td>';
		echo "<td>".$chats->Getstr($books_s[$j][book_name],30)."</td>";
		echo "<td>".$chats->Getstr($books_s[$j][author],20)."</td>";
		echo "<td>".$books_s[$j][publisher]."</td>";
		echo "<td>".$books_s[$j][price]*book_s[$j][book_l_price]."</td>";
		echo '<td><input type="text" size="6" name="booknum['.$chat[$j][book_ID].
		']" value="'.$chat[$j][buy_num].'"></td>';
		echo "<td>".$book_s[$j][price]*$book_s[$j][book_l_price]*$chat[$j][buy_num]
		."</td></tr>";
	}
?>
		<tr><td colspan="7" align="right"><?php echo $displaybar['msg'];?></td></tr>
		<tr id="bb"><td colspan="5">点击取消复选框或修改购书数量，在点击【修改】
		按钮，就能修改所买<br/>如果确定了要买的书，可以单击【下订单】按钮</td>
			<td align="center"><input type="submit" value="修改"/></td>
			<td><input type="button" value="下订单" onclick="window.location.replace
			('order_check.php')"/></from></td></tr>
			</form>
			</table>
			<div align="center" class="tdl">&nbsp;<br/>&nbsp;</div>
			</div>
			</body>
		</html>