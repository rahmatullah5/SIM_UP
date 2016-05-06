<html>
<head>
	<title></title>
</head>
<body>
	<div id="bungkus">
			<?php 
				$id=$_GET['id'];
				$q=mysql_query("select * from su_produk where id_produk=$id");
				$a=mysql_fetch_array($q) or die(mysql_error());
				$q1=mysql_query("select * from su_user where id_user=$a[id_user]");
				$b=mysql_fetch_array($q1);
			?>
			<div id="cont-detail">
				Home > Kategori > Detail
				<hr/>
				
				<div class="cont-gbr">
					<img src="<?php echo $a['gambar']; ?>"/>
				</div>
				<div class="cont-buy">
					<div class="judul"><?php echo $a['nama']; ?></div>
					<div class="tgl"><?php echo ttl($a['tgl']); ?></div>
					<div class="desk"><?php echo $a['deskripsi']; ?></div>
					<div class="tgl">Status Produk : <b><?php $y=mysql_query("select * from su_status_produk where id_status=$a[status_produk]");$z=mysql_fetch_array($y); echo $z['deskripsi']; ?></b></div>
					<div class="harga">Harga</div>
					<div class='nominal'>
					<?php if($a['diskon']==0)
					{echo "<b>Rp.".number_format($a['harga'])."</b>";}
					else{
						echo "<strike>Rp.".number_format($a['harga']).",</strike>";
						$b=($a['harga']-($a['harga']/100*$a['diskon'])); 
						echo "<b>Rp.".number_format($b).",<b>";} ?>
					</div>
					*Stok Tersisa <?php echo $a['stok']; ?>
					
						<form action="_func/query.php?a=a2" method="post" >
							<input name="nom" type="number" min="1" max="<?php echo $a['stok'];?>">
							<input type="hidden" name="id" value="<?php echo $a['id_produk'] ?>">
							<input type="submit" value="Masukan Ke Keranjang">
						</form>
				</div>

				<div class="cont-info">
					<?php 
					$q1=mysql_query("select * from su_user where id_user=$a[id_user]");
					$b=mysql_fetch_array($q1);
					?>
					<div class="cont-profile">
						<img src=<?php echo "$b[gambar]";?>>
					</div>
					<?php echo"<div class='nama'> $b[nama_d] $b[nama_b]</div>";  ?>
					<br><?php if($b['user_level']==1){echo "Siswa";}elseif ($b['user_level']==2) {
						echo "Admin";
					}?>
					<?php 
					$q1=mysql_query("select count(*) as jml from su_produk where id_user=$a[id_user]");
					$b=mysql_fetch_array($q1);
					?>
					<br><?php echo $b['jml']; ?> Barang Dijual<hr>
					<div class="desk">
						<?php 
						$q1=mysql_query("select * from su_developer where id_user=$a[id_user]");
						$b=mysql_fetch_array($q1);
						echo "$b[tentang]";
						?>
					<hr>
					<a href="main_page.php?page=pesan&id=<?php echo $b['id_user'] ?>"><div class="a">Pesan Produk Khusus</div></a>
				</div>
			</div>
	</div>
</body>
</html>