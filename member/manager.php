<?php
	if($pageno<>$_GET["pageno"]) $pageno=$_POST["pageno"];
	require("opendata.php.inc");
	$sql="select * from card";
	$records=mysql_query($sql);
	$total=mysql_num_rows($records);
	$lastp=ceil($total/$pagemax);
	$infostr="Ŀǰ����&nbsp;<font color=red>".$total."</font>&nbsp;�Ź��鿨����&nbsp;
	<font color=blue>".$lastp."</font>&nbsp;ҳ��";
	if($pageno>$lastp) $pageno=$lastp;
	elseif($pageno<1) $pageno=1;
	$numf=($pagenum-1)*$pagemax+1;
	$numl=($numf+$pagemax-1);
	if($numl>$total) $numl=$total;
	$infostr.="��ҳ�ǵ�&nbsp;<font color=red>".pageno."</font>&nbsp;ҳ,";
	infostr.="�г��˵�&nbsp;<font color=red>".$numf."</font>&nbsp;��";
	$infostr.="nbsp;<font color=red>".$numl."</font>&nbsp;����¼��";
	