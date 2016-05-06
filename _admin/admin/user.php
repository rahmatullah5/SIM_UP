<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data User</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Barang</button>
<br/>
<br/>

<?php 
$periksa=mysql_query("select * from su_produk where stok =0");
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
}}
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from su_user");
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
		<th class="col-md-2">ID Produk</th>
		<th class="col-md-2">Nis</th>
		<th class="col-md-3">Nama User</th>
		<th class="col-md-1">Status User</th>
		<th class="col-md-4">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from su_produk where nama like '%$cari%' ");
	}else{
		$brg=mysql_query("select * from su_user limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $b['id_user'] ?></td>
			<td><?php echo $b['nis']; ?></td>
			<td><?php echo "$b[nama_d] $b[nama_b]" ;?></td>
			<td><?php if($b['user_level']==1){echo "Aktif";}else{echo "Non-Aktif";}?></td>
			<td>
				<a href="det.php?a=user&id=<?php echo $b['id_user']; ?>" class="btn btn-info">Detail</a>
				<a href="edit.php?a=user&id=<?php echo $b['id_user']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='_func/query.php?c=user&id=<?php echo $b['id_user']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
	<tr>
		<td colspan="4">Total User Aktif</td>
		<td>			
		<?php 
			$xxx=0;
			$x=mysql_query("select count(id_user) as total from su_user where user_level=1");	
			while($xx=mysql_fetch_array($x)){
				$xxx+=$xx['total'];
			}
			echo "<b>$xxx</b>";		
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
				<form action="_func/query.php?a=u1" method="post"  enctype='multipart/form-data'>

					<div class="form-group">
						<label>NIS</label>
						<input name="nis" type="text" class="form-control" placeholder="NIS ..">
						
					</div>
					<div class="form-group">
						<label>Nama Depan</label>
						<input name="nd" type="text" class="form-control" placeholder="Nama Depan ..">
						
					</div>
					<div class="form-group">
						<label>Nama Belakang</label>
						<input name="nb" type="text" class="form-control" placeholder="Nama Belakang ..">
						
					</div>
					<div class="form-group">
						<label>Username</label>
						<input name="user" type="text" class="form-control" placeholder="Username ..">
						
					</div>
					<div class="form-group">
						<label>Password</label>
						<input name="pass" type="text" class="form-control" placeholder="Password ..">
						
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