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


function createTasks($title, $desc, $list_id){
    $pdo = dbCon();
    $sql = 'INSERT INTO `tasks` (`id`, `title`, `duration`, `list_id`) VALUES (NULL, :title, :descr, :list_id)';
    $result = $pdo->prepare($sql);
    $result->bindParam(':title', $title);
    $result->bindParam(':descr', $desc);
    $result->bindParam(':list_id', $list_id);
    $result->execute();
}

function createList($title){
    $pdo = dbCon();
    $sql = 'INSERT INTO `lists` (`id`, `title`) VALUES (NULL, :title)';
    $result = $pdo->prepare($sql);
    $result->bindParam(':title', $title);
    $result->execute();
}

function deleteList($id){
    $pdo = dbCon();
    $sql = 'DELETE FROM `lists` WHERE id=:id';
    $result = $pdo->prepare($sql);
    $result->bindParam(':id', $id);
    $result->execute();
}

function checkTask($id){
    $pdo = dbCon();
    $sql = 'UPDATE `tasks` SET `checked`=1 WHERE id=:id ';
    $result = $pdo->prepare($sql);
    $result->bindParam(':id', $id);
    $result->execute();
}