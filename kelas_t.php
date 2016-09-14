<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_ftc.php';
require_once 'model/m_autentikasi.php';

$us = profil();
$level = $us['level'];

if (!(is_logged_in()))   header('Location: login.php');

else if(!(strpos($level,'1')))   header('Location: index.php');

else {
    if(isset($_POST['kelas']) && $_POST['id_kelas']) {
        update_kelas($_POST['id_kelas'], $_POST['kelas']);
        header('Location: kelas.php');
    }

    elseif(isset($_POST['kelas'])) {
        tambah_ftc_kelas($_POST['kelas']);
        header('Location: kelas.php');
    }

    elseif(isset($_GET['edit'])) {
        $kelas_edit = ambil_kelas($_GET['edit']);
        $judul_halaman = "Edit Kelas";
        require_once 'view/v_kelas_tambah.php';
    }

    elseif(isset($_GET['hapus'])) {
        hapus_ftc_kelas($_GET['hapus']);
        header('Location: kelas.php');
    }

    else {
        $kelas = semua_ftc_kelas();
        $judul_halaman = "Tambah Tipe Kelas";
        require 'view/v_kelas_tambah.php';
    }

}