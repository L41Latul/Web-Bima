<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_msd.php';
require_once 'model/m_jenis.php';
require_once 'model/m_autentikasi.php';

$us = profil();
$level = $us['level'];

if (!(is_logged_in()))   header('Location: login.php');

else if((strpos($level,'1')) || (strpos($level,'3'))) {
    $bank = semua_bank();
    $tipe_akun = semua_tipe_akun();
    $msd_ib = semua_msd_ib();
    $komisi = semua_komisi();
    $msd_client = semua_msd_client();
    $judul_halaman = "Data Client Microstodex";
    require_once "view/v_msd_client.php";
}

else  header('Location: index.php');

?>