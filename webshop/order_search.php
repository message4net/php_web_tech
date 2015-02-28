<?php
	$orderID=$_POST['orderID'];$username=$_POST['username'];
	$email=$_POST['email'];$sub=$_POST['set'];
	if($sub="查询"){
		require_once('config.inc.php');
		require_once(Include_Path.'db.inc.php');
		require_once(Include_Path.'control.inc.php');
		$order=new control();//创建订单对象
		$search="(order_ID='".$orderID."' or user_name='".$username."' or order_mail='".$email."')";
		$DTname="orderinfo";
		$order_s=$order->GetDTdataset($DTname,$serach);//获取指定条件的订单信息
		if(count($order_s)<1) $msg="没有符合查询条件的订单";
		else
			echo "<meta http-equiv='Refresh' content='0;url-order_list.php?page=1&&orderID=".$orderID."&&username=".$username."&&email=".$email."'/>";
		}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>订单信息查询</title>
		<link href="css/bscss.css" rel="sytlesheet" type="text/css"/>
		<script language="JavaScript">
			function tjpd(){
				var orderID1=window.frm.orderID.value;
				var username1=window.frm.username1.value;
				var email1=window.frm.email.value;
				if(orderID1=="" && username1=="" && email==""){
					window.alert("必须输入一个条件");
					window.frm.orderID.focus();
				}
			}
		</script>
		</head>
		<body>
			<div id="appb">
			<div id="bt">查询订单<hr/></div>
			<table width="600" boder="0" cellspacing="0" class"tdl">
				<tr><td id="bb">请确认查询条件</td></tr>
			</table>
			<form name="frm" action="order_search.php" target="mainFram" method="post">
			<table width="600" border="1" cellspacing="1" class="tdl">
				<tr><td align="right">订单号:</td>
					<td><input name="orderID" type="text" size="20"/>&nbps;&nbsp;或者</td></tr>
				<tr><td  aling="right">订单联系人:</td>
					<td><input name="username" type="text" size="20"/>&nbsp;&nbsp;或者</td></tr>
				<tr><td align="right">联系人邮箱:</td>
					<td><input name="email" type="text" size="20"/></td></tr>
				<tr><td colspan="2" align="center"><input name="set" type="submit" value="查询" onmousedown="tjpd()" /><input type="reset" value="重置"/></td></tr>
				</table>
				</form>
				<div id="bb"><?php echo $msg;?></div>
				</div>
			</body>
		</html>
