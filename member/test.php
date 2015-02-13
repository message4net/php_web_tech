<?php
require("opendata.php.inc");
$sql="select * from card";
$records=mysql_query($sql);
while(list($cserial,$cno, ,$cbalance,$clevel,$cstatus,$cctime)=mysql_fetch_row($records))
var_dump($cctime);
?>