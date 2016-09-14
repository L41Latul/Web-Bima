<?php
require_once 'librari/konfigurasi.php';
require_once 'librari/librari.php';
require_once 'm_ftc.php';


$pdo = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);


$select = "SELECT id_murid, DATE_FORMAT(tgl_registrasi, '%d-%m-%Y') AS PerDate, nama, alamat, no_telp, email as emaill, pin_bb, tipe_kelas, CONCAT('Rp. ', FORMAT(biaya, 0)) as biaya FROM ftc_murid m LEFT JOIN ftc_penghasilan p on m.id_penghasilan = p.id_penghasilan LEFT JOIN ftc_kelas k on m.id_kelas = k.id_kelas";
$where = ' WHERE TRUE';
$order = ' ORDER BY id_murid asc';
$opts = isset($_POST['filterOpts'])? $_POST['filterOpts'] : array(' ');


$penghasilan = semua_ftc_penghasilan();
foreach($penghasilan as $b){
    $c = $b['id_penghasilan'];
    if (in_array("penghasilan".$c, $opts)) {
        $where .= " AND m.id_penghasilan = '$c'";
    }
}

$kelas = semua_ftc_kelas();
foreach($kelas as $b){
    $c = $b['id_kelas'];
    if (in_array("kelas".$c, $opts)) {
        $where .= " AND m.id_kelas = '$c'";
    }
}

for($a=2010; $a<=2018; $a++){
    if (in_array(strval("thna".$a), $opts)) {
        $where .=" AND year(m.tgl_registrasi) = $a";
    }
}

for($a=1; $a<=12; $a++){
    if (in_array(strval("blna".$a), $opts)) {
        $where .=" AND month(m.tgl_registrasi) = $a";
    }
}

for($a=1; $a<=31; $a++){
    if (in_array(strval("tgla".$a), $opts)) {
        $where .=" AND day(m.tgl_registrasi) = $a";
    }
}

if (isset($_POST['filterMurid'])){
    $nama = $_POST['filterMurid'];
    $where .=" AND m.nama LIKE '$nama%'";
}

$sql = $select . $where . $order;
$statement = $pdo->prepare($sql);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$counts = $statement->rowCount();

$select2 = "select CONCAT('Rp. ', FORMAT(sum(biaya), 0)) as total_biaya FROM ftc_murid m LEFT JOIN ftc_penghasilan p on m.id_penghasilan = p.id_penghasilan LEFT JOIN ftc_kelas k on m.id_kelas = k.id_kelas";
$sql2 = $select2 . $where;
$statement2 = $pdo->prepare($sql2);
$statement2->execute();
$results2 = $statement2->fetchAll(PDO::FETCH_ASSOC);

echo '{"murid":'.json_encode($results).',  "jumlah" : '.$counts.',  "sums":'.json_encode($results2).',  "query" : " '.$sql.'"}';
?>