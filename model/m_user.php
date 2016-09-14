<?php

function semua_akses() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM akses');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
function akses($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT hak FROM akses WHERE id_akses = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetch(PDO::FETCH_ASSOC);
}
function cetak_akses($ids){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM akses');
    $statement->execute();
    $a = $statement->fetchAll(PDO::FETCH_ASSOC);
    $c = "";
    foreach ($a as $b){
        if(strpos($ids,$b['id_akses']))
            $c .= " " . $b['hak'] . ", ";
    }
    return $c;
}
// fungsi untuk mengambil semua kiriman yang ada di basis data
function semua_user() {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM user u ORDER BY id_user asc');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function lihat_profil(){

    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM user u LEFT JOIN akses a ON u.level = a.id_akses WHERE id_user = :id');
    $statement->execute(array(':id' => $_SESSION['id']));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function ambil_user($id){

    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM user u LEFT JOIN akses a ON u.level = a.id_akses WHERE id_user = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function ambil_nama($id){

    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT nama FROM user WHERE id_user = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetch(PDO::FETCH_ASSOC);
}

// fungsi untuk menghapus kiriman
function hapus_user($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('DELETE FROM user WHERE id_user = :id');
    $statement->execute(array(':id'=>$id));
}

function registrasi($username, $password, $password1, $nama, $email, $level) {
    $salt = mcrypt_create_iv(20);
    $hash_password = hash("sha256", $password.$salt);

    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('INSERT INTO user ( username, password, nama, email, level, salt)
                                      VALUES (:username, :password, :nama, :email, :level, :salt)');
    $statement->execute(array(
                              ':username' => $username,
                              ':password' => $hash_password,
                              ':nama' => $nama,
                              ':email' => $email,
                              ':level' => $level,
                              ':salt' => $salt));
    if ($statement->rowCount()) {
        return true;
    } else {
        return false;
    }
}

// fungsi untuk mengubah kiriman
function update_user($id, $username, $pass1, $pass2, $nama, $email, $level) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    if($pass1 != $pass2) return false;
    elseif($pass1 != "1"){
        $salt = mcrypt_create_iv(20);
        $hash_password = hash("sha256", $pass1.$salt);
        $statement = $db->prepare('UPDATE user
                                  SET username = :username,
                                  password = :password,
                                  salt = :salt,
                                  nama = :nama,
                                  email = :email,
                                  level = :levell
                                  WHERE id_user = :id');
        $statement->execute(array(  ':id' => $id,
            ':username' => $username,
            ':password' => $hash_password,
            ':salt' => $salt,
            ':nama' => $nama,
            ':email' => $email,
            ':levell' => $level));
        return $statement->rowCount();
    }else {
        $statement = $db->prepare('UPDATE user
                              SET username = :username,
                              nama = :nama,
                              email = :email,
                              level = :levell
                              WHERE id_user = :id');
        $statement->execute(array(  ':id' => $id,
            ':username' => $username,
            ':nama' => $nama,
            ':email' => $email,
            ':levell' => $level));
        return $statement->rowCount();
    }
}

