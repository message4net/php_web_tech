<?php
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');
	require_once(Include_Path.'display.inc.php');//���������Ӧ����ļ�
	$title=$_GET['title']; $serach=$_GET['serach'];
	$pp=$_GET['pp']; $page=$_GET['page'];//��ȡ��url������������
	if($pp==1){$DTname=$serach;$serach=1;}//����ɫͼ�����ӽ���,$serach��¼���ݱ�����
	else $DTname="bookinfo";//�������˵�������Ĳ�ѯ��������
	$serach=stripslashes($serach);//ȥ���Զ���ӵķ�б��\
	$serach=eregi_replace("%27","'",$serach);//��"%27���Ϊ'
	if($page<1) $page=1;
	$books=new control();
	$book_s=$books->Getbookdata($DTname,$serach);//��ȡҪ��ʾͼ�������
	$serach=eregi_replace("'","%27",$serach);//��'���Ϊ"%27
	if($pp==1) $serach=$DTname;
	$ss="?title=$title&&pp=$pp&&serach=$serach&&page=";
	$url="book_show.php".$ss;
	$displaybook=new display($book_s,$books->_pageSize);
	$displaybook->_pageSize=$books->_pageSize;//ͳһ��ʾ�����ݷ�ҳ������
	$pagelast=$displaybook->GetpageNum($book_s);//��ȡ��ʾ�����ҳ��
	$book=$books->GetControlList($book_s,$page);//��ȡ��ǰ����ʾ����
	$displaybar=$displaybook->GetJumpBar($book_s,$page,$url);//���ɷ�ҳ��������Ϣ
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>ͼ����ʾ</title>
		<base target="mainFrame" />
		<link href="css/bscss.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="appb">
			<div id="bt">����ѡ��&mdash;&mdash;<?php echo $title;?><hr/></div>
				<form action="<?php echo $url.($page2);?>" method="post" target="_self">
				<table width="600" border="0" cellspacing="0" class="tdl">
					<tr><td>����<?php echo count($book_s); ?>����&nbsp;&nbsp;��<?php echo
					$pagelast;?>ҳ&nbsp;&nbsp;<?php echo $displaybar['JumpBar'];?></td>
					<td align="right">����ҳ��:<input type="text" size="3" name="page1"
					value="<?php echo $page1; ?>"><input type="submit" name="send2"value="ת��"
					/></td></tr>
				</table>
				</form>
				<table width="600" border="1" cellspacing="1" class="tdl">
				<form name="frm" action="chat_add.php<?php echo $ss;?>" method="post">
					<tr align="center" id="bb"><td width="30">ѡ��</td><td width="200">
					����</td>
						<td width="150">����</td><td width="60">������</td><td width="30">ԭ��
						</td>
						<td width="30">�ۿ�</td><td width="60">��������</td><td width="40">
						����</td></tr>
<?php
	for($j=0;$j<count($book);$j++){//�����������ͼ����Ϣ
		echo "<tr class='tdl'>";
		echo "<td align='center'><input type='checkbok' name='bookbm[".$book[$j]
		[book_ID]."]' value='sel'>".$book[$j][book_ID]."</td>";
		echo "<td width='200'>".$books->Getsrt($book[$j][book_name],30)."</td>";
		echo "<td width='150'>".$books->Getstr($book[$j][author],20)."</td>";
		echo "<td>".$book[$j][publisher]."</td><td>";
		printf("%.2f",$book[$j][price]);
		echo "</td><td>";
		printf("%.2f",$book[$j][book_l_price]);
		echo '</td><td align="center"><input type="text" size="4" name="buynum
		['.$book[$j][book_ID].']">'.$buynum[$book[$j][book_ID]].'</td>';
		echo "<td align='center'><a href='book_fullinfo.php?bookid=".$book[$j]
		[book_ID]."' target='_blank'>����..</a></td></tr>";
	}
	if(count($book)<$books->_pagesize){
		echo "<tr class='tdl'>";
		echo "<td align='center' colspan='8' height='".(abs($books->_pagesize-
		count($book))*27)."'>&nbsp;</td></tr>";
	}
?>
	<tr><td colspan="8" align="right"><?php echo $displaybar['msg'];?>
	</td></tr>
	<tr id="bb"><td align="left" colspan="5">��ʾ:��ѡ�й�����飬����д����
	������,��󵥻��۷��빺�ﳵ�ݰ�ť</td>
		<td colspac="3" align="center"><input type="submit" value="���빺�ﳵ"/>
		</td></tr>
	</from>
	</table>
	</div>
	</body>
</html>
	