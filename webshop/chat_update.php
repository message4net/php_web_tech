<?php
	session_start();
	$userid=$_SESSION['userid'];//�����Ự
	require_once('config.inc.php')
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');//���������Ӧ����ļ�
	$bookbmm=$_POST['bookbm']; $booknumm=$_POST['booknum'];//��ȡ�ύ��������
	$page=$_GET['page'];//��ȡURL���ݵ�����
	$userIP=$_SERVER[REMOTE_ADDR];//��ȡ�û���IP��ַ��ʶ���û�
	$chat=new (control);//�������鳵����
	if(is_array($booknumm)){//�����û������˹�������
		foreach($booknumm as $key=>$value){
			$DTname="bookchat";$serach="(chat_seesion_ID='".$userIP."' and 
			book_ID=".$key.")";
			$chatss=$chat->GetDTdataset($DTname,$serach);//��ȡ���鳵��Ϣ
			if((int)value<=0)
				$msg1.="��ѡͼ��".$key."�Ĺ�������Ӧ��Ϊ������!<br/>";
			else if((int)$value<>$chatss[0][buy_num]{
				$sql="update bookchat set buy_num=".$value." where ".$serach_c;
				$pp=$chat->update($sql);
				$msg1.="��ѡͼ��".$key."�޸ĳɹ�!<br/>";
			}
		}
	}
	if(is_array($bookbmm)){//�����û�ѡ��ȡ����ѡ��
		foreach($bookbmm as $key=>$value){
			if($value=="del"){
				$sql="delete from bookchat where (char_seesion_ID='".$userIP."' and 
				book_ID=".$key.")";
				$pp=$chat->delete($sql);
				$sql="alter table bookchat drop chat_ID";
				$pp($chat->delete($sql);
				$msg1.="��ѡͼ��".$key."��ȡ������!<br/>";
			}
		}
	}
	if($msg1=="") $msg1="û��ѡ���޸ĵķ�ʽ!<br/>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>�޸Ĺ�����Ϣ</title>
		<base target="mainFrame" />
		<link href="css/bscss.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="appb">
			<div id="bt">�޸Ĺ�����Ϣ<hr/></div>
			<table width="600" border="0" cellspacing="0" class="tdl">
				<tr id="bb" align="center"><td colspan="3"><?php echo $msg1;>?</td></tr>
				<tr><td align="left"><form method="post" action="chat_check.php?<?php 
				echo $page;?>"><input type="submit" value="����&lt;&lt;"></form></td></tr>
			</table>
			</div>
		</body>
	</html>