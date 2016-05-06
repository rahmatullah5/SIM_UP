<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		 <script type="text/javascript" src="js/main.js"></script>
		<script src="js/classie.js"></script>
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
		<script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Economica:700,400italic' rel='stylesheet' type='text/css'>
			<link rel="stylesheet" type="text/css" href="css/css/font-awesome.css" />
			<link rel="stylesheet" type="text/css" href="css/css/font-awesome.min.css" />
		<noscript>
			<link rel="stylesheet" type="text/css" href="css/nojs.css" />

		</noscript>
		<title>Unit Produksi Sekolah | SMK NEGERI 1 CIMAHI</title>
	</head>
	<body>
		<div id="cont-header">
				<div class="nav-atas">
					<ul>
					<li>Situs Unit Produksi SMKN 1 Cimahi</li>
					<a href="main_page.php?page=login"><li class="link right">Masuk</li></a>
					<li class="right">|</li>
					<a href="main_page.php?page=reg"><li class="link right">Daftar</li></a>
					</ul>
				</div>
				<div class="nav-tengah">
					<img src="images/l1.png"/>
							<ul class="nav">
						<li><a href="main_page.php?page=home">Beranda</a></li>
						<li><a href="main_page.php?page=lain&p=promo">Promo</a></li>
		<li>
			<a href="#">Kategori</a>
			<div>
				<div class="nav-column">
					<h3>Kategori Populer</h3>
					<ul>
						<?php $y1=mysql_query("SELECT b.id_kategori,COUNT(a.id_kategori) AS jml,b.kategori FROM su_kategori b , su_produk a WHERE a.id_kategori=b.id_kategori GROUP BY b.id_kategori ORDER BY jml DESC limit 0,5"); while ($z1=mysql_fetch_array($y1)) {
							?>
							<li><a href="main_page.php?page=lain&kat=<?php echo $z1["id_kategori"]?>"><?php echo "$z1[kategori]";?></a></li>
							<?php
						}?>
						
					</ul>
				</div>

				<div class="nav-column">
					<h3>Kategori Terbaru</h3>
					<ul>
						<?php $y1=mysql_query("SELECT b.id_kategori,b.kategori FROM su_kategori b , su_produk a WHERE a.id_kategori=b.id_kategori GROUP BY b.id_kategori ORDER BY b.id_kategori asc limit 0,5"); while ($z1=mysql_fetch_array($y1)) {
							?>
							<li><a href="main_page.php?page=lain&p=galery&kat=<?php echo $z1["id_kategori"]?>"><?php echo "$z1[kategori]";?></a></li>
							<?php
						}?>
					</ul>

					
				</div>

				<div class="nav-column">
					<h3>Kategori Produk</h3>
					<ul>
						<?php $y1=mysql_query("SELECT b.id_kategori,b.kategori FROM su_kategori b , su_produk a WHERE a.id_kategori=b.id_kategori GROUP BY b.id_kategori ORDER BY b.kategori asc limit 0,10"); while ($z1=mysql_fetch_array($y1)) {
							?>
							<li><a href="main_page.php?page=lain&p=galery&kat=<?php echo $z1["id_kategori"]?>"><?php echo "$z1[kategori]";?></a></li>
							<?php
						}?>
					</ul>
				</div>

				<div class="nav-column">
					<h3 class="orange">Rekomendasi Kategori</h3>
					<ul>
						<?php $y1=mysql_query("SELECT b.id_kategori,b.kategori FROM su_kategori b , su_produk a WHERE a.id_kategori=b.id_kategori GROUP BY b.id_kategori ORDER BY b.kategori asc limit 0,10"); while ($z1=mysql_fetch_array($y1)) {
							?>
							<li><a href="main_page.php?page=lain&p=galery&kat=<?php echo $z1["id_kategori"]?>"><?php echo "$z1[kategori]";?></a></li>
							<?php
						}?>
					</ul>

					
				</div>
			</div>
		</li>
		<!--<li><a href="main_page.php?page=tentang">Tentang</a></li>!-->
		<li>
			<a href="main_page.php?page=cek">Konfirmasi</a>
			
			<!-- <a href="main_page.php?page=bantuan">Bantuan</a> !-->
			
		</li>
		
		
		<li class="nav-search">
			<div>
				<div class="nav-column-search">

					<h3 class="orange">Cari Barang </h3>
					<ul>
						
						<li><form action="main_page.php?page=lain&p=cari" method="post"><input type="text" name="cari"></li>
						<li><input type="submit" ></form></li>

					</ul>
				</div>

			</div>
			
				
				<input type="submit" value="">
			</form>
		</li>
		
	</ul>
		<div class="cart"><div class="cont"><div class="notif"><?php $id=$_SESSION["id"];$a=mysql_query("select *,sum(harga) as harga,sum(banyak_produk) as banyak from su_cart_ref where id_cart='$id'");$b=mysql_fetch_array($a);  if($b["banyak"]>0){echo "$b[banyak]";}else{echo "0";}?></div><img src="images/asset/cart.png"></div>
			<div class="cont-cart">
				<?php $subtotal=0;$q1=mysql_query("select * from su_cart_ref where id_cart='$id' group by id_produk"); 
				while ($qq=mysql_fetch_array($q1)){
					$q2=mysql_query("select * from su_produk where id_produk=$qq[id_produk]");
					$qq2=mysql_fetch_array($q2); ?>
					<a href="_func/query.php?a=k2&id=<?php echo "$qq2[id_produk]" ;?>"><div class="delete">X</div></a></a>
					<div class="nama"><?php echo "$qq2[nama]" ?></div>
					<div class="harga"><?php $c=mysql_query("select sum(banyak_produk) as jml from su_cart_ref where id_produk=$qq2[id_produk] and id_cart='$id'");$d=mysql_fetch_array($c); echo "$d[jml] X ";if($qq2['diskon']!=0){$qq2['harga']=($qq2['harga']-($qq2['harga']/100*$qq2['diskon']));echo "Rp.".number_format($qq2['harga']);}else{ echo "Rp.".number_format($qq2['harga']); }?></div>
					 
					<?php
					$subtotal+=$qq2['harga']*$d['jml'];
				}?>
					<div class="nama"><b>Subtotal : </b><?php echo "Rp.".number_format($subtotal); ?></div>
					<div class="cont-proses">
						<a href="main_page.php?page=checkout"><div class="a">Checkout</div></a>
						<a href="main_page.php?page=keranjang"><div class="b">Keranjang</div></a>
					</div>
			</div>
		</div>
		<div class="wish"><div class="cont"><div class="notif"><?php $a=mysql_query("select *,sum(harga) as harga,sum(banyak) as banyak from su_wish_ref where id_wish='$id' group by id_wish");$b=mysql_fetch_array($a); if($b["banyak"]>0){echo "$b[banyak]";}else{echo "0";}?></div><img src="images/asset/wish.png"></div>
		<div class="cont-wish">
				<?php $subtotal=0; $q1=mysql_query("select * from su_wish_ref where id_wish='$id' group by id_produk"); 
				while ($qq=mysql_fetch_array($q1)){
					$q2=mysql_query("select * from su_produk where id_produk=$qq[id_produk]");
					$qq2=mysql_fetch_array($q2); ?>
					<a href="_func/query.php?a=k3&id=<?php echo "$qq2[id_produk]"; ?>"><div class="delete">X</div></a></a>
					<div class="nama"><?php echo "$qq2[nama]"; ?></div>
					<div class="harga"><?php $c=mysql_query("select count(id_produk) as jml from su_wish_ref where id_produk=$qq2[id_produk] and id_wish='$id'"); $d=mysql_fetch_array($c); echo "$d[jml] X "; if($qq2['diskon']!=0){$qq2['harga']=($qq2['harga']-($qq2['harga']/100*$qq2['diskon']));echo "Rp.".number_format($qq2['harga']);}else{ echo "Rp.".number_format($qq2['harga']); } ?></div>
					<?php
					$subtotal+=$qq2['harga']*$d['jml'];
				} ?>
					<div class="nama"><b>Subtotal : </b><?php echo "Rp.".number_format($subtotal); ?></div>
					<div class="cont-proses">
						<a href="main_page.php?page=wishlist"><div class="b">Wish List</div></a>
					</div>
			</div>
		</div>
		<clear></clear>
		
		
			
					
				</div>
				<div class="nav-bawah">
					
				</div>
		</div>
		<script>
    function init() {
        window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 100	,
                header = document.querySelector(".nav-tengah");
                
            if (distanceY >= shrinkOn) {
                //classie.add(header,"sticky");
                
            } else {
                if (classie.has(header,"sticky")) {
                    //classie.remove(header,"sticky");
                   
                }
            }
        });
    }
    window.onload = init();
	</script>

	</body>
