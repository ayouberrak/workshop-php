<?php
require_once __DIR__ . '/../model/loginmodel.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $row = verify($username,$pass);
    if($row){
        session_start();
        $_SESSION['name'] = $row['nom_user'];
        echo $_SESSION['name'];

        if($row['type']=='medecin'){
            header('Location: ../views/medecindashbord.php');
        }else{
            header('Location: ../views/userdashbord.php');
        }


    }else{
        echo 'info invalid';
    }
}



require_once __DIR__ . '/../views/login.php';
