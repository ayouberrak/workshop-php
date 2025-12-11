<?php
require_once '../model/usermodel.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $type = $_POST['type'];
    $pass = $_POST['pass'];

    if(empty($firstname) || empty($lastname)){
         die('tous les champs oblgatoire');
    }

    $typee = ['patient','medecin'];
    if(!in_array($type, $typee)){
        die('type invalide');
    }

    if(adduser($firstname,$lastname,$type,$pass)){
        $success= 'iscription valider';
    }else{
         $error ='erreur de insciption';
    }
}

require_once '../views/signup.php';



