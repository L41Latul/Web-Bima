<?php
//paging
$db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

$where = ' WHERE TRUE';
$order = ' ORDER BY id_transaksi asc';
$sql = $select . $where . $order;

$statement = $db->prepare($sql);
$statement->execute();
$jumlah_record = $statement->rowCount();

$per_hal = 5;
$halaman = ceil($jumlah_record/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
