<?php 
include 'config.php';
if(isset($_SESSION['password1']) && isset($_SESSION['username1'])){
	//header("location:../index.php");
}
else if(!isset($_SESSION['password1']) && !isset($_SESSION['username1'])){
	//header("location:../../main_page.php?page=login");
}	

?>