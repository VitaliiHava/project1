<?php
/**
 * Created by PhpStorm.
 * User: kapa6ac
 * Date: 14.02.2019
 * Time: 15:17
 */

$pMysqli = new mysqli('127.0.0.1', 'root','','budget');

$query = "SELECT * FROM debet";

class Budget {
    public $inc;
    public $exp;
    public $cat;
    public $date;

/*    public function __construct($cat, $date)
    {
        $this->$cat = $cat;
        $this->$date = $date;
    }*/

    public function setIncome ($inc, $cat, $date) {
        $this->$inc = $inc;
        $this->$cat = $cat;
        $this->$date = $date;
        echo $inc."<br/>".$cat."<br/>".$date;
    }

    public function setExpense ($exp, $cat, $date) {
        $this->$exp = $exp;
        $this->$cat = $cat;
        $this->$date = $date;
        echo $exp."<br/>".$cat."<br/>".$date;
    }
}

if (isset ($_POST['income'])) {
    $inc = $_POST['income'];
    $cat = $_POST['cat'];
    $date = $_POST['date'];
    if (filter_var($inc, FILTER_VALIDATE_INT)) {
        $response = new Budget;
        $response->setIncome($inc, $cat, $date);
    }
    else die ("ВВЕДИ ЧИСЛОВОЕ ЗНАЧЕНИЕ!");
}

if (isset ($_POST['expense'])) {
    $exp = $_POST['expense'];
    $cat = $_POST['cat'];
    $date = $_POST['date'];
    if (filter_var($exp, FILTER_VALIDATE_INT)) {
        $response = new Budget;
        $response->setExpense($exp, $cat, $date);
    }
    else die ("ВВЕДИ ЧИСЛОВОЕ ЗНАЧЕНИЕ!");
}