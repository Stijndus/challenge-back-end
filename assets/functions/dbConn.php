<?php
    function dbCon(){
       return new PDO('mysql:host=localhost;dbname=to_do_list', 'root', 'mysql');
    }