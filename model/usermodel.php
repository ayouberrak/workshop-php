<?php 
require_once '../db/config.php';


function adduser($firstname,$lastname,$type,$pass){
    $conn = dbconnect();
    $requet = "INSERT INTO users(nom_user,prenom_user,type,pass)
               VALUES(:firstname,:lastname,:type,:pass)";
    $pre=$conn->prepare($requet);
    return  $pre->execute([
                'firstname'=>$firstname,
                'lastname'=>$lastname,
                'type'=>$type,
                'pass'=>$pass
            ]);
}




?>