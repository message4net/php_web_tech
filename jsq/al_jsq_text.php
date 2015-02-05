<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>网站计数器-文本格式输出</title>
		<link href="jsq.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
	<?php
	//数字输出的网页计数器
	$max_len=8;
	$CounterFile="counter.dat";
	if(!file_exists($CounterFile)){//如果计数器文件不存在的处理
		$counter=0;
		$cf=fopen($CounterFile,"w"); //打开一个文件，在此先建立该文件
		fputs($cf,"0");//初始化计数器文件
		fclose($cf); //关闭文件
	}
	else{//取回当前计数器的计数
		$cf=fopen($CounterFile,"r");
		$counter=trim(fgets($cf,$max_len));
		fclose($cf);
	}
	$counter++; //把计数器自增1
	$cf=fopen($CounterFile,"w"); //写入新的计数
	fputs($cf,$counter);
	fclose($cf);
	?>
	<div id="dd" align="center">
	欢迎您！<br/>
	本网站的第<?php echo $counter;//输出计数器计数?>位访客！
	</div>
	</body>
</html>
