<?php
	if($pageno<>$_GET["pageno"]) $pageno=$_POST["pageno"];
	require("opendata.php.inc");
	$sql="select * from card";
	$records=mysql_query($sql);
	$total=mysql_num_rows($records);
	$lastp=ceil($total/$pagemax);
	$infostr="目前共有&nbsp;<font color=red>".$total."</font>&nbsp;张购书卡，共&nbsp;
	<font color=blue>".$lastp."</font>&nbsp;页。";
	if($pageno>$lastp) $pageno=$lastp;
	elseif($pageno<1) $pageno=1;
	$numf=($pagenum-1)*$pagemax+1;
	$numl=($numf+$pagemax-1);
	if($numl>$total) $numl=$total;
	$infostr.="本页是第&nbsp;<font color=red>".pageno."</font>&nbsp;页,";
	infostr.="列出了第&nbsp;<font color=red>".$numf."</font>&nbsp;到";
	$infostr.="nbsp;<font color=red>".$numl."</font>&nbsp;条记录。";
	