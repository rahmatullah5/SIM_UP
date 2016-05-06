<?php

include 'config.php';
require('../assets/pdf/fpdf.php');
$total=0;
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
$pdf->Cell(0,0.7,'Laporan Data Penjualan Barang',0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->Cell(6,0.7,"Laporan Penjualan Barang",0,0,'C');
$pdf->ln(1);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jumlah', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'harga', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Total harga', 1, 1, 'C');

$pdf->SetFont('Arial','',10);
$no=1;

$query=mysql_query("select * from su_cart_ref");
while($lihat=mysql_fetch_array($query)){
	$a=mysql_query("select * from su_produk where id_produk=$lihat[id_produk] ");
	$a1=mysql_fetch_array($a);
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(6, 0.8, $a1['nama'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['banyak_produk'], 1, 0,'C');
	$pdf->Cell(4, 0.8, "Rp. ".number_format($a1['harga'])." ,-", 1, 0,'C');
	$pdf->Cell(4.5, 0.8, "Rp. ".number_format($a1['harga']*$lihat['banyak_produk'])." ,-",1, 1, 'C');
	$total+=$a1['harga']*$lihat['banyak_produk'];
	
	$no++;
}
//$q=mysql_query("select sum(total_harga) as total from barang_laku where tanggal=".$tanggal);
// select sum(total_harga) as total from barang_laku where tanggal='$tanggal'

	$pdf->Cell(14, 0.8, "Total Pendapatan", 1, 0,'C');		
	$pdf->Cell(4.5, 0.8, "Rp. ".number_format($total)." ,-", 1, 0,'C');	


$pdf->Output("laporan_buku.pdf","I");

?>

