<!DOCTYPE html>
<html>
<head>
	<title>UPS</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.js"></script>
	
	<?php include('admin/config.php'); 
	//if($_SESSION['error_login']==1){
	//	echo "<script>window.alert('Username atau Password anda salah');</script>";
	//}
	if(isset($_SESSION['password']) && isset($_SESSION['username'])){
	//header("location:admin/barang.php");
	}
	else if(!isset($_SESSION['password']) && !isset($_SESSION['username'])){
		//header("location:../index.php");
	}
	?>
	<style type="text/css">
	.kotak{	
		margin-top: 150px;
	}

	.kotak .input-group{
		margin-bottom: 20px;
	}
	</style>
</head>
<body>	
	<div class="container">
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Login Gagal !! Username dan Password Salah !!</div>";
			}
		}
		?>
		<div class="panel panel-default">
				
			<form action="login_act.php" method="post">
				<div style="background:#ccc;"class="col-md-4 col-md-offset-4 kotak">
					<h3>Panel Login Administator</h3>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" class="form-control" placeholder="Username" name="uname">
					</div>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input type="password" class="form-control" placeholder="Password" name="pass">
					</div>
					<div class="input-group">			
						<input type="submit" class="btn btn-primary" value="Login">
					</div>
				</div>

			</form>

		</div>
	</div>
</body>
</html>