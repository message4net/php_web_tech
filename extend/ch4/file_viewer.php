<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=GB2312" />
		<title>�ļ�������</title>
	</head>
	<body>
	<h3>�ļ�������</h3>
	<table border="1" width="100%">
		<tr align="center" bgcolor="yellow">
			<th>�ļ���</th><th>��С</th><th>����ʱ��</th><th>����޸�ʱ��</th>
		</tr>
	<?php
		if(!isset($_GET[currentdir])||empty($_GET[currentdir]))
			$dir=getcwd();
		else
			$dir=$_GET[currentdir];
		chdir($dir);
		echo "��ǰĿ¼:".getcwd()."<br>";
		$dh=opendir($dir);
		while($item=readdir($dh)){
			echo "<tr><td>";
			if(is_dir($item)){
				if($item==".") echo "<a href=$PHP_SELF?currentdir=$currentdir>.</a>";
				elseif($item==".."){
					$currentdir=getcwd()."\\..";
					echo"<a href=$PHP_SELF?currentdir=$currentdir>..</a>";
				}
				else{
					$currentdir=getcwd()."\\$item";
					echo "<a href=$PHP_SELF?currentdir=$currentdir>$item</a>";
				}
			}
			else{    
				$extname=substr($item,strrpos($item,"."));
				if(strtoupper($extname)==".PHP"||strtoupper($extname)==".TXT"){
					$currentdir=getcwd();
					echo "<a href=./show_file.php?currentdir=$currentdir&filename=$item&type=$extname>$item</a>";
				}
				else echo "$item</td>";
			}
			$file_size=filesize($item)."B";
			if(is_dir($item)) $file_size="Ŀ¼";
			else if(filesize($item)>1024)
			$file_size=round(filesize($item)/1024)."KB";
			echo "<td>$file_size</td>";
			$create_date=date("y-m-d h:i:sa",filemtime($item));
			echo "<td>$create_date</td>";
			$update_date=date("y-m-d h:i:sa",filemtime($item));
			echo "<td>$update_date</td>";
		}
		closedir($dh);
	?>
	</table>
</body>
</html>