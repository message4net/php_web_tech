<?php
class control extends DBSQL{
	public $_pageSiz;//����ÿҳ��ʾ�ļ�¼��
	public function control(){//���ظ��๹�캯��,�������ݿ�����
	parent::__construct();
	$this->_pageSize=8;
	}
/**
	*����:��ȡָ�����ݱ���������ļ�¼
	*����:���ݱ�Ͳ�ѯ����
	*����:����
	*/
	public function GetDTdataset($DTname,$search){
		$sql="select * from $DBname where *.$search";
		$data_s=$this->select($sql);
		return $data_s;
		}
/**
	*����:��ȡͼ����Ϣ
	*����:���ݱ��ѯ����
	*����:����
	*/
	public function Getbookdata($DTname,$search){
		$data_s=$this->GetDTdataset($DTname,$search);
		if($DTname!="bookinfo"){
			$books=array();
			for($j=0;$j<count($data_s);$j++){
				$sql="select * from bookinfo where book_ID=".$data_s[$j][book_ID];
				$book=$this->select($sql);
					if(is_array($book)) $books=array_merge($books,$book);
					}
					return $books;
				}
					else return $data_s;
				}
/**
	*����:��ҳ��ȡͼ��/�����б�
	*����:��ǰҳ��
	*����:����
	*/
	public function GetControlList($dataset,$page=1){
		$control_o=$dataset;
		if($page<1) $page=1;
		$control_num=count($control_o);
		$pagelast=ceil($control_num/$this->_pageSize);
		if($pagelast<1) $pagelast=1;
		if($page>$pagelast) $page=$pagelast;
		$pagenum=$control_num-(floor($control_num/$this->_pageSize)*$this->_pageSize);
		if($page<$pagelast||$pagenum==0) $pagenum=$this->_pageSize;
		$start=($page-1)*$this->_pageSize;
		if($start<$control_num) $b=array_slice($control_o,$start,$pagenum);
		return $b;
		}
/**
	*����:��ȡ��Ч�ַ���
	*����:�ַ���
	*/
	public function Getstr($str="",$num=20){
		$i=strlen($str);
		if($i<=$num) return $str;
		else return substr($str,0,$num-3)."...";
		}
	}
?>