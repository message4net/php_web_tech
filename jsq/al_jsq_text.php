<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>��վ������-�ı���ʽ���</title>
		<link href="jsq.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
	<?php
	//�����������ҳ������
	$max_len=8;
	$CounterFile="counter.dat";
	if(!file_exists($CounterFile)){//����������ļ������ڵĴ���
		$counter=0;
		$cf=fopen($CounterFile,"w"); //��һ���ļ����ڴ��Ƚ������ļ�
		fputs($cf,"0");//��ʼ���������ļ�
		fclose($cf); //�ر��ļ�
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
	?>
	<div id="dd" align="center">
	��ӭ����<br/>
	����վ�ĵ�<?php echo $counter;//�������������?>λ�ÿͣ�
	</div>
	</body>
</html>
