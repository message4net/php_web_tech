<?php
class display{
	public $_pageSize=10;//ÿҳ��ʾ����
	private $_data;//Ҫ��ҳ������
	private $_pageNum=1;//��ҳ��
/** 
	*����:���캯��
	*����:$dataҪ��ҳ������,$pageSizeÿҳ��ʾ����
	*/
	public function __construct($data,$pagesize=8){
		if($pagesize>0) $this->_pageSize=$pagesize;
		$this->_data=$data;
		$this->_pageNum=$this->GetpageNum($data);
		}
/**
	*����:ȡ����ҳ��
	*/
	public function GetpageNum($data){
		$data_num=count($data);
		$pagelast=ceil($data_num/$this->_pageSize);
		return $pagelast;
		}
/**
	*����:���ɷ�ҳ������
	*/
	public function GetJumpBar($data,$page=1,$url){
		$count=count($data);
		$pagelast=$this->GetpageNum($data);
		$strJumpBar="";
		if($pagelast<1) $pagelast=1;
		if($page>$pagelast) $page=$pagelast;
		if($count==0){
				$msg1="������Ϣ";
				$pagelast=0;
			}
		else{
				$msg1="��ǰҳ:".$page;
				if($page<>1) $strJumpBar.="<a href='".$url."1'>��һҳ</a>";
				else $strJumpBar.="��һҳ";
				$strJumpBar.="|";
				if($page>1) $strJumpBar.="<a href='".$url.($page-1)."'>��һҳ</a>|";
				if($page<>$pagelast) $strJumpBar.="<a href='".$url.($page+1).".>
				��һҳ</a>|";
				if($page!=$pagelast) $strJumpBar.="<a href='".$url.($pagelast)."'>
				���ҳ</a>";
				else $strJumpBar.="���ҳ";
			}
			return array('JumpBar'=>$strJumpBar,'msg'=>$msg1);
		}
	}
?>