<?php

// fungsi untuk menambah kiriman baru
function tambah_ftc_penghasilan($penghasilan){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    $kode= kdauto("ftc_penghasilan","P");

    $statement = $db->prepare('INSERT INTO ftc_penghasilan (id_penghasilan, penghasilan)
                                      VALUES (:id_penghasilan, :penghasilan)');
    $statement->execute(array(':id_penghasilan' => $kode, ':penghasilan' => $penghasilan));
}

// fungsi untuk mengambil semua kiriman yang ada di basis data
function semua_ftc_penghasilan() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM ftc_penghasilan ORDER BY id_penghasilan asc');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk menghapus kiriman
function hapus_ftc_penghasilan($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM ftc_penghasilan WHERE id_penghasilan = :id');
    $statement->execute(array(':id'=>$id));
}

// fungsi untuk mengambil sebuah kiriman dari basis data sesuai id kiriman
function ambil_penghasilan($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM ftc_penghasilan WHERE id_penghasilan = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk mengubah kiriman
function update_penghasilan($id,$penghasilan) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('UPDATE ftc_penghasilan
                                  SET penghasilan = :penghasilan
                                  WHERE id_penghasilan = :id');
    $statement->execute(array(  ':id' => $id,
        ':penghasilan' => $penghasilan));
    return $statement->rowCount();
}



// fungsi untuk menambah kiriman baru
function tambah_ftc_kelas($kelas){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    $kode= kdauto("ftc_kelas","K");

    $statement = $db->prepare('INSERT INTO ftc_kelas (id_kelas, tipe_kelas)
                                      VALUES (:id_kelas, :kelas)');
    $statement->execute(array(':id_kelas' => $kode, ':kelas' => $kelas));
}

// fungsi untuk mengambil semua kiriman yang ada di basis data
function semua_ftc_kelas() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM ftc_kelas ORDER BY id_kelas asc');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk menghapus kiriman
function hapus_ftc_kelas($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM ftc_kelas WHERE id_kelas = :id');
    $statement->execute(array(':id'=>$id));
}

// fungsi untuk mengambil sebuah kiriman dari basis data sesuai id kiriman
function ambil_kelas($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM ftc_kelas WHERE id_kelas = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk mengubah kiriman
function update_kelas($id,$kelas) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('UPDATE ftc_kelas
                                  SET tipe_kelas = :kelas
                                  WHERE id_kelas = :id');
    $statement->execute(array(  ':id' => $id,
        ':kelas' => $kelas));
    return $statement->rowCount();
}


// fungsi untuk menambah kiriman baru
function tambah_ftc_murid($tgl, $bln, $thn, $nama, $tempat_lahir, $tgl2, $bln2, $thn2, $alamat, $no_telp, $email, $pin_bb, $pekerjaan, $id_penghasilan, $id_kelas, $biaya){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    $kode= kdauto("ftc_murid","MR");
    $tgl_reg = $thn."-".$bln."-".$tgl;
    $tgl_lhr = $thn2."-".$bln2."-".$tgl2;

    $statement = $db->prepare('INSERT INTO ftc_murid
                                VALUES (:id_murid, :tgl_registrasi, :nama, :tempat_lahir, :tgl_lahir, :alamat, :no_telp, :email, :pin_bb, :pekerjaan, :id_penghasilan, :id_kelas, :biaya)');
    $statement->execute(array(
        ':id_murid' => $kode,
        ':tgl_registrasi' => $tgl_reg,
        ':nama' => $nama,
        ':tempat_lahir' => $tempat_lahir,
        ':tgl_lahir' => $tgl_lhr,
        ':alamat' => $alamat,
        ':no_telp' => $no_telp,
        ':email' => $email,
        ':pin_bb' => $pin_bb,
        ':pekerjaan' => $pekerjaan,
        ':id_penghasilan' => $id_penghasilan,
        ':id_kelas' => $id_kelas,
        ':biaya' => $biaya
    ));
}

// fungsi untuk mengambil semua kiriman yang ada di basis data
function semua_ftc_murid() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM ftc_murid m
                                LEFT JOIN ftc_penghasilan p on m.id_penghasilan = p.id_penghasilan
                                LEFT JOIN ftc_kelas k on m.id_kelas = k.id_kelas
                                ORDER BY id_murid asc');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk menghapus kiriman
function hapus_ftc_murid($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM ftc_murid WHERE id_murid = :id');
    $statement->execute(array(':id'=>$id));
}

// fungsi untuk mengambil sebuah kiriman dari basis data sesuai id kiriman
function ambil_murid($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM ftc_murid m
                                LEFT JOIN ftc_penghasilan p on m.id_penghasilan = p.id_penghasilan
                                LEFT JOIN ftc_kelas k on m.id_kelas = k.id_kelas
                                WHERE id_murid = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk mengubah kiriman
function update_murid($id_murid, $tgl, $bln, $thn, $nama, $tempat_lahir, $tgl2, $bln2, $thn2, $alamat, $no_telp, $email, $pin_bb, $pekerjaan, $id_penghasilan, $id_kelas, $biaya) {

    $tgl_reg = $thn."-".$bln."-".$tgl;
    $tgl_lhr = $thn2."-".$bln2."-".$tgl2;
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('UPDATE ftc_murid
                                  SET
                                    tgl_registrasi = :tgl_registrasi,
                                    nama = :nama,
                                    tempat_lahir = :tempat_lahir,
                                    tgl_lahir = :tgl_lahir,
                                    alamat = :alamat,
                                    no_telp = :no_telp,
                                    email = :email,
                                    pin_bb = :pin_bb,
                                    pekerjaan = :pekerjaan,
                                    id_penghasilan = :id_penghasilan,
                                    id_kelas = :id_kelas,
                                    biaya = :biaya
                                  WHERE id_murid = :id_murid');
    $statement->execute(array(
        ':id_murid' => $id_murid,
        ':tgl_registrasi' => $tgl_reg,
        ':nama' => $nama,
        ':tempat_lahir' => $tempat_lahir,
        ':tgl_lahir' => $tgl_lhr,
        ':alamat' => $alamat,
        ':no_telp' => $no_telp,
        ':email' => $email,
        ':pin_bb' => $pin_bb,
        ':pekerjaan' => $pekerjaan,
        ':id_penghasilan' => $id_penghasilan,
        ':id_kelas' => $id_kelas,
        ':biaya' => $biaya));
    return $statement->rowCount();
}

