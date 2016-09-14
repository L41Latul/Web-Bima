<?php
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

#sertakan library FPDF dan bentuk objek
require_once ("../fpdf181/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();

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
$pdf->SetFont('Arial','','10');
$fill=false;
$a = 1;
foreach ($data as $baris) {
    $i = 1;
    $pdf->Cell($header[0]['length'], 7, $a, 1, '0', $kolom['align'], $fill);
    foreach ($baris as $cell) {
        if(substr($cell,0,3) != $id) {
            $pdf->Cell($header[$i]['length'], 7, $cell, 1, '0', $kolom['align'], $fill);
        } else $i--;

        $i++;
    }
    $fill = !$fill;
    $pdf->Ln();
    $a++;
}
$pdf->SetFont('','B','');
foreach ($footer as $kolom) {
    $pdf->Cell($kolom['length'], 7, $kolom['label'], 1, '0', $kolom['align'], false);
    $pdf->Ln();
}

#output file PDF
$pdf->Output();

?>