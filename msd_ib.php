<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_msd.php';
require_once 'model/m_jenis.php';
require_once 'model/m_autentikasi.php';

$us = profil();
$level = $us['level'];

if (!(is_logged_in()))  header('Location: login.php');

else if((strpos($level,'1')) || (strpos($level,'3'))) {
    $ib = semua_msd_ib();
    $bank = semua_bank();
    $judul_halaman = "Data IB Microstodex";
    require_once "view/v_msd_ib.php";
}

else  header('Location: index.php');

?>