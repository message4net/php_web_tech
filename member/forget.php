<?php
 session_start();
 $userid=$_SESSION['userid'];
 $errmsg="";$ok=0;//��ʼ���Զ��������$ok��¼�Ƿ�ɹ��Ĳ�ѯ��������
 if(isset($_GET['ok'])}//���$okֵ��GET��ʽ���ݣ��ͻ�ȡ����Ϊ��ǰisnew��ֵ
 $ok=$_GET['ok'];
 if(isset($_GET['errsmg'])) $errmsg=$_GET['errmsg']'
 $title="�����ѯ";
 include("memhead.php");
?>
	<div id="bd">
	<div id="bt">�����ѯ--����סַ������ʼ��ʺ�<hr/></div>
<?php if($ok==0){?>//��ѯ�ɹ������ر�
	<form action="search.php" method="post">
		<table width="100%" border="0" cellspacing="0" class="td1">
			<tr><td width="30%" align="right">���� E-mail</td><td><input type="text" 
			 name="email" size="30" value="<?php echo $email;?>"</td></tr>
			<tr><td align="right" class="td1">����סַ</td><td><input type="text"
				size="60" name="addr" value="<?php echo $addr;?>"/></td></tr>
			<tr><td align="center" colspac=2 class="td1"><input type="submit"
				name="send" value="��ѯ"></td></tr>
		</table>
	</form>
<?php } ?>//��ѯ�ɹ������ر�
	<div id="err" align="center"><? echo $errmsg;?></div>
	</div>
	<hr/>
		<iframe scrolling="no" width="780" height="60" src="regbottom.html"
marginwidth="0" marginheifht="0" border="0" frameborder="0" align="center">��֧��</iframe>
</div>
</body>
</html>