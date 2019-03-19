<?php
/**
 * Created by PhpStorm.
 * User: kapa6ac
 * Date: 14.02.2019
 * Time: 15:17
 */

class DataBase
{
    private static $db;
    
    private function __construct() {
        if ($this->db === null) {
            $this->db = new mysqli('127.0.0.1', 'root', '', 'budget');
        }
    }
    
    public static function getInstance()
    {
        return $ths->db;
    }
}

class PostHandler
{
    protected $db;

    public function __construct($post)
    {
        $this->db = DataBase->getInstance();
        $this->post = $post;
        
        foreach($post as $key=>$item) {
            $this->$key = $item;
        }
    }

    public function select()
    {
        $result = $this->db->query("SELECT * FROM `$this->table` ORDER BY '$this->sort' '$this->by'");
    }

    private function insert()
    {
        if (isset($this->amount)) {
            if ($this->date == "")
                $this->date = date("Y-m-d");
            $query = "INSERT INTO $this->table (`id`, `date`, `$this->table`, `category`) VALUES (NULL, '$this->date', '$this->amount', '$this->cat')";
            $this->db->query($query);
        }
    }

    public function delete()
    {
        if (isset($this->id) && isset($this->cla)) {
            $query = "DELETE FROM `$this->cla` WHERE `$this->cla`.`id` = '$this->id'";
            $this->db->query($query);
        }
    }

    private function update () {

    }

    public function show() {
        $list = $this->select();
        while ($row = $list->fetch_array()) {
            echo "<tr id ='" . $row['id'] . "'><td> " . $row['category'] . "</td><td>" . $row[$this->table] . "</td><td> " . date("d.m.Y", strtotime($row['date'])) . "</td><td><input class='" . $this->table . "' type='button' onclick='del(this.id, this.className)' value='delete' id='" . $row['id'] . "'/></td></tr>";
        }
    }
}
$postHandler = new PostHandler($_POST);
$postHandler->delete();
$postHandler->show();
