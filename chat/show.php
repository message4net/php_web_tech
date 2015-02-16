<?php
	include_once("sys_conf.inc");//系统配置文件,含数据库配置信息
	$link_id=mysql_connect($DBHOST,$DBUSER,$DBPWD) or die("无法连接数据库");
	mysql_query("set names 'gb2312'");
	mysql_select_db($DBNAME) or die("无法选择数据库");//选择数据库
	$sql="select * from chatroom order by chattime";//按时间降序查找所有聊天记录
	$result=mysql_query($sql,$link_id) or die("查询数据库失败");//执行查询
	mysql_close($link_id);//关闭数据库
	$count=mysql_num_rows($result);//查询结果记录数
	if($count<15) $l=$count;//设置显示最新记录的条数
	else $l=15;
	mysql_data_seek($result,$count-$l);//移动记录指针到倒数第$l条记录
	for($i=1;$i<=$l;$i++){//显示最新记录
	list($cid,$cauthor,$cctime,$cemotion,$caction,$ccolor,$ctext)=mysql_fetch_row($result);
	$str=$cctime."[".$cauthor."]";
	if($ctext!=""||$cemotion!="")$str.="<font color='green'>".$cemotion."说道</font>:
	<font color=$ccolor>".$ctext."</font><br/>";
	else $str.="<font color='blue'>".$caction."</font><br/>";
	echo $str;
}
?>