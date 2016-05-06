<!DOCTYPE html>
<html>
<head>
	<?php 
	session_start();
	include 'cek.php';
	include 'config.php';
	include 'anti.php';
	?>
	<title>Panel Admin Unit Produksi Sekolah</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../assets/css/custom.css">
   <script type="text/javascript" src="../assets/js/jquery-latest.min.js"></script>
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="../assets/js/script.js"></script>
</head>
<body>
	<div class="navbar navbar-default sidebar-admin-atas">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Panel Admin Unit Produksi Sekolah</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hy , <?php echo $_SESSION['username1'] ; ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
					<!--<li><a id="pesan_sedia" href="#" data-toggle="modal" data-target="#modalpesan"><span class='glyphicon glyphicon-comment'></span>  Pesan</a></li>!-->
					
				</ul>
			</div>
		</div>
	</div>

	<!-- modal input -->
	<div id="modalpesan" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pesan Notification</h4>
				</div>
				<div class="modal-body">
					
					<?php 
					$tt=0;
					$o1=mysql_query("select * from su_user where user_login='$_SESSION[username1]' and user_login='$_SESSION[password1]'");

					$p1=mysql_fetch_array($o1);
					$periksa=mysql_query("select * from su_produk where stok<=0 and id_user=$p[id_user]");
					if(mysql_num_rows($periksa)!=0){
						while($q=mysql_fetch_array($periksa)){	
						if($q['stok']<=0 or empty($q['stok'])){			
							echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama']."</a> yang tersisa sudah habis silahkan pesan lagi !!</div>";	
							
							$tt+=1;
							echo '<script>
					$(document).ready(function(){
						$("#pesan_sedia").css("color","red");
						
					});
					</script>';
						}
						
						}
					}
					
					$periksa=mysql_query("select * from su_cek where status_cek<=0");
					if(mysql_num_rows($periksa)!=0){
						while($q=mysql_fetch_array($periksa)){	
						if($q['status_cek']<=0 or empty($q['status_cek'])){			
							echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Pembayaran :  <a href='det.php?a=cek&id=$q[id_cek] 'style='color:red'>". $q['id_cek']." </a> belum diproses !!</div>";	
							$tt+=1;echo '<script>
					$(document).ready(function(){
						$("#pesan_sedia").css("color","red");
						
					});
					</script>';
						}
						
						}
					}
					else{
							echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> - <a style='color:red'></a>Tidak ada pesan untuk saat ini</div>";		
						}
					
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>						
				</div>
				
			</div>
		</div>
	</div>

	<div class="col-md-2 sidebar-admin">
		<div class="row">
			<?php 
			$use=$_SESSION['uname'];
			$fo=mysql_query("select gambar from su_user where user_login='$_SESSION[username1]' and user_password='$_SESSION[password1]'");
			while($f=mysql_fetch_array($fo)){
				?>				

				<div class="col-xs-6 col-md-12" style="background:transparent!important;padding-top:15px; border-bottom: 1px ridge #A5A5A5;">
					<a class="thumbnail" style="height:auto;width:auto;background:transparent!important;border:none;">
						<img style="width:100px;height:100px;border:1px ridge #ffffff;border-radius:100px; background:white;" src="../../<?php echo $f['gambar']; ?>">
					</a>
				</div>
				<?php 
			}
			?>		
		</div>

		<div class="row sidebar-admin">
		<div id='cssmenu'>
		<ul>
		   <li class='active'><a href="barang.php"><span style="float:left" class="glyphicon glyphicon-home"></span><span >Dashboard</span></a></li>
		   <li class='has-sub'><a href='#'><span style="float:left" class="glyphicon glyphicon-briefcase"></span><span>Barang</span></a>
		      <ul>
		         <li><a href="barang.php"><span>Olah Barang</span></a></li>
		         <li><a class='last' href="barang_laku.php"><span>Olah Barang Laku</span></a></li>
		      </ul>
		   </li>
		   
		    <li class='last'><a href='#'><span style="float:left" class="glyphicon glyphicon-cog"></span><span>Penjualan</span></a>
		   <ul>
		        <!-- <li><a href='penjualan.php'><span>Olah Penjualan</span></a></li>
		          <li><a href='transaksi.php'><span>Olah Transaksi</span></a></li> !-->
		         
		         <li class='last'><a href='pesanan.php'><span>Olah Pesanan</span></a></li>
		    </ul>
		    </li>
		  			   
		   <li class='last'><a href='#'><span style="float:left" class="glyphicon glyphicon-cog"></span><span>Pengaturan Admin</span></a>
		   <ul>
		         

		         <li class='last'><a href="det.php?a=profil&id=<?php 
		         $fo=mysql_query("select * from su_user where user_login='$_SESSION[username1]' and user_password='$_SESSION[password1]'");
					$f=mysql_fetch_array($fo);
		         echo $f['id_user']; ?>"><span>Olah Profile</span></a></li>
		    </ul>
		    </li>
		    
		   <li class='last'><a href='_func/query.php?c=logout'><span style="float:left" class="glyphicon glyphicon-log-out"></span><span>Logout</span></a></li>
		</ul>
		</div>
		<!--
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>			
			<li><a href="barang.php"><span class="glyphicon glyphicon-briefcase"></span>  Data Barang</a></li>
			<li><a href="barang_laku.php"><span class="glyphicon glyphicon-briefcase"></span>  Entry Penjualan</a></li>        												
			<li><a href="ganti_foto.php"><span class="glyphicon glyphicon-picture"></span>  Ganti Foto</a></li>
			<li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Ganti Password</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	-->
	</div>		

	</div>
	<div class="col-md-10">