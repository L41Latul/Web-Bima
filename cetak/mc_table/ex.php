<?php

function GenerateWord()
{
	//Get a random word
	$nb=rand(3,10);
	$w='';
	for($i=1;$i<=$nb;$i++)
		$w.=chr(rand(ord('a'),ord('z')));
	return $w;
}

function GenerateSentence()
{
	//Get a random sentence
	$nb=rand(1,10);
	$s='';
	for($i=1;$i<=$nb;$i++)
		$s.=GenerateWord().' ';
	return substr($s,0,-1);
}

$judul = "DATA CLIENT FOREXPERIA";
$subjudul = $_POST['subjudul'];
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
    array("label"=>"JUMLAH DATA : ".$_POST['jmldata']." ", "length"=>40, "align"=>"C")
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



require('mc_table.php');

$pdf=new PDF_MC_Table();
$pdf->AddPage();
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(30,50,30,40));


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
$a = 1;
foreach ($data as $baris) {
    $i = 1;
    $pdf->Row($header[0]['length'], 7, $a, 1, '0', $kolom['align'], $fill);
    foreach ($baris as $cell) {
        if(substr($cell,0,3) != $id) {
            $pdf->Row($header[$i]['length'], 7, $cell, 1, '0', $kolom['align'], $fill);
        } else $i--;

        $i++;
    }
    $fill = !$fill;
    $pdf->Ln();
    $a++;
}
$pdf->SetFont('','B','');
foreach ($footer as $kolom) {
    $pdf->Cell($kolom['length'], 7, $kolom['label'], 1, '0', $kolom['align'], true);
}

#output file PDF
$pdf->Output();



srand(microtime()*1000000);
for($i=0;$i<20;$i++)
	$pdf->Row(array(GenerateSentence(),GenerateSentence(),GenerateSentence(),GenerateSentence()));
$pdf->Output();
?>
