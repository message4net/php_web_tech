<?php
	$orderID=$_GET['orderID'];$username=$_GET['username'];
	$email=$_GET['email'];$page=$_GET['page'];
	if($page<1) $page=1;
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');
	require_once(Include_Path.'display.inc.php');
	$order=new control();//������������
	$serach="(order_ID='".$order_id."' or user_name='".$username."' or order_mail='".$email."')";
	$DTname="orderinfo";
	$order_s=$order->GetDTdataset($DTname,$serach);//��ȡָ�������Ķ�����Ϣ
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
		<title>������Ϣ</title>
		<link href="css/bscss.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="appb">
			<div id="bt">�����б���Ϣ<hr/></div>
			<table width="600" border="0" cellspacing="0" class="tdl">
				<tr><td>����<?php echo count($order_s);?>������&nbsp;&nbsp;��<?php echo $pagelast;?>ҳ&nbsp;&nbsp;<? echo $displaybar['JumpBar'];?></td>
					<td align="right">����ҳ��:<input type="text" size="3" name="page1" value="<? echo $page1;?>"><input type="submit" name="send2" value="ת��"/></td></tr>
			</table>
			<table width="600" border="1" cellspacing="1" class="tdl">
				<tr align="center" id="bb"><td>���</td><td>������</td><td>��ϵ��</td>
					<td>��������</td><td>�ܼ۸�</td><td>����״̬</td><td>����ʱ��</td><td>��ϸ</td></tr>
<?php
	for($j=0;$j<count($orders);$j++){
		if($order[$j][order_state]==1) $state="���";
		else{
			if($orders[$j][order_fmoney]=="���鿨֧��") $state="�Ѹ��ѣ�������";
			else $state="������";
		}
		echo "<tr align='center'><td>".($j+1)."</td>";
		echo "<td>".$orders[$j][order_ID]."</td><td>".$order[$j][user_name]."</td>";
		echo "<td>".$orders[$j][order_num]."</td><td>".$orders[$j][order_money]."</td>";
		echo "<td>".$state."</td><td>".$order[$j][order_time]."</td>";
		echo "<td><a href='order.php?order_ID=".$orders[$j][order_ID]."' target='_blank'>�鿴</a></td></tr>";
		}
?>
	<tr><td colspan="8" align="right"><?php echo $displaybar['msg'];?></td></tr>
	<tr id="bb"><td align="left" colspan="8">��ʾ:����"�鿴"���ӿ��Բ鿴��������ϸ���</td></tr>
	</table>
	</div>
	</body>
</html>