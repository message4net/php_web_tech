<?php
	session_stat();
	$userid=$_SESSION['userid'];//�����Ự
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');
	require_once(Include_Path.'display.inc.php');//���������Ӧ����ļ�
	$page=$_GET['page'];
	$userIP=$_SERVER[REMOTE_ADDR];//��ȡ�û���ip��ַ����ʶ���û�
	if($page<1) $page=1;
	$chats=new control();//�������ﳵ����
	$DTname="bookchat"; $serach="chat_seesion_ID='".$userIP."'";
	$chat_s=$chats->GetDTdataset($DTname,$serach);//��ȡ���ﳵ��Ϣ
	$book_s=$chat->Getbookdata($DTname,$serach);//��ȡ���ﳵ�����е�ͼ����Ϣ
	$url="chat_check.php?page=";
	$dispalychat=new display();//�������ﳵ��ʾ����
	$displaychat->_pageSize=$chats->_pageSize;
	$pagelast=$displaychat->GetpageNum($chat_s);
	$chat=$chats->GetcontrolList($chat_s,$page);
	$displaybar=$displaychat->GetJumpBar($chat_s,$page,$url);//���ɹ��ﳵ��ʾ��ҳ�浼����
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>�鿴���ﳵ</title>
		<base target="mainFrame" />
		<link href="css/bscss.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="appb">
			<div id="bt">�鿴���ﳵ<hr/></div>
			<form action="<?php echo $url.$page1;?>" method="post">
			<table width="600" border="0" cellspacing="0" class="tdl">
				<tr><td height="24">����<?php echo count($chat_s);?>����&nbsp;&nbsp;��
				<?php echo $pagelast;?>ҳ&nbsp;&nbsp;<?php echo $displaybar['JumpBar'];?>
				</td>
					<td align="right">����ҳ��:<input type="text" size="3" name="page1" 
					value="<?php echo $page1;?>"><input type="submit" name="send2" value="ת��"/>
					</td></tr>
					</table>
					</form>
					<table width="600" border="1" cellspacing="1" class="tdl">
					<form method="post" action="chat_update.php?page=<?php echo $page;?>">
						<tr align="center" id="bb"><td>ȡ��</td><td>����</td><td>����</td>
						<td>������</td><td>����</td><td>��������</td><td>�ϼ�</td></tr>
<?php
	for($j=0;$j<count($chat);$j++){//����ѡ��ͼ�����Ϣ
		echo '<tr><td><input type="checkbox" name="bookbm['.$chat[$j][book_ID].']"
		value="del">'.$chat[$j][book_ID].'</td>';
		echo "<td>".$chats->Getstr($books_s[$j][book_name],30)."</td>";
		echo "<td>".$chats->Getstr($books_s[$j][author],20)."</td>";
		echo "<td>".$books_s[$j][publisher]."</td>";
		echo "<td>".$books_s[$j][price]*book_s[$j][book_l_price]."</td>";
		echo '<td><input type="text" size="6" name="booknum['.$chat[$j][book_ID].
		']" value="'.$chat[$j][buy_num].'"></td>';
		echo "<td>".$book_s[$j][price]*$book_s[$j][book_l_price]*$chat[$j][buy_num]
		."</td></tr>";
	}
?>
		<tr><td colspan="7" align="right"><?php echo $displaybar['msg'];?></td></tr>
		<tr id="bb"><td colspan="5">���ȡ����ѡ����޸Ĺ����������ڵ�����޸ġ�
		��ť�������޸�����<br/>���ȷ����Ҫ����飬���Ե������¶�������ť</td>
			<td align="center"><input type="submit" value="�޸�"/></td>
			<td><input type="button" value="�¶���" onclick="window.location.replace
			('order_check.php')"/></from></td></tr>
			</form>
			</table>
			<div align="center" class="tdl">&nbsp;<br/>&nbsp;</div>
			</div>
			</body>
		</html>