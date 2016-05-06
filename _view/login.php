<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title></title>
</head>
<body>
	<?php 
	//include('_user/admin/config.php'); 
	if($_SESSION['error_login']==1){
		echo "<script>window.alert('Username atau Password anda salah');</script>";
	}
	if(isset($_SESSION['password1']) && isset($_SESSION['username1'])){
	header("location:_user/admin/barang.php");
	}
	else if(!isset($_SESSION['password1']) && !isset($_SESSION['username1'])){
		//header("location:../index.php");
		//echo $_SESSION['error_login'];
	}
	?>
		<div id="bungkus">
			<div id="cont-login">
				<img src="images/l1.png"/>
				<form action="_user/login_act.php" method="post">
						<input type="text" placeholder="Username" name="user">
						<input type="password" placeholder="Password" name="pass">
						<input type="submit" name="submit">
				</form>
			</div>
		</div>
</body>
</html>