<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_user.php';
require_once 'model/m_autentikasi.php';

$us = profil();
$level = $us['level'];

if (!(is_logged_in()))  header('Location: login.php');

else if(!(strpos($level,'1')))   header('Location: index.php');

else {
    if(isset($_POST['username']) && $_POST['id_user']) {
        $akses = "";
        foreach($_POST['level'] as $selected) {
            $akses .= "-".$selected;
        }

        if($_POST['password1'] == "") $pass1 = "1";
        else $pass1 = $_POST['password1'];
        if($_POST['password2'] == "") $pass2 = "1";
        else $pass2 = $_POST['password2'];

        update_user(
            $_POST['id_user'],
            $_POST['username'],
            $pass1,
            $pass2,
            $_POST['nama'],
            $_POST['email'],
            $akses
        );
        if((strpos($level,'1')))  header('Location: user.php');
        else header('Location: index.php');
    }

    elseif(isset($_GET['edit'])) {
        if((strpos($level,'1')) || $_GET['edit'] == $us['id_user']) {
            $user_edit = ambil_user($_GET['edit']);
            $akses = semua_akses();
            $judul_halaman = "Edit User";
            require_once 'view/v_user_tambah.php';
        } else header('Location: index.php');
    }

    elseif(isset($_POST['username'])) {
        $akses = "";
        foreach($_POST['level'] as $selected) {
            $akses .= "-".$selected;
        }
        registrasi(
            $_POST['username'],
            $_POST['password1'],
            $_POST['password2'],
            $_POST['nama'],
            $_POST['email'],
            $akses
        );
        header('Location: user.php');
    }

    elseif(isset($_GET['hapus'])) {
        hapus_user($_GET['hapus']);
        header('Location: user.php');

    } else {
        if(!(strpos($level,'1'))) header('Location: index.php');
        $user = semua_user();
        $akses = semua_akses();
        $judul_halaman = "Tambah Tipe User";
        require 'view/v_user_tambah.php';
    }
}