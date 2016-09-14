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
    if(isset($_POST['jenis_transaksi']) && $_POST['id_jenis_transaksi']) {
        update_jenis_transaksi($_POST['id_jenis_transaksi'], $_POST['jenis_transaksi']);
        header('Location: jenis_transaksi.php');
    }

    elseif(isset($_POST['jenis_transaksi'])) {
        tambah_jenis_transaksi($_POST['jenis_transaksi']);
        header('Location: jenis_transaksi.php');
    }

    elseif(isset($_GET['edit'])) {
        $jenis_transaksi_edit = ambil_jenis_transaksi($_GET['edit']);
        $judul_halaman = "Edit jenis_transaksi";
        require_once 'view/v_jenis_transaksi_tambah.php';
    }

    elseif(isset($_GET['hapus'])) {
        hapus_jenis_transaksi($_GET['hapus']);
        header('Location: jenis_transaksi.php');
    }

    else {
        $jenis_transaksi = semua_jenis_transaksi();
        $judul_halaman = "Tambah Tipe Jenis Transaksi";
        require 'view/v_jenis_transaksi_tambah.php';
    }
}