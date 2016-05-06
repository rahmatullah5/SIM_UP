<?php 
session_start();
include 'admin/config.php';
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$_SESSION['password']=$pass;
$_SESSION['username']=$uname;

if(isset($uname) && isset($pass)){
	$query=mysql_query("select * from su_admin where user='$uname' and pass='$pass'")or die(mysql_error());	
	if(mysql_num_rows($query)==1){
	$_SESSION['uname']=$uname;
	header("location:admin/barang.php");
	echo "string";
	$_SESSION['error_login']=0;
}else{
	$_SESSION['error_login']=1;
	//header("location:" . $_SERVER['HTTP_REFERER']);
}
}

//$pas=md5($pass);


// echo $pas;
 ?>