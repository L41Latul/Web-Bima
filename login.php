<?php

require_once 'model/librari/konfigurasi.php';
require_once 'model/m_autentikasi.php';


if(is_logged_in())  header('Location: index.php');

elseif(isset($_POST['username']) && isset($_POST['password'])) {
    if(login($_POST['username'],$_POST['password'])) {
        header('Location: index.php');
    }
    else header('Location: login.php');
}

else {
    $judul_halaman = "Login";
    require 'view/v_login.php';
}

?>