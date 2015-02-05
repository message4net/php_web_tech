<?php
	require("counter.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>网站计数器-文本格式输出_函数</title>
		<link href="css/jsq.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
	<div id="dd" align="center">
	欢迎您！<br/>
	本网站的第<?php counter();//输出计数器计数?>位访客！
	</div>
	</body>
</html>
