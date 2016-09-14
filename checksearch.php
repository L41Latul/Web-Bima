<?php
require_once 'model/librari/konfigurasi.php';
require_once 'model/librari/librari.php';
require_once 'model/m_msd.php';
require_once 'model/m_jenis.php';


$pdo = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);


$select = 'SELECT id_transaksi, tgl_transaksi, jt.jenis_transaksi, c.nama, b.bank, i.nama_ib, jumlah_transaksi
                                FROM msd_transaksi m
                                LEFT JOIN jenis_transaksi jt ON m.id_jenis_transaksi = jt.id_jenis_transaksi
                                LEFT JOIN bank b ON m.id_bank = b.id_bank
                                LEFT JOIN msd_client c ON m.id_client = c.id_client
                                LEFT JOIN msd_ib i ON m.id_ib = i.id_ib';
$where = ' WHERE TRUE';
$order = ' ORDER BY id_transaksi asc';
$opts = isset($_POST['filterOpts'])? $_POST['filterOpts'] : array('');


$jenis_transaksi = semua_jenis_transaksi();

foreach($jenis_transaksi as $b){
    $c = $b['id_jenis_transaksi'];
    if (in_array("transaksi".$c, $opts)) {
        $where .= " AND m.id_jenis_transaksi = '$c'";
    }
}
$bank = semua_bank();
foreach($bank as $b){
    $c = $b['id_bank'];
    if (in_array("bank".$c, $opts)) {
        $where .= " AND m.id_bank = '$c'";
    }
}

$client = semua_msd_client();
foreach($client as $b){
    $c = $b['id_client'];
    if (in_array("client".$c, $opts)) {
        $where .= " AND m.id_client = '$c'";
    }
}

$msd_ib = semua_msd_ib();
foreach($msd_ib as $b){
    $c = $b['id_ib'];
    if (in_array("ib".$c, $opts)) {
        $where .= " AND m.id_ib = '$c'";
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

$sql = $select . $where . $order;
$statement = $pdo->prepare($sql);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo '{"users":'.json_encode($results).'}';
?>