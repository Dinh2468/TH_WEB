<?php
enum KieuKetQua
{
    case Dat;
    case KhongDat;
}
class ThiSinh
{
    public $MaTS;
    public $HoTen;
    public function __construct($mats, $hoten)
    {
        $this->MaTS = $mats;
        $this->HoTen = $hoten;
    }
    function TongDiem()
    {
        return 0;
    }
    function KetQua()
    {
        KieuKetQua::KhongDat;
    }
    function laKhoiA()
    {
        return false;
    }
    function laKhoiNangKhieu()
    {
        return false;
    }
}
