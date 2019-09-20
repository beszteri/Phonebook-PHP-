<?php

require_once 'db.php';

$name = $_POST['name'];
$db = new DB();
$data = $db->searchData($name);
echo json_encode($data);