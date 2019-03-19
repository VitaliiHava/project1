<?php
/**
 * Created by PhpStorm.
 * User: kapa6ac
 * Date: 14.02.2019
 * Time: 15:17
 */

//singleton->
class DataBase
{
    private static $_db = null;
    public static function getInstance()
    {
        if (self::$_db instanceof self){
            return self::$_db;
        } else {
            return self::$_db = new mysqli ('127.0.0.1', 'root', '', 'budget');
        }
    }
    private function __construct(){}
    private function __clone(){}
}
//<-singleton

class PostHandler
{
    private $_db = null;

    public function __construct($post)
    {
        $this->_db = DataBase::getInstance();
        $this->post = $post;
        $this->table = $post['table'];
        $this->id = $post['id'];
        $this->cla = $post['cla'];
        $this->amount = $post['amount'];
        $this->cat = $post['cat'];
        $this->date = $post['date'];
        $this->sort = $post['sort'];
        $this->by = $post['by'];
    }

    public function select()
    {
        $result = $this->_db->query("SELECT * FROM `$this->table` ORDER BY '$this->sort' '$this->by'");
        while ($row = $result->fetch_assoc()) {
            echo "<tr id ='" . $row['id'] . "'><td> " . $row['category'] . "</td><td>" . $row[$this->table] . "</td><td> " . date("d.m.Y", strtotime($row['date'])) . "</td><td><input class='" . $this->table . "' type='button' onclick='del(this.id, this.className)' value='delete' id='" . $row['id'] . "'/></td></tr>";
        }
    }

    private function insert()
    {
        if (isset ($_POST['amount'])) {
            if ($this->date == "")
                $this->date = date("Y-m-d");
            $query = "INSERT INTO $this->table (`id`, `date`, `$this->table`, `category`) VALUES (NULL, '$this->date', '$this->amount', '$this->cat')";
            mysqli_query($this->_db, $query);
        }
    }

    public function delete()
    {
        if (isset ($_POST['id']) && isset ($_POST['cla'])) {
            $query = "DELETE FROM `$this->cla` WHERE `$this->cla`.`id` = '$this->id'";
            var_dump(mysqli_query($this->_db, $query));
        }
    }

    private function update () {

    }

    public function show() {
        self::delete();
        self::insert();
        self::select();
    }
}
$postHandler = new PostHandler($_POST);
$postHandler->delete();
$postHandler->show();

могу редактировать?
    
