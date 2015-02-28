<?php
	session_start();
	$userid=$_SESSION['user'];//启动会话
	require_once('config.inc.php');
	require_once(Include_Path.'db.inc.php');
	require_once(Include_Path.'control.inc.php');//请求包含相应类的文件
	$bookbmm=$_POST['bookbm']; $booknumm=$_POST['buynum'];//获取提交表单的数据
	$title=$_GET['title']; $serash=$_GET['serach'];
	$pp=$_GET['pp'];$page=$_GET['page'];//获取url传递的数据
	$url="book_show.php?title=$title&&pp=$pp&&serach=$serach=$serach&&page=$page";
	$userIP=$_SERVER[REMOTE_ADDR];//获取用户的ip地址,以识别用户
	$chat=new control();//创建购物车对象
	if(is_array($bookbmm)){//判断用户是否选中了要购买的图书
			foreach($bookbmm as $key=>$value){//寻找并处理被选中的图书
				$serach="(chat_seesion_ID='".$userIP."'AND book_ID=".$key.")";
				if($value=="sel"){
					if($booknumm[$key]<1) $msg1.="所选图书".$key."的购买数量应该为正
					整数!<br/>";
					else{
							$DTname="bookchat";
							$chat_s=$chat->GetDTdataset($DTname,$serach);//查询用户是否选购过此书
							if(count($chat_s)==0){//没有选购的处理
									$sql="insert into bookchat(user_ID,book_ID,buy_num,chat_seesion_ID 
									values('$userid','$key','$booknumm[$key]','$userIP')";
									$pp=$chat->insert($sql);//插入到购物车表中
								}
								else{//选购过的处理
									$booknu=$chat_s[0][buy_num]+$booknumm[$key];
									$sql="update bookchat set buy_num=".$booknu."where ".$serach;
									$pp=$chat->update($sql);//以累加值更新购书数量
								}
								if($pp) $msg1.="所选图书".$key."添加成功!<br/>";//成功操作后的反馈信息
							}
						}
					}
				}
				else
					$msg1.="没有选购任何图书<br/>";//没有选中图书的反馈信息
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>购书反馈信息</title>
		<base target="mainFrame" />
		<link href="css/bscss.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="appb">
			<div id="bt">购书反馈信息<hr/></div>
			<table width="600" border="0" cellspacing="0" calss="tdl">
			<tr id="bb" align="center"><td colspan="3"><?php echo $msg1;?></td></tr>
				<tr><td align="right"><form method="post" action="<?php echo $url;?>">
				<input type="submit" value="继续选书&gt;$gt;"></form></td>
			<td width="12">&nbsp;</td><td align="left">
				<form method="post" action="chat_check.php?page=1"><input type="submit" 
				value="查看购物车&lt;&lt;"></form></td></tr>
			</table>
			</div>
		</body>
	</html>