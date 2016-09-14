<?php
require_once 'librari/konfigurasi.php';
require_once 'librari/librari.php';
require_once 'm_msd.php';
require_once 'm_jenis.php';


$pdo = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);


$select = "SELECT id_transaksi, DATE_FORMAT(tgl_transaksi, '%d - %m - %Y') AS PerDate, jt.jenis_transaksi, c.no_akun, c.nama, b.bank, i.nama_ib, CONCAT('Rp. ', FORMAT(jumlah_transaksi, 0)) as jumlah FROM msd_transaksi m LEFT JOIN jenis_transaksi jt ON m.id_jenis_transaksi = jt.id_jenis_transaksi LEFT JOIN bank b ON m.id_bank = b.id_bank LEFT JOIN msd_client c ON m.id_client = c.id_client LEFT JOIN msd_ib i ON m.id_ib = i.id_ib";
$where = ' WHERE TRUE';
$order = ' ORDER BY tgl_transaksi, id_transaksi asc';
$opts = isset($_POST['filterOpts'])? $_POST['filterOpts'] : array('');

$jenis_transaksi = semua_jenis_transaksi();
foreach($jenis_transaksi as $b){
    $c = $b['id_jenis_transaksi'];
    if (in_array("transaksi".$c, $opts)) {
        $where .= " AND m.id_jenis_transaksi = '".$c."'";
    }
}

$bank = semua_bank();
foreach($bank as $b){
    $c = $b['id_bank'];
    if (in_array("bank".$c, $opts)) {
        $where .= " AND m.id_bank = '$c'";
    }
}

for($a=2010; $a<=2018; $a++){
    if (in_array(strval("thna".$a), $opts)) {
        $where .=" AND year(m.tgl_transaksi) = $a";
    }
}

for($a=1; $a<=12; $a++){
    if (in_array(strval("blna".$a), $opts)) {
        $where .=" AND month(m.tgl_transaksi) = $a";
    }
}

for($a=1; $a<=31; $a++){
    if (in_array(strval("tgla".$a), $opts)) {
        $where .=" AND day(m.tgl_transaksi) = $a";
    }
}

if (in_array("jumlah1", $opts)) {
    $where .=" AND m.jumlah_transaksi <= 200000";
}
if (in_array("jumlah2", $opts)) {
    $where .=" AND m.jumlah_transaksi > 200000 AND m.jumlah_transaksi <= 300000";
}
if (in_array("jumlah3", $opts)) {
    $where .=" AND m.jumlah_transaksi > 300000 AND m.jumlah_transaksi <= 400000";
}
if (in_array("jumlah4", $opts)) {
    $where .=" AND m.jumlah_transaksi > 400000 AND m.jumlah_transaksi <= 500000";
}
if (in_array("jumlah5", $opts)) {
    $where .=" AND m.jumlah_transaksi > 500000 AND m.jumlah_transaksi <= 700000";
}
if (in_array("jumlah6", $opts)) {
    $where .=" AND m.jumlah_transaksi > 700000 AND m.jumlah_transaksi <= 1000000";
}
if (in_array("jumlah7", $opts)) {
    $where .=" AND m.jumlah_transaksi > 1000000";
}

if (isset($_POST['filterKlien'])){
    $klien = $_POST['filterKlien'];
    $where .=" AND c.nama LIKE '$klien%'";
}

if (isset($_POST['filterIb'])){
    $ib = $_POST['filterIb'];
    $where .=" AND i.nama_ib LIKE '%$ib%'";
}

$sql = $select . $where . $order;
$statement = $pdo->prepare($sql);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$counts = $statement->rowCount();

$select2 = "select jenis_transaksi, CONCAT('Rp. ', FORMAT(sum(jumlah_transaksi), 0)) as jml FROM msd_transaksi m LEFT JOIN jenis_transaksi jt ON m.id_jenis_transaksi = jt.id_jenis_transaksi LEFT JOIN bank b ON m.id_bank = b.id_bank LEFT JOIN msd_client c ON m.id_client = c.id_client LEFT JOIN msd_ib i ON m.id_ib = i.id_ib";
$groupby = " group by jenis_transaksi";
$sql2 = $select2 . $where .$groupby;
$statement2 = $pdo->prepare($sql2);
$statement2->execute();
$results2 = $statement2->fetchAll(PDO::FETCH_ASSOC);

$json = json_encode($results);
echo '{"users":'.json_encode($results).',  "jumlah" : '.$counts.',  "sums":'.json_encode($results2).',  "query" : " '.$sql.'"}';
?>