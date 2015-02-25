<?php
//建立与mysql数据库的连接
$connection=@mysql_connect("localhost:8889","root","root") or die("无法连接数据库!");
@mysql_query("set name 'gb2312'");
@mysql_select_db("member") or die("无法选择数据库!");
$pagemax=10;
?>