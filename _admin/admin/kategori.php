<?php include 'header.php'; include 'config.php';?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Kategori Produk</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span >Tambah Data </button>
<br/>
<br/>
<?php 

switch ($_GET['a']) {
	case 'a':
		
		?>
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
		
	}
}
?>
<?php 
$per_hal=10;
$jumlah_record=mysql_query("SELECT COUNT(*) from su_kategori");
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
		<th class="col-md-2">ID Kategori</th>
		<th class="col-md-3">Nama Kategori</th>
		<th class="col-md-4">Deskripsi Kategori</th>
		
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-4" colspan="2">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from su_kategori where kategori like '%$cari%' ");
	}else{
		$brg=mysql_query("select * from su_kategori limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $b['id_kategori'] ?></td>
			<td><?php echo $b['kategori'] ?></td>
			<td><?php echo $b['deskripsi'] ?></td>
			
			<td colspan="2">
				<a href="det.php?a=kategori&id=<?php echo $b['id_kategori']; ?>"class="btn btn-info">Detail</a>
				<a href="edit.php?a=kategori&id=<?php echo $b['id_kategori']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='_func/query.php?c=kategori&id=<?php echo $b['id_kategori']; ?>' }" class="btn btn-danger">Hapus</a>

			</td>
		</tr>		
		<?php 
	}
	?>
	<tr>
		<td colspan="4">Total Kategori Tersimpan</td>
		<td>			
		<?php 
		
			$x=mysql_query("select count(*) as total from su_kategori");	
			$xx=mysql_fetch_array($x);			
			echo "<b> ". $xx['total'] . "</b>";		
			
		?>
		</td>
	</tr>
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?a=a&page=<?php echo $x ?>"><?php echo $x ?></a></li>
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
				<h4 class="modal-title">Tambah Kategori Baru</h4>
			</div>
			<div class="modal-body">
				<form action="_func/query.php?a=kategori" method="post"  enctype='multipart/form-data'>
					<div class="form-group">
						<label>Nama Kategori</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Kategori ..">
					</div>
					<div class="form-group">
						<label>Deskripsi Kategori</label>
						<textarea name="desk"  class="form-control"  placeholder="Deksripsikan Kategori.."> </textarea>
						
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
		<?php
		break;
	
		case 'b':

		break;
}
?>

