<?php
	$orderID=$_POST['orderID'];$username=$_POST['username'];
	$email=$_POST['email'];$sub=$_POST['set'];
	if($sub="��ѯ"){
		require_once('config.inc.php');
		require_once(Include_Path.'db.inc.php');
		require_once(Include_Path.'control.inc.php');
		$order=new control();//������������
		$search="(order_ID='".$orderID."' or user_name='".$username."' or order_mail='".$email."')";
		$DTname="orderinfo";
		$order_s=$order->GetDTdataset($DTname,$serach);//��ȡָ�������Ķ�����Ϣ
		if(count($order_s)<1) $msg="û�з��ϲ�ѯ�����Ķ���";
		else
			echo "<meta http-equiv='Refresh' content='0;url-order_list.php?page=1&&orderID=".$orderID."&&username=".$username."&&email=".$email."'/>";
		}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>������Ϣ��ѯ</title>
		<link href="css/bscss.css" rel="sytlesheet" type="text/css"/>
		<script language="JavaScript">
			function tjpd(){
				var orderID1=window.frm.orderID.value;
				var username1=window.frm.username1.value;
				var email1=window.frm.email.value;
				if(orderID1=="" && username1=="" && email==""){
					window.alert("��������һ������");
					window.frm.orderID.focus();
				}
			}
		</script>
		</head>
		<body>
			<div id="appb">
			<div id="bt">��ѯ����<hr/></div>
			<table width="600" boder="0" cellspacing="0" class"tdl">
				<tr><td id="bb">��ȷ�ϲ�ѯ����</td></tr>
			</table>
			<form name="frm" action="order_search.php" target="mainFram" method="post">
			<table width="600" border="1" cellspacing="1" class="tdl">
				<tr><td align="right">������:</td>
					<td><input name="orderID" type="text" size="20"/>&nbps;&nbsp;����</td></tr>
				<tr><td  aling="right">������ϵ��:</td>
					<td><input name="username" type="text" size="20"/>&nbsp;&nbsp;����</td></tr>
				<tr><td align="right">��ϵ������:</td>
					<td><input name="email" type="text" size="20"/></td></tr>
				<tr><td colspan="2" align="center"><input name="set" type="submit" value="��ѯ" onmousedown="tjpd()" /><input type="reset" value="����"/></td></tr>
				</table>
				</form>
				<div id="bb"><?php echo $msg;?></div>
				</div>
			</body>
		</html>
