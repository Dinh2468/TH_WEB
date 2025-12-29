<?php
require_once("Db.class.php");

class Cart extends Db // Kế thừa lớp Db
{
    // Thêm sản phẩm vào giỏ
    public function add($book_id, $qty = 1)
    {
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = [];
        }
        if (isset($_SESSION["cart"][$book_id])) {
            $_SESSION["cart"][$book_id] += $qty;
        } else {
            $_SESSION["cart"][$book_id] = $qty;
        }
    }
    // Xóa 1 sản phẩm khỏi giỏ
    public function delete_cart($book_id)
    {
        if (isset($_SESSION["cart"][$book_id])) {
            unset($_SESSION["cart"][$book_id]);
        }
    }
    // Lấy thông tin giỏ hàng + thông tin sách
    public function list()
    {
        if (!isset($_SESSION["cart"])) return [];
        $result = [];
        foreach ($_SESSION["cart"] as $book_id => $qty) {
            $sql = "SELECT * FROM book WHERE book_id = :id";
            $stm = $this->conn->prepare($sql);
            $stm->execute([":id" => $book_id]);
            $book = $stm->fetch(PDO::FETCH_ASSOC);

            if ($book) {
                $book["quantity"] = $qty;
                $result[] = $book;
            }
        }
        return $result;
    }
}
