<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>无涯网上书店</title>
		<link href="css/main.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="rightbt1"><br/>&nbsp;&nbsp;&nbsp;<a href="webshop/book_show.php?title=热卖图书&&serach=bookhot&&page=1&&pp=1">更多...</a></div>
		<div id="rightconnect"> 
			<table width="580" border="0" cellspacing="0">
			<tr>
<?php
	require_once('webshop/config.inc.php');
	require_once('webshop/config.inc.php');
	require_once('webshop/config.inc.php');
	$books=new control();
	$bookDBname="bookhot";
	$serach=" 1 order by hot_order asc limit 0,2";//从数据表中2条记录
	$book=$books->Getbookdata($bookDBname,$serach);//获取显示图书的信息
	$count=count($book); $i=0;
	while($i<$count){//输出要显示图书的信息到单元格中
?>
			<td width="55"><a href="webshop/book_fullinfo.php?bookid=<?php echo $book[$i][book_ID];?>" target='_blank'>
			<img src="webshop/<?php echo $book[$i][book_pic];?>" /></a></td>
				<td width="510">书名:<?php echo $book[$i][book_name];?><br/>ISBN:<?php 
				echo $book[$i][book_no];?><br/>出版社:<?php echo $book[$i][publisher];?>出版社
				<br/>原价:RMP&nbsp;<?php echo $book[$i][price];?>&nbsp;元<br/>会员价:
				RMB&nbsp;<?php echo $book[$i][price_m];?>&nbsp;元<br/></td>
<?php $i++;}
//				<td width="55"><a href="#"><img src="leftbg1.jpg" /></a></td>
//				<td width="200">书名:<br/>ISBN:<br/>出版社:<br/>原价:<br/>会员价:<br/></td>
?>
			</tr>
			</table>
		</div>
		<div id="rightbt2"><br/>&nbsp;&nbsp;&nbsp;<a href="webshop/book_show.php?title=特价图书&&serach=booksale&&page=1&&pp=1">更多...</a></div>
		<div id="rightconnect"> 
			<table width="580" border="0" cellspacing="0">
			<tr>
<?php
	$bookDBname="booksale";
	$serach=" 1 order by sale_order ASC limit 0,2";//从数据表中2条记录
	$book=$books->Getbookdata($bookDBname,$serach);//获取显示图书的信息
	$count=count($book); $i=0;
	while($i<$count){//输出要显示图书的信息到相应的单元格中
?>
			<td width="55"><a href="webshop/book_fullinfo.php?bookid=<?php echo
			$book[$i][book_ID];>" target='_blank'><img id="imgc" alt="暂缺" src="webshop/<?php echo
			 $book[$i][book_pic];?>" /></a></td>
				<td width="500">书名:<?php echo $book[$i][book_name];?><br/>ISBN:
				<?php echo $book[$i][book_no];?><br/>出版社:<?php echo $book[$i][publisher];?>
				出版社<br/>原价:RMB&nbsp;<?php echo $book[0][price];?>&nbsp;元<br/>优惠价:
				<?php echo $book[$i][bool_l_price];?>&nbsp;折<br/></td>
<?php $i++; }
	//			<td width="55"><a href="#"><img src="leftbg.jpg" /></a></td>
				//<td width="200">书名:<br/>ISBN:<br/>出版社:<br/>原价:<br/>优惠价:<br/></td>
?>
			</tr>
			</table>
		</div>
		<div id="rightbt3"><br/>&nbsp;&nbsp;&nbsp;<a href="webshop/book_show.php?title=推荐图书&&serach=bookrecommend&&page=1&&pp=1">更多...</a></div>
		<div id="rightconnect"> 
			<table width="580" border="0" cellspacing="0">
			<tr><td width="55"><a href="#"><img src="leftbg.jpg" /></a></td>
				<td width="200">书名:<br/>ISBN:<br/>出版社:<br/>评级:<br/>会员价:<br/></td>
				<td width="55"><a href="#"><img src="leftbg.jpg" /></a></td>
				<td width="200">书名:<br/>ISBN:<br/>出版社:<br/>原价:<br/>会员价:<br/></td>
			</tr>
			</table>
		</div>
	</body>
</html>