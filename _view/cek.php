<html>
<head>
	
</head>
<body>
	<div id="bungkus">
		<div class="info-header">Konfirmasi Transfer</div>
		<div id="cont-pesan">
				<div class="info-header" style="">Data Pesanan</div>
				<p>Note : Konfirmasi pembayaran akan diproses sebelum pukul <b>21:00</b>. Apabila pembayaran dan konfirmasi transfer dilakukan setelah jam tersebut,maka pembayaran akan kami proses keesokan harinya mulai pukul <b>09:00</b></p>
				<form action="_func/query.php?a=c2" method="post"  enctype='multipart/form-data'>
				<table>
					<tr>
						<th>Nomor Pesanan<span>*</span></th>
					</tr>
					<tr>
						<td><input type="text"  onkeypress="return isNumberKey(event)"name="no"></td>
					</tr>
					<tr>
						<th>Email Pemesan<span>*</span></th>
					</tr>
					<tr>
						<td><input type="email" name="email"></td>
					</tr>
					<tr>
						<th>jumlah transfer<span>*</span></th>
					</tr>
					<tr>
						<td><input type="text" onkeypress="return isNumberKey(event)" name="jumlah"></td>
					</tr>
					
					<tr>
						<th>transfer ke<span>*</span></th>
					</tr>
					<tr>
						<td>
							<input type="radio" name="tujuan" value="BCA">BCA
							<input type="radio" name="tujuan" value="BNI">BNI
							<input type="radio" name="tujuan" value="Mandiri">Mandiri
							
						</td>
					</tr>
					<tr>
						<th>Transfer dari bank<span>*</span></th>
					</tr>
					<tr>
						<td><input type="text" name="ke"></td>
					</tr>
					<tr>
						<th>
							Nama pengirimim/pemilik rekening<span>*</span><br/>
							<label>apabila menggunakan rekning orang lain, isi dengan nama pemilik rekening</label>
						</th>
					</tr>
					<tr>
						<td><input type="text" name="nama"></td>
					</tr>
					<tr>
						<th>
							Transfer pada tanggal<span>*</span><br/>
							<label>mis. 2 Oktober 2015</label>
						</th>
					</tr>
					<tr>
						<td><input type="text" name="tgl"></td>
					</tr>
					<tr>
						<th>
							Bukti Pembayaran<span>*</span><br/>
							<label>struk transfer atau document bukti transfer lain(jpg,jpef,png) max 1MB</label>
						</th>
					</tr>
					<tr>
						<td><input type="file" name="gbr" id="gbr"></td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="a" value="Kirim Konfirmasi Pembayaran">
						</td>
					</tr>
				</table>
				</form>
		</div>
	</div>
</body>
</html>