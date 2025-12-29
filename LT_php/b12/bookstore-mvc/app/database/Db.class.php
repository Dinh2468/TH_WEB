<?php
// file: app/database/Database.class.php

class DB
{
    private $dbh; // Database Handler
    private $numRow = 0;

    function __construct()
    {
        // Set DSN (Data Source Name)
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

        // Create new PDO instance
        try {
            $this->dbh = new PDO($dsn, DB_USER, DB_PASS);
            $this->dbh->query("set names 'utf8'");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Thiết lập chế độ báo lỗi
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    function getRowCount()
    {
        return $this->numRow;
    }

    function __destruct()
    {
        $this->dbh = null;
    }

    // Prepare statement with query
    /**
     * Thực hiện truy vấn SELECT (trả về dữ liệu)
     * @param string $sql Câu lệnh SQL
     * @param array $params Mảng tham số cho câu lệnh prepare
     * @param int $mode Chế độ fetch (mặc định là FETCH_ASSOC)
     * @return array|bool Mảng kết quả hoặc false nếu thất bại
     */
    function query($sql, $params = array(), $mode = PDO::FETCH_ASSOC)
    {
        try {
            $stmt = $this->dbh->prepare($sql);

            // Bind params if provided
            if (!empty($params)) {
                $i = 1;
                foreach ($params as $param) {
                    $stmt->bindValue($i, $param);
                    $i++;
                }
            }

            $stmt->execute();
            $this->numRow = $stmt->rowCount();

            return $stmt->fetchAll($mode);
        } catch (PDOException $e) {
            echo "Lỗi truy vấn (query): " . $e->getMessage();
            return false;
        }
    }

    /**
     * Thực hiện truy vấn INSERT, UPDATE, DELETE (không trả về dữ liệu)
     * @param string $sql Câu lệnh SQL
     * @param array $params Mảng tham số cho câu lệnh prepare
     * @return int|bool Số lượng hàng bị ảnh hưởng hoặc false nếu thất bại
     */
    function execute($sql, $params = array())
    {
        try {
            $stmt = $this->dbh->prepare($sql);

            // Bind params if provided
            if (!empty($params)) {
                $i = 1;
                foreach ($params as $param) {
                    $stmt->bindValue($i, $param);
                    $i++;
                }
            }

            $stmt->execute();
            return $stmt->rowCount(); // Trả về số lượng hàng bị ảnh hưởng
        } catch (PDOException $e) {
            echo "Lỗi truy vấn (execute): " . $e->getMessage();
            return false;
        }
    }
}
