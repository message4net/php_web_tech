<?php
	session_start();
	$userid=$_SESSION['userid'];
	$sub=$_POST['act'];//获取用户对前一页的操作
	if($sub=="放弃"){//用户放弃本次购书的反馈信和操作设置
		$msg=$userid.':确定要放弃吗?请慎重<br/>单击【确定】按钮后，将清除购物车上的所有信息';
		$button="确定"
		$url="chat_clear.php";
	}
	else if($sub=="确定"){//用户确认本次购书反馈信和操作设置
	$b_ID=$_SESSION['b_ID']; $b_num=$_SESSION['bk_num'];
	$b_money=$_SESSION['b_money'];//获取SESSION变量
	$username=$_POST['username'];$post1=$_POST['post_b'];$addr1=$_POST['addr'];
	$phone1=$_POST['phone'];$email1=$_POST['email'];
	$send=$_POST['sendb'];$fmoney=$_POST['pay'];//获取提交的表单信息
	require_once('config.inc.php');
	require_once(Include_Path.'user.inc.php');
	$user=new user();
	$serach_u="select * from usercard wehre userid='".$userid."'";
	$user_s=$user->select($serach_u);//获取用户信息
	$msg1=$userid.":您采用购书卡支付，已结清书款<br/>";
	$j=0;$p_money=$b_money;//备份本次消费金额
	while($p_money>0 && $j<count($user_s)){//扣除购书卡本次消费的金额
		$sql_c="select * from card wehre cardno='".$user_s[$j][cardno]."'";
		$card_s=$user->select($sql_c);
		if($card_s[0][balance>=$p_money){//一张购书卡能支付本次消费的金额
			$cards=$card_s[0][balance]-$p_money;//扣除本次消费的金额
			$p_money=0;//尚未付费金额设置为0
			$serach_c="update card set balance=$cards where cardno='".$user_s[$j][cardno]."'";
			$cardu=$user->update($serach_c);//更新购书卡余额
			$msg=$msg1."购书卡".$user_s[$j][cardno]."内余额:".$cards."<br/><br/>";
		}
		else{//一张购书卡不足以支付本次消费的金额
			$p_money=$p_money-$card_s[0][balance];//设置尚未付费金额为0
			$msg1.="购书卡".$user_s[$j][cardno]."内已无余额<br/><br/>":
			$serach_c="update card set balance=0 where cardno='".$user_s[$j][cardno]."'";
			$cardu=$user->update($serach_c);//设置改购书卡的金额为0 
			$j++;
		}
	}
}
require_once(Include_Path.'control.inc.php');
$bcob=new control();//创建订单对象
$sql_o="insert into orderinfo (user_name,order_post,order_addr,order_phone,order_email,order_send,order_fmoney,ofder_num,
order_state,order_money,order_time,order_note) values('$username','$post1','$addr1','$phone1','$email1','$send','$fmoney','$b_num','0','$bmoney',CURRENT_TIMESTAMP,
$b_ID')";
$order_o=(int)$bcob->insert($sql_o);//生成一个新订单,返回的是该记录序列号，作为订单号
$sql_c="update bookchat set order_ID='".$order_o."' where user_ID='".$userid."'";
$chat_c=$bcob->update($sql_c);//修改购书车的order_ID
$msg.=$userid.":恭喜您，购书成功<br/>您的订单号为:".$order_o;
$button="查看订单详细内容";
$url="order.php?order_ID=".$order_o.'" target="_blank';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>订单信息确认</title>
		<base target="mainFrame" />
		<link href="css/bscss.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="appb">
		<div id="bt">确认订单信息<hr/></div>
		<div id="bb"><?php echo $msg; ?></div>
		<div align="center">
		<form action="<?php echo $url;?>" method="POST"><input type="submit"
		value="<?php echo $button; ?>"/>
<?php if($button=="查看订单详细内容"){?>
	<input type="submit" value="完成购书" onclick="window.location.replace(exit.php')"/></form>
<?php } ?>
</div>
</div>
</body>
</html>