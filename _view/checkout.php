<html>
<head>
	
</head>
<body>
	<div id="bungkus">
		<div id="cont-checkout">
			<div class="info-header">Cek Pesanan</div>
			<div class="info-pribadi">
				<h3>Rincian Penagihan</h3>
				<form action="_func/query.php?a=c1" method="post">
				<table>
					<tr>
						<th>Nama Depan<span>*</span></th>
						<th>Nama Belakang</th>
					</tr>
					<tr>
						<td><input required="required" class="half"type="text" name="nama_d"></td>
						<td><input class="half"type="text" name="nama_b"><input class="half"type="hidden" name="id" value="<?php echo $_SESSION['id'];?>"></td>
					</tr>
					<tr>
						<th  colspan="2">Nama Instasi Terkait</th>
					</tr>
					<tr>
						<td colspan="2" ><input class="full"type="text" name="nama_p"></td>
					</tr>
					<tr>
						<th>Alamat Email<span>*</span></th>
						<th>No Telp<span>*</span></th>
					</tr>
					<tr>
						<td><input required="required" class="half" type="email" name="email"></td>
						<td><input required="required" class="half" type="text" onkeypress="return isNumberKey(event)"name="telp"></td>
					</tr>
					<tr>
						<th  colspan="2">Negara<span>*</span></th>
					</tr>
					<tr>
						<td colspan="2"><select required="required"  class="full" name="negara">
						  <option value="Indonesia">Indonesia</option>
						
						</select>
						</td>
					</tr>
					<tr>
						<th  colspan="2">Alamat<span>*</span></th>
					</tr>
					<tr>
						<td colspan="2" ><input required="required" class="full" type="text" name="alamat1"></td>
					</tr>
					<tr>
						<td colspan="2"><input required="required"  class="full"type="text" name="alamat2"></td>
					</tr>
					<tr>
						<th  colspan="2">Kota<span>*</span></th>
					</tr>
					<tr>
						<td colspan="2"><input required="required" class="full"type="text" name="kota"></td>
					</tr>
					<tr>
						<th>Provinsi<span>*</span></th>
						<th>Zip Code<span>*</span></th>
					</tr>
					<tr>
						
						<td><select name="provinsi"required="required" class="half">
						  <option value="Cibabat">Cibabat</option>
						
						</select></td>
						<td><input  name="zip"onkeypress="return isNumberKey(event)"required="required" class="half"type="text" name="a"></td>
					</tr>
				</table>
				<table>
					<tr>
						<th>
							Catatan Pesanan
						</th>
					</tr>
					<tr>
						<td>
							<textarea name="cat"cols="100%"class="full"></textarea>
						</td>
					</tr>
				</table>
				
				<hr/>
			</div>
				<div class="info-pesanan">
					<h3>Pesanan</h3>
					<table>
						<tr>
							<th>Produk</th>
							<th>Jumlah</th>
							<th>Total</th>
						</tr>
						<?php $subtotal=0;$a=mysql_query("select * from su_cart_ref where id_cart='$_SESSION[id]' group by id_produk"); 
					while ($b=mysql_fetch_array($a)) {
					$q2=mysql_query("select * from su_produk where id_produk=$b[id_produk]");
					$qq2=mysql_fetch_array($q2); ?>
					<tr>
						
						<td><?php echo "$qq2[nama]" ?></td>
						
						<td><?php echo "$d[jml]"?></td>
						<td><?php $c=mysql_query("select sum(banyak_produk) as jml from su_cart_ref where id_produk=$qq2[id_produk] and id_cart='$id'");$d=mysql_fetch_array($c); ;if($qq2['diskon']!=0){$qq2['harga']=($qq2['harga']-($qq2['harga']/100*$qq2['diskon']));echo "RP.".number_format($qq2['harga']).",";}else{ echo "RP.".number_format($qq2['harga']).","; }?></td>
					
					 </tr>
					<?php
					$subtotal+=$qq2['harga']*$d['jml'];
					
				
					
				}?>
						<tr>
							<th colspan="2">Subtotal</th>
							<th ><?php echo "RP.".number_format($subtotal).",";?></th>

						</tr>
						
					</table>
				</div>
				<div class="memo">
					<h3>Transfer bank</h3>
					<p>Pembayaran via transfer bank. Tersedian rekening BCA,Mandiri, BNK, BRI dan Muamalat</p>
					<input type="submit" class="a" value="buat pesanan">
					</form>
				</div>
		</div>
	</div>
</body>
</html>