<?php
	session_start();//��ȡsession��useridֵ
	$userid=$_SESSION['userid'];
	$sendadd=$_POST['sendapp'];$cardno=$_POST['cardno'];//��ȡ�ύ�ı�����
	$password=$_POST['password'];$password2=$_POST['password2'];
	if($sendadd=='ȷ��'){//������ȷ������ť�Ĵ���
		if(cardno==""){//�Ա�����ĺϷ��Լ��
			$msg="���빺�鿨�Ų���Ϊ��";
			echo "<meta http-equiv='Refresh' content='0;url=applycard?msg=$msg'>";
			}
		else if($password==""||$password2==""){
			$msg="���빺�鿨���벻��Ϊ��";
			echo "<meta http-equiv='Refresh' content='0;url=applycard?msg=$msg'>";
			}
		else if($password!=$password2){
			$msg="�������벻һ��";
			echo "<meta http-equiv='Refresh' content='0;url=applycard?msg=$msg'>";
			}//��������Ϸ��Եļ��
		require("opendata.php.inc");//�������ݿ⣬��ѯ���ݱ�card
		$query="select * from card where cardno='$cardno'";
		$result=@mysql_query($query,$connection) or die("���ʧ�ܣ�a");
		if($row=mysql_fetch_array($result)){//���ݱ�card�д����û�����Ŀ���
			if($row[cardstatus]=="N"){//����״̬������
				$msg="�ÿ�����ʹ��!";
				echo "<meta http-equiv='Refresh' content='0;url=applycard.php?msg=$msg'>";
			}
			elseif($row[cardpsd]==$password){//����״̬���ò�������������ȷ
				$errmsg="����ɹ�!";
				$query="insert into usercard (userid,cardno) values('$userid','$cardno')";
				$result=@mysql_query($query,$connection) or die("���ʧ��!b".mysql_error());
				$query="update card set cardstatus='N' where cardno='$cardno'";
				$result=@mysql_query($query,$connection) or die("���ʧ��!c");
				echo "<meta http-equiv='Refresh' content='0;url=usercard.php?errmsg=$errmsg'>";
			}
			else{//����״̬�������û���������벻��ȷ
				$msg="�����������������!";
				echo "<meta http-equiv='Refresh' content='0;url=applycard.php?msg=$msg'>";
			}
		}
		else{//���ݱ�card��û���û�����Ŀ���
			$msg="�����ڸÿ��ţ�����������!";
				echo "<meta http-equiv='Refresh' content='0;url=applycard.php?msg=$msg'>";
			}
		}
		elseif($sendapp=='����') header("Location:memindex.php");
		$title="���鿨����";
		include_once("memhead.php")
?>
	<div id="bt">���鿨����<hr/></div>
	<div id="bd">
	<div id="err"><?php echo $_SESSION['userid']; ?>->�������빺�鿨</div>
	<form action="applycard.php" method="post">
	<table width="100%" border="0" cellspacing="0" class="td1">
		<tr><td width="30%" align="right">���빺�鿨��</td><td><input type="text" name="cardno"
		size="30"/>(λ��4-30,��������ĸ���������</td></tr>
		<tr><td align="right">���빺�鿨����</td><td><input type="password" name="password"
		size="20"/>(λ��6-20,��������ĸ�������)</td></tr>
		<tr><td align="right">ȷ�Ϲ��鿨����</td><td><input type="password" name="password2"
		size="20"/></td></tr>
		<tr><td align="center" colspan=2><input type="submit" name="sendapp" value="ȷ��">
		<input type="submit" name="sendapp" value="����"></td></tr>
		</table>
	</form>
	<div id="err: align="center"><?php echo $msg; ?></div><!--������Ϣ��-->
	</div>
	<hr/>
		<iframe scrolling="no" width="780" height="60" src="membottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">��֧��</iframe>
</div>
</body>
</html>