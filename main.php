<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>�����������</title>
		<link href="css/main.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="rightbt1"><br/>&nbsp;&nbsp;&nbsp;<a href="webshop/book_show.php?title=����ͼ��&&serach=bookhot&&page=1&&pp=1">����...</a></div>
		<div id="rightconnect"> 
			<table width="580" border="0" cellspacing="0">
			<tr>
<?php
	require_once('webshop/config.inc.php');
	require_once('webshop/config.inc.php');
	require_once('webshop/config.inc.php');
	$books=new control();
	$bookDBname="bookhot";
	$serach=" 1 order by hot_order asc limit 0,2";//�����ݱ���2����¼
	$book=$books->Getbookdata($bookDBname,$serach);//��ȡ��ʾͼ�����Ϣ
	$count=count($book); $i=0;
	while($i<$count){//���Ҫ��ʾͼ�����Ϣ����Ԫ����
?>
			<td width="55"><a href="webshop/book_fullinfo.php?bookid=<?php echo $book[$i][book_ID];?>" target='_blank'>
			<img src="webshop/<?php echo $book[$i][book_pic];?>" /></a></td>
				<td width="510">����:<?php echo $book[$i][book_name];?><br/>ISBN:<?php 
				echo $book[$i][book_no];?><br/>������:<?php echo $book[$i][publisher];?>������
				<br/>ԭ��:RMP&nbsp;<?php echo $book[$i][price];?>&nbsp;Ԫ<br/>��Ա��:
				RMB&nbsp;<?php echo $book[$i][price_m];?>&nbsp;Ԫ<br/></td>
<?php $i++;}
//				<td width="55"><a href="#"><img src="leftbg1.jpg" /></a></td>
//				<td width="200">����:<br/>ISBN:<br/>������:<br/>ԭ��:<br/>��Ա��:<br/></td>
?>
			</tr>
			</table>
		</div>
		<div id="rightbt2"><br/>&nbsp;&nbsp;&nbsp;<a href="webshop/book_show.php?title=�ؼ�ͼ��&&serach=booksale&&page=1&&pp=1">����...</a></div>
		<div id="rightconnect"> 
			<table width="580" border="0" cellspacing="0">
			<tr>
<?php
	$bookDBname="booksale";
	$serach=" 1 order by sale_order ASC limit 0,2";//�����ݱ���2����¼
	$book=$books->Getbookdata($bookDBname,$serach);//��ȡ��ʾͼ�����Ϣ
	$count=count($book); $i=0;
	while($i<$count){//���Ҫ��ʾͼ�����Ϣ����Ӧ�ĵ�Ԫ����
?>
			<td width="55"><a href="webshop/book_fullinfo.php?bookid=<?php echo
			$book[$i][book_ID];>" target='_blank'><img id="imgc" alt="��ȱ" src="webshop/<?php echo
			 $book[$i][book_pic];?>" /></a></td>
				<td width="500">����:<?php echo $book[$i][book_name];?><br/>ISBN:
				<?php echo $book[$i][book_no];?><br/>������:<?php echo $book[$i][publisher];?>
				������<br/>ԭ��:RMB&nbsp;<?php echo $book[0][price];?>&nbsp;Ԫ<br/>�Żݼ�:
				<?php echo $book[$i][bool_l_price];?>&nbsp;��<br/></td>
<?php $i++; }
	//			<td width="55"><a href="#"><img src="leftbg.jpg" /></a></td>
				//<td width="200">����:<br/>ISBN:<br/>������:<br/>ԭ��:<br/>�Żݼ�:<br/></td>
?>
			</tr>
			</table>
		</div>
		<div id="rightbt3"><br/>&nbsp;&nbsp;&nbsp;<a href="webshop/book_show.php?title=�Ƽ�ͼ��&&serach=bookrecommend&&page=1&&pp=1">����...</a></div>
		<div id="rightconnect"> 
			<table width="580" border="0" cellspacing="0">
			<tr><td width="55"><a href="#"><img src="leftbg.jpg" /></a></td>
				<td width="200">����:<br/>ISBN:<br/>������:<br/>����:<br/>��Ա��:<br/></td>
				<td width="55"><a href="#"><img src="leftbg.jpg" /></a></td>
				<td width="200">����:<br/>ISBN:<br/>������:<br/>ԭ��:<br/>��Ա��:<br/></td>
			</tr>
			</table>
		</div>
	</body>
</html>