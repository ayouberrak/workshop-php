<?php
require_once __DIR__ . '/../db/config.php';


function getrendevous($id){
    $conn = dbconnect();
    $requet = "SELECT u1.id_user AS id_P , CONCAT(u1.nom_user,' ',u1.prenom_user) AS fullnameP ,
                      u2.id_user AS id_M , CONCAT(u2.nom_user,' ',u2.prenom_user) AS fullnameM,
                      r.date_rvd ,r.status , f.montant  FROM render_vous r
                      INNER JOIN users u1 ON u1.id_user = r.id_patient 
                      INNER JOIN users u2 ON u2.id_user = r.id_medecin
                      INNER JOIN factures f ON f.id_rvd = r.id_rdv 
                      WHERE u1.id_user =:id";
    $res =$conn->prepare($requet);
    $res->execute([
        'id'=>$id
    ]);
    return $res->fetchAll(PDO::FETCH_ASSOC);
}
function getUserType($typeUser){
    $conn = dbconnect();
    $requet ="SELECT id_user , CONCAT(nom_user,' ',prenom_user) AS fullnameuser FROM users WHERE type = :typeuser";
    $res = $conn->prepare($requet);
    $res->execute([
        'typeuser'=>$typeUser
    ]);
    return $res->fetchAll(PDO::FETCH_ASSOC);
}


function insertRendervous($id_P,$id_M,$date_rvd,$status){
    $conn = dbconnect();
    $requet="INSERT INTO render_vous(id_patient,id_medecin,date_rvd,status)
            VALUES(:id_P,:id_M,:date_rvd,:status)";
    $ress = $conn->prepare($requet);
    return $ress->execute([
        'id_P'=>$id_P,
        'id_M'=>$id_M,
        'date_rvd'=>$date_rvd,
        'status'=>$status
    ]);
}