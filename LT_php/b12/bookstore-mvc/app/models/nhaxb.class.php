<?php
// file: app/models/Nhaxb.class.php (Giả định)

class Nhaxb extends Db
{
    function getAll()
    {
        return $this->query("select * from nhaxb");
    }

    function insert($manxb, $tennxb)
    {
        return $this->execute("insert into nhaxb(manxb, tennxb) values(?,?)", [$manxb, $tennxb]);
    }

    function delete($manxb)
    {
        return $this->execute("delete from nhaxb where manxb=?", [$manxb]);
    }

    function getByID($manxb)
    {
        return $this->query("select * from nhaxb where manxb=?", [$manxb]);
    }

    function update($manxb, $tennxb)
    {
        return $this->execute("update nhaxb set tennxb=? where manxb=?", [$tennxb, $manxb]);
    }
    function checkma($manxb) {
        return $this->query("select * from nhaxb where manxb=?", [$manxb]);
    }
}
