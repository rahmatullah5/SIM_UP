<?php 
//header("location:_func/session_2.php");
		//$a=mysql_query("select * from su_cart_ref");
		//$b=mysql_fetch_array($a);
		//if($b['id_cart']==$_SESSION['id']){
			//$old=$_SESSION['id'];
			//echo "$b[id_cart] <br> $_SESSION[id]";
			//echo "<script>
	       // window.location=('_func/session_2.php')</script>";
		//}

		//echo "<script>window.alert('Terima Kasih Pesanan Anda Sedang Kami Proses,Klik OK untuk Kembali Ke Beranda');
	    //    window.location=('_func/session_2.php')</script>";
	$a=mysql_query("select *,sum(banyak_produk) as jml from su_cart_ref where id_cart='$_SESSION[id]' group by id_produk"); 
	  $b=mysql_fetch_array($a); 
	  if ($b['jml']>0) {
	  	?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="bungkus">
		<div id="cont-checkout">
			<div class="info-header">Pesanan Diterima</div>
			<?php 
			$id=$_SESSION["id"];
			$a=mysql_query("select * from su_pesanan where id_cart='$_SESSION[id]' order by tgl limit 0,1");
			$b=mysql_fetch_array($a);
			?>
			<div class="detail-pesanan">
				<h4>Terima Kasih Pesanan Anda telah diterma</h4>
			<table>
				<tr>
					<td>Nomor Pesanan</td>
					<td>Tanggal</td>
					<td>Total</td>
					<td>Metode Pembayaran</td>
				</tr>
				<tr>
					<th><?php echo $b['id_pesanan']?></th>
					<th><?php echo ttl($b['tgl'])?></th>
					<?php $a=mysql_query("select * from su_cart_ref where id_cart='$_SESSION[id]' group by id_produk"); 
					while ($b=mysql_fetch_array($a)) {
					$q2=mysql_query("select * from su_produk where id_produk=$b[id_produk]");
					$qq2=mysql_fetch_array($q2); 
						$c=mysql_query("select sum(banyak_produk) as jml from su_cart_ref where id_produk=$qq2[id_produk] and id_cart='$id'");$d=mysql_fetch_array($c);
						if($qq2['diskon']!=0){$qq2['harga']=($qq2['harga']-($qq2['harga']/100*$qq2['diskon']));}
						$subtotal+=$qq2['harga']*$d['jml'];
						}?>
					<th><?php echo "RP.".number_format($subtotal).",";?></th>
					<th>Transfer Bank</th>
				</tr>
			</table>
			<hr/>
			<h3>Prodedur Pembayaran</h3>
			<ul>
				<li>Pembayaran via transfer bank. Silakan pilih salahsatu dari rekening transfer tujuan di bawah ini yang sesuai dengan rekening Kamu.</li>
				<li>Pada saat mentransfer, masukkan <b>Nomor Pesanan</b> pada referensi transfer apabila tersedia, untuk memudahkan kami saat pengecekan. </li>
				<li>Setelah transfer, lakukan konfirmasi transfer pada halaman Konfirmasi Transfer, untuk memberi tahu kami supaya mengecek apakah pembayaran sudah kami terima.</li>
				<li>Konfirmasi pembayaran akan diproses sebelum pukul <b>21:00</b>. Apabila pembayaran dan konfirmasi transfer dilakukan setelah jam tersebut, maka pembayaran akan kami proses keesokan harinya mulai pukul <b>09:00</b>.</li>
				<li>Setelah pembayaran kami terima, Kami akan langsung memproses pemesanan (mengirimkan produk kepada Kamu).</li>
			
			<hr/>
			<h3>No Rekening</h3>
			<div class="no-rek">
				<span>Muhammad Rahmatullah - BCA</span>
				<div class="a">Nomor Rekening :</div>
				<div class="b">1310107</div>
			</div>
			<hr/>
			<h3>Rincian Pesanan</h3>
			<table class="rinci">
				<tr>
					<th >Produk</th>
					<th >Jumlah</th>
					<th >Total</th>
				</tr>
				<?php 
				$subtotal=0;
				$a=mysql_query("select * from su_cart_ref where id_cart='$_SESSION[id]' group by id_produk"); 
					while ($b=mysql_fetch_array($a)) {
					$q2=mysql_query("select * from su_produk where id_produk=$b[id_produk]");
					$qq2=mysql_fetch_array($q2); ?>
					<tr>
						
						<td><?php echo "$qq2[nama]" ?></td>
						
						<td><?php $c=mysql_query("select sum(banyak_produk) as jml from su_cart_ref where id_produk=$qq2[id_produk] and id_cart='$id'");$d=mysql_fetch_array($c);echo "$d[jml]"?></td>
						<td><?php if($qq2['diskon']!=0){$qq2['harga']=($qq2['harga']-($qq2['harga']/100*$qq2['diskon']));echo "RP.".number_format($qq2['harga']).",";}else{ echo "RP.".number_format($qq2['harga']).","; }?></td>
					
					 </tr>
					<?php
					$subtotal+=$qq2['harga']*$d['jml'];
					
				
					
				}?>
				<tr>
					<th colspan="2">Subtotal</th>
					<th><?php echo "RP.".number_format($subtotal).",";?></th>
				</tr>
				<tr>
					<th colspan="2">Metode Pembayaran</th>
					<th>Transfer Bank</th>
				</tr>
				<tr>
					<th colspan="2">Total</th>
					<th><?php echo "RP.".number_format($subtotal).",";?></th>
				</tr>
			</table>
			<hr/>
			<h3>Rincian Pelanggan</h3>
			<table class="rinci">
				<tr>
					<?php 
					$a=mysql_query("select * from su_pesanan where id_cart='$_SESSION[id]' order by tgl desc limit 0,1 ");
					$b=mysql_fetch_array($a);
					?>
					<th>Email</th>
					<td><?php echo $b['email'];?></td>
					
				</tr>
				<tr>
					
					<th>Telepon</th>
					<td>0<?php echo $b['telp'];?></td>
				</tr>
			</table>
			<h4>Alamat Penagih</h4>
			<p style="margin-bottom:5%;">
				<?php echo "$b[nama_d] $b[nama_b]";?><br/>
				<?php echo "$b[alamat_1], $b[alamat_2]";?><br/>
				<?php echo "$b[kota]";?><br/>
				<?php echo "$b[provinsi]";?><br/>
				<?php echo "$b[zip]";?><br/>
			</p>
			<?php 
				$a=mysql_query("select *,sum(banyak_produk) as jml from su_cart_ref where id_cart='$_SESSION[id]' group by id_produk");
				while ($b=mysql_fetch_array($a)) {
					mysql_query("insert into su_cart (id_cart,id_produk,harga,banyak_produk) values ('$_SESSION[id]' , $b[id_produk] , $b[harga] , $b[jml])");
					$c=mysql_query("select * from su_produk where id_produk=$b[id_produk]");
					$d=mysql_fetch_array($c);
					$stok_baru=0;
					$stok_baru=$d["stok"]-$b['jml'];
					mysql_query("update su_produk set stok=$stok_baru where id_produk=$b[id_produk]");
					mysql_query("delete from su_cart_ref where id_produk=$b[id_produk] and id_cart='$_SESSION[id]'");
					

					
				}
				//header("location:_func/session_2.php");
			?>
		</div>
	</div>
	</div>
</body>
</html>
	<?php
	  }
	  else{
	  	?>

<html>
<head>
	<title></title>
</head>
<body>
	<div id="bungkus">
		<div id="cont-checkout">
			<div class="info-header">Silahkan Memilih Produk Dahulu</div>
			
	</div>
	</div>
</body>
</html>
	  	<?php
	  }
	  ?>
