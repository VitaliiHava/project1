<?php
/**
 * Created by PhpStorm.
 * User: kapa6ac
 * Date: 14.02.2019
 * Time: 15:17
 */
class PostHandler {
    public function __construct($post){
        $this->post     =   $post;
        $this->table    =   $post['table'];
        $this->amount   =   $post['amount'];
        $this->cat      =   $post['cat'];
        $this->date     =   $post['date'];
        $this->sort     =   $post['sort'];
        $this->by       =   $post['by'];
    }

    private function select () {

        $db = new mysqli ('127.0.0.1', 'root', '', 'budget');

        if (isset ($_POST['amount'])) {
            if ($this->date == "")
                $this->date = date("Y-m-d");
            $querySetIncome = "INSERT INTO $this->table (`id`, `date`, `$this->table`, `category`) VALUES (NULL, '$this->date', '$this->amount', '$this->cat')";
            mysqli_query($db,$querySetIncome);
        }

        $result = $db->query("SELECT * FROM $this->table ORDER BY '$this->sort' '$this->by'");
        while (($row = $result->fetch_assoc()) != false)
            echo "<tr><td> ". $row['category'] . "</td><td>" . $row['income'] . "</td><td> " .date("d.m.Y", strtotime($row['date'])). "</td><td><a href='#'>изменить</a> / <a href='#'>удалить</a></td></tr>";
    }

    public function show() {
        return self::select();
    }
}
$postHandler = new PostHandler($_POST);
$postHandler->show();
