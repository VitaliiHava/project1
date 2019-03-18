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

class PostHandler {
    private $_db = null;
    public function __construct($post){
        $this->_db = DataBase::getInstance();
        $this->post     =   $post;
        $this->table    =   $post['table'];
        $this->amount   =   $post['amount'];
        $this->cat      =   $post['cat'];
        $this->date     =   $post['date'];
        $this->sort     =   $post['sort'];
        $this->by       =   $post['by'];
    }

    private function select () {
        if (isset ($_POST['amount'])) {
            if ($this->date == "")
                $this->date = date("Y-m-d");
            $query = "INSERT INTO $this->table (`id`, `date`, `$this->table`, `category`) VALUES (NULL, '$this->date', '$this->amount', '$this->cat')";
            mysqli_query($this->_db,$query);
        }

        $result = $this->_db->query("SELECT * FROM $this->table ORDER BY '$this->sort' '$this->by'");
        while (($row = $result->fetch_assoc()) != false)
            echo "<tr id ='".$row['id']."'><td> ". $row['category'] . "</td><td>" . $row[$this->table] . "</td><td> " .date("d.m.Y", strtotime($row['date'])). "</td><td><button id='".$row['id']."'>Удалить</button></td></tr>";
    }

    public function show() {
        return self::select();
    }
}
$postHandler = new PostHandler($_POST);
$postHandler->show();
