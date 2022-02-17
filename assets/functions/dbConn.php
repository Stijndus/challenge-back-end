<?php
    function dbCon(){
        $dsn = "mysql:host=localhost;dbname=to_do_list";
        $user = "root";
        $passwd = "mysql";
        $pdo = new PDO($dsn, $user, $passwd);
        return $pdo;
    }