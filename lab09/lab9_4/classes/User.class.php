<?php
class User extends Db
{
    // Lấy danh sách tất cả người dùng
    public function getAll()
    {
        return $this->exeQuery("SELECT * FROM admin");
    }

    // Lấy chi tiết người dùng theo username
    public function getDetail($username)
    {
        $sql = "SELECT * FROM admin WHERE username = :u";
        $arr = array(":u" => $username);
        $data = $this->exeQuery($sql, $arr);
        if (count($data) > 0) return $data[0];
        return [];
    }

    // Thêm người dùng mới
    public function add($username, $password, $name, $email, $phone)
    {
        // Mã hóa mật khẩu MD5 trước khi lưu
        $passHash = md5($password);
        $sql = "INSERT INTO admin(username, password, name, email, phone) 
                VALUES(:u, :p, :n, :e, :ph)";
        $arr = array(":u" => $username, ":p" => $passHash, ":n" => $name, ":e" => $email, ":ph" => $phone);
        return $this->exeQuery($sql, $arr);
    }

    // Cập nhật thông tin
    public function update($username, $password, $name, $email, $phone)
    {
        // Nếu mật khẩu rỗng thì không cập nhật password
        if (empty($password)) {
            $sql = "UPDATE admin SET name=:n, email=:e, phone=:ph WHERE username=:u";
            $arr = array(":n" => $name, ":e" => $email, ":ph" => $phone, ":u" => $username);
        } else {
            $passHash = md5($password);
            $sql = "UPDATE admin SET password=:p, name=:n, email=:e, phone=:ph WHERE username=:u";
            $arr = array(":p" => $passHash, ":n" => $name, ":e" => $email, ":ph" => $phone, ":u" => $username);
        }
        return $this->exeQuery($sql, $arr);
    }

    // Xóa người dùng
    public function delete($username)
    {
        // Tránh xóa chính mình (nếu cần thiết)
        // if ($username == $_SESSION['admin_data']['username']) return 0;

        $sql = "DELETE FROM admin WHERE username = :u";
        $arr = array(":u" => $username);
        return $this->exeQuery($sql, $arr);
    }
}
