<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/m_user.php';
require_once 'model/m_autentikasi.php';

$us = profil();
$level = $us['level'];

if (!(is_logged_in()))  header('Location: login.php');

else if(!(strpos($level,'1'))) header('Location: index.php');

else {
    $user = semua_user();
    $judul_halaman = "Data User";
    require_once "view/v_user.php";
}

?>