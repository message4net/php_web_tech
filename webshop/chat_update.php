<?php
	session_start();
	$userid=$_SESSION['userid'];//启动会话
	require_once('config.inc.php')
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');//请求包含相应类的文件
	$bookbmm=$_POST['bookbm']; $booknumm=$_POST['booknum'];//获取提交表单的数据
	$page=$_GET['page'];//获取URL传递的数据
	$userIP=$_SERVER[REMOTE_ADDR];//获取用户的IP地址以识别用户
	$chat=new (control);//创建购书车对象
	if(is_array($booknumm)){//处理用户更改了购买数量
		foreach($booknumm as $key=>$value){
			$DTname="bookchat";$serach="(chat_seesion_ID='".$userIP."' and 
			book_ID=".$key.")";
			$chatss=$chat->GetDTdataset($DTname,$serach);//获取购书车信息
			if((int)value<=0)
				$msg1.="所选图书".$key."的购买数量应该为正整数!<br/>";
			else if((int)$value<>$chatss[0][buy_num]{
				$sql="update bookchat set buy_num=".$value." where ".$serach_c;
				$pp=$chat->update($sql);
				$msg1.="所选图书".$key."修改成功!<br/>";
			}
		}
	}
	if(is_array($bookbmm)){//处理用户选中取消复选框
		foreach($bookbmm as $key=>$value){
			if($value=="del"){
				$sql="delete from bookchat where (char_seesion_ID='".$userIP."' and 
				book_ID=".$key.")";
				$pp=$chat->delete($sql);
				$sql="alter table bookchat drop chat_ID";
				$pp($chat->delete($sql);
				$msg1.="所选图书".$key."已取消购买!<br/>";
			}
		}
	}
	if($msg1=="") $msg1="没有选择修改的方式!<br/>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>修改购书信息</title>
		<base target="mainFrame" />
		<link href="css/bscss.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="appb">
			<div id="bt">修改购书信息<hr/></div>
			<table width="600" border="0" cellspacing="0" class="tdl">
				<tr id="bb" align="center"><td colspan="3"><?php echo $msg1;>?</td></tr>
				<tr><td align="left"><form method="post" action="chat_check.php?<?php 
				echo $page;?>"><input type="submit" value="返回&lt;&lt;"></form></td></tr>
			</table>
			</div>
		</body>
	</html>