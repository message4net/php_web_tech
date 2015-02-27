<?php
	session_start();
	$userid=$_SESSION['userid'];//启动会话
	$userIP=$_SERVER[REMOTE_ADDR];//获取用户的IP地址，以识别用户
	$button=$_POST['sub'];
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');
	$chats=new control();
	$DTname="bookchat";$serach="chat_seesion_ID='".$userIP."'";
	$chat_s=$chats->GetDTdataset($DTname,$serach);//获取购书车信息
	if(count($chat_s)==0){//确认购书车上是否有图书
		$msg="购物车为空!<br/>购物车中没有选购图书的信息";
		$submit="返回";
		$url="../index.php";
	}
	else{//确认购物车上的图书是否已经生成订单
		$count=0;
		for($i=0;$i<count($chat_s);$i++){
			if($chat_s[$i][order_ID]==0) $count++; //0表示为生成订单
		}
		if($count==0){//购物车上的图书已经生成订单
			$msg="购物车需要清空!<br/>购物车中选购的".count($chat_s)."图书已经生成订单";
			$submit="确定";
			$user="chat_clear.php";
		}
		else{//购物车上的图书为生成订单
			$msg="购物车需要清空?<br/>购物车中选购的".$count."本图书尚未生成订单";
			$submit="确定";
			$url="chat_clear.php";
		}
	}
	if($button=="确定"){//用户确认要清除购物车
		$sql="delete from bookchat where chat_seesion_ID='$userIP'";
		$chats->delete($sql);
		$sql="alter table bookchat drop chat_ID;";
		$chats->delete($sql);
		$sql="alter table bookchat add chat_id int(11) NOT NULL AUTO_INCrement 
		primary key first;";
		$chats->delete($sql);
		$msg="购物车已清空!<br/>购物车中没有选购的图书信息";
		$submit="返回";
		$url="../index.php";
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
				</form></td>
<?php if($count<>0 { ?>
	<td align="right"><from method="post" action="chat_check.php?<?php echo $page; ?>"
	><input type="submit" value="查看购物车&gt;&gt;"></from></td>
<?php } ?>
	</tr>
	</table>
	</div>
	</body>
</html>