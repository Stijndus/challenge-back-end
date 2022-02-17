<?php   

function getAllLists(){
    $pdo = dbCon();
    $sql = 'SELECT * FROM lists';
    $result = $pdo->prepare($sql);
    $result->execute();
    $result = $result->fetchAll();
    return $result;
}
