<html>
	<head>
	</head>
	<body>
		<div id="bungkus">
		<div class="slider">
			<div id="da-slider" class="da-slider">
				<?php 
				$a=mysql_query("select * from su_produk limit 0,4");
				while ($b=mysql_fetch_array($a)) {
				?>
				<div class="da-slide">
					<h2><?php echo "$b[nama]";?></h2>
					<p><?php echo "$b[deskripsi]";?></p>
					<a href="main_page.php?page=det&id=<?php echo "$b[id_produk]";?>" class="da-link">Lihat Selengkapnya..</a>
					<div class="da-img" style="margin:-50 0 0 -100;"><img style="width:400px;height:400px" src="<?php echo "$b[gambar]";?>" alt="image01" /></div>
				</div>
				<?php
				}
				?>
				
				
				<nav class="da-arrows">
					<span class="da-arrows-prev"></span>
					<span class="da-arrows-next"></span>
				</nav>
			</div>
        </div>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.cslider.js"></script>
		<script type="text/javascript">
			$(function() {
			
				$('#da-slider').cslider({
					autoplay	: true,
					bgincrement	: 450
				});
			
			});
		</script>	
		</div>
		<?php 
				$a=mysql_query("SELECT a.kategori,b.id_kategori,COUNT(b.id_kategori) FROM su_produk b,su_kategori a WHERE a.id_kategori=b.id_kategori GROUP BY b.id_kategori ORDER BY b.tgl DESC limit 0,3");
				while ($b=mysql_fetch_array($a)) {
					
				?>
		<div id="cont-prod-baru">
			<div class="populer-header">
				Terbaru : <?php echo $b["kategori"]; ?>
				
				
			</div>
			<?php 
				$c=mysql_query("select * from su_produk where id_kategori=$b[id_kategori] order by tgl desc limit 0,1" );
				$d=mysql_fetch_array($c);
			?>
			<a href="main_page.php?page=lain&p=galery&kat=<?php echo $b["id_kategori"]; ?>">
			<div class="promo-header">
				Lihat Lainnya
			</div>
		</a>
			<hr/>
			<span class="first" style="background:url(<?php echo $d['gambar']?>);background-size: cover;">	
				
				<div class="cont-bonus" >
					
					
					<div class="cat"> <?php echo $b["kategori"]; ?></div>
					<?php 
						$e=mysql_query("select * from su_status_produk where id_status=$d[status_produk]");
						$f=mysql_fetch_array($e);
						if(($f["status"]!="normal") && ($f["status"]!="promo")){echo "<div class='stat'>$f[status]</div>";}
						else if($f["status"]=="promo"){echo "<div class='sale'>$f[status]</div>";} ?>
					
					
				</div>
				<div class="divider">
					<a href="main_page.php?page=det&id=<?php echo $d['id_produk'] ?>">
					<div class="lanjut fa fa-eye">
				
					
					</div>
					<div class="judul"><?php echo $d['nama']?></div>
					<p ><?php $d['deskripsi']=substr($d['deskripsi'],0,50);echo $d['deskripsi']; ?> Selengkapnya..</p>
					</a>
				</div>
				<div class="buy" >
					<ul>
						<a href="_func/query.php?a=a&id=<?php echo $d['id_produk'] ?>"><li class="cart fa fa-shopping-cart" >
							
							<div class="add">add to cart</div>
						</li></a>
						<a href="_func/query.php?a=b&id=<?php echo $d['id_produk'] ?>"><li class="wish fa fa-heart">
							
							
						</li></a>
							<li class="price fa fa-tags">
							<div style="color:#000;font-size:15px; float:right;">
							<?php 

								$dd=strlen($d['harga']);
								if($dd>7){
									
									if($d['diskon']!=0){$d['harga']=($d['harga']-($d['harga']/100*$d['diskon']));$d['harga']=substr($d['harga'], 0,4); echo "Rp.".number_format($d['harga'])."..."; }else{ $d['harga']=substr($d['harga'], 0,4); echo "Rp.".number_format($d['harga'])."..."; 	 }
								}
								else{
								
									if($d['diskon']!=0){$d['harga']=($d['harga']-($d['harga']/100*$d['diskon']));	$d['harga']=substr($d['harga'], 0,7); echo "Rp.".number_format($d['harga']);}else{ 	$d['harga']=substr($d['harga'], 0,7); echo "Rp.".number_format($d['harga']);}
									}
								
							?></div>
						</li>
					</ul>
				</div>
					
			</span>
			<?php 
				$c=mysql_query("select * from su_produk where id_kategori=$b[id_kategori] order by tgl desc limit 1,5" );
				while ($d=mysql_fetch_array($c)) {
					?>
				<div class="prod-baru" style="background:url(<?php echo $d['gambar']?>);background-size: cover;">
				<div class="cont-bonus" >
					
					
					<div class="cat"><?php echo $b["kategori"]; ?></div>
					<?php 
						$e=mysql_query("select * from su_status_produk where id_status=$d[status_produk]");
						$f=mysql_fetch_array($e);
						if(($f["status"]!="normal") && ($f["status"]!="Promo")){echo "<div class='stat'>$f[status]</div>";}
						else if($f["status"]=="Promo"){echo "<div class='sale'>$f[status]</div>";} ?>
					
					
					
				</div>
				<div class="divider">
					<a href="main_page.php?page=det&id=<?php echo $d['id_produk'] ?>">
					<div class="lanjut fa fa-eye">
				
					
					</div>
					<div class="judul"><?php echo $d['nama']?></div>
					<p ><?php $d['deskripsi']=substr($d['deskripsi'],0,50);echo $d['deskripsi']; ?> Selengkapnya..</p>
					</a>
				</div>
				<div class="buy" >
					<ul>
						<a href="_func/query.php?a=a&id=<?php echo $d['id_produk'] ?>">
						<li class="cart fa fa-shopping-cart" >
							
							<div class="add">add to cart</div>
						</li>
						</a>
						<a href="_func/query.php?a=b&id=<?php echo $d['id_produk'] ?>">
						<li class="wish fa fa-heart">
							
							
						</li>
					</a>
						<li class="price fa fa-tags">
							<div style="color:#000;font-size:10px; float:right;">
							<?php 

								$dd=strlen($d['harga']);
								if($dd>7){
									
									if($d['diskon']!=0){$d['harga']=($d['harga']-($d['harga']/100*$d['diskon']));$d['harga']=substr($d['harga'], 0,4); echo "Rp.".number_format($d['harga'])."..."; }else{ $d['harga']=substr($d['harga'], 0,4); echo "Rp.".number_format($d['harga'])."..."; 	 }
								}
								else{
								
									if($d['diskon']!=0){$d['harga']=($d['harga']-($d['harga']/100*$d['diskon']));	$d['harga']=substr($d['harga'], 0,7); echo "Rp.".number_format($d['harga']);}else{ 	$d['harga']=substr($d['harga'], 0,7); echo "Rp.".number_format($d['harga']);}
									}
								
							?>
						</div>
						</li>
					</ul>
				</div>
			</div>
					<?php
				}
			?>
			
			
			
			
			
			
		</div>
		<?php	
				}
		?>
		</div>
	</body>
</html>