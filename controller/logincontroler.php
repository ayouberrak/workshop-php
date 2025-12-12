<?php
require_once __DIR__ . '/../model/loginmodel.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $row = verify($username,$pass);
    if($row){
        session_start();
        $_SESSION['id'] = $row['id_user'];

        if($row['type']=='medecin'){
            header('Location: ../controller/rendervouscontrolleur.php');
            exit;
        }else{
            header('Location: ../controller/rendervouscontrolleur.php');
        }


    }else{
        echo 'info invalid';
    }
}



require_once __DIR__ . '/../views/login.php';
