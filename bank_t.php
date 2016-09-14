<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_jenis.php';
require_once 'model/m_autentikasi.php';

$us = profil();
$level = $us['level'];

if (!(is_logged_in()))  header('Location: login.php');

else if(!(strpos($level,'1')))  header('Location: index.php');

else {

    if(isset($_POST['bank']) && $_POST['id_bank']) {
        update_bank($_POST['id_bank'], $_POST['bank']);
        header('Location: bank.php');
    }

    elseif(isset($_POST['bank'])) {
        tambah_bank($_POST['bank']);
        header('Location: bank.php');
    }

    elseif(isset($_GET['edit'])) {
        $bank_edit = ambil_bank($_GET['edit']);
        $judul_halaman = "Edit bank";
        require_once 'view/v_bank_tambah.php';
    }

    elseif(isset($_GET['hapus'])) {
        hapus_bank($_GET['hapus']);
        header('Location: bank.php');
    }

    else {
        $bank = semua_bank();
        $judul_halaman = "Tambah Tipe bank";
        require 'view/v_bank_tambah.php';
    }
}