<?php
include 'assets/functions/dbConn.php';
include 'assets/functions/functions.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    createList($_POST['title']);
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/sandstone/bootstrap.min.css" integrity="sha384-zEpdAL7W11eTKeoBJK1g79kgl9qjP7g84KfK3AZsuonx38n8ad+f5ZgXtoSDxPOh" crossorigin="anonymous">

    <link rel="stylesheet" href="resources/css/style.css">
</head>

<body>
    <?php include "assets/components/header.php"; ?>
    <form class="" action="" method="POST" onsubmit="return confirm('Are you sure you want to add this list?')">
        <div class="">
            <div>
                <label for="title">Title</label>
                <input type="text" name="title">
            </div>

            <input type="submit">
        </div>
    </form>
    <?php include "assets/components/footer.php"; ?>

</html>