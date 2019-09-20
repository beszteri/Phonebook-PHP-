<?php
require_once 'db.php';

if(isset($_POST['editData'])) {
    $id = $_POST['id'];
    $phonenumber = $_POST['phonenumber'];

    $db = new DB();
    $db->editData($id, $phonenumber);
    header('Location: index.php');
}