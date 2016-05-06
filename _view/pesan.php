<html>
<head>
	<title></title>
</head>
<body>
	<div id="bungkus"> 
		<?php 
			$id=$_GET['id'];

						$q1=mysql_query("select * from su_user where id_user=$id");
						$b=mysql_fetch_array($q1);
						;
						?>
		<div id="cont-register">
			<h3>Pesan Produk</h3><hr><br>
			<h4>Pesan Produk Baru</h4>
			<div class="memo"><h5>Pemesanan Produk Baru Pada Siswa</h5>
				<p>
					Bagian ini untuk membuat Pesanan Khusus kepada <?php echo "$b[nama_d] $b[nama_b]"?>.
				
					 
				<br><br>
					Pastikan Kamu memasukkan data project atau produk dengan lengkap dan bener agar siswa dapat membuat produk tersebut dengan cepat dan baik
				</p>
			</div>
			<form method="post" action="_func/query.php?a=o1">
				<table>
					<tr>
						<td><labeL>Nama<span>*</span></labeL></td>
					</tr>
					<tr>
						<td><input required="required"type="text" name="nama">
							<input required="required"type="hidden" value="<?php echo "$b[id_user] ";?>"name="id"></td>
					</tr>
					<tr>
						<td><labeL>Telp<span>*</span></labeL></td>
					</tr>
					<tr>
						<td><input required="required" name="telp" type="text"></td>
					</tr>
					<tr>
						<td><labeL>Email</labeL></td>
					</tr>
					<tr>
						<td><input required="required" name="email" type="email"></td>
					</tr>
					<tr>
						<td><labeL>Deskripsi Produk<span>*</span></labeL></td>
					</tr>
					<tr>
						<td><textarea required="required" name="desk" ></textarea></td>
					</tr>
					
					<tr>
						<td><input type="submit" name="nm" type="text"></td>
					</tr>
				</table>
				
				
				
			</form>

		</div>
	</div>
</body>
</html>