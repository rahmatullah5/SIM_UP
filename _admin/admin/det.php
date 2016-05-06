<?php 
include 'header.php';
?>


<!--<a class="btn" href="../kategori.php?a=a" ?><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>!-->

<?php
$id=mysql_real_escape_string($_GET['id']);


	switch ($_GET['a']) {
		case 'kategori':
				$det=mysql_query("select * from su_kategori where id_kategori='$id'")or die(mysql_error());
				while($d=mysql_fetch_array($det)){
				?><h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
				<a class="btn" href="kategori.php?a=a" ?><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
				<table class="table">
				<tr>
					<td>Nama</td>
					<td><?php echo $d['kategori'] ?></td>
				</tr>
				<tr>
					<td>Deksripsi</td>
					<td><?php echo $d['deskripsi'] ?></td>
				</tr>
				
			</table>
	<?php 
	}	
	break;
	case 's_produk':
		$det=mysql_query("select * from su_status_produk where id_status='$id'")or die(mysql_error());
				while($d=mysql_fetch_array($det)){
				?><h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Status Barang</h3>
				<a class="btn" href="status_barang.php" ?><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
				<table class="table">
				<tr>
					<td>Nama Status</td>
					<td><?php echo $d['status'] ?></td>
				</tr>
				<tr>
					<td>Deksripsi Status</td>
					<td><?php echo $d['deskripsi'] ?></td>
				</tr>
				
			</table>
	<?php
	} 
		break;
		case 'barang':
		$det=mysql_query("select * from su_produk where id_produk='$id'")or die(mysql_error());
				while($d=mysql_fetch_array($det)){
				?><h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
				<a class="btn" href="barang.php" ?><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
				<table class="table">
				<tr>
					<td>Nama Produk</td>
					<td><?php echo $d['nama'] ?></td>
				</tr>
				<tr>
					<td>Deksripsi Produk</td>
					<td><?php echo $d['deskripsi'] ?></td>
				</tr>
				<tr>
					<td>Jenis Produk</td>
					<td><?php $a=mysql_query("select * from su_kategori where id_kategori=$d[id_kategori]"); $b=mysql_fetch_array($a);  echo $b['kategori'] ?></td>
				</tr>
				<tr>
					<td>Status Produk</td>
					<td><?php $a=mysql_query("select * from su_status_produk where id_status=$d[status_produk]"); $b=mysql_fetch_array($a);  echo $b['status'] ?></td>
				</tr>
				<tr>
					<td>Harga Produk</td>
					<td><?php echo $d['harga'] ?></td>
				</tr>
				<tr>
					<td>Diskon Produk</td>
					<td><?php echo $d['diskon'] ?></td>
				</tr>
				<tr>
					<td>Stok Produk</td>
					<td><?php echo $d['stok'] ?></td>
				</tr>
				<tr>
					<td>Tanggal Produk</td>
					<td><?php echo ttl($d['tgl']) ?></td>
				</tr>
				<tr>
					<td>Nama Pemasok</td>
					<td><?php $a=mysql_query("select * from su_user where id_user=$d[id_user]"); $b=mysql_fetch_array($a);  echo "$b[nama_d] $b[nama_b]";  ?></td>
				</tr>
				<tr>
					<td>Gambar Produk</td>
					<td><img style="width:400px; height:auto;" src="../../<?php echo $d['gambar']?>"</td>
					
				</tr>
			</table>
	<?php
	} 
		break;
		case 'pesanan':
		$det=mysql_query("select * from su_pesanan where id_pesanan='$id'")or die(mysql_error());
				while($d=mysql_fetch_array($det)){
				?><h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Pemesan</h3>
				<a class="btn" href="barang.php" ?><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
				<table class="table">
				<tr>
					<td>Nama Pemesan</td>
					<td><?php echo $d['nama_d']." ".$d['nama_d']  ?></td>
				</tr>
				<tr>
					<td>Telp</td>
					<td>0<?php echo $d['telp'] ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo $d['email'] ?></td>
				</tr>
				<tr>
					<td>Negara</td>
					<td><?php echo $d['negara'] ?></td>
				</tr>
				<tr>
					<td>Provinsi</td>
					<td><?php echo $d['provinsi'] ?></td>
				</tr>
				<tr>
					<td>Kota</td>
					<td><?php echo $d['kota'] ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><?php echo $d['alamat_1']."</br>".$d['alamat_2'] ?></td>
				</tr>
				<tr>
					<td>Catatan Pelanggan</td>
					<td><?php echo $d['catatan'] ?></td>
				</tr>
				
			</table>
	<?php
	} 
		break;
		case 'profil':
		$det=mysql_query("select * from su_admin where id_admin=$id")or die(mysql_error());
				while($d=mysql_fetch_array($det)){
				?><h3><span class="glyphicon glyphicon-briefcase"></span>  Profil </h3> 
				
				<table class="table">
				<tr>
					<td>Username</td>
					<td><?php echo $d['user']  ?></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><?php echo $d['pass'] ?></td>
				</tr>
				<tr>
					
					<td>Nama Penjual</td>
					<td><?php echo $d['nama'] ?></td>
				</tr>
				<tr>
					
				</tr>
				<tr>
					<td>Tentang Penjual</td>
					<td><?php echo $d['tentang'] ?></td>
				</tr>
				
				<tr>
					<td>Gambar Produk</td>
					<td><img style="width:400px; height:auto;" src="../<?php echo $d['gambar']?>"</td>
					
				</tr>
				<tr>
					<td colspan="2">
						<a href="edit.php?a=profil&id=<?php echo $d['id_admin']; ?>" class="btn btn-warning">Edit Profile</a>
					</td>
				</tr>
			</table>
	<?php
	}
		break;		
		case 'cek':
		$det=mysql_query("select * from su_cek where id_cek=$id")or die(mysql_error());
				while($d=mysql_fetch_array($det)){
				?><h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Transaksi </h3> 
				<a class="btn" href="transaksi.php" ?><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
				<table class="table">
				<tr>
					<td>Id Pesanan</td>
					<td><?php echo $d['id_pesanan']  ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo $d['email'] ?></td>
				</tr>
				<tr>
					
					<td>Nama Pengirim</td>
					<td><?php echo $d['nama'] ?></td>
				</tr>
				<tr>
					
				</tr>
				<tr>
					<td>Jumlah Transfer</td>
					<td><?php echo $d['jumlah'] ?></td>
				</tr>
				<tr>
					<td>Dari Bank</td>
					<td><?php echo $d['via'] ?></td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td><?php echo $d['tgl'] ?></td>
				</tr>
				<tr>
					<td>Status Cek</td>
					<td><?php if($d['status_cek']==0){echo "Pending";}else{echo "Sukses";} ?></td>
				</tr>
				<tr>
					<td>Bukti Transfer</td>
					<td><img style="width:400px; height:auto;" src="../../<?php echo $d['gambar']?>"</td>
					
				</tr>
				<tr>
					<td colspan="2"><a href="_func/query.php?b=cek&id=<?php echo $d['id_cek']; ?>" class="btn btn-warning">Update Status</a></td>
				</tr>

			</table>
	<?php
	}
		break;	
		case 'user':
		$det=mysql_query("select * from su_user where id_user=$id")or die(mysql_error());
				while($d=mysql_fetch_array($det)){
				?><h3><span class="glyphicon glyphicon-briefcase"></span>  Detail User </h3> 
				<a class="btn" href="user.php" ?><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
				<table class="table">
				<tr>
					<td>NIS</td>
					<td><?php echo $d['nis'] ?></td>
				</tr>
				<tr>
					<td>Nama User</td>
					<td><?php echo "$d[nama_d] $d[nama_b]"  ?></td>
				</tr>
				
				<tr>
					
					<td>Status User</td>
					<td><?php if($d['user_level']==1){echo "Aktif";}else{echo "Non-Aktif";}?></td>
				</tr>
				<tr>
					
				</tr>
				<tr>
					<td>User Password</td>
					<td><?php echo $d['user_password'] ?></td>
				</tr>
				<tr>
					<td>User Login</td>
					<td><?php echo $d['user_login'] ?></td>
				</tr>
				<tr>
					<td>Foto user</td>
					<td><img style="width:400px; height:auto;" src="../../<?php echo $d['gambar']?>"</td>
				</tr>
			
				<tr>
					<td colspan="2"><a href="_func/query.php?b=user_1&id=<?php echo $d['id_user']; ?>" class="btn btn-warning">Update Status</a></td>
				</tr>

			</table>
	<?php
	}
		break;	
		case 'order':
		$det=mysql_query("select * from su_order where id_order=$id")or die(mysql_error());
				while($d=mysql_fetch_array($det)){
				?><h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Pesanan Produk</h3> 
				<a class="btn" href="pesanan.php" ?><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
				<table class="table">
				<tr>
					<td>Nama</td>
					<td><?php echo $d['nama'] ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo "$d[email]"  ?></td>
				</tr>
				
				<tr>
					
					<td>Telepon</td>
					<td><?php echo "$d[telp]"  ?></td>
				</tr>
				<tr>
					
				</tr>
				<tr>
					<td>Deskripsi Produk </td>
					<td><?php echo $d['desk'] ?></td>
				</tr>
				<tr>
					<td>Nama User</td>
					<td><?php 
					$e=mysql_query("select * from su_user where id_user=$d[id_user]");$f=mysql_fetch_array($e);
					echo "$f[nama_d] $f[nama_b]"; ?></td>
				</tr>
				
			
				
			</table>
	<?php
	}
		break;			
		default:
			# code...
			break;
	}
?>

						
	

<?php include 'footer.php'; ?>