<?php 
include '../header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Barang</h3>
<a class="btn" href="../kategori.php?a=a" ?><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$id=mysql_real_escape_string($_GET['id']);


	switch ($_GET['a']) {
		case 'kategori':
				$det=mysql_query("select * from su_kategori where id='$id'")or die(mysql_error());
				while($d=mysql_fetch_array($det)){
				?>
				<table class="table">
				<tr>
					<td>Nama</td>
					<td><?php echo $d['nama'] ?></td>
				</tr>
				<tr>
					<td>Jenis</td>
					<td><?php echo $d['jenis'] ?></td>
				</tr>
				<tr>
					<td>Suplier</td>
					<td><?php echo $d['suplier'] ?></td>
				</tr>
				<tr>
					<td>Modal</td>
					<td>Rp.<?php echo number_format($d['modal']); ?>,-</td>
				</tr>
				<tr>
					<td>Harga</td>
					<td>Rp.<?php echo number_format($d['harga']) ?>,-</td>
				</tr>
				<tr>
					<td>Jumlah</td>
					<td><?php echo $d['jumlah'] ?></td>
				</tr>
				<tr>
					<td>Sisa</td>
					<td><?php echo $d['sisa'] ?></td>
				</tr>
			</table>
	<?php 
		}	
		break;
		
	
?>

<?php include '../footer.php'; ?>