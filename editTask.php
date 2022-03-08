<?php
include 'assets/functions/dbConn.php';
include 'assets/functions/functions.php';

$task_id = $_GET['id'];

$task = getTask($task_id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    updateTask($_POST['title'], $_POST['duration'],$task['id']);
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/sandstone/bootstrap.min.css" integrity="sha384-zEpdAL7W11eTKeoBJK1g79kgl9qjP7g84KfK3AZsuonx38n8ad+f5ZgXtoSDxPOh" crossorigin="anonymous">

    <link rel="stylesheet" href="resources/css/style.css">
</head>

<body>
    <?php include "assets/components/header.php"; ?>
    <main class="container">
        <form action="" method="POST" onsubmit="return confirm('Are you shure u want to add this task')">
            <div class="form-group">
                <label for="Title">Task Title</label>
                <input type="text" class="form-control" id="Title" name="title" aria-describedby="titleHelp" value="<?= $task['title'] ?>">
                <small id="titleHelp" class="form-text text-muted">This is what you'll see</small>
            </div>
            <div class="form-group">
                <label for="Duration">Duration</label>
                <input type="number" class="form-control" name="duration" id="Duration" placeholder="Duration" value="<?= $task['duration'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
    <?php include "assets/components/footer.php"; ?>

</html>