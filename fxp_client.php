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
    $fxp_client = semua_fxp_client();
    $bank = semua_bank();
    $komisi = semua_komisi();
    $tipe_akun = semua_tipe_akun();
    $judul_halaman = "Data Client Forexperia";
    require_once "view/v_fxp_client.php";
}

else header('Location: index.php');

?>