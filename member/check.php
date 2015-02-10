<?php
 session_start();
 $login=$_GET["login"];$psd=$_POST["password"];$userid=$_POST["userid"];
 require_once("opendat.php.inc");
 if($psd==""){
 $errsmg="没有输入密码!";
 header("Location:login.php?errmsg=$errms&login=$login");
 }
 if($userid==""){
 $errsmg="没有输入会员id!";
 header("Location:login.php?errmsg=$errms&login=$login");
 }
 if($login==1|| $login==2||$login==3){
 $sql="select * from userinfo where userid='$userid'";
 $records=mysql_query($sql);
 $rows=mysql_fech_array($records);
 if($userid!=$rows[userid]){
 $errmsg="用户ID输入不争取或者尚未登录为会员!!;
 header("Location:login.php?errmsg=$errmsg&login=$login");
 }
 elseif($psd<>$rows[password]&& login!=3){
 $errmsg="密码输入不正确!;
 header("Location:login.php?errmsg=$errmsg&login=$login");
 }
 else{
 $_SESSION["userid"]=$userid;
 if($login==3) header("Location:forget.php");
 elseif($login==2) header("Location:modify.php");
 elseif($login==1) header("Location:usercard.php");
 }
 }
 elseif($login==4){
 $IP_m=$_SERVER[REMOTE_ADDR];
 $sql="select * from administer where userid='$userid'";
 $records=mysql_query($sql);
 $rows=mysql_fetch_array($records);
 if($psd<>$rows[password]or$IP_m<>$rows[IP]){
 $errmsg="输入管理员帐号或密码错误!;
 header("Location:login.php?errmsg=$errmsg&login=$login");
  }
 else header("Location:manager.php");
 }
 ?>
 
 