<?php
	header("Content-Type:text/html;charset=GB2312");
	$title="图书搜索";
	$keys=(string)$_POST['keys']; $cond=$_POST['selt1'];
	if($cond=="pub_date");
		$serach="$cond>=%27$keys%27";
	else
	 $serach="$cond=%27$keys%27";
	header("Location:webshop/book_show.php?title=$title&&serach=$serach&&page=");
?>