<?php 
if(empty($_SESSION['username1'])){

	session_start();
	session_regenerate_id();
	}

mysql_connect("localhost","root","");
mysql_select_db("db_sim_up");
?>