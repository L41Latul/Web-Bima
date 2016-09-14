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
    if(isset($_POST['komisi']) && $_POST['id_komisi']) {
        update_komisi($_POST['id_komisi'], $_POST['komisi']);
        header('Location: komisi.php');
    }

    elseif(isset($_POST['komisi'])) {
        tambah_komisi($_POST['komisi']);
        header('Location: komisi.php');
    }

    elseif(isset($_GET['edit'])) {
        $komisi_edit = ambil_komisi($_GET['edit']);
        $judul_halaman = "Edit Komisi";
        require_once 'view/v_komisi_tambah.php';
    }

    elseif(isset($_GET['hapus'])) {
        hapus_komisi($_GET['hapus']);
        header('Location: komisi.php');
    }

    else {
        $komisi = semua_komisi();
        $judul_halaman = "Tambah Jenis Komisi";
        require 'view/v_komisi_tambah.php';
    }

}