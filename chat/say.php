<?php
	$opt1="";$opt2="";$slt_text_color="";//��ʼ���Զ������
	require_once("sys_conf.inc");//ѡ�����ݿ�
	$link_id=mysql_connect($DBHOST,$DBUSER,$DBPWD) or die("�޷��������ݿ�");
	@mysql_query("set names 'gb2312'");
	@mysql_select_db($DBNAME) or die("�޷�ѡ�����ݿ�");
	$author=$_SESSION["user_name"];
	if(isset($_POST["slt_text_color"])){//ѡ��������ɫ
		switch($_POST["slt_text_color"]){
			case "��ɫ": $color="red";break;
			case "��ɫ": $color="blue";break;
			case "��ɫ": $color="gray";break;
			default: $color="black";
		}
	}
	if($behavior=="����"){//����
		if($_POST["text"]!=""||$_POST["emotion"]!=""){
		$sql="insert into chatroom (author,chattime,emotion,action,color,text)";
		$sql.=" values('$author',CURRENT_TIMESTAMP,'$emotion','','$color','$text')";
		$result=mysql_query($sql,$link_id) or die("�������ݿ�ʧ��1".mysql_error());
		echo "<meta http-equiv='Refresh' content='0;url=main.php'>";
	}
		$behavior="";
	}
	if($behavior=="����"){//����
		if($_POST["action"]!=""){
			$sql="insert into chatroom (author,chattime,emotion,action,color,text)";
			$sql.=" values('$author',CURRENT_TIMESTAMP,'','$action','','')";
			$result=mysql_query($sql,$link_id) or die("�������ݿ�ʧ��".mysql_error());
		echo "<meta http-equiv='Refresh' content='0;url=main.php'>";
		}
		$behavior="";
	}
	if($behavior=="����"){//����
		$sql="update chat.user set is_online='0' where user.name='$kick'";
		$result=mysql_query($sql,$link_id) or die("��ѯ���ݿ�ʧ��".mysql_error());
		echo "<meta http-equiv='Refresh' content='0;url=main.php'>";
		$behavior="";
	}
?>
		<hr/>
		<form action="main.php" method="POST" target="_self">
			<table width="100%" border="1" align="center" cellspacing="0" id="err">
			<tr>
			<td rowspan="2" align="center">�����Ŀ�<br/><?php echo $_SESSION["user_name"];?></td>
			<td>����<select name="emotion" size="1"><!--����-->
<?php if($emotion) $opt1=$emotion;?>
	<option selected><?php echo $opt1; ?></option>
	<option>���ߵ�</option>
	<option>���˵�</option>
	<option>�ѹ���</option>
	<option>ɵ������</option>
	<option>�����</option>
	<option>Ц���е�</option>
	<option>�������µ�</option>
	<option>��ŭ��</option>
	<option>�����ĳ���</option>
	<option>�Ի��</option></select>
	�ı���ɫ<select size="1" name="slt_text_color"><!--������ɫ-->
<?php if(isset($slt_text_color)){?>
	<option selected><?php echo $slt_text_color;}?></option>
	<option>��ɫ</option><option>��ɫ</option><option>��ɫ</option></select>
	<input name="text" type="text" size="40"/></td>
	<td><input type="submit" name="behavior" value="����"/></td></tr>
	<tr><td>����<select size="1" name="action"><!--����-->
<?php if($action) $opt2=$action;?>
	<option selected><?php echo $opt2 ?></option>
	<option>˫�ֱ�ȭ,������������λ��������!</option>
	<option>��ʼ���濼��</option>
	<option>ͦ�����ţ�����������������˵</option>
	<option>ҡ��ҡͷ��̾������������</option>
	<option>��������ҧ����˵����������ô��ô��</option>
	<option>����˵�����������һ����ٿ�����</option>
	<option>���Ŷ��ӣ���������ֱЦ�����۷��ף�����������</option>
	<option>���ֳ�������������</option>
	<option>̾�˿�����˵��������Ŭ��</option>
	<option>����̾�˿���</option></select></td>
	<td><input type="submit" name="behavior" value="����"/></td></tr>
	<tr><td align="center">�����Ŀ�</td><td>&nbsp;
<?php
	$sql="select * from user where is_online='1' order by user_id";//��ѯ�����û�
	$result=@mysql_query($sql,$link_id) or die("��ѯ���ݿ�ʧ��");//ִ�в�ѯ
	@mysql_close($link_id);//�ر����ݿ�
	while($row=mysql_fetch_row($result)){//ȡ�ò�ѯ�����¼��
			$username=$row[1];
		if($username!=$_SESSION["user_name"])
			echo "<input type='radio' name='kick' value='".$username."'/>
			[$username]&nbsp";
		}
	?>
		</td><td><input type="submit" name="behavior" value="����"/>
	</td></tr>
		</table>
	</form>
			