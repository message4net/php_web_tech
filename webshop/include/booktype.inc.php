<?php
class booktype extends DBSQL{
	public function __construct(){//加载父类构造函数,创建数据库连接
		parent::__construct();
	}
/**
	*功能:提取图书类列表
	*返回:数组
	*/
	public fuction GetBkTypeList(){
	$sql="select * from booktype";
	$b=$this->select($sql);
	return $b;
}
/**
	*功能:提取图书分类列表
	*参数:图书类别
	*返回:数组
	*/
	public function GetBkClaaList($search=1){
		$sql="select * from bookclass where book_type_id='$search'";
		$b=$this->select($sql);
		return $b;
	}
/** 
	*功能:弹出菜单的二级菜单项的数目
	*返回:字符串
	*/
	public function numb_item($itemno){
		$bktclist=$this->GetBkClassList($itemno);
		$ccount=(count($bktclist);
		return $ccount;
	}
/**
	*功能:弹出菜单的二级菜单项
	*返回:字符串
	*/
	public function nemu_item($itemno){
		$bktclist=$this->GetBkClassList($itemno);
			$ccount=count($bktclist);//统计弹出菜单的二级菜单项的数目
			for($k=0;$k<$ccount;$k++)
				$item.="&nbsp;&nbsp;&nbsp;&nbsp;<a href='webshop/book_show.php?title=
				".$bktclist[$k][book_class_name]."&&page=1&&search=book_class_id=
				".$bktclist[$k][book_class_id]."' traget="mainFrame'>".bktclist[$k][book_
				class_name]."</a><br/>";
				return $item;
			}
		}
	?>