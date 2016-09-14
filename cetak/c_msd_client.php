<?php
#setting judul laporan dan header tabel
$judul = "DATA CLIENT MICROSTODEX";
$subjudul = $_POST['subjudul'];
$header = array(
    array("label"=>"NO", "length"=>10, "align"=>"C"),
    array("label"=>"TANGGAL", "length"=>23, "align"=>"C"),
    array("label"=>"NO AKUN", "length"=>25, "align"=>"C"),
    array("label"=>"NAMA", "length"=>35, "align"=>"C"),
    array("label"=>"ALAMAT", "length"=>40, "align"=>"C"),
    array("label"=>"NO TELP", "length"=>28, "align"=>"C"),
    array("label"=>"EMAIL", "length"=>35, "align"=>"C"),
    array("label"=>"AKUN", "length"=>15, "align"=>"C"),
    array("label"=>"IB", "length"=>35, "align"=>"C"),
    array("label"=>"BANK", "length"=>18, "align"=>"C"),
    array("label"=>"KOMISI", "length"=>15, "align"=>"C")
);

$footer = array(
    array("label"=>"JUMLAH DATA : ".$_POST['jmldata']." ", "length"=>279, "align"=>"L")
);

$id = 'MSC';

$ukuran = array(297,210);
$orientasi = 'L';
$widthh = array(10,23,25,35,40,28,35,15,35,18,15);
require_once '_cetak2.php';