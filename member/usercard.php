<?php
session_start();//�����Ի�
$user_id=$_SESSION['userid'];//��ȡSESSION��useridֵ
if($pageno<>$_GET["pageno"])$pageno=$_POST["pageno"];//��ȡpageno��ֵ
require_once("opendata.php.inc");
$sql="select * from usercard where userid='$userid'";
$records=mysql_query($sql);//��ѯ���ݱ�usercard��ָ����Աid����Ϣ
if(mysql_num_rows($records)==0){//���ݱ�usercard��û��ָ����Աid����Ϣ
 $errmsg="û����������鿨!";
 header("Location:applycard.php?errmsg=$errmsg");
  }
$total=mysql_num_rows($records);//ͳ�����ݱ�usercard����ָ����Աid����Ϣ��
$lastp=ceil($total/$pagemax);//�������ҳ��
$infostr="Ŀǰ����$nbsp;<font color=red>".$total."</font>$nbsp;�Ź��鿨,��
&nbsp;<font color=blue>".$lastp."</font>&nbsp;ҳ��";//������Ϣ���ϵ���Ϣ
if($pageno>$lastp)$pageno=$lastp;//��ǰҳ�볬�����ҳ��ʱ������Ϊ���ҳ��
elseif($pageno<1) $pageno=1;
$numf=($pageno-1)*$pagemax+1;//���õ�ǰҳ�ĵ�һ����¼����
$numl=$numf+$pagemax-1;//���õ�ǰҳ���һ����¼��
if($numl>$total) $numl=$total;//��ǰ����¼�����ܼ�¼ʱ������Ϊ�����ܼ�¼��
$infostr.="��ҳ��$nbsp;<font color=red>".$pageno."</font>&nbsp;ҳ,";
$infostr.="�г��˵�&nbsp;<font color=red>".$numf."</font>&nbsp;��&nbsp;<font color=red> "
.$numl."</font>$nbsp;����¼��";
if($pageno!=1)$msg.="<a href=".$_SERVER['PHP_SELF']."?pageno=1>��1ҳ</a>";
else $msg.="��1ҳ";//��ǰҳ�ǵ�һҳʱ����Ҫ��������
$msg.="|";//�ӷָ���|
if($pageno>1)//��ǰҳ���ڵ�һҳʱ����"��һҳ"Ҫ���ó�����
$msg.="<a href=".$_SERVER['PHP_SELF']."?pageno=".($pageno-1).">��һҳ</a>|";
if($pageno<$lastp)//��ǰҳС���ߺ�ҳʱ��Ҫ��������
$msg.="<a href=".$_SERVER['PHP_SELF']."?pageno=".($pageno+1).">��һҳ</a>|";
if($pageno!=$lastp)//��ǰҳ�������ҳʱ���ԡ���һҳ��Ҫ��������
$msg.="<a href=".$_SERVER['PHP_SELF']."?pageno=".($lastp).">���ҳ</a>";
else $msg.="���ҳ";//��ǰҳ�����ҳʱ����Ҫ��������
$i=1;//��ȡָ����Ա��id������Ϣ
while($row=mysql_fetch_array($records)){
$cardno[$i]=$row[cardno];
$i++;
}
$title="��Ա���鿨��ѯ";//���õ�ǰҳ����
include("memhead.php");//����ͷ��
?>
	<div id="bt">��Ա���鿨��ѯ<hr/></div>
	<div id="bd">
		<form action="<?php echo $_SERVER['PHP_SELF']?>?pageno=<?php echo $pageno; ?>" method="post">
	<table width="100%" border="0" cellspacing="0" class="td1">
		<tr id="err"><td><div><?php echo $infostr; ?></div></td><!--״̬��-->
			<td align="right">����ҳ��:<input type="text" size="3" name="pageno">
				<input type="submit" value="ת��"/></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr><!--״̬��-->
	</table>
		</form>
		<form action="applycard.php" method="post">
			<table width="100%" border="1" cellspacing="1" class="td1">
				<tr id="err" align="center"><td>���</td><td>����</td><td>���</td>
				<td>�ȼ�</td><td>����</td><td>��Ч����</td></tr>
<?php 
 for($i=$numf;$i<=$numl;$i++){//��ʾ��ǰҳ�Ĺ��鿨��Ϣ
 	mysql_query("set names gbk;");
 	$sql3="select * from card where cardno='$cardno[$i]'";
 	$records3=mysql_query($sql3);//��ѯָ�����ŵĹ��鿨��Ϣ
 	$row2=mysql_fetch_array($records3);
 	$dbdate=$row2[ctime];//��ȡ���鿨��������
 	$year=substr($dbdate,0,4);//��ȡ�ַ����е���
 	$month=substr($dbdate,5,2);//��ȡ�ַ����е���
 	$day=substr($dbdate,8,2);//��ȡ�ַ����е���
 	$time=($year+2)."��".$month."��".$day."��";//���ɹ��鿨����Ч��
 	echo "<tr align='center'><td>NO.".$i."</td>";
 	echo "<td>&nbsp;".$row2[cardno]."</td><td>&nbsp;".$row2[balance]."Ԫ</td><td>&nbsp;".
 	$row2[cardlevel]."</td>";
 	echo "<td>&nbsp;".$row2[cardpsd]."</td><td>&nbsp;".$time."</td></tr>";
 	}
 	?>
	<tr align="center">
		<td colspac="6"><input type="submit" name="send" value="���빺�鿨"></td></tr>
		</table>
		</form>
	<div id="err" align="center"><?php echo "$msg"; ?></div> <!--��ҳ������-->
	<div id="err"><?php echo "$errmsg";?></div>
	</div>
	<hr/>
		<iframe scrolling="no" width="780" height="60" src="membottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">��֧��</iframe>
</div>
</body>
</html>