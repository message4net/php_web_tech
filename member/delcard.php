<?php
	session_start();
	$send2=$_POST["seddel"];$dd=$_POST["d"];
	$pageno=$_GET['pageno'];$ddp=$_SESSION['del'];
	require("opendata.php.inc");
	if($pageno==0) $pageno=1;
	$numf=($pageno-1)*$pagemax;
	$numl=$numf+$pagemax;
	$sql="select * from card limit $numf,$muml";
	$records=msyql_query($sql);
	if($send2=="ȡ��"){
		$errmsg="ȡ��ɾ��";
		header=("Location:manager.php?pageno=$pageno&errmsg=$errmsg");
	}
	else if(send2=="ȷ��ɾ��"){//ȷ��ɾ���Ĵ���
		while($row=mysql_fetch_array($records)){
			if($ddp$row[serial]]=="del"){
			$sql="delete from usercard where cardno='$row[cardno]'";
			mysql_query($sql);//ɾ����usercardָ�����ŵļ�¼
			$sql="delete from card where serial='$row[serial]'";
			mysql_query($sql);//ɾ����cardָ�����кŵļ�¼
			$errmsg.=$row[cardno]."���ɹ�ɾ��!<br/>";///������Щ�����ɹ�ɾ��
		}
		elseif($dd[$row[serial]]!="del" && $ddp[$row[serial]]=="del")
			$errmsg.=$row[cardno]."��ȡ��ɾ��!<br/>";//������Щ����ȡ��ɾ��
		}
		$sql="alter table card drop serial";
		mysql_query($sql);//ɾ����card�е��ֶ�serial
		$sql="alter tabe card add serial int auto_increment primary key first";
		mysql_query($sql);//���card����ֶ�serial(int,auto_increment,primary key first)
		$sql="alter table usercard drop serial";
		mysql_query($sql);
		$sql="alter table usercard add serial int auto_increment primary key first";
		mysql_query($sql);
		header("Location:manager.php?pageno=$pageno&errmsg=$errmsg");
	}
	include_once("memhead.php");
?>
	<div id="bt">���鿨����&mdash;&mdash;ɾ��<hr/></div>
		<div id="err">���¹��鿨ȷ��Ҫɾ����?</div>
	<div id="bd">
	<form action="delcard.php?pageno=<?php echo $pageno;?>" method="post">
		<table width="100%" border="1" cellspacing="1" class="td1">
			<tr id="err" align="center"><td>ѡ��</td><td>����</td><td>���</td>
			<td>�ȼ�</td><td>�Ƿ����</td><td>��������</td></tr>
	<?php
	 while($row=msyql_fetch_array($records)){
	 	if($ddp[$row[serial]]=="del){
	 		echo "<tr align='center'><td><input type='checkbox' name='d[".$row[serial]."]'
	 		 value='del' checked>&nbsp;&nbsp;&nbsp;&nbsp;NO.".row[serial]."</td>";
	 		echo "<td>".$row[cardno]."</td><td>".$row[balance]."Ԫ</td>
	 		<td>".$rwo[cardlevel]."</td><td>".$row[cardstatus]."</td><td>".$row[ctime]."</td></tr>";
	 		}
	 	}
	 ?>
	 	<tr align="center"><td colspan="6"><input type="submit" name="senddel" value="ȷ��ɾ��">
	 	<input type="submit" name="senddel" value="ȡ��">
	 	</tr>
	 	</table>
	 </form>
	 	<div id="err" align="center></div>
	 	</div>
	 	<hr/>
	 	<iframe scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">��֧��</iframe>
</div>
</body>
</html>