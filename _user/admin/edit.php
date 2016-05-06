<?php 
include 'header.php';
$id=mysql_real_escape_string($_GET['id']);
?>


<?php
	switch ($_GET['a']) {
		case 'kategori':
			$det=mysql_query("select * from su_kategori where id_kategori='$id'")or die(mysql_error());
			while($d=mysql_fetch_array($det)){
			?>
			<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Barang</h3><a class="btn" href="kategori.php?a=a"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
			<form action="_func/query.php?b=kategori" method="post" enctype='multipart/form-data'>
			<table class="table">
				<tr>
					<td></td>
					<td><input type="hidden" name="id" value="<?php echo $d['id_kategori'] ?>"></td>
				</tr>
				<tr>
					<td>Nama Kategori</td>
					
					<td><input type="text" class="form-control" name="nama" value="<?php echo $d['kategori'] ?>"></td>
				</tr>
				<tr>
					<td>Deskrisi Kategori</td>
					<td><textarea class="form-control" name="desk" ><?php echo $d['deskripsi'] ?></textarea></td>
				</tr>
				
				<tr>
					<td></td>
					<td><input type="submit" class="btn btn-info" value="Simpan"></td>
				</tr>

			</table>
		</form>
			<?php
			}	
			break;
			case 's_produk':
			$det=mysql_query("select * from su_status_produk where id_status='$id'")or die(mysql_error());
			while($d=mysql_fetch_array($det)){
			?>
			<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Status Barang</h3><a class="btn" href="status_barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
			<form action="_func/query.php?b=s_produk" method="post" enctype='multipart/form-data'>
			<table class="table">
				<tr>
					<td></td>
					<td><input type="hidden" name="id" value="<?php echo $d['id_status'] ?>"></td>
				</tr>
				<tr>
					<td>Nama Status Produk</td>
					
					<td><input type="text" class="form-control" name="nama" value="<?php echo $d['status'] ?>"></td>
				</tr>
				<tr>
					<td>Deskrisi Status Produk</td>
					<td><textarea class="form-control" name="desk" ><?php echo $d['deskripsi'] ?></textarea></td>
				</tr>
				
				<tr>
					<td></td>
					<td><input type="submit" class="btn btn-info" value="Simpan"></td>
				</tr>

			</table>
		</form>
			<?php
			}	
			break;
			case 'produk':
			$det=mysql_query("select * from su_produk where id_produk='$id'")or die(mysql_error());
			while($d=mysql_fetch_array($det)){
			?>
			<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Barang</h3><a class="btn" href="barang.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
			<form action="_func/query.php?b=produk" method="post" enctype='multipart/form-data'>
			<table class="table">
				<tr>
					<td></td>
					<td><input type="hidden" name="id" value="<?php echo $d['id_produk'] ?>"></td>
				</tr>
				<tr>
					<td>Nama Produk</td>
					<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
				</tr>
				<tr>
					<td>Deskripsi Produk</td>
					<td><textarea class="form-control" name="desk" ><?php echo $d['deskripsi'] ?></textarea></td>
				</tr>
				<tr>
					<td>Jenis Produk</td>
					<td><select name="jenis" class="form-control" >
							<?php 
							$a=mysql_query("select * from su_kategori");
							while ($b=mysql_fetch_array($a)) {
								echo "<option value=$b[id_kategori]>$b[kategori]</option>";
							}
							?>
						</select></td>
				</tr>
				<tr>
					<td>Status Produk</td>
					<td><select name="status" class="form-control" >
							<?php 
							$a=mysql_query("select * from su_status_produk");
							while ($b=mysql_fetch_array($a)) {
								echo "<option value=$b[id_status]>$b[status]</option>";
							}
							?>
						</select></td>
				</tr>
				<tr>
					<td>Harga Produk</td>
					<td><input name="harga" value="<?php echo $d['harga']?>"type="number" class="form-control" placeholder="Harga Produk .."></td>
				</tr>
				<tr>
					<td>Diskon Produk</td>
					<td><input name="diskon" value="<?php echo $d['diskon']?>"type="number" class="form-control" placeholder="Diskon Produk"></td>
				</tr>
				<tr>
					<td>Jumlah Produk</td>
					<td><input name="stok" value="<?php echo $d['stok']?>"type="number" class="form-control" placeholder="Jumlah Stok Produk"></td>
				</tr>
				<tr>
					<td>Gambar Kategori</td>
					<td><input name="gbr" id="gbr" type="file" class="form-control" placeholder="Suplier .."></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="btn btn-info" value="Simpan"></td>
				</tr>

			</table>
		</form>
			<?php
			}	
			break;
			case 'profil':
			$det=mysql_query("select * from su_user where id_user=$id")or die(mysql_error());
			while($d=mysql_fetch_array($det)){
			?>
			<h3><span class="glyphicon glyphicon-cog"></span>  Edit Profil</h3><a class="btn" href="det.php?a=profil&id=1"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
			<form action="_func/query.php?b=profil" method="post" enctype='multipart/form-data'>
			<table class="table">
				<tr>
					<td></td>
					<td><input type="hidden" name="id" value="<?php echo $d['id_user'] ?>"></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" class="form-control" name="user" value="<?php echo $d['user_login'] ?>"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="text" class="form-control" name="pass" value="<?php echo $d['user_password'] ?>"></td>
				</tr>
				
				<tr>
				
					<td>Nama Depan</td>
					<td><input type="text" class="form-control" name="nama_d" value="<?php echo $d['nama_d'] ?>"></td></td>
				</tr>
				<tr>
				
					<td>Nama Belakang</td>
					<td><input type="text" class="form-control" name="nama_b" value="<?php echo $d['nama_b'] ?>"></td></td>
				</tr>
				<tr>
					
					
					<td>Tentang Penjual</td>
					<td><textarea class="form-control" name="tentang" ><?php 
						$e=mysql_query("select * from su_developer where id_user=$d[id_user]");
						$f=mysql_fetch_array($e);
						if($f['tentang']){
							echo "$f[tentang]";
						}
						else{

						}
					?></textarea></td>
				</tr>
				
				<tr>
					<td>Foto Profil</td>
					<td><input name="gbr" id="gbr" type="file" class="form-control" placeholder="Suplier .."></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="btn btn-info" value="Simpan"></td>
				</tr>

			</table>
		</form>
			<?php
			}	
			break;
			case 'user':
			$det=mysql_query("select * from su_user where id_user=$id")or die(mysql_error());
			while($d=mysql_fetch_array($det)){
			?>
			<h3><span class="glyphicon glyphicon-cog"></span>  Edit Profil</h3><a class="btn" href="user.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
			<form action="_func/query.php?b=user" method="post" enctype='multipart/form-data'>
			<table class="table">
				<tr>
					<td></td>
					<td><input type="hidden" name="id" value="<?php echo $d['id_user'] ?>"></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" class="form-control" name="user" value="<?php echo $d['user_login'] ?>"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="text" class="form-control" name="pass" value="<?php echo $d['user_password'] ?>"></td>
				</tr>
				
				<tr>
					<td>NIS</td>
					<td><input type="text" class="form-control" name="nis" value="<?php echo $d['nis'] ?>"></td></td>
				</tr>
				<tr>
					<td>Nama Depan</td>
					<td><input type="text" class="form-control" name="nama_d" value="<?php echo $d['nama_d'] ?>"></td></td>
				</tr>
					<tr>
					<td>Nama Belakang</td>
					<td><input type="text" class="form-control" name="nama_b" value="<?php echo $d['nama_b'] ?>"></td></td>
				</tr>
				<tr>
					
					
					<td>Tentang </td>
					<?php 
					$e=mysql_query("select * from su_developer where id_user=$d[id_user]");
					$f=mysql_fetch_array($e);
					?>
					<td><textarea class="form-control" name="tentang" ><?php echo $f['tentang']; ?></textarea></td>
				</tr>
				
				<tr>
					<td>Foto Profil</td>
					<td><input name="gbr" id="gbr" type="file" class="form-control" placeholder="Suplier .."></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" class="btn btn-info" value="Simpan"></td>
				</tr>

			</table>
		</form>
			<?php
			}	
			break;
		default:
			# code...
			break;
		}
 include 'footer.php'; 

 ?>