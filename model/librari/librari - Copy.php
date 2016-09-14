<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'db_bima';

$koneksi = mysql_connect($host, $user, $pass);
if (!$koneksi) {
    exit('Koneksi Gagal');
}
$db = mysql_select_db($db);
if (!$db) {
    exit('Gagal Memilih Database');
}

function kdauto($tabel, $inisial){
	$struktur	= mysql_query("SELECT * FROM $tabel");
	$field		= @mysql_field_name($struktur,0);
	$panjang	= @mysql_field_len($struktur,0);

 	$qry	= mysql_query("SELECT max(".$field.") FROM ".$tabel);
 	$row	= @mysql_fetch_array($qry); 
 	if ($row[0]=="") {
 		$angka=0;
	}
 	else {
 		$angka		= substr($row[0], strlen($inisial));
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
	$tgl_ind=substr($tgl,8,2)."-".substr($tgl,5,2)."-".substr($tgl,0,4);
	return $tgl_ind;
}

function format_angka($angka) {
	$hasil =  number_format($angka,0, ",",".");
	return $hasil;
}

function upload_file(){

    //Membaca nama file
    $foto = $_FILES['foto']['name'];
    //Membaca ukuran file
    $size = $_FILES['foto']['size'];
    //Membaca jenis file
    $file_type = $_FILES['foto']['type'];

    //Source tempat upload file sementara
    $source = $_FILES['foto']['tmp_name'];
    //Tempat upload file disimpan
    $direktori = "f_task/$foto";

    move_uploaded_file($source,$direktori);
}

