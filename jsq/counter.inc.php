<?php
	function counter(){
		$max_len=8;
		$lj=split("/",$_SERVER["PHP_SELF"]);
		$CounterFile="./counter/".$lj[count($lj)-1].".dat";
		if(!file_exists($CounterFile)){//���Ŀ¼�����ڣ��Ƚ���Ŀ¼
			if(!file_exists(dirname($CounterFile)))
				mkdir(dirname($CounterFile),0777);
			$cf=fopen($CounterFile,"w");//��������ʼ���������ļ�
		fputs($cf,"0");
		fclose($cf); 
	}
	else{//ȡ�ص�ǰ�������ļ���
		$cf=fopen($CounterFile,"r");
		$counter=trim(fgets($cf,$max_len));
		fclose($cf);
	}
	$counter++; //�Ѽ���������1
	$cf=fopen($CounterFile,"w"); //д���µļ���
	fputs($cf,$counter);
	fclose($cf);
	echo $counter;//�������������
	?>
