<?php
/**
 * Created by PhpStorm.
 * User: kapa6ac
 * Date: 14.02.2019
 * Time: 15:17
 */

class Budget
{
    public function __construct()
    {
        $this->pMysqli = new mysqli('127.0.0.1', 'root', '', 'budget');
    }

    public function getIncome($query)
    {
        echo "    <tr>
                <th>Категория</th>
                <th>Сумма</th>
                <th>Дата</th>
                </tr>";
        $result = $this->pMysqli->query($query);
        while (($row = $result->fetch_assoc()) != false)
            echo "<tr><td>" . $row['category'] . "</td><td>" . $row['income'] . "</td><td> " .date("d.m.Y", strtotime($row['date'])). "</td></tr>";
    }

    public function setIncome ($inc, $cat, $date)
    {
        $this->$inc = $inc;
        $this->$cat = $cat;
        $this->$date = $date;
        if ($date == "")
            $date = date("Y-m-d");
        $querySetIncome = "INSERT INTO debet (`id`, `date`, `income`, `category`) VALUES (NULL, '$date', '$inc', '$cat')";
        mysqli_query($this->pMysqli,$querySetIncome);
    }

    public function getExpense($query)
    {
        echo "    <tr>
                <th>Категория</th>
                <th>Сумма</th>
                <th>Дата</th>
                </tr>";
        $result = $this->pMysqli->query($query);
        while (($row = $result->fetch_assoc()) != false)
            echo "<tr><td>" . $row['category'] . "</td><td> " . $row['expense'] . " </td><td> " .date("d.m.Y", strtotime($row['date'])). "</td></tr>";
    }

    public function setExpense ($exp, $cat, $date)
    {
        $this->$exp = $exp;
        $this->$cat = $cat;
        $this->$date = $date;
        if ($date == "")
            $date = date("Y-m-d");
        $querySetExpense = "INSERT INTO expense (`id`, `date`, `expense`, `category`) VALUES (NULL, '$date', '$exp', '$cat')";
        mysqli_query($this->pMysqli,$querySetExpense);
    }
}

if (isset($_POST['table']) && $_POST['table'] == "income"){
    $result = new Budget ();
    return $result->getIncome("SELECT * FROM debet");
} else if ($_POST['table'] == "expense") {
    $result = new Budget ();
    return $result->getExpense("SELECT * FROM expense");
}

if (isset ($_POST['income'])) {
    $inc = $_POST['income'];
    $cat = $_POST['cat'];
    $date = $_POST['date'];
    if (($_POST['income']) == "")
        die ("Некорректное значение");
    if (filter_var($inc, FILTER_VALIDATE_INT)) {
        $response = new Budget ();
        $response->setIncome($inc, $cat, $date);
        return $response->getIncome("SELECT * FROM debet");
    }
    else return ("Введите необходимое корректное значение не равное нулю.");
}

if (isset ($_POST['expense'])) {
    $exp = $_POST['expense'];
    $cat = $_POST['cat'];
    $date = $_POST['date'];
    if (filter_var($exp, FILTER_VALIDATE_INT)) {
        $response = new Budget ();
        $response->setExpense($exp, $cat, $date);
        return $response->getExpense("SELECT * FROM expense");
    }
    else return ("Введите необходимое корректное значение не равное нулю.");
}