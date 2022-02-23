<?php   

function getAllLists(){
    $pdo = dbCon();
    $sql = 'SELECT * FROM lists';
    $result = $pdo->prepare($sql);
    $result->execute();
    $result = $result->fetchAll();
    return $result;
}

function getTasks($id){
    $pdo = dbCon();
    $sql = 'SELECT * FROM tasks WHERE list_id=:id';
    $result = $pdo->prepare($sql);
    $result->bindParam(':id', $id);
    $result->execute();
    $result = $result->fetchAll();
    return $result;
}
