<?php
	session_start();
	$userid=$_SESSION['userid'];//启动会话
	$userIP=$_SERVER[REMOTE_ADDR];//获取用户的IP地址，以识别用户
	$button=$_POST['sub'];
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');
	$bcob=new control();
	$DTname="bookchat"; $serach="chat_seesion_ID='".$userIP."'";
	$chat_s=$bocb->GetDTdataset($DTname,$serach);//获取购物车信息
	if(count($chat_s)==0{//确认购物车上无图书的反馈信息和操作设置
		$msg="购物车上没有图书，不能下订单";
		$submit="返回主页";
		$url="../main.php";
	}
	else{//确认购物车上有图书
		if($userid==""){//设置用户没有登录的反馈和操作
			$msg="还没有登录<br/>请您先登录，在下订单";
			$submit="去登陆";
			$url="'../register/regindex.php' target='_blank'";
		}
		else{//设置用户登录的反馈和操作
			$msg="确认要下订单?<br/>确定要购买书车上的图书";
			$submit="确定";
			$url="'book_order.php' target='_blank'";
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>清空购物车反馈信息</title>
		<base target="mainFrame" />
		<link href="css/bscss.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="appb">
			<div id="bt">清空购物车反馈信息<hr/></div>
			<table width="600" border="0" cellspacing="0" class="tdl">
				<tr id="bb" align="center"><td colspan="2"><?php echo $msg;?></td></tr>
				<tr align="center"><td><form method="post" action="<?php echo $url; ?>"
				><input type="submit" name="sub" value="<?php echo $submit; ?>">
				onmousedown="window.close();"></form></td></tr>
			</table>
		</div>
	</body>
</html>