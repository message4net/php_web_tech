<?php
	session_start();
	$pd=$_POST["send"];
	if($pd=='���') header("Location:addcard.php");
	else{//��������������ť�Ĵ���
		$pageno=$_GET["pageno"];
		$dd=$_POST["d"];
		$num=count($dd);
		if(num==0){
			$errmsg="����ѡ��һ�����鿨<br/>";
			header("Loaction:manager.php?pageno=$pageno&errmsg=$errmsg");
		}
		else{
			if(!isset($_SESSION['del'])) $_SESSION['del']=array();
			$_SESSION['del']=$dd;
			if($pd=='��ֵ') header("Location:updatecard.php?pageno=$pageno");
			else if($pd=='ɾ��') header("Location:delcard.php?pageno=$pageno");
		}
	}
?>