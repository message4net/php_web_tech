<?php 
	require_once("bbshead.php");
	$btl=$_GET[btitle];
	include_once("sys_conf.inc");
	$connection=@mysql_connect($DBHOST,$DBUSER,$DBPWD) or die("�޷��������ݿ�");
	@mysql_query("set names 'gb2312'");
	@mysql_select_db("guest") or die("�޷��������ݿ�");
	$query="select * from guestlist where btitle='".$btl."'";//��ѯ��guestlist�����м�¼
	$result=@msyql_query($query,$connection) or die("��ȡ���ݿ�ʧ��");
	$row=@mysql_fetch_array($result);
	$query="select * from replylist where ( flag='Y' and btitle='".$btl."')";
	$result1=@mysql_query($query,$connection) or die("��ȡ����ʧ��1");
	//��ѯreplylist
	$replynum=@mysql_num_rows($result1);//ͳ�ƻظ�������Ϣ
	//������Ϣ��
	$bbsinfostr="Ŀǰ�����⹲��".$replynum."�����Իظ�";
	if($page<=0||$replynum==0) $page=0;
	$msgPerPage=2;//����һҳ����ʾ������¼��
	$start=$page*$msgPerPage;//����ÿҳ��ʼ�ļ�¼���
	$end=$start+$msgPerPage;//����ÿҳ�����ļ�¼���
	if($end>$replynum) $end=$replynum;
	$totalpage=ceil($replynum/$msgPerPage);
	if($end>0) $bbsinfostr.="��ҳ�г��˵�".($start+1)."��".$end."��\n";
	//����������
	if($page>0) $numestr="<a href='$_SERVER[PHP_SELF]?page=".($page-1)."$btitle=".$row[btitle]."'>
	��һҳ|</a>".$numestr;
	for($i=0;($i<$totalpage);$i++){
	if($i==$page) $numestr=$numestr.($i+1);
	else $numestr=$numestr."<a href='$_SERVER[PHP_SELF]?page=".$i.
	"&btitle=".$row[btitle]."'>".($i+1)."</a>";
	if($i!=($totalpage-1)) $numestr=$numestr."|";
	}
	if($page<($totalpage-1)) $numestr=$numestr."<a href='$_SERVER[PHP_SELF]?page=".($page+1).
	"$btitle=".$row[btitle]."'>|��һҳ</a>";
?>
	<div id="bt">������Ϣ<hr/></div>
	<div id="err"><?php echo $bbsinfostr;?></div>
	<div id="bd">
	<table width="100%" border="1" cellspacing="1" class="tdl">
		<tr id="err"><td width="30%" rowspan="3">�������к�:<?php echo 
		"$row[serial]";?><br/>����:<?php echo "$row[name]";?></td><td>����:<?php
		 echo "$row[btitle]";?>&nbsp;&nbsp;&nbsp;&nbsp;����ʱ��:<?php echo "$row[btime]";?></td></tr>
		<tr><td>����:<?php echo "$row[msg]";?></td></tr>
		<tr><td id="err" align="right"><a href="mailto:<?php echo "$row[email]";?>">�ʼ�:
		<?php echo "$row[email]";?></a>&nbsp;&nbsp;&nbsp;&nbsp;<a hraf="rewrite.php?btitle=<?php echo
		$row[btitle];?>&p=0">�ظ�����</a></td></tr>
	<?php
		$s="select * from replylist where (flag='Y' and btitle='".$btl."') limit $start,$msgPerPage";
		$result2=@mysql_query($s,$connection) or die("��ȡ����ʧ��");//��ѯ��ҳ�ظ�������Ϣ
		@mysql_close($connection) or die("�޷��Ͽ������ݿ������");
		while($row2=@mysql_fetch_array($result2)){//�����������
			echo "<tr><td width='30%' rowspac='3'>�ظ��������к�:".$row2[serial]."
			<br/>����:".$row2[name]."</td><td>����ʱ��:".$row2[btime]."</td></tr>";
			echo "<tr><td>����:".$row2[msg]."</td></tr>";
			echo "<tr><td align='right'><a href='mailto:".$row2[email]."'>�ʼ�:
			".$row2[email]."</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='rewrite.php?btitle=
			".$row[btitle]."$p=0'>�ظ�����</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='hide.php?btitle=".$row[btitle]."&serial=".$row2[serial]."'>��������</a></td></tr>";
		}
	?>
		</table>
	<dir id="err" align="center"><?php echo "$numestr";?></div><hr/>
	<iframe scrolling="no" width="780" height="60" src="bbsbottom.html"
	marginwidth="0" marginheight="0" border="0" frameborder="0" align="center">
	��֧��</iframe>
</body>
</html>