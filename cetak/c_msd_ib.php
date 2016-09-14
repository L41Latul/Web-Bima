<?php
#setting judul laporan dan header tabel
$judul = "LAPORAN DATA IB MICROSTODEX";
$subjudul = $_POST['subjudul'];
$header = array(
    array("label"=>"NO", "length"=>10, "align"=>"C"),
    array("label"=>"NAMA", "length"=>30, "align"=>"C"),
    array("label"=>"ALAMAT", "length"=>35, "align"=>"C"),
    array("label"=>"NO TELP", "length"=>32, "align"=>"C"),
    array("label"=>"EMAIL", "length"=>33, "align"=>"C"),
    array("label"=>"PIN BB", "length"=>17, "align"=>"C"),
    array("label"=>"BANK", "length"=>18, "align"=>"C"),
    array("label"=>"CLIENT", "length"=>15, "align"=>"C")
);

$footer = array(
    array("label"=>"JUMLAH DATA : ".$_POST['jmldata']." ", "length"=>190, "align"=>"L")
);

$id = 'MSI';

$ukuran = array(297,210);
$orientasi = 'P';
$widthh = array(10,30,35,32,33,17,18,15);
require_once '_cetak2.php';