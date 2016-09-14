<?php

require('mc_table.php');

require_once '../model/librari/konfigurasi.php';
require_once '../model/librari/librari.php';
require_once '../model/m_msd.php';
require_once '../model/m_jenis.php';

$pdo = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
$select = $_POST['sql'];
$statement = $pdo->prepare($select);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

$data = array();
foreach($results as $a){
    array_push($data, $a);
}

$pdf = new PDF_MC_Table($orientasi,'mm',$ukuran);
$pdf->AddPage();
//Table with 20 rows and 4 columns
$pdf->SetWidths($widthh);

#tampilkan judul laporan
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,5, $judul, '0', 1, 'C');
$pdf->SetFont('Arial','U','12');
$pdf->Cell(0,10, $subjudul, '0', 1, 'C');

#buat header tabel
$pdf->SetFont('Arial','B','10');
$pdf->SetFillColor(60,141,188);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(0,0,0);
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 7, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();


#tampilkan data tabelnya
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill=false;
$aa = 1;

foreach($data as $a){
    $baris = array();
    array_push($baris, $aa);
    foreach($a as $b){
        if(substr($b,0,3) != $id)
            array_push($baris, $b);
    }
    $pdf->Row($baris);
    $aa++;
    $fill = !$fill;
}

$pdf->SetFont('','B','');
foreach ($footer as $kolom) {
    $pdf->Cell($kolom['length'], 7, $kolom['label'], 1, '0', $kolom['align'], true);
}

$pdf->Ln();


$pdf->Output();
?>