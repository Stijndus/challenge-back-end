<?php
include "assets/functions/dbConn.php";
include "assets/functions/functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lists</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <?php require('assets/components/header.php') ?>
    <div class="w3-light-gray w3-center w3-round w3-display-middle w3-padding-16 container">
        <?php
        $lists = getAllLists();
        foreach ($lists as $list) {
            $tasks = getTasks($list['id']);
        ?>
            <div class="w3-gray w3-round lists">
                <h4><?= $list['title'] ?></h4>
                <ul class="list">
                    <?php
                    foreach ($tasks as  $task) {

                        if ($task['checked'] == 1 ) {
                            echo '<li class="checked">' . $task['title'] . '</li>';
                        } else {
                            echo '<li>' . $task['title'] . '</li>';
                        }
                    }
                    ?>
                </ul>
                <button class="w3-btn w3-lightblue">TEST</button>
            </div>
        <?php
        }
        ?>
    </div>
    <?php require('assets/components/footer.php') ?>
</body>

</html>