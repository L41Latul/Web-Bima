<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_fxp.php';
require_once 'model/m_jenis.php';
require_once 'model/m_autentikasi.php';

$us = profil();
$level = $us['level'];

if (!(is_logged_in()))  header('Location: login.php');

else if((strpos($level,'1')) || (strpos($level,'4'))) {
    $ib = semua_fxp_ib();
    $bank = semua_bank();
    $judul_halaman = "Data IB Forexperia";
    require_once "view/v_fxp_ib.php";
}

else  header('Location: index.php');

?>