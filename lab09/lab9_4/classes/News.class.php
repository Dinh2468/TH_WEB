<?php
class News extends Db
{
    public $PageSize = 10;

    // 1. Lấy danh sách tin (Hàm cũ của bạn, giữ nguyên cho trang chủ)
    public function getAll($page = 1)
    {
        $page = isset($page) ? intval($page) : 1;
        if ($page < 1) $page = 1;
        $start = ($page - 1) * $this->PageSize;

        $sql = "SELECT * FROM news ORDER BY id DESC LIMIT $start, " . $this->PageSize;
        return $this->exeQuery($sql);
    }

    // 2. Lấy chi tiết tin (Hàm cũ)
    public function getDetail($id)
    {
        $id = intval($id);
        $sql = "SELECT * FROM news WHERE id = $id";
        $data = $this->exeQuery($sql);
        if (count($data) > 0) return $data[0];
        return null;
    }

    // 3. Lấy TẤT CẢ tin cho Admin (Không phân trang hoặc phân trang riêng)
    // Để đơn giản ta dùng chung hàm getAll, hoặc viết hàm mới countAll để tính trang
    public function countAll()
    {
        $sql = "SELECT count(*) as total FROM news";
        $data = $this->exeQuery($sql);
        return $data[0]['total'];
    }

    // 4. Thêm tin mới
    public function add($title, $short, $content, $img, $hot)
    {
        $sql = "INSERT INTO news(title, short_content, content, img, hot) 
                VALUES(:t, :s, :c, :i, :h)";
        $arr = array(":t" => $title, ":s" => $short, ":c" => $content, ":i" => $img, ":h" => $hot);
        return $this->exeQuery($sql, $arr);
    }

    // 5. Cập nhật tin
    public function update($id, $title, $short, $content, $img, $hot)
    {
        // Nếu không chọn ảnh mới ($img rỗng) thì giữ ảnh cũ
        if ($img == "") {
            $sql = "UPDATE news SET title=:t, short_content=:s, content=:c, hot=:h WHERE id=:id";
            $arr = array(":t" => $title, ":s" => $short, ":c" => $content, ":h" => $hot, ":id" => $id);
        } else {
            $sql = "UPDATE news SET title=:t, short_content=:s, content=:c, img=:i, hot=:h WHERE id=:id";
            $arr = array(":t" => $title, ":s" => $short, ":c" => $content, ":i" => $img, ":h" => $hot, ":id" => $id);
        }
        return $this->exeQuery($sql, $arr);
    }

    // 6. Xóa tin
    public function delete($id)
    {
        $sql = "DELETE FROM news WHERE id = :id";
        $arr = array(":id" => $id);
        return $this->exeQuery($sql, $arr);
    }
}
