<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Pesanan Produk</h3>

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
		
	}
}
?>
<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from su_pesanan");
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
	<!--<a style="margin-bottom:10px" href="lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>!-->
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
		<th class="col-md-2">ID Pesanan</th>
		
		<th class="col-md-2">Nama Pemesan</th>
		<th class="col-md-2">Email</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-2">Telp</th>
		<th class="col-md-4">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from su_order where nama like '%$cari%' ");
	}else{
		$brg=mysql_query("select * from su_order limit $start, $per_hal ");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $b['id_order'] ?></td>
			
			<td><?php echo "$b[nama]"  ?></td>
			<td><?php echo "$b[email]"  ?></td>
			<td><?php echo "$b[telp]"  ?></td>
			
			<td>
				<a href="det.php?a=order&id=<?php echo $b['id_order']; ?>" class="btn btn-info">Detail</a>
				
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='_func/query.php?c=order&id=<?php echo $b['id_order']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
	<tr>
		<td colspan="4">Total Pesanan Masuk</td>
		<td>			
		
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