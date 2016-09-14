<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_ftc.php';
require_once 'model/m_autentikasi.php';

$us = profil();
$level = $us['level'];

if (!(is_logged_in()))  header('Location: login.php');

else if((strpos($level,'1')) || (strpos($level,'2'))) {

    if(isset($_POST['nama']) && $_POST['id_murid']) {
        update_murid(
            $_POST['id_murid'],
            $_POST['tgl'],
            $_POST['bln'],
            $_POST['thn'],
            $_POST['nama'],
            $_POST['tempat_lahir'],
            $_POST['tgl2'],
            $_POST['bln2'],
            $_POST['thn2'],
            $_POST['alamat'],
            $_POST['no_telp'],
            $_POST['email'],
            $_POST['pin_bb'],
            $_POST['pekerjaan'],
            $_POST['id_penghasilan'],
            $_POST['id_kelas'],
            $_POST['biaya']
        );
        header('Location: ftc_murid.php');
    }

    elseif(isset($_POST['nama'])) {
        tambah_ftc_murid(
            $_POST['tgl'],
            $_POST['bln'],
            $_POST['thn'],
            $_POST['nama'],
            $_POST['tempat_lahir'],
            $_POST['tgl2'],
            $_POST['bln2'],
            $_POST['thn2'],
            $_POST['alamat'],
            $_POST['no_telp'],
            $_POST['email'],
            $_POST['pin_bb'],
            $_POST['pekerjaan'],
            $_POST['id_penghasilan'],
            $_POST['id_kelas'],
            $_POST['biaya']
        );
        header('Location: ftc_murid.php');
    }

    elseif(isset($_GET['edit']) || isset($_GET['lihat'])) {
        $murid = semua_ftc_murid();
        $penghasilan = semua_ftc_penghasilan();
        $kelas = semua_ftc_kelas();
        if(isset($_GET['edit'])) { $murid_edit = ambil_murid($_GET['edit']); }
        else if(isset($_GET['lihat'])) { $murid_edit = ambil_murid($_GET['lihat']); }
        $judul_halaman = "Edit Data Murid";
        require_once 'view/v_ftc_murid_tambah.php';
    }

    elseif(isset($_GET['hapus'])) {
        hapus_ftc_murid($_GET['hapus']);
        header('Location: ftc_murid.php');
    }

    else {
        $murid = semua_ftc_murid();
        $penghasilan = semua_ftc_penghasilan();
        $kelas = semua_ftc_kelas();
        $judul_halaman = "Tambah Data Murid";
        require 'view/v_ftc_murid_tambah.php';
    }

}

else header('Location: index.php');