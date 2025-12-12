<?php
require_once __DIR__ . '/../db/config.php';

function verify($username,$pass){
    $conn =dbconnect();
    $req="SELECT * FROM users WHERE nom_user = :username AND pass = :password";
    $res =$conn->prepare($req);
    $res->execute([
        'username'=>$username,
        'password'=>$pass
    ]);
    
    return $res->fetch(PDO::FETCH_ASSOC);
}

