<?php
	$orderID=$_GET['orderID'];
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');
	$order=new control();//������������
	$DTname="orderinfo";$serach="order_ID=".$orderID;
	$order_s=$order->GetDTdataset($DTname,$serach);//��ȡָ�������ŵĶ�����Ϣ
	$book_s=explode(":",$order_s[0][order_note]};//�����ͼ������кź�����
	$book_IDS=explode(",",$book_s[0]);//��������ͼ������к�
	$book_nums=explode(",",$book_s[1]);//���������ͼ�������
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
			<div id="bt">������Ϣ<hr/></div>
			<table width="600" border="0" cellspacing="0" class="tdl">
				<tr><td id="bb">������:<?php echo $orderID;?></td></tr>
				<tr><td>����<?php echo $order_s[0][order_num0;?>����</td></tr>
			</table>
			<table width="100%" border="1" cellspacing="1" class="tdl">
			<tr align="center" id="bb"><td width="30%">����</td><td width="30%">����</td>
			<td>��װ˵��</td><td>������</td><td>�۸�</td><td>��������</td><td>�ϼ�</td></tr>
<?php
	for($j=0;$j<$order_s[0][order_num];$j++){//�������ͼ�����Ϣ
		$book=new control();
		$serach_b="select * from bookinfo where book_ID=".$book_IDS[$j+1];
		$book=$book->select($serach_b);
		if($book[0][book_bs]==0) $bz="ƽװ";else $bz="��װ";
		echo "<tr><td>".$book[0][book_name]."</td><td>".$book[0][author]."</td>";
		echo "<td align='center'>".$bz."</td><td align='center'>".$book[0][publisher]."</td>";
		echo "<td align='center'>".$book[0][price_m]."</td><td align='center'>".$book_nums[$j+1]."</td>";
		echo "<td align='center'>".$book[0][price_m]*$book_nums[$j+1]."</td></tr>";
	}
		echo "<tr id='bb'><td colspan='5' align='right'><����ܶ�</td>";
		echo "<td colspan='2'>".$order_s[0][order_money]."$nbsp;&nbsp;Ԫ</td></tr>";?>
		</table>
		<table width="100%" border="1" cellspacing="1" class="tdl">
			<tr><td id="bb" colspan="2">������Ϣ:</td></tr>
			<tr><td colspan="2">��ϵ��:<?php echo $order_s[0][user_name];?></td></tr>
			<tr><td>��ַ:<?php echo $order_s[0][order_addr];?></td>
				<td>�ʱ�:<?php echo $order_s[0][order_mail];?></td></tr>
			<tr><td>�����ʼ�:<?php echo $order_s[0][order_mail];?></td>
				<td>�绰:<?php echo $order_s[0][order_phone];?></td></tr>
			<tr><td colspan="2" id="bb">�ͻ���ʽ:<?php echo $order_s[0][order_send];?></td></tr>
			<tr><td colspan="2" id="bb">���㷽ʽ:<?php echo $order_s[0][order_fmoney];?></td></tr>
			<tr><td colspan="2" align="center" id="bb"><a href="#" onClick="javascript:window.close(); 
			return false;">����</a></td></tr>
			</table>
		</div>
	</body>
</html>
				