<?php
	session_start();
	$pageno=$_GET['pageno'];money=$_POST['money'];$dd=$_POST["d"];
	$ddp=$_SESSION['del'];$send=$_POST['send'];
	require("opendata.php.inc");
	if($pageno==0) $pageno=1;
	$numf=($pageno-1)*$pagemax;
	$numl=$numf+$pagemax;
	$sql="select * from card limit $numf,$numl";
	$records=mysql_query($sql);
	$i=0;//����ȷ�����ض����ʶ
	if($send=="ȡ��"){
		$errmsg="ȡ����ֵ";
		header("Location:manager.php?pageno=$pageno&errmsg=$errms");
	}
	elseif($send=='ȷ����ֵ'){
		while($row=mysql_fetch_array($records)){
			if($dd[$row[serial]]=="del"{//���ڳ�ֵѡ��״̬�Ĵ���
				if(money[$row[serial]]==""){//�϶�û��������ķ���
					$errmsg.=$row[cardno]."����ֵ���ݲ���Ϊ��!<br/>";
					$i=$i+1;//ֻҪ��û��������Ĵ���ֵ�����ڣ���Ҫ���򵽱�ҳ��
				}
				else{//�����ֵ���ȷ�����鿨�ȼ����Դ��޸����ֶε�ֵ
					$balance=$money[$row[serial]]+$row[balance];
					if($balance>=2000) $cardlevel=""��ʯ��;
					if($balance>=1500 && $balance<2000) $cardlevel="��";
					if($balance>=1000 && $balance<1500) $cardlevel="����";
					if($balance<1000) $cardlevel="��ͨ��";
				$sql="update card set balance='$balance',cardlevel='$cardlevel' where serial=".$row[serial];
					$records1=mysql_query($sql);
					$ddp[$row[serial]]=$row[cardno]."����ֵ�ɹ�!<br/>";//���÷�����Ϣ
				}
			}
			elseif($ddp$rwo[serial]]!="del" && $ddp[$row[serial]]=="del") //ȡ���˸�ѡ��ķ���
			$ddp[$row[serial]]=$row[cardno]."����ֵȡ��!<br/>";
		}
			$_SESSION['del']=$ddp;//�޸�ѡ�����������
			foreach($_SESSION['del'] as $key=>$value)//��ȡ������Ϣ
				if($value!="del") $errmsg.=$value;
			if($i==0) header("Location:manager.php?pageno=$pageno&errmsg=$errmsg");
			else header("Location:updatecard.php?pageno=$pageno&errmsg=$errmsg");
		}
			$tile="���鿨����&mdash;&mdash;��ֵ";
			include("member.php");
	?>
		<div id="bt">	���鿨����&mdash;&mdash;��ֵ<hr/></div>
		<div id="err">һ�°����鿨ȷ��Ҫ��ֵ��?</div>
		<div id="bd">
		<form action="updatecard.php?pageno=<?php echo $pageno; ?>" method="post">
		<table width="100%" border="1" cellspacing="1" class="td1">
			<tr id="err" align="center"
				<td>ѡ��</td><td>����</td><td>���</td><td>�ȼ�</td><td>��ֵ���</td></tr>
	<?php
		while($row=mysql_fetch_array($records)){
			if($ddp[$row[serial]]=="del"){//��ȡ����ʾ��ѡ�еļ�¼
			echo "<tr align='center'><td><input type='checkbox' name='d[".row[serial]."]' 
			value='del' checked>&nbsp;&nbsp;&nbsp;&nbsp;NO.".$row[serial]."</td>";
			echo "<td>".$row[cardno]."</td><td>".$row[balance]."Ԫ</td><td>".$row[cardlevle]."
			</td><td><input type='text' name='money[".row[serial]."] size='30'/></td></tr>";
		}
	}
?>
		<tr><td align="center" colspan="5"><input type="submit" name="send" value="ȷ����ֵ">
			<input type="submit" name="send" value="ȡ��"></td></tr>
		</table>
	</form>
		<div id="err" align="center"><?php echo $errmsg;?></div>
		</div>
	 	<hr/>
	 	<iframe scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">��֧��</iframe>
</div>
</body>
</html>