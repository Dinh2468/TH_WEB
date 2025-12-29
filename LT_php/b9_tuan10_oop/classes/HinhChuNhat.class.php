<?php
class HinhChuNhat
{
    public $chieudai;
    public $chieurong;
    public function __construct($chieudai, $chieurong) //hàm dụng 
    {
        $this->chieudai = $chieudai;
        $this->chieurong = $chieurong;
        echo "<br>Hàm dựng lop " . __CLASS__;
    }
    function __destruct()
    {
        echo "<br>Huy ham lop " . __METHOD__;
    }
    function __toString() //chuyen doi thanh chuoi
    {
        return "<br/>Dai={$this->chieudai},<br/> Rong={$this->chieurong}, <br/>DT={$this->tinhDT()}, <br/>CV={$this->tinhCV()}";
    }
    function tinhDT()
    {
        return $this->chieudai * $this->chieurong;
    }
    function tinhCV(): float
    {
        return ($this->chieudai + $this->chieurong) * 2;
    }
    //magic properties
    //han che sai get set de mo rong nhung kho kiem soat
    function __get($name)
    {
        return isset($this->$name) ?? "";
    }
    function __set($name, $value)
    {
        $this->$name = $value;
    }


    public function info()
    {
        echo "Dài=" . $this->chieudai . ", Rộng=" . $this->chieurong;
    }
}
