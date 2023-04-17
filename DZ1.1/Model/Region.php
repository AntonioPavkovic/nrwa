<?php


class Region
{
    public $region_id;
    public $region_name;

    public function __construct($region_id, $region_name)
    {
        $this->region_id = $region_id;
        $this->region_name = $region_name;
    }




    public static function getAll()
    {
        $list = [];
        $req = DatabaseConnection::query("SELECT * FROM regions");
        foreach($req as $region) {
            $list[] = new Region($region['region_id'], $region['region_name']);
        }
        return $list;
    }

    public static function findById($region_id) 
    {
        $req = DatabaseConnection::query("SELECT * FROM regions WHERE region_id = $region_id");
        $region = $req[0];
        return new Region($region['region_id'], $region['region_name']);
    }

    public static function save($region_id, $region_name)
    {
        return DatabaseConnection::query("INSERT INTO regions (region_id, region_name) VALUES ($region_id, '$region_name')");
    }

    public static function update($region_id, $region_name)
    {
        return DatabaseConnection::query("UPDATE regions SET region_id = $region_id, region_name = '$region_name'  WHERE region_id = $region_id");
    }

    public static function delete($region_id)
    {
        return DatabaseConnection::query("DELETE FROM regions WHERE region_id = '$region_id'");
    }


}