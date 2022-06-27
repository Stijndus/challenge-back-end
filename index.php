<?php
include "assets/functions/dbConn.php";
include "assets/functions/functions.php";

if (!empty($_GET['deleted'])) {
    deleteList($_GET['deleted']);
}

if (!empty($_GET['deletedTask'])) {
    deleteTask($_GET['deletedTask']);
}

if (!empty($_GET['checked'])) {
    checkTask($_GET['checked']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lists</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/sandstone/bootstrap.min.css" integrity="sha384-zEpdAL7W11eTKeoBJK1g79kgl9qjP7g84KfK3AZsuonx38n8ad+f5ZgXtoSDxPOh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a91f6a4b9a.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require('assets/components/header.php') ?>
    <main class="container">
        <div class="row p-3">
            <div class="col-2">
                <a class="btn btn-primary" href="createList.php">Add List</a>
            </div>
            <div class="col-10">
                <?php
                if (!empty($_GET['order'])) {
                    if ($_GET['order'] === 'asc') {
                        echo '<a class="m-1 fas fa-clock text-primary float-right" href="index.php?order=desc"></a><a class="m-1 fas fa-caret-up text-primary float-right center-vertical" href="#"></a>';
                    } else if ($_GET['order'] === 'desc') {
                        echo '<a class="m-1 fas fa-clock text-primary float-right" href="index.php?"></a><a class="m-1 fas fa-caret-down text-primary float-right center-vertical" href="#"></a>';
                    }
                } else {
                    echo '<a class="m-1 fas fa-clock text-primary float-right" href="index.php?order=asc"></a>';
                }
                ?>
            </div>
        </div>
        <div class="row">
            <?php
            $lists = getAllLists();
            foreach ($lists as $list) {
                if (!empty($_GET['order'])) {
                    if ($_GET['order'] === 'asc') {
                        $tasks = getTasksAsc($list['id']);
                    } else if ($_GET['order'] === 'desc') {
                        $tasks =  getTasksDesc($list['id']);
                    }
                } else {
                    $tasks = getTasks($list['id']);
                }
            ?>
                <div class="col-3" style="width: 18rem !important;">
                    <div class="card">
                        <div class="card-header">
                            <?= $list['title'] ?>
                            <a class="m-1 fas fa-edit text-primary float-right center-vertical" href="editList.php?id=<?= $list['id'] ?>"></a>
                        </div>
                        <ul class="list-group list-group-flush">
                            <?php
                            foreach ($tasks as  $task) {
                                if ($task['checked'] == 1) {
                                    echo '<li class="list-group-item checked">' . $task['title'] . '<a class="m-1 fas fa-edit text-primary float-right center-vertical" href="editTask.php?id=' . $task['id'] . '"></a><span class="float-right">' . $task['duration'] . 'min</span><a class="m-1 fas fa-trash-alt text-danger" onclick="return confirm(`Are you sure you want to delete this task?`)" href="index.php?deletedTask= '. $task['id'] . '"></a></li>';
                                } else {
                                    echo '<li class="list-group-item">' . $task['title'] . '<a class="m-1 fas fa-edit text-primary float-right center-vertical" href="editTask.php?id=' . $task['id'] . '"></a><a class=" m-1  fas fa-check text-succes float-right" href="index.php?checked=' . $task['id']  . '"></a><span class="m-1 float-right">' . $task['duration'] . 'min</span><a class="m-1 fas fa-trash-alt text-danger" onclick="return confirm(`Are you sure you want to delete this task?`)" href="index.php?deletedTask= '. $task['id'] . '"></a></li>';
                                }
                            }
                            ?>
                        </ul>
                        <div class="card-body">
                            <a class="btn btn-primary" href="createTask.php?list_id=<?= $list['id'] ?>">Add Task</a>
                            <a class="m-1 fas fa-trash-alt text-danger" onclick="return confirm(`Are you sure you want to delete this list?`)" href="index.php?deleted=<?= $list['id'] ?> "></a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </main>
    <?php require('assets/components/footer.php') ?>
</body>

</html>