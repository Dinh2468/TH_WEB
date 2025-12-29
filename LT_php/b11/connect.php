<?php
$dsn = 'mysql:host=localhost;dbname=bookstore';
$use = 'root';
$pass = '';
try {
    $dbh = new PDO($dsn, $use, $pass);
    $dbh->query("set names 'utf8'");
    echo "<h3>Ket noi thanh cong</h3>";
} catch (Exception $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
