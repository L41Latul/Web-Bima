<?php

// fungsi untuk menghapus kiriman
function hapus_kiriman($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM kiriman WHERE id = :id');
    $statement->execute(array(':id'=>$id));
	// komentar juga ikut dihapus jika kiriman dihapus
    $statement = $db->prepare('DELETE FROM komentar WHERE id_kiriman = :id');
    $statement->execute(array(':id'=>$id));
}

// fungsi untuk mengambil semua kiriman yang ada di basis data
function semua_kiriman() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM kiriman ORDER BY id desc');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi untuk menambah kiriman baru
function tambah_kiriman($judul,$isi,$penulis,$foto){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    upload_file();
    $tgl = ".date('Y-M-D').";


    $statement = $db->prepare('INSERT INTO kiriman (judul, isi, penulis, gambar, tgl_post)
                                      VALUES (:judul, :isi, :penulis, :foto, :tgl)');
    $statement->execute(array(':judul' => $judul, ':isi' => $isi, ':penulis' => $penulis, ':foto' => $foto, ':tgl' => $tgl));
    move_uploaded_file($source,$direktori);
}

function upload_file(){

    //Membaca nama file
    $foto = $_FILES['foto']['name'];
    //Membaca ukuran file
    $size = $_FILES['foto']['size'];
    //Membaca jenis file
    $file_type = $_FILES['foto']['type'];

    //Source tempat upload file sementara
    $source = $_FILES['foto']['tmp_name'];
    //Tempat upload file disimpan
    $direktori = "pic/$foto";

    move_uploaded_file($source,$direktori);
}
// fungsi untuk mengubah kiriman
function ubah_kiriman($id,$judul,$isi,$foto_hid,$foto2) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    if($foto2==""){
        $foto = $foto_hid;
    }else{
        upload_file();
        $foto = $foto2;
    }
    $statement = $db->prepare('UPDATE kiriman
                                  SET judul = :judul,
                                      isi = :isi,
                                      gambar = :gambar
                                  WHERE id = :id');
    $statement->execute(array(  ':id' => $id,
        ':judul' => $judul,
        ':isi' => $isi,
        ':gambar' => $foto));
    return $statement->rowCount();
}

// fungsi untuk mengambil sebuah kiriman dari basis data sesuai id kiriman
function ambil_kiriman($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM kiriman WHERE id = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetch(PDO::FETCH_ASSOC);
}

// fungsi untuk mengecek kepemilikan suatu kiriman
function tulisan_sendiri($id, $penulis) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT penulis FROM kiriman
                                WHERE id = :id AND penulis = :penulis');
    $statement->execute(array(':id' => $id, ':penulis' => $penulis));
    if($statement->rowCount()) {
        return true;
    } else {
        return false;
    }
}

// fungsi pencarian kiriman berdasarkan kata kunci tertentu
function cari_kiriman($kata_kunci) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM kiriman
                                    WHERE judul LIKE :judul
                                        OR isi LIKE :isi');
    $statement->execute(array(':judul' => '%'.$kata_kunci.'%', ':isi' => '%'.$kata_kunci.'%'));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi filtering kiriman berdasarkan penulis
function filter_kiriman($penulis) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM kiriman
                                    WHERE penulis LIKE :penulis');
    $statement->execute(array(':penulis' => '%'.$penulis.'%'));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// fungsi filtering kiriman berdasarkan penulis
function penulis() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM pengguna');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

