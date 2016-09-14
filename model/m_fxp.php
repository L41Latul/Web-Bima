<?php

// fungsi untuk menambah kiriman baru
function tambah_fxp_ib($nama, $alamat, $no_telp, $email, $pin_bb, $id_bank, $no_rek, $website, $scan_id){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    $kode= kdauto("fxp_ib","FXI");
    upload_file();

    $statement = $db->prepare('INSERT INTO fxp_ib
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
function update_fxp_ib($id_ib, $nama, $alamat, $no_telp, $email, $pin_bb, $id_bank, $no_rek, $website, $foto2, $foto_hid){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    if($foto2==""){
        $scan_id = $foto_hid;
    }else{
        upload_file();
        $scan_id = $foto2;
    }

    $statement = $db->prepare('UPDATE fxp_ib
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
function semua_fxp_ib() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM fxp_ib m
                                LEFT JOIN bank b on m.id_bank = b.id_bank
                                ORDER BY id_ib asc');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk menghapus kiriman
function hapus_fxp_ib($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM fxp_ib WHERE id_ib = :id');
    $statement->execute(array(':id'=>$id));
}

// fungsi untuk mengambil sebuah kiriman dari basis data sesuai id kiriman
function ambil_fxp_ib($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM fxp_ib m
                                LEFT JOIN bank b on m.id_bank = b.id_bank
                                WHERE id_ib = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}


// fungsi untuk menambah kiriman baru
function tambah_fxp_client($tgl, $bln, $thn, $nama, $no_akun, $alamat, $no_telp, $email, $id_bank, $no_rek, $id_tipe_akun, $id_ib, $scan_id, $password, $phone_password, $pin){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    $kode= kdauto("fxp_client","FXC");
    $tgl_reg = $thn."-".$bln."-".$tgl;
    upload_file();

    $statement = $db->prepare('INSERT INTO fxp_client
                                VALUES (:id_client, :tgl_daftar, :nama, :no_akun, :alamat, :no_telp, :email, :id_bank, :no_rek, :id_tipe_akun, :id_ib, :scan_id, :password, :phone_password, :pin)');
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
        ':id_ib' => $id_ib,
        ':scan_id' => $scan_id,
        ':password' => $password,
        ':phone_password' => $phone_password,
        ':pin' => $pin
    ));
}

// fungsi untuk mengubah kiriman
function update_fxp_client($id_client, $tgl, $bln, $thn, $nama, $no_akun, $alamat, $no_telp, $email, $id_bank, $no_rek, $id_tipe_akun, $id_ib, $foto2, $foto_hid, $password, $phone_password, $pin) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    if($foto2==""){
        $scan_id = $foto_hid;
    }else{
        upload_file();
        $scan_id = $foto2;
    }
    $tgl_reg = $thn."-".$bln."-".$tgl;
    $statement = $db->prepare('UPDATE fxp_client
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
                                    id_ib = :id_ib,
                                    scan_id = :scan_id,
                                    password = :password,
                                    phone_password = :phone_password,
                                    pin = :pin
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
        ':id_ib' => $id_ib,
        ':scan_id' => $scan_id,
        ':password' => $password,
        ':phone_password' => $phone_password,
        ':pin' => $pin));
    return $statement->rowCount();
}

// fungsi untuk mengambil semua kiriman yang ada di basis data
function semua_fxp_client() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT id_client, tgl_daftar, no_akun, m.nama, m.alamat, m.no_telp, m.email, tipe_akun, nama_ib, b.bank
                                FROM fxp_client m
                                LEFT JOIN bank b ON m.id_bank = b.id_bank
                                LEFT JOIN tipe_akun t ON m.id_tipe_akun = t.id_tipe_akun
                                LEFT JOIN fxp_ib i ON m.id_ib = i.id_ib
                                ORDER BY id_client asc');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk menghapus kiriman
function hapus_fxp_client($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM fxp_client WHERE id_client = :id');
    $statement->execute(array(':id'=>$id));
}

// fungsi untuk mengambil sebuah kiriman dari basis data sesuai id kiriman
function ambil_fxp_client($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT id_client, tgl_daftar, no_akun, m.nama, m.alamat, m.no_telp, m.email, tipe_akun, m.id_tipe_akun, m.scan_id, m.no_rek, nama_ib, m.id_bank, b.bank, m.id_ib, password, phone_password, pin
                                FROM fxp_client m
                                LEFT JOIN bank b ON m.id_bank = b.id_bank
                                LEFT JOIN tipe_akun t ON m.id_tipe_akun = t.id_tipe_akun
                                LEFT JOIN fxp_ib i ON m.id_ib = i.id_ib
                                WHERE id_client = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}












// fungsi untuk menambah kiriman baru
function tambah_fxp_transaksi($id_jenis_transaksi, $tgl, $bln, $thn, $id_client, $jumlah_transaksi, $transfer_ke, $laba_rugi, $id_bank, $id_ib, $user){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    $kode= kdauto("fxp_transaksi","FXT");
    $tgl_reg = $thn."-".$bln."-".$tgl;

    $statement = $db->prepare('INSERT INTO fxp_transaksi
                                VALUES (:id_transaksi, :id_jenis_transaksi, :tgl_transaksi, :id_client, :jumlah_transaksi, :transfer_ke, :laba_rugi, :id_bank, :id_ib, :id_created, :id_modified)');
    $statement->execute(array(
        ':id_transaksi' => $kode,
        ':id_jenis_transaksi' => $id_jenis_transaksi,
        ':tgl_transaksi' => $tgl_reg,
        ':id_client' => $id_client,
        ':jumlah_transaksi' => $jumlah_transaksi,
        ':transfer_ke' => $transfer_ke,
        ':laba_rugi' => $laba_rugi,
        ':id_bank' => $id_bank,
        ':id_ib' => $id_ib,
        ':id_created' => $user,
        ':id_modified' => "0"
    ));
}

// fungsi untuk mengambil semua kiriman yang ada di basis data
function semua_fxp_transaksi() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT *
                                FROM fxp_transaksi m
                                LEFT JOIN jenis_transaksi jt ON m.id_jenis_transaksi = jt.id_jenis_transaksi
                                LEFT JOIN bank b ON m.id_bank = b.id_bank
                                LEFT JOIN fxp_client c ON m.id_client = c.id_client
                                LEFT JOIN fxp_ib i ON m.id_ib = i.id_ib
                                ORDER BY id_transaksi asc');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk menghapus kiriman
function hapus_fxp_transaksi($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM fxp_transaksi WHERE id_transaksi = :id');
    $statement->execute(array(':id'=>$id));
}

// fungsi untuk mengambil sebuah kiriman dari basis data sesuai id kiriman
function ambil_fxp_transaksi($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT *
                                FROM fxp_transaksi m
                                LEFT JOIN jenis_transaksi jt ON m.id_jenis_transaksi = jt.id_jenis_transaksi
                                LEFT JOIN bank b ON m.id_bank = b.id_bank
                                LEFT JOIN fxp_client c ON m.id_client = c.id_client
                                LEFT JOIN fxp_ib i ON m.id_ib = i.id_ib
                                WHERE id_transaksi = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk mengubah kiriman
function update_fxp_transaksi($id_transaksi, $id_jenis_transaksi, $tgl, $bln, $thn, $id_client, $jumlah_transaksi, $transfer_ke, $laba_rugi, $id_bank, $id_ib, $user) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    $tgl_reg = $thn."-".$bln."-".$tgl;
    $statement = $db->prepare('UPDATE fxp_transaksi
                                  SET
                                    id_transaksi = :id_transaksi,
                                    id_jenis_transaksi = :id_jenis_transaksi,
                                    tgl_transaksi = :tgl_transaksi,
                                    id_client = :id_client,
                                    jumlah_transaksi = :jumlah_transaksi,
                                    transfer_ke = :transfer_ke,
                                    laba_rugi = :laba_rugi,
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
        ':transfer_ke' => $transfer_ke,
        ':laba_rugi' => $laba_rugi,
        ':id_bank' => $id_bank,
        ':id_ib' => $id_ib,
        ':id_modified' => $user));
    return $statement->rowCount();
}