<?php
require_once 'db.php';

if(isset($_POST['insertData'])) {
    $name = $_POST['name'];
    $phonenumber = $_POST['phonenumber'];

    $db = new DB();
    $db->insertData($name, $phonenumber);
    header('Location: index.php');
}