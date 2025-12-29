<?php
class Customer extends Db
{
    // Tên bảng trong database của bạn là 'users'
    private $_table = 'users';

    // 1. Kiểm tra đăng nhập
    public function checkLogin($email, $password)
    {
        // Trong hình ảnh, password được mã hóa MD5 (chuỗi dài e10adc...)
        $passHash = md5($password);

        $sql = "SELECT * FROM " . $this->_table . " WHERE email = :e AND password = :p";
        $arr = array(":e" => $email, ":p" => $passHash);

        $data = $this->exeQuery($sql, $arr);

        if (count($data) > 0) return $data[0];
        return false;
    }

    // 2. Đăng ký tài khoản mới
    public function register($email, $pass, $name, $phone, $address)
    {
        $passHash = md5($pass);

        $sql = "INSERT INTO " . $this->_table . " (email, password, name, phone, address) 
                VALUES (:e, :p, :n, :ph, :addr)";

        $arr = array(
            ":e" => $email,
            ":p" => $passHash,
            ":n" => $name,
            ":ph" => $phone,
            ":addr" => $address
        );

        return $this->exeNoneQuery($sql, $arr);
    }

    // 3. Lấy thông tin khách hàng (để hiện lên form thanh toán)
    public function getDetail($email)
    {
        $sql = "SELECT * FROM " . $this->_table . " WHERE email = :e";
        $arr = array(":e" => $email);

        $data = $this->exeQuery($sql, $arr);
        if (count($data) > 0) return $data[0];
        return [];
    }
}
