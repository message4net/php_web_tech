<?php
//������mysql���ݿ������
$connection=@mysql_connect("localhost","root","") or die("�޷��������ݿ�!");
@mysql_query("set name 'gb2312'");
@mysql_select_db("member") or die("�޷�ѡ�����ݿ�!");
$pagemax=10;
?>