<?php
$login=$_GET[login]
if($login==1) $title="���빺�鿨ר��--��������ID������";
elseif($login==2) $title="�޸ĸ�������--��������ID������";
elseif($login==3) $title="�����ѯ--��������ID";
elseif($login==4) $title="վ����¼--���������Ա�ʺż�����";
include_once("memhead.php");
?>
<script language="javaScript" type="text/javascript">
function pdsr(){
var id=window.frm.userid.value;
var pds=window.frm.password.value;
if(id==""){
window.alert("���벻��Ϊ��");
window.frm.password.focus();
}
}
</script>
	<div id="bd">
	<div id="bt"><? echo $title;?><hr/></div>
	<form name="frm" action="check.php?login=<?php echo $login;?>" method="post">
		<table width="100%" boder="0" cellspacing="0" class="td1">
		 <tr><>