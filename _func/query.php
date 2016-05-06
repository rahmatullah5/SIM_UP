<?php
	include ("connection.php");
	//include ("cookies.php");
	include ("session.php");
	switch ($_GET['a']) {
		case 'a':
			$a=$_GET["id"];
			$y=mysql_query("select * from su_produk where id_produk=$a");
			while ($z=mysql_fetch_array($y)) {
				if ($z['stok']>0) {
				$id=$_SESSION["id"];
				
				$a1=mysql_query("select harga from su_produk where id_produk=$a");
				$a2=mysql_fetch_array($a1);
				$b=$a2['harga'];
				$c=1;
		
			mysql_query("insert into su_cart_ref (id_cart,id_produk,harga,banyak_produk) values ('$id' , $a , $b , $c)") or die(mysql_error());
			}
		
			}
			header("location:" . $_SERVER['HTTP_REFERER']);
			break;
		case 'a2':
			$nm=$_POST['nom'];
			$id=$_SESSION["id"];
			$a=$_POST["id"];
			$a1=mysql_query("select harga from su_produk where id_produk=$a");
			//echo "select harga from su_produk where id_produk=$a";
			$a2=mysql_fetch_array($a1);
			$b=$a2['harga'];
			$c=$nm;
		
			mysql_query("insert into su_cart_ref (id_cart,id_produk,harga,banyak_produk) values ('$id' , $a , $b , $c)");
			header("location:" . $_SERVER['HTTP_REFERER']);
			break;

		case 'b':
			$a=$_GET["id"];
			//$y=mysql_query("select * from su_produk where id_produk=$a");
			//while ($z=mysql_fetch_array($y)) {
			//	if ($z['stok']>0) {
				$id=$_SESSION["id"];
				
				$a1=mysql_query("select harga from su_produk where id_produk=$a");
				$a2=mysql_fetch_array($a1);
				$b=$a2['harga'];
				$c=1;
		
			mysql_query("insert into su_wish_ref (id_wish,id_produk,harga,banyak) values ('$id' , $a , $b , $c)") or die(mysql_error());
			//}
				
			//}
			
			
			
			header("location:" . $_SERVER['HTTP_REFERER']);
			break;
		case 'r1':
			$a=anti($_POST['nis']);
			$b=anti($_POST['nd']);
			$c=anti($_POST['nb']);
			$d=anti($_POST['user']);
			$e=anti($_POST['pass']);
			
			mysql_query("insert into su_user (nis,nama_d,nama_b,user_login,user_password) values ($a , '$b' , '$c' , '$d', '$e')");
			header("location:../main_page.php?page=home");
		break;
		case 'o1':
			$a=anti($_POST['nama']);
			$b=anti($_POST['telp']);
			$c=anti($_POST['email']);
			$d=anti($_POST['desk']);
			$id=anti($_POST['id']);

			mysql_query("insert into su_order (id_user,nama,telp,email,desk) values ($id , '$a' , '$b' , '$c', '$d')");
			//echo "insert into su_order (id_user,nama,telp,email,desk) values ($id , '$a' , '$b' , '$c', '$d')";
			header("location:../main_page.php?page=home");
		break;
		case 'l1':
			$uname=$_POST['user'];
			$pass=$_POST['pass'];
			//$pas=md5($pass);
			$query=mysql_query("select * from su_user where user_login='$uname' and user_password='$pass'")or die(mysql_error());
			if(mysql_num_rows($query)==1){
				$_SESSION['uname']=$uname;
				echo "good";
			}else{
				//header("location:index.php?pesan=gagal")or die(mysql_error());
				// mysql_error();
				echo "bad";
}
		break;
		case 'k1':
			mysql_query("delete from su_cart_ref");
			header("location:" . $_SERVER['HTTP_REFERER']);
		break;
		case 'k11':
			mysql_query("delete from su_wish_ref");
			header("location:" . $_SERVER['HTTP_REFERER']);
		break;
		case 'k2':
			$id=$_GET['id'];
			mysql_query("delete from su_cart_ref where id_produk=$id");
			header("location:" . $_SERVER['HTTP_REFERER']);
		break;
		case 'k3':
			$id=$_GET['id'];
			mysql_query("delete from su_wish_ref where id_produk=$id");
			header("location:" . $_SERVER['HTTP_REFERER']);
		break;
		case 'c1':
		$id=anti($_POST['id']);
		$nama_d=anti($_POST['nama_d']);
		$nama_b=anti($_POST['nama_b']);
		$nama_p=anti($_POST['nama_p']);
		$email=anti($_POST['email']);
		$telp=anti($_POST['telp']);
		$negara=anti($_POST['negara']);
		$alamat1=anti($_POST['alamat1']);
		$alamat2=anti($_POST['alamat2']);
		$kota=anti($_POST['kota']);
		$provinsi=anti($_POST['provinsi']);
		$zip=anti($_POST['zip']);
		$cat=anti($_POST['cat']);

		$m=mysql_query("INSERT INTO su_pesanan( id_cart, nama_d, nama_b, nama_p, email, telp, negara, alamat_1, alamat_2, kota, provinsi, zip, catatan) 
			VALUES ('$id' , '$nama_d' , '$nama_b' , '$nama_p' , '$email' , $telp , '$negara' , '$alamat1' , '$alamat2' , '$kota' , '$provinsi' , $zip , '$cat')") or die(mysql_errno()) ;
			header("location:../main_page.php?page=checkout2");
		break;
		case 'test':
		
				$a=mysql_query("select *,sum(banyak_produk) as jml from su_cart_ref where id_cart='$_SESSION[id]' group by id_produk");
				while ($b=mysql_fetch_array($a)) {
					//mysql_query("insert into su_cart (id_cart,id_produk,harga,banyak_produk) values ('$_SESSION[id]' , $b[id_produk] , $b[harga] , $b[jml])");
					$c=mysql_query("select * from su_produk where id_produk=$b[id_produk]");
					$d=mysql_fetch_array($c);
					$stok_baru=0;
					$stok_baru=$d["stok"]-$b['jml'];
					echo "$stok_baru = $d[stok] - $b[jml] / $b[id_produk] <br>";
					echo "update su_produk set stok=$stok_baru where id_produk=$b[id_produk]<br>";
					mysql_query("update su_produk set stok=$stok_baru where id_produk=$b[id_produk]");
					mysql_query("delete from su_cart_ref where id_produk=$b[id_produk] and id_cart='$_SESSION[id]'");

				}
				
					
		case 'c2':
			$no=anti($_POST['no']);
			$email=anti($_POST['email']);
			$jumlah=anti($_POST['jumlah']);
			$ke=anti($_POST['tujuan']);
			$via=anti($_POST['ke']);
			$nama=anti($_POST['nama']);
			$tgl=anti($_POST['tgl']);
			$gambar = anti(($_FILES['gbr']['name']));
					if(!is_dir("../images/asset/cek_pesan/". $no ."/")) {
					    mkdir("../images/asset/cek_pesan/". $no ."/");
					}
					$folder = "../images/asset/cek_pesan/". $no ."/";
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
									$gl="images/asset/cek_pesan/". $no ."/" . $gambar;
									//e  cho "update su_produk set nama='$a' , deskripsi='$b' , id_kategori= $c , status_produk= $d , harga= $e , diskon= $f , stok= $g , gambar='$gl' where id_produk=$id";
									$q=mysql_query("insert into su_cek (id_pesanan, email, tujuan, jumlah, via, nama, tgl, gambar) values 
										($no , '$email' , '$ke' , $jumlah , '$via' , '$nama' , '$tgl' , '$gl')") or die(mysql_error());
									echo "insert into su_cek (id_pesanan, email, tujuan, jumlah, via, nama, tgl, gambar) values (id_pesanan=$no , email='$email' , tujuan='$ke' , jumlah=$jumlah , via='$via' , nama='$nama' , tgl='$tgl' , gambar='$gl')";

									header("location:../main_page.php?page=home");
									//header("location:kategori.php?a=a");
									
								}
								else{
									echo "error";
								}
							}

		break;			
		break;
		case 'r_session';
					session_regenerate_id();
		break;
		case 'lol':
		echo "lol";
		break;
		default:
			# code...
			break;
	}
?>