<?php
 	include '../config.php';
 	include '../anti.php';
	switch ($_GET['a']) {
		case 'kategori':
		$a=anti_inject($_POST['nama']);
		$b=anti_inject($_POST['desk']);
		
			
									$q=mysql_query("insert into su_kategori (kategori , deskripsi ) values ('$a', '$b')") or die(mysql_error());
									header("location:" . $_SERVER['HTTP_REFERER']);
									//header("location:kategori.php?a=a");
									
								
			break;
			
			case 's_barang'	:
			$a=anti_inject($_POST['nama']);
			$b=anti_inject($_POST['desk']);

			mysql_query("insert into su_status_produk (status,deskripsi) values ('$a', '$b')") or die(mysql_error());
			header("location:" . $_SERVER['HTTP_REFERER']);
			break;

			case 'barang':
			$a=anti_inject($_POST['nama']);
			$b=anti_inject($_POST['desk']);
			$c=anti_inject($_POST['jenis']);
			$d=anti_inject($_POST['status']);
			$e=anti_inject($_POST['harga']);
			$f=anti_inject($_POST['diskon']);
			$g=anti_inject($_POST['stok']);
			$id=anti_inject($_POST['id']);

			$gambar = anti_inject(($_FILES['gbr']['name']));
					if(!is_dir("../../../images/asset/produk/". $id ."/")) {
					    mkdir("../../../images/asset/produk/". $id ."/");
					}
					$folder = "../../../images/asset/produk/". $id ."/";
					$folder = $folder.basename($_FILES['gbr']['name']);
					$tipe =$_FILES['gbr']['type'];
					//$extension = end(explode(".", $_FILES["file"]["name"]));
						if(	$tipe != "image/jpg" && $tipe != "image/jpeg" && $tipe != "image/pjpeg" && $tipe != "image/png" && $tipe != "image/gif" && $_FILES["upload"]["size"] < 1000000)
						{
							echo "Error";					
						}
						else{
								
								if (move_uploaded_file($_FILES['gbr']['tmp_name'], $folder)) 
								{
									$gl="images/asset/produk/". $id ."/" . $gambar;
									$q=mysql_query("insert into su_produk (nama,deskripsi,id_kategori,status_produk,harga,diskon,stok,gambar,id_user) values ('$a', '$b' , $c , $d , $e , $f , $g , '$gl' , $_SESSION[id_login])") or die(mysql_error());
									
									header("location:../barang.php");
									//header("location:kategori.php?a=a");
									
								}
								else{
									echo "error";
								}
							}
		break;
		case 'u1':
		$a=anti_inject($_POST['nis']);
			$b=anti_inject($_POST['nd']);
			$c=anti_inject($_POST['nb']);
			$d=anti_inject($_POST['user']);
			$e=anti_inject($_POST['pass']);
			
			mysql_query("insert into su_user (nis,nama_d,nama_b,user_login,user_password) values ($a , '$b' , '$c' , '$d', '$e')");
			//header("location:" . $_SERVER['HTTP_REFERER']);
		break;
		
	}
	switch ($_GET['b']) {
		case "cek":
		$id=anti_inject($_GET['id']);
		mysql_query("update su_cek set status_cek = 1 where id_cek=$id");
		header("location:../det.php?a=cek&id=$id");
		break;
		case "user_1":
		$id=anti_inject($_GET['id']);
		mysql_query("update su_user set user_level = 1 where id_user=$id");
		header("location:../det.php?a=user&id=$id");
		break;
		case 'kategori':
		$a=anti_inject($_POST['nama']);
		$b=anti_inject($_POST['desk']);
		$c=anti_inject($_POST['id']);
			
									$q=mysql_query("update su_kategori  set kategori='$a' , deskripsi='$b' where id_kategori=$c") or die(mysql_error());
									//header("location:" . $_SERVER['HTTP_REFERER']);
									header("location:../kategori.php?a=a");
		
							
			break;
			case 's_produk':
			$a=anti_inject($_POST[nama]);
			$b=anti_inject($_POST[desk]);
			$c=anti_inject($_POST[id]);

			mysql_query("update su_status_produk set status='$a' , deskripsi='$b' where id_status=$c");
			header("location:../status_barang.php");
			break;
			case 'profil':
			$a=anti_inject($_POST['user']);
			$b=anti_inject($_POST['pass']);
			$c=anti_inject($_POST['nama_d']);
			$d=anti_inject($_POST['nama_b']);
			$e=anti_inject($_POST['tentang']);
			$id=anti_inject($_POST['id']);

			$gambar = anti_inject(($_FILES['gbr']['name']));
					if(!is_dir("../../images/asset/user/". $id ."/")) {
					    mkdir("../../images/asset/user/". $id ."/");
					}
					$folder = "../../images/asset/user/". $id ."/";
					$folder = $folder.basename($_FILES['gbr']['name']);
					$tipe =$_FILES['gbr']['type'];
					//$extension = end(explode(".", $_FILES["file"]["name"]));
						if(	$tipe != "image/jpg" && $tipe != "image/jpeg" && $tipe != "image/pjpeg" && $tipe != "image/png" && $tipe != "image/gif" && $_FILES["upload"]["size"] < 1000000)
						{
							echo "Error";					
						}
						else{
								
								if (move_uploaded_file($_FILES['gbr']['tmp_name'], $folder)) 
								{
									$gl="images/asset/user/". $id ."/" . $gambar;
									//e  cho "update su_produk set nama='$a' , deskripsi='$b' , id_kategori= $c , status_produk= $d , harga= $e , diskon= $f , stok= $g , gambar='$gl' where id_produk=$id";
									$q=mysql_query("update su_user set nis=$nis , user_login='$a' , user_password='$b' , nama_d= '$c' , nama_b='$d' ,gambar='$gl' where id_user=$id") or die(mysql_error());
									$q2=mysql_query("update su_developer set tentang='$e' where id_user =$id");

									header("location:../det.php?a=user&id=$id");
									//header("location:kategori.php?a=a");
									
								}
								else{
									echo "error";
								}
							}
			break;
			case 'user':
			$a=anti_inject($_POST['user']);
			$b=anti_inject($_POST['pass']);
			$c=anti_inject($_POST['nama_d']);
			$d=anti_inject($_POST['nama_b']);
			$e=anti_inject($_POST['tentang']);
			$nis=anti_inject($_POST['nis']);
			$id=anti_inject($_POST['id']);

			$gambar = anti_inject(($_FILES['gbr']['name']));
					if(!is_dir("../../../images/asset/user/". $id ."/")) {
					    mkdir("../../../images/asset/user/". $id ."/");
					}
					$folder = "../../../images/asset/user/". $id ."/";
					$folder = $folder.basename($_FILES['gbr']['name']);
					$tipe =$_FILES['gbr']['type'];
					//$extension = end(explode(".", $_FILES["file"]["name"]));
						if(	$tipe != "image/jpg" && $tipe != "image/jpeg" && $tipe != "image/pjpeg" && $tipe != "image/png" && $tipe != "image/gif" && $_FILES["upload"]["size"] < 1000000)
						{
							echo "Error";					
						}
						else{
								
								if (move_uploaded_file($_FILES['gbr']['tmp_name'], $folder)) 
								{
									$gl="images/asset/user/". $id ."/" . $gambar;
									//e  cho "update su_produk set nama='$a' , deskripsi='$b' , id_kategori= $c , status_produk= $d , harga= $e , diskon= $f , stok= $g , gambar='$gl' where id_produk=$id";
									$q=mysql_query("update su_user set nis=$nis , user_login='$a' , user_password='$b' , nama_d= '$c' , nama_b='$d' ,gambar='$gl' where id_user=$id") or die(mysql_error());
									$q2=mysql_query("update su_developer set tentang='$e' where id_user =$id");

									header("location:../det.php?a=profil&id=$id");

									//header("location:kategori.php?a=a");
									
								}
								else{
									echo "error";
								}
							}
			break;
			case 'produk':
			$a=anti_inject($_POST['nama']);
			$b=anti_inject($_POST['desk']);
			$c=anti_inject($_POST['jenis']);
			$d=anti_inject($_POST['status']);
			$e=anti_inject($_POST['harga']);
			$f=anti_inject($_POST['diskon']);
			$g=anti_inject($_POST['stok']);
			$id=anti_inject($_POST['id']);
			

			$gambar = anti_inject(($_FILES['gbr']['name']));
					if(!is_dir("../../../images/asset/produk/". $id ."/")) {
					    mkdir("../../../images/asset/produk/". $id ."/");
					}
					$folder = "../../../images/asset/produk/". $id ."/";
					$folder = $folder.basename($_FILES['gbr']['name']);
					$tipe =$_FILES['gbr']['type'];
					//$extension = end(explode(".", $_FILES["file"]["name"]));
						if(	$tipe != "image/jpg" && $tipe != "image/jpeg" && $tipe != "image/pjpeg" && $tipe != "image/png" && $tipe != "image/gif" && $_FILES["upload"]["size"] < 1000000)
						{
							echo "Error";					
						}
						else{
								
								if (move_uploaded_file($_FILES['gbr']['tmp_name'], $folder)) 
								{
									$gl="images/asset/produk/". $id ."/" . $gambar;
									//e  cho "update su_produk set nama='$a' , deskripsi='$b' , id_kategori= $c , status_produk= $d , harga= $e , diskon= $f , stok= $g , gambar='$gl' where id_produk=$id";
									$q=mysql_query("update su_produk set nama='$a' , deskripsi='$b' , id_kategori= $c , status_produk= $d , harga= $e , diskon= $f , stok= $g , gambar='$gl' where id_produk=$id") or die(mysql_error());


									header("location:../barang.php");
									//header("location:kategori.php?a=a");
									
								}
								else{
									echo "error";
								}
							}
			break;
	}
	switch ($_GET['c']) {
		case 'kategori':
			$a=$_GET['id'];
			mysql_query("delete from su_kategori where id_kategori=$a");
			header("location:../kategori.php?a=a");
		
			break;
		case 's_produk':
			$a=$_GET['id'];
			mysql_query("delete from su_status_produk where id_status=$a");
			header("location:../status_barang.php");
		break;
		case 'produk_laku':
			$a=$_GET['id'];
			mysql_query("delete from su_cart_ref where id_produk=$a");
			header("location:../barang_laku.php");
		break;
		
		case 'produk':
			$a=$_GET['id'];
			mysql_query("delete from su_produk where id_produk=$a");
			header("location:../barang.php");
			break;
		case 'pesanan':
			$a=$_GET['id'];
			mysql_query("delete from su_pesanan where id_pesanan=$a");
			header("location:../pesanan.php");
		break;
		case 'order':
			$a=$_GET['id'];
			mysql_query("delete from su_order where id_order=$a");
			header("location:../pesanan.php");
		break; 
		case 'cek':
			$a=$_GET['id'];
			mysql_query("delete from su_cek where id_cek=$a");
			header("location:../transaksi.php");
		break;
		case 'user':
			$a=$_GET['id'];
			mysql_query("delete from su_user where id_user=$a");
			header("location:../user.php");
		break;
		case 'profil':

		break;
		case 'logout':
			session_destroy();
			header("location:../../../main_page.php?page=login");

		break;
		default:
			# code...
			break;
	}
?>