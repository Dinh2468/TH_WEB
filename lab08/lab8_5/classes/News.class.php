<?php
require_once("Db.class.php");
class News extends Db // Kế thừa lớp Db
{
    // Lấy danh sách tin tức
    public function list()
    {
        $sql = "SELECT * FROM news ORDER BY created_at DESC";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    // Lấy chi tiết 1 tin
    public function detail($id)
    {
        $sql = "SELECT * FROM news WHERE news_id = :id";
        $stm = $this->conn->prepare($sql);
        $stm->execute([":id" => $id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
}
