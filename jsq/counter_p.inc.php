<?php
	header("Content_type:image/gif");//发送一个HTTP头信息
	function counter(){//决定计数器的文件名
		$lj=split("/",$_SERVER["PHP_SELF"]);
		$CounterFile="./counter/".$lj[count($lj)-1].".dat";
		if(!file_exists($CounterFile)){//如果文件不存在的处理
			if(!file_exists(dirname($CounterFile)))//如果目录不存在，先建立目录
				mkdir(dirname($CounterFile),0777);
			$cf=fopen($CounterFile,"w");//建立计数器文件
		fputs($cf,"0");//初始化计数器文件
		fclose($cf); 
	}
	else{//取回当前计数器的计数
		$cf=fopen($CounterFile,"r");
		$counter=trim(fgets($cf,10));
		fclose($cf);
	}
	$counter++; //把计数器自增1
	$cf=fopen($CounterFile,"w"); //写入新的计数
	fputs($cf,$counter);
	fclose($cf);
	//格式化计数器的输出
	$size=strlen($counter);
	for ($i=0;$i<$size;$i++){
		$p=substr($counter,$i,1);
		echo "<img src=\"../images/jsq".$p.".gif\" height=\"30\" width=\"15\"
		vspace=\"10\" align=\"middle\"/>";
	}
} //the end of the function
?>