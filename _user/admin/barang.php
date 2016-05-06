<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Barang</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Barang</button>
<br/>
<br/>

<?php 
$periksa=mysql_query("select * from su_produk where stok <=3");
while($q=mysql_fetch_array($periksa)){	
	if($q['stok']<=0){	
		?>	
		<script>
			$(document).ready(function(){
				$('#pesan_sedia').css("color","red");
				$('#pesan_sedia').append("<span style='text-align:left;' class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
		<?php
		echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama']."</a> yang tersisa sudah habis. silahkan pesan lagi !!</div>";	
	}
}
?>
<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from su_produk where id_user=$_SESSION[id_login]");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>		
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
	<a style="margin-bottom:10px" href="lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
<form action="cari_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">ID Produk</th>
		<th class="col-md-4">Nama Produk</th>
		<th class="col-md-3">Harga Jual</th>
		<th class="col-md-1">Jumlah</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from su_produk where id_user=$_SESSION[id_login] and nama like '%$cari%' ");
		
	}else{
		$brg=mysql_query("select * from su_produk where id_user=$_SESSION[id_login] limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $b['id_produk'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td>Rp.<?php echo number_format($b['harga']) ?>,-</td>
			<td><?php echo $b['stok'] ?></td>
			<td>
				<a href="det.php?a=barang&id=<?php echo $b['id_produk']; ?>" class="btn btn-info">Detail</a>
				<a href="edit.php?a=produk&id=<?php echo $b['id_produk']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='_func/query.php?c=produk&id=<?php echo $b['id_produk']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
	<tr>
		<td colspan="4">Total Modal</td>
		<td>			
		<?php 
			$xxx=0;
			$x=mysql_query("select sum(harga)*sum(stok) as total from su_produk where id_user=$_SESSION[id_login] group by id_produk");	
			while($xx=mysql_fetch_array($x)){
				$xxx+=$xx['total'];
			}
			echo "<b> Rp.". number_format($xxx).",-</b>";		
		?>
		</td>
	</tr>
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Barang Baru</h4>
			</div>
			<div class="modal-body">
				<form action="_func/query.php?a=barang" method="post"  enctype='multipart/form-data'>

					<div class="form-group">
						<label>Nama Produk</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Barang ..">
						<input name="id" type="hidden" value="<?php echo session_id() ?>"class="form-control" placeholder="Nama Barang ..">
					</div>
					<div class="form-group">
						<label>Deksripsi Produk</label>
						<textarea name="desk" class="form-control" placeholder="Deskripsikan Produk .."></textarea>
					</div>
					<div class="form-group">
						<label>Jenis Produk</label>
						
						<select name="jenis" class="form-control" >
							<?php 
							$a=mysql_query("select * from su_kategori order by kategori");
							while ($b=mysql_fetch_array($a)) {
								echo "<option value=$b[id_kategori]>$b[kategori]</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Status Produk</label>
						
						<select name="status" class="form-control" >
							<?php 
							$a=mysql_query("select * from su_status_produk");
							while ($b=mysql_fetch_array($a)) {
								echo "<option value=$b[id_status]>$b[status]</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Harga Produk (RP)</label>
						<input name="harga" min="0" type="number" class="form-control" placeholder="Harga Produk ..">
					</div>
					<div class="form-group">
						<label>Diskon Produk (%)</label>
						<input name="diskon" min="0" type="number" class="form-control" placeholder="Diskon Produk">
					</div>	
					<div class="form-group">
						<label>Jumlah Produk</label>
						<input name="stok" min="0" type="number" class="form-control" placeholder="Jumlah Stok Produk">
					</div>																	
					<div class="form-group">
						<label>Gambar Kategori</label>
						<input name="gbr" type="file" id="gbr" class="form-control" placeholder="Suplier ..">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>



<?php 
include 'footer.php';

?>