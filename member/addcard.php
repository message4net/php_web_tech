<?php
 $sendadd=$_POST['sendadd'];$cardno=$_POST['cardno'];
 $password=$_POST['password'];$balance=$_POST['balance'];
 if($sendadd=='ȷ�����'){//������ȷ������ť�Ĵ���
 	if($cardno=="") $msg="���빺�鿨�Ų���Ϊ��";
 	else if($password=="") $msg="���빺�鿨���벻��Ϊ��";
 	else if($balance=="") $msg="���빺�鿨����Ϊ��";
 	else(
 		switch($balance){
 			case 2000: $cardlevel="��ʯ��";break;
 			case 1500: $cardlevel="��";break;
 			case 1000: $cardlevel="����";break;
 			case 500: $cardlevel="��ͨ��";break;
 		}
 	require_once("opendata.php.inc");
 	$sql="select * from card where cardno=$cardno";
 	$records=myql_query($sql);
 	if(myqsl_num_rows($records)>0) $msg="���鿨�Ѿ�����";
 	else(
 		$sql="insert into card (cardno,cardpsd,balance,cardlevel,cardstatus,
 		ctime) values('$cardno','$password','$balance','$cardlevel','Y',CURRENT_TIMESTAMP)";
 		$records=mysql_query($sql);
 		$msg="��ӳɹ�";
 	}
 }
 echo "<meta http-equiv='Refresh' content='0;url=addcard.php?msg=$msg'>";
 }
 else if($sendadd=='����') header("Location:manager.php");//���������ء���ť�Ĵ���
 $title="���鿨����&mdash;&mdash;���";
 include("memhead.php");
?>
	<div id="bt">���鿨����&mdash;&mdash;���<hr/></div>
	<div id="bd">
		<form action="addcard.php" method="post">
			<table width="100%" border="0" cellspacing="0" calss="td1">
				<tr><td width="30%" align="right">���빺�鿨��</td>
					<td><input type="text" name="cardno" size="30"/></td></tr>
				<tr><td align="right">���빺�鿨����</td>
					<td><input type="text" name="password" size="20"/></td></tr>
				<tr><td align="right">ѡ���鿨���</td>
					<td><select name="balance" size="1">
						<option value="500">��ͨ��</option>
						<option value="1000">����</option>
						<option value="1500">��</option>
						<option value="2000">��ʯ��</option>
					</select></td></tr>
				<tr><td align="center" colspan=2>
					<input type="submit" name="sendadd" value="ȷ�����"/>
					<input type="submit" name="sendadd" value="����"/>
				</table>
			</form>
			<div id="err" align="center"><? echo $msg;?></div>
			</div>
			<hr/>
		<iframe scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">��֧��</iframe>
</div>
</body>
</html>