<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/m_ftc.php';
require_once 'model/m_autentikasi.php';

$us = profil();
$level = $us['level'];

if (!(is_logged_in()))   header('Location: login.php');

else if(!(strpos($level,'1')))   header('Location: index.php');

else {
    $kelas = semua_ftc_kelas();
    $judul_halaman = "Jenis Kelas";
    require_once "view/v_kelas.php";
}

?>