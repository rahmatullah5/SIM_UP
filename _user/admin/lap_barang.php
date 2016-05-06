<?php
include 'config.php';
include 'anti.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../logo/l.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Unit Produksi SMKN 1 Cimahi',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon :  (022) 6629683',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl. Mahar Martanegara No.48, Utama, Cimahi Sel., Kota Cimahi, Jawa Barat',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : http://www.smkn1-cmi.sch.id/ email : smkn1@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Barang",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jenis', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Suplier', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Harga', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Tanggal Masuk', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'jumlah', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysql_query("select * from su_produk where id_user=$_SESSION[id_login] order by tgl");
while($lihat=mysql_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['nama'],1, 0, 'C');
	$a=mysql_query("select * from su_kategori where id_kategori=$lihat[id_kategori]");
	$b=mysql_fetch_array($a);
	$pdf->Cell(3, 0.8, $b['kategori'], 1, 0,'C');
	$a=mysql_query("select * from su_user where id_user=$lihat[id_user]");
	$c=mysql_fetch_array($a);
	$pdf->Cell(4, 0.8, "$c[nama_d] $c[nama_b]",1, 0, 'C');
	$pdf->Cell(4.5, 0.8, "Rp.".number_format($lihat['harga']), 1, 0,'C');
	$pdf->Cell(4.5, 0.8, ttl($lihat['tgl']),1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['stok'], 1, 1,'C');

	$no++;
}

$pdf->Output("laporan_buku.pdf","I");

?>

