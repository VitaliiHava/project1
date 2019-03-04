<?php
/**
 * Created by PhpStorm.
 * User: kapa6ac
 * Date: 14.02.2019
 * Time: 15:17
 */
class Income
{
    public function getIncome()
    {
        $pMysqli = new mysqli('127.0.0.1', 'root', '', 'budget');
        $query = "SELECT * FROM debet";
        $result = $pMysqli->query($query);

        while (($row = $result->fetch_assoc()) != false)
            echo "<div id='inc'>Категория: ".$row['category'] . "<br> Сумма: " . $row['income'] . " грн.<br> Дата: " . $row['date'] . "<br> </div><br>";
    }

    public function setIncome ($inc, $cat, $date)
    {
        $pMysqli = new mysqli('127.0.0.1', 'root','','budget');
        $this->$inc = $inc;
        $this->$cat = $cat;
        $this->$date = $date;

        if ($date == "")
            $date = date("Y-m-d");

        $querySetIncome = "INSERT INTO debet (`id`, `date`, `income`, `category`) VALUES (NULL, '$date', '$inc', '$cat')";
        mysqli_query($pMysqli,$querySetIncome);
        $result = new Income();
        $result->getIncome();
    }
}

class Expense {
    public function getExpense () {
        $pMysqli = new mysqli('127.0.0.1', 'root', '', 'budget');
        $query = "SELECT * FROM expense";
        $result = $pMysqli->query($query);

        while (($row = $result->fetch_assoc()) != false)
            echo "<div id='inc'>Категория: ".$row['category'] . "<br> Сумма: " . $row['expense'] . " грн.<br> Дата: " . $row['date'] . "<br> </div><br>";
    }

    public function setExpense ($exp, $cat, $date)
    {
        $pMysqli = new mysqli('127.0.0.1', 'root','','budget');
        $this->$exp = $exp;
        $this->$cat = $cat;
        $this->$date = $date;

        if ($date == "")
            $date = date("Y-m-d");

        $querySetExpense = "INSERT INTO expense (`id`, `date`, `expense`, `category`) VALUES (NULL, '$date', '$exp', '$cat')";
        mysqli_query($pMysqli,$querySetExpense);
        $result = new Expense();
        $result->getExpense();
    }
}

if (isset($_POST['table']) && $_POST['table'] == "income")
{
    $result = new Income();
    return $result->getIncome();
}

if (isset($_POST['table']) && $_POST['table'] == "expense")
{
    $result = new Expense();
    return $result->getExpense();
}

if (isset ($_POST['income'])) {
    $inc = $_POST['income'];
    $cat = $_POST['cat'];
    $date = $_POST['date'];
    if (filter_var($inc, FILTER_VALIDATE_INT)) {
        $response = new Income;
        $response->setIncome($inc, $cat, $date);
    }
    else return ("ВВЕДИ ЧИСЛОВОЕ ЗНАЧЕНИЕ!");
}

if (isset ($_POST['expense'])) {
    $exp = $_POST['expense'];
    $cat = $_POST['cat'];
    $date = $_POST['date'];
    if (filter_var($exp, FILTER_VALIDATE_INT)) {
        $response = new Expense;
        $response->setExpense($exp, $cat, $date);
    }
    else return ("ВВЕДИ ЧИСЛОВОЕ ЗНАЧЕНИЕ!");
}