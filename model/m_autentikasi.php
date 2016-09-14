<?php
session_start();
function is_logged_in(){
    if(isset($_SESSION['username'])) {
        return true;
    } else {
        return false;
    }
}

function logged_mahasiswa(){
    if($_SESSION['level']==2) {
        return true;
    } else {
        return false;
    }
}

function logged_admin(){

    if($_SESSION['level']==0) {
        return true;
    } else {
        return false;
    }
}

function login($username, $password){
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);

    $statement = $db->prepare('SELECT salt FROM user WHERE username = :username');
    $statement->execute(array(':username'=> $username));
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    $password_hash = hash("sha256", $password.$result['salt']);

    $statement2 = $db->prepare('SELECT * FROM user
                                WHERE username = :username
                                    AND password = :password');
    $statement2->execute(array(':username' => $username, ':password' => $password_hash));

    $ret = $statement2->fetchAll(PDO::FETCH_ASSOC);
    if($statement2->rowCount()) {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $ret['level'];
        $_SESSION['id'] = $ret['id_user'];
        return true;
    } else {
        return false;
    }
}
function logout() {
    session_destroy();
    return true;
}

function profil(){
    $user = $_SESSION['username'];
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM user WHERE username = :username');
    $statement->execute(array(':username' => $user));
    return $statement->fetch(PDO::FETCH_ASSOC);

}


// fungsi filtering kiriman berdasarkan penulis
function pemilik($id) {
    $db = new PDO(BASIS_DATA,USER_BASIS_DATA,PASSWORD_BASIS_DATA);
    $statement = $db->prepare('SELECT * FROM user WHERE id_user = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetch(PDO::FETCH_ASSOC);
}
