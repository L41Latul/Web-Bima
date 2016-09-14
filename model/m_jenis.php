<?php

// fungsi untuk menambah kiriman baru
function tambah_bank($bank){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    $kode= kdauto("bank","B");

    $statement = $db->prepare('INSERT INTO bank (id_bank, bank)
                                      VALUES (:id_bank, :bank)');
    $statement->execute(array(':id_bank' => $kode, ':bank' => $bank));
}

// fungsi untuk mengambil semua kiriman yang ada di basis data
function semua_bank() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM bank ORDER BY id_bank asc');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk menghapus kiriman
function hapus_bank($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM bank WHERE id_bank = :id');
    $statement->execute(array(':id'=>$id));
}

// fungsi untuk mengambil sebuah kiriman dari basis data sesuai id kiriman
function ambil_bank($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM bank WHERE id_bank = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk mengubah kiriman
function update_bank($id,$bank) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('UPDATE bank
                                  SET bank = :bank
                                  WHERE id_bank = :id');
    $statement->execute(array(  ':id' => $id,
        ':bank' => $bank));
    return $statement->rowCount();
}



// fungsi untuk menambah kiriman baru
function tambah_jenis_transaksi($jenis_transaksi){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    $kode= kdauto("jenis_transaksi","B");

    $statement = $db->prepare('INSERT INTO jenis_transaksi (id_jenis_transaksi, jenis_transaksi)
                                      VALUES (:id_jenis_transaksi, :jenis_transaksi)');
    $statement->execute(array(':id_jenis_transaksi' => $kode, ':jenis_transaksi' => $jenis_transaksi));
}

// fungsi untuk mengambil semua kiriman yang ada di basis data
function semua_jenis_transaksi() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM jenis_transaksi ORDER BY id_jenis_transaksi asc');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk menghapus kiriman
function hapus_jenis_transaksi($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM jenis_transaksi WHERE id_jenis_transaksi = :id');
    $statement->execute(array(':id'=>$id));
}

// fungsi untuk mengambil sebuah kiriman dari basis data sesuai id kiriman
function ambil_jenis_transaksi($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM jenis_transaksi WHERE id_jenis_transaksi = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk mengubah kiriman
function update_jenis_transaksi($id,$jenis_transaksi) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('UPDATE jenis_transaksi
                                  SET jenis_transaksi = :jenis_transaksi
                                  WHERE id_jenis_transaksi = :id');
    $statement->execute(array(  ':id' => $id,
        ':jenis_transaksi' => $jenis_transaksi));
    return $statement->rowCount();
}




// fungsi untuk menambah kiriman baru
function tambah_tipe_akun($tipe_akun){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    $kode= kdauto("tipe_akun","B");

    $statement = $db->prepare('INSERT INTO tipe_akun (id_tipe_akun, tipe_akun)
                                      VALUES (:id_tipe_akun, :tipe_akun)');
    $statement->execute(array(':id_tipe_akun' => $kode, ':tipe_akun' => $tipe_akun));
}

// fungsi untuk mengambil semua kiriman yang ada di basis data
function semua_tipe_akun() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM tipe_akun ORDER BY id_tipe_akun asc');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk menghapus kiriman
function hapus_tipe_akun($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM tipe_akun WHERE id_tipe_akun = :id');
    $statement->execute(array(':id'=>$id));
}

// fungsi untuk mengambil sebuah kiriman dari basis data sesuai id kiriman
function ambil_tipe_akun($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM tipe_akun WHERE id_tipe_akun = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk mengubah kiriman
function update_tipe_akun($id,$tipe_akun) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('UPDATE tipe_akun
                                  SET tipe_akun = :tipe_akun
                                  WHERE id_tipe_akun = :id');
    $statement->execute(array(  ':id' => $id,
        ':tipe_akun' => $tipe_akun));
    return $statement->rowCount();
}


// fungsi untuk menambah kiriman baru
function tambah_komisi($komisi){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    $kode= kdauto("komisi","K");

    $statement = $db->prepare('INSERT INTO komisi (id_komisi, komisi)
VALUES (:id_komisi, :komisi)');
    $statement->execute(array(':id_komisi' => $kode, ':komisi' => $komisi));
}

// fungsi untuk mengambil semua kiriman yang ada di basis data
function semua_komisi() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM komisi ORDER BY id_komisi asc');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk menghapus kiriman
function hapus_komisi($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM komisi WHERE id_komisi = :id');
    $statement->execute(array(':id'=>$id));
}

// fungsi untuk mengambil sebuah kiriman dari basis data sesuai id kiriman
function ambil_komisi($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM komisi WHERE id_komisi = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk mengubah kiriman
function update_komisi($id,$komisi) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('UPDATE komisi
SET komisi = :komisi
WHERE id_komisi = :id');
    $statement->execute(array(  ':id' => $id,
        ':komisi' => $komisi));
    return $statement->rowCount();
}

