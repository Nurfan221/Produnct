<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string
$pdf->Cell(190, 7, 'PRODUNCH', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'DAFTAR PAKET YANG DI AMBIL', 0, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(40, 6, 'NAMA', 1, 0);
$pdf->Cell(40, 6, 'EMAIL', 1, 0);
$pdf->Cell(25, 6, 'NO HP', 1, 0);
$pdf->Cell(30, 6, 'NAMA PAKET', 1, 0);
$pdf->Cell(30, 6, 'HARGA PAKET', 1, 0);
$pdf->Cell(50, 6, 'TANGGAL PEMBELIAN', 1, 1);
$pdf->SetFont('Arial', '', 10);
include 'koneksi.php';
$cetak = mysqli_query($conn, "select * from pembelian");
while ($row = mysqli_fetch_array($cetak)) {
    $pdf->Cell(40, 6, $row['Nama_User'], 1, 0);
    $pdf->Cell(40, 6, $row['email'], 1, 0);
    $pdf->Cell(25, 6, $row['no_hp'], 1, 0);
    $pdf->Cell(30, 6, $row['nama_barang'], 1, 0);
    $pdf->Cell(30, 6, $row['harga_barang'], 1, 0);
    $pdf->Cell(50, 6, $row['tgl_pembelian'], 1, 1);
}
$pdf->Output();
