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
		$pagelast=$this->Getpage