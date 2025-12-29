<?php

class Loai extends Db
{
    function getAll()
    {
        return $this->query("select * from loai");
    }
    function insert($maloai, $tenloai)
    {
        return $this->execute("insert into loai(maloai, tenloai) values(?,?)", [$maloai, $tenloai]);
    }
    function delete($maloai)
    {
        return $this->execute("delete from loai where maloai=?", [$maloai]);
    }
    function getByID($maloai)
    {
        return $this->query("select * from loai where maloai=?", [$maloai]);
    }

    function update($maloai, $tenloai)
    {
        return $this->execute("update loai set tenloai$tenloai=? where maloai=?", [$tenloai, $maloai]);
    }
    function checkma($maloai)
    {
        return $this->query("select * from loai where maloai=?", [$maloai]);
    }
}
