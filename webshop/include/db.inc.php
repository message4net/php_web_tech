<?php 
/** private
����:���ݿ�Ļ���������
**/
class DBSQL{
private $CONN="";//�������ݿ����ӱ���
/**
	*����:���캯�����������ݿ�
	*/
	public function __construct(){
	 $connect=mysql_connect(DBHost,DBUser,DBPassword) or die("�޷��������ݿ�");
	 mysql_query("set names 'gb2312'");
	 mysql_select_db(DBName) or die ("�޷�ѡ�����ݿ�");
	 $this->CONN=$connect;
	}
/**
	*����:���ݿ��ѯ����
	*����:$sqlSQL���
	*����:��ά�����FALSE
	*/
	public function select($sql){
		if(empty($sql)) return false;//���SQL���Ϊ�գ��򷵻�FALSE
		if(empty($this->CONN)) return false;//�������Ϊ�գ���Ż�FALSE
		$results=mysql_query($sql,$this->CONN);
		if((!$results)or(empty($results))){//�����ѯ��������ͷŽ��������FALSE
		@mysql_free_result($results);
		return false;
	}
	$count=0;
	$data=array();
	while($row=@mysql_fetch_array($results)){//�Ѳ�ѯ��������һ����Ϊ����
	$data[count]=$row;
	$count++;
	}
	@mysql_free_result($results);
	return $data;
}
/**
	*����:���ݲ��뺯��
	*����:$sqlSQL���
	*����:0���²������ݵ�ID
	*/
	public function insert($sql=""){
		if(empty($sql)) return 0;//���SQL���Ϊ���򷵻�FALSE
		if(empty($this->CONN)) return 0;//�������Ϊ�գ��򷵻�FALSE
		try{//�˻����ݿ�ѡ�������ʾ�����ļ�
			$results=mysql_query($sql,$this->CONN);
		}catch(Exception$e){
			$msg=$e;
			include(ERRFILE);
		}
		if(!$results) return 0;//�������ʧ�ܷ���0,���򷵻ص�ǰ��������ID
		else return @mysql_insert_in($this->CONN);
	}
/**
	*����:���ݸ��º���
	*����:$sqlSQL���
	*����:TRUEORFALSE
	*/
	public function update($sql=""){
		if(empty($sql)) return false;//���SQL���Ϊ���򷵻�FALSE
		if(empty($this->CONN)) return false;//�������Ϊ���򷵻�FALSE
		try{//�������ݿ�ѡ�������ʾ�����ļ�
			$result=mysql_query($sql,$this->CONN);
		}catch(Except$e){
			$msg=$e;
			include(ERRFILE);
		}
		return $result;
	}
/**
	*����:��������
	*/
	public function begintransaction(){
	mysql_query("SETAUTOCOMMIT=0");//����Ϊ���Զ��ύ��mysqlĬ������ִ��
	mysql_query("BEGIN");//��ʼ������
	}
/**
	*����:�ع�
	*/
	public function rollback(){
		mysql_query("ROLLBACK");
	}
/**
	*����:�ύִ��
	*/
	public function commit(){
		mysql_query("COMMIT");
		}
	}
?>