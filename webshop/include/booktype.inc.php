<?php
class booktype extends DBSQL{
	public function __construct(){//���ظ��๹�캯��,�������ݿ�����
		parent::__construct();
	}
/**
	*����:��ȡͼ�����б�
	*����:����
	*/
	public fuction GetBkTypeList(){
	$sql="select * from booktype";
	$b=$this->select($sql);
	return $b;
}
/**
	*����:��ȡͼ������б�
	*����:ͼ�����
	*����:����
	*/
	public function GetBkClaaList($search=1){
		$sql="select * from bookclass where book_type_id='$search'";
		$b=$this->select($sql);
		return $b;
	}
/** 
	*����:�����˵��Ķ����˵������Ŀ
	*����:�ַ���
	*/
	public function numb_item($itemno){
		$bktclist=$this->GetBkClassList($itemno);
		$ccount=(count($bktclist);
		return $ccount;
	}
/**
	*����:�����˵��Ķ����˵���
	*����:�ַ���
	*/
	public function nemu_item($itemno){
		$bktclist=$this->GetBkClassList($itemno);
			$ccount=count($bktclist);//ͳ�Ƶ����˵��Ķ����˵������Ŀ
			for($k=0;$k<$ccount;$k++)
				$item.="&nbsp;&nbsp;&nbsp;&nbsp;<a href='webshop/book_show.php?title=
				".$bktclist[$k][book_class_name]."&&page=1&&search=book_class_id=
				".$bktclist[$k][book_class_id]."' traget="mainFrame'>".bktclist[$k][book_
				class_name]."</a><br/>";
				return $item;
			}
		}
	?>