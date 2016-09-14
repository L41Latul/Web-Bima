<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_ftc.php';
require_once 'model/m_autentikasi.php';

$us = profil();
$level = $us['level'];

if (!(is_logged_in()))  header('Location: login.php');

else if(!(strpos($level,'1')))  header('Location: index.php');

else {
    if(isset($_POST['penghasilan']) && $_POST['id_penghasilan']) {
        update_penghasilan($_POST['id_penghasilan'], $_POST['penghasilan']);
        header('Location: penghasilan.php');
    }

    elseif(isset($_POST['penghasilan'])) {
        tambah_ftc_penghasilan($_POST['penghasilan']);
        header('Location: penghasilan.php');
    }

    elseif(isset($_GET['edit'])) {
        $penghasilan = semua_ftc_penghasilan();
        $penghasilan_edit = ambil_penghasilan($_GET['edit']);
        $judul_halaman = "Edit penghasilan";
        require_once 'view/v_penghasilan_tambah.php';
    }

    elseif(isset($_GET['hapus'])) {
        hapus_ftc_penghasilan($_GET['hapus']);
        header('Location: penghasilan.php');
    }

    else {
        $penghasilan = semua_ftc_penghasilan();
        $judul_halaman = "Tambah Jenis Penghasilan";
        require 'view/v_penghasilan_tambah.php';
    }
}