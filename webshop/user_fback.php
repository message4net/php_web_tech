<?php
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');//���������Ӧ����ļ�
	$bookid=$_GET['bookid'];$userid=$_POST['user_id'];
	$booklevel=$_POST['book_level']; $bookcomm=$_POST['comm'];//��ȡ������
	$usermsg=new control();//���������û�����
	$sql="insert into usermessge(user_ID,book_ID,book_level,message_content) 
	values('$userid','$bookid','$booklevel','$bookcomm')";//�������ݵ�SQL���
	if($usermsg->insert($sql))
		echo "<meta http-equiv='Refresh' content='0;url=book_fullinfo.php?
		bookid=".$bookid."'>";
?>