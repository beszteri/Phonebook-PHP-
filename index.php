<?php

require_once('db.php');

$db = new DB(); 

if(isset($_POST['deleteData'])) {
    $id = $_POST['id'];
    $db->deleteData($id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Details</title>
</head>

<body>
    
    <h1>Insert</h1>
    <form action="insert.php" method="POST">
        <input type="text" placeholder="Name" name="name">
        <input type="text" placeholder="Email" name="email">
        <input type="submit" value="Insert" name="insertData">
    </form>

    <h1>Delete</h1>
    <form method="POST">
        <input type="text" placeholder="Id" name="id">
        <input type="submit" value="Insert" name="deleteData">
    </form>

    <h1>Edit</h1>
    <form action="editData.php" method="POST">
        <input type="text" placeholder="Id" name="id">
        <input type="text" placeholder="Name" name="name">
        <input type="submit" value="Edit" name="editData">
    </form>

    <h1>Data</h1>
    <?php
        $data = $db->getData();
        foreach($data as $i) {
            echo $i['id'] . " " . $i['name'] . " - " . $i['email'] . "<br>";
        }


    ?>

</body>
</html>