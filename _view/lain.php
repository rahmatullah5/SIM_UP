<?php 
	switch ($_GET['p']) {
		case 'cari':
		$cari=$_POST["cari"]
		?>
			<html>
				<head>
					
				</head>
				<body>
					<div id="bungkus">
						<?php 
						
						
					
				?>
			<div id="cont-prod-baru" style="padding:0 5% 5% 5%;width:90%;min-height:100%;">
			<div class="populer-header">
				Cari Barang : <b> <?php echo $cari; ?><br>
				
				
				
			</div>
			
			
			
		</a>
			<hr style="width:90%;"/>
			<?php 
				$c=mysql_query("select * from su_produk where nama like '%$cari%'" );
				while($d=mysql_fetch_array($c)){
						$a=mysql_query("SELECT * from su_kategori where id_kategori=$d[id_kategori] ");
						$b=mysql_fetch_array($a);
			?>
			<span class="first" style="height:320px;background:url(<?php echo $d['gambar']?>);background-size: cover;">	
				
				<div class="cont-bonus" >
					
					
					<div class="cat"> <?php echo $b["kategori"]; ?></div>
					<?php 
						$e=mysql_query("select * from su_status_produk where id_status=$d[status_produk]");
						$f=mysql_fetch_array($e);
						if(($f["status"]!="normal") && ($f["status"]!="promo")){echo "<div class='stat'>$f[status]</div>";}
						else if($f["status"]=="promo"){echo "<div class='sale'>$f[status]</div>";} ?>
					
					
				</div>
				<div class="divider">
					<a href="main_page.php?page=det&id=<?php echo $d['id_produk'] ?>"><div class="lanjut fa fa-eye">
					
					
					</div>
					<div class="judul"><?php echo $d['nama']?></div>
					<p ><?php $d['deskripsi']=substr($d['deskripsi'],0,150);echo $d['deskripsi']; ?> Selengkapnya..</p>
				</a></div>
				<div class="buy" >
					<ul>
						<a href="_func/query.php?a=a&id=<?php echo $d['id_produk'] ?>"><li class="cart fa fa-shopping-cart" >
							
							<div class="add">add to cart</div>
						</li></a>
						<a href="_func/query.php?a=b&id=<?php echo $d['id_produk'] ?>"><li class="wish fa fa-heart">
							
							
						</li></a>
							<li style="width:38%;"class="price fa fa-tags">
							<div style="color:#000;font-size:13px; float:right;">
							<?php 
								$dd=strlen($d['harga']);
								if($dd>7){
									$d['harga']=substr($d['harga'], 0,4); echo "Rp.".number_format($d['harga'])."..."; 	
								}
								else{
									$d['harga']=substr($d['harga'], 0,7); echo "Rp.".number_format($d['harga']);
									}
								
							?></div>
						</li>
					</ul>
				</div>
					
			</span>
				<?php } ?>
					</div>
					
				</body>
				</html>
			<?php
				
			break;
			case 'galery':
			?>
				<html>
				<head>
					
				</head>
				<body>
					<div id="bungkus">
						<?php 
						$kat=$_GET["kat"];
						$a=mysql_query("SELECT * from su_kategori where id_kategori=$kat ");
						while ($b=mysql_fetch_array($a)) {
					
				?>
		<div id="cont-prod-baru" style="padding:0 5% 5% 5%;width:90%;min-height:100%;">
			<div class="populer-header">
				Kategori : <?php echo $b["kategori"]; ?><br>
				<div class="desk"><?php echo $b["deskripsi"]; ?></div>
				
				
			</div>
			
			
			
		</a>
			<hr style="width:90%;"/>
			<?php 
				$c=mysql_query("select * from su_produk where id_kategori=$b[id_kategori]" );
				while($d=mysql_fetch_array($c)){
			?>
			<span class="first" style="height:320px;background:url(<?php echo $d['gambar']?>);background-size: cover;">	
				
				<div class="cont-bonus" >
					
					
					<div class="cat"> <?php echo $b["kategori"]; ?></div>
					<?php 
						$e=mysql_query("select * from su_status_produk where id_status=$d[status_produk]");
						$f=mysql_fetch_array($e);
						if(($f["status"]!="normal") && ($f["status"]!="promo")){echo "<div class='stat'>$f[status]</div>";}
						else if($f["status"]=="promo"){echo "<div class='sale'>$f[status]</div>";} ?>
					
					
				</div>
				<div class="divider">
					<a href="main_page.php?page=det&id=<?php echo $d['id_produk'] ?>"><div class="lanjut fa fa-eye">
					
					
					</div>
					<div class="judul"><?php echo $d['nama']?></div>
					<p ><?php $d['deskripsi']=substr($d['deskripsi'],0,150);echo $d['deskripsi']; ?> Selengkapnya..</p>
				</a></div>
				<div class="buy" >
					<ul>
						<a href="_func/query.php?a=a&id=<?php echo $d['id_produk'] ?>"><li class="cart fa fa-shopping-cart" >
							
							<div class="add">add to cart</div>
						</li></a>
						<a href="_func/query.php?a=b&id=<?php echo $d['id_produk'] ?>"><li class="wish fa fa-heart">
							
							
						</li></a>
							<li style="width:38%;"class="price fa fa-tags">
							<div style="color:#000;font-size:13px; float:right;">
							<?php 
								$dd=strlen($d['harga']);
								if($dd>7){
									$d['harga']=substr($d['harga'], 0,4); echo "Rp.".number_format($d['harga'])."..."; 	
								}
								else{
									$d['harga']=substr($d['harga'], 0,7); echo "Rp.".number_format($d['harga']);
									}
								
							?></div>
						</li>
					</ul>
				</div>
					
			</span>
				<?php } ?>
					</div>
					<?php } ?>
				</body>
				</html>
			<?php
			break;	
			case 'promo':

		?>
			<html>
				<head>
					
				</head>
				<body>
					<div id="bungkus">
						<?php 
						
						
					
				?>
			<div id="cont-prod-baru" style="padding:0 5% 5% 5%;width:90%;min-height:100%;">
			<div class="populer-header">
				Promo Barang: <br>
				
				
				
			</div>
			
			
			
		</a>
			<hr style="width:90%;"/>
			<?php 
				$c=mysql_query("select * from su_produk where status_produk=4" );
				while($d=mysql_fetch_array($c)){
						$a=mysql_query("SELECT * from su_kategori where id_kategori=$d[id_kategori] ");
						$b=mysql_fetch_array($a);
			?>
			<span class="first" style="height:320px;background:url(<?php echo $d['gambar']?>);background-size: cover;">	
				
				<div class="cont-bonus" >
					
					
					<div class="cat"> <?php echo $b["kategori"]; ?></div>
					<?php 
						$e=mysql_query("select * from su_status_produk where id_status=$d[status_produk]");
						$f=mysql_fetch_array($e);
						if(($f["status"]!="normal") && ($f["status"]!="promo")){echo "<div class='stat'>$f[status]</div>";}
						else if($f["status"]=="promo"){echo "<div class='sale'>$f[status]</div>";} ?>
					
					
				</div>
				<div class="divider">
					<a href="main_page.php?page=det&id=<?php echo $d['id_produk'] ?>"><div class="lanjut fa fa-eye">
					
					
					</div>
					<div class="judul"><?php echo $d['nama']?></div>
					<p ><?php $d['deskripsi']=substr($d['deskripsi'],0,150);echo $d['deskripsi']; ?> Selengkapnya..</p>
				</a></div>
				<div class="buy" >
					<ul>
						<a href="_func/query.php?a=a&id=<?php echo $d['id_produk'] ?>"><li class="cart fa fa-shopping-cart" >
							
							<div class="add">add to cart</div>
						</li></a>
						<a href="_func/query.php?a=b&id=<?php echo $d['id_produk'] ?>"><li class="wish fa fa-heart">
							
							
						</li></a>
							<li style="width:38%;"class="price fa fa-tags">
							<div style="color:#000;font-size:13px; float:right;">
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
				<?php } ?>
					</div>
					
				</body>
				</html>
			<?php
			break;
			break;
			default:
			# code...
			break;
}
?>