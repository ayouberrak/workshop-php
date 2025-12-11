<?php 
function dbconnect(){
    $username='root';
    $pass ='';
    $host = 'localhost';
    $dbname = 'workshop';

    try{
        $conn = new PDO ("mysql:host=$host;dbname=$dbname",$username,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }catch(PDOException){
        echo 'erreur';
        return false;
    }
}
?>