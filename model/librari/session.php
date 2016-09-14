<?php
session_start();
$USERPLG = $_SESSION['USER'];
$UIDPLG = $_SESSION['ID'];

if (empty($_SESSION['USER']) || empty($_SESSION['ID'])){
  echo "Untuk mengakses modul, Anda harus login ";
}
?>
