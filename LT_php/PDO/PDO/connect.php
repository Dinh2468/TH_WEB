<?php
    $dsn = "mysql:host=localhost; dbname=bookstore";
    $user = "root";
    $pass = "";

    try{
        $dbh = new PDO($dsn , $user, $pass);
        $dbh->query(" set names 'utf8' ");
    }catch (Exception $e){
        echo $q->getMessage();
        exit;
    }