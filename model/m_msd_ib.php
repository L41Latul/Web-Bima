<?php
require_once 'librari/konfigurasi.php';
require_once 'librari/librari.php';
require_once 'm_msd.php';
require_once 'm_jenis.php';


$pdo = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);


$select = "SELECT m.id_ib, nama_ib, m.alamat, m.no_telp, m.email, m.pin_bb, b.bank, count(c.id_client) as jumlah_client FROM msd_ib m LEFT JOIN bank b on m.id_bank = b.id_bank LEFT JOIN msd_client c ON m.id_ib = c.id_ib";
$where = ' WHERE TRUE';
$order = ' ORDER BY nama_ib asc';
$group = ' GROUP BY m.id_ib';
$opts = isset($_POST['filterOpts'])? $_POST['filterOpts'] : array('');


$bank = semua_bank();
foreach($bank as $b){
    $c = $b['id_bank'];
    if (in_array("bank".$c, $opts)) {
        $where .= " AND m.id_bank = '$c'";
    }
}


if (isset($_POST['f_nama'])){
    $where .=" AND nama_ib LIKE '%".$_POST['f_nama']."%'";
}

if (isset($_POST['f_alamat'])){
    $where .=" AND alamat LIKE '%".$_POST['f_alamat']."%'";
}

if (isset($_POST['f_telp'])){
    $where .=" AND no_telp LIKE '%".$_POST['f_telp']."%'";
}

if (isset($_POST['f_email'])){
    $where .=" AND email LIKE '%".$_POST['f_email']."%'";
}

if (isset($_POST['f_bb'])){
    $where .=" AND pin_bb LIKE '%".$_POST['f_bb']."%'";
}

if (isset($_POST['f_web'])){
    $where .=" AND website LIKE '%".$_POST['f_web']."%'";
}


$sql = $select . $where . $group . $order;
$statement = $pdo->prepare($sql);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$counts = $statement->rowCount();

$json = json_encode($results);
echo '{"msd_ib":'.json_encode($results).',  "jumlah" : '.$counts.',  "query" : " '.$sql.'"}';
?>