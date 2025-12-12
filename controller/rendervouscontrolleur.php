<?php
require_once __DIR__ . '/../model/rendervousmodel.php';

session_start();

if(!isset($_SESSION['id'])){
        header('Location: ../controller/logincontroler.php');
        exit;
}
$id_S =$_SESSION['id'];

$render_vous_user = getrendevous($id_S);

$medecin =getUserType('medecin');

if($_SERVER['REQUEST_METHOD'] =="POST"){
    
    
}



require_once __DIR__ . '/../views/userrendervous.php';