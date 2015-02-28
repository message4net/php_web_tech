<?php
	$orderID=$_GET['orderID'];$username=$_GET['username'];
	$email=$_GET['email'];$page=$_GET['page'];
	if($page<1) $page=1;
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');
	require_once(Include_Path.'display.inc.php');
	$order=new control();//创建订单对象
	$serach="(order_ID='".$order_id."' or user_name='".$username."' or order_mail='".$email."')";
	$DTname="orderinfo";
	$order_s=$order->GetDTdataset($DTname,$serach);//获取指定条件的订单信息
	$url="order_listh?orderID=".$orderID."&&username=".$username."&&email=".$email."&&page=";
	$displayorder=new display();
	$displayorder->_pageSzie=$order->pageSize;
	$pagelast=$displayorder->GetpageNum($order_s);
	$orders-$order->GetControlList($order_s,$page);
	$displaybar=$displayorder->GetJumpBar($order_s,$page,$url);
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
			<div id="bt">订单列表信息<hr/></div>
			<table width="600" border="0" cellspacing="0" class="tdl">
				<tr><td>共有<?php echo count($order_s);?>个订单&nbsp;&nbsp;共<?php echo $pagelast;?>页&nbsp;&nbsp;<? echo $displaybar['JumpBar'];?></td>
					<td align="right">输入页次:<input type="text" size="3" name="page1" value="<? echo $page1;?>"><input type="submit" name="send2" value="转到"/></td></tr>
			</table>
			<table width="600" border="1" cellspacing="1" class="tdl">
				<tr align="center" id="bb"><td>序号</td><td>订单号</td><td>联系人</td>
					<td>订书数量</td><td>总价格</td><td>订单状态</td><td>创建时间</td><td>详细</td></tr>
<?php
	for($j=0;$j<count($orders);$j++){
		if($order[$j][order_state]==1) $state="完成";
		else{
			if($orders[$j][order_fmoney]=="购书卡支付") $state="已付费，配送中";
			else $state="配送中";
		}
		echo "<tr align='center'><td>".($j+1)."</td>";
		echo "<td>".$orders[$j][order_ID]."</td><td>".$order[$j][user_name]."</td>";
		echo "<td>".$orders[$j][order_num]."</td><td>".$orders[$j][order_money]."</td>";
		echo "<td>".$state."</td><td>".$order[$j][order_time]."</td>";
		echo "<td><a href='order.php?order_ID=".$orders[$j][order_ID]."' target='_blank'>查看</a></td></tr>";
		}
?>
	<tr><td colspan="8" align="right"><?php echo $displaybar['msg'];?></td></tr>
	<tr id="bb"><td align="left" colspan="8">提示:单击"查看"连接可以查看订单的详细情况</td></tr>
	</table>
	</div>
	</body>
</html>