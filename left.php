<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>����ͼ��</title>
		<link href="css/left.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
		function ck_frm1(){
				var err="";
				var oj=window.frm1.input;
				if (oj.value==""){
					err="���벻��Ϊ��!";
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
					<fiedset><legend class="bt">ͼ������</legend>
						<input name="keys" id="sele" class="text" type="text" value="������"
						size="18" maxlength="20" onClick="this.value='';"/><br/>&nbsp;
						<select id="sele" name="selt1">
							<option value="book_name">����</option>
							<option value="author">����</option>
							<option value="pub_date">����</option>
							<option value="publisher">����</option></select>
						<input type="button" name="button" value="��ѯ" onmousedown="ck_frm1();"/>
					<fieldset>
				</form>
			</div>
			<div id="f1">
				<form>
					<fieldset><legend class="bt">�����ѯ</legend>
						<iframe name="numeFrame" allowtransparency="true" scrolling="no" width="165"
						src="left_nemu.php" marginwidth="0" marginheight="0" border="0" frameborder="0">
						��֧��</iframe>
					</fieldset>
				</form>
			</div>
			<div id="f1">
				<form>
					<fieldset><legend class="bt">��������</legend>
						<select id="sele" name="selt2" onchange="javascript:window.open(selt2.value);"
						<option value=""></option>
						<option value="http://www.dangdang.com">�������</option>
						<option value="http://www.joy.com">׿Խ��</option>
						<option value="http://www.shanghaibooks.com">�Ϻ����</option>
						</select>
					</fieldset>
				</form>
			</div>
		</div>
	</body>
</html>
			