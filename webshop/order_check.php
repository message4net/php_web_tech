<?php
	session_start();
	$userid=$_SESSION['userid'];//�����Ự
	$userIP=$_SERVER[REMOTE_ADDR];//��ȡ�û���IP��ַ����ʶ���û�
	$button=$_POST['sub'];
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');
	$bcob=new control();
	$DTname="bookchat"; $serach="chat_seesion_ID='".$userIP."'";
	$chat_s=$bocb->GetDTdataset($DTname,$serach);//��ȡ���ﳵ��Ϣ
	if(count($chat_s)==0{//ȷ�Ϲ��ﳵ����ͼ��ķ�����Ϣ�Ͳ�������
		$msg="���ﳵ��û��ͼ�飬�����¶���";
		$submit="������ҳ";
		$url="../main.php";
	}
	else{//ȷ�Ϲ��ﳵ����ͼ��
		if($userid==""){//�����û�û�е�¼�ķ����Ͳ���
			$msg="��û�е�¼<br/>�����ȵ�¼�����¶���";
			$submit="ȥ��½";
			$url="'../register/regindex.php' target='_blank'";
		}
		else{//�����û���¼�ķ����Ͳ���
			$msg="ȷ��Ҫ�¶���?<br/>ȷ��Ҫ�����鳵�ϵ�ͼ��";
			$submit="ȷ��";
			$url="'book_order.php' target='_blank'";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>��չ��ﳵ������Ϣ</title>
		<base target="mainFrame" />
		<link href="css/bscss.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="appb">
			<div id="bt">��չ��ﳵ������Ϣ<hr/></div>
			<table width="600" border="0" cellspacing="0" class="tdl">
				<tr id="bb" align="center"><td colspan="2"><?php echo $msg;?></td></tr>
				<tr align="center"><td><form method="post" action="<?php echo $url; ?>"
				><input type="submit" name="sub" value="<?php echo $submit; ?>">
				onmousedown="window.close();"></form></td></tr>
			</table>
		</div>
	</body>
</html>