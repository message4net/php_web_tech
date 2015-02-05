<<!--文件查看器:show_file.php-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset="utf-8" />
		<title>文件查看器</title>
	</head>
	<body>
	<a href="./file_viewer.php">文件管理器</a><br/><br/>
<?php
	$currentdir=$_GET[currentdir];
	$filename=$_GET[filename];
	$type=$_GET[type];
	if(strtoupper($type)==".PHP"){
		$lines=file($currentdir."\\".$filename);
		foreach ($lines as $line_num => $line)
		echo "Line #<b>${line_num}</b>:".htmlspecialchars($line)."<br>\n";
	}
	else{
		$fp=fopen($currentdir."\\".$filename,"r");
		while($line=fgets($fp)){
			$line=htmlentities($line,ENT_COMPAT,"GB2312");
			echo $line."<br/>";
		}
		fclose($fp);
	}
?>
	</body>
</html>