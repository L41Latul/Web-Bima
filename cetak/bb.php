<?php

require('mc_table.php');

$judul = "DATA CLIENT FOREXPERIA";
$subjudul = "jkgik";
$header = array(
    array("label"=>"NO", "length"=>10, "align"=>"C"),
    array("label"=>"TANGGAL", "length"=>30, "align"=>"C"),
    array("label"=>"NO AKUN", "length"=>25, "align"=>"C"),
    array("label"=>"NAMA", "length"=>25, "align"=>"C"),
    array("label"=>"ALAMAT", "length"=>20, "align"=>"C"),
    array("label"=>"NO TELP", "length"=>30, "align"=>"C"),
    array("label"=>"EMAIL", "length"=>30, "align"=>"C"),
    array("label"=>"AKUN", "length"=>30, "align"=>"C"),
    array("label"=>"IB", "length"=>30, "align"=>"C"),
    array("label"=>"BANK", "length"=>30, "align"=>"C")
);

$footer = array(
    array("label"=>"JUMLAH DATA : 5", "length"=>40, "align"=>"C")
);

$id = 'FXC';


require_once '../model/librari/konfigurasi.php';
require_once '../model/librari/librari.php';
require_once '../model/m_msd.php';
require_once '../model/m_jenis.php';

$pdo = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
$select = "SELECT id_client, DATE_FORMAT(tgl_daftar, '%d-%m-%Y') AS PerDate, no_akun, nama, m.alamat, m.no_telp, m.email, tipe_akun, nama_ib, b.bank FROM fxp_client m LEFT JOIN bank b ON m.id_bank = b.id_bank LEFT JOIN tipe_akun t ON m.id_tipe_akun = t.id_tipe_akun LEFT JOIN fxp_ib i ON m.id_ib = i.id_ib";

$statement = $pdo->prepare($select);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

$data = array();
foreach($results as $a){
    array_push($data, $a);
}




$pdf=new PDF_MC_Table();
$pdf->AddPage();
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(10,20,20,25,20,25,25,15,15,15));

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
    $pdf->Row($baris, $fill);
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
