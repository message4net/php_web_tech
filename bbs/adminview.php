<?php
	require_once("bbshead.php");
	include_once("sys_conf.inc");
	$connection=@mysql_connect($DBHOST,$DBUSER,$DBPWD) or die("�޷��������ݿ�");
	@mysql_query("set names 'gb2312'");
	@mysql_select_db("guest") or die("�޷�ѡ�����ݿ�");
	$query="select * from guestlist where flag='Y' order by btime desc";
	$result=mysql_query($query,$connection) or die(mysql_error());
	$count=mysql_num_rows($result);//ͳ������������Ϣ
	//������Ϣ��
	$bbsinfostr="Ŀǰ�����⹲��".$count."�����Իָ���";
	if($page<=0||$count==0) $page=0;
	$msgPerPage=10;//����һҳ����ʾ������¼��
	$start=$page*$msgPerPage;//����ÿҳ��ʼ�ļ�¼���
	$end=$start+$msgPerPage;//����ÿҳ�����ļ�¼���
	if($end>$count) $end=$count;
	$totalpage=ceil($count/$msgPerPage);
	if($count>0) $bbsinfostr.="��ҳ�г��˵�".($start+1)."��".$end."��\n";
	//����ҳ������
	if($page>0) $numestr="<a href='$_SERVER[PHP_SELF]?page=".($page-1)."'>
	��һҳ|</a>".$numestr;
	for($i=0;($i<$totalpage);$i++){
		if($i==$page) $numestr=$numestr.($i+1);
		else $numestr=$numestr."<a href='$_SERVER[PHP_SELF]?page=$i'>"
		.($i+1)."</a>";
	if($i!=($totalpage-1)) $numestr=$numestr."|";
	}
	if($page<($totalpage-1)) 
		$numestr=$numestr."<a href='$_SERVER[PHP_SELF]?page=".($page+1)."'>
	|��һҳ</a>";
	$query="select * from guestlist where flag='Y' order by btime desc limit $start,$msgPerPage";
	$result=mysql_query($query,$connection) or die("��ȡ����ʧ��");//��ѯ��ҳ����������Ϣ
?>
	<div id="bt">�鿴����<hr/></div>
	<div id="err"><?php echo $bbsinfostr;?></div>
	<div id="bd">
		<table width="100%" border="1" cellspacing="1" class="tdl">
			<tr align="center" id="bitem"><td>��&nbsp;&nbsp;��</td><td>��&nbsp;&nbsp;��</td>
			<td>����ʱ��</td><td>�ظ�����</td><td>ɾ&nbsp;&nbsp;��</td></tr>
<?php
	while($row=@mysql_fetch_array($result)){//�����������
		//��ʽ��ʱ�����
		$dbdate=$row[btime];
		$year=substr($dbdate,0,4);//��ȡ��
		$month=substr($dbdate,5,2);//��ȡ��
		$day=substr($dbdate,8,2);//��ȡ��
		$hour=substr($dbdate,11,2);//��ȡСʱ
		$min=substr($dbdate,14,2);//��ȡ����
		$sec=substr($dbdate,17,2);//��ȡ��
		$time=$year."��".$month."��".$day."��".$hour."ʱ".$min."��".$sec."��";
		//����һ�������������Ϣ
		echo "<tr align='center'><td><a href='adminviewinfo.php?btitle=
		".$row[btitle]."'>".$row[btitle]."</a></td>";
		echo "<td>".$row[name]."</td><td>".$time."</td>";
		$query="select * from replylist where ( flag='Y' and btitle='".$row[btitle]."')";
		$result1=@mysql_query($query,$connection) or die("��ȡ����ʧ��");
		$replynum=mysql_num_rows($result1);
		echo "<td>".$replynum."</td>";
		echo "<td><a href='delete.php?btitle=".$gb[$i][btitle]."'>ɾ��</a></td></tr>";
	}
	@mysql_close($connection) or die("�޷��Ͽ������ݿ������");
	?>
		</table>
		</div>
		<div id="err" align="center"><?php echo $numestr;?></div>
		<hr/>
		<iframe scrolling="no" width="780" height="60" src="bbsbottom.html"
	marginwidth="0" marginheight="0" border="0" frameborder="0" align="center">
	��֧��</iframe>
</body>
</html>