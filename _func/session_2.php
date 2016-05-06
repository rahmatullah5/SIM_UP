<?php 
	include ("session.php");
	session_regenerate_id();
	//header("location:../main_page.php?page=home");
	session_id();
	$a=session_id();
	
	header("location:" . $_SERVER['HTTP_REFERER']);
?>