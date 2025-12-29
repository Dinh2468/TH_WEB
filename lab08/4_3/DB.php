<?php
class Db
{
    protected $conn;

    public function __construct()
    {
        try {
            // Kết nối đến CSDL bookstore
            $this->conn = new PDO("mysql:host=localhost;dbname=bookstore1", "root", "");
            $this->conn->query("SET NAMES 'utf8'");
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
