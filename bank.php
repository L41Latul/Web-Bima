<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/m_jenis.php';
require_once 'model/m_autentikasi.php';

$us = profil();
$level = $us['level'];

if (!(is_logged_in()))  header('Location: login.php');

else if(!(strpos($level,'1')))  header('Location: index.php');

else {
    $bank = semua_bank();
    $judul_halaman = "Nama Bank";
    require_once "view/v_bank.php";
}

?>