<?php 
include 'config.php';
if(isset($_SESSION['password']) && isset($_SESSION['username'])){
	//$query=mysql_query("select * from su_admin where user='$uname' and pass='$pass'")or die(mysql_error());	
	//if(mysql_num_rows($query)==1){
	//	header("location:admin/barang.php");
	//}
	//else{
		//header("location:../index.php");
	//}
}
else if(!isset($_SESSION['password']) && !isset($_SESSION['username'])){
	$query=mysql_query("select * from su_admin where user='$uname' and pass='$pass'")or die(mysql_error());	
	if(mysql_num_rows($query)==0){
		//header("location:../index.php");
	}
	else{
		//header("location:../index.php");
	}
}	

?>