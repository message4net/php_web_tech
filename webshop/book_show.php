<?php
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');
	require_once(Include_Path.'display.inc.php');//请求包含相应类的文件
	$title=$_GET['title']; $serach=$_GET['serach'];
	$pp=$_GET['pp']; $page=$_GET['page'];//获取由url传递来的数据
	if($pp==1){$DTname=$serach;$serach=1;}//由特色图书链接进入,$serach纪录数据表名称
	else $DTname="bookinfo";//由搜索菜单或输入的查询条件进入
	$serach=stripslashes($serach);//去除自动添加的反斜杠\
	$serach=eregi_replace("%27","'",$serach);//把"%27替代为'
	if($page<1) $page=1;
	$books=new control();
	$book_s=$books->Getbookdata($DTname,$serach);//获取要显示图书的数据
	$serach=eregi_replace("'","%27",$serach);//把'替代为"%27
	if($pp==1) $serach=$DTname;
	$ss="?title=$title&&pp=$pp&&serach=$serach&&page=";
	$url="book_show.php".$ss;
	$displaybook->_pageSize=$books->_pageSize;//统一显示与数据分页的行数
	$pagelast=$displaybook->GetpageNum($book_s);//提取显示的最后页码
	$book=$books->GetControlList($book_s,$page);//提取当前的显示数据
	$displaybar=$displaybook->GetJumpBar($book_s,$page,$url);//生成分页导航栏信息
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>图书显示</title>
		<base target="mainFrame" />
		<link href="css/bscss.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="appb">
			<div id="bt">请您选购&mdash;&mdash;<?php echo $title;?><hr/></div>
				<form action="<?php echo $url.($page2);?>" method="post" target="_self">
				<table width="600" border="0" cellspacing="0" class="tdl">
					<tr><td>共有<?php echo count($book_s; ?>本书&nbsp;&nbsp;共<?php echo
					$pagelast;?>页&nbsp;&nbsp;<?php echo $displaybar['JumpBar'];?></td>
					<td align="right">输入页次:<input type="text" size="3" name="page1"
					value="<?php echo $page1; ?>"><input type="submit" name="send2"value="转到"
					/></td></tr>
				</table>
				</form>
				<table width="600" border="1" cellspacing="1" class="tdl">
				<form name="frm" action="chat_add.php<?php echo $ss;?>" method="post">
					<tr align="center" id="bb"><td width="30">选中</td><td width="200">
					书名</td>
						<td width="150">作者</td><td width="60">出版社</td><td width="30>原价
						</td>
						<td width="30">折扣</td><td width="60>购买数量</td><td width="40">
						详情</td></tr>
<?php
	for($j=0;$j<count($book);$j++){//按行依次输出图书信息
		echo "<tr class='tdl'>";
		echo "<td align='center'><input type='checkbok' name='bookbm[".$book[$j]
		[book_ID]."]' value='sel'>".$book[$j][book_ID]."</td>";
		echo "<td width='200'>".$books->Getsrt($book[$j][book_name],30)."</td>";
		echo "<td width='150'>".$books->Getstr($book[$j][author],20)."</td>";
		echo "<td>".$book[$j][publisher]."</td><td>";
		printf("%.2f",$book[$j][price]);
		echo "</td><td>";
		printf("%.2f",$book[$j][book_l_price]);
		echo '</td><td align="center"><input type="text" size="4" name="buynum
		['.$book[$j][book_ID].']">'.$buynum[$book[$j][book_ID]].'</td>';
		echo "<td align='center'><a href='book_fullinfo.php?bookid=".$book[$j]
		[book_ID]."' target='_blank'>详情..</a></td></tr>";
	}
	if(count($book)<$books->_pagesize){
		echo "<tr class='tdl'>";
		echo "<td align='center' colspan='8' height='".(abs($books->_pagesize-
		count($book))*27)."'>&nbsp;</td></tr>";
	}
?>
	<tr><td colspan="8" align="right"><?php echo $displaybar['msg'];?>
	</td></tr>
	<tr id="bb"><td align="left" colspan="5">提示:先选中购买的书，再填写购买
	的数量,最后单击［放入购物车］按钮</td>
		<td colspac="3" align="center"><input type="submit" value="放入购物车"/>
		</td></tr>
	</from>
	</table>
	</div>
	</body>
</html>
	