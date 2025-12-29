<?php
class Book extends Db
{
	private $_page_size = 5; //Một trang hiển hị 5 cuốn sách
	private $_page_count;
	public function getRand($n)
	{
		$sql = "select book_id, book_name, img from book order by rand() limit 0, $n ";
		return $this->exeQuery($sql);
	}

	public function getByPubliser($manhaxb) {}
	public function delete($book_id)
	{
		$sql = "delete from book where book_id=:book_id ";
		$arr =  array(":book_id" => $book_id);
		return $this->exeNoneQuery($sql, $arr);
	}

	public function getDetail($book_id)
	{
		$sql = "select book.*, pub_name, cat_name 
			from book, publisher, category
			where book.cat_id = category.cat_id
				and book.pub_id = publisher.pub_id
				and book_id = :book_id ";

		$arr = array(":book_id" => $book_id);

		$data = $this->exeQuery($sql, $arr);
		if (Count($data) > 0) return $data[0];
		else return array();
	}

	public function getAll($currPage = 1)
	{
		$offset = ($currPage - 1) * $this->_page_size;
		$sql = "SELECT
				Count(*)
				FROM
				category
				INNER JOIN book ON book.cat_id = category.cat_id
				INNER JOIN publisher ON book.pub_id = publisher.pub_id";
		$n  = $this->count($sql);
		$this->_page_count = ceil($n / $this->_page_size);
		$sql = "SELECT
				book.book_id,
				book.book_name,
				book.description,
				book.price,
				book.img,
				book.pub_id,
				book.cat_id,
				category.cat_name,
				publisher.pub_name
				FROM
				category
				INNER JOIN book ON book.cat_id = category.cat_id
				INNER JOIN publisher ON book.pub_id = publisher.pub_id
				limit $offset, " . $this->_page_size;

		return $this->exeQuery($sql);
	}

	public function search($currPage = 1)
	{
		$key = Utils::getIndex("key");
		$arr = array(":book_name" => "%" . $key . "%");

		$offset = ($currPage - 1) * $this->_page_size;
		$sql = "SELECT
				Count(*)
				FROM
				category
				INNER JOIN book ON book.cat_id = category.cat_id
				INNER JOIN publisher ON book.pub_id = publisher.pub_id
				where book_name like :book_name	";
		$n  = $this->count($sql, $arr);
		$this->_page_count = ceil($n / $this->_page_size);
		$sql = "SELECT
				book.book_id,
				book.book_name,
				book.description,
				book.price,
				book.img,
				book.pub_id,
				book.cat_id,
				category.cat_name,
				publisher.pub_name
				FROM
				category
				INNER JOIN book ON book.cat_id = category.cat_id
				INNER JOIN publisher ON book.pub_id = publisher.pub_id
				where book_name like :book_name	
				limit $offset, " . $this->_page_size;

		return $this->exeQuery($sql, $arr);
	}

	public function count($sql, $arr = array())
	{
		return $this->countItems($sql, $arr);
	}

	public function getPageCount()
	{
		return $this->_page_count;
	}
	public function searchAdvanced($keyword, $cat_id, $pub_id, $currPage = 1)
	{
		$sql = "SELECT book.*, pub_name, cat_name 
            FROM book 
            INNER JOIN publisher ON book.pub_id = publisher.pub_id 
            INNER JOIN category ON book.cat_id = category.cat_id 
            WHERE 1=1 ";

		$arr = array();

		// 1. Xử lý điều kiện tìm kiếm
		if (!empty($keyword)) {
			$sql .= " AND book.book_name LIKE :keyword ";
			$arr[":keyword"] = "%" . $keyword . "%";
		}

		if (!empty($cat_id) && $cat_id != 'all') {
			$sql .= " AND book.cat_id = :cat_id ";
			$arr[":cat_id"] = $cat_id;
		}

		if (!empty($pub_id) && $pub_id != 'all') {
			$sql .= " AND book.pub_id = :pub_id ";
			$arr[":pub_id"] = $pub_id;
		}

		// Tính toán phân trang (Đếm tổng số dòng thỏa mãn điều kiện trước)
		// Thay select * bằng select count(*) để đếm
		$sqlCount = str_replace("book.*, pub_name, cat_name", "Count(*)", $sql);
		$totalItems = $this->count($sqlCount, $arr);

		// Tính tổng số trang
		$this->_page_count = ceil($totalItems / $this->_page_size);

		// 3. Thêm LIMIT để lấy dữ liệu trang hiện tại
		$offset = ($currPage - 1) * $this->_page_size;
		$sql .= " LIMIT $offset, " . $this->_page_size;

		return $this->exeQuery($sql, $arr);
	}
	public function add($name, $cat_id, $pub_id, $price, $img, $desc)
	{
		// 1. Tự sinh mã sách (Vì database không tự tăng)
		// Ví dụ kết quả: B1712345678 (đảm bảo không trùng)
		$book_id = "B" . time();

		// 2. Thêm bản ghi vào database
		$sql = "INSERT INTO book(book_id, book_name, cat_id, pub_id, price, img, description) 
                VALUES(:id, :n, :c, :p, :pr, :i, :d)";

		$arr = array(
			":id" => $book_id, // Truyền mã sách vừa tạo vào đây
			":n" => $name,
			":c" => $cat_id,
			":p" => $pub_id,
			":pr" => $price,
			":i" => $img,
			":d" => $desc
		);
		return $this->exeNoneQuery($sql, $arr);
	}

	// 2. Hàm cập nhật sách
	public function update($id, $name, $cat_id, $pub_id, $price, $img, $desc)
	{
		// Nếu không chọn ảnh mới ($img rỗng) thì giữ nguyên ảnh cũ
		if ($img == "") {
			$sql = "UPDATE book SET book_name=:n, cat_id=:c, pub_id=:p, price=:pr, description=:d 
                    WHERE book_id=:id";
			$arr = array(
				":n" => $name,
				":c" => $cat_id,
				":p" => $pub_id,
				":pr" => $price,
				":d" => $desc,
				":id" => $id
			);
		} else {
			// Nếu có ảnh mới thì cập nhật cả cột img
			$sql = "UPDATE book SET book_name=:n, cat_id=:c, pub_id=:p, price=:pr, img=:i, description=:d 
                    WHERE book_id=:id";
			$arr = array(
				":n" => $name,
				":c" => $cat_id,
				":p" => $pub_id,
				":pr" => $price,
				":i" => $img,
				":d" => $desc,
				":id" => $id
			);
		}
		return $this->exeNoneQuery($sql, $arr);
	}
}
