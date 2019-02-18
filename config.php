<?php
/**
 * Created by PhpStorm.
 * User: kapa6ac
 * Date: 15.02.2019
 * Time: 17:10
 */

$connect = new mysqli('127.0.0.1','root','','new_database');

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} else {
    echo "Connected successfully<br/>";
}