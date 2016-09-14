<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_msd.php';
require_once 'model/m_jenis.php';
require_once 'model/m_autentikasi.php';

$us = profil();
$level = $us['level'];

if (!(is_logged_in()))  header('Location: login.php');

else if((strpos($level,'1')) || (strpos($level,'3'))) {
    if(isset($_POST['nama']) && $_POST['id_client']) {
        update_msd_client(
            $_POST['id_client'],
            $_POST['tgl'],
            $_POST['bln'],
            $_POST['thn'],
            $_POST['nama'],
            $_POST['no_akun'],
            $_POST['alamat'],
            $_POST['no_telp'],
            $_POST['email'],
            $_POST['id_bank'],
            $_POST['no_rek'],
            $_POST['id_tipe_akun'],
            $_POST['id_komisi'],
            $_POST['id_ib'],
            $_FILES['scan_id']['name'],
            $_POST['scan_id_hide']
        );
        header('Location: msd_client.php');
    }

    elseif(isset($_POST['nama'])) {
        tambah_msd_client(
            $_POST['tgl'],
            $_POST['bln'],
            $_POST['thn'],
            $_POST['nama'],
            $_POST['no_akun'],
            $_POST['alamat'],
            $_POST['no_telp'],
            $_POST['email'],
            $_POST['id_bank'],
            $_POST['no_rek'],
            $_POST['id_tipe_akun'],
            $_POST['id_komisi'],
            $_POST['id_ib'],
            $_FILES['scan_id']['name']
        );
        header('Location: msd_client.php');
    }

    elseif(isset($_GET['edit']) || isset($_GET['lihat'])) {
        $msd_client = semua_msd_client();
        $bank = semua_bank();
        $tipe_akun = semua_tipe_akun();
        $ib = semua_msd_ib();
        $komisi = semua_komisi();
        if(isset($_GET['edit'])) { $msd_client_edit = ambil_msd_client($_GET['edit']); }
        else if(isset($_GET['lihat'])) { $msd_client_edit = ambil_msd_client($_GET['lihat']); }
        $judul_halaman = "Edit Data Client Microstodex";
        require_once 'view/v_msd_client_tambah.php';
    }

    elseif(isset($_GET['hapus'])) {
        hapus_msd_client($_GET['hapus']);
        header('Location: msd_client.php');
    }

    else {
        $msd_client = semua_msd_client();
        $bank = semua_bank();
        $komisi = semua_komisi();
        $tipe_akun = semua_tipe_akun();
        $ib = semua_msd_ib();
        $judul_halaman = "Tambah Data Client Microstodex";
        require 'view/v_msd_client_tambah.php';
    }
}

else  header('Location: index.php');