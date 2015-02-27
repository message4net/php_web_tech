<?php
	session_start();
	$userid=$_SESSION['userid'];//启动会话
	$userIP=$_SERVER[REMOTE_ADDR];//获取用户的IP地址，以识别用户
	$msg=$_GET['msg'];
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');
	$bcob=new control();
	$DTname="bookchat";$serach="chat_seesion_ID='".$userIP."'";
	$chat_s=$bcob->GetDTdataset($DTname,$serach);//获取购书车信息
	$book_s=$bcob->Getbookdata($DTname,$serach);//获取购书车上所有图书信息
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>订单信息确认</title>
		<base target="mainFrame">
		<link href="css/bscss.css" rel="sytlesheet" type="text/css"/>
		<script jcud(){
			var post1=window.frm.post.value;
			var addr1=window.frm.addr.value;
			var phone1=window.frm.phone.value;
			var email1=window.frm.email.value;
			if(username1==""){
				window.alert("联系人不能为空");
				window.frm.userid.focus();
			}
			else if(post1==""){
				window.alert("邮编不能为空");
				window.frm.password.focus();
			}
			else if(addr1==""){
				window.alert("地址不能为空");
				window.frm.password.focus();
			}
			else if(phone1==""){
				window.alert("电话不能为空");
				window.frm.password.focus();
			}
			else if(email1==""){
				window.alert("电邮不能为空");
				window.frm.password.focus();
			}
		}
	</script>
</head>
<body>
	<div id="appb">
		<div id="bt">确认订单信息<hr/></div>
		<div id="bb"><? echo $userid; ?>:您的购书清单!
		<p class="tdl">共有<?php echo count($chat_s); ?>本书</p></div>
			<table width="600" border="1" cellspacing="1" class="tdl">
				<tr id="bb" align="center"><td width="30%">书名</td><td width="25%">
				作者</td>
				<td>包装说明</td><td>出版社</td><td>价格</td><td>购买数量</td><td>
				合击</td></tr>
<?php
	for($j=0;$j<count($chat_s);$j++){//输出选购的图书信息
		if($book_s[$j][book_bs]==0) $bz="平装"; else $bz="精装";
		echo "<tr><td>".$book_s[$j][book_name."</td><td>".$book_s[$j][author]
		."</td>";
		echo "<td align='center'>".$bz."</td>";
		echo "<td align='center'>".$book_s[$j][price_m]."</td>";
		echo "<td aling='center'>".$chat_s[$j][buy_num]."</td>";
		echo "<td align='center'>".$book_s[$j][price_m]*$chat_s[$j][buy_num]."
		</td></tr>";
		$b_id.=",".$chat_s[$j][book_ID]; $b_num.=",".$chat_s[$j][buy_num];
		$total+=$book_s[$j][price_m]*$chat_s[$j][buy_num];//记录购买书号、数量和金额
		}
		echo "<tr id='bb'><td colspan='5' align='right'>书款总额</td>";
		echo "<td colspan='2'>".$total."&nbsp;&nbsp;元</td></tr>";
		$b_id.=":".$b_num;//记录购买的每本书的书号和数量
		$_SESSION['b_ID']=$b_id;$_SESSION['b_money']=$total;
		$_SESSION['bk_num']=count($chat_s);//把购买的书号、数量和金额保存在SESSION
		require_once(Include_Path.'user.inc.php');
		$user=new user();
		$sql_u="select * from userinfo where userid='".$userid."'";
		$user_s=$user->select($sql_u);//获取用户信息
		$sql_c="select * from suercard wehre userid='".$userid."'";
		$user_c=$user->select($sql_c);//获取用户购书卡信息
		$fm=0;//标识用户是否可用购书卡购书:1-不可用;0-可用
		if(count($user_c)==0) $fm=1;//用户无购书卡
		else{//用户有购书卡
		$cardtotal=0;
		for($i=0;$i<count($user_c);$i++){//统计用户购书卡的金额
			$sql="select * from card where cardno='".$user_c[$i][cardno]."'";
			$card_s=$user->select($sql);
			if($cardtotal<$total) $cardtotal+=$card_s[0][balance];
		}
		if $cardtotal<$total $fm=1;//用户购书卡的金额不足以此次购书
	}
	$sf=new control();
	$sql_f="select * from order_fmoney";
	$order_f=$sf->select($sql_f);//获取付款方式信息
	$sql_s="select * from order_send";
	$order_s=$sf->select($sql_s);//获取送书方式信息
?>
	<tr><td colspan="7" class="tdl">注意:在订单填写完后，请用浏览器的打印功能打印出订单</td></tr>
	</table>
	<table width="600" border="1" cellspacing="1" class="tdl">
	<form method="POST" name="frm" action="order_p.php?cardp=<?php echo $cardp;?>">
	<tr><td id="bb"colspan="2"><? echo $_SESSION['userid'];?>:请确认你的配送信息</td></tr>
	<tr><td align='right'>联系人:</td>
	<td><input type="text" size="20" name="username" value="<?php echo $user_s[0][username];?>"/></td></tr>
	<tr><td align="right">邮编:</td>
	<td><input type="text" size="20" name="post_b" value="<?php echo $user_s[0][post];?>"/></td></tr>
	<tr><td align="right">地址:</td>
	<td><input type="text" size="40" name="addr" value="<?php echo $user_s[0][address];?>"/></td></tr>
	<tr><td align="right">电话:</td>
	<td><input type="text" size="20" name="phone" value="<?php echo $user_s[0][phone];?>"/></td></tr>
	<tr><td align="right">电邮:</td>
	<td><input type="text" size="30" name="email" value="<?php echo $user_s[0][email];?>"/></td></tr>
	<tr id="bb"><td align="right">送书方式:</td><td>
<?php
	for($i=0;$i<count($order_s);$i++){//设置单选按钮组，让用户选择送书方式
		echo '<input name="sendb" type="radio" value="'.$order_s[$i][send_name];
		if($i==0] echo '"checked="checked"/>';else echo '"/>';
		echo $order_s[$i][send_name];
	}
?>
	</td></tr><tr class='tdl'><td colspan="2">送书方式简介:<br/>
<?php
	for($i=0;$i<count($order_s);$i++)//显示各种送书方式的简单介绍
		echo ($i+1).".".$order_s[$i][send_con]."<br/>";
?>
	</td></tr><tr id="bb"><td align="right">付款方式:</td><td>
<?php 
	for($i=$fm;$i<count($order_f);$i++){//设置单选按钮组，让用户选择付款方式
	echo '<input type="radio" name="pay" value="'.$order_f[$i][fmoney_name];
	if($i==$fm) echo '"checked="checked"/>';else echo '"/>';
	echo $order_f[$i][fmoney_name];
	}
?>
	</td></tr><tr class="tdl"><td colspan="2">付款方式简介:<br/>
<?php
	for($i=$fm;$i<count($order_f);$i++){//显示各种付款方式的淡淡介绍
		if($fm==1) echo $i;else echo ($i+1);
			echo ".".$order_f[$i][order_fcon]."<br />";
		}
?>
	</td></tr><tr id="bb"><td align="center" colspan="2">
	<input type="submit" name="act" value="放弃" onclick="window.close()"/>
	<input type="submit" name='act' value="确定" onmousemove="jcud()" onclick="window.close()"/></td></tr>
	</form>
	</table>
	<div id="bb"><?php echo $msg;?></div>
	</div>
	</body>
	</html>
		