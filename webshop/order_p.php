<?php
	session_start();
	$userid=$_SESSION['userid'];
	$sub=$_POST['act'];//��ȡ�û���ǰһҳ�Ĳ���
	if($sub=="����"){//�û��������ι���ķ����źͲ�������
		$msg=$userid.':ȷ��Ҫ������?������<br/>������ȷ������ť�󣬽�������ﳵ�ϵ�������Ϣ';
		$button="ȷ��"
		$url="chat_clear.php";
	}
	else if($sub=="ȷ��"){//�û�ȷ�ϱ��ι��鷴���źͲ�������
	$b_ID=$_SESSION['b_ID']; $b_num=$_SESSION['bk_num'];
	$b_money=$_SESSION['b_money'];//��ȡSESSION����
	$username=$_POST['username'];$post1=$_POST['post_b'];$addr1=$_POST['addr'];
	$phone1=$_POST['phone'];$email1=$_POST['email'];
	$send=$_POST['sendb'];$fmoney=$_POST['pay'];//��ȡ�ύ�ı���Ϣ
	require_once('config.inc.php');
	require_once(Include_Path.'user.inc.php');
	$user=new user();
	$serach_u="select * from usercard wehre userid='".$userid."'";
	$user_s=$user->select($serach_u);//��ȡ�û���Ϣ
	$msg1=$userid.":�����ù��鿨֧�����ѽ������<br/>";
	$j=0;$p_money=$b_money;//���ݱ������ѽ��
	while($p_money>0 && $j<count($user_s)){//�۳����鿨�������ѵĽ��
		$sql_c="select * from card wehre cardno='".$user_s[$j][cardno]."'";
		$card_s=$user->select($sql_c);
		if($card_s[0][balance>=$p_money){//һ�Ź��鿨��֧���������ѵĽ��
			$cards=$card_s[0][balance]-$p_money;//�۳��������ѵĽ��
			$p_money=0;//��δ���ѽ������Ϊ0
			$serach_c="update card set balance=$cards where cardno='".$user_s[$j][cardno]."'";
			$cardu=$user->update($serach_c);//���¹��鿨���
			$msg=$msg1."���鿨".$user_s[$j][cardno]."�����:".$cards."<br/><br/>";
		}
		else{//һ�Ź��鿨������֧���������ѵĽ��
			$p_money=$p_money-$card_s[0][balance];//������δ���ѽ��Ϊ0
			$msg1.="���鿨".$user_s[$j][cardno]."���������<br/><br/>":
			$serach_c="update card set balance=0 where cardno='".$user_s[$j][cardno]."'";
			$cardu=$user->update($serach_c);//���øĹ��鿨�Ľ��Ϊ0 
			$j++;
		}
	}
}
require_once(Include_Path.'control.inc.php');
$bcob=new control();//������������
$sql_o="insert into orderinfo (user_name,order_post,order_addr,order_phone,order_email,order_send,order_fmoney,ofder_num,
order_state,order_money,order_time,order_note) values('$username','$post1','$addr1','$phone1','$email1','$send','$fmoney','$b_num','0','$bmoney',CURRENT_TIMESTAMP,
$b_ID')";
$order_o=(int)$bcob->insert($sql_o);//����һ���¶���,���ص��Ǹü�¼���кţ���Ϊ������
$sql_c="update bookchat set order_ID='".$order_o."' where user_ID='".$userid."'";
$chat_c=$bcob->update($sql_c);//�޸Ĺ��鳵��order_ID
$msg.=$userid.":��ϲ��������ɹ�<br/>���Ķ�����Ϊ:".$order_o;
$button="�鿴������ϸ����";
$url="order.php?order_ID=".$order_o.'" target="_blank';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>������Ϣȷ��</title>
		<base target="mainFrame" />
		<link href="css/bscss.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="appb">
		<div id="bt">ȷ�϶�����Ϣ<hr/></div>
		<div id="bb"><?php echo $msg; ?></div>
		<div align="center">
		<form action="<?php echo $url;?>" method="POST"><input type="submit"
		value="<?php echo $button; ?>"/>
<?php if($button=="�鿴������ϸ����"){?>
	<input type="submit" value="��ɹ���" onclick="window.location.replace(exit.php')"/></form>
<?php } ?>
</div>
</div>
</body>
</html>