<?php
	include_once("sys_conf.inc");//ϵͳ�����ļ�,�����ݿ�������Ϣ
	$link_id=mysql_connect($DBHOST,$DBUSER,$DBPWD) or die("�޷��������ݿ�");
	mysql_query("set names 'gb2312'");
	mysql_select_db($DBNAME) or die("�޷�ѡ�����ݿ�");//ѡ�����ݿ�
	$sql="select * from chatroom order by chattime";//��ʱ�併��������������¼
	$result=mysql_query($sql,$link_id) or die("��ѯ���ݿ�ʧ��");//ִ�в�ѯ
	mysql_close($link_id);//�ر����ݿ�
	$count=mysql_num_rows($result);//��ѯ�����¼��
	if($count<15) $l=$count;//������ʾ���¼�¼������
	else $l=15;
	mysql_data_seek($result,$count-$l);//�ƶ���¼ָ�뵽������$l����¼
	for($i=1;$i<=$l;$i++){//��ʾ���¼�¼
	list($cid,$cauthor,$cctime,$cemotion,$caction,$ccolor,$ctext)=mysql_fetch_row($result);
	$str=$cctime."[".$cauthor."]";
	if($ctext!=""||$cemotion!="")$str.="<font color='green'>".$cemotion."˵��</font>:
	<font color=$ccolor>".$ctext."</font><br/>";
	else $str.="<font color='blue'>".$caction."</font><br/>";
	echo $str;
}
?>