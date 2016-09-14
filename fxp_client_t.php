<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_fxp.php';
require_once 'model/m_jenis.php';
require_once 'model/m_autentikasi.php';

$us = profil();
$level = $us['level'];

if (!(is_logged_in()))  header('Location: login.php');

else if((strpos($level,'1')) || (strpos($level,'4'))) {

    if(isset($_POST['nama']) && $_POST['id_client']) {
        update_fxp_client(
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
            $_POST['id_ib'],
            $_FILES['scan_id']['name'],
            $_POST['scan_id_hide'],
            $_POST['password'],
            $_POST['phone_password'],
            $_POST['pin']
        );
        header('Location: fxp_client.php');
    }

    elseif(isset($_POST['nama'])) {
        tambah_fxp_client(
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
            $_POST['id_ib'],
            $_FILES['scan_id']['name'],
            $_POST['password'],
            $_POST['phone_password'],
            $_POST['pin']
        );
        header('Location: fxp_client.php');
    }

    elseif(isset($_GET['edit']) || isset($_GET['lihat'])) {
        $fxp_client = semua_fxp_client();
        $bank = semua_bank();
        $tipe_akun = semua_tipe_akun();
        $komisi = semua_komisi();
        $ib = semua_fxp_ib();

        if(isset($_GET['edit'])) { $fxp_client_edit = ambil_fxp_client($_GET['edit']); }
        else if(isset($_GET['lihat'])) { $fxp_client_edit = ambil_fxp_client($_GET['lihat']); }

        $judul_halaman = "Edit Data Client Forexperia";
        require_once 'view/v_fxp_client_tambah.php';
    }

    elseif(isset($_GET['hapus'])) {
        hapus_fxp_client($_GET['hapus']);
        header('Location: fxp_client.php');
    }

    else {
        $fxp_client = semua_fxp_client();
        $bank = semua_bank();
        $tipe_akun = semua_tipe_akun();
        $komisi = semua_komisi();
        $ib = semua_fxp_ib();
        $judul_halaman = "Tambah Data Client Forexperia";
        require 'view/v_fxp_client_tambah.php';
    }
}

else  header('Location: index.php');