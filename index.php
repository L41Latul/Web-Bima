<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_user.php';
require_once 'model/m_autentikasi.php';


if (!(is_logged_in())) {
    header('Location: login.php');
}

else {

// view/v_index.php di-require setelah variabel $sk didefinisikan di atasnya.
// karena view/v_index membutuhkan variabel $sk untuk ditampilkan.
    $judul_halaman = "FTC (Fibbonacci Training Center) Management";
    require 'view/v_index.php';
}

?>
