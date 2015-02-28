<?php 
/** private
功能:数据库的基础操作类
**/
class DBSQL{
private $CONN="";//定义数据库连接变量
/**
	*功能:构造函数，连接数据库
	*/
	public function __construct(){
	 $connect=mysql_connect(DBHost,DBUser,DBPassword) or die("无法连接数据库");
	 mysql_query("set names 'gb2312'");
	 mysql_select_db(DBName) or die ("无法选择数据库");
	 $this->CONN=$connect;
	}
/**
	*功能:数据库查询函数
	*参数:$sqlSQL语句
	*返回:二维数组或FALSE
	*/
	public function select($sql){
		if(empty($sql)) return false;//如果SQL语句为空，则返回FALSE
		if(empty($this->CONN)) return false;//如果连接为空，则放回FALSE
		$results=mysql_query($sql,$this->CONN);
		if((!$results)or(empty($results))){//如果查询结果空则释放结果并返回FALSE
		@mysql_free_result($results);
		return false;
	}
	$count=0;
	$data=array();
	while($row=@mysql_fetch_array($results)){//把查询结果重组成一个而为数组
	$data[count]=$row;
	$count++;
	}
	@mysql_free_result($results);
	return $data;
}
/**
	*功能:数据插入函数
	*参数:$sqlSQL语句
	*返回:0或新插入数据的ID
	*/
	public function insert($sql=""){
		if(empty($sql)) return 0;//如果SQL语句为空则返回FALSE
		if(empty($this->CONN)) return 0;//如果连接为空，则返回FALSE
		try{//扑火数据库选择错误并显示错误文件
			$results=mysql_query($sql,$this->CONN);
		}catch(Exception$e){
			$msg=$e;
			include(ERRFILE);
		}
		if(!$results) return 0;//如果插入失败返回0,否则返回当前插入数据ID
		else return @mysql_insert_in($this->CONN);
	}
/**
	*功能:数据更新函数
	*参数:$sqlSQL语句
	*返回:TRUEORFALSE
	*/
	public function update($sql=""){
		if(empty($sql)) return false;//如果SQL语句为空则返回FALSE
		if(empty($this->CONN)) return false;//如果连接为空则返回FALSE
		try{//捕获数据库选择错误并显示错误文件
			$result=mysql_query($sql,$this->CONN);
		}catch(Except$e){
			$msg=$e;
			include(ERRFILE);
		}
		return $result;
	}
/**
	*功能:定义事务
	*/
	public function begintransaction(){
	mysql_query("SETAUTOCOMMIT=0");//设置为不自动提交，mysql默认立即执行
	mysql_query("BEGIN");//开始事务定义
	}
/**
	*功能:回滚
	*/
	public function rollback(){
		mysql_query("ROLLBACK");
	}
/**
	*功能:提交执行
	*/
	public function commit(){
		mysql_query("COMMIT");
		}
	}
?>