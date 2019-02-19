<?php
/**
 * Created by PhpStorm.
 * User: kapa6ac
 * Date: 14.02.2019
 * Time: 15:17
 */

$pMysqli = new mysqli('127.0.0.1', 'root','','budget');

$query = "SELECT * FROM debet";

if (isset ($_POST['income'])) {
    $inc = $_POST['income'];
    if (filter_var($inc, FILTER_VALIDATE_INT)) {
        $response = new Income;
        $response->setIncome($_POST['income']);
    }
    else die ("ВВЕДИ ЧИСЛОВОЕ ЗНАЧЕНИЕ!");
}

if (isset ($_POST['expense'])) {
    $exp = $_POST['expense'];
    if (filter_var($exp, FILTER_VALIDATE_INT)) {
        $response = new Expense;
        $response->setExpense($_POST['expense']);
    }
    else die ("ВВЕДИ ЧИСЛОВОЕ ЗНАЧЕНИЕ!");
}

class Income {
    public $inc;
    public function setIncome ($inc) {
        $this->$inc = $inc;
        echo $inc;
    }
}

class Expense {
    public $exp;
    public function setExpense ($exp) {
        $this->$exp = $exp;
        echo $exp;
    }
}