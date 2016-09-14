<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_ftc.php';
require_once 'model/m_user.php';
require_once 'model/m_autentikasi.php';

$us = profil();
$level = $us['level'];

if (!(is_logged_in()))  header('Location: login.php');

else if((strpos($level,'1')) || (strpos($level,'2'))) {
    $penghasilan = semua_ftc_penghasilan();
    $kelas = semua_ftc_kelas();
    $judul_halaman = "Data Murid";
    require_once "view/v_ftc_murid.php";
}

else header('Location: index.php');

?>