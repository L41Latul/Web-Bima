<?php

require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_autentikasi.php';
require_once 'model/m_user.php';

if (is_logged_in()) {
    header('Location: index.php');
}

elseif(isset($_POST['username']) && isset($_POST['password'])) {
    if(registrasi($_POST['username'], $_POST['password'], $_POST['nama'], $_POST['email'], $_POST['level'], $_POST['deskripsi'])) {
        header('Location: index.php');
    } else {
        header('Location: login.php#toregister');
    }
}

else {
    $judul_halaman = "Registrasi Anggota";
    require 'view/v_registrasi.php';
}
