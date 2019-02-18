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
        echo $inc;
    }
    else die ("в поле ДОЛЖНО БЫТЬ ЧИСЛОВОЕ ЗНАЧЕНИЕ!");
}

if (isset ($_POST['expense'])) {
    $exp = $_POST['expense'];
    if (filter_var($exp, FILTER_VALIDATE_INT)) {
        echo "$exp";
    }
    else die ("ВВЕДИ ЧИСЛОВОЕ ЗНАЧЕНИЕ!");
}