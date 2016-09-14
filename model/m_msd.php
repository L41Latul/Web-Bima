<?php

// fungsi untuk menambah kiriman baru
function tambah_msd_ib($nama, $alamat, $no_telp, $email, $pin_bb, $id_bank, $no_rek, $website, $scan_id){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    $kode= kdauto("msd_ib","MSI");
    upload_file();

    $statement = $db->prepare('INSERT INTO msd_ib
                                VALUES (:id_ib, :nama, :alamat, :no_telp, :email, :pin_bb, :id_bank, :no_rek, :website, :scan_id)');
    $statement->execute(array(
        ':id_ib' => $kode,
        ':nama' => $nama,
        ':alamat' => $alamat,
        ':no_telp' => $no_telp,
        ':email' => $email,
        ':pin_bb' => $pin_bb,
        ':id_bank' => $id_bank,
        ':no_rek' => $no_rek,
        ':website' => $website,
        ':scan_id' => $scan_id
    ));
}

// fungsi untuk mengubah kiriman
function update_msd_ib($id_ib, $nama, $alamat, $no_telp, $email, $pin_bb, $id_bank, $no_rek, $website, $foto2, $foto_hid) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    if($foto2==""){
        $scan_id = $foto_hid;
    }else{
        upload_file();
        $scan_id = $foto2;
    }
    $statement = $db->prepare('UPDATE msd_ib
                                  SET
                                    nama_ib = :nama,
                                    alamat = :alamat,
                                    no_telp = :no_telp,
                                    email = :email,
                                    pin_bb = :pin_bb,
                                    id_bank = :id_bank,
                                    no_rek = :no_rek,
                                    website = :website,
                                    scan_id = :scan_id
                                  WHERE id_ib = :id_ib');
    $statement->execute(array(
        ':id_ib' => $id_ib,
        ':nama' => $nama,
        ':alamat' => $alamat,
        ':no_telp' => $no_telp,
        ':email' => $email,
        ':pin_bb' => $pin_bb,
        ':id_bank' => $id_bank,
        ':no_rek' => $no_rek,
        ':website' => $website,
        ':scan_id' => $scan_id));
    return $statement->rowCount();
}

// fungsi untuk mengambil semua kiriman yang ada di basis data
function semua_msd_ib() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM msd_ib m
                                LEFT JOIN bank b on m.id_bank = b.id_bank
                                ORDER BY id_ib asc');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk menghapus kiriman
function hapus_msd_ib($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM msd_ib WHERE id_ib = :id');
    $statement->execute(array(':id'=>$id));
}

// fungsi untuk mengambil sebuah kiriman dari basis data sesuai id kiriman
function ambil_msd_ib($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM msd_ib m
                                LEFT JOIN bank b on m.id_bank = b.id_bank
                                WHERE id_ib = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}



// fungsi untuk menambah kiriman baru
function tambah_msd_client($tgl, $bln, $thn, $nama, $no_akun, $alamat, $no_telp, $email, $id_bank, $no_rek, $id_tipe_akun, $komisi, $id_ib, $scan_id){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    $kode= kdauto("msd_client","MSC");
    $tgl_reg = $thn."-".$bln."-".$tgl;
    upload_file();

    $statement = $db->prepare('INSERT INTO msd_client
                                VALUES (:id_client, :tgl_daftar, :nama, :no_akun, :alamat, :no_telp, :email, :id_bank, :no_rek, :id_tipe_akun, :komisi, :id_ib, :scan_id)');
    $statement->execute(array(
        ':id_client' => $kode,
        ':tgl_daftar' => $tgl_reg,
        ':nama' => $nama,
        ':no_akun' => $no_akun,
        ':alamat' => $alamat,
        ':no_telp' => $no_telp,
        ':email' => $email,
        ':id_bank' => $id_bank,
        ':no_rek' => $no_rek,
        ':id_tipe_akun' => $id_tipe_akun,
        ':komisi' => $komisi,
        ':id_ib' => $id_ib,
        ':scan_id' => $scan_id
    ));
}

// fungsi untuk mengubah kiriman
function update_msd_client($id_client, $tgl, $bln, $thn, $nama, $no_akun, $alamat, $no_telp, $email, $id_bank, $no_rek, $id_tipe_akun, $komisi, $id_ib, $foto2, $foto_hid) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    if($foto2==""){
        $scan_id = $foto_hid;
    }else{
        upload_file();
        $scan_id = $foto2;
    }

    $tgl_reg = $thn."-".$bln."-".$tgl;
    $statement = $db->prepare('UPDATE msd_client
                                  SET
                                    tgl_daftar = :tgl_daftar,
                                    nama = :nama,
                                    no_akun = :no_akun,
                                    alamat = :alamat,
                                    no_telp = :no_telp,
                                    email = :email,
                                    id_bank = :id_bank,
                                    no_rek = :no_rek,
                                    id_tipe_akun = :id_tipe_akun,
                                    id_komisi = :komisi,
                                    id_ib = :id_ib,
                                    scan_id = :scan_id
                                  WHERE id_client = :id_client');
    $statement->execute(array(
        ':id_client' => $id_client,
        ':tgl_daftar' => $tgl_reg,
        ':nama' => $nama,
        ':no_akun' => $no_akun,
        ':alamat' => $alamat,
        ':no_telp' => $no_telp,
        ':email' => $email,
        ':id_bank' => $id_bank,
        ':no_rek' => $no_rek,
        ':id_tipe_akun' => $id_tipe_akun,
        ':komisi' => $komisi,
        ':id_ib' => $id_ib,
        ':scan_id' => $scan_id));
    return $statement->rowCount();
}


// fungsi untuk mengambil semua kiriman yang ada di basis data
function semua_msd_client() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT id_client, tgl_daftar, no_akun, m.nama, m.alamat, m.no_telp, m.email, tipe_akun, nama_ib, b.bank
                                FROM msd_client m
                                LEFT JOIN bank b ON m.id_bank = b.id_bank
                                LEFT JOIN tipe_akun t ON m.id_tipe_akun = t.id_tipe_akun
                                LEFT JOIN msd_ib i ON m.id_ib = i.id_ib
                                LEFT JOIN komisi k ON m.id_komisi = k.id_komisi
                                ORDER BY id_client asc');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk menghapus kiriman
function hapus_msd_client($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM msd_client WHERE id_client = :id');
    $statement->execute(array(':id'=>$id));
}

// fungsi untuk mengambil sebuah kiriman dari basis data sesuai id kiriman
function ambil_msd_client($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT id_client, tgl_daftar, no_akun, m.nama, m.alamat, m.no_telp, m.email, tipe_akun, m.id_tipe_akun, m.scan_id, m.id_komisi, k.komisi, m.no_rek, nama_ib, m.id_bank, b.bank, m.id_ib
                                FROM msd_client m
                                LEFT JOIN bank b ON m.id_bank = b.id_bank
                                LEFT JOIN tipe_akun t ON m.id_tipe_akun = t.id_tipe_akun
                                LEFT JOIN msd_ib i ON m.id_ib = i.id_ib
                                LEFT JOIN komisi k ON m.id_komisi = k.id_komisi
                                WHERE id_client = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}





// fungsi untuk menambah kiriman baru
function tambah_msd_transaksi($id_jenis_transaksi, $tgl, $bln, $thn, $id_client, $jumlah_transaksi, $id_bank, $id_ib, $user){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    $kode= kdauto("msd_transaksi","MST");
    $tgl_reg = $thn."-".$bln."-".$tgl;

    $statement = $db->prepare('INSERT INTO msd_transaksi
                                VALUES (:id_transaksi, :id_jenis_transaksi, :tgl_transaksi, :id_client, :jumlah_transaksi, :id_bank, :id_ib, :id_created, :id_modified)');
    $statement->execute(array(
        ':id_transaksi' => $kode,
        ':id_jenis_transaksi' => $id_jenis_transaksi,
        ':tgl_transaksi' => $tgl_reg,
        ':id_client' => $id_client,
        ':jumlah_transaksi' => $jumlah_transaksi,
        ':id_bank' => $id_bank,
        ':id_ib' => $id_ib,
        ':id_created' => $user,
        ':id_modified' => "0"
    ));
}

// fungsi untuk mengambil semua kiriman yang ada di basis data
function query_msd_transaksi(){
    $select = 'SELECT *
        FROM msd_transaksi m
        LEFT JOIN jenis_transaksi jt ON m.id_jenis_transaksi = jt.id_jenis_transaksi
        LEFT JOIN bank b ON m.id_bank = b.id_bank
        LEFT JOIN msd_client c ON m.id_client = c.id_client
        LEFT JOIN msd_ib i ON m.id_ib = i.id_ib
        ';
    return $select;

}

// fungsi untuk mengambil semua kiriman yang ada di basis data
function semua_msd_transaksi() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT id_transaksi, tgl_transaksi, jt.jenis_transaksi, c.nama, b.bank, i.nama_ib, jumlah_transaksi
                                FROM msd_transaksi m
                                LEFT JOIN jenis_transaksi jt ON m.id_jenis_transaksi = jt.id_jenis_transaksi
                                LEFT JOIN bank b ON m.id_bank = b.id_bank
                                LEFT JOIN msd_client c ON m.id_client = c.id_client
                                LEFT JOIN msd_ib i ON m.id_ib = i.id_ib
                                ORDER BY tgl_transaksi asc');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function semua_msd_transaksi3() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT *
                                FROM msd_transaksi m
                                LEFT JOIN jenis_transaksi jt ON m.id_jenis_transaksi = jt.id_jenis_transaksi
                                LEFT JOIN bank b ON m.id_bank = b.id_bank
                                LEFT JOIN msd_client c ON m.id_client = c.id_client
                                LEFT JOIN msd_ib i ON m.id_ib = i.id_ib
                                ORDER BY tgl_transaksi asc');
    $statement->execute();
    return $statement->execute();
}

function semua_msd_transaksi2($select, $per_hal, $start) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    $limit = ' LIMIT ';
    $a = ', ';
    $sql2 = $select .$limit .$start .$a .$per_hal;
    $statement2 = $db->prepare($sql2);
    $statement2->execute(array());
    $results = $statement2->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

// fungsi untuk menghapus kiriman
function hapus_msd_transaksi($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM msd_transaksi WHERE id_transaksi = :id');
    $statement->execute(array(':id'=>$id));
}

// fungsi untuk mengambil sebuah kiriman dari basis data sesuai id kiriman
function ambil_msd_transaksi($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT *
                                FROM msd_transaksi m
                                LEFT JOIN jenis_transaksi jt ON m.id_jenis_transaksi = jt.id_jenis_transaksi
                                LEFT JOIN bank b ON m.id_bank = b.id_bank
                                LEFT JOIN msd_client c ON m.id_client = c.id_client
                                LEFT JOIN msd_ib i ON m.id_ib = i.id_ib
                                WHERE id_transaksi = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk mengubah kiriman
function update_msd_transaksi($id_transaksi, $id_jenis_transaksi, $tgl, $bln, $thn, $id_client, $jumlah_transaksi, $id_bank, $id_ib, $user) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    $tgl_reg = $thn."-".$bln."-".$tgl;
    $statement = $db->prepare('UPDATE msd_transaksi
                                  SET
                                    id_transaksi = :id_transaksi,
                                    id_jenis_transaksi = :id_jenis_transaksi,
                                    tgl_transaksi = :tgl_transaksi,
                                    id_client = :id_client,
                                    jumlah_transaksi = :jumlah_transaksi,
                                    id_bank = :id_bank,
                                    id_ib = :id_ib,
                                    id_modified = :id_modified
                                  WHERE id_transaksi = :id_transaksi');
    $statement->execute(array(
        ':id_transaksi' => $id_transaksi,
        ':id_jenis_transaksi' => $id_jenis_transaksi,
        ':tgl_transaksi' => $tgl_reg,
        ':id_client' => $id_client,
        ':jumlah_transaksi' => $jumlah_transaksi,
        ':id_bank' => $id_bank,
        ':id_ib' => $id_ib,
        ':id_modified' => $user));
    return $statement->rowCount();
}