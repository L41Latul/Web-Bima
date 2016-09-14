<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_jenis.php';
require_once 'model/m_autentikasi.php';

$us = profil();
$level = $us['level'];

if (!(is_logged_in()))   header('Location: login.php');

else if(!(strpos($level,'1')))   header('Location: index.php');

else {
    if(isset($_POST['tipe_akun']) && $_POST['id_tipe_akun']) {
        update_tipe_akun($_POST['id_tipe_akun'], $_POST['tipe_akun']);
        header('Location: tipe_akun.php');
    }

    elseif(isset($_POST['tipe_akun'])) {
        tambah_tipe_akun($_POST['tipe_akun']);
        header('Location: tipe_akun.php');
    }

    elseif(isset($_GET['edit'])) {
        $tipe_akun_edit = ambil_tipe_akun($_GET['edit']);
        $judul_halaman = "Edit Tipe Akun";
        require_once 'view/v_tipe_akun_tambah.php';
    }

    elseif(isset($_GET['hapus'])) {
        hapus_tipe_akun($_GET['hapus']);
        header('Location: tipe_akun.php');
    }

    else {
        $tipe_akun = semua_tipe_akun();
        $judul_halaman = "Tambah Tipe Akun";
        require 'view/v_tipe_akun_tambah.php';
    }
}