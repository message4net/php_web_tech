<?php
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');//���������Ӧ����ļ�
	$bookid=$_GET['bookid'];//��ȡͼ�����к�bookid
	$book_s=new control();//����ͼ�����
	$sql="select * from bookinfo where book_ID=".$bookid;
	$book=$book_s->select($sql);//ʹ�û����������еķ���select($sql)��ѯ���ݼ�
	$user=new control();//���������û�����
	$sql2="select * from usermessage where book_ID=".$bookid;
	$usermsg=$user->select($sql2);
	if(count($usermsg)==0) $msg="����������Ϣ";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>ͼ����ϸ��Ϣ��ʾ</title>
		<base target="mainFrame" />
		<link href="css/bscss.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="appb">
			<div id="bt">��ѯ��ͼ����ϸ��Ϣ<hr/></div>
			<table width="100%" border="0" cellspacing="0">
				<tr><td id="bb">&nbsp;$nbsp;</td></tr>
			</table>
			<table width="100%" border="1" cellspacing="1" class="tdl">
			<tr><td width="10%" align="right">����</td>
				<td width="%50" class="tdd"><?php echo $book[0][book_name];?></td>
			<td rowspan="9" align="center"><img src="<?php echo $book[0][book_pic]; ?>"
			/></td></tr>
			<tr><td align="right">����</td>
				<td class="tdd"><?php echo $book[0][author]; ?></td></tr>
			<tr><td align="right">������</td>
				<td class="tdd"><?php echo $book[0][publisher]; ?>&nbsp;������
				</td></tr>
			<tr><td align="right">��������</td>
				<td class="tdd"><?php echo substr($book[0][pub_date],0,10); ?>
				</td></tr>
			<tr><td align="right">���</td>
				<td class="tdd"><?php echo $book[0][book_no]);?></td></tr>
			<tr><td align="right">�ۿۼ�</td>
				<td class="tdd"><?php pritf("%.2f",$book[0][book_l_price];?></td></tr>
			<tr><td align="right">��Ա��</td>
				<td class="tdd"><?php echo $book[0][price_m];?></td></tr>
			<tr><td align="right">�ȼ�</td>
				<td class="tdd"><font corlor="#FF0000"><?php echo $book[0][book_level];?>
				</font>&nbsp;��&nbsp;&nbsp;<img src="<?php echo $book[0][book_level_pic];?>"
				/></td></tr>
			<tr><td colspan="3">ժҪ&nbsp;&nbsp;<span class="tdd"><?php echo $book[0][book_absract];?></span>
			</td></tr>
			<tr><td colspan="3">Ŀ¼<pre class="tdd"><?php echo $book[0][book_index];?></pre>
			</td></tr>
			<tr><td colspan="3" align="center"><a href="#" onClick="javascript:window.close();return false;">
			����</a></td></tr>
		</table>
		<table width="100%" border="1" cellspacing="1" class="tdl">
			<tr><td id="bt">�ÿ�������Ϣ<hr/></td></tr></table>
		<table width="100%" border="1" cellspacing="1" class="tdl">
			<tr><td colspan="3">&nbsp;Ŀǰ�Ա����������<?php echo count($usermsg);?>
			����</td></tr>
<?php
	for($j=0;$j<count($usermsg);$j++){
		echo "<tr class='tdl'><td>".$usermsg[$j][user_ID]."</td>";
		echo "<td>".$usermsg[$j][book_level]."</td>";
		echo '<td>'.$usermsg[$j][message_content].'</td></tr>';
	}
?>
		<tr><td colspan="3" align="center">&nbsp;<?php echo $msg;?></td></tr>
		<tr align="center" id="bb"><td colspan="3">��Ҫ����</td></tr>
	</table>
	<table width="100%" border="1" align="center" cellspacing="1" class="tdl">
	<form action="user_fback.php?bookid=<?php echo $bookid;?>"method="post">
	<tr><td width="10%" align="right">�û���</td>
		<td class="tdd">input name="user_id" type="text" id="textfield"
		size="70"/>*</td></tr>
		<tr><td align="right">���۵ȼ�</td>
		<td class="tdd"><input type="radio" name="book_level" value="�Ƽ�"
		id="RadioGroup1_0"/>
		�Ƽ�<input name="book_level" type="radio" id="RadioGroup1_1" value="һ��"
		checked="checked"/>һ��<input type="radio" name="book_level" value="���Ƽ�"
		id="RadioGroup1_2"/>���Ƽ�</td></tr>
		<tr><td align="right">��������</td>
		<td class="tdd"><textarea name="comm" cols="73" rows="5" id="textfield3">
		</textarea></td></tr>
		<tr><td colspan="2" align="center"><input type="submit" name="button" 
		id="button" value="�ύ"/></td></tr>
		</form>
		</table>
		</div>
	</body>
</html>