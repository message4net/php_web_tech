<?php
	require_once("chathead.php");
	include_once("sys_conf.inc");
	$connection=@mysql_connect($DBHOST,$DBUSER,$DBPWD) or die("�޷��������ݿ�");
	@mysql_query("set names 'gb2312'");
	@mysql_select_db("chat") or die ("�޷�ѡ�����ݿ�");
	$query="select * from chatroom";
	$result=mysql_query($query,$connection) or die("��ȡ���ݿ�ʧ��".mysql_error());
	@mysql_close($connection) or die("�޷��Ͽ������ݿ������");
	$chatnum=mysql_num_rows($result);
	$chatinfostr="�������ҹ���".$chatnum."�������¼��";//������Ϣ��
	if($page<=0||$chatnum==0) $page=0;
	$msgPerPage=10;//����һҹ����ʾ������¼��
	$start=$page*$msgPerPage;//����ÿҳ��ʼ�ļ�¼���
	$end=$start+$msgPerPage;//����ÿҳ�����ļ�¼���
	if($end>$chatnum) $end=$chatnum;
	$totalpage=ceil($chatnum/$msgPerPage);
	if($chatnum>0) $chatinfostr.="��ҳ�г��˵�".($start+1)."��".$end."����";
?>
	<div id="bt">�鿴�����¼<hr/></div>
	<div id="err"><?echo $chatinfostr;?></div>
	<div id="bd">
		<table width="100%" border="1" cellspacing="1" class="tdl">
			<tr align="center" id="err"><td width="8%">���</td><td width="10%">
			�Ŀ�</td>
			<td width="20%">����ʱ��</td><td>��������</td></tr>
<?php
	for($i=$start;$i<$end;$i++){//���������Ϣ
		@mysql_data_seek($result,$i);
		list($cid,$cauthor,$cctime,$cemotion,$caction,$ccolor,$ctext)=mysql_fetch_row($result);
		if($ctext!==""|| $cemotion!="") $chatstr.=$cemotion."˵����<font color=$ccolor>".$ctext."</font><br/>";
		else $chatstr.="<font color='blue'>".$caction."</font><br/>";
		//���һ��������Ϣ
		echo "<tr><td>".$cid."</td><td>".$cauthor."</td><td>".$cctime."</td><td>".$chatstr."</td></tr>";
		$chatstr="";
	}
	if($page==$totalpage-1)
		for($j=$msgPerPage;$j>($i-10*floor($i/10));$j--){//һҳ�м�¼���������ʱ���������
			echo "<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
		}
		//����ҳ����
		if($page>0)
			$numestr="<a href=$_SERVER[PHP_SELF]?page=".($page-1).">��һҳ</a>|".$numestr;
		for($i=0;($i<$totalpage);$i++){
		if($i==$page) $numestr=$numestr.($i+1);
		else $numestr=$numestr."<a href=$_SERVER[PHP_SELF]?page=$i>".($i+1)."</a>";
		if($i!=($totalpage-1)) $numestr=$numestr."|";
	}
	if($page<($totalpage-1)) $numestr=$numestr."|<a href=$_SERVER[PHP_SELF]?page=".($page+1).">��һҳ</a>";
?>
	</table>
	</div>
	<div id="err" align="center"><?php echo "$numestr"; ?></div><hr/>
	<iframe scrolling="no" width="780" height="60" src="chatbottom.html"
	marginwidth="0" marginheight="0" border="0" frameborder="0" align="center">
	��֧��</iframe>
	</div>
</body>
</html>