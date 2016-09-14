<?php
require_once 'librari/konfigurasi.php';
require_once 'librari/librari.php';
require_once 'm_msd.php';
require_once 'm_jenis.php';


$pdo = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);


$select = "SELECT id_client, DATE_FORMAT(tgl_daftar, '%d-%m-%Y') AS PerDate, no_akun, nama, m.alamat, m.no_telp, m.email, tipe_akun, nama_ib, b.bank, komisi FROM msd_client m LEFT JOIN bank b ON m.id_bank = b.id_bank LEFT JOIN tipe_akun t ON m.id_tipe_akun = t.id_tipe_akun LEFT JOIN msd_ib i ON m.id_ib = i.id_ib LEFT JOIN komisi k ON m.id_komisi = k.id_komisi";
$where = ' WHERE TRUE';
$order = ' ORDER BY id_client asc';
$opts = isset($_POST['filterOpts'])? $_POST['filterOpts'] : array('');


$bank = semua_bank();
foreach($bank as $b){
    $c = $b['id_bank'];
    if (in_array("bank".$c, $opts)) {
        $where .= " AND m.id_bank = '$c'";
    }
}
$tipe_akun = semua_tipe_akun();
foreach($tipe_akun as $b){
    $c = $b['id_tipe_akun'];
    if (in_array("akun".$c, $opts)) {
        $where .= " AND m.id_tipe_akun = '$c'";
    }
}

for($a=2010; $a<=2018; $a++){
    if (in_array(strval("thna".$a), $opts)) {
        $where .=" AND year(m.tgl_daftar) = $a";
    }
}

for($a=1; $a<=12; $a++){
    if (in_array(strval("blna".$a), $opts)) {
        $where .=" AND month(m.tgl_daftar) = $a";
    }
}

for($a=1; $a<=31; $a++){
    if (in_array(strval("tgla".$a), $opts)) {
        $where .=" AND day(m.tgl_daftar) = $a";
    }
}

if (isset($_POST['f_nama'])){
    $where .=" AND m.nama LIKE '%".$_POST['f_nama']."%'";
}

if (isset($_POST['f_alamat'])){
    $where .=" AND m.alamat LIKE '%".$_POST['f_alamat']."%'";
}

if (isset($_POST['f_email'])){
    $where .=" AND m.email LIKE '%".$_POST['f_email']."%'";
}

if (isset($_POST['f_ib'])){
    $where .=" AND nama_ib LIKE '%".$_POST['f_ib']."%'";
}


$sql = $select . $where . $order;
$statement = $pdo->prepare($sql);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$counts = $statement->rowCount();

$json = json_encode($results);
echo '{"msd_client":'.json_encode($results).',  "jumlah" : '.$counts.',  "query" : " '.$sql.'"}';
?>