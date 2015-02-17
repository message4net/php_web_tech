<?php
	class user extends DBSQL{
		private $_DB;
		public function __construct(){
		parent::__construct();//加载父类构造函数,创建数据库连接
		$_DB="member";
		mysql_select_db($_DB) or die ("无法选择数据库");
		}
	}
?>