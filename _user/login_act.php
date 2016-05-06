<?php 
//session_start();
include 'admin/config.php';
$uname=$_POST['user'];
$pass=$_POST['pass'];
$_SESSION['password1']=$pass;
$_SESSION['username1']=$uname;

if(isset($_SESSION['username1']) && isset($_SESSION['password1'])){
	$query=mysql_query("select * from su_user where user_login='$uname' and user_password='$pass' and user_level!=0")or die(mysql_error());	
	if(mysql_num_rows($query)==1){
	$_SESSION['uname']=$uname;
	$_SESSION['error_login']=0;
	$az=mysql_fetch_array($query);
	$_SESSION['id_login']=$az["id_user"];
	echo $_SESSION['uname'];
	header("location:admin/barang.php");
}else{
	$_SESSION['error_login']=1;
	//header("location:" . $_SERVER['HTTP_REFERER']);
}
}

//$pas=md5($pass);


// echo $pas;
 ?>