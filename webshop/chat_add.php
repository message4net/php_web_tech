<?php
	session_start();
	$userid=$_SESSION['user'];//�����Ự
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');//���������Ӧ����ļ�
	$bookbmm=$_POST['bookbm']; $booknumm=$_POST['buynum'];//��ȡ�ύ��������
	$title=$_GET['title']; $serash=$_GET['serach'];
	$pp=$_GET['pp'];$page=$_GET['page'];//��ȡurl���ݵ�����
	$url="book_show.php?title=$title&&pp=$pp&&serach=$serach=$serach&&page=$page";
	$userIP=$_SERVER[REMOTE_ADDR];//��ȡ�û���ip��ַ,��ʶ���û�
	$chat=new control();//�������ﳵ����
	if(is_array($bookbmm)){//�ж��û��Ƿ�ѡ����Ҫ�����ͼ��
			foreach($bookbmm as $key=>$value){//Ѱ�Ҳ�����ѡ�е�ͼ��
				$serach="(chat_seesion_ID='".$userIP."'AND book_ID=".$key.")";
				if($value=="sel"){
					if($booknumm[$key]<1) $msg1.="��ѡͼ��".$key."�Ĺ�������Ӧ��Ϊ��
					����!<br/>";
					else{
							$DTname="bookchat";
							$chat_s=$chat->GetDTdataset($DTname,$serach);//��ѯ�û��Ƿ�ѡ��������
							if(count($chat_s)==0){//û��ѡ���Ĵ���
									$sql="insert into bookchat(user_ID,book_ID,buy_num,chat_seesion_ID 
									values('$userid','$key','$booknumm[$key]','$userIP')";
									$pp=$chat->insert($sql);//���뵽���ﳵ����
								}
								else{//ѡ�����Ĵ���
									$booknu=$chat_s[0][buy_num]+$booknumm[$key];
									$sql="update bookchat set buy_num=".$booknu."where ".$serach;
									$pp=$chat->update($sql);//���ۼ�ֵ���¹�������
								}
								if($pp) $msg1.="��ѡͼ��".$key."��ӳɹ�!<br/>";//�ɹ�������ķ�����Ϣ
							}
						}
					}
				}
				else
					$msg1.="û��ѡ���κ�ͼ��<br/>";//û��ѡ��ͼ��ķ�����Ϣ
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>���鷴����Ϣ</title>
		<base target="mainFrame" />
		<link href="css/bscss.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="appb">
			<div id="bt">���鷴����Ϣ<hr/></div>
			<table width="600" border="0" cellspacing="0" calss="tdl">
			<tr id="bb" align="center"><td colspan="3"><?php echo $msg1;?></td></tr>
				<tr><td align="right"><form method="post" action="<?php echo $url;?>">
				<input type="submit" value="����ѡ��&gt;$gt;"></form></td>
			<td width="12">&nbsp;</td><td align="left">
				<form method="post" action="chat_check.php?page=1"><input type="submit" 
				value="�鿴���ﳵ&lt;&lt;"></form></td></tr>
			</table>
			</div>
		</body>
	</html>