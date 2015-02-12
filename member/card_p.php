<?php
	session_start();
	$pd=$_POST["send"];
	if($pd=='添加') header("Location:addcard.php");
	else{//单击其他两个按钮的处理
		$pageno=$_GET["pageno"];
		$dd=$_POST["d"];
		$num=count($dd);
		if(num==0){
			$errmsg="必须选中一个购书卡<br/>";
			header("Loaction:manager.php?pageno=$pageno&errmsg=$errmsg");
		}
		else{
			if(!isset($_SESSION['del'])) $_SESSION['del']=array();
			$_SESSION['del']=$dd;
			if($pd=='充值') header("Location:updatecard.php?pageno=$pageno");
			else if($pd=='删除') header("Location:delcard.php?pageno=$pageno");
		}
	}
?>