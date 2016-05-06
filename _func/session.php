<?php 
	session_name("ta");
	session_start();
	$_SESSION["id"]=session_id();
	$_SESSION['error_login']=0;
?>