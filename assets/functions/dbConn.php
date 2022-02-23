<?php
    function dbCon(){
        $dbh = new PDO('mysql:host=localhost;dbname=to_do_list', 'root', 'mysql');
        return $dbh;
    }