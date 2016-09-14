<?php
#setting judul laporan dan header tabel
$judul = "LAPORAN TRANSAKSI FOREXPERIA";
$subjudul = $_POST['subjudul'];
$header = array(
    array("label"=>"NO", "length"=>7, "align"=>"C"),
    array("label"=>"TANGGAL", "length"=>21, "align"=>"C"),
    array("label"=>"JENIS", "length"=>15, "align"=>"C"),
    array("label"=>"CLIENT", "length"=>25, "align"=>"C"),
    array("label"=>"BANK", "length"=>20, "align"=>"C"),
    array("label"=>"IB", "length"=>25, "align"=>"C"),
    array("label"=>"IN", "length"=>27, "align"=>"C"),
    array("label"=>"OUT", "length"=>27, "align"=>"C"),
    array("label"=>"LABA RUGI", "length"=>27, "align"=>"C")
);

if(!(isset($_POST['inDepo']))) $indepo = "Rp. 0";
else $indepo = $_POST['inDepo'];
if(!(isset($_POST['inWD']))) $inwd = "Rp. 0";
else $inwd = $_POST['inWD'];

if(!(isset($_POST['outDepo']))) $outdepo = "Rp. 0";
else $outdepo = $_POST['outDepo'];
if(!(isset($_POST['outWD']))) $outwd = "Rp. 0";
else $outwd = $_POST['outWD'];

if(!(isset($_POST['labaDepo']))) $labadepo = "Rp. 0";
else $labadepo = $_POST['labaDepo'];
if(!(isset($_POST['labaWD']))) $labawd = "Rp. 0";
else $labawd = $_POST['labaWD'];

$footer = array(
    array("label"=>"JUMLAH DEPO : ", "length"=>113, "align"=>"C"),
    array("label"=>" ".$indepo."", "length"=>27, "align"=>"C"),
    array("label"=>" ".$outdepo."", "length"=>27, "align"=>"C"),
    array("label"=>" ".$labadepo."", "length"=>27, "align"=>"C")
);

$footer2 = array(
    array("label"=>"JUMLAH WD : ", "length"=>113, "align"=>"C"),
    array("label"=>" ".$inwd."", "length"=>27, "align"=>"C"),
    array("label"=>" ".$outwd."", "length"=>27, "align"=>"C"),
    array("label"=>" ".$labawd."", "length"=>27, "align"=>"C")
);

$footer3 = array(
    array("label"=>"JUMLAH DATA : ".$_POST['jmldata']." ", "length"=>113, "align"=>"C"),
    array("label"=>" ".$_POST['jml_in']."", "length"=>27, "align"=>"C"),
    array("label"=>" ".$_POST['jml_out']."", "length"=>27, "align"=>"C"),
    array("label"=>" ".$_POST['jml_laba']."", "length"=>27, "align"=>"C")
);

$id = 'FXT';

$widthh = array(7,21,15,25,20,25,27,27,27);
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


$pdf=new PDF_MC_Table();
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

foreach ($footer3 as $kolom) {
    $pdf->Cell($kolom['length'], 7, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
if((isset($_POST['inDepo']))){
    foreach ($footer as $kolom) {
        $pdf->Cell($kolom['length'], 7, $kolom['label'], 1, '0', $kolom['align'], true);
    }
    $pdf->Ln();
}
if((isset($_POST['inWD']))){
    foreach ($footer2 as $kolom) {
        $pdf->Cell($kolom['length'], 7, $kolom['label'], 1, '0', $kolom['align'], true);
    }
    $pdf->Ln();
}

#output file PDF
$pdf->Output();

?>