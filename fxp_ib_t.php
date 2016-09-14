<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_fxp.php';
require_once 'model/m_autentikasi.php';
require_once 'model/m_jenis.php';

$us = profil();
$level = $us['level'];

if (!(is_logged_in())) {
    header('Location: login.php');
}
else if((strpos($level,'1')) || (strpos($level,'4'))) {

    if(isset($_POST['nama_ib']) && $_POST['id_ib']) {
        update_fxp_ib(
            $_POST['id_ib'],
            $_POST['nama_ib'],
            $_POST['alamat'],
            $_POST['no_telp'],
            $_POST['email'],
            $_POST['pin_bb'],
            $_POST['id_bank'],
            $_POST['no_rek'],
            $_POST['website'],
            $_FILES['scan_id']['name'],
            $_POST['scan_id_hide']
        );
        header('Location: fxp_ib.php');
    }

    elseif(isset($_POST['nama_ib'])) {
        tambah_fxp_ib(
            $_POST['nama_ib'],
            $_POST['alamat'],
            $_POST['no_telp'],
            $_POST['email'],
            $_POST['pin_bb'],
            $_POST['id_bank'],
            $_POST['no_rek'],
            $_POST['website'],
            $_FILES['scan_id']['name']
        );
        header('Location: fxp_ib.php');
    }

    elseif(isset($_GET['edit']) || isset($_GET['lihat'])) {
        $fxp_ib = semua_fxp_ib();
        $bank = semua_bank();

        if(isset($_GET['edit'])) { $fxp_ib_edit = ambil_fxp_ib($_GET['edit']); }
        else if(isset($_GET['lihat'])) { $fxp_ib_edit = ambil_fxp_ib($_GET['lihat']); }

        $judul_halaman = "Edit Data IB Forexperia";
        require_once 'view/v_fxp_ib_tambah.php';
    }

    elseif(isset($_GET['hapus'])) {
        hapus_fxp_ib($_GET['hapus']);
        header('Location: fxp_ib.php');
    }

    else {
        $fxp_ib = semua_fxp_ib();
        $bank = semua_bank();
        $judul_halaman = "Tambah Data IB Forexperia";
        require 'view/v_fxp_ib_tambah.php';
    }
}

else  header('Location: index.php');