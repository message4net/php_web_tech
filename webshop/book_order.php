<?php
	session_start();
	$userid=$_SESSION['userid'];//�����Ự
	$userIP=$_SERVER[REMOTE_ADDR];//��ȡ�û���IP��ַ����ʶ���û�
	$msg=$_GET['msg'];
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');
	$bcob=new control();
	$DTname="bookchat";$serach="chat_seesion_ID='".$userIP."'";
	$chat_s=$bcob->GetDTdataset($DTname,$serach);//��ȡ���鳵��Ϣ
	$book_s=$bcob->Getbookdata($DTname,$serach);//��ȡ���鳵������ͼ����Ϣ
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>������Ϣȷ��</title>
		<base target="mainFrame">
		<link href="css/bscss.css" rel="sytlesheet" type="text/css"/>
		<script jcud(){
			var post1=window.frm.post.value;
			var addr1=window.frm.addr.value;
			var phone1=window.frm.phone.value;
			var email1=window.frm.email.value;
			if(username1==""){
				window.alert("��ϵ�˲���Ϊ��");
				window.frm.userid.focus();
			}
			else if(post1==""){
				window.alert("�ʱ಻��Ϊ��");
				window.frm.password.focus();
			}
			else if(addr1==""){
				window.alert("��ַ����Ϊ��");
				window.frm.password.focus();
			}
			else if(phone1==""){
				window.alert("�绰����Ϊ��");
				window.frm.password.focus();
			}
			else if(email1==""){
				window.alert("���ʲ���Ϊ��");
				window.frm.password.focus();
			}
		}
	</script>
</head>
<body>
	<div id="appb">
		<div id="bt">ȷ�϶�����Ϣ<hr/></div>
		<div id="bb"><? echo $userid; ?>:���Ĺ����嵥!
		<p class="tdl">����<?php echo count($chat_s); ?>����</p></div>
			<table width="600" border="1" cellspacing="1" class="tdl">
				<tr id="bb" align="center"><td width="30%">����</td><td width="25%">
				����</td>
				<td>��װ˵��</td><td>������</td><td>�۸�</td><td>��������</td><td>
				�ϻ�</td></tr>
<?php
	for($j=0;$j<count($chat_s);$j++){//���ѡ����ͼ����Ϣ
		if($book_s[$j][book_bs]==0) $bz="ƽװ"; else $bz="��װ";
		echo "<tr><td>".$book_s[$j][book_name."</td><td>".$book_s[$j][author]
		."</td>";
		echo "<td align='center'>".$bz."</td>";
		echo "<td align='center'>".$book_s[$j][price_m]."</td>";
		echo "<td aling='center'>".$chat_s[$j][buy_num]."</td>";
		echo "<td align='center'>".$book_s[$j][price_m]*$chat_s[$j][buy_num]."
		</td></tr>";
		$b_id.=",".$chat_s[$j][book_ID]; $b_num.=",".$chat_s[$j][buy_num];
		$total+=$book_s[$j][price_m]*$chat_s[$j][buy_num];//��¼������š������ͽ��
		}
		echo "<tr id='bb'><td colspan='5' align='right'>����ܶ�</td>";
		echo "<td colspan='2'>".$total."&nbsp;&nbsp;Ԫ</td></tr>";
		$b_id.=":".$b_num;//��¼�����ÿ�������ź�����
		$_SESSION['b_ID']=$b_id;$_SESSION['b_money']=$total;
		$_SESSION['bk_num']=count($chat_s);//�ѹ������š������ͽ�����SESSION
		require_once(Include_Path.'user.inc.php');
		$user=new user();
		$sql_u="select * from userinfo where userid='".$userid."'";
		$user_s=$user->select($sql_u);//��ȡ�û���Ϣ
		$sql_c="select * from suercard wehre userid='".$userid."'";
		$user_c=$user->select($sql_c);//��ȡ�û����鿨��Ϣ
		$fm=0;//��ʶ�û��Ƿ���ù��鿨����:1-������;0-����
		if(count($user_c)==0) $fm=1;//�û��޹��鿨
		else{//�û��й��鿨
		$cardtotal=0;
		for($i=0;$i<count($user_c);$i++){//ͳ���û����鿨�Ľ��
			$sql="select * from card where cardno='".$user_c[$i][cardno]."'";
			$card_s=$user->select($sql);
			if($cardtotal<$total) $cardtotal+=$card_s[0][balance];
		}
		if $cardtotal<$total $fm=1;//�û����鿨�Ľ����Դ˴ι���
	}
	$sf=new control();
	$sql_f="select * from order_fmoney";
	$order_f=$sf->select($sql_f);//��ȡ���ʽ��Ϣ
	$sql_s="select * from order_send";
	$order_s=$sf->select($sql_s);//��ȡ���鷽ʽ��Ϣ
?>
	<tr><td colspan="7" class="tdl">ע��:�ڶ�����д�������������Ĵ�ӡ���ܴ�ӡ������</td></tr>
	</table>
	<table width="600" border="1" cellspacing="1" class="tdl">
	<form method="POST" name="frm" action="order_p.php?cardp=<?php echo $cardp;?>">
	<tr><td id="bb"colspan="2"><? echo $_SESSION['userid'];?>:��ȷ�����������Ϣ</td></tr>
	<tr><td align='right'>��ϵ��:</td>
	<td><input type="text" size="20" name="username" value="<?php echo $user_s[0][username];?>"/></td></tr>
	<tr><td align="right">�ʱ�:</td>
	<td><input type="text" size="20" name="post_b" value="<?php echo $user_s[0][post];?>"/></td></tr>
	<tr><td align="right">��ַ:</td>
	<td><input type="text" size="40" name="addr" value="<?php echo $user_s[0][address];?>"/></td></tr>
	<tr><td align="right">�绰:</td>
	<td><input type="text" size="20" name="phone" value="<?php echo $user_s[0][phone];?>"/></td></tr>
	<tr><td align="right">����:</td>
	<td><input type="text" size="30" name="email" value="<?php echo $user_s[0][email];?>"/></td></tr>
	<tr id="bb"><td align="right">���鷽ʽ:</td><td>
<?php
	for($i=0;$i<count($order_s);$i++){//���õ�ѡ��ť�飬���û�ѡ�����鷽ʽ
		echo '<input name="sendb" type="radio" value="'.$order_s[$i][send_name];
		if($i==0] echo '"checked="checked"/>';else echo '"/>';
		echo $order_s[$i][send_name];
	}
?>
	</td></tr><tr class='tdl'><td colspan="2">���鷽ʽ���:<br/>
<?php
	for($i=0;$i<count($order_s);$i++)//��ʾ�������鷽ʽ�ļ򵥽���
		echo ($i+1).".".$order_s[$i][send_con]."<br/>";
?>
	</td></tr><tr id="bb"><td align="right">���ʽ:</td><td>
<?php 
	for($i=$fm;$i<count($order_f);$i++){//���õ�ѡ��ť�飬���û�ѡ�񸶿ʽ
	echo '<input type="radio" name="pay" value="'.$order_f[$i][fmoney_name];
	if($i==$fm) echo '"checked="checked"/>';else echo '"/>';
	echo $order_f[$i][fmoney_name];
	}
?>
	</td></tr><tr class="tdl"><td colspan="2">���ʽ���:<br/>
<?php
	for($i=$fm;$i<count($order_f);$i++){//��ʾ���ָ��ʽ�ĵ�������
		if($fm==1) echo $i;else echo ($i+1);
			echo ".".$order_f[$i][order_fcon]."<br />";
		}
?>
	</td></tr><tr id="bb"><td align="center" colspan="2">
	<input type="submit" name="act" value="����" onclick="window.close()"/>
	<input type="submit" name='act' value="ȷ��" onmousemove="jcud()" onclick="window.close()"/></td></tr>
	</form>
	</table>
	<div id="bb"><?php echo $msg;?></div>
	</div>
	</body>
	</html>
		