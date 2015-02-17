<?php
class display{
	public $_pageSize=10;//每页显示数量
	private $_data;//要分页的数据
	private $_pageNum=1;//总页数
/** 
	*功能:构造函数
	*参数:$data要分页的数据,$pageSize每页显示数量
	*/
	public function __construct($data,$pagesize=8){
		if($pagesize>0) $this->_pageSize=$pagesize;
		$this->_data=$data;
		$this->_pageNum=$this->GetpageNum($data);
		}
/**
	*功能:取得总页数
	*/
	public function GetpageNum($data){
		$data_num=count($data);
		$pagelast=ceil($data_num/$this->_pageSize);
		return $pagelast;
		}
/**
	*功能:生成分页导航栏
	*/
	public function GetJumpBar($data,$page=1,$url){
		$count=count($data);
		$pagelast=$this->GetpageNum($data);
		$strJumpBar="";
		if($pagelast<1) $pagelast=1;
		if($page>$pagelast) $page=$pagelast;
		if($count==0){
				$msg1="暂无信息";
				$pagelast=0;
			}
		else{
				$msg1="当前页:".$page;
				if($page<>1) $strJumpBar.="<a href='".$url."1'>第一页</a>";
				else $strJumpBar.="第一页";
				$strJumpBar.="|";
				if($page>1) $strJumpBar.="<a href='".$url.($page-1)."'>上一页</a>|";
				if($page<>$pagelast) $strJumpBar.="<a href='".$url.($page+1).".>
				下一页</a>|";
				if($page!=$pagelast) $strJumpBar.="<a href='".$url.($pagelast)."'>
				最后页</a>";
				else $strJumpBar.="最后页";
			}
			return array('JumpBar'=>$strJumpBar,'msg'=>$msg1);
		}
	}
?>