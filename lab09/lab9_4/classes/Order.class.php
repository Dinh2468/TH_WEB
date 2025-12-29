<?php
class Order extends Db
{
    private $tableName = '`order`';
    // Lấy danh sách đơn hàng theo trạng thái

    public function getAll($status = -1)
    {
        $sql = "SELECT * FROM " . $this->tableName;
        if ($status != -1) {
            $sql .= " WHERE status = " . intval($status);
        }
        $sql .= " ORDER BY order_date DESC";
        return $this->exeQuery($sql);
    }

    //Lấy chi tiết đơn hàng

    public function getById($id)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE order_id = :id";
        $arr = array(":id" => $id);
        $data = $this->exeQuery($sql, $arr);
        if (count($data) > 0) return $data[0];
        return [];
    }

    //Lấy chi tiết sản phẩm (cần bảng order_detail)

    public function getOrderDetail($order_id)
    {
        $sql = "SELECT d.*, b.book_name, b.img 
                FROM order_detail d 
                JOIN book b ON d.book_id = b.book_id 
                WHERE d.order_id = :id";
        return $this->exeQuery($sql, array(":id" => $order_id));
    }

    //Cập nhật trạng thái

    public function createOrder($user_email, $receiver_info, $cart_items)
    {
        // 1. Tự tạo mã đơn hàng (Vì order_id là varchar, không tự tăng)
        $order_id = time() . mt_rand(100, 999);

        // 2. CÂU LỆNH SQL ĐÃ SỬA TÊN CỘT
        // Đổi 'consignee_address' thành 'consignee_add' (như trong hình bạn gửi)
        $sql = "INSERT INTO `order` (order_id, email, order_date, status, consignee_name, consignee_phone, consignee_add) 
                VALUES (:oid, :email, NOW(), 0, :name, :phone, :addr)";

        $arr = array(
            ":oid"   => $order_id,
            ":email" => $user_email,
            ":name"  => $receiver_info['name'],
            ":phone" => $receiver_info['phone'],
            ":addr"  => $receiver_info['address'] // Dữ liệu địa chỉ sẽ lưu vào cột consignee_add
        );

        $this->exeNoneQuery($sql, $arr);

        // 3. Lưu chi tiết đơn hàng vào bảng order_detail
        $bookObj = new Book();
        foreach ($cart_items as $book_id => $qty) {
            $book = $bookObj->getDetail($book_id);
            $price = $book['price'];

            $sqlDetail = "INSERT INTO order_detail (order_id, book_id, quantity, price) 
                          VALUES (:oid, :bid, :qty, :price)";

            $arrDetail = array(
                ":oid" => $order_id,
                ":bid" => $book_id,
                ":qty" => $qty,
                ":price" => $price
            );
            $this->exeNoneQuery($sqlDetail, $arrDetail);
        }

        return $order_id;
    }
}
