<?php
class KhoiA extends ThiSinh
{
    public $DiemLy;
    public $DiemToan;
    public $DiemHoa;
    function __construct($mats, $hoten, $toan, $ly, $hoa)
    {
        //goi ham dung lop cha
        parent::__construct($mats, $hoten);
        // cac thanh phan lop con
        $this->DiemHoa = $hoa;
        $this->DiemToan = $toan;
        $this->DiemLy = $ly;
    }
    function __toString()
    {
        return "MaST: {$this->MaTS}, Ho Ten : {$this->HoTen}, Toan: {$this->DiemToan}, Ly: {$this->DiemLy}, Hoa: {$this->DiemHoa}, Ket qua ={$this->KetQua()} ";
    }
    function TongDiem()
    {
        return $this->DiemLy + $this->DiemHoa + $this->DiemToan;
    }
    function KetQua()
    {
        if ($this->TongDiem() >= 18.5)
            return "Dat";
        else
            return "KhongDat";
    }
    function laKhoiA()
    {
        return true;
    }
    function laKhoiNangKhieu()
    {
        return false;
    }
}
