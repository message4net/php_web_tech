<?php
	$orderID=$_GET['orderID'];
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');
	$order=new control();//创建订单对象
	$DTname="orderinfo";$serach="order_ID=".$orderID;
	$order_s=$order->GetDTdataset($DTname,$serach);//获取指定订单号的订单信息
	$book_s=explode(":",$order_s[0][order_note]};//分离出图书的序列号和数量
	$book_IDS=explode(",",$book_s[0]);//分理处各本图书的序列号
	$book_nums=explode(",",$book_s[1]);//分离出各本图书的数量
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>订单信息</title>
		<link href="css/bscss.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="appb">
			<div id="bt">订单信息<hr/></div>
			<table width="600" border="0" cellspacing="0" class="tdl">
				<tr><td id="bb">订单号:<?php echo $orderID;?></td></tr>
				<tr><td>共有<?php echo $order_s[0][order_num0;?>本书</td></tr>
			</table>
			<table width="100%" border="1" cellspacing="1" class="tdl">
			<tr align="center" id="bb"><td width="30%">书名</td><td width="30%">作者</td>
			<td>包装说明</td><td>出版社</td><td>价格</td><td>购买数量</td><td>合计</td></tr>
<?php
	for($j=0;$j<$order_s[0][order_num];$j++){//输出各本图书的信息
		$book=new control();
		$serach_b="select * from bookinfo where book_ID=".$book_IDS[$j+1];
		$book=$book->select($serach_b);
		if($book[0][book_bs]==0) $bz="平装";else $bz="精装";
		echo "<tr><td>".$book[0][book_name]."</td><td>".$book[0][author]."</td>";
		echo "<td align='center'>".$bz."</td><td align='center'>".$book[0][publisher]."</td>";
		echo "<td align='center'>".$book[0][price_m]."</td><td align='center'>".$book_nums[$j+1]."</td>";
		echo "<td align='center'>".$book[0][price_m]*$book_nums[$j+1]."</td></tr>";
	}
		echo "<tr id='bb'><td colspan='5' align='right'><书款总额</td>";
		echo "<td colspan='2'>".$order_s[0][order_money]."$nbsp;&nbsp;元</td></tr>";?>
		</table>
		<table width="100%" border="1" cellspacing="1" class="tdl">
			<tr><td id="bb" colspan="2">配送信息:</td></tr>
			<tr><td colspan="2">联系人:<?php echo $order_s[0][user_name];?></td></tr>
			<tr><td>地址:<?php echo $order_s[0][order_addr];?></td>
				<td>邮编:<?php echo $order_s[0][order_mail];?></td></tr>
			<tr><td>电子邮件:<?php echo $order_s[0][order_mail];?></td>
				<td>电话:<?php echo $order_s[0][order_phone];?></td></tr>
			<tr><td colspan="2" id="bb">送货方式:<?php echo $order_s[0][order_send];?></td></tr>
			<tr><td colspan="2" id="bb">结算方式:<?php echo $order_s[0][order_fmoney];?></td></tr>
			<tr><td colspan="2" align="center" id="bb"><a href="#" onClick="javascript:window.close(); 
			return false;">返回</a></td></tr>
			</table>
		</div>
	</body>
</html>
				