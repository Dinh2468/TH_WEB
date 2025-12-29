<?php
class Publisher extends Db
{
    // Lấy tất cả danh sách
    public function getAll()
    {
        return $this->exeQuery("SELECT * FROM publisher");
    }

    // Lấy chi tiết theo ID
    public function getById($id)
    {
        $sql = "SELECT * FROM publisher WHERE pub_id = :id";
        $arr = array(":id" => $id);
        $data = $this->exeQuery($sql, $arr);
        if (count($data) > 0) return $data[0];
        return [];
    }

    // Thêm mới (Vì pub_id là varchar nên phải nhận tham số $id)
    public function add($id, $name)
    {
        $sql = "INSERT INTO publisher(pub_id, pub_name) VALUES(:id, :name)";
        $arr = array(":id" => $id, ":name" => $name);
        return $this->exeQuery($sql, $arr);
    }

    // Cập nhật
    public function update($id, $name)
    {
        $sql = "UPDATE publisher SET pub_name = :name WHERE pub_id = :id";
        $arr = array(":id" => $id, ":name" => $name);
        return $this->exeQuery($sql, $arr);
    }

    // Xóa
    public function delete($id)
    {
        $sql = "DELETE FROM publisher WHERE pub_id = :id";
        $arr = array(":id" => $id);
        return $this->exeQuery($sql, $arr);
    }
}
