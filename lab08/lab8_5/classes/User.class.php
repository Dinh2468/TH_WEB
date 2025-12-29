<?php
require_once("Db.class.php");

class User extends Db // Kế thừa lớp Db
{
    // Đăng ký
    public function register($username, $password, $email)
    {
        $sql = "INSERT INTO users(username, password, email) 
                VALUES(:u, :p, :e)";
        $stm = $this->conn->prepare($sql);
        return $stm->execute([
            ":u" => $username,
            ":p" => md5($password), // mã hóa md5
            ":e" => $email
        ]);
    }
    // Đăng nhập
    public function login($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = :u AND password = :p";
        $stm = $this->conn->prepare($sql);
        $stm->execute([
            ":u" => $username,
            ":p" => md5($password)
        ]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    // Sửa thông tin user
    public function updateInfo($user_id, $email)
    {
        $sql = "UPDATE users SET email = :e WHERE user_id = :id";
        $stm = $this->conn->prepare($sql);
        return $stm->execute([
            ":e" => $email,
            ":id" => $user_id
        ]);
    }
}
