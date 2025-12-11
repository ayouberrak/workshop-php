<?php 
$username='root';
$pass ='';
$host = 'localhost';
$dbname = 'workshop';

try{
    $conn = new PDO ("mysql:host=$host;dbname=$dbname",$username,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($conn){
        echo 'helooooo mad faker <br>';
    }
    print_r($conn);
}catch(PDOException){
    echo 'erreur';
}