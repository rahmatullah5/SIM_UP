<html>
<head>
	
</head>
<body>
	<div id"bungkus">
		<div id="cont-keranjang">
		<div class="info-header">
			My Cart
		</div>
		<div class="info-produk">
		<table border="1">
				<tr>
					<td colspan="2"></td>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Total</th>
				</tr>
				<?php $a=mysql_query("select * from su_cart_ref where id_cart='$_SESSION[id]' group by id_produk"); 
					while ($b=mysql_fetch_array($a)) {
					$q2=mysql_query("select * from su_produk where id_produk=$b[id_produk]");
					$qq2=mysql_fetch_array($q2); ?>
					<tr>
						<td><a href="_func/query.php?a=k2&id=<?php echo "$qq2[id_produk]" ?>"><span>X<span></a></td>
						<td><img src="<?php echo "$qq2[gambar]"; ?>"></td>
						<td><?php echo "$qq2[nama]" ?></td>
						<td><?php $c=mysql_query("select count(id_produk) as jml from su_cart_ref where id_produk=$qq2[id_produk] and id_cart='$id'");$d=mysql_fetch_array($c); ;if($qq2['diskon']!=0){$qq2['harga']=($qq2['harga']-($qq2['harga']/100*$qq2['diskon']));echo "RP.".number_format($qq2['harga']).",";}else{ echo "RP.".number_format($qq2['harga']).","; }?></td>
						<td><?php echo "$d[jml]"?></td>
						<td><?php $e=$d['jml']*$qq2['harga']; echo "Rp.".number_format($e).","?></td>
					
					 </tr>
					<?php
					$subtotal+=$qq2['harga']*$d['jml'];
					
				
					
				}?>
				<tr>
					<td colspan="4"></td>
					<td colspan="2"><a href="_func/query.php?a=k1"><div class="a">Perbaharui Keranjang</div></a></td>
				</tr>
			</table>
		</div>
		<div class="info-total">
			
			<h2>Total</h2>
			<table>
				<tr><td><b>Subtotal</b></td><td><?php echo "RP.".number_format($subtotal).",";?></td></tr>
				<tr><td><b>Total</b></td><td><b><?php echo "RP.".number_format($subtotal).",";?></b></td></tr>
			</table>
			<a href="main_page.php?page=checkout">
			<div class="b">
				Lanjutkan ke Checkout
			</div>
		</a>
		
		</div>
	</div>
	</div>
</body>
</html>