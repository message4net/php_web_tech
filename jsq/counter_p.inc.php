<?php
	header("Content_type:image/gif");//����һ��HTTPͷ��Ϣ
	function counter(){//�������������ļ���
		$lj=split("/",$_SERVER["PHP_SELF"]);
		$CounterFile="./counter/".$lj[count($lj)-1].".dat";
		if(!file_exists($CounterFile)){//����ļ������ڵĴ���
			if(!file_exists(dirname($CounterFile)))//���Ŀ¼�����ڣ��Ƚ���Ŀ¼
				mkdir(dirname($CounterFile),0777);
			$cf=fopen($CounterFile,"w");//�����������ļ�
		fputs($cf,"0");//��ʼ���������ļ�
		fclose($cf); 
	}
	else{//ȡ�ص�ǰ�������ļ���
		$cf=fopen($CounterFile,"r");
		$counter=trim(fgets($cf,10));
		fclose($cf);
	}
	$counter++; //�Ѽ���������1
	$cf=fopen($CounterFile,"w"); //д���µļ���
	fputs($cf,$counter);
	fclose($cf);
	//��ʽ�������������
	$size=strlen($counter);
	for ($i=0;$i<$size;$i++){
		$p=substr($counter,$i,1);
		echo "<img src=\"../images/jsq".$p.".gif\" height=\"30\" width=\"15\"
		vspace=\"10\" align=\"middle\"/>";
	}
} //the end of the function
?>