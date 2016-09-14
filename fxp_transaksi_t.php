<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_fxp.php';
require_once 'model/m_jenis.php';
require_once 'model/m_user.php';
require_once 'model/m_autentikasi.php';

$us = profil();
$level = $us['level'];

if (!(is_logged_in())) {
    header('Location: login.php');
}
else if((strpos($level,'1')) || (strpos($level,'4'))) {

    if(isset($_POST['transfer_ke']) && $_POST['id_transaksi']) {
        $a = ambil_fxp_client($_POST['id_client']);
        foreach($a as $b)
            $ib = $b['id_ib'];
        $laba_rugi = $_POST['jumlah_transaksi'] - $_POST['transfer_ke'];
        $user = $us['id_user'];
        update_fxp_transaksi(
            $_POST['id_transaksi'],
            $_POST['id_jenis_transaksi'],
            $_POST['tgl'],
            $_POST['bln'],
            $_POST['thn'],
            $_POST['id_client'],
            $_POST['jumlah_transaksi'],
            $_POST['transfer_ke'],
            $laba_rugi,
            $_POST['id_bank'],
            $ib,
            $user
        );
        header('Location: fxp_transaksi.php');
    }

    elseif(isset($_POST['transfer_ke'])) {
        $a = ambil_fxp_client($_POST['id_client']);
        foreach($a as $b)
            $ib = $b['id_ib'];
        $laba_rugi = $_POST['jumlah_transaksi'] - $_POST['transfer_ke'];
        $user = $us['id_user'];
        tambah_fxp_transaksi(
            $_POST['id_jenis_transaksi'],
            $_POST['tgl'],
            $_POST['bln'],
            $_POST['thn'],
            $_POST['id_client'],
            $_POST['jumlah_transaksi'],
            $_POST['transfer_ke'],
            $laba_rugi,
            $_POST['id_bank'],
            $ib,
            $user
        );
        header('Location: fxp_transaksi.php');
    }

    elseif(isset($_GET['edit']) || isset($_GET['lihat'])) {
        $fxp_transaksi = semua_fxp_transaksi();
        $bank = semua_bank();
        $jenis_transaksi = semua_jenis_transaksi();
        $ib = semua_fxp_ib();
        $client = semua_fxp_client();
        if(isset($_GET['edit'])) { $fxp_transaksi_edit = ambil_fxp_transaksi($_GET['edit']); }
        else if(isset($_GET['lihat'])) { $fxp_transaksi_edit = ambil_fxp_transaksi($_GET['lihat']); }
        $judul_halaman = "Edit Data Transaksi Forexperia";
        require_once 'view/v_fxp_transaksi_tambah.php';
    }

    elseif(isset($_GET['hapus'])) {
        hapus_fxp_transaksi($_GET['hapus']);
        header('Location: fxp_transaksi.php');
    }

    else {
        $fxp_transaksi = semua_fxp_transaksi();
        $bank = semua_bank();
        $jenis_transaksi = semua_jenis_transaksi();
        $ib = semua_fxp_ib();
        $client = semua_fxp_client();
        $judul_halaman = "Tambah Data Transaksi Forexperia";
        require 'view/v_fxp_transaksi_tambah.php';
    }
}

else  header('Location: index.php');