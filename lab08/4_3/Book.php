<?php
require_once("Db.php");

class Book extends Db
{

    // Thêm sách mới
    public function insertBook($book_id, $book_name, $description, $price, $img, $pub_id, $cat_id)
    {
        $sql = "INSERT INTO book(book_id, book_name, description, price, img, pub_id, cat_id) 
                VALUES(:book_id, :book_name, :description, :price, :img, :pub_id, :cat_id)";

        $stm = $this->conn->prepare($sql);

        // Thực thi câu lệnh với mảng tham số
        return $stm->execute([
            ":book_id" => $book_id,
            ":book_name" => $book_name,
            ":description" => $description,
            ":price" => $price,
            ":img" => $img,
            ":pub_id" => $pub_id,
            ":cat_id" => $cat_id
        ]);
    }

    // Lấy toàn bộ sách
    public function getAllBooks()
    {
        $stm = $this->conn->prepare("SELECT * FROM book");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    // Xóa sách
    public function deleteBook($book_id)
    {
        $sql = "DELETE FROM book WHERE book_id = :book_id";
        $stm = $this->conn->prepare($sql);
        return $stm->execute([":book_id" => $book_id]);
    }
}
