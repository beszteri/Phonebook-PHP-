<?php

require_once('db.php');

$db = new DB(); 
$data = $db->getData();

// if(isset($_POST['deleteData'])) {
//     $id = $_POST['id'];
//     $db->deleteData($id);
// }

// if (isset($_GET['search'])) {
//     $data = $db->searchData($_GET['search']);
// } else {
//     $data = $db->getData();
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link hred="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>PhoneBook</title>
</head>

<body>
    
    <h1>Phonebook</h1>
    <div class="container"> 
    <div class="left-pane">

    <h2>Add to the Phonebook</h2>
    <form action="insert.php" method="POST">
        <input type="text" placeholder="Name" name="name" class="gt-input rounded-left">
        <input type="text" placeholder="Phonenumber" name="phonenumber">
        <input type="submit" value="Insert" name="insertData" class="gt-button rounded-right">
    </form>

    <h2>Delete from Phonebook</h2>
    <form  action="deleteData.php" method="POST">
        <select name="id" id="deleteList" class="gt-input full-width rounded-left">
            <?php foreach($data as $item) { ?>
            <option value="<?php echo $item['id'] ?>"><?php echo $item['id'] . ' - ' .
            $item['name'] ?></option>
            <?php } ?>
        </select>
        <input type="submit" name="deleteData" value="Delete" class="gt-button rounded-right">    
    </form>

    <h2>Edit data</h2>
    <form action="editData.php" method="POST">
        <select name="id" id="editList" class="gt-input full-width rounded-left">
            <?php foreach($data as $item) { ?>
            <option value="<?php echo $item['id'] ?>"><?php echo $item['id'] . ' - ' .
            $item['name'] ?></option>
            <?php } ?>
        </select>
        <input type="text" name="phonenumber" placeholder="New Number" class="gt-input">
        <input type="submit" name="editData" value="Update" class="gt-button rounded-right">
    </form>
    </div>

    <h2>Data</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Search Name" class="gt-input rounded-left rounded-right"
        onkeyup="searchNames(this.value)">
    </form>    
    
    <div class="data-wrapper">

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody class="data-table">
                <?php foreach($data as $i) { ?>
                <tr>
                    <td><?php echo $i['id'] ?></td>
                    <td><?php echo $i['name'] ?></td>
                    <td><?php echo $i['phonenumber'] ?></td>
                <tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>                        

<script src="main.js"></script>

</body>
</html>