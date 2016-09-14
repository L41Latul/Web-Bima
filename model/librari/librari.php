<?php

function kdauto($tabel, $inisial){

    $pdo = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $pdo->query('SHOW COLUMNS FROM ' . $tabel);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $column){
        echo $column['Field'] . ' - ' . $column['Type'] . ' - ' . substr($column['Type'],8), '<br>';
        $field = $column['Field'];
        $panjang = substr($column['Type'],8);
        break;
    }

    $statement2 = $pdo->query('SELECT max('.$field.') as aa FROM '.$tabel);
    $result2 = $statement2->fetch(PDO::FETCH_ASSOC);

    if ($result2=="") {
        $angka=0;
    }
    else {
        $angka		= substr($result2['aa'], strlen($inisial));
    }

    $angka++;
    $angka	=strval($angka);
    $tmp	="";
    for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
        $tmp=$tmp."0";
    }
    return $inisial.$tmp.$angka;
}

// Konvesi dd-mm-yyyy -> yyyy-mm-dd
function tgl_ind_to_eng($tgl) {
	$tgl_eng=substr($tgl,6,4)."-".substr($tgl,3,2)."-".substr($tgl,0,2);
	return $tgl_eng;
}

// Konvesi yyyy-mm-dd -> dd-mm-yyyy
function tgl_eng_to_ind($tgl) {
	$tgl_ind=substr($tgl,8,2)."-".cetak_bulan(substr($tgl,5,2))."-".substr($tgl,0,4);
	return $tgl_ind;
}

function cetak_bulan($bln){
    if($bln==01) $a = "Januari";
    if($bln==02) $a = "Februari";
    if($bln==03) $a = "Maret";
    if($bln==04) $a = "April";
    if($bln==05) $a = "Mei";
    if($bln==06) $a = "Juni";
    if($bln==07) $a = "Juli";
    if($bln=='08') $a = "Augustus";
    if($bln=='09') $a = "September";
    if($bln==10) $a = "Oktober";
    if($bln==11) $a = "November";
    if($bln==12) $a = "Desember";
    return $a;
}

function format_angka($angka) {
	$hasil =  number_format($angka,0, ",",".");
	return $hasil;
}

function upload_file(){

    //Membaca nama file
    $foto = $_FILES['scan_id']['name'];
    //Membaca ukuran file
    //$size = $_FILES['scan_id']['size'];
    //Membaca jenis file
    //$file_type = $_FILES['scan_id']['type'];

    //Source tempat upload file sementara
    $source = $_FILES['scan_id']['tmp_name'];
    //Tempat upload file disimpan
    $direktori = "scan_id/$foto";

    move_uploaded_file($source,$direktori);
}

