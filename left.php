<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>搜索图书</title>
		<link href="css/left.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
		function ck_frm1(){
				var err="";
				var oj=window.frm1.input;
				if (oj.value==""){
					err="输入不能为空!";
					window.alert(err);
					oj.focus();
					oj.value="";
				}
			}
		</script>
	</head>
	<body>
		<div id="leftbg" align="left">
			<div id="nume">
				<form name="frm1" method="post" action="search_key.php">
					<fiedset><legend class="bt">图书搜索</legend>
						<input name="keys" id="sele" class="text" type="text" value="请输入"
						size="18" maxlength="20" onClick="this.value='';"/><br/>&nbsp;
						<select id="sele" name="selt1">
							<option value="book_name">书名</option>
							<option value="author">作者</option>
							<option value="pub_date">书名</option>
							<option value="publisher">书名</option></select>
						<input type="button" name="button" value="查询" onmousedown="ck_frm1();"/>
					<fieldset>
				</form>
			</div>
			<div id="f1">
				<form>
					<fieldset><legend class="bt">分类查询</legend>
						<iframe name="numeFrame" allowtransparency="true" scrolling="no" width="165"
						src="left_nemu.php" marginwidth="0" marginheight="0" border="0" frameborder="0">
						不支持</iframe>
					</fieldset>
				</form>
			</div>
			<div id="f1">
				<form>
					<fieldset><legend class="bt">友情连接</legend>
						<select id="sele" name="selt2" onchange="javascript:window.open(selt2.value);"
						<option value=""></option>
						<option value="http://www.dangdang.com">当当书店</option>
						<option value="http://www.joy.com">卓越网</option>
						<option value="http://www.shanghaibooks.com">上海书城</option>
						</select>
					</fieldset>
				</form>
			</div>
		</div>
	</body>
</html>
			