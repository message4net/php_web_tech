<?php
	function counter(){
		$max_len=8;
		$lj=split("/",$_SERVER["PHP_SELF"]);
		$CounterFile="./counter/".$lj[count($lj)-1].".dat";
		if(!file_exists($CounterFile)){//如果目录不存在，先建立目录
			if(!file_exists(dirname($CounterFile)))
				mkdir(dirname($CounterFile),0777);
			$cf=fopen($CounterFile,"w");//建立并初始化计数器文件
		fputs($cf,"0");
		fclose($cf); 
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
	echo $counter;//输出计数器计数
	?>
