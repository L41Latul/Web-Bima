<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_msd.php';
require_once 'model/m_jenis.php';
require_once 'model/m_user.php';
require_once 'model/m_autentikasi.php';

$us = profil();
$level = $us['level'];

if (!(is_logged_in()))  header('Location: login.php');

else if((strpos($level,'1')) || (strpos($level,'3'))) {
    if(isset($_POST['jumlah_transaksi']) && $_POST['id_transaksi']) {
        $a = ambil_msd_client($_POST['id_client']);
        foreach($a as $b)
            $ib = $b['id_ib'];
        $user = $us['id_user'];
        update_msd_transaksi(
            $_POST['id_transaksi'],
            $_POST['id_jenis_transaksi'],
            $_POST['tgl'],
            $_POST['bln'],
            $_POST['thn'],
            $_POST['id_client'],
            $_POST['jumlah_transaksi'],
            $_POST['id_bank'],
            $ib,
            $user
        );
        header('Location: msd_transaksi.php');
    }

    elseif(isset($_POST['jumlah_transaksi'])) {
        $a = ambil_msd_client($_POST['id_client']);
        foreach($a as $b)
            $ib = $b['id_ib'];
        $user = $us['id_user'];
        tambah_msd_transaksi(
            $_POST['id_jenis_transaksi'],
            $_POST['tgl'],
            $_POST['bln'],
            $_POST['thn'],
            $_POST['id_client'],
            $_POST['jumlah_transaksi'],
            $_POST['id_bank'],
            $ib,
            $user
        );
        header('Location: msd_transaksi.php');
    }

    elseif(isset($_GET['edit']) || isset($_GET['lihat'])) {
        $msd_transaksi = semua_msd_transaksi();
        $bank = semua_bank();
        $jenis_transaksi = semua_jenis_transaksi();
        $ib = semua_msd_ib();
        $client = semua_msd_client();
        if(isset($_GET['edit'])) { $msd_transaksi_edit = ambil_msd_transaksi($_GET['edit']); }
        else if(isset($_GET['lihat'])) { $msd_transaksi_edit = ambil_msd_transaksi($_GET['lihat']); }
        $judul_halaman = "Edit Data Transaksi Microstodex";
        require_once 'view/v_msd_transaksi_tambah.php';
    }

    elseif(isset($_GET['hapus'])) {
        hapus_msd_transaksi($_GET['hapus']);
        header('Location: msd_transaksi.php');
    }

    else {
        $msd_transaksi = semua_msd_transaksi();
        $bank = semua_bank();
        $jenis_transaksi = semua_jenis_transaksi();
        $ib = semua_msd_ib();
        $client = semua_msd_client();
        $judul_halaman = "Tambah Data Transaksi Microstodex";
        require 'view/v_msd_transaksi_tambah.php';
    }
}

else  header('Location: index.php');