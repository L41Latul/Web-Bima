<?php

function tulisan_sendiri_frm($id,$penulis) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT id_user FROM forum
                                WHERE id_forum = :id AND id_user = :penulis');
    $statement->execute(array(':id' => $id, ':penulis' => $penulis));
    if($statement->rowCount()) {
        return true;
    } else {
        return false;
    }
}
// fungsi untuk mengambil semua kiriman yang ada di basis data
function semua_forum() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM forum f, user u WHERE u.id_user = f.id_user ORDER BY id_forum desc');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk menambah forum baru
function tambah_forum($judul,$isi,$file,$tag,$status){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    $us = profil();

    $id = $us['id_user'];
    upload_file();
    $tgl = ".date('Y-M-D').";


    $statement = $db->prepare('INSERT INTO forum (judul_forum, isi_forum, date_forum, status, id_user, file_forum, tag)
                                      VALUES (:judul, :isi, :tanggal, :status, :id_user, :file, :tag)');
    $statement->execute(array(  ':judul' => $judul,
                                ':isi' => $isi,
                                ':tanggal' => $tgl,
                                ':status' => $status,
                                ':id_user' => $id,
                                ':file' => $file,
                                ':tag' => $tag));
    move_uploaded_file($source,$direktori);
}

function hapus_semua($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM komen_umum WHERE id_forum = :id');
    $statement->execute(array(':id'=>$id_forum));
    // forum juga ikut dihapus jika komen dihapus
    $statement = $db->prepare('DELETE FROM komen_forum WHERE id_komen_umum = :id');
    $statement->execute(array(':id'=>$id_komen_umum));
}

function hapus_forum($id_forum) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM forum WHERE id_forum = :id');
    $statement->execute(array(':id'=>$id_forum));
    return $statement->rowCount();
}

}

function view_forum2($id_forum) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM forum WHERE id_forum = :id');
    $statement->execute(array(':id' => $id_forum));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function update_forum($id_forum,$judul,$isi,$tag,$status,$foto2,$foto_hid) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    if($foto2==""){
        $foto = $foto_hid;
    }else{
        upload_file();
        $foto = $foto2;
    }
    $statement = $db->prepare('UPDATE forum
                                  SET judul_forum = :judul,
                                      isi_forum = :isi,
                                      status = :status,
                                      tag = :tag,
                                      file_forum = :foto
                                  WHERE id_forum = :id');
    $statement->execute(array(  ':id' => $id_forum,
        ':judul' => $judul,
        ':status' => $status,
        ':tag' => $tag,
        ':foto' => $foto,
        ':isi' => $isi));
    return $statement->rowCount();
}



function tambah_komentar($id_forum,$isi) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $waktu = date('Y-m-d H:i:s');
    $komentator = profil();
    $statement = $db->prepare('INSERT INTO komen_forum (id_forum, isi_komen, date_komen, id_user)
                                    VALUES (:id_forum, :isi, :waktu, :komentator)');
    $statement->execute(array(  ':id_forum' => $id_forum,
                                ':isi' => $isi,
                                ':waktu' => $waktu,
                                ':komentator' => $komentator['id_user']));
}

function hapus_komen_all($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM komen_forum WHERE id_forum = :id');
    $statement->execute(array(':id'=>$id));
    return $statement->rowCount();
}

function hapus_komentar($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM komen_forum WHERE id_komen = :id');
    $statement->execute(array(':id'=>$id));
    return $statement->rowCount();
}

function ambil_komentar($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM komen_forum WHERE id_komen = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function semua_komentar($id_forum) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM komen_forum WHERE id_forum = :id_forum');
    $statement->execute(array(':id_forum'=>$id_forum));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function ubah_komentar($komen,$id){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('UPDATE komen_forum
                                  SET isi_komen = :isi_komen
                                  WHERE id_komen = :id_komen');
    $statement->execute(array(':isi_komen' => $komen, ':id_komen' => $id));
    return $statement->rowCount();
}