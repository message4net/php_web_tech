<?php
	session_start();
	$userid=$_SESSION['userid'];//�����Ự
	$userIP=$_SERVER[REMOTE_ADDR];//��ȡ�û���IP��ַ����ʶ���û�
	$button=$_POST['sub'];
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');
	$chats=new control();
	$DTname="bookchat";$serach="chat_seesion_ID='".$userIP."'";
	$chat_s=$chats->GetDTdataset($DTname,$serach);//��ȡ���鳵��Ϣ
	if(count($chat_s)==0){//ȷ�Ϲ��鳵���Ƿ���ͼ��
		$msg="���ﳵΪ��!<br/>���ﳵ��û��ѡ��ͼ�����Ϣ";
		$submit="����";
		$url="../index.php";
	}
	else{//ȷ�Ϲ��ﳵ�ϵ�ͼ���Ƿ��Ѿ����ɶ���
		$count=0;
		for($i=0;$i<count($chat_s);$i++){
			if($chat_s[$i][order_ID]==0) $count++; //0��ʾΪ���ɶ���
		}
		if($count==0){//���ﳵ�ϵ�ͼ���Ѿ����ɶ���
			$msg="���ﳵ��Ҫ���!<br/>���ﳵ��ѡ����".count($chat_s)."ͼ���Ѿ����ɶ���";
			$submit="ȷ��";
			$user="chat_clear.php";
		}
		else{//���ﳵ�ϵ�ͼ��Ϊ���ɶ���
			$msg="���ﳵ��Ҫ���?<br/>���ﳵ��ѡ����".$count."��ͼ����δ���ɶ���";
			$submit="ȷ��";
			$url="chat_clear.php";
		}
	}
	if($button=="ȷ��"){//�û�ȷ��Ҫ������ﳵ
		$sql="delete from bookchat where chat_seesion_ID='$userIP'";
		$chats->delete($sql);
		$sql="alter table bookchat drop chat_ID;";
		$chats->delete($sql);
		$sql="alter table bookchat add chat_id int(11) NOT NULL AUTO_INCrement 
		primary key first;";
		$chats->delete($sql);
		$msg="���ﳵ�����!<br/>���ﳵ��û��ѡ����ͼ����Ϣ";
		$submit="����";
		$url="../index.php";
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
				</form></td>
<?php if($count<>0 { ?>
	<td align="right"><from method="post" action="chat_check.php?<?php echo $page; ?>"
	><input type="submit" value="�鿴���ﳵ&gt;&gt;"></from></td>
<?php } ?>
	</tr>
	</table>
	</div>
	</body>
</html>